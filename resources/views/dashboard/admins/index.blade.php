@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Admin</h1>
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
                                            <h6 class="text-muted">Total Admin</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalAdmin }}</h3>
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
                                            <h6 class="text-muted">Admin Wanita</h6>
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
                                            <h6 class="text-muted">Admin Pria</h6>
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
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/admin/create">Tambah Data</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Admin
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Admin</th>
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
                                    <th>Nama Admin</th>
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
                                @foreach ($admins as $admin)
                                <tr>
                                    <td>{{ $admin->kode_user }}</td>
                                    <td>{{ $admin->nama }}</td>
                                    <td>{{ $admin->nik }}</td>
                                    <td>{{ $admin->jenis_kelamin }}</td>
                                    <td>{{ $admin->ttl }}</td>
                                    <td>{{ $admin->alamat }}</td>
                                    <td>{{ $admin->provinsi }}</td>
                                    <td>{{ $admin->kota }}</td>
                                    <td>{{ $admin->kecamatan }}</td>
                                    <td>{{ $admin->kelurahan }}</td>
                                    <td>{{ $admin->kode_pos }}</td>
                                    <td>{{ $admin->no_hp }}</td>
                                    <td>{{ $admin->rekening }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $admin->foto) }}"></td>
                                    <td>
                                        @if ($totalAdmin > 1)
                                        <form action="/dashboard/admin/{{ $admin->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        @endif
                                        <span>
                                            <a href="/dashboard/admin/{{ $admin->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
