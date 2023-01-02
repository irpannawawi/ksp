@extends('templates.layout')
@section('title', 'Simpanan')
@section('sidebar-simpanan', 'active')
@section('contents')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">History Simpanan</h3>
            <a href="{{url('tambah_simpanan')}}" class="btn btn-sm btn-primary float-right">Tambah data</a>
        </div>
        <div class="card-body">
            @if (Session::has('msg'))
            <div class="alert alert-primary">
                <p>{{session('msg')}}</p>
            </div>
            @endif
            <table class="table table-sm table-hover datatable">
                <thead>
                    <tr class="text-center bg-lightgrey">
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal Setor</th>
                        <th>Jumlah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php 
                $n=0;
                @endphp
                <tbody>
                    @foreach ($simpanan as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->no_nasabah}}</td>
                        <td>{{$data->nasabah->nama_nasabah}}</td>
                        <td>{{$data->tanggal_simpanan}}</td>
                        <td>Rp.{{number_format($data->besar_simpanan, 0, '.',',')}},-</td>
                        <td nowrap>
                            <div class="btn-group">
                                <a class="btn btn-danger btn-sm"  href="{{url('hapus_simpanan/'.$data->no_simpanan)}}"><i class="fa fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection