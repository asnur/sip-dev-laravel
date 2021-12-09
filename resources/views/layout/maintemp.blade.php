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
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- custom -->
    @if (isMobileDevice())
        <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @endif


</head>

<body>

    <!-- Judul -->

    <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top"
        style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">


        <div class="d-flex">
            <div class="col-md-1">

                <a onclick="window.close()" class="badge badge-primary margin_new_menu_icon">
                    <span class="material-icons">
                        arrow_back_ios
                    </span>
                </a>

            </div>

            <div class="col-md-9 margin_new_menu">{{ $title }}</div>

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



    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>

    <!-- CHART -->
    <script>
        // new Chart(document.getElementById("pie-chart"), {
        //     type: "pie",
        //     data: {
        //         labels: ["Produksi", "Perdagangan", "Jasa"],
        //         datasets: [{
        //             label: "Kelurahan",
        //             backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
        //             data: [dt.Produksi, dt.Perdagangan, dt.Jasa],
        //         }, ],
        //     },
        //     options: {
        //         title: {
        //             display: true,
        //         },
        //     },
        // });

        // new Chart(document.getElementById("bar-chart-grouped"), {
        //     type: "bar",
        //     data: {
        //         labels: ["20-29", "30-39", "40-49", "50-59", "60-69"],
        //         datasets: [{
        //             backgroundColor: "#3e95cd",
        //             data: [dt.U1, dt.U2, dt.U3, dt.U4, dt.U5],
        //         }, ],
        //     },
        //     options: {
        //         // title: {
        //         //     display: true,
        //         //     text: ["Usia", "Jumlah"],
        //         //     position: ["bottom", "left"],
        //         // },
        //         legend: {
        //             display: false,
        //         },
        //         scales: {
        //             yAxes: [{
        //                 scaleLabel: {
        //                     display: true,
        //                     labelString: "Jumlah",
        //                     padding: 20,
        //                 },
        //             }, ],
        //             xAxes: [{
        //                 scaleLabel: {
        //                     display: true,
        //                     labelString: "Usia",
        //                     padding: 20,
        //                 },
        //             }, ],
        //         },
        //     },
        // });
    </script>



</body>

</html>
