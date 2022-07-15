@extends('layouts.template_admin')
@section('content')
    @php
    $Roles = '';

    function date_ind_format($date)
    {
        $time = new DateTime($date);
        switch ($time->format('N')) {
            case 1:
                $hari = 'Senin';
                break;
            case 2:
                $hari = 'Selasa';
                break;
            case 3:
                $hari = 'Rabu';
                break;
            case 4:
                $hari = 'Kamis';
                break;
            case 5:
                $hari = 'Jumat';
                break;
            case 6:
                $hari = 'Sabtu';
                break;
            case 7:
                $hari = 'Minggu';
                break;
        }

        switch ($time->format('m')) {
            case 1:
                $bulan = 'Januari';
                break;
            case 2:
                $bulan = 'Februari';
                break;
            case 3:
                $bulan = 'Maret';
                break;
            case 4:
                $bulan = 'April';
                break;
            case 5:
                $bulan = 'Mei';
                break;
            case 6:
                $bulan = 'Juni';
                break;
            case 7:
                $bulan = 'Juli';
                break;
            case 8:
                $bulan = 'Agustus';
                break;
            case 9:
                $bulan = 'September';
                break;
            case 10:
                $bulan = 'Oktober';
                break;
            case 11:
                $bulan = 'November';
                break;
            case 12:
                $bulan = 'Desember';
                break;
        }
        return $hari . ', ' . $time->format('d') . ' ' . $bulan . ' ' . $time->format('Y');
    }
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

            @if ($data != null)
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Daftar List Kuesioner</h3>
                        <div class="card-actions">
                            <a href="/admin/tambahKuesioner" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i>
                                &nbsp; Tambah Kuesioner</a>
                        </div>
                    </div>
                    <div class="list-group list-group-flush overflow-auto" style="max-height: 35rem">

                        @foreach ($data as $d)
                            <div class="list-group-item">
                                <div class="row">
                                    <div class="col-auto">
                                        <a href="#">
                                            <span class="avatar"><img width="25"
                                                    src="{{ asset('assets/admin/img/list_kuesioner.png') }}"
                                                    alt=""></span>

                                        </a>
                                    </div>
                                    <div class="col text-truncate">
                                        <a href="{{ route('isi_kuesioner') }}"
                                            class="text-body d-block">{{ $d['title'] }}</a>
                                        <div class="text-muted text-truncate mt-n1">
                                            {{ date_ind_format($d['date']) }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <div class="mt-1">
                                            <form action="{{ route('delete-kuesioner') }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $d['_id'] }}">
                                                <button type="submit" class="btn border-0 btn-sm" role="button">
                                                    <i class="fas fa-trash"></i>&nbsp; Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row row-cards">
                        <div class="col-md-12 col-xl-12">

                            <div class="card">

                                <div class="empty">
                                    <div class="empty-img"><img src="{{ asset('assets/admin/img/kuesioner_kosong.png') }}"
                                            height="128" alt="">

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
            @endif



        </div>
    </div>
@endsection
