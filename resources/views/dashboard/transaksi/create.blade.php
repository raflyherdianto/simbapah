@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/transaksi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="stok_id" class="form-label fs-6">Pilih Stok Sampah</label>
                        <select id="stok_id"
                            class="form-select @error('stok_id') is-invalid @enderror"
                            name="stok_id">
                            <option selected>Pilih...</option>
                            @foreach ($stoks as $stok)
                                <option value="{{ $stok->id }}">{{ $stok->jenis_sampah->nama }} - {{ $stok->pelanggan->kode_user }} - {{ $stok->berat_kg }} (Kg)</option>
                            @endforeach
                        </select>
                        @error('stok_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mitra_id" class="form-label fs-6">Nama Mitra</label>
                        <select id="mitra_id"
                            class="form-select @error('mitra_id') is-invalid @enderror"
                            name="mitra_id">
                            <option selected>Pilih...</option>
                            @foreach ($mitras as $mitra)
                                <option value="{{ $mitra->id }}">{{ $mitra->kode_user }} - {{ $mitra->nama }}</option>
                            @endforeach
                        </select>
                        @error('mitra_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/transaksi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="stok_id" class="form-label fs-6">Pilih Stok Sampah</label>
                        <select id="stok_id"
                            class="form-select @error('stok_id') is-invalid @enderror"
                            name="stok_id">
                            <option selected>Pilih...</option>
                            @foreach ($stoks as $stok)
                                <option value="{{ $stok->id }}">{{ $stok->jenis_sampah->nama }} - {{ $stok->pelanggan->kode_user }} - {{ $stok->berat_kg }} (Kg)</option>
                            @endforeach
                        </select>
                        @error('stok_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mitra_id" class="form-label fs-6">Nama Mitra</label>
                        <select id="mitra_id"
                            class="form-select @error('mitra_id') is-invalid @enderror"
                            name="mitra_id">
                            <option selected>Pilih...</option>
                            @foreach ($mitras as $mitra)
                                <option value="{{ $mitra->id }}">{{ $mitra->kode_user }} - {{ $mitra->nama }}</option>
                            @endforeach
                        </select>
                        @error('mitra_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('mitra')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/transaksi" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="stok_id" class="form-label fs-6">Pilih Stok Sampah</label>
                        <select id="stok_id"
                            class="form-select @error('stok_id') is-invalid @enderror"
                            name="stok_id">
                            <option selected>Pilih...</option>
                            @foreach ($stoks as $stok)
                                <option value="{{ $stok->id }}">{{ $stok->jenis_sampah->nama }} - {{ $stok->pelanggan->kode_user }} - {{ $stok->berat_kg }} (Kg)</option>
                            @endforeach
                        </select>
                        @error('stok_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="mitra_id" class="form-label fs-6">Nama Mitra</label>
                        <input class="form-control" type="text" value="{{ auth()->user()->mitra->kode_user }} - {{ auth()->user()->mitra->nama }}" readonly>
                        <input class="form-control" type="hidden" value="{{ auth()->user()->mitra->id }}" name="mitra_id" readonly>
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
        </main>
    @endsection
