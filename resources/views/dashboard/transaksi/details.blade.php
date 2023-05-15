@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            @can('admin')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi Detail</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi Detail
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>{{ $transaksidetails->transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->kategori_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->berat_kg }}</td>
                                    <td>{{ $transaksidetails->harga_satuan_sampah }}</td>
                                    <td>{{ $transaksidetails->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('petugas')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi Detail</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi Detail
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>{{ $transaksidetails->transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->kategori_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->berat_kg }}</td>
                                    <td>{{ $transaksidetails->harga_satuan_sampah }}</td>
                                    <td>{{ $transaksidetails->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('pelanggan')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi Detail</h1>
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
                        Tabel Transaksi Detail
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>{{ $transaksidetails->transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->kategori_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->berat_kg }}</td>
                                    <td>{{ $transaksidetails->harga_satuan_sampah }}</td>
                                    <td>{{ $transaksidetails->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
            @can('mitra')
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Transaksi Detail</h1>
                <ol class="breadcrumb mb-4">
                    {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
                </ol>
                <div class="row justify-content-start">
                    {{-- <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/transaksi/create">Tambah Data</a>
                    </div> --}}
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Transaksi Detail
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Berat (Kg)</th>
                                    <th>Harga Satuan</th>
                                    <th>Harga Total</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <tr>
                                    <td>{{ $transaksidetails->transaksi->kode_transaksi }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->stok->jenis_sampah->kategori_sampah->nama }}</td>
                                    <td>{{ $transaksidetails->berat_kg }}</td>
                                    <td>{{ $transaksidetails->harga_satuan_sampah }}</td>
                                    <td>{{ $transaksidetails->total_harga }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            @endcan
        </main>
    @endsection

