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
                    // retrieve: true,
                    ordering: true,
                    order: [[0, "asc"]],
                    columnDefs: [
                        { orderSequence: ["desc", "asc"], targets: [0] },
                        { orderSequence: ["desc", "asc"], targets: [1] },
                        { orderSequence: ["desc", "asc"], targets: [2] },
                        { orderSequence: ["desc", "asc"], targets: [3] },
                    ],
                });
            });

            // $(document).ready(function () {
            //     $("#table-pegawai").DataTable({
            //         ordering: true,
            //         order: [[0, "asc"]],
            //         columnDefs: [
            //             {
            //                 orderSequence: ["asc", "desc"],
            //                 targets: [0],
            //             },
            //             {
            //                 orderSequence: ["asc", "desc"],
            //                 targets: [1],
            //             },
            //             {
            //                 orderSequence: ["asc", "desc"],
            //                 targets: [2],
            //             },
            //             {
            //                 orderSequence: ["asc", "desc"],
            //                 targets: [3],
            //             },
            //         ],
            //     });
            // });
        },
    });
};
