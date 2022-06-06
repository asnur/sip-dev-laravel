@extends('layouts.template_admin')
@section('content')

<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
                <!-- Page pre-title -->
                <!-- <div class="page-pretitle">Overview</div> -->
                <h2 class="page-title">Dashboard</h2>
            </div>
            <!-- Page title actions -->
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <!-- konten disini -->

        <div class="row row-cards">

            <div class="col-md-6 col-xl-4">

                <div class="card">

                    {{-- <div class="ribbon ribbon-top bg-primary">
                        <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div> --}}
                    <div class="card-status-top bg-primary"></div>

                    <div class="card-header">

                        <div class="row">

                            <div class="col-md-9">
                                <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem;" class="card-title text-break text-primary">Pengunjung 7 Hari Terakhir</h3>
                            </div>

                            <div class="col-md-3">

                                <span class="bg-blue text-white avatar">
                                    {{-- <i class="fas fa-user fa-2x text-white"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    </svg>
                                </span>
                            </div>

                        </div>


                    </div>


                    <div class="card-body">
                        {{-- <div class="h5 mb-0 font-weight-bold inf-pengunjung" onload="visitorToday()">0
                        </div> --}}
                        <div style="font-size:40px;" class="h2 m-0 inf-pengunjung" onload="visitorToday()">
                            <div style="width: 17.7rem; height:3.5rem;" class="skeleton-image">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-md-6 col-xl-4">

                <div class="card">
                    {{--
                    <div class="ribbon ribbon-top bg-success">
                        <i class="fas fa-map-marked fa-2x text-gray-300"></i>
                    </div> --}}
                    <div class="card-status-top bg-success"></div>

                    <div class="card-header">


                        <div class="row">
                            <div class="col-md-9">
                                <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem" class="card-title text-break text-success">
                                    Titik Tercatat
                                </h3>
                            </div>

                            <div class="col-md-3">
                                <span class="bg-success text-white avatar">

                                    {{-- <i class="fas fa-user fa-2x text-white"></i> --}}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <line x1="18" y1="6" x2="18" y2="6.01"></line>
                                        <path d="M18 13l-3.5 -5a4 4 0 1 1 7 0l-3.5 5"></path>
                                        <polyline points="10.5 4.75 9 4 3 7 3 20 9 17 15 20 21 17 21 15"></polyline>
                                        <line x1="9" y1="4" x2="9" y2="17"></line>
                                        <line x1="15" y1="15" x2="15" y2="20"></line>
                                    </svg>

                                </span>
                            </div>
                        </div>


                    </div>

                    <div class="card-body">
                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($survey) }}</div> --}}
                    <div style="font-size:40px;" class="h2 m-0">{{ count($survey) }}
                    </div>


                </div>

            </div>

        </div>


        <div class="col-md-6 col-xl-4">

            <div class="card">

                {{-- <div class="ribbon ribbon-top bg-yellow">
                        <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div> --}}
                <div class="card-status-top bg-orange"></div>

                <div class="card-header">



                    <div class="row">
                        <div class="col-md-9">
                            <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem" class="card-title text-break text-orange">
                                Pegawai Terdaftar
                            </h3>
                        </div>

                        <div class="col-md-3">
                            <span class="bg-orange text-white avatar">
                                {{-- <i class="fas fa-user fa-2x text-white"></i> --}}
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                        </div>
                    </div>



                </div>


                <div class="card-body">
                    <div style="font-size:40px;" class="h2 m-0">{{ count($pegawai_ajib) }}</div>

                    {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($pegawai_ajib) }}
                </div> --}}

            </div>
        </div>

    </div>

</div>

<div style="margin-top: 1rem" class="row row-cards">
    <div class="col-md-12 col-xl-12">

        <div class="card">
            <div class="card-status-top bg-danger"></div>

            <div class="card-header card-header-light">
                <h3 class="card-title">Input Data Terbaru</h3>

                <div class="card-actions">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            {{-- <span class="avatar" style="background-image: url({{ asset('assets/admin/img/logo_jakpintas.png') }})"></span> --}}

                            {{-- <div id="photo_ajib"></div>
                                    <div id="photo_ajib2"></div> --}}

                        </div>
                        {{-- <div class="col">
                                    <div class="card-title" id="name"></div>
                                    <div class="card-subtitle">Ajib Wilayah</div>
                                </div> --}}
                    </div>
                </div>

            </div>

            <div class="card-body">

                <div class="row">



                    <div class="col-md-6 mt-2">
                        {{-- <div id="gambar_utama"></div>
                                <div id="gambar_utama2"></div> --}}

                        <div class="gambar_utama_slider_input2">

                        </div>


                    </div>

                    <div class="col-md-6 mt-2">

                        <div class="row">
                            <div style="width: 40rem; height:2.5rem;" class="col-md-12">


                                <div class="row">
                                    <div class="col-md-2">

                                        <div id="photo_ajib">
                                            <div class="ratio ratio-1x1 card-img-left">
                                                {{-- <div style="width: 3rem; height:3.5rem;" class="skeleton-image">
                                                </div> --}}
                                            </div>
                                        </div>

                                        <div id="photo_ajib2"></div>

                                    </div>

                                    <div style="margin-left:-1.3rem;" class="col-md-10 mt-1">
                                        <div class="text-truncate">
                                            <span class="h4" id="name">
                                                {{-- <div class="skeleton-heading"></div> --}}
                                            </span>
                                        </div>
                                        <div class="mt-1">
                                            <span id="penempatan">
                                                {{-- <div style="margin-top:-0.7rem;" class="skeleton-heading"></div> --}}
                                            </span>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <hr>

                        {{-- <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Nama AJIB <span style="margin-left: 1.7rem;">:</span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru text-break" style="width: 16.5rem;">
                                    <span id="name">
                                        <div class="skeleton-heading"></div>
                                    </span>
                                </div>
                            </div>
                        </div> --}}


                        <div class="row" style="margin-top:-1.4rem;">
                            <div class="col-md-3">
                                <label class="form-label">Judul <span style="margin-left: 3.7rem;"> </span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru">
                                    <span id="judul">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                    {{-- <span id="judul"> --}}
                                    {{-- <div class="skeleton-heading"></div> --}}
                                    {{-- </span> --}}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Kelurahan <span style="margin-left: 1.9rem;">:</span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru text-break" style="width: 16.5rem;">
                                    <span id="kelurahan_ajib">
                                        <div class="skeleton-heading"></div>
                                    </span>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Kategori <span style="margin-left: 2.5rem;"> </span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru">
                                    <span id="kategori">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Deskripsi <span style="margin-left: 2.2rem;"> </span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru">
                                    <span id="deskripsi">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Permasalahan <span style="margin-left: 0.3rem;"> </span> </label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru">
                                    <span id="permasalahan">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                    <span id="kepok">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label class="form-label">Solusi <span style="margin-left: 3.5rem;"> </span></label>
                            </div>
                            <div class="col-md-9">
                                <div class="col text_data_terbaru">
                                    <span id="solusi">
                                        {{-- <div class="skeleton-heading"></div> --}}
                                    </span>
                                </div>
                            </div>
                        </div>


                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12 mt-2">

                        <div class="image_slider_input">
                            @php
                            $no=1;
                            @endphp

                            @foreach ($get_id as $gi)

                            <div>
                                <img class="img_child img_child_id" data-id="{{$gi->id}}" src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{$gi->foto}}" alt="Image Child">
                            </div>

                            @endforeach
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div>


<div style="margin-top: 1rem" class="row row-cards">
    <div class="col-12">
        <div class="card">
            <div class="card-status-top bg-primary"></div>
            <div class="card-body">
                <div class="d-flex">
                    <h3 class="card-title">Traffic Pengunjung Selama <span class="jumlah_hari">0</span> Hari</h3>
                    <div class="ms-auto">
                        <div class="dropdown">
                            <a class="dropdown-toggle text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter :</a>
                            <div class="dropdown-menu dropdown-menu-end">
                                {{-- <a class="dropdown-item" onclick="filterAnalytics(1)">1 Hari</a> --}}
                                <a class="dropdown-item" onclick="filterAnalytics(7)">7 Hari</a>
                                <a class="dropdown-item" onclick="filterAnalytics(30)">30 Hari</a>
                                <a class="dropdown-item" onclick="filterAnalytics(90)">90 Hari</a>
                            </div>
                        </div>
                    </div>
                </div>



                <div style=" position: relative; height: 15rem; width: 100%;">
                    {{-- <div class="skeleton_chart"></div> --}}
                    <div class="uk_chart_skeleton skeleton-image"></div>
                    <canvas id="chart-pengunjung">
                    </canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="margin-top: 1rem" class="row row-cards">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-status-top bg-success"></div>
            <div class="card-header">
                <h3 class="card-title">Kinerja AJIB</h3>
            </div>

            <div class="card-body">
                <table class="display table table-striped" id="table-surveyer">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Penempatan</th>
                            <th>Jumlah Titik</th>
                            <th>Jarak Tempuh</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai_ajib as $pa)
                        <tr>
                            <td>{{ $pa->name }}</td>
                            <td>{{ $pa->penempatan }}</td>
                            <td>{{ $pa->survey_count }}</td>
                            <td class="contractin ajib-{{ $pa->id }}" onload="addText({!! $pa->id !!})"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div style="margin-top: 1rem" class="row row-cards">
    <div class="col-md-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <div class="card-status-top bg-warning"></div>
                <h3 class="card-title">Titik Lokasi Survey</h3>
            </div>
            <div class="card-body">
                <div style="width: 100%;height:70vh" id="map">

                    <div style="z-index: 9; position:absolute;" class="container mt-2">

                        {{-- radion --}}
                        <div class="d-none">
                            <input type="radio" id="radio_umkm" name="radio_menu" value="radio_umkm">
                            <input type="radio" id="radio_kampung_prioritas" name="radio_menu" value="radio_kampung_prioritas">
                            <input type="radio" id="radio_dibangun" name="radio_menu" value="radio_dibangun">
                            <input type="radio" id="radio_pedestrian" name="radio_menu" value="radio_pedestrian">
                            <input type="radio" id="radio_cagar" name="radio_menu" value="radio_cagar">
                            <input type="radio" id="radio_rth" name="radio_menu" value="radio_rth">
                            <input type="radio" id="radio_dijual" name="radio_menu" value="radio_dijual">
                            <input type="radio" id="radio_lainnya" name="radio_menu" value="radio_lainnya">
                        </div>

                        <div class="slick_filter_menu">

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_umkm">

                                        <button id="btn_umkm" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                storefront
                                            </span>
                                            <div style="font-weight: bold" class="text-muted">UMKM</div>
                                        </button>

                                    </div>

                                    <div class="off_layer_umkm">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_umkm" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                storefront
                                            </span>

                                            <div style="font-weight: bold" class="text-muted">UMKM</div>

                                        </button>

                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_kampung_prioritas">

                                        <button id="btn_kampung_prioritas" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                holiday_village
                                            </span>
                                            <div style="font-weight: bold" class="text-muted">IMB Kampung Prioritas</div>
                                        </button>

                                    </div>

                                    <div class="off_layer_kampung_prioritas">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_kampung_prioritas" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                holiday_village </span>

                                            <div style="font-weight: bold" class="text-muted">IMB Kampung Prioritas</div>

                                        </button>

                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_dibangun">

                                        <button id="btn_dibangun" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                more_time
                                            </span>
                                            <div style="font-weight: bold" class="text-muted">Sedang dibangun</div>
                                        </button>

                                    </div>

                                    <div class="off_layer_dibangun">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_dibangun" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                more_time </span>

                                            <div style="font-weight: bold" class="text-muted">Sedang dibangun</div>

                                        </button>

                                    </div>


                                </div>
                            </div>


                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_pedestrian">

                                        <button id="btn_pedestrian" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                add_road </span>
                                            <div style="font-weight: bold" class="text-muted">Pedestrian</div>
                                        </button>

                                    </div>


                                    <div class="off_layer_pedestrian">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_pedestrian" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                add_road </span>

                                            <div style="font-weight: bold" class="text-muted">Pedestrian</div>

                                        </button>

                                    </div>


                                </div>
                            </div>


                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_cagarbudaya">

                                        <button id="btn_cagar" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                location_city </span>
                                            <div style="font-weight: bold" class="text-muted">Cagar Budaya</div>
                                        </button>

                                    </div>

                                    <div class="off_layer_cagarbudaya">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_cagarbudaya" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                location_city </span>

                                            <div style="font-weight: bold" class="text-muted">Cagar Budaya</div>

                                        </button>

                                    </div>


                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_rth">

                                        <button id="btn_rth" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                park </span>
                                            <div style="font-weight: bold" class="text-muted">RTH</div>
                                        </button>

                                    </div>

                                    <div class="off_layer_rth">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_rth" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                park </span>

                                            <div style="font-weight: bold" class="text-muted">RTH</div>

                                        </button>

                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_dijual">

                                        <button id="btn_dijual" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                real_estate_agent </span>
                                            <div style="font-weight: bold" class="text-muted">Dijual</div>
                                        </button>

                                    </div>


                                    <div class="off_layer_dijual">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_dijual" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                real_estate_agent </span>

                                            <div style="font-weight: bold" class="text-muted">Dijual</div>

                                        </button>

                                    </div>


                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_lainnya">

                                        <button id="btn_lainnya" class="btn btn-light btn-pill w-100">
                                            <span class="icon material-icons text-primary">
                                                more </span>
                                            <div style="font-weight: bold" class="text-muted">Lainnya</div>
                                        </button>

                                    </div>


                                    <div class="off_layer_lainnya">

                                        <button style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000; border-color:orange;" id="btn_off_layer_lainnya" class="btn btn-pill w-100">

                                            <span class="icon material-icons text-primary">
                                                more </span>

                                            <div style="font-weight: bold" class="text-muted">Lainnya</div>

                                        </button>

                                    </div>


                                </div>
                            </div>




                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

</div>
</div>

{{-- Jquery | Slick --}}
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Slick JS -->
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(".slick_filter_menu").slick({
        dots: false
        , arrows: false
        , variableWidth: true
        , infinite: false
        , swipeToSlide: true,
        // , centerMode: true
        slidesToShow: 6
        , slidesToScroll: 1
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
        slidesToShow: 5
        , slidesToScroll: 1
        , asNavFor: '.gambar_utama_slider_input'
        , dots: false
        , focusOnSelect: true
        , variableWidth: true
        , infinite: true
        , arrows: true


    });

</script>





@endsection
