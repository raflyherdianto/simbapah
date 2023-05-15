@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->mitra->kode_user }}</td>
                                    <td>{{ $transaksi->mitra->nama }}</td>
                                    <td>{{ $transaksi->total_harga }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>
                                        <form action="/dashboard/transaksi/{{ $transaksi->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/transaksi/{{ $transaksi->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span>
                                        <span>
                                            <a href="/dashboard/transaksi/detail/{{ $transaksi->id }}" class="btn btn-primary btn-sm">Lihat Detail</a>
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
                <h1 class="mt-4">Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->mitra->kode_user }}</td>
                                    <td>{{ $transaksi->mitra->nama }}</td>
                                    <td>{{ $transaksi->total_harga }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>
                                        <form action="/dashboard/transaksi/{{ $transaksi->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/transaksi/{{ $transaksi->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span>
                                        <span>
                                            <a href="/dashboard/transaksi/detail/{{ $transaksi->id }}" class="btn btn-primary btn-sm">Lihat Detail</a>
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
                <h1 class="mt-4">Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/stok/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->mitra->kode_user }}</td>
                                    <td>{{ $transaksi->mitra->nama }}</td>
                                    <td>{{ $transaksi->total_harga }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>
                                        {{-- <form action="/dashboard/transaksi/{{ $transaksi->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/transaksi/{{ $transaksi->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span> --}}
                                        <span>
                                            <a href="/dashboard/transaksi/{{ $transaksi->id }}" class="btn btn-primary btn-sm">Lihat Detail</a>
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
            @can('mitra')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Harga Total</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($transaksis as $transaksi)
                                <tr>
                                    <td>{{ $transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksi->mitra->kode_user }}</td>
                                    <td>{{ $transaksi->mitra->nama }}</td>
                                    <td>{{ $transaksi->total_harga }}</td>
                                    <td>{{ $transaksi->status }}</td>
                                    <td>
                                        <form action="/dashboard/transaksi/{{ $transaksi->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        {{-- <span>
                                            <a href="/dashboard/transaksi/{{ $transaksi->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span> --}}
                                        <span>
                                            <a href="/dashboard/transaksi/detail/{{ $transaksi->id }}" class="btn btn-primary btn-sm">Detail</a>
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

