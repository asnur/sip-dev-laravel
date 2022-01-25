const addText = () => {
    // $(`.ajib-${id}`).text("awkowko");
    $.ajax({
        url: `${APP_URL}/api/track`,
        method: "GET",
        success: (e) => {
            e.forEach((e) => {
                let line = turf.lineString(JSON.parse(e.kordinat));
                let length = turf.length(line, { units: "kilometers" });
                // console.log(length);
                $(`.ajib-${e.id_user}`).text(`${length.toFixed(2)} KM`);
            });
            $("#table-surveyer").DataTable();
        },
    });
};
