@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Pelanggan</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <form class="row g-3" action="/dashboard/pelanggan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="username" class="form-label fs-5">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username">
                        @error('username')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="password" class="form-label fs-5">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label fs-5">Nama Pelanggan</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="nik" class="form-label fs-5">NIK</label>
                        <input type="text" class="form-control @error('nik') is-invalid @enderror" id="nik"
                            name="nik">
                        @error('nik')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_kelamin" class="form-label fs-5">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror"
                            id="jenis_kelamin" name="jenis_kelamin">
                        @error('jenis_kelamin')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="ttl" class="form-label fs-5">Tempat & Tanggal Lahir</label>
                        <input type="text" class="form-control @error('ttl') is-invalid @enderror" id="ttl" name="ttl">
                        @error('ttl')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="alamat" class="form-label fs-5">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                            name="alamat">
                        @error('alamat')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="provinsi" class="form-label fs-5">Provinsi</label>
                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi"
                            name="provinsi">
                        @error('provinsi')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kota" class="form-label fs-5">Kota</label>
                        <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota" name="kota">
                        @error('kota')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kecamatan" class="form-label fs-5">Kecamatan</label>
                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                            name="kecamatan">
                        @error('kecamatan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kelurahan" class="form-label fs-5">Kelurahan</label>
                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan"
                            name="kelurahan">
                        @error('kelurahan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kode_pos" class="form-label fs-5">Kode Pos</label>
                        <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos"
                            name="kode_pos">
                        @error('kode_pos')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="no_hp" class="form-label fs-5">Nomor HP</label>
                        <input type="text" class="form-control  @error('no_hp') is-invalid @enderror" id="no_hp"
                            name="no_hp">
                        @error('no_hp')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="rekening" class="form-label fs-5">Rekening</label>
                        <input type="text" class="form-control @error('rekening') is-invalid @enderror" id="rekening"
                            name="rekening">
                        @error('rekening')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="foto" class="form-label fs-5">Upload Foto</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
