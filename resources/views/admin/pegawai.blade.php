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
                    Pegawai AJIB
                </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-12 col-md-auto ms-auto d-print-none">
                <div class="btn-list">
                    <button class="btn btn-primary d-none d-sm-inline-block" onclick="create()">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                        Tambah Pegawai
                    </button>
                    {{-- <a href="#" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                        <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="12" y1="5" x2="12" y2="19"></line>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                        </svg>
                    </a> --}}
                </div>
            </div>
        </div>
    </div>

    {{-- modal add --}}
    <form action="{{ route('add-pegawai') }}" method="POST">
        @csrf
        <div class="modal modal-blur fade" id="modalAddUsers" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalEditAddLabel">

            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditAddLabel"></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="add_page">
                            <div class="row">
                                <div class="col-md-12 col-xl-12">

                                    <div class="mb-3">
                                        <label class="form-label">Nama</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukan Nama User">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Masukan Email User">

                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password User">

                                    </div>

                                    <div class="mb-3">
                                        <div class="form-label">Penempatan</div>
                                        <select class="form-select" name="penempatan" required>

                                            <option value="" disabled="">Pilih Kecamatan...</option>
                                            @foreach ($kecamatan as $kec)
                                            <option value="{{ $kec }}">{{ $kec }}</option>
                                            @endforeach

                                        </select>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn me-auto btn-primary" data-bs-dismiss="modal" onclick="add_modal()">Kirim</button>
                        <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>


            </div>
        </div>
    </form>


    {{-- modal update --}}
    <form action="{{ route('update-pegawai') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="modal modal-blur fade" id="modalEditUsers" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="modalEditUserLabel">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditUserLabel">Edit Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-xl-12">

                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="hidden" class="form-control" name="id" id="idUser">
                                    <input type="text" class="form-control" name="name" id="namaUser" placeholder="Masukan Nama User">
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input class="form-control" name="email" type="email" placeholder="Masukan Email User" id="emailUser">
                                </div>

                                <div class="mb-3">
                                    <div class="form-label">Penempatan</div>
                                    <select class="form-select" name="penempatan" required>

                                        <option id="penempatanUser"></option>

                                        @foreach ($kecamatan as $kec)
                                        <option value="{{ $kec }}">{{ $kec }}</option>
                                        @endforeach

                                    </select>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn me-auto btn-primary" data-bs-dismiss="modal">Kirim</button>
                        <button type="button" class="btn" data-bs-dismiss="modal">Batal</button>
                    </div>
                </div>


            </div>


        </div>
    </form>




</div>

<div class="page-body">
    <div class="container-xl">
        <!-- konten disini -->

        <div class="row row-cards">
            <div class="col-md-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar Pegawai AJIB</h3>
                    </div>


                    <div class="card-body">
                        <table class="table table-hover data-pegawai" style="margin-top: 1rem !important;">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Role</th>
                                    <th>Penempatan</th>
                                    <th>Aksi</th>
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
    // tampil modal add
    function create() {
        $.get("{{ url('admin/pegawaiAjib') }}", {}, function(data, status) {
            $("#modalEditAddLabel").html('Tambah Pegawai');

            $("#add_page").html(data);

            $("#modalAddUsers").modal('show');

        });
    }

    // proses modal add
    function add_modal() {
        var name = $("#name").val();
        $.ajax({
            type: "post"
            , url: "{{ url('admin/pegawaiAjib') }}"
            , dataType: 'json'
                // , data: "name" + name
            , success: function(data) {
                $(".btn-close").click();
            }
        , });
    }




    $(document).ready(function() {

        // $(function() {

        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });


        var table = $('.data-pegawai').DataTable({

            "drawCallback": function(settings) {
                $(".hide_lazyload_kinerja").hide();
            },

            ordering: true
            , order: [
                [0, "asc"]
            ]
            , processing: true
            , serverSide: true
            , "deferRender": true
                // , "language": {
                //     processing: '<div class="loader_lazy_load"></div>'
                // }
            , ajax: "{{ url('/admin/pegawaiAjib') }}"
            , columns: [{
                    data: 'name'
                    , name: 'name'
                }
                , {
                    data: 'email'
                    , name: 'email'
                },

                {
                    data: 'roles'
                    , name: 'roles'
                },

                {
                    data: 'penempatan'
                    , name: 'penempatan'
                },

                {
                    data: 'aksi'
                    , name: 'aksi'
                }
            , ]
            , columnDefs: [{
                    orderSequence: ["asc", "desc"]
                    , targets: [0]
                , }
                , {
                    orderSequence: ["asc", "desc"]
                    , targets: [1]
                , }
                , {
                    orderSequence: ["asc", "desc"]
                    , targets: [2]
                , }
                , {
                    orderSequence: ["asc", "desc"]
                    , targets: [3]
                , }
            , ]
        , });


    });

</script>


@endsection
