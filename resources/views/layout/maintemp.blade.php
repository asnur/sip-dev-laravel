@php
$uri_path = $_SERVER['REQUEST_URI'];
$uri_parts = explode('/', $uri_path);
$request_url = end($uri_parts);
@endphp

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Peta Perijinan dan Investasi DKI Jakarta</title>

    <link rel="icon" href="{{ asset('assets/gambar/favicon.ico')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/remix-icon/remixicon.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">



    <!-- MAPBOX -->
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.css' rel='stylesheet' />

    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.css"
        type="text/css">
    <link rel="stylesheet"
        href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css"
        type="text/css">

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">


    <meta name="csrf-token" content="{{ csrf_token() }}" />


    @if (isMobileDevice())
        <link rel="stylesheet" href="{{ asset('assets/css/mobile.css') }}">
    @else
        <!-- custom -->
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



    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- <script src="assets/js/popper.min.js" rel="preload"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

    <!-- <script src="assets/js/bootstrap.min.js" rel="preload"></script> -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>

    <script src='https://api.mapbox.com/mapbox-gl-js/v2.3.1/mapbox-gl.js'></script>
    <script src="https://unpkg.com/@turf/turf@6/turf.min.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.2.2/mapbox-gl-draw.js"></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.Marquee/1.6.0/jquery.marquee.min.js"
    integrity="sha512-JHJv/L48s1Hod24iSI0u9bcF/JlUi+YaxliKdbasnw/U1Lp9xxWkaZ3O5OuQPMkVwOVXeFkF4n4176ouA6Py3A=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
    integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script>
        var url = "https://jakpintasdev.dpmptsp-dki.com:3000";

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

    @if ($request_url == 'poi')

        <script>


        var getRadVal = $("#ControlRange").val();

        var lat = "{{ @$data_kordinat[0] }}"
        var lng = "{{ @$data_kordinat[1] }}"



        $.ajax({
        url: `${url}/lon/${lng}/lat/${lat}/rad/${getRadVal}`,

        method: "get",
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {
            // $('.map-loading').show()
            // $("#forDataRad").html("");
            // $("#tabListFasilitas").html("");
        },
        success: function (dt) {
            var dtResp = JSON.parse(dt);
            var htmlContent = "";
            var fasilitas


            fasilitas = `
            <div class="col-sm-12 mt-4 mb-5">
            <div class="row">
                <div class="col-sm-12 font-weight-bold">Fasilitas Dalam Radius ${
                    getRadVal / 1000
                } Km
                </div>
            `;

            cat = [];

            for (var i in dtResp.features) {
                const dtpar = dtResp.features[i];
                const props = dtpar.properties;
                const geo = dtpar.geometry;
                cat.push({
                    name: props.Kategori,
                    fasilitas: props.Name,
                    jarak: geo.Distance,
                });
            }

            function groupBy(collection, property) {
                var i = 0,
                    val,
                    index,
                    values = [],
                    result = [];
                for (var i = 0; i < collection.length; i++) {
                    val = collection[i][property];
                    index = values.indexOf(val);
                    if (index > -1) result[index].push(collection[i]);
                    else {
                        values.push(val);
                        result.push([collection[i]]);
                    }
                }
                return result;
            }

            var obj = groupBy(cat, "name");
            for (var as in obj) {
                const dt = obj[as];

                htmlContent += `
                    <div class="row row_mid_judul2">
                    <div class="col-md-12 flex-column">
                        <button type="button"
                            class="btn btn-md btn-block text-left mt-3 text_all text_poi1 tombol_search"
                            data-toggle="collapse" data-target="#${dt[0].name}" aria-expanded="true"
                            aria-controls="collapsePoiOne">
                            <b class="text_all_mobile_poi">${dt[0].name}</b>
                        </button>
                    </div>
                    </div>
                    <div id="${dt[0].name}" class="collapse show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
                        <div class="card-body text_poi2 row_mid_judul">
                            <ul class="list-group list-group-flush PoiCollabse_mobile">
                `;
                fasilitas += `
                <div class="col-sm-4">${dt[0].name}</div>
                <div class="col-sm-8">
                `;

                // console.log(dt[0].name);

                for (var az in dt) {
                    const dta = dt[az];
                    htmlContent += `
                    <li style="list-style:none" class="listgroup-cust align-items-center">
                        <div class="d-flex">
                            <div class="col-md-8 text_all">
                            ${dta.fasilitas} <span class="float-right">${Math.round(dta.jarak) / 1000} km</span>
                            </div>

                        </div>
                    </li>
                    `;

                    fasilitas += `
                    <div class="row">
                        <div class="col-sm-8">${dta.fasilitas}</div>
                        <div class="col-sm-4">${
                            Math.round(dta.jarak) / 1000
                        } km</div>
                    </div>
          `;
                    // console.log(dta.fasilitas, dta.jarak);
                }

                htmlContent += `</ul>
                </div>
            </div>`;
                fasilitas += `</div>`;
            }
            // console.log(htmlContent);
            $(".tabListFasilitas").html(htmlContent);
        },
        error: function (error) {
            console.log(error);
        },
        complete: function (e) {
            // $('.map-loading').hide()
        },
    });
        </script>

    @endif

    @if ($request_url == 'kodekbli')

        <script>



        </script>

    @endif





</body>

</html>
