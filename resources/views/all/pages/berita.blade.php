@extends('all.layouts.appAll')

@section('content')
    @if ($berita->isEmpty())
        <section class="berita section dark-background" id="berita">
            <div class="container">
                <h2 class="mb-4  fw-bold">Berita Tidak Tersedia</h2>
                <h1 class=" text-center fw-bold">Saat ini belum ada berita yang tersedia. Silakan kunjungi kembali nanti.</h1>
            </div>
        </section>
    @else
        <section id="berita" class="berita section bg-ligh">
            <div class="container">
                <h2 class="mb-4  fw-bold fs-3">Berita Terkini</h2>
                <div class="row">
                    @foreach ($berita as $item)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-0 shadow rounded-3">
                                <img src="{{ Storage::url($item['img']) }}" class="card-img-top" alt="gambar berita">
                                <div class="card-body">
                                    
                                    <span class="badge bg-secondary mb-2 text-capitalize">{{ $item['kategori'] }}</span>
                                    <h5 class="card-title">    <a href="{{ route('berita.show', $item->id) }}" class="text-decoration-none text-dark">
        {{ $item['title'] }}
    </h5>
    <p class="card-text">{{ Str::limit($item['content'], 100) }}</p>
</div>
                                <div class="card-footer bg-transparent border-0">
                                    <small class="text-muted">Ditulis oleh {{ $item['author'] }}</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
@endsection
