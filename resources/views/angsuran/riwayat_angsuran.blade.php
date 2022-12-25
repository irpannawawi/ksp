@extends('templates.layout')
@section('title', 'Angsuran')
@section('sidebar-angsuran', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
        <p>{{session('msg')}}</p>
    @endif
    <a href="{{url('bayar_angsuran/'.$pencairan->no_pencairan)}}">Bayar angsuran</a>
    <table class="table table-sm table-hover table-bordered">
        <tr class="bg-dark text-white">
            <th colspan="8">Detail Pinjaman</th>
        </tr>
        <tr class="text-center bg-grey">
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Pengajuan</th>
            <th>Tanggal Pencairan</th>
            <th nowrap>Pinjaman</th>
            <th>Angsuran</th>
            <th>Nominal Cicilan</th>
            <th nowrap>Total</th>
        </tr>

        <tr>
            <td>{{$pencairan->pinjaman->no_nasabah}}</td>
            <td>{{$pencairan->pinjaman->nasabah->nama_nasabah}}</td>
            <td>{{$pencairan->pinjaman->tgl_pengajuan}}</td>
            <td>{{$pencairan->tanggal_pencairan}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->besar_pinjaman, 0, '.',',')}},-</td>
            <td>{{$pencairan->angsuran->count().'/'.$pencairan->pinjaman->lama_angsuran}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->jumlah_cicilan, 0, '.', ',')}}</td>
            <td>Rp.{{number_format($pencairan->pinjaman->total_pinjaman, 0, '.',',')}},-</td>

        </tr>
        @php 
        $n=0;
        @endphp
    </table>

    <table class="table table-hover table-stiped">
        <tr class="bg-dark text-white">
            <th colspan="7">Riwayat Angsuran</th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal Pembayaran</th>
            <th>Angsuran Ke</th>
            <th>Besar Pembayaran</th>
            <th>Biaya Jasa</th>
            <th>Denda</th>
            <th>Petugas</th>	
        </tr>
        @foreach($pencairan->angsuran as $data)
        <tr>
            <td>{{++$n}}</td>
            <td>{{$data->tanggal_pembayaran}}</td>
            <td>{{$data->angsuran_ke}}</td>
            <td>{{$data->besar_pembayaran}}</td>
            <td>{{$data->biaya_jasa}}</td>
            <td>{{$data->denda}}</td>
            <td>{{$data->petugas->nama_petugas}}</td>
        </tr>
        @endforeach
        @if ($pencairan->angsuran->count() ==0)
        <tr class="text-center">
            <td colspan="7">(belum ada data)</td>
        </tr>
        @endif
    </table>
</div>
@endsection