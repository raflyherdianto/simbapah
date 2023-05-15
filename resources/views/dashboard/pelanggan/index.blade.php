@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Pelanggan</h1>
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
                                            <h6 class="text-muted">Total Pelanggan</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalPelanggan }}</h3>
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
                                            <h6 class="text-muted">Pelanggan Wanita</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalPerempuan }}</h3>
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
                                            <h6 class="text-muted">Pelanggan Pria</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalLaki }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/pelanggan/create">Tambah Data</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Pelanggan
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Kode Pos</th>
                                    <th>Nomor HP</th>
                                    <th>Rekening</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Pelanggan</th>
                                    <th>NIK</th>
                                    <th>Jenis Kelamin</th>
                                    <th>TTL</th>
                                    <th>Alamat</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kelurahan</th>
                                    <th>Kode Pos</th>
                                    <th>Nomor HP</th>
                                    <th>Rekening</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($pelanggans as $pelanggan)
                                <tr>
                                    <td>{{ $pelanggan->kode_user }}</td>
                                    <td>{{ $pelanggan->nama }}</td>
                                    <td>{{ $pelanggan->nik }}</td>
                                    <td>{{ $pelanggan->jenis_kelamin }}</td>
                                    <td>{{ $pelanggan->ttl }}</td>
                                    <td>{{ $pelanggan->alamat }}</td>
                                    <td>{{ $pelanggan->provinsi }}</td>
                                    <td>{{ $pelanggan->kota }}</td>
                                    <td>{{ $pelanggan->kecamatan }}</td>
                                    <td>{{ $pelanggan->kelurahan }}</td>
                                    <td>{{ $pelanggan->kode_pos }}</td>
                                    <td>{{ $pelanggan->no_hp }}</td>
                                    <td>{{ $pelanggan->rekening }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $pelanggan->foto) }}"></td>
                                    <td>
                                        <form action="/dashboard/pelanggan/{{ $pelanggan->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/pelanggan/{{ $pelanggan->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
    @endsection
