const sum = (accumulator, a) => {
    return accumulator + a;
};

const logout = () => {
    $("#form-logout").submit();
};

var dataTable;

var select2Init = function () {
    $("#selectOption").select2({
        dropdownAutoWidth: true,
        allowClear: true,
        placeholder: "Pilih Kecamatan",
    });
};

var dataTableInit = function () {
    dataTable = $(".data-kinerja").dataTable({
        retrieve: true,
        columnDefs: [
            {
                targets: 1,
                type: "num",
            },
        ],
    });
};

var dtSearchInit = function () {
    $("#selectOption").change(function () {
        dtSearchAction($(this), 1);
    });
};

dtSearchAction = function (selector, columnId) {
    var fv = selector.val();
    if (fv == "" || fv == null) {
        dataTable.api().column(columnId).search("", true, false).draw();
    } else {
        dataTable.api().column(columnId).search(fv, true, false).draw();
    }
};

$(document).ready(function () {
    select2Init();
    dataTableInit();
    dtSearchInit();
});

// $("#selectSurveyer").select2();

// $("#tableKinerja").DataTable({
//     deferRender: true,
// });

// $("#selectSurveyer").on("change", function () {
//     var data = $("#selectSurveyer").select2("val");
//     $.ajax({
//         url: `${APP_URL}/admin/kinerja`,
//         method: "POST",
//         beforeSend: () => {
//             let html = `
//             <td colspan="3">
//                 <center>
//                     <div class="spinner-border" role="status" style="font-size: 20pt">
//                         <span class="sr-only">Loading...</span>
//                     </div>
//                 </center>
//             </td>
//             `;
//             $("#dataSurvey").html("");
//             $("#dataSurvey").html(html);
//         },
//         data: {
//             id: data,
//             _token: $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: (e) => {
//             let data = e;
//             let html = "";
//             $("#tableKinerja").DataTable().destroy();
//             $("#dataSurvey").html("");
//             data.forEach((e) => {
//                 html += `
//                     <tr>
//                         <td>${e.judul}</td>
//                         <td><img src="https://jakpintas.dpmptsp-dki.com/mobile/img/${e.foto}" class="w-100" style="height:100px; object-fit:cover;"></td>
//                         <td>${e.kategori}</td>
//                     </tr>
//                 `;
//                 $("#dataSurvey").html(html);
//             });
//             $("#tableKinerja").DataTable();
//         },
//     });
// });

const editUser = (id, name, email, role) => {
    $("#idUser").val("");
    $("#namaUser").val("");
    $("#emailUser").val("");
    $("#roleUser").val("");

    $("#idUser").val(id);
    $("#namaUser").val(name);
    $("#emailUser").val(email);
    $("#roleUser").val(role);
};

const editPegawai = (id, name, email, penempatan) => {
    $("#idUser").val("");
    $("#namaUser").val("");
    $("#emailUser").val("");
    $("#penempatanUser").val("");

    $("#idUser").val(id);
    $("#namaUser").val(name);
    $("#emailUser").val(email);
    $("#penempatanUser").html(
        '<option value="' + penempatan + '">' + penempatan + "</option>"
    );
};

$.ajax({
    url: `/analytics/6`,
    method: "GET",
    success: (e) => {
        $(".inf-pengunjung").text(0);
        $(".inf-pengunjung").text(e[1].reduce(sum, 0));
    },
});

let url = document.URL;
let arrURL = url.split("/");

if (arrURL[4] == "kinerja") {
    $("#selectSurveyer").val(0).trigger("change");
}

// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

const number_format = (number, decimals, dec_point, thousands_sep) => {
    // *     example: number_format(1234.56, 2, ',', ' ');
    // *     return: '1 234,56'
    number = (number + "").replace(",", "").replace(" ", "");
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
        dec = typeof dec_point === "undefined" ? "." : dec_point,
        s = "",
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return "" + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || "").length < prec) {
        s[1] = s[1] || "";
        s[1] += new Array(prec - s[1].length + 1).join("0");
    }
    return s.join(dec);
};

// Area Chart Example

const filterAnalytics = (periode) => {
    $.ajax({
        url: `/analytics/${periode - 1}`,
        method: "GET",
        // beforeSend: function () {
        //     $(".skeleton_chart").html(
        //         '<div class="uk_chart_skeleton skeleton-image"></div>'
        //     );
        // },
        success: (e) => {
            let jumlah_hari = periode - 1;
            $(".jumlah_hari").text(periode);
            localStorage.setItem("interval", periode);
            // console.log(jumlah_hari);

            $(".skeleton-image").hide();

            var ctx = document.getElementById("chart-pengunjung");
            var myLineChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: e[0],
                    datasets: [
                        {
                            label: "Jumlah",
                            lineTension: 0.3,
                            backgroundColor: "rgba(78, 115, 223, 0.05)",
                            borderColor: "rgba(78, 115, 223, 1)",
                            pointRadius: 3,
                            pointBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointBorderColor: "rgba(78, 115, 223, 1)",
                            pointHoverRadius: 3,
                            pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                            pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                            pointHitRadius: 10,
                            pointBorderWidth: 2,
                            data: e[1],
                        },
                    ],
                },
                options: {
                    tooltips: {
                        backgroundColor: "#FAFAFA",
                        borderColor: "#206bc4",
                        borderWidth: 1,
                        titleFontColor: "black",
                        titleFontStyle: "normal",
                        displayColors: false,
                        bodyFontColor: "black",
                    },

                    maintainAspectRatio: false,
                    layout: {
                        padding: {
                            left: 10,
                            right: 25,
                            top: 25,
                            bottom: 0,
                        },
                    },
                    scales: {
                        xAxes: [
                            {
                                time: {
                                    unit: "date",
                                },
                                gridLines: {
                                    display: false,
                                    drawBorder: false,
                                },
                                ticks: {
                                    // maxTicksLimit: 7,
                                    display: false,
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    maxTicksLimit: 5,
                                    padding: 10,
                                    // Include a dollar sign in the ticks
                                    callback: function (value, index, values) {
                                        return number_format(value);
                                    },
                                },
                                gridLines: {
                                    color: "rgb(234, 236, 244)",
                                    zeroLineColor: "rgb(234, 236, 244)",
                                    drawBorder: false,
                                    borderDash: [2],
                                    zeroLineBorderDash: [2],
                                },
                            },
                        ],
                    },
                    legend: {
                        display: false,
                    },
                },
            });

            // var options = {
            //     series: [
            //         {
            //             label: "Jumlah",
            //             data: e[1],
            //         },
            //     ],
            //     chart: {
            //         id: "realtime",
            //         height: 350,
            //         type: "line",
            //         animations: {
            //             enabled: true,
            //             easing: "linear",
            //             dynamicAnimation: {
            //                 speed: 1000,
            //             },
            //         },
            //         toolbar: {
            //             show: false,
            //         },
            //         zoom: {
            //             enabled: false,
            //         },
            //     },
            //     dataLabels: {
            //         enabled: false,
            //     },
            //     stroke: {
            //         curve: "smooth",
            //     },

            //     markers: {
            //         size: 0,
            //     },
            //     xaxis: {
            //         categories: e[0],
            //     },
            //     yaxis: {
            //         max: 100,
            //     },
            //     legend: {
            //         show: false,
            //     },
            // };

            // var chart = new ApexCharts(
            //     document.querySelector("#chart-pengunjung"),
            //     options
            // );
            // chart.render();

            // window.setInterval(function () {
            //     getNewSeries(lastDate, {
            //         min: 10,
            //         max: 90,
            //     });

            //     chart.updateSeries([
            //         {
            //             data: e[1],
            //         },
            //     ]);
            // }, 1000);

            // new ApexCharts(document.getElementById("chart-pengunjung"), {
            //     chart: {
            //         type: "area",
            //         fontFamily: "inherit",
            //         height: 192,
            //         sparkline: {
            //             enabled: true,
            //         },
            //         animations: {
            //             enabled: false,
            //         },
            //     },
            //     dataLabels: {
            //         enabled: false,
            //     },
            //     fill: {
            //         opacity: 0.16,
            //         type: "solid",
            //     },
            //     stroke: {
            //         width: 2,
            //         lineCap: "round",
            //         curve: "smooth",
            //     },
            //     series: [
            //         {
            //             name: "Jumlah",
            //             data: e[1],
            //         },
            //     ],
            //     grid: {
            //         strokeDashArray: 4,
            //     },
            //     xaxis: {
            //         labels: {
            //             padding: 0,
            //         },
            //         tooltip: {
            //             enabled: false,
            //         },
            //         axisBorder: {
            //             show: false,
            //         },
            //         type: "datetime",
            //     },
            //     yaxis: {
            //         labels: {
            //             padding: 4,
            //         },
            //     },
            //     labels: e[0],
            //     colors: ["#206bc4"],
            //     legend: {
            //         show: false,
            //     },
            //     point: {
            //         show: false,
            //     },
            // }).render();
        },
    });
};

if (arrURL[4] == undefined) {
    $(window).on("load", () => {
        filterAnalytics(7);
    });

    setInterval(() => {
        filterAnalytics(localStorage.getItem("interval"));
    }, 10000);
}

function dataTebaruRealtime() {
    $.ajax({
        url: `/admin/fetch-surveyer`,
        method: "GET",
        dataType: "json",

        success: function (e) {
            // console.log(e.surveyer);
            $.each(e.surveyer, function (key, data) {
                // $("#id_user").html(data.id);
                $("#name").html(data.name);
                $("#judul").html(data.judul);
                $("#kategori").html(data.kategori);
                $("#deskripsi").html(
                    data.catatan.charAt(0).toUpperCase() +
                        data.catatan.slice(1).toLowerCase()
                );
                $("#permasalahan").html(data.permasalahan);
                $("#solusi").html(data.solusi);
                $("#gambar_utama").html(
                    '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/mobile/img/' +
                        data.foto +
                        '" /> '
                );

                $("#photo_ajib").html(
                    '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                        data.name +
                        '.jpg") }}" alt="Petugas Ajib" /></span>'
                );

                // new
                // $("#photo_ajib").html(
                //     '<span class="avatar" "><img style="border-radius:10px" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                //         data.name +
                //         '.jpg") }}" alt="Petugas Ajib" /></span>'
                // );

                const koor_kelurahan = data.kordinat;

                // console.log(koor_kelurahan);
                getAjibKelurahan(koor_kelurahan);
            });
        },
    });
}

$(document).ready(function () {
    $(".img_child_id").on("click", function () {
        $("#photo_ajib").hide();
        $("#gambar_utama").hide();

        var id_data_terbaru = $(this).attr("data-id");
        // $id_new = id_data_terbaru;
        // console.log($id_new);

        $.ajax({
            // data: { id: $id_new },
            url: `/admin/data-terbaru/${id_data_terbaru}`,
            type: "get",
            dataType: "json",
            beforeSend: function () {
                $("#name").html('<div class="skeleton-heading"></div>');
                $("#judul").html('<div class="skeleton-heading"></div>');
                $("#kategori").html('<div class="skeleton-heading"></div>');
                $("#deskripsi").html('<div class="skeleton-heading"></div>');
                $("#permasalahan").html('<div class="skeleton-heading"></div>');
                $("#solusi").html('<div class="skeleton-heading"></div>');
                $("#gambar_utama2").html(
                    ' <div class="img_parents skeleton-image"></div>'
                );
                $("#photo_ajib2").html(
                    '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
                );
                $("#kelurahan_ajib").html(
                    '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
                );
            },
            success: function (e) {
                // console.log(e.terbaru);
                $.each(e.terbaru, function (key, data) {
                    // $("#id_user").html(data.id);
                    $("#name").html(data.name);
                    $("#judul").html(data.judul);
                    $("#kategori").html(data.kategori);
                    $("#deskripsi").html(
                        data.catatan.charAt(0).toUpperCase() +
                            data.catatan.slice(1).toLowerCase()
                    );
                    $("#permasalahan").html(
                        data.permasalahan.charAt(0).toUpperCase() +
                            data.permasalahan.slice(1).toLowerCase()
                    );
                    $("#solusi").html(data.solusi);

                    $("#gambar_utama2").html(
                        '<img class="img_parents" style="border-radius:5px" src="https://jakpintas.dpmptsp-dki.com/mobile/img/' +
                            data.foto +
                            '" />'
                    );

                    // Ajib
                    // $("#photo_ajib2").html(
                    //     '<span class="avatar" "><img style="border-radius:10px" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                    //         data.name +
                    //         '.jpg") }}" alt="Petugas Ajib" /></span>'
                    // );
                    $("#photo_ajib2").html(
                        '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                            data.name +
                            '.jpg") }}" alt="Petugas Ajib" /></span>'
                    );
                    const koor_kelurahan = data.kordinat;

                    // console.log(koor_kelurahan);
                    getAjibKelurahan(koor_kelurahan);
                });
            },
        });
    });
});

function getAjibKelurahan(koor_kelurahan) {
    var coord = koor_kelurahan.split(",");
    // console.log(coord);

    $.ajax({
        url: `https://jakpintas.dpmptsp-dki.com:3000/wilayah/${coord[1]}/${coord[0]}`,
        method: "GET",
        // success: function (e) {
        //     const dt = JSON.parse(e);
        //     console.log(dt);
        // },
        beforeSend: function () {
            $("#kelurahan_ajib").html('<div class="skeleton-heading"></div>');
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            const prop = dtResp.features[0].properties;

            if (dtResp.features != null) {
                // $("#kelurahan_ajib").html(`${prop.Kelurahan}`);
                $("#kelurahan_ajib").html(
                    "AJIB " +
                        prop.Kelurahan.charAt(0).toUpperCase() +
                        prop.Kelurahan.slice(1).toLowerCase() +
                        ""
                );
            }
        },
    });
}
