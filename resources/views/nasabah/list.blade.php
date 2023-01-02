@extends('templates.layout')
@section('title', 'Nasabah')
@section('sidebar-nasabah', 'active')
@section('contents')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Data Nasabah</h3>
    <a href="{{url('tambah_nasabah')}}" class="btn btn-primary btn-sm float-right">Tambah data</a>
        </div>
        <div class="card-body">
        @if (Session::has('msg'))
        <div class="alert">
            <p>{{session('msg')}}</p>
        </div>
        @endif
            <table class="table table-sm table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No. Tlp</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php 
                $n=0;
                @endphp
                <tbody>
                @foreach ($nasabah as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->no_nasabah}}</td>
                        <td>{{$data->nama_nasabah}}</td>
                        <td>{{$data->alamat_nasabah}}</td>
                        <td>{{$data->no_tlp}}</td>
                        <td>
                            <a class="btn btn-sm  btn-warning" href="{{url('edit_nasabah/'.$data->no_nasabah)}}"><i class="fa fa-edit"></i></a>
                            <a class="btn  btn-sm btn-danger" onclick="return confirm('Hapus data nasabah?')" href="{{url('delete_nasabah/'.$data->no_nasabah)}}"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection