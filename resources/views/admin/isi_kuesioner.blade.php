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
                        Isi Kuesioner
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

            <div class="col-12">
                <!-- Cards with tabs component -->
                <div class="card-tabs ">
                    <!-- Cards navigation -->

                    <ul class="nav nav-tabs">
                        <li class="nav-item"><a href="#tab-top-1" class="nav-link active" data-bs-toggle="tab">Pendidikan</a></li>
                        {{-- <li class="nav-item"><a href="#tab-top-2" class="nav-link" data-bs-toggle="tab">Keluarga</a></li>
                        <li class="nav-item"><a href="#tab-top-3" class="nav-link" data-bs-toggle="tab">Kesehatan</a></li> --}}
                    </ul>
                    <div class="tab-content">
                        <!-- Content of card #1 -->
                        <div id="tab-top-1" class="card tab-pane active show">

                            <div class="card-body">
                                <div class="card-title text-center">Kuesioner 1</div>
                                <form>


                                    <div class="form-group  mb-3 inputDinamis">
                                        <fieldset class="form-group">
                                            <div class="row">
                                                <legend class="col-form-label col-sm-2 pt-0">Pendidikan</legend>
                                                <div class="col-sm-10">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option1">
                                                        <label class="form-check-label">
                                                            SD
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                        <label class="form-check-label">
                                                            SMP
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                        <label class="form-check-label">
                                                            SMA/SEDERAJAT
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="gridRadios" value="option2">
                                                        <label class="form-check-label">
                                                            S1
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>

                                    </div>

                                    <div class="form-group  mb-3 inputDinamis">
                                        <label class="form-label">Nama</label>

                                        <div class="input-group">
                                            <input type="text" name="name[]" class="form-control" placeholder="Ketikan Nama Lengkap" />
                                            <div class="input-group-addon">
                                                <a href="javascript:void(0)" class="btn btn-success addInputDinamis"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                            </div>
                                        </div>
                                    </div>


                                    <!-- copy of input fields group -->
                                    <div class="form-group copyInputDinamis" style="display: none; margin-top:10px;">

                                        <label class="form-label">Nama</label>

                                        <div class="input-group">
                                            <input type="text" name="name[]" class="form-control" placeholder="Enter name" />
                                            <div class="input-group-addon">
                                                <a href="javascript:void(0)" class="btn btn-danger deleteDinamis"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-footer">
                                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
                                        <a href="{{ route('list_kuesioner') }}" class="btn btn-primary">
                                            Simpan
                                        </a>

                                    </div>

                                </form>
                            </div>


                        </div>
                        <!-- Content of card #2 -->
                        <div id="tab-top-2" class="card tab-pane">
                            <div class="card-body">
                                <div class="card-title">Pertanyaan Kuesioner</div>


                            </div>
                        </div>
                        <!-- Content of card #3 -->
                        <div id="tab-top-3" class="card tab-pane">
                            <div class="card-body">
                                <div class="card-title">Content of tab #3</div>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, alias aliquid distinctio dolorem expedita, fugiat hic magni molestiae molestias odit.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>



    </div>
</div>





@endsection
