@extends('layouts.app')

@section('content')


<video class="bg_video" autoplay loop muted>
    <source src="{{ asset('assets/login/bg_video.mp4') }}" type="video/mp4" />
</video>

<div class="container-fluid">
    <div class="d-flex justify-content-end">
        <div class="d-flex flex-row mr-3">
            <div class="p-1 konten_toggle_login" style="display: none">
                <div class="HideShow letak">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="row konten text-center">
                            <!-- konten kiri -->
                            <div class="col-md-4 text-center isi_konten">
                                <span class=""><img style="width: 65%" src="{{ asset('assets/login/logo_jakpintas.png') }}" alt="" /></span>
                            </div>

                            <!-- konten kanan -->
                            <div class="col-md-8 col-xs-12 col-sm-12 login" style="padding-top: 0.8em; padding-bottom: 0.8em">
                                <form>
                                    <div class="form-group mt-1">
                                        <input type="email" class="form-control" id="email" placeholder="Email" style="font-size: 9pt" />
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="password" placeholder="Password" style="font-size: 9pt" />
                                    </div>

                                    <div class="">
                                        <button type="submit" class="btn btn-primary btn-block" style="font-size: 9pt">
                                            Login
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center text-muted mt-2" style="font-size: 9pt">
                                    atau
                                </div>

                                <div class="">
                                    <a href="{{ route('login-google') }}"
                                        class="btn custom_btn_masuk mt-2 mb-1 btn-light login_with">
                                        <img alt="Logo" style="width: 13%; margin-right: 1% !important;"
                                        src="{{ asset('assets/login/google_logo.png') }}"
                                        class="img-fluid me-3" />
                                        <span style="font-size: 9pt; font-weight:400; color:#000">Login dengan Gmail</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mr-4">
                <button id="btn_toggle_login" type="button" class="btn btn-sm custom_btn_login get_cursor bg-transparent">
                    <span style="font-size: 9pt">Login</span>
                </button>
            </div>
        </div>
    </div>
</div>


@endsection
