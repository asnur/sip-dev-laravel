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
    {{-- <div class="card-header text-white bg-primary font-weight-bold judul_utama fixed-top"
        style="box-shadow: 2px 2px 2px rgba(99, 97, 97, 0.8);">

        <div class="d-flex">
            <div class="col-md-1">
                <a type="button" class="badge badge-primary margin_new_menu_icon" id="close" data-dismiss="modal" aria-hidden="true">
                    <span class="material-icons">
                        arrow_back_ios
                    </span>
                </a>
            </div>

            <div class="col-md-9 margin_new_menu">{{ $title }}</div>
        </div>

    </div> --}}

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
    <script>
        var url = "http://103.146.202.108:3000"

        function separatorNum(val) {
            if (typeof val === "undefined" || val === null || val === "null") {
                return null;
            }
            val = parseFloat(val);
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }
    </script>

    <!-- CHART -->
    @if ($request_url == 'ekonomi')
        <script>
            var Produksi = "{{ @$data_lokasi['Produksi'] }}"
            var Perdagangan = "{{ @$data_lokasi['Perdagangan'] }}"
            var Jasa = "{{ @$data_lokasi['Jasa'] }}"
            var U1 = "{{ @$data_lokasi['U1'] }}"
            var U2 = "{{ @$data_lokasi['U2'] }}"
            var U3 = "{{ @$data_lokasi['U3'] }}"
            var U4 = "{{ @$data_lokasi['U4'] }}"
            var U5 = "{{ @$data_lokasi['U5'] }}"
            new Chart(document.getElementById("pie-chart"), {
                type: "pie",
                data: {
                    labels: ["Produksi", "Perdagangan", "Jasa"],
                    datasets: [{
                        label: "Kelurahan",
                        backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                        data: [Produksi, Perdagangan, Jasa],
                    }, ],
                },
                options: {
                    title: {
                        display: true,
                    },
                },
            });

            new Chart(document.getElementById("bar-chart-grouped"), {
                type: "bar",
                data: {
                    labels: ["20-29", "30-39", "40-49", "50-59", "60-69"],
                    datasets: [{
                        backgroundColor: "#3e95cd",
                        data: [U1, U2, U3, U4, U5],
                    }, ],
                },
                options: {
                    legend: {
                        display: false,
                    },
                    scales: {
                        yAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: "Jumlah",
                                padding: 20,
                            },
                        }, ],
                        xAxes: [{
                            scaleLabel: {
                                display: true,
                                labelString: "Usia",
                                padding: 20,
                            },
                        }, ],
                    },
                },
            });
        </script>
    @endif

    @if ($request_url == 'persil')
        <script>
            var lat = "{{ @$data_kordinat[0] }}"
            var lng = "{{ @$data_kordinat[1] }}"


            $.ajax({
                url: `${url}/eksisting/${lng}/${lat}`,
                method: "get",
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    // $('.map-loading').show()
                },
                success: function(dt) {
                    const dtResp = JSON.parse(dt);
                    if (dtResp.features != null) {
                        const prop = dtResp.features[0].properties;

                        $(".inf-eksisting").html(prop.Kegiatan);
                        //   eksisting = `
                //   <div class="col-sm-12">
                //   <div class="row">
                //         <div class="col-sm-12 font-weight-bold">Persil Tanah</div>
                //         <div class="col-sm-4">Lahan Eksisting</div>
                //         <div class="col-sm-8">${prop.Kegiatan}</div>
                //       </div>
                //     </div>
                //     </tbody>
                //   </table>
                //   `;
                    }
                },
                error: function(error) {
                    console.log(error);
                },
                complete: function(e) {
                    // $('.map-loading').hide()
                },
            });

            $.ajax({
                url: `${url}/bpn/${lng}/${lat}`,
                method: "get",
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function() {
                    // $('.map-loading').show()
                },
                success: function(dt) {
                    const dtResp = JSON.parse(dt);
                    if (dtResp.features != null) {
                        const prop = dtResp.features[0].properties;
                        $(".inf-tipehak").html(prop.Tipe);
                        $(".inf-luasbpn").html(separatorNum(prop.Luas) + " m&sup2;");
                        //   bpn = `
                //     <div class="col-sm-12">
                //       <div class="row">
                //         <div class="col-sm-4">Tipe Hak</div>
                //         <div class="col-sm-8">${prop.Tipe}</div>
                //         <div class="col-sm-4">Luas</div>
                //         <div class="col-sm-8">${separatorNum(prop.Luas)} m&sup2;</div>
                //         <div class="col-sm-4">Harga</div>
                //         <div class="col-sm-8">Rp. ${hrg_min} - Rp. ${hrg_max} per meter persegi</div>
                //       </div>
                //     </div>
                //   `;
                    }
                },
                error: function(error) {
                    console.log(error);
                },
                complete: function(e) {
                    // $('.map-loading').hide()
                },
            });
        </script>
    @endif


</body>

</html>
