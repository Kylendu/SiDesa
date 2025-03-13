@extends('admin.layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Penduduk</h1>
    </div>

    <div class="row">
        <div class="col">
            <form action="/resident" method="post">
                @csrf
                @method('post')
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="nik">NIK</label>
                            <input type="number" name="nik" inputmode="numeric"
                                class="form-control @error('nik') is-invalid @enderror" id="nik"
                                value="{{ old('nik') }}">
                            @error('nik')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="name" value="{{ old('name') }}">
                            @error('name')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select name="gender" id="gender" class="form-control">
                                @foreach ( [
                                    (object) [
                                        'label' => 'Laki-laki',
                                        'value' => 'male'
                                    ],
                                    (object) [
                                        'label' => 'Perempuan',
                                        'value' => 'female'
                                    ]
                                ] as $gender )
                                    <option value="{{ $gender->value }}" @selected(old( 'gender' ) == $gender->value)>{{ $gender->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_date">Tanggal Lahir</label>
                            <input type="date" name="birth_date"
                                class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" value="{{ old('birth_date') }}">
                            @error('record_date')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="birth_place">Tempat Lahir</label>
                            <input type="text" name="birth_place"
                                class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" value="{{ old('birth_place') }}">
                            @error('birth_place')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="address">Alamat</label>
                            <textarea name="address" cols="30" rows="5" id="address"
                                class="form-control @error('address') is-invalid @enderror" velue="{{ old('address') }}"></textarea>
                            @error('address')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="religion">Agama</label>
                            <input type="text" name="religion" class="form-control" id="religion" value="{{ old('religion') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="marital_status">Status Perkawinan</label>
                            <select name="marital_status" id="marital_status" class="form-control">
                                @foreach ( [
                                    (object)[
                                        'label' => 'Belum Menikah',
                                        'value' => 'single'
                                    ],
                                    (object)[
                                        'label' => 'Sudah Menikah',
                                        'value' => 'married'
                                    ],
                                    (object)[
                                        'label' => 'Cerai',
                                        'value' => 'disdivorced'
                                    ],
                                    (object)[
                                        'label' => 'Janda/Duda',
                                        'value' => 'widowed'
                                    ]
                                ] as $marital_status )
                                    <option value="{{ $marital_status->value }}" @selected(old( 'marital_status' ) == $marital_status->value)>{{ $marital_status->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="accupation">Pekerjaan</label>
                            <input type="text" name="accupation" class="form-control @error('accupation') is-invalid 
                            @enderror" id="accupation" value="{{ old('accupation') }}">
                            @error('accupation')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="phone">Telepon</label>
                            <input type="text" inputmode="numeric" name="phone" class="form-control @error('phone') is-invalid
                            @enderror" id="phone" value="{{ old('phone') }}">
                            @error('phone')
                                <span class="invalid-feedback">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                @foreach ( [
                                    (object)[
                                        'label' => 'Aktif',
                                        'value' => 'active'
                                    ],
                                    (object)[
                                        'label' => 'Pindah',
                                        'value' => 'moved'
                                    ],
                                    (object)[
                                        'label' => 'Almarhum',
                                        'value' => 'deceased'
                                    ]
                                    ] as $status )
                                    <option value="{{ $status->value }}" @selected(old( 'status' ) == $status->value)>{{ $status->label }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-end ">
                            <a href="/resident" class="btn btn-secondary mr-2">Kembali</a>
                            <button type="submit" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
