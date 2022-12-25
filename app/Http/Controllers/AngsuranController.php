<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Angsuran;
use App\Models\Pencairan;
use App\Models\Pinjaman;
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

        return redirect('riwayat_angsuran/'.$request->input('no_pencairan'));
    }
}
