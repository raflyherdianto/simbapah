@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Edit Kategori Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/sampah/kategori/{{ $kategori->id }}" method="POST">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Kategori</label>
                        <input class="form-control" type="text" value="{{ old('id', $kategori->id) }}" name="id"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-12">
                        <label for="nama" class="form-label fs-6">Ubah Nama Kategori</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $kategori->nama) }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <label for="gambar" class="form-label fs-6">Ubah Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $kategori->gambar }}">
                        @if ($kategori->gambar)
                            <img src="{{ asset('storage/' . $kategori->gambar) }}"
                                class="img-preview mb-3 img-fluid col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImages()">
                    </div>
                    <div class="col-12 mt-4 mb-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
        </main>
    @endsection
