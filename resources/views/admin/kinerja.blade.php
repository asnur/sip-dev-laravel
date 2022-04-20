@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';
@endphp

<style>
    /* .dataTables_filter {
        margin-top: -1.2rem;
    } */

    .dataTables_length {
        display: none;
    }

    .dataTables_filter {
        display: none;
    }

    .cusotm_lazyload_konten {
        margin-top: -2.3rem;
    }

</style>

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">

                    <div style="display: none;" class="lazy_name_kinerja">
                        Rekap Input
                    </div>

                    <div class="hide_lazyload_kinerja">
                        <div style="width: 11.1rem; height:1.8rem; border-radius:2px position: relative;" class="skeleton-image"></div>
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



                    <div class="card-header">
                        <h3 class="card-title">

                            <div style="display: none;" class="lazy_name_kinerja">
                                Rekap Input AJIB
                            </div>

                            <div class="hide_lazyload_kinerja">
                                <div style="width: 10rem; height:1.8rem; border-radius:2px position: relative;" class="skeleton-image"></div>
                            </div>

                        </h3>



                        <div style="display: none; position:absolute; margin-left:51.8rem;" class="lazy_name_kinerja">
                            <a style="border-style:none;" href="/admin/Ekspor-Kinerja" target="_blank" id="PrintKinerja" class="btn w-10">

                                <!-- Download SVG icon from http://tabler-icons.io/i/rss -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-printer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2"></path>
                                    <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4"></path>
                                    <rect x="7" y="13" width="10" height="8" rx="2"></rect>
                                </svg>
                                Cetak PDF
                            </a>

                        </div>

                        <div class="hide_lazyload_kinerja">
                            <div style="width: 8.5rem; height:1.8rem; border-radius:2px; position: relative; left:41rem;" class="skeleton-image"></div>
                        </div>



                        <div style="position: relative; left:-9rem;" class="card-actions w-25">


                            <div style="display: none;" class="lazy_name_kinerja">
                                <select class="form-select" id="selectOption" disabled>


                                    {{-- <option value="Semua">Semua</option> --}}

                                    @foreach($kelurahan as $kel)
                                    <option selected value="{{ $kel[0]->kelurahan }}">{{ $kel[0]->kelurahan }}</option>
                                    @endforeach


                                </select>

                                {{-- <input type="text" id="getKec"> --}}

                            </div>

                            <div class="hide_lazyload_kinerja">
                                <div style="width: 15rem; height:1.8rem; border-radius:2px position: relative;" class="skeleton-image"></div>
                            </div>


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

                        <div class="d-flex justify-content-between">

                            <div class="col-md-6">
                                <div class="hide_lazyload_kinerja">
                                    <div style="width: 10rem; height:1.8rem; border-radius:2px position: relative;" class="skeleton-image"></div>
                                </div>
                            </div>

                            <div class="col-md-6 ">
                                <div class="hide_lazyload_kinerja">
                                    <div style="width: 12.7rem; height:1.8rem; position: relative; left:17rem;" class="skeleton-image"></div>
                                </div>
                            </div>

                        </div>


                        <table class="table table-hover data-kinerja" style="margin-top: 1rem !important;">
                            <thead>
                                <tr>

                                    <th width="8%">

                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Lokasi
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="5%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Kelurahan
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="5%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Kategori
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="13%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Deskripsi
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="13%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Permasalahan
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="10%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Solusi
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                    <th width="10%">
                                        <div style="display: none;" class="lazy_name_kinerja">
                                            Foto
                                        </div>

                                        <div class="hide_lazyload_kinerja">
                                            <div class='skeleton-line'></div>
                                        </div>
                                    </th>

                                </tr>
                            </thead>
                            <tfoot>
                                @php
                                for ($x = 0; $x <= 9; $x++) { echo"<tr class='hide_lazyload_kinerja'>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
                                    </td>
                                    <td>
                                        <div class='skeleton-line cusotm_lazyload_konten'></div>
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
                $(".lazy_name_kinerja").show();
                $(".dataTables_length").show();
                $(".dataTables_filter").show();
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
