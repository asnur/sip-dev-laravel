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
                                <div class="col-md-6 border border-primary">Lorem ipsum dolor sit, amet adipisicing elit. Doloremque reiciendis porro !</div>
                                <div class="col-md-6 border border-primary">Lorem ipsum dolor sit amet adipisicing elit. Quam consectetur enim necessitatibus </div>
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
                                <div class="col-md-6 border border-primary">Lorem ipsum dolor sit, amet adipisicing elit. Doloremque reiciendis porro !</div>
                                <div class="col-md-6 border border-primary">Lorem ipsum dolor sit amet adipisicing elit. Quam consectetur enim necessitatibus </div>
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





@endsection
