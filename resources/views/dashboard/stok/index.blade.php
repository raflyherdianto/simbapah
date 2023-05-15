@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Stok</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalStok }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Tersedia</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTrd }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Terjual</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTdk }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Sampah Tersimpan (Kg)</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKg }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/stok/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Stok Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg</th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg<th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($stoks as $stok)
                                <tr>
                                    <td>{{ $stok->pelanggan->kode_user }}</td>
                                    <td>{{ $stok->pelanggan->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->kategori_sampah->nama}}</td>
                                    <td>{{ $stok->jumlah_sampah }}</td>
                                    <td>{{ $stok->berat_kg }} Kg</td>
                                    <td>{{ $stok->total_satuan }}</td>
                                    <td>Rp. {{ $stok->harga_kg }}</td>
                                    <td>Rp. {{ $stok->total_harga }}</td>
                                    <td>{{ $stok->status }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $stok->jenis_sampah->gambar) }}"></td>
                                    <td>
                                        <form action="/dashboard/stok/{{ $stok->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/stok/{{ $stok->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span>
                                        {{-- <span>
                                            <a href="/dashboard/stok/{{ $stok->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        </span> --}}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Stok</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalStok }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Tersedia</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTrd }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Terjual</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTdk }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Sampah Tersimpan (Kg)</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKg }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/stok/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Stok Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg</th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg</th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($stoks as $stok)
                                <tr>
                                    <td>{{ $stok->pelanggan->kode_user }}</td>
                                    <td>{{ $stok->pelanggan->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->kategori_sampah->nama}}</td>
                                    <td>{{ $stok->jumlah_sampah }}</td>
                                    <td>{{ $stok->berat_kg }} Kg</td>
                                    <td>{{ $stok->total_satuan }}</td>
                                    <td>Rp. {{ $stok->harga_kg }}</td>
                                    <td>Rp. {{ $stok->total_harga }}</td>
                                    <td>{{ $stok->status }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $stok->jenis_sampah->gambar) }}"></td>
                                    <td>
                                        <form action="/dashboard/stok/{{ $stok->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/stok/{{ $stok->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('pelanggan')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Stok</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalStok }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Tersedia</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTrd }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Terjual</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTdk }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Total Sampah Tersimpan (Kg)</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKg }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/stok/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Stok Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg</th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Jenis Sampah</th>
                                    <th>Kategori</th>
                                    <th>Jumlah Sampah/Kg</th>
                                    <th>Berat (Kg)</th>
                                    <th>Total Satuan</th>
                                    <th>Harga/Kg</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Gambar</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($stoks as $stok)
                                <tr>
                                    <td>{{ $stok->pelanggan->kode_user }}</td>
                                    <td>{{ $stok->pelanggan->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->nama }}</td>
                                    <td>{{ $stok->jenis_sampah->kategori_sampah->nama}}</td>
                                    <td>{{ $stok->jumlah_sampah }}</td>
                                    <td>{{ $stok->berat_kg }} Kg</td>
                                    <td>{{ $stok->total_satuan }}</td>
                                    <td>Rp. {{ $stok->harga_kg }}</td>
                                    <td>Rp. {{ $stok->total_harga }}</td>
                                    <td>{{ $stok->status }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $stok->jenis_sampah->gambar) }}"></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('mitra')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Stok Sampah</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row">
                    <div class="col-4">
                        <div class="card shadow p-3 mb-3">
                            <div class="row text-center">
                                <div class="col-md-6">
                                    <img src="{{ asset('/img/box-seam.svg') }}" alt="icon" width="70">
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h6 class="text-muted">Stok Tersedia</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalTrd }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/stok/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4">
                    @foreach ($stoks as $stok)
                    <div class="col-6 mb-3">
                      <div class="card p-2">
                        <img src="{{ asset('storage/' . $stok->jenis_sampah->gambar) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">{{ $stok->jenis_sampah->nama }}</h5>
                          <p class="card-text">{{ $stok->pelanggan->kode_user }}</p>
                          <p class="card-text">{{ $stok->jenis_sampah->kategori_sampah->nama}} - {{ $stok->berat_kg }} Kg</p>
                          <p class="card-text">Rp.{{ $stok->total_harga }}</p>
                          <button type="button" class="btn btn-success">{{ $stok->status }}</button>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endcan
        </main>
    @endsection

