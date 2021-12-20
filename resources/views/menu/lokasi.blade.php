@extends('layout.maintemp')
@section('lokasi')

    <div class="container margin_conten_permenu">

        <p class="card-title mt-2 text-center font-weight-bold judul_utama">Lokasi</p>

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

        <p class="card-title mt-2 text-center font-weight-bold judul_utama">Persil</p>

        <div class="d-flex space_judul row_mid_judul">
            <div class="col-md-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Kegiatan</label>
            </div>
            <div class="col-md-7 text_all_permenu">
                <p class="inf-eksisting">-</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Perkiraan Harga</label>
            </div>
            <div style="margin-left:6vh" class="col-lg-7 text_all_permenu">
                <p>Rp.5.000.000,- s/d Rp.10.000.000,-&nbsp;&nbsp;<span>/m²</span></p>
            </div>
        </div>


        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Tipe Hak</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p class="inf-tipehak">-</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Luas</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p class="inf-luasbpn">-</p>
            </div>
        </div>



        <p class="card-title mt-2 text-center font-weight-bold judul_utama">Zonasi</p>

        <div class="d-flex space_judul row_mid_judul">
            <div class="col-md-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Zona</label>
            </div>
            <div class="col-md-7 text_all_permenu">
                <p>{{ $data_zonasi['Zona'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Sub Zona</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['Sub_Zona'] }} - {{ $data_zonasi['Zona'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Blok/Subblok</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['Kode_Blok'] }}/{{ $data_zonasi['Sub_Blok'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">TPZ</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['TPZ'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">CD_TPZ</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['CD_TPZ'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">KDH</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['KDH'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">KLB</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['KLB'] }}</p>
            </div>
        </div>



        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-12 text_all_permenu">
                @if ($data_zonasi['CD_TPZ'] == ' ' || $data_zonasi['CD_TPZ'] !== 'g')

                    <p class="mt-3">Ketentuan GSB Bangunan Gedung bila Gedung Berada di sisi:</p>
                    <ol style="margin-top:-15px">
                        <li style="margin-left:-25px">Rencana Jalan Dengan Lebar ≤ 12m, Maka GSB: Sebesar 0,5 Kali Lebar
                            Rencana Jalan Dari Sisi Terdekat Rencana Jalan;</li>
                        <li style="margin-left:-25px">Rencana Jalan Dengan Lebar 12m – 26m, Maka GSB: 8m Dari Sisi Terdekat
                            Rencana Jalan;</li>
                        <li style="margin-left:-25px">Rencana Jalan Dengan Lebar ≥ 26m, Maka GSB: 10m Dari Sisi Terdekat
                            Rencana Jalan;</li>
                        <li style="margin-left:-25px">Jalan Eksisting Tanpa Rencana, Maka GSB: 2m Dari Sisi Terdekat Jalan
                            Eksisting.</li>
                    </ol>
                @else

                    <p>Ketentuan GSB Bangunan Ditiadakan dan Diganti Dengan Pedestrian.</p>

                @endif
            </div>
        </div>







    </div>

@endsection
