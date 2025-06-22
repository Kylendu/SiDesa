@extends('all.layouts.appAll')

@section('content')

<!-- Section Detail Pelatihan -->
<section class="py-5" style="background-color: #f8f9fa;">
    <div class="container">
        <div class="card shadow-lg border-0 mb-4 p-4 bg-white">

            <!-- Tombol Kembali -->
            <div class="mb-3">
                <a href="{{ route('pelatihan') }}" class="btn btn-outline-primary">
                    ← Kembali ke Daftar Pelatihan
                </a>
            </div>

            <!-- Judul dan Meta -->
            <div class="text-center mb-4">
                <h1 class="fw-bold display-5 text-uppercase">{{ $pelatihan->title }}</h1>
                <p class="text-muted">
                    Dibuat pada
                    📅 <strong>Tanggal:</strong> {{ $pelatihan->created_at->format('d F Y') }}
                </p>
            </div>

            <!-- Gambar -->
            @if ($pelatihan->img)
            <div class="text-center mb-4">
                <img src="{{ Storage::url($pelatihan->img) }}"
                    class="img-fluid rounded shadow-sm mx-auto d-block"
                    style="max-width: 500px;"
                    alt="gambar pelatihan">
            </div>
            @endif


            <!-- Deskripsi -->
            <div class="fs-5 px-4 px-md-5" style="text-align: justify;">
                {!! $pelatihan->description !!}
            </div>

            <!-- Tombol Pendaftaran jika ada -->
            @if ($pelatihan->link)
            <div class="text-center ">
                <a href="{{ $pelatihan->link }}" target="_blank" class="btn btn-primary btn-lg rounded-pill">
                    Daftar Pelatihan Sekarang
                </a>
            </div>
            @endif

        </div>
    </div>
</section>

@endsection