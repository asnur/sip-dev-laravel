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
    header('Content-Disposition: attachment; filename=Jumlah Polygon Per Kelurahan.xls');

    @endphp
    <table border="1">
        <tr>
            <th>Kecamatan</th>
            <th>Kelurahan</th>
            <th>Total Polygon</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->kecamatan }}</td>
            <td>{{ $d->kelurahan }}</td>
            <td>{{ $d->jumlah }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
