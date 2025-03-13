@extends('admin.layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <a href="/resident/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-plus fa-sm text-white-50"></i> Tambah</a>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-responsive table-bordered table-hoverd">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>Tempat, Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>Agama</th>
                                <th>Status Perkawinan</th>
                                <th>Pekerjaan</th>
                                <th>Telepon</th>
                                <th>Status Penduduk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($residents) == 0)
                                <tr>
                                    <td colspan="11" class="text-center">Data Kosong</td>
                                </tr>
                            @else
                                @foreach ($residents as $item)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>
                                        <td> {{ $item->nik }} </td>
                                        <td> {{ $item->name }} </td>
                                        <td> {{ $item->gender }} </td>
                                        <td> {{ $item->birth_place }}, {{ $item->birth_date }} </td>
                                        <td> {{ $item->address }} </td>
                                        <td> {{ $item->religion }} </td>
                                        <td> {{ $item->marital_status }} </td>
                                        <td> {{ $item->accupation }} </td>
                                        <td> {{ $item->phone }} </td>
                                        <td> {{ $item->status }} </td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="/resident/{{ $item->id }} " class="d-inline-block mr-2 btn btn-sm btn-warning">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#confirmationDelete-{{ $item->id }}">
                                                    <i class="fas fa-eraser"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <!-- Modal -->
                                    @include('admin.pages.resident.confirmation-delete')
                                    
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </dib>
            </div>
        </div>
    </div>
@endsection