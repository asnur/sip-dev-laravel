mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
    zoom: 10.5,
    center: [106.8295257, -6.210588],
    preserveDrawingBuffer: true,
});

// Navigator
map.addControl(new mapboxgl.NavigationControl());

// disable map zoom when using scroll
map.scrollZoom.disable();

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

    map.addLayer({
        id: "umkm_fill",
        type: "circle",
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "UMKM"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "kampung-prioritas",
        type: "circle",
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "IMB Kampung Prioritas"],
        layout: {
            visibility: "none",
        },
    });

    map.addLayer({
        id: "sedangdibangun",
        type: "circle",
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
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
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
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
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
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
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
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
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
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
        source: "titik-survey",
        paint: {
            "circle-color": "#4264fb",
            "circle-stroke-color": "#ffff00",
            "circle-stroke-width": 1,
            "circle-radius": 4,
            "circle-opacity": 0.8,
        },
        filter: ["==", ["get", "kategori"], "Dijual"],
        layout: {
            visibility: "none",
        },
    });
});

$("#btn_dibangun").click(function () {
    $("#radio_dibangun").trigger("click");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_umkm").click(function () {
    $("#radio_umkm").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_kampung_prioritas").click(function () {
    $("#radio_kampung_prioritas").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_pedestrian").click(function () {
    $("#radio_pedestrian").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_cagar").click(function () {
    $("#radio_cagar").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_rth").click(function () {
    $("#radio_rth").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_dijual").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_dijual").click(function () {
    $("#radio_dijual").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_lainnya").css("background", "white");
});

$("#btn_lainnya").click(function () {
    $("#radio_lainnya").trigger("click");
    $("#btn_dibangun").css("background", "white");
    $("#btn_umkm").css("background", "white");
    $("#btn_kampung_prioritas").css("background", "white");
    $("#btn_dibangun").css("background", "white");
    $("#btn_pedestrian").css("background", "white");
    $("#btn_cagar").css("background", "white");
    $("#btn_rth").css("background", "white");
    $("#btn_dijual").css("background", "white");
});

$(".off_layer_umkm").hide();
$(".off_layer_kampung_prioritas").hide();
$(".off_layer_dibangun").hide();
$(".off_layer_pedestrian").hide();
$(".off_layer_cagarbudaya").hide();
$(".off_layer_rth").hide();
$(".off_layer_dijual").hide();
$(".off_layer_lainnya").hide();

$("#radio_lainnya").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("lainnya");
        // button danger aktif
        $(".off_layer_lainnya").show();
        // button normal
        $(".on_layer_lainnya").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("dijual");
        hideLayer("cagarbudaya");
        hideLayer("rth");
        hideLayer("titik-survey");
    } else {
        hideLayer("lainnya");
        showLayer("titik-survey");
    }
});

$("#radio_dijual").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("dijual");
        // button danger aktif
        $(".off_layer_dijual").show();
        // button normal
        $(".on_layer_dijual").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("lainnya");
        hideLayer("cagarbudaya");
        hideLayer("rth");
        hideLayer("titik-survey");
    } else {
        hideLayer("dijual");
        showLayer("titik-survey");
    }
});

$("#radio_rth").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("rth");
        // button danger aktif
        $(".off_layer_rth").show();
        // button normal
        $(".on_layer_rth").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("lainnya");
        hideLayer("cagarbudaya");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("rth");
        showLayer("titik-survey");
    }
});

$("#radio_cagar").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("cagarbudaya");
        // button danger aktif
        $(".off_layer_cagarbudaya").show();
        // button normal
        $(".on_layer_cagarbudaya").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("cagarbudaya");
        showLayer("titik-survey");
    }
});

$("#radio_pedestrian").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("pendestrian");
        // button danger aktif
        $(".off_layer_pedestrian").show();
        // button normal
        $(".on_layer_pedestrian").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("pendestrian");
        showLayer("titik-survey");
    }
});

$("#radio_kampung_prioritas").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("kampung-prioritas");
        // button danger aktif
        $(".off_layer_kampung_prioritas").show();
        // button normal
        $(".on_kampung_prioritas").hide();

        $(".on_layer_umkm").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_umkm").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("umkm_fill");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("kampung-prioritas");
        showLayer("titik-survey");
    }
});

$("#radio_umkm").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("umkm_fill");
        // button danger aktif
        $(".off_layer_umkm").show();
        // button normal
        $(".on_layer_umkm").hide();

        $(".on_kampung_prioritas").show();
        $(".on_layer_dibangun").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_dibangun").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("sedangdibangun");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("umkm_fill");
        showLayer("titik-survey");
    }
});

$("#radio_dibangun").change(function () {
    if ($(this).prop("checked") == true) {
        showLayer("sedangdibangun");
        // button danger aktif
        $(".off_layer_dibangun").show();
        // button normal
        $(".on_layer_dibangun").hide();

        $(".on_layer_umkm").show();
        $(".on_kampung_prioritas").show();
        $(".on_layer_pedestrian").show();
        $(".on_layer_cagarbudaya").show();
        $(".on_layer_rth").show();
        $(".on_layer_dijual").show();
        $(".on_layer_lainnya").show();

        $(".off_layer_umkm").hide();
        $(".off_layer_kampung_prioritas").hide();
        $(".off_layer_pedestrian").hide();
        $(".off_layer_cagarbudaya").hide();
        $(".off_layer_rth").hide();
        $(".off_layer_dijual").hide();
        $(".off_layer_lainnya").hide();
        hideLayer("umkm_fill");
        hideLayer("kampung-prioritas");
        hideLayer("pendestrian");
        hideLayer("cagarbudaya");
        hideLayer("lainnya");
        hideLayer("rth");
        hideLayer("dijual");
        hideLayer("titik-survey");
    } else {
        hideLayer("sedangdibangun");
        showLayer("titik-survey");
    }
});

function showLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "visible");
}

function hideLayer(layer) {
    map.setLayoutProperty(layer, "visibility", "none");
}

$(
    ".mapboxgl-ctrl.mapboxgl-ctrl-attrib, .mapboxgl-ctrl-geocoder.mapboxgl-ctrl, a.mapboxgl-ctrl-logo"
).css("visibility", "hidden");

// All
map.on("mouseenter", "titik-survey", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
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

// Lainnya
map.on("mouseenter", "lainnya", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "lainnya", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_lainnya").on("click", function (e) {
    $(".on_layer_lainnya").show();
    $(".off_layer_lainnya").hide();
    $("#btn_cagar").css("background", "white");
    hideLayer("lainnya");
    showLayer("titik-survey");
    $("#radio_lainnya").prop("checked", false);
});

// Dijual
map.on("mouseenter", "dijual", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "dijual", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_dijual").on("click", function (e) {
    $(".on_layer_dijual").show();
    $(".off_layer_dijual").hide();
    $("#btn_cagar").css("background", "white");
    hideLayer("dijual");
    showLayer("titik-survey");
    $("#radio_dijual").prop("checked", false);
});

// RTH
map.on("mouseenter", "rth", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "rth", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_rth").on("click", function (e) {
    $(".on_layer_rth").show();
    $(".off_layer_rth").hide();
    $("#btn_cagar").css("background", "white");
    hideLayer("rth");
    showLayer("titik-survey");
    $("#radio_rth").prop("checked", false);
});

// Cagar Budaya
map.on("mouseenter", "cagarbudaya", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "cagarbudaya", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_cagarbudaya").on("click", function (e) {
    $(".on_layer_cagarbudaya").show();
    $(".off_layer_cagarbudaya").hide();
    $("#btn_cagar").css("background", "white");
    hideLayer("cagarbudaya");
    showLayer("titik-survey");
    $("#radio_cagar").prop("checked", false);
});

// Pendestrian
map.on("mouseenter", "pendestrian", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "pendestrian", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_pedestrian").on("click", function (e) {
    $(".on_layer_pedestrian").show();
    $(".off_layer_pedestrian").hide();
    $("#btn_pedestrian").css("background", "white");
    hideLayer("pendestrian");
    showLayer("titik-survey");
    $("#radio_pedestrian").prop("checked", false);
});

// Kampung Prioritas
map.on("mouseenter", "kampung-prioritas", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "kampung-prioritas", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_kampung_prioritas").on("click", function (e) {
    $(".on_kampung_prioritas").show();
    $(".off_layer_kampung_prioritas").hide();
    $("#btn_kampung_prioritas").css("background", "white");
    hideLayer("kampung-prioritas");
    showLayer("titik-survey");
    $("#radio_kampung_prioritas").prop("checked", false);
});

// Umk
map.on("mouseenter", "umkm_fill", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "umkm_fill", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_umkm").on("click", function (e) {
    $(".on_layer_umkm").show();
    $(".off_layer_umkm").hide();
    $("#btn_umkm").css("background", "white");
    hideLayer("umkm_fill");
    showLayer("titik-survey");
    $("#radio_umkm").prop("checked", false);
});

// Sedang dibangun
map.on("mouseenter", "sedangdibangun", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/img-survey/${data["foto"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["judul"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["catatan"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});
map.on("mouseleave", "sedangdibangun", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});

$("#btn_off_layer_dibangun").on("click", function (e) {
    $(".on_layer_dibangun").show();
    $(".off_layer_dibangun").hide();
    $("#btn_dibangun").css("background", "white");
    hideLayer("sedangdibangun");
    showLayer("titik-survey");
    $("#radio_dibangun").prop("checked", false);
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

const dataTebaruRealtime = () => {
    $.ajax({
        url: `/admin/fetch-surveyer`,
        method: "GET",
        dataType: "json",
        success: function (e) {
            // console.log(e.surveyer);
            $.each(e.surveyer, function (key, data) {
                $("#name").html(data.name);
                $("#judul").html(data.judul);
                $("#kategori").html(data.kategori);
                $("#deskripsi").html(data.catatan);
                $("#solusi").html(data.solusi);
                $("#permasalahan").html(data.permasalahan);
                // $("#foto-carousel").append(
                //     '<img src="https://jakpintas.dpmptsp-dki.com/mobile/img/' +
                //         data.split(",")[1] +
                //         '"/>'
                // );
                const koor_kelurahan = data.kordinat;

                // console.log(koor_kelurahan);
                getAjibKelurahan(koor_kelurahan);
            });
        },
    });
};

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
        success: function (dt) {
            const dtResp = JSON.parse(dt);
            const prop = dtResp.features[0].properties;
            // console.log(prop);
            if (dtResp.features != null) {
                $("#kelurahan_ajib").html(`${prop.Kelurahan}`);
            }
        },
    });
}
