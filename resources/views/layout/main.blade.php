<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peta Perijinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="assets/gambar/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.css"
        type="text/css">

    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

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


    <div class="pembungkus " id="sidebar">
        <div class="dalam">

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

                                        <button class="btn btn-lg tombol_search border-0 borderdropdown-toggle"
                                            type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars"></i>
                                        </button>

                                        <!-- silent dropdown -->
                                        <div class="dropdown-menu w_checkbox_dropdown_mobile"
                                            aria-labelledby="dropdownMenuButton">

                                            <img src="./assets/gambar/logo_jakpintas.png" width="60px"
                                                class="ml-4 img-fluid" alt="Responsive image">

                                            <div class="layout_checkbox_mobile">

                                                <div class="form-check">

                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox1">
                                                            <label
                                                                class="form-check-label checkbox_left text_checkbox text_all"
                                                                for="checkbox1">Wilayah</label>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="form-check">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox2">
                                                            <label
                                                                class="form-check-label checkbox_left text_checkbox text_all"
                                                                for="checkbox2">Total Omzet Per Kelurahan</label>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="form-check">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox3">
                                                            <label
                                                                class="form-check-label checkbox_left text_checkbox text_all"
                                                                for="checkbox3">Rencana Kota</label>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="form-check">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox4">
                                                            <label
                                                                class="form-check-label checkbox_left text_checkbox text_all"
                                                                for="checkbox4">Sebaran Usaha Mikro Kecil</label>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="form-check mb-2">
                                                    <ul class="list-group list-group-flush">
                                                        <li
                                                            class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="checkbox4">
                                                            <label
                                                                class="form-check-label checkbox_left text_checkbox text_all"
                                                                for="checkbox4">Harga Sewa Kantor</label>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <hr>
                                            </div>


                                            <div class="kotak_sidebar">


                                                <span class="material-icons iconn_kotak_sidebar">
                                                    post_add
                                                </span>
                                                <div> <a href="#" title="Buat File" class="text_all_kotak_sidebarr">Buat
                                                        File</a></div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    contact_support
                                                </span>
                                                <div>
                                                    <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">Konsultasi</a>
                                                </div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    chat
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">Pesan AJIB</a></div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    miscellaneous_services
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">Jakevo</a></div>

                                                <span style="color: #007bff;"
                                                    class="material-icons iconn_kotak_sidebar">
                                                    mail
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">OSS</a></div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    corporate_fare
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">SIMBG</a></div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    drafts
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">PraPermohonan(IRK/KKPR)</a>
                                                </div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    connect_without_contact
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">JakartaSatu</a></div>

                                                <span class="material-icons iconn_kotak_sidebar">
                                                    center_focus_weak
                                                </span>
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">IRK</a></div>




                                            </div>

                                        </div>
                                    </span>

                                    <input type="text" class="input" placeholder="Cari kelurahan disini...">

                                    <span class="btn-search">
                                        <i class="ri-user-fill"></i>
                                    </span>

                                </div>
                            </div>

                            <!-- End Search Mobile -->

                            <!-- Search Web -->
                            <div class="for_web input-group input-group-md mb-1">
                                <input type="search" id="cari_wilayah"
                                    class="form-control tombol_search py-2 border-right-0 border"
                                    placeholder="Cari nama jalan ...">


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
                <div class="layout_checkbox for_web">

                    <div class="form-check">
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
                    </div>

                </div>
                <!-- End Checkbox -->


                <!-- Range Inputs -->
                <div class="form-group for_web w-100 mt-3 mb-0 ml-2" id="radiusSlide">
                    <label class="font-weight-bold font_range_input" for="formControlRange">Radius</label>
                    <label class="font-weight-bold font_range_input" id="OutputControlRange">0 Km</label>

                    <input type="range" style="height: 6px;" class="form-control-range" id="ControlRange" min="500"
                        max="3000" step="500" value="1000">
                </div>
                <!-- End Range Inputs -->


                <!-- Bahasa -->
                <div class="text-right text_all for_web margin_language">
                    <a href="#" title="Menggunakan Bahasa Indonesia">Bahasa</a> | <a href="en"
                        title="Menggunakan Bahasa Inggris">English</a>
                </div>
                <!-- End Bahasa-->


                <hr class="for_web">


                <!-- Mengatur Menu Web -->
                <div class="container container_menu  for_web">

                    <div class="flex_container">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="active btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="lokasi-tab" data-toggle="pill" href="#pills-lokasi" role="tab"
                                    aria-controls="pills-lokasi" aria-selected="true"><i
                                        class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Lokasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="ekonomi-tab" data-toggle="pill" href="#pills-ekonomi" role="tab"
                                    aria-controls="pills-ekonomi" aria-selected="false"><i
                                        class="ri-funds-box-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ekonomi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="zonasi-tab" data-toggle="pill" href="#pills-zonasi" role="tab"
                                    aria-controls="pills-zonasi" aria-selected="false"><i
                                        class="ri-map-2-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Zonasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="persil-tab" data-toggle="pill" href="#pills-persil" role="tab"
                                    aria-controls="pills-persil" aria-selected="false"><i
                                        class="ri-home-4-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Persil</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="poi-tab"
                                    data-toggle="pill" href="#pills-poi" role="tab" aria-controls="pills-poi"
                                    aria-selected="false"><i class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">POI</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="kblikeg-tab" data-toggle="pill" href="#pills-kblikeg" role="tab"
                                    aria-controls="pills-kblikeg" aria-selected="false"><i
                                        class="ri-user-search-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile menu_kbli_top">Kode KBLI</label>
                            </li>

                            <!-- Pending menu pin-->

                        </ul>

                    </div>
                </div>
                <!-- End Mengatur Menu Web -->


                <!-- Mengatur Menu Mobile -->
                <div class="container container_menu for_mobile">

                    <div style="margin-top: -6%;" class="text-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="48" height="48">
                            <path fill="none" d="M0 0h24v24H0z" />
                            <path d="M5 11h14v2H5z" fill="rgba(211,211,211,1)" />
                        </svg>
                    </div>

                    <div class="flex_container">

                        <ul class="nav nav-pills" id="pills-tab" role="tablist">

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="lokasi-tab" href="menu/lokasi.html" role="tab" aria-controls="pills-lokasi"
                                    aria-selected="true"><i class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Lokasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="ekonomi-tab" href="menu/ekonomi.html" role="tab" aria-controls="pills-ekonomi"
                                    aria-selected="false"><i class="ri-funds-box-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ekonomi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="zonasi-tab" href="menu/zonasi.html" role="tab" aria-controls="pills-zonasi"
                                    aria-selected="false"><i class="ri-map-2-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Zonasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="persil-tab" href="menu/persil.html" role="tab" aria-controls="pills-persil"
                                    aria-selected="false"><i class="ri-home-4-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Persil</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="poi-tab"
                                    href="menu/poi.html" role="tab" aria-controls="pills-poi" aria-selected="false"><i
                                        class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">POI</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="kblikeg-tab" href="menu/kode-kbli.html" role="tab" aria-controls="pills-kblikeg"
                                    aria-selected="false"><i class="ri-user-search-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile menu_kbli_top">Kode KBLI</label>
                            </li>

                            <!-- Pending menu pin-->

                        </ul>

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
                                    <p>-6427374984, 1009843234a</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kelurahan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>Jati Padang</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kecamatan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>Pasar Minggu</p>
                                </div>
                            </div>


                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Wilayah</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>Jakarta Selatan</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Luas</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>400 hektar</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Kepadatan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>1500 jiwa/km2</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Rasio Gini</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>0,41</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
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
                            </div>

                        </div>
                    </div>

                    <div class="tab-pane " id="pills-ekonomi" role="tabpanel" aria-labelledby="ekonomi-tab">

                        <div class="container">

                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Usaha Mikro Kecil</p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Pelaku Usaha</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>373 <span>orang</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Total Omset</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>3.685.675.000 <span>per bulan</span></p>
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
                                    <label> 4.593 Orang</label>
                                </div>

                                <div class="text_all">
                                    <label>6 - 10 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label>2.045 Orang</label>
                                </div>

                                <div class="text_all">
                                    <label>11 - 15 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label>1.233 Orang</label>
                                </div>

                                <div class="text_all">
                                    <label>16 - 20 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label>1.497 Orang</label>
                                </div>

                                <div class="text_all">
                                    <label>> 20 Juta</label>
                                </div>
                                <div class="text_all col_info">
                                    <label>124 Orang</label>
                                </div>


                                <div class="text_all">
                                    <label>> N/A</label>
                                </div>
                                <div class="text_all col_info">
                                    <label>3.866 Orang</label>
                                </div>





                            </div>





                        </div>
                    </div>

                    <div class="tab-pane" id="pills-zonasi" role="tabpanel" aria-labelledby="zonasi-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Zonasi</p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-md-5 text_all">
                                    <label class="text_all_mobile">Nama Usaha</label>
                                </div>
                                <div class="col-md-7 text_all">
                                    <p>LA FROZEN FOOD</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Zona</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>Zona Perumahan KDB Sedang-Tinggi</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Sub Zona</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>R.5</p>
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
                                    <p>Rumah Besar</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Perkiraan Harga</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>Rp.5.000.000,- s/d Rp.10.000.000,-&nbsp;&nbsp;<span>/m²</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Tipe Hak</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>Hak Pakai</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Luas</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>11.755<span>/m²</span></p>
                                </div>
                            </div>


                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Kode Blok</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>43</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Sub Blok</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>43</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">TPZ</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>43</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">CD TPZ</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>43</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">KDH</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>43</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">KLB</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>1,2</span></p>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane " id="pills-poi" role="tabpanel" aria-labelledby="poi-tab">
                        <div class="container">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">POI</p>

                            <div class="accordion" id="PoiCollabse">
                                <div class="row row_mid_judul2">
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
                                </div>

                                <div class="row row_mid_judul">
                                    <div class="col-md-12 flex-column">
                                        <button type="button"
                                            class="btn btn-md btn-block text-left text_all text_poi1 tombol_search"
                                            data-toggle="collapse" data-target="#collapsePoiTwo" aria-expanded="true"
                                            aria-controls="collapsePoiTwo">
                                            <b class="text_all_mobile">Sekolah</b>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapsePoiTwo" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#PoiCollabse">
                                    <div class="card-body text_poi2 row_mid_judul">
                                        <ul class="list-group list-group-flush PoiCollabse_mobile">

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                SMP Siaga
                                                <span class="PoiCollabse_konten_mobile">0.185 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                SMP Pejaten
                                                <span class="PoiCollabse_konten_mobile">0.575 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                SMA Siaga Raya
                                                <span class="PoiCollabse_konten_mobile">0.641 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                SMA Sawo Manilla
                                                <span class="PoiCollabse_konten_mobile">0.715 km</span>
                                            </li>

                                        </ul>
                                    </div>
                                </div>

                                <div class="row row_mid_judul">
                                    <div class="col-md-12 flex-column">
                                        <button type="button"
                                            class="btn btn-md btn-block text-left text_all text_poi1 tombol_search"
                                            data-toggle="collapse" data-target="#collapsePoiThre" aria-expanded="true"
                                            aria-controls="collapsePoiThre">
                                            <b class="text_all_mobile">Hotel</b>
                                        </button>
                                    </div>
                                </div>

                                <div id="collapsePoiThre" class="collapse show" aria-labelledby="headingOne"
                                    data-parent="#PoiCollabse">
                                    <div class="card-body text_poi2 row_mid_judul">
                                        <ul class="list-group list-group-flush PoiCollabse_mobile">

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Wisma Siaga
                                                <span class="PoiCollabse_konten_mobile">0.185 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Hotel Pejaten
                                                <span class="PoiCollabse_konten_mobile">0.575 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Hotel Siaga Raya
                                                <span class="PoiCollabse_konten_mobile">0.641 km</span>
                                            </li>

                                            <li
                                                class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                                Wisma Sawo Manilla
                                                <span class="PoiCollabse_konten_mobile">0.715 km</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane " id="pills-kblikeg" role="tabpanel" aria-labelledby="kblikeg-tab">
                        <div class="container">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">Kode KBLI</p>

                            <div class="d-flex ml-1">
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
                            </div>


                            <div class="d-flex ml-1 margin_cari_kodelbli_mobile">
                                <div class="col-md-4 text_all">
                                    <label class="text_all_mobile">Lokasi Usaha</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                        <select class="form-control ml-2">
                                            <option>Skala1</option>
                                            <option>Skala2</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
                                <div class="col-md-4 text_all">
                                    <label class="text_all_mobile">Skala Usaha</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                        <select class="form-control ml-2">
                                            <option>Skala1</option>
                                            <option>Skala2</option>
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
                            </table>


                            <!-- <p style="font-size: 14px;" class="card-title  text-center font-weight-bold mt-2">Keterangan</p> -->


                        </div>


                    </div>


                    <!-- PENDING Content Pin,Komen,kbliLokasi,Kalkulator,HBU-->


                </div>

            </div>


        </div>
    </div>

    <!-- Peta -->
    <div id='map' style='width: 100%; height: 100%; position: fixed;'></div>
    <!-- End Peta -->

    <!-- Detail Omzet -->
    <div class="detail_omzet">
        <div class="container">
            <div class="text_all">
                {{-- <div><span class="details_omzet" style="background-color: rgb(255, 237, 160);"></span><span>0-4M</span>
                </div>
                <div><span class="details_omzet" style="background-color: rgb(255, 230, 117);"></span><span>5M-8M</span>
                </div>
                <div><span class="details_omzet" style="background-color: rgb(255, 223, 82);"></span><span>9M-12M</span>
                </div>
                <div><span class="details_omzet"
                        style="background-color: rgb(255, 214, 31);"></span><span>13M-16M</span></div>
                <div><span class="details_omzet" style="background-color: rgb(224, 183, 0);"></span><span>17M-20M</span>
                </div>
                <div><span class="details_omzet" style="background-color: rgb(202, 165, 2);"></span><span>&gt;
                        20M</span></div> --}}
            </div>
        </div>
    </div>
    <!-- End Detail Omzet -->

    <!-- Detail Jumlah -->
    <div class="detail_jumlah">
        <div class="container">
            <span class="text_all font-weight-bold">Detail Omzet</span>

            <div class="text_all">
                <div>Kelurahan : Menteng</div>
                <p class="mb-0">
                    <span><em>Rp 5.110.507.000</em></span>
                </p>
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

    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.js"></script>
    <script src="{{ asset('assets/js/web.js') }}"></script>
</body>

</html>
