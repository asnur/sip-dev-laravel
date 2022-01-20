// var url = `${APP_URL}:3000`;
var url = `https://jakpintas.dpmptsp-dki.com:3000`;

var kilometer = $("#ControlRange").val() / 1000;
var tahun = $("#ControlTahunBanjir").val();
let popUpHarga;
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
var pie;
var bar;
var pie_kbli;
var bar_kbli;
var pie_info;
var bar_info;
var hrg_min = "";
var hrg_max = "";
var sebaran_usaha;
var proyek;
var budaya;
var name_file = Math.floor(Math.random() * 9999);
var status;
var count = 0;
var clickEvent =
    "ontouchstart" in document.documentElement ? "touchstart" : "click";
$("#OutputControlRange").html(kilometer + " Km");
$(document).on("input change", "#ControlRange", function () {
    var kilometer = $(this).val() / 1000;
    $("#OutputControlRange").html(kilometer + " Km");
    getRadius(setAttrClick);
});
$("#tahunBanjir").html(tahun);
$(document).on("input change", "#ControlTahunBanjir", function () {
    tahun = $(this).val();
    $("#tahunBanjir").html(tahun);
});

$("#kegiatanRuang, #skala, #kegiatanKewenangan").select2({
    theme: "bootstrap4",
});

function titleCase(str) {
    str = str.toLowerCase().split(" ");
    for (var i = 0; i < str.length; i++) {
        str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
    }
    return str.join(" ");
}

mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
    preserveDrawingBuffer: true,
});
const draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
        polygon: true,
        trash: true,
    },
});
map.addControl(new mapboxgl.NavigationControl());

// Add geolocate control to the map.
// Initialize the geolocate control.
let geolocate = new mapboxgl.GeolocateControl({
    positionOptions: {
        enableHighAccuracy: true,
    },
    trackUserLocation: true,
});
// Add the control to the map.
map.addControl(geolocate);
map.on("load", function () {
    localStorage.removeItem("kelurahan");
    localStorage.removeItem("subzona");
    geolocate.trigger(); // add this if you want to fire it by code instead of the button
});

geolocate.on("geolocate", locateUser);

function locateUser(e) {
    let current_kelurahan = localStorage.getItem("kelurahan");
    $.ajax({
        url: `${url}/zonasi/${e.coords.longitude}/${e.coords.latitude}`,
        method: "GET",
        dataType: "json",
        success: (e) => {
            let dt = e.features[0].properties;
            let current_subzona = localStorage.getItem("subzona");
            if (current_subzona !== dt["Sub Zona"]) {
                console.log(dt["Sub Zona"]);
                localStorage.setItem("subzona", dt["Sub Zona"]);
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
            }
        },
    });

    $.ajax({
        url: `${url}/wilayah/${e.coords.longitude}/${e.coords.latitude}`,
        method: "GET",
        dataType: "json",
        success: (e) => {
            let kelurahan = e.features[0].properties.Kelurahan;
            if (current_kelurahan !== kelurahan) {
                addSourceLayer(kelurahan);
                localStorage.setItem("kelurahan", kelurahan);
            }
            if (map.getLayer("survey_ajib") !== undefined) {
                map.moveLayer("zoning_fill", "survey_ajib");
            }
        },
    });

    $("#kordinatPinSurvey").val(`${e.coords.latitude},${e.coords.longitude}`);
    console.log("A geolocate event has occurred.");
    // console.log("lng:" + e.coords.z + ", lat:" + e.coords.latitude);
}

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo"
).css("visibility", "hidden");

// $(".container.container_menu.for_mobile").hide();
// $(".menuuu").hide();

// new1
// $(".hide_hlm_kbli").hide();
$(".hide_zoning_fill").show();

map.on("style.load", function () {
    // map.on("click", function (e) {
    //     // console.log(e);
    //     const coornya = e.lngLat;
    //     var lats = coornya.lat.toString();
    //     var lngs = coornya.lng.toString();
    //     lats = lats.slice(0, -9);
    //     lngs = lngs.slice(0, -9);

    //     var lats2 = coornya.lat.toString();
    //     var lngs2 = coornya.lng.toString();

    //     $("#kordinatPinSurvey").val(`${coornya.lat},${coornya.lng}`);

    //     $(".inf-kordinat").html(
    //         `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${lats2},${lngs2}" target="_blank">${lats}, ${lngs}</a>`
    //     );

    //     $("#btnSHP").attr(
    //         "href",
    //         `https://jakartagis.maps.arcgis.com/apps/webappviewer/index.html?id=8cbdcc76c2874ad384c545102dc57e5e&center=${lngs};${lats}&level=20`
    //     );
    // });
    // Marker onclick
    const el = document.createElement("div");
    el.className = "marker";
    var marker = new mapboxgl.Marker(el);

    // function add_marker(event) {
    //     var coordinates = event.lngLat;
    //     marker.setLngLat(coordinates).addTo(map);
    // }
    // map.on(clickEvent, add_marker);

    // map.addSource("wilayahindex", {
    //     type: "geojson",
    //     data: `${url}/choro`,
    // });

    // map.addLayer({
    //     id: "wilayahindex_fill",
    //     type: "fill",
    //     source: "wilayahindex",
    //     paint: {
    //         "fill-color": [
    //             "interpolate",
    //             ["linear"],
    //             ["get", "Total omzet"],
    //             0,
    //             "#ffeda0",
    //             5000000000,
    //             "#ffe675",
    //             9000000000,
    //             "#ffdf52",
    //             13000000000,
    //             "#ffd61f",
    //             17000000000,
    //             "#e0b700",
    //             20396854609,
    //             "#caa502",
    //         ],
    //         "fill-opacity": 0.7,
    //         "fill-outline-color": "red",
    //     },
    //     layout: {
    //         visibility: "none",
    //     },
    // });
});

map.on("getwilayah", "wilayah_fill", function (e) {
    var dt = e.features[0].properties;
    console.log(e);
    $(".dtKBLI").html("");
    $("#radiusSlide").show();
    setAttrClick = e;

    // console.log(dt);
    $(
        ".inf-iumk, .inf-omzet, .inf-pen-05, .inf-pen-610, .inf-pen-1115, .inf-pen-1620, .inf-pen-20, .inf-pen-na, .inf-kordinat, .inf-kelurahan, .inf-kecamatan, .inf-kota, .inf-luasarea, .inf-kepadatan, .inf-rasio, .inf-zona, .inf-subzona, .inf-blok, .inf-eksisting, .inf-harganjop, .inf-tpz, .inf-kdh, .inf-klb, .inf-kdb, .inf-kdh, .inf-gsb, .inf-k-tpz"
    ).html("-");

    getRadius(e);
    getNJOP(e);
    getPersilBPN(e);
    getEksisting(e);

    const larea = dt["luas-area"] / 10000;

    // Chart
    var chart_pie = $("#pie-chart").get(0).getContext("2d");
    var chart_bar = $("#bar-chart-grouped").get(0).getContext("2d");
    // var chart_pie_kbli = $("#pie-chart-kbli").get(0).getContext("2d");
    // var chart_bar_kbli = $("#bar-chart-grouped-kbli").get(0).getContext("2d");
    // var chart_pie_info = $("#pie-chart-info").get(0).getContext("2d");
    // var chart_bar_info = $("#bar-chart-grouped-info").get(0).getContext("2d");

    pie = new Chart(chart_pie, {
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
            bezierCurve: false,
            animation: 0,
        },
    });

    bar = new Chart(chart_bar, {
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
            bezierCurve: false,
            animation: 0,
        },
    });

    // pie_kbli = new Chart(chart_pie_kbli, {
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
    //         bezierCurve: false,
    //         animation: 0,
    //     },
    // });

    // bar_kbli = new Chart(chart_bar_kbli, {
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
    //         bezierCurve: false,
    //         animation: 0,
    //     },
    // });

    // pie_info = new Chart(chart_pie_info, {
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
    //         bezierCurve: false,
    //         animation: 0,
    //     },
    // });

    // bar_info = new Chart(chart_bar_info, {
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
    //         bezierCurve: false,
    //         animation: 0,
    //     },
    // });

    $(".inf-iumk").html(dt.Jumlah);
    $(".inf-omzet").html(separatorNum(dt["Total omzet"]));
    $(".inf-pen-05").html(dt.P1 + " %");
    $(".inf-pen-610").html(dt.P2 + " %");
    $(".inf-pen-1115").html(dt.P3 + " %");
    $(".inf-pen-1620").html(dt.P4 + " %");
    $(".inf-pen-20").html(dt.P5 + " %");
    $(".inf-pen-na").html(dt.P6 + " %");
    $(".inf-kelurahan").html(titleCase(dt.Kelurahan));
    $(".inf-kecamatan").html(titleCase(dt.Kecamatan));
    $(".inf-kota").html(titleCase(dt.Kota));
    $(".inf-luasarea").html(larea.toFixed(2) + " ha");
    $(".inf-kepadatan").html(
        separatorNum(dt["Kepadatan-Penduduk"]) + " jiwa/km2"
    );
    $(".inf-rasio").html(dt.gini);

    map.resize();
    var img = map.getCanvas().toDataURL("image/png");
    var width = $("#screenshotPlaceholder").width();
    var height = $("#screenshotPlaceholder").height();
    var imgHTML = `<img class="img-snapshot" src="${img}" width="${width}" height="${height}"/>`;
    $("#screenshotPlaceholder").empty();
    $("#screenshotPlaceholder").append(imgHTML);

    imgMaps = `
    <div>
    <h1 align="center">Info Lokasi</h1>
    <p class="font-weight-bold">Lokasi</p>
        <center>
          <img src="${img}" width="100%">
        </center>
  `;

    lokasi = `
<div class="row">
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-4">Kordinat</div>
      <div class="col-sm-8"><a class="text-black" href="${APP_URL}/?kat=konsul&lat=${
        e.lngLat.lat
    }&lng=${e.lngLat.lng}" target="_blank">${e.lngLat.lat}, ${
        e.lngLat.lng
    }</a></div>
    </div>
  </div>
  <div class="col-sm-12">
    <div class="row">
      <div class="col-sm-4">Kelurahan</div>
      <div class="col-sm-8">x</div>
      <div class="col-sm-4">Kecamatan</div>
      <div class="col-sm-8">x</div>
      <div class="col-sm-4">Wilayah</div>
      <div class="col-sm-8"x</div>
      <div class="col-sm-4">Rasio Gini</div>
      <div class="col-sm-8">${dt.gini}</div>
      <div class="col-sm-4">Kepadatan Penduduk</div>
      <div class="col-sm-8">${dt["Kepadatan-Penduduk"]} jiwa/km&sup2;</div>
      <div class="col-sm-4">Luas Kelurahan</div>
      <div class="col-sm-8">${larea.toFixed(2)} ha</div>
    </div>
  </div>
  <div class="col-sm-12 mt-5 mb-5">
  <div class="row">
      <div class="col-sm-12 font-weight-bold">Ekonomi</div>
      <div class="col-sm-4">Pelaku usaha mikro kecil </div>
      <div class="col-sm-8">${dt.Jumlah} Orang</div>
      <div class="col-sm-4">Total Omzet</div>
      <div class="col-sm-8">Rp ${separatorNum(dt["Total omzet"])} / bulan</div>
    </div>
  </div>
</div>
`;

    pendapatan = `
<br>
<div class="col-sm-12 mt-5">
    <div class="row">
        <div class="col-sm-12">Pendapatan Rata-Rata Perbulan</div>
        <div class="col-sm-4">0-5 Jt</div>
        <div class="col-sm-8">${dt.P1} %</div>
        <div class="col-sm-4">6-10 Jt</div>
        <div class="col-sm-8">${dt.P2} %</div>
        <div class="col-sm-4">11-15 Jt</div>
        <div class="col-sm-8">${dt.P3} %</div>
        <div class="col-sm-4">16-20 Jt</div>
        <div class="col-sm-8">${dt.P4} %</div>
        <div class="col-sm-4"> 20 Jt</div>
        <div class="col-sm-8">${dt.P5} %</div>
        <div class="col-sm-4">Tidak Menjawab</div>
        <div class="col-sm-8">${dt.P6} %</div>
    </div>
</div>
  `;

    // if (status !== 200) {
    //     setTimeout(() => {
    //         SavePDFtoServer();
    //     }, 1500);
    // }
});

map.on("click", "zoning_fill", function (e) {
    var dt = e.features[0].properties;
    var gsb = "";

    console.log(e.features);

    // $(".container.container_menu.for_mobile").show();
    $(".hide_hlm_kbli").show();
    // $(".hide_zoning_fill").show();
    // $(".menuuu").show();

    $(".gambar_logos").hide();

    $(".dtKBLI").html("");
    var dataabse_tpz = {
        a: `
            <p>Penyediaan Fasilitas Publik Berupa:</p>
            <ol style="margin-top:-15px">
                <li style="margin-left:-25px">Menyediakan Lahan Dan/Atau Membangun Rth Publik;</li>
                <li style="margin-left:-25px">Menyediakan Lahan Dan/Atau Membangun Rumah Susun Umum;</li>
                <li style="margin-left:-25px">Menyediakan Dan/Atau Membangun Waduk Atau Situ</li>
                <li style="margin-left:-25px">Menyediakan Infrastruktur;</li>
                <li style="margin-left:-25px">Menyediakan Jalur Dan Meningkatkan Kualitas Fasilitas Pejalan Kaki Yang Terintegrasi Dengan Angkutan Umum; <b>Dan/Atau</b></li>
                <li style="margin-left:-25px">Menyediakan Jalur Sepeda Yang Terintegrasi Dengan Angkutan Umum.</li>
            </ol>
            <p><b>Ketentuan Tambahan:</b>TPZ Bonus Dapat Dilakukan Di Dalam Lahan Perencanaan Dan/Atau Di Luar Lahan Perencanaan.</p>
        `,
        b: `
            <ol>
                <li style="margin-left:-25px">Pengalihan Hak Membangun Berupa Luas Lantai Dari Satu Persil Ke Persil Lain Dengan Zona Yang Sama Dalam Satu Batas Administrasi Kelurahan;</li>
                <li style="margin-left:-25px">Pengalihan Hak Membangun Berupa Luas Lantai Dari Satu Persil Ke Persil Lain Dengan Zona Yang Sama Dalam Kawasan Yang Dikembangkan Konsep Tod Diperkenankan Tidak Dalam Satu Blok;</li>
                <li style="margin-left:-25px">Hak Membangun Yang Dapat Dialihkan Berupa Luas Lantai Dari Selisih Batasan Klb Yang Ditetapkan Dalam Pz Dengan Klb Yang Telah Digunakan Dalam Kaveling;</li>
                <li style="margin-left:-25px">Pengalihan Hak Membangun Berupa Luas Lantai Tidak Diperkenankan Pada Zona Perumahan Kampung, Zona Perumahan Kdb Sedang-Tinggi, Dan Zona Perumahan Kdb Rendah;</li>
                <li style="margin-left:-25px">Penerima Pengalihan Luas Lantai Setinggi-Tingginya 50% (Lima Puluh Persen) Dari Klb Yang Ditetapkan Di Lahan Perencanaan Dimaksud;</li>
                <li style="margin-left:-25px">Pengalihan Luas Lantai  Hanya Dilakukan 1 (Satu) Kali;</li>
            </ol>
        `,
        c: `
            <ol>
                <li style="margin-left:-25px">Pembatasan Tinggi Bangunan, Tinggi Bangun-Bangunan Dan Jenis Kegiatan Sesuai Ketentuan Peraturan Perundang-Undangan.</li>
            </ol>
        `,
        d: `
            <ol>
                <li style="margin-left:-25px">Perubahan/Penambahan Kegiatan; Dan</li>
                <li style="margin-left:-25px">Penambahan Luas Lantai.</li>
            </ol>
        `,
        e: `
            <ol>
                <li style="margin-left:-25px">Pada Kawasan Taman Medan Merdeka (Taman Monas) Diperkenankan Pemanfaatan Ruang Bawah Tanah Sebagai Ruang Pamer, Pusat Informasi, Parkir, Dan Penunjang Serta Ruang Untuk Kepentingan Pertahanan Keamanan;</li>
                <li style="margin-left:-25px">Memiliki Dimensi Dan Ketentuan Pembangunan Sesuai Kebutuhan Dan Dilaksanakan Sesuai Ketentuan Peraturan Perundangan;</li>
                <li style="margin-left:-25px">Tidak Menimbulkan Dampak Negatif Terhadap Kawasan Sekitar;Dan</li>
                <li style="margin-left:-25px">Pada Lahan Pertanian Sawah Tidak Diperkenankan Ada Pengembangan Selain Kegiatan Pertanian.</li>
            </ol>
        `,
        "f.1": `
            <ol>
                <li style="margin-left:-25px">Menyediakan Gudang Bahan Baku Bersama;</li>
                <li style="margin-left:-25px">Menyediakan Ipal Komunal;</li>
                <li style="margin-left:-25px">Menyediakan Dapur Dengan Teknologi Ramah Lingkungan;</li>
                <li style="margin-left:-25px">Menyediakan Fasilitas Bongkar Muat Komunal; Dan</li>
                <li style="margin-left:-25px">Menjadi Anggota Wadah Atau Perkumpulan Yang Terdaftar Dan Diakui Oleh Pemerintah.</li>
            </ol>
        `,
        "f.2": `
            <ol>
                <li style="margin-left:-25px">Kegiatan Pemanfaatan Ruang Untuk Fungsi Komersial Dibatasi Paling Tinggi  50% (Lima Puluh Persen) Atau 2 (Dua) Lantai Dari Luas Seluruh Lantai Bangunan;</li>
                <li style="margin-left:-25px">Tipe Bangunan Deret Intensitas Pemanfaatan Ruang Kdb Paling Tinggi 50% (Lima Puluh Persen), Klb Paling Tinggi 2,0 (Dua Koma Nol), Ketinggian Bangunan Paling Tinggi 4 (Empat) Lantai, Kdh Paling Rendah 30% (Tiga Puluh Persen), Dan Ktb Paling Tinggi  55% (Lima Puluh Lima Persen);</li>
                <li style="margin-left:-25px">Pembangunan Harus Sesuai Karakter Lingkungan;</li>
                <li style="margin-left:-25px">Pengaturan Sistem Inlet Outlet Paling Kurang Setiap Jarak 60 M (Enam Puluh Meter) Dan Membuka Pagar Antar Persil;</li>
                <li style="margin-left:-25px">Menyediakan Jalur Pejalan Kaki Menerus Dengan Lebar Paling Kurang 3 M (Tiga Meter);</li>
                <li style="margin-left:-25px">Menyediakan Prasarana Parkir Dalam Persil; Dan</li>
                <li style="margin-left:-25px">Menyerahkan Lahan Yang Terkena Rencana Jalan Dan Saluran Kepada Pemerintah Daerah.</li>
            </ol>
        `,
        g: `
            <ol>
                <li style="margin-left:-25px">Kegiatan Hunian Diperkenankan Untuk Dirubah Tanpa Merubah Struktur Dan Bentuk Asli Bangunan Pada Kawasan Yang Dilalui Angkutan Umum Massal;</li>
                <li style="margin-left:-25px">Kegiatan Yang Diizinkan Terbatas, Bersyarat, Dan Diizinkan Terbatas Bersyarat Dalam Kawasan Cagar Budaya Ditetapkan Gubernur Setelah Mendapatkan Pertimbangan Dari Bkprd;</li>
                <li style="margin-left:-25px">Intensitas Pemanfaatan Ruang Bangunan Cagar Budaya Golongan A Dan Golongan B Sesuai Kondisi Bangunan Asli Yang Ditetapkan; Dan</li>
                <li style="margin-left:-25px">Pembangunan Baru Pada Kaveling Dalam Kawasan Cagar Budaya   Harus Menyesuaikan Dengan Karakter Kawasan Cagar Budaya.</li>
            </ol>
        `,
    };

    var value_tpz = ``;
    var option_tpz = ``;
    var data_tpz = dt["CD TPZ"];
    var arr_tpz = data_tpz.split(",");
    if (dt["CD TPZ"] == " ") {
        value_tpz += `
        <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Ketentuan TPZ</p>
        <p>Tidak Ada Ketentuan</p>`;
        option_tpz += `
            <option>Tidak Ada CD TPZ</option>
        `;
    } else {
        for (let index = 0; index < arr_tpz.length; index++) {
            value_tpz += `
            <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Ketentuan TPZ untuk CD TPZ ${arr_tpz[index]}</p>
            `;
            value_tpz += dataabse_tpz[`${arr_tpz[index]}`];
            option_tpz += `
                <option value="${arr_tpz[index]}">${arr_tpz[index]}</option>
            `;
        }
    }
    // console.log(value_tpz);

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
    $(".inf-subzona").html(dt["Sub Zona"]);
    $(".inf-blok").html(dt["Kode Blok"] + "/" + dt["Sub Blok"]);
    $(".inf-cdtpz").html(dt["CD TPZ"] == " " ? "-" : dt["CD TPZ"]);
    // $("#selectTPZ").html(option_tpz);
    $(".inf-tpz").html(dt.TPZ == " " ? "-" : dt.TPZ);
    $(".inf-kdb").html(dt.KDB == " " ? "-" : dt.KDB);
    $(".inf-kdh").html(dt.KDH == " " ? "-" : dt.KDH);
    $(".inf-klb").html(dt.KLB == " " ? "-" : dt.KLB);
    $(".inf-gsb").html(gsb);
    $(".inf-k-tpz").html(value_tpz);

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

    dropDownKegiatan(dt["Sub Zona"]);
    $("#kegiatanRuang").change(function () {
        $("#skala").html("");
        $(".dtKBLI").html("");
        var sel = $(this).select2("val");
        // console.log(sel);
        DropdownSkala(dt["Sub Zona"], sel);
        $("#skala").change(function () {
            $(".dtKBLI").html("");
            var skala = $(this).select2("val");
            dropDownKegiatanKewenangan(dt["Sub Zona"], sel, skala);
            $("#btn-print").hide();
        });
    });
});

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
                eksisting = `
                  <div class="col-sm-12">
                  <div class="row">
                        <div class="col-sm-12 font-weight-bold">Persil Tanah</div>
                        <div class="col-sm-4">Lahan Eksisting</div>
                        <div class="col-sm-8">${prop.Kegiatan}</div>
                      </div>
                    </div>
                    </tbody>
                  </table>
                  `;
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

            hrg_min = separatorNum(prop.Min);
            hrg_max = separatorNum(prop.Max);

            harga = `
            <div class="col-sm-8">Rp. ${hrg_min} - Rp. ${hrg_max} per meter persegi</div>
            </div>
          </div>
            `;
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
                bpn = `
                    <div class="col-sm-12">
                      <div class="row">
                        <div class="col-sm-4">Tipe Hak</div>
                        <div class="col-sm-8">${prop.Tipe}</div>
                        <div class="col-sm-4">Luas</div>
                        <div class="col-sm-8">${separatorNum(
                            prop.Luas
                        )} m&sup2;</div>
                        <div class="col-sm-4">Harga</div>

                  `;
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
                            class="btn btn-md btn-block text-left text_all tombol_search"
                            data-toggle="collapse" data-target="#${dt[0].name}" aria-expanded="true"
                            aria-controls="collapsePoiOne">
                            <b class="text_all_mobile">${dt[0].name}</b>
                        </button>
                    </div>
                    </div>
                    <div id="${dt[0].name}" class="collapse mb-3 show" aria-labelledby="headingOne" data-parent="#PoiCollabse">
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
                    <li style="list-style:none" class="listgroup-cust align-items-center text_all">
                        <div class="d-flex bd-highlight">
                            <div class="w-75 bd-highlight break_all akses_data">
                            ${dta.fasilitas}
                            </div>
                            <div class="bd-highlight text-right">
                            <span>${Math.round(dta.jarak) / 1000} km</span>
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
    marker: false,
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
    var api = ["wilayah", "zoning", "iumk"];

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
        if (map.getLayer(dt + "_multilinestring")) {
            map.removeLayer(dt + "_multilinestring");
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

    if (map.getLayer("banjir_fill")) {
        map.removeLayer("banjir_fill");
    }

    if (map.getSource("banjir")) {
        map.removeSource("banjir");
    }

    map.addSource("banjir", {
        type: "geojson",
        data: `${url}/banjir/${item}/${tahun}`,
    });

    $("#ControlTahunBanjir").change(function () {
        var layer = map.getLayer("banjir_fill");
        var condition = layer.visibility == "visible" ? "visible" : "none";
        map.removeLayer("banjir_fill");
        map.removeSource("banjir");
        map.addSource("banjir", {
            type: "geojson",
            data: `${url}/banjir/${item}/${tahun}`,
        });

        map.addLayer({
            id: "banjir_fill",
            type: "fill",
            source: "banjir",
            paint: {
                "fill-color": "#2980b9",
                "fill-opacity": 0.9,
            },
            layout: {
                visibility: condition,
            },
        });
    });

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
        id: "banjir_fill",
        type: "fill",
        source: "banjir",
        paint: {
            "fill-color": "#2980b9",
            "fill-opacity": 0.9,
        },
        layout: {
            visibility: "none",
        },
    });

    // map.addLayer({
    //     id: "pipa_multilinestring",
    //     type: "line",
    //     source: "pipa",
    //     paint: {
    //         "line-color": "#fff",
    //         "line-width": 3,
    //     },
    //     layout: {
    //         visibility: "none",
    //     },
    // });
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
    //Wilayah
    // if ($("#wilayahindex_fill").prop("checked") == true) {
    //     showLayer("wilayahindex_fill");
    //     $(".detail_omzet").show();
    //     $(".detail_jumlah").show();
    // } else {
    //     hideLayer("wilayahindex_fill");
    //     $(".detail_omzet").hide();
    //     $(".detail_jumlah").hide();
    // }

    // $("#wilayahindex_fill").change(function () {
    //     if ($(this).prop("checked") == true) {
    //         showLayer("wilayahindex_fill");
    //         $(".detail_omzet").show();
    //         $(".detail_jumlah").show();
    //     } else {
    //         hideLayer("wilayahindex_fill");
    //         $(".detail_omzet").hide();
    //         $(".detail_jumlah").hide();
    //     }
    // });

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

    // if ($("#pipa_multilinestring").prop("checked") == true) {
    //     showLayer("pipa_multilinestring");
    // } else {
    //     hideLayer("pipa_multilinestring");
    // }

    // $("#pipa_multilinestring").change(function () {
    //     if ($(this).prop("checked") == true) {
    //         showLayer("pipa_multilinestring");
    //     } else {
    //         hideLayer("pipa_multilinestring");
    //     }
    // });

    if ($("#banjir_fill").prop("checked") == true) {
        showLayer("banjir_fill");
    } else {
        hideLayer("banjir_fill");
    }

    $("#banjir_fill").change(function () {
        if ($(this).prop("checked") == true) {
            showLayer("banjir_fill");
        } else {
            hideLayer("banjir_fill");
        }
    });
}

$(document).on("click", ".wilayah-select", function () {
    $(".wm-search__dropdown").fadeOut();

    const coor = $(this).data("kordinat");
    const kel = $(this).data("wilayah");
    const text = $(this).text();
    $("#cari_wilayah_mobile").val(text);
    // $(".mapboxgl-ctrl-geolocate").prop("aria-pressed", false).click();
    // geolocate.trigger();

    geocoder.query(coor);
    addSourceLayer(kel);
    localStorage.setItem("kelurahan", kel);
    if (map.getLayer("survey_ajib") !== undefined) {
        map.moveLayer("zoning_fill", "survey_ajib");
    }
});

function separatorNum(val) {
    if (typeof val === "undefined" || val === null || val === "null") {
        return null;
    }
    val = parseFloat(val);
    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

function dropDownKegiatan(subzona) {
    $.ajax({
        url: `${APP_URL}/kbli/${subzona}`,
        method: "get",
        dataType: "json",
        success: function (e) {
            $("#kegiatanRuang").html("");
            $("#skala").html("");
            $("#kegiatanKewenangan").html("");
            $(".dtKBLI").html("");
            var htmlContent = "";
            $("#btn-print").hide();
            htmlContent += `<option>Pilih...</option>`;
            var data = e;
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
        url: `${APP_URL}/kbli/${zonasi}/${sel}`,
        method: "get",
        dataType: "json",
        success: function (res) {
            $("#btn-print").hide();
            if (res != null) {
                const prop = res;
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
        url: `${APP_URL}/kbli/${zonasi}/${sel}/${skala}`,
        method: "get",
        dataType: "json",
        success: function (res) {
            var resHTML = "";
            if (res != null) {
                const prop = res;
                data_kbli = res;
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
    $("#btn-print").show();
    // console.log(data_kbli);
    var tblSel = "";
    tblSel += `

    <div class="d-flex space_judul row_mid_judul">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
        <label class="text_all_mobile_permenu">Kode KBLI</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
        <p><a href="https://oss.go.id/informasi/kbli-kode?kode=G&kbli=${data_kbli[selSektor]["Kode KBLI"]}" target="_blank">${data_kbli[selSektor]["Kode KBLI"]}</a></p>
    </div>
</div>


<div class="d-flex space_text row_mid_text">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
        <label class="text_all_mobile_permenu">Kegiatan</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
        <p>${data_kbli[selSektor]["Kegiatan"]}</p>
    </div>
</div>

<div class="d-flex space_text row_mid_text">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
        <label class="text_all_mobile_permenu">Resiko</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
        <p>${data_kbli[selSektor]["Resiko"]}</p>
    </div>
</div>

<div class="d-flex space_text row_mid_text">
    <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 text_all_permenu">
        <label class="text_all_mobile_permenu">ITBX</label>
    </div>
    <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 text_all_permenu">
        <p>${data_kbli[selSektor]["Status"]}</p>
    </div>
</div>


<div class="d-flex ml-5 skala_kodekbli margin_cari_kodelbli_mobile">
    <div class="col-md-12 text_all">
        <label class="text_all_mobile_kbli font-weight-bold">Ketentuan ITBX</label>
        <div class="form-group input-group-sm cari_kodekbli_option_mobile">
            <p>${data_kbli[selSektor]["Substansi"]}</p>
        </div>
    </div>
</div>
      `;
    $(".dtKBLI").html(tblSel);

    kbli_data = `
            <div class="col-sm-12 mt-5">
              <div class="row">
                <div class="col-sm-12 font-weight-bold">KBLI</div>
                <div class="col-sm-4">Kode</div>
                <div class="col-sm-8">${data_kbli[selSektor]["Kode KBLI"]}</div>
                <div class="col-sm-4">Kegiatan</div>
                <div class="col-sm-8">${data_kbli[selSektor]["Kegiatan"]}</div>
                <div class="col-sm-4">Resiko</div>
                <div class="col-sm-8">${data_kbli[selSektor]["Resiko"]}</div>
                <div class="col-sm-4">Status</div>
                <div class="col-sm-8">${data_kbli[selSektor]["Status"]}</div>
                <div class="col-sm-4">Ketentuan ITBX</div>
                <div class="col-sm-8">${data_kbli[selSektor]["Substansi"]}</div>
              </div>
            </div>
          `;
});
