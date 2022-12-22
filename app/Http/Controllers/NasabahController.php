<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasabah;

class NasabahController extends Controller
{
    public function index(Request $request){
        $data = [
            'nasabah'=> Nasabah::get(),
        ];
        return view('nasabah.list', $data);
    }    
    
    public function tambah_nasabah(Request $request){
        return view('nasabah.tambah');
    }
    
    public function edit_nasabah(Request $request, $no_nasabah){
        $data = [
            'nasabah'=> Nasabah::find($no_nasabah),
        ];
        return view('nasabah.edit', $data);
    }

    public function add_nasabah(Request $request){
        $nasabah = new Nasabah;
        $nasabah->no_nasabah = $request->input('no_nasabah');
        $nasabah->tanggal_daftar = date('d-m-Y H:i:s') ;
        $nasabah->nama_nasabah = $request->input('nama_nasabah');
        $nasabah->jenis_kelamin = $request->input('jenis_kelamin');
        $nasabah->alamat_nasabah = $request->input('alamat_nasabah');
        $nasabah->no_tlp = $request->input('no_tlp');
        $nasabah->status_nasabah = '';
        $nasabah->saldo = 0;

        if($nasabah->save()){
            return redirect('nasabah')->with('msg', 'Berhasil menambah nasabah');
        }else{
            return redirect('nasabah')->withInput()->with('msg', 'Gagal menambah nasabah');
        }
    }
    public function act_edit_nasabah(Request $request){
        $nasabah = Nasabah::find($request->input('no_nasabah'));
        $nasabah->nama_nasabah = $request->input('nama_nasabah');
        $nasabah->jenis_kelamin = $request->input('jenis_kelamin');
        $nasabah->alamat_nasabah = $request->input('alamat_nasabah');
        $nasabah->no_tlp = $request->input('no_tlp');
        $nasabah->status_nasabah = '';
        
        if($nasabah->save()){
            return redirect('edit_nasabah/'.$request->input('no_nasabah'))->with('msg', 'Berhasil mengubah data nasabah');
        }else{
            return redirect('edit_nasabah/'.$request->input('no_nasabah'))->withInput()->with('msg', 'Gagal menambah nasabah');
        }
    }
    public function delete_nasabah(Request $request, $no_nasabah){
        $nasabah = Nasabah::find($no_nasabah);
           
        if($nasabah->delete()){
            return redirect('nasabah/'.$request->input('no_nasabah'))->with('msg', 'Berhasil menghapus data nasabah');
        }else{
            return redirect('nasabah/'.$request->input('no_nasabah'))->withInput()->with('msg', 'Gagal');
        }
    }
}
