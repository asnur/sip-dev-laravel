@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';

$show = '';
$hide = 'style="display:none"';
@endphp


<style>
    .list-group-item a {
        color: black;
        text-decoration: none;
    }

    /* style navbar */
    .nav-tabs .nav-item.show .nav-link,
    .nav-tabs .nav-link.active {
        border-top: #FFFFFF;
        border-right: #FFFFFF;
        border-left: #FFFFFF;
        border-bottom: 3px solid #206BC4;
    }

    /* tes border */
    /* .border_tes {
        border-style: solid;
    }

    .border_text {
        border-bottom: 3px red solid;
    } */


    .remove_textarea_option_jawaban {
        border: none;
        background-color: transparent;
        resize: none;
        outline: none;
        /* border-bottom: 0.1px solid #ccc !important; */
        width: 100%;
        overflow: hidden;
        color: #757575;
        max-height: 100px;
        height: 27px;
    }

    .remove_textarea_option_jawaban:hover {
        /* border: none; */
        background-color: transparent;
        resize: none;
        outline: none;
        border-bottom: 0.1px solid #ccc !important;
        width: 100%;
        overflow: hidden;
        color: #757575;
        max-height: 100px;
        height: 27px;
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
                <div class="d-flex flex-column">
                    <div class="" style="font-weight: 600;font-size: large;letter-spacing: 2px;">Kuesioner {{ $quiz['title'] }}</div>
                    <div class="" style="font-weight: 600; font-size: larger; letter-spacing: 1px; color: gray;">{{ $quiz['description'] }}</div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="page-body">
    <div class="container-xl">

        {{-- konten --}}
        <div class="card">
            <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">

                <li class="nav-item tab_kuesioner">
                    <a href="#pertanyaan" class="nav-link" data-bs-toggle="tab" style="font-weight: 600; font-size: 13pt;">
                        <span>Pertanyaan</span>
                    </a>
                </li>

                <li class="nav-item tab_kuesioner">
                    <a href="#jawaban" class="nav-link active" data-bs-toggle="tab" style="font-weight: 600; font-size: 13pt;">
                        <span>Kompilasi Jawaban</span>
                    </a>
                </li>

                <li class="nav-item tab_kuesioner">
                    <a href="#" class="nav-link" data-bs-toggle="tab" style="font-weight: 600; font-size: 13pt;">
                        <span>Individual Jawaban</span>
                    </a>
                </li>

            </ul>

            <div class="card-body">
                <div class="tab-content">

                    {{-- <div class="tab-pane active show" id="pertanyaan">
                        <div>
                            <div class="row">

                                <div class="col-md-12">
                                    @foreach ($quiz['Questions'] as $q)

                                    @if($q['type'] == 'radio')
                                    <div class="row row-cards mb-3">
                                        <div class="col-md-12 col-xl-12">

                                            <div class="card">

                                                <div class="card-body py-2 px-3">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <p style="font-weight: 600; font-size:12pt" class="">{{ $q['question'] }}</p>
                                                                    <div style="border-bottom: 1px #757575 solid; margin-top:0.7%"></div>
                                                                    <p style="font-size: 11pt; margin-top:0.5%" class="text-muted"><span id="{{ $q['_id'] }}_count"></span> Jawaban</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-1 d-none">
                                                            <div class="col-md-12 border border-primary">
                                                                <div class="d-flex justify-content-center">
                                                                    <div id="{{ $q['_id'] }}"></div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @elseif($q['type'] == 'checkbox')
                                    <div class="row row-cards py-4">
                                        <div class="col-md-12 col-xl-12">

                                            <div class="card">

                                                <div class="card-body py-2 px-3">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <p style="font-weight: 600; font-size:12pt" class="">{{ $q['question'] }}</p>
                                                                    <div style="border-bottom: 1px #757575 solid; margin-top:0.7%"></div>
                                                                    <p style="font-size: 11pt; margin-top:0.5%" class="text-muted"><span id="{{ $q['_id'] }}_count"></span> Jawaban</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 d-none">
                                                            <div class="col-md-12 border border-primary ">

                                                                <div style=" height: 400px; margin: 0 auto;" id="{{ $q['_id'] }}"></div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @elseif($q['type'] == 'textarea')
                                    <div class="row row-cards">
                                        <div class="col-md-12 col-xl-12">

                                            <div class="card">

                                                <div class="card-body py-2 px-3">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                    <p style="font-weight: 600; font-size:12pt" class="">{{ $q['question'] }}</p>
                                                                    <div style="border-bottom: 1px #757575 solid; margin-top:0.7%"></div>
                                                                    <p style="font-size: 11pt; margin-top:0.5%" class="text-muted"><span id="{{ $q['_id'] }}_count"></span> Jawaban</p>
                                                            </div>
                                                        </div>

                                                        <div class="row d-none" id="{{ $q['_id'] }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    @elseif($q['type'] == 'file')

                                    <div class="row row-cards">
                                        <div class="col-md-12 col-xl-12">

                                            <div class="card">

                                                <div class="card-body py-2 px-3">
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-md-12">

                                                                    <p style="font-weight: 600; font-size:12pt" class="">{{ $q['question'] }}</p>
                                                                    <div style="border-bottom: 1px #757575 solid; margin-top:0.7%"></div>
                                                                    <p style="font-size: 11pt; margin-top:0.5%" class="text-muted"><span id="{{ $q['_id'] }}_count"></span> Jawaban</p>

                                                            </div>
                                                        </div>

                                                        <div class="row d-none">
                                                            <div class="col-md-12 px-0">

                                                                <div class="list-group mb-2" id="{{ $q['_id'] }}">

                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @endif
                                    @endforeach

                                </div>

                            </div>
                        </div>
                    </div> --}}


                    <div class="tab-pane active show" id="jawaban">

                        @foreach ($quiz['Questions'] as $q)

                        @if($q['type'] == 'radio')
                        <div class="row row-cards">
                            <div class="col-md-12 col-xl-12">

                                <div class="card" style="margin-top: 1.3%;">
                                    <div class="card-body py-1 px-2">

                                        <div class="row">
                                            <div class="col-md-6 border_tes">
                                                <div class="col-md-12">

                                                    <textarea disabled style="padding-bottom:1.5%; font-size-12pt;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)" name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan">{{ $q['question'] }}</textarea>

                                                    <div class="group_opsi radio mt-2" {!! $q['type']=='radio' ? $show : $hide !!}>
                                                        <div style="" class="col-sm-12">

                                                            @if($q['type']=='radio')
                                                            <div class="hasil_addbtn1 pilihan-ganda">
                                                                @foreach ($q['option'] as $o)
                                                                <div class="form-check hapusOption jawa">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input class="form-check-input jawaban opsi_jawaban jawaban auto_input_textarea" type="radio" name="add_input_dinamis[]" value="{{ $o['option'] }}" />
                                                                            <textarea disabled oninput="Teks($(this)); auto_grow_options(this)" placeholder="Opsi Jawaban" class="remove_textarea_option_jawaban auto_input color_active">{!! $o['option'] !!}</textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6 border_tes">
                                                <div class="d-flex justify-content-center">
                                                    <div id="{{ $q['_id'] }}"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        @elseif($q['type'] == 'checkbox')
                        <div class="row row-cards mt-1">
                            <div class="col-md-12 col-xl-12">

                                <div class="card">
                                    <div class="card-body py-1 px-2">

                                        <div class="row">
                                            <div class="col-md-6 border_tes">
                                                <div class="col-md-12">

                                                    <textarea disabled style="padding-bottom:1.5%; font-size-12pt;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)" name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan">{{ $q['question'] }}</textarea>

                                                    <div class="group_opsi checkbox mt-2" {!! $q['type']=='checkbox' ? $show : $hide !!}>
                                                        <div style="" class="col-sm-12">

                                                            @if($q['type']=='checkbox')
                                                            <div class="hasil_mulcen">
                                                                @foreach ($q['option'] as $o)
                                                                <div class="form-check hapusOption">
                                                                    <div class="row">
                                                                        <div class="col-md-12"><input class="form-check-input jawaban auto_input_textarea" type="checkbox" name="add_input_dinamis[]" value="{{ $o['option'] }}" /><textarea disabled class="remove_textarea_option_jawaban color_active" oninput="Teks($(this)); auto_grow_options(this)">{{ $o['option'] }}</textarea>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6 border_tes">

                                                <div class="d-flex flex-column flex-grow-1">
                                                    <div id="{{ $q['_id'] }}"></div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        @elseif($q['type'] == 'textarea')
                        <div class="row row-cards mt-1">
                            <div class="col-md-12 col-xl-12">


                                <div class="card">
                                    <div class="card-body py-1 px-2">

                                        <div class="row">
                                            <div class="col-md-6 border_tes">
                                                <div class="col-md-12 ">

                                                    <textarea disabled style="padding-bottom:1.5%; font-size-12pt;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)" name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan">{{ $q['question'] }}</textarea>

                                                </div>

                                            </div>



                                            <div class="col-md-6 border_tes">

                                                <div class="row" id="{{ $q['_id'] }}">
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                        @elseif($q['type'] == 'file')
                        <div class="row row-cards mt-1 mb-1">
                            <div class="col-md-12 col-xl-12">


                                <div class="card">
                                    <div class="card-body  py-1 px-2">

                                        <div class="row">
                                            <div class="col-md-6 border_tes">

                                                <textarea disabled style="padding-bottom:1.5%; font-size-12pt;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)" name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan">{{ $q['question'] }}</textarea>

                                            </div>


                                            <div class="col-md-6 border_tes">

                                                <div class="row">
                                                    <div class="col-md-12">

                                                        <div class="list-group py-1" id="{{ $q['_id'] }}"></div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>

                    <div class="tab-pane" id="individual">
                        <div>
                            Untuk Individual Lorem ipsum dolor, sit amet consectetur adipisicing elit. Optio aspernatur incidunt exercitationem? Est, soluta eligendi facilis explicabo nesciunt sit a accusantium ad! Molestiae iure pariatur ex, delectus quisquam et atque.
                        </div>
                    </div>

                </div>
            </div>


        </div>

    </div>
</div>

<script>
    let response = {!! json_encode($response) !!}
    let quiz;
    let count= 0
    let total;
    let data = [];

    //counting answer function
    const count_answer = (options) =>{
        let tmp;
        //Reset Variable
        data = []
        tmp = [];
        count = 0

        //Looping Options with Counting
        if (options.type == 'radio' || options.type == 'checkbox') {
            options.option.forEach(function(option){
                total = response.map(v => v.answer.filter(w => w.id_question == options._id).filter(x => x.answer.includes(option.option)).length).reduce((v,a) => v+a,0)
                data.push([option.option,total])
                // console.log({question: options.question, option : option.option, total : total})
                count += total
            })
        }else{
            tmp = response.map(v => v.answer.filter(w => w.id_question == options._id))
            total = response.map(v => v.answer.filter(w => w.id_question == options._id).length).reduce((v,a) => v+a,0)
            // console.log({id: options._id, data: tmp})
            tmp.forEach(function(option){
                if (option.length != 0) {
                    data.push(option[0].answer[0])
                }
                // console.log({question: options.question, option : option[0].answer, total : total})
            })
            count += total
        }

        //Text Count Question
        $(`#${options._id}_count`).text(count)

        //count percentage
        if (options.type == 'radio') {
            data.forEach(function(val, index){
                data[index][1] = ((val[1]/count)*100)
            })
        }

    }
    @foreach ($quiz['Questions'] as $q)
        //get response
        quiz = {!! json_encode($q) !!}

        if (quiz.type == 'radio') {

            //counting answer
            count_answer(quiz)

            //Pie Chart
            Highcharts.chart(quiz._id, {
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
                                return `${this.percentage.toFixed(2)} %`;
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
                        // return '<div style="text-align: left; width:130px;float:left;">' + this.name + '</div><div style="width:80px; float:left;text-align:right;">' + this.y + '%</div>';
                        return '<div class="d-inline-flex">' + this.name + '<div style="width:30px; float:left;text-align:right;">' + this.y + '%</div></div>';
                    }
                }
                , series: [{
                    type: 'pie'
                    , dataLabels: {

                    }
                    , data: data
                    ,name: 'Jumlah'
                }]
            , });
        }else if(quiz.type == 'checkbox'){

            //counting answer
            count_answer(quiz)

            //Bar Chart
            Highcharts.chart(quiz._id, {

                chart: {
                    type: 'bar'
                    , marginLeft: 70
                }
                , title: {
                    // text: 'Jawaban Data Checkbox '+quiz.question
                    text: ''
                    , y: 23
                }
                , xAxis: {
                    type: 'category'
                    , title: {
                        text: null
                    }
                    , scrollbar: {
                        enabled: true
                    }
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
                    , data: data
                }]
            });
        }else if(quiz.type == 'textarea'){

            //counting answer
            count_answer(quiz)

            //Append Html Element
            let html = '';
            data.forEach(function(val){
                html += `
                <div class="col-md-12 py-1">
                <input type="text" class="form-control" name="text_jawaban" placeholder="Readonly"
                    value="${val}" readonly="">
                </div>
                `
            })
            $(`#${quiz._id}`).append(html)
        }else if (quiz.type == 'file') {

            //counting answer
            count_answer(quiz)

            //Append Html Element
            let html = '';
            data.forEach(function(val){
                html += `
                <a href="/kuesioner/${val}" style="color: #000; background-color: #f1f5f9;" type="button"
                    class="list-group-item px-2">

                <svg xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-photo" width="24" height="24"
                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="15" y1="8" x2="15.01" y2="8"></line>
                        <rect x="4" y="4" width="16" height="16" rx="3"></rect>
                        <path d="M4 15l4 -4a3 5 0 0 1 3 0l5 5"></path>
                        <path d="M14 14l1 -1a3 5 0 0 1 3 0l2 2"></path>
                    </svg>
                    ${val}</a>

                `
            })
            $(`#${quiz._id}`).append(html)
        }
    @endforeach


    // disable radio
    $(':radio:not(:checked)').attr('disabled', true);
    $(':checkbox:not(:checked)').attr('disabled', true);


</script>

@endsection
