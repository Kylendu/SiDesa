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

                            <!-- Tombol Pinjam -->
                            <button class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#pinjamModal{{ $item->id }}">
                                Pinjam
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Modal Pinjam -->
                <div class="modal fade" id="pinjamModal{{ $item->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="barang_id" value="{{ $item->id }}">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Form Peminjaman</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <input name="nik" class="form-control mb-2" placeholder="NIK" required>
                                    <input name="nama" class="form-control mb-2" placeholder="Nama" required>
                                    <input name="alamat" class="form-control mb-2" placeholder="Alamat" required>
                                    <input name="tujuan" class="form-control mb-2" placeholder="Tujuan Peminjaman" required>
                                    <input name="jumlah" type="number" min="1" class="form-control mb-2" placeholder="Jumlah" required>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-success">Kirim Permintaan</button>
                                </div>
                            </div>
                        </form>
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