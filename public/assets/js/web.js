var url = "http://103.146.202.108:3000";
var kilometer = $("#ControlRange").val() / 1000;
let popUpHarga;
var setAttrClick;
var cat = [];
var data_kbli;
var clickEvent =
    "ontouchstart" in document.documentElement ? "touchstart" : "click";
$("#OutputControlRange").html(kilometer + " Km");
$(document).on("input change", "#ControlRange", function () {
    var kilometer = $(this).val() / 1000;
    $("#OutputControlRange").html(kilometer + " Km");
    getRadius(setAttrClick);
});

$("#btn-titik, #more-apps").hide();

$("#kegiatanRuang, #skala, #kegiatanKewenangan").select2();

const popup = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});
var $window = $(window);
var delay = (function () {
    var timer = 0;
    return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
    };
})();

function handleImgError() {
    $("#imgCardIUMK").hide();
}

// $(".wm-search__dropdown").hide();
$("#radiusSlide").hide();
$(".container_menu.for_web").hide();
$(".tab-content.for_web").hide();
$("hr.for_web").hide();
$(".btn_hide_side_bar.for_web").hide();
$(".detail_omzet").hide();
$(".detail_jumlah").hide();

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

// map.addControl(draw);

// map.on("draw.create");
// map.on("draw.delete");
// map.on("draw.update");

map.loadImage(
    `/assets/gambar/baseline_directions_subway_black_24dp.png`,
    function (error, image) {
        if (error) throw error;
        map.addImage("point", image);
    }
);

map.on("style.load", function () {
    // onOffLayers();
    map.on(clickEvent, function (e) {
        // console.log(e);
        const coornya = e.lngLat;
        var lats = coornya.lat.toString();
        var lngs = coornya.lng.toString();
        lats = lats.slice(0, -7);
        lngs = lngs.slice(0, -7);
        // lat = lats;
        // long = lngs;
        $(".inf-kordinat").html(
            `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${lats},${lngs}" target="_blank">${lats}, ${lngs}</a>`
        );

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

map.on("load", function () {
    // getSektorKBLI();

    const layers = ["0-4M", "5M-8M", "9M-12M", "13M-16M", "17M-20M", "> 20M"];
    const colors = [
        "#ffeda0",
        "#ffe675",
        "#ffdf52",
        "#ffd61f",
        "#e0b700",
        "#caa502",
    ];

    // create legend
    const legend = document.getElementById("legends");

    layers.forEach((layer, i) => {
        const color = colors[i];
        const item = document.createElement("div");
        const key = document.createElement("span");
        key.className = "legend-key";
        key.style.backgroundColor = color;

        const value = document.createElement("span");
        value.innerHTML = `${layer}`;
        item.appendChild(key);
        item.appendChild(value);
        legend.appendChild(item);
    });

    map.on("mousemove", ({ point }) => {
        const states = map.queryRenderedFeatures(point, {
            layers: ["wilayahindex_fill"],
        });
        document.getElementById("pd").innerHTML = states.length
            ? `<div>Kelurahan : ${
                  states[0].properties.Kelurahan
              }</div><p class="mb-0"><strong><em>Rp ${separatorNum(
                  states[0].properties["Total omzet"]
              )}</strong></em></p>`
            : `<p class="mb-0">Arahkan kursor untuk melihat data</p>`;
    });

    map.on("dblclick", (e) => {
        const states = map.queryRenderedFeatures(e.point, {
            layers: ["wilayahindex_fill"],
        });
        // map.flyTo({
        //   center: e.lngLat
        // });
        // actQ = geocoder.query(states[0].properties.Kelurahan)
        // addSourceLayer(actQ.inputString)
    });

    map.on(clickEvent, (e) => {
        // map.flyTo({
        //   center: e.lngLat,
        // zoom: 14
        // });
    });

    // onOffLayers();
});

map.on("mouseenter", "wilayah_fill", function () {
    map.getCanvas().style.cursor = "default";
});
map.on("mouseleave", "wilayah_fill", function () {
    map.getCanvas().style.cursor = "default";
});

map.on("mouseenter", "iumk_fill", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    const nosk = dt["Nomor SK"];
    const splitsk = nosk.split("/");
    const noskfix =
        splitsk[0] + "/**/*****************/*/*****/**/" + splitsk[6];
    const content = `<div class="card">
    <div class="imgcard-container">
      <img src="#" class="card-img-top" id="imgCardIUMK" alt="${dt["Nama Usaha"]}" style="height: 160px;object-fit: cover;display:none;">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama Usaha"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Pemilik Usaha :</b> ${dt["Pemilik Usaha"]}</span>
        <span class="d-block"><b>No. SK :</b> ${noskfix}</span>
        <span class="d-block"><b>Jenis Usaha :</b> ${dt["Jenis Usaha"]}</span>
        <span class="d-block"><b>Tenaga Kerja :</b> ${dt["Tenaga Kerja"]} Orang</span></div>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
    delay(function () {
        getIumk(e);
    }, 500);
});

map.on("mouseleave", "iumk_fill", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

map.on(clickEvent, "sewa_fill", function (e) {
    map.getCanvas().style.cursor = "pointer";
    var dt = e.features[0].properties;

    var windowsize = $window.width();
    if (windowsize < 768) {
        const content = `<div class="card">
      <div class="imgcard-container">
        <img src="#" class="card-img-top" id="imgCardIUMK" alt="${
            dt["Nama Usaha"]
        }" style="height: 160px;object-fit: cover;display:none;">
      </div>
      <div class="card-body p-2">
        <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama"]}</h6>
        <div style="line-height: 1.2;">
          <span class="d-block"><b>Harga Sewa :</b> Rp ${separatorNum(
              dt["Sewa"]
          )}/m&sup2; per tahun</span>
          <span class="d-block"><b>Alamat :</b> ${dt["Alamat"]}</span>
          <span class="d-block"><b>Koordinat :</b> <a href="" target="_blank" title="Klik disini untuk lihat di Google Maps">${
              dt["Lat"]
          }, ${dt["Long"]}</a></span>
        </div>
      </div>`;

        while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
            coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
        }
        popup.setLngLat(coordinates).setHTML(content).addTo(map);
    } else {
        var win = window.open(
            `https://www.google.com/maps/search/%09${dt["Lat"]},${dt["Long"]}`,
            "_blank"
        );
        if (win) {
            //Browser has allowed it to be opened
            win.focus();
        } else {
            //Browser has blocked it
            alert("Please allow popups for this website");
        }
    }
});

map.on("mouseenter", "sewa_fill", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="imgcard-container">
      <img src="http://jakpintas.dpmptsp-dki.com/rent/${
          dt["Foto"]
      }" class="card-img-top" style="height: 160px;object-fit: cover;">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Harga Sewa :</b> Rp ${separatorNum(
            dt["Sewa"]
        )}/m&sup2; per tahun</span>
        <span class="d-block"><b>Alamat :</b> ${dt["Alamat"]}</span>
        <span class="d-block"><b>Koordinat :</b> <a href="" target="_blank" title="Klik disini untuk lihat di Google Maps">${
            dt["Lat"]
        }, ${dt["Long"]}</a></span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "sewa_fill", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

map.on("mouseenter", "investasi_fill", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.lngLat;
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama"]}</h6>
      <span class="d-block" style="width: 300px"><b>Deskripsi :</b> ${dt["Deskripsi"]}</span>
        
        
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    $(".mapboxgl-popup-content").addClass("inves");
    $(this).css("width", "300px");
});

map.on("mouseleave", "investasi_fill", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});
map.on("mouseenter", "investasi_line", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates[0];
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama"]}</h6>
      <div style="line-height: 1.2;">
      <span class="d-block" style="width: 300px"><b>Deskripsi :</b> ${dt["Deskripsi"]}</span>      
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    $(".mapboxgl-popup-content").addClass("inves");
    $(this).css("width", "300px");
});

map.on("mouseleave", "investasi_line", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});
map.on("mouseenter", "investasi_dot", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Nama"]}</h6>
      <div style="line-height: 1.2;">
      <span class="d-block" style="width: 300px"><b>Deskripsi :</b> ${dt["Deskripsi"]}</span>      
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    $(".mapboxgl-popup-content").addClass("inves");
    $(this).css("width", "300px");
});

map.on("mouseleave", "investasi_dot", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});

map.on(clickEvent, "wilayah_fill", function (e) {
    var dt = e.features[0].properties;
    setAttrClick = e;
    // console.log(dt);
    $("#radiusSlide").show();
    $(".container_menu.for_web").show();
    $(".tab-content.for_web").show();
    $("hr.for_web").show();
    $(".btn_hide_side_bar.for_web").show();
    $(
        ".inf-iumk, .inf-omzet, .inf-pen-05, .inf-pen-610, .inf-pen-1115, .inf-pen-1620, .inf-pen-20, .inf-pen-na, .inf-kordinat, .inf-kelurahan, .inf-kecamatan, .inf-kota, .inf-luasarea, .inf-kepadatan, .inf-rasio, .inf-zona, .inf-subzona, .inf-blok, .inf-eksisting, .inf-harganjop, .inf-cdtpz, .inf-tpz, .inf-kdh, .inf-klb, .inf-kdh, .inf-gsb"
    ).html("-");

    getEksisting(e);
    getNJOP(e);
    getPersilBPN(e);
    getRadius(e);

    const larea = dt["luas-area"] / 10000;

    // Chart
    new Chart(document.getElementById("pie-chart"), {
        type: "pie",
        data: {
            labels: ["Produksi", "Perdagangan", "Jasa"],
            datasets: [
                {
                    label: "Kelurahan",
                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f"],
                    data: [dt.Produksi, dt.Perdagangan, dt.Jasa],
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
            labels: ["20-29", "30-39", "40-49", "50-59", "60-69"],
            datasets: [
                {
                    backgroundColor: "#3e95cd",
                    data: [dt.U1, dt.U2, dt.U3, dt.U4, dt.U5],
                },
            ],
        },
        options: {
            // title: {
            //     display: true,
            //     text: ["Usia", "Jumlah"],
            //     position: ["bottom", "left"],
            // },
            legend: {
                display: false,
            },
            scales: {
                yAxes: [
                    {
                        scaleLabel: {
                            display: true,
                            labelString: "Jumlah",
                            padding: 20,
                        },
                    },
                ],
                xAxes: [
                    {
                        scaleLabel: {
                            display: true,
                            labelString: "Usia",
                            padding: 20,
                        },
                    },
                ],
            },
        },
    });

    $(".inf-iumk").html(dt.Jumlah);
    $(".inf-omzet").html(separatorNum(dt["Total omzet"]));
    $(".inf-pen-05").html(dt.P1 + " %");
    $(".inf-pen-610").html(dt.P2 + " %");
    $(".inf-pen-1115").html(dt.P3 + " %");
    $(".inf-pen-1620").html(dt.P4 + " %");
    $(".inf-pen-20").html(dt.P5 + " %");
    $(".inf-pen-na").html(dt.P6 + " %");
    $(".inf-kelurahan").html(dt.Kelurahan);
    $(".inf-kecamatan").html(dt.Kecamatan);
    $(".inf-kota").html(dt.Kota);
    $(".inf-luasarea").html(larea.toFixed(2) + " ha");
    $(".inf-kepadatan").html(
        separatorNum(dt["Kepadatan-Penduduk"]) + " jiwa/km2"
    );
    $(".inf-rasio").html(dt.gini);
});

map.on(clickEvent, "zoning_fill", function (e) {
    var dt = e.features[0].properties;
    var gsb = "";
    // console.log(dt);
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
    $(".inf-subzona").html(dt["Sub Zona"] + " - " + dt.Hirarki);
    $(".inf-blok").html(dt["Kode Blok"] + "/" + dt["Sub Blok"]);
    $(".inf-cdtpz").html(dt["CD TPZ"] == " " ? "-" : dt["CD TPZ"]);
    $(".inf-tpz").html(dt.TPZ == " " ? "-" : dt.TPZ);
    $(".inf-kdb").html(dt.KDB == " " ? "-" : dt.KDB);
    $(".inf-kdh").html(dt.KDH == " " ? "-" : dt.KDH);
    $(".inf-klb").html(dt.KLB == " " ? "-" : dt.KLB);
    $(".inf-gsb").html(gsb);
    dropDownKegiatan(dt["Sub Zona"]);
    $("#kegiatanRuang").change(function () {
        $("#skala").html("");
        var sel = $(this).select2("val");
        // console.log(sel);
        DropdownSkala(dt["Sub Zona"], sel);
        $("#skala").change(function () {
            var skala = $(this).select2("val");
            dropDownKegiatanKewenangan(dt["Sub Zona"], sel, skala);
        });
    });
});

function getIumk(e) {
    const dt = e.features[0].properties;
    $.ajax({
        url: `https://iumk.perizinan-dev.com/api/getWithKoordinat`,
        method: "post",
        headers: {
            AUTHCODE: "9ee2f95d62b9f67f58ec288b1599cf9c",
            Accept: "application/json",
            "Content-Type": "application/x-www-form-urlencoded",
        },
        data: {
            lat: dt.Lat,
            lng: dt.Long,
        },
        beforeSend: function () {},
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            setTimeout(() => {
                // const img = document.getElementById('imgCardIUMK')
                // img.src = dtResp.data[0].file_foto_usaha
                addImageIumk(dtResp.data[0].file_foto_usaha, "#imgCardIUMK");
            }, 500);
        },
        error: function (error) {
            console.log(error);
        },
    });
}
function addImageIumk(imgSource, destination) {
    var img = $("#imgCardIUMK")
        .on("error", handleImgError)
        .attr("src", imgSource);
    $(destination).append(img);
    $(destination).show();
}
function getEksisting(e) {
    // $("#dtEksistingBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/eksisting/${e.lngLat.lng}/${e.lngLat.lat}`,
        method: "get",
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
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
        error: function (error) {
            console.log(error);
        },
        complete: function (e) {
            // $('.map-loading').hide()
        },
    });
}
function getNJOP(e) {
    // $("#dtNJOPBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/njop/${e.lngLat.lng}/${e.lngLat.lat}`,
        method: "get",
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            const prop = dtResp.features[0].properties;
            if (dtResp.features != null) {
                $(".inf-harganjop").html(
                    `Rp ${separatorNum(prop.Min)} - Rp ${separatorNum(
                        prop.Max
                    )} per m&sup2;`
                );
            }

            // hrg_min = separatorNum(prop.Min);
            // hrg_max = separatorNum(prop.Max);

            // harga += `
            //   <div class="col-sm-12">
            //     <div class="row">
            //       <div class="col-sm-4">Harga</div>
            //       <div class="col-sm-8">Rp. ${hrg_min} - ${hrg_max}</dic>
            //     </div>
            //   </div>
            // `;
        },
        error: function (error) {
            console.log(error);
        },
        complete: function (e) {
            // $('.map-loading').hide()
        },
    });
}
function getPersilBPN(e) {
    // $("#dtBpnBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/bpn/${e.lngLat.lng}/${e.lngLat.lat}`,
        method: "get",
        contentType: false,
        processData: false,
        cache: false,
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
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
        error: function (error) {
            console.log(error);
        },
        complete: function (e) {
            // $('.map-loading').hide()
        },
    });
}
function getRadius(e) {
    var tblRadData = "";
    var getRadVal = $("#ControlRange").val();
    $.ajax({
        url: `${url}/lon/${e.lngLat.lng}/lat/${e.lngLat.lat}/rad/${getRadVal}`,
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
                            class="btn btn-md btn-block text-left text_all text_poi1 tombol_search"
                            data-toggle="collapse" data-target="#${dt[0].name}" aria-expanded="true"
                            aria-controls="collapsePoiOne">
                            <b class="text_all_mobile">${dt[0].name}</b>
                        </button>
                    </div>
                    </div>
                    <div id="${dt[0].name}" class="collapse show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
                        <div class="card-body text_poi2 row_mid_judul">
                            <ul class="list-group list-group-flush PoiCollabse_mobile">
                `;

                // console.log(dt[0].name);

                for (var az in dt) {
                    const dta = dt[az];
                    htmlContent += `
                    <li style="list-style:none" class="listgroup-cust align-items-center text_all"> 
                        <div class="row">
                            <div class="col-md-8 text_all">
                            ${dta.fasilitas}
                            </div>
                            <div class="col-md-4 text-right">
                            <span>${Math.round(dta.jarak) / 1000} km</span>
                            </div>
                        </div>
                    </li>
                    `;
                    // console.log(dta.fasilitas, dta.jarak);
                }

                htmlContent += `</ul>
                </div>
            </div>`;
            }
            $(".tabListFasilitas").html(htmlContent);
        },
        error: function (error) {
            console.log(error);
        },
        complete: function (e) {
            // $('.map-loading').hide()
        },
    });
    // var htmlPopupRad = `<div class="col-3 pl-0">
    //                     <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    //                     </div>
    //                   </div>
    //                   <div class="col-9 pl-0 pr-0">
    //                   <div class="tab-content" id="tabListFasilitas">
    //                   </div>`;

    // $(".dtRadiusBot").html(htmlPopupRad);
    // $(".infoLokasi").show();
}

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
            // $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getLayer(dt + "_dot")) {
            map.removeLayer(dt + "_dot");
            // $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getLayer(dt + "_line")) {
            map.removeLayer(dt + "_line");
            // $("#menus").html("");
            $(".lblLayer").hide();
            $(".closeCollapse").hide();
            $("#radiusSlide").hide();
        }
        if (map.getSource(dt)) {
            map.removeSource(dt);
            // $("#menus").html("");
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
            visibility: "none",
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
    // var toggleableLayerIds = [
    //     "wilayah_fill",
    //     "zoning_fill",
    //     "investasi_fill",
    //     "sewa_fill",
    //     "wilayahindex_fill",
    //     "iumk_fill",
    //     "investasi_dot",
    //     "investasi_line",
    // ];
    // var textCnt = [
    //     "Wilayah",
    //     "Peta Zonasi",
    //     "Proyek Potensial",
    //     "Harga Sewa Kantor",
    //     "Total Omzet Usaha Mikro Kecil",
    //     "Sebaran Usaha Mikro Kecil",
    //     "Investasi2",
    //     "Investasi3",
    // ];

    //Wilayah
    if ($("#wilayahindex_fill").prop("checked") == true) {
        showLayer("wilayahindex_fill");
        $(".detail_omzet").show();
        $(".detail_jumlah").show();
    } else {
        hideLayer("wilayahindex_fill");
        $(".detail_omzet").hide();
        $(".detail_jumlah").hide();
    }

    $("#wilayahindex_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("wilayahindex_fill");
            $(".detail_omzet").show();
            $(".detail_jumlah").show();
        } else {
            hideLayer("wilayahindex_fill");
            $(".detail_omzet").hide();
            $(".detail_jumlah").hide();
        }
    });

    //Peta Zonasi
    if ($("#zoning_fill").prop("checked") == true) {
        showLayer("zoning_fill");
    } else {
        hideLayer("zoning_fill");
    }

    $("#zoning_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("zoning_fill");
        } else {
            hideLayer("zoning_fill");
        }
    });

    //Sebaran Usaha mikro kecil
    $("#iumk_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("iumk_fill");
        } else {
            hideLayer("iumk_fill");
        }
    });

    //Harga Sewa Kantor
    $("#sewa_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("sewa_fill");
            var infoHarga = popUpHarga[0].features;
            for (
                let index = 0;
                index < popUpHarga[0].features.length;
                index++
            ) {
                const pop = new mapboxgl.Popup({
                    closeButton: false,
                })
                    .setLngLat(infoHarga[index]["geometry"]["coordinates"])
                    .setHTML(
                        `Rp. ${separatorNum(
                            infoHarga[index]["properties"]["Sewa"]
                        )}`
                    )
                    .addTo(map);

                $(".mapboxgl-popup-content").css("background", "green");
                $(".mapboxgl-popup-content").css("color", "white");
                $(".mapboxgl-popup-tip").css("border-top-color", "green");
                $(".mapboxgl-popup-tip").css("border-bottom-color", "green");
            }
            $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").css(
                "display",
                ""
            );
        } else {
            hideLayer("sewa_fill");
            $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
        }
    });

    //proyek_potensial
    $("#investasi_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("investasi_fill");
        } else {
            hideLayer("investasi_fill");
        }
    });

    $("#investasi_dot").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("investasi_dot");
        } else {
            hideLayer("investasi_dot");
        }
    });

    $("#investasi_line").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("investasi_line");
        } else {
            hideLayer("investasi_line");
        }
    });

    // $("#menus").append("<label class='font-weight-bold'>Aktivasi</label>");
    // for (var i = 0; i < toggleableLayerIds.length; i++) {
    //     var id = toggleableLayerIds[i];
    //     if (!document.getElementById(id)) {
    //         var div = document.createElement("div");
    //         div.className = "form-check " + id;

    //         var link = document.createElement("input");
    //         link.id = id;
    //         link.name = id;
    //         if (textCnt[i] == "Wilayah") {
    //             link.setAttribute("disabled", true);
    //         }
    //         link.className = "form-check-input mt-1";
    //         link.type = "checkbox";
    //         // link.value = id
    //         div.append(link);

    //         var label = document.createElement("label");
    //         label.htmlFor = id;
    //         label.className = "form-check-label";
    //         label.innerHTML = textCnt[i];
    //         div.classList.add("text_all");
    //         div.appendChild(label);

    //         var mapLayer = map.getLayer(id);
    //         // console.log(mapLayer.visibility);

    //         if (mapLayer.visibility == "visible") {
    //             link.checked = true;
    //         } else {
    //             link.checked = false;
    //         }

    //         link.addEventListener("change", function (e) {
    //             var clickedLayer = this.id;
    //             e.preventDefault();
    //             e.stopPropagation();
    //             var pop = new mapboxgl.Popup({
    //                 closeButton: false,
    //                 closeOnClick: false,
    //             });
    //             var visibility = map.getLayoutProperty(
    //                 clickedLayer,
    //                 "visibility"
    //             );
    //             var popUp = new mapboxgl.Popup();
    //             if (visibility == "visible") {
    //                 hideLayer(clickedLayer);
    //                 popUp.remove();
    //             } else if (visibility == "none") {
    //                 showLayer(clickedLayer);
    //                 if (this.id == "sewa_fill") {
    //                     // console.log(popUpHarga);
    //                     var infoHarga = popUpHarga[0].features;
    //                     var checkBox = document.getElementById("sewa_fill");
    //                     for (
    //                         let index = 0;
    //                         index < popUpHarga[0].features.length;
    //                         index++
    //                     ) {
    //                         const pop = new mapboxgl.Popup({
    //                             closeButton: false,
    //                         })
    //                             .setLngLat(
    //                                 infoHarga[index]["geometry"]["coordinates"]
    //                             )
    //                             .setHTML(
    //                                 `Rp. ${separatorNum(
    //                                     infoHarga[index]["properties"]["Sewa"]
    //                                 )}`
    //                             )
    //                             .addTo(map);

    //                         $(".mapboxgl-popup-content").css(
    //                             "background",
    //                             "green"
    //                         );
    //                         $(".mapboxgl-popup-content").css("color", "white");
    //                         $(".mapboxgl-popup-tip").css(
    //                             "border-top-color",
    //                             "green"
    //                         );
    //                         $(".mapboxgl-popup-tip").css(
    //                             "border-bottom-color",
    //                             "green"
    //                         );
    //                         // $(".mapboxgl-popup-tip").css(
    //                         //     "border-left-color",
    //                         //     "green"
    //                         // );
    //                         // $(".mapboxgl-popup-tip").css(
    //                         //     "border-right-color",
    //                         //     "green"
    //                         // );
    //                     }
    //                 }
    //             } else {
    //                 $(this).prop("checked", false);
    //                 // alert("nda ada");
    //             }
    //         });

    //         $("#menus").append(div);
    //         $("#menus").show();
    //         $("#radiusSlide").show();
    //         $(".wilayah_fill").css("display", "none");
    //         $("#iumk_fill").prop("checked", false);
    //         $("#sewa_fill").prop("checked", false);
    //         $("#wilayahindex_fill").prop("checked", false);
    //         $(".investasi_dot").css("display", "none");
    //         $(".investasi_line").css("display", "none");
    //         $("#sewa_fill").on("change", function () {
    //             if ($(this).prop("checked") == true) {
    //                 $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").css(
    //                     "display",
    //                     ""
    //                 );
    //                 // console.log("remove");
    //             } else {
    //                 $(
    //                     "div.mapboxgl-popup.mapboxgl-popup-anchor-bottom"
    //                 ).remove();
    //             }
    //         });
    //         $("#wilayahindex_fill").on("change", function () {
    //             if ($(this).prop("checked") == true) {
    //                 $(".detail_omzet").show();
    //                 $(".detail_jumlah").show();
    //             } else {
    //                 $(".detail_omzet").hide();
    //                 $(".detail_jumlah").hide();
    //             }
    //         });
    //     }
    // }
}

$(document).on("click", ".wilayah-select", function () {
    $(".wm-search__dropdown").fadeOut();
    $("#btn-titik, #more-apps").show();

    const coor = $(this).data("kordinat");
    const kel = $(this).data("wilayah");
    const text = $(this).text();
    $("#cari_wilayah").val(text);

    popUpHarga = [];
    popUpHarga = getDataSewa(kel);
    console.log(coor.split(","));
    var coord = coor.split(",");

    geocoder.query(coor);
    addSourceLayer(kel);
});

// onOffLayers();

function separatorNum(val) {
    if (typeof val === "undefined" || val === null || val === "null") {
        return null;
    }
    val = parseFloat(val);
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

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

function dropDownKegiatan(subzona) {
    $.ajax({
        url: `${url}/kblia2/${subzona}`,
        method: "get",
        dataType: "json",
        success: function (e) {
            $("#kegiatanRuang").html("");
            $("#skala").html("");
            $("#kegiatanKewenangan").html("");
            var htmlContent = "";
            htmlContent += `<option>Pilih...</option>`;
            var data = e.features[0].properties;
            for (i in data) {
                // console.log(data[i]["Kegiatan Ruang"]);
                htmlContent += `<option class="text_all" value="${data[i]["Kegiatan Ruang"]}">${data[i]["Kegiatan Ruang"]}</option>`;
            }
            $("#kegiatanRuang").html(htmlContent);
        },
    });
}

function DropdownSkala(zonasi, sel) {
    var resHTML = "";
    $("#kegiatanKewenangan").html("");
    $.ajax({
        url: `${url}/kblib2/${zonasi}/${sel}`,
        method: "get",
        dataType: "json",
        success: function (res) {
            if (res.features != null) {
                const prop = res.features[0].properties;
                var jmlh = [];
                resHTML += "<option>Pilih....</option>";
                resHTML += "<optgroup label='Modal'>";
                for (var i in prop) {
                    if (prop[i]["Skala"] == "MIKRO") {
                        jmlh[0] = {
                            skala: "MIKRO",
                            jmlh_modal: "< Rp 1 Milyar",
                            jml_omzet: "< Rp 2 Miliyar",
                        };
                    } else if (prop[i]["Skala"] == "KECIL") {
                        jmlh[1] = {
                            skala: "KECIL",
                            jmlh_modal: "Rp 1-5 Milyar",
                            jml_omzet: "Rp 2-15 Miliyar",
                        };
                    } else if (prop[i]["Skala"] == "MENENGAH") {
                        jmlh[2] = {
                            skala: "MENENGAH",
                            jmlh_modal: "Rp 5-10 Milyar",
                            jml_omzet: "Rp 15-50 Miliyar",
                        };
                    } else {
                        jmlh[3] = {
                            skala: "BESAR",
                            jmlh_modal: "> Rp 10 Milyar",
                            jml_omzet: "> Rp 50 Miliyar",
                        };
                    }
                    // resHTML += `<option value="${prop[i]["Skala"]}">${jmlh}</option>`;
                }

                for (var i in jmlh) {
                    resHTML += `<option value="${jmlh[i].skala}">${jmlh[i].jmlh_modal}</option>`;
                }
                resHTML += "</optgroup><optgroup label='Omzet'>";

                for (var i in jmlh) {
                    resHTML += `<option value="${jmlh[i].skala}">${jmlh[i].jml_omzet}</option>`;
                }
                // for (var i in prop) {
                //   if (prop[i]['Skala'] == "MIKRO") {
                //       jmlh = '< Rp 2 Milyar'
                //   }else if (prop[i]['Skala'] == "KECIL") {
                //       jmlh = 'Rp 2-5 Milyar'
                //   }else if (prop[i]['Skala'] == "MENENGAH") {
                //     jmlh = 'Rp 15-50 Milyar'
                //   }else{
                //     jmlh = '> Rp 50 Milyar'
                //   }
                //   resHTML += `<option value="${prop[i]["Skala"]}">${jmlh}</option>`;
                // }

                resHTML += "</optgroup>";

                // console.log(jmlh);

                $("#skala").html(resHTML);
            }
        },
        error: function (error) {
            console.log(error);
            // alert('data tidak ada')
        },
    });
}

function dropDownKegiatanKewenangan(zonasi, sel, skala) {
    $.ajax({
        url: `${url}/kblic2/${zonasi}/${sel}/${skala}`,
        method: "get",
        dataType: "json",
        success: function (res) {
            var resHTML = "";
            if (res.features != null) {
                const prop = res.features[0].properties;
                data_kbli = res.features[0].properties;
                resHTML += "<option>Pilih....</option>";
                for (var i in prop) {
                    resHTML += `<option value="${i}" data-index="${i}">${prop[i]["Kegiatan"]}-${prop[i]["Kewenangan"]}</option>`;
                }

                $("#kegiatanKewenangan").html(resHTML);
            }
        },
        error: function (error) {
            console.log(error);
            // alert('data tidak ada')
        },
    });
}

$(document).on("change", "#kegiatanKewenangan", function () {
    const dis = $(this);
    selSektor = dis.val();
    var index = dis.data("index");
    $(".dtKBLI").html("");
    // console.log(data_kbli);
    var tblSel = "";
    tblSel += `
      <tr>
        <td class="text_all" style="vertical-align: top;"><a href="https://oss.go.id/informasi/kbli-kode?kode=G&kbli=${data_kbli[selSektor]["Kode KBLI"]}" target="_blank">${data_kbli[selSektor]["Kode KBLI"]}</a></td>
        <td class="text_all" style="vertical-align: top;">${data_kbli[selSektor]["Kegiatan"]}</td>
        <td class="text_all" style="vertical-align: top;">${data_kbli[selSektor]["Resiko"]}</td>
        <td class="text_all" style="vertical-align: top;">${data_kbli[selSektor]["Status"]}</td>
      </tr>
      <br>
      <tr>
        <td class="text_all font-weight-bold" colspan="4"><br>Ketentuan ITBX</td>
      </tr>
      <tr>
        <td class="text_all" class="bg-white" colspan="4">${data_kbli[selSektor]["Substansi"]}</td>
      </tr>
      `;
    $(".dtKBLI").html(tblSel);
});

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo"
).css("visibility", "hidden");

$(document).on("click", "#investasi_fill", function () {
    $("#investasi_dot").trigger("click");
    $("#investasi_line").trigger("click");
    // console.log("aaa");
});

$("#sewa_kantor").click(function () {
    $("#sewa_fill").trigger("click");
});

$("#iumk").click(function () {
    $("#iumk_fill").trigger("click");
});

$("#proyek").click(function () {
    $("#investasi_fill").trigger("click");
});
