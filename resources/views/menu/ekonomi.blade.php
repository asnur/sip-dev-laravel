@extends('layout.maintemp')
@section('ekonomi')


    <!-- Content -->
    <div class="container margin_conten_permenu">

        <div class="d-flex space_judul row_mid_judul">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu_permenu">
                <label class="text_all_permenu_mobile_permenu">Pelaku Usaha</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu_permenu">
                <p>373 Orang</p>
            </div>
        </div>

        <div class="d-flex space_text row_mid_text">
            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu_permenu">
                <label class="text_all_permenu_mobile_permenu">Total Omset</label>
            </div>
            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu_permenu">
                <p>3.685.675.000 <span>per bulan</span></p>
            </div>
        </div>


        <div class="d-flex margin_chart_ekonomi_mobile">
            <canvas id="pie-chart" width="70" height="50"></canvas>
        </div>

        <div class="d-flex margin_chartline_ekonomi_mobile">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 mt-4">
                <canvas id="bar-chart-grouped" width="130" height="150"></canvas>
            </div>
        </div>


        <p class="card-title mb-3 mt-3  text-center font-weight-bold judul_utama text_all_permenu">Pendapatan Rata-Rata
            Per Bulan</p>

        <!-- Ekonomi pendapatan baru start -->

        <div class="container_grid">



            <div>
                <label>0 - 5 juta</label>
            </div>
            <div class="col_info">
                <label> 4.593 Orang</label>
            </div>

            <div>
                <label>6 - 10 Juta</label>
            </div>
            <div class="col_info">
                <label>2.045 Orang</label>
            </div>

            <div>
                <label>11 - 15 Juta</label>
            </div>
            <div class="col_info">
                <label>1.233 Orang</label>
            </div>

            <div>
                <label>16 - 20 Juta</label>
            </div>
            <div class="col_info">
                <label class="text">1.497 Orang</label>
            </div>

            <div>
                <label>> 20 Juta</label>
            </div>
            <div class="col_info">
                <label>124 Orang</label>
            </div>


            <div>
                <label>> N/A</label>
            </div>
            <div class="col_info">
                <label>3.866 Orang</label>
            </div>


        </div>

        <!-- Ekonomi pendapatan end start -->


    </div>



    @endsection