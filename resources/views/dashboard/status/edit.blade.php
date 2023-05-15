@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4 h2">Edit Status Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/statuse/{{ $statu->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Status</label>
                        <input class="form-control" type="text" value="{{ old('id', $statu->id) }}" name="id"
                            aria-label="readonly input example" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Ubah Pelanggan</label>
                        <select id="pelanggan_id"
                            class="form-select @error('pelanggan_id') is-invalid @enderror"
                            name="pelanggan_id">
                            <option selected>Pilih...</option>
                            @foreach ($pelanggans as $pelanggan)
                                @if (old('pelanggan_id', $pelanggan->id) == $statu->pelanggan_id)
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
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $statu->status) == "Penuh")
                            <option value="Penuh" selected>Penuh</option>
                            <option value="Kosong">Kosong</option>
                            @else
                            <option value="Penuh">Penuh</option>
                            <option value="Kosong" selected>Kosong</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="petugase_id" class="form-label fs-6">Ubah Petugas</label>
                        <select id="petugase_id"
                            class="form-select @error('petugase_id') is-invalid @enderror"
                            name="petugase_id">
                            <option selected>Pilih...</option>
                            @foreach ($petugase as $petugas)
                                @if (old('petugase_id', $petugas->id) == $statu->petuga_id)
                                    <option selected value="{{ $petugas->id }}">{{ $petugas->kode_user }} - {{ $petugas->nama }}</option>
                                @else
                                    <option value="{{ $petugas->id }}">{{ $petugas->kode_user }} - {{ $petugas->nama }}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('petugase_id')
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
                <h1 class="mt-4 h2">Edit Status Sampah</h1>
                <ol class="breadcrumb mb-4">
                </ol>
                <form class="row g-3 mt-2" action="/dashboard/statuse/{{ $statu->id }}" method="POST"
                    enctype="multipart/form-data">
                    @method('put')
                    @csrf
                    <div class="col-12">
                        <label for="id" class="form-label fs-6">Kode Status</label>
                        <input class="form-control" type="text" value="{{ old('id', $statu->id) }}" name="id"
                            readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="pelanggan_id" class="form-label fs-6">Ubah Pelanggan</label>
                        <input class="form-control" type="text" value="{{ old('pelanggan_id', $statu->pelanggan->nama) }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ old('pelanggan_id', $statu->pelanggan_id) }}" name="pelanggan_id"
                             readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="status" class="form-label fs-6">Ubah Status</label>
                        <select id="status" class="form-select @error('status') is-invalid @enderror" name="status">
                            <option selected>Pilih...</option>
                            @if (old('status', $statu->status) == "Penuh")
                            <option value="Penuh" selected>Penuh</option>
                            <option value="Kosong">Kosong</option>
                            @else
                            <option value="Penuh">Penuh</option>
                            <option value="Kosong" selected>Kosong</option>
                            @endif
                        </select>
                        @error('status')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="petugase_id" class="form-label fs-6">Ubah Petugas</label>
                        <input class="form-control" type="text" value="{{ auth()->user()->petugase->kode_user }} - {{ auth()->user()->petugase->nama }}"
                             readonly>
                        <input class="form-control" type="hidden" value="{{ auth()->user()->petugase->id }}" name="petugase_id"
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
