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
    map.addSource("titik-survey-rekap", {
        type: "geojson", //geojson,video,image,canvas
        data: `${APP_URL}/admin/titik-rekap-survey`,
    });

    map.addLayer({
        id: "titik-survey-rekap",
        type: "circle",
        source: "titik-survey-rekap",
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
map.on("mouseenter", "titik-survey-rekap", (e) => {
    map.getCanvas().style.cursor = "pointer";
    const coordinates = e.features[0].geometry.coordinates.slice();
    const data = e.features[0].properties;
    // console;

    // array = data.nameimage;
    // var datagambar = "";
    // console.log(data);
    // array.forEach((e) => {

    //     datagambar += `<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/${e.name}" alt="First slide"></div>`;
    // });
    // $(".view_image").html(datagambar);

    const content = `
    <div class="p-0">
        <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/survey/${data["nameimage"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
        </div>
        <div class="card-body p-2">
            <h6 class="mt-0 mb-2 card-title border-bottom">${data["name"]}</h6>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["id_sub_blok"]}</span>
            </div>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["kelurahan"]}</span>
            </div>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["kecamatan"]}</span>
            </div>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["regional"]}</span>
            </div>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["perkembangan_ling"]}</span>
            </div>
            <div style="line-height: 1.2;">
                <span class="d-block"> ${data["perkembangan_ruang"]}</span>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});

map.on("mouseleave", "titik-survey-rekap", () => {
    map.getCanvas().style.cursor = "";
    popup.remove();
});
