var url = `https://jakpintas.dpmptsp-dki.com:3443`;
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
var saveTPZ;
var count = 0;
var countOpen = 0;
var arrPrint = [];
var files = [];
var Newfiles = [];
var filesBulk = [];
var luasSimulasi;
var KDH, KLB, NJOP;
var token = `eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJleHAiOjE2Nzg5NTQxMjIsIm5hbWUiOiJhZG1pbiJ9.WwGrJI-Cp_CJivzPuq3YrTOrygJrxO7r1jdx891xY5U`;
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

var dataabse_tpz = {
    a: {
        nama: `TPZ Bonus`,
        pengertian: `<p>Teknik pengaturan zonasi yang memberikan izin kepada Pemilik Lahan untuk meningkatkan intensitas pemanfaatan ruang melebihi aturan dasar (Peningkatan Luas Lantai Atau KLB), dengan memberikan imbalan (kompensasi) antara lain menyediakan sarana publik tertentu, misalnya RTH, terowongan penyeberangan dan sebagainya.</p>`,
        ketentuan: `
        <p>Dimungkinkan peningkatan luas lantai / KLB dengan kompensasi sebagai berikut:</p>
        <ol style="margin-top:-15px">
            <li style="margin-left:-25px">Menyediakan Lahan Dan/Atau Membangun Rth Publik;</li>
            <li style="margin-left:-25px">Menyediakan Lahan Dan/Atau Membangun Rumah Susun Umum;</li>
            <li style="margin-left:-25px">Menyediakan Dan/Atau Membangun Waduk Atau Situ</li>
            <li style="margin-left:-25px">Menyediakan Infrastruktur;</li>
            <li style="margin-left:-25px">Menyediakan Jalur Dan Meningkatkan Kualitas Fasilitas Pejalan Kaki Yang Terintegrasi Dengan Angkutan Umum; <b>Dan/Atau</b></li>
            <li style="margin-left:-25px">Menyediakan Jalur Sepeda Yang Terintegrasi Dengan Angkutan Umum.</li>
        </ol>
    `,
    },
    b: {
        nama: `TPZ Pengalihan Hak Membangun Atau TDR`,
        pengertian: `<p>Teknik pengaturan zonasi yang memungkinkan pemilik tanah untuk mengalihkan haknya untuk membangun kepada pihak lain, sehingga si penerima hak membangun tersebut dapat membangun propertinya dengan intensitas (Luas Lantai atau KLB) lebih tinggi.</p>`,
        ketentuan: `
        <p>Dimungkinkan peningkatan luas lantai bangunan / KLB dengan ketentuan sebagai berikut:</p>
        <ol>
        <li style="margin-left:-25px">Pengalihan hak membangun berupa luas lantai dari satu persil ke persil lain dengan zona yang sama dalam satu batas administrasi kelurahan; </li>
        <li style="margin-left:-25px">Pengalihan hak membangun berupa luas lantai dari satu persil ke persil lain dengan zona yang sama dalam kawasan yang dikembangkan konsep TOD diperkenankan tidak dalam satu blok;</li>
        <li style="margin-left:-25px">Hak membangun yang dapat dialihkan berupa luas lantai dari selisih batasan KLB yang ditetapkan dalam peraturan zonasi dengan KLB yang telah digunakan dalam kaveling;</li>
        <li style="margin-left:-25px">Pengalihan hak membangun berupa luas lantai tidak diperkenankan pada Zona Perumahan Kampung (Sub Zona R.1), Zona Perumahan KDB Sedang - Tinggi (Sub Zona R.2; R.3; R.4; R.5; R.6) dan Zona Perumahan KDB Rendah (R.9).;</li>
        <li style="margin-left:-25px">Penerima pengalihan luas lantai setinggi-tingginya 50% (lima puluh persen) dari KLB yang ditetapkan di lahan perencanaan dimaksud;</li>
        <li style="margin-left:-25px">Pengalihan Luas Lantai  Hanya Dilakukan 1 (Satu) Kali;</li>
        <li style="margin-left:-25px">Terhadap lahan yang telah melakukan pengalihan luas lantai dan menerima pengalihan luas lantai tidak mendapatkan pelampauan KLB;</li>
        <li style="margin-left:-25px">Dalam hal suatu lahan perencanaan telah melakukan pengalihan luas lantai kemudian ditetapkan KLB baru untuk lahan perencanaan tersebut, maka selisih KLB tidak dapat dialihkan; dan</li>
        <li style="margin-left:-25px">Pengalihan luas lantai pada zona dalam suatu lahan perencanaan terpadu dan kompak yang telah memiliki panduan Rancang Kota (UDGL), harus menetapkan kembali Panduan Rancang Kota (UDGL).</li>
    </ol>
`,
    },
    c: {
        nama: `TPZ Pertampalan Aturan Atau Overlay`,
        pengertian: `<p>Teknik Pengaturan zonasi yang memberikan fleksibilitas dalam penerapan peraturan zonasi yang berupa pembatasan intensitas pembangunan melalui penerapan dua atau lebih aturan.</p>`,
        ketentuan: `
        <p>Pembatasan Intensitas dengan ketentuan sebagai berikut:</p>
        <ol>
            <li style="margin-left:-25px">Pembatasan Tinggi Bangunan; Pembatasan Tinggi Bangun Bangunan; dan Pembatasan Jenis Kegiatan sesuai peraturan perundang – undangan.</li>
        </ol>
    `,
    },
    d: {
        nama: `TPZ Permufakatan Pembangunan`,
        pengertian: `<p>Teknik Pengaturan Zonasi yang merupakan Salah satu bentuk opsi penyesuaian pengaturan zonasi yang memperbolehkan adanya Kesepakatan untuk pengadaan lahan/persil untuk infrastruktur.</p>`,
        ketentuan: `
        <p>Perubahan jenis kegiatan dan perubahan luas lantai dengan ketentuan sebagai berikut:</p>
        <ol>
            <li style="margin-left:-25px">Lahan/persil Berada di sepanjang koridor angkutan massal berbasis rel layang.</li>
            <li style="margin-left:-25px">Perubahan kegiatan ruang dalam lahan/persil yang termasuk ke dalam koridor tersebut.</li>
            <li style="margin-left:-25px">Penambahan kegiatan ruang dalam persil yang termasuk ke dalam koridor tersebut.</li>
            <li style="margin-left:-25px">Penambahan luas lantai dari ketentuan KLB yang berlaku sebelumnya.</li>
        </ol>
    `,
    },
    e: {
        nama: `TPZ Khusus`,
        pengertian: `<p>Teknik Pengaturan Zonasi yang merupakan salah satu bentuk opsi penyesuaian pengaturan zonasi yang memperbolehkan adanya fungsi dan tujuan khusus dari suatu kawasan dan/atau persil dalam kawasan yang memiliki karateristik spesifik dan keberadaannya dipertahankan oleh pemerintah. </p>`,
        ketentuan: `
        <p>Pengendalian kawasan yang memiliki karateristik spesifik dengan ketentuan sebagai berikut:</p>
        <ol>
        <li style="margin-left:-25px">Khusus pada Lahan/Persil di kawasan Taman Medan Merdeka (Taman Monas) diperkenankan untuk  memanfaatkan ruang bawah tanah sebagai ruang pamer, pusat informasi, parkir, dan penunjang serta ruang untuk kepentingan pertahanan keamanan.</li>
        <li style="margin-left:-25px">Lahan/persil memiliki dimensi dan ketentuan pembangunan sesuai kebutuhan dan dilaksanakan sesuai ketentuan peraturan perundangan.</li>
        <li style="margin-left:-25px">Lahan/persil yang dikembangkan tidak menimbulkan dampak negatif terhadap kawasan sekitar;dan</li>
        <li style="margin-left:-25px">Khusus pada lahan pertanian sawah tidak diperkenankan pengembangan selain kegiatan pertanian.</li>
    </ol>
        `,
    },
    "f.1": {
        nama: `TPZ Pengendalian Pertumbuhan : Kawasan Sentra Industri Kecil`,
        pengertian: `<p>Teknik Pengaturan Zonasi yang dikendalikan Perkembangannya karena karateristik kawasan sebagai kawasan sentra industri kecil.</p>`,
        ketentuan: `
        <p>Pengendalian perkembangan akibat karateristik sebagai kawasan sentra industri kecil, dengan ketentuan sebagai berikut:</p>
        <ol>
            <li style="margin-left:-25px">Menyediakan Gudang Bahan Baku Bersama;</li>
            <li style="margin-left:-25px">Menyediakan Ipal Komunal;</li>
            <li style="margin-left:-25px">Menyediakan Dapur Dengan Teknologi Ramah Lingkungan;</li>
            <li style="margin-left:-25px">Menyediakan Fasilitas Bongkar Muat Komunal; Dan</li>
            <li style="margin-left:-25px">Menjadi Anggota Wadah Atau Perkumpulan Yang Terdaftar Dan Diakui Oleh Pemerintah.</li>
        </ol>
        `,
    },
    "f.2": {
        nama: `TPZ Pengendalian Pertumbuhan : Kawasan Pembangunan Berpola Pita Di Sepanjang Koridor
        Transportasi Massal Di Luar Kawasan TOD
        `,
        pengertian: `<p>sebagai Kawasan Pembangunan Berpola Pita Di Sepanjang Koridor Transportasi Massal Di Luar Kawasan TOD.</p>`,
        ketentuan: `
            <p>Koridor Transportasi Massal Di Luar Kawasan TOD , dengan ketentuan sebagai berikut:</p>
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
    },
    g: {
        nama: `TPZ Pelestarian Kawasan Cagar Budaya`,
        pengertian: `Teknik Pengaturan Zonasi Untuk mempertahankan Bangunan dan Situs yang bernilai Sejarah.`,
        ketentuan: `
            <p>Pengendalian untuk mempertahakan bangunan dan situs yang memiliki nilai sejarah, dengan ketentuan sebagai berikut:</p>
            <ol>
            <li style="margin-left:-25px">Kegiatan Hunian Diperkenankan Untuk Dirubah Tanpa Merubah Struktur Dan Bentuk Asli Bangunan Pada Kawasan Yang Dilalui Angkutan Umum Massal;</li>
            <li style="margin-left:-25px">Kegiatan yang diizinkan terbatas (T), bersyarat (B), dan diizinkan terbatas bersyarat (TB) dalam Kawasan Cagar Budaya ditetapkan Gubernur setelah mendapatkan pertimbangan dari BKPRD;</li>
            <li style="margin-left:-25px">Intensitas pemanfaatan ruang Bangunan Cagar Budaya golongan A dan golongan B sesuai kondisi bangunan asli yang ditetapkan; dan</li>
            <li style="margin-left:-25px">Pembangunan baru pada kaveling dalam Kawasan Cagar Budaya   harus menyesuaikan dengan karakter kawasan Cagar Budaya.</li>
        </ol>
        `,
    },
};

var dsc_tpz = `
    <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Catatan</p>
    <ol>
        <li style="margin-left:-25px">Teknik Pengaturan Zonasi (TPZ) adalah ketentuan lain dari zonasi konvensional yang dikembangkan untuk memberikan fleksibilitas dan pembatasan/pengendalian dalam penerapan aturan zonasi dan ditujukan untuk mengatasi berbagai permasalahan dalam penerapan peraturan zonasi dasar, mempertimbangkan kondisi kontekstual kawasan dan arah penataan ruang.</li>
        <li style="margin-left:-25px">Penerapan teknik aturan zonasi ditetapkan oleh gubernur setelah mendapat pertimbangan dari BKPRD (Badan Koordinasi Penataan Ruang Daerah).</li>
        <li style="margin-left:-25px">Penerapan TPZ dilakukan sesuai dengan kode yang terdapat pada ID Subblok pada lampiran III-3 Perda No 1. Tahun 2014 tentang Rencana Detail dan Peraturan Zonasi Jakarta.</li>
        <li style="margin-left:-25px">Pada beberapa Id Subblok dimungkinkan terdapat lebih dari 1 kode TPZ.</li>
    </ol>
    `;

$(
    "#btn-titik, #btn-print, #pesanGagal, #pesanBerhasil, #pesanBerhasilEdit, #pesanBerhasilHapus, #messageNoData, #profile, #pesanFoto, #pesanGagalPrint, #pesanGagalPrintKBLI, #formPinLocationEdit, #pesanGagalPrintDigitasi, #pesanGagalPrintDigitasiOption, #formSurveyLocationEdit, #pesanBerhasilSurvey, #pesanGagalSurvey, #messageNoDataSurvey, #pesanBerhasilEditSurvey, #pesanBerhasilHapusSurvey, #prosesSurvey, #resetSurey, #prosesSurveyBulk, #pesanGagalSurveyBulk"
).hide();

$.ajax({
    url: `${APP_URL}/cekLoginChat`,
    method: "GET",
    success: function (e) {
        if (e == 1) {
            var img = localStorage.getItem("imgProfile");
            $("#btnLogout").attr("src", img);
            $("#profile").show();
            $("#btnLogin").hide();
            // getLayerSurveyPerkembangan();
        }
    },
});

$("#kegiatanRuang, #skala, #kegiatanKewenangan, #selectSimulasi").select2();

var layerList = document.getElementById("menu");
var inputs = layerList.getElementsByTagName("input");

for (var i = 0; i < inputs.length; i++) {
    inputs[i].onclick = switchLayer;
}

$(window).on("load", function () {
    localStorage.removeItem("id_kelurahan");
    localStorage.removeItem("opsi");
    localStorage.setItem("simulasi", "");
    localStorage.setItem("direction", 1);
    localStorage.setItem("circleDraw", 0);
    localStorage.setItem("polygonDraw", 0);
    localStorage.setItem("filterChoro", 1);
    localStorage.setItem("kelurahan", "");
    localStorage.setItem("searching", 0);
    localStorage.setItem("filterCategoryChoro", "omzet");
    $.post(`${APP_URL}/check_print`, { kategeori: "profil", status: 0 });
    $.post(`${APP_URL}/check_print`, { kategeori: "akses", status: 0 });
    $.post(`${APP_URL}/check_print`, { kategeori: "ketentuan", status: 0 });
    $.post(`${APP_URL}/check_print`, { kategeori: "kbli-data", status: 0 });
    sliderRange();
    choro(
        $("#slider-range").slider("values", 0),
        $("#slider-range").slider("values", 1),
        "omzet"
    );
});

const sliderRange = () => {
    $("#slider-range").slider({
        range: true,
        min: 0,
        max: 25000000000,
        values: [0, 25000000000],
        step: 10000000,
        slide: function (event, ui) {
            $("#amount").text(
                "Rp. " +
                    separatorNum(ui.values[0]) +
                    " - Rp. " +
                    separatorNum(ui.values[1])
            );
            // console.log(ui.values[0], ui.values[1]);
        },
        stop: function (event, ui) {
            console.log(ui.values[0], ui.values[1]);
            choro(ui.values[0], ui.values[1], "omzet");
        },
    });
    $("#amount").text(
        "Rp. " +
            separatorNum($("#slider-range").slider("values", 0)) +
            " - Rp. " +
            separatorNum($("#slider-range").slider("values", 1))
    );
};
const sliderRangeKepadatan = () => {
    $("#slider-kepadatan").slider({
        range: true,
        min: 0,
        max: 100000,
        values: [0, 100000],
        step: 50,
        slide: function (event, ui) {
            $("#kepadatan").text(
                separatorNum(ui.values[0]) + " - " + separatorNum(ui.values[1])
            );
            // console.log(ui.values[0], ui.values[1]);
        },
        stop: function (event, ui) {
            console.log(ui.values[0], ui.values[1]);
            choro(ui.values[0], ui.values[1], "kepadatan");
        },
    });
    $("#kepadatan").text(
        separatorNum($("#slider-kepadatan").slider("values", 0)) +
            " - " +
            separatorNum($("#slider-kepadatan").slider("values", 1))
    );
};

const sliderRangeJumlahPenduduk = () => {
    $("#slider-jumlah-penduduk").slider({
        range: true,
        min: 0,
        max: 200000,
        values: [0, 200000],
        step: 50,
        slide: function (event, ui) {
            $("#jumlah-penduduk").text(
                separatorNum(ui.values[0]) + " - " + separatorNum(ui.values[1])
            );
            // console.log(ui.values[0], ui.values[1]);
        },
        stop: function (event, ui) {
            console.log(ui.values[0], ui.values[1]);
            choro(ui.values[0], ui.values[1], "jumlah_penduduk");
        },
    });
    $("#jumlah-penduduk").text(
        separatorNum($("#slider-jumlah-penduduk").slider("values", 0)) +
            " - " +
            separatorNum($("#slider-jumlah-penduduk").slider("values", 1))
    );
};

const sliderRangeKepadatanBangunan = () => {
    $("#slider-kepadatan-bangunan").slider({
        range: true,
        min: 0,
        max: 25000,
        values: [0, 25000],
        step: 50,
        slide: function (event, ui) {
            $("#kepadatan-bangunan").text(
                separatorNum(ui.values[0]) + " - " + separatorNum(ui.values[1])
            );
            // console.log(ui.values[0], ui.values[1]);
        },
        stop: function (event, ui) {
            console.log(ui.values[0], ui.values[1]);
            choro(ui.values[0], ui.values[1], "count_polygons");
        },
    });
    $("#kepadatan-bangunan").text(
        separatorNum($("#slider-kepadatan-bangunan").slider("values", 0)) +
            " - " +
            separatorNum($("#slider-kepadatan-bangunan").slider("values", 1))
    );
};

$.ajax({
    url: `${url}/text`,
    method: "GET",
    dataType: "json",
    beforeSend: function () {
        $(".runing-text").html("");
    },
    success: function (e) {
        var data = e.features;
        var text = "";
        for (let index = 0; index < data.length; index++) {
            text += data[index].properties.Text + ". ";
        }
        $(".runing-text").html("");
        $(".runing-text")
            .html(text)
            .css("overflow-x", "hidden")
            .css("width", "100%");
        $(".runing-text").marquee({
            direction: "left",
            duration: 20000,
        });
        // console.log(text);
    },
});

// $.get(`${APP_URL}/pdf_file/${name_file}`, function (data, statusText, xhr) {
//     status = xhr.status;
// }).fail(function () {
//     console.clear();
// });

// $.ajax({
//     url: `${APP_URL}/statusLogin`,
//     method: "GET",
//     success: function (e) {
//         if (e == "login") {
//             window.close();
//         }
//     },
// });

const popup = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});
const popupSurvey = new mapboxgl.Popup({
    closeButton: true,
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

function titleCase(str) {
    str = str.toLowerCase().split(" ");
    for (var i = 0; i < str.length; i++) {
        str[i] = str[i].charAt(0).toUpperCase() + str[i].slice(1);
    }
    return str.join(" ");
}

function handleImgError() {
    $("#imgCardIUMK").hide();
}

// $(".wm-search__dropdown").hide();
$("#radiusSlide").hide();
$(".container_menu.for_web").hide();
$(".tab-content.for_web").hide();
$("hr.for_web").hide();
$(".btn_hide_side_bar.for_web").hide();
// $(".detail_omzet").hide();
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
    preserveDrawingBuffer: true,
});
const draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
        polygon: true,
        // trash: true,
    },
    defaultMode: "simple_select",
});

map.addControl(new mapboxgl.NavigationControl());
map.addControl(new PitchToggle({ minpitchzoom: 15 }));
// map.addControl(new CircleToggle({ radius: 1500 }));

$(
    "#lokasi-tab, #ketentuan-tab, #poi-tab, #kbli-tab, #cetak-tab, #simulasi-tab, #btnSHP, #simio-tab"
).on("click", () => {
    if ($("#enable-direction").prop("checked") == true) {
        $("#enable-direction").trigger("click");
        $("#enable-direction").prop("disabled", true);
    }
});

$("#andalalin-tab").on("click", () => {
    if ($("#enable-direction").prop("checked") !== true) {
        $(
            ".inf-titik, .inf-kecepatan-06, .inf-tempuh-06, .inf-kecepatan-09, .inf-tempuh-09, .inf-kecepatan-12, .inf-tempuh-12, .inf-kecepatan-15, .inf-tempuh-15, .inf-kecepatan-18, .inf-tempuh-18"
        ).html("-");
        $(".inf-titika, .inf-titikb").val("");
        $("#enable-direction").prop("disabled", false);
        $("#enable-direction").trigger("click");
    }
});

const directions = new MapboxDirections({
    accessToken: mapboxgl.accessToken,
    steps: false,
    waypointDraggable: true,
    geometries: "polyline",
    controls: { instructions: true },
});

$("#enable-direction").change(() => {
    if ($("#enable-direction").prop("checked") == true) {
        map.addControl(directions, "top-left");
        localStorage.setItem("direction", 2);
        $(".mapboxgl-ctrl-directions").css("visibility", "hidden");
        $(".mapboxgl-ctrl-directions").css("z-index", "-9");
        console.log("checked");
    } else {
        console.log("unchecked");
        map.removeControl(directions);
        localStorage.setItem("direction", 1);
    }
});

let hourTime = ["06:00", "09:00", "12:00", "15:00", "18:00"];

directions.on("route", (e) => {
    let data = e.route[0].legs[0].steps;
    let distance = e.route[0].distance / 1000;
    $(".inf-titik").html(distance.toFixed(2) + " km");
    $(".inf-titika").val(
        data[0].name == ""
            ? data[0].intersections[0].location[1] +
                  "," +
                  data[0].intersections[0].location[0]
            : data[0].name
    );
    $(".inf-titikb").val(
        data[data.length - 1].name == ""
            ? data[data.length - 1].intersections[0].location[1] +
                  "," +
                  data[data.length - 1].intersections[0].location[0]
            : data[data.length - 1].name
    );
    let from =
        data[0].intersections[0].location[0] +
        "," +
        data[0].intersections[0].location[1];
    let to =
        data[data.length - 1].intersections[0].location[0] +
        "," +
        data[data.length - 1].intersections[0].location[1];
    let way = [from, to];
    hourTime.forEach((el) => {
        estimation_direction(el, way);
    });
});

const estimation_direction = (time, way) => {
    let date = $('meta[name="datetime"]').attr("content");
    $.get(
        `https://api.mapbox.com/directions/v5/mapbox/driving/${way[0]};${way[1]}?access_token=${mapboxgl.accessToken}&depart_at=${date}T${time}`
    ).done((data) => {
        let data_direction = data.routes[0];
        let duration = data_direction.duration / 60;
        let distance = data_direction.distance / 1000;
        let speed = distance / (data_direction.duration / 3600);

        let html = "";
        let coor = "";

        if (speed.toFixed(2) >= 15) {
            color = "#2ecc71";
        } else if (speed.toFixed(2) >= 5) {
            color = "#f1c40f";
        } else if (speed.toFixed(2) >= 1) {
            color = "#e74c3c";
        } else {
            color = "#c0392b";
        }

        $(`.inf-direction-${time.substring(0, 2)}`).css("color", color);
        $(`.inf-kecepatan-${time.substring(0, 2)}`).html(`${speed.toFixed(2)}`);
        $(`.inf-tempuh-${time.substring(0, 2)}`).html(`${duration.toFixed(0)}`);
    });
};

map.addControl(draw);

let fillLayerDraw = [
    "gl-draw-polygon-fill-active.cold",
    "gl-draw-polygon-fill-active.hot",
];
let circleLayerDraw = [
    "gl-draw-polygon-midpoint.cold",
    "gl-draw-polygon-and-line-vertex-inactive.cold",
    "gl-draw-point-active.cold",
    "gl-draw-polygon-midpoint.hot",
    "gl-draw-polygon-and-line-vertex-inactive.hot",
    "gl-draw-point-active.hot",
];
let lineLayerDraw = [
    "gl-draw-polygon-stroke-active.cold",
    "gl-draw-line-active.cold",
    "gl-draw-polygon-stroke-active.hot",
    "gl-draw-line-active.hot",
];

// $(".mapboxgl-ctrl-group:eq(2)").append(
//     `<button class="mapbox-gl-draw_ctrl-draw-btn mapbox-gl-draw_circle" id="circleDraw" title="Radius"></button>`
// );
// $(".mapboxgl-ctrl-group:eq(2)").append(
//     `<button class="mapbox-gl-draw_ctrl-draw-btn mapbox-gl-draw_trash" id="deleteDraw" title="Delete"></button>`
// );
let Circle;
const addCircle = (lat, lng, mode) => {
    Circle = new MapboxCircle({ lat: lat, lng: lng }, 150, {
        editable: true,
        minRadius: 150,
        // maxRadius: 15000,
        fillColor: "yellow",
    });
    if (mode == 1) {
        if (map.getLayer("circle-radius-handles-0") == undefined) {
            Circle.addTo(map);
        }
    }
};

const removeCircle = () => {
    if (map.getLayer("circle-radius-handles-0") !== undefined) {
        map.removeLayer("circle-stroke-0");
        map.removeLayer("circle-fill-0");
        map.removeLayer("circle-center-handle-0");
        map.removeLayer("circle-radius-handles-0");
        map.removeSource("circle-source-0");
        map.removeSource("circle-center-handle-source-0");
        map.removeSource("circle-radius-handles-source-0");
    }
    if (map.getLayer("digitasi") !== undefined) {
        map.removeLayer("digitasi");
        map.removeSource("digitasi");
    }
};

$("#circleDraw").on("click", () => {
    localStorage.setItem("circleDraw", 1);
});

$(".mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_polygon").hide();

$("#polygonDraw").on("click", () => {
    fillLayerDraw.forEach((e) => {
        map.setPaintProperty(e, "fill-color", "#fff");
        map.setPaintProperty(e, "fill-opacity", 1);
    });
    lineLayerDraw.forEach((e) => {
        map.setPaintProperty(e, "line-color", "#fff");
    });
    $(".mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_polygon").click();
    localStorage.setItem("polygonDraw", 1);
    localStorage.setItem("polygonOptions", "Digitasi");
});

$("#btnSHP").on("click", () => {
    fillLayerDraw.forEach((e) => {
        map.setPaintProperty(e, "fill-color", "#fff");
        map.setPaintProperty(e, "fill-opacity", 1);
    });
    lineLayerDraw.forEach((e) => {
        map.setPaintProperty(e, "line-color", "#fff");
    });
    $(".mapbox-gl-draw_ctrl-draw-btn.mapbox-gl-draw_polygon").click();
    localStorage.setItem("polygonDraw", 1);
    localStorage.setItem("polygonOptions", "SHP");
});

$("#deleteDraw").on("click", () => {
    draw.deleteAll();
    localStorage.setItem("circleDraw", 0);
    localStorage.setItem("polygonDraw", 0);
    removeCircle();
});

const getDigitasi = (coor) => {
    $.ajax({
        url: `${url}/digitasi`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            kordinat: coor,
        },
        beforeSend: () => {
            // $("#loadDigitasi").show();
            $("#dataDigitasi").hide();
        },
        success: (data) => {
            // $("#loadDigitasi").hide();
            $("#dataDigitasi").show();
            let data_layer = JSON.parse(data);
            if (map.getLayer("digitasi") !== undefined) {
                map.removeLayer("digitasi");
                map.removeSource("digitasi");
            }
            map.addSource("digitasi", { type: "geojson", data: data_layer });
            map.addLayer({
                id: "digitasi",
                type: "fill",
                source: "digitasi",
                paint: {
                    "fill-color": ["get", "fill"],
                    "fill-opacity": 1,
                },
            });
        },
    });

    // $.ajax({
    //     url: `${url}/digitasi-bpn`,
    //     method: "POST",
    //     headers: {
    //         Authorization: `Bearer ${token}`,
    //     },
    //     beforeSend: () => {
    //         $("#loadDigitasi").show();
    //     },
    //     data: {
    //         kordinat: coor,
    //     },
    //     success: (data) => {
    //         $("#loadDigitasi").hide();
    //         let bpn = JSON.parse(data);
    //         let data_bpn = bpn.features;
    //         let html = ``;
    //         $("#dataDigitasi").html("");
    //         data_bpn.forEach((e) => {
    //             html += `
    //             <div class="d-flex align-items-center w-100 mb-2 p-2 border shadow rounded">
    //             <div class="col-md-10">
    //                     <span>Tipe Hak : ${e.properties.Tipe}</span><br>
    //                     <span>Luas : ${
    //                         e.properties.Luas
    //                     } m<sup>2</sup></span><br>
    //                     <span>NJOP : Rp.${separatorNum(
    //                         e.properties.NJOP.Min
    //                     )}-Rp.${separatorNum(
    //                 e.properties.NJOP.Max
    //             )} m<sup>2</sup></span><br>
    //                     <span>Sub Zona : ${e.properties["Sub Zona"]}</span>
    //                     </div>
    //                 <div class="col-md-2">
    //                     <span style="cursor: pointer" onclick="geocoder.query('${
    //                         e.geometry.coordinates[1]
    //                     },${
    //                 e.geometry.coordinates[0]
    //             }')" class="text-danger h1"><i class="fa fa-map-marker"></i></span>
    //                     </div>
    //                     </div>
    //                     `;
    //             // console.log(e);
    //         });
    //         $("#dataDigitasi").html(html);
    //         // console.log(data_bpn);
    //     },
    // });
};

$("body").on("keydown", function (event) {
    if (event.key == "Escape") {
        if (localStorage.getItem("polygonDraw") == 1) {
            $("#closeDigitasi").click();
            draw.deleteAll();
            localStorage.setItem("circleDraw", 0);
            localStorage.setItem("polygonDraw", 0);
            removeCircle();
        }
    }
});

map.on("draw.create", (e) => {
    let drawOptions = localStorage.getItem("polygonOptions");
    const data = draw.getAll();
    const area = turf.area(data);
    const rounded_area = Math.round(area * 100) / 100;
    const fixArea = rounded_area / 10000;
    let coordinate = e.features[0].geometry.coordinates[0];
    let fix_coordinate = "";
    coordinate.forEach((el) => {
        fix_coordinate += el[0] + " " + el[1] + ",";
        // console.log(el);
    });
    var img = map.getCanvas().toDataURL("image/png");
    $.ajax({
        type: "POST",
        url: `${APP_URL}/save_image`,
        data: {
            img: img,
        },
        success: () => {},
    });
    let coor = fix_coordinate.substring(0, fix_coordinate.length - 1);
    if (drawOptions !== "Digitasi") {
        // alert("layer Draw");
        $("#downloadSHP").modal("show");
    } else {
        if (fixArea <= 5) {
            getDigitasi(coor);
            $("#coorddigitasi").val(coor);
            $("#luasdigitasi").val(rounded_area);
            // $(".info-layer-digitasi").show();
        } else {
            alert("Batas Luas Area Digitasi Maksimal 5 Ha");
        }
    }

    // console.log(coor);
    // console.log(fix_coordinate.substring(0, fix_coordinate.length - 1));
});
// map.on("draw.delete");
map.on("draw.update", (e) => {
    let drawOptions = localStorage.getItem("polygonOptions");
    let coordinate = e.features[0].geometry.coordinates[0];
    const data = draw.getAll();
    const area = turf.area(data);
    const rounded_area = Math.round(area * 100) / 100;
    const fixArea = rounded_area / 10000;
    let fix_coordinate = "";
    coordinate.forEach((el) => {
        fix_coordinate += el[0] + " " + el[1] + ",";
        // console.log(el);
    });
    var img = map.getCanvas().toDataURL("image/png");
    $.ajax({
        type: "POST",
        url: `${APP_URL}/save_image`,
        data: {
            img: img,
        },
        success: () => {},
    });
    let coor = fix_coordinate.substring(0, fix_coordinate.length - 1);
    if (drawOptions !== "Digitasi") {
        // alert("layer Draw");
        $("#downloadSHP").modal("show");
    } else {
        if (fixArea <= 5) {
            getDigitasi(coor);
            $("#coorddigitasi").val(coor);
            $("#luasdigitasi").val(rounded_area);
            // $(".info-layer-digitasi").show();
        } else {
            alert("Batas Luas Area Digitasi Maksimal 5 Ha");
        }
    }
    // console.log(fix_coordinate.substring(0, fix_coordinate.length - 1));
});

$("#formSHP").on("submit", (e) => {
    e.preventDefault();
    exportSHP();
});

const exportSHP = () => {
    let name = $("#nameFileSHP").val();
    var options = {
        folder: false,
        filename: name,
        types: {
            polygon: name,
        },
    };
    // a GeoJSON bridge for features
    shpwrite.download(draw.getAll(), options);
    $("#downloadSHP").modal("hide");
};

map.loadImage(`/assets/gambar/ICON.png`, function (error, image) {
    if (error) throw error;
    map.addImage("point", image);
});

map.on("style.load", function () {
    // onOffLayers();
    getLayerSurveyPerkembangan();
    const layers = map.getStyle().layers;
    const labelLayerId = layers.find(
        (layer) => layer.type === "symbol" && layer.layout["text-field"]
    ).id;

    // The 'building' layer in the Mapbox Streets
    // vector tileset contains building height data
    // from OpenStreetMap.
    map.addLayer(
        {
            id: "add-3d-buildings",
            source: "composite",
            "source-layer": "building",
            filter: ["==", "extrude", "true"],
            type: "fill-extrusion",
            minzoom: 10,
            paint: {
                "fill-extrusion-color": "#aaa",

                // Use an 'interpolate' expression to
                // add a smooth transition effect to
                // the buildings as the user zooms in.
                "fill-extrusion-height": [
                    "interpolate",
                    ["linear"],
                    ["zoom"],
                    10,
                    0,
                    10.05,
                    ["get", "height"],
                ],
                "fill-extrusion-base": [
                    "interpolate",
                    ["linear"],
                    ["zoom"],
                    10,
                    0,
                    10.05,
                    ["get", "min_height"],
                ],
                "fill-extrusion-opacity": 0.6,
            },
        },
        labelLayerId
    );
    // map.addSource("mapbox-dem", {
    //     type: "raster-dem",
    //     url: "mapbox://mapbox.mapbox-terrain-dem-v1",
    //     tileSize: 512,
    //     maxzoom: 14,
    // });
    // map.setTerrain({ source: "mapbox-dem", exaggeration: 1.5 });

    // map.addLayer({
    //     id: "sky",
    //     type: "sky",
    //     paint: {
    //         // set up the sky layer to use a color gradient
    //         "sky-type": "gradient",
    //         // the sky will be lightest in the center and get darker moving radially outward
    //         // this simulates the look of the sun just below the horizon
    //         "sky-gradient": [
    //             "interpolate",
    //             ["linear"],
    //             ["sky-radial-progress"],
    //             0.8,
    //             "rgba(135, 206, 235, 1.0)",
    //             1,
    //             "rgba(0,0,0,0.1)",
    //         ],
    //         "sky-gradient-center": [0, 0],
    //         "sky-gradient-radius": 90,
    //         "sky-opacity": [
    //             "interpolate",
    //             ["exponential", 0.1],
    //             ["zoom"],
    //             5,
    //             0,
    //             22,
    //             1,
    //         ],
    //     },
    // });
    map.on(clickEvent, function (e) {
        // console.log(e);
        const coornya = e.lngLat;
        var lats = coornya.lat.toString();
        var lngs = coornya.lng.toString();
        // lats = lats.slice(0, -7);
        // lngs = lngs.slice(0, -8);
        // lat = lats;
        // long = lngs;
        let fixCord = lats + "," + lngs;
        localStorage.setItem("kordinat", fixCord);
        let data;
        if (localStorage.getItem("loaded") == 1) {
            data = {
                lat: coornya.lat,
                lng: coornya.lng,
            };
            lats = coornya.lat;
            lngs = coornya.lng;
            localStorage.setItem("loaded", 0);
        } else {
            data = {
                lat: lats,
                lng: lngs,
            };
            lats = lats.slice(0, -7);
            lngs = lngs.slice(0, -8);
        }

        if (localStorage.getItem("circleDraw") == 1) {
            addCircle(coornya.lat, coornya.lng, 1);
        }
        $("#kordinatPin").val(`${coornya.lat},${coornya.lng}`);
        $("#kordinatSurvey").val(`${coornya.lat},${coornya.lng}`);
        $("#refrensiGoogleMaps").attr(
            "href",
            `https://www.google.com/maps/search/%09${coornya.lat},${coornya.lng}`
        );
        $("#refrensiGoogleMaps").text(
            `${coornya.lat.toString().slice(0, -2)},${coornya.lng
                .toString()
                .slice(0, -2)}`
        );
        $("#refrensiGoogleMapsBulk").attr(
            "href",
            `https://www.google.com/maps/search/%09${coornya.lat},${coornya.lng}`
        );
        $("#refrensiGoogleMapsBulk").text(
            `${coornya.lat.toString().slice(0, -2)},${coornya.lng
                .toString()
                .slice(0, -2)}`
        );
        $.ajax({
            url: `${APP_URL}/save_kordinat`,
            method: "POST",
            data: {
                kordinat: [coornya.lat, coornya.lng],
            },
            success: () => {},
        });
        $.ajax({
            url: `${url}/wilayah`,
            method: "PUT",
            data: data,
            headers: {
                Authorization: `Bearer ${token}`,
            },
            dataType: "json",
            success: (e) => {
                const kelurahan = e.features[0].properties.Kelurahan;
                // console.log(kelurahan);
                var kelurahanStorage = localStorage.getItem("kelurahan");
                if (kelurahanStorage !== kelurahan) {
                    $("#btn-titik").show();

                    popUpHarga = [];
                    popUpHarga = getDataSewa(kelurahan);
                    sebaran_usaha = [];
                    sebaran_usaha = getDataSebaranUsaha(kelurahan);
                    proyek = [];
                    proyek = getDataProyek(kelurahan);
                    budaya = [];
                    budaya = getDataBudaya(kelurahan);
                    saveKelurahan(kelurahan);
                    if (
                        localStorage.getItem("direction") == 1 &&
                        localStorage.getItem("circleDraw") == 0 &&
                        localStorage.getItem("polygonDraw") == 0
                    ) {
                        addSourceLayer(kelurahan);
                    }
                }
            },
        });

        $(".inf-kordinat").html(
            `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${coornya.lat},${coornya.lng}" target="_blank">${lats}, ${lngs}</a>`
        );

        // $("#btnSHP").attr(
        //     "href",
        //     `https://jakartagis.maps.arcgis.com/apps/webappviewer/index.html?id=8cbdcc76c2874ad384c545102dc57e5e&center=${lngs};${lats}&level=20`
        // );
        // $("#btnAndalalin").attr(
        //     "href",
        //     `https://jakevo.jakarta.go.id/waypoint-maps?lat=${lats}&lng=${lngs}`
        // );
    });
    // Marker onclick
    // const el = document.createElement("div");
    // el.className = "marker";
    var marker = new mapboxgl.Marker({ color: "skyblue" });

    function add_marker(event) {
        var coordinates = event.lngLat;
        if (
            localStorage.getItem("direction") == 1 &&
            localStorage.getItem("circleDraw") == 0 &&
            localStorage.getItem("polygonDraw") == 0
        ) {
            geocoder._removeMarker();
            marker.setLngLat(coordinates).addTo(map);
        }
    }

    map.on("click", add_marker);
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

    // $.ajax({
    //     url: `${url}/choro`,
    //     method: "GET",
    //     dataType: "json",
    //     headers: {
    //         Authorization: `Bearer ${token}`,
    //     },
    //     success: (e) => {
    //         map.addSource("wilayahindex", {
    //             type: "geojson",
    //             data: e,
    //         });

    //         map.addLayer({
    //             id: "wilayahindex_fill",
    //             type: "fill",
    //             source: "wilayahindex",
    //             paint: {
    //                 "fill-color": [
    //                     "interpolate",
    //                     ["linear"],
    //                     ["get", "Total omzet"],
    //                     0,
    //                     "#ffeda0",
    //                     5000000000,
    //                     "#ffe675",
    //                     9000000000,
    //                     "#ffdf52",
    //                     13000000000,
    //                     "#ffd61f",
    //                     17000000000,
    //                     "#e0b700",
    //                     20396854609,
    //                     "#caa502",
    //                 ],
    //                 "fill-opacity": 0.7,
    //                 "fill-outline-color": "red",
    //             },
    //             layout: {
    //                 visibility: "none",
    //             },
    //         });
    //         onOffLayers("wilayahindex");
    //         map.on("mousemove", ({ point }) => {
    //             const states = map.queryRenderedFeatures(point, {
    //                 layers: ["wilayahindex_fill"],
    //             });
    //             document.getElementById("pd").innerHTML = states.length
    //                 ? `<div>Kelurahan : ${
    //                       states[0].properties.Kelurahan
    //                   }</div><p class="mb-0"><strong><em>Rp ${separatorNum(
    //                       states[0].properties["Total omzet"]
    //                   )}</strong></em></p>`
    //                 : `<p class="mb-0">Arahkan kursor untuk melihat data</p>`;
    //         });
    //     },
    // });

    // create legend
    // const legend = document.getElementById("legends");

    // layers.forEach((layer, i) => {
    //     const color = colors[i];
    //     const item = document.createElement("div");
    //     const key = document.createElement("span");
    //     key.className = "legend-key";
    //     key.style.backgroundColor = color;

    //     const value = document.createElement("span");
    //     value.innerHTML = `${layer}`;
    //     item.appendChild(key);
    //     item.appendChild(value);
    //     legend.appendChild(item);
    // });

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
      <span class="d-block" style="width: 300px"><b>Pemilik Proyek :</b> ${
          dt["Pemilik"]
      }</span>
      <span class="d-block" style="width: 300px"><b>Luas Lahan :</b> ${
          dt["Luas_Lahan"] == ""
              ? ""
              : `${separatorNum(dt["Luas_Lahan"])} m<sup>2</sup>`
      }</span>
      <span class="d-block" style="width: 300px"><b>Jenis Sertifikat :</b> ${
          dt["Jenis_Sertifikat"]
      }</span>
      <span class="d-block" style="width: 300px"><b>Total Investasi :</b> ${
          dt["Total_Investasi"] == ""
              ? ""
              : `Rp. ${separatorNum(dt["Total_Investasi"])}`
      }</span>


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
    <span class="d-block" style="width: 300px"><b>Pemilik Proyek :</b> ${
        dt["Pemilik"]
    }</span>
    <span class="d-block" style="width: 300px"><b>Luas Lahan :</b> ${
        dt["Luas_Lahan"] == ""
            ? ""
            : `${separatorNum(dt["Luas_Lahan"])} m<sup>2</sup>`
    }</span>
    <span class="d-block" style="width: 300px"><b>Jenis Sertifikat :</b> ${
        dt["Jenis_Sertifikat"]
    }</span>
    <span class="d-block" style="width: 300px"><b>Total Investasi :</b> ${
        dt["Total_Investasi"] == ""
            ? ""
            : `Rp. ${separatorNum(dt["Total_Investasi"])}`
    }</span>
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
    <span class="d-block" style="width: 300px"><b>Pemilik Proyek :</b> ${
        dt["Pemilik"]
    }</span>
    <span class="d-block" style="width: 300px"><b>Luas Lahan :</b> ${
        dt["Luas_Lahan"] == ""
            ? ""
            : `${separatorNum(dt["Luas_Lahan"])} m<sup>2</sup>`
    }</span>
    <span class="d-block" style="width: 300px"><b>Jenis Sertifikat :</b> ${
        dt["Jenis_Sertifikat"]
    }</span>
    <span class="d-block" style="width: 300px"><b>Total Investasi :</b> ${
        dt["Total_Investasi"] == ""
            ? ""
            : `Rp. ${separatorNum(dt["Total_Investasi"])}`
    }</span>
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

map.on("mouseenter", "budaya_dot", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Name"]}</h6>
      <div style="line-height: 1.2;">
      <span class="d-block" style="width: 300px">${dt["Keterangan"]}</span>
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    $(".mapboxgl-popup-content").addClass("inves");
    $(this).css("width", "300px");
});

map.on("mouseleave", "budaya_dot", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});

map.on("mouseenter", "ipal_dot", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${dt["Sistem"]}</h6>
      <div style="line-height: 1.2;">
      <span class="d-block" style="width: 300px">${dt["Alamat"]}</span>
      <span class="d-block" style="width: 300px">Kapasitas : ${dt["Kapasitas"]}</span>
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    $(".mapboxgl-popup-content").addClass("inves");
    $(this).css("width", "300px");
});

map.on("mouseleave", "ipal_dot", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});

map.on("mouseenter", "sungai_multilinestring", (e) => {
    // console.log(e);
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.lngLat;
    const dt = e.features[0].properties;
    const content = `<div class="card">
    <div class="card-body p-0">
      <p class="mt-2 card-title">${dt["Nama"]}</p>
    </div>`;

    // while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
    //   coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    // }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);

    // $(".mapboxgl-popup-content").addClass("inves");
    // $(this).css("width", "300px");
});

map.on("mouseleave", "sungai_multilinestring", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
    $(".inves").css("width", "");
});

map.on(clickEvent, "wilayah_fill", function (e) {
    var dt = e.features[0].properties;
    console.log(e);
    // localStorage.setItem("wilayah", JSON.stringify(dt));

    $.ajax({
        url: `${APP_URL}/save_wilayah`,
        method: "POST",
        data: {
            wilayah: dt,
        },
        success: () => {},
    });
    $(".dtKBLI").html("");
    setAttrClick = e;
    $("#hide_side_bar").hide();
    $("#show_side_bar").trigger("click");
    $(".pembungkus").css("background", "#fdfffc");
    // console.log(dt);
    $("#radiusSlide").show();
    $(".container_menu.for_web").show();
    $(".tab-content.for_web").show();
    $("hr.for_web").show();
    $(".btn_hide_side_bar.for_web").show();
    $(
        ".inf-iumk, .inf-omzet, .inf-pen-05, .inf-pen-610, .inf-pen-1115, .inf-pen-1620, .inf-pen-20, .inf-pen-na, .inf-kordinat, .inf-kelurahan, .inf-kecamatan, .inf-kota, .inf-luasarea, .inf-kepadatan, .inf-rasio, .inf-zona, .inf-subzona, .inf-blok, .inf-eksisting, .inf-harganjop, .inf-tpz, .inf-kdh, .inf-klb, .inf-kdb, .inf-kdh, .inf-gsb, .inf-k-tpz, .inf-kb, .inf-ktb, .inf-psl, .inf-khusus, .inf-p-air-tanah, .inf-sanitasi, .inf-tipe-bangunan, .inf-id-sub-blok"
    ).html("-");

    getRadius(e);
    getNJOP(e);
    getPersilBPN(e);
    getEksisting(e);
    getAirTanah(e);
    getPenuruanAirTanah(e);
    getSanitasi(e);
    getRTRW(e);

    const larea = dt["luas-area"] / 10000;

    // Chart
    var chart_pie = $("#pie-chart").get(0).getContext("2d");
    var chart_bar = $("#bar-chart-grouped").get(0).getContext("2d");
    var chart_pie_kbli = $("#pie-chart-kbli").get(0).getContext("2d");
    var chart_bar_kbli = $("#bar-chart-grouped-kbli").get(0).getContext("2d");
    var chart_pie_info = $("#pie-chart-info").get(0).getContext("2d");
    var chart_bar_info = $("#bar-chart-grouped-info").get(0).getContext("2d");
    if (pie !== undefined) {
        pie.destroy();
    }

    pie = new Chart(chart_pie, {
        type: "pie",
        data: {
            labels: ["Produksi", "Perdagangan", "Jasa"],
            datasets: [
                {
                    label: "Kelurahan",
                    backgroundColor: ["#ed403c", "#f8a51b", "#a3218e"],
                    data: [dt.Produksi, dt.Perdagangan, dt.Jasa],
                },
            ],
        },
        options: {
            title: {
                display: true,
            },
            legend: {
                align: "start",
            },
            bezierCurve: false,
            animation: {
                onComplete: function () {
                    $.post(`${APP_URL}/save_chart_pie`, {
                        pie: pie.toBase64Image(),
                    });
                },
            },
        },
    });

    if (bar !== undefined) {
        bar.destroy();
    }

    bar = new Chart(chart_bar, {
        type: "bar",
        data: {
            labels: ["20-29", "30-39", "40-49", "50-59", "60-69"],
            datasets: [
                {
                    backgroundColor: "#03a45e",
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
                            barPercentage: 0.2,
                            categoryPercentage: 0.2,
                        },
                    },
                ],
            },
            bezierCurve: false,
            animation: {
                onComplete: function () {
                    $.post(`${APP_URL}/save_chart_bar`, {
                        bar: bar.toBase64Image(),
                    });
                },
            },
        },
    });

    pie_kbli = new Chart(chart_pie_kbli, {
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

    bar_kbli = new Chart(chart_bar_kbli, {
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

    pie_info = new Chart(chart_pie_info, {
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

    bar_info = new Chart(chart_bar_info, {
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

    $("#kelurahanSurvey").val(dt.Kelurahan);
    $("#kecamatanSurvey").val(dt.Kecamatan);
    $("#textkelurahanSurvey").text(titleCase(dt.Kelurahan));
    $("#textkelurahanSurveyBulk").text(titleCase(dt.Kelurahan));
    $("#textkecamatanSurvey").text(titleCase(dt.Kecamatan));
    $("#textkecamatanSurveyBulk").text(titleCase(dt.Kecamatan));

    map.resize();
    var img = map.getCanvas().toDataURL("image/png");
    $.ajax({
        type: "POST",
        url: `${APP_URL}/save_image`,
        data: {
            img: img,
        },
        success: () => {},
    });

    var width = $("#screenshotPlaceholder").width();
    var height = $("#screenshotPlaceholder").height();
    var imgHTML = `<img class="img-snapshot" src="${img}" width="${width}" height="${height}"/>`;
    $("#screenshotPlaceholder").empty();
    $("#screenshotPlaceholder").append(imgHTML);

    imgMaps = `
    <div>
        <h2 align="center">Info Lokasi</h2>
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
      <div class="col-sm-8">${titleCase(dt.Kelurahan)}</div>
      <div class="col-sm-4">Kecamatan</div>
      <div class="col-sm-8">${titleCase(dt.Kecamatan)}</div>
      <div class="col-sm-4">Wilayah</div>
      <div class="col-sm-8">${titleCase(dt.Kota)}</div>
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

map.on(clickEvent, "zoning_fill", function (e) {
    var dt = e.features[0].properties;
    // console.log(dt);
    if (localStorage.getItem("simulasi") !== "") {
        let simulasi = localStorage.getItem("simulasi");
        getSimulasi(simulasi);
    }

    $.post(`${APP_URL}/save_zoning`, { zoning: dt });
    var gsb = `
    <p>Ketentuan GSB (Garis Sempadan Bangunan) terhadap GSJ (Garis Sempadan Jalan) adalah sebagai berikut:</p>
    <ol style="margin-top:-15px">
      <li style="margin-left:-25px">Rencana jalan dengan lebar ≤ 12m, maka besar GSB adalah 0,5 (Setengah) kali lebar rencana jalan;</li>
      <li style="margin-left:-25px">Rencana jalan dengan lebar 12m – 26m, maka besar GSB adalah 8m;</li>
      <li style="margin-left:-25px">Rencana jalan dengan lebar > 26m, maka besar GSB adalah 10m;</li>
      <li style="margin-left:-25px">Jalan eksisting tanpa rencana, maka besar GSB adalah 2m;dan/atau</li>
      <li style="margin-left:-25px">Ketentuan GSB bangunan dapat ditiadakan untuk Kawasan Cagar Budaya atau kawasan tertentu dengan menyediakan pedestrian dan penetapannya dilakukan oleh gubernur.</li>
    </ol>
    `;
    if ($("#checkboxKBLI").prop("checked") == true) {
        $("#checkboxKBLI").trigger("click");
    }
    // console.log(proyek);
    $(".dtKBLI").html("");
    var value_tpz = ``;
    var option_tpz = ``;
    var data_tpz = dt["CD TPZ"];
    var arr_tpz = data_tpz.split(",");
    saveTPZ = arr_tpz;
    if (dt["CD TPZ"] == "null" || dt["CD TPZ"] == 0) {
        value_tpz += `
        <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Ketentuan TPZ</p>
        <p>Tidak Ada Ketentuan</p>`;
        option_tpz += `
            <option>Tidak Ada CD TPZ</option>
        `;
        $.post(`${APP_URL}/save_ketentuan_tpz`, {
            ketentuan_tpz: [null, null, null, null],
        });
    } else {
        value_tpz += dsc_tpz;
        value_tpz += `<p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Ketentuan TPZ</p>`;
        value_tpz += `
        <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">${
            dataabse_tpz[arr_tpz[0]].nama
        }</p>
        `;
        value_tpz += dataabse_tpz[`${arr_tpz[0]}`].pengertian;
        value_tpz += dataabse_tpz[`${arr_tpz[0]}`].ketentuan;
        for (let index = 0; index < arr_tpz.length; index++) {
            option_tpz += `
                <option value="${index}">${arr_tpz[index]}</option>
            `;
        }
        $.post(`${APP_URL}/save_ketentuan_tpz`, {
            ketentuan_tpz: [
                0,
                dataabse_tpz[saveTPZ[0]].nama,
                dataabse_tpz[`${saveTPZ[0]}`].pengertian,
                dataabse_tpz[`${saveTPZ[0]}`].ketentuan,
            ],
        });
    }

    getKetentuanPSL(dt["Sub Zona"], dt.PSL);

    $(".inf-zona").html(dt.Zona);
    $(".inf-subzona").html(dt["Sub Zona"]);
    // $(".inf-subzona").html(dt["Sub Zona"]);
    $(".inf-blok").html(dt["Kode Blok"] + "/" + dt["Sub Blok"]);
    // $(".inf-cdtpz").html(dt["CD TPZ"] == "null" ? "-" : dt["CD TPZ"]);
    $("#selectTPZ").html(option_tpz);
    // $(".inf-tpz").html(dt.TPZ == "null" ? "-" : dt.TPZ);
    $(".inf-kdb").html(dt.KDB == "null" ? "-" : `${dt.KDB}%`);
    $(".inf-kdh").html(dt.KDH == "null" ? "-" : `${dt.KDH}%`);
    $(".inf-simulasi-kdh").html(dt.KDH == "null" ? "-" : `${dt.KDH}%`);
    KDH = dt.KDH;
    $(".inf-klb").html(dt.KLB == "null" ? "-" : dt.KLB);
    $(".inf-simulasi-klb").html(dt.KLB == "null" ? "-" : dt.KLB);
    KLB = dt.KLB;
    $(".inf-ktb").html(dt.KLB == "null" ? "-" : `${dt.KTB}%`);
    $(".inf-kb").html(dt.KB == "null" ? "-" : `${dt.KB} Lapis`);
    $(".inf-psl").html(dt.KLB == "null" ? "-" : dt.PSL);
    $(".inf-gsb").html(gsb);
    $(".inf-k-tpz").html(value_tpz);
    $(".inf-tipe-bangunan").html(dt.Tipe);
    $(".inf-id-sub-blok").html(dt["ID Sub Blok"]);

    $("#idSubblokSurvey").val(
        dt["Kode Blok"] + "." + dt["Sub Blok"] + "." + dt["Sub Zona"]
    );
    $("#textidSubblokSurvey").text(
        dt["Kode Blok"] + "." + dt["Sub Blok"] + "." + dt["Sub Zona"]
    );
    $("#textidSubblokSurveyBulk").text(
        dt["Kode Blok"] + "." + dt["Sub Blok"] + "." + dt["Sub Zona"]
    );

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
    var img = $(destination).on("error", handleImgError).attr("src", imgSource);
    $(destination).append(img);
    $(destination).show();
}

function getIumkForInfo(coor, destination) {
    const dt = coor;
    $.ajax({
        url: `https://iumk.perizinan-dev.com/api/getWithKoordinat`,
        method: "post",
        headers: {
            AUTHCODE: "9ee2f95d62b9f67f58ec288b1599cf9c",
            Accept: "application/json",
            "Content-Type": "application/x-www-form-urlencoded",
        },
        data: {
            lat: coor[0],
            lng: coor[1],
        },
        beforeSend: function () {},
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            // setTimeout(() => {
            // const img = document.getElementById('imgCardIUMK')
            // img.src = dtResp.data[0].file_foto_usaha
            addImageIumkForInfo(dtResp.data[0].file_foto_usaha, destination);
            // }, 500);
        },
        error: function (error) {
            console.log(error);
        },
    });
}

function addImageIumkForInfo(imgSource, destination) {
    $(destination)
        .on("error", function () {
            $(this).attr(
                "src",
                "https://www.salonlfc.com/wp-content/uploads/2018/01/image-not-found-1-scaled-1150x647.png"
            );
        })
        .attr("src", imgSource);
    console.clear();
}

function getEksisting(e) {
    // $("#dtEksistingBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/eksisting`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        // contentType: false,
        // processData: false,
        // cache: false,
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            if (dtResp.features != null) {
                const prop = dtResp.features[0].properties;
                $(".inf-eksisting").html(titleCase(prop.Kegiatan));
                $.post(`${APP_URL}/save_eksisting`, {
                    eksisting: prop.Kegiatan,
                });
                eksisting = `
                  <div class="col-sm-12">
                  <div class="row">
                        <div class="col-sm-12 font-weight-bold">Persil Tanah</div>
                        <div class="col-sm-4">Lahan Eksisting</div>
                        <div class="col-sm-8">${titleCase(prop.Kegiatan)}</div>
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

function getKetentuanPSL(subzona, psl) {
    $.ajax({
        url: `${url}/khusus1`,
        method: "POST",
        data: {
            subzona: subzona,
            psl: psl,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        success: (e) => {
            let data = JSON.parse(e);
            let value_data = data.features[0].properties;
            let html = "";
            let htmlKetentuan = "";
            if (value_data !== null) {
                html += `<option>Pilih...</option>`;
                for (let index = 0; index < value_data.length; index++) {
                    html += `<option value="${value_data[index].Kegiatan}" data-id="${index}">${value_data[index].Kegiatan}</option>`;
                }
                //     htmlKetentuan += `
                // <p class="card-title mb-4 text-center font-weight-bold judul_utama" style="margin-top:-12px">${value_data[0].properties.Kegiatan}</p>
                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Luas Lahan</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Luas Lahan"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Lebar Muka</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Lebar Muka"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Jarak Rencana</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Jarak Rencana"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Jarak Eksisting</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Jarak Eksisting"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Jarak Samping</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Jarak Samping"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">Jarak Belakang</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["Jarak Belakang"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">KDB</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["KDB"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">KTB</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["KTB"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-5 text_all">
                //         <label class="text_all_mobile">KLB</label>
                //     </div>
                //     <div class="col-lg-7 text_all">
                //         <p>${value_data[0].properties["KLB"]}</p>
                //     </div>
                // </div>

                // <div class="d-flex space_text row_mid_text">
                //     <div class="col-lg-12 text_all">
                //         <p>${value_data[0].properties["Keterangan"]}</p>
                //     </div>
                // </div>
                // `;
            } else {
                // htmlKetentuan += `<p>Tidak Ketentuan Khusus</p>`;
                html += "<option>Tidak Ada Kegiatan</option>";
            }

            // $(".inf-khusus").html("");
            // $(".inf-khusus").html(htmlKetentuan);

            $("#selectPSL").html("");
            $("#selectPSL").html(html);
            $("#selectPSL").on("change", function () {
                const kegiatan = $(this).val();
                let index = $(this).find(":selected").data("id");
                // console.log(value_data);
                $.post(`${APP_URL}/save_itbx`, {
                    itbx: [
                        kegiatan,
                        value_data[index]["Ketentuan Perizinan"],
                        value_data[index].Substansi,
                    ],
                });
                $(".inf-status-ketentuan").html("");
                $(".inf-status-ketentuan").html(
                    value_data[index]["Ketentuan Perizinan"]
                );
                $(".inf-keterangan-ketentuan").html("");
                $(".inf-keterangan-ketentuan").html(
                    value_data[index].Substansi
                );
                $("#selectKhusus").html("");
                $(".isi-ketentuan-khusus").html("");

                getKegiatanKhusus(subzona, psl, kegiatan);

                // $(".inf-khusus").html("");
                // $(".inf-khusus").html(htmlContentChange);
            });
            // $("#selectPSL").val(value_data[0].Kegiatan).trigger("change");
        },
    });
}

function getKegiatanKhusus(subzona, psl, kegiatan) {
    $.ajax({
        url: `${url}/khusus2`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            subzona: subzona,
            psl: psl,
            kegiatan: kegiatan,
        },
        success: (e) => {
            let data = JSON.parse(e);
            let value_data = data.features[0];
            let html = "";
            // console.log(value_data[0].Kegiatan);
            html += `<option>Pilih...</option>`;
            if (value_data !== null) {
                for (
                    let index = 0;
                    index < value_data.properties.length;
                    index++
                ) {
                    html += `<option value="${value_data.properties[index]["Jenis Ketentuan Khusus"]}" data-id="${index}">${value_data.properties[index]["Jenis Ketentuan Khusus"]}</option>`;
                }
            } else {
                // htmlKetentuan += `<p>Tidak Ketentuan Khusus</p>`;
                html += "<option>Tidak Ada Ketentuan</option>";
            }
            $("#selectKhusus").html("");
            $("#selectKhusus").html(html);
            $("#selectKhusus").on("change", function () {
                var ketentuan = $(this).val();
                let index = $(this).find(":selected").data("id");
                if (
                    value_data.properties[index]["Ketentuan Perizinan"] !==
                    "TIDAK BERLAKU"
                ) {
                    getKetentuanKhusus(subzona, psl, kegiatan, ketentuan);
                }
            });
            if (
                value_data.properties[0]["Ketentuan Perizinan"] !==
                "TIDAK BERLAKU"
            ) {
                $("#selectKhusus")
                    .val(value_data.properties[0]["Jenis Ketentuan Khusus"])
                    .trigger("change");
            }
        },
    });
}

function getKetentuanKhusus(subzona, psl, kegiatan, ketentuan) {
    $.ajax({
        url: `${url}/khusus3`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            subzona: subzona,
            psl: psl,
            kegiatan: kegiatan,
            ketentuan: ketentuan,
        },
        success: (e) => {
            let data = JSON.parse(e);
            let value_data = data.features[0].properties[0];
            let html = "";
            // console.log(value_data);
            let kdb_maksimal =
                value_data["KDB Maksimal"] !== "TIDAK DIATUR"
                    ? `${value_data["KDB Maksimal"] * 100}%`
                    : value_data["KDB Maksimal"];
            html += `

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all">
                    <label class="text_all_mobile">KB Maksimal</label>
                </div>
                <div class="col-lg-7 text_all">
                    <p>${value_data["KB Maksimal"]}</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all">
                    <label class="text_all_mobile">KDB Maksimal</label>
                </div>
                <div class="col-lg-7 text_all">
                    <p>${kdb_maksimal}</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all">
                    <label class="text_all_mobile">KLB Maksimal</label>
                </div>
                <div class="col-lg-7 text_all">
                    <p>${value_data["KLB Maksimal"]}</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all">
                    <label class="text_all_mobile">Luas Lahan Minimal</label>
                </div>
                <div class="col-lg-7 text_all">
                    <p>${value_data["Luas Lahan Minimal"]}</p>
                </div>
            </div>

            <div class="d-flex space_text row_mid_text">
                <div class="col-lg-5 text_all">
                    <label class="text_all_mobile">Syarat Lainnya</label>
                </div>
                <div class="col-lg-7 text_all">
                    <p>${value_data["Syarat Lainnya"]}</p>
                </div>
            </div>
                `;
            $.post(`${APP_URL}/save_ketentuan_khusus`, {
                ketentuan_khusus: [
                    ketentuan,
                    value_data["KB Maksimal"],
                    kdb_maksimal,
                    value_data["KLB Maksimal"],
                    value_data["Luas Lahan Minimal"],
                    value_data["Syarat Lainnya"],
                ],
            });
            $(".isi-ketentuan-khusus").html("");
            $(".isi-ketentuan-khusus").html(html);
            // if (value_data !== null) {
            //     for (let index = 0; index < value_data.length; index++) {
            //         html += `<option value="${value_data[index]["Ketentuan Khusus"]}">${value_data[index]["Ketentuan Khusus"]}</option>`;
            //     }
            // } else {
            //     // htmlKetentuan += `<p>Tidak Ketentuan Khusus</p>`;
            //     html += "<option>Tidak Ada Ketentuan</option>";
            // }
            // $("#selectKhususKetentuan").html("");
            // $("#selectKhususKetentuan").html(html);
            // $("#selectKhususKetentuan").on("change", function () {
            //     var ketentuan = $(this).val();
            //     getKetentuanKhusus(subzona, psl, kegiatan, ketentuan);
            // });
        },
    });
}

function getAirTanah(e) {
    $.ajax({
        url: `${url}/air`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lng: e.lngLat.lng,
            lat: e.lngLat.lat,
        },
        success: (e) => {
            const data = JSON.parse(e);
            let value_data = data.features;
            let html = "";
            $.post(`${APP_URL}/save_air_tanah`, { air_tanah: value_data });
            for (let index = 0; index < value_data.length; index++) {
                html += `
                <p class="card-title mt-2 mb-4 text-center font-weight-bold judul_utama">Air Tanah Kedalaman ${value_data[
                    index
                ].properties.Kedalaman.slice(0, -5)} meter MBT
                </p>
                <div class="d-flex space_text row_mid_text">
                    <div class="col-lg-5 text_all">
                        <label class="text_all_mobile">Air Tanah</label>
                    </div>
                    <div class="col-lg-7 text_all">
                        <p>${value_data[index].properties["Air Tanah"]}</p>
                    </div>
                </div>

                <div class="d-flex space_text row_mid_text">
                    <div class="col-lg-5 text_all">
                        <label class="text_all_mobile">Penggunaan</label>
                    </div>
                    <div class="col-lg-7 text_all">
                        <p>${value_data[index].properties.Penggunaan}</p>
                    </div>
                </div>
                `;
            }

            $(".inf-air-tanah").html("");
            $(".inf-air-tanah").html(html);
        },
    });
}

function getNJOP(e) {
    // $("#dtNJOPBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/njop`,
        method: "POST",
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            const prop = dtResp.features[0].properties;
            NJOP = prop.Max;
            if (dtResp.features != null) {
                $(".inf-harganjop").html(
                    `Rp ${separatorNum(prop.Min)} - Rp ${separatorNum(
                        prop.Max
                    )} per m&sup2;`
                );
                $(".inf-simulasi-njop").html(
                    `Rp ${separatorNum(prop.Min)} - Rp ${separatorNum(
                        prop.Max
                    )} per m&sup2;`
                );
            }

            hrg_min = separatorNum(prop.Min);
            hrg_max = separatorNum(prop.Max);
            $.post(`${APP_URL}/save_njop`, { njop: [prop.Min, prop.Max] });

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

function getPenuruanAirTanah(e) {
    $.ajax({
        url: `${url}/turun`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        success: (dt) => {
            const data = JSON.parse(dt);
            let jumlah = data.features[0].properties.Elevation;
            let fix_jumlah = jumlah * -100;
            $(".inf-p-air-tanah").html("");
            $(".inf-p-air-tanah").html(`${fix_jumlah} cm/tahun`);
            $.post(`${APP_URL}/save_turun`, { turun: fix_jumlah });
        },
    });
}

function getSanitasi(e) {
    $.ajax({
        url: `${url}/sanitasi`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        success: (dt) => {
            const data = JSON.parse(dt);
            $(".inf-sanitasi").html("");
            $(".inf-sanitasi").html(data.features[0].properties.Sistem);
            $.post(`${APP_URL}/save_sanitasi`, {
                sanitasi: data.features[0].properties.Sistem,
            });
        },
    });
}

const getRTRW = (e) => {
    $.ajax({
        url: `${url}/rtrw`,
        method: "PUT",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        dataType: "json",
        success: function (e) {
            console.log(e);
            $(".inf-rtrw").html(
                e.features[0].properties.RT + "/" + e.features[0].properties.RW
            );
        },
    });
};

function getPersilBPN(e) {
    // $("#dtBpnBot").html("");
    var htmlPopupLayer = "";
    $.ajax({
        url: `${url}/bpn`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
        },
        beforeSend: function () {
            // $('.map-loading').show()
        },
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            if (dtResp.features != null) {
                const prop = dtResp.features[0].properties;
                luasSimulasi = prop.Luas;
                $(".inf-tipehak").html(prop.Tipe);
                $(".inf-luasbpn").html(separatorNum(prop.Luas) + " m&sup2;");
                $(".inf-simulasi-luaslahan").html(
                    separatorNum(prop.Luas) + " m&sup2;"
                );
                $.post(`${APP_URL}/save_bpn`, { bpn: [prop.Tipe, prop.Luas] });
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
        url: `${url}/poi`,
        method: "PUT",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: e.lngLat.lat,
            lng: e.lngLat.lng,
            rad: getRadVal,
        },
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
            let poi = {};
            let name_poi = [];
            for (var as in obj) {
                const dt = obj[as];
                // console.log(dt);
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
                fasilitas += `
                <div class="col-sm-4">${dt[0].name}</div>
                <div class="col-sm-8">
                `;

                Object.assign(poi, { [dt[0].name]: [] });
                name_poi.push(dt[0].name);

                for (var az in dt) {
                    const dta = dt[az];
                    poi[dt[0].name].push({
                        fasilitas: dta.fasilitas,
                        jarak: Math.round(dta.jarak) / 1000,
                    });
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
            // console.log(poi);
            $.post(`${APP_URL}/save_poi`, {
                poi: [getRadVal / 1000, poi, name_poi],
            });
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

$("#cari_wilayah, #cari_wilayah_survey").bindWithDelay(
    "keyup",
    function () {
        var query = $(this).val();
        var resHTML = "";

        if (query != "" && query.length >= 3) {
            if (query.indexOf("-") > -1) {
                const koor = query.split(",");
                $.ajax({
                    url: `${url}/wilayah`,
                    method: "PUT",
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                    data: {
                        lat: koor[0],
                        lng: koor[1],
                    },
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
                    url: `${url}/search`,
                    method: "PUT",
                    headers: {
                        Authorization: `Bearer ${token}`,
                    },
                    data: {
                        keyword: query,
                    },
                    dataType: "json",
                    beforeSend: function () {
                        // $('.map-loading').show()
                    },
                    success: function (res) {
                        if (res.features != null) {
                            const dt = res.features;
                            for (var i in dt) {
                                var prop = dt[i].properties;
                                var name = "";
                                if (prop["Name"] == undefined) {
                                    name = prop["Nama"];
                                } else if (prop["Nama"] == undefined) {
                                    name = prop["Name"];
                                }
                                var koor = dt[i].geometry.coordinates;
                                resHTML += `<li class="wm-li-result text_all wilayah-select" data-kordinat="${koor[1]},${koor[0]}" data-wilayah="${prop["Kelurahan"]}"><i class="fa fa-map-marker" style="font-size: 15px;"></i> ${name}, ${prop["Kelurahan"]}, ${prop["Kecamatan"]}, ${prop["Kota"]}</li>`;
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
    marker: {
        color: "skyblue",
    },
    reverseGeocode: true,
    flyTo: {
        easing: function (t) {
            return t;
        },
        zoom: 15,
    },
});

map.addControl(geocoder);

const banjir = (kelurahan, tahun) => {
    $.ajax({
        url: `${url}/banjir`,
        type: "POST",
        dataType: "json",
        data: {
            kelurahan: kelurahan,
            tahun: tahun,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        success: (e) => {
            map.addSource("banjir", {
                type: "geojson",
                data: e,
            });
            addLayers("banjir");
            onOffLayers("banjir");
        },
    });
};

const choro = (min = 0, max = 25000000000, category = "omzet") => {
    $.ajax({
        url: `${url}/choro`,
        method: "POST",
        dataType: "json",
        data: {
            min: min,
            max: max,
            category: category,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        success: (e) => {
            if (map.getSource("wilayahindex")) {
                map.removeLayer("wilayahindex_fill");
                map.removeSource("wilayahindex");
            }
            map.addSource("wilayahindex", {
                type: "geojson",
                data: e,
            });
            let min, max, average;
            let paint;
            let data = e.features;

            let pekerjaan = [
                "aparatur_pemerintah",
                "pertanian",
                "nelayan",
                "tenaga_kesehatan",
                "pegawai",
                "tentara",
                "kepolisian",
                "petani",
                "peternak",
                "industri",
                "konstruksi",
                "transportasi",
                "pembantu",
                "mekanik",
                "seniman",
                "tabib",
                "paraji",
                "perancang",
                "penterjemah",
                "imam_masjid",
                "pendeta",
                "pastor",
                "wartawan",
                "ustadz",
                "juru_masak",
                "promotor",
                "dosen",
                "guru",
                "pilot",
                "pengacara",
                "notaris",
                "arsitek",
                "akuntan",
                "konsultan",
                "dokter",
                "bidan",
                "perawat",
                "apoteker",
                "psikiater",
                "pelaut",
                "peneliti",
                "sopir",
                "pialang",
                "paranormal",
                "pedagang",
                "biarawati",
                "karyawan",
                "buruh",
                "tukang",
                "penyiar",
                "wiraswasta",
                "pensiunan",
                "lainnya",
                "belum_tidak_bekerja",
            ];

            let pendidikan = [
                "tamat_sd",
                "sltp",
                "slta",
                "diploma_i",
                "diploma_ii",
                "diploma_iv",
                "strata_ii",
                "strata_iii",
            ];

            let agama = [
                "islam",
                "kristen",
                "katolik",
                "hindu",
                "budha",
                "konghucu",
                "kepercayaan",
            ];

            let borderLayer;

            if (category == "omzet") {
                min = data
                    .map(function (el) {
                        return el.properties["Total omzet"];
                    })
                    .reduce(function (prevEl, el) {
                        return Math.min(prevEl, el);
                    });
                max = data
                    .map(function (el) {
                        return el.properties["Total omzet"];
                    })
                    .reduce(function (prevEl, el) {
                        return Math.max(prevEl, el);
                    });
                average = Math.ceil((max - min) / 6);
            } else {
                min = data
                    .map(function (el) {
                        return el.properties["Jumlah"];
                    })
                    .reduce(function (prevEl, el) {
                        return Math.min(prevEl, el);
                    });
                max = data
                    .map(function (el) {
                        return el.properties["Jumlah"];
                    })
                    .reduce(function (prevEl, el) {
                        return Math.max(prevEl, el);
                    });
                average = Math.ceil((max - min) / 6);
            }
            console.log(min, max, average);
            if (category == "omzet") {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Total omzet"],
                    min + average * 1 + 1,
                    "#ffeda0",
                    min + average * 2 + 1,
                    "#ffe675",
                    min + average * 3 + 1,
                    "#ffdf52",
                    min + average * 4 + 1,
                    "#ffd61f",
                    min + average * 5 + 1,
                    "#e0b700",
                    min + average * 6 + 1,
                    "#caa502",
                ];

                borderLayer = "red";
            } else if (pekerjaan.includes(category)) {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#1cfc03",
                    min + average * 2 + 1,
                    "#22eb0c",
                    min + average * 3 + 1,
                    "#22db0d",
                    min + average * 4 + 1,
                    "#1dbd0b",
                    min + average * 5 + 1,
                    "#1aa60a",
                    min + average * 6 + 1,
                    "#198f0b",
                ];
                borderLayer = "red";
            } else if (pendidikan.includes(category)) {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#254ef5",
                    min + average * 2 + 1,
                    "#1e43d6",
                    min + average * 3 + 1,
                    "#1a3aba",
                    min + average * 4 + 1,
                    "#142f99",
                    min + average * 5 + 1,
                    "#10267d",
                    min + average * 6 + 1,
                    "#0b1a57",
                ];
                borderLayer = "red";
            } else if (agama.includes(category)) {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#a90ffc",
                    min + average * 2 + 1,
                    "#980ee3",
                    min + average * 3 + 1,
                    "#870cc9",
                    min + average * 4 + 1,
                    "#740aad",
                    min + average * 5 + 1,
                    "#650996",
                    min + average * 6 + 1,
                    "#51057a",
                ];
                borderLayer = "red";
            } else if (category == "kepadatan") {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#f7143e",
                    min + average * 2 + 1,
                    "#d61135",
                    min + average * 3 + 1,
                    "#b50e2d",
                    min + average * 4 + 1,
                    "#990c26",
                    min + average * 5 + 1,
                    "#7d091e",
                    min + average * 6 + 1,
                    "#690619",
                ];
                borderLayer = "white";
            } else if (category == "jumlah_penduduk") {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#0ce8e4",
                    min + average * 2 + 1,
                    "#0ac9c6",
                    min + average * 3 + 1,
                    "#09adab",
                    min + average * 4 + 1,
                    "#068f8d",
                    min + average * 5 + 1,
                    "#057876",
                    min + average * 6 + 1,
                    "#04615f",
                ];
                borderLayer = "red";
            } else if (category == "count_polygons") {
                paint = [
                    "interpolate",
                    ["linear"],
                    ["get", "Jumlah"],
                    min + average * 1 + 1,
                    "#ff6a14",
                    min + average * 2 + 1,
                    "#eb6010",
                    min + average * 3 + 1,
                    "#d6580f",
                    min + average * 4 + 1,
                    "#bd4f0f",
                    min + average * 5 + 1,
                    "#a8460d",
                    min + average * 6 + 1,
                    "#963e0b",
                ];
                borderLayer = "red";
            }
            console.log(paint);
            map.addLayer({
                id: "wilayahindex_fill",
                type: "fill",
                source: "wilayahindex",
                paint: {
                    "fill-color": paint,
                    "fill-opacity": 0.7,
                    "fill-outline-color": borderLayer,
                },
                layout: {
                    visibility: "visible",
                },
            });
            onOffLayers("wilayahindex");
            map.on("mousemove", ({ point }) => {
                const states = map.queryRenderedFeatures(point, {
                    layers: ["wilayahindex_fill"],
                });

                let el = "";
                if (localStorage.getItem("filterCategoryChoro") == "omzet") {
                    el = `<strong class="d-block">Omzet (Rp milyar)</strong>`;
                } else if (
                    localStorage.getItem("filterCategoryChoro") == "kepadatan"
                ) {
                    el = `<strong class="d-block">Jumlah (Orang km<sup>3</sup>)</strong>`;
                } else if (
                    localStorage.getItem("filterCategoryChoro") ==
                    "count_polygons"
                ) {
                    el = `<strong class="d-block">Jumlah (Bangunan)</strong>`;
                } else {
                    el = `<strong class="d-block">Jumlah (Orang)</strong>`;
                }

                document.getElementById("pd").innerHTML = states.length
                    ? `<div>${titleCase(
                          states[0].properties.Kelurahan
                      )}</div><p class="mb-0 my-2">
                      ${el}<span style="font-size:15px;">
                      ${
                          localStorage.getItem("filterCategoryChoro") == "omzet"
                              ? `Rp. ${separatorNum(
                                    states[0].properties["Total omzet"]
                                )}`
                              : `${separatorNum(
                                    states[0].properties["Jumlah"]
                                )}`
                      }</span></p>`
                    : `<p class="mb-0">Arahkan kursor</p>`;
            });
            let layers;
            let minFix =
                min / 1000000000 < 1
                    ? Math.round((min / 1000000000 + Number.EPSILON) * 1000) /
                      1000
                    : Math.round((min / 1000000000 + Number.EPSILON) * 100) /
                      100;
            if (category == "omzet") {
                layers = [
                    `${minFix} - ${
                        Math.round(
                            ((min + average * 1 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                    `${
                        Math.round(
                            ((min + average * 1 + 2) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    } - ${
                        Math.round(
                            ((min + average * 2 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                    `${
                        Math.round(
                            ((min + average * 2 + 2) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    } - ${
                        Math.round(
                            ((min + average * 3 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                    `${
                        Math.round(
                            ((min + average * 3 + 2) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    } - ${
                        Math.round(
                            ((min + average * 4 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                    `${
                        Math.round(
                            ((min + average * 4 + 2) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    } - ${
                        Math.round(
                            ((min + average * 5 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                    `> ${
                        Math.round(
                            ((min + average * 5 + 1) / 1000000000 +
                                Number.EPSILON) *
                                100
                        ) / 100
                    }`,
                ];
            } else {
                layers = [
                    `${min} - ${min + average * 1 + 1}`,
                    `${min + average * 1 + 2} - ${min + average * 2 + 1}`,
                    `${min + average * 2 + 2} - ${min + average * 3 + 1}`,
                    `${min + average * 3 + 2} - ${min + average * 4 + 1}`,
                    `${min + average * 4 + 2} - ${min + average * 5 + 1}`,
                    `> ${min + average * 5 + 2}`,
                ];
            }
            let colors;

            if (category == "omzet") {
                colors = [
                    "#ffeda0",
                    "#ffe675",
                    "#ffdf52",
                    "#ffd61f",
                    "#e0b700",
                    "#caa502",
                ];
            } else if (pekerjaan.includes(category)) {
                colors = [
                    "#1cfc03",
                    "#22eb0c",
                    "#22db0d",
                    "#1dbd0b",
                    "#1aa60a",
                    "#198f0b",
                ];
            } else if (pendidikan.includes(category)) {
                colors = [
                    "#254ef5",
                    "#1e43d6",
                    "#1a3aba",
                    "#142f99",
                    "#10267d",
                    "#0b1a57",
                ];
            } else if (agama.includes(category)) {
                colors = [
                    "#a90ffc",
                    "#980ee3",
                    "#870cc9",
                    "#740aad",
                    "#650996",
                    "#51057a",
                ];
            } else if (category == "kepadatan") {
                colors = [
                    "#f7143e",
                    "#d61135",
                    "#b50e2d",
                    "#990c26",
                    "#7d091e",
                    "#690619",
                ];
            } else if (category == "jumlah_penduduk") {
                colors = [
                    "#0ce8e4",
                    "#0ac9c6",
                    "#09adab",
                    "#068f8d",
                    "#057876",
                    "#04615f",
                ];
            } else if (category == "count_polygons") {
                colors = [
                    "#ff6a14",
                    "#eb6010",
                    "#d6580f",
                    "#bd4f0f",
                    "#a8460d",
                    "#963e0b",
                ];
            }
            // create legend
            const legend = document.getElementById("legends");
            legend.innerHTML = "";

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
        },
    });
};

//add source layer
function addSourceLayer(item) {
    var api = [
        "wilayah",
        "zoning",
        "iumk",
        "sewa",
        "investasi",
        "pipa",
        "budaya",
        // "ipal",
        // "util",
        // "phb",
        "tol",
        "sungai",
        "survey",
    ];

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
        if (map.getLayer(dt + "_label")) {
            map.removeLayer(dt + "_label");
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

        if (dt !== "survey") {
            $.ajax({
                url: `${url}/${dt}`,
                type: "POST",
                dataType: "json",
                data: {
                    kelurahan: item,
                },
                headers: {
                    Authorization: `Bearer ${token}`,
                },
                success: (data) => {
                    map.addSource(dt, {
                        type: "geojson",
                        data: data,
                    });
                    addLayers(dt);
                    onOffLayers(dt);

                    // if (localStorage.getItem("searching") == 1) {
                },
            });
        } else {
            $.ajax({
                url: `${APP_URL}/${dt}/${item}`,
                type: "get",
                dataType: "json",
                success: (data) => {
                    map.addSource(dt, {
                        type: "geojson",
                        data: data,
                    });
                    addLayers(dt);
                    onOffLayers(dt);
                    let data_layer = data.features;
                    let content = "";
                    console.log(data_layer);
                    $(".list-item-survey-perkembangan").html("");
                    if (data_layer.length == 0) {
                        content += `
                            <div class="item mb-3">
                                <p>Tidak Ada Lokasi yang di Simpan</p>
                            </div>
                        `;
                    } else {
                        data_layer.forEach(function (item) {
                            let thumbnail = item.properties.image;
                            content += `
                            <div class="item mb-3">
                            <div class="row">
                                <div class="col-4">
                                    <img width="100px" height="90px" style="object-fit: cover; border-radius:15px" src="${APP_URL}/survey/${
                                thumbnail.length == 0
                                    ? "not_image.png"
                                    : thumbnail[0].name
                            }">
                                </div>
                                <div class="col-8">
                                    <span style="font-size: 11pt" class="font-weight-bold">${
                                        item.properties.name
                                    }</span>
                                    <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Pola Regional :
                                        <span>${
                                            item.properties.regional
                                        }</span></label>
                                    <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Pola Lingkungan :
                                        <span>${
                                            item.properties.neighborhood
                                        }</span></label>
                                    <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Pola Ruang : <span>${
                                        item.properties.transect_zone
                                    }</span></label>
                                </div>
                            </div>
                        </div>
                            `;
                        });
                    }

                    $(".list-item-survey-perkembangan").html(content);
                    // if (localStorage.getItem("searching") == 1) {
                },
            });
        }
    }

    let coordCliked = localStorage.getItem("kordinat").toString().split(",");
    console.log(coordCliked);
    let lat = coordCliked[0];
    let lng = coordCliked[1];
    // map.on("sourcedata", (e) => {
    console.log(lat, lng);
    $("body").css("pointer-events", "none");
    setTimeout(() => {
        localStorage.setItem("loaded", 1);
        $("body").css("pointer-events", "all");
        map.fire("click", {
            lngLat: {
                lng: lng,
                lat: lat,
            },
        });
    }, 3000);
    // }
    localStorage.setItem("searching", 0);

    if (map.getLayer("banjir_fill")) {
        map.removeLayer("banjir_fill");
    }

    if (map.getSource("banjir")) {
        map.removeSource("banjir");
    }

    banjir(localStorage.getItem("kelurahan"), tahun);

    $("#ControlTahunBanjir").change(function () {
        var layer = map.getLayer("banjir_fill");
        // var condition = layer.visibility == "visible" ? "visible" : "none";
        map.removeLayer("banjir_fill");
        map.removeSource("banjir");

        banjir(localStorage.getItem("kelurahan"), tahun);
        // map.addSource("banjir", {
        //     type: "geojson",
        //     data: `${url}/banjir/${item}/${tahun}`,
        // });
        // banjir();
        // $.ajax({
        //     url: `${url}/banjir`,
        //     type: "POST",
        //     dataType: "json",
        //     data: {
        //         kelurahan: item,
        //         tahun: tahun,
        //     },
        //     headers: {
        //         Authorization: `Bearer ${token}`,
        //     },
        //     success: (e) => {
        //         map.addSource("banjir", {
        //             type: "geojson",
        //             data: e,
        //         });
        //         addLayers("banjir");
        //     },
        // });
        // map.addLayer({
        //     id: "banjir_fill",
        //     type: "fill",
        //     source: "banjir",
        //     paint: {
        //         "fill-color": "#2980b9",
        //         "fill-opacity": 0.9,
        //     },
        //     layout: {
        //         visibility: condition,
        //     },
        // });
    });
    // banjir();
    $(".lblLayer").show();
    $(".closeCollapse").show();
    // $('#kbliTwo').show()
    // $('').show()
}

//add layer
function addLayers(layer) {
    if (layer == "wilayah") {
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
    } else if (layer == "zoning") {
        map.addLayer({
            id: "zoning_fill",
            type: "fill",
            source: "zoning",
            layout: {
                "text-field": "test",
            },
            paint: {
                "fill-color": ["get", "fill"],
                "fill-opacity": 1,
                "fill-outline-color": "white",
            },
            layout: {
                visibility: "none",
            },
        });

        map.addLayer({
            id: "zoning_label",
            type: "symbol",
            source: "zoning",
            layout: {
                "text-field": ["get", "Sub Zona"],
                "text-font": ["DIN Offc Pro Medium", "Arial Unicode MS Bold"],
                "text-size": 12,
                visibility: "none",
            },
        });
    } else if (layer == "investasi") {
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
    } else if (layer == "banjir") {
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
    } else if (layer == "iumk") {
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
    } else if (layer == "survey") {
        map.addLayer({
            id: "survey_dot",
            type: "circle",
            source: "survey",
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
    } else if (layer == "sewa") {
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
    } else if (layer == "pipa") {
        map.addLayer({
            id: "pipa_multilinestring",
            type: "line",
            source: "pipa",
            paint: {
                "line-color": "#fff",
                "line-width": 3,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "util") {
        map.addLayer({
            id: "util_multilinestring",
            type: "line",
            source: "util",
            paint: {
                "line-color": "orange",
                "line-width": 3,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "phb") {
        map.addLayer({
            id: "phb_multilinestring",
            type: "line",
            source: "phb",
            paint: {
                "line-color": "#FC427B",
                "line-width": 3,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "tol") {
        map.addLayer({
            id: "tol_multilinestring",
            type: "line",
            source: "tol",
            paint: {
                "line-color": "orange",
                "line-width": 3,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "sungai") {
        map.addLayer({
            id: "sungai_multilinestring",
            type: "line",
            source: "sungai",
            paint: {
                "line-color": "blue",
                "line-width": 3,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "budaya") {
        map.addLayer({
            id: "budaya_dot",
            type: "circle",
            source: "budaya",
            paint: {
                "circle-color": "#27ae60",
                "circle-stroke-color": "#ffffff",
                "circle-stroke-width": 1,
                "circle-radius": 4,
                "circle-opacity": 0.8,
            },
            layout: {
                visibility: "none",
            },
        });
    } else if (layer == "ipal") {
        map.addLayer({
            id: "ipal_dot",
            type: "circle",
            source: "ipal",
            paint: {
                "circle-color": "#e67e22",
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

function onOffLayers(layer) {
    //Wilayah
    if (layer == "wilayahindex") {
        if ($("#wilayahindex_fill").prop("checked") == true) {
            // localStorage.setItem("filterCategoryChoro", "omzet");
            showLayer("wilayahindex_fill");
            // $(".detail_omzet").show();
            $(".detail_jumlah").show();
        } else {
            hideLayer("wilayahindex_fill");
            // $(".detail_omzet").hide();
            $(".detail_jumlah").hide();
        }
        $("#wilayahindex_fill").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("wilayahindex_fill");
                $(".detail_omzet").show();
                $(".detail_jumlah").show();
                $("#btnInteractive").addClass("text-primary");
                // map.setCenter([106.6894316, -6.229728]);
                // map.setZoom(11);
                map.easeTo({
                    zoom: 11,
                    center: {
                        lng: 106.80331075792759,
                        lat: -6.231019525132169,
                    },
                });
            } else {
                hideLayer("wilayahindex_fill");
                $(".detail_omzet").hide();
                $(".detail_jumlah").hide();
                $("#btnInteractive").removeClass("text-primary");
                localStorage.setItem("filterChoro", 0);
            }
        });
    }

    //Peta Zonasi
    if (layer == "zoning") {
        if ($("#zoning_fill").prop("checked") == true) {
            showLayer("zoning_fill");
            showLayer("zoning_label");
            map.moveLayer("zoning_fill", "add-3d-buildings");
        } else {
            hideLayer("zoning_fill");
            hideLayer("zoning_label");
        }

        $("#zoning_fill").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("zoning_fill");
                showLayer("zoning_label");
                map.moveLayer("zoning_fill", "add-3d-buildings");
            } else {
                hideLayer("zoning_fill");
                hideLayer("zoning_label");
            }
        });
    }

    if (layer == "pipa") {
        if ($("#pipa_multilinestring").prop("checked") == true) {
            showLayer("pipa_multilinestring");
        } else {
            hideLayer("pipa_multilinestring");
        }

        $("#pipa_multilinestring").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("pipa_multilinestring");
            } else {
                hideLayer("pipa_multilinestring");
            }
        });
    }

    if (layer == "tol") {
        if ($("#tol_multilinestring").prop("checked") == true) {
            showLayer("tol_multilinestring");
        } else {
            hideLayer("tol_multilinestring");
        }

        $("#tol_multilinestring").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("tol_multilinestring");
            } else {
                hideLayer("tol_multilinestring");
            }
        });
    }

    if (layer == "sungai") {
        if ($("#sungai_multilinestring").prop("checked") == true) {
            showLayer("sungai_multilinestring");
        } else {
            hideLayer("sungai_multilinestring");
        }

        $("#sungai_multilinestring").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("sungai_multilinestring");
            } else {
                hideLayer("sungai_multilinestring");
            }
        });
    }

    if (layer == "util") {
        if ($("#util_multilinestring").prop("checked") == true) {
            showLayer("util_multilinestring");
        } else {
            hideLayer("util_multilinestring");
        }

        $("#util_multilinestring").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("util_multilinestring");
            } else {
                hideLayer("util_multilinestring");
            }
        });
    }

    if (layer == "phb") {
        if ($("#phb_multilinestring").prop("checked") == true) {
            showLayer("phb_multilinestring");
        } else {
            hideLayer("phb_multilinestring");
        }

        $("#phb_multilinestring").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("phb_multilinestring");
            } else {
                hideLayer("phb_multilinestring");
            }
        });
    }

    if (layer == "banjir") {
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

    if (layer == "ipal") {
        if ($("#ipal_dot").prop("checked") == true) {
            showLayer("ipal_dot");
        } else {
            hideLayer("ipal_dot");
        }

        $("#ipal_dot").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("ipal_dot");
            } else {
                hideLayer("ipal_dot");
            }
        });
    }

    if (layer == "survey") {
        $("#survey_dot").change(function () {
            if ($(this).prop("checked") == true) {
                $(".info-layer-survey-perkembangan").show();
                showLayer("survey_dot");
                hideLayer("sewa_fill");
                hideLayer("iumk_fill");
                hideLayer("investasi_fill");
                hideLayer("investasi_dot");
                hideLayer("investasi_line");
                hideLayer("budaya_dot");
                $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
            } else {
                hideLayer("survey_dot");
            }
        });
    }

    if (layer == "iumk") {
        //Sebaran Usaha mikro kecil
        $("#iumk_fill").change(function () {
            if ($(this).prop("checked") == true) {
                $(".info-layer-usaha").show();
                showLayer("iumk_fill");
                hideLayer("sewa_fill");
                hideLayer("investasi_fill");
                hideLayer("investasi_dot");
                hideLayer("investasi_line");
                hideLayer("budaya_dot");
                hideLayer("survey_dot");
                $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
                $(".list-item-usaha").html("");
                $("#hide_side_bar").hide();
                var content = "";
                var infoUsaha = sebaran_usaha[0].features;
                for (
                    let index = 0;
                    index < sebaran_usaha[0].features.length;
                    index++
                ) {
                    var coord = [
                        infoUsaha[index]["properties"]["Lat"],
                        infoUsaha[index]["properties"]["Long"],
                    ];
                    content += `
                    <div class="item mb-3">
                    <div class="row">
                        <div class="col-4">
                            <img id="imgUsaha-${index}" width="100px" height="90px" style="object-fit: cover; border-radius:15px" src="/assets/gambar/load.svg">
                        </div>
                        <div class="col-8">
                            <span style="font-size: 11pt" class="font-weight-bold" class="inf-nama-kantor">${infoUsaha[index]["properties"]["Nama Usaha"]}</span>
                            <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Pemilik Usaha :
                                <span>${infoUsaha[index]["properties"]["Pemilik Usaha"]}</span></label>
                            <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Jenis Usaha :
                                <span>${infoUsaha[index]["properties"]["Jenis Usaha"]}</span></label>
                            <label class="w-100" style="font-size: 13px; margin-bottom:-5px">Tenaga Kerja : <span>${infoUsaha[index]["properties"]["Tenaga Kerja"]}
                                    Orang</span></label>
                        </div>
                    </div>
                </div>
                    `;
                    getIumkForInfo(coord, `#imgUsaha-${index}`);
                }
                $(".list-item-usaha").html(content);
            } else {
                hideLayer("iumk_fill");
            }
        });
    }

    if (layer == "sewa") {
        //Harga Sewa Kantor
        $("#sewa_fill").change(function () {
            if ($(this).prop("checked") == true) {
                showLayer("sewa_fill");
                hideLayer("iumk_fill");
                hideLayer("investasi_fill");
                hideLayer("investasi_dot");
                hideLayer("investasi_line");
                hideLayer("budaya_dot");
                hideLayer("survey_dot");
                $(".list-item").html("");
                var infoHarga = popUpHarga[0].features;
                $(".info-layer").show();
                var content = "";
                // console.log(infoHarga);
                if (infoHarga !== null) {
                    $("#hide_side_bar").hide();
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

                        $(".mapboxgl-popup-content").css("background", "green");
                        $(".mapboxgl-popup-content").css("color", "white");
                        $(".mapboxgl-popup-tip").css(
                            "border-top-color",
                            "green"
                        );
                        $(".mapboxgl-popup-tip").css(
                            "border-bottom-color",
                            "green"
                        );
                        content += `
                        <div class="item mb-3">
                        <div class="row">
                            <div class="col-4">
                                <img width="100px" height="90px" style="object-fit: cover; border-radius:15px"
                                    src="https://jakpintas.dpmptsp-dki.com/rent/${
                                        infoHarga[index]["properties"]["Foto"]
                                    }">
                            </div>
                            <div class="col-8">
                                <p style="font-size: 11pt;margin-bottom:-1px" class="font-weight-bold" class="inf-nama-kantor">${
                                    infoHarga[index]["properties"]["Nama"]
                                }</p>
                                <lable style="font-size: 13px; line-height:1; margin-bottom: -13px;" class="inf-alamat-sewa"><span>${
                                    infoHarga[index]["properties"]["Alamat"]
                                }</span></lable>
                                <p style="font-size: 13px; line-height:0; margin-top:10px !important;" class="inf-harga-sewa"> <span>Rp. ${separatorNum(
                                    infoHarga[index]["properties"]["Sewa"]
                                )}</span></p>
                            </div>
                        </div>
                    </div>
                        `;
                    }
                    $(".list-item").html(content);
                } else {
                    content = `<p style="font-size: 13px;">Tidak Ada Data</p>`;
                    $(".list-item").html(content);
                }

                $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").css(
                    "display",
                    ""
                );
                window.stop();
            } else {
                hideLayer("sewa_fill");
                $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
            }
        });
    }

    if (layer == "investasi") {
        //proyek_potensial
        $("#investasi_fill").change(function () {
            if ($(this).prop("checked") == true) {
                var infoProyek = proyek[0].features;
                $(".info-layer-investasi").show();
                if (infoProyek !== null) {
                    showLayer("investasi_fill");
                    hideLayer("iumk_fill");
                    hideLayer("sewa_fill");
                    hideLayer("budaya_dot");
                    hideLayer("survey_dot");
                    $(
                        "div.mapboxgl-popup.mapboxgl-popup-anchor-bottom"
                    ).remove();
                    $(".list-item-investasi").html("");
                    var content = "";
                    for (
                        let index = 0;
                        index < proyek[0].features.length;
                        index++
                    ) {
                        content += `
                            <li class="item mb-3" style="margin-left:-20px">
                                <a href="#" style="font-size: 11pt; cursor:pointer" onclick="geocoder.query('${
                                    infoProyek[index]["geometry"][
                                        "coordinates"
                                    ][1]
                                },${
                            infoProyek[index]["geometry"]["coordinates"][0]
                        }')" class="font-weight-bold">${
                            infoProyek[index]["properties"]["Nama"]
                        }</a>
                                <ul style="list-style:none">
                                    <li style="font-size:13px;margin-left:-2.4rem">${
                                        infoProyek[index]["properties"][
                                            "Pemilik"
                                        ] == ""
                                            ? ""
                                            : infoProyek[index]["properties"][
                                                  "Pemilik"
                                              ]
                                    }</li>
                                    <li style="font-size:13px;margin-left:-2.4rem"><b>Luas Lahan</b> : ${
                                        infoProyek[index]["properties"][
                                            "Luas_Lahan"
                                        ] == ""
                                            ? ""
                                            : `${separatorNum(
                                                  infoProyek[index][
                                                      "properties"
                                                  ]["Luas_Lahan"]
                                              )} m<sup>2</sup>`
                                    }</li>
                                    <li style="font-size:13px;margin-left:-2.4rem"><b>Jenis Sertifikat</b> : ${
                                        infoProyek[index]["properties"][
                                            "Jenis_Sertifikat"
                                        ] == ""
                                            ? ""
                                            : `${infoProyek[index]["properties"]["Jenis_Sertifikat"]}`
                                    }</li>
                                    <li style="font-size:13px;margin-left:-2.4rem"><b>Total Investasi</b> : ${
                                        infoProyek[index]["properties"][
                                            "Total_Investasi"
                                        ] == ""
                                            ? ""
                                            : `Rp. ${separatorNum(
                                                  infoProyek[index][
                                                      "properties"
                                                  ]["Total_Investasi"]
                                              )}`
                                    }</li>
                                </ul>
                            </li>
                        `;
                    }
                    $(".list-item-investasi").html(content);
                    window.stop();
                } else {
                    content = '<p style="font-size: 13px;">Tidak Ada Data</p>';
                    $(".list-item-investasi").html(content);
                }
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
    }

    if (layer == "budaya") {
        $("#budaya_dot").change(function () {
            if ($(this).prop("checked") == true) {
                var infoBudaya = budaya[0].features;
                $(".info-layer-budaya").show();
                if (infoBudaya !== null) {
                    showLayer("budaya_dot");
                    hideLayer("iumk_fill");
                    hideLayer("sewa_fill");
                    hideLayer("investasi_fill");
                    hideLayer("survey_dot");
                    $(
                        "div.mapboxgl-popup.mapboxgl-popup-anchor-bottom"
                    ).remove();
                    $(".list-item-budaya").html("");
                    var content = "";
                    for (
                        let index = 0;
                        index < budaya[0].features.length;
                        index++
                    ) {
                        content += `
                            <li class="item mb-3" style="margin-left:-20px">
                                <span style="font-size: 11pt" class="font-weight-bold">${infoBudaya[index]["properties"]["Name"]}</span>
                                <label style="font-size: 13px;">${infoBudaya[index]["properties"]["Keterangan"]}</label>
                            </li>
                        `;
                    }
                    $(".list-item-budaya").html(content);
                    // window.stop();
                } else {
                    content = '<p style="font-size: 13px;">Tidak Ada Data</p>';
                    $(".list-item-budaya").html(content);
                }
            } else {
                hideLayer("budaya_dot");
            }
        });
    }
}

$(document).on("click", ".wilayah-select", function () {
    $(".wm-search__dropdown").fadeOut();
    $("#btn-titik").show();
    // if (localStorage.getItem("kelurahan") !== null) {
    //     $("#btn-titik").slick("unslick");
    // }
    // if (
    //     localStorage.getItem("filterChoro") !== 0 &&
    //     localStorage.getItem("filterChoro") !== null
    // ) {
    //     $("#btn-titik").slick("unslick");
    // }
    // $("#btn-titik").slick({
    //     infinite: true,
    //     slidesToShow: 4,
    //     slidesToScroll: 4,
    //     variableWidth: true,
    //     prevArrow: null,
    //     nextArrow: null,
    // });
    const coor = $(this).data("kordinat");
    const kel = $(this).data("wilayah");
    const text = $(this).text();
    $("#cari_wilayah").val(text);
    localStorage.setItem("searching", 1);
    localStorage.setItem("kordinat", coor);

    popUpHarga = [];
    popUpHarga = getDataSewa(kel);
    sebaran_usaha = [];
    sebaran_usaha = getDataSebaranUsaha(kel);
    proyek = [];
    proyek = getDataProyek(kel);
    budaya = [];
    budaya = getDataBudaya(kel);
    // console.log(coor.split(","));
    console.log(typeof coor);
    saveKelurahan(kel);
    // setKelurahanSession(kel);
    geocoder.query(coor);
    if (localStorage.getItem("direction") == 1) {
        addSourceLayer(kel);
    }
    cekProyek(coor);
    // showLayer("investasi_dot");
});

function cekProyek(coor) {
    var coord = coor.split(",");
    $.ajax({
        url: `${url}/project`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            lat: coord[0],
            lng: coord[1],
        },
        success: function (e) {
            const dt = JSON.parse(e);
            console.log(dt.features);
            if (dt.features !== null) {
                showLayer("investasi_dot");
            }
        },
    });
}

function saveKelurahan(kel) {
    localStorage.setItem("kelurahan", kel);
    $.ajax({
        url: `${APP_URL}/saveKelurahan/${kel}`,
        method: "GET",
        success: function (e) {
            localStorage.setItem("id_kelurahan", e);
        },
    });
}

// onOffLayers();

function separatorNum(val) {
    var parts = val.toString().split(",");
    const numberPart = parts[0];
    const decimalPart = parts[1];
    const thousands = /\B(?=(\d{3})+(?!\d))/g;
    return (
        numberPart.replace(thousands, ",") +
        (decimalPart ? "." + decimalPart : "")
    );
}

function getDataSewa(kel) {
    var data = [];
    setTimeout(function () {
        $.ajax({
            url: `${url}/sewa`,
            method: "POST",
            data: {
                kelurahan: kel,
            },
            headers: {
                Authorization: `Bearer ${token}`,
            },
            dataType: "json",
            success: function (e) {
                // console.log(e);
                data.push(e);
            },
        });
    }, 1000);

    return data;
}

function getDataSebaranUsaha(kel) {
    var data = [];
    setTimeout(function () {
        $.ajax({
            url: `${url}/iumk`,
            method: "POST",
            headers: {
                Authorization: `Bearer ${token}`,
            },
            data: {
                kelurahan: kel,
            },
            dataType: "json",
            success: function (e) {
                // console.log(e);
                data.push(e);
            },
        });
    }, 1000);

    return data;
}

function getDataProyek(kel) {
    var data = [];
    setTimeout(function () {
        $.ajax({
            url: `${url}/investasi`,
            method: "POST",
            headers: {
                Authorization: `Bearer ${token}`,
            },
            data: {
                kelurahan: kel,
            },
            dataType: "json",
            success: function (e) {
                // console.log(e);
                data.push(e);
            },
        });
    }, 1000);

    return data;
}

function getDataBudaya(kel) {
    var data = [];
    setTimeout(function () {
        $.ajax({
            url: `${url}/budaya`,
            method: "POST",
            headers: {
                Authorization: `Bearer ${token}`,
            },
            data: {
                kelurahan: kel,
            },
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
        url: `${url}/kbli1`,
        method: "POST",
        data: {
            subzona: subzona,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        dataType: "json",
        success: function (e) {
            $("#kegiatanRuang").html("");
            $("#skala").html("");
            $("#kegiatanKewenangan").html("");
            var htmlContent = "";
            $("#btn-print").hide();
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
        url: `${url}/kbli2`,
        method: "POST",
        headers: {
            Authorization: `Bearer ${token}`,
        },
        data: {
            subzona: zonasi,
            kegiatan: sel,
        },
        dataType: "json",
        success: function (res) {
            $("#btn-print").hide();
            if (res != null) {
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
        url: `${url}/kbli3`,
        method: "post",
        data: {
            subzona: zonasi,
            kegiatan: sel,
            skala: skala,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        dataType: "json",
        success: function (res) {
            var resHTML = "";
            if (res != null) {
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

// function setKelurahanSession(kel) {
//     $.ajax({
//         url: `${APP_URL}/setKelurahan/${kel}`,
//         method: "POST",
//         data: {
//             _token: $('meta[name="csrf-token"]').attr("content"),
//         },
//         success: function (e) {
//             console.log(e);
//         },
//     });
// }

function SavePDFtoServer() {
    var data_pie = $("#pie-chart-info").get(0).toDataURL("img/png");
    var data_bar = $("#bar-chart-grouped-info").get(0).toDataURL("img/png");
    chart = `
        <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <center>
              <img src="${data_pie}" width="70%">
            </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="${data_bar}" width="70%">
          </center>
        </div>
      </div>
        `;
    var html = [
        imgMaps,
        lokasi,
        chart,
        pendapatan,
        zona,
        eksisting,
        bpn,
        harga,
        fasilitas,
        kbli_data,
    ].join("");
    var opt = {
        margin: [10, 30, 10, 30],
        html2canvas: { scale: 2, logging: true },
    };
    html2pdf()
        .set(opt)
        .from(html)
        .toPdf()
        .output("datauristring")
        .then((r) => {
            var uristring = r.split(",");
            r = uristring[1];
            var data = {
                _token: $('meta[name="csrf-token"]').attr("content"),
                uristring: r,
                name_file: name_file,
            };
            // $.post(`${APP_URL}/savePDF`, data);
        });
}

function cekLoginChat() {
    var status;
    $.ajax({
        url: `${APP_URL}/cekLoginChat`,
        method: "GET",
        success: function (e) {
            // status += e;
            // var id_admin = localStorage.getItem("id_kelurahan");
            // var kelurahan = localStorage.getItem("kelurahan");
            if (e == 1) {
                count += 1;
                if ($("#boxKonsul").length == 0) {
                    $("#frameChat")
                        .append(`<iframe src="${APP_URL}/konsul" id="boxKonsul" name="myFrame" height="450" width="100%"
                    style="border: none;border-radius:10px;"></iframe>`);
                }
            } else {
                $(".abcRioButtonContentWrapper").trigger("click");
                localStorage.setItem("opsi", "chat");
            }
        },
    });
    if (count % 2 == 0) {
        $("#frameChat").html("");
    }
    // console.log(status);
}

function getDataPin(id_user) {
    $.ajax({
        url: `${APP_URL}/getDataPin/${id_user}`,
        method: "GET",
        success: function (e) {
            var html = "";
            if (e != "") {
                $("#messageNoData").hide();
                for (let index = 0; index < e.length; index++) {
                    html += `<div class="mb-3" style="font-size:10pt;">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <img src="/favorit/${e[index].image[0].name}" class="w-100" style="border-radius: 10px; height:40px; cursor: pointer" onclick="detailDataPin(${e[index].id})">
                        </div>
                        <div class="col-sm-6">
                            <a style="font-weight: bold;word-break: break-all;
                            white-space: normal; cursor: pointer;" onclick="geocoder.query('${e[index].kordinat}');addSourceLayer('${e[index].kelurahan}');">${e[index].judul} (${e[index].tipe})</a><br><span style="width:70%;word-break: break-all;
                            white-space: normal;">${e[index].catatan}</span>
                        </div>
                        <div class="col-sm-3 d-flex align-items-center">
                        <div class="row">
                            <div class="col-6 p-1">
                                <a onclick="deleteDataPin(
                                    ${e[index].id},
                                    ${id_user}
                                )" style="cursor:pointer;color:red;font-size: 18px;"><i class="fa fa-trash"></i></a>
                            </div>
                            <div class="col-6 p-1">
                                <a class="mt-1" onclick="editDataPin(
                                    ${e[index].id},
                                    ${id_user}
                                )" style="cursor:pointer;color:blue;font-size: 18px;"><i style="margin-top:6px" class="fa fa-edit"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>`;
                }
                $(".list-item-info-location").html("");
                $(".list-item-info-location").html(html);
            } else {
                $(".list-item-info-location").html("");
                $("#messageNoData").show();
            }
        },
    });
}

function editDataPin(id, id_user) {
    $("#previewFotoEdit").html("");
    $.ajax({
        url: `${APP_URL}/editDataPin`,
        method: "POST",
        data: {
            id: id,
            id_user: id_user,
        },
        success: (e) => {
            for (var i = 0; i < e.image.length; i++) {
                $("#previewFotoEdit").append(`
                <div class="col-md-4 image-edit image-${i}">
                    <img src="/favorit/${e.image[i].name}" class="w-100">
                    <button type="button" onclick="deleteImage(${i}, ${e.image[i].id})" class="close" style="position: absolute;color: red;right:1rem;top: -0.4rem;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                `);
            }
            $("#formPinLocation").hide();
            $("#formPinLocationEdit").show();
            $("#idPinEdit").val(e.id);
            $("#kordinatPinEdit").val(e.kordinat);
            $("#judulPinEdit").val(e.judul);
            $("#judulPinEdit").val(e.judul);
            $("#tipePinEdit").val(e.tipe);
            $("#catatanPinEdit").val(e.catatan);
            console.log(e);
        },
    });
}

function deleteImage(id, id_gambar) {
    if (id_gambar == 0) {
        $(`.image-${id}`).remove();
    } else {
        $(`.image-${id}`).remove();
        $.ajax({
            url: `${APP_URL}/deleteImage`,
            method: "POST",
            data: {
                id: id_gambar,
            },
            success: (e) => {},
        });
    }
}

function detailDataPin(id) {
    $.ajax({
        url: `${APP_URL}/detailDataPin`,
        method: "POST",
        data: {
            id: id,
        },
        success: function (e) {
            console.log(e);
            $(".info-lokasi-detail").html("");
            let html = ``;
            html += `
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <button type="button" class="close" id="closeDetail" aria-label="Close"
                style="position: absolute; z-index: 9; right: 1rem;">
                <span aria-hidden="true">&times;</span>
            </button>
            <ol class="carousel-indicators">`;

            for (let index = 0; index < e.image.length; index++) {
                html += `
                    <li data-target="#carouselExampleIndicators" data-slide-to="${index}" ${
                    index == 0 ? "class='active'" : ""
                }></li>
                    `;
            }

            html += `
            </ol>
            <div class="carousel-inner">
            `;
            for (let index = 0; index < e.image.length; index++) {
                html += `
                <div class="carousel-item ${index == 0 ? "active" : ""}">
                    <img class="d-block w-100"
                        src="/favorit/${e.image[index].name}">
                </div>
                `;
            }

            html += `
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container p-4">
            <div class="mt-3">
                <h4>${e.judul}</h4>
                <p style="font-size: 10pt">${e.catatan}</p>
            </div>
        </div>
            `;
            $(".info-lokasi-detail").html(html);
            $(".info-lokasi-detail").show();

            $("#closeDetail").on("click", (e) => {
                $(".info-lokasi-detail").hide();
            });
        },
    });
}

function deleteDataPin(id_data, id_user) {
    $.ajax({
        url: `${APP_URL}/deleteDataPin`,
        method: "POST",
        data: {
            id_data: id_data,
        },
        success: (e) => {
            getDataPin(id_user);
            $("#pesanBerhasilHapus").show();
            setTimeout(function () {
                $("#pesanBerhasilHapus").hide();
            }, 3000);
        },
    });
}

function pinLocation() {
    $.ajax({
        url: `${APP_URL}/cekLoginChat`,
        method: "GET",
        success: function (e) {
            if (e == 1) {
                $.ajax({
                    url: `${APP_URL}/getIdUser`,
                    method: "GET",
                    success: (e) => {
                        $(".info-pin-location").show();
                        getDataPin(e);
                    },
                });
            } else {
                $(".abcRioButtonContentWrapper").trigger("click");
                localStorage.setItem("opsi", "pin");
            }
        },
    });
}

function surveyLocation() {
    resetSurvey();
    $.ajax({
        url: `${APP_URL}/cekLoginChat`,
        method: "GET",
        success: function (e) {
            if (e == 1) {
                $.ajax({
                    url: `${APP_URL}/getIdUser`,
                    method: "GET",
                    success: (e) => {
                        $(".info-survey-location").show();
                        getDataSurvey(e);
                    },
                });
            } else {
                $(".abcRioButtonContentWrapper").trigger("click");
                localStorage.setItem("opsi", "survey");
            }
        },
    });
}

const focusSurey = () => {
    location.href = "#infoSurveyLocation";
};

const resetSurvey = () => {
    files = [];
    localStorage.setItem("url_survey", `${APP_URL}/saveDataSurvey`);
    $("#idSurvey").val("");
    $("#nameSurvey").val("");
    $("#kordinatSurvey").val("");
    $("#idSubblokSurvey").val("");
    $("#kelurahanSurvey").val("");
    $("#kecamatanSurvey").val("");
    $("#regionalSurvey").val("");
    $("#deskripsiRegionalSurvey").val("");
    $("#neighborhoodSurvey").val("");
    $("#deskripsiNeighborhoodSurvey").val("");
    $("#transectZoneSurvey").val("");
    $("#deskripsiTransectZoneSurvey").val("");
    $("#gambarLokasiSurvey").val("");
    $("#refrensiGoogleMaps").text("-");
    $("#refrensiGoogleMapsBulk").text("-");
    $("#refrensiGoogleMaps").attr("href", "#");
    $("#refrensiGoogleMapsBulk").attr("href", "#");
    $("#textidSubblokSurvey").text("-");
    $("#textidSubblokSurveyBulk").text("-");
    $("#textkelurahanSurvey").text("-");
    $("#textkelurahanSurveyBulk").text("-");
    $("#textkecamatanSurvey").text("-");
    $("#textkecamatanSurveyBulk").text("-");
    if (
        $("div#previewFotoSurvey.slick-initialized.slick-slider").length !== 0
    ) {
        $("#previewFotoSurvey").slick("unslick");
        $("#previewFotoSurvey").html("");
        sliderOption("previewFotoSurvey");
    }
    $("#resetSurey").hide();
};

function getDataSurvey(id_user) {
    $.ajax({
        url: `${APP_URL}/getDataSurvey/${id_user}`,
        method: "GET",
        success: function (e) {
            var html = "";
            if (e != "") {
                $("#messageNoDataSurvey").hide();
                e.forEach((e) => {
                    html += `<div class="mb-3" style="font-size:10pt;">
                    <div class="row">
                        <div class="col-sm-3 text-center">
                            <img src="/survey/${
                                e.image[0] == undefined
                                    ? "not_image.png"
                                    : e.image[0].name
                            }" class="w-100" style="border-radius: 10px; height:75px; cursor: pointer; border:1px #ccc solid; object-fit:cover;" onclick="focusSurey();localStorage.setItem('kordinat','${
                        e.kordinat
                    }');geocoder.query('${e.kordinat}');addSourceLayer('${
                        e.kelurahan
                    }');editDataSurvey(
                        ${e.id},
                        ${id_user}
                    )">
                        </div>
                        <div class="col-sm-7" onclick="focusSurey();localStorage.setItem('kordinat','${
                            e.kordinat
                        }');geocoder.query('${e.kordinat}');addSourceLayer('${
                        e.kelurahan
                    }');editDataSurvey(
                    ${e.id},
                    ${id_user}
                )" style="cursor: pointer;">
                            <a style="font-weight: bold;word-break: break-all;
                            white-space: normal; cursor: pointer;">${
                                e.name
                            }</a><br>
                            <span>Pola Regional : ${e.regional}</span><br>
                            <span>Pola Lingk. : ${e.neighborhood}</span><br>
                            <span>Pola Ruang: ${e.transect_zone}</span>
                        </div>
                        <div class="col-sm-2 d-flex align-items-center pl-5">
                        <div class="row">
                            <div class="col-12 p-1">
                                <a onclick="deleteDataSurvey(
                                    ${e.id},
                                    ${id_user}
                                )" style="cursor:pointer;color:red;font-size: 18px;"><i class="fa fa-trash"></i></a>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>`;
                });
                // for (let index = 0; index < e.length; index++) {
                //     html += `<div class="mb-3" style="font-size:10pt;">
                //     <div class="row">
                //         <div class="col-sm-3 text-center">
                //             <img src="/survey/${
                //                 e[index].image[0] == undefined
                //                     ? "not_image.png"
                //                     : e[index].image[0].name
                //             }" class="w-100" style="border-radius: 10px; height:75px; cursor: pointer; border:1px #ccc solid; object-fit:cover;" onclick="focusSurey();localStorage.setItem('kordinat','${
                //         e[index].kordinat
                //     }');geocoder.query('${
                //         e[index].kordinat
                //     }');addSourceLayer('${e[index].kelurahan}');editDataSurvey(
                //         ${e[index].id},
                //         ${id_user}
                //     )">
                //         </div>
                //         <div class="col-sm-7" onclick="focusSurey();localStorage.setItem('kordinat','${
                //             e[index].kordinat
                //         }');geocoder.query('${
                //         e[index].kordinat
                //     }');addSourceLayer('${e[index].kelurahan}');editDataSurvey(
                //     ${e[index].id},
                //     ${id_user}
                // )" style="cursor: pointer;">
                //             <a style="font-weight: bold;word-break: break-all;
                //             white-space: normal; cursor: pointer;">${
                //                 e[index].name
                //             }</a><br>
                //             <span>Pola Regional : ${
                //                 e[index].regional
                //             }</span><br>
                //             <span>Pola Lingk. : ${
                //                 e[index].neighborhood
                //             }</span><br>
                //             <span>Pola Ruang: ${e[index].transect_zone}</span>
                //         </div>
                //         <div class="col-sm-2 d-flex align-items-center pl-5">
                //         <div class="row">
                //             <div class="col-12 p-1">
                //                 <a onclick="deleteDataSurvey(
                //                     ${e[index].id},
                //                     ${id_user}
                //                 )" style="cursor:pointer;color:red;font-size: 18px;"><i class="fa fa-trash"></i></a>
                //             </div>
                //         </div>
                //         </div>
                //     </div>
                // </div>`;
                // }
                $("#JumlahTitikSurvey").text(e.length);
                $(".list-item-info-location-survey").html("");
                $(".list-item-info-location-survey").html(html);
            } else {
                $("#JumlahTitikSurvey").text(e.length);
                $(".list-item-info-location-survey").html("");
                $("#messageNoDataSurvey").show();
            }
        },
    });
}

function detailDataSurvey(id) {
    $.ajax({
        url: `${APP_URL}/detailDataSurvey`,
        method: "POST",
        data: {
            id: id,
        },
        success: function (e) {
            console.log(e);
            $(".info-survey-detail").html("");
            let html = ``;
            html += `
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <button type="button" class="close" id="closeDetailSurvey" aria-label="Close"
                style="position: absolute; z-index: 9; right: 1rem;">
                <span aria-hidden="true">&times;</span>
            </button>
            <ol class="carousel-indicators">`;

            for (let index = 0; index < e.image.length; index++) {
                html += `
                    <li data-target="#carouselExampleIndicators" data-slide-to="${index}" ${
                    index == 0 ? "class='active'" : ""
                }></li>
                    `;
            }

            html += `
            </ol>
            <div class="carousel-inner">
            `;
            if (e.image.length == 0) {
                html += `
                <div class="carousel-item active">
                    <img src="/survey/not_image.png" class="d-block w-100">
                </div>
                `;
            } else {
                for (let index = 0; index < e.image.length; index++) {
                    html += `
                    <div class="carousel-item ${index == 0 ? "active" : ""}">
                        <img class="d-block w-100"
                            src="/survey/${e.image[index].name}">
                    </div>
                    `;
                }
            }

            html += `
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <div class="container p-4">
            <div class="mt-3">
                <h4>${e.kelurahan} (${e.id_sub_blok})</h4>
                <p style="font-size:10pt;">Transect Zone : ${e.transect_zone}</p>
                <p style="font-size:10pt;">Regional : ${e.regional}</p>
                <p style="font-size:10pt;">${e.deskripsi_regional}</p>
                <p style="font-size:10pt;">Neighborhood : ${e.neighborhood}</p>
                <p style="font-size:10pt;">${e.deskripsi_neighborhood}</p>
            </div>
        </div>
            `;
            $(".info-survey-detail").html(html);
            $(".info-survey-detail").show();

            $("#closeDetailSurvey").on("click", (e) => {
                $(".info-survey-detail").hide();
            });
        },
    });
}

function editDataSurvey(id, id_user) {
    $("#previewFotoEdit").html("");
    $.ajax({
        url: `${APP_URL}/editDataSurvey`,
        method: "POST",
        data: {
            id: id,
            id_user: id_user,
        },
        success: (e) => {
            // for (var i = 0; i < e.image.length; i++) {
            //     $("#previewFotoEdit").append(`
            //     <div class="col-md-4 image-edit image-${i}">
            //         <img src="/favorit/${e.image[i].name}" class="w-100">
            //         <button type="button" onclick="deleteImage(${i}, ${e.image[i].id})" class="close" style="position: absolute;color: red;right:1rem;top: -0.4rem;">
            //             <span aria-hidden="true">&times;</span>
            //         </button>
            //     </div>
            //     `);
            // }
            $("#resetSurey").show();
            let html = "";
            $("#previewFotoSurvey").html("");
            for (var i = 0; i < e.image.length; i++) {
                html += `
            <div class="mr-1 slide">
                <button type="button" class="close btn-remove-item" onclick="removeImageSurvey(${e.image[i].id})" style="position: relative;
                color: red;margin-bottom:-1rem;">
                        <span aria-hidden="true">&times;</span>
                </button>
                <img src="/survey/${e.image[i].name}" class="w-100" style="object-fit:cover">
            </div>
            `;
            }
            if (
                $("div#previewFotoSurvey.slick-initialized.slick-slider")
                    .length == 0
            ) {
                $("#previewFotoSurvey").html("");
                $("#previewFotoSurvey").html(html);
                sliderOption("previewFotoSurvey");
                removeItem();
            } else {
                $("#previewFotoSurvey").slick("unslick");
                $("#previewFotoSurvey").html("");
                $("#previewFotoSurvey").html(html);
                sliderOption("previewFotoSurvey");
                removeItem();
            }
            localStorage.setItem("url_survey", `${APP_URL}/saveEditDataSurvey`);
            // $("#formSurveyLocationEdit").show();
            $("#idSurvey").val(e.id);
            $("#nameSurvey").val(e.name);
            $("#kordinatSurvey").val(e.kordinat);
            $("#idSubblokSurvey").val(e.id_sub_blok);
            $("#kelurahanSurvey").val(e.kelurahan);
            $("#kecamatanSurvey").val(e.kecamatan);
            $("#regionalSurvey").val(e.regional);
            $("#deskripsiRegionalSurvey").val(e.deskripsi_regional);
            $("#neighborhoodSurvey").val(e.neighborhood);
            $("#deskripsiNeighborhoodSurvey").val(e.deskripsi_neighborhood);
            $("#transectZoneSurvey").val(e.transect_zone);
            $("#deskripsiTransectZoneSurvey").val(e.deskripsi_transect_zone);
            console.log(e);
        },
    });
}

const removeImageSurvey = (id) => {
    $.ajax({
        url: `${APP_URL}/deleteImageSurvey`,
        method: "POST",
        data: {
            id: id,
        },
        success: (e) => {
            console.log(e);
            // $("#previewFotoSurvey").slick("unslick");
            // $("#previewFotoSurvey").html("");
            // for (var i = 0; i < e.image.length; i++) {
            //     $("#previewFotoSurvey").append(`
            // <div class="mr-1 slide">
            //     <button type="button" class="close btn-remove-item" onclick="removeImageSurvey(${e.image[i].id})" style="position: relative;
            //     color: red;margin-bottom:-1rem;">
            //             <span aria-hidden="true">&times;</span>
            //     </button>
            //     <img src="/survey/${e.image[i].name}" class="w-100" style="height:80px; object-fit:cover">
            // </div>
            // `);
            // }
            // sliderOption("previewFotoSurvey");
            // removeItem();
        },
    });
};

function deleteDataSurvey(id_data, id_user) {
    $.ajax({
        url: `${APP_URL}/deleteDataSurvey`,
        method: "POST",
        data: {
            id: id_data,
        },
        success: (e) => {
            getDataSurvey(id_user);
            getLayerSurveyPerkembangan();
            $("#pesanBerhasilHapusSurvey").show();
            setTimeout(function () {
                $("#pesanBerhasilHapusSurvey").hide();
            }, 3000);
        },
    });
}

function loginClick() {
    $(".abcRioButtonContentWrapper").trigger("click");
}

function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(() => {
        $("#profile").hide();
        $("#btnLogin").show();
    });
    $.ajax({
        url: `${APP_URL}/logout`,
        method: "POST",
        // headers: {
        //     "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        // },
        success: function () {},
    });
}

function onSignIn(googleUser) {
    var profile = googleUser.getBasicProfile();
    $("#btnLogin").hide();
    $("#profile").show();
    $("#btnLogout").attr("src", profile.getImageUrl());
    localStorage.setItem("imgProfile", profile.getImageUrl());
    $.ajax({
        url: `${APP_URL}/saveUser`,
        method: "POST",
        data: {
            name: profile.getName(),
            email: profile.getEmail(),
            provider: "google",
            provider_id: profile.getId(),
        },
        success: function () {
            $.ajax({
                url: `${APP_URL}/getIdUser`,
                method: "GET",
                success: (e) => {
                    let opsi = localStorage.getItem("opsi");
                    if (opsi == "chat") {
                        $("#btnChat").click();
                    } else if (opsi == "pin") {
                        $(".info-pin-location").show();
                        getDataPin(e);
                    } else if ((opsi = "survey")) {
                        $(".info-survey-location-survey").show();
                        getDataSurvey(e);
                    }
                    // getLayerSurveyPerkembangan();
                },
            });
        },
    });
    $("#name").text(profile.getName());
    $("#email").text(profile.getEmail());
    $("#image").attr("src", profile.getImageUrl());
    $(".data").css("display", "block");
    $(".g-signin2").css("display", "none");
}

$(document).on("change", "#kegiatanKewenangan", function () {
    const dis = $(this);
    selSektor = dis.val();
    var index = dis.data("index");
    $(".dtKBLI").html("");
    $("#btn-print").show();
    // console.log(data_kbli);
    $.post(`${APP_URL}/save_kbli`, { kbli: data_kbli[selSektor] });
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

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo, .mapboxgl-ctrl-directions"
).css("visibility", "hidden");

$(document).on("change", "input:radio[name=layer]", function () {
    if ($("#investasi_fill").prop("checked") == true) {
        $("#investasi_dot").trigger("click");
        $("#investasi_line").trigger("click");
    } else {
        $("#investasi_dot").prop("checked", false);
        $("#investasi_line").prop("checked", false);
    }
    // console.log("aaa");
});

$(document).on("change", "#selectTPZ", function () {
    $(".inf-k-tpz").html("");
    console.log($(this).val());
    var index = $(this).val();

    var value_tpz = "";
    value_tpz += dsc_tpz;
    value_tpz += `<p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Ketentuan TPZ</p>`;
    value_tpz += `
    <p class="card-title mt-2 mb-2 text-center font-weight-bold judul_utama">Nama TPZ : ${
        dataabse_tpz[saveTPZ[index]].nama
    }</p>
    `;
    value_tpz += dataabse_tpz[`${saveTPZ[index]}`].pengertian;
    value_tpz += dataabse_tpz[`${saveTPZ[index]}`].ketentuan;
    $.post(`${APP_URL}/save_ketentuan_tpz`, {
        ketentuan_tpz: [
            index,
            dataabse_tpz[saveTPZ[index]].nama,
            dataabse_tpz[`${saveTPZ[index]}`].pengertian,
            dataabse_tpz[`${saveTPZ[index]}`].ketentuan,
        ],
    });
    $(".inf-k-tpz").html(value_tpz);
});

const filterLayer = () => {
    $("#sewa_kantor").click(function () {
        $(this).css("background", "orange");
        $("#iumk").css("background", "white");
        $("#proyek").css("background", "white");
        $("#cagar").css("background", "white");
        $("#survey").css("background", "white");
        $("#sewa_fill").trigger("click");
        $(".info-layer-usaha").hide();
        $(".info-layer-investasi").hide();
        $(".info-layer-budaya").hide();
        $(".info-layer-survey-perkembangan").hide();
    });

    $("#iumk").click(function () {
        $(this).css("background", "orange");
        $("#sewa_kantor").css("background", "white");
        $("#proyek").css("background", "white");
        $("#cagar").css("background", "white");
        $("#survey").css("background", "white");
        $("#iumk_fill").trigger("click");
        $(".info-layer").hide();
        $(".info-layer-investasi").hide();
        $(".info-layer-budaya").hide();
        $(".info-layer-survey-perkembangan").hide();
    });

    $("#proyek").click(function () {
        $(this).css("background", "orange");
        $("#sewa_kantor").css("background", "white");
        $("#iumk").css("background", "white");
        $("#cagar").css("background", "white");
        $("#survey").css("background", "white");
        $("#investasi_fill").trigger("click");
        $(".info-layer-usaha").hide();
        $(".info-layer").hide();
        $(".info-layer-budaya").hide();
        $(".info-layer-survey-perkembangan").hide();
    });

    $("#cagar").click(function () {
        $(this).css("background", "orange");
        $("#sewa_kantor").css("background", "white");
        $("#iumk").css("background", "white");
        $("#proyek").css("background", "white");
        $("#survey").css("background", "white");
        $("#budaya_dot").trigger("click");
        $(".info-layer-usaha").hide();
        $(".info-layer").hide();
        $(".info-layer-investasi").hide();
        $(".info-layer-survey-perkembangan").hide();
    });

    $("#survey").click(function () {
        $(this).css("background", "orange");
        $("#sewa_kantor").css("background", "white");
        $("#iumk").css("background", "white");
        $("#proyek").css("background", "white");
        $("#budaya").css("background", "white");
        $("#cagar").css("background", "white");
        $("#survey_dot").trigger("click");
        $(".info-layer-usaha").hide();
        $(".info-layer").hide();
        $(".info-layer-investasi").hide();
        $(".info-layer-budaya").hide();
    });

    $("#closeSewa").on("click", function () {
        $(".info-layer").hide();
        $("#show_side_bar").hide();
        $("#sewa_kantor").css("background", "white");
        hideLayer("sewa_fill");
        $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
        $("#sewa_fill").prop("checked", false);
        // $("#closeUsaha").trigger("click");
        if ($("#sidebar").hide() == true) {
            $("#hide_side_bar").hide();
        } else {
            // $("#hide_side_bar").show();
            $("#sidebar").show();
        }
    });

    $("#closeUsaha").on("click", function (e) {
        $(".info-layer-usaha").hide();
        $("#show_side_bar").hide();
        $("#iumk").css("background", "white");
        hideLayer("iumk_fill");
        $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
        window.stop();
        $("#iumk_fill").prop("checked", false);
        // $("#closeSewa").trigger("click");
        if ($("#sidebar").hide() == true) {
            $("#hide_side_bar").hide();
        } else {
            // $("#hide_side_bar").show();
            $("#sidebar").show();
        }
    });

    $("#closeSurveyPerekmbangan").on("click", function (e) {
        $(".info-layer-survey-perkembangan").hide();
        $("#show_side_bar").hide();
        $("#survey").css("background", "white");
        hideLayer("survey_dot");
        $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
        window.stop();
        $("#survey_dot").prop("checked", false);
        // $("#closeSewa").trigger("click");
        if ($("#sidebar").hide() == true) {
            $("#hide_side_bar").hide();
        } else {
            // $("#hide_side_bar").show();
            $("#sidebar").show();
        }
    });

    $("#closeDigitasi").on("click", () => {
        $(".info-layer-digitasi").hide();
        if (localStorage.getItem("polygonDraw") == 1) {
            draw.deleteAll();
            localStorage.setItem("circleDraw", 0);
            localStorage.setItem("polygonDraw", 0);
            removeCircle();
        }
    });
};

filterLayer();

function preview_image() {
    var gambarLokasi = $("#gambarLokasi").get(0).files.length;
    $("#previewFoto").html("");
    if (gambarLokasi > 3) {
        $("#pesanFoto").show();
        $("#gambarLokasi").val("");
        setTimeout(function () {
            $("#pesanFoto").hide();
        }, 3000);
    } else {
        for (var i = 0; i < gambarLokasi; i++) {
            $("#previewFoto").append(`
            <div class="col-md-4">
                <img src="${URL.createObjectURL(
                    event.target.files[i]
                )}" class="w-100">
            </div>
            `);
        }
    }
}

const removeItem = (event) => {
    $(".btn-remove-item").on("click", function (e) {
        let index = $(this).data("index");
        // console.log("clicked");
        if (index !== undefined) {
            files.splice(files.indexOf(Newfiles[index]), 1);
            console.log(index);
        }
        $("#previewFotoSurvey").slick(
            "slickRemove",
            $(".btn-remove-item").index(this)
        );
        console.log($(".btn-remove-item").index(this));
    });
};

const removeFileArray = (event) => {
    console.log(event);
};

function preview_foto_survey() {
    var gambarLokasi = $("#gambarLokasiSurvey").get(0).files.length;
    let html = "";
    let countArray = Newfiles.length;
    if ($("div#previewFotoSurvey.slick-initialized.slick-slider").length == 0) {
        sliderOption("previewFotoSurvey");
    }
    if (localStorage.getItem("url_survey") == `${APP_URL}/saveEditDataSurvey`) {
        $("#previewFotoSurvey").slick(
            "slickSetOption",
            "slidesToShow",
            1,
            true
        );
    } else {
        $("#previewFotoSurvey").slick(
            "slickSetOption",
            "slidesToShow",
            3,
            true
        );
    }
    for (var i = 0; i < gambarLokasi; i++) {
        let file = $("#gambarLokasiSurvey").get(0).files[i];
        let element = $(`
            <div class="slide mr-1">
                <button type="button" class="close btn-remove-item" data-index="${countArray++}" style="position: relative;
                color: red;margin-bottom:-1rem;">
                        <span aria-hidden="true">&times;</span>
                </button>
                <img src="${URL.createObjectURL(
                    event.target.files[i]
                )}" class="w-100">
            </div>
            `);
        if ($(".slide").length == 0) {
            $("#previewFotoSurvey").slick("slickAdd", element);
        } else {
            $("#previewFotoSurvey").slick("slickAdd", element, 0, true);
        }
        new Compressor(file, {
            quality: 0.3,
            convertSize: 1000000,
            success(result) {
                files.push(result);
                Newfiles.push(result);
            },
            error(err) {
                console.log(err.message);
            },
        });
    }
    $("#gambarLokasiSurvey").val("");
    removeItem();

    // files.forEach((file) => {});
    // } else {
    //     $("#previewFotoSurvey").html("");
    //     for (var i = 0; i < gambarLokasi; i++) {
    //         html += `
    //         <div class="slide mr-1">
    //             <img src="${URL.createObjectURL(
    //                 event.target.files[i]
    //             )}" class="w-100">
    //         </div>
    //         `;
    //     }
    //     if (
    //         $("div#previewFotoSurvey.mt-2.slick-initialized.slick-slider")
    //             .length == 0
    //     ) {
    //         $("#previewFotoSurvey").html("");
    //         $("#previewFotoSurvey").html(html);
    //         sliderOption("previewFotoSurvey");
    //     } else {
    //         $("#previewFotoSurvey").slick("unslick");
    //         $("#previewFotoSurvey").html("");
    //         $("#previewFotoSurvey").html(html);
    //         sliderOption("previewFotoSurvey");
    //     }
    // }
}

function compresImageBulk() {
    filesBulk = [];
    let fileFoto = $("#fileFoto").get(0).files.length;
    for (let i = 0; i < fileFoto; i++) {
        let file = $("#fileFoto").get(0).files[i];
        new Compressor(file, {
            quality: 0.3,
            convertSize: 1000000,
            success(result) {
                filesBulk.push(result);
            },
            error(err) {
                console.log(err.message);
            },
        });
    }
}

function preview_image_edit() {
    var gambarLokasi = $("#gambarLokasiEdit").get(0).files.length;
    // $("#previewFotoEdit").html("");
    var jumlah = $(".image-edit").length + gambarLokasi;
    if (jumlah > 3) {
        $("#pesanFoto").show();
        $("#gambarLokasiEdit").val("");
        setTimeout(function () {
            $("#pesanFoto").hide();
        }, 3000);
    } else {
        for (var i = 0; i < gambarLokasi; i++) {
            $("#previewFotoEdit").append(`
            <div class="col-md-4 image-edit image-${i + jumlah - 1}">
                <img src="${URL.createObjectURL(
                    event.target.files[i]
                )}" class="w-100">
                <button type="button" onclick="deleteImage(${
                    i + jumlah - 1
                }, 0)" class="close" style="position: absolute;color: red;right:1rem;top: -0.4rem;">
                        <span aria-hidden="true">&times;</span>
                </button>
            </div>
            `);
        }
    }
}

$("#formPinLocation").on("submit", function (e) {
    e.preventDefault();
    var coor = $("#kordinatPin").val();
    var judul = $("#judulPin").val();
    var catatan = $("#catatanPin").val();
    var gambarLokasi = $("#gambarLokasi").get(0).files;
    var formData = new FormData(this);

    if (
        coor !== "" &&
        judul !== "" &&
        catatan !== "" &&
        gambarLokasi.length <= 3
    ) {
        $.ajax({
            url: `${APP_URL}/getIdUser`,
            method: "GET",
            success: function (e) {
                var id_user = e;
                formData.append("id_user", id_user);
                formData.append("kelurahan", localStorage.getItem("kelurahan"));
                // console.log(formData.get("foto"));
                $.ajax({
                    url: `${APP_URL}/saveDataPin`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (e) {
                        console.log(e);
                        $("#kordinatPin").val("");
                        $("#judulPin").val("");
                        $("#catatanPin").val("");
                        $("#gambarLokasi").val("");
                        $("#previewFoto").html("");
                        $("#pesanBerhasil").show();
                        getDataPin(id_user);
                        setTimeout(function () {
                            $("#pesanBerhasil").hide();
                        }, 3000);
                    },
                });
            },
        });
    } else {
        $("#pesanGagal").show();
        setTimeout(function () {
            $("#pesanGagal").hide();
        }, 3000);
    }
});

$("#formSurveyBulkLocation").on("submit", function (e) {
    e.preventDefault();
    var form_data = new FormData(this);
    filesBulk.forEach((file) => {
        form_data.append("foto[]", file, file.name);
    });
    $("#btnSubmitBulk").hide();
    $("#prosesSurveyBulk").show();

    $.ajax({
        url: `${APP_URL}/getIdUser`,
        method: "GET",
        success: (e) => {
            let id_user = e;
            $.ajax({
                url: `${APP_URL}/importSurvey`,
                method: "POST",
                contentType: false,
                processData: false,
                data: form_data,
                success: (e) => {
                    filesBulk = [];
                    $("#btnSubmitBulk").show();
                    $("#prosesSurveyBulk").hide();
                    $(".dz-preview").remove();
                    $(".dz-message").show();
                    $("#nameFileExcel").text("");
                    $("#fileExcel").val("");
                    getDataSurvey(id_user);
                    getLayerSurveyPerkembangan();
                    if (
                        e.error != "Data Tidak Lengkap" &&
                        e.error != "The given data was invalid."
                    ) {
                        let message = e.error.substring(71, 79);
                        $("#messageErrorBulk").text(
                            `Data duplikat dengan no ID ${message}`
                        );
                        $("#pesanGagalSurveyBulk").show();
                        setTimeout(function () {
                            $("#pesanGagalSurveyBulk").hide();
                        }, 3000);
                    } else {
                        $("#messageErrorBulk").text("Data Tidak Lengkap");
                        $("#pesanGagalSurveyBulk").show();
                        setTimeout(function () {
                            $("#pesanGagalSurveyBulk").hide();
                        }, 3000);
                    }
                },
            });
        },
    });
});

$("#formSurveyLocation").on("submit", function (e) {
    e.preventDefault();
    var name = $("#nameSurvey").val();
    var coor = $("#kordinatSurvey").val();
    var id_subblok = $("#idSubblokSurvey").val();
    var kelurahan = $("#kelurahanSurvey").val();
    var kecamatan = $("#kecamatanSurvey").val();
    var regional = $("#regionalSurvey").val();
    var deskripsi_regional = $("#deskripsiRegionalSurvey").val();
    var neighborhood = $("#neighborhoodSurvey").val();
    var deskripsi_neighborhood = $("#deskripsiNeighborhoodSurvey").val();
    var transect_zone = $("#transectZoneSurvey").val();
    var deskripsi_transect_zone = $("#deskripsiTransectZoneSurvey").val();
    var gambarLokasi = $("#gambarLokasiSurvey").get(0).files;
    var formData = new FormData(this);

    if (
        name !== "" &&
        coor !== "" &&
        id_subblok !== "" &&
        kelurahan !== "" &&
        kecamatan !== "" &&
        regional !== "" &&
        deskripsi_regional !== "" &&
        neighborhood !== "" &&
        deskripsi_neighborhood !== "" &&
        transect_zone !== "" &&
        deskripsi_transect_zone !== ""
    ) {
        $("#prosesSurvey").show();
        $("#submitSurveyLocation").hide();
        $.ajax({
            url: `${APP_URL}/getIdUser`,
            method: "GET",
            success: function (e) {
                var id_user = e;
                formData.append("id_user", id_user);

                files.forEach((file) => {
                    formData.append("foto_survey[]", file);
                });
                // formData.append("kelurahan", localStorage.getItem("kelurahan"));
                // console.log(formData.get("foto"));
                $.ajax({
                    url: localStorage.getItem("url_survey"),
                    method: "POST",
                    // beforeSend: () => {

                    // },
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (e) {
                        // console.log(e);
                        $("#prosesSurvey").hide();
                        $("#submitSurveyLocation").show();
                        if (
                            localStorage.getItem("url_survey") ==
                            `${APP_URL}/saveDataSurvey`
                        ) {
                            resetSurvey();
                        }
                        $("#pesanBerhasilSurvey").show();
                        getDataSurvey(id_user);
                        setTimeout(function () {
                            $("#pesanBerhasilSurvey").hide();
                        }, 3000);
                        getLayerSurveyPerkembangan();
                    },
                    error: function (e) {
                        console.log(e);
                        $("#prosesSurvey").hide();
                        $("#submitSurveyLocation").show();
                        getLayerSurveyPerkembangan();
                        if (
                            localStorage.getItem("url_survey") ==
                            `${APP_URL}/saveDataSurvey`
                        ) {
                            resetSurvey();
                        }
                        $("#pesanGagalSurvey").show();
                        setTimeout(function () {
                            $("#pesanGagalSurvey").hide();
                        }, 3000);
                    },
                });
            },
        });
    } else {
        $("#pesanGagalSurvey").show();
        setTimeout(function () {
            $("#pesanGagalSurvey").hide();
        }, 3000);
    }
});

$("#formPinLocationEdit").on("submit", function (e) {
    e.preventDefault();
    var coor = $("#kordinatPinEdit").val();
    var judul = $("#judulPinEdit").val();
    var catatan = $("#catatanPinEdit").val();
    var formData = new FormData(this);

    if (coor !== "" && judul !== "" && catatan !== "") {
        $.ajax({
            url: `${APP_URL}/getIdUser`,
            method: "GET",
            success: function (e) {
                var id_user = e;
                // console.log(formData.get("foto"));
                $.ajax({
                    url: `${APP_URL}/saveEditDataPin`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (e) {
                        console.log(e);
                        $("#kordinatPinEdit").val("");
                        $("#judulPinEdit").val("");
                        $("#catatanPinEdit").val("");
                        $("#gambarLokasiEdit").val("");
                        $("#previewFotoEdit").html("");
                        $("#pesanBerhasilEdit").show();
                        $("#formPinLocationEdit").hide();
                        $("#formPinLocation").show();
                        getDataPin(id_user);
                        setTimeout(function () {
                            $("#pesanBerhasilEdit").hide();
                        }, 3000);
                    },
                });
            },
        });
    } else {
        $("#pesanGagal").show();
        setTimeout(function () {
            $("#pesanGagal").hide();
        }, 3000);
    }
});

$("#formSurveyLocationEdit").on("submit", function (e) {
    e.preventDefault();
    var coor = $("#kordinatSurveyEdit").val();
    var id_subblok = $("#idSubblokSurveyEdit").val();
    var kelurahan = $("#kelurahanSurveyEdit").val();
    var kecamatan = $("#kecamatanSurveyEdit").val();
    var regional = $("#regionalSurveyEdit").val();
    var deskripsi_regional = $("#deskripsiRegionalSurveyEdit").val();
    var neighborhood = $("#neighborhoodSurveyEdit").val();
    var deskripsi_neighborhood = $("#deskripsiNeighborhoodSurveyEdit").val();
    var transect_zone = $("#transectZoneSurveyEdit").val();
    var gambarLokasi = $("#gambarLokasiSurveyEdit").get(0).files;
    var formData = new FormData(this);

    if (
        coor !== "" &&
        id_subblok !== "" &&
        kelurahan !== "" &&
        kecamatan !== "" &&
        regional !== "" &&
        deskripsi_regional !== "" &&
        neighborhood !== "" &&
        deskripsi_neighborhood !== "" &&
        transect_zone !== ""
    ) {
        $.ajax({
            url: `${APP_URL}/getIdUser`,
            method: "GET",
            success: function (e) {
                var id_user = e;
                formData.append("id_user", id_user);
                // console.log(formData.get("foto"));
                $.ajax({
                    url: `${APP_URL}/saveEditDataSurvey`,
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (e) {
                        console.log(e);
                        $("#kordinatSurveyEdit").val("");
                        $("#idSubblokSurveyEdit").val("");
                        $("#kecamatanSurveyEdit").val("");
                        $("#kecamatanSurveyEdit").val("");
                        $("#regionalSurveyEdit").val("");
                        $("#deskripsiRegionalSurveyEdit").val("");
                        $("#neighborhoodSurveyEdit").val("");
                        $("#deskripsiNeighborhoodSurveyEdit").val("");
                        $("#transectZoneSurveyEdit").val("");
                        $("#pesanBerhasilEditSurveyEdit").show();
                        // $("#formSurveyLocationEdit").hide();
                        // $("#formSurveyLocation").show();
                        getDataSurvey(id_user);
                        setTimeout(function () {
                            $("#pesanBerhasilEditSurveyEdit").hide();
                        }, 3000);
                    },
                });
            },
        });
    } else {
        $("#pesanGagalSurvey").show();
        setTimeout(function () {
            $("#pesanGagalSurvey").hide();
        }, 3000);
    }
});

$("#closeBudaya").on("click", function (e) {
    $(".info-layer-budaya").hide();
    $("#show_side_bar").hide();
    $("#cagar").css("background", "white");
    hideLayer("budaya_dot");
    $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
    $("#budaya_dot").prop("checked", false);
    // $("#closeSewa").trigger("click");
    if ($("#sidebar").hide() == true) {
        $("#hide_side_bar").hide();
    } else {
        // $("#hide_side_bar").show();
        $("#sidebar").show();
    }
});

$("#closeInvestasi").on("click", function () {
    $(".info-layer-investasi").hide();
    $("#show_side_bar").hide();
    $("#proyek").css("background", "white");
    hideLayer("investasi_fill");
    hideLayer("investasi_dot");
    hideLayer("investasi_line");
    $("#investasi_fill").prop("checked", false);
    $("#investasi_dot").prop("checked", false);
    $("#investasi_line").prop("checked", false);
    $("div.mapboxgl-popup.mapboxgl-popup-anchor-bottom").remove();
    // $("#closeSewa").trigger("click");
    if ($("#sidebar").hide() == true) {
        $("#hide_side_bar").hide();
    } else {
        // $("#hide_side_bar").show();
        $("#sidebar").show();
    }
});

$("#closePin").on("click", function () {
    $(".info-pin-location").hide();
});

$("#closeSurvey").on("click", function () {
    $(".info-survey-location").hide();
});

$("#btn-print").on("click", function () {
    var data_pie = $("#pie-chart-kbli").get(0).toDataURL("img/png");
    var data_bar = $("#bar-chart-grouped-kbli").get(0).toDataURL("img/png");
    chart = `
        <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <center>
              <img src="${data_pie}" width="70%">
            </center>
        </div>
        <div class="col-md-6">
          <center>
            <img src="${data_bar}" width="70%">
          </center>
        </div>
      </div>
        `;
    var html = [
        imgMaps,
        lokasi,
        chart,
        pendapatan,
        zona,
        eksisting,
        bpn,
        harga,
        fasilitas,
        kbli_data,
    ].join("");
    var opt = {
        margin: [10, 30, 10, 30],
        html2canvas: { scale: 2, logging: true },
    };
    html2pdf()
        .set(opt)
        .from(html)
        .output("bloburl")
        .then((r) => {
            window.open(r);
        });
});

$("#printAll").on("click", function () {
    var data_pie = $("#pie-chart-info").get(0).toDataURL("img/png");
    var data_bar = $("#bar-chart-grouped-info").get(0).toDataURL("img/png");

    var displayProfile;
    var displayKetentuan;
    var displayAksess;
    var displayKBLI;

    var arrPrint = [];

    var profil = $("#pills-lokasi").html();
    var poi = $("#pills-poi").html();
    var ketentuan = $("#pills-ketentuan").html();
    var kbli = $("#pills-kblikeg").html();

    $("#pie-print").attr("src", data_pie);
    $("#bar-print").attr("src", data_bar);

    if ($("#checkboxProfil").prop("checked") == true) {
        arrPrint.push(profil);
    }

    if ($("#checkboxKetentuan").prop("checked") == true) {
        arrPrint.push(ketentuan);
    }

    if ($("#checkboxAkses").prop("checked") == true) {
        arrPrint.push(poi);
    }

    if ($("#checkboxKBLI").prop("checked") == true) {
        if ($(".dtKBLI").html().length == 0) {
            $("#pesanGagalPrintKBLI").show();
            setTimeout(() => {
                $("#pesanGagalPrintKBLI").hide();
            }, 3000);

            return false;
        } else {
            arrPrint.push(kbli);
        }
    }

    var resultPrint = arrPrint.join("");

    var style = `
        <style>
            #selectTPZ{
                border: none;
            }

            #pills-ketentuan{
                margin-top:100px !important;
            }

            .all-chart{
                display: none;
            }

            #chart-print{
                visibility: visible;
                margin-bottom: 0px;
            }

            #radiusSlide{
                display: none;
            }

            .form-kbli{
                display: none;
            }
        </style>
    `;

    var html = [style, imgMaps, resultPrint].join("");
    var opt = {
        margin: [10, 30, 30, 30],
        html2canvas: { scale: 2, logging: true },
        // pagebreak: { mode: "avoid-all", before: "#page2el" },
    };

    if (
        $("#checkboxProfil").prop("checked") == true ||
        $("#checkboxKetentuan").prop("checked") == true ||
        $("#checkboxAkses").prop("checked") == true ||
        $("#checkboxKBLI").prop("checked") == true
    ) {
        window.open(`${APP_URL}/print`);
        // html2pdf()
        //     .set(opt)
        //     .from(html)
        //     .output("bloburl")
        //     .then((r) => {
        //         window.open(r);
        //     });
    } else {
        $("#pesanGagalPrint").show();
        setTimeout(() => {
            $("#pesanGagalPrint").hide();
        }, 3000);
    }
});

$("#checkboxProfil").change(() => {
    if ($("#checkboxProfil").prop("checked") == true) {
        $.post(`${APP_URL}/check_print`, { kategeori: "profil", status: 1 });
    } else {
        $.post(`${APP_URL}/check_print`, { kategeori: "profil", status: 0 });
    }
});

$("#checkboxKetentuan").change(() => {
    if ($("#checkboxKetentuan").prop("checked") == true) {
        $.post(`${APP_URL}/check_print`, { kategeori: "ketentuan", status: 1 });
    } else {
        $.post(`${APP_URL}/check_print`, { kategeori: "ketentuan", status: 0 });
    }
});

$("#checkboxAkses").change(() => {
    if ($("#checkboxAkses").prop("checked") == true) {
        $.post(`${APP_URL}/check_print`, { kategeori: "akses", status: 1 });
    } else {
        $.post(`${APP_URL}/check_print`, { kategeori: "akses", status: 0 });
    }
});

$("#checkboxKBLI").change(() => {
    if ($("#checkboxKBLI").prop("checked") == true) {
        if ($(".dtKBLI").html().length == 0) {
            $("#pesanGagalPrintKBLI").show();
            setTimeout(() => {
                $("#pesanGagalPrintKBLI").hide();
            }, 3000);
            $("#checkboxKBLI").trigger("click");
        } else {
            $.post(`${APP_URL}/check_print`, {
                kategeori: "kbli-data",
                status: 1,
            });
        }
    } else {
        $.post(`${APP_URL}/check_print`, { kategeori: "kbli-data", status: 0 });
    }
});

const getSimulasi = (e) => {
    $.ajax({
        url: `${url}/simulasi`,
        type: "POST",
        data: {
            peruntukan: e,
        },
        headers: {
            Authorization: `Bearer ${token}`,
        },
        dataType: "JSON",
        success: (data) => {
            let jumlah_orang = 0;
            let data_simulasi = data.features[0].properties;
            if (e == "Rumah Mewah" || e == "Rumah Biasa") {
                jumlah_orang = 5;
                $("#stdluasbangunan").removeClass("d-flex");
                $("#stdluasbangunan").addClass("d-none");
            } else {
                jumlah_orang = Math.ceil(
                    (luasSimulasi * parseFloat(KLB.replace(",", "."))) / 9
                );
                $("#stdluasbangunan").removeClass("d-none");
                $("#stdluasbangunan").addClass("d-flex");
            }
            $(".inf-simulasi-pmkair").html(
                data_simulasi.Air + " lt/penghuni/hari"
            );
            $(".inf-simulasi-dbtairlimbah").html(
                data_simulasi.Limbah + " lt/penghuni/hari"
            );
            $(".inf-simulasi-sampah").html(
                data_simulasi.Sampah + " kg/Orang/Hari"
            );
            $(".inf-simulasi-stdluasbangunan").html(
                separatorNum(9) + " m<sup>2</sup>"
            );
            $(".inf-simulasi-luaslimpahan").html(
                `${separatorNum(
                    Math.ceil(luasSimulasi * (1 - KDH / 100))
                )} m<sup>2</sup>/Hari`
            );
            $(".inf-simulasi-luasbangunan").html(
                `${separatorNum(
                    Math.ceil(luasSimulasi * parseFloat(KLB.replace(",", ".")))
                )} m<sup>2</sup>`
            );
            $(".inf-simulasi-jmlorang").html(
                `${separatorNum(jumlah_orang)} Orang`
            );
            $(".inf-simulasi-kebutuhanairbersih").html(
                `${separatorNum(
                    Math.ceil(data_simulasi.Air * jumlah_orang)
                )} lt/Hari`
            );
            $(".inf-simulasi-produksilimbah").html(
                `${separatorNum(
                    Math.ceil(data_simulasi.Air * jumlah_orang * (80 / 100))
                )} lt/Hari`
            );
            $(".inf-simulasi-produksisampah").html(
                `${separatorNum(
                    Math.ceil(data_simulasi.Sampah * jumlah_orang)
                )} kg/Hari`
            );
            $(".inf-simulasi-volumlimpasanairhujan").html(
                `${separatorNum(
                    Math.ceil(
                        data_simulasi.Hujan * (luasSimulasi * (1 - KDH / 100))
                    )
                )} m<sup>3</sup>/Hari`
            );
            $(".inf-simulasi-nilaitanah").html(
                `Rp. ${separatorNum(luasSimulasi * NJOP)}`
            );
            $(".inf-simulasi-nilaibangunan").html(
                `Rp. ${separatorNum(
                    Math.ceil(
                        luasSimulasi * parseFloat(KLB.replace(",", "."))
                    ) * $("#biayaBangunan").val().replaceAll(".", "")
                )}`
            );

            $(".inf-simulasi-totalnilai").html(
                `Rp. ${separatorNum(
                    luasSimulasi * NJOP +
                        Math.ceil(
                            luasSimulasi * parseFloat(KLB.replace(",", "."))
                        ) *
                            $("#biayaBangunan").val().replaceAll(".", "")
                )}`
            );

            $("#biayaBangunan").on("keyup", () => {
                console.log($("#biayaBangunan").val().replaceAll(".", ""));
                $(".inf-simulasi-nilaibangunan").html(
                    `Rp. ${separatorNum(
                        Math.ceil(
                            luasSimulasi * parseFloat(KLB.replace(",", "."))
                        ) * $("#biayaBangunan").val().replaceAll(".", "")
                    )}`
                );

                $(".inf-simulasi-totalnilai").html(
                    `Rp. ${separatorNum(
                        luasSimulasi * NJOP +
                            Math.ceil(
                                luasSimulasi * parseFloat(KLB.replace(",", "."))
                            ) *
                                $("#biayaBangunan").val().replaceAll(".", "")
                    )}`
                );
            });
            // console.log(data_simulasi);
        },
    });
};

$("#selectSimulasi").on("change", () => {
    let value = $("#selectSimulasi").select2("val");
    localStorage.setItem("simulasi", value);
    getSimulasi(value);
});

$("#formDigitasi").on("submit", (e) => {
    if ($("#coorddigitasi").val() == "") {
        e.preventDefault();
        $("#pesanGagalPrintDigitasi").show();
        setTimeout(() => {
            $("#pesanGagalPrintDigitasi").hide();
        }, 3000);
    }
});

$("#optionFilterChoro").change(() => {
    if ($("#optionFilterChoro").val() == "Total Omzet UMKM") {
        localStorage.setItem("filterCategoryChoro", "omzet");
        choro();
        $("#btn-titik").hide();
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <span id="amount" class="w-100"
                style="border:0; color:#f6931f; font-weight:bold;"></span>
            <div id="slider-range" class="my-2"></div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Interval (Rp milyar)</span>
            <div class="text_all" id="legends">

            </div>
            </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        sliderRange();
    } else if ($("#optionFilterChoro").val() == "Pekerjaan") {
        localStorage.setItem("filterChoro", 1);
        // if (localStorage.getItem("filterCategoryChoro") !== "pekerjaan") {
        //     $("#btn-titik").slick("unslick");
        //     console.log("unslick");
        // }
        localStorage.setItem("filterCategoryChoro", "pekerjaan");
        $("#btn-titik").hide();
        // $("#btn-titik").html(``);
        let pekerjaan = [
            "aparatur_pemerintah",
            "pertanian",
            "nelayan",
            "tenaga_kesehatan",
            "pegawai",
            "tentara",
            "kepolisian",
            "petani",
            "peternak",
            "industri",
            "konstruksi",
            "transportasi",
            "pembantu",
            "mekanik",
            "seniman",
            "tabib",
            "paraji",
            "perancang",
            "penterjemah",
            "imam_masjid",
            "pendeta",
            "pastor",
            "wartawan",
            "ustadz",
            "juru_masak",
            "promotor",
            "dosen",
            "guru",
            "pilot",
            "pengacara",
            "notaris",
            "arsitek",
            "akuntan",
            "konsultan",
            "dokter",
            "bidan",
            "perawat",
            "apoteker",
            "psikiater",
            "pelaut",
            "peneliti",
            "sopir",
            "pialang",
            "paranormal",
            "pedagang",
            "biarawati",
            "karyawan",
            "buruh",
            "tukang",
            "penyiar",
            "wiraswasta",
            "pensiunan",
            "lainnya",
            "belum_tidak_bekerja",
        ];
        let html = "";
        pekerjaan.forEach((item) => {
            if (item == "aparatur_pemerintah") {
                choro(0, 0, "aparatur_pemerintah");
            }
            html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "aparatur_pemerintah" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;" onclick="choro(0,0,'${item}')">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
        });
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <div id="pekerjaan">${html}</div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Interval (orang)</span>
            <div class="text_all" id="legends">

            </div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        chipOption("pekerjaan");
        activeButton("pekerjaan");
    } else if ($("#optionFilterChoro").val() == "Pendidikan") {
        let pendidikan = [
            "tamat_sd",
            "sltp",
            "slta",
            "diploma_i",
            "diploma_ii",
            "diploma_iv",
            "strata_ii",
            "strata_iii",
        ];

        localStorage.setItem("filterCategoryChoro", "pendidikan");
        // $("#btn-titik").html(``);
        choro(0, 0, "tamat_sd");
        let html = "";
        pendidikan.forEach((item) => {
            if (item == "tamat_sd") {
                choro(0, 0, "tamat_sd");
            }
            html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "tamat_sd" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;" onclick="choro(0,0,'${item}')">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
        });

        localStorage.setItem("filterChoro", 1);
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <div id="pendidikan">${html}</div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Interval (orang)</span>
            <div class="text_all" id="legends">

            </div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Nama Kelurahan:</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        chipOption("pendidikan");
        activeButton("pendidikan");
    } else if ($("#optionFilterChoro").val() == "Agama") {
        let pendidikan = [
            "islam",
            "kristen",
            "katolik",
            "hindu",
            "budha",
            "konghucu",
            "kepercayaan",
        ];

        localStorage.setItem("filterCategoryChoro", "agama");
        // $("#btn-titik").html(``);
        choro(0, 0, "islam");
        let html = "";
        pendidikan.forEach((item) => {
            if (item == "islam") {
                choro(0, 0, "islam");
            }
            html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "islam" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;" onclick="choro(0,0,'${item}')">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
        });

        localStorage.setItem("filterChoro", 1);
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <div id="agama">${html}</div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Interval Orang</span>
            <div class="text_all" id="legends">

            </div>
        </div>
        <div class="col-md-6">
            <span for="amount" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        chipOption("agama");
        activeButton("agama");
    } else if ($("#optionFilterChoro").val() == "Kepadatan Penduduk") {
        localStorage.setItem("filterCategoryChoro", "kepadatan");
        choro(0, 100000, "kepadatan");
        $("#btn-titik").hide();
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <span id="kepadatan" class="w-100"
                style="border:0; color:#f6931f; font-weight:bold;"></span>
            <div id="slider-kepadatan" class="my-2"></div>
        </div>
        <div class="col-md-6">
            <span for="kepadatan" class="text_all font-weight-bold">Interval (Orang)</span>
            <div class="text_all" id="legends">

            </div>
            </div>
        <div class="col-md-6">
            <span for="kepadatan" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        sliderRangeKepadatan();
    } else if ($("#optionFilterChoro").val() == "Jumlah Penduduk") {
        localStorage.setItem("filterCategoryChoro", "jumlah_penduduk");
        choro(0, 200000, "jumlah_penduduk");
        $("#btn-titik").hide();
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <span id="jumlah-penduduk" class="w-100"
                style="border:0; color:#f6931f; font-weight:bold;"></span>
            <div id="slider-jumlah-penduduk" class="my-2"></div>
        </div>
        <div class="col-md-6">
            <span for="jumlah-penduduk" class="text_all font-weight-bold">Interval (Orang)</span>
            <div class="text_all" id="legends">

            </div>
            </div>
        <div class="col-md-6">
            <span for="jumlah-penduduk" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        sliderRangeJumlahPenduduk();
    } else if ($("#optionFilterChoro").val() == "Kepadatan Bangunan") {
        localStorage.setItem("filterCategoryChoro", "count_polygons");
        choro(0, 25000, "count_polygons");
        $("#btn-titik").hide();
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-2 mb-2">
            <span id="kepadatan-bangunan" class="w-100"
                style="border:0; color:#f6931f; font-weight:bold;"></span>
            <div id="slider-kepadatan-bangunan" class="my-2"></div>
        </div>
        <div class="col-md-6">
            <span for="kepadatan-bangunan" class="text_all font-weight-bold">Interval (Bangunan)</span>
            <div class="text_all" id="legends">

            </div>
            </div>
        <div class="col-md-6">
            <span for="kepadatan-bangunan" class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        sliderRangeKepadatanBangunan();
    } else if ($("#optionFilterChoro").val() == "Data PPAP") {
        if (map.getLayer("wilayahindex_fill")) {
            map.removeLayer("wilayahindex_fill");
            map.removeSource("wilayahindex");
        }
        let point_center_kelurahan = [
            {
                kelurahan: "BALEKAMBANG",
                kordinat: [106.852770167453, -6.28159463356247],
            },
            {
                kelurahan: "TENGAH",
                kordinat: [106.866630792338, -6.28961962906629],
            },
            {
                kelurahan: "PINANGRANTI",
                kordinat: [106.88496932948, -6.29168788121552],
            },
            {
                kelurahan: "KRAMATJATI",
                kordinat: [106.870706806921, -6.2741117361314],
            },
            {
                kelurahan: "HALIM PERDANA KUSUMA",
                kordinat: [106.893247548343, -6.26590800880412],
            },
            {
                kelurahan: "JATIPULO",
                kordinat: [106.803822199297, -6.17879024677216],
            },
            {
                kelurahan: "KRENDANG",
                kordinat: [106.803983753118, -6.15021453588555],
            },
            {
                kelurahan: "PALMERIAM",
                kordinat: [106.858974192362, -6.20362318904808],
            },
            {
                kelurahan: "RAWAJATI",
                kordinat: [106.854652069397, -6.25809567543088],
            },
            {
                kelurahan: "PLUIT",
                kordinat: [106.786778860067, -6.11356825555952],
            },
            {
                kelurahan: "SLIPI",
                kordinat: [106.801376592262, -6.1939925487108],
            },
            {
                kelurahan: "ANCOL",
                kordinat: [106.833788173498, -6.12414317586525],
            },
            {
                kelurahan: "KEAGUNGAN",
                kordinat: [106.814278138902, -6.15117089568155],
            },
            {
                kelurahan: "CEMPAKA PUTIH TIMUR",
                kordinat: [106.871749153298, -6.17600021735003],
            },
            {
                kelurahan: "CIBUBUR",
                kordinat: [106.882315277541, -6.35737461973628],
            },
            {
                kelurahan: "BUNGUR",
                kordinat: [106.847971506743, -6.17157137781364],
            },
            {
                kelurahan: "BENDUNGAN HILIR",
                kordinat: [106.80904177713, -6.20863072688788],
            },
            {
                kelurahan: "SERDANG",
                kordinat: [106.861146497644, -6.15891301427754],
            },
            {
                kelurahan: "KARET KUNINGAN",
                kordinat: [106.827970245644, -6.22060362931354],
            },
            {
                kelurahan: "GANDARIA SELATAN",
                kordinat: [106.793010335675, -6.27094372372828],
            },
            {
                kelurahan: "CIPINANG",
                kordinat: [106.891260774064, -6.2075560828714],
            },
            {
                kelurahan: "CIDENG",
                kordinat: [106.808310820694, -6.1729803094658],
            },
            {
                kelurahan: "JOHAR BARU",
                kordinat: [106.857029645221, -6.18569864782619],
            },
            {
                kelurahan: "KAMAL",
                kordinat: [106.70005348037, -6.10656087716391],
            },
            {
                kelurahan: "JELAMBAR BARU",
                kordinat: [106.787226994341, -6.14909450796515],
            },
            {
                kelurahan: "GUNTUR",
                kordinat: [106.833249034146, -6.20794694901622],
            },
            {
                kelurahan: "GUNUNG SAHARI SELATAN",
                kordinat: [106.844017923919, -6.15934236207373],
            },
            {
                kelurahan: "JEMBATAN BESI",
                kordinat: [106.797751201794, -6.15186678292615],
            },
            {
                kelurahan: "MANGGA BESAR",
                kordinat: [106.818306162559, -6.14480014760434],
            },
            {
                kelurahan: "JELAMBAR",
                kordinat: [106.785762810035, -6.1593992293072],
            },
            {
                kelurahan: "KARET",
                kordinat: [106.826964737567, -6.21379969219026],
            },
            {
                kelurahan: "KEBON BARU",
                kordinat: [106.861631544954, -6.23370984627694],
            },
            {
                kelurahan: "KEBON SIRIH",
                kordinat: [106.830752573211, -6.18508688763716],
            },
            {
                kelurahan: "PALMERAH",
                kordinat: [106.789488961937, -6.20103876387042],
            },
            {
                kelurahan: "PETOGOGAN",
                kordinat: [106.811191693718, -6.24319814809799],
            },
            {
                kelurahan: "WARAKAS",
                kordinat: [106.877782261381, -6.12183006699335],
            },
            {
                kelurahan: "MENTENG ATAS",
                kordinat: [106.839537225947, -6.21816989049072],
            },
            {
                kelurahan: "PEKOJAN",
                kordinat: [106.804028794853, -6.13734495563037],
            },
            {
                kelurahan: "SELONG",
                kordinat: [106.804594510712, -6.23421581529553],
            },
            {
                kelurahan: "PISANGAN TIMUR",
                kordinat: [106.880134915709, -6.20857627951949],
            },
            {
                kelurahan: "PISANGAN BARU",
                kordinat: [106.868984142346, -6.21170402077053],
            },
            {
                kelurahan: "RAWA BARAT",
                kordinat: [106.813139014201, -6.2363621502823],
            },
            {
                kelurahan: "TANAH TINGGI",
                kordinat: [106.849248693307, -6.17922607326142],
            },
            {
                kelurahan: "SUKABUMI UTARA",
                kordinat: [106.777634785304, -6.20883629114648],
            },
            {
                kelurahan: "TAMBORA",
                kordinat: [106.808846207665, -6.14462915712309],
            },
            {
                kelurahan: "SENEN",
                kordinat: [106.839631642031, -6.17610135315747],
            },
            {
                kelurahan: "CEMPAKA BARU",
                kordinat: [106.862779174035, -6.16810842497002],
            },
            {
                kelurahan: "CAWANG",
                kordinat: [106.866895507895, -6.2508803086182],
            },
            {
                kelurahan: "BALI MESTER",
                kordinat: [106.86636534666, -6.2195453127645],
            },
            {
                kelurahan: "CEGER",
                kordinat: [106.892392768416, -6.30849411118805],
            },
            {
                kelurahan: "ANGKE",
                kordinat: [106.795794360571, -6.14552741421886],
            },
            {
                kelurahan: "BUKIT DURI",
                kordinat: [106.858147238752, -6.2213042733482],
            },
            {
                kelurahan: "CILANDAK TIMUR",
                kordinat: [106.812764394648, -6.29124715819424],
            },
            {
                kelurahan: "CILANGKAP",
                kordinat: [106.908866776889, -6.33359108245503],
            },
            {
                kelurahan: "CEMPAKA PUTIH BARAT",
                kordinat: [106.863845794914, -6.17992983112421],
            },
            {
                kelurahan: "BIDARA CINA",
                kordinat: [106.86695250674, -6.23537213639289],
            },
            {
                kelurahan: "BAMBU APUS",
                kordinat: [106.902306165264, -6.31242413412121],
            },
            {
                kelurahan: "BARU",
                kordinat: [106.847210345023, -6.32392993757224],
            },
            {
                kelurahan: "PETOJO SELATAN",
                kordinat: [106.816407973239, -6.17477076171228],
            },
            {
                kelurahan: "BANGKA",
                kordinat: [106.818322386603, -6.26321694333805],
            },
            {
                kelurahan: "BATU AMPAR",
                kordinat: [106.861052548768, -6.27910071050568],
            },
            {
                kelurahan: "HARAPAN MULIA",
                kordinat: [106.855866970375, -6.17051259201841],
            },
            {
                kelurahan: "CIPINANG BESAR UTARA",
                kordinat: [106.87958664141, -6.21863480288697],
            },
            {
                kelurahan: "CENGKARENG BARAT",
                kordinat: [106.723790997263, -6.13867707610728],
            },
            {
                kelurahan: "BINTARO",
                kordinat: [106.763618125893, -6.27037303835748],
            },
            {
                kelurahan: "CAKUNG BARAT",
                kordinat: [106.934686856088, -6.17305116144553],
            },
            {
                kelurahan: "CAKUNG TIMUR",
                kordinat: [106.955332011345, -6.17100433922291],
            },
            {
                kelurahan: "CIKOKO",
                kordinat: [106.854279825438, -6.24497535334944],
            },
            {
                kelurahan: "CILANDAK BARAT",
                kordinat: [106.797156249676, -6.29051429587967],
            },
            {
                kelurahan: "CILILITAN",
                kordinat: [106.864434633471, -6.26249132254724],
            },
            {
                kelurahan: "CIPINANG CEMPEDAK",
                kordinat: [106.873471677958, -6.236614803337],
            },
            {
                kelurahan: "CILINCING",
                kordinat: [106.944874135385, -6.11170184798334],
            },
            {
                kelurahan: "CIPAYUNG",
                kordinat: [106.893897449408, -6.32905503392006],
            },
            {
                kelurahan: "KEBON MELATI",
                kordinat: [106.815968239544, -6.1970527198445],
            },
            {
                kelurahan: "CIPEDAK",
                kordinat: [106.802083997624, -6.35369913538251],
            },
            {
                kelurahan: "CIPETE SELATAN",
                kordinat: [106.805057303387, -6.27277632781872],
            },
            {
                kelurahan: "GALUR",
                kordinat: [106.855436303918, -6.17617078785069],
            },
            {
                kelurahan: "GAMBIR",
                kordinat: [106.826707356245, -6.17638426928023],
            },
            {
                kelurahan: "TOMANG",
                kordinat: [106.796473965919, -6.17173899669378],
            },
            {
                kelurahan: "GANDARIA UTARA",
                kordinat: [106.791041341464, -6.25777973040243],
            },
            {
                kelurahan: "SETIA BUDI",
                kordinat: [106.825837937748, -6.2074199952573],
            },
            {
                kelurahan: "GEDONG",
                kordinat: [106.859966137258, -6.30147795854981],
            },
            {
                kelurahan: "DURI PULO",
                kordinat: [106.80458246441, -6.16338079999258],
            },
            {
                kelurahan: "CIPETE UTARA",
                kordinat: [106.80436442052, -6.26173014025804],
            },
            {
                kelurahan: "DURI SELATAN",
                kordinat: [106.805013188073, -6.15902781412903],
            },
            {
                kelurahan: "CIPINANG BESAR SELATAN",
                kordinat: [106.880835476944, -6.22976803272407],
            },
            {
                kelurahan: "DURI UTARA",
                kordinat: [106.804942282297, -6.15431004452012],
            },
            {
                kelurahan: "CIPINANG MELAYU",
                kordinat: [106.905831232452, -6.24955628781919],
            },
            {
                kelurahan: "CIPINANG MUARA",
                kordinat: [106.88922262661, -6.22611690718629],
            },
            {
                kelurahan: "KALI ANYAR",
                kordinat: [106.79903386743, -6.15769134700794],
            },
            {
                kelurahan: "CIPULIR",
                kordinat: [106.773155122458, -6.23793520505473],
            },
            {
                kelurahan: "CIKINI",
                kordinat: [106.839387990622, -6.19144933066517],
            },
            {
                kelurahan: "CIRACAS",
                kordinat: [106.875316693506, -6.3260630001247],
            },
            {
                kelurahan: "KARANG ANYAR",
                kordinat: [106.829135431968, -6.15397478137955],
            },
            {
                kelurahan: "DUREN SAWIT",
                kordinat: [106.915721271092, -6.23328416440598],
            },
            {
                kelurahan: "KAMPUNG BALI",
                kordinat: [106.816134579909, -6.18518775246783],
            },
            {
                kelurahan: "DUREN TIGA",
                kordinat: [106.835291283646, -6.25583615503228],
            },
            {
                kelurahan: "GONDANGDIA",
                kordinat: [106.829435891716, -6.19179611097435],
            },
            {
                kelurahan: "CENGKARENG TIMUR",
                kordinat: [106.735647170413, -6.14128196438806],
            },
            {
                kelurahan: "GROGOL",
                kordinat: [106.794325299641, -6.16184680511797],
            },
            {
                kelurahan: "DUKUH",
                kordinat: [106.877783861843, -6.29589028793787],
            },
            {
                kelurahan: "CIGANJUR",
                kordinat: [106.808670396577, -6.33635583088517],
            },
            {
                kelurahan: "DURI KEPA",
                kordinat: [106.773851647269, -6.17607223528842],
            },
            {
                kelurahan: "DURI KOSAMBI",
                kordinat: [106.719237539067, -6.17001063952574],
            },
            {
                kelurahan: "KALIBARU",
                kordinat: [106.920143984787, -6.10293345030191],
            },
            {
                kelurahan: "CIJANTUNG",
                kordinat: [106.858875780337, -6.32157098970938],
            },
            {
                kelurahan: "JOGLO",
                kordinat: [106.738901514359, -6.21913250943172],
            },
            {
                kelurahan: "KARET SEMANGGI",
                kordinat: [106.817934330794, -6.22253903163692],
            },
            {
                kelurahan: "KALIBATA",
                kordinat: [106.837658359856, -6.2633305411815],
            },
            {
                kelurahan: "KALIDERES",
                kordinat: [106.698785519767, -6.14922780474256],
            },
            {
                kelurahan: "GUNUNG SAHARI UTARA",
                kordinat: [106.838283316969, -6.14921536977911],
            },
            {
                kelurahan: "KALISARI",
                kordinat: [106.853038437807, -6.33537780768208],
            },
            {
                kelurahan: "KAMAL MUARA",
                kordinat: [106.735837814876, -6.1107651443879],
            },
            {
                kelurahan: "GELORA",
                kordinat: [106.801505339459, -6.21625888260069],
            },
            {
                kelurahan: "GLODOK",
                kordinat: [106.813214131305, -6.14497746902846],
            },
            {
                kelurahan: "GROGOL SELATAN",
                kordinat: [106.781449431273, -6.22970438540237],
            },
            {
                kelurahan: "GROGOL UTARA",
                kordinat: [106.787136887485, -6.2172202114882],
            },
            {
                kelurahan: "JEMBATAN LIMA",
                kordinat: [106.803792773857, -6.14490519052608],
            },
            {
                kelurahan: "KEBON MANGGIS",
                kordinat: [106.855346271711, -6.20727473633999],
            },
            {
                kelurahan: "GUNUNG",
                kordinat: [106.792775126678, -6.23594388650512],
            },
            {
                kelurahan: "KELAPA GADING BARAT",
                kordinat: [106.895269139883, -6.15552378967254],
            },
            {
                kelurahan: "JAGAKARSA",
                kordinat: [106.819246663845, -6.32537260793634],
            },
            {
                kelurahan: "JATI PADANG",
                kordinat: [106.831058031946, -6.28825938435036],
            },
            {
                kelurahan: "KEBON BAWANG",
                kordinat: [106.889019498519, -6.11937234424829],
            },
            {
                kelurahan: "KELAPA GADING TIMUR",
                kordinat: [106.90360715134, -6.16839916689042],
            },
            {
                kelurahan: "KARTINI",
                kordinat: [106.833118085856, -6.1532451786809],
            },
            {
                kelurahan: "JATINEGARA",
                kordinat: [106.916053416625, -6.20344802566098],
            },
            {
                kelurahan: "KAYU MANIS",
                kordinat: [106.862213831324, -6.20270408432705],
            },
            {
                kelurahan: "JATI",
                kordinat: [106.897029023734, -6.19452623737398],
            },
            {
                kelurahan: "JATINEGARA KAUM",
                kordinat: [106.901457923829, -6.20234834884718],
            },
            {
                kelurahan: "KAPUK",
                kordinat: [106.754065916163, -6.14218647017166],
            },
            {
                kelurahan: "KAPUK MUARA",
                kordinat: [106.763305628371, -6.12218961751628],
            },
            {
                kelurahan: "KEDOYA UTARA",
                kordinat: [106.760988299761, -6.16857000412445],
            },
            {
                kelurahan: "KEBON KELAPA",
                kordinat: [106.824549974903, -6.1641506144623],
            },
            {
                kelurahan: "KELAPA DUA",
                kordinat: [106.768725777381, -6.20935190181786],
            },
            {
                kelurahan: "KARET TENGSIN",
                kordinat: [106.816551514266, -6.20706662486508],
            },
            {
                kelurahan: "KELAPA DUA WETAN",
                kordinat: [106.882970880301, -6.34112582259438],
            },
            {
                kelurahan: "MELAWAI",
                kordinat: [106.802246658983, -6.2455926318479],
            },
            {
                kelurahan: "KEMANGGISAN",
                kordinat: [106.791380301514, -6.18987547785637],
            },
            {
                kelurahan: "KEMAYORAN",
                kordinat: [106.845383786804, -6.16472147763137],
            },
            {
                kelurahan: "KEMBANGAN SELATAN",
                kordinat: [106.738584691009, -6.18615808320017],
            },
            {
                kelurahan: "KEMBANGAN UTARA",
                kordinat: [106.742511600446, -6.17232398437239],
            },
            {
                kelurahan: "KAYU PUTIH",
                kordinat: [106.883693095322, -6.17940001931571],
            },
            {
                kelurahan: "KEBAGUSAN",
                kordinat: [106.830942361388, -6.30973492877673],
            },
            {
                kelurahan: "KEBON JERUK",
                kordinat: [106.772134897526, -6.19500358429678],
            },
            {
                kelurahan: "KEBON KACANG",
                kordinat: [106.817201945748, -6.19029931602392],
            },
            {
                kelurahan: "KEBON KOSONG",
                kordinat: [106.853461747615, -6.15819605535884],
            },
            {
                kelurahan: "KOTA BAMBU UTARA",
                kordinat: [106.803417613565, -6.18356522989228],
            },
            {
                kelurahan: "KEBON PALA",
                kordinat: [106.877833900441, -6.25571030595755],
            },
            {
                kelurahan: "MANGGA DUA SELATAN",
                kordinat: [106.828260256841, -6.14207490053543],
            },
            {
                kelurahan: "KEBAYORAN LAMA SELATAN",
                kordinat: [106.780148484667, -6.25456762190232],
            },
            {
                kelurahan: "KEBAYORAN LAMA UTARA",
                kordinat: [106.776848724088, -6.24614366603367],
            },
            {
                kelurahan: "KAMPUNG RAWA",
                kordinat: [106.855513229834, -6.17950356950519],
            },
            {
                kelurahan: "KEDAUNG KALI ANGKE",
                kordinat: [106.758576015288, -6.15256949605835],
            },
            {
                kelurahan: "KRAMAT",
                kordinat: [106.846320437487, -6.18348640618221],
            },
            {
                kelurahan: "KEDOYA SELATAN",
                kordinat: [106.760418286986, -6.18253392848629],
            },
            {
                kelurahan: "KWITANG",
                kordinat: [106.840193546425, -6.18318376310215],
            },
            {
                kelurahan: "KAMPUNG MELAYU",
                kordinat: [106.861277596858, -6.21738482050325],
            },
            {
                kelurahan: "KENARI",
                kordinat: [106.846683472723, -6.19356000257104],
            },
            {
                kelurahan: "MAMPANG PRAPATAN",
                kordinat: [106.828637163477, -6.24275787977454],
            },
            {
                kelurahan: "MAPHAR",
                kordinat: [106.821172338109, -6.15601257752805],
            },
            {
                kelurahan: "PEJATEN TIMUR",
                kordinat: [106.848282310615, -6.2801614064755],
            },
            {
                kelurahan: "MANGGARAI",
                kordinat: [106.851062911107, -6.2135265709077],
            },
            {
                kelurahan: "MANGGARAI SELATAN",
                kordinat: [106.848517904195, -6.21996580391261],
            },
            {
                kelurahan: "MARUNDA",
                kordinat: [106.961284401015, -6.113501852069],
            },
            {
                kelurahan: "MENTENG",
                kordinat: [106.833920591568, -6.20089669974896],
            },
            {
                kelurahan: "KRUKUT",
                kordinat: [106.814993668419, -6.15695814026878],
            },
            {
                kelurahan: "KLENDER",
                kordinat: [106.90813621644, -6.2185124197491],
            },
            {
                kelurahan: "KUNINGAN BARAT",
                kordinat: [106.822144880409, -6.23595753320787],
            },
            {
                kelurahan: "KOJA",
                kordinat: [106.899122955021, -6.10577304917311],
            },
            {
                kelurahan: "KOTA BAMBU SELATAN",
                kordinat: [106.803353901735, -6.18734974845941],
            },
            {
                kelurahan: "KRAMAT PELA",
                kordinat: [106.792442419077, -6.24472875967881],
            },
            {
                kelurahan: "KUNINGAN TIMUR",
                kordinat: [106.829512159071, -6.23158607519609],
            },
            {
                kelurahan: "LAGOA",
                kordinat: [106.910619132986, -6.11399743651156],
            },
            {
                kelurahan: "PENGADEGAN",
                kordinat: [106.855424162661, -6.24925648705767],
            },
            {
                kelurahan: "LEBAK BULUS",
                kordinat: [106.77894157624, -6.30112305479764],
            },
            {
                kelurahan: "LENTENG AGUNG",
                kordinat: [106.836903148115, -6.325664859182],
            },
            {
                kelurahan: "LUBANG BUAYA",
                kordinat: [106.903528833342, -6.29392173361504],
            },
            {
                kelurahan: "SUMUR BATU",
                kordinat: [106.871047261908, -6.16349017527244],
            },
            {
                kelurahan: "MAKASAR",
                kordinat: [106.877033587368, -6.27577224494573],
            },
            {
                kelurahan: "MALAKA JAYA",
                kordinat: [106.934862424551, -6.22336512218718],
            },
            {
                kelurahan: "MALAKA SARI",
                kordinat: [106.928425594337, -6.22384422298812],
            },
            {
                kelurahan: "MERUYA UTARA",
                kordinat: [106.738767789367, -6.1966346418424],
            },
            {
                kelurahan: "UTAN KAYU UTARA",
                kordinat: [106.868269048953, -6.19550652157989],
            },
            {
                kelurahan: "MUNJUL",
                kordinat: [106.895677726988, -6.3478093873621],
            },
            {
                kelurahan: "PADEMANGAN BARAT",
                kordinat: [106.836764588809, -6.13492677792781],
            },
            {
                kelurahan: "PADEMANGAN TIMUR",
                kordinat: [106.8478070055, -6.14232844070373],
            },
            {
                kelurahan: "PASAR MANGGIS",
                kordinat: [106.84158253741, -6.21044137484654],
            },
            {
                kelurahan: "PANCORAN",
                kordinat: [106.840707833002, -6.24744336003884],
            },
            {
                kelurahan: "PASAR MINGGU",
                kordinat: [106.839363454169, -6.28991922574007],
            },
            {
                kelurahan: "PAPANGGO",
                kordinat: [106.871108767074, -6.12900617451505],
            },
            {
                kelurahan: "PASAR BARU",
                kordinat: [106.83448401588, -6.16602947068673],
            },
            {
                kelurahan: "PASEBAN",
                kordinat: [106.852587250498, -6.19339147493744],
            },
            {
                kelurahan: "PEGADUNGAN",
                kordinat: [106.702353946773, -6.13275718918478],
            },
            {
                kelurahan: "PULO GADUNG",
                kordinat: [106.898903551917, -6.18299061865617],
            },
            {
                kelurahan: "PEGANGSAAN",
                kordinat: [106.848072167268, -6.20196460461354],
            },
            {
                kelurahan: "PETAMBURAN",
                kordinat: [106.806001685901, -6.19687566275644],
            },
            {
                kelurahan: "PESANGGRAHAN",
                kordinat: [106.758735300531, -6.25648069940373],
            },
            {
                kelurahan: "PENJARINGAN",
                kordinat: [106.800073832348, -6.12207730012579],
            },
            {
                kelurahan: "PEGANGSAAN DUA",
                kordinat: [106.914716882326, -6.16408683226957],
            },
            {
                kelurahan: "PEJAGALAN",
                kordinat: [106.784827450065, -6.13580658464833],
            },
            {
                kelurahan: "UTAN PANJANG",
                kordinat: [106.854326221795, -6.16535442511159],
            },
            {
                kelurahan: "PEJATEN BARAT",
                kordinat: [106.835282547028, -6.27299312637062],
            },
            {
                kelurahan: "PEKAYON",
                kordinat: [106.864389762062, -6.3449540953624],
            },
            {
                kelurahan: "PELA MAMPANG",
                kordinat: [106.817148578637, -6.24853909986531],
            },
            {
                kelurahan: "PENGGILINGAN",
                kordinat: [106.934844236356, -6.20484214733487],
            },
            {
                kelurahan: "PONDOK KOPI",
                kordinat: [106.942550333377, -6.22696189622745],
            },
            {
                kelurahan: "MENTENG DALAM",
                kordinat: [106.841246849809, -6.23162384487792],
            },
            {
                kelurahan: "RAWA BUNGA",
                kordinat: [106.87132709072, -6.21996193024349],
            },
            {
                kelurahan: "MERUYA SELATAN",
                kordinat: [106.733999371533, -6.20931697452601],
            },
            {
                kelurahan: "ROROTAN",
                kordinat: [106.955265105271, -6.14532208894883],
            },
            {
                kelurahan: "SEMANAN",
                kordinat: [106.702426505957, -6.16618015491114],
            },
            {
                kelurahan: "SEMPER BARAT",
                kordinat: [106.924259592784, -6.12596794345643],
            },
            {
                kelurahan: "SEMPER TIMUR",
                kordinat: [106.933252382009, -6.12061199121527],
            },
            {
                kelurahan: "PETOJO UTARA",
                kordinat: [106.815299449664, -6.16535378282879],
            },
            {
                kelurahan: "PETUKANGAN SELATAN",
                kordinat: [106.753792334275, -6.24331589603664],
            },
            {
                kelurahan: "RAWA BADAK SELATAN",
                kordinat: [106.898685331939, -6.13230665928947],
            },
            {
                kelurahan: "PETUKANGAN UTARA",
                kordinat: [106.75101122644, -6.22928815391129],
            },
            {
                kelurahan: "SUKABUMI SELATAN",
                kordinat: [106.771976700512, -6.22174513532899],
            },
            {
                kelurahan: "RAWAMANGUN",
                kordinat: [106.88244828357, -6.19590904440279],
            },
            {
                kelurahan: "PINANGSIA",
                kordinat: [106.815804282372, -6.13708249346776],
            },
            {
                kelurahan: "PULO",
                kordinat: [106.802045088624, -6.25330997702339],
            },
            {
                kelurahan: "RAWASARI",
                kordinat: [106.866046508743, -6.19044662797002],
            },
            {
                kelurahan: "PONDOK BAMBU",
                kordinat: [106.900878416204, -6.23484846645207],
            },
            {
                kelurahan: "ROA MALAKA",
                kordinat: [106.809469368255, -6.13637449343088],
            },
            {
                kelurahan: "PONDOK KELAPA",
                kordinat: [106.93188774186, -6.24342401245266],
            },
            {
                kelurahan: "RAWA BUAYA",
                kordinat: [106.736389150783, -6.16287135549716],
            },
            {
                kelurahan: "PONDOK LABU",
                kordinat: [106.797027586026, -6.30927443777828],
            },
            {
                kelurahan: "SUNGAI BAMBU",
                kordinat: [106.886224328238, -6.13074025577404],
            },
            {
                kelurahan: "RAWA BADAK UTARA",
                kordinat: [106.897893109845, -6.11961275573959],
            },
            {
                kelurahan: "PONDOK PINANG",
                kordinat: [106.778857408958, -6.27606602673475],
            },
            {
                kelurahan: "PONDOK RANGGON",
                kordinat: [106.906850499146, -6.35539148390087],
            },
            {
                kelurahan: "PULO GEBANG",
                kordinat: [106.952955214449, -6.20500706701234],
            },
            {
                kelurahan: "RAGUNAN",
                kordinat: [106.821238775704, -6.29876136130953],
            },
            {
                kelurahan: "SUSUKAN",
                kordinat: [106.86884147041, -6.31248140942556],
            },
            {
                kelurahan: "TEGAL PARANG",
                kordinat: [106.829231264862, -6.24881450103449],
            },
            {
                kelurahan: "RAMBUTAN",
                kordinat: [106.877746518795, -6.30710134491421],
            },
            {
                kelurahan: "RAWA TERATE",
                kordinat: [106.920447107467, -6.18447178921686],
            },
            {
                kelurahan: "WIJAYA KUSUMA",
                kordinat: [106.775908824205, -6.15482146991689],
            },
            {
                kelurahan: "TANAH SEREAL",
                kordinat: [106.809841852686, -6.15404585485693],
            },
            {
                kelurahan: "SRENGSENG SAWAH",
                kordinat: [106.824459905671, -6.34839794333306],
            },
            {
                kelurahan: "SUKAPURA",
                kordinat: [106.927973641205, -6.14796232979686],
            },
            {
                kelurahan: "TEBET BARAT",
                kordinat: [106.848980166044, -6.23494078590659],
            },
            {
                kelurahan: "TEBET TIMUR",
                kordinat: [106.855523101862, -6.23381945447945],
            },
            {
                kelurahan: "TEGAL ALUR",
                kordinat: [106.715919156645, -6.11649816825729],
            },
            {
                kelurahan: "TUGU SELATAN",
                kordinat: [106.910345437471, -6.13540865683343],
            },
            {
                kelurahan: "TANJUNG DUREN SELATAN",
                kordinat: [106.788595559928, -6.17935244531923],
            },
            {
                kelurahan: "TUGU UTARA",
                kordinat: [106.912344292705, -6.12427674562036],
            },
            {
                kelurahan: "TANGKI",
                kordinat: [106.823136682183, -6.14619713728914],
            },
            {
                kelurahan: "UJUNG MENTENG",
                kordinat: [106.963344812767, -6.18627604492655],
            },
            {
                kelurahan: "SENAYAN",
                kordinat: [106.810394817247, -6.22678603215109],
            },
            {
                kelurahan: "ULUJAMI",
                kordinat: [106.763183489486, -6.23628834828197],
            },
            {
                kelurahan: "SUNTER AGUNG",
                kordinat: [106.862089053746, -6.13808205169972],
            },
            {
                kelurahan: "SUNTER JAYA",
                kordinat: [106.876812601473, -6.15135381932835],
            },
            {
                kelurahan: "TAMAN SARI",
                kordinat: [106.824531240858, -6.15357668400071],
            },
            {
                kelurahan: "TANJUNG BARAT",
                kordinat: [106.847497282611, -6.30675798193156],
            },
            {
                kelurahan: "TANJUNG DUREN UTARA",
                kordinat: [106.783272459404, -6.17281865105015],
            },
            {
                kelurahan: "UTAN KAYU SELATAN",
                kordinat: [106.868934128878, -6.20349581454576],
            },
            {
                kelurahan: "TANJUNG PRIOK",
                kordinat: [106.879034604041, -6.10897877010519],
            },
            {
                kelurahan: "SETU",
                kordinat: [106.914809988355, -6.31303631772808],
            },
            {
                kelurahan: "SRENGSENG",
                kordinat: [106.755277756504, -6.20748107487523],
            },
        ];

        let list_pekerjaan = [
            "tidak_belum_bekerja",
            "petani",
            "nelayan",
            "pedagang",
            "pejabat_negara",
            "pns_tni_polri",
            "pegawai_swasta",
            "wiraswasta",
            "pensiunan",
            "pekerja_lepas",
        ];

        let list_pendidikan = [
            "tidak_belum_sekolah",
            "masih_sd",
            "tamat_sd",
            "tamat_sltp",
            "tamat_slta",
            "tamat_diploma_i_ii",
            "tamat_diploma_iii",
            "tamat_diploma_iv_strata_i",
            "tamat_strata_ii",
            "tamat_strata_iii",
            "tidak_sekolah_lagi",
            "masih_diploma_iii",
            "masih_sltp",
            "masih_diploma_iv_strata_i",
            "masih_slta",
            "masih_strata_ii",
            "masih_diploma_i_ii",
            "masih_strata_iii",
            "tidak_tamat_sd",
        ];

        let list_resiko_bencana = [
            "rumah_rawan_kabakaran",
            "jumlah_rumah_pernah_banjir",
            "jumlah_rumah_pernah_kebakaran",
        ];

        let optionKelurahan = "<option>Pilih Kelurahan...</option>";

        point_center_kelurahan.forEach(function (item, index) {
            optionKelurahan += `<option value="${item.kordinat[1]},${item.kordinat[0]}">${item.kelurahan}</option>`;
        });
        $("#filterChoro").html("");
        $("#filterChoro").html(`
        <div class="row">
        <div class="col-md-12 mt-1">
            <span class="text_all font-weight-bold">Kelurahan</span>
            <select id="selectKelurahan" class="w-100">
                ${optionKelurahan}
            </select>
        </div>
        <div class="col-md-12 mt-1">
            <span class="text_all font-weight-bold">Kategori</span>
            <select id="selectKategori" class="w-100">
                <option>Pilih Kategori...</option>
                <option value="Jumlah Penduduk">Jumlah Penduduk</option>
                <option value="Pekerjaan">Pekerjaan</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Jumlah Rumah">Jumlah Rumah</option>
                <option value="Resiko Bencana Kebakaran">Resiko Bencana Kebakaran</option>
            </select>
        </div>
        <div class="col-md-12 mt-2 mb-2">
            <div id="data_ppap"></div>
        </div>
        <div class="col-md-6">
            <span class="text_all font-weight-bold">Interval</span>
            <div class="text_all" id="legends">

            </div>
            </div>
        <div class="col-md-6">
            <span class="text_all font-weight-bold">Nama Kelurahan</span>
            <div id="pd">
                <p></p>
            </div>
        </div>
    </div>
        `);
        $("#selectKelurahan").change(function () {
            let value = $(this).val();
            geocoder.query(value);
        });

        $("#selectKategori").change(function () {
            let value = $(this).val();
            if (value == "Jumlah Penduduk" || value == "Jumlah Rumah") {
                // console.log("Disable Chip");
                $("#data_ppap").html("");
            } else if (value == "Pekerjaan") {
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    1
                ) {
                    $("#data_ppap").slick("unslick");
                }
                $("#data_ppap").html("");
                let html = "";
                list_pekerjaan.forEach(function (item, index) {
                    html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "tidak_belum_bekerja" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
                });
                $("#data_ppap").html(html);
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    0
                ) {
                    chipOption("data_ppap");
                }
                activeButton("data_ppap");
            } else if (value == "Pendidikan") {
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    1
                ) {
                    $("#data_ppap").slick("unslick");
                }
                $("#data_ppap").html("");
                let html = "";
                list_pendidikan.forEach(function (item, index) {
                    html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "tidak_belum_sekolah" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
                });
                $("#data_ppap").html(html);
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    0
                ) {
                    chipOption("data_ppap");
                }
                activeButton("data_ppap");
            } else if (value == "Resiko Bencana Kebakaran") {
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    1
                ) {
                    $("#data_ppap").slick("unslick");
                }
                $("#data_ppap").html("");
                let html = "";
                list_resiko_bencana.forEach(function (item, index) {
                    html += `
            <div class="mb-1">
            <button class="btn btn-xs mr-2 ${
                item == "rumah_rawan_kabakaran" ? "active-chip" : ""
            }"
                style="background: #fdfffc; border-radius: 30px; box-shadow: none; border:1px #ccc solid; padding:5px;">
                <div class="container">
                    <div class="row">
                        <span class="font-weight-bold" style="margin-top: 2px; font-size:13px;">${titleCase(
                            item.replaceAll("_", " ")
                        )}</span>
                    </div>
                </div>
            </button>
            </div>
            `;
                });
                $("#data_ppap").html(html);
                if (
                    $("div#data_ppap.slick-initialized.slick-slider").length ==
                    0
                ) {
                    chipOption("data_ppap");
                }
                activeButton("data_ppap");
            }
        });
    }
});

$("#btnInteractive").on("click", () => {
    if (map.getLayer("wilayahindex_fill")) {
        $("#optionFilterChoro").val("Total Omzet UMKM").trigger("change");
    }
    $("#wilayahindex_fill").trigger("click");
});

const chipOption = (name, slide = 4) => {
    $(`#${name}`).slick({
        infinite: false,
        slidesToShow: slide,
        slidesToScroll: slide,
        variableWidth: true,
        prevArrow: null,
        nextArrow: null,
    });
};

const sliderOption = (name) => {
    $(`#${name}`).slick({
        infinite: false,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
    });
};

chipOption("btn-titik", 1);

// const downloadRekap = () => {
//     $.ajax({
//         url: `${APP_URL}/printSurvey`,
//     });
// };

const activeButton = (name) => {
    var header = document.getElementById(name);
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function () {
            var current = document.getElementsByClassName("active-chip");
            console.log(current);
            current[0].className = current[0].className.replace(
                "active-chip",
                ""
            );
            this.className += " active-chip";
        });
    }
};
[];

$("#deskripsiRegionalSurvey").on("keyup", () => {
    // console.log($(this))
    let length = $("#deskripsiRegionalSurvey").val().length;
    $("#countTextRegional").text(length);
});

$("#deskripsiNeighborhoodSurvey").on("keyup", () => {
    // console.log($(this))
    let length = $("#deskripsiNeighborhoodSurvey").val().length;
    $("#countTextLingkungan").text(length);
});

$("#deskripsiTransectZoneSurvey").on("keyup", () => {
    // console.log($(this))
    let length = $("#deskripsiTransectZoneSurvey").val().length;
    $("#countTextRuang").text(length);
});

const getLayerSurveyPerkembangan = () => {
    if (map.getLayer("survey_perkembangan")) {
        console.log("loaded layer");
        map.removeLayer("survey_perkembangan");
        map.removeSource("survey_perkembangan_wilayah");
    }
    $.ajax({
        url: `${APP_URL}/layerSurveyPerkembangan`,
        method: "GET",
        dataType: "json",
        success: (res) => {
            let data = res;
            console.log(data);
            map.addSource("survey_perkembangan_wilayah", {
                type: "geojson",
                data: data,
            });

            map.addLayer({
                id: "survey_perkembangan",
                type: "circle",
                source: "survey_perkembangan_wilayah",
                paint: {
                    "circle-color": "#4264fb",
                    "circle-stroke-color": "#ffff00",
                    "circle-stroke-width": 1,
                    "circle-radius": 4,
                    "circle-opacity": 0.8,
                },
            });

            map.on("mouseenter", "survey_perkembangan", (e) => {
                map.getCanvas().style.cursor = "pointer";
            });

            map.on("mouseleave", "survey_perkembangan", () => {
                map.getCanvas().style.cursor = "";
                // popup.remove();
            });

            map.on("click", "survey_perkembangan", (e) => {
                const coordinates = e.features[0].geometry.coordinates.slice();
                const dt = e.features[0].properties;
                console.log(dt);
                let imageCarousel = ``;
                let carouselControl = ``;
                let image = JSON.parse(dt.image);
                if (image.length == 0) {
                    imageCarousel = `
                    <div class="carousel-item active">
                        <img src="${APP_URL}/survey/not_image.png" class="card-img-top" style="height: 160px;object-fit: cover;">
                    </div>
                    `;
                    carouselControl = ``;
                } else {
                    image.forEach((item, index) => {
                        imageCarousel += `
                        <div class="carousel-item ${
                            index == 0 ? "active" : ""
                        }">
                        <img src="${APP_URL}/survey/${
                            item.name
                        }" class="card-img-top" style="height: 160px;object-fit: cover;">
                        </div>
                        `;
                    });
                    if (image.length >= 2) {
                        console.log("carousel enabled");
                        carouselControl = `
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>`;
                    }
                }
                const content = `<div style="width:300px;">
                <div class="imgcard-container">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                ${imageCarousel}
                </div>
               ${carouselControl}
            </div>

                </div>
                <div class="card-body p-2">
                  <h6 class="mt-0 mb-1 card-title border-bottom font-weight-bold" style="font-size:14px;">${dt.name}</h6>
                    <div class="row">
                        <div class="col-sm-6">
                            ID Sub Blok
                        </div>
                        <div class="col-sm-6">
                            ${dt.id_sub_blok}
                        </div>
                        <div class="col-sm-6">
                            Kelurahan
                        </div>
                        <div class="col-sm-6">
                            ${dt.kelurahan}
                        </div>
                        <div class="col-sm-6">
                            Kecamatan
                        </div>
                        <div class="col-sm-6">
                            ${dt.kecamatan}
                        </div>
                        <div class="col-sm-6">
                            Pola Regional
                        </div>
                        <div class="col-sm-6">
                            ${dt.regional}
                        </div>
                        <div class="col-sm-6">
                            Pola Lingkungan
                        </div>
                        <div class="col-sm-6">
                            ${dt.neighborhood}
                        </div>
                        <div class="col-sm-6">
                            Pola Ruang
                        </div>
                        <div class="col-sm-6">
                            ${dt.transect_zone}
                        </div>
                    </div>
                </div>`;

                while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
                    coordinates[0] +=
                        e.lngLat.lng > coordinates[0] ? 360 : -360;
                }
                popupSurvey.setLngLat(coordinates).setHTML(content).addTo(map);
            });
        },
    });
};

map.on("mouseenter", "survey_dot", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const dt = e.features[0].properties;
    console.log(dt);
    let imageCarousel = ``;
    let carouselControl = ``;
    let image = JSON.parse(dt.image);
    if (image.length == 0) {
        imageCarousel += `
        <div class="carousel-item active">
            <img src="${APP_URL}/survey/not_image.png" class="card-img-top" style="height: 160px;object-fit: cover;">
        </div>
        `;
        carouselControl = ``;
    } else {
        image.forEach((item, index) => {
            imageCarousel += `
            <div class="carousel-item ${index == 0 ? "active" : ""}">
                <img src="${APP_URL}/survey/${
                item.name
            }" class="card-img-top" style="height: 160px;object-fit: cover;">
            </div>
            `;
        });

        if (image.length >= 2) {
            carouselControl = `
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>`;
            console.log("carousel enabled");
        }
    }
    const content = `<div style="width:300px;">
    <div class="imgcard-container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
    ${imageCarousel}
    </div>
    ${carouselControl}
</div>

    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-1 card-title border-bottom font-weight-bold" style="font-size:14px;">${dt.name}</h6>
        <div class="row">
            <div class="col-sm-6">
                ID Sub Blok
            </div>
            <div class="col-sm-6">
                ${dt.id_sub_blok}
            </div>
            <div class="col-sm-6">
                Kelurahan
            </div>
            <div class="col-sm-6">
                ${dt.kelurahan}
            </div>
            <div class="col-sm-6">
                Kecamatan
            </div>
            <div class="col-sm-6">
                ${dt.kecamatan}
            </div>
            <div class="col-sm-6">
                Pola Regional
            </div>
            <div class="col-sm-6">
                ${dt.regional}
            </div>
            <div class="col-sm-6">
                Pola Lingkungan
            </div>
            <div class="col-sm-6">
                ${dt.neighborhood}
            </div>
            <div class="col-sm-6">
                Pola Ruang
            </div>
            <div class="col-sm-6">
                ${dt.transect_zone}
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupSurvey.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "survey_dot", () => {
    map.getCanvas().style.cursor = "";
    // popup.remove();
});

Dropzone.autoDiscover = false;

function setup(id) {
    let options = {
        init: function () {
            var self = this;
            //New file added
            self.on("addedfile", function (file) {
                // filesBulk.push(file);
                console.log(file);
                new Compressor(file, {
                    quality: 0.3,
                    convertSize: 1000000,
                    success(result) {
                        filesBulk.push(result);
                    },
                    error(err) {
                        console.log(err.message);
                    },
                });
                console.log(file.name);
            });
            //Remove File Added
            self.on("removedfile", function (file) {
                console.log(file.name);
                filesBulk.splice(file, 1);
            });

            // self.on("maxfilesreached", function (file, response) {
            //     //alert("too big");
            // });

            // self.on("maxfilesexceeded", function (file, response) {
            //     this.removeFile(file);
            // });

            // self.on("addedfile", function (file) {
            //     const pattern = /\d{6}(\.)(jpg|jpeg|png)/;

            //     if (!pattern.test(file.name)) {
            //         //   this.removeFile(file);
            //     }
            // });
        },

        previewTemplate: `
        <div class="dz-preview dz-processing dz-image-preview dz-error dz-complete m-0 mt-1" style="margin-right:17px !important;">
        <div class="dz-image border" style="width:80px;height:80px;border-radius:10px;">
            <img data-dz-thumbnail="" alt="">
        </div>
        <div class="dz-details" style="font-size:6pt">
            <div class="dz-size" style="font-size:5pt">
                <span data-dz-size=""></span>
            </div>
            <div class="dz-filename"><span data-dz-name=""></span>
            </div>
        </div>
        <div class="dz-progress">
            <span class="dz-upload" data-dz-uploadprogress=""></span>
        </div>
        <div class="dz-success-mark">

        </div>
        <div class="dz-remove" style="z-index: 99999;position: absolute;top: 0px;right: 5px;">
        <a href="javascript:undefined;" data-dz-remove="" class="text-danger font-weight-bold"><i class="fa fa-close"></i></div>
    </div>
        `,
    };

    var myDropzone = new Dropzone(`#${id}`, options);
}
setup("fotoSurvey");

$("#fileExcel").on("change", function (e) {
    var file = e.target.files[0];
    $("#nameFileExcel").text(file.name);
});
