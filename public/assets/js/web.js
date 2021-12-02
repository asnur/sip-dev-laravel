var url = "http://103.146.202.108:3000";
var kilometer = $("#ControlRange").val() / 1000;
var clickEvent =
    "ontouchstart" in document.documentElement ? "touchstart" : "click";
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

map.on("style.load", function () {
    map.on(clickEvent, function (e) {
        // console.log(e);
        const coornya = e.lngLat;
        var lats = coornya.lat.toString();
        var lngs = coornya.lng.toString();
        lats = lats.slice(0, -7);
        lngs = lngs.slice(0, -7);
        // lat = lats;
        // long = lngs;
        // $(".inf-kordinat").html(
        //     `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${lats},${lngs}" target="_blank">${lats}, ${lngs}</a>`
        // );

        // $('#btnKonsultasi').attr('href', `mailto:asnurramdhani12@gmail.com?subject=Konsultasi%20Daerah&body=Saya%20Ingin%20Konsultasi%20Mengenai%20Daerah%20Pada%20Titik%20${lat},${long}`);
    });
    // Marker onclick
    const el = document.createElement("div");
    el.className = "marker";
    var marker = new mapboxgl.Marker(el);

    function add_marker(event) {
        var coordinates = event.lngLat;
        marker.setLngLat(coordinates).addTo(map);
    }
    map.on(clickEvent, add_marker);

    map.addSource("wilayahindex", {
        type: "geojson",
        data: `${url}/choro`,
    });

    map.addLayer({
        id: "wilayahindex_fill",
        type: "fill",
        source: "wilayahindex",
        paint: {
            "fill-color": [
                "interpolate",
                ["linear"],
                ["get", "Total omzet"],
                0,
                "#ffeda0",
                5000000000,
                "#ffe675",
                9000000000,
                "#ffdf52",
                13000000000,
                "#ffd61f",
                17000000000,
                "#e0b700",
                20396854609,
                "#caa502",
            ],
            "fill-opacity": 0.7,
            "fill-outline-color": "red",
        },
        layout: {
            visibility: "none",
        },
    });
});

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

const coordinatesGeocoder = function (query) {
    // Match anything which looks like
    // decimal degrees coordinate pair.
    const matches = query.match(
        /^[ ]*(?:Lat: )?(-?\d+\.?\d*)[, ]+(?:Lng: )?(-?\d+\.?\d*)[ ]*$/i
    );
    if (!matches) {
        return null;
    }

    function coordinateFeature(lng, lat) {
        return {
            center: [lng, lat],
            geometry: {
                type: "Point",
                coordinates: [lng, lat],
            },
            place_name: "Lat: " + lat + " Lng: " + lng,
            place_type: ["coordinate"],
            properties: {},
            type: "Feature",
        };
    }

    const coord1 = Number(matches[1]);
    const coord2 = Number(matches[2]);
    const geocodes = [];

    if (coord1 < -90 || coord1 > 90) {
        // must be lng, lat
        geocodes.push(coordinateFeature(coord1, coord2));
    }

    if (coord2 < -90 || coord2 > 90) {
        // must be lat, lng
        geocodes.push(coordinateFeature(coord2, coord1));
    }

    if (geocodes.length === 0) {
        // else could be either lng, lat or lat, lng
        geocodes.push(coordinateFeature(coord1, coord2));
        geocodes.push(coordinateFeature(coord2, coord1));
    }

    return geocodes;
};

var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken,
    localGeocoder: coordinatesGeocoder,
    mapboxgl: mapboxgl,
    // marker: false,
    reverseGeocode: true,
    flyTo: {
        easing: function (t) {
            return t;
        },
        zoom: 15,
    },
});

map.addControl(geocoder);

//add source layer
function addSourceLayer(item) {
    var api = ["wilayah", "zoning", "iumk", "sewa", "investasi"];

    for (var i = 0; i < api.length; i++) {
        const dt = api[i];
        if (map.getLayer(dt + "_fill")) {
            map.removeLayer(dt + "_fill");
            $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getLayer(dt + "_dot")) {
            map.removeLayer(dt + "_dot");
            $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getLayer(dt + "_line")) {
            map.removeLayer(dt + "_line");
            $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getSource(dt)) {
            map.removeSource(dt);
            $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }

        map.addSource(dt, {
            type: "geojson",
            data: url + "/" + dt + "/" + item,
        });
    }

    addLayers();
    $(".lblLayer").show();
    $(".closeCollapse").show();
    // $('#kbliTwo').show()
    // $('').show()
    onOffLayers();
}

//add layer
function addLayers() {
    map.addLayer({
        id: "wilayah_fill",
        type: "fill",
        source: "wilayah",
        paint: {
            "fill-color": "#00FFFF",
            "fill-opacity": 0.1,
            "fill-outline-color": "red",
        },
        layout: {
            visibility: "visible",
        },
    });
    // map.addLayer({
    //   'id': 'njop_fill',
    //   'type': 'fill',
    //   'source': 'njop',
    //   'paint': {
    //     'fill-color': ['get', 'marker-color'],
    //     'fill-opacity': 0.01
    //   },
    //   'layout': {
    //     'visibility': 'visible'
    //   },
    // });
    map.addLayer({
        id: "zoning_fill",
        type: "fill",
        source: "zoning",
        paint: {
            "fill-color": ["get", "fill"],
            "fill-opacity": 1,
        },
        layout: {
            visibility: "visible",
        },
    });

    map.addLayer({
        id: "investasi_fill",
        type: "fill",
        source: "investasi",
        paint: {
            "fill-color": "#888888",
            "fill-opacity": 0.4,
        },
        filter: ["==", "$type", "Polygon"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "investasi_dot",
        type: "symbol",
        source: "investasi",
        // paint: {
        //   "circle-radius": 6,
        //   "circle-color": "#B42222",
        //   "circle-stroke-color": "#ffffff",
        //   "circle-stroke-width": 2,
        // },
        filter: ["==", "$type", "Point"],
        layout: {
            "icon-image": "point",
            "icon-size": 1,
            visibility: "none",
        },
    });
    map.addLayer({
        id: "investasi_line",
        type: "line",
        source: "investasi",
        layout: {
            "line-join": "round",
            "line-cap": "round",
        },
        paint: {
            "line-color": "#888",
            "line-width": 8,
        },
        filter: ["==", "$type", "LineString"],
        layout: {
            visibility: "none",
        },
    });
    // map.addLayer({
    //   'id': 'bpn_fill',
    //   'type': 'fill',
    //   'source': 'bpn',
    //   'paint': {
    //     // 'fill-color': ['get', 'color'],
    //     'fill-opacity': 0.3
    //   },
    //   'layout': {
    //     'visibility': 'none'
    //   },
    // });
    // map.addLayer({
    //   'id': 'eksisting_fill',
    //   'type': 'fill',
    //   'source': 'eksisting',
    //   'paint': {
    //     'fill-opacity': 0.01
    //   },
    //   'layout': {
    //     'visibility': 'visible'
    //   },
    // });
    map.addLayer({
        id: "iumk_fill",
        type: "circle",
        source: "iumk",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        layout: {
            visibility: "none",
        },
    });
    map.addLayer({
        id: "sewa_fill",
        type: "circle",
        source: "sewa",
        paint: {
            "circle-color": "#ff0000",
            "circle-stroke-color": "#ffffff",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        layout: {
            visibility: "none",
        },
    });
}

function showLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "visible");
}

function hideLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "none");
}

function switchLayer(layer) {
    var layerId = layer.target.id;
    map.setStyle("mapbox://styles/menthoelsr/" + layerId);
}

function onOffLayers() {
    var toggleableLayerIds = [
        "wilayah_fill",
        "zoning_fill",
        "investasi_fill",
        "sewa_fill",
        "wilayahindex_fill",
        "iumk_fill",
        "investasi_dot",
        "investasi_line",
    ];
    var textCnt = [
        "Wilayah",
        "Peta Zonasi",
        "Proyek Potensial",
        "Harga Sewa Kantor",
        "Total Omzet Usaha Mikro Kecil",
        "Sebaran Usaha Mikro Kecil",
        "Investasi2",
        "Investasi3",
    ];

    // $("#menus").append("<label class='font-weight-bold'>Aktivasi</label>");
    for (var i = 0; i < toggleableLayerIds.length; i++) {
        var id = toggleableLayerIds[i];
        if (!document.getElementById(id)) {
            var div = document.createElement("div");
            div.className = "form-check " + id;

            var link = document.createElement("input");
            link.id = id;
            link.name = id;
            if (textCnt[i] == "Wilayah") {
                link.setAttribute("disabled", true);
            }
            link.className = "form-check-input mt-1";
            link.type = "checkbox";
            // link.value = id
            div.append(link);

            var label = document.createElement("label");
            label.htmlFor = id;
            label.className = "form-check-label";
            label.innerHTML = textCnt[i];
            div.appendChild(label);

            var mapLayer = map.getLayer(id);
            // console.log(mapLayer.visibility);

            if (mapLayer.visibility == "visible") {
                link.checked = true;
            } else {
                link.checked = false;
            }

            link.addEventListener("change", function (e) {
                var clickedLayer = this.id;
                e.preventDefault();
                e.stopPropagation();
                var pop = new mapboxgl.Popup({
                    closeButton: false,
                    closeOnClick: false,
                });
                var visibility = map.getLayoutProperty(
                    clickedLayer,
                    "visibility"
                );
                var popUp = new mapboxgl.Popup();
                if (visibility == "visible") {
                    hideLayer(clickedLayer);
                    popUp.remove();
                } else if (visibility == "none") {
                    showLayer(clickedLayer);
                    if (this.id == "sewa_fill") {
                        // console.log(popUpHarga);
                        var infoHarga = popUpHarga[0].features;
                        var checkBox = document.getElementById("sewa_fill");
                        for (
                            let index = 0;
                            index < popUpHarga[0].features.length;
                            index++
                        ) {
                            const pop = new mapboxgl.Popup({
                                closeButton: false,
                            })
                                .setLngLat(
                                    infoHarga[index]["geometry"]["coordinates"]
                                )
                                .setHTML(
                                    `Rp. ${separatorNum(
                                        infoHarga[index]["properties"]["Sewa"]
                                    )}`
                                )
                                .addTo(map);

                            $(".mapboxgl-popup-content").css(
                                "background",
                                "green"
                            );
                            $(".mapboxgl-popup-content").css("color", "white");
                            $(
                                ".mapboxgl-popup-anchor-top .mapboxgl-popup-tip,.mapboxgl-popup-anchor-top-left .mapboxgl-popup-tip, .mapboxgl-popup-anchor-top-right .mapboxgl-popup-tip"
                            ).css("border-bottom-color", "green");
                            $(
                                ".mapboxgl-popup-anchor-bottom .mapboxgl-popup-tip,.mapboxgl-popup-anchor-bottom-left .mapboxgl-popup-tip, .mapboxgl-popup-anchor-bottom-right .mapboxgl-popup-tip"
                            ).css("border-top-color", "green");
                            $(
                                ".mapboxgl-popup-anchor-left .mapboxgl-popup-tip"
                            ).css("border-right-color", "green");
                            $(
                                ".mapboxgl-popup-anchor-right .mapboxgl-popup-tip"
                            ).css("border-left-color", "green");
                        }
                    }
                } else {
                    $(this).prop("checked", false);
                    // alert("nda ada");
                }
            });

            $("#menus").append(div);
            $("#menus").show();
            $("#radiusSlide").show();
            $(".wilayah_fill").css("display", "none");
            $("#iumk_fill").prop("checked", false);
            $("#sewa_fill").prop("checked", false);
            $("#wilayahindex_fill").prop("checked", false);
            $(".investasi_dot").css("display", "none");
            $(".investasi_line").css("display", "none");
            $("#sewa_fill").on("change", function () {
                if ($(this).prop("checked") == true) {
                    $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").css(
                        "display",
                        ""
                    );
                    // console.log("remove");
                } else {
                    $(
                        "div.mapboxgl-popup.mapboxgl-popup-anchor-bottom"
                    ).remove();
                }
            });
        }
    }
}

$(document).on("click", ".wilayah-select", function () {
    $(".wm-search__dropdown").fadeOut();

    const coor = $(this).data("kordinat");
    const kel = $(this).data("wilayah");
    const text = $(this).text();
    $("#cari_wilayah").val(text);

    popUpHarga = [];
    // popUpHarga = getDataSewa(kel);
    console.log(coor.split(","));
    var coord = coor.split(",");

    geocoder.query(coor);
    addSourceLayer(kel);
});

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl"
).css("visibility", "hidden");

$(document).on("click", "#investasi_fill", function () {
    $("#investasi_dot").trigger("click");
    $("#investasi_line").trigger("click");
    // console.log("aaa");
});
