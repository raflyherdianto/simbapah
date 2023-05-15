<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Register - Mitra</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <link href="/css/signin.css" rel="stylesheet">
</head>
<body class="">
    <main class="form-signin">
        {{-- @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
            </div>
        @endif --}}
        <form action="/register-mitra" method="POST" class="user" enctype="multipart/form-data">
            @csrf
            <img class="mb-4" src="/img/login.jpg" alt="" width="200">
            <h1 class="h3 mb-3 fw-normal text-center">Register Mitra</h1>

            <div class="form-group mt-3">
                <label for="username" class="form-label fs-6 text-left">Username</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" placeholder="Username" value="{{ old('username') }}">
                @error('username')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="password" class="form-label fs-6">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nama" class="form-label fs-6">Nama Mitra</label>
                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                    name="nama" placeholder="Nama Usaha">
                @error('nama')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="nomor_usaha" class="form-label fs-6">Nomor Usaha</label>
                <input type="text" class="form-control @error('nomor_usaha') is-invalid @enderror" id="nomor_usaha"
                    name="nomor_usaha" placeholder="Nomor Usaha">
                @error('nomor_usaha')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="alamat" class="form-label fs-6">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                    name="alamat" placeholder="Alamat">
                @error('alamat')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="provinsi" class="form-label fs-6">Provinsi</label>
                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" id="provinsi"
                    name="provinsi" placeholder="Provinsi">
                @error('provinsi')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="kota" class="form-label fs-6">Kota</label>
                <input type="text" class="form-control @error('kota') is-invalid @enderror" id="kota"
                    name="kota" placeholder="Kota">
                @error('kota')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="kecamatan" class="form-label fs-6">Kecamatan</label>
                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" id="kecamatan"
                    name="kecamatan" placeholder="Kecamatan">
                @error('kecamatan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="kelurahan" class="form-label fs-6">Kelurahan</label>
                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" id="kelurahan"
                    name="kelurahan" placeholder="Kelurahan">
                @error('kelurahan')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="kode_pos" class="form-label fs-6">Kode Pos</label>
                <input type="text" class="form-control @error('kode_pos') is-invalid @enderror" id="kode_pos"
                    name="kode_pos" placeholder="Kode Pos">
                @error('kode_pos')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="no_hp" class="form-label fs-6">No HP</label>
                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" placeholder="No HP">
                @error('no_hp')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="rekening" class="form-label fs-6">Nomor Rekening</label>
                <input type="text" class="form-control @error('rekening') is-invalid @enderror" id="rekening"
                    name="rekening" placeholder="Nomor Rekening">
                @error('rekening')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="foto" class="form-label fs-6">Upload Foto</label>
                <img class="img-preview img-fluid mb-3 col-sm-5">
                <input class="form-control" type="file" id="foto" name="foto"
                onchange="previewImage()">
            </div>
            <div class="form-group mt-3">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
            </div>
        </form>
        <footer id="footer">
            <div class="container">
                <div class="copyright text-center mt-5">
                    &copy; Copyright <strong>SIMBAPAH 2022</strong>. All Rights Reserved
                </div>
            </div>
        </footer>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>
<script>
    function previewImage() {
        const foto = document.querySelector('#foto');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
