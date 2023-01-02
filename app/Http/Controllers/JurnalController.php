<?php

namespace App\Http\Controllers;

use App\Models\Jurnal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class JurnalController extends Controller
{
    public function index(Request $request){
        $tb_jurnal = DB::table('jurnal');
        $data['tahun'] = '';
        $data['bulan'] = '';
        if($request->input('tanggal')){
            $tb_jurnal->where('tgl_jurnal', 'LIKE', $request->input('tahun').'-'.$request->input('bulan').'%');
            $data['tahun'] = $request->input('tahun');
            $data['bulan'] = $request->input('bulan');
        }

        $data['jurnal'] = $tb_jurnal->get();

        return view('jurnal.list_jurnal', $data);
    }
}
