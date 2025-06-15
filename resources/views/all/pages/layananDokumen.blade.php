@extends('all.layouts.appAll')

@section('content')
    <section id="dokumen" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-3">Layanan Dokumen</h2>
            <p class="text-center mb-4 text-muted">
                Akses dan kelola dokumen layanan desa dengan mudah dan aman untuk keperluan administrasi masyarakat.
            </p>

            <!-- Form Pencarian -->
            <form action="{{ route('dokumen.search') }}" method="GET" class="mb-4">
                <div class="input-group shadow-sm">
                    <input type="text" name="search" class="form-control" placeholder="Cari dokumen..."
                        value="{{ request()->get('search') }}">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search me-1"></i>Cari</button>
                </div>
            </form>

            <!-- Info Jumlah -->
            <div class="mb-4">
                <h5 class="fw-semibold">Dokumen Tersedia</h5>
                <p class="text-muted">{{ $documents->count() }} dokumen ditemukan
                    @if (request()->get('search'))
                        <span class="fw-semibold">untuk kategori "{{ request()->get('search') }}"</span>
                    @endif
                </p>
            </div>

            <div class="row g-4">
                @forelse ($documents as $item)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-file-earmark-text-fill text-primary fs-1 me-3"></i>
                                    <div>
                                        <h5 class="fw-bold mb-1 text-truncate">{{ $item['surat'] }}</h5>
                                        <p class="text-muted mb-0"><i
                                                class="bi bi-calendar-event me-1"></i>{{ $item['created_at']->format('d F Y') }}
                                        </p>
                                    </div>
                                </div>
                                <p class="text-muted small" style="height: 60px; overflow: hidden;">
                                    {{ Str::limit(strip_tags($item['keterangan']), 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-0 d-flex justify-content-between">
                                <a href="{{ route('dokumen.download', $item['id']) }}"
                                    class="btn btn-outline-success btn-sm rounded-pill">
                                    <i class="bi bi-download me-1"></i>Unduh
                                </a>
                                <a href="{{ Storage::url($item['file_path']) }}" target="_blank"
                                    class="btn btn-outline-primary btn-sm rounded-pill">
                                    <i class="bi bi-eye me-1"></i>Lihat
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <div class="alert alert-warning">
                            Tidak ada dokumen yang tersedia saat ini.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
