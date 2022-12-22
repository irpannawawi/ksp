@extends('templates.layout')
@section('title', 'Petugas')
@section('sidebar-petugas', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-3 mx-auto">
        <form method="POST" action="{{url('add_petugas')}}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" max="16" id="username" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="nama_petugas">Nama</label>
                <input type="text" name="nama_petugas" id="nama_petugas" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat_petugas" id="alamat" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="no_tlp">Nomor Tlp/Hp</label>
                <input type="text" name="no_tlp" id="no_tlp" class="form-control">
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" id="tanggal_lahir" placeholder="dd mm YYYY" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            
            <div class="form-group">
                <label for="password2">Konfirmasi Password</label>
                <input type="password" name="password2" id="password2" class="form-control">
            </div>
            <div class="form-group">
                <label for="hak_akses">Level</label>
                <select name="hak_akses" id="hak_akses" class="form-control">
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                    <option value="pimpinan">Pimpinan</option>
                </select>
            </div>
            
            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection