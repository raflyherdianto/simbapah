@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/stok" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Pilih Pelanggan</label>
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
                        <label for="jenis_sampah_id" class="form-label fs-6">Pilih Jenis Sampah</label>
                        <select id="jenis_sampah_id"
                            class="form-select @error('jenis_sampah_id') is-invalid @enderror"
                            name="jenis_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($jenises as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->kode_jenis}} - {{ $jenis->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenis_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_sampah" class="form-label fs-6">Jumlah Sampah/Kg</label>
                        <input type="text" class="form-control @error('jumlah_sampah') is-invalid @enderror"
                            id="jumlah_sampah" name="jumlah_sampah">
                        @error('jumlah_sampah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="berat_kg" class="form-label fs-6">Berat (Kg)</label>
                        <input type="text" class="form-control @error('berat_kg') is-invalid @enderror"
                            id="berat_kg" name="berat_kg">
                        @error('berat_kg')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Status</label> <select id="status" class="form-select @error('status') is-invalid @enderror" name="status"> <option selected>Pilih...</option> <option value="Tersedia">Tersedia</option> <option value="Terjual">Terjual</option> </select> @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                    </div>
                    <div class="col-12 mb-3 mt-4 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Tambah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Tambah Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3" action="/dashboard/stok" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Pilih Pelanggan</label>
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
                        <label for="jenis_sampah_id" class="form-label fs-6">Pilih Jenis Sampah</label>
                        <select id="jenis_sampah_id"
                            class="form-select @error('jenis_sampah_id') is-invalid @enderror"
                            name="jenis_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($jenises as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->kode_jenis}} - {{ $jenis->nama }}</option>
                            @endforeach
                        </select>
                        @error('jenis_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_sampah" class="form-label fs-6">Jumlah Sampah/Kg</label>
                        <input type="text" class="form-control @error('jumlah_sampah') is-invalid @enderror"
                            id="jumlah_sampah" name="jumlah_sampah">
                        @error('jumlah_sampah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="berat_kg" class="form-label fs-6">Berat (Kg)</label>
                        <input type="text" class="form-control @error('berat_kg') is-invalid @enderror"
                            id="berat_kg" name="berat_kg">
                        @error('berat_kg')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                        <option selected>Pilih...</option>
                        <option value="Tersedia">Tersedia</option>
                        <option value="Terjual">Terjual</option>
                        </select>
                        @error('status')
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
