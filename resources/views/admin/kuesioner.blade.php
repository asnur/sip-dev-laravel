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



                    {{-- <div class="card-header">
                        <h3 class="card-title">

                            <div class="">
                                Pertanyaan Kuesioner
                            </div>

                        </h3>

                    </div> --}}



                    <div class="card-body">


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('tambah_kuesioner') }}">Kuesioner 1</a></li>
                            <li class="list-group-item"><a href="{{ route('kosong_kuesioner') }}">Kuesioner 2</a></li>
                            <li class="list-group-item"><a href="">Kuesioner 3</a></li>
                            <li class="list-group-item"><a href="">Kuesioner 4</a></li>
                            <li class="list-group-item"><a href="">Kuesioner 5</a></li>
                        </ul>



                    </div>



                </div>
            </div>
        </div>


    </div>
</div>





@endsection
