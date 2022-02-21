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
    <link rel="stylesheet" href="{{ asset('assets/css/pitchtoggle.css') }}">
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
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.css"
        type="text/css">


    <!-- custom -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="datetime" content="{{ date('Y-m-d') }}" />
    {{-- <meta name="Access-Control-Allow-Headers" value="Content-Type" /> --}}

</head>

@php
$option_simulasi = ['Rumah Mewah', 'Rumah Biasa', 'Apartemen', 'Rumah Susun', 'Asrama', 'Klinik / Puskesmas', 'Rumah sakit Mewah', 'Rumah Sakit Menengah', 'Rumah Sakit Umum', 'Sekolah Dasar', 'SLTP', 'SLTA', 'Perguruan Tinggi', 'Rumah Toko   /   Rumah Kantor', 'Gedung Kantor', 'Toserba (toko serba ada, mall, department store)', 'Pabrik / Industri', 'Stasiun / Terminal', 'Bandara Udara *', 'Restoran', 'Gedung Pertunjukan', 'Gedung Bioskop', 'Hotel Melati s/d Bintang 2', 'Hotel Bintang 3 ke atas', 'Gedung Peribadatan', 'Perpustakaan', 'Bar', 'Perkumpulan Sosial', 'Klab Malam', 'Gedung Pertemuan', 'Laboratorium', 'Pasar Tradisional / Modern', 'Lainnya'];
@endphp

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
                    <div class="form-check zoning_fill mt-1">
                        <input type="checkbox" class="form-check-input" id="zoning_fill" checked>
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
                                    aria-controls="pills-lokasi" id="profil-tab" aria-selected="true"><i
                                        class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Profil</label>
                            </li>

                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    id="ketentuan-tab" data-toggle="pill" href="#pills-ketentuan" role="tab"
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
                                    id="kblikeg-tab" data-toggle="pill" id="kbli-tab" href="#pills-kblikeg" role="tab"
                                    aria-controls="pills-kblikeg" aria-selected="false"><i
                                        class="ri-user-search-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile menu_kbli_top">KBLI</label>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    data-toggle="pill" href="#pills-cetak" id="cetak-tab" role="tab"
                                    aria-controls="pills-cetak" aria-selected="false"><i
                                        class="ri-printer-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Cetak</label>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    data-toggle="pill" href="#pills-simulasi" role="tab" aria-controls="pills-poi"
                                    id="simulasi-tab" aria-selected="false"><i class="ri-calculator-line"></i><span
                                        class="badge badge-danger" style="top: -2.6rem;left: 1rem">Beta</span></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Simulasi</label>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill" id="btnSHP"
                                    href="#" target="_blank"><i class="ri-shape-line"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">File SHP</label>
                            </li>
                            <li class="nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    data-toggle="pill" href="#pills-andalalin" role="tab" id="andalalin-tab"
                                    aria-selected="false"><i class="ri-e-bike-2-line"></i></a>

                                <br>
                                <label class="size_menu size_menu_mobile">Andalalin</label>
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
                                    href="menu/lokasi.html" role="tab" aria-controls="pills-lokasi"
                                    aria-selected="true"><i class="fa fa-map-marker"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Lokasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    href="menu/ekonomi.html" role="tab" aria-controls="pills-ekonomi"
                                    aria-selected="false"><i class="ri-funds-box-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Ekonomi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    href="menu/zonasi.html" role="tab" aria-controls="pills-zonasi"
                                    aria-selected="false"><i class="ri-map-2-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Zonasi</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    href="menu/persil.html" role="tab" aria-controls="pills-persil"
                                    aria-selected="false"><i class="ri-home-4-fill"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">Persil</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class="btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    href="menu/poi.html" role="tab" aria-controls="pills-poi" aria-selected="false"><i
                                        class="fa fa-crosshairs"></i></a>
                                <br>
                                <label class="size_menu size_menu_mobile">POI</label>
                            </li>

                            <li class="col-xs-3 col-sm-3 col-md-3 col-lg-3 p-2 nav-item">
                                <a class=" btn btn-outline-primary btn-md tombol_menu padding_icon_navpill"
                                    href="menu/kode-kbli.html" role="tab" aria-controls="pills-kblikeg"
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
                                        <label class="text_all_mobile">ID Sub Blok</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p class="inf-id-sub-blok">-</p>
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
                                        subblok Dan/atau kaveling/persil/perpetakan.
                                    </p>
                                    <div class="pdf_file">
                                        <a target="_blank"
                                            href="{{ asset('pdf_bangunan/I. PPT LAHAN PERENCANAAN.pdf') }}"><i
                                                class="fa fa-file-pdf-o text-danger"></i>
                                            Selengkapnya</a>
                                    </div>
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
                                                <div class="pdf_file">
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
                                                <div class="pdf_file">
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
                                                <div class="pdf_file">
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
                                                <div class="pdf_file">
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
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.5 PPT LAHAN PERENCANAAN - LEBIH DARI SATU ZONA DIPISAHKAN PRASARANA.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_f" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Pemecahan dan Penggabungan
                                            </a>
                                        </div>
                                        <div id="lahan_g" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Pemecahan dan Penggabungan Lahan Perencanaan.</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.6 PPT LAHAN PERENCANAAN - PEMECAHAN DAN PENGGABUNGAN.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_h" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Ilustrasi Perhitungan Intensitas
                                            </a>
                                        </div>
                                        <div id="lahan_h" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Perhitungan Intensitas pada Laha PerencanaanIlustrasi Perhitungan
                                                    Intensitas pada Laha Perencanaan.</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.8 PPT LAHAN PERENCANAAN - ILUSTRASI PERHITUNGAN INTENSITAS.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#lahan_g" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Perhitungan Intensitas
                                            </a>
                                        </div>
                                        <div id="lahan_f" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Perhitungan Intensitas pada Laha Perencanaan.</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/I.7 PPT LAHAN PERENCANAAN - PERHITUNGAN INTENSITAS.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label class="text-center w-100 text-dark font-weight-bold">Tata Bangunan
                                            Gedung</label><br>
                                        <label class="text-dark font-weight-bold">Definisi</label>
                                    </div>
                                    <p class="text-justify">
                                        Bangunan gedung adalah wujud fisik hasil pekerjaan konstruksi yang menyatu
                                        dengan tempat kedudukannya, sebagian atau seluruhnya berada di atas dan/atau di
                                        dalam tanah dan/atau air, yang berfungsi untuk hunian atau tempat tinggal,
                                        kegiatan keagamaan, kegiatan usaha, kegiatan sosial, budaya, maupun kegiatan
                                        khusus.
                                    </p>
                                    <div class="pdf_file">
                                        <a target="_blank"
                                            href="{{ asset('pdf_bangunan/II. PPT TATA BANGUNAN GEDUNG.pdf') }}"><i
                                                class="fa fa-file-pdf-o text-danger"></i>
                                            Selengkapnya</a>
                                    </div>
                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#gsb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Garis Sempadan Bangunan (GSB)
                                            </a>
                                        </div>
                                        <div id="gsb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Batas terluar bangunan gedung terhadap rencana jalan, jalan rel,
                                                    sungai, drainase, waduk, pantai dan jalur tegangan tinggi..</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.1 PPT TATA BANGUNAN GEDUNG - GSB.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#gsb-gsj" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            GSB terhadap Garis Sempadan Jalan (GSJ)
                                                        </a>
                                                    </div>
                                                    <div id="gsb-gsj" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>GSJ adalah garis rencana jalan yang ditetapkan dalam
                                                                rencana kota</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Rencana jalan dengan lebar ≤ 12m, maka besar GSB
                                                                    adalah 0,5 (Setengah) kali lebar rencana jalan;</li>
                                                                <li>Rencana jalan dengan lebar 12m – 26m, maka besar GSB
                                                                    adalah 8m;</li>
                                                                <li>Rencana jalan dengan lebar > 26m, maka besar GSB
                                                                    adalah 10m;</li>
                                                                <li>Jalan eksisting tanpa rencana dengan lebar kurang
                                                                    dari 4 m, maka besar GSB adalah 0m;</li>
                                                                <li>Besar GSB pada lahan perencanaan yang berada pada
                                                                    sisi rencana jalan yang di dalamnya terdapat rencana
                                                                    kota berupa ruang terbuka hijau, ruang terbuka biru,
                                                                    jalan tol atau jaringan rel kereta, GSB dihitung
                                                                    berdasarkan lebar rencana jalan pada sisi muka lahan
                                                                    perencanaan; dan</li>
                                                                <li>Ketentuan GSB bangunan dapat ditiadakan untuk
                                                                    Kawasan Cagar Budaya atau kawasan tertentu dengan
                                                                    menyediakan pedestrian dan penetapannya dilakukan
                                                                    oleh gubernur.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.1.a PPT TATA BANGUNAN GEDUNG - GSB - GSJ.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#gsb-gss" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            GSB terhadap Garis Sempadan Sungai (GSS)
                                                        </a>
                                                    </div>
                                                    <div id="gsb-gss" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>GSS adalah garis maya di kiri dan kanan palung sungai
                                                                yang ditetapkan sebagai batas perlindungan sungai.</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Berlaku untuk Sungai, kali dan/atau saluran air yang
                                                                    belum memiliki jalan inspeksi;</li>
                                                                <li>GSS adalah garis maya di kiri dan kanan palung
                                                                    sungai yang ditetapkan sebagai batas perlindungan
                                                                    sungai;</li>
                                                                <li>Sungai, kali dan/atau saluran air dengan lebar ≤ 18
                                                                    m, maka besar GSB adalah 0,5 (setengah) kali lebar
                                                                    sungai dari GSS, kecuali untuk fungsi hunian besar
                                                                    GSB minimum 4 m dihitung dari GSS; dan/atau</li>
                                                                <li>Sungai, kali dan/atau saluran air dengan lebar > 18
                                                                    m, besar GSB 10 m, kecuali untuk fungsi hunian besar
                                                                    GSB minimum 5 m dihitung dari GSS.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.1.b PPT TATA BANGUNAN GEDUNG - GSB - GSS.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#gsb-gsp" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            GSB terhadap Garis Sempadan Pantai (GSP)
                                                        </a>
                                                    </div>
                                                    <div id="gsb-gsp" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>GSP adalah jarak bebas atau batas wilayah pantai yang
                                                                tidak boleh dimanfaatkan untuk lahan budi daya atau
                                                                untuk didirikan bangunan</p>
                                                            <ol id="list-ketentuan">
                                                                <li>GSP diukur dari titik pasang tertinggi ke arah
                                                                    darat;</li>
                                                                <li> Penetapan GSP disesuaikan dengan karakteristik
                                                                    topografi, biofisik, hidro-oseanografi pesisir,
                                                                    kebutuhan ekonomi dan budaya, serta ketentuan lain;
                                                                </li>
                                                                <li>GSB pada pantai di pulau-pulau Kabupaten
                                                                    Administrasi Kepulauan Seribu harus memenuhi
                                                                    ketentuan GSP yang ditetapkan dalam RDTR dan PZ atau
                                                                    disesuaikan dengan kondisi pulau;</li>
                                                                <li>GSP ditetapkan sesuai kebutuhan dengan penghitungan
                                                                    harus mengikuti ketentuan dan mempertimbangkan
                                                                    perlindungan terhadap gempa dan/atau tsunami,
                                                                    perlindungan pantai dari erosi atau abrasi,
                                                                    perlindungan sumber daya buatan di pesisir dari
                                                                    badai, banjir, dan bencana alam lainnya,
                                                                    perlindungan terhadap ekosistem pesisir, seperti
                                                                    lahan basah, mangrove, terumbu karang, padang lamun,
                                                                    gumuk pasir, estuaria, dan delta, serta, pengaturan
                                                                    akses publik</li>
                                                                <li>GSB pada pantai di pesisir Kota Administrasi Jakarta
                                                                    Utara sebesar 10 m atau disesuaikan dengan kondisi
                                                                    lingkungan dihitung dari GSP ke arah darat</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.1.c PPT TATA BANGUNAN GEDUNG - GSB - GSP.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#gsb-gsd" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            GSB terhadap Garis Sempadan Danau, Situ, atau Waduk (GSD)
                                                        </a>
                                                    </div>
                                                    <div id="gsb-gsd" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>GSD adalah garis maya yang mengelilingi dan berjarak
                                                                tertentu dari tepi badan danau yang berfungsi sebagai
                                                                kawasan pelindung danau</p>
                                                            <ol id="list-ketentuan">
                                                                <li>GSB terhadap GSD sebesar 10 m (sepuluh meter)
                                                                    dihitung dari tanggul danau atau dari tinggi
                                                                    maksimum air danau ke arah darat</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.1.d PPT TATA BANGUNAN GEDUNG - GSB - GSD.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#gsb-gska" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            GSB terhadap Garis Sempadan Kereta Api (GSKa)
                                                        </a>
                                                    </div>
                                                    <div id="gsb-gska" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>GSKa merupakan garis batas luar pengamanan rel kereta api
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Besarnya GSB terhadap GSKa sebesar 9 m (sembilan
                                                                    meter) dihitung terhadap ruang milik jalan rel
                                                                    kecuali pada bangunan stasiun</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.1.e PPT TATA BANGUNAN GEDUNG - GSB - GSKa.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#jbb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Jarak bebas bangunan
                                            </a>
                                        </div>
                                        <div id="jbb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Jarak bebas bangunan adalah jarak minimal yang diperkenankan dari
                                                    dinding terluar bangunan gedung sampai batas lahan perencanaan.</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.2 PPT TATA BANGUNAN GEDUNG - JARAK BEBAS.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bt" aria-expanded="false" aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Berdasarkan Ketinggian
                                                        </a>
                                                    </div>
                                                    <div id="jb-bt" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas bangunan berdasarkan ketinggian bangunan</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Paling sedikit 4 m pada lantai 1 (satu) sampai
                                                                    lantai 4 bangunan Gedung</li>
                                                                <li>dari lantai lima sampai 21 jarak bebas ditambah 0,5
                                                                    m sampai mencapai jarak bebas 12,5 m</li>
                                                                <li>lantai dua puluh dua dan seterusnya jarak bebas
                                                                    tetap 12,5 m</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.a PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BERDASARKAN KETINGGIAN.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-zh" aria-expanded="false" aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Berimpitan Zona Hijau
                                                        </a>
                                                    </div>
                                                    <div id="jb-zh" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas bangunan pada Lahan perencanaan yang
                                                                berimpitan dengan Zona Terbuka Hijau Lindung, Zona Hutan
                                                                Kota, Zona Taman Kota, Zona Pemakaman, Zona Jalur Hijau,
                                                                Zona Hijau Rekreasi.</p>
                                                            <ol id="list-ketentuan">
                                                                <li>1⁄2 (setengah) jarak bebas atau minimum 4 m;</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.b PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BERIMPITAN ZONA HIJAU.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-zi" aria-expanded="false" aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Berimpitan Zona Industri
                                                        </a>
                                                    </div>
                                                    <div id="jb-zi" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas bangunan pada Lahan perencanaan yang
                                                                berimpitan dengan zona industri dan pergudangan dan/atau
                                                                bangunan dengan kegiatan industri dan pergudangan</p>
                                                            <ol id="list-ketentuan">
                                                                <li>jarak bebas minimum 6 m;</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.c PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BERIMPITAN ZONA INDUSTRI.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-spbu" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Kegiatan SPBU
                                                        </a>
                                                    </div>
                                                    <div id="jb-spbu" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas untuk kegiatan SPBU dan/atau SPBG dengan
                                                                kegiatan lain di luar kavling </p>
                                                            <ol id="list-ketentuan">
                                                                <li>jarak minimum 30 m (tiga puluh meter) dihitung dari
                                                                    bidang dinding terluar konstruksi tangki penyimpanan
                                                                    bahan bakar</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.d PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - KEGIATAN SPBU.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bbd" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Berdasarkan Bidang Dinding
                                                        </a>
                                                    </div>
                                                    <div id="jb-bbd" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas bangunan berdasarkan bidang dinding bangunan
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Jika massa bangunan membentuk sudut terhadap bidang
                                                                    pagar atau batas lahan perencanan, jarak bebas
                                                                    bangunan dihitung setengah dari ketentuan jarak
                                                                    bebas, kecuali ditentukan harus menyediakan
                                                                    sirkulasi mobil pemadam kebakaran</li>
                                                                <li>untuk penggunaan overstek, jika lebar overstek tidak
                                                                    lebih dari atau sama dengan 1,5 m, jarak bebas
                                                                    bangunan dihitung dari bidang dinding terluar
                                                                    bangunan</li>
                                                                <li>untuk penggunaan overstek, jika lebar overstek lebih
                                                                    dari 1,5 m, jarak bebas bangunan dihitung dari
                                                                    bidang terluar overstek</li>
                                                                <li>untuk penggunaan fasad selubung ganda, jika jarak
                                                                    antar fasad selubung ganda tidak lebih dari 1,5 m,
                                                                    jarak bebas bangunan dihitung dari bidang fasad
                                                                    selubung utama bangunan gedung</li>
                                                                <li>untuk penggunaan fasad selubung ganda, jika jarak
                                                                    antar fasad selubung ganda lebih dari 1,5 m, jarak
                                                                    bebas bangunan dihitung dari bidang fasad selubung
                                                                    (ganda) tambahan bangunan gedung</li>
                                                                <li>untuk mekanikal elektrikal jarak bebas bangunan
                                                                    dihitung minimum setengah dari ketentuan jarak bebas
                                                                    dari batas lahan perencanaan</li>
                                                                <li>Pada Kawasan PSL padat dan sangat padat bangunan
                                                                    deret diperkenankan sampai dengan ketinggian 8
                                                                    lantai sedangkan lantai 9 dan seterusnya
                                                                    diberlakukan ketentuan jarak bebas</li>
                                                                <li>Pada kawasan PSL kurang padat dan tidak padat,
                                                                    bangunan deret diperkenankan sampai ketinggian 4
                                                                    lantai, sedangkan lantai 5 dan seterusnya
                                                                    diberlakukan ketentuan jarak bebas</li>
                                                                <li>Jika nilai jarak GSB ke GSJ/GSS kurang dari jarak
                                                                    bebas bangunan yang ditetapkan, maka jarak bidang
                                                                    tampak depan dengan GSJ/GSS untuk lantai
                                                                    dasar/lantai 1 sampai dengan lantai 4 sebesar GSB,
                                                                    sedangkan lantai 5 dan seterusnya jarak bidang
                                                                    tampak depan menggunakan ketentuan jarak bebas
                                                                    bangunan yang ditetapkan</li>
                                                                <li>JIka GSB lebih besar dari jarak bebas bangunan yang
                                                                    ditetapkan, maka jarak bidang tampak depan dengan
                                                                    GSJ/GSS paling sedikit sebesar GSB</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.e PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BERDASARKAN BIDANG DINDING.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bbs" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Jarak Bebas Samping
                                                        </a>
                                                    </div>
                                                    <div id="jb-bbs" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Jarak bebas bangunan berdasarkan bidang dinding bangunan
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Jarak bebas samping dibebaskan untuk gedung dengan
                                                                    kegiatan rumah kampung, rumah sangat kecil, rumah
                                                                    kecil, rumah sedang, rumah besar dan rumah flat
                                                                    dengan tipe tunggal atau kopel pada luas bidang
                                                                    tapak lahan yang dapat dibangun kurang dari 36 m2
                                                                </li>
                                                                <li>Luas bidang tapak lahan yang dapat dibangun dalam
                                                                    lahan perencanaan adalah luas lahan perencanaan yang
                                                                    dihitung setelah dikurangi GSB, prasarana kota dan
                                                                    jarak bebas bangunan</li>
                                                                <li>Jarak bebas samping dibebaskan untuk bangunan gedung
                                                                    dengan tipe tunggal atau kopel dengan lebar lahan
                                                                    perencanaan rata-rata sampai dengan 12 m</li>
                                                                <li>lebar lahan perencanaan rata-rata dihitung dari
                                                                    penjumlahan lebar muka lahan perencanaan ditambah
                                                                    lebar belakang lahan perencanaan dibagi dua</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.f PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - SAMPING.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bbsb" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Jarak bebas belakang
                                                        </a>
                                                    </div>
                                                    <div id="jb-bbsb" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Jarak bebas bangunan berdasarkan bidang dinding bangunan
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Jarak bebas belakang dapat dikecualikan untuk
                                                                    bangunan gedung untuk kegiatan rumah kampung, rumah
                                                                    sangat kecil, rumah kecil, rumah sedang, rumah besar
                                                                    dan rumah flat dengan tetap memperhatikan penghawaan
                                                                    dan pencahayaan alami
                                                                </li>
                                                                <li>Jarak bebas belakang dibebaskan untuk bangunan
                                                                    gedung dengan jarak lahan perencanaan antara GSB
                                                                    dengan batas tanah belakang maksimum 10 m</li>
                                                                <li>Pada bangunan gedung dengan lebar bangunan maksimum
                                                                    8 m , dapat mengikuti jarak bebas hingga intensitas
                                                                    pemanfaatan ruang dipenuhi.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.g PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BELAKANG.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bbb" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Jarak bebas antar bangunan
                                                        </a>
                                                    </div>
                                                    <div id="jb-bbb" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Jarak bebas antar bangunan adalah jarak minimal yang
                                                                diperkenankan dari dinding terluar antar bangunan gedung
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Jarak bebas antar bangunan dalam satu lahan
                                                                    perencanaan adalah sebesar 1⁄2 (setengah) kali
                                                                    ketentuan jarak bebas bangunan terhadap batas lahan
                                                                    perencanaan
                                                                </li>
                                                                <li>Jika suatu massa bangunan denahnya membentuk huruf U
                                                                    dan/atau huruf H (dengan lekukan), jika kedalaman
                                                                    lekukan melebihi jarak bebas antar bangunan
                                                                    sebagaimana dimaksud pada klausul huruf (a), maka
                                                                    bangunan tersebut dianggap sebagai dua massa
                                                                    bangunan dan jarak antara kedua massa bangunan
                                                                    minimum sebesar jarak antar bangunan dalam satu
                                                                    lahan perencanaan</li>
                                                                <li>suatu massa bangunan denahnya membentuk huruf U
                                                                    dan/atau huruf H (dengan lekukan), jika kedalaman
                                                                    lekukan kurang dari jarak bebas antar bangunan
                                                                    sebagaimana dimaksud pada klausul huruf (a), maka
                                                                    massa bangunan tersebut dianggap sebagai dua massa
                                                                    bangunan, dan jarak antar kedua massa bangunan
                                                                    tersebut minimum sebesar 1⁄2 (setengah) dari jarak
                                                                    antar bangunan dalam satu lahan perencanaan</li>
                                                                <li>Jika suatu massa bangunan denahnya membentuk huruf U
                                                                    dan/atau huruf H (dengan lekukan), jika kedalaman
                                                                    lekukan kurang dari jarak bebas antar bangunan
                                                                    sebagaimana dimaksud pada klausul huruf (a), maka
                                                                    massa bangunan tersebut dianggap sebagai dua massa
                                                                    bangunan, dan jarak antar kedua massa bangunan
                                                                    tersebut minimum sebesar 1⁄2 (setengah) dari jarak
                                                                    antar bangunan dalam satu lahan perencanaan</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.h PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - ANTAR BANGUNAN.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#jb-bbbs" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Bangunan dengan fungsi khusus
                                                        </a>
                                                    </div>
                                                    <div id="jb-bbbs" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Bangunan dengan fungsi khusus adalah Bangunan yang
                                                                berfungsi untuk menggunakan, menyimpan atau memproduksi
                                                                bahan peledak atau bahan-bahan lain yang sifatnya mudah
                                                                meledak, bahan radioaktif, racun, mudah terbakar atau
                                                                bahan-bahan lain yang berbahaya
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>lokasi bangunan gedung terletak di luar lingkungan
                                                                    perumahan atau jarak minimum 50 m dari jalan umum,
                                                                    jalan kereta api, dan bangunan gedung lain di
                                                                    sekitarnya
                                                                </li>
                                                                <li>lokasi bangunan gedung dikelilingi pengaman dengan
                                                                    tinggi minimum 2,5 m dan ruang terbuka pada pintu
                                                                    depan harus ditutup dengan pintu yang kuat dengan
                                                                    diberi peringatan
                                                                </li>
                                                                <li>Bangunan fungsi khusus terletak pada jarak minimum
                                                                    10 m) dari batas-batas pekarangan, serta bagian
                                                                    dinding yang terlemah dari bangunan tersebut
                                                                    diarahkan ke daerah yang aman</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.2.i PPT TATA BANGUNAN GEDUNG - JARAK BEBAS - BANGUNAN KHUSUS.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#jbs"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Jarak Bebas Basemen
                                            </a>
                                        </div>
                                        <div id="jbs" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Jarak bebas basemen adalah jarak minimum yang diperkenankan dari
                                                    dinding terdalam basemen ditambah 30 cm sampai batas lahan
                                                    perencanaan.</p>
                                                <ol id="list-ketentuan">
                                                    <li>Jarak bebas basemen harus berjarak minimum 3 m (tiga meter) dari
                                                        batas lahan perencanaan</li>
                                                    <li>Jarak bebas dinding terluar bangunan basemen pada bangunan
                                                        ketinggian maksimum 4 lantai, minimum berjarak 3 m dari GSJ,
                                                        GSK, dan/atau saluran, serta minimum 1 m terhadap lahan
                                                        perencanaan lain, dan tidak menimbulkan dampak negatif terhadap
                                                        persil/perpetakan sekitar;</li>
                                                </ol>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.3 PPT TATA BANGUNAN GEDUNG - JARAK BEBAS BASEMEN.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#pagar"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Pagar
                                            </a>
                                        </div>
                                        <div id="pagar" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Pagar adalah struktur tegak yang sengaja dirancang untuk membatasi
                                                    lahan.</p>
                                                <ol id="list-ketentuan">
                                                    <li>Posisi pagar diperkenankan terletak pada batas lahan perencanaan
                                                    </li>
                                                    <li>Pagar tidak boleh membentuk sudut pada tikungan</li>
                                                    <li>Bangunan gedung yang ditentukan sebagai arkade tidak
                                                        diperbolehkan menggunakan pagar
                                                    </li>
                                                    <li>Letak pintu untuk kendaraan bermotor roda empat pada lahan
                                                        perencanaan yang membentuk sudut tikungan untuk fungsi hunian
                                                        diberi jarak minimum 8 m dari titik belok, dan untuk fungsi
                                                        non-hunian dihitung 20 m dari titik belok</li>
                                                    <li>Letak pintu akses pada lahan perencanaan yang tidak memenuhi
                                                        persyaratan sebagaimana dimaksud di atas, diletakkan pada ujung
                                                        terjauh batas lahan perencanaan terhadap titik belok</li>
                                                    <li>Tinggi pagar batas pekarangan sepanjang pekarangan samping dan
                                                        belakang maksimum 3 m di atas permukaan tanah pekarangan untuk
                                                        bangunan tipe tunggal</li>
                                                    <li>Jika pagar merupakan dinding bangunan fungsi hunian bertingkat
                                                        atau berfungsi sebagai pembatas pandangan, maka tinggi
                                                        tembok/dinding diperkenankan maksimum 7 m dari permukaan tanah
                                                        pekarangan</li>
                                                    <li>Tinggi pagar pada GSJ dan antara GSJ dengan GSB pada bangunan
                                                        fungsi hunian maksimum 1,50 m di atas permukaan tanah pekarangan
                                                    </li>
                                                    <li>Tinggi pagar pada GSJ dan antara GSJ dengan GSB pada bangunan
                                                        fungsi non-hunian termasuk untuk bangunan industri maksimum 2 m
                                                        di atas permukaan tanah pekarangan</li>
                                                    <li>Pagar pada GSJ harus tembus pandang, dengan bagian bawahnya
                                                        dapat tidak tembus pandang paling tinggi 1 m (satu meter) di
                                                        atas permukaan tanah pekarangan.</li>
                                                    <li>Pagar pada bangunan fungsi khusus/perwakilan negara asing
                                                        mengikuti asas resiprositas atau asas timbal balik</li>
                                                </ol>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.4 PPT TATA BANGUNAN GEDUNG - PAGAR.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#arkade"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Arkade
                                            </a>
                                        </div>
                                        <div id="arkade" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Arkade adalah bangunan yang berfungsi sebagai jalur sirkulasi pejalan
                                                    kaki yang memiliki akses menerus antar persil.</p>
                                                <ol id="list-ketentuan">
                                                    <li>Setiap bangunan gedung yang disyaratkan menyediakan arkade, maka
                                                        massa bangunan harus sejajar dan berhimpit dengan GSJ
                                                    </li>
                                                    <li>Bangunan gedung yang telah terbentuk arkade dan/atau ditetapkan
                                                        mempunyai arkade, untuk lantai 2 sampai dengan lantai 4 dapat
                                                        berada di atas arkade dan untuk lantai 5 dan seterusnya berlaku
                                                        ketentuan jarak bebas bangunan.</li>
                                                    <li>Bangunan gedung yang ditetapkan memiliki arkade, tinggi bukaan
                                                        pada tampak arkade adalah 3 m dan harus menerus antar persil
                                                        untuk membentuk kontinuitas muka kawasan dengan lebar arkade
                                                        minimum 3 m
                                                    </li>
                                                </ol>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.5 PPT TATA BANGUNAN GEDUNG - ARKADE.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#ramp"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                lerengan (ramp) kendaraan
                                            </a>
                                        </div>
                                        <div id="ramp" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>lerengan (ramp) kendaraan memiliki ketentuan:</p>
                                                <ol id="list-ketentuan">
                                                    <li>tidak boleh memotong jalur pedestrian/sarana pejalan kaki umum.
                                                    </li>
                                                    <li>Ramp kendaraan menuju dan/atau dari basemen harus memiliki ruang
                                                        datar minimum 3 m dari GSJ jalan utama.</li>
                                                    <li>ramp kendaraan menuju dan/atau dari basemen di luar bangunan
                                                        minimum berjarak 60 cm dari GSJ jalan dan batas
                                                        persil/perpetakan
                                                    </li>
                                                    <li>setiap lantai untuk fungsi parkir dengan luas diatas 5.000 m2
                                                        (lima ribu meter persegi) atau minimum 250 (dua ratus lima
                                                        puluh) SRP (Satuan Ruang Parkir) harus dilengkapi ramp kendaraan
                                                        paling sedikit masing-masing 1 (satu) unit untuk ramp naik dan
                                                        ramp turun.
                                                    </li>
                                                    <li>jarak bebas antara struktur ke ramp minimum 40 cm
                                                    </li>
                                                </ol>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.6 PPT TATA BANGUNAN GEDUNG - RAMP.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>


                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#ramp-lurus" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ramp kendaraan lurus
                                                        </a>
                                                    </div>
                                                    <div id="ramp-lurus" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>lerengan (ramp) kendaraan memiliki ketentuan:</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>kemiringan ramp kendaraan lurus minimum 1 (satu)
                                                                    berbanding 7 (tujuh) dan kemiringan ramp lurus
                                                                    dengan lantai parkir minimum 1 (satu) berbanding 20
                                                                    (dua puluh)
                                                                </li>
                                                                <li>lebar ramp kendaraan lurus 1 (satu) arah minimum 3
                                                                    m.</li>
                                                                <li>Lebar ramp kendaraan lurus untuk 2 (dua) arah harus
                                                                    diberi pemisah dengan lebar 50 cm (lima puluh
                                                                    sentimeter) sehingga lebar minimum (3,00 + 0,50 +
                                                                    3,00) m (enam koma lima meter), dan tinggi pemisah
                                                                    sebesar 10 cm (sepuluh sentimeter); dan
                                                                </li>
                                                                <li>Ramp kendaraan lurus dapat dilengkapi landasan dasar
                                                                    dengan memperhatikan keselamatan pengendara.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.6.a PPT TATA BANGUNAN GEDUNG - RAMP - LURUS.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#ramp-spiral" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ramp kendaraan spiral
                                                        </a>
                                                    </div>
                                                    <div id="ramp-spiral" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>lerengan (ramp) kendaraan memiliki ketentuan:</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Ramp kendaraan spiral secara menerus maksimum 5
                                                                    (lima) lantai, jika lantai parkirnya lebih dari 5
                                                                    (lima) lantai harus menggunakan sirkulasi datar
                                                                    sebelum ke lantai berikutnya
                                                                </li>
                                                                <li>lebar ramp kendaraan spiral 1 (satu) arah minimum
                                                                    3,5 m (tiga koma lima meter); dan.</li>
                                                                <li>lebar ramp kendaraan spiral untuk 2 (dua) arah
                                                                    diberi pemisah lebar 50 cm (lima puluh sentimeter)
                                                                    sehingga lebar minimum (3,50 + 0,50 + 3,50) m (tujuh
                                                                    koma lima meter) dan tinggi pembatas 10 cm (sepuluh
                                                                    sentimeter).
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.6.b PPT TATA BANGUNAN GEDUNG - RAMP - SPIRAL.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#parkir"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Parkir
                                            </a>
                                        </div>
                                        <div id="parkir" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p> Penyediaan parkir dapat diterapkan pada:</p>
                                                <ol id="list-ketentuan">
                                                    <li>Bagian halaman/pelataran di dalam lahan perencanaan; dan/atau
                                                    </li>
                                                    <li>Bangunan (sebagai bangunan utama, bangunan khusus parkir
                                                        dan/atau basemen).</li>
                                                </ol>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.7 PPT TATA BANGUNAN GEDUNG - PARKIR.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>


                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#parkir-khusus" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Fasilitas parkir khusus
                                                        </a>
                                                    </div>
                                                    <div id="parkir-khusus" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Fasilitas parkir khusus adalah Fasilitas Parkir yang
                                                                disediakan untuk penyandang disabilitas, orang lanjut
                                                                usia, ibu hamil dan pengguna sepeda.</p>
                                                            <ol id="list-ketentuan">
                                                                <li>terletak pada lintasan terdekat menuju
                                                                    bangunan/fasilitas yang dituju dan/atau pintu parkir
                                                                    utama;
                                                                </li>
                                                                <li>mempunyai cukup ruang bebas bagi pengguna kursi roda
                                                                    dan mempermudah masuk dan keluar kursi roda dari
                                                                    kendaraan</li>
                                                                <li>disediakan jalur khusus bagi penyandang disabilitas;
                                                                    dan
                                                                </li>
                                                                <li>parkir khusus ditandai dengan simbol tanda parkir.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.7.a PPT TATA BANGUNAN GEDUNG - PARKIR - PARKIR KHUSUS.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#parkir-dimensi" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Tata letak dan Dimensi Parkir
                                                        </a>
                                                    </div>
                                                    <div id="parkir-dimensi" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>lerengan (ramp) kendaraan memiliki ketentuan:</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Ukuran unit parkir 1 (satu) mobil (sedan/van)
                                                                    ditentukan minimum lebar 2,30 m dan panjang 4,50 m
                                                                    pada posisi tegak lurus.
                                                                </li>
                                                                <li>khusus untuk parkir sejajar ditentukan minimum lebar
                                                                    2,30 m ( dan panjang 6,0 m .</li>
                                                                <li>Rasio parkir di dalam bangunan 25 m2 /mobil.
                                                                </li>
                                                                <li>Ukuran unit parkir 1 motor ditentukan minimal lebar
                                                                    0,75 m dan panjang 2 m.
                                                                </li>
                                                                <li>Apabila pada salah satu ujung jalan pada tempat
                                                                    parkir tersebut buntu, maka harus disediakan ruang
                                                                    manuver agar kendaraan dapat parkir dan keluar
                                                                    kembali dengan mudah.
                                                                </li>
                                                                <li>Apabila disediakan pedestrian pada posisi parkir
                                                                    tegak lurus/menyudut, maka lebar pedestrian
                                                                    ditentukan minimum 1,50 m.
                                                                </li>
                                                                <li>Ketentuan nomor 1 sampai dengan 6 dikecualikan untuk
                                                                    fasilitas parkir dengan sistem mekanikal bertingkat,
                                                                    dan dilengkapi dengan kajian sistem perparkiran
                                                                    tersebut.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.7.b PPT TATA BANGUNAN GEDUNG - PARKIR - TATA LETAK DAN DIMENSI .pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#parkir-halaman" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Parkir di Halaman
                                                        </a>
                                                    </div>
                                                    <div id="parkir-halaman" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>lerengan (ramp) kendaraan memiliki ketentuan:</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>penataan halaman parkir harus disediakan pohon-pohon
                                                                    peneduh dan untuk jumlah parkir lebih dari 20 (dua
                                                                    puluh) mobil harus disediakan ruang duduk/tunggu
                                                                    untuk sopir dengan ukuran minimum 2 m (dua meter) x
                                                                    3 m (tiga meter).
                                                                </li>
                                                                <li>Pada ruang terbuka di antara GSJ-GSB diatur dengan
                                                                    ketentuan Jika Lebar Rencana Jalan < 30 m maka Luas
                                                                        Maksimum Lahan Parkir Diperbolehkan s/d 100 %,
                                                                        Jika Lebar Rencana Jalan 30 m < L < 50 m maka
                                                                        Luas Maksimum Lahan Parkir Diperbolehkan s/d 50
                                                                        %, Jika Lebar Rencana Jalan> 50 m maka Luas
                                                                        Maksimum Lahan Parkir Mutlak harus dihijaukan.
                                                                </li>
                                                                <li>Terhadap sisa ruang parkir eksisting yang terkena
                                                                    ketentuan parkir maksimum dalam Kawasan berorientasi
                                                                    transit (Transit Oriented Development/TOD) dapat
                                                                    dimanfaatkan sebagai ruang terbuka hijau/taman dan
                                                                    sejenisnya yang ditanami pohon pelindung/peneduh
                                                                    untuk fungsi sosial dan ekologis yang dapat diakses
                                                                    public .
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.7.c PPT TATA BANGUNAN GEDUNG - PARKIR - DI HALAMAN.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#parkir-bangunan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Parkir di Halaman
                                                        </a>
                                                    </div>
                                                    <div id="parkir-bangunan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Parkir dalam Bangunan adalah Penempatan fasilitas parkir
                                                                di dalam bangunan baik pada sebagian bangunan utama,
                                                                gedung khusus parkir maupun basemen </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Tinggi minimum ruang bebas struktur (head room)
                                                                    untuk ruang parkir ditentukan 2,25 m
                                                                </li>
                                                                <li>Setiap lantai parkir harus memiliki sarana
                                                                    transportasi dan atau sirkulasi vertikal untuk orang
                                                                    berupa tangga. Radius pelayanan tangga adalah 25 m
                                                                    untuk yang tidak dilengkapi sprinkler dan/atau 40 m
                                                                    untuk yang dilengkapi sprinkler.
                                                                </li>
                                                                <li>Pada setiap lantai untuk ruang parkir bila dapat
                                                                    menampung lebih dari 20 kendaraan harus disediakan
                                                                    ruang tunggu/kantin sopir.
                                                                </li>
                                                                <li>Pada kawasan pembatasan lalu lintas, Kawasan
                                                                    berorientasi transit dan/atau pada koridor moda
                                                                    angkutan umum massal dengan radius 400 meter dari
                                                                    rencana sumbu jalur angkutan umum dikenakan batasan
                                                                    parkir maksimum.
                                                                </li>
                                                                <li>Terhadap sisa ruang parkir eksisting yang terkena
                                                                    ketentuan parkir maksimum dalam Kawasan berorientasi
                                                                    transit (Transit Oriented Development/TOD) dapat
                                                                    dimanfaatkan secara optimal untuk kegiatan usaha
                                                                    mikro dan kecil serta kegiatan publik lainnya.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.7.d PPT TATA BANGUNAN GEDUNG - PARKIR - DALAM BANGUNAN.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#bdbpt"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Bangunan di bawah Permukaan Tanah
                                            </a>
                                        </div>
                                        <div id="bdbpt" class="collapse">
                                            <div class="card-body value-collapse">
                                                {{-- <p>Jarak bebas basemen adalah jarak minimum yang diperkenankan dari
                                                    dinding terdalam basemen ditambah 30 cm sampai batas lahan
                                                    perencanaan.</p>
                                                <ol id="list-ketentuan">
                                                    <li>Jarak bebas basemen harus berjarak minimum 3 m (tiga meter) dari
                                                        batas lahan perencanaan</li>
                                                    <li>Jarak bebas dinding terluar bangunan basemen pada bangunan
                                                        ketinggian maksimum 4 lantai, minimum berjarak 3 m dari GSJ,
                                                        GSK, dan/atau saluran, serta minimum 1 m terhadap lahan
                                                        perencanaan lain, dan tidak menimbulkan dampak negatif terhadap
                                                        persil/perpetakan sekitar;</li>
                                                </ol> --}}
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#bdbpt-fungsi" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Fungsi ruang di bawah permukaan tanah
                                                        </a>
                                                    </div>
                                                    <div id="bdbpt-fungsi" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Kegiatan yang diperbolehkan berfungsi di bawah permukaan
                                                                tanah.</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Akses/sirkulasi pejalan kaki ke stasiun angkutan
                                                                    umum massal;</li>
                                                                <li>Prasarana jalan dan utilitas kota;</li>
                                                                <li>Perkantoran, perdagangan dan jasa;</li>
                                                                <li>Fasilitas parkir;</li>
                                                                <li>Sarana penunjang kegiatan gedung di atasnya;
                                                                </li>
                                                                <li>Jaringan angkutan umum massal; dan/atau
                                                                </li>
                                                                <li>Kegiatan keamanan dan pertahanan.</li>
                                                            </ol>
                                                            {{-- <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#bdbpt-bfungsi" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Bukan fungsi ruang di bawah permukaan tanah
                                                        </a>
                                                    </div>
                                                    <div id="bdbpt-bfungsi" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Kegiatan yang tidak diperuntukan untuk berfungsi di bawah
                                                                permukaan tanah.</p>
                                                            <ol id="list-ketentuan">
                                                                <li>hunian (seperti kamar tidur, dapur, ruang
                                                                    tamu/keluarga).</li>
                                                            </ol>
                                                            {{-- <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#bangun-layang" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Bangunan Layang
                                            </a>
                                        </div>
                                        <div id="bangun-layang" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Bangunan layang adalah bangunan penghubung antar bangunan yang
                                                    dibangun melayang di atas permukaan tanah.</p>
                                                {{-- <ol id="list-ketentuan">
                                                    <li>Jarak bebas basemen harus berjarak minimum 3 m (tiga meter) dari
                                                        batas lahan perencanaan</li>
                                                    <li>Jarak bebas dinding terluar bangunan basemen pada bangunan
                                                        ketinggian maksimum 4 lantai, minimum berjarak 3 m dari GSJ,
                                                        GSK, dan/atau saluran, serta minimum 1 m terhadap lahan
                                                        perencanaan lain, dan tidak menimbulkan dampak negatif terhadap
                                                        persil/perpetakan sekitar;</li>
                                                </ol> --}}
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.9 PPT TATA BANGUNAN GEDUNG - BANGUNAN LAYANG.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#layang-satu" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Satu Lahan
                                                        </a>
                                                    </div>
                                                    <div id="layang-satu" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>bangunan layang yang berada dalam satu lahan perencanaan.
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan layang diperhitungkan dalam KDB berdasarkan
                                                                    proyeksi </li>
                                                                <li>yang berfungsi hanya sebagai sirkulasi pejalan kaki,
                                                                    lebar bangunan maksimum 4 m (empat meter) dengan
                                                                    tinggi bersih minimum 5,5 m (lima koma lima meter)
                                                                    dari muka tanah tertinggi.</li>
                                                                <li>Bangunan layang yang berfungsi usaha (multiguna)
                                                                    dihitung sebagai KDB dan KLB dengan lebar minimum 7
                                                                    m (tujuh meter) dan maksimum 12 m (dua belas meter),
                                                                    tinggi bersih minimum 5,5 m (lima koma lima meter)
                                                                    dari muka tanah tertinggi dan maksimum 4 (empat)
                                                                    lapis.</li>
                                                                <li>Pemilihan jenis konstruksi pada bangunan layang
                                                                    harus dapat menjamin keamanan dan keselamatan
                                                                    pemakai maupun yang lainnya.</li>
                                                            </ol>
                                                            {{-- <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#lahan-dua" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Lebih dari satu lahan
                                                        </a>
                                                    </div>
                                                    <div id="lahan-dua" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>bangunan layang yang berada pada lebih dari satu lahan
                                                                perencanaan</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan layang diperhitungkan dalam KDB berdasarkan
                                                                    proyeksi </li>
                                                                <li>yang berfungsi hanya sebagai sirkulasi pejalan kaki,
                                                                    lebar bangunan maksimum 4 m (empat meter) dengan
                                                                    tinggi bersih minimum 5,5 m (lima koma lima meter)
                                                                    dari muka tanah tertinggi.</li>
                                                                <li>Bangunan layang yang berfungsi usaha (multiguna)
                                                                    dihitung sebagai KDB dan KLB dengan lebar minimum 7
                                                                    m (tujuh meter) dan maksimum 12 m (dua belas meter),
                                                                    tinggi bersih minimum 5,5 m (lima koma lima meter)
                                                                    dari muka tanah tertinggi dan maksimum 4 (empat)
                                                                    lapis.</li>
                                                                <li>Pemilihan jenis konstruksi pada bangunan layang
                                                                    harus dapat menjamin keamanan dan keselamatan
                                                                    pemakai maupun yang lainnya.</li>
                                                            </ol>
                                                            {{-- <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#lahan-tiga" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Di atas ruang
                                                        </a>
                                                    </div>
                                                    <div id="lahan-tiga" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>bangunan layang yang berada di atas prasarana jalan,
                                                                sungai, jalan rel, dan/atau RTH</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan layang yang berfungsi usaha (multiguna)
                                                                    dihitung sebagai KDB dan KLB dengan lebar minimum 7
                                                                    m (tujuh meter) dan maksimum 12 m (dua belas meter),
                                                                    tinggi bersih minimum 5,5 m (lima koma lima meter)
                                                                    dari muka tanah tertinggi dan maksimum 4 (empat)
                                                                    lapis.</li>
                                                                <li>Pemilihan jenis konstruksi pada bangunan layang
                                                                    harus dapat menjamin keamanan dan keselamatan
                                                                    pemakai maupun yang lainnya.</li>
                                                                <li>harus mendapat persetujuan dari Gubernur melalui
                                                                    BKPRD yang dituangkan dalam Surat Keputusan
                                                                    gubernur.</li>
                                                            </ol>
                                                            {{-- <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.8 PPT TATA BANGUNAN GEDUNG - DI BAWAH PERMUKAAN TANAH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                href="#bangun-tinggi" aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Bangunan Tinggi
                                            </a>
                                        </div>
                                        <div id="bangun-tinggi" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Bangunan Tinggi atau high rise building yaitu bangunan gedung yang
                                                    memiliki struktur tinggi.</p>
                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/II.10 PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#elevator" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Elevator
                                                        </a>
                                                    </div>
                                                    <div id="elevator" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>bangunan layang yang berada dalam satu lahan perencanaan.
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan tinggi yang karena sifat penggunaannya
                                                                    dan/atau ketinggian lebih dari 4 (empat) lantai
                                                                    harus dilengkapi elevator (lift).</li>
                                                                <li>Bangunan tinggi untuk kegiatan rumah susun umum
                                                                    harus menyediakan elevator (lift) khusus difabel.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.a PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - ELEVATOR.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#eskalator" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Eskalator
                                                        </a>
                                                    </div>
                                                    <div id="eskalator" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>bangunan layang yang berada pada lebih dari satu lahan
                                                                perencanaan</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Penggunaan eskalator menerus hanya dapat
                                                                    diperkenankan untuk menghubungkan antar lantai
                                                                    maksimum setinggi 4 (empat) lantai.</li>
                                                                <li>Penggunaan eskalator menerus lebih dari 2 (dua)
                                                                    lantai dilengkapi dengan dinding transparan sebagai
                                                                    sarana pengaman.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.b PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - ESKALATOR.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#refuge-floor" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Refuge Floor
                                                        </a>
                                                    </div>
                                                    <div id="refuge-floor" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Bangunan lebih dari 24 (dua puluh empat) lantai atau
                                                                lebih dari 120 m (seratus dua puluh meter) harus
                                                                menyediakan Lantai Berhimpun Sementara (Refuge Floor)
                                                                sebesar 1 (satu) lantai penuh atau lebih</p>
                                                            <ol id="list-ketentuan">
                                                                <li>Paling sedikit 50% (lima puluh persen) dari area
                                                                    kotor (gross area) lantai penyelamatan harus
                                                                    dirancang sebagai area berkumpul (holding area) yang
                                                                    dapat dimanfaatkan sebagai ruang publik dan tidak
                                                                    digunakan sebagai area komersial dengan memakai
                                                                    material yang tidak mudah terbakar.</li>
                                                                <li>Menggunakan konstruksi yang memiliki tingkat
                                                                    ketahanan api paling sedikit 2 jam, bebas asap,
                                                                    mempunyai sistem ventilasi dan penerangan yang
                                                                    terpisah serta selalu berfungsi dalam keadaan
                                                                    darurat; dan</li>
                                                                <li>Tangga kebakaran harus berhenti di Lantai Berhimpun
                                                                    Sementara sebelum menuju jalan keluar lantai
                                                                    berikutnya.</li>
                                                                <li>Jarak antar Lantai Berhimpun Sementara (Refuge
                                                                    Floor) paling jauh setiap interval maksimum 16 (enam
                                                                    belas) lantai dan/atau setiap interval ketinggian
                                                                    maksimum 80 m (delapan puluh meter), dengan teknis
                                                                    bangunan sesuai dengan peraturan perundangan</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.c PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - REFUGEE.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kkop" aria-expanded="false" aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            KKOP
                                                        </a>
                                                    </div>
                                                    <div id="kkop" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>KKOP adalah Kawasan Keselamatan Operasional Penerbangan
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan yang dibangun dengan ketinggian melebihi
                                                                    batasan yang ditetapkan dalam KKOP harus mendapat
                                                                    izin dan/atau rekomendasi dari instansi yang
                                                                    berwenang.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.d PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - KKOP.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#helipad" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Penggunaan Helipad
                                                        </a>
                                                    </div>
                                                    <div id="helipad" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Helipad adalah Landasan helikopter
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Pembangunan landasan helikopter atau helipad pada
                                                                    bangunan tinggi harus mendapat izin dan/atau
                                                                    rekomendasi dari Instansi yang berwenang.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.e PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - HELIPAD.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#medan-merdeka" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Kawasan Medan Merdeka
                                                        </a>
                                                    </div>
                                                    <div id="medan-merdeka" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Helipad adalah Landasan helikopter
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan tinggi yang berada pada Zona Penyangga dan
                                                                    Zona Pelindung Taman Medan Merdeka tidak
                                                                    diperkenankan membangun landasan helikopter/helipad
                                                                    kecuali mendapat rekomendasi dari Sekretariat
                                                                    Presiden dan instansi berwenang.</li>
                                                                <li>Bangunan tinggi yang berada pada Zona penyangga,
                                                                    Zona Pelindung Taman Medan Merdeka, dan pada koridor
                                                                    di luar Zona Pelindung Taman Medan Merdeka yang
                                                                    berhadapan langsung dengan Kawasan Istana Presiden
                                                                    dan Wakil Presiden tidak diperkenankan memiliki
                                                                    jendela dan/atau ruang yang berhadapan langsung
                                                                    kecuali berupa jalur/sirkulasi pejalan kaki.</li>
                                                                <li>Bangunan tinggi yang berada pada Zona Penyangga,
                                                                    Zona Pelindung Taman Medan Merdeka dan pada Kawasan
                                                                    sekitar Istana Presiden dan Wakil Presiden
                                                                    sewaktu-waktu dapat digunakan untuk fungsi keamanan
                                                                    dan pertahanan.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/II.10.f PPT TATA BANGUNAN GEDUNG - BANGUNAN TINGGI - KAWASAN MEDAN MERDEKA.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-4">
                                        <label class="text-center w-100 text-dark font-weight-bold">Intensitas
                                            Pemanfaatan Ruang</label><br>
                                        <label class="text-dark font-weight-bold">Definisi</label>
                                    </div>
                                    <p class="text-justify">
                                        Intensitas pemanfaatan ruang adalah besaran ruang untuk fungsi tertentu yang
                                        ditentukan berdasarkan pengaturan Koefisien Lantai Bangunan (KLB), Koefisien
                                        Dasar Bangunan (KDB), Ketinggian Bangunan, Koefisien Dasar Hijau (KDH),
                                        Koefisien Tapak Basemen (KTB), tiap kawasan bagian kota sesuai dengan kedudukan
                                        dan fungsinya dalam pembangunan kota.
                                    </p>
                                    <div class="pdf_file">
                                        <a target="_blank"
                                            href="{{ asset('pdf_bangunan/III PPT INTENSITAS PEMANFAATAN RUANG.pdf') }}"><i
                                                class="fa fa-file-pdf-o text-danger"></i>
                                            Selengkapnya</a>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#kdb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Koefisien Dasar Bangunan (KDB)
                                            </a>
                                        </div>
                                        <div id="kdb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Koefisien Dasar Bangunan yang selanjutnya disingkat KDB, adalah angka
                                                    persentase perbandingan antara luas seluruh lantai dasar bangunan
                                                    gedung dihitung berdasarkan batas dinding terluar terhadap luas
                                                    lahan perpetakan atau lahan perencanaan.</p>

                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/III.1 PPT INTENSITAS PEMANFAATAN RUANG - KDB.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdb-perhitungan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Perhitungan KDB
                                                        </a>
                                                    </div>
                                                    <div id="kdb-perhitungan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>GSJ adalah garis rencana jalan yang ditetapkan dalam
                                                                rencana kota</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>luas proyeksi bangunan, bangunan layang atau
                                                                    kantilever pada bangunan gedung non hunian dihitung
                                                                    sebesar 50% (lima puluh persen) dari luas bangunan,
                                                                    bangunan layang atau kantilever;</li>
                                                                <li>proyeksi atap atau kantilever bangunan gedung untuk
                                                                    kegiatan rumah kampung, rumah sangat kecil, rumah
                                                                    kecil, rumah sedang dan rumah besar jika lantai
                                                                    dasarnya digunakan untuk kegiatan, di antaranya,
                                                                    teras rumah, tempat berkumpul dan sejenisnya
                                                                    dihitung 50% luas atap atau kantilever;</li>
                                                                <li>proyeksi atap atau kantilever bangunan gedung sampai
                                                                    dengan atap atau kantilever di lantai 8 (delapan);
                                                                </li>
                                                                <li>kanopi yang tidak berfungsi sebagai drop off/antar
                                                                    jemput penumpang dan tidak digunakan sebagai fungsi
                                                                    usaha yang lebarnya lebih besar dari 1,5 (satu koma
                                                                    lima) meter;</li>
                                                                <li> kanopi yang tidak berfungsi sebagai drop off/antar
                                                                    jemput penumpang yang digunakan sebagai fungsi
                                                                    usaha;</li>
                                                                <li>lantai dasar pada bangunan gedung non hunian yang
                                                                    digunakan sebagai parkir, proyeksi dari lantai
                                                                    atasnya dihitung sebagai lantai parkir;</li>
                                                                <li>lantai dasar pada ruang mekanikal elektrikal yang
                                                                    terpisah dari bangunan utama;</li>
                                                                <li>lantai pada bangunan kontainer baik satuan, disusun
                                                                    berjejer, maupun disusun bertingkat dengan pondasi
                                                                    yang digunakan sebagai fungsi bangunan gedung; dan
                                                                </li>
                                                                <li>lantai bangunan Anjungan Tunai Mandiri (ATM).</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.1.a PPT INTENSITAS PEMANFAATAN RUANG - KDB - Ketentuan Perhitungan KDB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdb-pembebasan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Pembebasan KDB
                                                        </a>
                                                    </div>
                                                    <div id="kdb-pembebasan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>GSJ adalah garis rencana jalan yang ditetapkan dalam
                                                                rencana kota</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>proyeksi atap atau kantilever bangunan gedung untuk
                                                                    kegiatan rumah kampung, rumah sangat kecil, rumah
                                                                    kecil, rumah sedang dan rumah besar dari overstek
                                                                    datar/miring yang lantai overstek dan lantai
                                                                    proyeksi di bawahnya tidak digunakan untuk
                                                                    kegiatan/aktifitas;</li>
                                                                <li>kanopi yang berfungsi sebagai drop off;</li>
                                                                <li>atap atau kantilever yang berada di atas lantai 8
                                                                    (delapan);
                                                                </li>
                                                                <li>Proyeksi balkon yang lebarnya sampai dengan 1,5 m
                                                                    (satu
                                                                    koma lima meter), apabila proyeksi balkon melebihi
                                                                    batasan yang ditetapkan, terhadap kelebihannya
                                                                    dihitung 100% (seratus persen);</li>
                                                                <li>proyeksi bangunan arkade yang digunakan untuk
                                                                    jalur/sirkulasi pejalan kaki publik;</li>
                                                                <li>lantai dasar bangunan gedung untuk kegiatan rumah
                                                                    kampung, rumah sangat kecil, rumah kecil, rumah
                                                                    sedang dan rumah besar, yang digunakan sebagai
                                                                    lantai parkir/carport yang beratap tidak berdinding,
                                                                    kecuali dinding pagar pembatas antar persil;</li>
                                                                <li>lantai dasar pada ruang mekanikal elektrikal yang
                                                                    terpisah dari bangunan utambangunan penghubung antar
                                                                    bangunan gedung dan atap pedestrian di lantai dasar
                                                                    berbentuk selasar, beratap, dan tidak berdinding
                                                                    dengan lebar maksimum 4 m (empat meter), dan hanya
                                                                    digunakan untuk sirkulasi pejalan kaki; dan</li>
                                                                <li>pemanfaatan ruang antar bangunan yang dimanfaatkan
                                                                    untuk kepentingan publik.
                                                                </li>
                                                                <li>lantai dasar pada bangunan sarana penunjang yang
                                                                    terpisah dari bangunan utama dan merupakan instalasi
                                                                    atau utilitas bangunan serta bukan sarana penunjang
                                                                    yang dapat dikomersilkan di antaranya:
                                                                    <ol type="I">
                                                                        <li>gardu listrik PLN;</li>
                                                                        <li>tangki air/tangki BBM;</li>
                                                                        <li>dudukan chiller, ruang solar genset, dan
                                                                            sejenisnya;</li>
                                                                        <li>tempat pembuangan sampah;</li>
                                                                        <li>garasi mobil pemadam kebakaran dan/atau
                                                                            mobil ambulans;</li>
                                                                        <li>gapura;</li>
                                                                        <li>pos jaga dengan luas maksimum 4 m2 (empat
                                                                            meter persegi); yang berada diantara GSB dan
                                                                            GSJ; dan</li>
                                                                        <li>tempat pemeriksaan kendaraan (security
                                                                            check);</li>
                                                                        <li>ramp beratap;</li>
                                                                        <li>cerobong udara (intake/exhaust) yang menerus
                                                                            dari basemen dengan luas maksimum tiap
                                                                            cerobong 4 m2 (empat meter persegi);</li>
                                                                        <li>toilet umum;</li>
                                                                        <li>mushola termasuk tempat wudhu;</li>
                                                                        <li>ruang tunggu sopir; dan</li>
                                                                        <li>bangunan shelter transportasi daring.</li>
                                                                    </ol>
                                                                </li>
                                                                <li>lahan yang dimanfaatkan untuk kegiatan Usaha Mikro
                                                                    dan Kecil pada bangunan sementara dan tidak
                                                                    berdinding atau kontainer tunggal tanpa pondasi.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.1.b PPT INTENSITAS PEMANFAATAN RUANG - KDB - Ketentuan Pembebasan KDB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#klb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Koefisien Lantai Bangunan (KLB)
                                            </a>
                                        </div>
                                        <div id="klb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Koefisien Lantai Bangunan yang selanjutnya disingkat KLB, adalah
                                                    angka perbandingan antara luas seluruh lantai bangunan gedung
                                                    dihitung berdasarkan batas dinding terluar dengan luas lahan
                                                    perpetakan terhadap lahan perencanaan.</p>

                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/III.2 PPT INTENSITAS PEMANFAATAN RUANG - KLB.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#klb-perhitungan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Perhitungan KLB
                                                        </a>
                                                    </div>
                                                    <div id="klb-perhitungan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>GSJ adalah garis rencana jalan yang ditetapkan dalam
                                                                rencana kota</p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>luas balkon yang terletak pada bangunan gedung
                                                                    dengan lebar lebih dari 1,5 m (satu koma lima meter)
                                                                    dari dinding terluar bangunan dihitung 100% (seratus
                                                                    persen);</li>
                                                                <li>Balkon yang tertutup oleh dinding atau elemen
                                                                    penutup lainnya;</li>
                                                                <li>luas lantai mezanine atau lantai yang berada di atas
                                                                    toilet/ruang makan/kantor/koridor/tribun/auditorium/
                                                                    teater/bioskop dan lain-lain baik datar ataupun
                                                                    miring dengan tinggi plafon atau tribun lebih dari
                                                                    1,5 m (satu koma lima meter) dan lebar lebih dari 1
                                                                    m (satu meter);
                                                                </li>
                                                                <li>lantai di bawah tangga, ramp atau panggung, jika
                                                                    tingginya lebih dari 1,5 m (satu koma lima meter)
                                                                    dihitung dari lantai sampai dengan batas bawah
                                                                    lantai tangga/ramp/panggung;</li>
                                                                <li>luas bidang mendatar pada area di bawah jendela
                                                                    tersembunyi dengan tinggi bersih lebih dari 1,2 m
                                                                    (satu koma dua meter);</li>
                                                                <li>luas bidang mendatar pada area kolam renang yang
                                                                    beratap;</li>
                                                                <li>luas lantai berlubang (perforated floor) atau lantai
                                                                    berbentuk jala (heavy duty mesh floor);</li>
                                                                <li>lantai pada bangunan penghubung antara GSB dan GSJ
                                                                    yang dipergunakan untuk kegiatan komersial menuju
                                                                    stasiun angkutan umum massal berbasis rel;
                                                                </li>
                                                                <li>lantai pada bangunan kontainer baik satuan, disusun
                                                                    berjejer, maupun disusun bertingkat dengan pondasi
                                                                    yang digunakan sebagai fungsi bangunan gedung; dan
                                                                </li>
                                                                <li>lantai bangunan Anjungan Tunai Mandiri (ATM).
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.2.a  PPT INTENSITAS PEMANFAATAN RUANG - KLB - Ketentuan Perhitungan KLB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#klb-pembebasan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Pembebasan KLB
                                                        </a>
                                                    </div>
                                                    <div id="klb-pembebasan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <ol id="list-ketentuan">
                                                                <li>balkon dengan overstek yang menempel pada fasad
                                                                    bangunan gedung apartemen/kondotel/hotel dengan
                                                                    lebar maksimum 1,5 m (satu koma lima meter);</li>
                                                                <li>balkon yang beratap pada bangunan rumah sangat
                                                                    kecil, rumah kecil, rumah sedang, rumah besar dan
                                                                    rumah kos;</li>
                                                                <li>lantai yang digunakan untuk parkir beserta
                                                                    sirkulasinya yang merupakan fasilitas bangunan
                                                                    gedung dengan syarat tidak melebihi 50% (lima puluh
                                                                    persen) dari batasan luas KLB yang telah ditetapkan
                                                                    dan kelebihannya dihitung 100 % (seratus persen);
                                                                </li>
                                                                <li>bangunan layang yang digunakan pejalan kaki dan
                                                                    tidak dipergunakan untuk kegiatan lain;</li>
                                                                <li> sarana penunjang yang disediakan bangunan gedung
                                                                    pada bangunan bertingkat sedang dan bertingkat
                                                                    tinggi sampai dengan 20% (dua puluh persen) dari
                                                                    luas lantai bangunan dikurangi luas lantai parkir,
                                                                    terhadap kelebihannya dihitung 100 % (seratus
                                                                    persen), di antaranya:
                                                                    <ol type="I">
                                                                        <li>shaft pemadam kebakaran;</li>
                                                                        <li>elevator (lift) dan shaft elevator (lift);
                                                                        </li>
                                                                        <li>ruang dan shaft mechanical electrical
                                                                            plumbing (MEP);</li>
                                                                        <li>mushola termasuk tempat wudhu;</li>
                                                                        <li>ruang tunggu sopir;</li>
                                                                        <li>ruang Fire Command Center (FCC);</li>
                                                                        <li>toilet;</li>
                                                                        <li>janitor;</li>
                                                                        <li>IPAL;</li>
                                                                        <li>tempat pengumpul sampah;</li>
                                                                        <li>ruang laktasi;</li>
                                                                        <li>ruang genset;</li>
                                                                        <li>ruang Air Handling Unit (AHU);</li>
                                                                        <li>ruang fan;</li>
                                                                        <li>ruang tangga kebakaran;</li>
                                                                        <li>outdoor AC; dan</li>
                                                                        <li>ruang untuk usaha Mikro dan Kecil dengan
                                                                            pembatas dinding permanen.</li>
                                                                    </ol>
                                                                </li>
                                                                <li>sarana penunjang yang terpisah dari bangunan utama
                                                                    tidak diperhitungkan sebagai KLB, di antaranya:
                                                                    <ol type="I">
                                                                        <li>gardu listrik PLN;</li>
                                                                        <li>tangki air/tangki BBM;</li>
                                                                        <li>dudukan chiller, ruang solar genset, dan
                                                                            sejenisnya;</li>
                                                                        <li>tempat pembuangan sampah;</li>
                                                                        <li>garasi mobil pemadam kebakaran dan/atau
                                                                            mobil ambulans;</li>
                                                                        <li>gapura;</li>
                                                                        <li>pos jaga dengan luas maksimum 4 m2 (empat
                                                                            meter persegi); yang berada diantara GSB dan
                                                                            GSJ; dan</li>
                                                                        <li>tempat pemeriksaan kendaraan (security
                                                                            check);</li>
                                                                        <li>ramp beratap;</li>
                                                                        <li>cerobong udara (intake/exhaust) yang menerus
                                                                            dari basemen dengan luas maksimum tiap
                                                                            cerobong 4 m2 (empat meter persegi);</li>
                                                                        <li>toilet umum;</li>
                                                                        <li>mushola termasuk tempat wudhu;</li>
                                                                        <li>ruang tunggu sopir; dan</li>
                                                                        <li>bangunan shelter transportasi daring.</li>
                                                                    </ol>
                                                                </li>
                                                                <li>lahan yang dimanfaatkan untuk kegiatan Usaha Mikro
                                                                    dan Kecil pada bangunan sementara dan tidak
                                                                    berdinding atau kontainer tunggal tanpa pondasi;
                                                                </li>
                                                                <li>lantai evakuasi bencana pada bangunan;
                                                                </li>
                                                                <li>luas bidang mendatar ruang terbuka tidak beratap
                                                                    pada lantai atap bangunan gedung yang dimanfaatkan
                                                                    hanya sebagai fungsi atap/taman atap/kolam renang;
                                                                </li>
                                                                <li>lantai catwalk dalam bangunan gedung yang berfungsi
                                                                    untuk pemeliharaan dengan lebar kurang dari 1 m
                                                                    (satu meter);
                                                                </li>
                                                                <li> lantai pada bangunan penghubung antara GSB dan GSJ
                                                                    yang dipergunakan untuk jalur pedestrian/akses
                                                                    penghubung menuju stasiun berbasis rel;
                                                                </li>
                                                                <li>bidang mendatar shaft lift dan tangga apabila tidak
                                                                    berhenti pada satu lantai;
                                                                </li>
                                                                <li>void tangga lantai paling atas; dan
                                                                </li>
                                                                <li>ruang antar bangunan dan ruang privat yang digunakan
                                                                    untuk kepentingan publik selama lebih dari 15 (lima
                                                                    belas) jam.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.2.b  PPT INTENSITAS PEMANFAATAN RUANG - KLB - Ketentuan Pembebasan KLB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#klb-proporsi" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Proporsi pada Subzona Campuran.
                                                        </a>
                                                    </div>
                                                    <div id="klb-proporsi" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Perhitungan proporsi KLB pada sub zona campuran
                                                                berdasarkan PSL dihitung dari luas seluruh lantai
                                                                bangunan yang direncanakan. Proporsi KLB pada sub zona
                                                                campuran berdasarkan PSL sebagai berikut:
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>PSL sangat padat dan padat, proporsi bangunan
                                                                    komersial paling tinggi 65 % (enam puluh lima
                                                                    persen) dan bangunan hunian paling kurang 35% (tiga
                                                                    puluh lima persen);</li>
                                                                <li>PSL kurang padat dan tidak padat, proporsi bangunan
                                                                    komersial paling tinggi 50% (lima puluh persen) dan
                                                                    bangunan hunian paling kurang 50% (lima puluh
                                                                    persen); dan</li>
                                                                <li>Pada Kawasan berorientasi transit (TOD) proporsi KLB
                                                                    ditetapkan lain berdasarkan karakteristik dan
                                                                    mengacu pada peraturan perundang-undangan.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.2.c  PPT INTENSITAS PEMANFAATAN RUANG - KLB - Ketentuan Proporsi pada Subzona Campuran.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#klb-pengecualian" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Pengecualian Nilai KLB terhadap RDTR PZ
                                                        </a>
                                                    </div>
                                                    <div id="klb-pengecualian" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Nilai KLB sesuai dengan yang ditetapkan dalam RDTR dan PZ
                                                                kecuali pada:
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan khusus parkir yang fungsinya bukan bangunan
                                                                    pelengkap dari bangunan utama diperbolehkan luas
                                                                    lantai bangunan parkir mencapai 150% (seratus lima
                                                                    puluh persen) dari luas total lantai yang
                                                                    diperhitungkan KLB yang telah ditetapkan pada RDTR
                                                                    dan PZ;</li>
                                                                <li>bangunan khusus parkir yang berfungsi sebagai
                                                                    prasarana parkir perpindahan moda (park and ride),
                                                                    terintegrasi dengan angkutan umum massal, dan bukan
                                                                    bangunan pelengkap dari bangunan utama diperbolehkan
                                                                    luas lantai bangunan mencapai 200% (dua ratus
                                                                    persen) dari luas total lantai yang diperhitungkan
                                                                    dalam perhitungan KLB yang telah ditetapkan pada
                                                                    RDTR dan PZ; dan</li>
                                                                <li>Bangunan khusus parkir mekanikal bertingkat atau
                                                                    parkir otomatis diperbolehkan luas lantai bangunan
                                                                    parkir mencapai 150% (seratus lima puluh persen)
                                                                    dari luas total lantai yang diperhitungkan KLB yang
                                                                    telah ditetapkan pada RDTR dan PZ, dan dihitung
                                                                    sebagai Satuan Ruang Parkir (SRP).
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.2.d  PPT INTENSITAS PEMANFAATAN RUANG - KLB - Pengecualian KLB terhadap RDTR PZ.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#ktb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Koefisien Tapak Basemen (KTB)
                                            </a>
                                        </div>
                                        <div id="ktb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Koefisien Tapak Basemen yang selanjutnya disingkat KTB, adalah angka
                                                    persentase perbandingan antara luas tapak basemen terluas dihitung
                                                    dari dinding terluar struktur basemen terhadap lahan perencanaan.
                                                </p>

                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/III.3 PPT INTENSITAS PEMANFAATAN RUANG - KTB.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#ktb-perhitungan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Perhitungan KTB
                                                        </a>
                                                    </div>
                                                    <div id="ktb-perhitungan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Dinding terluar bangunan basemen yang dihitung 30 cm
                                                                (tiga puluh sentimeter) dari dinding perimeter sisi
                                                                dalam harus berjarak minimum 3 m (tiga meter) dari batas
                                                                lahan perencanaan;
                                                            </p>
                                                            {{-- <ol id="list-ketentuan">
                                                                <li>Bangunan khusus parkir yang fungsinya bukan bangunan
                                                                    pelengkap dari bangunan utama diperbolehkan luas
                                                                    lantai bangunan parkir mencapai 150% (seratus lima
                                                                    puluh persen) dari luas total lantai yang
                                                                    diperhitungkan KLB yang telah ditetapkan pada RDTR
                                                                    dan PZ;</li>
                                                                <li>bangunan khusus parkir yang berfungsi sebagai
                                                                    prasarana parkir perpindahan moda (park and ride),
                                                                    terintegrasi dengan angkutan umum massal, dan bukan
                                                                    bangunan pelengkap dari bangunan utama diperbolehkan
                                                                    luas lantai bangunan mencapai 200% (dua ratus
                                                                    persen) dari luas total lantai yang diperhitungkan
                                                                    dalam perhitungan KLB yang telah ditetapkan pada
                                                                    RDTR dan PZ; dan</li>
                                                                <li>Bangunan khusus parkir mekanikal bertingkat atau
                                                                    parkir otomatis diperbolehkan luas lantai bangunan
                                                                    parkir mencapai 150% (seratus lima puluh persen)
                                                                    dari luas total lantai yang diperhitungkan KLB yang
                                                                    telah ditetapkan pada RDTR dan PZ, dan dihitung
                                                                    sebagai Satuan Ruang Parkir (SRP).
                                                                </li>
                                                            </ol> --}}
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.3.a PPT INTENSITAS PEMANFAATAN RUANG - KTB - Ketentuan Perhitungan KTB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#ktb-pembebasan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Pembebasan KTB
                                                        </a>
                                                    </div>
                                                    <div id="ktb-pembebasan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Dinding terluar bangunan basemen yang dihitung 30 cm
                                                                (tiga puluh sentimeter) dari dinding perimeter sisi
                                                                dalam harus berjarak minimum 3 m (tiga meter) dari batas
                                                                lahan perencanaan;
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Bangunan basemen yang menghubungkan antar basemen
                                                                    yang berada di bawah prasarana umum seperti jalan
                                                                    dan saluran; dan</li>
                                                                <li>Koridor basemen yang berada pada area 3 m (tiga
                                                                    meter) dari GSJ yang menghubungkan basemen bangunan
                                                                    gedung, halaman dan/atau ruang publik dengan
                                                                    prasarana dan/atau sarana stasiun transportasi bawah
                                                                    tanah, lebar maksimum 7 m (tujuh meter) dan hanya
                                                                    dimanfaatkan untuk jalur pejalan kaki.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.3.b PPT INTENSITAS PEMANFAATAN RUANG - KTB - Ketentuan Pembebasan KTB.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#ktb-pengecualian" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Pengecualian KTB terhadap RDTR PZ
                                                        </a>
                                                    </div>
                                                    <div id="ktb-pengecualian" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Intensitas pemanfaatan ruang berdasarkan KTB, harus
                                                                sesuai dengan RDTR dan PZ, kecuali pada:
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>sub zona R.1, R.2, R.3, R.4, R.5, R.6 dan R.9, KTB
                                                                    paling tinggi sama dengan KDB yang telah ditetapkan,
                                                                    dan hanya digunakan sebagai fungsi penunjang
                                                                    kegiatan utama hunian;</li>
                                                                <li>kegiatan rumah susun (rumah susun
                                                                    komersial/apartemen dan rumah susun terjangkau) dan
                                                                    rumah susun umum yang menggunakan ketentuan khusus
                                                                    sesuai RDTR dan PZ besar KTB pada PSL sangat padat
                                                                    paling tinggi 60% (enam puluh persen), PSL padat
                                                                    paling tinggi 55% (lima puluh lima Persen), PSL
                                                                    kurang padat paling tinggi 50% (lima puluh persen),
                                                                    dan PSL tidak padat paling tinggi 45% (empat puluh
                                                                    lima persen), sedangkan untuk sub zona KDB rendah
                                                                    dan sub zona rumah vertikal KDB rendah besar KTB
                                                                    paling tinggi 50% (lima puluh persen); dan</li>
                                                                <li>sub blok dengan KTB yang tidak ditentukan dalam RDTR
                                                                    dan PZ, besar KTB paling tinggi sama dengan KDB yang
                                                                    telah ditetapkan dalam RDTR dan PZ .</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.3.c PPT INTENSITAS PEMANFAATAN RUANG - KTB - Pengecualian KTB terhadap RDTR PZ.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#kdh"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Koefisien Dasar Hijau (KDH)
                                            </a>
                                        </div>
                                        <div id="kdh" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Koefisien Dasar Hijau yang selanjutnya disingkat KDH, adalah angka
                                                    persentase perbandingan antara luas seluruh ruang terbuka di luar
                                                    bangunan gedung dan luas lahan perpetakan atau lahan perencanaan
                                                    yang dikuasai.
                                                </p>

                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/III.4 PPT INTENSITAS PEMANFAATAN RUANG - KDH.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>

                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdh-perhitungan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Perhitungan KDH
                                                        </a>
                                                    </div>
                                                    <div id="kdh-perhitungan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Intensitas pemanfaatan ruang berdasarkan KTB, harus
                                                                sesuai dengan RDTR dan PZ, kecuali pada:
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>permukaan tanah yang dimanfaatkan sebagai resapan
                                                                    air dan RTH di atas basemen 2 (kedua) dengan
                                                                    kedalaman minimum 2 m (dua meter) dan menyatu dengan
                                                                    tanah sekitarnya.</li>
                                                                <li>perkerasan yang merupakan bagian dari lansekap atau
                                                                    taman yang berada di atas permukaan tanah, berupa
                                                                    lintasan lari (jogging track), perkerasan tepi kolam
                                                                    renang (pool deck) dengan lebar maksimum 1,50 m
                                                                    (satu koma lima meter), jalur pedestrian, dan jalur
                                                                    sepeda dengan menggunakan material yang dapat
                                                                    meresapkan air, kecuali kolam hias dan air mancur.
                                                                </li>
                                                                <li>prasarana parkir dengan syarat harus mempunyai
                                                                    fungsi resapan, dapat ditumbuhi oleh rumput,
                                                                    dan/atau menggunakan material yang dapat meresapkan
                                                                    air, dihitung maksimum 25% (dua puluh lima persen)
                                                                    dari batasan KDH; dengan kedalaman tanah minimum 2 m
                                                                    (dua meter), serta diwajibkan menanam pohon peneduh
                                                                    dengan rasio 1 pohon peneduh tiap 3 Satuan Ruang
                                                                    Parkir (SRP).</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.4.a PPT INTENSITAS PEMANFAATAN RUANG - KDH - Ketentuan Perhitungan KDH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdh-damker" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Perhitungan KDH pada Jalur Damkar
                                                        </a>
                                                    </div>
                                                    <div id="kdh-damker" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Intensitas pemanfaatan ruang berdasarkan KTB, harus
                                                                sesuai dengan RDTR dan PZ, kecuali pada:
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>tidak dimanfaatkan, dipergunakan, dan/atau bagian
                                                                    dari jalur sirkulasi internal untuk kegiatan
                                                                    operasional dan servis;</li>
                                                                <li>dikhususkan hanya untuk akses pemadam kebakaran,
                                                                    tidak dimanfaatkan untuk kegiatan yang lain,
                                                                    termasuk parkir kendaraan;
                                                                </li>
                                                                <li>menggunakan material yang dapat meresapkan air;</li>
                                                                <li>luas maksimum 50% (lima puluh persen) dari batasan
                                                                    KDH yang ditetapkan;</li>
                                                                <li>luas maksimum 5% (lima persen) dari total lahan
                                                                    perencanaan dan merupakan bagian dari batasan KDH
                                                                    yang ditetapkan pada sub zona KDB rendah.</li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.4.b PPT INTENSITAS PEMANFAATAN RUANG - KDH - Ketentuan Perhitungan KDH pada Jalur Damkar.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdh-pembebasan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Pembebasan KDH
                                                        </a>
                                                    </div>
                                                    <div id="kdh-pembebasan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Intensitas pemanfaatan ruang berdasarkan KTB, harus
                                                                sesuai dengan RDTR dan PZ, kecuali pada:
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>jalan kendaraan, parkir, plaza, kolam, air mancur
                                                                    berada di atas bangunan</li>
                                                                <li>jalur pedestrian bukan merupakan bagian dari taman.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.4.c PPT INTENSITAS PEMANFAATAN RUANG - KDH - Ketentuan Pembebasan KDH.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kdh-rusun" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan Pada Rusun sesuai RDTR PZ
                                                        </a>
                                                    </div>
                                                    <div id="kdh-rusun" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>kegiatan rumah susun (rumah susun komersial/apartemen dan
                                                                rumah susun terjangkau) dan rumah susun umum yang
                                                                menggunakan ketentuan khusus sesuai RDTR dan PZ besar
                                                                KDH pada PSL sangat padat paling rendah 25% (dua puluh
                                                                lima persen), PSL padat paling rendah 30% (tiga puluh
                                                                persen), PSL kurang padat paling rendah 35% (tiga puluh
                                                                lima persen), PSL tidak padat paling rendah 35% (tiga
                                                                puluh lima persen), sedangkan untuk sub zona KDB rendah
                                                                besar KDH paling rendah 45% (empat puluh lima persen).
                                                            </p>
                                                            {{-- <ol id="list-ketentuan">
                                                                <li>jalan kendaraan, parkir, plaza, kolam, air mancur
                                                                    berada di atas bangunan</li>
                                                                <li>jalur pedestrian bukan merupakan bagian dari taman.
                                                                </li>
                                                            </ol> --}}
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.4.d PPT INTENSITAS PEMANFAATAN RUANG - KDH - Ketentuan Pada Rusun sesuai RDTR PZ.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div>
                                        <div class="p-0">
                                            <a class="text-dark font-weight-bold" data-toggle="collapse" href="#kb"
                                                aria-expanded="false" aria-controls="lahan_b">
                                                <span class="collapsed"><i class="fa fa-plus"></i></span>
                                                <span class="expanded"><i class="fa fa-minus"></i></span>
                                                Ketinggian Bangunan
                                            </a>
                                        </div>
                                        <div id="kb" class="collapse">
                                            <div class="card-body value-collapse">
                                                <p>Ketinggian bangunan adalah Ketinggian yang dihitung berdasarkan
                                                    jumlah lapis lantai bangunan gedung (lantai penuh) dalam suatu
                                                    bangunan mulai dari lantai dasar sampai dengan lantai tertinggi.
                                                </p>

                                                <div class="pdf_file">
                                                    <a target="_blank"
                                                        href="{{ asset('pdf_bangunan/III.5 PPT INTENSITAS PEMANFAATAN RUANG - KB.pdf') }}"><i
                                                            class="fa fa-file-pdf-o text-danger"></i>
                                                        Selengkapnya</a>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kb-ketentuan" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Ketentuan TInggi Bangunan
                                                        </a>
                                                    </div>
                                                    <div id="kb-ketentuan" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            <p>Tinggi bangunan merupakan total tinggi bangunan gedung
                                                                dalam satuan meter mulai dari peil perkarangan setempat
                                                                (sesuai titik koordinat KKOP jika ada KKOP) sampai
                                                                dengan elemen tertinggi bangunan dihitung dengan
                                                                ketentuan sebagai berikut:
                                                            </p>
                                                            <ol id="list-ketentuan">
                                                                <li>pada bangunan fungsi non-hunian tinggi dari
                                                                    permukaan lantai dasar (lantai 1) ke permukaan
                                                                    lantai 2 (dua) maksimum 10 m (sepuluh meter), dan
                                                                    tidak diperhitungkan sebagai dua lantai;</li>
                                                                <li>tinggi antar lantai penuh berikutnya maksimum 5 m
                                                                    (lima meter), jika lebih dari 5 m (lima meter) maka
                                                                    ruangan tersebut dianggap sebagai 2 (dua) lantai;
                                                                </li>
                                                                <li>mezanin yang luasnya kurang dari 50% (lima puluh
                                                                    persen) dari luas lantai penuh di bawahnya tidak
                                                                    dihitung sebagai lantai bangunan;
                                                                </li>
                                                                <li>mezanin yang luasnya melebihi 50% (lima puluh
                                                                    persen) dari luas lantai penuh dibawahnya, dihitung
                                                                    sebagai lantai bangunan;
                                                                </li>
                                                                <li>pada unit hunian kegiatan rumah kos, rumah susun,
                                                                    dan hotel diperbolehkan lantai mezanin dengan
                                                                    mempertahankan tinggi antar lantai maksimum 5 m
                                                                    (lima meter);
                                                                </li>
                                                                <li>mezanin pada kegiatan rumah sangat kecil, rumah
                                                                    kecil, rumah sedang, rumah besar dan rumah flat
                                                                    diperbolehkan paling besar 1 (satu) buah;
                                                                </li>
                                                                <li>bangunan gedung tempat ibadah, bangunan gedung
                                                                    pertemuan, bangunan gedung pertunjukan, bangunan
                                                                    gedung prasarana pendidikan, bangunan monumental
                                                                    yang memiliki nilai arsitektur spesifik, bangunan
                                                                    gedung olahraga, bangunan gedung serba guna,
                                                                    bangunan gedung industri dan pergudangan serta
                                                                    bangunan sejenis lainnya tidak berlaku ketentuan
                                                                    sebagaimana dimaksudkan pada angka (1) dan (2); dan
                                                                </li>
                                                                <li>fungsi ruang serba guna dan ruang pertemuan yang
                                                                    merupakan prasarana dari kegiatan utama tidak
                                                                    berlaku ketentuan sebagaimana dimaksud pada angka
                                                                    (1) dan (2).
                                                                </li>
                                                                <li>Peil lantai dasar suatu lantai bangunan gedung
                                                                    diperkenankan mencapai paling tinggi 1,20 m (satu
                                                                    koma dua meter) mengikuti rata-rata jalan, dengan
                                                                    tetap memperhatikan keserasian lingkungan.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.5.a PPT INTENSITAS PEMANFAATAN RUANG - KB - Ketentuan Tinggi Bangunan.pdf') }}"><i
                                                                        class="fa fa-file-pdf-o text-danger"></i>
                                                                    Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="p-0">
                                                        <a class="text-dark font-weight-bold" data-toggle="collapse"
                                                            href="#kb-peli" aria-expanded="false"
                                                            aria-controls="lahan_b">
                                                            <span class="collapsed"><i
                                                                    class="fa fa-plus"></i></span>
                                                            <span class="expanded"><i
                                                                    class="fa fa-minus"></i></span>
                                                            Penentuan Peil Lantai Dasar
                                                        </a>
                                                    </div>
                                                    <div id="kb-peli" class="collapse">
                                                        <div class="card-body value-collapse">
                                                            {{-- <p>Tinggi bangunan merupakan total tinggi bangunan gedung
                                                                dalam satuan meter mulai dari peil perkarangan setempat
                                                                (sesuai titik koordinat KKOP jika ada KKOP) sampai
                                                                dengan elemen tertinggi bangunan dihitung dengan
                                                                ketentuan sebagai berikut:
                                                            </p> --}}
                                                            <ol id="list-ketentuan">
                                                                <li>Penentuan peil lantai dasar pada pekarangan/persil
                                                                    berkontur pada basemen tunggal (satu tower) dihitung
                                                                    dari rata-rata ketinggian lahan berdasarkan batas
                                                                    bangunan.</li>
                                                                <li>Penentuan peil lantai dasar pada pekarangan/persil
                                                                    berkontur pada basemen bersama (lebih dari satu
                                                                    tower) dihitung dari rata-rata ketinggian lahan
                                                                    berdasarkan batas lahan.
                                                                </li>
                                                                <li>Pada peil atap basemen dengan muka tanah rata-rata
                                                                    pekarangan/persil lebih dari 1,20 m (satu koma dua
                                                                    meter), maka lantai basemen dinyatakan sebagai
                                                                    lantai dasar.
                                                                </li>
                                                                <li>Tinggi tanah/pekarangan/persil yang memiliki tinggi
                                                                    rata-rata melebihi 1,20 (satu koma dua meter) di
                                                                    atas jalan, maka tinggi peil lantai dasar ditetapkan
                                                                    di atas lantai bangunan yang tertutup tanah/basemen.
                                                                </li>
                                                                <li>Pekarangan/persil yang memiliki kemiringan yang
                                                                    curam atau perbedaan yang besar pada tanah asli
                                                                    suatu pekarangan, maka tinggi peil lantai dasar
                                                                    ditetapkan pada akses utama pekarangan/persil.
                                                                </li>
                                                                <li>Pekarangan/persil yang memiliki lebih dari satu
                                                                    akses jalan dan memiliki kemiringan yang tidak sama,
                                                                    maka tinggi peil lantai dasar ditentukan dari peil
                                                                    rata-rata dimensi permukaan jalan yang terlebar.
                                                                </li>
                                                                <li>Tinggi lantai dasar bangunan gedung dapat dihitung
                                                                    paling tinggi 1,2 m (satu koma dua meter) dari nilai
                                                                    peil lantai bangunan rata-rata yang ditetapkan
                                                                    sebagai nilai batasan ketinggian permukaan tanah,
                                                                    dengan ketentuan tapak bangunan yang berada di bawah
                                                                    lantai dasar mengikuti ketentuan KTB.
                                                                </li>
                                                            </ol>
                                                            <div class="pdf_file">
                                                                <a target="_blank"
                                                                    href="{{ asset('pdf_bangunan/III.5.b PPT INTENSITAS PEMANFAATAN RUANG - KB - Penentuan Peil Lantai Dasar.pdf') }}"><i
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

                    <div class="tab-pane " id="pills-simulasi" role="tabpanel">
                        <div class="container">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">Peruntukan Bangunan
                            </p>

                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text_all">
                                    <label class="text_all_mobile">Peruntukan Bangunan</label>
                                    <br>
                                    <select class="form-control text_all" id="selectSimulasi">
                                        <option value="">Pilih</option>
                                        @foreach ($option_simulasi as $os)
                                            <option value="{{ $os }}">{{ $os }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <p class="card-title mt-4 mb-4 text-center font-weight-bold judul_utama">Profil Lokasi
                            </p>

                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Luas Lahan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-luaslahan">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">KDH</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-kdh">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">KLB</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-klb">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                    <label class="text_all_mobile">Perkiraan NJOP</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-njop">-</p>
                                </div>
                            </div>

                            <p class="card-title mt-4 mb-4 text-center font-weight-bold judul_utama">Asumsi
                            </p>

                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <label class="text_all_mobile">Pemakaian Air</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-pmkair">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <label class="text_all_mobile">Debit Air Limbah</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-dbtairlimbah">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <label class="text_all_mobile">Sampah</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-sampah">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <label class="text_all_mobile">Standar Luas Bangunan</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-stdluasbangunan">-</p>
                                </div>
                            </div>

                            <p class="card-title mt-4 mb-4 text-center font-weight-bold judul_utama">Kalkulasi Dampak
                                Lingkungan
                            </p>

                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Luas Limpasan Air Hujan</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-luaslimpahan">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Luas Bangunan</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-luasbangunan">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Jumlah Orang</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-jmlorang">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Kebutuhan Air Bersih</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-kebutuhanairbersih">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Produksi Limbah</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-produksilimbah">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Produksi Sampah</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-produksisampah">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text_all">
                                    <label class="text_all_mobile">Volume Limpasan Air Hujan</label>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <p class="inf-simulasi-volumlimpasanairhujan">-</p>
                                </div>
                            </div>


                            <p class="card-title mt-4 mb-4 text-center font-weight-bold judul_utama">Kalkulasi Nilai
                                Aset
                            </p>

                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <label class="text_all_mobile">Nilai Tanah</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-nilaitanah">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <label class="text_all_mobile">Biaya Bangunan /m<sup>2</sup></label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p><input type="number" id="biayaBangunan" value="3000000" style="font-size: 11px">
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <label class="text_all_mobile">Nilai Bangunan</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-nilaibangunan">-</p>
                                </div>
                            </div>
                            <div class="d-flex space_judul row_mid_text">
                                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text_all">
                                    <label class="text_all_mobile">Total Nilai</label>
                                </div>
                                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                    <p class="inf-simulasi-totalnilai">-</p>
                                </div>
                            </div>


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
                                    <input class="form-check-input position-static" type="checkbox"
                                        id="checkboxProfil" value="profil" aria-label="..."> Profil
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

                    <div class="tab-pane " id="pills-andalalin" role="tabpanel">
                        <div class="container">
                            <p class="card-title  mt-2 text-center font-weight-bold judul_utama">Analisa Dampak Lalu
                                Lintas</p>
                            <div class="d-flex space_judul row_mid_judul">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text_all">
                                    <div class="form-check d-none">
                                        <input class="form-check-input" id="enable-direction" type="checkbox" value=""
                                            id="defaultCheck1">
                                        <label class="form-check-label font-weight-bold" for="defaultCheck1"
                                            style="margin-top:2px">
                                            Cek Lalu Lintas
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="inf-andalalin">
                                <div class="d-flex space_judul row_mid_judul">
                                    <div class=" col-lg-5 text_all">
                                        <label class="text_all_mobile">Titik A</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p>
                                            <input type="text" style="font-size: 11px" class="inf-titika w-100"
                                                placeholder="Pilih Titik A" readonly>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class=" col-lg-5 text_all">
                                        <label class="text_all_mobile">Titik B</label>
                                    </div>
                                    <div class="col-lg-7 text_all">
                                        <p>
                                            <input type="text" style="font-size: 11px" class="inf-titikb w-100"
                                                placeholder="Pilih Titik B" readonly>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all">
                                        <label class="text_all_mobile">Jarak</label>
                                    </div>
                                    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all">
                                        <p class="inf-titik">-</p>
                                    </div>
                                </div>

                                <div class="d-flex space_text row_mid_text">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text_all">
                                        <table class="table-bordered mt-4 w-100">
                                            <thead>
                                                <tr>
                                                    <td class="font-weight-bold" align="center"
                                                        style="vertical-align: middle; padding:7px;">Jam
                                                    </td>
                                                    <td class="font-weight-bold" align="center"
                                                        style="vertical-align: middle; padding:7px;">
                                                        Kecepatan (km/jam)</td>
                                                    <td class="font-weight-bold" align="center"
                                                        style="vertical-align: middle; padding:7px;">
                                                        Waktu Tempuh (menit)</td>
                                                </tr>
                                            </thead>
                                            <tbody class="inf-direction-data">
                                                <tr class="inf-direction-06">
                                                    <td align="center">06:00</td>
                                                    <td align="center" class="inf-kecepatan-06">-</td>
                                                    <td align="center" class="inf-tempuh-06">-</td>
                                                </tr>
                                                <tr class="inf-direction-09">
                                                    <td align="center">09:00</td>
                                                    <td align="center" class="inf-kecepatan-09">-</td>
                                                    <td align="center" class="inf-tempuh-09">-</td>
                                                </tr>
                                                <tr class="inf-direction-12">
                                                    <td align="center">12:00</td>
                                                    <td align="center" class="inf-kecepatan-12">-</td>
                                                    <td align="center" class="inf-tempuh-12">-</td>
                                                </tr>
                                                <tr class="inf-direction-15">
                                                    <td align="center">15:00</td>
                                                    <td align="center" class="inf-kecepatan-15">-</td>
                                                    <td align="center" class="inf-tempuh-15">-</td>
                                                </tr>
                                                <tr class="inf-direction-18">
                                                    <td align="center">18:00</td>
                                                    <td align="center" class="inf-kecepatan-18">-</td>
                                                    <td align="center" class="inf-tempuh-18">-</td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <div class="row mt-4">
                                            <div class="col-md-2 text-left">
                                                <span style="margin-left: -5px">Lancar</span>
                                            </div>
                                            <div class="col-md-2" style="background-color: #2ecc71">

                                            </div>
                                            <div class="col-md-2" style="background-color: #f1c40f">

                                            </div>
                                            <div class="col-md-2" style="background-color: #e74c3c">

                                            </div>
                                            <div class="col-md-2" style="background-color: #c0392b">

                                            </div>
                                            <div class="col-md-2">
                                                <span style="margin-left: -5px">Padat</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                            <div class="col-sm-4 mt-2 text-center">
                                <a href="https://bankdki.co.id/en/product-services/micro-sme/2016-11-24-20-19-48/kredit-umkm"
                                    target="_blank" style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img style="width: 85%; margin-top:-6px"
                                        src="{{ asset('assets/gambar/dki.png') }}"><span>Bank DKI</span></a>
                            </div>
                            <div class="col-sm-4 mt-2 text-center">
                                <a href="/dokumen-dasar-dan-panduan" target="_blank"
                                    style="font-size: 12px;text-decoration:none"
                                    class="text-dark font-weight-bold"><img style="margin-top:-6px"
                                        src="{{ asset('assets/gambar/referensi.png') }}"
                                        class="w-75"><span>Referensi</span></a>
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
    <script src="https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js"></script>
    <script src="{{ asset('assets/js/pitchtoggle.js') }}"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-directions/v4.1.0/mapbox-gl-directions.js"></script>
    <script src="{{ asset('assets/js/web.js') }}"></script>
    {{-- @endif --}}
</body>

</html>
