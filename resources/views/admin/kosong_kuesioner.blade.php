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



<div class="container-xl">
    <!-- Page title -->
    <div class="page-header d-print-none">
        <div class="row g-2 align-items-center">
            <div class="col">
                <h2 class="page-title">

                    <div class="">
                        Kuesioner

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

                    <div class="empty">
                        <div class="empty-img"><img src="{{ asset('assets/admin/img/kuesioner_kosong.png') }}" height="128" alt="">

                        </div>
                        <p class="empty-title">Kuesioner Belum Ada</p>
                        {{-- <p class="empty-subtitle text-muted">
                            Silahkan membuat kuesioner terlebih dahulu
                        </p> --}}
                        <div class="empty-action">
                            <a href="{{ route('tambah_kuesioner') }}" class="btn btn-primary">
                                Buat Kuesioner
                            </a>
                        </div>
                    </div>

                    {{-- <div class="card-header">
                        <h3 class="card-title">

                            <div class="">
                                Pertanyaan Kuesioner
                            </div>

                        </h3>

                    </div> --}}



                    <div class="card-body">

                        <div class="container">

                        </div>

                    </div>



                </div>
            </div>
        </div>


    </div>
</div>





@endsection
