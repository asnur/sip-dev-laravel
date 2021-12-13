<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peta Perijinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="../assets/gambar/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- custom -->
    @if (isMobileDevice())
        <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endif


</head>

<body>

    <!-- Judul -->
    {{-- <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top"
        style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

        <div class="d-flex">
            <div class="col-md-1">
                <a type="button" class="badge badge-primary margin_new_menu_icon" id="close" data-dismiss="modal" aria-hidden="true">
                    <span class="material-icons">
                        arrow_back_ios
                    </span>
                </a>
            </div>

            <div class="col-md-9 margin_new_menu">{{ $title }}</div>
        </div>

    </div> --}}

    <!-- Content -->
    <div class="container margin_conten_permenu">

        @yield('lokasi')
        @yield('ekonomi')
        @yield('zonasi')
        @yield('kode_kbli')
        @yield('persil')
        @yield('poi')

    </div>



    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>



</body>

</html>
