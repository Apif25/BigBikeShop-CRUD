<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi Motor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        h1 {
            text-align: left;
        }

        h4 {
            text-align: left;
            color: blue;
            margin-top: -10 px;

        }

        .dpt {
            text-align: left;
        }

        .prd {
            text-align: left;
        }

        hr {
            border: 0;
            border-top: 3px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #000;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        tfoot td {
            font-weight: bold;
        }
        .ttd {
            text-align: right;
        }

        .ttd .spasi {
            margin-top: 60px;
        }
    </style>
</head>

<body>

    <h1> Big Bike Shop</h1>
    <h4>Laporan Transaksi Motor</h4>

    <hr>

    <p class="dpt">Departemen : [Nama Departemen] </p>
    <p class="prd">Periode : {{ date('d-m-Y') }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Motor</th>
                <th>Jenis</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
            $totalMasuk = 0;
            $totalKeluar = 0;
            @endphp

            @foreach($transaksi as $i => $t)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $t->created_at->format('d-m-Y') }}</td>
                <td>{{ $t->nama_motor }}</td>
                <td>{{ ucfirst($t->jenis) }}</td>
                <td>{{ $t->qty }}</td>
                <td>{{ number_format($t->harga,0,',','.') }}</td>
                <td>{{ number_format($t->subtotal,0,',','.') }}</td>
            </tr>

            @php
            if($t->jenis == 'masuk') $totalMasuk += $t->subtotal;
            if($t->jenis == 'keluar') $totalKeluar += $t->subtotal;
            @endphp
            @endforeach
        </tbody>

        <tfoot>
            <tr>
                <td colspan="6" style="text-align:right">Total Masuk</td>
                <td>{{ number_format($totalMasuk,0,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:right">Total Keluar</td>
                <td>{{ number_format($totalKeluar,0,',','.') }}</td>
            </tr>
            <tr>
                <td colspan="6" style="text-align:right">Saldo Bersih</td>
                <td>{{ number_format($totalMasuk - $totalKeluar,0,',','.') }}</td>
            </tr>
        </tfoot>
    </table>

    <p>Dicetak pada: {{ date('d-m-Y') }}</p>

    <div class="ttd">
        <p>Jakarta, {{ date('d-m-Y') }}</p>
        <div class="spasi"></div>
        <p><u>Nama Penanda Tangan</u></p>
    </div>


</body>

</html>