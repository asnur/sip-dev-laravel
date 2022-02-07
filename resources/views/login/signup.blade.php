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
        <div class="container">
            <div class="col-sm-8 offset-sm-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4 text-center">
                <form class="rounded bg-white shadow p-3">
                    <div class="logo mb-2">
                        <img src="{{ asset('assets/gambar/mobile/logo_jakpintas_mobile.png') }}" class="img-fluid" alt="Logo" />
                    </div>
                    <h3 class="text-dark fw-bolder fs-4 mb-2">Create an Account</h3>

                    <div class="fw-normal text-muted mb-2">
                        Already have an account? <a href="/login-account" class="text-primary fw-bold text-decoration-none">Sign in here</a>
                    </div>

                    <div class="text-center text-muted text-uppercase mb-2">or</div>

                    <a href="#" class="btn btn-light login_with w-100 mb-4">
                        <img src="{{ asset('assets/gambar/mobile/google_logo.png') }}" class="img-fluid me-3">Sign in with Google</a>
                    </a>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingLastName" placeholder="name@example.com">
                        <label for="floatingLastName">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                        <label for="floatingInput">Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                        <span class="password-info mt-2">Use 8 or more characters with a mix of letters, numbers & symbols.</span>
                    </div>
                    <div class="form-check d-flex align-items-center">
                        <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                        <label class="form-check-label ms-2" for="gridCheck">
                            I Agree <a href="#">Terms and conditions</a>.
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary submit_btn w-100 my-4">Continue</button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
