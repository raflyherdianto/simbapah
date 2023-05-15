<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Login Dashboard</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
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
<body class="text-center">
    <main class="form-signin">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('loginError') }}
            </div>
        @endif
        <form action="/login" method="POST" class="user">
            @csrf
            <img class="mb-4" src="/img/login.jpg" alt="" width="200">
            <h1 class="h3 mb-3 fw-normal">Please Login</h1>

            <div class="form-group mt-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    name="username" placeholder="Username" value="{{ old('username') }}">

                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" placeholder="Password">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
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
</body>
</html>
