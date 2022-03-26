@extends('layouts.template_admin')
@section('content')

@php
$Roles = '';
@endphp

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

                        <div class="card-actions w-25">
                            <select class="form-select" id="selectOption">

                                <option value=""></option>

                                {{-- <option value="Kecamatan">Kecamatan</option>
                                <option value="UMKM">UMKM</option>
                                <option value="RTH">RTH</option>
                                <option value="ANGKEH">ANGKEH</option>
                                <option value="MERUYA UTARA">MERUYA UTARA</option> --}}

                                @foreach($kelurahan as $kel)
                                <option value="{{ $kel->kelurahan }}">{{ $kel->kelurahan }}</option>
                                @endforeach

                            </select>

                            {{-- <input type="text" id="getKec"> --}}

                        </div>


                    </div>




                    <div class="card-body">
                        <table class="table table-hover data-kinerja">
                            <thead>
                                <tr>
                                    <th>Nama Tempat</th>
                                    <th>Kelurahan</th>
                                    <th>Foto</th>
                                    <th>Kategori</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="hide_lazyload_kinerja">
                                    <th>
                                        <div class="skeleton-line"></div>
                                    </th>
                                    <th>
                                        <div class="skeleton-line"></div>
                                    </th>
                                    <th>
                                        <div class="skeleton-line"></div>
                                    </th>
                                    <th>
                                        <div class="skeleton-line"></div>
                                    </th>
                                </tr>
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

            dom: 'lBfrtip'
            , buttons: [{
                    extend: 'pdf'
                    , filename: $fileName
                    , title: $fileTitle,
                }
                // , {
                // extend: 'excel'
                // , filename: $fileName
                // }


            ],



            // Tampil Data Per pagination
            "lengthMenu": [
                [10, 25, 50, 100, 1000, -1]
                , ['10 rows', '25 rows', '50 rows', '100 rows', '1000 rows', 'All']
            ],


            // cetak table
            columns: [{
                    data: 'judul'
                    , name: 'judul'
                }
                , {
                    data: 'kelurahan'
                    , name: 'kelurahan'
                }

                , {
                    data: 'foto'
                    , name: 'foto'
                    , sortable: false
                    , searchable: false
                },

                {
                    data: 'kategori'
                    , name: 'kategori'
                }
            , ],

            // Set Asc or Desc Field Table
            columnDefs: [{
                    orderSequence: ["asc", "desc"]
                    , targets: [0]
                , }
                , {
                    orderSequence: ["asc", "desc"]
                    , targets: [1]
                , }
                , {
                    orderSequence: ["desc", "asc"]
                    , targets: [2]
                , }
            , ],


        });



    });

</script>




@endsection
