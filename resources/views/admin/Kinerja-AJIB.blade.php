<!DOCTYPE html>
<html>
<head>
    <title>Rekap Input</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

    </style>

    <div class="text-center mb-4">
        <h5>Rekap Input
            {{
                count($data) > 1 ? '' : $data[0]->kelurahan;
            }}</h5>
    </div>


    <table class='table table-bordered'>
        <thead>
            <tr class="text-center">
                <th>Nama Tempat</th>
                <th>Kelurahan</th>
                <th>Foto</th>
                <th>Kategori</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $dt)
            <tr>
                <td width="10%">{{ $dt->judul }}</td>

                <td width="10%">{{ $dt->kelurahan }}</td>

                <td width="10%"><img src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{ $dt->foto }}" width="220px" height="120px" /></td>

                <td width="12%">{{ $dt->kategori }}</td>

            </tr>
            @endforeach
        </tbody>
    </table>


</body>
</html>
