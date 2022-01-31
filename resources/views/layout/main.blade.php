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
    <meta name="google-signin-client_id" content="{{ env('GOOGLE_CLIENT_ID') }}">

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
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {{-- <meta name="Access-Control-Allow-Headers" value="Content-Type" /> --}}

</head>

<body>


    <div class="g-signin2" data-onsuccess="onSignIn" style="position:absolute"></div>
    <!-- hide -->
    <button class="btn btn_hide_side_bar for_web" type="button" id="hide_side_bar">
        <i class="btn_icon_hide ri-arrow-left-s-fill fa-2x"></i>
    </button>

    <!-- show -->
    <button class="btn btn_show_side_bar for_web" type="button" id="show_side_bar">
        <i class="btn_icon_show ri-arrow-right-s-fill fa-2x"></i>
    </button>

    <div class="info-lokasi-detail">

    </div>

    <div class="info-layer">
        <div class="container p-4">
            <button type="button" class="close" id="closeSewa" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style="font-size: 13pt" class="title-info font-weight-bold">Harga Sewa Kantor</span>
            <div class="list-item mt-5">

            </div>
        </div>
    </div>

    <div class="info-layer-usaha">
        <div class="container p-4">
            <button type="button" class="close" id="closeUsaha" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style="font-size: 13pt" class="title-info font-weight-bold">Sebaran Usaha Mikro Kecil</span>
            <div class="list-item-usaha mt-5">

            </div>
        </div>
    </div>

    <div class="info-layer-investasi">
        <div class="container p-4">
            <button type="button" class="close" id="closeInvestasi" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style="font-size: 13pt" class="title-info font-weight-bold">Proyek Potensial</span>
            <ol class="list-item-investasi mt-5">

            </ol>
        </div>
    </div>

    <div class="info-layer-budaya">
        <div class="container p-4">
            <button type="button" class="close" id="closeBudaya" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style="font-size: 13pt" class="title-info font-weight-bold">Cagar Budaya</span>
            <ol class="list-item-budaya mt-5">

            </ol>
        </div>
    </div>

    <div class="info-pin-location">
        <div class="container p-4">
            <button type="button" class="close" id="closePin" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <span style="font-size: 13pt" class="title-info font-weight-bold">Laporan/Pengawasan</span>
            <div class="form mt-4">
                <div class="alert alert-danger alert-dismissible fade show" id="pesanGagal" style="font-size: 10pt"
                    role="alert">
                    <strong>Gagal!</strong> Anda Harus Mengisi Semua Form.
                </div>
                <div class="alert alert-danger alert-dismissible fade show" id="pesanFoto" style="font-size: 10pt"
                    role="alert">
                    <strong>Gagal!</strong> Maksimal 3 Foto.
                </div>
                <div class="alert alert-success alert-dismissible fade show" id="pesanBerhasil" style="font-size: 10pt"
                    role="alert">
                    <strong>Berhasil!</strong> Data Berhasil di Simpan.
                </div>
                <div class="alert alert-success alert-dismissible fade show" id="pesanBerhasilEdit"
                    style="font-size: 10pt" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil di Ubah.
                </div>
                <div class="alert alert-success alert-dismissible fade show" id="pesanBerhasilHapus"
                    style="font-size: 10pt" role="alert">
                    <strong>Berhasil!</strong> Data Berhasil di Hapus.
                </div>
                <form id="formPinLocation" enctype="multipart/form-data">
                    <label style="font-size: 10pt">Koordinat</label>
                    <input type="text" name="kordinat" class="form-control" id="kordinatPin" style="font-size: 8pt"
                        placeholder="Pilih Titik Lokasi" readonly>
                    <label class="mt-2" style="font-size: 10pt">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judulPin" style="font-size: 8pt"
                        placeholder="Masukan Judul Tempat">
                    <label class="mt-2" style="font-size: 10pt">Tipe</label>
                    <select name="tipe" class="form-control" id="tipePin" style="font-size: 8pt">
                        <option value="UMK">UMK</option>
                        <option value="Cagar Budaya">Cagar Budaya</option>
                        <option value="Sedang di Bangun">Sedang di Bangun</option>
                        <option value="RTH">RTH</option>
                        <option value="Pedestrian">Pedestrian</option>
                        <option value="di Jual">di Jual</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <label class="mt-2" style="font-size: 10pt">Foto</label>
                    <div class="custom-file" style="font-size: 8pt">
                        <input type="file" name="foto[]" onchange="preview_image();" accept="image/*"
                            multiple="multiple" class="custom-file-input" id="gambarLokasi">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="row mt-3" id="previewFoto">
                    </div>
                    <label class="mt-2" style="font-size: 10pt">Catatan</label>
                    <textarea class="form-control" name="catatan" id="catatanPin" style="font-size: 8pt"
                        placeholder="Masukan Catatan" rows="5"></textarea>
                    <button type="submit" id="pinndedLocation" class="btn btn-success mt-3 text-white"
                        style="font-size: 8pt; cursor: pointer;"><i class="fa fa-paper-plane"></i>
                        Simpan</button>
                </form>
                <form id="formPinLocationEdit" enctype="multipart/form-data">
                    <label style="font-size: 10pt">Koordinat</label>
                    <input type="text" name="kordinat" class="form-control" id="kordinatPinEdit"
                        style="font-size: 8pt" placeholder="Pilih Titik Lokasi" readonly>
                    <input type="text" class="d-none" name="id" class="form-control" id="idPinEdit">
                    <label class="mt-2" style="font-size: 10pt">Judul</label>
                    <input type="text" name="judul" class="form-control" id="judulPinEdit" style="font-size: 8pt"
                        placeholder="Masukan Judul Tempat">
                    <label class="mt-2" style="font-size: 10pt">Tipe</label>
                    <select name="tipe" class="form-control" id="tipePinEdit" style="font-size: 8pt">
                        <option value="UMK">UMK</option>
                        <option value="Cagar Budaya">Cagar Budaya</option>
                        <option value="Sedang di Bangun">Sedang di Bangun</option>
                        <option value="RTH">RTH</option>
                        <option value="Pedestrian">Pedestrian</option>
                        <option value="di Jual">di Jual</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <label class="mt-2" style="font-size: 10pt">Foto</label>
                    <div class="custom-file" style="font-size: 8pt">
                        <input type="file" name="foto[]" onchange="preview_image_edit();" accept="image/*"
                            multiple="multiple" class="custom-file-input" id="gambarLokasiEdit">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <div class="row mt-3" id="previewFotoEdit">
                    </div>
                    <label class="mt-2" style="font-size: 10pt">Catatan</label>
                    <textarea class="form-control" name="catatan" id="catatanPinEdit" style="font-size: 8pt"
                        placeholder="Masukan Catatan" rows="5"></textarea>
                    <button type="submit" id="pinndedLocation" class="btn btn-primary mt-3 text-white"
                        style="font-size: 8pt; cursor: pointer;"><i class="fa fa-edit"></i>
                        Ubah</button>
                </form>
            </div>

            <div class="mt-5">
                <span class="font-weight-bold" style="font-size: 12pt">Lokasi yang di Simpan</span>
                <p align="center" id="messageNoData" class="mt-5">Tidak Ada Lokasi Yang di Simpan</p>
                <div class="list-item-info-location mt-2">

                </div>
            </div>
        </div>
    </div>

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
                    <div style="margin-top: 1%;">
                        <p><span class="TextHead font-weight-bold">Peta Perizinan dan Investasi</span><br><span
                                class="text-white ml-3 subjudul">Sistem
                                Pelayanan Informasi</span></p>
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
                                                <div> <a href="#" title="Buat File"
                                                        class="text_all_kotak_sidebarr">Buat
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
                                    placeholder="Cari nama jalan ..." autocomplete="off">


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
                        <input type="checkbox" class="form-check-input" checked id="zoning_fill">
                        <label class="form-check-label  text_all" for="zoning_fill">Peta
                            Zonasi</label>
                    </div>

                    <div class="form-check wilayahindex_fill mt-1">
                        <input type="checkbox" class="form-check-input" id="wilayahindex_fill">
                        <label class="form-check-label  text_all" for="wilayahindex_fill">Total Omzet Usaha Mikro
                            Kecil</label>
                    </div>

                    <div class="form-check pipa_multilinestring mt-1">
                        <input type="checkbox" class="form-check-input" id="pipa_multilinestring">
                        <label class="form-check-label  text_all" for="pipa_multilinestring">Jaringan Pipa PDAM</label>
                    </div>

                    <div class="form-check tol_multilinestring mt-1">
                        <input type="checkbox" class="form-check-input" id="tol_multilinestring">
                        <label class="form-check-label  text_all" for="tol_multilinestring">Jalur Tol</label>
                    </div>

                    <div class="form-check sungai_multilinestring mt-1">
                        <input type="checkbox" class="form-check-input" id="sungai_multilinestring">
                        <label class="form-check-label  text_all" for="sungai_multilinestring">Aliran Sungai</label>
                    </div>

                    {{-- <div class="form-check ipal_dot mt-1">
                        <input type="checkbox" class="form-check-input" id="ipal_dot">
                        <label class="form-check-label  text_all" for="ipal_dot">Pembuangan Air Limbah</label>
                    </div> --}}

                    {{-- <div class="form-check util_multilinestring mt-1">
                        <input type="checkbox" class="form-check-input" id="util_multilinestring">
                        <label class="form-check-label  text_all" for="util_multilinestring">Jaringan Pipa
                            Utilitas</label>
                    </div> --}}

                    {{-- <div class="form-check phb_multilinestring mt-1">
                        <input type="checkbox" class="form-check-input" id="phb_multilinestring">
                        <label class="form-check-label  text_all" for="phb_multilinestring">Jaringan Saluran
                            Penghubung</label>
                    </div> --}}

                    <div class="form-check banjir_fill mt-1">

                        <input type="checkbox" class="form-check-input" id="banjir_fill">
                        <label class="form-check-label text_all" for="banjir_fill">Terdampak
                            Banjir <span class="font_range_input" id="tahunBanjir">2015</span></label>
                        <input type="range" style="height: 6px;" class="form-control-range mt-3 w-75"
                            id="ControlTahunBanjir" min="2015" max="2020" step="1" value="2015">
                    </div>

                    <div class="form-check sewa_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="radio" name="layer" class="form-check-input" id="sewa_fill">
                                <label class="form-check-label  text_all" for="sewa_fill">Harga Sewa Kantor</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check iumk_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="radio" name="layer" class="form-check-input" id="iumk_fill">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="iumk_fill">Sebaran Usaha Mikro Kecil</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check budaya_dot d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="radio" name="layer" class="form-check-input" id="budaya_dot">
                                <label class="form-check-label checkbox_left text_checkbox text_all"
                                    for="budaya_dot">Cagar Budaya</label>
                            </li>
                        </ul>
                    </div>
                    <div class="form-check investasi_fill d-none">
                        <ul class="list-group list-group-flush">
                            <li class="listgroup-cust d-flex justify-content-between align-items-center text_all">
                                <input type="radio" name="layer" class="form-check-input" id="investasi_fill">
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
                                <label class="size_menu size_menu_mobile">Profil</label>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="lokasi-tab" data-toggle="pill" href="#pills-ketentuan" role="tab"
                                    aria-controls="pills-ketentuan" aria-selected="true"><i
                                        class="fa fa-book"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ketentuan</label>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="poi-tab"
                                    data-toggle="pill" href="#pills-poi" role="tab" aria-controls="pills-poi"
                                    aria-selected="false"><i class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Akses</label>
                            </li>

                            <li class="nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="kblikeg-tab" data-toggle="pill" href="#pills-kblikeg" role="tab"
                                    aria-controls="pills-kblikeg" aria-selected="false"><i
                                        class="ri-user-search-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile menu_kbli_top">KBLI</label>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    data-toggle="pill" href="#pills-cetak" role="tab" aria-controls="pills-cetak"
                                    aria-selected="false"><i class="ri-printer-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Cetak</label>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" href="#"
                                    role="tab" aria-controls="pills-poi" aria-selected="false"><i
                                        class="ri-calculator-line"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Simulasi</label>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="btnSHP"
                                    href="#" target="_blank"><i class="ri-shape-line"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">File SHP</label>
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
                        <div class="container" id="profil-print">
                            <div id="lokasi-print">
                                <p class="card-title mt-2 text-center font-weight-bold judul_utama">Lokasi</p>
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
                            </div>


                            <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Persil</p>
                            <div class="d-flex row_mid_text">
                                <div class="col-md-5 text_all">
                                    <label class="text_all_mobile">Kegiatan</label>
                                </div>
                                <div class="col-md-7 text_all">
                                    <p class="inf-eksisting">-</p>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Perkiraan NJOP</label>
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
                                    <label class="text_all_mobile">Total Omset</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p>Rp.<span class="inf-omzet">-</span> <span>per bulan</span></p>
                                </div>
                            </div>


                            <div class="all-chart">
                                <div class="d-flex margin_chart_ekonomi_mobile">
                                    <canvas id="pie-chart" width="70" height="50"></canvas>
                                </div>

                                <div class="d-flex margin_chartline_ekonomi_mobile">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  mt-4">
                                        <canvas id="bar-chart-grouped" width="90" height="120"></canvas>
                                    </div>
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
                                    <label>Tidak Menjawab</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-pen-na">-</label>
                                </div>
                            </div>

                            <div class="row" id="chart-print">
                                <div class="col-md-6">
                                    <center>
                                        <img id="pie-print" src="" width="70%">
                                    </center>
                                </div>
                                <div class="col-md-6">
                                    <center>
                                        <img id="bar-print" src="" width="70%">
                                    </center>
                                </div>
                            </div>

                            <div>
                                <div class="d-flex margin_chart_ekonomi_mobile">
                                    <canvas id="pie-chart-info" width="70" height="50"
                                        style="position:absolute;z-index: -999; display:none"></canvas>
                                </div>

                                <div class="d-flex margin_chartline_ekonomi_mobile">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  mt-4">
                                        <canvas id="bar-chart-grouped-info" width="90" height="80"
                                            style="display: none;position:absolute;"></canvas>
                                    </div>
                                </div>
                            </div>

                            <p class="card-title mb-3 text-center font-weight-bold judul_utama"
                                style="margin-top: 65px">Lingkungan</p>

                            <div class="container_grid">

                                <div class="text_all">
                                    <label>Sistem Sanitasi</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-sanitasi">-</label>
                                </div>

                                <div class="text_all">
                                    <label>Penurunan Tanah</label>
                                </div>
                                <div class="text_all col_info">
                                    <label class="inf-p-air-tanah">-</label>
                                </div>
                            </div>


                            <div class="inf-air-tanah">

                            </div>

                        </div>
                    </div>

                    <div class="tab-pane" id="pills-ketentuan" role="tabpanel" aria-labelledby="ketentuan-tab">
                        <div class="container" id="ketentuan-print">


                            <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Zonasi <br><span
                                    class="w-100 text-center text_all" style="font-weight: normal">Peraturan Zonasi
                                    sesuai Perda
                                    1/2014</span></p>
                            <div>
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
                                        <label class="text_all_mobile">Blok/Sub Blok</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-blok">-</p>
                                    </div>
                                </div>


                                {{-- <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">TPZ</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-tpz"></p>
                                    </div>
                                </div> --}}


                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">Kode TPZ</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-cdtpz">
                                            <select class="w-100" id="selectTPZ"></select>
                                        </p>
                                    </div>
                                </div>

                                <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Intensitas
                                </p>

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
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">KDB</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-kdb">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">KB</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-kb">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">KTB</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-ktb">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">PSL</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-psl">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-lg-5 text_all">
                                        <label class="text_all_mobile">Tipe Bangunan</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-tipe-bangunan">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text mt-1 mb-2">
                                    <div class="col-lg-12 text_all">
                                        <p style="text-align: justify">Pada lahan di lokasi ini dapat dikenakan
                                            ketentuan TPZ sebagai berikut:</p>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-12 text_all">
                                    <label class="text_all_mobile inf-k-tpz w-100">
                                        -
                                    </label>
                                </div>
                            </div>

                            {{-- <p class="card-title mt-2 text-center font-weight-bold judul_utama">Ketentuan Bangunan
                            </p>
                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-12 text_all">
                                    <label class="text_all_mobile inf-gsb">
                                        -
                                    </label>
                                </div>
                            </div> --}}


                            {{-- <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Ketentuan Khusus
                            </p>
                            <div class="text_all inf-khusus">
                                -
                            </div> --}}

                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-12 text_all mb-3 text-center">
                                    <label class="text_all_mobile">Kesesuaian Kegiatan Berdasar Tabel ITBX</label>
                                </div>
                            </div>
                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Kegiatan</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>
                                        <select class="w-100" id="selectPSL"></select>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex space_text row_mid_text mb-2">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Ketentuan Perizinan</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <span class="inf-status-ketentuan">-</span>
                                </div>
                            </div>
                            <div class="d-flex space_text row_mid_text mb-3">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Keterangan</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <span class="inf-keterangan-ketentuan">-</span>
                                </div>
                            </div>
                            <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Ketentuan Khusus
                            </p>
                            <div class="d-flex space_text row_mid_text text-justify mb-3">
                                <div class="col-lg-12 text_all">
                                    <label>Pada lahan di lokasi ini dimungkin untuk penerapan ketentuan khusus sebagai
                                        berikut:</label>
                                </div>
                            </div>
                            {{-- <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Kegiatan</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>
                                        <select class="w-100" id="selectPSL"></select>
                                    </p>
                                </div>
                            </div> --}}
                            <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-5 text_all">
                                    <label class="text_all_mobile">Ketentuan Khusus</label>
                                </div>
                                <div class="col-lg-7 text_all">
                                    <p>
                                        <select class="w-100" id="selectKhusus"></select>
                                    </p>
                                </div>
                            </div>
                            <div class="isi-ketentuan-khusus mt-4">

                            </div>



                            <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">
                                Tata Bangunan<br><span class="w-100 text-center text_all"
                                    style="font-weight: normal">Pedoman Tata Bangunan sesuai Pergub
                                    135/2019</span>
                            </p>
                            <div class="d-flex space_text row_mid_text text_all">
                                <div class="col-lg-12 text_all">
                                    <div>
                                        <label class="text-center w-100 text-dark font-weight-bold">Lahan
                                            Perencanaan</label><br>
                                        <label class="text-dark font-weight-bold">Definisi</label>
                                    </div>
                                    <p class="text-justify">
                                        lahan efektif yang direncanakan untuk kegiatan
                                        pemanfaatan ruang, dapat berbentuk superblok, blok,
                                        subblok Dan/atau kaveling/persil/perpetakan
                                    </p>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_a" aria-expanded="false" aria-controls="lahan_a">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Satu Intensitas
                                            </a>
                                        </div>
                                        <div id="lahan_a" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Lahan perencanaan yang memiliki satu
                                                    intensitas pemanfaatan ruang pada satu
                                                    subzona.</p>
                                                <div class="ml-3">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.1 PPT LAHAN PERENCANAAN - SATU INTENSITAS.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_b" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Lebih Dari Satu Intensitas
                                            </a>
                                        </div>
                                        <div id="lahan_b" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Lahan perencanaan yang memiliki lebih
                                                    dari satu intensitas pemanfaatan ruang
                                                    pada satu subzona.</p>
                                                <div class="ml-3">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.2 PPT LAHAN PERENCANAAN - LEBIH DARI SATU INTENSITAS.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_c" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Dipisahkan Prasarana
                                            </a>
                                        </div>
                                        <div id="lahan_c" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Lahan Perencanaan yang masih satu
                                                    kepemilikan, yang dibatasi dan/atau
                                                    dipisahkan prasarana kota.</p>
                                                <div class="ml-3">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.3 PPT LAHAN PERENCANAAN - DIPISAHKAN PRASARANA.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_d" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Lebih Dari Satu Zona
                                            </a>
                                        </div>
                                        <div id="lahan_d" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Lahan perencanaan yang memiliki lebih
                                                    dari satu zona.</p>
                                                <div class="ml-3">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.4 PPT LAHAN PERENCANAAN - LEBIH DARI SATU ZONA.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_e" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Lebih Dari Satu Zona Dipisahkan Prasarana
                                            </a>
                                        </div>
                                        <div id="lahan_e" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Lahan perencanaan yang berada di lebih
                                                    dari satu zona, serta dibatasi dan/atau
                                                    dipisahkan prasarana kota.</p>
                                                <div class="ml-3">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.5 PPT LAHAN PERENCANAAN - LEBIH DARI SATU ZONA DIPISAHKAN PRASARANA.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div id="accordion text_all" style="width: 100%">
                                    <div>
                                        <div class="p-0 pl-3">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_perencanaan" aria-expanded="true"
                                                aria-controls="lahan_perencanaan">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Lahan Perencanaan
                                            </a>
                                        </div>
                                        <div id="lahan_perencanaan" class="collapse show">
                                            <div class="card-body value-collapse">
                                                <div id="accordion text_all" style="width: 100%">
                                                    <div>
                                                        <div class="p-0 pl-3">
                                                            <a class="text-dark font-weight-bold"
                                                                data-toggle="collapse" href="#definisi_lahan"
                                                                aria-expanded="true" aria-controls="definisi_lahan">
                                                                <span class="collapsed"><i
                                                                        class="fa fa-plus"></i></span>
                                                                <span class="expanded"><i
                                                                        class="fa fa-minus"></i></span>
                                                                Definisi
                                                            </a>
                                                        </div>
                                                        <div id="definisi_lahan" class="collapse show">
                                                            <div class="card-body value-collapse">
                                                                <p>lahan efektif yang direncanakan untuk kegiatan
                                                                    pemanfaatan ruang, dapat berbentuk superblok, blok,
                                                                    subblok Dan/atau kaveling/persil/perpetakan
                                                                <div class="ml-3">
                                                                    <a target="_blank"
                                                                        href="{{ asset('pdf_bangunan/I. PPT LAHAN PERENCANAAN.pdf') }}"><i
                                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                                        Selengkapnya</a>
                                                                </div>
                                                                </p>
                                                                <div>
                                                                    <div class="p-0 pl-3">
                                                                        <a class="text-dark font-weight-bold"
                                                                            data-toggle="collapse" href="#lahan_a"
                                                                            aria-expanded="false"
                                                                            aria-controls="lahan_a">
                                                                            <span class="collapsed"><i
                                                                                    class="fa fa-plus"></i></span>
                                                                            <span class="expanded"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                            Satu Intensitas
                                                                        </a>
                                                                    </div>
                                                                    <div id="lahan_a" class="collapse">
                                                                        <div class="card-body value-collapse">
                                                                            <p>Lahan perencanaan yang memiliki satu
                                                                                intensitas pemanfaatan ruang pada satu
                                                                                subzona.</p>
                                                                            <div class="ml-3">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('pdf_bangunan/I.1 PPT LAHAN PERENCANAAN - SATU INTENSITAS.pdf') }}"><i
                                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                                    Selengkapnya</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="p-0 pl-3">
                                                                        <a class="text-dark font-weight-bold"
                                                                            data-toggle="collapse" href="#lahan_b"
                                                                            aria-expanded="false"
                                                                            aria-controls="lahan_b">
                                                                            <span class="collapsed"><i
                                                                                    class="fa fa-plus"></i></span>
                                                                            <span class="expanded"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                            Lebih Dari Satu Intensitas
                                                                        </a>
                                                                    </div>
                                                                    <div id="lahan_b" class="collapse">
                                                                        <div class="card-body value-collapse">
                                                                            <p>Lahan perencanaan yang memiliki lebih
                                                                                dari satu intensitas pemanfaatan ruang
                                                                                pada satu subzona.</p>
                                                                            <div class="ml-3">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('pdf_bangunan/I.2 PPT LAHAN PERENCANAAN - LEBIH DARI SATU INTENSITAS.pdf') }}"><i
                                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                                    Selengkapnya</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="p-0 pl-3">
                                                                        <a class="text-dark font-weight-bold"
                                                                            data-toggle="collapse" href="#lahan_c"
                                                                            aria-expanded="false"
                                                                            aria-controls="lahan_b">
                                                                            <span class="collapsed"><i
                                                                                    class="fa fa-plus"></i></span>
                                                                            <span class="expanded"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                            Dipisahkan Prasarana
                                                                        </a>
                                                                    </div>
                                                                    <div id="lahan_c" class="collapse">
                                                                        <div class="card-body value-collapse">
                                                                            <p>Lahan Perencanaan yang masih satu
                                                                                kepemilikan, yang dibatasi dan/atau
                                                                                dipisahkan prasarana kota.</p>
                                                                            <div class="ml-3">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('pdf_bangunan/I.3 PPT LAHAN PERENCANAAN - DIPISAHKAN PRASARANA.pdf') }}"><i
                                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                                    Selengkapnya</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="p-0 pl-3">
                                                                        <a class="text-dark font-weight-bold"
                                                                            data-toggle="collapse" href="#lahan_d"
                                                                            aria-expanded="false"
                                                                            aria-controls="lahan_b">
                                                                            <span class="collapsed"><i
                                                                                    class="fa fa-plus"></i></span>
                                                                            <span class="expanded"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                            Lebih Dari Satu Zona
                                                                        </a>
                                                                    </div>
                                                                    <div id="lahan_d" class="collapse">
                                                                        <div class="card-body value-collapse">
                                                                            <p>Lahan perencanaan yang memiliki lebih
                                                                                dari satu zona.</p>
                                                                            <div class="ml-3">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('pdf_bangunan/I.4 PPT LAHAN PERENCANAAN - LEBIH DARI SATU ZONA.pdf') }}"><i
                                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                                    Selengkapnya</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <div class="p-0 pl-3">
                                                                        <a class="text-dark font-weight-bold"
                                                                            data-toggle="collapse" href="#lahan_e"
                                                                            aria-expanded="false"
                                                                            aria-controls="lahan_b">
                                                                            <span class="collapsed"><i
                                                                                    class="fa fa-plus"></i></span>
                                                                            <span class="expanded"><i
                                                                                    class="fa fa-minus"></i></span>
                                                                            Lebih Dari Satu Zona Dipisahkan Prasarana
                                                                        </a>
                                                                    </div>
                                                                    <div id="lahan_e" class="collapse">
                                                                        <div class="card-body value-collapse">
                                                                            <p>Lahan perencanaan yang berada di lebih
                                                                                dari satu zona, serta dibatasi dan/atau
                                                                                dipisahkan prasarana kota.</p>
                                                                            <div class="ml-3">
                                                                                <a target="_blank"
                                                                                    href="{{ asset('pdf_bangunan/I.5 PPT LAHAN PERENCANAAN - LEBIH DARI SATU ZONA DIPISAHKAN PRASARANA.pdf') }}"><i
                                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                                    Selengkapnya</a>
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
                                </div> --}}
                            </div>
                            {{-- <div class="d-flex space_text row_mid_text">
                                <div class="col-lg-12 text_all">
                                    <ol>
                                        <li style="margin-left: -25px">Lahan Perencanaan</li>
                                        <li style="margin-left: -25px">Tata Bangunan
                                            <br>
                                            <ol type="a">
                                                <li style="margin-left: -25px">GSB</li>
                                                <li style="margin-left: -25px">Jarak Bebas</li>
                                                <li style="margin-left: -25px">Arkade</li>
                                                <li style="margin-left: -25px">Bangunan Tinggi</li>
                                                <li style="margin-left: -25px">Pagar</li>
                                                <li style="margin-left: -25px">Ramp</li>
                                                <li style="margin-left: -25px">Parkir</li>
                                                <li style="margin-left: -25px">Bangunan di Bawah Permukaan Tanah</li>
                                                <li style="margin-left: -25px">Bangunan Layang</li>
                                            </ol>
                                        </li>
                                        <li style="margin-left: -25px">Intensitas</li>
                                    </ol>
                                </div>
                            </div> --}}

                        </div>
                    </div>

                    <div class="tab-pane " id="pills-poi" role="tabpanel" aria-labelledby="poi-tab">
                        <div class="container" id="poi-print">
                            <p class="card-title mt-2 text-center font-weight-bold judul_utama">Akses</p>
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
                        <div class="container" id="kbli-print">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">KBLI</p>

                            <div class="form-kbli">
                                <div class="d-flex ml-1 margin_cari_kodelbli_mobile">
                                    <div class="col-md-12 text_all">
                                        <label class="text_all_mobile">Kegiatan Ruang</label>
                                        <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                            <select class="form-control text_all" id="kegiatanRuang"
                                                style="z-index: 9999">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
                                    <div class="col-md-12 text_all">
                                        <label class="text_all_mobile">Skala</label>
                                        <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                            <select class="form-control" id="skala">

                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex ml-1 skala_kodekbli margin_cari_kodelbli_mobile">
                                    <div class="col-md-12 text_all">
                                        <label class="text_all_mobile">Kegiatan Kewenangan</label>
                                        <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                                            <select class="form-control" id="kegiatanKewenangan">

                                            </select>
                                        </div>
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

                    <div class="tab-pane " id="pills-cetak" role="tabpanel">
                        <div class="container">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">Opsi Cetak</p>
                            <div class="alert alert-danger alert-dismissible fade show" id="pesanGagalPrint"
                                style="font-size: 10pt" role="alert">
                                <strong>Gagal!</strong> Anda Harus Memilih Salah Satu.
                            </div>
                            <div class="alert alert-danger alert-dismissible fade show" id="pesanGagalPrintKBLI"
                                style="font-size: 10pt" role="alert">
                                <strong>Gagal!</strong> Anda Harus Memilih KBLI.
                            </div>
                            <div class="ml-3">
                                <div class="form-check text_all">
                                    <input class="form-check-input position-static" type="checkbox" id="checkboxProfil"
                                        value="profil" aria-label="..."> Profil
                                </div>
                                <div class="form-check text_all">
                                    <input class="form-check-input position-static" type="checkbox"
                                        id="checkboxKetentuan" value="ketentuan" aria-label="..."> Ketentuan
                                </div>
                                <div class="form-check text_all">
                                    <input class="form-check-input position-static" type="checkbox" id="checkboxAkses"
                                        value="akses" aria-label="..."> Akses
                                </div>
                                <div class="form-check text_all">
                                    <input class="form-check-input position-static" type="checkbox" id="checkboxKBLI"
                                        value="kbli" aria-label="..."> KBLI
                                </div>
                                <center>
                                    <button class="btn btn-sm text_all mt-3 btn-primary" id="printAll"
                                        style="margin-right: 2.5rem;">Cetak</button>
                                </center>





                                <!-- <p style="font-size: 14px;" class="card-title  text-center font-weight-bold mt-2">Keterangan</p> -->
                            </div>


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
            <button class="btn btn-sm ml-2"
                style="background: #fdfffc; border-radius: 30px; box-shadow: 1px 1px 1px #000" id="cagar">
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
                        aria-labelledby="dropdownMenuButton" style="width: 300px">
                        <div class="row p-3">

                            <div class="col-sm-4 text-center d-flex align-items-center">
                                <a href="https://jakevo.jakarta.go.id/" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/jakevo.png') }}">Jakevo</a>
                            </div>
                            <div class="col-sm-4 text-center d-flex align-items-center">
                                <a href="https://jakartasatu.jakarta.go.id/irk/login" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/irk.png') }}">IRK</a>
                            </div>
                            <div class="col-sm-4 text-center d-flex align-items-center">
                                <a href="https://formulir.dpmptsp-dki.com/permohonan-baru" target="_blank"
                                    style="font-size: 11px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img style="width: 65%"
                                        src="{{ asset('assets/gambar/prapermohonan.png') }}">PraPermohonan</a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center d-flex align-items-center">
                                <a href="https://oss.go.id" target="_blank"
                                    style="font-size: 12px; text-decoration:none"
                                    class="text-dark font-weight-bold"><img
                                        src="{{ asset('assets/gambar/OSS.png') }}" class="w-75">OSS</a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center d-flex align-items-center">
                                <a href="https://dpmptsp-jkt.com" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img
                                        src="{{ asset('assets/gambar/pesanajib.png') }}"
                                        class="w-75">Pesan
                                    Ajib</a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center d-flex align-items-center">
                                <a href="https://simbg.pu.go.id/" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/simbg.png') }}"><span>SIMBG</span></a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center">
                                <a href="https://jakartasatu.jakarta.go.id/" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img class="w-75"
                                        src="{{ asset('assets/gambar/jakarta1_logo.png') }}"><span>JakartaSatu</span></a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center">
                                <a href="https://isi.or.id/" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img style="width: 85%; margin-top:-6px"
                                        src="{{ asset('assets/gambar/ISI.png') }}"><span>ISI Survei</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </button>
            <button class="btn btn-sm">
                <div class="container">
                    <div class="row">
                        {{-- @if (!\Auth::check()) --}}
                        <a onclick="loginClick()" id="btnLogin" class="ri-user-fill bg-white p-1 text-secondary"
                            style="border-radius: 50%; width:30px; height:30px; font-size:15px"></a>
                        {{-- @else --}}
                        <div class="dropdown" id="profile">
                            <img style="border-radius: 50%; width:30px;  height:30px;" id="btnLogout"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="dropdown-menu dropdown-menu-right mt-1 p-1" aria-labelledby="btnLogout"
                                style="min-width: 73px;">
                                <a class="dropdown-item p-0 text-center" href="#" onclick="signOut()"
                                    style="font-size: 12px"><i class="fa fa-sign-out"></i> Logout</a>
                                {{-- <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form> --}}
                            </div>
                        </div>
                        {{-- @endif --}}
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
                <div class="dropleft text-center {{ Auth::check() ? 'mt-2' : 'mt-2' }}">
                    {{-- @if (Auth::check()) --}}
                    <button onclick="cekLoginChat()" type="button" id="btnChat"
                        class="ri-phone-line bg-white p-1 text-secondary" data-toggle="dropdown"
                        style="border-radius: 50%; width:30px; height:30px; font-size:15px; border:none">
                    </button>
                    <div class="dropdown-menu" id="frameChat"
                        style="background: none; width:300px; border:none; margin-top:-10px">
                    </div>
                </div>
                <div class="dropleft text-center mt-3">
                    {{-- @if (Auth::check()) --}}
                    <button type="button" onclick="pinLocation()" id="btnPin"
                        class="ri-pushpin-line bg-white p-1 text-secondary"
                        style="border-radius: 50%; width:30px; height:30px; font-size:15px; border:none">
                    </button>
                </div>
                {{-- <button class="btn btn-sm mt-1 ">
                    <div class="container dropleft">
                        <div class="row">
                            <div id="dropdownChat" class="ri-phone-line bg-white p-1 text-secondary"
                                data-toggle="dropdown"
                                style="border-radius: 50%; width:30px; height:30px; font-size:15px"></div>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownChat"
                            style="position: relative;font-size: 12px;margin-top: 5px;border: none;">
                            <h1>Test</h1>
                        </div>
                    </div>
                </button> --}}
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
    <div class="runing-text" data-duplicated='true' data-direction='left'>-</div>


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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"
        integrity="sha512-JHJv/L48s1Hod24iSI0u9bcF/JlUi+YaxliKdbasnw/U1Lp9xxWkaZ3O5OuQPMkVwOVXeFkF4n4176ouA6Py3A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    {{-- @if (isMobileDevice())
        <script src="{{ asset('assets/js/mobile.js') }}"></script>
    @else --}}
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-213546852-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-213546852-1');
    </script>

    <script>
        var APP_URL = {!! json_encode(url('/')) !!}
    </script>
    <script src="{{ asset('assets/js/web.js') }}"></script>
    {{-- @endif --}}
</body>

</html>
