@extends('all.layouts.appAll')

@section('content')
    <section id="pelatihan" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">Pengumuman Pelatihan Desa</h2>
            <p class="text-center mb-4 text-muted">
                Tingkatkan keterampilan dan pengetahuan melalui program pelatihan berkualitas
                untuk membangun desa yang lebih maju.
            </p>

            <!-- Form Pencarian -->
            <form action="{{ route('pelatihan.search') }}" method="GET" class="mb-4">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control" placeholder="Cari pelatihan..."
                        value="{{ request()->get('search') }}">
                    <button class="btn btn-primary" type="submit">Cari</button>
                </div>
            </form>

            <!-- Info Jumlah -->
            <div class="mb-3">
                <h5 class="fw-semibold">Program Pelatihan Tersedia</h5>
                <p class="text-muted">{{ $pelatihan->count() }} program pelatihan ditemukan @if(request()->get('search'))
                    <span class="fw-semibold ">dalam kategori {{ request()->get('search') }}</span>
                    
                @endif</p>
            </div>

            <!-- Pelatihan Cards -->
            <div class="row g-4">
                @forelse ($pelatihan as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow rounded-3">
                            <img src="{{ Storage::url($item['img']) ?? $item['img'] }}" class="card-img-top rounded-top"
                                alt="{{ $item['title'] }}" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <p class="card-text" style="height: 80px; overflow: hidden;">
                                    {{ Str::limit(strip_tags($item['description']), 100) }}</p>
                                <p class="text-muted mb-1">📍 Lokasi: {{ $item['location'] }}</p>
                                <p class="text-muted"><i class="bi bi-calendar-event"></i>
                                    {{ $item['created_at']->format('d F Y') }}</p>
                            </div>
                            <div class="card-footer bg-white border-0 text-end mb-3">
                                <a href="{{ $item['link'] }}" target="_blank" class="btn btn-primary w-100 rounded-pill fw-semibold">
                                    <i class="bi bi-box-arrow-up-right me-1"></i> Daftar / Detail
                                </a>
                            </div>
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
