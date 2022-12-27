<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Nasabah;
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
            return redirect('transaksi')->with('msg', 'Berhasil menambah transaksi');
        }
    }    
    public function hapus_transaksi(Request $request, $no_transaksi){
        $transaksi = Transaksi::find($no_transaksi);
        $nasabah = Nasabah::find($transaksi->no_nasabah);
        $nasabah->saldo += $transaksi->besar_transaksi;
        $nasabah->save();
        if($transaksi->delete()){
            return redirect('transaksi')->with('msg', 'Berhasil menghapus transaksi');
        }
    }
}
