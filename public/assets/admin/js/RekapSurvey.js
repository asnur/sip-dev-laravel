function dataTebaruPerkembangan() {
    $(".atur_margin_gambar_utama").removeClass("atur_margin_gambar_utama2");

    $.ajax({
        url: `/admin/fetch-perkembangan`,
        method: "GET",
        dataType: "json",

        beforeSend: function () {
            $("#name_perkembangan").html(
                '<div class="skeleton-heading"></div>'
            );

            $("#penempatan_perkembangan").html(
                '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
            );

            $("#kordinat").html('<div class="skeleton-heading"></div>');
            $("#name").html('<div class="skeleton-heading"></div>');
            $("#namesurvey").html('<div class="skeleton-heading"></div>');
            $("#id_sub_blok").html('<div class="skeleton-heading"></div>');
            $("#kelurahan").html('<div class="skeleton-heading"></div>');
            $("#kecamatan").html('<div class="skeleton-heading"></div>');
            $("#regional").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_regional").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#neighborhood").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_neighborhood").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#transect_zone").html('<div class="skeleton-heading"></div>');
            $("#deskripsi_transect_zone").html(
                '<div class="skeleton-heading"></div>'
            );
            $("#gambar_utama_perkembangan").html(
                ' <div style="width: 28.8rem !important;height: 300px; object-fit: cover;" class="skeleton-image"></div>'
            );
            $("#photo_ajib_perkembangan").html(
                '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
            );
        },

        success: function (e) {
            // console.log(e.perkembangan);

            let data = e.perkembangan[0];

            // $.each(e.perkembangan, function (key, data) {
            // console.log(e.perkembangan[0]);

            $("#name_perkembangan").html(data.user.name);
            $("#namesurvey").html(data.name);

            let text3 = String(data.kecamatan);
            let result3 = kapital(text3);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#penempatan_perkembangan").html(
                "<div'>AJIB " + result3 + "</div>"
            );

            $("#kordinat").html(
                `<a class="font-weight-bold" style="text-decoration:none;" href="https://www.google.com/maps/search/%09${data.kordinat}" target="_blank">${data.kordinat}</a>`
            );

            $("#id_sub_blok").html(data.id_sub_blok);

            let text = String(data.kelurahan);
            let result = kapital(text);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#kelurahan").html(result);

            let text2 = String(data.kecamatan);
            let result2 = kapital(text2);

            function kapital(str) {
                return str.replace(/\w\S*/g, function (txt) {
                    return (
                        txt.charAt(0).toUpperCase() +
                        txt.substr(1).toLowerCase()
                    );
                });
            }

            $("#kecamatan").html(result2);

            $("#regional").html(data.regional);
            $("#deskripsi_regional").html(data.deskripsi_regional);
            $("#neighborhood").html(data.neighborhood);
            $("#deskripsi_neighborhood").html(data.deskripsi_neighborhood);
            $("#transect_zone").html(data.transect_zone);
            $("#deskripsi_transect_zone").html(data.deskripsi_transect_zone);

            // console.log(data.image[0].name);

            $("#photo_ajib_perkembangan").html(
                '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                    data.user.avatar +
                    '") }}" alt="Petugas Ajib" /></span>'
            );

            // $(".gambar_utama_slider_input").html(
            //     '<img class="img_parents" style="border-radius:5px;" src="https://jakpintas.dpmptsp-dki.com/survey/' +
            //         data.name +
            //         '" /> '
            // );
            // console.log(data.image);

            array = data.image;

            var datagambar = "";
            if (array.length == 0) {
                datagambar += `<div><img class="img_parents" src="https://jakpintas.dpmptsp-dki.com/survey/not_image.png" alt="First slide"></div>`;
            } else {
                array.forEach((e) => {
                    datagambar += `<div><img class="img_parents" src="https://jakpintas.dpmptsp-dki.com/survey/${e.name}" alt="First slide"></div>`;
                });
            }
            // console.log(array);

            $(".gambar_utama_slider_input").html(datagambar);
            selectOption(".gambar_utama_slider_input");

            // });
        },
    });
}

$(document).ready(function () {
    $(".img_child_id_perkembangan").on("click", function () {
        var id_data_terbaru = $(this).attr("data-id");

        get = $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".gambar_utama_slider_input ")
            .removeClass("atur_margin_gambar_utama");

        get = $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".gambar_utama_slider_input ")
            .addClass("atur_margin_gambar_utama2");

        $.ajax({
            url: `/admin/perkembangan-terbaru/${id_data_terbaru}`,
            type: "get",
            dataType: "json",
            beforeSend: function () {
                $("#name_perkembangan").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#namesurvey").html('<div class="skeleton-heading"></div>');

                $("#penempatan_perkembangan").html(
                    '<div style="margin-top:-0.7rem;" class="skeleton-heading"></div>'
                );

                $("#kordinat").html('<div class="skeleton-heading"></div>');
                $("#id_sub_blok").html('<div class="skeleton-heading"></div>');
                $("#kelurahan").html('<div class="skeleton-heading"></div>');
                $("#kecamatan").html('<div class="skeleton-heading"></div>');
                $("#regional").html('<div class="skeleton-heading"></div>');
                $("#deskripsi_regional").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#neighborhood").html('<div class="skeleton-heading"></div>');
                $("#deskripsi_neighborhood").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#transect_zone").html(
                    '<div class="skeleton-heading"></div>'
                );
                $("#deskripsi_transect_zone").html(
                    '<div class="skeleton-heading"></div>'
                );

                $("#gambar_utama_perkembangan").html(
                    ' <div style="width: 28.8rem !important;height: 300px; object-fit: cover;" class="skeleton-image"></div>'
                );
                $("#photo_ajib_perkembangan").html(
                    '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
                );

                // $("#gambar_utama_perkembangan2").html(
                //     ' <div class="img_parents skeleton-image"></div>'
                // );

                // $("#photo_ajib_perkembangan2").html(
                //     '<div style="width: 3rem; height:3.5rem;" class="skeleton-image">'
                // );
            },
            success: function (e) {
                // console.log(e.perkembangan);
                let data = e.perkembangan;

                // console.log(data.image.name.length == 0);

                $("#name_perkembangan").html(data.user.name);

                // $("#penempatan_perkembangan").html(
                //     "<div'>AJIB " + data.kecamatan + "</div>"
                // );

                let text3 = String(data.kecamatan);
                let result3 = kapital(text3);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#penempatan_perkembangan").html(
                    "<div'>AJIB " + result3 + "</div>"
                );

                $("#kordinat").html(
                    `<a class="font-weight-bold" href="https://www.google.com/maps/search/%09${data.kordinat}" target="_blank">${data.kordinat}</a>`
                );

                $("#id_sub_blok").html(data.id_sub_blok);
                $("#namesurvey").html(data.name);

                let text = String(data.kelurahan);
                let result = kapital(text);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#kelurahan").html(result);

                let text2 = String(data.kecamatan);
                let result2 = kapital(text2);

                function kapital(str) {
                    return str.replace(/\w\S*/g, function (txt) {
                        return (
                            txt.charAt(0).toUpperCase() +
                            txt.substr(1).toLowerCase()
                        );
                    });
                }

                $("#kecamatan").html(result2);

                $("#regional").html(data.regional);
                $("#deskripsi_regional").html(data.deskripsi_regional);
                $("#neighborhood").html(data.neighborhood);
                $("#deskripsi_neighborhood").html(data.deskripsi_neighborhood);
                $("#transect_zone").html(data.transect_zone);
                $("#deskripsi_transect_zone").html(
                    data.deskripsi_transect_zone
                );

                // console.log(data.image[0].name);
                // console.log(data.image[1].name);
                // console.log(data.image[2].name);

                array = data.image;

                var datagambar = "";
                if (array.length == 0) {
                    datagambar += `<div><img class="img_parents" style="width:490px !important;height: 300px; object-fit: cover;" src="https://jakpintas.dpmptsp-dki.com/survey/not_image.png" alt="First slide"></div>`;
                } else {
                    array.forEach((e) => {
                        datagambar += `<div><img class="img_parents" style="width:490px !important;height: 300px; object-fit: cover;" src="https://jakpintas.dpmptsp-dki.com/survey/${e.name}" alt="First slide"></div>`;
                    });
                }

                // console.log(datagambar);

                if (
                    $(
                        "div.gambar_utama_slider_input.slick-initialized.slick-slider"
                    ).length == 0
                ) {
                    $(".gambar_utama_slider_input").html("");
                    $(".gambar_utama_slider_input").html(datagambar);
                    selectOption(".gambar_utama_slider_input");
                } else {
                    $(".gambar_utama_slider_input").slick("unslick");
                    $(".gambar_utama_slider_input").html("");
                    $(".gambar_utama_slider_input").html(datagambar);
                    selectOption(".gambar_utama_slider_input");
                }

                $("#photo_ajib_perkembangan").html(
                    '<span><img style="width: 3rem; height:3.5rem; border-radius: 5px;" src="https://jakpintas.dpmptsp-dki.com/photo_ajib/' +
                        data.user.avatar +
                        '") }}" alt="Petugas Ajib" /></span>'
                );
            },
        });
    });
});
