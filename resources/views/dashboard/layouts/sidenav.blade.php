<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                <a class="nav-link" href="/dashboard">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>

                <div class="sb-sidenav-menu-heading">Kelola Data</div>
                @can('admin')
                <a class="nav-link {{ Request::is('dashboard/admin') ? 'active' : ''  }}" href="/dashboard/admin">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    Data Admin
                </a>
                <a class="nav-link {{ Request::is('dashboard/pelanggan') ? 'active' : ''  }}" href="/dashboard/pelanggan">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    Data Pelanggan
                </a>
                <a class="nav-link {{ Request::is('dashboard/petugas') ? 'active' : ''  }}" href="/dashboard/petugas">
                    <div class="sb-nav-link-icon"><i class="bi bi-people-fill"></i></div>
                    Data Petugas
                </a>
                <a class="nav-link {{ Request::is('dashboard/mitra') ? 'active' : ''  }}" href="/dashboard/mitra">
                    <div class="sb-nav-link-icon"><i class="bi bi-building"></i></div>
                    Data Mitra
                </a>
                <a class="nav-link {{ Request::is('dashboard/statuse') ? 'active' : ''  }}" href="/dashboard/statuse">
                    <div class="sb-nav-link-icon"><i class="bi bi-exclamation-circle"></i></div>
                    Data Status Sampah
                </a>
                <a class="nav-link {{ Request::is('dashboard/transaksi') ? 'active' : ''  }}" href="/dashboard/transaksi">
                    <div class="sb-nav-link-icon"><i class="bi bi-reception-4"></i></div>
                    Data Transaksi
                </a>
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSampah" aria-expanded="false" aria-controls="collapseSampah">
                    <div class="sb-nav-link-icon"><i class="bi bi-trash3"></i></div>
                    Data Sampah
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSampah" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('dashboard/sampah/kategori') ? 'active' : ''  }}" href="/dashboard/sampah/kategori">Kategori</a>
                        <a class="nav-link {{ Request::is('dashboard/sampah/jenis') ? 'active' : ''  }}" href="/dashboard/sampah/jenis">Jenis</a>
                        <!-- <a class="nav-link" href="#">Light Sidenav</a> -->
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('dashboard/stok') ? 'active' : ''}}" href="/dashboard/stok">
                    <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                    Data Stok
                </a>

                <a class="nav-link {{ Request::is('dashboard/profile/admin') ? 'active' : ''  }}" href="/dashboard/profile/admin">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                    Edit Profile
                </a>
                @endcan

                @can('pelanggan')
                <a class="nav-link {{ Request::is('dashboard/statuse') ? 'active' : '' }}" href="/dashboard/statuse">
                    <div class="sb-nav-link-icon"><i class="bi bi-exclamation-circle"></i></div>
                    Data Status Sampah
                </a>
                <a class="nav-link {{ Request::is('dashboard/stok') ? 'active' : ''}}" href="/dashboard/stok">
                    <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                    Data Stok
                </a>
                <a class="nav-link {{ Request::is('dashboard/profile/pelanggan') ? 'active' : ''  }}" href="/dashboard/profile/pelanggan">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                    Edit Profile
                </a>
                @endcan

                @can('petugas')
                <a class="nav-link {{ Request::is('dashboard/statuse') ? 'active' : ''}}" href="/dashboard/statuse">
                    <div class="sb-nav-link-icon"><i class="bi bi-exclamation-circle"></i></div>
                    Data Status Sampah
                </a>
                <a class="nav-link {{ Request::is('dashboard/transaksi') ? 'active' : ''  }}" href="/dashboard/transaksi">
                    <div class="sb-nav-link-icon"><i class="bi bi-reception-4"></i></div>
                    Data Transaksi
                </a>

                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSampah" aria-expanded="false" aria-controls="collapseSampah">
                    <div class="sb-nav-link-icon"><i class="bi bi-trash3"></i></div>
                    Data Sampah
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSampah" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ Request::is('dashboard/sampah/kategori') ? 'active' : ''}}" href="/dashboard/sampah/kategori">Kategori</a>
                        <a class="nav-link {{ Request::is('dashboard/sampah/jenis') ? 'active' : ''}}" href="/dashboard/sampah/jenis">Jenis</a>
                        <!-- <a class="nav-link" href="#">Light Sidenav</a> -->
                    </nav>
                </div>

                <a class="nav-link {{ Request::is('dashboard/stok') ? 'active' : ''}}" href="/dashboard/stok">
                    <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                    Data Stok
                </a>
                <a class="nav-link {{ Request::is('dashboard/profile/petugas') ? 'active' : ''  }}" href="/dashboard/profile/petugas">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                    Edit Profile
                </a>
                @endcan

                @can('mitra')
                <a class="nav-link {{ Request::is('dashboard/transaksi') ? 'active' : ''  }}" href="/dashboard/transaksi">
                    <div class="sb-nav-link-icon"><i class="bi bi-reception-4"></i></div>
                    Data Transaksi
                </a>
                <a class="nav-link {{ Request::is('dashboard/stok') ? 'active' : ''}}" href="/dashboard/stok">
                    <div class="sb-nav-link-icon"><i class="bi bi-box-seam"></i></div>
                    Data Stok
                </a>
                <a class="nav-link {{ Request::is('dashboard/profile/mitra') ? 'active' : ''  }}" href="/dashboard/profile/mitra">
                    <div class="sb-nav-link-icon"><i class="bi bi-person-circle"></i></div>
                    Edit Profile
                </a>
                @endcan
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->level }}
        </div>
    </nav>
</div>
