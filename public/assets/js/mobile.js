// function FungsiShow() {

//     var x = document.getElementById("ShowDataMobile");
//     if (x.style.display === "none") {
//         x.style.display = "block";
//     } else {
//         x.style.display = "show";
//     }
// }

var url = "http://103.146.202.108:3000";

mapboxgl.accessToken =
    "pk.eyJ1IjoibWVudGhvZWxzciIsImEiOiJja3M0MDZiMHMwZW83MnVwaDZ6Z2NhY2JxIn0.vQFxEZsM7Vvr-PX3FMOGiQ";
const map = new mapboxgl.Map({
    container: "map",
    style: "mapbox://styles/menthoelsr/ckp6i54ay22u818lrq15ffcnr",
});

map.on("style.load", function () {

    map.addSource('mobile_index', {
        type: "geojson",
        data: `${url}/choro`,
    });


    map.addLayer({
        'id': 'mobile_index-fill',
        'type': 'fill',
        'source': 'mobile_index',
        paint: {
            "fill-color": [
                "interpolate",
                ["linear"],
                ["get", "Total omzet"],
                0,
                "#ffeda0",
                5000000000,
                "#ffe675",
                9000000000,
                "#ffdf52",
                13000000000,
                "#ffd61f",
                17000000000,
                "#e0b700",
                20396854609,
                "#caa502",
            ],
            "fill-opacity": 0.7,
            "fill-outline-color": "red",
        },
        layout: {
            visibility: "visible",
        },

    }, );
});

map.on('click', 'mobile_index-fill', function (e) {
    console.log(e);
});
