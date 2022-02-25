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
