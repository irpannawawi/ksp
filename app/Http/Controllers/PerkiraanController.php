<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perkiraan;

class PerkiraanController extends Controller
{
    public function index(Request $request){
        $data = [
            'perkiraan'=> Perkiraan::get(),
        ];
        return view('perkiraan.list_perkiraan', $data);
    }    
    
    public function tambah_perkiraan(Request $request){
        return view('perkiraan.tambah_perkiraan');
    }
    
    public function edit_perkiraan(Request $request, $kode_akun){
        $data = [
            'perkiraan'=> Perkiraan::find($kode_akun),
        ];
        return view('perkiraan.edit_perkiraan', $data);
    }

    public function act_tambah_perkiraan(Request $request){
        $perkiraan = new Perkiraan;
        $perkiraan->kode_akun = $request->input('kode_akun');
        $perkiraan->nama_akun = $request->input('nama_akun');
        $perkiraan->jenis_akun = $request->input('jenis_akun');

        if($perkiraan->save()){
            return redirect('perkiraan')->with('msg', 'Berhasil menambah perkiraan');
        }else{
            return redirect('perkiraan')->withInput()->with('msg', 'Gagal menambah perkiraan');
        }
    }
    public function act_edit_perkiraan(Request $request){
        $perkiraan = Perkiraan::find($request->input('kode_akun'));
        $perkiraan->nama_akun = $request->input('nama_akun');
        $perkiraan->jenis_akun = $request->input('jenis_akun');

        if($perkiraan->save()){
            return redirect('perkiraan')->with('msg', 'Berhasil merubah perkiraan');
        }else{
            return redirect('perkiraan')->withInput()->with('msg', 'Gagal menambah perkiraan');
        }
    }

    public function delete_perkiraan(Request $request, $kode_akun){
        $perkiraan = Perkiraan::find($kode_akun);
           
        if($perkiraan->delete()){
            return redirect('perkiraan')->with('msg', 'Berhasil menghapus data perkiraan');
        }else{
            return redirect('perkiraan')->withInput()->with('msg', 'Gagal');
        }
    }
}
