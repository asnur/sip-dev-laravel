<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Excel</title>
</head>

<body>
    @php
        header('Content-type: application/vnd-ms-excel');
        header('Content-Disposition: attachment; filename=Data Detil.xls');
    @endphp
    <table border="1">
        <tr>
            <th>Petugas Ajib</th>
            <th>ID Sub Blok</th>
            <th>Nama Lokasi</th>
            <th>Kelurahan</th>
            <th>Kecamatan</th>
            <th>Pola Regional</th>
            <th>Deskripsi</th>
            <th>Pola Lingkungan</th>
            <th>Deskripsi</th>
            <th>Pola Ruang</th>
            <th>Deskripsi</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->user->name }}</td>
                <td>{{ $d->id_sub_blok }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->kelurahan }}</td>
                <td>{{ $d->kecamatan }}</td>
                <td>{{ $d->regional }}</td>
                <td>{{ $d->deskripsi_regional }}</td>
                <td>{{ $d->neighborhood }}</td>
                <td>{{ $d->deskripsi_neighborhood }}</td>
                <td>{{ $d->transect_zone }}</td>
                <td>{{ $d->deskripsi_transect_zone }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
