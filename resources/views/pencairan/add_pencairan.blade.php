@extends('templates.layout')
@section('title', 'Pencairan')
@section('sidebar-pencairan', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-9 mx-auto">
        <form method="POST" action="{{url('act_pencairan')}}">
            @csrf
            <table class="table">
                <tr class="bg-dark text-white">
                    <th colspan="4">Detail Nasabah</th>
                </tr>
                <tr>
                    <!-- DATA NASABAH -->
                    <table class="table">
                        <tr>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Alamat</th>
                            <th>Status Kepegawaian</th>
                        </tr>
                        <tr>
                            <td>{{$pinjaman->nasabah->nama_nasabah}}</td>
                            <td>{{$pinjaman->nasabah->no_nasabah}}</td>
                            <td>{{$pinjaman->nasabah->alamat_nasabah}}</td>
                            <td>{{$pinjaman->nasabah->status_nasabah}}</td>
                        </tr>
                    </table>
                    <!-- ./DATA NASABAH -->
                </tr>
            </table>
            <table class="table">
                <tr class="bg-dark text-white">
                    <th colspan="4">Detail Nasabah</th>
                </tr>
                <tr>
                    <!-- DATA PINJAMAN -->
                    <table class="table">
                        <tr>
                            <th>Tanggal Pengajuan</th>
                            <th>Besar Pinjaman (Rp.)</th>
                            <th>Bunga (%)</th>
                        </tr>
                        <tr>
                            <td>{{$pinjaman->tgl_pengajuan}}</td>
                            <td>Rp. {{number_format($pinjaman->besar_pinjaman, 0, '.',',')}},-</td>
                            <td>{{$pinjaman->bunga_pinjaman}}%</td>
                        </tr>
                    </table>
                    <!-- ./DATA PINJAMAN -->
                </tr>
                <tr>
                    <th>Besar Pencairan (Rp.)</th>
                    <td>
                        <input type="number" class="form-control" name="besar_pencairan">
                    </td>
                </tr>
                <tr>
                    <th>Biaya Adm (Rp.)</th>
                    <td>
                        <input type="number" class="form-control" name="biaya_adm">
                    </td>
                </tr>
            </table>
            <div class="form-group">
                <input type="text" value="{{$pinjaman->no_pinjaman}}" name="no_pinjaman" hidden>
                <input type="text" value="{{Auth::user()->id_petugas}}" name="id_petugas" hidden>
            </div>


            <div class="form-group">
                <input type="submit" name="submit" class="form-control btn btn-primary">
            </div>
        </form>
    </div>
</div>
@endsection