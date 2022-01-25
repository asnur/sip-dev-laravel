@extends('layouts.template_admin')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Hak Akses</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
                    class="fas fa-plus fa-sm text-white-50"></i> Tambah Hak Akses</a>
        </div>

        <!-- Content Row -->


        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-sm-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Data Hak Akses</h6>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <table class="table table-striped" id="table-surveyer">
                            <thead>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <td>Admin</td>
                                <td><a class="btn btn-sm btn-danger"><i class="fa fa-trash">
                                            <d /i></a></td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
