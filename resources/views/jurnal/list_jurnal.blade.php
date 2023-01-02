@extends('templates.layout')
@section('title', 'Perkiraan')
@section('sidebar-perkiraan', 'active')
@section('contents')
<div class="container-fluid">
    @if (Session::has('msg'))
    <div class="alert alert-primary">
        <p>{{session('msg')}}</p>
    </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Data Jurnal Umum</h3>
            <a href="#" target="_blank" class="btn btn-sm btn-success float-right"><i class="fa fa-print"></i></a>
        </div>
        <div class="card-body">
            <form method="GET">
                <div class="col-md-7 mb-3 row float-right">
                    <div class="form-group col-5">
                        Pilih Bulan
                        <select name="bulan" id="" class="form-control">
                            @for ($n=1; $n<=12; $n++)
                            <option 
                            @if (date('d') == $n OR $n == $bulan)
                                selected
                            @endif
                            value="{{strlen($n)<2?'0'.$n:$n}}">{{strlen($n)<2?'0'.$n:$n}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-5">
                        Pilih Tahun
                        <select name="tahun" id="" class="form-control">
                            @for ($n=2020; $n<=2028; $n++)
                            <option 
                            @if (date('Y') == $n OR $n == $tahun)
                                selected
                            @endif
                            value="{{$n}}">{{$n}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group col-2 mt-4">
                        <input type="submit" name="tanggal" class="btn btn-primary" value="cari"></input>
                    </div>
                </div>
            </form>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Keterangan</th>
                        <th>Reff</th>
                        <th>Debet</th>
                        <th>Kredit</th>
                    </tr>
                </thead>
                @php 
                $n=0;
                @endphp
                <tbody class="font-weight-lighter">
                    @foreach ($jurnal as $data)
                    <tr>
                        <td>{{$data->tgl_jurnal}}</td>
                        <td>{{$data->keterangan}}</td>
                        <td></td>
                        <td>{{$data->debet}}</td>
                        <td>{{$data->kredit}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection