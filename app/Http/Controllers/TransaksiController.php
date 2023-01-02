<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Nasabah;
use App\Models\Jurnal;
use App\Models\Perkiraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TransaksiController extends Controller
{
    public function index(Request $request){
        $data = [
            'transaksi' => Transaksi::get()->sortBy('tanggal_transaksi'),
        ];
        return view('transaksi.history', $data);
    }

    public function tambah_transaksi(Request $request){
        $data = [
            'akun' => Perkiraan::get(),
            'nasabah' => Nasabah::find($request->input('no_nasabah')),
        ];
        return view('transaksi.tambah_transaksi', $data);
    }

    public function act_tambah_transaksi(Request $request){
        $transaksi = new Transaksi;
        $transaksi->tanggal_transaksi = date('d-m-Y H:i:s');
        $transaksi->no_nasabah = $request->input('no_nasabah');
        $transaksi->besar_transaksi = $request->input('besar_transaksi');
        $transaksi->id_petugas =  Auth::user()->id_petugas;
        if($transaksi->save()){
            $nasabah = Nasabah::find($request->input('no_nasabah'));
            $nasabah->saldo -= $request->input('besar_transaksi');
            $nasabah->save();

            // jurnal 
            $akun_debet = Perkiraan::find($request->input('akun_debet'));
            $akun_kredit = Perkiraan::find($request->input('akun_kredit'));
            
            // add jurnal debet
            $jurnal = new Jurnal;
            $jurnal->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal->keterangan = $akun_debet->nama_akun;
            $jurnal->no_reff = $akun_debet->kode_akun;
            $jurnal->debet = $request->input('besar_transaksi');
            $jurnal->kredit = 0;
            $jurnal->id_petugas = Auth::user()->id_petugas;
            $jurnal->id_transaksi = $transaksi->no_transaksi;
            $jurnal->save();

            // add jurnal kredit
            $jurnal_k = new Jurnal;
            $jurnal_k->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal_k->keterangan = $akun_kredit->nama_akun;
            $jurnal_k->no_reff = $akun_kredit->kode_akun;
            $jurnal_k->kredit = $request->input('besar_transaksi');
            $jurnal_k->debet = 0;
            $jurnal_k->id_petugas = Auth::user()->id_petugas;
            $jurnal_k->id_transaksi = $transaksi->no_transaksi;
            $jurnal_k->save();

            return redirect('transaksi')->with(['msg'=>'Berhasil menambah transaksi', 'kwitansi'=>$transaksi->no_transaksi]);
        }
    }    
    public function hapus_transaksi(Request $request, $no_transaksi){
        $transaksi = Transaksi::find($no_transaksi);
        $nasabah = Nasabah::find($transaksi->no_nasabah);
        $nasabah->saldo += $transaksi->besar_transaksi;
        $nasabah->save();

        Jurnal::where('id_transaksi', $transaksi->no_transaksi)->delete();

        if($transaksi->delete()){
            return redirect('transaksi')->with('msg', 'Berhasil menghapus transaksi');
        }
    }
}
