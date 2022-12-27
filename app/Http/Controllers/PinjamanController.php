<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Petugas;
use App\Models\Nasabah;

class PinjamanController extends Controller
{
    public function index(Request $request){
        $data = [
            'pinjaman' => Pinjaman::get(),
        ];
        return view('pinjaman.list_pinjaman', $data);
    }

    
    public function tambah_pinjaman(Request $request){
        $data = [
        ];
        return view('pinjaman.tambah_pinjaman', $data);
    }


    public function tambah_pinjaman_2(Request $request){
        $data = [
            'nasabah' => Nasabah::find($request->input('no_nasabah')),
        ];
        if($data['nasabah']->count() == 1){
            return view('pinjaman.tambah_pinjaman_2', $data);
        }else{
            return redirect()->back()->withInput()->with('msg', 'NIK belum terdaftar');

        }
    }

    public function tambah_pinjaman_3(Request $request){
        $pinjaman = new Pinjaman;
        $pinjaman->no_nasabah = $request->input('no_nasabah');
        $pinjaman->tgl_pengajuan = date('d-m-Y H:i:s');
        $pinjaman->besar_pinjaman = $request->input('besar_pinjaman');
        $pinjaman->bunga_pinjaman = $request->input('bunga_pinjaman');
        $pinjaman->total_pinjaman = $request->input('total_pinjaman');
        $pinjaman->lama_angsuran = $request->input('lama_angsuran');
        $pinjaman->jumlah_cicilan = $request->input('jumlah_cicilan');
        $pinjaman->status_pencairan = 'Menunggu';
        $pinjaman->id_petugas = $request->input('id_petugas');

        if($pinjaman->save()){
            return redirect('pinjaman')->with('msg', 'Berhasil menambah data pinjaman');
        }else{
            return redirect()->back()->withInput()->with('msg', 'NIK belum terdaftar');

        }
    }

    public function cairkan_pinjaman(Request $request, $no_pinjaman){
        $pinjaman = Pinjaman::find($no_pinjaman);
        $pinjaman->status_pencairan = 'Dicairkan';
        $pinjaman->save();
        return redirect()->back()->with('msg', 'Dana pinjaman telah dicairkan');
    }

    public function delete_pinjaman(Request $request, $no_pinjaman){
        $pinjaman = Pinjaman::find($no_pinjaman);
        if($pinjaman->delete()){
            return redirect('pinjaman')->with('msg', 'Pinjaman berhasil dihapus');
        }else{

        }
    }
}
