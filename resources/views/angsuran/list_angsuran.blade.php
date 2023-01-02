@extends('templates.layout')
@section('title', 'Angsuran')
@section('sidebar-angsuran', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
        <div class="alert alert-primary">
            <p>{{session('msg')}}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-header">
            <h3>Data Angsuran</h3>
        </div>
        <div class="card-body">
            <div class="col-12 table-responsive">
                <table class="table table-sm table-hover datatable">
                    <thead>
                        <tr class="text-center bg-lightgrey">
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Tanggal Pencairan</th>
                            <th nowrap>Pinjaman</th>
                            <th>Angsuran</th>
                            <th>Nominal Cicilan</th>
                            <th nowrap>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    @php 
                    $n=0;
                    @endphp
                    <tbody>
                        @foreach ($pinjaman as $data)
                        <tr>
                            <td>{{++$n}}</td>
                            <td>{{$data->no_nasabah}}</td>
                            <td>{{$data->nasabah->nama_nasabah}}</td>
                            <td>{{$data->tgl_pengajuan}}</td>
                            <td>{{$data->pencairan->tanggal_pencairan}}</td>
                            <td>Rp.{{number_format($data->besar_pinjaman, 0, '.',',')}},-</td>
                            <td>{{$data->pencairan->angsuran->count().'/'.$data->lama_angsuran}}</td>
                            <td>Rp.{{number_format($data->jumlah_cicilan, 0, '.', ',')}}</td>
                            <td>Rp.{{number_format($data->total_pinjaman, 0, '.',',')}},-</td>
                            <td nowrap>
                                <div class="btn-group">
                                    <a class="btn btn-primary btn-sm"  href="{{url('riwayat_angsuran/'.$data->pencairan->no_pencairan)}}">Riwayat</a>
                                    @if ($data->pencairan->angsuran->count() < $data->lama_angsuran)
                                    <a class="btn btn-success btn-sm"  href="{{url('bayar_angsuran/'.$data->pencairan->no_pencairan)}}">Bayar angsuran</a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection