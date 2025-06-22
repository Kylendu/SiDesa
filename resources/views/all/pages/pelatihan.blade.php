@extends('all.layouts.appAll')

@section('content')
<section id="pelatihan" class="py-5 bg-light">
    <div class="container">
        <!-- Judul Utama -->
        <h1 class="text-center fw-bold display-5 mb-2">Pengumuman Pelatihan Desa</h1>
        <h3 class="text-center fw-semibold text-muted fs-5 mb-4">
            Tingkatkan keterampilan dan pengetahuan melalui program pelatihan berkualitas
            untuk membangun desa yang lebih maju.
        </h3>

        <!-- Form Pencarian -->
        <form action="{{ route('pelatihan.search') }}" method="GET" class="mb-4">
            <div class="input-group shadow-sm">
                <input type="text" name="search" class="form-control" placeholder="Cari pelatihan..."
                    value="{{ request()->get('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </form>

        <!-- Info Jumlah -->
        <div class="mb-4">
    <h1 class="fw-bold text-primary fs-2">Program Pelatihan Tersedia</h1>
    <p class="text-muted fs-5">
        {{ $pelatihan->count() }} program pelatihan ditemukan 
        @if(request()->get('search'))
            <span class="fw-semibold text-dark">dalam kategori {{ request()->get('search') }}</span>
        @endif
    </p>
</div>


        <!-- Pelatihan Cards -->
        <div class="row g-4">
            @forelse ($pelatihan as $item)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow rounded-3">
                    <a href="{{ route('pelatihan.show', $item->id) }}" class="text-decoration-none text-dark">
                        <img src="{{ Storage::url($item['img']) }}" class="card-img-top rounded-top"
                            alt="{{ $item['title'] }}" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item['title'] }}</h5>
                            <p class="card-text" style="height: 80px; overflow: hidden;">
                                {{ Str::limit(strip_tags($item['description']), 100) }}
                            </p>
                            <p class="text-muted mb-1">📍 Lokasi: {{ $item['location'] }}</p>
                            <p class="text-muted"><i class="bi bi-calendar-event"></i>
                                {{ $item['created_at']->format('d F Y') }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-0 text-end mb-3">
                            <a href="{{ route('pelatihan.show', $item->id) }}" class="btn btn-primary w-100 rounded-pill fw-semibold">
                                <i class="bi bi-box-arrow-up-right me-1"></i> Daftar / Detail
                            </a>
                        </div>
                    </a>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <div class="alert alert-warning">
                    Tidak ada pelatihan yang tersedia saat ini.
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
