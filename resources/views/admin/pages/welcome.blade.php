@extends('admin.layouts.app')

@section('content')
    <div class="container text-center mt-5">
        <h1 class="display-4">Welcome to Sistem Manajemen Desa Digital</h1>
        <p class="lead">Aplikasi berbasis web untuk mempermudah administrasi desa secara digital dan efisien.</p>
        
        <div class="mt-4">
            <img src="{{ asset('images/desa-welcome.jpg') }}" alt="Desa" class="img-fluid rounded shadow-lg" width="600">
        </div>
        
        <div class="mt-5 text-left">
            <h3>Apa Itu Sistem Manajemen Desa Digital?</h3>
            <p>Sistem Manajemen Desa Digital adalah sebuah aplikasi berbasis web yang dirancang untuk membantu desa dalam pengelolaan administrasi, pelayanan masyarakat, serta penyebaran informasi secara lebih mudah dan transparan.</p>
            
            <h4>Fitur Utama:</h4>
            <ul>
                <li><strong>Manajemen Penduduk:</strong> Pengelolaan data warga secara digital.</li>
                <li><strong>Pelayanan Masyarakat:</strong> Pengajuan layanan seperti KTP, KK, dan surat keterangan.</li>
                <li><strong>Aspirasi & Pengaduan:</strong> Warga dapat menyampaikan keluhan atau masukan.</li>
                <li><strong>Informasi Desa:</strong> Berita dan pengumuman terbaru dari pemerintah desa.</li>
                <li><strong>Inventaris Desa:</strong> Manajemen aset desa yang lebih terstruktur.</li>
            </ul>
        </div>
    </div>
@endsection
