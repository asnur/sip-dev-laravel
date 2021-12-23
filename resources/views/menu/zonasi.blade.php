@extends('layout.maintemp')
@section('zonasi')


    <!-- Content -->
    <div class="container margin_conten_permenu">

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
                <p>{{ $data_zonasi['Sub Zona'] }} - {{ $data_zonasi['Hirarki'] }}</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-lg-5 text_all_permenu">
                <label class="text_all_mobile_permenu">Kode Blok/Subblok</label>
            </div>
            <div class="col-lg-7 text_all_permenu">
                <p>{{ $data_zonasi['Kode Blok'] }}/{{ $data_zonasi['Sub Blok'] }}</p>
            </div>
        </div>


    </div>


@endsection
