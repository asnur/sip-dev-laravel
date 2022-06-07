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


        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-4">
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
                        {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">{{ count($hasil_jumlah_titik) }}</div> --}}
                    <div style="font-size:40px;" class="h2 m-0">{{ count($hasil_jumlah_titik) }}</div>

                    {{-- <div style="font-size:40px;" class="h2 m-0">{{ count($hasil_jumlah_titik) }} --}}
                </div>


            </div>

        </div>
        <div class="col-md-4">
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
                    <div style="font-size:40px;" class="h2 m-0">{{ count($pegawai_ajib2) }}</div>

                    {{-- <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ count($pegawai_ajib) }}
                </div> --}}

            </div>

        </div>
    </div>



    <div class="row row-cards">
        <div class="col-md-12 col-xl-12">

            <div class="card">
                <div class="card-status-top bg-danger"></div>

                <div class="card-header card-header-light">
                    <h3 class="card-title">Input Data Terbaru</h3>

                    <div class="card-actions">
                        <div class="row align-items-center">
                            <div class="col-auto">
                            </div>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div class="row">

                        <div class="col-md-6 mt-2">

                            <div style="position:relative;  width:30.5rem;" class="gambar_utama_slider_input">
                                <span id="gambar_utama_perkembangan">
                                </span>

                            </div>


                        </div>

                        <div class="col-md-6 mt-2">

                            <div class="row">
                                <div style="width: 40rem; height:2.5rem;" class="col-md-12">


                                    <div class="row">
                                        <div class="col-md-2">

                                            <div id="photo_ajib_perkembangan">

                                            </div>

                                            {{-- <div id="photo_ajib_perkembangan"></div> --}}
                                        </div>

                                        <div style="margin-left:-1.3rem;" class="col-md-10 mt-1">
                                            <div class="text-truncate">
                                                <span class="h4" id="name_perkembangan">
                                                    {{-- <div class="skeleton-heading"></div> --}}
                                                </span>
                                            </div>
                                            <div class="mt-1">
                                                <span id="penempatan_perkembangan">
                                                    {{-- <div style="margin-top:-0.7rem;" class="skeleton-heading"></div> --}}
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <hr>

                            <div class="teks_height">
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Nama Lokasi <span style="margin-left: 3.7rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="namesurvey">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Koordinat <span style="margin-left: 2.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="kordinat">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">ID Sub Blok <span style="margin-left: 2.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="id_sub_blok">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Kelurahan <span style="margin-left: 2.2rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="kelurahan">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Kecamatan<span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="kecamatan">
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Regional <span style="margin-left: 3.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="regional">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">

                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_regional">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Lingkungan<span style="margin-left: 3.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="neighborhood">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">

                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_neighborhood">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Pola Ruang <span style="margin-left: 3.5rem;"> </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="transect_zone">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-5">
                                        <label class="form-label">Deskripsi <span style="margin-left: 3.5rem;">
                                            </span></label>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="col text_data_terbaru">
                                            <span id="deskripsi_transect_zone">
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12 mt-2">


                            <div class="image_slider_input">
                                @php
                                $no = 1;
                                @endphp

                                @foreach ($datas as $gi)
                                <div>
                                    <img class="img_child img_child_id_perkembangan" data-id="{{ $gi->id }}" src="https://jakpintas.dpmptsp-dki.com/survey/{{ count($gi->image) == 0 ? 'not_image.png' : $gi->image[0]->name }}" alt="Image Child">
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
        <div class="col-md-12 col-xl-12">
            <div class="card">
                <div class="card-status-top bg-success"></div>
                <div class="card-header">
                    <h3 class="card-title">Tabel Kinerja Petugas Survey</h3>
                    <div id="id_sub_blok"></div>

                </div>
                <div class="card-body">
                    <table style="margin-bottom: 10rem;" class="display table table-striped" id="table-surveyer2">
                        <thead>
                            <tr class="text-center size_detil" valign="middle">
                                <th style="width: 20%">Nama Petugas Ajib</th>
                                <th style="width: 30%">Penempatan</th>
                                <th style="width: 35%">Jumlah Titik</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai_ajib2 as $pa)
                            <tr>
                                <td style="width: 20%">{{ $pa->name }}</td>
                                <td style="width: 30%">{{ $pa->penempatan }}</td>
                                <td class="text-center">{{ $pa->perkembangan_count }}</td>
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
                <div class="card-status-top bg-success"></div>
                <div class="card-header">
                    <h3 class="card-title">Tabel Detil</h3>
                    <div id="id_sub_blok"></div>

                </div>
                <div class="card-body">
                    <table class="display table table-striped" id="table-surveyer3" style="width: 100%">
                        <thead>
                            <tr class="text-center size_detil" valign="middle">
                                <th>Petugas AJIB</th>
                                <th>Nama Lokasi</th>
                                <th>Pola Regional</th>
                                <th>Deskripsi</th>
                                <th>Pola Lingkungan</th>
                                <th>Deskripsi</th>
                                <th>Pola Ruang</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_detail as $pa)
                            <tr>
                                <td>{{ $pa->user->name }}</td>
                                <td>{{ $pa->name }}</td>
                                <td>{{ $pa->regional }}</td>
                                <td>
                                    @if(strlen($pa->deskripsi_regional) > 45)
                                    {{substr($pa->deskripsi_regional,0,45)}}
                                    <span class="read-more-show hide_content"><i class="fa fa-angle-down arrow_updown"></i></span>
                                    <span class="read-more-content"> {{substr($pa->deskripsi_regional,45,strlen($pa->deskripsi_regional))}}
                                        <span class="read-more-hide hide_content"><i class="fa fa-angle-up arrow_updown"></i></span> </span>
                                    @else
                                    {{$pa->deskripsi_regional}}
                                    @endif
                                </td>
                                <td>{{ $pa->neighborhood }}</td>
                                <td>
                                    @if(strlen($pa->deskripsi_neighborhood ) > 45)
                                    {{substr($pa->deskripsi_neighborhood ,0,45)}}
                                    <span class="read-more-show hide_content"><i class="fa fa-angle-down arrow_updown"></i></span>
                                    <span class="read-more-content"> {{substr($pa->deskripsi_neighborhood ,45,strlen($pa->deskripsi_neighborhood ))}}
                                        <span class="read-more-hide hide_content"><i class="fa fa-angle-up arrow_updown"></i></span> </span>

                                    @else
                                    {{$pa->deskripsi_neighborhood }}
                                    @endif
                                </td>
                                <td>{{ $pa->transect_zone }}</td>
                                <td>
                                    @if(strlen($pa->deskripsi_transect_zone ) > 45)
                                    {{substr($pa->deskripsi_transect_zone ,0,45)}}
                                    <span class="read-more-show hide_content"><i class="fa fa-angle-down arrow_updown"></i></span>
                                    <span class="read-more-content"> {{substr($pa->deskripsi_transect_zone ,45,strlen($pa->deskripsi_transect_zone ))}}
                                        <span class="read-more-hide hide_content"><i class="fa fa-angle-up arrow_updown"></i></span> </span>
                                    @else
                                    {{$pa->deskripsi_transect_zone }}
                                    @endif
                                </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>


<script type="text/javascript">
    // Hide the extra content initially, using JS so that if JS is disabled, no problemo:
    $('.read-more-content').addClass('hide_content')
    $('.read-more-show, .read-more-hide').removeClass('hide_content')

    // Set up the toggle effect:
    $('.read-more-show').on('click', function(e) {
        $(this).next('.read-more-content').removeClass('hide_content');
        $(this).addClass('hide_content');
        e.preventDefault();
    });

    // Changes contributed by @diego-rzg
    $('.read-more-hide').on('click', function(e) {
        var p = $(this).parent('.read-more-content');
        p.addClass('hide_content');
        p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
        e.preventDefault();
    });

</script>

@endsection
