const addText = () => {
    // $(`.ajib-${id}`).text("awkowko");
    $.ajax({
        url: `${APP_URL}/api/track`,
        method: "GET",
        success: (e) => {
            e.forEach((e) => {
                let data = JSON.parse(e.kordinat);
                if (data.length !== 1) {
                    let line = turf.lineString(JSON.parse(e.kordinat));
                    let length = turf.length(line, { units: "kilometers" });
                    $(`.ajib-${e.id_user}`).text(`${length.toFixed(2)} KM`);
                } else {
                    $(`.ajib-${e.id_user}`).text(`0 KM`);
                }
            });
            $("#table-surveyer").DataTable();
        },
    });
};
