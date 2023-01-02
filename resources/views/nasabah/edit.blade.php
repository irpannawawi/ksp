@extends('templates.layout')
@section('title', 'Nasabah')
@section('sidebar-nasabah', 'active')
@section('contents')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Edit Data Nasabah</h3>
        </div>
        <div class="card-body">
            @if (Session::has('msg'))
            <div class="alert">
                <p>{{session('msg')}}</p>
            </div>
            @endif
            <form method="POST" action="{{url('edit_nasabah')}}">
                <div class="row">
                    @csrf
                    <div class="col-6">
                        <div class="form-group">
                            <label for="no_nasabah">NIK</label>
                            <input type="text" value="{{$nasabah->no_nasabah}}" max="16" id="no_nasabah" class="form-control" autocomplete="off"  disabled>
                            <input type="text" value="{{$nasabah->no_nasabah}}" name="no_nasabah"  hidden>
                        </div>
                        <div class="form-group">
                            <label for="nama_nasabah">Nama</label>
                            <input type="text" value="{{$nasabah->nama_nasabah}}" name="nama_nasabah" id="nama_nasabah" class="form-control" autocomplete="off" required>
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select  name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                                <option {{$nasabah->jenis_kelamin=='Laki-laki'?'selected':''}} value="Laki-laki">Laki-laki</option>
                                <option {{$nasabah->jenis_kelamin=='Perempuan'?'selected':''}} value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat_nasabah" id="alamat" class="form-control" required >{{$nasabah->alamat_nasabah}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="no_tlp">Nomor Tlp/Hp</label>
                            <input type="text" value="{{$nasabah->no_tlp}}" name="no_tlp" id="no_tlp" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status Kepegawaian</label>
                            <input type="text" value="{{$nasabah->status_nasabah}}" name="status" id="status" class="form-control" autocomplete="off" >
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="submit" name="submit" class="form-control btn btn-warning">
                            <a href="{{url('nasabah')}}" class="btn btn-danger form-control mt-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection