@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Jenis Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/sampah/jenis" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="nama" class="form-label fs-6">Nama Jenis Sampah</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kategori_sampah_id" class="form-label fs-6">Kategori</label>
                        <select id="kategori_sampah_id"
                            class="form-select @error('kategori_sampah_id') is-invalid @enderror"
                            name="kategori_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                        @error('kategori_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="harga_satuan" class="form-label fs-6">Harga Satuan</label>
                        <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror"
                            id="harga_satuan" name="harga_satuan">
                        @error('harga_satuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gambar" class="form-label fs-6">Upload Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImages()">
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
