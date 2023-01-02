<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use App\Models\Pencairan;
use App\Models\Pinjaman;
use App\Models\Jurnal;
use App\Models\Perkiraan;
use Illuminate\Support\Facades\Auth;

class AngsuranController extends Controller
{
    public function index(){
        $data = [
            'pinjaman' => Pinjaman::where('status_pencairan', 'Dicairkan')->get(),
        ];

        return view('angsuran.list_angsuran', $data);
    }

    public function riwayat_angsuran(Request $request, $no_pencairan){
        $data = [
            'pencairan' => Pencairan::find($no_pencairan),
        ];
        return view('angsuran.riwayat_angsuran', $data);
    }
    public function bayar_angsuran(Request $request, $no_pencairan){
        $data = [
            'pencairan' => Pencairan::find($no_pencairan),
            'akun' => Perkiraan::get(),

        ];
        return view('angsuran.bayar_angsuran', $data);
    }

    public function act_bayar_angsuran(Request $request){
        $angsuran = new Angsuran;
        $angsuran->no_pencairan = $request->input('no_pencairan');
        $angsuran->tanggal_pembayaran = date('d-m-Y H:i:s');
        $angsuran->angsuran_ke = $request->input('angsuran_ke');
        $angsuran->besar_pembayaran = $request->input('besar_pembayaran');
        $angsuran->biaya_jasa = $request->input('biaya_jasa');
        $angsuran->denda = $request->input('denda');
        $angsuran->id_petugas = Auth::user()->id_petugas;

        $angsuran->save();

        $total = $request->input('besar_pembayaran') + $request->input('biaya_jasa') + $request->input('denda');
        // jurnal 
        $akun_debet = Perkiraan::find($request->input('akun_debet'));
        $akun_kredit = Perkiraan::find($request->input('akun_kredit'));
        
        // add jurnal debet
        $jurnal = new Jurnal;
        $jurnal->tgl_jurnal = date('Y-m-d H:i:s');
        $jurnal->keterangan = $akun_debet->nama_akun;
        $jurnal->no_reff = $akun_debet->kode_akun;
        $jurnal->debet = $total;
        $jurnal->kredit = 0;
        $jurnal->id_petugas = Auth::user()->id_petugas;
        $jurnal->id_angsuran = $angsuran->no_angsuran;
        $jurnal->save();

        // add jurnal kredit
        $jurnal_k = new Jurnal;
        $jurnal_k->tgl_jurnal = date('Y-m-d H:i:s');
        $jurnal_k->keterangan = $akun_kredit->nama_akun;
        $jurnal_k->no_reff = $akun_kredit->kode_akun;
        $jurnal_k->kredit = $total;
        $jurnal_k->debet = 0;
        $jurnal_k->id_petugas = Auth::user()->id_petugas;
        $jurnal_k->id_angsuran = $angsuran->no_angsuran;
        $jurnal_k->save();

        return redirect('riwayat_angsuran/'.$request->input('no_pencairan'))->with(['msg'=>'Pembayaran berhasil', 'kwitansi'=>$angsuran->no_angsuran]);
    }
}
