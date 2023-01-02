@extends('templates.layout')
@section('title', 'Perkiraan')
@section('sidebar-perkiraan', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
    <div class="alert alert-primary">
        <p>{{session('msg')}}</p>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Data Akun Perkiraan</h3>
            <a href="{{url('tambah_perkiraan')}}" class="btn btn-sm btn-primary float-right">Tambah data</a>
        </div>
        <div class="card-body">
            <table class="table table-hover datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Akun</th>
                        <th>Nama Akun</th>
                        <th>Jenis Akun</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                @php 
                $n=0;
                @endphp
                <tbody class="font-weight-lighter">
                    @foreach ($perkiraan as $data)
                    <tr>
                        <td>{{++$n}}</td>
                        <td>{{$data->kode_akun}}</td>
                        <td>{{$data->nama_akun}}</td>
                        <td>{{$data->jenis_akun}}</td>
                        <td>
                            <div class="btn-group">
                                <a class="btn btn-sm btn-warning" href="{{url('edit_perkiraan/'.$data->kode_akun)}}">Edit</a>
                                <a
                                class="
                                @if ($data->kode_akun==10001 OR $data->kode_akun==20001)
                                    disabled
                                @endif
                                 btn btn-sm btn-danger" onclick="return confirm('Hapus data akun perkiraan?')" href="{{url('delete_perkiraan/'.$data->kode_akun)}}">Hapus</a>
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