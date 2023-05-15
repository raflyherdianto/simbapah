@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Data Jenis Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/sampah/jenis/{{ $jenis->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Jenis Sampah</label>
                        <input class="form-control" type="text" value="{{ old('id', $jenis->id) }}" name="kode_barang"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label fs-6">Ubah Nama Jenis Sampah</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $jenis->nama) }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kategori_sampah_id" class="form-label fs-6">Ubah Kategori</label>
                        <select id="kategori_sampah_id"
                            class="form-select @error('kategori_sampah_id') is-invalid @enderror"
                            name="kategori_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($kategoris as $kategori)
                                @if (old('kategori_sampah_id', $kategori->id) == $jenis->kategori_sampah_id)
                                    <option selected value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @else
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kategori_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="harga_satuan" class="form-label fs-6">Ubah Harga_satuan Satuan</label>
                        <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror"
                            id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan', $jenis->harga_satuan) }}">
                        @error('harga_satuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gambar" class="form-label fs-6">Ubah Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $jenis->gambar }}">
                        @if ($jenis->gambar)
                            <img src="{{ asset('storage/' . $jenis->gambar) }}"
                                class="img-preview mb-3 img-fluid col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImages()">
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Data Jenis Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/sampah/jenis/{{ $jenis->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Jenis Sampah</label>
                        <input class="form-control" type="text" value="{{ old('id', $jenis->id) }}" name="kode_barang"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label fs-6">Ubah Nama Jenis Sampah</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
                            value="{{ old('nama', $jenis->nama) }}">
                        @error('nama')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="kategori_sampahs_id" class="form-label fs-6">Ubah Kategori</label>
                        <select id="kategori_sampahs_id"
                            class="form-select @error('kategori_sampahs_id') is-invalid @enderror"
                            name="kategori_sampahs_id">
                            <option selected>Pilih...</option>
                            @foreach ($kategoris as $kategori)
                                @if (old('kategori_sampahs_id', $kategori->id) == $jenis->kategori_sampahs_id)
                                    <option selected value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @else
                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('kategori_sampahs_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="harga_satuan" class="form-label fs-6">Ubah Harga_satuan Satuan</label>
                        <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror"
                            id="harga_satuan" name="harga_satuan" value="{{ old('harga_satuan', $jenis->harga_satuan) }}">
                        @error('harga_satuan')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="gambar" class="form-label fs-6">Ubah Gambar</label>
                        <input type="hidden" name="oldImage" value="{{ $jenis->gambar }}">
                        @if ($jenis->gambar)
                            <img src="{{ asset('storage/' . $jenis->gambar) }}"
                                class="img-preview mb-3 img-fluid col-sm-5 d-block">
                        @else
                            <img class="img-preview img-fluid mb-3 col-sm-5">
                        @endif
                        <input class="form-control" type="file" id="gambar" name="gambar" onchange="previewImages()">
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
        </main>
    @endsection
