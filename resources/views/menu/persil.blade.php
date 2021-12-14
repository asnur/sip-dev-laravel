@extends('layout.maintemp')
@section('persil')

    <!-- Content -->
    <div class="container margin_conten_permenu">

        <div class="d-flex space_judul row_mid_judul">
            <div class="col-md-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Lahan Eksisting</label>
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
                <label class="text_all_mobile_permenu">CD TPZ</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['CD TPZ'] }}</p>
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
                @if ($data_zonasi['CD TPZ'] == ' ' || $data_zonasi['CD TPZ'] !== 'g')

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
