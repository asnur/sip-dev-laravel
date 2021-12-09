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

                @endif
            </div>
        </div>


    </div>


@endsection
