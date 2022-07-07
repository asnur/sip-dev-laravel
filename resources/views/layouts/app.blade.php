<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="Peta Perizinan dan Investasi DKI Jakarta">
    <meta name="description"
        content="Peta Perizinan dan Investasi oleh DKI Jakarta bekerja sama dengan DPMPTSP DKI Jakarta ">
    <meta name="og:title" content="Peta Perizinan dan Investasi DKI Jakarta">
    <meta name="og:description"
        content="Peta Perizinan dan Investasi oleh DKI Jakarta bekerja sama dengan DPMPTSP DKI Jakarta ">
    <meta name="twitter:title" content="Peta Perizinan dan Investasi DKI Jakarta">
    <meta name="twitter:description"
        content="Peta Perizinan dan Investasi oleh DKI Jakarta bekerja sama dengan DPMPTSP DKI Jakarta ">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JakPintas</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" /> --}}
    <link href="{{ asset('assets/admin/img/favicon.ico') }}" rel="icon">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/bootstrap/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">


    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" />

    <style type="text/tailwindcss">
        @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@300&family=Open+Sans&display=swap");

        body {
            font-family: "Montserrat", sans-serif;
        }

        .gradient_card {
            background: linear-gradient(158deg,
                    rgba(119, 91, 41, 1) 31%,
                    rgba(7, 69, 91, 1) 71%);
        }

        .btn_masuk {
            background: linear-gradient(90deg,
                    rgba(255, 123, 0, 0.9925012241224614) 48%,
                    rgba(247, 148, 29, 1) 63%);
        }

        .slogan {
            background-color: #0956c6;
        }

        .padding_slogan {
            padding-bottom: 2%;
        }

        .title_slogan {
            font-size: 11px
        }

        video {
            filter: brightness(80%);
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    spacing: {
                        13: "3.25rem",
                    },
                    fontFamily: {
                        family: ["Family"],
                    },
                },
            },
        };
    </script>

</head>

<body>
    <div id="app">
        {{-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
    </nav> --}}

        <main>
            @yield('content')
        </main>
    </div>
</body>


<script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>


<script>
    // $("#btn_toggle_login").click(function() {
    //     $(".konten_toggle_login").toggle();
    // });
    const video = () => {
        let index = Math.floor(1 + Math.random() * 5);
        $("#bg-video").attr('src', `/login-assets/video${index}.mp4`)
        console.log(index);
    }
    $(window).on('load', () => {
        video()
    })

    $("#bg-video").on("ended", () => {
        video()
    });
</script>

</html>


<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"></script>
