@extends('templates.layout')
@section('title', 'Pinjaman')
@section('sidebar-pinjaman', 'active')
@section('contents')
<div class="container-fluid">
    <a href="{{url('tambah_pinjaman')}}">Tambah data</a>
    @if (Session::has('msg'))
        <p>{{session('msg')}}</p>
    @endif
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Pengajuan</th>
            <th nowrap>Pinjaman</th>
            <th>Angsuran</th>
            <th nowrap>Total</th>
            <th>Status Pencairan</th>
            <th>Aksi</th>
        </tr>
        @php 
        $n=0;
        @endphp
        @foreach ($pinjaman as $data)
            <tr>
                <td>{{++$n}}</td>
                <td>{{$data->no_nasabah}}</td>
                <td>{{$data->nasabah->nama_nasabah}}</td>
                <td>{{$data->tgl_pengajuan}}</td>
                <td>Rp.{{number_format($data->besar_pinjaman, 0, '.',',')}},-</td>
                <td>{{$data->lama_angsuran}} Bulan</td>
                <td>Rp.{{number_format($data->total_pinjaman, 0, '.',',')}},-</td>
                <td>{{$data->status_pencairan}}</td>
                <td>
                    <a class="btn btn-warning" href="{{url('edit_pinjaman/'.$data->no_pinjaman)}}">Edit</a>
                    <a class="btn btn-danger" onclick="return confirm('Hapus data pinjaman?')" href="{{url('delete_pinjaman/'.$data->no_pinjaman)}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection