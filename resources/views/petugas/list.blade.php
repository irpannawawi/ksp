@extends('templates.layout')
@section('title', 'Petugas')
@section('sidebar-petugas', 'active')
@section('contents')
<div class="container-fluid">
    
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Data Petugas</h3>
            <a href="{{url('tambah_petugas')}}" class="btn btn-sm btn-primary float-right">Tambah data</a>
        </div>
        <div class="card-body">
            @if (Session::has('msg'))
                <div class="alert">
                    <p>{{session('msg')}}</p>
                </div>
            @endif
            <table class="table table-hover table-sm datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Tempat/Tgl. Lahir</th>
                        <th>No. Tlp</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php 
                $n=0;
                @endphp
                @foreach ($petugas as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->username}}</td>
                        <td>{{$data->nama_petugas}}</td>
                        <td>{{$data->alamat_petugas}}</td>
                        <td>{{$data->tempat_lahir}}, {{$data->tanggal_lahir}}</td>
                        <td>{{$data->no_tlp}}</td>
                        <td>{{strtoupper($data->hak_akses)}}</td>
                        <td>
                            <a class="btn btn-warning" href="{{url('edit_petugas/'.$data->id_petugas)}}">Edit</a>
                            <a class="btn btn-danger" onclick="return confirm('Hapus data petugas?')" href="{{url('delete_petugas/'.$data->id_petugas)}}">Hapus</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection