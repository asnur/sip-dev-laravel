const gambarPeta = (name) => {
    $(name).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        infinite: false,
        arrows: true,
        dots: true,
    });
};

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
    closeButton: true,
    closeOnClick: true,
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
    // const data = e.features[0].properties;

    // const coor = e.features[0].geometry.coordinates;

    // const lat = e.geometry.coordinates[0];

    // const lats = e.features[0].geometry.coordinates[0];
    // const lngs = e.features[0].geometry.coordinates[1];

    // var lat = lats.toString();
    // var lng = lngs.toString();

    // console.log(lng, lat);

    const id = e.features[0].properties.id;

    $.ajax({
        url: `/admin/peta-survey/${id}`,
        method: "GET",
        dataType: "json",
        success: (e) => {
            // console.log(e.data[0]);
            const data = e.data;
            // console.log(e.data);

            let kel = String(data.kelurahan);
            let hasil_kel = kapital(kel);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            let kec = String(data.kecamatan);
            let hasil_kec = kapital(kec);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            array = data.nameimage;

            // console.log(array);

            var datagambar = "";
            if (array.length == 0) {
                datagambar += `<img class="img_parents" style="width:490px !important;height: 300px; object-fit: cover;" src="https://jakpintas.dpmptsp-dki.com/survey/not_image.png" alt="First slide">`;
            } else {
                array.forEach((dataimage) => {
                    datagambar += `<img src="https://jakpintas.dpmptsp-dki.com/survey/${dataimage.name}" class="card-img-top" style="width: 100%;height: 100px;object-fit: cover;">`;
                });
            }

            const content = `
                    <div class="imgcard-container">
                    <div class="gambar_peta">
                    ${datagambar}
                    </div>
                    </div>
            <div class="p-0">
                <div class="card-body p-2">
                    <h6 style="font-size:14px; line-height:17px; margin-bottom:7px" class="mt-0 card-title">${data["name"]}</h6>
                    <div class="border-bottom"></div>
                    <div style="line-height: 1.2; margin-top:7px;">
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
            popup.setLngLat(coordinates).setHTML(content).addTo(map);
            gambarPeta(".gambar_peta");
        },
    });

    while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
        coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
    }
});

// map.on("mouseleave", "titik-survey-rekap", () => {
//     map.getCanvas().style.cursor = "";
//     popup.remove();
// });
