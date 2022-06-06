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

    let kel = String(data.kelurahan);
    let hasil_kel = kapital(kel);

    function kapital(str) {
        return str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    let kec = String(data.kecamatan);
    let hasil_kec = kapital(kec);

    function kapital(str) {
        return str.replace(/\w\S*/g, function (txt) {
            return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();
        });
    }

    const content = `

            <div class="imgcard-container">
            <img src="https://jakpintas.dpmptsp-dki.com/survey/${data["nameimage"]}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">
            </div>
    <div class="p-0">
        <div class="card-body p-2">
            <h6 style="font-size:14px;" class="mt-0 mb-1 card-title">${data["name"]}</h6>
            <div class="border-bottom"></div>
            <div style="line-height: 1.2; margin-top:12px;">
                <div class="row">
                    <div class="col-md-6">
                        <span>ID Sub Blok</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${data["id_sub_blok"]}</span>
                    </div>
                </div>
            </div>
            <div style="line-height: 1.2;">
                <div class="row">
                    <div class="col-md-6">
                        <span>Kelurahan</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${hasil_kel}</span>
                    </div>
                </div>
            </div>
            <div style="line-height: 1.2;">
                    <div class="row">
                    <div class="col-md-6">
                        <span>Kecamatan</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${hasil_kec}</span>
                    </div>
                </div>
            </div>
            <div style="line-height: 1.2;">
                    <div class="row">
                    <div class="col-md-6">
                        <span>Pola Regional</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${data["regional"]}</span>
                    </div>
                </div>
            </div>
            <div style="line-height: 1.2;">
                    <div class="row">
                    <div class="col-md-6">
                        <span>Pola Lingkungan</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${data["perkembangan_ling"]}</span>
                    </div>
                </div>
            </div>
            <div style="line-height: 1.2;">
                    <div class="row">
                    <div class="col-md-6">
                        <span>Pola Ruang</span>
                    </div>
                    <div class="col-md-6">
                        <span class="d-block"> ${data["perkembangan_ruang"]}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>`;

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
    popup.setLngLat(coordinates).setHTML(content).addTo(map);
});

// map.on("mouseleave", "titik-survey-rekap", () => {
//     map.getCanvas().style.cursor = "";
//     popup.remove();
// });
