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
        header('Content-Disposition: attachment; filename=Data Kinerja.xls');
    @endphp
    <table border="1">
        <tr>
            <th>Nama Petugas Ajib</th>
            <th>Penempatan</th>
            <th>Jumlah Titik</th>
        </tr>
        @foreach ($data as $d)
            <tr>
                <td>{{ $d->name }}</td>
                <td>{{ $d->penempatan }}</td>
                <td>{{ $d->perkembangan_count }}</td>
            </tr>
        @endforeach
    </table>
</body>

</html>
