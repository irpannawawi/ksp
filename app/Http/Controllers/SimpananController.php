<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Nasabah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SimpananController extends Controller
{
    public function index(Request $request){
        $data = [
            'simpanan' => Simpanan::get()->sortBy('tanggal_simpanan'),
        ];
        return view('simpanan.history', $data);
    }

    public function tambah_simpanan(Request $request){
        $data = [
            'nasabah' => Nasabah::find($request->input('no_nasabah')),
        ];
        return view('simpanan.tambah_simpanan', $data);
    }

    public function act_tambah_simpanan(Request $request){
        $simpanan = new Simpanan;
        $simpanan->tanggal_simpanan = date('d-m-Y H:i:s');
        $simpanan->no_nasabah = $request->input('no_nasabah');
        $simpanan->besar_simpanan = $request->input('besar_simpanan');
        $simpanan->id_petugas =  Auth::user()->id_petugas;
        if($simpanan->save()){
            $nasabah = Nasabah::find($request->input('no_nasabah'));
            $nasabah->saldo += $request->input('besar_simpanan');
            $nasabah->save();
            return redirect('simpanan')->with('msg', 'Berhasil menambah simpanan');
        }
    }    
    public function hapus_simpanan(Request $request, $no_simpanan){
        $simpanan = Simpanan::find($no_simpanan);
        $nasabah = Nasabah::find($simpanan->no_nasabah);
        $nasabah->saldo -= $simpanan->besar_simpanan;
        $nasabah->save();
        if($simpanan->delete()){
            return redirect('simpanan')->with('msg', 'Berhasil menghapus simpanan');
        }
    }
}
