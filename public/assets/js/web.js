var kilometer = $("#ControlRange").val() / 1000;
$("#OutputControlRange").html(kilometer + " Km");
$(document).on("input change", "#ControlRange", function () {
    var kilometer = $(this).val() / 1000;
    $("#OutputControlRange").html(kilometer + " Km");
});

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
});
const draw = new MapboxDraw({
    displayControlsDefault: false,
    controls: {
        polygon: true,
        trash: true,
    },
});
map.addControl(new mapboxgl.NavigationControl());

map.addControl(draw);

map.on("draw.create");
map.on("draw.delete");
map.on("draw.update");

// Chart
new Chart(document.getElementById("pie-chart"), {
    type: "pie",
    data: {
        labels: ["Kel A", "Kel B", "Kel C"],
        datasets: [
            {
                label: "Kelurahan",
                backgroundColor: [
                    "#3e95cd",
                    "#8e5ea2",
                    "#3cba9f",
                    "#e8c3b9",
                    "#c45850",
                ],
                data: [478, 267, 734],
            },
        ],
    },
    options: {
        title: {
            display: true,
        },
    },
});

new Chart(document.getElementById("bar-chart-grouped"), {
    type: "bar",
    data: {
        labels: ["1900", "1950", "1999", "2050"],
        datasets: [
            {
                label: "Kecamatan A",
                backgroundColor: "#3e95cd",
                data: [133, 221, 783, 478],
            },
            {
                label: "Kecamatan B",
                backgroundColor: "#8e5ea2",
                data: [832, 447, 175, 534],
            },
        ],
    },
    options: {
        title: {
            display: true,
            text: "Jumlah",
        },
    },
});
