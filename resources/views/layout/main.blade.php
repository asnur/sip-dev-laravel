<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>Peta Perizinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="{{ asset('assets/gambar/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.css" type="text/css">
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">


    <meta name="csrf-token" content="{{ csrf_token() }}" />


    @if (isMobileDevice())


    <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
    @else
    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endif




</head>

<body>



    <!-- hide -->
    <button class="btn btn_hide_side_bar for_web" type="button" id="hide_side_bar">
        <i class="btn_icon_hide ri-arrow-left-s-fill fa-2x"></i>
    </button>

    <!-- show -->
    <button class="btn btn_show_side_bar for_web" type="button" id="show_side_bar">
        <i class="btn_icon_show ri-arrow-right-s-fill fa-2x"></i>
    </button>






    <div id="profil">

        <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top" style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

            <div class="d-flex">
                <div class="col-md-1">

                    {{-- <a type="button" class="badge badge-primary margin_new_menu_icon" id="btn_backprodil">
                        <span class="material-icons size_icons">
                            arrow_back_ios
                        </span>
                    </a> --}}

                    <span class="material-icons size_icons margin_new_menu_icon" id="btn_backprodil">
                        arrow_back_ios
                    </span>


                </div>

                <div class="col-md-9 margin_new_menu">Profil</div>
            </div>

        </div>


        <div style="margin-top: 5rem;" class="container">

            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Lokasi</p>

            <div class="d-flex space_judul row_mid_judul">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Koordinat</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-kordinat rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Kelurahan</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-kelurahan rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Kecamatan</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-kecamatan rata_text_mobile break_all">-</p>
                </div>
            </div>


            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Wilayah</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-kota rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Luas</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-luasarea rata_text_mobile break_all">-</p>
                </div>
            </div>


            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Kepadatan</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-kepadatan rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Rasio Gini</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="inf-rasio rata_text_mobile break_all">-</p>
                </div>
            </div>



            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Persil</p>

            <div class="d-flex space_judul row_mid_judul">
                <div class="col-md-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Kegiatan</label>
                </div>
                <div class="col-md-7 text_all_permenu">
                    <p class="inf-eksisting rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Perkiraan Harga</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-harganjop rata_text_mobile">-</p>
                </div>
            </div>


            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Tipe Hak</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-tipehak rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Luas</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-luasbpn rata_text_mobile break_all">-</p>
                </div>
            </div>


            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Zonasi</p>

            <div class="d-flex space_judul row_mid_judul">
                <div class="col-md-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Zona</label>
                </div>
                <div class="col-md-7 text_all_permenu">
                    <p class="inf-zona rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Sub Zona</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-subzona rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">Blok/Subblok</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-blok rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">TPZ</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-tpz rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">CD_TPZ</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-cdtpz rata_text_mobile">
                        {{-- <select class="w-100" id="selectTPZ"></select> --}}
                    </p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">KDH</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-kdh rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">KLB</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-klb rata_text_mobile break_all">-</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all_permenu">
                    <label class="text_all_mobile_permenu">KDB</label>
                </div>
                <div class="col-lg-7 text_all_permenu">
                    <p class="inf-kdb rata_text_mobile break_all">-</p>
                </div>
            </div>



            {{-- <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Ketentuan Bangunan
            </p>
            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-12 text_all">
                    <label class="inf-gsb">
                        -
                    </label>
                </div>
            </div> --}}

            {{-- <div class="d-flex space_text row_mid_text">
                <div class="col-lg-12 text_all">
                    <label class="inf-k-tpz w-100">
                        -
                    </label>
                </div>
            </div> --}}



        </div>



    </div>


    <div id="ekonomi">

        <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top" style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

            <div class="d-flex">
                <div class="col-md-1">
                    <a type="button" class="badge badge-primary margin_new_menu_icon" id="btn_backeko">
                        <span class="material-icons margin_new_menu_icon size_icons">
                            arrow_back_ios
                        </span>
                    </a>
                </div>

                <div class="col-md-9 margin_new_menu">Ekonomi</div>
            </div>

        </div>


        <div style="margin-top: 5.5rem;" class="container">

            <div class="d-flex space_judul row_mid_judul">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_permenu_mobile_permenu">Pelaku IUMK</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p><span class="inf-iumk rata_text_mobile break_all">-</span> <span>orang</span></p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                    <label class="text_all_permenu_mobile_permenu">Total Omzet</label>
                </div>
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                    <p class="rata_text_mobile">Rp.<span class="inf-omzet">-</span> <span>per bulan</span></p>
                </div>
            </div>


            <div class="d-flex margin_chart_ekonomi_mobile">
                <canvas id="pie-chart" width="70" height="50"></canvas>
            </div>

            <div class="d-flex margin_chartline_ekonomi_mobile">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 mt-4">
                    <canvas id="bar-chart-grouped" width="130" height="150"></canvas>
                </div>
            </div>


            <p class="card-title mb-3 mt-3  text-center font-weight-bold judul_utama text_all_permenu">Pendapatan
                Rata-Rata
                Per Bulan</p>

            <!-- Ekonomi pendapatan baru start -->

            <div class="container_grid">



                <div>
                    <label>0 - 5 juta</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-05">-</label>
                </div>

                <div>
                    <label>6 - 10 Juta</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-610">-</label>
                </div>

                <div>
                    <label>11 - 15 Juta</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-1115">-</label>
                </div>

                <div>
                    <label>16 - 20 Juta</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-1620">-</label>
                </div>

                <div>
                    <label>> 20 Juta</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-20">-</label>
                </div>


                <div class="mb-4">
                    <label>N/A</label>
                </div>
                <div class="col_info">
                    <label class="inf-pen-na">-</label>
                </div>


            </div>


        </div>

    </div>




    <div id="akses">

        <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top" style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

            <div class="d-flex">
                <div class="col-md-1">
                    <a type="button" class="badge badge-primary margin_new_menu_icon" id="btn_backakses">
                        <span class="material-icons margin_new_menu_icon size_icons">
                            arrow_back_ios
                        </span>
                    </a>
                </div>

                <div class="col-md-9 margin_new_menu">Akses</div>
            </div>

        </div>


        <div style="margin-top: 5.2rem;" class="container">


            <div class="form-group w-100 mt-3 mb-0 ml-3" id="radiusSlide">
                <label class="font-weight-bold font_range_input" for="formControlRange">Radius</label>
                <label class="font-weight-bold font_range_input" id="OutputControlRange">0 Km</label>

                <input type="range" style="height: 6px;" class="form-control-range" id="ControlRange" min="500" max="3000" step="500" value="1000">
            </div>
            <br>
            <div class="accordion tabListFasilitas" id="PoiCollabse">


            </div>

        </div>

    </div>


    <div id="kbli">

        <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top" style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

            <div class="d-flex">
                <div class="col-md-1">
                    <a type="button" class="badge badge-primary margin_new_menu_icon" id="btn_backkbli">
                        <span class="material-icons size_icons">
                            arrow_back_ios
                        </span>
                    </a>
                </div>

                <div class="col-md-9 margin_new_menu">KBLI</div>
            </div>

        </div>


        <div style="margin-top: 5.5rem;" class="container">




            <div class="d-flex ml-5 margin_cari_kodelbli_mobile">
                <div class="col-md-12 text_all">
                    <label class="text_all_mobile_kbli">Kegiatan Ruang</label>
                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                        <select class="form-control text_all" id="kegiatanRuang" style="z-index: 9999">

                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex ml-5 skala_kodekbli margin_cari_kodelbli_mobile">
                <div class="col-md-12 text_all">
                    <label class="text_all_mobile_kbli">Skala</label>
                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                        <select class="form-control" id="skala">

                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex ml-5 skala_kodekbli margin_cari_kodelbli_mobile">
                <div class="col-md-12 text_all">
                    <label class="text_all_mobile_kbli">Kegiatan Kewenangan</label>
                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                        <select class="form-control" id="kegiatanKewenangan">

                        </select>
                    </div>
                </div>
            </div>

            <div class="dtKBLI">

            </div>

            {{-- <button class="btn btn-sm text-primary ml-0" id="btn-print">
                <i class="fa fa-print"></i></button> --}}

            <div class="d-flex margin_chart_ekonomi_mobile">
                <canvas id="pie-chart-kbli" width="70" height="50" style="position:absolute;z-index: -999; display:none"></canvas>
            </div>

            <div class="d-flex margin_chartline_ekonomi_mobile">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  mt-4">
                    <canvas id="bar-chart-grouped-kbli" width="90" height="80" style="display: none;position:absolute;"></canvas>
                </div>
            </div>








        </div>

    </div>

    <div id="form_ajib">

        <main role="main" class="container-fluid py-2">

            <form action="{{ route('ajib.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-outline mb-xs-2 mb-1 md-4">
                    {{-- <label class="form-label text-muted" for="koordinat">Koordinat</label> --}}
                    <input required type="hidden" id="kordinatPin" placeholder="Pilih Titik Lokasi" name="koordinat" class="form-control" />
                </div>

                <div class="form-outline mb-xs-2 mb-1 md-4">
                    <label class="form-label text-muted" for="judul">Judul</label>
                    <input required type="text" name="judul" class="form-control" placeholder="Masukan Judul Tempat" />
                </div>

                <div class="form-outline mb-xs-2 mb-2 md-4">
                    <label class="form-label text-muted">Kategori</label>

                    <select required name="kategori" class="form-control">
                        <option selected="selected">- Pilih -</option>
                        <option value="UMK">UMK</option>
                        <option value="Sedang dibangun">Sedang dibangun</option>
                        <option value="Pedestrian">Pedestrian</option>
                        <option value="Cagar Budaya">Cagar Budaya</option>
                        <option value="RTH">RTH</option>
                        <option value="Dijual">Dijual</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>


                <div style="margin-top:12px;" class="form-outline mb-xs-2 mb-2 md-4">
                    <div class="input-group custom-file-button">
                        <label class="input-group-text" for="image">Upload Gambar</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                </div>


                <div class="form-outline mb-xs-2 mb-2 md-4">
                    <label for="catatan">Catatan</label>

                    <textarea class="form-control" id="catetan" placeholder="Masukan Catatan" name="catatan" rows="3"></textarea>

                </div>


                <button type="submit" name="submit" class="btn btn_ajib1 btn-block mb-xs-2 mt-3 mb-md-4 col mb-3 text-light rounded">
                    <strong>Simpan</strong>
                </button>

            </form>

        </main>
    </div>

    <div class="pembungkus " id="sidebar">
        <div class="dalam">

            <div class="pos_ajib">
                <div class="collapse" id="collapseExample">
                    <div style="background-color: #fff; padding: 20px; border-radius:10px;">
                        <main role="main" class="container-fluid">

                            <form action="{{ route('ajib.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-outline mb-xs-2 mb-1 md-4">
                                    {{-- <label class="form-label text-muted" for="koordinat">Koordinat</label> --}}
                                    <input required type="hidden" id="kordinatPin" placeholder="Pilih Titik Lokasi" name="koordinat" class="form-control" />
                                </div>

                                <div class="form-outline mb-xs-2 mb-1 md-4">
                                    <label class="form-label text-muted" for="judul">Judul</label>
                                    <input required type="text" name="judul" class="form-control" placeholder="Masukan Judul Tempat" />
                                </div>

                                <div class="form-outline mb-xs-2 mb-2 md-4">
                                    <label class="form-label text-muted">Kategori</label>

                                    <select required name="kategori" class="form-control">
                                        <option selected="selected">- Pilih -</option>
                                        <option value="UMK">UMK</option>
                                        <option value="Sedang dibangun">Sedang dibangun</option>
                                        <option value="Pedestrian">Pedestrian</option>
                                        <option value="Cagar Budaya">Cagar Budaya</option>
                                        <option value="RTH">RTH</option>
                                        <option value="Dijual">Dijual</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>


                                <div style="margin-top:12px;" class="form-outline mb-xs-2 mb-2 md-4">
                                    <div class="input-group custom-file-button">
                                        <label class="input-group-text" for="image">Upload Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                </div>


                                <div class="form-outline mb-xs-2 mb-2 md-4">
                                    <label for="catatan">Catatan</label>

                                    <textarea class="form-control" id="catetan" placeholder="Masukan Catatan" name="catatan" rows="3"></textarea>

                                </div>


                                <button type="submit" name="submit" class="btn btn_ajib1 btn-block mb-xs-2 mt-3 mb-md-4 col mb-3 text-light rounded">
                                    <strong>Simpan</strong>
                                </button>

                            </form>

                        </main>
                    </div>
                </div>
            </div>


            <!-- Judul -->
            <div class="kotak_judul for_web">
                <div class="dalam_kotakjudul">
                    <div>
                        <div class="text-center">
                            <img src="assets/gambar/logo_jakpintas.png" width="70px">
                        </div>
                    </div>
                    <div style="margin-top: 5%;">
                        <p><span class="TextHead font-weight-bold">Peta Perijinan dan Investasi</span></p>
                    </div>
                </div>
            </div>
            <!-- End Judul -->




            <div class="card-body color_card_body">

                <!-- Search -->
                <div class="search_mobile">

                    <!-- row dihapus/ yg tampilan web jd gaa responsive -->
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                            <!-- Search Mobile -->

                            <div class="tempat_search for_mobile fixed-top searchh">




                                <div class="search_box">
                                    <span class="menu">

                                        <div class="gambar_logos" style="margin-top:85%;">
                                            <img src="./assets/gambar/logo_jakpintas.png" width="70px">
                                        </div>

                                        <button style="display: none;" class="btn btn-lg tombol_search border-0 borderdropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars fa-lg"></i>
                                        </button>

                                        <!-- silent dropdown -->
                                        <div class="dropdown-menu w_checkbox_dropdown_mobile" aria-labelledby="dropdownMenuButton">

                                            <img src="./assets/gambar/logo_jakpintas.png" width="60px" class="ml-4 img-fluid" alt="Responsive image">


                                            <div class="layout_checkbox_mobile">

                                                {{-- <div class="form-check zoning_fill">
                                                        <input type="checkbox" class="form-check-input" checked id="zoning_fill">
                                                        <label class="form-check-label  text_all" for="zoning_fill">Peta
                                                            Zonasi</label>
                                                    </div> --}}

                                                {{-- <div class="form-check wilayahindex_fill mt-1">
                                                        <input type="checkbox" class="form-check-input" id="wilayahindex_fill">
                                                        <label class="form-check-label  text_all" for="wilayahindex_fill">Total Omzet Usaha Mikro
                                                            Kecil</label>
                                                    </div> --}}

                                                <div class="form-check pipa_multilinestring mt-1">
                                                    <input type="checkbox" class="form-check-input" id="pipa_multilinestring">
                                                    <label class="form-check-label  text_all" for="pipa_multilinestring">Jaringan Pipa PDAM</label>
                                                </div>

                                                <div class="form-check banjir_fill mt-1">

                                                    <input type="checkbox" class="form-check-input" id="banjir_fill">
                                                    <label class="form-check-label text_all" for="banjir_fill">Terdampak
                                                        Banjir <span class="font_range_input" id="tahunBanjir">2015</span></label>
                                                    <input type="range" style="height: 6px;" class="form-control-range mt-3 w-75" id="ControlTahunBanjir" min="2015" max="2020" step="1" value="2015">
                                                </div>


                                                {{-- <hr> --}}
                                            </div>
                                            {{--
                                                @role('admin')
                                                    <p>sehat</p>
                                                @endrole

                                                @role('user')
                                                <p>sehat</p>
                                                @endhasrole --}}



                                            {{-- @php
                                                $admin = "Admin";
                                                $user = "User";
                                                $guest = "Guest"
                                                @endphp

                                                @switch($admin)

                                                    @case('Admin')
                                                        @role('admin')
                                                            <p>sehat</p>
                                                        @endrole

                                                    @break

                                                @endswitch


                                                @switch($user)

                                                @case('User')
                                                    @role('user')
                                                        <p>kaga</p>
                                                    @endrole
                                                @break


                                            @endswitch --}}









                                        </div>
                                    </span>



                                    <input type="search" class="input tombol_search" id="cari_wilayah_mobile" placeholder="Cari kelurahan disini...">

                                    @if (!\Auth::check())
                                    <a href="{{ route('login-google') }}">
                                        <span class="btn-search">
                                            <i class="ri-user-fill"></i>
                                        </span>
                                    </a>
                                    @else
                                    <div class="new_login">
                                        <div class="dropdown">

                                            <img src="/profile/{{ Auth::user()->id }}.jpg" style="border-radius: 50%; width:36px;  height:36px;" id="btnLogout" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                                            <div class="dropdown-menu dropdown-menu-right mt-1 p-1" aria-labelledby="btnLogout" style="min-width: 73px; position: absolute; margin-left:-30px;">
                                                <a class="dropdown-item p-0 text-center" href="#" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="font-size: 12px"><i class="fa fa-sign-out"></i>
                                                    Logout</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </div>



                                        </div>
                                    </div>
                                    @endif

                                    <div class="wm-search__dropdown">
                                        <ul class="wm-search__dropdown" role="listbox"></ul>
                                    </div>



                                </div>
                            </div>

                            <!-- End Search Mobile -->


                            <!-- Search Web -->
                            <div class="for_web input-group input-group-md mb-1">
                                <input type="search" id="cari_wilayah" class="form-control tombol_search py-2 border-right-0 border" placeholder="Cari nama jalan ...">


                                <!-- Ori -->
                                <div class="wm-search__dropdown">
                                    <ul class="wm-search__dropdown" role="listbox"></ul>
                                </div>

                                <!-- Dummy -->
                                <ul class="wm-search__dropdown" role="listbox">

                                </ul>


                                <span class="input-group-append">
                                    <button class="btn btn-secondary tombol_search border-left-0 border" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- End Search Web -->

                        </div>

                    </div>
                </div>


                <!-- Checkbox -->
                <div class="layout_checkbox for_web" id="menus">


                    {{-- <div class="form-check wilayah_fill" style="display: none;"><input id="wilayah_fill"
                            name="wilayah_fill" disabled="true" class="form-check-input mt-1" type="checkbox"><label
                            for="wilayah_fill" class="form-check-label text_all">Wilayah</label></div>
                    <div class="form-check zoning_fill"><input id="zoning_fill" name="zoning_fill"
                            class="form-check-input mt-1" type="checkbox"><label for="zoning_fill"
                            class="form-check-label text_all">Peta Zonasi</label></div>
                    <div class="form-check investasi_fill"><input id="investasi_fill" name="investasi_fill"
                            class="form-check-input mt-1" type="checkbox"><label for="investasi_fill"
                            class="form-check-label text_all">Proyek Potensial</label></div>
                    <div class="form-check sewa_fill"><input id="sewa_fill" name="sewa_fill"
                            class="form-check-input mt-1" type="checkbox"><label for="sewa_fill"
                            class="form-check-label text_all">Harga Sewa Kantor</label></div>
                    <div class="form-check wilayahindex_fill"><input id="wilayahindex_fill" name="wilayahindex_fill"
                            class="form-check-input mt-1" type="checkbox"><label for="wilayahindex_fill"
                            class="form-check-label text_all">Total Omzet Usaha Mikro Kecil</label></div>
                    <div class="form-check iumk_fill"><input id="iumk_fill" name="iumk_fill"
                            class="form-check-input mt-1" type="checkbox"><label for="iumk_fill"
                            class="form-check-label text_all">Sebaran Usaha Mikro Kecil</label></div>
                    <div class="form-check investasi_dot" style="display: none;"><input id="investasi_dot"
                            name="investasi_dot" class="form-check-input mt-1" type="checkbox"><label
                            for="investasi_dot" class="form-check-label text_all">Investasi2</label></div>
                    <div class="form-check investasi_line" style="display: none;"><input id="investasi_line"
                            name="investasi_line" class="form-check-input mt-1" type="checkbox"><label
                            for="investasi_line" class="form-check-label text_all">Investasi3</label></div> --}}
                    {{-- <div class="form-check">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="checkbox1">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="checkbox1">Wilayah</label>
                            </li>
                        </ul>
                    </div>

                    <div class="form-check">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="checkbox2">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="checkbox2">Total Omzet Per
                                    Kelurahan</label>
                            </li>
                        </ul>
                    </div>

                    <div class="form-check">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="checkbox3">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="checkbox3">Rencana
                                    Kota</label>
                            </li>
                        </ul>
                    </div>

                    <div class="form-check">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="checkbox4">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="checkbox4">Sebaran Usaha
                                    Mikro Kecil</label>
                            </li>
                        </ul>
                    </div>

                    <div class="form-check mb-2">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="checkbox4">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="checkbox4">Harga Sewa
                                    Kantor</label>
                            </li>
                        </ul>
                    </div> --}}

                </div>
                <!-- End Checkbox -->


                <!-- Range Inputs -->

                <!-- End Range Inputs -->


                <!-- Bahasa -->
                {{-- <div class="text-right text_all for_web margin_language">
                    <a href="#" title="Menggunakan Bahasa Indonesia">Bahasa</a> | <a href="en"
                        title="Menggunakan Bahasa Inggris">English</a>
                </div> --}}
                <!-- End Bahasa-->


                <hr class="for_web">


                <!-- Mengatur Menu Web -->
                <div class="container container_menu  for_web">

                    <div class="flex_container">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="active btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="lokasi-tab" data-toggle="pill" href="#pills-lokasi" role="tab" aria-controls="pills-lokasi" aria-selected="true"><i class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Lokasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="ekonomi-tab" data-toggle="pill" href="#pills-ekonomi" role="tab" aria-controls="pills-ekonomi" aria-selected="false"><i class="ri-funds-box-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ekonomi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="zonasi-tab" data-toggle="pill" href="#pills-zonasi" role="tab" aria-controls="pills-zonasi" aria-selected="false"><i class="ri-map-2-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Zonasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="persil-tab" data-toggle="pill" href="#pills-persil" role="tab" aria-controls="pills-persil" aria-selected="false"><i class="ri-home-4-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Persil</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="poi-tab" data-toggle="pill" href="#pills-poi" role="tab" aria-controls="pills-poi" aria-selected="false"><i class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">POI</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="kblikeg-tab" data-toggle="pill" href="#pills-kblikeg" role="tab" aria-controls="pills-kblikeg" aria-selected="false"><i class="ri-user-search-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile menu_kbli_top">Kode KBLI</label>
                            </li>

                            <!-- Pending menu pin-->

                        </ul>

                    </div>
                </div>
                <!-- End Mengatur Menu Web -->


                <!-- Mengatur Menu Mobile -->

                <div id="popup" class="for_mobile">

                    <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top" style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">
                        <div class="d-flex">
                            <div class="col-md-1">
                                <a type="button" class="badge badge-primary margin_new_menu_icon" id="close" data-dismiss="modal" aria-hidden="true">
                                    <span class="material-icons size_icons">
                                        arrow_back_ios
                                    </span>
                                </a>
                            </div>

                            <div class="col-md-9 margin_new_menu" id="judul"> </div>
                        </div>
                    </div>

                    <iframe id="popupiframe"></iframe>
                </div>

                {{-- <div class="cobain">

                </div> --}}


                <div class="tutup_menus">

                    <div class="container container_menu fixed-bottom for_mobile" id="menuu">


                        <div class="d-flex justify-content-center">

                            <svg style="margin-top:-15px;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#cccccc">
                                        <path d="M21.5,78.83333c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h129c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376z">
                                        </path>
                                    </g>
                                </g>
                            </svg>

                        </div>

                        <div class="d-flex justify-content-around">
                            <div class="flex_container">

                                <ul class="nav nav-pills" id="pills-tab" role="tablist">

                                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">

                                        <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="hlm_profil" href="" role="tab" aria-controls="pills-lokasi" aria-selected="true"><i class="fa fa-map-marker"></i></a>

                                        <br>
                                        <label class="size_menu size_menu_mobile">Profil</label>
                                    </li>

                                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                        <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="hlm_ekonomi" href="" role="tab" aria-controls="pills-ekonomi" aria-selected="false"><i class="ri-funds-box-fill"></i></a>
                                        <br>
                                        <label class="size_menu size_menu_mobile">Ekonomi</label>
                                    </li>

                                    {{-- <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                    <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                        id="hlm_zonasi" href="" role="tab"
                                        aria-controls="pills-zonasi" aria-selected="false"><i
                                            class="ri-map-2-fill"></i></a>
                                    <br>
                                    <label class="size_menu size_menu_mobile">Zonasi</label>
                                </li> --}}

                                    {{-- <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                    <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                        id="hlm_persil" href="" role="tab"
                                        aria-controls="pills-persil" aria-selected="false"><i
                                            class="ri-home-4-fill"></i></a>
                                    <br>
                                    <label class="size_menu size_menu_mobile">Persil</label>
                                </li> --}}

                                    <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                        <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="hlm_poi" href="" role="tab" aria-controls="pills-poi" aria-selected="false"><i class="fa fa-crosshairs"></i></a>
                                        <br>
                                        <label class="size_menu size_menu_mobile">Akses</label>
                                    </li>

                                    {{-- <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                    <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                        id="hlm_kbli" href="" role="tab" aria-controls="pills-kblikeg"
                                        aria-selected="false"><i class="ri-user-search-fill"></i></a>
                                    <br>
                                    <label class="size_menu size_menu_mobile menu_kbli_top">KBLI</label>
                                </li> --}}

                                    {{-- <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                    <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="btnSHP"
                                    href="#" target="_blank"><i class="ri-shape-line"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">File SHP</label>
                                </li> --}}

                                    <!-- Pending menu pin-->

                                </ul>

                            </div>
                        </div>




                    </div>
                </div>
                <!-- End Mengatur Menu Mobile -->


                <hr class="for_web">

                <!-- Mengatur Isi Konten Menu Web -->
                <div class="tab-content for_web" id="pills-tabContent">

                    <div class="tab-pane active" id="pills-lokasi" role="tabpanel" aria-labelledby="lokasi-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Info Lokasi</p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Koordinat</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-kordinat">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kelurahan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-kelurahan">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kecamatan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-kecamatan">-</p>
                                </div>
                            </div>


                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Wilayah</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-kota">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Luas</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-luasarea">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kepadatan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-kepadatan">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Rasio Gini</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-rasio">-</p>
                                </div>
                            </div>

                            {{-- <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">UMR</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>Rp 4.300.000</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Tiga Besar KBLI</label>
                                </div>
                                <div class="col-xs-7 col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">


                                    <span>43210</span><br>
                                    <span>43210</span><br>
                                    <span>43210</span>

                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <div class="tab-pane " id="pills-ekonomi" role="tabpanel" aria-labelledby="ekonomi-tab">

                        <div class="container">

                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Usaha Mikro Kecil</p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Pemilik IUMK</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p><span class="inf-iumk">-</span> <span>orang</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Total Omzet</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p><span class="inf-omzet">-</span> <span>per bulan</span></p>
                                </div>
                            </div>


                            <div class="d-flex margin_chart_ekonomi_mobile">
                                <canvas id="pie-chart" width="70" height="50"></canvas>
                            </div>

                            <div class="d-flex margin_chartline_ekonomi_mobile">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 mt-4">
                                    <canvas id="bar-chart-grouped" width="90" height="150"></canvas>
                                </div>
                            </div>


                            <p class="card-title mb-3 mt-3  text-center font-weight-bold judul_utama">Pendapatan
                                Rata-Rata Per Bulan</p>


                            <div class="container_grid">

                                <div class="text_all">
                                    <label>0 - 5 juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-05">-</label>
                                </div>

                                <div class="text_all">
                                    <label>6 - 10 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-610">-</label>
                                </div>

                                <div class="text_all">
                                    <label>11 - 15 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-1115">-</label>
                                </div>

                                <div class="text_all">
                                    <label>16 - 20 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-1620">-</label>
                                </div>

                                <div class="text_all">
                                    <label>> 20 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-20">-</label>
                                </div>


                                <div class="text_all">
                                    <label>> N/A</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-na">-</label>
                                </div>





                            </div>





                        </div>
                    </div>

                    <div class="tab-pane" id="pills-zonasi" role="tabpanel" aria-labelledby="zonasi-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Zonasi</p>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Zona</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-zona">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Sub Zona</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-subzona">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Kode Blok</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-blok">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Sub Blok</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-subblok">-</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="pills-persil" role="tabpanel" aria-labelledby="persil-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Persil</p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-md-5 text_all">
                                    <label class="text_all_mobile">Lahan Eksisting</label>
                                </div>
                                <div class="col-md-7 text_all">
                                    <p class="inf-eksisting">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Perkiraan Harga</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-harganjop">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Tipe Hak</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-tipehak">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Luas</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-luasbpn">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">TPZ</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-tpz"></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">CD TPZ</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-cdtpz">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">KDH</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-kdh">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">KLB</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-klb"></p>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane " id="pills-poi" role="tabpanel" aria-labelledby="poi-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">POI</p>
                            <div class="form-group for_web w-100 mt-3 mb-0 ml-2" id="radiusSlide">
                                <label class="font-weight-bold font_range_input" for="formControlRange">Radius</label>
                                <label class="font-weight-bold font_range_input" id="OutputControlRange">0 Km</label>

                                <input type="range" style="height: 6px;" class="form-control-range" id="ControlRange" min="500" max="3000" step="500" value="1000">
                            </div>
                            <br>
                            <div class="accordion tabListFasilitas" id="PoiCollabse">
                                {{-- <div class="row row_mid_judul2">
                                    <div class="col-md-12 flex-column">
                                        <button type="button"
                                            class="btn btn-md btn-block text-left text_all text_poi1 tombol_search"
                                            data-toggle="collapse" data-target="#collapsePoiOne" aria-expanded="true"
                                            aria-controls="collapsePoiOne">
                                            <b class="text_all_mobile">Minimarket</b>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapsePoiOne" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#PoiCollabse">
                                    <div class="card-body text_poi2 row_mid_judul">
                                        <ul class="list-group list-group-flush PoiCollabse_mobile">

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Alfamidi Siaga
                                                <span class="PoiCollabse_konten_mobile">0.185 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Familymart Pejaten
                                                <span class="PoiCollabse_konten_mobile">0.575 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Alfamart Siaga Raya
                                                <span class="PoiCollabse_konten_mobile">0.641 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Alfamidi Sawo Manilla
                                                <span class="PoiCollabse_konten_mobile">0.715 km</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="pills-kblikeg" role="tabpanel" aria-labelledby="kblikeg-tab">
                        <div class="container">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">Kode KBLI</p>

                            {{-- <div class="d-flex ml-1">
                                <div class="col-md-5 text_all">
                                    <label class="text_all_mobile">Cari berdasarkan</label>
                                </div>
                                <div class="col-md-7 text_all cari_kodekbli cari_kodekbli_mobile">

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios1" value="option1" checked>
                                        <label class="form-check-label " for="exampleRadios1">
                                            Kegiatan
                                        </label>
                                    </div>
                                    <div class="form-check margin_cari_kodelbli_mobile">
                                        <input class="form-check-input" type="radio" name="exampleRadios"
                                            id="exampleRadios2" value="option2">
                                        <label class="form-check-label margin_cari_kodelbli_mobile"
                                            for="exampleRadios2">
                                            Lokasi
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ml-1">
                                <div class="col-md-4 text_all">
                                    <label class="text_all_mobile">Kegiatan</label>
                                </div>
                                <div class="col-md-7 text_all ml-5">
                                    <textarea name="" id="" cols="23" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="d-flex ml-1">
                                <div class="col-md-4 text_all">
                                    <label class="text_all_mobile">Sektor</label>
                                </div>
                                <div class="col-md-7 text_all ml-5">
                                    <textarea name="" id="" cols="23" rows="2"></textarea>
                                </div>
                            </div> --}}













                            {{-- <div class="d-flex ml-1 margin_cari_kodelbli_mobile">
                                <div class="col-md-6 text_all">
                                    <label class="text_all_mobile">Kegiatan Ruang</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                        <select class="form-control text_all" id="kegiatanRuang" style="z-index: 9999">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
                                <div class="col-md-6 text_all">
                                    <label class="text_all_mobile">Skala</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                        <select class="form-control" id="skala">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
                                <div class="col-md-6 text_all">
                                    <label class="text_all_mobile">kegiatan Kewenangan</label>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                        <select class="form-control" id="kegiatanKewenangan">

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <table style="margin:0;" class="table table-borderless mt-4 table_kbli">
                                <thead>
                                    <tr>
                                        <th class="text_all text-center" style="width:30%;">Kode KBLI</th>
                                        <th class="text_all text-center">Kegiatan</th>
                                        <th class="text_all text-center">Resiko</th>
                                        <th class="text_all text-center">ITBX</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text_all text-center" style="width:30%;">13472</td>
                                        <td class="text_all text-center">Perdagangan Kue Basah</td>
                                        <td class="text_all text-center">Menengah</td>
                                        <td class="text_all text-center">Bersyarat</td>

                                    </tr>
                                </tbody>
                            </table> --}}


                            <!-- <p style="font-size: 14px;" class="card-title  text-center font-weight-bold mt-2">Keterangan</p> -->
























                        </div>


                    </div>


                    <!-- PENDING Content Pin,Komen,kbliLokasi,Kalkulator,HBU-->


                </div>

            </div>


        </div>
    </div>

    <!-- Peta -->
    <div id='map' style='width: 100%; height: 100%; position: fixed;'>





    </div>

    {{-- <div class="hide_zoning_fill">
    <div style="position: fixed; right:6%; top:37%; color:#fff;">
        <div class="form-check zoning_fill">
            <input type="checkbox" class="form-check-input" checked id="zoning_fill"> --}}

    {{-- <label class="form-check-label  text_all" for="zoning_fill">Peta
                Zonasi</label> --}}

    {{-- </div>
    </div>
</div> --}}




    <div class="hide_zoning_fill">


        <div style="position: fixed; right:6%; top:36%; color:#fff;">



            {{-- <div style="position: fixed; right:1%; top:37%; color:#fff;"> --}}



            <div class="d-flex align-content-stretch flex-wrap justify-content-center">

                <div class="form-check zoning_fill text-center">
                    <h6>Zonasi</h6>
                    <input type="checkbox" class="cmn-toggle cmn-toggle-round mb-1" checked id="zoning_fill">
                    <label for="zoning_fill"></label>
                </div>

            </div>


            {{-- <div style="margin-top: -10%;" class="col-sm-5">

        </div> --}}




        </div>
    </div>




    <div class="p-2 dropdown for_mobile" id="more-apps" style=" z-index:9; margin-top:4rem; margin-left:5px;">



        <button class="btn btn-sm for_web">
            <div class="container">
                <div class="row">
                    <i class="ri-user-fill bg-white p-1 text-secondary" style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                </div>
            </div>
        </button>

        {{-- <button class="btn btn-sm float-right">
            <div class="container">
                <div class="row" id="dropdownMenuButton1" data-toggle="dropdown">
                    <span class="material-icons text-white">
                        apps
                    </span>
                </div>
                <div style="margin-left: 0.5%; !important;" class="dropdown-menu dropdown-menu-lg-right menu_apps"
                    aria-labelledby="dropdownMenuButton">

                        <div class="grid_menu_apps">

                            <div class="col-sm-4 kiri_konten_menu   text-center ">
                               <a href="https://jakevo.jakarta.go.id/" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-100"
                                        src="{{ asset('assets/gambar/jakevo.png') }}">Jakevo</a>
    </div>

    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://jakartasatu.jakarta.go.id/irk/login" target="_blank" style="font-size: 12px;text-decoration:none" class="text-dark font-weight-bold"><img class="w-100" src="{{ asset('assets/gambar/mobile/new/irk.png') }}">IRK</a>
    </div>

    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://formulir.dpmptsp-dki.com/permohonan-baru" target="_blank" style="font-size: 11px;text-decoration:none" class="text-dark font-weight-bold"><img class="w-100" src="{{ asset('assets/gambar/mobile/new/prapermohonan.png') }}">PraPermohonan</a>
    </div>

    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://oss.go.id" target="_blank" style="font-size: 12px; text-decoration:none" class="text-dark font-weight-bold"><img src="{{ asset('assets/gambar/mobile/new/OSS.png') }}" class="w-100">OSS</a>
    </div>

    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://dpmptsp-jkt.com" target="_blank" style="font-size: 12px;text-decoration:none" class="text-dark font-weight-bold"><img src="{{ asset('assets/gambar/mobile/new/pesanajib.png') }}" class="w-100">Pesan
            Ajib</a>
    </div>



    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://simbg.pu.go.id/" target="_blank" style="font-size: 12px;text-decoration:none" class="text-dark font-weight-bold"><img class="w-100" src="{{ asset('assets/gambar/mobile/new/simbg.png') }}"><span>SIMBG</span></a>
    </div>

    <div class="col-sm-4 kiri_konten_menu  text-center ">
        <a href="https://jakartasatu.jakarta.go.id/" target="_blank" style="font-size: 12px;text-decoration:none" class="text-dark font-weight-bold"><img class="w-100" src="{{ asset('assets/gambar/mobile/new/jakarta1_logo.png') }}"><span>JakartaSatu</span></a>
    </div>


    </div>



    </div>
    </div>
    </button> --}}


    {{-- <div style="margin-top:30%; margin-right:-2%;" class="d-flex flex-column float-right">

            <div class="p-2">
                <button class="btn btn-sm mt-1" id="dropdownLayer" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="container">
                    <div class="row">
                        <i class="ri-pushpin-line bg-white p-1 text-secondary"
                            style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                    </div>
                </div>
            </button>
            </div>

            <div class="p-2"> <button class="btn btn-sm mt-1" id="dropdownLayer" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                <div class="container">
                    <div class="row">
                        <i class="ri-file-list-line bg-white p-1 text-secondary"
                            style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                    </div>
                </div>
            </button>
            </div>

        </div> --}}

    <div class="hide_hlm_kbli">
        <div style="position:fixed; right:2%;" class="d-flex flex-column mt-5 float-right">
            @role('surveyer')
            <div id="btn_drag">
                <button class="btn btn-sm mt-2">
                    <div class="container">
                        <div class="row">
                            <i class="ri-map-pin-range-line bg-white text-secondary" style="border-radius: 50%; width:35px; height:35px; font-size:24px; padding: -6px"></i>
                        </div>
                    </div>
                </button>
            </div>
            @endrole

            <div>
                <button class="btn btn-sm mt-1">
                    <div class="container">
                        <div class="row">
                            <i id="hlm_kbli" class="ri-user-search-line bg-white text-secondary" style="border-radius: 50%; width:35px; height:35px; font-size:24px; padding: -6px"></i>
                        </div>
                    </div>
                </button>
            </div>
            @role('surveyer')
            <div id="btn_tutupmenu">

                <button class="btn btn-sm mt-1" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                    <div class="container">
                        <div class="row">
                            {{-- <i  id="hlm_form_ajib" class="ri-file-list-line bg-white text-secondary"
                                    style="border-radius: 50%; width:35px; height:35px; font-size:24px; padding: -6px"></i> --}}

                            <i class="ri-file-list-line bg-white text-secondary" style="border-radius: 50%; width:35px; height:35px; font-size:24px; padding: -6px"></i>
                        </div>
                    </div>
                </button>

            </div>
            @endrole


        </div>
    </div>

    <div class="pos_menu">

        <div class="menuuu">
            <ul>

                <div class="d-none">
                    <input type="radio" id="radio_ukm" name="radio_menu" value="radio_ukm">
                    <input type="radio" id="radio_dibangun" name="radio_menu" value="radio_dibangun">
                    <input type="radio" id="radio_pedestrian" name="radio_menu" value="radio_pedestrian">
                    <input type="radio" id="radio_cagar" name="radio_menu" value="radio_cagar">
                    <input type="radio" id="radio_rth" name="radio_menu" value="radio_rth">
                    <input type="radio" id="radio_dijual" name="radio_menu" value="radio_dijual">
                    <input type="radio" id="radio_lainnya" name="radio_menu" value="radio_lainnya">
                </div>

                <li>
                    <button class="btn btn-sm ml-1" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_ukm">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    storefront
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">UKM</span>
                            </div>
                        </div>
                    </button>
                </li>

                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_dibangun">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    maps_home_work
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">Sedang dibangun</span>
                            </div>
                        </div>
                    </button>
                </li>

                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_pedestrian">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    add_road
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">Pedestrian</span>
                            </div>
                        </div>
                    </button>
                </li>






                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_cagar">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    museum
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">Cagar Budaya</span>
                            </div>
                        </div>
                    </button>
                </li>

                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_rth">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    grass
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">RTH</span>
                            </div>
                        </div>
                    </button>
                </li>

                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_dijual">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    receipt_long
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">Dijual</span>
                            </div>
                        </div>
                    </button>
                </li>

                <li>
                    <button class="btn btn-sm ml-2" style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="btn_lainnya">
                        <div class="container">
                            <div class="row">
                                <span class="material-icons text-primary mr-1">
                                    more
                                </span>
                                <span class="font-weight-bold" style="margin-top: 2px">Lainnya</span>
                            </div>
                        </div>
                    </button>
                </li>



            </ul>
        </div>



    </div>




    {{-- <div id="legend btn btn-sm" style="position: absolute; right:10px; margin-top:40px;">
            <div class="dropdown">

                <button class="btn btn-sm mt-3 for_web" id="dropdownLayer" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="container">
                        <div class="row">
                            <i class="ri-stack-line bg-white p-1 text-secondary"
                                style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                        </div>
                    </div>
                </button>

            </div>




        </div> --}}



    </div>


    {{-- <div class="hideshow2">

        <div class="d-flex justify-content-center">

                <svg style="margin-top:-7px;" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50"
                    height="50" viewBox="0 0 172 172" style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                        stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                        font-family="none" font-weight="none" font-size="none" text-anchor="none"
                        style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g fill="#cccccc">
                            <path
                                d="M21.5,78.83333c-2.58456,-0.03655 -4.98858,1.32136 -6.29153,3.55376c-1.30295,2.2324 -1.30295,4.99342 0,7.22582c1.30295,2.2324 3.70697,3.59031 6.29153,3.55376h129c2.58456,0.03655 4.98858,-1.32136 6.29153,-3.55376c1.30295,-2.2324 1.30295,-4.99342 0,-7.22582c-1.30295,-2.2324 -3.70697,-3.59031 -6.29153,-3.55376z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
    </div> --}}










    {{-- <div class="detail_omzet" id="legends"></div>
    <div class="detail_jumlah" id="features">
        <strong class="border-bottom">Detail Omzet</strong>
        <div id="pd">
            <p></p>
        </div>
    </div> --}}
    <!-- End Peta -->

    <!-- Detail Omzet -->
    <div class="detail_omzet">
        <div class="container">
            <div class="text_all" id="legends">

            </div>
        </div>
    </div>
    <!-- End Detail Omzet -->

    <!-- Detail Jumlah -->
    <div class="detail_jumlah">
        <div class="container">
            <span class="text_all font-weight-bold">Detail Omzet</span>

            <div class="text_all" id="pd">
            </div>

        </div>
    </div>
    <!-- End Detail Jumlah -->





    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="assets/js/popper.min.js" rel="preload"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- <script src="assets/js/bootstrap.min.js" rel="preload"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js" integrity="sha512-JHJv/L48s1Hod24iSI0u9bcF/JlUi+YaxliKdbasnw/U1Lp9xxWkaZ3O5OuQPMkVwOVXeFkF4n4176ouA6Py3A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    @if (isMobileDevice())

    <script>
        document.getElementById("hlm_profil").onclick = function(e) {
            e.preventDefault();
            document.getElementById("profil").style.display = "block";
            document.getElementById('btn_backprodil').onclick = function() {
                document.getElementById("profil").style.display = "none";
            };

            return false;
        }



        document.getElementById("hlm_ekonomi").onclick = function(e) {
            e.preventDefault();
            document.getElementById("ekonomi").style.display = "block";
            document.getElementById('btn_backeko').onclick = function() {
                document.getElementById("ekonomi").style.display = "none";
            };

            return false;
        }

        // document.getElementById("hlm_ekonomi").onclick = function(e) {
        //     document.getElementById("form_ajib").style.display = "block";
        //     document.getElementById("menuu").style.display = "none";

        //     document.getElementById('hlm_ekonomi').onclick = function() {
        //         document.getElementById("form_ajib").style.display = "none";
        //         document.getElementById("menuu").style.display = "block";

        //         return true;
        //     };
        // return true;
        // // }

        $("#hlm_form_ajib").click(function() {
            $('#form_ajib').toggle();
        });


        $("#btn_tutupmenu").click(function() {
            $('.tutup_menus').toggle();
        });



        document.getElementById("hlm_poi").onclick = function(e) {
            e.preventDefault();
            document.getElementById("akses").style.display = "block";
            document.getElementById('btn_backakses').onclick = function() {
                document.getElementById("akses").style.display = "none";
            };

            return false;
        }



        document.getElementById("hlm_kbli").onclick = function(e) {
            e.preventDefault();
            document.getElementById("kbli").style.display = "block";
            document.getElementById('btn_backkbli').onclick = function() {
                document.getElementById("kbli").style.display = "none";
            };

            return false;
        }

        var APP_URL = {
            !!json_encode(url('/')) !!
        }

    </script>


    <script src="{{ asset('assets/js/mobile.js') }}"></script>
    @role('surveyer')
    <script src="{{ asset('assets/js/layer_ajib.js') }}"></script>
    @endrole
    @else
    <script src="{{ asset('assets/js/web.js') }}"></script>
    @endif


</body>

</html>
