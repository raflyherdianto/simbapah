@extends('dashboard.layouts.main')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Edit Data Mitra</h1>
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
            <form class="row g-3 mt-2" action="/dashboard/mitra/{{ $mitra->id }}" method="POST"
                enctype="multipart/form-data">
                @method('put')
                @csrf
                <div class="col-12">
                    <label for="kode_user" class="form-label fs-5">Kode User</label>
                    <input class="form-control" type="text" value="{{ old('kode_user', $mitra->kode_user) }}" name="kode_user"  aria-label="readonly input example" readonly>
                </div>
                <div class="col-md-6">
                    <label for="username" class="form-label fs-6">Ubah Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                    value="{{ old('username', $users->username) }}">
                    @error('username')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label fs-6">Ubah Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"
                    value="{{ old('password', $users->password) }}">
                    @error('password')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nama" class="form-label fs-6">Ubah Nama Mitra</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                    value="{{ old('nama', $mitra->nama) }}">
                    @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="nomor_usaha" class="form-label fs-6">Ubah Nomor Usaha</label>
                    <input type="text" class="form-control @error('nomor_usaha') is-invalid @enderror" id="nomor_usaha" name="nomor_usaha"
                    value="{{ old('nomor_usaha', $mitra->nomor_usaha) }}">
                    @error('nomor_usaha')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="alamat" class="form-label fs-6">Ubah Alamat</label>
                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                    value="{{ old('alamat', $mitra->alamat) }}">
                    @error('alamat')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="provinsi" class="form-label fs-6">Ubah Provinsi</label>
                    <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi" name="provinsi"
                    value="{{ old('provinsi', $mitra->provinsi) }}">
                    @error('provinsi')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kota" class="form-label fs-6">Ubah Kota</label>
                    <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota"
                    value="{{ old('kota', $mitra->kota) }}">
                    @error('kota')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kecamatan" class="form-label fs-6">Ubah Kecamatan</label>
                    <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan"
                    value="{{ old('kecamatan', $mitra->kecamatan) }}">
                    @error('kecamatan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kelurahan" class="form-label fs-6">Ubah Kelurahan</label>
                    <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan" name="kelurahan"
                    value="{{ old('kelurahan', $mitra->kelurahan) }}">
                    @error('kelurahan')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="kode_pos" class="form-label fs-6">Ubah Kode Pos</label>
                    <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos" name="kode_pos"
                    value="{{ old('kode_pos', $mitra->kode_pos) }}">
                    @error('kode_pos')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="no_hp" class="form-label fs-6">Ubah No HP</label>
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp"
                    value="{{ old('no_hp', $mitra->no_hp) }}">
                    @error('no_hp')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="rekening" class="form-label fs-6">Ubah Rekening</label>
                    <input type="text" class="form-control @error('rekening') is-invalid @enderror" id="rekening" name="rekening"
                    value="{{ old('rekening', $mitra->rekening) }}">
                    @error('rekening')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="foto" class="form-label fs-6">Ubah Foto</label>
                    <input type="hidden" name="oldImage" value="{{ $mitra->foto }}">
                    @if ($mitra->foto)
                        <img src="{{ asset('storage/' . $mitra->foto ) }}"
                        class="img-preview mb-3 img-fluid col-sm-5 d-block">
                    @else
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                    @endif
                    <input class="form-control" type="file" id="foto" name="foto"
                    onchange="previewImage()">
                </div>
                <div class="col-12 mt-4 mb-3 text-center">
                    <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                </div>
            </form>
        </div>
    </main>
    @endsection
