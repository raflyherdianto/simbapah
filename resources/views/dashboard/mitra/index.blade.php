@extends('dashboard.layouts.main')

@section('container')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Mitra</h1>
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
                                            <h6 class="text-muted">Total Mitra</h6>
                                        </div>
                                        <div class="col-md-12">
                                            <h3>{{ $totalMitra }}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-start">
                    <div class="col-5">
                        <a class="btn btn-success btn-lg text-white mb-3" href="/dashboard/mitra/create">Tambah Data</a>
                    </div>
                </div>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Tabel Mitra
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Kode User</th>
                                    <th>Nama Mitra</th>
                                    <th>Nomor Usaha</th>
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
                                    <th>Nama Mitra</th>
                                    <th>Nomor Usaha</th>
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
                                @foreach ($mitras as $mitra)
                                <tr>
                                    <td>{{ $mitra->kode_user }}</td>
                                    <td>{{ $mitra->nama }}</td>
                                    <td>{{ $mitra->nomor_usaha }}</td>
                                    <td>{{ $mitra->alamat }}</td>
                                    <td>{{ $mitra->provinsi }}</td>
                                    <td>{{ $mitra->kota }}</td>
                                    <td>{{ $mitra->kecamatan }}</td>
                                    <td>{{ $mitra->kelurahan }}</td>
                                    <td>{{ $mitra->kode_pos }}</td>
                                    <td>{{ $mitra->no_hp }}</td>
                                    <td>{{ $mitra->rekening }}</td>
                                    <td><img width="50" src="{{ asset('storage/' . $mitra->foto) }}"></td>
                                    <td>
                                        <form action="/dashboard/mitra/{{ $mitra->id }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        <span>
                                            <a href="/dashboard/mitra/{{ $mitra->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
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
