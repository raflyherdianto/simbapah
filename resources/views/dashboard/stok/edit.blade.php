@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/stok/{{ $stok->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Stok</label>
                        <input class="form-control" type="text" value="{{ old('id', $stok->id) }}" name="id"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Ubah Pelanggan</label>
                        <select id="pelanggan_id"
                            class="form-select @error('pelanggan_id') is-invalid @enderror"
                            name="pelanggan_id">
                            <option selected>Pilih...</option>
                            @foreach ($pelanggans as $pelanggan)
                                @if (old('pelanggan_id', $pelanggan->id) == $stok->pelanggan_id)
                                    <option selected value="{{ $pelanggan->id }}">{{ $pelanggan->kode_user }} - {{ $pelanggan->nama }}</option>
                                @else
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->kode_user }} - {{ $pelanggan->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_sampah_id" class="form-label fs-6">Ubah Jenis Sampah</label>
                        <select id="jenis_sampah_id"
                            class="form-select @error('jenis_sampah_id') is-invalid @enderror"
                            name="jenis_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($jenises as $jenis)
                                @if (old('jenis_sampah_id', $jenis->id) == $stok->jenis_sampah_id)
                                    <option selected value="{{ $jenis->id }}">{{ $jenis->kode_jenis }} - {{ $jenis->nama }}</option>
                                @else
                                    <option value="{{ $jenis->id }}">{{ $jenis->kode_jenis}} - {{ $jenis->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('jenis_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_sampah" class="form-label fs-6">Ubah Jumlah Sampah/Kg</label>
                        <input type="text" class="form-control @error('jumlah_sampah') is-invalid @enderror" id="jumlah_sampah" name="jumlah_sampah"
                            value="{{ old('jumlah_sampah', $stok->jumlah_sampah) }}">
                        @error('jumlah_sampah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="berat_kg" class="form-label fs-6">Ubah Berat (Kg)</label>
                        <input type="text" class="form-control @error('berat_kg') is-invalid @enderror" id="berat_kg" name="berat_kg"
                            value="{{ old('berat_kg', $stok->berat_kg) }}">
                        @error('berat_kg')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $stok->status) == "Tersedia")
                            <option value="Tersedia" selected>Tersedia</option>
                            <option value="Terjual">Terjual</option>
                            @else
                            <option value="Tersedia">Tersedia</option>
                            <option value="Terjual" selected>Terjual</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/stok/{{ $stok->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Stok</label>
                        <input class="form-control" type="text" value="{{ old('id', $stok->id) }}" name="id"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Ubah Pelanggan</label>
                        <select id="pelanggan_id"
                            class="form-select @error('pelanggan_id') is-invalid @enderror"
                            name="pelanggan_id">
                            <option selected>Pilih...</option>
                            @foreach ($pelanggans as $pelanggan)
                                @if (old('pelanggan_id', $pelanggan->id) == $stok->pelanggan_id)
                                    <option selected value="{{ $pelanggan->id }}">{{ $pelanggan->kode_user }} - {{ $pelanggan->nama }}</option>
                                @else
                                    <option value="{{ $pelanggan->id }}">{{ $pelanggan->kode_user }} - {{ $pelanggan->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('pelanggan_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jenis_sampah_id" class="form-label fs-6">Ubah Jenis Sampah</label>
                        <select id="jenis_sampah_id"
                            class="form-select @error('jenis_sampah_id') is-invalid @enderror"
                            name="jenis_sampah_id">
                            <option selected>Pilih...</option>
                            @foreach ($jenises as $jenis)
                                @if (old('jenis_sampah_id', $jenis->id) == $stok->jenis_sampah_id)
                                    <option selected value="{{ $jenis->id }}">{{ $jenis->kode_jenis }} - {{ $jenis->nama }}</option>
                                @else
                                    <option value="{{ $jenis->id }}">{{ $jenis->kode_jenis}} - {{ $jenis->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('jenis_sampah_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="jumlah_sampah" class="form-label fs-6">Ubah Jumlah Sampah/Kg</label>
                        <input type="text" class="form-control @error('jumlah_sampah') is-invalid @enderror" id="jumlah_sampah" name="jumlah_sampah"
                            value="{{ old('jumlah_sampah', $stok->jumlah_sampah) }}">
                        @error('jumlah_sampah')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="berat_kg" class="form-label fs-6">Ubah Berat (Kg)</label>
                        <input type="text" class="form-control @error('berat_kg') is-invalid @enderror" id="berat_kg" name="berat_kg"
                            value="{{ old('berat_kg', $stok->berat_kg) }}">
                        @error('berat_kg')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $stok->status) == "Tersedia")
                            <option value="Tersedia" selected>Tersedia</option>
                            <option value="Terjual">Terjual</option>
                            @else
                            <option value="Tersedia">Tersedia</option>
                            <option value="Terjual" selected>Terjual</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-12 mt-4 mb-3 text-center">
                        <button type="submit" class="btn btn-success btn-lg">Ubah</button>
                    </div>
                </form>
            </div>
            @endcan
        </main>
    @endsection
