<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Peta Perizinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="{{ asset('assets/gambar/favicon.ico') }}">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/bs-features.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/features.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bootstrap5/css/custom-doc.css') }}">

</head>
<body>

    {{-- Header --}}
    <nav class="navbar navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <div class="dalam_kotakjudul">
                    <div>
                        <div class="text-center">
                            <img src="{{ asset('assets/gambar/logo_jakpintas.png') }}" width="80px">
                        </div>
                    </div>
                    <div style="margin-top: -2%; margin-left:5%;">
                        <p><span class="TextHead fw-bold">Peta Perizinan dan Investasi</span><br><span class="text-white ml-3 subjudul">Sistem

                                Pelayanan Informasi</span></p>
                    </div>
                </div>
            </a>
        </div>
    </nav>

    {{-- Konten --}}
    <div class="container px-3 py-5">
        {{-- Judul --}}
        <div class="border-bottom">
            <h2 class="pb-2 fw-bold h3">DOKUMEN DASAR DAN PANDUAN</h2>
            <p class="text-muted">
                Klik/Sentuh tautan di masing-masing kategori untuk dapat melihat/mengunduh dokumen dan panduan penunjang.
            </p>
        </div>

        <div class="row mt-5 mb-5">

            <div class="col-md-6">
                <div class="col-md-12 bg_pdf_judul">
                    <h3 class="p-2 fw-bold h5">
                        <img class="img_pdf_judul" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo"> Peraturan Dasar</h3>
                </div>

                <ul class="list-group list-group-flush list-group-numbered">

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/1/PERGUB NOMOR 118 TAHUN 2020 TENTANG IZIN PEMANFAATAN RUANG.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font">PERGUB NOMOR 118 TAHUN 2020 TENTANG IZIN PEMANFAATAN RUANG</span>


                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/1/PERGUB No 135 Tahun 2019 tentang Pedoman Tata Bangunan.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font">PERGUB NO 135 TAHUN 2019 TENTANG PEDOMAN TATA BANGUNAN</span>

                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/1/TATA BANGUNAN.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font">PAPARAN PERGUB NO 135 TAHUN 2019 TENTANG PEDOMAN TATA BANGUNAN</span>

                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/1/SK NO 39 2021 (SP IMB).pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> KEPDIS DPMPTSP DKI JAKARTA NO. 39 TAHUN 2021 TENTANG STANDAR PELAYANAN PENERBITAN IZIN MENDIRIKAN BANGUNAN</span>

                        </a>
                    </li>

                </ul>
            </div>

            <div class="col-md-6">
                <div class="col-md-12 bg_pdf_judul">

                    <h3 class="p-2 fw-bold h5">
                        <img class="img_pdf_judul" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo"> Informasi Persyaratan IMB</h3>

                </div>

                <ul class="list-group list-group-flush list-group-numbered">

                    <li class="list-group-item d-flex">
                        <div class="ms-1">
                            <div class="">
                                <a style="margin-right:0 !important;" target="_blank" class="set_link" href="{{ asset('pdf-documents/2/Syarat IMB Kelurahan.pdf') }}">
                                    <img class="img_imb" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo" /><span class="size_font"> IMB Kelurahan </span>
                            </div>
                            </a>
                            <span class="size_font">Hunian ≤ 2 Lantai</span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex">
                        <div class="ms-1">
                            <div class="">
                                <a style="margin-right:0 !important;" target="_blank" class="set_link" href="{{ asset('pdf-documents/2/Syarat IMB Kecamatan.pdf') }}">
                                    <img class="img_imb" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo" /><span class="size_font"> IMB Kecamatan</span>
                            </div>
                            </a>
                            <span class="size_font">Hunian > 2 Lantai</span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex">
                        <div class="ms-1">
                            <div class="">
                                <a style="margin-right:0 !important;" target="_blank" class="set_link" href="{{ asset('pdf-documents/2/Syarat IMB Kota.pdf') }}">
                                    <img class="img_imb" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo" /><span class="size_font"> IMB Kota</span>
                            </div>
                            </a>
                            <span class="size_font">Non-Hunian ≤ 8 Lantai</span>
                        </div>
                    </li>

                    <li class="list-group-item d-flex">
                        <div class="ms-1">
                            <div class="">
                                <a style="margin-right:0 !important;" target="_blank" class="set_link" href="{{ asset('pdf-documents/2/Syarat IMB Provinsi.pdf') }}">
                                    <img class="img_imb" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo" /><span class="size_font"> IMB Provinsi</span>
                            </div>
                            </a>
                            <span class="size_font">Non-Hunian > 8 Lantai</span>
                        </div>
                    </li>

                </ul>
            </div>
        </div>

        <div class="row mb-5">

            <div class="col-md-6">
                <div class="col-md-12 bg_pdf_judul">

                    <h3 class="p-2 fw-bold h5"><img class="img_pdf_judul" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo"> Panduan Penggunaan Layanan</h3>
                </div>

                <ul class="list-group list-group-flush list-group-numbered">

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/3/tutorial pengecekan2.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> Panduan Pengecekan Progres Pra Permohonan</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="https://www.youtube.com/watch?v=pRqPdHg4L0Q"><img class="img_pdf" src="{{ asset('assets/gambar/page/play-video.png') }}" alt="logo">
                            <span class="size_font"> Video Panduan Aplikasi JAKEVO</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <img class="img_pdf" src="{{ asset('assets/gambar/page/play-video.png') }}" alt="logo">
                        <span class="size_font"> Video Panduan Aplikasi PesanAJIB (coming soon)</span>
                    </li>

                </ul>
            </div>

            <div class="col-md-6">

                <div class="col-md-12 bg_pdf_judul">

                    <h3 class="p-2 fw-bold h5"><img class="img_pdf_judul" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo"> Panduan Penyusunan Dokumen</h3>
                </div>

                <ul class="list-group list-group-flush list-group-numbered">

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/4/Gambar Perencaan Arsitektur (GPA).pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> Gambar Perencaan Arsitektur (GPA)</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/4/3D GPA dan Excel.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> 3D GPA dan Excel</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/4/Lembar Pengesahan GPA.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> Lembar Pengesahan GPA</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/4/Laporan GPA.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo">
                            <span class="size_font"> Laporan GPA</span>
                        </a>
                    </li>

                </ul>

            </div>

        </div>

        <div class="row">

            <div class="col-md-6">
            </div>

            <div class="col-md-6">

                <div class="col-md-12 bg_pdf_judul">

                    <h3 class="p-2 fw-bold h5">
                        <img class="img_pdf_judul" src="{{ asset('assets/gambar/page/deskripsi.png') }}" alt="logo"> Layanan Eksternal</h3>
                </div>

                <ul class="list-group list-group-flush list-group-numbered">

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/5/APLIKASI SENTUH TANAHKU.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/monitor.png') }}" alt="logo">
                            <span class="size_font"> Aplikasi Sentuh Tanahku - Aplikasi resmi Kementerian ATR/BPN untuk pengecekan lahan</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="{{ asset('pdf-documents/5/GetSurvey.pdf') }}">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/monitor.png') }}" alt="logo"><span class="size_font"> Aplikasi GetSurvey - Aplikasi pemesanan jasa Surveyor Kadaster Berlisensi (SKB)</span>
                        </a>
                    </li>

                    <li class="list-group-item">
                        <a class="set_link" target="_blank" href="https://www.youtube.com/watch?v=4AVLFwM7Ij0">
                            <img class="img_pdf" src="{{ asset('assets/gambar/page/play-video.png') }}" alt="logo">
                            <span class="size_font"> Video Tata Cara Melihat Peta Rencana Kota DKI Jakarta melalui Jakartasatu</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>


    </div>

    {{-- Footer --}}
    {{-- <div class="container px-3 mt-1">

        <footer class="py-4 border-top">

            <div class="row">
                <div class="col-md-12">
                    <h2 class="fw-bold h3">Kontak Kami</h2>
                    <ul class="nav flex-column mt-3">

                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 text-muted">
                                <i style="font-size: 1.5rem; color: cornflowerblue;" class="bi bi-building"></i>
                                <span>DINAS PENANAMAN MODAL DAN PELAYANAN TERPADU SATU PINTU PROVINSI DKI JAKARTA</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 text-muted">
                                <i style="font-size: 1.5rem; color: cornflowerblue;" class="bi bi-geo-alt"></i>
                                <span>Jl. HR. RASUNA SAID Kav. C-22, Jakarta Selatan</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link p-0 text-muted">
                                <i style="font-size: 1.5rem; color: cornflowerblue;" class="bi bi-telephone">
                                </i><span>1500164 / (021)1500164 (non Telkomsel)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </footer>
    </div> --}}

    <!-- JS -->
    <script src="{{ asset('assets/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
