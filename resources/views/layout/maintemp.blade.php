<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peta Perijinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="../assets/gambar/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap.min.css')}}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{asset('assets/css/remix-icon/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome/css/font-awesome.min.css')}}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- custom -->
    <link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">

</head>

<body>

    <!-- Judul -->

    <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top"
        style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">


        <div class="d-flex">
            <div class="col-md-1">

                <a href="{{'/'}}" class="badge badge-primary margin_new_menu_icon">
                    <span class="material-icons">
                        arrow_back
                    </span>
                </a>

            </div>

            <div class="col-md-9 margin_new_menu">{{$title}}</div>

        </div>

    </div>

    <!-- Content -->
    <div class="container margin_conten_permenu">

        @yield('lokasi')
        @yield('ekonomi')
        @yield('zonasi')
        @yield('kode_kbli')
        @yield('persil')
        @yield('poi')

    </div>



    <script src="{{asset('assets/js/Chart.min.js')}}"></script>

    <!-- CHART -->
    <script>
        new Chart(document.getElementById("pie-chart"), {
            type: 'pie',
            data: {
                labels: ["Kel A", "Kel B", "Kel C"],
                datasets: [{
                    label: "Kelurahan",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                    data: [478, 267, 734]
                }]
            },
            options: {
                title: {
                    display: true
                }
            }
        });


        new Chart(document.getElementById("bar-chart-grouped"), {
            type: 'bar',
            data: {
                labels: ["1900", "1950", "1999", "2050"],
                datasets: [{
                    label: "Kecamatan A",
                    backgroundColor: "#3e95cd",
                    data: [133, 221, 783, 478]
                }, {
                    label: "Kecamatan B",
                    backgroundColor: "#8e5ea2",
                    data: [832, 447, 175, 534]
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Jumlah'
                }
            }
        });
    </script>



</body>

</html>