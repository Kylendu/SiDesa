@extends('all.layouts.appAll')

@section('content')
    <section id="inventory" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-2 fs-2">Daftar Inventaris Desa</h2>
            <p class="text-center text-muted mb-5 fs-5">Berikut adalah daftar inventaris barang milik desa yang tercatat.</p>

            <div class="row g-4">
                @forelse ($inventory as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            @if ($item->img)
                                <img src="{{ Storage::url($item->img) }}" class="card-img-top" alt="{{ $item->nama_barang }}"
                                    style="height: 200px; object-fit: cover;">
                            @else
                                <img src="{{ asset('images/no-image.png') }}" class="card-img-top" alt="Tidak ada gambar"
                                    style="height: 200px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-truncate">{{ $item->nama_barang }}</h5>
                                <p class="text-muted mb-2">Jumlah: <strong>{{ $item->jumlah }}</strong></p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-warning">Belum ada data inventaris tersedia.</div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
