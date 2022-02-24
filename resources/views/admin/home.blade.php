@extends('layouts.template_admin')
@section('content')

<!-- Slick CSS -->
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Pengunjung</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800 inf-pengunjung" onload="visitorToday()">0
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Jumlah Titik</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($survey) }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-map-marked fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-4 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Pegawai
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                        {{ count($pegawai_ajib) }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        {{-- <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">

                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-12 col-sm-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Input Data Terbaru</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">

                            {{-- No Carousel --}}
                            {{-- <img src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{$la->foto}}" class="rounded" alt="Foto" style="width: 100%;height: 100%;"> --}}


                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner shadow-lg">

                                    @foreach ($latest as $la)
                                    <div class="carousel-item active">
                                        <img class="img_data_terbaru" src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{$la->foto}}" alt="First slide">
                                    </div>
                                    @endforeach

                                    {{-- <div class="carousel-item">
                                        <img class="d-block w-100" src="{{ asset('assets/tes.jpg') }}" alt="Second slide">
                                </div> --}}

                            </div>

                            {{-- Slider Carousel --}}
                            {{-- <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a> --}}
                        </div>


                    </div>

                    <div style="font-size: .85rem;" class="col-md-7">

                        <div class="row">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Nama AJIB
                                    <span style="margin-left: 25%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="name"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Judul
                                    <span style="margin-left: 46%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="judul"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Kelurahan
                                    <span style="margin-left: 27%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="kelurahan_ajib"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Kategori
                                    <span style="margin-left: 33%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="kategori"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Deskripsi
                                    <span style="margin-left: 30%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="deskripsi"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Permasalahan
                                    <span style="margin-left:11%">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="permasalahan"></p>
                            </div>
                        </div>

                        <div class="row jarak_text_data_terbaru">
                            <div class="col-md-4">
                                <p class="font-weight-bold">Solusi
                                    <span style="margin-left: 42%;">:</span>
                                </p>
                            </div>

                            <div class="col-md-8">
                                <p class="text_data_terbaru" id="solusi"></p>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Area Chart -->
    <div class="col-xl-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Traffic Pengunjung Selama <span class="jumlah_hari">0</span> Hari</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <div class="dropdown-header">Filter:</div>
                        <a class="dropdown-item" href="#" onclick="filterAnalytics(1)">1 Hari</a>
                        <a class="dropdown-item" href="#" onclick="filterAnalytics(8)">7 Hari</a>
                        <a class="dropdown-item" href="#" onclick="filterAnalytics(30)">30 Hari</a>
                        <a class="dropdown-item" href="#" onclick="filterAnalytics(90)">90 Hari</a>
                    </div>
                </div>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Pie Chart -->
    <div class="col-xl-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Kinerja Ajib</h6>
                {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Filter:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div> --}}
            </div>
            <!-- Card Body -->
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

    <div class="col-xl-12 col-sm-12">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Titik Lokasi Survey</h6>
                {{-- <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                aria-labelledby="dropdownMenuLink">
                                <div class="dropdown-header">Filter:</div>
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </div> --}}
            </div>
            <!-- Card Body -->
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
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_umkm">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        storefront
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">UMKM</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_umkm">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_umkm">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        storefront
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">UMKM</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_kampung_prioritas">

                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_kampung_prioritas">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        holiday_village
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">IMB Kampung Prioritas</span>
                                                </div>
                                            </div>
                                        </button>

                                    </div>

                                    <div class="off_layer_kampung_prioritas">

                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_kampung_prioritas">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        holiday_village
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">IMB Kampung Prioritas</span>
                                                </div>
                                        </button>

                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_dibangun">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_dibangun">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        more_time
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Sedang dibangun</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_dibangun">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_dibangun">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        more_time
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Sedang dibangun</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>


                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_pedestrian">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_pedestrian">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        add_road
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Pedestrian</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_pedestrian">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_pedestrian">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        add_road
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Pedestrian</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>


                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_cagarbudaya">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_cagar">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        location_city
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Cagar Budaya</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_cagarbudaya">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_cagarbudaya">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        location_city
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Cagar Budaya</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_rth">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_rth">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        park
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">RTH</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_rth">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_rth">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        park
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">RTH</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_dijual">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_dijual">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        real_estate_agent
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Dijual</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_dijual">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_dijual">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        real_estate_agent
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Dijual</span>
                                                </div>
                                        </button>
                                    </div>

                                </div>
                            </div>

                            <div class="slick_left p-1">
                                <div class="d-flex">

                                    <div class="on_layer_lainnya">
                                        <button class="btn btn-sm mb-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_lainnya">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        more
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Lainnya</span>
                                                </div>
                                            </div>
                                        </button>
                                    </div>

                                    <div class="off_layer_lainnya">
                                        <button class="btn btn-sm mb-2" style="background: orange; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_off_layer_lainnya">
                                            <div class="container">
                                                <div class="row">
                                                    <span class="material-icons text-primary mr-1">
                                                        more
                                                    </span>
                                                    <span class="font-weight-bold" style="margin-top: 2px">Lainnya</span>
                                                </div>
                                            </div>
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

</script>


</div>
@endsection
