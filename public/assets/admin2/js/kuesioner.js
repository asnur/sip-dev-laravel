function auto_grow_textarea(element) {
    element.style.height = "5px";
    element.style.height = element.scrollHeight + "px";
}

function auto_grow_options(element) {
    element.style.height = "28px";
    element.style.height = element.scrollHeight + "px";
}

// Select With Icon
function formatState(icon) {
    return $(
        '<span><i class="fas ' +
            $(icon.element).data("icon") +
            '"></i>&nbsp;&nbsp;&nbsp;' +
            icon.text +
            "</span>"
    );
}

$(document).ready(function () {
    function selected_dua() {
        $(".opsipertanyaan1").select2({
            theme: "bootstrap4",
            minimumResultsForSearch: -1,
            templateResult: formatState,
            templateSelection: formatState,
        });
    }
    selected_dua();
});

// Start fungsi untuk set warna aktif dinamis
$("document").ready(function () {
    $("body").on("focus", "textarea", function () {
        $(".cardForm").removeClass("active");
        $(this).parent().parent().parent().parent().parent().addClass("active");
    });

    $("body").on("focus", ".remove_textarea_option", function () {
        $(".remove_textarea_option").removeClass("set_active_border");
        $(".cardForm").removeClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .addClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".remove_border_textarea_pertanyaan")
            .addClass("bg_textarea_judul");
        // console.log(tes);
    });

    $("body").on("focus", ".color_active", function () {
        $(".cardForm").removeClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .addClass("active");
    });

    $("body").on("focus", ".remove_textarea_option_teks", function () {
        $(".cardForm").removeClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .addClass("active");
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".remove_border_textarea_pertanyaan")
            .addClass("bg_textarea_judul");

        // console.log(tes);
    });

    // set aktif 2

    $("body").on("focus", ".remove_textarea_option", function () {
        $(this).addClass("set_active_border");
    });

    $("body").on("focusout", ".remove_textarea_option", function () {
        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".remove_border_textarea_pertanyaan")
            .removeClass("bg_textarea_judul");
        // console.log(tes);
    });

    $("textarea").focusout(function () {
        $(".cardForm").removeClass("active");
        $(".remove_textarea_option").removeClass("set_active_border");

        $(this)
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .parent()
            .find(".remove_border_textarea_pertanyaan")
            .removeClass("bg_textarea_judul");
    });
});

// Save jawaban change
function saveJawaban(data) {
    radio = data.parent().parent().find(".pilihan-ganda");
    mulcen = data.parent().parent().find(".hasil_mulcen");

    findRadio = radio.find("input");
    findMulcen = mulcen.find("input");

    if (data.val() == "checkbox") {
        radio.html("");
        mulcen.html("");
        findRadio.each(function () {
            label = $(this).val();
            mulcen.append(
                '<div class="form-check hapusOption"><div class="row"><div class="col-md-11"><input class="form-check-input jawaban auto_input_textarea" type="checkbox" name="add_input_dinamis[]" value="' +
                    label +
                    '" /><textarea class="remove_textarea_option color_active" oninput="Teks($(this)); auto_grow_options(this)">' +
                    label +
                    '</textarea></div><div class="col-md-1" style="position: absolute; margin: 8px 10px 10px 45rem";><a href="javascript:void(0)" id="RemoveButton"><i style="color: black" class="material-icons">clear</i></a></div></div></div>'
            );
        });
    } else {
        radio.html("");
        mulcen.html("");
        findMulcen.each(function () {
            label = $(this).val();
            radio.append(
                '<div class="form-check hapusOption jawa"><div class="row"><div class="col-md-11"><input class="form-check-input jawaban opsi_jawaban jawaban auto_input_textarea" type="radio" name="add_input_dinamis[]" value="' +
                    label +
                    '" /><textarea oninput="Teks($(this)); auto_grow_options(this)" placeholder="Opsi Jawaban" class="remove_textarea_option auto_input color_active">' +
                    label +
                    '</textarea></div><div class="col-md-1" style="position: absolute; margin: 8px 10px 10px 45rem";><a href="javascript:void(0)" id="RemoveButton"><i style="color: black" class="material-icons">clear</i></a></div></div></div>'
            );
        });
    }
}

//Start Fungsi untuk menambahkan pilihan ganda
var counter = 0;

function buatRadio(elem, label, checked) {
    var id = label;

    $(".hasil_addbtn1").append(
        '<div class="form-check hapusOption jawa"><div class="row"><div class="col-md-11"><input class="form-check-input opsi_jawaban jawaban auto_input_textarea" type="radio" name="add_input_dinamis[]" value="' +
            label +
            '" /><textarea oninput="Teks($(this)); auto_grow_options(this)" placeholder="Opsi Jawaban" class="remove_textarea_option auto_input color_active">' +
            label +
            '</textarea></div><div class="col-md-1" style="position: absolute; margin: 8px 10px 10px 45rem";><a href="javascript:void(0)" id="RemoveButton"><i style="color: black" class="material-icons">clear</i></a></div></div></div>'
    );
}

// Kirim value ke input
function Teks(tes) {
    var value = tes.val();
    dpt = tes.parent().find(".auto_input_textarea");
    $(dpt).val(tes.val());

    // console.log(value);
}

// Tambah Jawaban Dinamis
$("body").on("click", ".AddButton", function () {
    buatRadio($(this), $("#option").val());
    $("#option").val("");
});

// Tambah Jawaban Dinamis2
$("body").on("click", ".AddButton2", function (e) {
    label =
        this.parentNode.parentNode.parentNode.getElementsByClassName(
            "txtBox"
        )[0].value;
    button =
        this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName(
            "hasil_addbtn2"
        )[0];
    // console.log(button)

    counter = 2;

    button.insertAdjacentHTML(
        "beforeend",
        '<div class="form-check hapusOption"><div class="row"><div class="col-md-11"><input class="form-check-input opsi_jawaban jawaban auto_input_textarea" type="radio" name="add_input_dinamis[]" value="' +
            label +
            '" /><textarea oninput="Teks($(this)); auto_grow_options(this)" placeholder="Opsi Jawaban" class="remove_textarea_option">' +
            label +
            '</textarea></div><div class="col-md-1" style="position: absolute; margin: 8px 10px 10px 45rem";><a href="javascript:void(0)" id="RemoveButton"><i style="color: black" class="material-icons">clear</i></a></div></div></div>'
    );

    this.parentNode.parentNode.parentNode.getElementsByClassName(
        "txtBox"
    )[0].value = "";
});

// Fungsi untuk menambahkan multi centang
$("body").on("click", ".MultiCentang", function (e) {
    label =
        this.parentNode.parentNode.parentNode.getElementsByClassName(
            "txtBox2"
        )[0].value;
    button =
        this.parentNode.parentNode.parentNode.parentNode.parentNode.getElementsByClassName(
            "hasil_mulcen"
        )[0];
    // console.log(button)

    btn2 = button.insertAdjacentHTML(
        "beforeend",
        ' <div class="form-check hapusOption"><div class="row"><div class="col-md-11"><input class="form-check-input jawaban auto_input_textarea" type="checkbox" name="add_input_dinamis[]" value="' +
            label +
            '" /><textarea class="remove_textarea_option color_active" oninput="Teks($(this)); auto_grow_options(this)">' +
            label +
            '</textarea></div><div class="col-md-1" style="position: absolute; margin: 8px 10px 10px 45rem";><a href="javascript:void(0)" id="RemoveButton"><i style="color: black" class="material-icons">clear</i></a></div></div></div>'
    );

    this.parentNode.parentNode.parentNode.getElementsByClassName(
        "txtBox2"
    )[0].value = "";
});

// Start fungsi untuk mengatur pertanyaan di Teks
function teksPendek(Teks) {
    getKarakter = Teks.parentNode.getElementsByClassName(
        "remove_textarea_option_teks"
    )[0].value;

    panjangKarakter = getKarakter.length;

    const collection =
        Teks.parentNode.getElementsByClassName("hitungawal_text");

    collection[0].innerHTML = "<span>" + panjangKarakter + "</span>";
}

// Start Upload Gambar
$("body").on("click", ".upload_gambar", function (e) {});

var imgArray = [];

function ImgUpload(r) {
    var imgWrap = "";

    imgWrap = r.closest(".upload_box").find(".upload_img_wrap");
    var maxLength = r.attr("data_max_length");

    var files = r.prop("files");
    var filesArr = Array.prototype.slice.call(files);
    var iterator = 0;
    filesArr.forEach(function (f, index) {
        if (!f.type.match("image.*")) {
            return;
        }

        if (imgArray.length > maxLength) {
            return false;
        } else {
            var len = 0;
            for (var i = 0; i < imgArray.length; i++) {
                if (imgArray[i] !== undefined) {
                    len++;
                }
            }
            if (len > maxLength) {
                return false;
            } else {
                imgArray.push(f);

                var reader = new FileReader();
                reader.onload = function (e) {
                    var html =
                        "<div class='upload_img_box shadow'><div style='background-image: url(" +
                        e.target.result +
                        ")' data-number='" +
                        $(".upload_img_close").length +
                        "' data-file='" +
                        f.name +
                        "' class='img_bg'><div class='upload_img_close'></div></div></div>";
                    imgWrap.append(html);
                    iterator++;
                };
                reader.readAsDataURL(f);
            }
        }
    });
}

// Delete Upload Gambar
$("body").on("click", ".upload_img_close", function (e) {
    var file = $(this).parent().data("file");
    for (var i = 0; i < imgArray.length; i++) {
        if (imgArray[i].name === file) {
            imgArray.splice(i, 1);
            break;
        }
    }
    $(this).parent().parent().remove();
});

// Start fungsi untuk menghapus pada pilihan ganda dan multi centang
$("body").on("click", "#RemoveButton", function (e) {
    $(this).closest(".hapusOption").remove();
});

// Start Kuesioner Dinamis
$(document).ready(function () {
    //group add limit
    var maxGroup = 50;

    $("body").on("click", ".addKuesioner", function (e) {
        if ($("body").find(".AddGroup").length < maxGroup) {
            counter += 2;
            $(".color_left_kedua").append(
                '<div style="width: 8px;" class="item' + counter + '"></div>'
            );

            var fieldHTML =
                '<div class="AddGroup color_left" data-container="item' +
                counter +
                '">' +
                $(".GroupCopy").html() +
                "</div>";

            $("body").find(".AddGroup:last").after(fieldHTML);
            $("body")
                .find(".AddGroup:last")
                .find(".opsipertanyaan2")
                .addClass("selectcustom" + counter);

            $(".selectcustom" + counter).select2({
                theme: "bootstrap4",
                minimumResultsForSearch: -1,
                templateResult: formatState,
                templateSelection: formatState,
            });

            tes = $(".scroll_btn");
            tes.removeClass("start_btn");
            if (!tes.hasClass("next_btn")) {
                tes.addClass("next_btn");
            }

            // ImgUpload();
        } else {
            alert("Maksimal " + maxGroup + " Kuesioner.");
        }
    });

    //remove group
    $("body").on("click", ".remove", function () {
        $(this).parents(".sebaris_hapus").remove();
        // console.log(this);

        element = $(".sebaris_hapus");
        tes = $(".scroll_btn");

        console.log(element.length);
        // console.log(tes);

        if (element.length < 2) {
            tes.addClass("start_btn");
            tes.removeClass("next_btn");
            // console.log("kurang");
        } else {
            console.log("lebih");
        }
    });
});
// End Kuesioner Dinamis

//Get All Values
const getAllValues = () => {
    let title = $("textarea[name='judul']").val();
    let desc = $("textarea[name='deskripsi']").val();
    let values = {
        title: title,
        description: desc,
        date: date_now,
        creator: creator,
        questions: [],
    };
    let group = $(".AddGroup").length;
    let group_data = [];
    for (let i = 0; i < group; i++) {
        let el_value;
        let option_type = $(`.AddGroup:eq(${i})`)
            .find('select[name="opsipertanyaan"]')
            .val();
        let question = $(`.AddGroup:eq(${i})`)
            .find(".remove_border_textarea_pertanyaan")
            .val();
        values.questions.push({
            question: question,
            type: option_type,
            option: [],
        });
        if (option_type == "textarea") {
            el_value = $(`.AddGroup:eq(${i})`).find(".jawaban").length - 1;
        } else {
            el_value = $(`.AddGroup:eq(${i})`).find(".jawaban").length - 2;
        }
        console.log(el_value);
        for (let j = 0; j < el_value; j++) {
            let value = $(`.AddGroup:eq(${i})`).find(`.jawaban:eq(${j})`).val();
            values.questions[i].option.push({ option: value });
        }
    }

    sendData(values);
};

const sendData = (data) => {
    $(".spinner-border").show();
    $("#btn_submit").hide();
    $.ajax({
        url: "http://localhost:9000/quiz",
        type: "POST",
        data: JSON.stringify(data),
        dataType: "json",
        async: false,
        contentType: "application/json; charset=utf-8",
        success: function (response) {
            $("#btn_submit").show();
            $("#cardGenerateLink").show();
            $(".spinner-border").hide();
            $("#generateLink").val(
                `https://jakpintas.dpmptsp-dki.com/kuesioner/${response}`
            );
        },
    });
};
