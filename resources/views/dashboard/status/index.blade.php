@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Status Sampah</h1>
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
                                            <h6 class="text-muted">Total Status Sampah</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAll }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Kosong</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKosong }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Penuh</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalPenuh }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/statuse/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Status Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($statuse as $status)
                                <tr>
                                    <td>{{ $status->pelanggan->kode_user }}</td>
                                    <td>{{ $status->pelanggan->nama }}</td>
                                    <td>{{ $status->pelanggan->alamat }}</td>
                                    <td>{{ $status->pelanggan->provinsi }}</td>
                                    <td>{{ $status->pelanggan->kota }}</td>
                                    <td>{{ $status->pelanggan->kecamatan }}</td>
                                    <td>{{ $status->pelanggan->kelurahan }}</td>
                                    <td>{{ $status->status }}</td>
                                    @if ($status->petugase_id == null)
                                    <td>Tidak ada</td>
                                    @else
                                    <td>{{ $status->petugase->nama }}</td>
                                    @endif
                                    <td>{{ $status->created_at }}</td>
                                    <td>{{ $status->updated_at }}</td>
                                    <td>
                                        <form action="/dashboard/statuse/{{ $status->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/statuse/{{ $status->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
                <h1 class="mt-4">Data Status Sampah</h1>
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
                                            <h6 class="text-muted">Total Status Sampah</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAll }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Kosong</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKosong }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Penuh</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalPenuh }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/statuse/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Status Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($statuse as $status)
                                <tr>
                                    <td>{{ $status->pelanggan->kode_user }}</td>
                                    <td>{{ $status->pelanggan->nama }}</td>
                                    <td>{{ $status->pelanggan->alamat }}</td>
                                    <td>{{ $status->pelanggan->provinsi }}</td>
                                    <td>{{ $status->pelanggan->kota }}</td>
                                    <td>{{ $status->pelanggan->kecamatan }}</td>
                                    <td>{{ $status->pelanggan->kelurahan }}</td>
                                    <td>{{ $status->status }}</td>
                                    @if ($status->petugase_id == null)
                                    <td>Tidak ada</td>
                                    @else
                                    <td>{{ $status->petugase->nama }}</td>
                                    @endif
                                    <td>{{ $status->created_at }}</td>
                                    <td>{{ $status->updated_at }}</td>
                                    <td>
                                        {{-- <form action="/dashboard/statuse/{{ $status->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form> --}}
                                        <span>
                                            <a href="/dashboard/statuse/{{ $status->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
                <h1 class="mt-4">Data Status Sampah</h1>
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
                                            <h6 class="text-muted">Total Status Sampah</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAll }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Kosong</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalKosong }}</h3>
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
                                            <h6 class="text-muted">Status Sampah Penuh</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalPenuh }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/statuse/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Status Sampah
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Status Sampah</th>
                                    <th>Nama Petugas</th>
                                    <th>Status Dibuat</th>
                                    <th>Status Diubah</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($statuse as $status)
                                <tr>
                                    <td>{{ $status->pelanggan->kode_user }}</td>
                                    <td>{{ $status->pelanggan->nama }}</td>
                                    <td>{{ $status->pelanggan->alamat }}</td>
                                    <td>{{ $status->pelanggan->provinsi }}</td>
                                    <td>{{ $status->pelanggan->kota }}</td>
                                    <td>{{ $status->pelanggan->kecamatan }}</td>
                                    <td>{{ $status->pelanggan->kelurahan }}</td>
                                    <td>{{ $status->status }}</td>
                                    @if ($status->petugase_id == null)
                                    <td>Tidak ada</td>
                                    @else
                                    <td>{{ $status->petugase->nama }}</td>
                                    @endif
                                    <td>{{ $status->created_at }}</td>
                                    <td>{{ $status->updated_at }}</td>
                                    <td>
                                        <form action="/dashboard/statuse/{{ $status->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        {{-- <span>
                                            <a href="/dashboard/statuse/{{ $status->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
        </main>
    @endsection

