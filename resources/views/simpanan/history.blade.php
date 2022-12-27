@extends('templates.layout')
@section('title', 'Simpanan')
@section('sidebar-simpanan', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
        <p>{{session('msg')}}</p>
    @endif
    <a href="{{url('tambah_simpanan')}}">Tambah data</a>
    <table class="table table-sm table-hover table-bordered">
        <tr class="text-center bg-lightgrey">
            <th>No</th>
            <th>NIK</th>
            <th>Nama</th>
            <th>Tanggal Setor</th>
            <th>Jumlah</th>
            <th>Aksi</th>
        </tr>
        @php 
        $n=0;
        @endphp
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
    </table>
</div>
@endsection