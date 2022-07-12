@extends('layouts.template_admin')
@section('content')
    @php
    $Roles = '';
    @endphp




    <div class="container-xl">
        <div class="page-header d-print-none" style="margin-top:0.9rem !important; margin-bottom: 0.5rem !important;">

            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        <div style="margin-left: 1rem;">
                            <h3> Buat Kuesioner</h3>
                        </div>
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body">

        <div class="container-xl">
            <!-- konten disini -->

            <div class="row row-cards">

                <div class="col-12">
                    <div class="card-tabs ">
                        <div class="card-body" style="margin-top:-7%;">

                            {{-- <textarea placeholder="Ketik pertanyaan" class="remove_border_textarea_pertanyaan mt-4" oninput="auto_grow_textarea(this)" name="example-textarea-input" rows="1"></textarea>

                        <textarea oninput="Teks($(this))" oninput="auto_grow_textarea(this)" placeholder="Opsi Jawaban" class="remove_textarea_option"></textarea> --}}

                            <form method="post" action="#" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-11">
                                        <div class="card my-4 shadow">

                                            <div style="height: 8px;" class="card-status-top bg-blue"></div>

                                            <div class="card-body">
                                                <div class="form-group mt-1 mb-3">

                                                    <div class="row">

                                                        <div style="margin-left:2.1rem;" class="col-md-11">
                                                            <textarea class="remove_textarea_judul" name="judul" rows="1" placeholder="Judul Kuesioner"></textarea>

                                                        </div>

                                                        <div style="margin-left:2.1rem;" class="col-md-11">
                                                            <textarea class="remove_textarea_deskripsi" name="deskripsi" rows="1" placeholder="Deskripsi"></textarea>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="AddGroup color_left" data-container="item1">
                                            <div class="row">

                                                <div class="col-md-11 sebaris_hapus" data-element="saya_get">

                                                    <div id="cardForm" class="card cardForm my-4 shadow">

                                                        {{-- Color Left Pertama --}}
                                                        <div style="width: 8px;" class="item1"></div>

                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <div class="row mt-3">

                                                                    <div style="margin-left:1.5rem;" class="col-md-8 mb-1">

                                                                        <textarea style="padding-left:0.2rem;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)"
                                                                            name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan"></textarea>

                                                                    </div>

                                                                    <div style="margin-left: 2.5rem;" class="col-md-3 mb-1">

                                                                        <select name="opsipertanyaan"
                                                                            class="opsipertanyaan1 change-jawaban hideshowpertanyaan form-control"
                                                                            onchange="hideshow(this); saveJawaban($(this));"
                                                                            data-width="160px">

                                                                            <option style="padding-bottom:10px;"
                                                                                value="radio"
                                                                                data-icon="fa-solid fa-circle-dot fa-lg">
                                                                                Pilihan Ganda</option>

                                                                            <option value="checkbox"
                                                                                data-icon="fa-solid fa-square-check fa-lg">
                                                                                Kotak Centang</option>

                                                                            <option value="textarea"
                                                                                data-icon="fa-solid fa-align-left fa-lg">
                                                                                Teks</option>

                                                                            <option value="file"
                                                                                data-icon="fa-solid fa-image fa-lg">Gambar
                                                                            </option>

                                                                        </select>

                                                                    </div>

                                                                    {{-- Pilihan Ganda --}}
                                                                    <div class="group_opsi radio mt-1">
                                                                        <div style="margin-left: 1.2rem;" class="col-sm-10">

                                                                            <div class="hasil_addbtn1 pilihan-ganda"></div>

                                                                            {{-- ini hanya dihide, semua main fungsi diappend --}}

                                                                            <div
                                                                                class="form-check hapusOption hide_textarea">

                                                                                <div class="row">
                                                                                    <div class="col-md-7">

                                                                                        <input
                                                                                            class="default_opsi_jawaban opsi_jawaban"
                                                                                            type="radio"
                                                                                            name="add_input_dinamis[]" />

                                                                                        <textarea oninput="Teks($(this)); auto_grow_options(this)" id="option" placeholder="Opsi Jawaban"
                                                                                            class="remove_textarea_option option" rows="1"></textarea>

                                                                                    </div>

                                                                                    <div class="col-md-1"
                                                                                        style="position: absolute; margin: 8px 10px 10px 45rem"
                                                                                        ;=""><a href="javascript:void(0)"
                                                                                            id="RemoveButton"><i
                                                                                                style="color: black"
                                                                                                class="material-icons">clear</i></a>
                                                                                    </div>


                                                                                </div>

                                                                            </div>

                                                                            <div class="row left_tambahkan mt-2">
                                                                                <label class="form-check-label">
                                                                                    <span style="color: red;">*</span><a
                                                                                        style="text-decoration:none; cursor: default;"
                                                                                        class="AddButton"
                                                                                        href="javascript:void(0)">
                                                                                        Tambahkan</a>
                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    {{-- Multi Centang --}}
                                                                    <div class="group_opsi checkbox mt-1">
                                                                        <div style="margin-left: 1.2rem;"
                                                                            class="col-sm-10">

                                                                            <div class="hasil_mulcen"></div>

                                                                            {{-- ini hanya dihide, semua main fungsi diappend --}}
                                                                            <div
                                                                                class="form-check hapusOption hide_textarea">
                                                                                <div class="row">

                                                                                    <div class="col-md-7">
                                                                                        <input
                                                                                            class="form-check-input opsi_jawaban"
                                                                                            type="checkbox"
                                                                                            name="add_input_dinamis[]" />

                                                                                        <textarea id="mulcen" placeholder="Opsi Jawaban proses" class="remove_textarea_option txtBox2"></textarea>
                                                                                    </div>

                                                                                    <div class="col-md-1"
                                                                                        style="position: absolute; margin: 8px 10px 10px 45rem"
                                                                                        ;=""><a href="javascript:void(0)"
                                                                                            id="RemoveButton"><i
                                                                                                style="color: black"
                                                                                                class="material-icons">clear</i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="row left_tambahkan mt-2">

                                                                                <label class="form-check-label">
                                                                                    <span style="color: red;">*</span><a
                                                                                        style="text-decoration:none; cursor: default;"
                                                                                        class="MultiCentang"
                                                                                        href="javascript:void(0)">
                                                                                        Tambahkan</a>

                                                                                </label>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    {{-- Teks --}}
                                                                    <div class="group_opsi textarea">
                                                                        <div class="col-sm-10">

                                                                            <div class="form-check"></div>

                                                                            <div class="form-check">
                                                                                <div class="row"
                                                                                    style="margin-top:-1.4rem;">
                                                                                    <div class="col-md-10">

                                                                                        <textarea onkeyup="teksPendek(this)" class="jawaban remove_textarea_option_teks" name="example-textarea-input"
                                                                                            rows="1" placeholder="Jawaban" maxlength="250"></textarea>

                                                                                        <div>
                                                                                            <span
                                                                                                class="hitungawal_text">0</span>
                                                                                            <span class="maximum_text"> /
                                                                                                250</span>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    {{-- Gambar2 --}}
                                                                    <div class="group_opsi file pass">
                                                                        <div class="col-sm-10">

                                                                            <div class="hasil_gambar"></div>

                                                                            <div class="form-check">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <div style="position: absolute;margin-top: 10px; margin-left:0"
                                                                                            class="button_upload_image">
                                                                                            <label for="file-input">
                                                                                                {{-- <i style="margin-top: 14px;margin-left: 12px; color:#000" class="material-icons">image</i> --}}
                                                                                                <img width="35"
                                                                                                    style="margin-top:8px; margin-left:8px;"
                                                                                                    src="{{ asset('assets/admin2/img/upload-image.png') }}"
                                                                                                    alt="">

                                                                                            </label>
                                                                                            <input id="file-input"
                                                                                                type="file"
                                                                                                class="jawaban" />
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-9"></div>


                                                                                </div>
                                                                            </div>


                                                                            {{-- <div class="form-check">
                                                                            <div class="row">
                                                                                <div class="col-md-12">


                                                                                    <div class="upload_box">

                                                                                        <div class="upload_img_wrap"></div>

                                                                                        <div class="upload_btn_box">
                                                                                            <label class="upload_btn">
                                                                                                <p>Upload Gambar</p>
                                                                                                <input type="file" multiple="" data_max_length="20" class="upload_gambar" onchange="ImgUpload($(this))">
                                                                                            </label>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div> --}}

                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                {{-- Button Hapus --}}
                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                        <div class="mt-2"></div>

                                                                        <div class="row">
                                                                            <div class="col-md-11"></div>
                                                                            <div style="margin-left: 47.3rem;"
                                                                                class="col-md-1">
                                                                                <div class="p-2">
                                                                                    <a style="color:#161010;"
                                                                                        href="javascript:void(0)"
                                                                                        class="remove">
                                                                                        <i
                                                                                            class="material-icons">delete</i>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- Button Tambah --}}
                                                <div class="col-md-1 scroll_btn next_btn shadow my-4">

                                                    <div class="card-body">
                                                        <div class="box">

                                                            <div class="child_box"
                                                                style="margin-left: -5px; margin-top:-11px; margin-left:-1rem;">

                                                                <a href="javascript:void(0)" class="addKuesioner">
                                                                    <i style="color: black"
                                                                        class="material-icons">add_circle_outline</i>
                                                                </a>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="GroupCopy" style="display: none;">
                                            <div class="row">
                                                <div class="col-md-11 sebaris_hapus">
                                                    <div class="card cardForm my-4 shadow">

                                                        <div class="color_left_kedua"></div>

                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <div class="row mt-3">

                                                                    <div style="margin-left:1.5rem;"
                                                                        class="col-md-8 mb-1">

                                                                        <textarea style="padding-left:0.2rem;" class="remove_border_textarea_pertanyaan" oninput="auto_grow_textarea(this)"
                                                                            name="example-textarea-input" rows="1" placeholder="Ketik pertanyaan"></textarea>

                                                                    </div>


                                                                    {{-- Dropdown --}}
                                                                    <div style="margin-left: 2.5rem;"
                                                                        class="col-md-2 mb-1">

                                                                        <select name="opsipertanyaan"
                                                                            class="opsipertanyaan2 hideshowpertanyaan form-control change-jawaban"
                                                                            onchange="hideshow(this); saveJawaban($(this));"
                                                                            data-width="160px">

                                                                            <option style="padding-bottom:10px;"
                                                                                value="radio"
                                                                                data-icon="fa-solid fa-circle-dot fa-lg">
                                                                                Pilihan Ganda</option>

                                                                            <option value="checkbox"
                                                                                data-icon="fa-solid fa-square-check fa-lg">
                                                                                Kotak Centang</option>

                                                                            <option value="textarea"
                                                                                data-icon="fa-solid fa-align-left fa-lg">
                                                                                Teks</option>

                                                                            <option value="file"
                                                                                data-icon="fa-solid fa-image fa-lg">Gambar
                                                                            </option>

                                                                        </select>

                                                                    </div>


                                                                    {{-- Pilihan Ganda --}}
                                                                    <div class="group_opsi radio mt-1">
                                                                        <div style="margin-left: 1.2rem;"
                                                                            class="col-sm-10">

                                                                            <div class="hasil_addbtn2 pilihan-ganda"></div>

                                                                            {{-- ini hanya dihide, semua main fungsi diappend --}}

                                                                            <div class="form-check hide_textarea">

                                                                                <div class="row">

                                                                                    <div class="col-md-7">

                                                                                        <input
                                                                                            class="form-check-input default_opsi_jawaban opsi_jawaban"
                                                                                            type="radio"
                                                                                            name="add_input_dinamis2[]" />

                                                                                        <textarea id="option2" placeholder="Opsi Jawaban" class="remove_textarea_option txtBox"></textarea>

                                                                                    </div>

                                                                                    <div class="col-md-1"
                                                                                        style="position: absolute; margin: 8px 10px 10px 45rem"
                                                                                        ;="">
                                                                                        <a href="javascript:void(0)"><i
                                                                                                style="color: black"
                                                                                                class="material-icons">clear</i>
                                                                                        </a>
                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                            <div class="row left_tambahkan mt-2">

                                                                                <label class="form-check-label">
                                                                                    <span style="color: red;">*</span><a
                                                                                        style="text-decoration:none; cursor: default;"
                                                                                        class="AddButton2"
                                                                                        href="javascript:void(0)">
                                                                                        Tambahkan</a>
                                                                                </label>

                                                                            </div>

                                                                        </div>
                                                                    </div>

                                                                    {{-- Multi Centang --}}
                                                                    <div class="group_opsi checkbox mt-1">
                                                                        <div style="margin-left: 1.2rem;"
                                                                            class="col-sm-10">

                                                                            <div class="hasil_mulcen"></div>

                                                                            {{-- ini hanya dihide, semua main fungsi diappend --}}
                                                                            <div
                                                                                class="form-check hapusOption hide_textarea">
                                                                                <div class="row">

                                                                                    <div class="col-md-7">

                                                                                        <input
                                                                                            class="form-check-input opsi_jawaban"
                                                                                            type="checkbox"
                                                                                            name="add_input_dinamis[]" />

                                                                                        <textarea id="mulcen" placeholder="Opsi Jawaban" class="remove_textarea_option txtBox2"></textarea>

                                                                                    </div>

                                                                                    <div class="col-md-1"
                                                                                        style="position: absolute; margin: 8px 10px 10px 45rem;">
                                                                                        <a href="javascript:void(0)"
                                                                                            id="RemoveButton"><i
                                                                                                style="color: black"
                                                                                                class="material-icons">clear</i></a>
                                                                                    </div>

                                                                                </div>
                                                                            </div>


                                                                            <div class="row left_tambahkan mt-2">
                                                                                <label class="form-check-label">
                                                                                    <span style="color: red;">*</span><a
                                                                                        style="text-decoration:none; cursor: default;"
                                                                                        class="MultiCentang"
                                                                                        href="javascript:void(0)">
                                                                                        Tambahkan</a>
                                                                                </label>
                                                                            </div>


                                                                        </div>
                                                                    </div>

                                                                    {{-- Teks --}}
                                                                    <div class="group_opsi textarea">
                                                                        <div class="col-sm-10">

                                                                            <div class="form-check"></div>

                                                                            <div class="form-check">
                                                                                <div class="row"
                                                                                    style="margin-top:-1.4rem;">
                                                                                    <div class="col-md-10">

                                                                                        <textarea onkeyup="teksPendek(this)" class="jawaban remove_textarea_option_teks" name="example-textarea-input"
                                                                                            rows="1" placeholder="Jawaban" maxlength="250"></textarea>

                                                                                        <div>
                                                                                            <span
                                                                                                class="hitungawal_text">0</span>
                                                                                            <span class="maximum_text"> /
                                                                                                250</span>
                                                                                        </div>


                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    {{-- Gambar3 --}}
                                                                    <div class="group_opsi file">
                                                                        <div class="col-sm-10">


                                                                            <div class="form-check">
                                                                                <div class="row">
                                                                                    <div class="col-md-3">
                                                                                        <div style="position: absolute;margin-top: 10px; margin-left:0"
                                                                                            class="button_upload_image">
                                                                                            <label for="file-input">
                                                                                                {{-- <i style="margin-top: 14px;margin-left: 12px; color:#000" class="material-icons">image</i> --}}
                                                                                                <img width="35"
                                                                                                    style="margin-top:8px; margin-left:8px;"
                                                                                                    src="{{ asset('assets/admin2/img/upload-image.png') }}"
                                                                                                    alt="">

                                                                                            </label>
                                                                                            <input class="jawaban"
                                                                                                id="file-input"
                                                                                                type="file" />
                                                                                        </div>
                                                                                    </div>


                                                                                    <div class="col-md-9"></div>
                                                                                </div>
                                                                            </div>


                                                                            {{-- <div class="form-check">
                                                                            <div class="row">
                                                                                <div class="col-md-12">


                                                                                    <div class="upload_box">

                                                                                        <div class="upload_img_wrap"></div>

                                                                                        <div class="upload_btn_box">
                                                                                            <label class="upload_btn">
                                                                                                <p>Upload Gambar</p>
                                                                                                <input type="file" multiple="" data_max_length="20" class="upload_gambar" onchange="ImgUpload($(this))">
                                                                                            </label>
                                                                                        </div>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div> --}}



                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-12">

                                                                        <div class="mt-2"></div>

                                                                        <div class="row">
                                                                            <div class="col-md-11"></div>
                                                                            <div style="margin-left: 47.3rem;"
                                                                                class="col-md-1">
                                                                                <div class="p-2">
                                                                                    <a style="color:#161010;"
                                                                                        href="javascript:void(0)"
                                                                                        class="remove">
                                                                                        <i
                                                                                            class="material-icons">delete</i>
                                                                                    </a>
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

                                        <div class="row" id="cardGenerateLink"
                                            style="margin-top: 2.8%; margin-bottom: 5.2%;display:none;">

                                            <div class="col-md-11">
                                                <div class="card shadow">

                                                    <div class="card-body">
                                                        <div class="form-group mt-2 mb-2">

                                                            <div class="row">

                                                                <div style="margin-left:2.1rem;" class="col-md-11">
                                                                    <div class="input-group">
                                                                        <input type="text" id="generateLink"
                                                                            class="form-control" placeholder="Salin Link"
                                                                            aria-label="Recipient's username"
                                                                            aria-describedby="basic-addon2" id="foo"
                                                                            value="">
                                                                        <div class="input-group-append">
                                                                            <button
                                                                                class="btn btn-outline-secondary btn_salin"
                                                                                type="button"
                                                                                data-clipboard-target="#foo">Salin</button>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- <div class="row-top-footer"></div> --}}


                                        {{-- <div class="">
                                            <div class="spinner-border" role="status" style="display: none">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <a id="btn_submit" href="{{ route('list_kuesioner') }}" onclick="getAllValues()"
                                                class="btn btn-primary">
                                                Simpan
                                            </a>
                                        </div> --}}

                                    </div>

                                </div>





                                {{-- <div class="row-top-footer"></div> --}}
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="position-fixed bottom-0 right-0 p-3" style="z-index: 5; right: 0; bottom: 0;">
        <div id="liveToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
            data-delay="2000">
            <div class="toast-body text-progress-save">
                Data Berhasil Di Simpan
            </div>
        </div>
    </div>
@endsection
