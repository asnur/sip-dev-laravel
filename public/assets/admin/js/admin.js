// const { remove } = require("lodash");

const sum = (accumulator, a) => {
    return accumulator + a;
};

const logout = () => {
    $("#form-logout").submit();
};

var dataTable;

var select2Init = function () {
    // $("#selectOption").select2({
    //     dropdownAutoWidth: true,
    //     allowClear: true,
    //     placeholder: "Pilih Kelurahan",
    // });
    $("#selectOption").select2();

    selectOption = document.getElementById("selectOption").value;

    localStorage.setItem("getKelurahan", selectOption);

    var kel = localStorage.getItem("getKelurahan");

    $("#PrintKinerja").attr("href", `/admin/Ekspor-Kinerja/${kel}`);

    // console.log(kel);
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
        var kel = $("#selectOption").val();

        // console.log(kel);

        $("#PrintKinerja").attr("href", `/admin/Ekspor-Kinerja/${kel}`);

        // console.log(lempar_kel);

        // $.ajax({
        //     url: `/admin/Kelurahan/${lempar_kel}`,
        //     method: "GET",
        //     dataType: "json",

        //     success: function (e) {
        //         for (let index = 0; index < e.length; index++) {
        //             // console.log(e.get_kelurahan);
        //             // html += `
        //             //     <tr>
        //             //         <td>${e[index].judul}</td>
        //             //         <td>${data.kelurahan}</td>
        //             //     </tr>
        //             // `;
        //             // $(".tampildata_kelurahan").html(html);
        //             // console.log(get_kelurahan)
        //             // let str = JSON.stringify(get_kelurahan);
        //             // var cek = window.sessionStorage.setItem("get_kelurahan", str);
        //         }
        //     },
        // });

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
        // 10 * 60 * 1000;
        // mnt * detik * ms
    }, 600000);
}

function dataTebaruRealtime() {
    $.ajax({
        url: `/admin/fetch-surveyer`,
        method: "GET",
        dataType: "json",

        beforeSend: function () {
            $("#name").html('<div class="skeleton-heading"></div>');
            $("#judul").html('<div class="skeleton-heading"></div>');
            $("#kategori").html('<div class="skeleton-heading"></div>');
            $("#deskripsi").html('<div class="skeleton-heading"></div>');
            $("#permasalahan").html('<div class="skeleton-heading"></div>');
            $("#solusi").html('<div class="skeleton-heading"></div>');

            $("#gambar_utama").html(
                ' <div class="img_parents skeleton-image"></div>'
            );
            $("#photo_ajib").html(
                '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
            );
            $("#penempatan").html(
                '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
            );
        },

        success: function (e) {
            // console.log(e.surveyer);
            $.each(e.surveyer, function (key, data) {
                // $("#id_user").html(data.id);
                $("#name").html(data.name);
                $("#judul").html(data.judul);
                $("#kategori").html(data.kategori);

                $("#penempatan").html(
                    "<div style='margin-top: 0.4rem;'>AJIB " +
                        data.penempatan.substr(19) +
                        "</div>"
                );

                // if (data.kelurahan != null) {
                //     $("#kelurahan_ajib").html(
                //         data.kelurahan.charAt(0).toUpperCase() +
                //             data.kelurahan.slice(1).toLowerCase()
                //     );
                // } else {
                //     $("#kelurahan_ajib").html(data.kelurahan);
                // }

                if (data.catatan != null) {
                    $("#deskripsi").html(
                        data.catatan.charAt(0).toUpperCase() +
                            data.catatan.slice(1).toLowerCase()
                    );
                } else {
                    $("#deskripsi").html(data.catatan);
                }

                if (data.permasalahan != null) {
                    $("#permasalahan").html(
                        data.permasalahan.charAt(0).toUpperCase() +
                            data.permasalahan.slice(1).toLowerCase()
                    );
                } else {
                    $("#permasalahan").html(data.permasalahan);
                }

                $("#solusi").html(data.solusi);

                $(".gambar_utama_slider_input2").html(
                    '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/mobile/img/' +
                        data.foto +
                        '" /> '
                );

                $("#photo_ajib").html(
                    '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                        data.name +
                        '.jpg") }}" alt="Petugas Ajib" /></span>'
                );
                selectOption(".gambar_utama_slider_input2");

                // new
                // $("#photo_ajib").html(
                //     '<span class="avatar" "><img style="border-radius:10px" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                //         data.name +
                //         '.jpg") }}" alt="Petugas Ajib" /></span>'
                // );

                // const koor_kelurahan = data.kordinat;
                // getAjibKelurahan(koor_kelurahan);
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
                $("#penempatan").html(
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

                    $("#penempatan").html(
                        "<div style='margin-top: 0.4rem;'>AJIB " +
                            data.penempatan.substr(19) +
                            "</div>"
                    );

                    // if (data.kelurahan != null) {
                    //     $("#kelurahan_ajib").html(
                    //         data.kelurahan.charAt(0).toUpperCase() +
                    //             data.kelurahan.slice(1).toLowerCase()
                    //     );
                    // } else {
                    //     $("#kelurahan_ajib").html(
                    //         "<span class='badge bg-danger'>Koordinat tidak tepat</span>"
                    //     );
                    // }

                    if (data.catatan != null) {
                        $("#deskripsi").html(
                            data.catatan.charAt(0).toUpperCase() +
                                data.catatan.slice(1).toLowerCase()
                        );
                    } else {
                        $("#deskripsi").html(data.catatan);
                    }

                    if (data.permasalahan != null) {
                        $("#permasalahan").html(
                            data.permasalahan.charAt(0).toUpperCase() +
                                data.permasalahan.slice(1).toLowerCase()
                        );
                    } else {
                        $("#permasalahan").html(data.permasalahan);
                    }

                    $("#solusi").html(data.solusi);

                    $(".gambar_utama_slider_input2").html(
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
                    selectOption(".gambar_utama_slider_input2");

                    // const koor_kelurahan = data.kordinat;
                    // getAjibKelurahan(koor_kelurahan);
                });
            },
        });
    });
});

const selectOption = (name) => {
    $(name).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: true,
        arrows: true,
    });
};

function dataTebaruPerkembangan() {
    $.ajax({
        url: `/admin/fetch-perkembangan`,
        method: "GET",
        dataType: "json",

        beforeSend: function () {
            $("#name_perkembangan").html(
                '<div class="skeleton-heading"></div>'
            );

            $("#penempatan_perkembangan").html(
                '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
            );

            $("#kordinat").html('<div class="skeleton-heading"></div>');
            $("#name").html('<div class="skeleton-heading"></div>');
            $("#namesurvey").html('<div class="skeleton-heading"></div>');
            $("#id_sub_blok").html('<div class="skeleton-heading"></div>');
            $("#kelurahan").html('<div class="skeleton-heading"></div>');
            $("#kecamatan").html('<div class="skeleton-heading"></div>');
            $("#regional").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_regional").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#neighborhood").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_neighborhood").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#transect_zone").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_transect_zone").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#gambar_utama_perkembangan").html(
                ' <div class="skeleton-image"></div>'
            );
            $("#photo_ajib_perkembangan").html(
                '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
            );
        },

        success: function (e) {
            // console.log(e.perkembangan);

            let data = e.perkembangan[0];

            // $.each(e.perkembangan, function (key, data) {
            // console.log(e.perkembangan[0]);

            $("#name_perkembangan").html(data.user.name);
            $("#namesurvey").html(data.name);

            let text3 = String(data.kecamatan);
            let result3 = kapital(text3);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#penempatan_perkembangan").html(
                "<div'>AJIB " + result3 + "</div>"
            );

            $("#kordinat").html(
                `<a class="font-weight-bold" style="text-decoration:none;" href="https://www.google.com/maps/search/%09${data.kordinat}" target="_blank">${data.kordinat}</a>`
            );

            $("#id_sub_blok").html(data.id_sub_blok);

            let text = String(data.kelurahan);
            let result = kapital(text);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#kelurahan").html(result);

            let text2 = String(data.kecamatan);
            let result2 = kapital(text2);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#kecamatan").html(result2);

            $("#regional").html(data.regional);
            $("#deskripsi_regional").html(data.deskripsi_regional);
            $("#neighborhood").html(data.neighborhood);
            $("#deskripsi_neighborhood").html(data.deskripsi_neighborhood);
            $("#transect_zone").html(data.transect_zone);
            $("#deskripsi_transect_zone").html(data.transect_zone);

            // console.log(data.image[0].name);

            $("#photo_ajib_perkembangan").html(
                '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                    data.user.avatar +
                    '") }}" alt="Petugas Ajib" /></span>'
            );

            // $(".gambar_utama_slider_input").html(
            //     '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/' +
            //         data.name +
            //         '" /> '
            // );
            // console.log(data.image);

            array = data.image;

            var datagambar = "";
            // console.log(array);
            array.forEach((e) => {
                // console.log(e);

                datagambar += `<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/${e.name}" alt="First slide"></div>`;
                // console.log(datagambar);
            });

            $(".gambar_utama_slider_input").html(datagambar);
            selectOption(".gambar_utama_slider_input");

            // });
        },
    });
}

$(document).ready(function () {
    $(".img_child_id_perkembangan").on("click", function () {
        var id_data_terbaru = $(this).attr("data-id");
        // console.log(id_data_terbaru);

        $.ajax({
            url: `/admin/perkembangan-terbaru/${id_data_terbaru}`,
            type: "get",
            dataType: "json",
            beforeSend: function () {
                $("#name_perkembangan").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#namesurvey").html('<div class="skeleton-heading"></div>');

                $("#penempatan_perkembangan").html(
                    '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
                );

                $("#kordinat").html('<div class="skeleton-heading"></div>');
                $("#id_sub_blok").html('<div class="skeleton-heading"></div>');
                $("#kelurahan").html('<div class="skeleton-heading"></div>');
                $("#kecamatan").html('<div class="skeleton-heading"></div>');
                $("#regional").html('<div class="skeleton-heading"></div>');
                $("#deskripsi_regional").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#neighborhood").html('<div class="skeleton-heading"></div>');
                $("#deskripsi_neighborhood").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#transect_zone").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#deskripsi_transect_zone").html(
                    '<div class="skeleton-heading"></div>'
                );

                $("#gambar_utama_perkembangan").html(
                    ' <div class="img_parents skeleton-image"></div>'
                );

                $("#photo_ajib_perkembangan").html(
                    '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
                );

                // $("#gambar_utama_perkembangan2").html(
                //     ' <div class="img_parents skeleton-image"></div>'
                // );

                // $("#photo_ajib_perkembangan2").html(
                //     '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
                // );
            },
            success: function (e) {
                // console.log(e.perkembangan);
                let data = e.perkembangan;

                // console.log(data.image.name.length == 0);

                $("#name_perkembangan").html(data.user.name);

                // $("#penempatan_perkembangan").html(
                //     "<div'>AJIB " + data.kecamatan + "</div>"
                // );

                let text3 = String(data.kecamatan);
                let result3 = kapital(text3);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#penempatan_perkembangan").html(
                    "<div'>AJIB " + result3 + "</div>"
                );

                $("#kordinat").html(
                    `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${data.kordinat}" target="_blank">${data.kordinat}</a>`
                );

                $("#id_sub_blok").html(data.id_sub_blok);
                $("#namesurvey").html(data.name);

                let text = String(data.kelurahan);
                let result = kapital(text);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#kelurahan").html(result);

                let text2 = String(data.kecamatan);
                let result2 = kapital(text2);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#kecamatan").html(result2);

                $("#regional").html(data.regional);
                $("#deskripsi_regional").html(data.deskripsi_regional);
                $("#neighborhood").html(data.neighborhood);
                $("#deskripsi_neighborhood").html(data.deskripsi_neighborhood);
                $("#transect_zone").html(data.transect_zone);
                $("#deskripsi_transect_zone").html(data.transect_zone);

                // console.log(data.image[0].name);
                // console.log(data.image[1].name);
                // console.log(data.image[2].name);

                array = data.image;
                // console.log(array);
                // console.log(array.map((e) => e.name));
                // ImgArray = array.map((e) => e.name);
                // $(".gambar_utama_slider_input").html("");
                var datagambar = "";
                // console.log(ImgArray);
                array.forEach((e) => {
                    // console.log(e);

                    datagambar += `<div><img class="w-100" src="https://jakpintas.dpmptsp-dki.com/survey/${e.name}" alt="First slide"></div>`;
                    // console.log(element);
                });

                // console.log(datagambar);

                if (
                    $(
                        "div.gambar_utama_slider_input.slick-initialized.slick-slider"
                    ).length == 0
                ) {
                    $(".gambar_utama_slider_input").html("");
                    $(".gambar_utama_slider_input").html(datagambar);
                    selectOption(".gambar_utama_slider_input");
                } else {
                    $(".gambar_utama_slider_input").slick("unslick");
                    $(".gambar_utama_slider_input").html("");
                    $(".gambar_utama_slider_input").html(datagambar);
                    selectOption(".gambar_utama_slider_input");
                }

                // for (let x = 0; x < ImgArray.length; x++) {
                //     let element = `<div><img class="w-100" src="https://jakpintas.dpmptsp-dki.com/survey/${ImgArray[x]}" alt="First slide"></div>`;
                //     // $(".gambar_utama_slider_input").slick("slickAdd", element);
                //     // document.querySelector(".images").innerHTML += element;
                //     // console.log(element);

                //     // $(
                //     //     "div.gambar_utama_slider_input.slick-initialized.slick-slider"
                //     // ).length;

                //     if (
                //         $(
                //             "div.gambar_utama_slider_input.slick-initialized.slick-slider"
                //         ).length == 0
                //     ) {
                //         $(".gambar_utama_slider_input").html("");
                //         $(".gambar_utama_slider_input").html(element);
                //         selectOption("gambar_utama_slider_input");
                //     } else {
                //         $(".gambar_utama_slider_input").slick("unslick");
                //         $(".gambar_utama_slider_input").html("");
                //         $(".gambar_utama_slider_input").html(element);
                //         selectOption("gambar_utama_slider_input");
                //     }
                // }
                // for (let x = 0; x < ImgArray.length; x++) {
                //     let element = `<div class="carousel-item ${
                //         x == 0 ? "active" : ""
                //     }"><img class="d-block w-100" src="https://jakpintas.dpmptsp-dki.com/survey/${
                //         ImgArray[x]
                //     }" alt="First slide"></div>`;

                //     document.querySelector(".images").innerHTML += element;
                //     console.log($(this));
                // }

                // for (element of array) {
                //     console.log(element.map((e) => e.name));
                //     output = element.map((e) => e.name);
                //     console.log(element);
                //     // $("#gambar_utama_perkembangan").html(
                //     //     '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/' +
                //     //         output +
                //     //         '" /> '
                //     // );
                // }

                // if (data.image[0].name.length == 0) {
                //     $("#gambar_utama_perkembangan2").html(
                //         '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/not_image.png" /> '
                //     );
                // } else {
                //     $("#gambar_utama_perkembangan2").html(
                //         '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/' +
                //             data.image.name +
                //             '" /> '
                //     );
                // }

                // console.log(data.user.name);

                // $("#photo_ajib_perkembangan").html(
                //     '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                //         data.user.name +
                //         '.jpg") }}" alt="Petugas Ajib" /></span>'
                // );

                $("#photo_ajib_perkembangan").html(
                    '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                        data.user.avatar +
                        '") }}" alt="Petugas Ajib" /></span>'
                );
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
            $("#kelurahan_ajib").html(
                '<div style="margin-top: 0.4rem;" class="skeleton-heading"></div>'
            );
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);

            const prop = dtResp.features[0].properties;

            if (dtResp.features != null) {
                // $("#kelurahan_ajib").html(`${prop.Kelurahan}`);
                $("#kelurahan_ajib").html(
                    "<div style='margin-top: 0.4rem;'>AJIB " +
                        prop.Kelurahan.charAt(0).toUpperCase() +
                        prop.Kelurahan.slice(1).toLowerCase() +
                        "</div>"
                );
            }
        },
    });
}

// $(document).ready(function () {
//     $("#selectOption").change(function () {
//         var kel = $("#selectOption").val();

//         console.log(kel);

//         $.ajax({
//             url: `/admin/Kelurahan/${kel}`,
//             method: "GET",
//             dataType: "json",

//             success: function (e) {
//                 $.each(e.get_kelurahan, function (key, data) {
//                     console.log(e.get_kelurahan);

//                     $("#judul_ekspor").html(data.judul);

//                     // console.log(get_kelurahan)

//                     // let str = JSON.stringify(get_kelurahan);
//                     // var cek = window.sessionStorage.setItem("get_kelurahan", str);
//                 });
//             },
//         });
//     });
// });
