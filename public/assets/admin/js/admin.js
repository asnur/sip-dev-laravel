mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
    zoom: 10.5,
    center: [106.8295257, -6.210588],
    preserveDrawingBuffer: true,
});

const popup = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});

map.on("style.load", () => {
    map.addSource("titik-survey", {
        type: "geojson", //geojson,video,image,canvas
        data: `${APP_URL}/admin/titik`,
    });

    map.addLayer({
        id: "titik-survey",
        type: "circle",
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        layout: {
            visibility: "visible",
        },
    });
});

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo"
).css("visibility", "hidden");

map.on("mouseenter", "titik-survey", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${
                data["foto"]
            }" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"><b>Kategori :</b> ${
                    data["kategori"]
                }</span>
                <span class="${
                    data["kbli"] == "null" ? "d-none" : "d-block"
                }"><b>KBLI :</b> ${data["kbli"]}</span>
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "titik-survey", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

const sum = (accumulator, a) => {
    return accumulator + a;
};

const logout = () => {
    $("#form-logout").submit();
};

$("#selectSurveyer").select2();

$("#tableKinerja").DataTable();

$("#selectSurveyer").on("change", function () {
    var data = $("#selectSurveyer").select2("val");
    // $("#test").val(data);
    $.ajax({
        url: `${APP_URL}/admin/kinerja`,
        method: "POST",
        beforeSend: () => {
            let html = `
            <td colspan="3">
                <center>
                    <div class="spinner-border" role="status" style="font-size: 20pt">
                        <span class="sr-only">Loading...</span>
                    </div>
                </center>
            </td>
            `;
            $("#dataSurvey").html("");
            $("#dataSurvey").html(html);
        },
        data: {
            id: data,
            _token: $('meta[name="csrf-token"]').attr("content"),
        },
        success: (e) => {
            let data = e;
            let html = "";
            $("#tableKinerja").DataTable().destroy();
            $("#dataSurvey").html("");
            data.forEach((e) => {
                html += `
                    <tr>
                        <td>${e.judul}</td>
                        <td><img src="https://jakpintas.dpmptsp-dki.com/mobile/img/${e.foto}" class="w-100" style="height:100px; object-fit:cover;"></td>
                        <td>${e.kategori}</td>
                    </tr>
                `;
                $("#dataSurvey").html(html);
            });
            $("#tableKinerja").DataTable();
        },
    });
});

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
    $("#penempatanUser").val(penempatan);
};

$.ajax({
    url: `/analytics/1`,
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
        url: `/analytics/${periode}`,
        method: "GET",
        success: (e) => {
            if (periode == 8) {
                $(".jumlah_hari").text(7);
                localStorage.setItem("interval", 8);
            } else {
                $(".jumlah_hari").text(periode);
                localStorage.setItem("interval", periode);
            }
            var ctx = document.getElementById("myAreaChart");
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
                                    maxTicksLimit: 7,
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
        },
    });
};

if (arrURL[4] == undefined) {
    $(window).on("load", () => {
        filterAnalytics(8);
    });

    setInterval(() => {
        filterAnalytics(localStorage.getItem("interval"));
    }, 10000);
}
