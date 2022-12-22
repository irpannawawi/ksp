@extends('templates.layout')
@section('title', 'Pinjaman')
@section('sidebar-pinjaman', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-3 mx-auto">
        Masukan NIK Nasabah terdaftar
        <form method="POST" action="{{url('tambah_pinjaman_2')}}">
            @csrf
            <div class="form-group">
                <label for="no_nasabah">NIK</label>
                <input type="text" name="no_nasabah" max="16" id="no_nasabah" class="form-control" autocomplete="off" required>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection