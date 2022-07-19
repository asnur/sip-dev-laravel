@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';
@endphp


<style>
    .list-group-item a {
        color: black;
        text-decoration: none;
    }

</style>

{{-- <script src="https://code.highcharts.com/highcharts.js"></script> --}}

<script src="https://code.highcharts.com/stock/highstock.js"></script>
{{-- open ekspor --}}
{{-- <script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/accessibility.js"></script> --}}



<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">

                    <div class="">
                        Jawaban Kuesioner
                    </div>


                </h2>
            </div>
            <!-- Page title actions -->

        </div>
    </div>




</div>

<div class="page-body">
    <div class="container-xl">
        <!-- konten disini -->

        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">Quiz Option</span><br>
                                        <span style="font-size: 9pt" class="text-muted">2 Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row mb-1">
                                <div class="col-md-12 border border-primary">
                                    <div class="d-flex justify-content-center">
                                        <div id="quiz_radio_jawaban"></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row row-cards py-4">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">Quiz Checkbox</span><br>
                                        <span style="font-size: 9pt" class="text-muted">2 Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 border border-primary">
                                    {{-- <div id="quiz_checkbox_jawaban"></div> --}}

                                    <div style=" height: 400px; margin: 0 auto;" id="quiz_checkbox_jawaban"></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">Text</span><br>
                                        <span style="font-size: 9pt" class="text-muted">2 Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12 p-0 mb-2">
                                    <input type="text" class="form-control" name="text_jawaban" placeholder="Readonly" value="Text Pertama" readonly="">
                                </div>

                                <div class="col-md-12 p-0 mb-2">
                                    <input type="text" class="form-control" name="text_jawaban" placeholder="Readonly" value="Text Kedua" readonly="">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="row row-cards py-4">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">

                                    <p class="lh-base">
                                        <span class="h4">Gambar</span><br>
                                        <span style="font-size: 9pt" class="text-muted">2 Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 px-0">

                                    <div class="list-group mb-2">
                                        <a href="#" style="color: #000; background-color: #f1f5f9;" type="button" class="list-group-item px-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="15" y1="8" x2="15.01" y2="8"></line>
                                                <rect x="4" y="4" width="16" height="16" rx="3"></rect>
                                                <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                                                <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                                            </svg>
                                            Gambar 1</a>

                                        <a href="#" style="color: #000; background-color: #f1f5f9;" type="button" class="list-group-item px-2">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="15" y1="8" x2="15.01" y2="8"></line>
                                                <rect x="4" y="4" width="16" height="16" rx="3"></rect>
                                                <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                                                <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                                            </svg>

                                            Gambar 2</a>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


</div>
</div>


<script>
    // donat

    // Make monochrome colors
    // var pieColors = (function() {
    //     var colors = []
    //         , base = Highcharts.getOptions().colors[0]
    //         , i;

    //     for (i = 0; i < 10; i += 1) {

    //         colors.push(Highcharts.color(base).brighten((i - 3) / 7).get());
    //     }
    //     return colors;
    // }());

    // Highcharts.chart('quiz_radio_jawaban', {

    //     chart: {
    //         plotBackgroundColor: null
    //         , plotBorderWidth: null
    //         , plotShadow: false
    //         , type: 'pie'
    //     }
    //     , title: {
    //         text: 'Jawaban Data Radio x'
    //     }
    //     , tooltip: {
    //         pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    //     }
    //     , accessibility: {
    //         point: {
    //             valueSuffix: '%'
    //         }
    //     }
    //     , plotOptions: {
    //         pie: {
    //             allowPointSelect: true
    //             , cursor: 'pointer'
    //             , colors: pieColors
    //             , dataLabels: {
    //                 enabled: true
    //                 , format: '<b>{point.name}</b><br>{point.percentage:.1f} %'
    //                 , distance: -50
    //                 , filter: {
    //                     property: 'percentage'
    //                     , operator: '>'
    //                     , value: 4
    //                 }
    //                 , showInLegend: true

    //             }
    //         }
    //     }
    //     , series: [{
    //         name: 'Share'
    //         , data: [{
    //                 name: 'Chrome'
    //                 , y: 61.41
    //             }
    //             , {
    //                 name: 'Internet Explorer'
    //                 , y: 11.84
    //             }
    //             , {
    //                 name: 'Firefox'
    //                 , y: 10.85
    //             }
    //             , {
    //                 name: 'Edge'
    //                 , y: 4.67
    //             }
    //             , {
    //                 name: 'Safari'
    //                 , y: 4.18
    //             }
    //             , {
    //                 name: 'Other'
    //                 , y: 7.05
    //             }
    //         ]
    //         , credits: {
    //             enabled: false
    //         }

    //     }]
    // });

    // Highcharts.chart('quiz_radio_jawaban', {
    //     chart: {
    //         type: 'pie'
    //     }
    //     , title: {
    //         text: 'Jawaban Data Radio x'
    //         , y: 27
    //     }

    //     , accessibility: {
    //         announceNewData: {
    //             enabled: true
    //         }
    //         , point: {
    //             valueSuffix: '%'
    //         }
    //     },

    //     plotOptions: {
    //         series: {
    //             dataLabels: {
    //                 enabled: true
    //                 , format: '{point.name}: {point.y:.f}'
    //             }
    //         }
    //     },

    //     tooltip: {
    //         headerFormat: '<span style="font-size:11px;">{series.name}</span><br>'
    //         , pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.f}</b> Dari total<br />'
    //     },

    //     series: [{
    //         name: "Data Quiz Option"
    //         , colorByPoint: true
    //         , data: [{
    //                 name: "Data Pertama"
    //                 , y: 75
    //             }
    //             , {
    //                 name: "Data Kedua"
    //                 , y: 25
    //             }
    //             , {
    //                 name: "Data Ketiga"
    //                 , y: 25
    //             }
    //             , {
    //                 name: "Data Keempat"
    //                 , y: 25
    //             }
    //         ]
    //     }]
    //     , credits: {
    //         enabled: false
    //     }
    // , });

    Highcharts.chart('quiz_radio_jawaban', {
        chart: {
            type: 'pie'
            , height: 400
            , width: 500
        }
        , credits: {
            enabled: false
        }
        , colors: [
            '#5485BC', '#AA8C30', '#5C9384', '#981A37', '#FCB319', '#86A033', '#614931', '#00526F', '#594266', '#cb6828', '#aaaaab', '#a89375'
        ]
        , title: {
            text: null
        }
        , plotOptions: {
            pie: {
                allowPointSelect: true
                , cursor: 'pointer'
                , showInLegend: true
                , dataLabels: {
                    enabled: false
                    , formatter: function() {
                        return this.percentage.toFixed(2) + '%';
                    }
                }
            }
        }
        , legend: {
            enabled: true
            , layout: 'vertical'
            , align: 'right'
            , width: 200
            , verticalAlign: 'middle'
            , useHTML: true
            , labelFormatter: function() {
                return '<div style="text-align: left; width:130px;float:left;">' + this.name + '</div><div style="width:40px; float:left;text-align:right;">' + this.y + '%</div>';
            }
        }
        , series: [{
            type: 'pie'
            , dataLabels: {

            }
            , data: [
                ['Domestic Equity', 38.5]
                , ['International Equity', 26.85]
                , ['Other', 15.70]
                , ['Cash and Equivalents', 10.48]
                , ['Fixed Income', 8.48]
            ]
        }]
    , });


    //BAR
    Highcharts.chart('quiz_checkbox_jawaban', {

        chart: {
            type: 'bar'
            , marginLeft: 70
        }
        , title: {
            text: 'Jawaban Data Checkbox x'
            , y: 23
        }
        , xAxis: {
            type: 'category'
            , title: {
                text: null
            }
            , min: 0
            , max: 4
            , scrollbar: {
                enabled: true
            }
            , tickLength: 0
        }
        , yAxis: {
            min: 0
            , max: 1200
            , title: {
                text: 'Jumlah'
                    // , align: 'high'
                , y: 8
                // , align: 'right',

            }
        }
        , plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        }
        , legend: {
            enabled: false
        }
        , credits: {
            enabled: false
        }
        , series: [{
            name: 'Jumlah'
            , data: [
                ["Mangga", 1000]
                , ["Nanas", 575]
                , ["Jambu", 523]
                , ["Pisang", 427]
                , ["Buah Naga", 309]
                , ["Jeruk", 278]
                , ["Kiwi", 239]
            ]
        }]
    });

</script>





@endsection
