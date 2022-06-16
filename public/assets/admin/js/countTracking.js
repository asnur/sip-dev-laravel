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
                    order: [[2, "desc"]],
                    columnDefs: [
                        { orderSequence: ["asc", "desc"], targets: [0] },
                        { orderSequence: ["asc", "desc"], targets: [1] },
                        { orderSequence: ["asc", "desc"], targets: [2] },
                        { orderSequence: ["asc", "desc"], targets: [3] },
                    ],
                });
            });

            $(document).ready(function () {
                // $("#table-surveyer2").DataTable({
                //     ordering: true,
                //     language: {
                //         search: "Pencarian:",
                //     },
                //     // scrollY: "300px",
                //     // scrollX: true,
                //     // scrollCollapse: true,
                //     // paging: false,
                //     // fixedColumns: true,
                //     order: [
                //         [0, "asc"],
                //         [1, "desc"],
                //     ],
                //     columnDefs: [
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [0],
                //             className: "text-left",
                //         },
                //         { orderSequence: ["asc", "desc"], targets: [1] },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [2],
                //             className: "text-center",
                //         },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [3],
                //             className: "text-center",
                //         },
                //         { width: "25%", targets: 0 },
                //         { width: "25%", targets: 1 },
                //         { width: "25%", targets: 2 },
                //         { width: "25%", targets: 3 },
                //     ],
                // });
            });

            $(document).ready(function () {
                // $("#table-surveyer3").DataTable({
                //     // retrieve: true,
                //     language: {
                //         search: "Pencarian:",
                //     },
                //     ordering: false,
                //     sScrollX: "200%",
                //     sScrollXInner: "200%",
                //     responsive: false,
                //     order: [[0, "desc"]],
                //     columnDefs: [
                //         { orderSequence: ["asc", "desc"], targets: [0] },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [1],
                //             className: "text-center",
                //         },
                //         { orderSequence: ["asc", "desc"], targets: [2] },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [3],
                //             className: "text-center",
                //         },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [4],
                //             className: "text-center",
                //         },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [5],
                //             className: "text-center",
                //         },
                //         { orderSequence: ["asc", "desc"], targets: [6] },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [7],
                //             className: "text-center",
                //         },
                //         { orderSequence: ["asc", "desc"], targets: [8] },
                //         {
                //             orderSequence: ["asc", "desc"],
                //             targets: [9],
                //             className: "text-center",
                //         },
                //         { width: "5%", targets: 0 },
                //         { width: "5%", targets: 1 },
                //         { width: "7%", targets: 2 },
                //         { width: "7%", targets: 3 },
                //         { width: "5%", targets: 4 },
                //         { width: "6%", targets: 5 },
                //         { width: "5%", targets: 7 },
                //         { width: "5%", targets: 9 },
                //     ],
                // });
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
