<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Print PDF</title>
</head>

<body>
    @php
        $no = 1;
    @endphp
    <center>
        <h3>Arsip Data Survey</h3>
    </center>
    <table class="table table-bordered">
        <tbody>
            @foreach ($data as $d)
                <tr>
                    <th rowspan="6" style="vertical-align: middle">{{ $no++ }}</th>
                    <th colspan="6">
                        <div class="row w-100">
                            @foreach ($d->image as $ds)
                                {{-- <p style="float: left">Test</p> --}}
                                <div class="col-md-3 mb-1">
                                    <img src="https://jakpintas.dpmptsp-dki.com/survey/{{ $ds->name }}"
                                        style="width: 100%; height:200px; object-fit:cover;">
                                </div>
                            @endforeach
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>Nama Tempat</th>
                    <th>Kordinat</th>
                    <th>ID Sub Blok</th>
                    <th>Kelurahan</th>
                    <th>Kecamatan</th>
                    <th>Tanggal</th>
                </tr>
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->kordinat }}</td>
                    <td>{{ $d->id_sub_blok }}</td>
                    <td>{{ $d->kelurahan }}</td>
                    <td>{{ $d->kecamatan }}</td>
                    <td>{{ $d->date }}</th>
                </tr>
                <tr>
                    <td colspan="6">
                        <p class="font-weight-bold">Pola Regional : {{ $d->regional }}</p>
                        <p>{{ $d->deskripsi_regional }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <p class="font-weight-bold">Pola Lingkungan : {{ $d->neighborhood }}</p>
                        <p>{{ $d->deskripsi_neighborhood }}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <p class="font-weight-bold">Pola Ruangan : {{ $d->transect_zone }}</p>
                        <p>{{ $d->deskripsi_transect_zone }}</p>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
