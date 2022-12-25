@extends('templates.layout')
@section('title', 'Angsuran')
@section('sidebar-angsuran', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-9 mx-auto">
        <form method="POST" action="{{url('act_bayar_angsuran')}}">
            @csrf
            <table class="table">
                <tr class="bg-dark text-white">
                    <th colspan="4">Detail Nasabah</th>
                </tr>
                <tr>
                    <!-- DATA NASABAH -->
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Status Kepegawaian</th>
                        </tr>
                        <tr>
                            <td>{{$pencairan->pinjaman->nasabah->nama_nasabah}}</td>
                            <td>{{$pencairan->pinjaman->nasabah->no_nasabah}}</td>
                            <td>{{$pencairan->pinjaman->nasabah->alamat_nasabah}}</td>
                            <td>{{$pencairan->pinjaman->nasabah->status_nasabah}}</td>
                        </tr>
                    </table>
                    <!-- ./DATA NASABAH -->
                </tr>
            </table>

            <table class="table table-sm table-hover table-bordered">
        <tr class="bg-dark text-white">
            <th colspan="8">Detail Pinjaman</th>
        </tr>
        <tr class="text-center bg-grey">
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Pencairan</th>
            <th nowrap>Pinjaman</th>
            <th>Angsuran</th>
            <th>Nominal Cicilan</th>
            <th nowrap>Total</th>
        </tr>

        <tr>
            <td>{{$pencairan->pinjaman->tgl_pengajuan}}</td>
            <td>{{$pencairan->tanggal_pencairan}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->besar_pinjaman, 0, '.',',')}},-</td>
            <td>{{$pencairan->angsuran->count().'/'.$pencairan->pinjaman->lama_angsuran}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->jumlah_cicilan, 0, '.', ',')}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->total_pinjaman, 0, '.',',')}},-</td>

        </tr>
    </table>

    <table class="table">        
        <tr>
            <th>Angsuran Ke</th>
            <td>
                <input type="number" name="angsuran_ke" class="form-control" value="{{$pencairan->angsuran->count()+1}}" readonly>
            </td>
        </tr>        
        <tr>
            <th>Besar Pembayaran</th>
            <td>
                <input type="number" name="besar_pembayaran" class="form-control" value="{{$pencairan->pinjaman->jumlah_cicilan}}" required>
            </td>
        </tr>         
        <tr>
            <th>Biaya Jasa</th>
            <td>
                <input type="number" name="biaya_jasa" class="form-control" value="0" required>
            </td>
        </tr>           
        <tr>
            <th>Biaya Denda</th>
            <td>
                <input type="number" name="denda" class="form-control"  value="0" required>
            </td>
        </tr>       
    </table>
            <div class="form-group">
                <input type="text" value="{{$pencairan->no_pencairan}}" name="no_pencairan" hidden>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection