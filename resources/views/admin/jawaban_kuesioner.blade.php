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
        @foreach ($quiz['Questions'] as $q)

        {{-- Question Radio Type --}}
        @if($q['type'] == 'radio')
        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">{{ $q['question'] }}</span><br>
                                        <span style="font-size: 9pt" class="text-muted"><span
                                                id="{{ $q['_id'] }}_count"></span> Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row mb-1">
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

        {{-- Question Checkbox Type --}}
        @elseif($q['type'] == 'checkbox')
        <div class="row row-cards py-4">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">{{ $q['question'] }}</span><br>
                                        <span style="font-size: 9pt" class="text-muted"><span
                                                id="{{ $q['_id'] }}_count"></span>
                                            Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 border border-primary">
                                    {{-- <div id="quiz_checkbox_jawaban"></div> --}}

                                    <div style=" height: 400px; margin: 0 auto;" id="{{ $q['_id'] }}"></div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Question Textarea Type --}}
        @elseif($q['type'] == 'textarea')
        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="lh-base">
                                        <span class="h4">{{ $q['question'] }}</span><br>
                                        <span style="font-size: 9pt" class="text-muted"><span
                                                id="{{ $q['_id'] }}_count"></span> Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row" id="{{ $q['_id'] }}">


                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        {{-- Question File Type --}}
        @elseif($q['type'] == 'file')

        <div class="row row-cards py-4">
            <div class="col-md-12 col-xl-12">

                <div class="card">

                    <div class="card-body">
                        <div class="">
                            <div class="row">
                                <div class="col-md-12">

                                    <p class="lh-base">
                                        <span class="h4">{{ $q['question'] }}</span><br>
                                        <span style="font-size: 9pt" class="text-muted"><span
                                                id="{{ $q['_id'] }}_count"></span> Jawaban</span>
                                    </p>

                                </div>
                            </div>

                            <div class="row">
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
                        return '<div style="text-align: left; width:130px;float:left;">' + this.name + '</div><div style="width:40px; float:left;text-align:right;">' + this.y + '%</div>';
                    }
                }
                , series: [{
                    type: 'pie'
                    , dataLabels: {
        
                    }
                    , data: data
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
                    text: 'Jawaban Data Checkbox '+quiz.question
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
                <div class="col-md-12 p-0 mb-2">
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



</script>





@endsection