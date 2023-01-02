@extends('templates.layout')
@section('title', 'Perkiraan')
@section('sidebar-perkiraan', 'active')
@section('contents')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Perkiraan</h3>
        </div>
        <div class="card-body">
            <form method="POST" action="{{url('act_tambah_perkiraan')}}">
                @csrf
                <div class="row">
                    <div class="col-md-5 mx-auto">
                        @if (Session::has('msg'))
                            <div class="alert alert-primary text-center p-0">
                                <p class="text-danger m-0 p-0">{{session('msg')}}</p>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="kode_akun">Kode Akun</label>
                            <input type="text" name="kode_akun"  id="kode_akun" class="form-control" autocomplete="off" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="nama_akun">Nama Akun</label>
                            <input type="text" name="nama_akun" id="nama_akun" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_akun">Jenis Akun</label>
                            <input type="text" name="jenis_akun" id="jenis_akun" class="form-control" autocomplete="off" required>
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