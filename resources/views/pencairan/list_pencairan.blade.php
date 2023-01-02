@extends('templates.layout')
@section('title', 'Pencairan')
@section('sidebar-pencairan', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
        <div class="alert alert-primary">
            <p>{{session('msg')}}</p>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3>Data Pencairan</h3>
        </div>
        <div class="card-body p-3">
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
                <tbody>
                    @foreach ($pinjaman as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->no_nasabah}}</td>
                        <td>{{$data->nasabah->nama_nasabah}}</td>
                        <td>{{$data->tgl_pengajuan}}</td>
                        <td>Rp.{{number_format($data->besar_pinjaman, 0, '.',',')}},-</td>
                        <td>{{$data->lama_angsuran}} Bulan</td>
                        <td>Rp.{{number_format($data->total_pinjaman, 0, '.',',')}},-</td>
                        <td><span class="badge badge-{{$data->status_pencairan=='Menunggu'?'warning':'success'}}">{{$data->status_pencairan}}</span></td>
                        <td>
                            @if ($data->status_pencairan == 'Menunggu')
                            <a class="btn btn-sm btn-success" onclick="return confirm('Cairkan pinjaman?')" href="{{url('cairkan_pinjaman/'.$data->no_pinjaman)}}">Cairkan</a>
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