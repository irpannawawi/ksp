<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Pencairan;
use App\Models\Jurnal;
use App\Models\Perkiraan;
use Illuminate\Support\Facades\Auth;


class PencairanController extends Controller
{
    public function index(Request $request){
        $data = [
            'pinjaman' => Pinjaman::get(),
        ];
        return view('pencairan.list_pencairan', $data);
    }

    public function cairkan_pinjaman(Request $request, $no_pinjaman){
        $pinjaman = Pinjaman::find($no_pinjaman);
        $data = [
            'akun' => Perkiraan::get(),
            'pinjaman'=>$pinjaman,
        ];
        return view('pencairan.add_pencairan', $data);
    }

    public function act_pencairan(Request $request){
        $pinjaman = Pinjaman::find($request->input('no_pinjaman'));
        $pinjaman->status_pencairan = 'Dicairkan';
        $pinjaman->save();

        $pencairan = new Pencairan;
        $pencairan->no_pinjaman = $request->input('no_pinjaman');
        $pencairan->tanggal_pencairan = date('d-m-Y H:i:s');
        $pencairan->besar_pencairan = $request->input('besar_pencairan');
        $pencairan->biaya_adm = $request->input('biaya_adm');
        $pencairan->id_petugas = $request->input('id_petugas');
        if($pencairan->save()){
            // jurnal 
            $akun_debet = Perkiraan::find($request->input('akun_debet'));
            $akun_kredit = Perkiraan::find($request->input('akun_kredit'));
            
            // add jurnal debet
            $jurnal = new Jurnal;
            $jurnal->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal->keterangan = $akun_debet->nama_akun;
            $jurnal->no_reff = $akun_debet->kode_akun;
            $jurnal->debet = $request->input('besar_pencairan');
            $jurnal->kredit = 0;
            $jurnal->id_petugas = Auth::user()->id_petugas;
            $jurnal->id_pencairan = $pencairan->no_pencairan;
            $jurnal->save();

            // add jurnal kredit
            $jurnal_k = new Jurnal;
            $jurnal_k->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal_k->keterangan = $akun_kredit->nama_akun;
            $jurnal_k->no_reff = $akun_kredit->kode_akun;
            $jurnal_k->kredit = $request->input('besar_pencairan');
            $jurnal_k->debet = 0;
            $jurnal_k->id_petugas = Auth::user()->id_petugas;
            $jurnal_k->id_pencairan = $pencairan->no_pencairan;
            $jurnal_k->save();
            
            return redirect('pencairan')->with(['msg'=>'Dana Berhasil dicairkan',  'kwitansi'=>$pencairan->no_pencairan]);
        }else{
            return redirect('pencairan')->with('msg', 'Dana Gagal dicairkan');
        }

    }
}
