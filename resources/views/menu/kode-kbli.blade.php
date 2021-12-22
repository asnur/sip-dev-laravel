@extends('layout.maintemp')
@section('kode_kbli')

       <!-- Content -->
       <div class="container">

        <div class="d-flex ml-5 margin_cari_kodelbli_mobile">
            <div class="col-md-12 text_all">
                <label class="text_all_mobile_kbli">Kegiatan Ruang</label>
                <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                    <select class="form-control text_all" id="kegiatanRuang" style="z-index: 9999">

                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex ml-5 skala_kodekbli margin_cari_kodelbli_mobile">
            <div class="col-md-12 text_all">
                <label class="text_all_mobile_kbli">Skala</label>
                <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                    <select class="form-control" id="skala">

                    </select>
                </div>
            </div>
        </div>

        <div class="d-flex ml-5 skala_kodekbli margin_cari_kodelbli_mobile">
            <div class="col-md-12 text_all">
                <label class="text_all_mobile_kbli">Kegiatan Kewenangan</label>
                <div class="form-group input-group-sm cari_kodekbli_option_mobile">
                    <select class="form-control" id="kegiatanKewenangan">

                    </select>
                </div>
            </div>
        </div>

        <div class="dtKBLI">

        </div>

        {{-- <button class="btn btn-sm text-primary ml-0" id="btn-print">
            <i class="fa fa-print"></i></button> --}}

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






            @endsection