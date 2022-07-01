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
        header('Content-Disposition: attachment; filename=Data Arsip Lokasi Pendataan Usaha.xls');
        $no = 1;
    @endphp
    <table border="1">
        <tr>
            <th>No</th>
            <th>Nama Usaha</th>
            <th>Pelaku Usaha</th>
            <th>Koordinat</th>
            <th>Alamat</th>
            <th>No Perijinan</th>
            <th>Sektor Usaha</th>
            <th>Modal Usaha</th>
            <th>Jumlah Tenaga Kerja</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $d->nama_usaha }}</td>
                <td>{{ $d->pelaku }}</td>
                <td>{{ $d->kordinat }}</td>
                <td>{{ $d->alamat }}</td>
                <td>{{ $d->no_perjanjian }}</td>
                <td>{{ $d->sektor }}</td>
                <td>{{ $d->modal }}</td>
                <td>{{ $d->jumlah_tenaga }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
