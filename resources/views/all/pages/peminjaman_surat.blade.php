<!DOCTYPE html>
<html>
<head>
    <title>Surat Peminjaman</title>
    <style>
        body { font-family: sans-serif; }
        .ttd { margin-top: 50px; }
    </style>
</head>
<body>
    <h2>Surat Peminjaman Barang Desa</h2>
    <p>NIK: {{ $peminjaman->nik }}</p>
    <p>Nama: {{ $peminjaman->nama }}</p>
    <p>Alamat: {{ $peminjaman->alamat }}</p>
    <p>Tujuan: {{ $peminjaman->tujuan }}</p>
    <p>Jumlah: {{ $peminjaman->jumlah }} {{ $peminjaman->barang->nama }}</p>

    <div class="ttd" style="text-align: right;">
        <p>Kepala Desa</p>
        <br><br>
        <p>( ________________ )</p>
    </div>
</body>
</html>
