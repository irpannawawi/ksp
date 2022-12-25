<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Pencairan;

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
        return view('pencairan.add_pencairan', ['pinjaman'=>$pinjaman]);
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
        $pencairan->save();
        
        return redirect('pencairan')->with('msg', 'Dana Berhasil dicairkan');

    }
}
