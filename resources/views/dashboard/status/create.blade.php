@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Status Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/statuse" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Nama Pelanggan</label>
                        <select id="pelanggan_id"
                            class="form-select @error('pelanggan_id') is-invalid @enderror"
                            name="pelanggan_id">
                            <option selected>Pilih...</option>
                            @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}">{{ $pelanggan->kode_user }} - {{ $pelanggan->nama }}</option>
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                        <option selected>Pilih...</option>
                        <option value="Penuh">Penuh</option>
                        <option value="Kosong">Kosong</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="petugase_id" class="form-label fs-6">Nama Petugas</label>
                        <select id="petugase_id"
                            class="form-select @error('petugase_id') is-invalid @enderror"
                            name="petugase_id">
                            <option selected>Pilih...</option>
                            @foreach ($petugase as $petugas)
                                <option value="{{ $petugas->id }}">{{ $petugas->kode_user }} - {{ $petugas->nama }}</option>
                            @endforeach
                        </select>
                        @error('petugase_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('pelanggan')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Status Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/statuse/pelanggan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Nama Pelanggan</label>
                        <input class="form-control" type="text" value="{{ auth()->user()->pelanggan->kode_user }} - {{ auth()->user()->pelanggan->nama }}" readonly>
                        <input class="form-control" type="hidden" value="{{ auth()->user()->pelanggan->id }}" name="pelanggan_id" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                        <option selected>Pilih...</option>
                        <option value="Penuh">Penuh</option>
                        <option value="Kosong">Kosong</option>
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="petugase_id" class="form-label fs-6">Nama Petugas</label>
                        <select id="petugase_id"
                            class="form-select @error('petugase_id') is-invalid @enderror" disabled
                            name="petugase_id">
                            <option selected>Pilih...</option>
                            @foreach ($petugase as $petugas)
                                <option value="{{ $petugas->id }}">{{ $petugas->kode_user }} - {{ $petugas->nama }}</option>
                            @endforeach
                        </select>
                        @error('petugase_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
        </main>
    @endsection
