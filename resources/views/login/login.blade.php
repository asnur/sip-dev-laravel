<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes">

    <title>Peta Perizinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="{{ asset('assets/gambar/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/login_mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap5.min.css') }}">

</head>
<body>
    <section class="pembungkus_login">

        @if(session()->has('loginError'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <form method="POST" action="{{ url('login-account') }}" class="rounded bg-white shadow py-3 px-4">
                    @csrf
                    <div class="logo mb-2">
                        <img src="{{ asset('assets/gambar/mobile/logo_jakpintas_mobile.png') }}" class="img-fluid" alt="Logo" />
                    </div>
                    <h3 class="text-dark fw-bolder fs-4 mb-3">Sign In to Jakpintas</h3>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@gmail.com" required autocomplete="email" autofocus value="{{ old('email') }}" />
                        <label for="email">Email address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required autocomplete="current-password" />
                        <label for="password">Password</label>
                    </div>
                    {{-- <div class="mt-3 text-end">
                        <div class="fw-normal text-muted">
                            New Here?
                            <a href="/signup-account" class="text-primary fw-bold text-decoration-none">Create an Account</a>
                        </div>
                    </div> --}}
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-3">
                        LOGIN
                    </button>
                    <div class="text-center text-muted text-uppercase mb-3">or</div>
                    <a href="{{ route('login-google') }}" class="btn btn-light login_with w-100 mb-3">
                        <img alt="Logo" src="{{ asset('assets/gambar/mobile/google_logo.png') }}" class="img-fluid me-3" />Continue with Google
                    </a>
                </form>
            </div>
        </div>
    </section>

        <script src="{{ asset('assets/js/bootstrap5.bundle.min.js') }}"></script>

</body>
</html>
