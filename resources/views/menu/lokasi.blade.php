@extends('layout.maintemp')

@section('lokasi')

    <div class="container margin_conten_permenu">

        <div class="d-flex space_judul row_mid_judul">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Koordinat</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p><a class="font-weight-bold"
                        href="https://www.google.com/maps/search/%09{{ $data_kordinat[0] }},{{ $data_kordinat[1] }}"
                        target="_blank">{{ $data_kordinat[0] }}, {{ $data_kordinat[1] }}</a></p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Kelurahan</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ $data_lokasi['Kelurahan'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Kecamatan</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ $data_lokasi['Kecamatan'] }}</p>
            </div>
        </div>


        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Wilayah</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ $data_lokasi['Kota'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Luas</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ number_format($data_lokasi['luas-area'] / 10000, 2, '.', '') }} ha</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Kepadatan</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ number_format($data_lokasi['Kepadatan-Penduduk']) }} jiwa/km2</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Rasio Gini</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>{{ $data_lokasi['gini'] }}</p>
            </div>
        </div>

        {{-- <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">UMR</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
                <p>Rp 4.300.000</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Tiga Besar KBLI</label>
            </div>
            <div class="col-xs-7 col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">


                <span>43210</span><br>
                <span>43210</span><br>
                <span>43210</span>

            </div>
        </div> --}}

    </div>

@endsection
