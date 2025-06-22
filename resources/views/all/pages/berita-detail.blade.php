@extends('all.layouts.appAll')

@section('content')

<!-- Judul dan Kategori dalam Card -->
<section class="py-5" style="background: #f8f9fa;">
    <div class="container">
        <div class="card shadow-lg border-0 mb-4 p-4 bg-white">

            <!-- Tombol kembali -->
            <div class="mb-4">
                <a href="{{ route('berita') }}" class="btn btn-outline-primary">← Kembali ke Daftar Berita</a>
            </div>

            <!-- Judul dan metadata -->
            <div class="text-center">
                <h1 class="fw-bold display-5 text-uppercase mb-2">{{ $berita->title }}</h1>
                <p class="text-muted mb-2">
                    Ditulis oleh <strong>{{ $berita->author }}</strong> |
                    <span class="badge bg-primary">{{ ucfirst($berita->kategori) }}</span> |
                    {{ \Carbon\Carbon::parse($berita->created_at)->format('d F Y') }}
                </p>
            </div>

            <!-- Gambar berita -->
            <div class="text-center mb-4">
                <img src="{{ Storage::url($berita->img) }}"
                    class="img-fluid rounded shadow-sm mx-auto d-block"
                    style="max-width: 700px;"
                    alt="gambar berita">
            </div>

            <!-- Isi konten -->
            <div class="fs-5 px-4 px-md-5" style="text-align: justify; padding-left: 4rem; padding-right: 4rem;">
                {!! $berita->content !!}
            </div>
        </div>
    </div>
</section>

@endsection