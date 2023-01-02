@extends('templates.layout')
@section('title', 'Penarikan')
@section('sidebar-penarikan', 'active')
@section('contents')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Data Penarikan</h3>
        </div>
        <div class="card-body">
            <div class="col-md-9 mx-auto">
                <form method="GET">
                    <table class="table table-borderless">        
                        <tr>
                            <th>NIK</th>
                            <td>
                                <input type="number" name="no_nasabah" class="form-control" value="{{$nasabah?$nasabah->no_nasabah:''}}"  required>
                            </td>
                        </tr>            
                        <tr>
                            <td colspan="2">
                                <input type="submit" value="Cek NIK" class="form-control btn btn-primary"  required>
                            </td>
                        </tr>     
                    </table>
                </form>
                <form method="POST" action="{{url('act_tambah_transaksi')}}">
                    @csrf
                    @if($nasabah)
                    <h4>Nasabah ditemukan</h4>
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
                                    <th>Saldo</th>
                                </tr>
                                <tr>
                                    <td>{{$nasabah->nama_nasabah}}</td>
                                    <td>{{$nasabah->no_nasabah}}</td>
                                    <td>{{$nasabah->alamat_nasabah}}</td>
                                    <td>Rp.{{number_format($nasabah->saldo,0,'.',',')}},-</td>
                                </tr>
                            </table>
                            <!-- ./DATA NASABAH -->
                        </tr>
                    </table>
                    <input type="text" name="no_nasabah" value="{{$nasabah->no_nasabah}}" hidden>
                    @endif
        
                    <table class="table">        
                        <tr>
                            <th>Besar transaksi</th>
                            <td>
                                <input type="number" max="{{$nasabah?$nasabah->saldo:0}}" name="besar_transaksi" class="form-control"  required>
                            </td>
                        </tr>  
                        <tr class="bg-dark text-white">
                            <th colspan="2">JURNAL</th>
                        </tr>
                        <tr>
                            <th>Debet</th>
                            <td>
                                <select name="akun_debet" id="akun_debet" class="form-control">
                                    <option value="" selected disabled>--Pilih Akun Debet--</option>
                                    @foreach ($akun as $ak)
                                        <option value="{{$ak->kode_akun}}">{{$ak->kode_akun.' - '.$ak->nama_akun}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr> 
                        <tr>
                            <th>Kredit</th>
                            <td>
                                <select name="akun_kredit" id="akun_kredit" class="form-control">
                                    <option value="" selected disabled>--Pilih Akun Kredit--</option>
                                    @foreach ($akun as $ak)
                                        <option value="{{$ak->kode_akun}}">{{$ak->kode_akun.' - '.$ak->nama_akun}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>  
                    </table>
        
                    <div class="form-group">
                        <input type="submit"
                        @if($nasabah == null)
                           disabled 
                        @endif 
                         name="submit" class="form-control btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection