@extends('templates.layout')
@section('title', 'Pinjaman')
@section('sidebar-pinjaman', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
    <div class="alert alert-primary">
        <p>{{session('msg')}}</p>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Data Pinjaman</h3>
            <a href="{{url('tambah_pinjaman')}}" class="btn btn-sm btn-primary float-right">Tambah data</a>
        </div>
        <div class="card-body">
            <table class="table table-hover table-responsive datatable">
                <thead>
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
                </thead>
                @php 
                $n=0;
                @endphp
                <tbody class="font-weight-lighter">
                    @foreach ($pinjaman as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->no_nasabah}}</td>
                        <td>{{$data->nasabah->nama_nasabah}}</td>
                        <td>{{$data->tgl_pengajuan}}</td>
                        <td>Rp.{{number_format($data->besar_pinjaman, 0, '.',',')}},-</td>
                        <td>{{$data->lama_angsuran}} Bulan</td>
                        <td>Rp.{{number_format($data->total_pinjaman, 0, '.',',')}},-</td>
                        <td><span class="badge badge-{{$data->status_pencairan=='menunggu'?'warning':'success'}}">{{$data->status_pencairan}}</span></td>
                        <td>
                            @if ($data->status_pencairan != 'Dicairkan')
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning" href="{{url('edit_pinjaman/'.$data->no_pinjaman)}}">Edit</a>
                                <a class="btn btn-sm btn-danger" onclick="return confirm('Hapus data pinjaman?')" href="{{url('delete_pinjaman/'.$data->no_pinjaman)}}">Hapus</a>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection