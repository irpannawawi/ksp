@extends('templates.layout')
@section('title', 'Nasabah')
@section('sidebar-nasabah', 'active')
@section('contents')
<div class="container-fluid">
    <a href="{{url('tambah_nasabah')}}">Tambah data</a>
    @if (Session::has('msg'))
        <p>{{session('msg')}}</p>
    @endif
    <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Tlp</th>
            <th>Aksi</th>
        </tr>
        @php 
        $n=0;
        @endphp
        @foreach ($nasabah as $data)
            <tr>
                <td>{{++$n}}</td>
                <td>{{$data->no_nasabah}}</td>
                <td>{{$data->nama_nasabah}}</td>
                <td>{{$data->alamat_nasabah}}</td>
                <td>{{$data->no_tlp}}</td>
                <td>
                    <a class="btn btn-warning" href="{{url('edit_nasabah/'.$data->no_nasabah)}}">Edit</a>
                    <a class="btn btn-danger" onclick="return confirm('Hapus data nasabah?')" href="{{url('delete_nasabah/'.$data->no_nasabah)}}">Hapus</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection