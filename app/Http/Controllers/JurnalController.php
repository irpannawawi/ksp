<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{
    public function index(Request $request){
        $tb_jurnal = DB::table('jurnal');
        $data['tahun'] = null;
        $data['bulan'] = null;
        if($request->input('tanggal')){
            $tb_jurnal->where('tgl_jurnal', 'LIKE', $request->input('tahun').'-'.$request->input('bulan').'%');
            $data['tahun'] = $request->input('tahun');
            $data['bulan'] = $request->input('bulan');
        }

        $data['jurnal'] = $tb_jurnal->get();

        return view('jurnal.list_jurnal', $data);
    }

    public function print(Request $request, $bulan, $tahun){
        $bln = [
            '01'=>'Januari',
            '02'=>'Februari',
            '03'=>'Maret',
            '04'=>'April',
            '05'=>'Mei',
            '06'=>'Juni',
            '07'=>'Juli',
            '08'=>'Agustus',
            '09'=>'September',
            '10'=>'Oktober',
            '11'=>'November',
            '12'=>'Desember',
        ];
        $tb_jurnal = DB::table('jurnal');
        $tb_jurnal->where('tgl_jurnal', 'LIKE', $tahun.'-'.$bulan.'%');
            $data['tahun'] = $tahun;
            $data['bulan'] = $bln[$bulan];

        $data['jurnal'] = $tb_jurnal->get();

        return view('jurnal.print', $data);
    }
}
