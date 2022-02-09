<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Print PDF</title>
    <style>
        /** 
                Set the margins of the page to 0, so the footer and the header
                can be of the full height and width !
             **/
        @page {
            /* margin: 100px 25px; */
        }

        .page-break {
            page-break-after: always;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            margin-top: 2cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: -20px;
            left: 70px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            /* color: white; */
            /* text-align: center; */
            line-height: 35px;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: -20px;
            left: 0px;
            right: 0px;
            height: 50px;

            /** Extra personal styles **/
            /* background-color: #03a9f4; */
            /* color: white; */
            text-align: right;
            line-height: 35px;
        }

        /* Create two unequal columns that floats next to each other */
        .column {
            float: left;
            font-size: 14px;
            /* padding: 10px;
            height: 300px; */
            /* Should be removed. Only for demonstration */
        }

        .left {
            width: 30%;
        }

        .right {
            width: 70%;
        }

        /* Clear floats after the columns */
        .row-content:after {
            content: "";
            display: table;
            clear: both;
        }

        .text-header {
            font-size: 12px;
            font-weight: bold;
        }

        .border-container {
            border: 1px solid rgb(211, 204, 204);
        }

        .border-bottom-container {
            border-bottom: 1px solid rgb(211, 204, 204);
        }

    </style>
</head>

@php
$wilayah = session('wilayah');
$kordinat = session('kordinat');
$njop = session('njop');
$bpn = session('bpn');
@endphp

<body>
    <header>
        <img src="assets/gambar/logo_jakpintas.png"><br>
        <span class="text-header">Peta Perizinan dan Investasi</span>
    </header>

    <footer>
        Di Cetak pada tanggal {{ date('d M Y') }}
    </footer>
    <main>
        <h3 align="center" class="mb-1">Ringkasan Informasi</h3>
        <p class="font-weight-bold">Peta Lokasi</p>
        <img src="{{ session('img') }}" id="map" style="width: 100%;">
        <p class="font-weight-bold text-center mt-2">Profil</p>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="border-bottom-container w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Lokasi</span>
                </div>
                <div class="column left">
                    <span>Koordinat</span>
                </div>
                <div class="column right">
                    <a href="https://www.google.com/maps/search/%09{{ $kordinat[0] }},{{ $kordinat[1] }}"
                        target="_blank" id="kordinat">{{ $kordinat[0] }},{{ $kordinat[1] }}</a>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Kelurahan</span>
                </div>
                <div class="column right">
                    <span id="kelurahan">{{ ucwords(strtolower($wilayah['Kelurahan'])) }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Kecamatan</span>
                </div>
                <div class="column right">
                    <span id="kecamatan">{{ ucwords(strtolower($wilayah['Kecamatan'])) }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Wilayah</span>
                </div>
                <div class="column right">
                    <span id="wilayah">{{ ucwords(strtolower($wilayah['Kota'])) }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Luas Wilayah</span>
                </div>
                <div class="column right">
                    <span id="luas">{{ number_format($wilayah['luas-area'] / 10000, 2, '.', '') }} ha</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Kepadatan</span>
                </div>
                <div class="column right">
                    <span id="kepadatan">{{ number_format($wilayah['Kepadatan-Penduduk']) }} jiwa per km2</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Rasio Gini</span>
                </div>
                <div class="column right">
                    <span id="rasio">{{ $wilayah['gini'] }}</span>
                </div>
            </div>
        </div>
        <br>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="border-bottom-container w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Persil</span>
                </div>
                <div class="column left">
                    <span>Kegiatan</span>
                </div>
                <div class="column right">
                    <span>{{ ucwords(strtolower(session('eksisting'))) }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Perkiraan NJOP</span>
                </div>
                <div class="column right">
                    <span>Rp. {{ number_format($njop[0]) }}, Rp. {{ number_format($njop[1]) }} per m²</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Tipe Hak</span>
                </div>
                <div class="column right">
                    <span>{{ $bpn[0] }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Luas</span>
                </div>
                <div class="column right">
                    <span>{{ number_format($bpn[1]) }} m²</span>
                </div>
            </div>
        </div>
        <br>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="border-bottom-container w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Usaha Mikro Kecil</span>
                </div>
                <div class="column left">
                    <span>Pemilik IUMK</span>
                </div>
                <div class="column right">
                    <span>{{ number_format($wilayah['Jumlah']) }} Orang</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Total Omzet</span>
                </div>
                <div class="column right">
                    <span>Rp. {{ number_format($wilayah['Total omzet']) }} per m²</span>
                </div>
            </div>
        </div>
        <br>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="border-bottom-container w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Pendapatan Rata Rata Per Bulan</span>
                </div>
                <div class="column left">
                    <span>Rp. 0 - 5 Juta</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P1'] }} %</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Rp. 6 - 10 Juta</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P2'] }} %</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Rp. 11 - 15 Juta</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P3'] }} %</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Rp. 16 - 20 Juta</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P4'] }} %</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Lebih dari Rp. 20 Juta</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P5'] }} %</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Tidak Menjawab</span>
                </div>
                <div class="column right">
                    <span>{{ $wilayah['P6'] }} %</span>
                </div>
            </div>
        </div>
        <br>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Distribusi Usaha Mikro Kecil</span>
                </div>
                <br>
                <div class="column text-center w-50">
                    <br>
                    <br>
                    <img src="{{ session('chart_pie') }}" class="w-100">
                </div>
                <div class="column text-center w-50">
                    <img src="{{ session('chart_bar') }}" class="w-100">
                </div>
            </div>
        </div>
        <br>
        <div class="border-container p-1">
            <div class="row-content">
                <div class="border-bottom-container w-100" style="vertical-align: middle">
                    <span class="font-weight-bold" style="vertical-align: middle">Lingkungan</span>
                </div>
                <div class="column left">
                    <span>Sistem Sanitasi</span>
                </div>
                <div class="column right">
                    <span>{{ session('sanitasi') }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Penurunan Tanah</span>
                </div>
                <div class="column right">
                    <span>{{ session('turun') }} cm/tahun</span>
                </div>
            </div>
            <hr>
            <div class="row-content">
                <div class="column left">
                    <span>Sistem Sanitasi</span>
                </div>
                <div class="column right">
                    <span>{{ session('sanitasi') }}</span>
                </div>
            </div>
            <div class="row-content">
                <div class="column left">
                    <span>Penurunan Tanah</span>
                </div>
                <div class="column right">
                    <span>{{ session('turun') }} cm/tahun</span>
                </div>
            </div>
        </div>
        </div>

    </main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>