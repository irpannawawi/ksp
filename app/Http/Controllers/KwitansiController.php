<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Models\Transaksi;
use App\Models\Pencairan;
use App\Models\Angsuran;
use Illuminate\Http\Request;


class KwitansiController extends Controller
{
    public function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	public function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
 
    public function index(Request $request, $type, $id){
        if($type == 'simpanan'){
            $tb = Simpanan::find($id);
            $noreg = 'SP-'.$tb->no_simpanan;
            $nama_nasabah = strtoupper($tb->nasabah->nama_nasabah);
            $nominal = $tb->besar_simpanan;
            $ket = "Tabungan Nasabah";
            $tgl = $tb->tanggal_simpanan;

        }elseif($type == 'transaksi'){
            $tb = Transaksi::find($id);
            $noreg = 'TR-'.$tb->no_transaksi;
            $nama_nasabah = "KSP Tunas Muda";
            $nominal = $tb->besar_transaksi;
            $ket = "Penarikan Tabungan Nasabah An. ".strtoupper($tb->nasabah->nama_nasabah);
            $tgl = $tb->tanggal_transaksi;

        }elseif($type == 'pencairan'){
            $tb = Pencairan::find($id);
            $noreg = 'PN-'.$tb->no_pencairan;
            $nama_nasabah = "KSP Tunas Muda";
            $nominal = $tb->besar_pencairan;
            $ket = "Pencairan Pinjaman Nasabah An. ".strtoupper($tb->nasabah->nama_nasabah);
            $tgl = $tb->tanggal_pencairan;

        }elseif($type == 'angsuran'){
            $tb = Angsuran::find($id);
            $noreg = 'AS-'.$tb->no_angsuran;
            $nama_nasabah = strtoupper($tb->nasabah->nama_nasabah);
            $nominal = $tb->besar_pembayaran;
            $ket = "Pembayaran Angsuran Pinjaman";
            $tgl = $tb->tanggal_angsuran;
        }

        $data = [
            'no_reg'=>$noreg,
            'nama_nasabah'=>$nama_nasabah,
            'uang'=>$nominal,
            'uang_terbilang'=>$this->terbilang($nominal),
            'keterangan'=>$ket,
            'tanggal'=>$tgl,
        ];
        return view('kwitansi', $data);
    }
}
