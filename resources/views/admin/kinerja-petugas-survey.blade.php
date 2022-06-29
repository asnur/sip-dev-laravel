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
    header('Content-Disposition: attachment; filename=Kinerja Petugas Survey.xls');

    @endphp
    <table border="1">
        <tr>
            <th>Nama Petugas Ajib</th>
            <th>Penempatan</th>
            <th>Role</th>
            <th>Input Hari Ini</th>
            <th>Input Total</th>
        </tr>
        @foreach ($data as $d)
        <tr>
            <td>{{ $d->name }}</td>
            <td>{{ $d->penempatan }}</td>
            <td>{{ $d->roles[0]->name }}</td>
            <td>{{ $d->perkembangan_count }}</td>
            <td>{{ $d->perkembangan_today_count }}</td>
        </tr>
        @endforeach
    </table>
</body>

</html>
