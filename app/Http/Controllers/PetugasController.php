<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Petugas;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    public function index(Request $request){
        $data = [
            'petugas'=> Petugas::get(),
        ];
        return view('petugas.list', $data);
    }    
    
    public function tambah_petugas(Request $request){
        return view('petugas.tambah');
    }
    
    public function edit_petugas(Request $request, $id_petugas){
        $data = [
            'petugas'=> Petugas::find($id_petugas),
        ];
        return view('petugas.edit', $data);
    }

    public function add_petugas(Request $request){
        if($request->input('password') === $request->input('password2') ){

            $petugas = new Petugas;
            $petugas->username = $request->input('username');
            $petugas->nama_petugas = $request->input('nama_petugas');
            $petugas->alamat_petugas = $request->input('alamat_petugas');
            $petugas->no_tlp = $request->input('no_tlp');
            $petugas->tempat_lahir = $request->input('tempat_lahir');
            $petugas->tanggal_lahir = $request->input('tanggal_lahir');
            $petugas->password = Hash::make($request->input('password'));
            $petugas->hak_akses = $request->input('hak_akses')==null?'admin':$request->input('hak_akses');
            
            if($petugas->save()){
                return redirect('petugas')->with('msg', 'Berhasil menambah petugas');
            }else{
                return redirect('petugas')->withInput()->with('msg', 'Gagal menambah petugas');
            }
        }
    }
    public function act_edit_petugas(Request $request){
        
        $petugas = Petugas::find($request->input('id_petugas'));
        $petugas->username = $request->input('username');
        $petugas->nama_petugas = $request->input('nama_petugas');
        $petugas->alamat_petugas = $request->input('alamat_petugas');
        $petugas->no_tlp = $request->input('no_tlp');
        $petugas->tempat_lahir = $request->input('tempat_lahir');
        $petugas->tanggal_lahir = $request->input('tanggal_lahir');
        if($request->input('password') != null){
            if($request->input('password') === $request->input('password2') ){
                $petugas->password = Hash::make($request->input('password'));
            }else{
                return redirect('petugas')->withInput()->with('msg', 'Gagal merubah petugas, pastikan password sama');
            }
        }

            $petugas->hak_akses = $request->input('hak_akses')==null?'admin':$request->input('hak_akses');
            
            if($petugas->save()){
                return redirect('petugas')->with('msg', 'Berhasil menambah petugas');
            }else{
                return redirect('petugas')->withInput()->with('msg', 'Gagal menambah petugas');
            }
    }
    public function delete_petugas(Request $request, $id_petugas){
        $petugas = petugas::find($id_petugas);
           
        if($petugas->delete()){
            return redirect('petugas/'.$request->input('id_petugas'))->with('msg', 'Berhasil menghapus data petugas');
        }else{
            return redirect('petugas/'.$request->input('id_petugas'))->withInput()->with('msg', 'Gagal');
        }
    }
}
