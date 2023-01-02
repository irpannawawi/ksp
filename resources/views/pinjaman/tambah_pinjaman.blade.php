@extends('templates.layout')
@section('title', 'Pinjaman')
@section('sidebar-pinjaman', 'active')
@section('contents')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Pinjaman</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('tambah_pinjaman_2')}}">
                @csrf
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        <div class="alert alert-primary text-center p-0">
                            @if (Session::has('msg'))
                                <p class="text-danger m-0 p-0">{{session('msg')}}</p>
                            @endif
                            <p class="m-0 p-0">Masukan NIK Nasabah terdaftar</p>
                        </div>
                        <div class="form-group">
                            <label for="no_nasabah">NIK</label>
                            <input type="text" name="no_nasabah" max="16" id="no_nasabah" class="form-control" autocomplete="off" required>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-primary">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection