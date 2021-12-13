<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @if (isMobileDevice())
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @endif
    <title>Peta Perizinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="assets/gambar/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet"
        href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />



    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.css"
        type="text/css">
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css"
        type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    {{-- <meta name="Access-Control-Allow-Headers" value="Content-Type" /> --}}

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
                        <p><span class="TextHead font-weight-bold">Peta Perizinan dan Investasi</span></p>
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
                    <div class="form-check zoning_fill">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" checked id="zoning_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="zoning_fill">Peta Zonasi</label>
                            </li>
                        </ul>
                    </div>

                    <div class="form-check wilayahindex_fill">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="wilayahindex_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="wilayahindex_fill">Total Omzet Usaha Mikro Kecil</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check sewa_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="sewa_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="sewa_fill">Harga Sewa Kantor</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check iumk_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="iumk_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="iumk_fill">Sebaran Usaha Mikro Kecil</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check investasi_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="investasi_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="investasi_fill">Proyek</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check investasi_dot d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="investasi_dot">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="investasi_dot">Proyek</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check investasi_line d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="checkbox" class="form-check-input" id="investasi_line">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="investasi_line">Proyek</label>
                            </li>
                        </ul>
                    </div>

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

                        <ul class="nav nav-pills w-100" id="pills-tab" role="tablist">

                            <li class="nav-item">
                                <a class="active btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="lokasi-tab" data-toggle="pill" href="#pills-lokasi" role="tab"
                                    aria-controls="pills-lokasi" aria-selected="true"><i
                                        class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Lokasi</label>
                            </li>

                            <li class="nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="ekonomi-tab" data-toggle="pill" href="#pills-ekonomi" role="tab"
                                    aria-controls="pills-ekonomi" aria-selected="false"><i
                                        class="ri-funds-box-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ekonomi</label>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="zonasi-tab" data-toggle="pill" href="#pills-zonasi" role="tab"
                                    aria-controls="pills-zonasi" aria-selected="false"><i
                                        class="ri-map-2-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Zonasi</label>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="poi-tab"
                                    data-toggle="pill" href="#pills-poi" role="tab" aria-controls="pills-poi"
                                    aria-selected="false"><i class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">POI</label>
                            </li>

                            <li class="nav-item">
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
                <div class="tab-content for_web mb-5" id="pills-tabContent">

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

                            <div class="d-flex row_mid_judul">
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
                                    <label class="text_all_mobile">Pelaku Usaha</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p><span class="inf-iumk">-</span> <span>orang</span></p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Total Omset</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p><span class="inf-omzet">-</span> <span>per bulan</span></p>
                                </div>
                            </div>


                            <div class="d-flex margin_chart_ekonomi_mobile">
                                <canvas id="pie-chart" width="70" height="50"></canvas>
                            </div>

                            <div class="d-flex margin_chartline_ekonomi_mobile">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  mt-4">
                                    <canvas id="bar-chart-grouped" width="90" height="120"></canvas>
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
                        <div class="container" style="margin-bottom: 100px">
                            <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Zonasi</p>

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
                                    <label class="text_all_mobile">Kode Blok/Subblok</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p class="inf-blok">-</p>
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
                                    <p class="inf-klb">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-12 text_all">
                                    <label class="text_all_mobile inf-gsb">
                                        -
                                    </label>
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

                                <input type="range" style="height: 6px;" class="form-control-range" id="ControlRange"
                                    min="500" max="3000" step="500" value="1000">
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


                            <div class="d-flex ml-1 margin_cari_kodelbli_mobile">
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
                                    <label class="text_all_mobile">Kegiatan Kewenangan</label>
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
                                <tbody class="dtKBLI">

                                </tbody>
                            </table>

                            <button class="btn btn-sm text-primary ml-0" id="btn-print"><i
                                    class="fa fa-print"></i></button>

                            <div class="d-flex margin_chart_ekonomi_mobile">
                                <canvas id="pie-chart-kbli" width="70" height="50"
                                    style="position:absolute;z-index: -999; display:none"></canvas>
                            </div>

                            <div class="d-flex margin_chartline_ekonomi_mobile">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  mt-4">
                                    <canvas id="bar-chart-grouped-kbli" width="90" height="80"
                                        style="display: none;position:absolute;"></canvas>
                                </div>
                            </div>


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
        <div class="container p-2" id="btn-titik" style="position:absolute; right:0; z-index:999; width:67%">
            <button class="btn btn-sm"
                style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="sewa_kantor">
                <div class="container">
                    <div class="row">
                        <span class="material-icons text-primary mr-1">
                            apartment
                        </span>
                        <span class="font-weight-bold" style="margin-top: 2px">Harga Sewa Kantor</span>
                    </div>
                </div>
            </button>
            <button class="btn btn-sm ml-2"
                style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="iumk">
                <div class="container">
                    <div class="row">
                        <span class="material-icons text-primary mr-1">
                            storefront
                        </span>
                        <span class="font-weight-bold" style="margin-top: 2px">Sebaran Usaha Mikro Kecil</span>
                    </div>
                </div>
            </button>
            <button class="btn btn-sm ml-2"
                style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="proyek">
                <div class="container">
                    <div class="row">
                        <span class="material-icons text-primary mr-1">
                            home_repair_service
                        </span>
                        <span class="font-weight-bold" style="margin-top: 2px">Proyek Potensial</span>
                    </div>
                </div>
            </button>
        </div>
        <div class="container p-2 dropdown" id="more-apps"
            style="position:absolute; right:-15px; z-index:999; width:8rem">
            <button class="btn btn-sm">
                <div class="container">
                    <div class="row" id="dropdownMenuButton1" data-toggle="dropdown">
                        <span class="material-icons text-white">
                            apps
                        </span>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"
                        aria-labelledby="dropdownMenuButton" style="width: 330px">
                        <div class="row p-3">
                            <div class="col-md-4 text-center d-flex align-items-center">
                                <a href="https://oss.go.id" target="_blank"
                                    style="font-size: 13px; text-decoration:none"
                                    class="text-dark font-weight-bold"><img
                                        src="{{ asset('assets/gambar/OSS.png') }}" class="w-75">OSS</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="https://dpmptsp-jkt.com" target="_blank"
                                    style="font-size: 13px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img
                                        src="{{ asset('assets/gambar/ptsp_logo.png') }}" class="w-75">Pesan
                                    AJIB</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="https://jakevo.jakarta.go.id/" target="_blank"
                                    style="font-size: 13px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/jakevo.png') }}">Jakevo</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="https://simbg.pu.go.id/" target="_blank"
                                    style="font-size: 13px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/simbg.png') }}">SIMBG</a>
                            </div>
                            <div class="col-md-4 text-center">
                                <a href="https://jakartasatu.jakarta.go.id/" target="_blank"
                                    style="font-size: 13px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/jakarta1_logo.png') }}">JakartaSatu</a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
            <button class="btn btn-sm">
                <div class="container">
                    <div class="row">
                        <i class="ri-user-fill bg-white p-1 text-secondary"
                            style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                    </div>
                </div>
            </button>
            <div id="legend btn btn-sm" style="float: right;margin-right:0.77rem;">
                <div class="dropdown">
                    {{-- <button type="button" class="btn btn-sm" id="dropdownLayer" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"
                        style="border-radius: 50%; border:none; background:white">
                        <div class="container">
                            <div class="row">
                                <i class="las la-layer-group bg-white p-1 text-secondary"
                                    style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                            </div>
                        </div>
                    </button> --}}
                    <button class="btn btn-sm mt-3" id="dropdownLayer" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="container">
                            <div class="row">
                                <i class="ri-stack-line bg-white p-1 text-secondary"
                                    style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                            </div>
                        </div>
                    </button>
                    <ul class="dropdown-menu keep-open p-2" id="menu" aria-labelledby="dropdownLayer"
                        style="position: relative;font-size: 12px;margin-top: 5px;border: none;">
                        <li style="margin-bottom:10px; "><b>Base Map</b></li>
                        <li>
                            <div class="form-check form-check-inline mr-5">
                                <input style="height:20px;" class="form-check-input" type="radio" name="rtoggle"
                                    id="ckp4wrapq11m117pf2lr49l5t" value="ckp4wrapq11m117pf2lr49l5t" />
                                <label class="form-check-label pl-1" for="ckp4wrapq11m117pf2lr49l5t">Default</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check form-check-inline mr-5">
                                <input style="height:20px;" class="form-check-input" type="radio" name="rtoggle"
                                    id="ckp6i54ay22u818lrq15ffcnr" value="ckp6i54ay22u818lrq15ffcnr"
                                    checked="checked" />
                                <label class="form-check-label pl-1" for="ckp6i54ay22u818lrq15ffcnr">Satellite</label>
                            </div>
                        </li>
                        <li>
                            <div class="form-check form-check-inline mr-5">
                                <input style="height:20px;" class="form-check-input" type="radio" name="rtoggle"
                                    id="ckp6i6bgp2jn217pfp6wm5syk" value="ckp6i6bgp2jn217pfp6wm5syk" />
                                <label class="form-check-label pl-1" for="ckp6i6bgp2jn217pfp6wm5syk">Streets</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <button class="btn btn-sm mt-1" id="dropdownLayer" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="container">
                        <div class="row">
                            <i class="ri-mail-open-line bg-white p-1 text-secondary"
                                style="border-radius: 50%; width:30px; height:30px; font-size:15px"></i>
                        </div>
                    </div>
                </button>
            </div>
        </div>
        {{-- <div style="z-index: 999; position: absolute; right:6px; top:100px;">
            
        </div> --}}
    </div>
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

    {{-- ScreenShoot Map --}}
    <div id="screenshotPlaceholder"></div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="assets/js/popper.min.js" rel="preload"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- <script src="assets/js/bootstrap.min.js" rel="preload"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>
    <script src="{{ asset('assets/js/canvas-toBlob.js') }}"></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @if (isMobileDevice())
        <script src="{{ asset('assets/js/mobile.js') }}"></script>
    @else
        <script src="{{ asset('assets/js/web.js') }}"></script>
    @endif
</body>

</html>
