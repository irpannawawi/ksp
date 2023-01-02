<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>
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
        text-align: left;
    }
  
    .table td {
        padding: 3px 3px;
    }
  
    .text-center {
        text-align: center;
    }
</style>

</head>
<body class="a4" >
    <section class="sheet padding-10mm">
        <h1>Kwitansi</h1>
        <table class="table">
            <tr>
                <td>No</td>
                <td>{{$no_reg}}</td>
            </tr>
            <tr>
                <td>Telah diterima dari</td>
                <td>{{$nama_nasabah}}</td>
            </tr>
            <tr>
                <td>Uang Sejumlah</td>
                <td>{{ucwords($uang_terbilang)}} Rupiah</td>
            </tr>
            <tr>
                <td>Untuk Pembayaran</td>
                <td>{{$keterangan}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right; padding-bottom: 80px;">Karawang, {{substr($tanggal, 0,10)}}</td>
            </tr>
            <tr>
                <th colspan="2">Rp. {{number_format($uang, 0, '.', ',')}},-</th>
            </tr>
        </table>
    </section>
</body>
</html>
