@extends('templates.layout')
@section('title', 'Petugas')
@section('sidebar-petugas', 'active')
@section('contents')
<div class="container-fluid">
    <a href="{{url('tambah_petugas')}}">Tambah data</a>
    @if (Session::has('msg'))
        <p>{{session('msg')}}</p>
    @endif
    <table class="table table-hover">
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
@endsection