<!DOCTYPE html>
<html>
<head>
    <title>Rekap Input Kecamatan {{ count($data) >= 1 ? $data[0]->kelurahan : '' ; }}</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>


    <style type="text/css">
        table {
            page-break-inside: avoid !important;
        }

        table tr td,
        table tr th {
            font-size: 9pt;
        }

        .table_custom {
            border: 1px solid black;
            width: 100%;
            height: 10px;
            table-layout: fixed;
        }

        .table_custom td {
            border: 1px solid black;
            /* padding: 10px; */
        }

        #footer {
            position: fixed;
            right: 0px;
            bottom: 10px;
            text-align: center;
            /* border-top: 1px solid black; */
        }

        #footer .page:after {
            content: counter(page, decimal);
        }

        @page {
            margin: 20px 30px 40px 50px;
        }

        /* td div {
        height: inherit;
        width: inherit;
        } */

        td div img {
            position: relative;
            width: 200px;
            height: 160px;
            object-fit: contain;
        }

    </style>

    <div class="text-center mb-4">
        <h5>Rekap Input
            {{
                count($data) >= 1 ? "Kecamatan ".ucfirst($data[0]->kelurahan) : '' ;
            }}

        </h5>
    </div>

    @foreach ($data as $dt)

    <table class="table table_custom" cell-spacing=0>

        <tr>
            <td style="padding: 0 0 0.3rem 0.7rem;" colspan="4">
                <span class="font-weight-bold">Lokasi</span>
                <br>
                <span>{{ $dt->kelurahan }}</span>
            </td>
            <td style="width: 25%; padding: 0 0 0.3rem 0.7rem;">
                <span class="font-weight-bold"> Kategori </span>
                <br>
                <span>{{ $dt->kategori }}</span>

            </td>
            <td style="width: 30%; padding: 0 0 0 0; margin-top:10rem;" rowspan="4">
                {{-- <span class="font-weight-bold"> Foto </span>
                <br /> --}}

                {{-- cara1 --}}
                {{-- <img style="position: absolute; width:11.8rem; max-height:150px; margin-top:5px;" src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{ $dt->foto }}" /> --}}

                {{-- cara2 --}}
                <div><img style="top: 5px; left:6px;" src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{ $dt->foto }}" /></div>

                {{-- cara3 --}}
                {{-- <div><img style="display:block;" width="95%" height="9rem;" src="https://jakpintas.dpmptsp-dki.com/mobile/img/{{ $dt->foto }}" /></div> --}}
            </td>
        </tr>

        <tr>

            <td style="padding: 0 0 0.3rem 0.7rem;" colspan="5">
                <span class="font-weight-bold"> Deskripsi </span>
                <br />
                <span>{{ $dt->catatan }}</span>

            </td>
        </tr>

        <tr>
            <td style="padding: 0 0 0.3rem 0.7rem;" colspan="5">
                <span class="font-weight-bold"> Permasalahan </span>
                <br />
                <span>{{ $dt->permasalahan }}</span>
            </td>
        </tr>

        <tr>
            <td colspan="5" style="padding: 0 0 0.3rem 0.7rem;">
                <span class="font-weight-bold"> Solusi </span>
                <br />
                <span>{{ $dt->solusi }}</span>
            </td>
        </tr>
    </table>

    <div id="footer">
        <p class="page"></p>
    </div>

    @endforeach




</body>
</html>
