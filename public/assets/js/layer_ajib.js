const popupAjib = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});

const markerAjib = new mapboxgl.Marker({
    draggable: true,
});

const dragMaps = (condition) => {
    var coorAjib = map.getCenter();
    if (condition == 1) {
        markerAjib.setLngLat([coorAjib.lng, coorAjib.lat]).addTo(map);
        function onDragEnd() {
            const lngLat = markerAjib.getLngLat();
            console.log(lngLat);
            $("#kordinatPinSurvey").val(`${lngLat.lat},${lngLat.lng}`);
        }

        markerAjib.on("dragend", onDragEnd);
    } else {
        markerAjib.remove();
    }
};

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

// ukm
$("#radio_ukm").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("umk_fill");
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
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 2,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        // filter: ["==", ["get", "kategori"], "Lainnya"],
        layout: {
            visibility: "none",
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
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

map.on("mouseleave", "survey_ajib", function () {
    map.getCanvas().style.cursor = "";
    popupAjib.remove();
});

// UMK
map.on("mouseenter", "umk_fill", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// SEDANG DIBANGUN
map.on("mouseenter", "sedangdibangun", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// PENDESTRIAN
map.on("mouseenter", "pendestrian", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// CAGAR BUDAYA
map.on("mouseenter", "cagarbudaya", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// LAINNYA
map.on("mouseenter", "lainnya", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// RTH
map.on("mouseenter", "rth", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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

// DIJUAL
map.on("mouseenter", "dijual", function (e) {
    let data = e.features[0].properties;
    const coordinates = e.features[0].geometry.coordinates.slice();
    // console.log(data);
    map.getCanvas().style.cursor = "pointer";
    const content = `<div class="p-0">
    <div class="imgcard-container">
      <img src="/img/${data["foto"]}" class="card-img-top" style="width: 200px;height: 160px;object-fit: cover; margin-bottom:-100px">
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
