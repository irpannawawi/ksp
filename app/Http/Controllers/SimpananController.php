<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use App\Models\Perkiraan;
use Illuminate\Support\Facades\Auth;
use App\Models\Simpanan;
use App\Models\Nasabah;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class SimpananController extends Controller
{
    public function index(Request $request){
        $data = [
            'simpanan' => Simpanan::orderby('tanggal_simpanan', 'desc')->get(),
        ];
        return view('simpanan.history', $data);
    }

    public function tambah_simpanan(Request $request){
        $data = [
            'nasabah' => Nasabah::find($request->input('no_nasabah')),
            'akun' => Perkiraan::get(),

        ];
        if($data['nasabah']==null && $request->input('no_nasabah') != null){
            $request->session()->flash('msg','NIK Tidak Terdaftar');
        }
        return view('simpanan.tambah_simpanan', $data);
    }

    public function act_tambah_simpanan(Request $request){
        $simpanan = new Simpanan;
        $simpanan->tanggal_simpanan = date('d-m-Y H:i:s');
        $simpanan->no_nasabah = $request->input('no_nasabah');
        $simpanan->besar_simpanan = $request->input('besar_simpanan');
        $simpanan->id_petugas =  Auth::user()->id_petugas;
        if($simpanan->save()){
            // update saldo
            $nasabah = Nasabah::find($request->input('no_nasabah'));
            $nasabah->saldo += $request->input('besar_simpanan');
            $nasabah->save();

            // jurnal 
            $akun_debet = Perkiraan::find($request->input('akun_debet'));
            $akun_kredit = Perkiraan::find($request->input('akun_kredit'));
            
            // add jurnal debet
            $jurnal = new Jurnal;
            $jurnal->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal->keterangan = $akun_debet->nama_akun;
            $jurnal->no_reff = $akun_debet->kode_akun;
            $jurnal->debet = $request->input('besar_simpanan');
            $jurnal->kredit = 0;
            $jurnal->id_petugas = Auth::user()->id_petugas;
            $jurnal->save();

            // add jurnal kredit
            $jurnal_k = new Jurnal;
            $jurnal_k->tgl_jurnal = date('Y-m-d H:i:s');
            $jurnal_k->keterangan = $akun_kredit->nama_akun;
            $jurnal_k->no_reff = $akun_kredit->kode_akun;
            $jurnal_k->kredit = $request->input('besar_simpanan');
            $jurnal_k->debet = 0;
            $jurnal_k->id_petugas = Auth::user()->id_petugas;
            $jurnal_k->save();

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
