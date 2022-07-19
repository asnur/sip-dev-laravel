@extends('layouts.template_admin')
@section('content')
<style>
    .skeleton-heading {
        width: 140% !important;
    }

    /* .gambar_utama_slider_input {
        width: 27rem !important;
        margin-left: 1rem;
    } */

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

    /* .data_image_space .slick-prev {
        left: -22px !important;
    }

    .data_image_space .slick-next {
        right: -10px !important;
    } */

    /* .slick-next slick-arrow {
        position: relative;
        left: 29.1rem;
        top: -8rem;
    } */

    .data_image_space .slick-prev:before {
        font-size: 35px !important;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f104";

    }

    .data_image_space .slick-next:before {
        font-size: 35px !important;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f105";
    }

    .data_image_space .slick-prev {
        left: 3%;
    }

    .data_image_space .slick-next {
        right: 3%;
    }

    div.slick-list.draggable {
        height: 25rem !important;
    }

    .data_image_space .slick-slide img {
        height: 26vw !important;
        width: 45vw !important;
    }

    .data_image_space .slick-prev:before {
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }

    .data_image_space .slick-next:before {
        text-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
    }


    .data_image_space2 .slick-prev:before {
        font-size: 35px !important;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f104";

    }

    .data_image_space2 .slick-next:before {
        font-size: 35px !important;
        font-family: "Font Awesome 5 Free";
        font-weight: 900;
        content: "\f105";
        /* margin-right: -130% !important; */
    }


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
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Pendataan Usaha
                </h2>
            </div>
        </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">

            <div class="col-md-3">
                <div class="card responsive_jarak">

                    <div class="card-status-top bg-orange"></div>

                    <div class="card-header">
                        <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#f76707" class="card-title">
                            x</h3>

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
                        <div style="font-size:40px;" class="h2 m-0 angka_responsive">55</div>
                    </div>

                </div>

            </div>


            <div class="col-md-3">
                <div class="card responsive_jarak">

                    <div class="card-status-top bg-danger"></div>

                    <div class="card-header">
                        <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#d63939" class="card-title">
                            x</h3>


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
                            66</div>
                    </div>
                </div>

            </div>

            <div class="col-md-3">
                <div class="card responsive_jarak">

                    <div class="card-status-top bg-success"></div>

                    <div class="card-header">
                        <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#2FB344" class="card-title">x</h3>


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

                        <div style="font-size:40px;" class="h2 m-0 angka_responsive">44</div>

                    </div>

                </div>

            </div>

            <div class="col-md-3">
                <div class="card responsive_jarak">

                    <div class="card-status-top bg-primary"></div>

                    <div class="card-header">
                        <h3 style="font-size: 14px; width: 19rem; margin-top: 0.5rem; color:#206bc4" class="card-title">
                            x</h3>

                        <div class="card-actions">
                            <span class="bg-blue text-white avatar">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-percentage" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="17" cy="17" r="1"></circle>
                                    <circle cx="7" cy="7" r="1"></circle>
                                    <line x1="6" y1="18" x2="18" y2="6"></line>
                                </svg>
                            </span>

                        </div>
                    </div>



                    <div class="card-body responsive_delete_card">
                        <div style="font-size:40px;" class="h2 m-0 angka_responsive">55%</div>
                    </div>
                </div>

            </div>

        </div>



        <div class="row-cards">
            <div class="col-md-12 col-xl-12">

                <div class="card mt-3">
                    <div class="card-status-top bg-danger"></div>

                    <div class="card-header card-header-light">
                        <h3 class="card-title">Data Terbaru</h3>

                        <div class="card-actions">
                            <div class="row align-items-center">
                                <div class="col-auto">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-body" style="padding: 0">

                        <div class="container-fluid px-0">
                            <div class="row no-gutters">
                                <div class="col-md-6">

                                    {{-- <div style="border-style: 2px #000 solid" class="gambar_utama_slider_input gambar_utama_slider_input_scale data_image_space"></div> --}}

                                </div>

                                <div sty class="col-md-6 px-4 mt-3">


                                    <div class="row">
                                        <div style="width: 40rem; height:2.5rem;" class="col-md-12">


                                            <div class="row">
                                                <div class="col-md-2">

                                                    <div id="photo_ajib_perkembangan">

                                                    </div>

                                                </div>

                                                <div style="margin-left:-1.3rem;" class="col-md-10 mt-1">
                                                    <div class="text-truncate">
                                                        <span class="h4" id="pelaku">
                                                        </span>
                                                    </div>
                                                    <div class="mt-1">
                                                        <span id="nama_usaha">
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                    <hr>

                                        <div class="row" style="max-height: 23rem; overflow-x: hidden; margin-top: -1.3rem;">
                                            <div class="col-md-5">
                                                <label class="form-label">No Perjanjian <span style="margin-left: 2.5rem;">
                                                    </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="no_perjanjian">
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
                                                <label class="form-label">Sektor <span style="margin-left: 2.5rem;">
                                                    </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="sektor">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row jarak_judul">
                                            <div class="col-md-5">
                                                <label class="form-label">Modal <span style="margin-left: 2.2rem;">
                                                    </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="modal">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row jarak_judul">
                                            <div class="col-md-5">
                                                <label class="form-label">Jumlah Tenaga<span style="margin-left: 3.5rem;">
                                                    </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="jumlah_tenaga">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row jarak_judul">

                                            <div class="col-md-5">
                                                <label class="form-label">Alamat <span style="margin-left: 3.5rem;">
                                                    </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="alamat">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row jarak_judul">
                                            <div class="col-md-5">
                                                <label class="form-label">ID Sub Blok<span style="margin-left: 3.5rem;"> </span></label>
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
                                                <label class="form-label">Kelurahan<span style="margin-left: 3.5rem;"> </span></label>
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
                                                <label class="form-label">Kecamatan<span style="margin-left: 3.5rem;"> </span></label>
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
                                                <label class="form-label">Badan Usaha<span style="margin-left: 3.5rem;"> </span></label>
                                            </div>
                                            <div class="col-md-7 jarak_text">
                                                <div class="col text_data_terbaru">
                                                    <span id="badan_usaha">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>

                            </div>

                            <div class="row jarak_inmobile px-4 pb-4">
                                <div class="col-md-12 mt-2">


                                    <div style="max-height:8rem;" class="image_slider_input data_image_space2">


                                        {{-- @php
                                        $no = 1;
                                        @endphp

                                        @foreach ($datas as $gi)
                                        <div>
                                            <img class="img_child img_child_id_perkembangan del_class_image" data-id="{{ $gi->id_baru }}" data-lazy="https://jakpintas.dpmptsp-dki.com/survey/{{ count($gi->image) == 0 ? 'not_image.png' : $gi->image[0]->name }}" alt="Image Child">
                                        </div>
                                        @endforeach --}}

                                    </div>

                                </div>
                            </div>


                        </div>

                    </div>
                </div>

            </div>
        </div>

        {{--
        <div style="margin-top: 1rem" class="row-cards">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-status-top bg-success"></div>
                    <div class="card-header">
                        <h3 class="card-title">Detil Input Petugas Survey</h3>

                        <div class="card-actions" style="margin-top:0.6%;">
                            <a style="font-weight:400; font-size:12px;" href="{{ route('detil-petugas-survey') }}">
        Unduh Excel
        </a>
    </div>

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
                        Tanggal Input
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
                                                                <td>
                                                                    <div class='skeleton-line'></div>
                                                                </td>
                                                                </tr>" ; } @endphp </tbody>
    </table>
</div>



</div>
</div>
</div> --}}



</div>
</div>

@endsection
