var url = "http://103.146.202.108:3000";
var kilometer = $("#ControlRange").val() / 1000;
$("#OutputControlRange").html(kilometer + " Km");
$(document).on("input change", "#ControlRange", function () {
    var kilometer = $(this).val() / 1000;
    $("#OutputControlRange").html(kilometer + " Km");
});

// $(".wm-search__dropdown").hide();

var selector = ".menu_active .tombol_menu";

$(selector).on("click", function () {
    $(selector).removeClass("active");
    $(this).addClass("active");
});

$("#hide_side_bar").click(function () {
    $("#sidebar").hide();
    $("#show_side_bar").css("display", "block");
    $(this).hide();
});
$("#show_side_bar").click(function () {
    $("#sidebar").show();
    $("#hide_side_bar").css("display", "block");
    $(this).hide();
});
mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
});
const draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
        polygon: true,
        trash: true,
    },
});
map.addControl(new mapboxgl.NavigationControl());

map.addControl(draw);

map.on("draw.create");
map.on("draw.delete");
map.on("draw.update");

// Chart
new Chart(document.getElementById("pie-chart"), {
    type: "pie",
    data: {
        labels: ["Kel A", "Kel B", "Kel C"],
        datasets: [
            {
                label: "Kelurahan",
                backgroundColor: [
                    "#3e95cd",
                    "#8e5ea2",
                    "#3cba9f",
                    "#e8c3b9",
                    "#c45850",
                ],
                data: [478, 267, 734],
            },
        ],
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
        labels: ["1900", "1950", "1999", "2050"],
        datasets: [
            {
                label: "Kecamatan A",
                backgroundColor: "#3e95cd",
                data: [133, 221, 783, 478],
            },
            {
                label: "Kecamatan B",
                backgroundColor: "#8e5ea2",
                data: [832, 447, 175, 534],
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Jumlah",
        },
    },
});

//Cari Wilayah

$("#cari_wilayah").bindWithDelay(
    "keyup",
    function () {
        var query = $(this).val();
        var resHTML = "";

        if (query != "" && query.length >= 3) {
            if (query.indexOf("-") > -1) {
                const koor = query.split(",");
                $.ajax({
                    url: `${url}/wilayah/${koor[1]}/${koor[0]}`,
                    method: "get",
                    dataType: "json",
                    beforeSend: function () {
                        // ('.map-loading').show()
                    },
                    success: function (res) {
                        if (res.features != null) {
                            const dt = res.features;
                            for (var i in dt) {
                                var prop = dt[i].properties;
                                resHTML += `<li class="wm-li-result wilayah-select" data-kordinat="${koor}" data-wilayah="${prop["Kelurahan"]}"><i class="fa fa-map-marker" style="font-size: 15px;"></i> ${prop["Kelurahan"]}</li>`;
                            }

                            $(".wm-search__dropdown").fadeIn();
                            $(".wm-search__dropdown").html(resHTML);
                        } else {
                            $(".wm-search__dropdown").fadeOut();
                            $(".wm-search__dropdown").html("");
                        }
                    },
                    error: function (error) {
                        $(".wm-search__dropdown").html(
                            `<li class="wm-li-result">Data tidak ditemukan</li>`
                        );
                    },
                    complete: function () {
                        // $('.map-loading').hide()
                    },
                });
            } else {
                $.ajax({
                    url: `${url}/jalan/${query}`,
                    method: "get",
                    dataType: "json",
                    beforeSend: function () {
                        // $('.map-loading').show()
                    },
                    success: function (res) {
                        if (res.features != null) {
                            const dt = res.features;
                            for (var i in dt) {
                                var prop = dt[i].properties;
                                var koor = dt[i].geometry.coordinates;
                                resHTML += `<li class="wm-li-result text_all wilayah-select" data-kordinat="${koor[1]},${koor[0]}" data-wilayah="${prop["Kelurahan"]}"><i class="fa fa-map-marker" style="font-size: 15px;"></i> ${prop["Nama Jalan"]}, ${prop["Kelurahan"]}, ${prop["Kecamatan"]}, ${prop["Wilayah"]}</li>`;
                            }

                            $(".wm-search__dropdown").fadeIn();
                            $(".wm-search__dropdown").html(resHTML);
                        } else {
                            $(".wm-search__dropdown").fadeOut();
                            $(".wm-search__dropdown").html("");
                        }
                    },
                    error: function (error) {
                        $(".wm-search__dropdown").html(
                            `<li class="wm-li-result text_all">Data tidak ditemukan</li>`
                        );
                    },
                    complete: function () {
                        // $('.map-loading').hide()
                    },
                });
            }
        } else {
            $(".wm-search__dropdown").fadeOut();
            $(".wm-search__dropdown").html("");
        }
    },
    500
);

$(".mapboxgl-ctrl.mapboxgl-ctrl-attrib").css("visibility", "hidden");
