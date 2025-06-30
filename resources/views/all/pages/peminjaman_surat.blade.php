<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Peminjaman Barang Desa</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            font-size: 12pt;
            line-height: 1.5;
        }

        .kop {
            text-align: center;
            margin-bottom: 20px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }

        .kop h1 {
            margin: 0;
            font-size: 16pt;
            font-weight: bold;
        }

        .kop p {
            margin: 0;
            font-size: 12pt;
        }

        .isi {
            margin-top: 20px;
        }

        .ttd {
            text-align: right;
            margin-top: 50px;
        }

        .ttd img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>

    <!-- Kop Surat -->
    <div class="kop">
        <h1>PEMERINTAH DESA MAJU JAYA</h1>
        <p>Jl. Raya Desa No. 123, Kecamatan Makmur, Kabupaten Sejahtera</p>
    </div>

    <!-- Isi Surat -->
    <div class="isi">
        <h2 style="text-align: center; text-decoration: underline;">SURAT PEMINJAMAN BARANG</h2>
        <p style="text-align: center;">Nomor: {{ 'PMJ/' . str_pad($peminjaman->id, 3, '0', STR_PAD_LEFT) }}</p>

        <p>Yang bertanda tangan di bawah ini:</p>
        <table style="margin-left: 20px;">
            <tr>
                <td style="width: 150px;">NIK</td>
                <td>: {{ $peminjaman->nik }}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{ $peminjaman->nama }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $peminjaman->alamat }}</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>: {{ $peminjaman->tujuan }}</td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>: {{ $peminjaman->inventory->nama_barang ?? '-' }}</td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td>: {{ $peminjaman->jumlah }}</td>
            </tr>
        </table>

        <p>Dengan ini meminjam barang milik Desa Maju Jaya sesuai dengan data di atas dan akan mengembalikannya dalam keadaan baik dan lengkap.</p>
    </div>

    <!-- Tanda Tangan -->
    <div class="ttd">
        <p>Desa Maju Jaya, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
        <p>Kepala Desa Maju Jaya</p>
        <br>

@php
    $path = public_path('ttd/ttds.png');
    $base64 = null;
    if (file_exists($path)) {
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
@endphp

@if($base64)
    <img src="{{ $base64 }}" alt="Tanda Tangan Kepala Desa">
@else
    <p style="color:red">[Gambar TTD tidak ditemukan]</p>
@endif


        <p style="margin-top: -5px;">( Budi Santoso )</p>
    </div>

</body>
</html>
