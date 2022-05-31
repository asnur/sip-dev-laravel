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

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Daftar List Kuesioner</h3>
                        </div>
                        <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="{{ route('isi_kuesioner') }}" class="text-body d-block">Kuesioner 1</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>

                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25" src="{{ asset('assets/admin/img/list_kuesioner.png') }}" alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="#" class="text-body d-block">Kuesioner 2</a>
                                        <div class="text-muted text-truncate mt-n1">Rabu, 14 April 2022</div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>



                    {{--
                    <div class="card-body">


                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('isi_kuesioner') }}">Kuesioner 1</a></li>
                    <li class="list-group-item"><a href="{{ route('isi_kuesioner') }}">Kuesioner 2</a></li>
                    <li class="list-group-item"><a href="">Kuesioner 3</a></li>
                    <li class="list-group-item"><a href="">Kuesioner 4</a></li>
                    <li class="list-group-item"><a href="">Kuesioner 5</a></li>
                    </ul>



                </div> --}}



            </div>
        </div>
    </div>


</div>
</div>





@endsection
