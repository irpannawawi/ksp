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
            <div class="alert alert-primary">
                <p class="m-2">Nasabah ditemukan, silahkan masukan rincian pinjaman</p>
            </div>
            <div class="col-12 mx-auto">
                <form method="POST" action="{{url('tambah_pinjaman_3')}}">
                    @csrf
                    <table class="table" >
                        <tr>
                            <th>Nama</th>
                            <td>{{$nasabah->nama_nasabah}}</td>
                        </tr>
                        <tr>
                            <th>NIK</th>
                            <td>{{$nasabah->no_nasabah}}</td>
                        </tr>
                        <tr>
                            <th>Alamat</th>
                            <td>{{$nasabah->alamat_nasabah}}</td>
                        </tr>
                        <tr>
                            <th>Status Kepegawaian</th>
                            <td>{{$nasabah->status_nasabah}}</td>
                        </tr>
                        <tr>
                            <th>Besar Pinjaman (Rp.)</th>
                            <td>
                                <input type="number" class="form-control" name="besar_pinjaman">
                            </td>
                        </tr>
                        <tr>
                            <th>Bunga Pinjaman(%)</th>
                            <td>
                                <input type="text" class="form-control" name="bunga_pinjaman" placeholder="%">
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Angsuran</th>
                            <td>
                                <div class="input-group">
                                    <input type="number" class="form-control" aria-describedby="descBulan" name="lama_angsuran">
                                    <div class="input-group-append">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <th>Cicilan (Rp.)</th>
                            <td>
                                <div class="input-group">
                                    <input type="number" class="form-control" aria-describedby="descBulan" name="jumlah_cicilan">
                                </div>
                            </td>
                        </tr>
        
                        <tr>
                            <th>Total Pinjaman (Rp.)</th>
                            <td>
                                <input type="number" class="form-control" name="total_pinjaman">
                            </td>
                        </tr>
        
                    </table>
                    <div class="form-group">
                        <input type="text" value="{{$nasabah->no_nasabah}}" name="no_nasabah" hidden>
                        <input type="text" value="{{Auth::user()->id_petugas}}" name="id_petugas" hidden>
                    </div>
        
        
                    <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection