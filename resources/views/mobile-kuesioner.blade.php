<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="/css/app.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.7/dist/flowbite.min.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" />

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    spacing: {
                        13: "3.25rem"
                    , }
                    , fontFamily: {
                        family: ["Family"]
                    , }
                , }
            , }
        , };

    </script>

    <title>Tailwind</title>

    <style type="text/tailwindcss">
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans&display=swap");

      body {
        font-family: "Open Sans", sans-serif;
      }

      .judul_text_pertama {
        font-size: 19px;
      }

      .judul_text {
        font-size: 16px;
      }

      .text_kata {
        font-size: 14px;
      }

      .sejajar_radio_check {
        margin-top: 0.2rem;
      }

      .border_judul_utama {
      border-top: #2563Eb 8.5px solid;
      }

      .img_upload{
        width: 85% !important;
      }

    </style>
</head>
<body>

    <div class="flex flex-col mx-2">



        {{-- Judul --}}
        <div class="mt-8">
            <div class="container px-4 mx-auto">

                <div class="border_judul_utama border rounded-lg shadow-lg px-4 pt-2 pb-3">

                    {{-- <label for="message" class="mt-2 mb-4 block text-sm font-medium text-gray-900 judul_text text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Provident, quod esse. Eaque reiciendis quos iure vitae eligendi
                        exercitationem consequatur! Iste non voluptatem nostrum ab
                        incidunt ullam temporibus cupiditate in voluptate!</label> --}}

                    <h5 class="mt-2 mb-2 block text-sm font-bold text-gray-900 judul_text_pertama text-justify">Contoh Kuesioner</h5>



                    <p class="leading-relaxed mb-1 text-gray-700 text_kata text-justify">Mengisi secara sadar.</p>




                    {{-- <div class="mt-2">
                        <div>
                            <label class="inline-flex">
                                <input type="radio" class="form-radio mt-0.5" name="radio" value="1" />

                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit.

                                    Similique ipsam aliquid assumenda inventore deleniti
                                    voluptatum voluptatem accusantium?</span>
                            </label>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>


        {{-- Pilihan Ganda --}}
        <div class="mt-8">
            <div class="container px-4 mx-auto">
                <div class="border rounded-lg shadow-lg px-4 pt-2 pb-3">
                    <label for="message" class="mt-2 mb-4 block text-sm font-medium text-gray-900 judul_text text-justify">Apakah cara dosen mengajar dapat meningkatkan minat belajar mahasiswa?</label>
                    <div class="mt-2">
                        <div>
                            <label class="inline-flex">
                                <input type="radio" class="form-radio mt-0.5" name="radio" value="1" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Tidak meningkatkan</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="radio" class="form-radio mt-0.5" name="radio" value="2" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Kurang meningkatkan</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="radio" class="form-radio mt-0.5" name="radio" value="2" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Cukup meningkatkan</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="radio" class="form-radio mt-0.5" name="radio" value="3" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Sangat meningkatkan</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Multicentang --}}
        <div class="mt-8">
            <div class="container px-4 mx-auto">
                <div class="border rounded-lg shadow-lg px-4 pt-2 pb-3">
                    <label for="message" class="mt-2 mb-4 block text-sm font-medium text-gray-900 judul_text text-justify">Apakah dosen menguasai materi yang diajarkan pada saat kuliah berlangsung?</label>


                    <div class="mt-2">
                        <div>
                            <label class="inline-flex">
                                <input type="checkbox" class="form-radio mt-0.5" name="radio" value="1" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Tidak menguasai</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="checkbox" class="form-radio mt-0.5" name="radio" value="2" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Kurang menguasai</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="checkbox" class="form-radio mt-0.5" name="radio" value="2" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Cukup menguasai</span>
                            </label>
                        </div>
                        <div>
                            <label class="inline-flex">
                                <input type="checkbox" class="form-radio mt-0.5" name="radio" value="3" />
                                <span class="ml-2 mb-2 text-gray-700 text_kata text-justify">Sangat menguasai</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Upload gambar --}}
        <div class="mt-8">
            <div class="container px-4 mx-auto">
                <div class="border rounded-lg shadow-lg px-4 pt-2 pb-3">
                    <label for="message" class="mt-2 mb-4 block text-sm font-medium text-gray-900 judul_text text-justify">Foto</label>
                    <div class="my-3">
                        {{-- <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="True">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div> --}}

                        {{-- <input type="file" multiple id="gallery-photo-add"> --}}
                        {{-- <div class="flex justify-center items-center w-full">
                            <div class="gallery"></div>
                        </div> --}}

                        <span id="selected-images"></span>


                        <div class="flex justify-center items-center w-full">
                            <label class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-lg border-2 border-gray-300 border-dashed cursor-pointer ">
                                <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                    <svg class="mb-3 w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">PNG atau JPG </p>
                                </div>
                                {{-- <input type="file" class="hidden" multiple id="gallery-photo-add" /> --}}

                                <input type="file" class="image-file hidden" multiple="" required="" accept="image/png, image/jpeg">



                            </label>
                        </div>

                        {{-- <div class="gallery"></div> --}}



                        {{-- <div class="flex">
                            <div class="flex-none w-1/6">
                                <button class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md">
                                    <a href="#">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </button>
                            </div>
                            <div class="shrink ml-7 w-4/6">
                                <div class=" gallery"></div>
                            </div>
                        </div> --}}


                    </div>
                </div>
            </div>
        </div>

        {{-- Teks --}}
        <div class="my-8">
            <div class="container px-4 mx-auto">
                <div class="border rounded-lg shadow-lg px-4 pt-2 pb-5">
                    <label for="message" class="mt-2 mb-4 block text-sm font-medium text-gray-900 judul_text text-justify">Riwayat Penyakit</label>
                    <div class="my-2">
                        <textarea id="message" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Leave a comment..."></textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- button --}}
        {{-- <div class="container mx-auto">

        </div> --}}

        <div class="mb-3">
            <div class="container px-4 mx-auto">
                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Simpan</button>
            </div>
        </div>

        <div class="mb-3">
            <div class="container px-4 mx-auto">
                <p class="mb-1 text-slate-500 text_kata text-center">Jangan pernah mengirimkan data pribadi melalui form ini.</p>



            </div>
        </div>

    </div>





    <div class="container">
        <div class="row">
            <div class="col-sm-2"></div>
            <form action="#" method="post" enctype="multipart/form-data">

                <div class="col-sm-8">

                    <div class="row" style="margin-top: 30px;">
                        <div class="col-sm-10">
                            <label class="select-image">
                                {{-- <input type="file" class="image-file" multiple="" required="" accept="image/png, image/jpeg"> --}}
                            </label>
                        </div>

                    </div>
                    <div class="row" style="margin-top: 20px;">
                        {{-- <span id="selected-images"></span> --}}
                    </div>

                </div>


            </form>

            <div class="col-sm-2"></div>
        </div>
    </div>




    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(document).ready(function() {

            if (window.File && window.FileList && window.FileReader) {
                $(".image-file").on("change", function(e) {
                    var file = e.target.files
                        , imagefiles = $(".image-file")[0].files;
                    var i = 0;
                    $.each(imagefiles, function(index, value) {
                        var f = file[i];
                        var fileReader = new FileReader();
                        fileReader.onload = (function(e) {


                            $('<div class="pip col-sm-3 col-4 boxDiv" align="center" style="margin-bottom: 20px;">' +
                                '<img style="width: 100%; height: 100%;" src="' + e.target.result + '" class="prescriptions">' +
                                // '<p class="cross-image remove">Remove</p>' +
                                '<button type="button" class="remove mt-1 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Hapus</button>' +
                                '<input type="hidden" name="image[]" value="' + e.target.result + '">' +
                                '<input type="hidden" name="imageName[]" value="' + value.name + '">' +
                                '</div>').insertAfter("#selected-images");
                            $(".remove").click(function() {
                                $(this).parent(".pip").remove();
                            });
                        });
                        fileReader.readAsDataURL(f);
                        i++;
                    });
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });

    </script>


    <script>
        $(function() {
            // Multiple images preview in browser
            var imagesPreview = function(input, placeToInsertImagePreview) {

                if (input.files) {
                    var filesAmount = input.files.length;

                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img class="mb-4 drop-shadow-lg">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);

                        }

                        reader.readAsDataURL(input.files[i]);
                    }
                }

            };

            $('#gallery-photo-add').on('change', function() {
                imagesPreview(this, 'div.gallery');
            });
        });

    </script>



</body>
</html>