@extends('templates.layout')
@section('title', 'Nasabah')
@section('sidebar-nasabah', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-3 mx-auto">
        <form method="POST" action="{{url('add_nasabah')}}">
            @csrf
            <div class="form-group">
                <label for="no_nasabah">NIK</label>
                <input type="text" name="no_nasabah" max="16" id="no_nasabah" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="nama_nasabah">Nama</label>
                <input type="text" name="nama_nasabah" id="nama_nasabah" class="form-control" autocomplete="off" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat_nasabah" id="alamat" class="form-control" required ></textarea>
            </div>
            <div class="form-group">
                <label for="no_tlp">Nomor Tlp/Hp</label>
                <input type="text" name="no_tlp" id="no_tlp" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection