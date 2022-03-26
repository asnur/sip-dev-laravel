@extends('layouts.template_admin')
@section('content')

<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">
                    Rekap
                </h2>
            </div>

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

                        <div class="card-actions">
                            <select class="form-select" id="selectSurveyer" tabindex="-1">
                                <option value="0">Semua Rekap Input</option>
                                @foreach ($pegawai_ajib as $pa)
                                <option value="{{ $pa->id }}">{{ $pa->name }}</option>
                                @endforeach
                            </select>

                        </div>


                    </div>


                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-vcenter card-table table-striped" id="tableKinerja">
                                <thead>
                                    <tr>
                                        <th>Nama Tempat</th>
                                        <th>Foto</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody id="dataSurvey">
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>


@endsection
