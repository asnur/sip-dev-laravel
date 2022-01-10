const popupAjib = new mapboxgl.Popup({
    closeButton: false,
    closeOnClick: false,
});

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
        layout: {
            visibility: "visible",
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
