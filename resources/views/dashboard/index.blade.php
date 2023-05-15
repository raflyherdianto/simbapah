@extends('dashboard.layouts.main')

@section('container')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            @can('admin')
            <h1 class="mt-4">Welcome, {{ auth()->user()->admin->nama }}!</h1>
            @endcan
            @can('petugas')
            <h1 class="mt-4">Welcome, {{ auth()->user()->petugase->nama }}!</h1>
            @endcan
            @can('pelanggan')
            <h1 class="mt-4">Welcome, {{ auth()->user()->pelanggan->nama }}!</h1>
            @endcan
            @can('mitra')
            <h1 class="mt-4">Welcome, {{ auth()->user()->mitra->nama }}!</h1>
            @endcan
            <ol class="breadcrumb mb-4">
                {{-- <li class="breadcrumb-item active">Dashboard</li> --}}
            </ol>
            <div class="row">

            </div>

        </div>
    </main>
    @endsection
