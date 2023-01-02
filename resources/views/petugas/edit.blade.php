@extends('templates.layout')
@section('title', 'Petugas')
@section('sidebar-petugas', 'active')
@section('contents')
<div class="container-fluid">
        @if (Session::has('msg'))
        <div class="alert alert-primary">
            <p>{{session('msg')}}</p>
        </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h3>Edit Data Petugas</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{url('edit_petugas')}}">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="id_petugas">ID</label>
                                <input type="text" value="{{$petugas->id_petugas}}" max="16" id="id_petugas" class="form-control" autocomplete="off"  disabled>
                                <input type="text" value="{{$petugas->id_petugas}}"  name="id_petugas"  hidden>
                            </div>
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" value="{{$petugas->username}}" name="username" max="16" id="username" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_petugas">Nama</label>
                                <input type="text" value="{{$petugas->nama_petugas}}" name="nama_petugas" id="nama_petugas" class="form-control" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="hak_akses">Level</label>
                                <select name="hak_akses" id="hak_akses" class="form-control">
                                    <option {{$petugas->hak_akses=='admin'?'selected':''}} value="admin">Admin</option>
                                    <option {{$petugas->hak_akses=='kasir'?'selected':''}} value="kasir">Kasir</option>
                                    <option {{$petugas->hak_akses=='pimpinan'?'selected':''}} value="pimpinan">Pimpinan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat_petugas" id="alamat" class="form-control">{{$petugas->alamat_petugas}}</textarea>
                            </div>
                        </div>
                        <div class="col-6">    
                            <div class="form-group">
                                <label for="no_tlp">Nomor Tlp/Hp</label>
                                <input type="text" value="{{$petugas->no_tlp}}" name="no_tlp" id="no_tlp" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" value="{{$petugas->tempat_lahir}}" name="tempat_lahir" id="tempat_lahir" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="text" value="{{$petugas->tanggal_lahir}}" name="tanggal_lahir" id="tanggal_lahir" placeholder="dd mm YYYY" class="form-control">
                            </div>
                            <p>Kosongkan Password jika tidak ingin merubah</p>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"  name="password" id="password" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="password2">Konfirmasi Password</label>
                                <input type="password"  name="password2" id="password2" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-primary mb-3">
                            <a href="{{url('petugas')}}" class="btn btn-danger form-control">Kembali</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</div>
@endsection