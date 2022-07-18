<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta5
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Admin JakPintas</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    {{-- Datatables --}}
    <link href="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/vendor/datatables/buttons.dataTables.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.css"
        integrity="sha256-pODNVtK3uOhL8FUNWWvFQK0QoQoV3YA9wGGng6mbZ0E=" crossorigin="anonymous" />


    <link href="{{ asset('assets/admin/css/custom.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/admin/img/favicon.ico') }}" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <!-- CSS files -->
    <link href="{{ asset('assets/admin2/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin2/css/tabler-flags.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin2/css/tabler-payments.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin2/css/tabler-vendors.min.css') }}" rel="stylesheet" />
    {{--
    <link href="{{ asset('assets/admin2/css/demo.min.css') }}" rel="stylesheet" /> --}}

    {{-- For Kuesioner --}}
    <script src="{{ asset('assets/admin/js/jquery.min.js') }}"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @if (Request::is('admin/tambahKuesioner') or Request::is('admin/editKuesioner/*'))
    <link href="{{ asset('assets/admin2/css/kuesioner.css') }}" rel="stylesheet" />
    @endif

    @if (Request::is('admin/PerkembanganSurvey'))
    <style>
        .mapboxgl-popup-content {
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            /* max-height: 15rem; */
            overflow: hidden;
            width: 14rem;
            /* height: 15rem; */
        }

        /* .atur_margin_gambar_utama {
                position: relative;
                left: -2rem;
                width: 30.5rem;
                top: -1.6rem
            } */

        /* .atur_margin_gambar_utama2 {
                margin-top: -2.7rem !important;
                margin-left: -1rem !important;
            } */

        /* .slick-list{
                position: relative;
                top: -2.7rem;
                left: -2rem;
            } */

        .mapboxgl-popup-close-button {
            background-color: #fff !important;
        }

        .mapboxgl-popup-close-button:focus-visible {
            /* background-color: #fff !important; */
            outline: none;
        }
    </style>
    @endif

    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />



</head>

<body>

    <div class="wrapper">
        <aside style="border-right: 4px solid #B0B0B0; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;"
            class="navbar navbar-vertical navbar-expand-lg navbar-transparent">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark">
                    <a href="#">
                        <img width="70px" src="{{ asset('assets/admin2/img/logo_jakpintas.png') }}" alt="Logo Jakpintas"
                            class="" />
                    </a>
                    {{-- <div style="margin-right: 1rem; margin-left: 1rem;" class="">JAKPINTAS</div> --}}
                </h1>
                {{-- <div class="navbar-nav flex-row d-lg-none">
                    <div class="nav-item d-none d-md-flex me-3">
                        <div class="btn-list">
                            <a href="https://github.com/tabler/tabler" class="btn" target="_blank" rel="noreferrer">
                                <!-- Download SVG icon from http://tabler-icons.io/i/brand-github -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-github" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                </svg>
                                Source code
                            </a>
                            <a href="https://github.com/sponsors/codecalm" class="btn" target="_blank" rel="noreferrer">
                                <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-pink" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path
                                        d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572" />
                                </svg>
                                Sponsor
                            </a>
                        </div>
                    </div>
                    <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Enable dark mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                        </svg>
                    </a>
                    <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Enable light mode"
                        data-bs-toggle="tooltip" data-bs-placement="bottom">
                        <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <circle cx="12" cy="12" r="4" />
                            <path
                                d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                        </svg>
                    </a>
                    <div class="nav-item dropdown d-none d-md-flex me-3">
                        <a href="#" class="nav-link px-0" data-bs-toggle="dropdown" tabindex="-1"
                            aria-label="Show notifications">
                            <!-- Download SVG icon from http://tabler-icons.io/i/bell -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                    d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6" />
                                <path d="M9 17v1a3 3 0 0 0 6 0v-1" />
                            </svg>
                            <span class="badge bg-red"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card">
                            <div class="card">
                                <div class="card-body">
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                    Accusamus ad amet consectetur exercitationem fugiat in ipsa
                                    ipsum, natus odio quidem quod repudiandae sapiente. Amet
                                    debitis et magni maxime necessitatibus ullam.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">
                            <span class="avatar avatar-sm"
                                style="background-image: url(./static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div>Paweł Kuna</div>
                                <div class="mt-1 small text-muted">UI Designer</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Set status</a>
                            <a href="#" class="dropdown-item">Profile & account</a>
                            <a href="#" class="dropdown-item">Feedback</a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="#" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div> --}}
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="navbar-nav pt-lg-1">
                        <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home-admin') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Dashboard </span>
                            </a>
                        </li>

                        {{-- <div style="margin: 5px 0 5px 25px; font-weight: bold" class="page-pretitle">
                            INTERFACE
                        </div> --}}

                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                                data-bs-auto-close="false" role="button" aria-expanded="false">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                    <line x1="12" y1="12" x2="20" y2="7.5" />
                                    <line x1="12" y1="12" x2="12" y2="21" />
                                    <line x1="12" y1="12" x2="4" y2="7.5" />
                                    <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Pengaturan Akses</span>
                            </a>
                            <div class="dropdown-menu">
                                <div class="dropdown-menu-columns">
                                    <div class="dropdown-menu-column">
                                        <a class="dropdown-item" href="{{ route('user') }}">
                                            User
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </li> --}}

                        {{-- <li class="nav-item {{ (request()->is('admin/user')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('user') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-settings" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426 1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724 1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z">
                                        </path>
                                        <circle cx="12" cy="12" r="3"></circle>
                                    </svg>

                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 11 12 14 20 6" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Pengaturan Akses</span>
                            </a>
                        </li> --}}

                        <li class="nav-item {{ request()->is('admin/pegawaiAjib') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('pegawai') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users"
                                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>

                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 11 12 14 20 6" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                    </svg>
                                </span>
                                <span class="nav-link-title"> Pegawai AJIB </span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('admin/RekapInput') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kinerja-pegawai') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-chart-area-line" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="4 19 8 13 12 15 16 10 20 14 20 19 4 19"></polyline>
                                        <polyline points="4 12 7 8 11 10 16 4 20 8"></polyline>
                                    </svg>
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <polyline points="9 11 12 14 20 6" />
                                    <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                    </svg>
                                </span>
                                <span class="nav-link-title">Input AJIB</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('admin/PerkembanganSurvey') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('perkembangan-survey') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-report-analytics" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <desc>Download more icon variants from
                                            https://tabler-icons.io/i/report-analytics</desc>
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path
                                            d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2">
                                        </path>
                                        <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                                        <path d="M9 17v-5"></path>
                                        <path d="M12 17v-1"></path>
                                        <path d="M15 17v-3"></path>
                                    </svg>
                                </span>
                                <span class="nav-link-title">Survey Wilayah</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('admin/kosong') ? 'active' : '' }}">
                            <a class="nav-link" href="#">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-file-text" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                        </path>
                                        <line x1="9" y1="9" x2="10" y2="9"></line>
                                        <line x1="9" y1="13" x2="15" y2="13"></line>
                                        <line x1="9" y1="17" x2="15" y2="17"></line>
                                    </svg>

                                </span>
                                <span class="nav-link-title">Pendataan Usaha</span>
                            </a>
                        </li>

                        <li class="nav-item {{ request()->is('admin/kuesioner') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('kuesioner') }}">
                                <span class="nav-link-icon d-md-none d-lg-inline-block">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-file-text" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                        <path
                                            d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z">
                                        </path>
                                        <line x1="9" y1="9" x2="10" y2="9"></line>
                                        <line x1="9" y1="13" x2="15" y2="13"></line>
                                        <line x1="9" y1="17" x2="15" y2="17"></line>
                                    </svg>

                                </span>
                                <span class="nav-link-title">Kuesioner</span>
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </aside>
        <header class="navbar navbar-expand-md navbar-light d-none d-lg-flex d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                            aria-label="Open user menu">

                            <span class="avatar avatar-sm avatar-rounded"
                                style="background-image: url({{ asset('assets/admin/img/undraw_profile.svg') }})"></span>

                            <div class="d-none d-xl-block ps-2">
                                <div>Admin</div>
                                <div class="mt-1 small text-muted">JakPintas</div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item" onclick="logout()">
                                <!-- Download SVG icon from http://tabler-icons.io/i/logout -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon dropdown-item-icon" width="24"
                                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path
                                        d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2">
                                    </path>
                                    <path d="M7 12h14l-3 -3m0 6l3 -3"></path>
                                </svg>
                                Logout
                            </a>

                            <form method="POST" action="{{ route('logout') }}" id="form-logout">
                                @csrf</form>
                        </div>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-menu">

                </div>
            </div>
        </header>

        <div class="page-wrapper">


            @yield('content')


            {{-- <footer class="footer footer-transparent d-print-none">
                <div class="container-xl">
                    <div class="row text-center align-items-center flex-row-reverse">
                        <div class="col-lg-auto ms-lg-auto"></div>
                        <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                            <ul class="list-inline list-inline-dots mb-0">
                                <li class="list-inline-item">
                                    Copyright &copy; 2022
                                    <a href="." class="link-secondary">Tabler</a>. All rights
                                    reserved.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer> --}}
        </div>
    </div>
    <div class="modal modal-blur fade" id="modal-report" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">New report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="example-text-input"
                            placeholder="Your report name" />
                    </div>
                    <label class="form-label">Report type</label>
                    <div class="form-selectgroup-boxes row mb-3">
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input"
                                    checked />
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Simple</span>
                                        <span class="d-block text-muted">Provide only basic data needed for the
                                            report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                        <div class="col-lg-6">
                            <label class="form-selectgroup-item">
                                <input type="radio" name="report-type" value="1" class="form-selectgroup-input" />
                                <span class="form-selectgroup-label d-flex align-items-center p-3">
                                    <span class="me-3">
                                        <span class="form-selectgroup-check"></span>
                                    </span>
                                    <span class="form-selectgroup-label-content">
                                        <span class="form-selectgroup-title strong mb-1">Advanced</span>
                                        <span class="d-block text-muted">Insert charts and additional advanced analyses
                                            to be
                                            inserted in the report</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="mb-3">
                                <label class="form-label">Report url</label>
                                <div class="input-group input-group-flat">
                                    <span class="input-group-text">
                                        https://tabler.io/reports/
                                    </span>
                                    <input type="text" class="form-control ps-0" value="report-01" autocomplete="off" />
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="mb-3">
                                <label class="form-label">Visibility</label>
                                <select class="form-select">
                                    <option value="1" selected>Private</option>
                                    <option value="2">Public</option>
                                    <option value="3">Hidden</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Client name</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Reporting period</label>
                                <input type="date" class="form-control" />
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div>
                                <label class="form-label">Additional information</label>
                                <textarea class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                        Cancel
                    </a>
                    <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Create new report
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script> --}}

    <script>
        @if (!Request::is('admin/editKuesioner/*'))
            // hide btn
            $(".hide_textarea").hide();

            //  Start fungsi untuk mengatur select/ganti pertanyaan
            $(".group_opsi").hide();
            $(".radio").show();
        @endif

        function hideshow(selectOption) {
            get_img = $(selectOption).parents().parents().find(".upload_img_wrap");
            get_img.html("");

            cek = selectOption.parentNode.parentNode;

            cek.getElementsByClassName("group_opsi")[0].style.display = "none";
            cek.getElementsByClassName("group_opsi")[1].style.display = "none";
            cek.getElementsByClassName("group_opsi")[2].style.display = "none";
            cek.getElementsByClassName("group_opsi")[3].style.display = "none";
            console.log(cek.getElementsByClassName(selectOption.value)[0]);
            cek.getElementsByClassName(selectOption.value)[0].style.display = "block";
            getAllValues()
        }
    </script>

    <!-- Libs JS -->
    <script src="{{ asset('assets/admin2/libs/apexcharts/dist/apexcharts.min.js') }}"></script>

    <!-- Tabler Core -->
    <script src="{{ asset('assets/admin2/js/tabler.min.js') }}"></script>
    <script src="{{ asset('assets/admin2/js/demo.min.js') }}"></script>

    {{-- Add new --}}
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    {{-- <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script> --}}

    <!-- Page level plugins -->
    <script src="{{ asset('assets/admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('assets/admin/js/demo/chart-area-demo.js') }}"></script> --}}

    <script>
        var APP_URL = {!! json_encode(url('/')) !!}
        var creator = {!! json_encode(Auth::user()->name) !!}
        var date_now = {!! json_encode(date('Y-m-d')) !!}
    </script>

    {{-- <script src="{{ asset('assets/admin/js/demo/chart-pie-demo.js') }}"></script> --}}


    <script src="{{ asset('assets/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="https://cdn.datatables.net/fixedcolumns/4.1.0/js/dataTables.fixedColumns.min.js"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    {{-- <script src="{{ asset('assets/admin/vendor/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendor/datatables/jszip.min.js') }}"></script> --}}

    {{-- <script src="{{ asset('assets/admin/vendor/datatables/pdfmake.min.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.4/pdfmake.min.js"
        integrity="sha512-vCaf5rysVLu1/zVMefJew+IjqlQibggltPWqeo96XsdyJ4ihR3eEDV1oU60afiRXTGf8DqKUjLs2Q99HCbnjAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- <script src="{{ asset('assets/admin/vendor/datatables/vfs_fonts.js') }}"></script> --}}


    {{-- Datatables --}}
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js   "></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>





    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    @if (Request::is('admin'))
    <script src="{{ asset('assets/admin/js/monitoringMap.js') }}"></script>
    @endif

    @if (Request::is('admin/PerkembanganSurvey'))
    <script src="{{ asset('assets/admin/js/rekapSurveyMap.js') }}"></script>
    {{-- <script src="{{ asset('assets/admin/js/RekapSurvey.js') }}"></script> --}}
    @endif

    @if (Request::is('admin/tambahKuesioner') or Request::is('admin/editKuesioner/*'))
    <script src="{{ asset('assets/admin2/js/kuesioner.js') }}"></script>

    {{-- copy txt --}}
    @endif

    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script>
        $(".slick_filter_menu").slick({
            dots: false,
            arrows: false,
            variableWidth: true,
            infinite: false,
            swipeToSlide: true,
            // , centerMode: true
            slidesToShow: 6,
            slidesToScroll: 1
        });



        // $('.gambar_utama_slider_input').slick({

        //     slidesToShow: 1
        //     , slidesToScroll: 1
        //     , dots: false
        //     , focusOnSelect: true
        //     , variableWidth: true
        //     , infinite: false
        //     , arrows: false,

        //     // , asNavFor: '.image_slider_input'
        // });

        $('.image_slider_input').slick({
            slidesToShow: 7,
            lazyLoad: 'ondemand',
            slidesToScroll: 1,
            // asNavFor: '.gambar_utama_slider_input',
            dots: false,
            focusOnSelect: true,
            variableWidth: true,
            infinite: false,
            arrows: true

        });
    </script>




    <script src="{{ asset('assets/admin/js/admin.js') }}"></script>
    <script src="{{ asset('assets/admin/js/countTracking.js') }}"></script>

    <script>
        addText();
        dataTebaruRealtime();
        dataTebaruPerkembangan();
        // slideFoto();
    </script>



</body>

</html>