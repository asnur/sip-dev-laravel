<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="{{ asset('assets/admin/img/favicon.ico') }}" rel="icon">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Chating Pendataan</title>
</head>

<body class="
        bg-gradient-to-r
        from-[#eeefef]
        via-[#f2f3f3]
        to-[#f7f1f1]">

    <header>
        <nav class="
            flex flex-wrap
            items-center
            justify-between
            w-full
            py-10
            md:py-0
            px-4
            text-lg text-gray-700
            bg-white">
            <div>

                <img class="h-16 sm:mx-0 inline-flex items-center" src="{{ asset('assets/gambar/logo_jakpintas2.png') }}">

                <p class="text-2xl text-[#5a6474]  inline-flex items-center font-semibold ">
                    Konsultasi Jakpintas</p>

            </div>


            <div class="w-full md:flex md:items-center md:w-auto h-12">
                {{-- LOGIN --}}
            </div>
        </nav>
    </header>



    <div class="container py-5 px-5 ">
        <div class="flex flex-row h-full">

            <div class="basis-3/12  border-red-500">


                <div class="tabs border-red-400">
                    <div class="tab-hide-show">
                        <div class="relative">

                            <input class="w-full absolute z-10 cursor-pointer opacity-0 h-5 top-0 text-lg" checked type="checkbox" id="cek">



                            <div class="flex items-center cursor-pointer select-none tab-judul" for="cek">

                                <div class="w-5 h-5 flex items-center justify-center tab-icon">
                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24" stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <polyline points="6 9 12 15 18 9">
                                        </polyline>
                                    </svg>
                                </div>

                                <span class="text-[#5a6474] text-base tracking-wide font-semibold  border-blue-500">Sektor</span>


                            </div>

                            <div class="tab-content">
                                <div class="text-grey-darkest py-3">
                                    <ul class="pl-4">
                                        <li class="pb-2">
                                            <div class=" sm:flex sm:items-center">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 1w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                                                </svg>


                                                <div class="text-base tracking-wide text-[#5a6474] font-semibold ml-2">
                                                    Kelautan Dan Perikanan
                                                </div>
                                            </div>

                                        </li>

                                        <li class="pb-2">
                                            <div class=" sm:flex sm:items-center">

                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 1w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                                                </svg>


                                                <div class="text-base tracking-wide text-[#5a6474] font-semibold ml-2">
                                                    Pertanian
                                                </div>
                                            </div>

                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="basis-6/12  px-2 border-red-500 ">

                <div class="rounded-lg h-full " style="background-image: url('{{ asset('assets/bg4.png') }}');">

                    <div class="flex flex-col border-blue-400 ">

                        <div class="flex-grow h-full flex flex-col pt-2">

                            <div class="w-full flex-grow ">

                                <div class="overflow-y-scroll h-5/6">

                                    <div class="w-9/12 px-3 py-2">

                                        <div class="flex items-start  border-red-500">

                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="{{ asset('assets/person.jpg') }}" alt="">

                                            <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">

                                                <div class="text-sm font-medium ">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-gray-400 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum, ratione exercitationem autem ut earum quasi soluta et deserunt quam quidem mollitia a quae esse adipisci id illum labore iste!</div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="flex justify-end pt-7 ">

                                        <div class="flex items-start w-9/12  border-red-500 px-4">

                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="{{ asset('assets/person.jpg') }}" alt="">

                                            <div class="px-3 py-1 bg-green-500  rounded-lg shadow-lg">

                                                <div class="text-sm font-medium text-white">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-zinc-7 00 mt-1 mb-1 py-1 bg-green-400 rounded-md border-l-4 border-green-700 px-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum, ratione exercitationem autem ut earum quasi soluta et deserunt quam quidem mollitia a quae esse adipisci id illum labore iste!</div>






                                            </div>

                                        </div>
                                    </div>

                                    <div class="flex justify-end pt-7 ">

                                        <div class="flex items-start w-9/12  border-red-500 px-4">

                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="{{ asset('assets/person.jpg') }}" alt="">

                                            <div class="px-3 py-2 bg-green-500  rounded-lg shadow-lg">

                                                <div class="text-sm font-medium text-white">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-zinc-7 py-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum, ratione exercitationem autem ut earum quasi soluta et deserunt quam quidem mollitia a quae esse adipisci id illum labore iste!</div>


                                            </div>

                                        </div>
                                    </div>

                                    <div class="w-9/12  px-3 pt-7  border-red-500">


                                        <div class="flex items-start ">
                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="{{ asset('assets/person.jpg') }}" alt="">
                                            <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                                <div class="text-sm font-medium ">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-gray-400 py-2">
                                                    <div class="w-52 h-16 bg-blue-100 rounded py-1">

                                                        <div class="flex flex-row">
                                                            <div class="">
                                                                <img class="w-14 h-14" src="{{ asset('assets/document.png') }}" />
                                                            </div>


                                                            <div class="flex flex-col px-1">
                                                                <div class="w-14 font-medium text-sm">Laporan.doc</div>

                                                                <div class="sm:flex text-xs font-normal">09:29 WIB - 20 MB</div>


                                                            </div>

                                                            <div class="py-2"><img class="w-10 h-10" src="{{ asset('assets/cloud_download.png') }}" alt=""></div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-9/12  px-3 pt-7  border-red-500">


                                        <div class="flex items-start ">
                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="{{ asset('assets/person.jpg') }}" alt="">
                                            <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                                <div class="text-sm font-medium ">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-gray-400 py-2">
                                                    <img class="object-cover h-48 w-96" src="{{ asset('assets/bg.jpeg') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>

                            <div class="w-full py-3 flex bg-white">

                                <input type="file" id="upload_file" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">


                                <a href="" id="link_upload">
                                    <img class="px-4" src="{{ asset('assets/icon_tambah.svg') }}" alt="">
                                </a>


                                <input type="text" placeholder="ketikan pesan disini" class="flex-grow focus:outline-none">

                            </div>



                        </div>

                    </div>



                </div>






            </div>

            <div class="basis-3/12  px-2 border-red-500 ">
                <div class="bg-white rounded-lg h-full">

                    <div class="flex flex-col border-red-400">

                        {{-- pencarian teks --}}

                        <div class="flex flex-col  pt-4 px-4">
                            <div class=" sm:flex sm:items-center mb-2">
                                <input class="border-2 w-full rounded-md border-gray-300 bg-white h-10 px-5 text-sm focus:outline-none" type="search" name="search" placeholder="Search">
                                <div class="cursor-pointer" id="btn_hideshow_dokumen">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                    </svg>
                                </div>
                            </div>
                        </div>

                        {{-- riwayat pencarian teks --}}
                        <div class="py-5 px-5 ">

                            <div class=" sm:flex sm:items-center mb-2">

                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 1w-4 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z" clip-rule="evenodd" />
                                </svg>


                                <div class="text-base tracking-wide text-[#5a6474] font-semibold ml-2">
                                    Kelautan Dan Perikanan
                                </div>
                            </div>

                            <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg " role="alert">
                                <div class="flex flex-row">

                                    <div class="flex items-start w-12/12 text-gray-700 bg-gray-100  rounded-lg">

                                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/gambar/people.png') }}" alt="">
                                        <div class="px-4">
                                            <div class="text-sm">
                                                Fahmi <span class="px-1 text-xs">Rabu, 27 Juli 2020</span>
                                            </div>

                                            <div class="text-xs text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum, ratione exercitationem autem ut earum quasi soluta et deserunt quam quidem mollitia a quae esse adipisci id illum labore iste!</div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="py-5">
                                <div class="p-4 text-sm text-gray-700 bg-gray-100 rounded-lg " role="alert">
                                    <div class="flex flex-row">

                                        <div class="flex items-start w-12/12 text-gray-700 bg-gray-100  rounded-lg">

                                            <img class="w-8 h-8 rounded-full" src="{{ asset('assets/gambar/people.png') }}" alt="">
                                            <div class="px-4">
                                                <div class="text-sm">
                                                    Asnur <span class="px-1 text-xs">Rabu, 27 Juli 2020</span>
                                                </div>

                                                <div class="text-xs text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus harum, ratione exercitationem autem ut earum quasi soluta et deserunt quam quidem mollitia a quae esse adipisci id illum labore iste!</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </div>

                    </div>


                    <div class="overflow-y-auto py-4 px-3 bg-blue-100 rounded hidden" id="konten_hideshow_dokumen">
                        <ul class="space-y-2">
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-black hover:bg-red-100 dark:hover:bg-blue-400">

                                    <img class="w-6 h-6" src="{{ asset('assets/icon-referensi-pdf.png') }}" alt="">

                                    <span class="ml-3">Pendaftaran.pdf</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-black hover:bg-red-100 dark:hover:bg-blue-400">
                                    <img class="w-6 h-6" src="{{ asset('assets/icon-referensi-doc.png') }}" alt="">
                                    <span class="ml-3">Pendaftaran.doc</span>

                                </a>
                            </li>

                        </ul>
                    </div>




                </div>
            </div>


        </div>
    </div>

    {{-- <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script> --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



    <script>
        $(function() {
            $("#link_upload").on('click', function(e) {
                e.preventDefault();
                $("#upload_file:hidden").trigger('click');

            });
        });

        $("#btn_hideshow_dokumen").click(function() {
            $("#konten_hideshow_dokumen").toggle();
        });

    </script>


</body>
</html>
