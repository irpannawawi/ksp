@extends('templates.layout')
@section('title', 'Simpanan')
@section('sidebar-simpanan', 'active')
@section('contents')
<div class="container-fluid">
    <div class="col-9 mx-auto">
        <form method="GET">
            <table class="table">        
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
        <form method="POST" action="{{url('act_tambah_simpanan')}}">
            @csrf
            @if($nasabah!=null)
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
                            <th>Status Kepegawaian</th>
                        </tr>
                        <tr>
                            <td>{{$nasabah->nama_nasabah}}</td>
                            <td>{{$nasabah->no_nasabah}}</td>
                            <td>{{$nasabah->alamat_nasabah}}</td>
                            <td>{{$nasabah->status_nasabah}}</td>
                        </tr>
                    </table>
                    <!-- ./DATA NASABAH -->
                </tr>
            </table>
            <input type="text" name="no_nasabah" value="{{$nasabah->no_nasabah}}" hidden>
            @endif

    <table class="table">        
        <tr>
            <th>Besar Simpanan</th>
            <td>
                <input type="number" name="besar_simpanan" class="form-control"  required>
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
@endsection