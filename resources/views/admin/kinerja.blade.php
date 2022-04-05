@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';
@endphp

<style>
    /* .dataTables_filter {
        margin-top: -1.2rem;
    } */

</style>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Rekap
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



                    <div class="card-header">
                        <h3 class="card-title">Rekap Input AJIB</h3>


                        <a style="margin-left: 52%;" href="/admin/Ekspor-Kinerja" target="_blank" id="PrintKinerja" class="btn w-5">

                            <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <rect x="7" y="13" width="10" height="8" rx="2"></rect>
                            </svg>
                            PDF
                        </a>



                        <div class="card-actions w-25">

                            <select class="form-select" id="selectOption" disabled>

                                {{-- <option value="Semua">Semua</option> --}}

                                @foreach($kelurahan as $kel)
                                <option value="{{ $kel->kelurahan }}">{{ $kel->kelurahan }}</option>
                                @endforeach

                            </select>

                            {{-- <input type="text" id="getKec"> --}}

                        </div>



                    </div>

                    {{-- <div class="col-md-2 ml-1 mt-1">
                        <a href="/admin/kinerja" target="_blank" id="PrintKinerja" class="btn w-50">
                            <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                <rect x="7" y="13" width="10" height="8" rx="2"></rect>
                            </svg>
                            PDF
                        </a>
                    </div> --}}




                    <div class="card-body">
                        <table class="table table-hover data-kinerja" style="margin-top: 1rem !important;">
                            <thead>
                                <tr>
                                    <th width="8%">Lokasi</th>
                                    <th width="5%">Kelurahan</th>
                                    <th width="5%">Kategori</th>
                                    <th width="13%">Deskripsi</th>
                                    <th width="13%">Permasalahan</th>
                                    <th width="10%">Solusi</th>
                                    <th width="10%">Foto</th>

                                </tr>
                            </thead>
                            <tfoot>
                                @php
                                for ($x = 0; $x <= 9; $x++) { echo"<tr class='hide_lazyload_kinerja'>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-image'></div>
                                    </td>

                                    </tr>";
                                    }
                                    @endphp
                            </tfoot>

                        </table>

                    </div>



                </div>
            </div>
        </div>


    </div>
</div>





<script>
    var $fileName = 'Data Export Rekap';


    document.getElementById("selectOption").onchange = function() {
        $hasil = document.getElementById("selectOption").value;
        // document.getElementById("getKec").value = hasil;
    };

    // console.log(hasil);



    var $fileTitle = 'Data Rekap Input'.$hasil;




    $(document).ready(function() {


        $('.data-kinerja').DataTable({

            ordering: true
            , processing: false
            , serverSide: true
            , order: [
                [0, "asc"]
            ]
            , ajax: "{{ url('/admin/kinerjaData') }}"
            , "deferRender": true
            , "responsive": true

                // atur lazy load bawaan
                // , "language": {
                // processing: '<div class="loader_lazy_load"></div>'
                // }

                //Lazd load custom
            , "drawCallback": function(settings) {

                $("#selectOption").attr("disabled", false);

                $(".hide_lazyload_kinerja").hide();
            },

            // dom: 'Bfrtip'
            // , buttons: [{
            // text: 'pdf'
            // , extend: 'pdfHtml5'
            // , filename: $fileName
            // , text: 'Data Export Rekap'
            // , orientation: 'potrait'
            // , pageSize: 'Legal'
            // , }],


            // Button default datatables
            // dom: 'lBfrtip',
            // buttons: [{
            //         extend: 'pdf'
            //         , filename: $fileName
            //         , title: $fileTitle
            //     ,
            // }

            // ,{
            // extend: 'excel'
            // , filename: $fileName
            // }

            // ],



            // Tampil Data Per pagination
            "lengthMenu": [
                [10, 25, 50, 100, 1000, -1]
                , ['10 rows', '25 rows', '50 rows', '100 rows', '1000 rows', 'All']
            ],


            // cetak table
            columns: [
                // {
                //     data: 'judul'
                //     , name: 'judul'
                // }
                // ,
                // {
                //     data: 'kelurahan'
                //     , name: 'kelurahan'
                // }
                // ,



                {
                    data: 'judul'
                    , name: 'judul'
                },

                {
                    data: 'kelurahan'
                    , name: 'kelurahan'
                },


                {
                    data: 'kategori'
                    , name: 'kategori'
                },

                {
                    data: 'catatan'
                    , name: 'catatan'
                },

                {
                    data: 'permasalahan'
                    , name: 'permasalahan'
                },

                {
                    data: 'solusi'
                    , name: 'solusi'
                }

                , {
                    data: 'foto'
                    , name: 'foto'
                    , sortable: false
                    , searchable: false
                }
            , ],

            // Set Asc or Desc Field Table
            columnDefs: [{
                    orderSequence: ["asc", "desc"]
                    , targets: [0]
                        // , "visible": false
                , }
                , {
                    orderSequence: ["asc", "desc"]
                    , targets: [1]
                , }
                , {
                    orderSequence: ["desc", "asc"]
                    , targets: [3]
                , }
                , {
                    orderSequence: ["desc", "asc"]
                    , targets: [4]
                , }
                , {
                    orderSequence: ["desc", "asc"]
                    , targets: [5]
                , }
                , {
                    orderSequence: ["desc", "asc"]
                    , targets: [6]
                , },

            ],


        });



    });

</script>




@endsection
