@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Jenis Sampah</h1>
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
                                            <h6 class="text-muted">Total Jenis Sampah</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalSampah }}</h3>
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
                                            <h6 class="text-muted">Jenis Sampah Anorganik</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAnorganik }}</h3>
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
                                            <h6 class="text-muted">Jenis Sampah Organik</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalOrganik }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/sampah/jenis/create">Tambah Data</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Jenis Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Jenis Sampah</th>
                                    <th>Nama Jenis Sampah</th>
                                    <th>Kategori Sampah</th>
                                    <th>Harga Satuan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Jenis Sampah</th>
                                    <th>Nama Jenis Sampah</th>
                                    <th>Kategori Sampah</th>
                                    <th>Harga Satuan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($jenises as $jenis)
                                <tr>
                                    <td>{{ $jenis->kode_jenis }}</td>
                                    <td>{{ $jenis->nama }}</td>
                                    <td>{{ $jenis->kategori_sampah->nama }}</td>
                                    <td>Rp.{{ $jenis->harga_satuan }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $jenis->gambar) }}"></td>
                                    <td>
                                        <form action="/dashboard/sampah/jenis/{{ $jenis->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/sampah/jenis/{{ $jenis->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Jenis Sampah</h1>
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
                                            <h6 class="text-muted">Total Jenis Sampah</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalSampah }}</h3>
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
                                            <h6 class="text-muted">Jenis Sampah Anorganik</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAnorganik }}</h3>
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
                                            <h6 class="text-muted">Jenis Sampah Organik</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalOrganik }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/sampah/jenis/create">Tambah Data</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Jenis Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Jenis Sampah</th>
                                    <th>Nama Jenis Sampah</th>
                                    <th>Kategori Sampah</th>
                                    <th>Harga Satuan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Jenis Sampah</th>
                                    <th>Nama Jenis Sampah</th>
                                    <th>Kategori Sampah</th>
                                    <th>Harga Satuan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($jenises as $jenis)
                                <tr>
                                    <td>{{ $jenis->kode_jenis }}</td>
                                    <td>{{ $jenis->nama }}</td>
                                    <td>{{ $jenis->kategori_sampah->nama }}</td>
                                    <td>Rp.{{ $jenis->harga_satuan }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $jenis->gambar) }}"></td>
                                    <td>
                                        <form action="/dashboard/sampah/jenis/{{ $jenis->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/sampah/jenis/{{ $jenis->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
        </main>
    @endsection

