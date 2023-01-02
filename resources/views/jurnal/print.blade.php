<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan {{$bulan.' '.$tahun}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
<style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
  
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
    }
  
    .text-center {
        text-align: center;
    }
</style>

</head>
<body class="a4" onload="window.print()">
    <section class="sheet padding-10mm">
        <h2 align="center">JURNAL UMUM</h2>
        <h4>Bulan : {{$bulan}} <br> Tahun : {{$tahun}}</h4>
        <table class="table">
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
                    <td style="text-align:right">Rp.{{number_format($data->debet, 0, '.', ',')}},-</td>
                    <td style="text-align:right">Rp.{{number_format($data->kredit, 0, '.', ',')}},-</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>
</html>
