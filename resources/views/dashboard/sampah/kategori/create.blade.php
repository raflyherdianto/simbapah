@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Kategori Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form action="/dashboard/sampah/kategori" method="post" class="row g-3 mt-2" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label for="nama" class="form-label fs-6">Nama Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label fs-6">Upload Gambar</label>
                        <img class="img-preview img-fluid mb-3 col-sm-5">
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImages()">
                    </div>
                    <div class="col-12 mt-4 mb-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
