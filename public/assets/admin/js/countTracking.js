const addText = () => {
    // $(`.ajib-${id}`).text("awkowko");
    $.ajax({
        url: `${APP_URL}/api/track`,
        method: "GET",
        success: (e) => {
            $(`.contractin`).text(`0 KM`);
            e.forEach((e) => {
                let data = JSON.parse(e.kordinat);
                if (data.length !== 1) {
                    let line = turf.lineString(JSON.parse(e.kordinat));
                    let length = turf.length(line, { units: "kilometers" });
                    $(`.ajib-${e.id_user}`).text(`${length.toFixed(2)} KM`);
                }
            });
            $(document).ready(function () {
                $("#table-surveyer").DataTable({
                    ordering: true,
                    columnDefs: [
                        { orderSequence: ["desc", "asc"], targets: [0] },
                        { orderSequence: ["desc", "asc"], targets: [1] },
                        { orderSequence: ["desc", "asc"], targets: [2] },
                        { orderSequence: ["desc", "asc"], targets: [3] },
                    ],
                });
            });
        },
    });
};
