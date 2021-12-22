var url = "https://jakpintas.dpmptsp-dki.com:3000/";

// var clickEvent = "touchstart";
var clickEvent =
    "ontouchstart" in document.documentElement ? "touchstart" : "click";

var setAttrClick;
var cat = [];
var data_kbli;
var lokasi,
    zona,
    imgMaps,
    bpn,
    eksisting,
    chart,
    pendapatan,
    fasilitas,
    kbli_data,
    harga;
$("#kegiatanRuang, #skala, #kegiatanKewenangan").select2();

mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
});
$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo"
).css("visibility", "hidden");

map.addControl(new mapboxgl.NavigationControl());

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr("content");

$(".container.container_menu.for_mobile").hide();

map.on("style.load", function () {
    map.on(clickEvent, function (e) {
        // console.log(e);
        const coornya = e.lngLat;
        var lats = coornya.lat.toString();
        var lngs = coornya.lng.toString();
        lats = lats.slice(0, -7);
        lngs = lngs.slice(0, -7);
        var cord = [lats, lngs];
        koordinat(cord);
    });
    const el = document.createElement("div");
    el.className = "marker";
    var marker = new mapboxgl.Marker(el);

    function add_marker(event) {
        var coordinates = event.lngLat;
        marker.setLngLat(coordinates).addTo(map);
    }
    map.on(clickEvent, add_marker);

    // map.addSource("wilayahindex", {
    //     type: "geojson",
    //     data: `${url}/choro`,
    // });

    map.addSource("mobile_index", {
        type: "geojson",
        data: `${url}/choro`,
    });

    map.addLayer({
        id: "mobile_index-fill",
        type: "fill",
        source: "mobile_index",
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

map.on(clickEvent, "wilayah_fill", function (e) {
    var dt = e.features[0].properties;
    // console.log(e.features[0].properties);
    lokasi(dt);

    // setAttrClick = e;

    // getRadius(e);
});

map.on(clickEvent, "zoning_fill", function (e) {
    $(".container.container_menu.for_mobile").show();

    var dt = e.features[0].properties;
    var gsb = "";
    zonasi(dt);
    kode_kbli(dt["Sub Zona"]);

    // console.log(proyek);
    $(".dtKBLI").html("");
    if (dt["CD TPZ"] == " " || dt["CD TPZ"] !== "g") {
        gsb = `
        <p>Ketentuan GSB Bangunan Gedung bila Gedung Berada di sisi:</p>
        <ol style="margin-top:-15px">
          <li style="margin-left:-25px">Rencana Jalan Dengan Lebar ≤ 12m, Maka GSB: Sebesar 0,5 Kali Lebar Rencana Jalan Dari Sisi Terdekat Rencana Jalan;</li>
          <li style="margin-left:-25px">Rencana Jalan Dengan Lebar 12m – 26m, Maka GSB: 8m Dari Sisi Terdekat Rencana Jalan;</li>
          <li style="margin-left:-25px">Rencana Jalan Dengan Lebar ≥ 26m, Maka GSB: 10m Dari Sisi Terdekat Rencana Jalan;</li>
          <li style="margin-left:-25px">Jalan Eksisting Tanpa Rencana, Maka GSB: 2m Dari Sisi Terdekat Jalan Eksisting.</li>
        </ol>
        `;
    } else {
        gsb = `
        <p>Ketentuan GSB Bangunan Ditiadakan dan Diganti Dengan Pedestrian.</p>
        `;
    }
    $(".inf-zona").html(dt.Zona);
    $(".inf-subzona").html(dt["Sub Zona"] + " - " + titleCase(dt.Hirarki));
    $(".inf-blok").html(dt["Kode Blok"] + "/" + dt["Sub Blok"]);
    $(".inf-cdtpz").html(dt["CD TPZ"] == " " ? "-" : dt["CD TPZ"]);
    $(".inf-tpz").html(dt.TPZ == " " ? "-" : dt.TPZ);
    $(".inf-kdb").html(dt.KDB == " " ? "-" : dt.KDB);
    $(".inf-kdh").html(dt.KDH == " " ? "-" : dt.KDH);
    $(".inf-klb").html(dt.KLB == " " ? "-" : dt.KLB);
    $(".inf-gsb").html(gsb);

    zona = `
    <div class="col-sm-12 mt-5 mb-5">
    <div class="row">
            <div class="col-sm-12 font-weight-bold">Rencana Kota</div>
            <div class="col-sm-4">Zona</div>
            <div class="col-sm-8">${dt.Zona}</div>
            <div class="col-sm-4">Sub Zona</div>
            <div class="col-sm-8">${dt["Sub Zona"]}</div>
            <div class="col-sm-4">Kode Blok</div>
            <div class="col-sm-8">${dt["Kode Blok"]}</div>
            <div class="col-sm-4">Sub Blok</div>
            <div class="col-sm-8">${dt["Sub Blok"]}</div>
            <div class="col-sm-4">CD TPZ</div>
            <div class="col-sm-8">${dt["CD TPZ"]}</div>
            <div class="col-sm-4">TPZ</div>
            <div class="col-sm-8">${dt.TPZ}</div>
            <div class="col-sm-4">KDB</div>
            <div class="col-sm-8">${dt.KDB}</div>
            <div class="col-sm-4">KDH</div>
            <div class="col-sm-8">${dt.KDH}</div>
            <div class="col-sm-4">KLB</div>
            <div class="col-sm-8">${dt.KLB}</div>
            <div class="col-sm-12">
              ${gsb}
            </div>
          </div>
      </div>
      `;

    // dropDownKegiatan(dt["Sub Zona"]);
    // $("#kegiatanRuang").change(function () {
    //     $("#skala").html("");
    //     $(".dtKBLI").html("");
    //     var sel = $(this).select2("val");
    //     // console.log(sel);
    //     DropdownSkala(dt["Sub Zona"], sel);
    //     $("#skala").change(function () {
    //         $(".dtKBLI").html("");
    //         var skala = $(this).select2("val");
    //         dropDownKegiatanKewenangan(dt["Sub Zona"], sel, skala);
    //         $("#btn-print").hide();
    //     });
    // });
});

// function dropDownKegiatan(subzona) {
//     $.ajax({
//         url: `${APP_URL}/kbli/${subzona}`,
//         method: "get",
//         dataType: "json",
//         success: function (e) {
//             // $("#kegiatanRuang").html("");
//             // $("#skala").html("");
//             // $("#kegiatanKewenangan").html("");
//             var htmlContent = "";
//             $("#btn-print").hide();
//             htmlContent += `<option>Pilih...</option>`;
//             var data = e;
//             for (i in data) {
//                 // console.log(data[i]["Kegiatan Ruang"]);
//                 htmlContent += `<option class="text_all" value="${data[i]["Kegiatan Ruang"]}">${data[i]["Kegiatan Ruang"]}</option>`;
//             }
//             $("#kegiatanRuang").html(htmlContent);
//             console.log(htmlContent);
//         },
//         error: function (error) {
//             console.log(error);
//             // alert('data tidak ada')
//         },
//     });
// }

// function DropdownSkala(zonasi, sel) {
//     var resHTML = "";
//     $("#kegiatanKewenangan").html("");
//     $.ajax({
//         url: `${APP_URL}/kbli/${zonasi}/${sel}`,
//         method: "get",
//         dataType: "json",
//         success: function (res) {
//             $("#btn-print").hide();
//             if (res != null) {
//                 const prop = res;
//                 var jmlh = [];
//                 resHTML += "<option>Pilih....</option>";
//                 resHTML += "<optgroup label='Modal'>";
//                 for (var i in prop) {
//                     if (prop[i]["Skala"] == "MIKRO") {
//                         jmlh[0] = {
//                             skala: "MIKRO",
//                             jmlh_modal: "< Rp 1 Milyar",
//                             jml_omzet: "< Rp 2 Miliyar",
//                         };
//                     } else if (prop[i]["Skala"] == "KECIL") {
//                         jmlh[1] = {
//                             skala: "KECIL",
//                             jmlh_modal: "Rp 1-5 Milyar",
//                             jml_omzet: "Rp 2-15 Miliyar",
//                         };
//                     } else if (prop[i]["Skala"] == "MENENGAH") {
//                         jmlh[2] = {
//                             skala: "MENENGAH",
//                             jmlh_modal: "Rp 5-10 Milyar",
//                             jml_omzet: "Rp 15-50 Miliyar",
//                         };
//                     } else {
//                         jmlh[3] = {
//                             skala: "BESAR",
//                             jmlh_modal: "> Rp 10 Milyar",
//                             jml_omzet: "> Rp 50 Miliyar",
//                         };
//                     }
//                     // resHTML += `<option value="${prop[i]["Skala"]}">${jmlh}</option>`;
//                 }

//                 for (var i in jmlh) {
//                     resHTML += `<option value="${jmlh[i].skala}">${jmlh[i].jmlh_modal}</option>`;
//                 }
//                 resHTML += "</optgroup><optgroup label='Omzet'>";

//                 for (var i in jmlh) {
//                     resHTML += `<option value="${jmlh[i].skala}">${jmlh[i].jml_omzet}</option>`;
//                 }
//                 // for (var i in prop) {
//                 //   if (prop[i]['Skala'] == "MIKRO") {
//                 //       jmlh = '< Rp 2 Milyar'
//                 //   }else if (prop[i]['Skala'] == "KECIL") {
//                 //       jmlh = 'Rp 2-5 Milyar'
//                 //   }else if (prop[i]['Skala'] == "MENENGAH") {
//                 //     jmlh = 'Rp 15-50 Milyar'
//                 //   }else{
//                 //     jmlh = '> Rp 50 Milyar'
//                 //   }
//                 //   resHTML += `<option value="${prop[i]["Skala"]}">${jmlh}</option>`;
//                 // }

//                 resHTML += "</optgroup>";

//                 // console.log(jmlh);

//                 $("#skala").html(resHTML);
//             }
//         },
//         error: function (error) {
//             console.log(error);
//             // alert('data tidak ada')
//         },
//     });
// }

// function dropDownKegiatanKewenangan(zonasi, sel, skala) {
//     $.ajax({
//         url: `${APP_URL}/kbli/${zonasi}/${sel}/${skala}`,
//         method: "get",
//         dataType: "json",
//         success: function (res) {
//             var resHTML = "";
//             if (res != null) {
//                 const prop = res;
//                 data_kbli = res;
//                 resHTML += "<option>Pilih....</option>";
//                 for (var i in prop) {
//                     resHTML += `<option value="${i}" data-index="${i}">${prop[i]["Kegiatan"]}-${prop[i]["Kewenangan"]}</option>`;
//                 }

//                 $("#kegiatanKewenangan").html(resHTML);
//             }
//         },
//         error: function (error) {
//             console.log(error);
//             // alert('data tidak ada')
//         },
//     });
// }

function titleCase(str) {
    str = str.toLowerCase().split(" ");
    for (var i = 0; i < str.length; i++) {
        str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
    }
    return str.join(" ");
}

function lokasi(e) {
    var data = e;
    $.ajax({
        url: setLokasi,
        method: "post",
        data: {
            _token: CSRF_TOKEN,
            lokasi: data,
        },
        success: function (e) {},
    });
}

function koordinat(e) {
    var data = e;
    $.ajax({
        url: setKordinat,
        method: "post",
        data: {
            _token: CSRF_TOKEN,
            kordinat: data,
        },
        success: function (e) {
            // console.log(e);
        },
    });
}

function zonasi(e) {
    var data = e;
    $.ajax({
        url: setZonasi,
        method: "post",
        data: {
            _token: CSRF_TOKEN,
            zona: data,
        },
        success: function (e) {},
    });
}

function poi(e) {
    var data = e;
    $.ajax({
        url: setPoi,
        method: "post",
        data: {
            _token: CSRF_TOKEN,
            zona: data,
        },
        success: function (e) {},
    });
}

function kode_kbli(e) {
    var data = e;
    $.ajax({
        url: setKodekbli,
        method: "post",
        data: {
            _token: CSRF_TOKEN,
            kode_kbli: data,
        },
        success: function (e) {},
    });
}

//Cari Wilayah

$("#cari_wilayah_mobile").bindWithDelay(
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
    // onOffLayers();
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

$(document).on("click", ".wilayah-select", function () {
    $(".wm-search__dropdown").fadeOut();

    const coor = $(this).data("kordinat");
    const kel = $(this).data("wilayah");
    const text = $(this).text();
    $("#cari_wilayah_mobile").val(text);

    popUpHarga = [];
    popUpHarga = getDataSewa(kel);
    // console.log(coor.split(","));
    var coord = coor.split(",");

    geocoder.query(coor);
    addSourceLayer(kel);
});

function getDataSewa(kel) {
    var data = [];
    setTimeout(function () {
        $.ajax({
            url: `${url}/sewa/${kel}`,
            method: "GET",
            dataType: "json",
            success: function (e) {
                // console.log(e);
                data.push(e);
            },
        });
    }, 1000);

    return data;
}
