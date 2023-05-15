@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Transaksi</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/transaksi/{{ $transaksis->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="kode_transaksi" class="form-label fs-6">Kode Transaksi</label>
                        <input class="form-control" type="text" value="{{ old('kode_transaksi', $transaksis->kode_transaksi) }}" name="kode_transaksi"
                            aria-label="readonly" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="mitra_id" class="form-label fs-6">Ubah Mitra</label>
                        <input class="form-control" type="text" value="{{ old('mitra_id', $transaksis->mitra->nama) }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ old('mitra_id', $transaksis->mitra_id) }}" name="mitra_id"
                             readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $transaksis->status) == "Sudah Dibayar")
                            <option value="Sudah Dibayar" selected>Sudah Dibayar</option>
                            <option value="Belum Dibayar">Belum Dibayar</option>
                            @else
                            <option value="Sudah Dibayar">Sudah Dibayar</option>
                            <option value="Belum Dibayar" selected>Belum Dibayar</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="total_harga" class="form-label fs-6">Ubah Total Harga</label>
                        <input class="form-control" type="text" value="{{ old('total_harga', $transaksis->total_harga) }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ old('total_harga', $transaksis->total_harga) }}" name="total_harga"
                             readonly>
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Transaksi</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/transaksi/{{ $transaksis->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="kode_transaksi" class="form-label fs-6">Kode Transaksi</label>
                        <input class="form-control" type="text" value="{{ old('kode_transaksi', $transaksis->kode_transaksi) }}" name="kode_transaksi"
                            aria-label="readonly" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="mitra_id" class="form-label fs-6">Ubah Mitra</label>
                        <input class="form-control" type="text" value="{{ old('mitra_id', $transaksis->mitra->nama) }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ old('mitra_id', $transaksis->mitra_id) }}" name="mitra_id"
                             readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $transaksis->status) == "Sudah Dibayar")
                            <option value="Sudah Dibayar" selected>Sudah Dibayar</option>
                            <option value="Belum Dibayar">Belum Dibayar</option>
                            @else
                            <option value="Sudah Dibayar">Sudah Dibayar</option>
                            <option value="Belum Dibayar" selected>Belum Dibayar</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="total_harga" class="form-label fs-6">Ubah Total Harga</label>
                        <input class="form-control" type="text" value="{{ old('total_harga', $transaksis->total_harga) }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ old('total_harga', $transaksis->total_harga) }}" name="total_harga"
                             readonly>
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
        </main>
    @endsection
