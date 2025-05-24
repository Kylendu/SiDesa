@extends('all.layouts.appAll')

@section('content')
    <section id="berita" class="berita section dark-background">
        <div class="container">
            <h2 class="mb-4 text-white fw-bold">Berita Terkini</h2>
            <div class="row">
                @foreach ($berita as $item)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <img src="{{ $item['img'] }}" class="card-img-top" alt="gambar berita">
                            <div class="card-body">
                                <span class="badge bg-secondary mb-2 text-capitalize">{{ $item['kategori'] }}</span>
                                <h5 class="card-title">{{ $item['title'] }}</h5>
                                <p class="card-text">{{ Str::limit($item['content'], 100) }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-0">
                                <small class="text-muted">Ditulis oleh {{ $item['author'] }}</small>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
