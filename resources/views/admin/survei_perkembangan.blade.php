@extends('layouts.template_admin')
@section('content')
<style>
    .skeleton-heading {
        width: 140% !important;
    }

    .gambar_utama_slider_input {
        width: 27rem !important;
        margin-left: 1rem;
    }

    /* .teks_size {
        max-height: 5rem;
        overflow-x: hidden;
        overflow-y: hidden;
    } */

    .teks_height {
        max-height: 23rem;
        overflow-x: hidden;
        margin-top: -1rem;
        /* overflow-y: hidden; */
    }

    table.dataTable tr.size_detil th {
        font-size: 0.8em;
    }

    .display table table-striped dataTable no-footer {
        margin-top: 10rem !important;
    }

    /* jgn pindah */
    .dataTables_length {
        margin-bottom: 0.5rem;
    }

    .read-more-show {
        cursor: pointer;
        color: #000;
    }

    .read-more-hide {
        cursor: pointer;
        color: #000;
    }

    .hide_content {
        display: none;
    }

    .arrow_updown {
        color: rgb(41, 60, 234)
    }

    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }


    /* jgn pindah */

    .slick-next slick-arrow {
        position: relative;
        left: 29.1rem;
        top: -8rem;
    }

    .data_image_space .slick-list {
        width: 28.8rem !important;
    }

    .data_image_space .slick-prev {
        margin-left: 0.2rem;
        top: 10rem;
        position: relative;
    }

    .data_image_space .slick-next {
        position: relative;
        left: 29.1rem;
        top: -10rem;
    }

    .data_image_space .slick-prev:before {
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .data_image_space .slick-next:before {
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    /* .slick-prev:before,
    .slick-next:before {
        font-size: 40px;
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    } */

    /* .chart-pengunjung {
        width: 68.5em !important;
    } */

    .dt-buttons {
        position: relative;
        top: -1.9rem;
        right: 3rem;
    }

    .progress.progress-xs {
        position: relative;
        top: 0.4rem;
    }

</style>



@php
$Roles = '';
@endphp





<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Survey Perkembangan Wilayah
                </h2>
            </div>
            <!-- Page title actions -->

        </div>
    </div>




</div>

<div class="page-body">
    <div class="container-xl">
        <!-- konten disini -->

        {{-- @foreach ($get_perkembangan_day as $x)
        <p>{{ $x->date }}</p>
        @endforeach --}}

        {{-- <span>
            <p>{{ $get_perkembangan_day->count()}}</p>
        </span> --}}


        <div class="row">

            <div class="col-md-3">
                <div class="card responsive_jarak">

                    <div class="card-status-top bg-orange"></div>

                    <div class="card-header">
                        <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#f76707" class="card-title">
                            Akses Terdaftar</h3>



                        <div class="card-actions">
                            <span class="bg-orange text-white avatar">
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



                    <div class="card-body responsive_delete_card">
                        <div style="font-size:40px;" class="h2 m-0 angka_responsive">{{ count($pegawai_ajib2) }}</div>

                        {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($pegawai_ajib) }}
                    </div> --}}
                </div>

            </div>

        </div>

        <div class="col-md-3">
            <div class="card responsive_jarak">

                <div class="card-status-top bg-primary"></div>

                <div class="card-header">
                    <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#206bc4" class="card-title">
                        Pengunjung Hari Ini</h3>

                    <div class="card-actions">
                        <span class="bg-blue text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>

                    </div>
                </div>



                <div class="card-body responsive_delete_card">
                    <div style="font-size:40px;" class="h2 m-0 inf-pengunjung-harian angka_responsive">
                        <div style="width:12.5rem;" class="skeleton-image custom_harian">
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="col-md-3">
            <div class="card responsive_jarak">

                <div class="card-status-top bg-danger"></div>

                <div class="card-header">
                    <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#d63939" class="card-title">
                        Titik Tercatat Hari Ini</h3>


                    <div class="card-actions">
                        <span class="bg-red text-white avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                            </svg>
                        </span>

                    </div>
                </div>



                <div class="card-body responsive_delete_card">
                    <div style="font-size:40px;" class="h2 m-0 angka_responsive">
                        {{ $get_perkembangan_day->count() }}</div>


                </div>
            </div>

        </div>


        <div class="col-md-3">
            <div class="card responsive_jarak">

                <div class="card-status-top bg-success"></div>

                <div class="card-header">
                    <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#2FB344" class="card-title">Total Titik Tercatat</h3>


                    <div class="card-actions">
                        <span class="bg-green text-white avatar">
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



                <div class="card-body responsive_delete_card">
                    <div style="font-size:40px;" class="h2 m-0 angka_responsive">
                        {{ count($hasil_jumlah_titik) }}</div>
                </div>


            </div>

        </div>





    </div>



    <div class="row-cards">
        <div class="col-md-12 col-xl-12">

            <div class="card mt-3">
                <div class="card-status-top bg-danger"></div>

                <div class="card-header card-header-light">
                    <h3 class="card-title">100 Data Input Terbaru</h3>

                    <div class="card-actions">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div style="max-height: 38em !important;height: 33em !important;" class="row">

                        <div class="col-md-6 mt-2">

                            <div class="gambar_utama_slider_input gambar_utama_slider_input_scale atur_margin_gambar_utama data_image_space">
                                <span id="gambar_utama_perkembangan">
                                </span>
                            </div>


                        </div>

                        <div sty class="col-md-6 mt-2">

                            <div class="row">
                                <div style="width: 40rem; height:2.5rem;" class="col-md-12">


                                    <div class="row">
                                        <div class="col-md-2">

                                            <div id="photo_ajib_perkembangan">

                                            </div>

                                        </div>

                                        <div style="margin-left:-1.3rem;" class="col-md-10 mt-1">
                                            <div class="text-truncate">
                                                <span class="h4" id="name_perkembangan">
                                                </span>
                                            </div>
                                            <div class="mt-1">
                                                <span id="penempatan_perkembangan">
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="teks_height">
                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Nama Lokasi <span style="margin-left: 3.7rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="namesurvey">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Koordinat <span style="margin-left: 2.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="kordinat">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">ID Sub Blok <span style="margin-left: 2.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="id_sub_blok">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Kelurahan <span style="margin-left: 2.2rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="kelurahan">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Kecamatan<span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="kecamatan">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Regional <span style="margin-left: 3.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="regional">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">

                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_regional">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Lingkungan<span style="margin-left: 3.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="neighborhood">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">

                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_neighborhood">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Ruang <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="transect_zone">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row jarak_judul">
                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7 jarak_text">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_transect_zone">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="row jarak_inmobile">
                        <div class="col-md-12 mt-2">


                            <div style="max-height:8rem;" class="image_slider_input">

                                {{-- <div class="slide_foto"></div> --}}

                                {{-- <div class="gambar_utama_slider_input3">
                                </div> --}}
                                @php
                                $no = 1;
                                @endphp

                                @foreach ($datas as $gi)
                                <div>
                                    <img class="img_child img_child_id_perkembangan del_class_image" data-id="{{ $gi->id }}" data-lazy="https://jakpintas.dpmptsp-dki.com/survey/{{ count($gi->image) == 0 ? 'not_image.png' : $gi->image[0]->name }}" alt="Image Child">
                                </div>
                                @endforeach

                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div style="margin-top: 1rem" class="row-cards">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-status-top bg-success"></div>
                <div class="card-header">
                    <h3 class="card-title">Kinerja Petugas Survey</h3>
                </div>
                <div class="card-body">
                    <div style="overflow-x: hidden !important;" class="table-responsive">
                        <table class="display table table-striped" id="table-surveyer2" style="width: 100%">


                            <thead>
                                <tr class="size_detil text-center" valign="middle">

                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Nama Petugas Ajib
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Penempatan
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Role
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Input Hari Ini
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Input Total
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>


                                </tr>
                            </thead>
                            <tbody>

                                @php
                                for ($x = 0; $x <= 9; $x++) { echo "<tr class='hide_lazyload_kinerja'>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    </tr>" ; } @endphp </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <div style="margin-top: 1rem" class="row-cards">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-status-top bg-success"></div>
                <div class="card-header">
                    <h3 class="card-title">Detil Input Petugas Survey</h3>
                </div>
                <div class="card-body">
                    <table class="display table table-striped" id="table-surveyer3" style="width: 100%">

                        <thead>
                            <tr class="size_detil text-center" valign="middle">
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Petugas AJIB
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Nama Lokasi
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        ID Sub Blok
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>

                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Kelurahan
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Kecamatan
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Pola Regional
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Deskripsi
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Pola Lingkungan
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Deskripsi
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Pola Ruang
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                                <th>
                                    <div style="display: none;" class="lazy_name_kinerja">
                                        Deskripsi
                                    </div>

                                    <div class="hide_lazyload_kinerja">
                                        <div class='skeleton-line'></div>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            for ($x = 0; $x <= 9; $x++) { echo "<tr class='hide_lazyload_kinerja'>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                </tr>" ; } @endphp </tbody>
                    </table>
                </div>



            </div>
        </div>
    </div>

    {{-- <div style="margin-top: 1rem" class="row-cards">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-status-top bg-success"></div>
                <div class="card-header">
                    <h3 class="card-title">Progres Survey Per Kelurahan</h3>

                </div>
                <div class="card-body">
                    <div style="overflow-x: hidden !important;" class="table-responsive">
                        <table class="display table table-striped" id="table-surveyer4" style="width: 100%">


                            <thead>
                                <tr class="size_detil" valign="middle">

                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Nama Kelurahan
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Jumlah Sub Blok
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Jumlah Sub Blok Tersurvey
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th colspan="1">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            &nbsp;&nbsp;&nbsp;&nbsp;Progres
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>
                                    <th>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                for ($x = 0; $x <= 9; $x++) { echo "<tr class='hide_lazyload_kinerja'>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    <td>
                                                                        <div class='skeleton-line'></div>
                                                                    </td>
                                                                    </tr>" ; } @endphp </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div> --}}


    <div style="margin-top: 0.2rem" class="row row-cards">
        <div class="col-12">
            <div class="card">
                <div class="card-status-top bg-primary"></div>
                <div class="card-body">
                    <div class="d-flex">
                        <h3 class="card-title">Trafik Pengunjung Harian Selama <span class="jumlah_hari">0</span> Hari Terakhir</h3>
                        <div class="ms-auto">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Filter: <span class="jumlah_hari"></span> hari</a>
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
                        <canvas class="chart-pengunjung">
                        </canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div style="margin-top: 1rem" class="row-cards">
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-status-top bg-warning"></div>
                    <h3 class="card-title">Titik Lokasi Survey</h3>
                </div>
                <div class="card-body">
                    <div style="width: 100%;height:70vh" id="map">
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<script type="text/javascript">
    $(document).ready(function() {

        $('#table-surveyer2').DataTable({

            "drawCallback": function(settings) {
                $(".hide_lazyload_kinerja").hide();
                $(".lazy_name_kinerja").show();
            },

            processing: false
            , serverSide: true
            , ajax: "{{ url('/admin/get-kinerja-petugas') }}"

            , ordering: true
            , language: {
                search: "Pencarian:"
            , }
            , order: [
                [3, "desc"]
            , ],

            columns: [{
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'penempatan'
                    , name: 'penempatan'
                }
                , {
                    data: 'roles.0.name'
                    , name: 'roles.0.name'
                }
                , {
                    data: 'perkembangan_today_count'
                    , name: 'perkembangan_today_count'
                }
                , {
                    data: 'perkembangan_count'
                    , name: 'perkembangan_count'
                }

            , ],

            columnDefs: [{
                    orderSequence: ["asc", "desc"]
                    , targets: [0]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [1]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [2]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [3]
                    , className: "text-center"
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [4]
                    , className: "text-center"

                , }

            , ],

        });

        $('#table-surveyer3').DataTable({

            "drawCallback": function(settings) {
                $(".hide_lazyload_kinerja").hide();
                $(".lazy_name_kinerja").show();
            },

            processing: false
            , serverSide: true
            , ajax: "{{ url('/admin/get-view-survey') }}"
            , language: {
                search: "Pencarian:"
            , }
            , ordering: false
            , sScrollX: "200%"
            , sScrollXInner: "200%"
            , responsive: false
            , order: [
                [0, "desc"]
            ],


            columns: [{
                    data: 'petugas'
                    , name: 'petugas'
                }
                , {
                    data: 'name_tempat'
                    , name: 'name_tempat'
                }
                , {
                    data: 'id_sub_blok'
                    , name: 'id_sub_blok'
                }, {
                    data: 'kelurahan'
                    , name: 'kelurahan'
                }, {
                    data: 'kecamatan'
                    , name: 'kecamatan'
                }, {
                    data: 'regional'
                    , name: 'regional'
                }, {
                    data: 'deskripsi_regional'
                    , name: 'deskripsi_regional'
                }, {
                    data: 'neighborhood'
                    , name: 'neighborhood'
                }, {
                    data: 'deskripsi_neighborhood'
                    , name: 'deskripsi_neighborhood'
                }, {
                    data: 'transect_zone'
                    , name: 'transect_zone'
                }, {
                    data: 'deskripsi_transect_zone'
                    , name: 'deskripsi_transect_zone'
                }

            , ],

            columnDefs: [{
                    orderSequence: ["asc", "desc"]
                    , targets: [0]
                }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [1]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [2]
                }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [3]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [4]
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [5]
                    , className: "text-center"
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [6]
                }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [7]
                    , className: "text-center"
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [8]
                }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [9]
                    , className: "text-center"
                , }, {
                    orderSequence: ["asc", "desc"]
                    , targets: [10]
                , }

                , {
                    width: "7%"
                    , targets: 0
                }, {
                    width: "9%"
                    , targets: 1
                }, {
                    width: "5%"
                    , targets: 2
                }, {
                    width: "7%"
                    , targets: 3
                }, {
                    width: "5%"
                    , targets: 4
                }, {
                    width: "6%"
                    , targets: 5
                }, {
                    width: "7%"
                    , targets: 7
                }, {
                    width: "5%"
                    , targets: 9
                }
            , ],

        });

        $('#table-surveyer4').DataTable({

            "drawCallback": function(settings) {
                $(".hide_lazyload_kinerja").hide();
                $(".lazy_name_kinerja").show();
            },

            processing: false
            , serverSide: true
            , ajax: "{{ url('/admin/get-progres-survey') }}"

            , ordering: false
            , language: {
                search: "Pencarian:"
            , }
            , order: [
                [3, "desc"]
            , ],

            columns: [{
                    data: 'nama_kel'
                    , name: 'nama_kel'

                }, {
                    data: 'jumlah'
                    , name: 'jumlah'

                }, {
                    data: 'survey_count'
                    , name: 'survey_count'

                }, {
                    data: 'progres'
                    , name: 'progres'
                }
                , {
                    data: 'persen'
                    , name: 'persen'
                }
            ],

            columnDefs: [{
                orderSequence: ["asc", "desc"]
                , targets: [0]
                , className: "text-left"
            , }, {
                orderSequence: ["asc", "desc"]
                , targets: [1]
                , className: "text-center"
            , }, {
                orderSequence: ["asc", "desc"]
                , targets: [2]
                , className: "text-center"
            , }, {
                orderSequence: ["asc", "desc"]
                , targets: [3]
                , className: "text-center"
            , }, ],

            // 'rowsGroup': [0]
            // , 'createdRow': function(row, data, dataIndex) {
            //     if (data[4] === '') {
            //         $('th:eq(1)', row).attr('colspan', 2);
            //         $('th:eq(2)', row).css('display', 'none');
            //         $('th:eq(3)', row).css('display', 'none');
            //         $('th:eq(4)', row).css('display', 'none');
            //     }
            // }


        });


    })

</script>
@endsection
