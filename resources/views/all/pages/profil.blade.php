@extends('all.layouts.appAll')

@section('content')
<div class="container py-5">
    <h3 class="mb-4">Profil & Riwayat Peminjaman</h3>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Barang</th>
                <th>Jumlah</th>
                <th>Tujuan</th>
                <th>Status</th>
                <th>Surat</th>
            </tr>
        </thead>
        <tbody>
            @forelse($peminjaman as $pinjam)
            <tr>
                <td>{{ $pinjam->inventory->nama_barang }}</td>
                <td>{{ $pinjam->jumlah }}</td>
                <td>{{ $pinjam->tujuan }}</td>
                <td>{{ ucfirst($pinjam->status) }}</td>
                <td>
                    @if($pinjam->status == 'disetujui')
                        <a href="{{ route('peminjaman.download', $pinjam->id) }}" class="btn btn-sm btn-primary">
                            Download Surat
                        </a>
                    @else
                        -
                    @endif
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada data peminjaman.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
