let kelurahan;
const popupAjib = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});

const markerAjib = new mapboxgl.Marker({
    // draggable: true,
});

$("#deleteForm").hide();

const findKelurahan = (lng, lat) => {
    $.ajax({
        url: `${url}/wilayah/${lng}/${lat}`,
        method: "GET",
        dataType: "json",
        success: (e) => {
            let kelurahan = e.features[0].properties.Kelurahan;
            let saveKelurahan = localStorage.getItem("kelurahan");
            console.log(saveKelurahan, kelurahan);
            if (saveKelurahan !== kelurahan) {
                addSourceLayer(kelurahan);
                map.moveLayer("zoning_fill", "survey_ajib");
                localStorage.setItem("kelurahan", kelurahan);
            }
        },
    });
    $.ajax({
        url: `${url}/zonasi/${lng}/${lat}`,
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
};

const dragMaps = (condition) => {
    var coorAjib = map.getCenter();
    if (condition == 1) {
        markerAjib.setLngLat(map.getCenter()).addTo(map);
        map.on("drag", () => {
            $("#form_ajib").hide();
            markerAjib.setLngLat(map.getCenter());
        });
        map.on("dragend", () => {
            $("#form_ajib").show();
            markerAjib.setLngLat(map.getCenter());
            const lngLat = markerAjib.getLngLat();
            findKelurahan(lngLat.lng, lngLat.lat);
            $("#preview-cord").text(
                `${lngLat.lat.toString().slice(0, 9)}, ${lngLat.lng
                    .toString()
                    .slice(0, 9)}`
            );
            $("#kordinatPinSurvey").val(`${lngLat.lat},${lngLat.lng}`);
        });
        // markerAjib.setLngLat([coorAjib.lng, coorAjib.lat]).addTo(map);
        // const onDragEnd = (e) => {
        //     const lngLat = markerAjib.getLngLat();
        //     $(".hide_hlm_kbli").show();
        //     findKelurahan(lngLat.lng, lngLat.lat);
        //     $("#form_kbli").hide();
        //     $("#form_ajib").show();
        //     $("#kordinatPinSurvey").val(`${lngLat.lat},${lngLat.lng}`);
        // };

        // markerAjib.on("dragend", onDragEnd);
    } else {
        markerAjib.remove();
        // $(".hide_hlm_kbli").hide();
    }
};

$("#kategoriPinSurvey").on("change", () => {
    if ($("#kategoriPinSurvey").val() == "UMKM") {
        $("#form_kbli").show();
    } else {
        $("#kbliPinSurvey").val("");
        $("#form_kbli").hide();
    }
});

//Tracking Cordinate AJib

const sendCordinates = () => {
    navigator.geolocation.getCurrentPosition((coor) => {
        let lat = coor.coords.latitude;
        let long = coor.coords.longitude;
        $.ajax({
            url: `${APP_URL}/tracking`,
            method: "POST",
            data: {
                lat: lat.toString(),
                lng: long.toString(),
                id_user: id_surveyer,
            },
            success: (e) => {
                console.log(e);
            },
        });
        // console.log(lat, long);
    });
};

//Interval Send Cordinates
setInterval(() => {
    sendCordinates();
}, 1000 * 60 * 5);

$("#izin_peta").change(() => {
    if ($("#izin_peta").prop("checked") == true) {
        console.log("checked");
        dragMaps(1);
    } else {
        dragMaps(0);
    }
});

$("#collapseSurvey").on("shown.bs.collapse", () => {
    $("#btnDrag").css("visibility", "visible");
    console.log("show");
});

$("#collapseSurvey").on("hidden.bs.collapse", () => {
    $("#btnDrag").css("visibility", "hidden");
});

$(".off_layer_ukm").hide();
$(".off_layer_dibangun").hide();
$(".off_layer_pedestrian").hide();
$(".off_layer_cagarbudaya").hide();
$(".off_layer_rth").hide();
$(".off_layer_dijual").hide();
$(".off_layer_lainnya").hide();

$(".gambar_logos2").hide();

// ukm
$("#radio_ukm").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("umk_fill");
        $(".off_layer_ukm").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
    } else {
        hideLayer("umk_fill");
    }
});

$("#btn_ukm").click(function () {
    $(this).css("background", "orange");
    $("#radio_ukm").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

// sedang dibangun
$("#radio_dibangun").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("sedangdibangun");
        $(".off_layer_dibangun").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umk_fill");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
    } else {
        hideLayer("sedangdibangun");
    }
});

$("#btn_dibangun").click(function () {
    $(this).css("background", "orange");
    $("#radio_dibangun").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

// sedang pendestrian
$("#radio_pedestrian").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("pendestrian");
        $(".off_layer_pedestrian").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umk_fill");
        hideLayer("sedangdibangun");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
    } else {
        hideLayer("pendestrian");
    }
});

$("#btn_pedestrian").click(function () {
    $(this).css("background", "orange");
    $("#radio_pedestrian").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

// sedang cagarbudaya
$("#radio_cagar").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("cagarbudaya");
        $(".off_layer_cagarbudaya").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umk_fill");
        hideLayer("sedangdibangun");
        hideLayer("pendestrian");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
    } else {
        hideLayer("cagarbudaya");
    }
});

$("#btn_cagar").click(function () {
    $(this).css("background", "orange");
    $("#radio_cagar").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
    $("#btn_dibangun").css("background", "white");
});

// sedang lainnya
$("#radio_lainnya").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("lainnya");
        $(".off_layer_lainnya").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        hideLayer("umk_fill");
        hideLayer("sedangdibangun");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("rth");
        hideLayer("dijual");
    } else {
        hideLayer("lainnya");
    }
});

$("#btn_lainnya").click(function () {
    $(this).css("background", "orange");
    $("#radio_lainnya").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
});

// sedang rth
$("#radio_rth").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("rth");
        $(".off_layer_rth").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umk_fill");
        hideLayer("sedangdibangun");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("dijual");
    } else {
        hideLayer("rth");
    }
});

$("#btn_rth").click(function () {
    $(this).css("background", "orange");
    $("#radio_rth").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_lainnya").css("background", "white");
    $("#btn_dijual").css("background", "white");
});

// sedang dijual
$("#radio_dijual").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("dijual");
        $(".off_layer_dijual").show();
        $(".gambar_logos2").show();
        $(".gambar_logos").hide();
        $(".off_layer_ukm").hide();
        $(".off_layer_dibangun").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umk_fill");
        hideLayer("sedangdibangun");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
    } else {
        hideLayer("dijual");
    }
});

$("#btn_dijual").click(function () {
    $(this).css("background", "orange");
    $("#radio_dijual").trigger("click");
    $("#btn_ukm").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_lainnya").css("background", "white");
    $("#btn_rth").css("background", "white");
});

function showLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "visible");
}

function hideLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "none");
}

map.on("style.load", function () {
    map.addSource("survey", {
        type: "geojson",
        data: `${APP_URL}/ajib`,
    });
    map.addLayer({
        id: "survey_ajib",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "red",
            "circle-stroke-color": "#ffffff",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        // filter: ["==", ["get", "kategori"], "Lainnya"],
        layout: {
            visibility: "visible",
        },
    });

    map.addLayer({
        id: "umk_fill",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "UMK"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "sedangdibangun",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Sedang dibangun"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "pendestrian",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Pedestrian"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "cagarbudaya",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Cagar Budaya"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "lainnya",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Lainnya"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "rth",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "RTH"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "dijual",
        type: "circle",
        source: "survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Dijual"],
        layout: {
            visibility: "none",
        },
    });
});

map.on("mouseenter", "survey_ajib", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
    <img src="/mobile/img/${
        data["foto"]
    }" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
    <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
    <div style="line-height: 1.2;">
    <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
    <span class="${
        data["kbli"] == "null" ? "d-none" : "d-block"
    }"><b>KBLI :</b> ${data["kbli"]}</span>
    <span class="d-block"> ${data["catatan"]}</span>
    </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }

    $("#form_ajib").show();
    $("#idPinSurvey").val("");
    $("#idPinSurvey").val(data["id"]);
    $("#deleteSurveyPin").val("");
    $("#deleteSurveyPin").val(data["id"]);
    $("#kordinatPinSurvey").val("");
    $("#kordinatPinSurvey").val(data["kordinat"]);
    $("#kategoriPinSurvey").val("");
    $("#kategoriPinSurvey").val(data["kategori"]);
    $("#catatanPinSurvey").val("");
    $("#catatanPinSurvey").val(data["catatan"]);
    $("#permasalahanPinSurvey").val("");
    $("#permasalahanPinSurvey").val(data["permasalahan"]);
    $("#solusiPinSurvey").val("");
    $("#solusiPinSurvey").val(data["solusi"]);
    $("#judulPinSurvey").val("");
    $("#judulPinSurvey").val(data["judul"]);
    $("#deleteForm").show();
    $("#image").prop("required", false);
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "survey_ajib", function () {
    map.getCanvas().style.cursor = "";
    // $("#image").prop("required", true);
    // $("#form_ajib").hide();
    // $("#idPinSurvey").val("");
    // $("#kordinatPinSurvey").val("");
    // $("#kategoriPinSurvey").val("");
    // $("#catatanPinSurvey").val("");
    // $("#judulPinSurvey").val("");
    popupAjib.remove();
});

$("#previewImage").hide();

$("#closeForm").click(() => {
    $("#image").prop("required", true);
    $("#previewImage").hide();
    $("#form_ajib").hide();
    $("#hlm_form_ajib").css("background", "white");
    $("#hlm_form_ajib").addClass("text-secondary");
});

const priviewImage = (input) => {
    let reader = new FileReader();
    reader.onload = (e) => {
        $("#previewImage").show();
        $("#previewImage").attr("src", e.target.result);
    };
    reader.readAsDataURL(input.files[0]);
};

$("#image").change(function () {
    priviewImage(this);
});

// UMK
map.on("mouseenter", "umk_fill", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "umk_fill", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_ukm").on("click", function (e) {
    $(".off_layer_ukm").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_ukm").css("background", "white");
    hideLayer("umk_fill");
    $("#radio_ukm").prop("checked", false);
});

// SEDANG DIBANGUN
map.on("mouseenter", "sedangdibangun", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "sedangdibangun", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_dibangun").on("click", function (e) {
    $(".off_layer_dibangun").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_dibangun").css("background", "white");
    hideLayer("sedangdibangun");
    $("#radio_dibangun").prop("checked", false);
});

// PENDESTRIAN
map.on("mouseenter", "pendestrian", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "pendestrian", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_pedestrian").on("click", function (e) {
    $(".off_layer_pedestrian").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_pedestrian").css("background", "white");
    hideLayer("sedangdibangun");
    $("#radio_pedestrian").prop("checked", false);
});

// CAGAR BUDAYA
map.on("mouseenter", "cagarbudaya", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "cagarbudaya", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_cagarbudaya").on("click", function (e) {
    $(".off_layer_cagarbudaya").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_cagar").css("background", "white");
    hideLayer("cagarbudaya");
    $("#radio_cagar").prop("checked", false);
});

// LAINNYA
map.on("mouseenter", "lainnya", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "lainnya", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_lainnya").on("click", function (e) {
    $(".off_layer_lainnya").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_lainnya").css("background", "white");
    hideLayer("lainnya");
    $("#radio_lainnya").prop("checked", false);
});

// RTH
map.on("mouseenter", "rth", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "rth", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_rth").on("click", function (e) {
    $(".off_layer_rth").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_rth").css("background", "white");
    hideLayer("rth");
    $("#radio_rth").prop("checked", false);
});

// DIJUAL
map.on("mouseenter", "dijual", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/mobile/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
    </div>
    <div class="card-body p-2">
      <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
      <div style="line-height: 1.2;">
        <span class="d-block"><b>Kategori :</b> ${data["kategori"]}</span>
        <span class="d-block"> ${data["catatan"]}</span>
      </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popupAjib.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "dijual", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

$("#btn_off_layer_dijual").on("click", function (e) {
    $(".off_layer_dijual").hide();
    $(".gambar_logos").show();
    $(".gambar_logos2").hide();
    $("#btn_dijual").css("background", "white");
    hideLayer("dijual");
    $("#radio_dijual").prop("checked", false);
});
