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

<body class="bg-gradient-to-r from-[#eeefef] via-[#f2f3f3] to-[#f7f1f1] overflow-hidden">

    <header>

        <nav
            class="flex flex-wrap items-center justify-between w-full py-10 md:py-0 px-4 text-lg text-gray-700 bg-white">

            <div class="flex flex-col items-center bg-red-10 md:flex-row md:max-w-xl ">
                <img class="object-cover md:h-auto md:w-2/12" src="{{ asset('assets/gambar/logo_jakpintas2.png') }}"
                    alt="">
                <div class="flex flex-col justify-between p-4 leading-normal">
                    <h5 class="text-lg text-[#5a6474] font-semibold">Konsultasi Usaha</h5>

                </div>
            </div>

            <div class="w-full md:flex md:items-center md:w-auto h-12">
                {{-- LOGIN --}}
            </div>
        </nav>
    </header>

    @php
    $sektor = ["Pusat Satpel 1", "Pusat Satpel 2", "Utara Satpel 1", "Utara Satpel 2", "Selatan Satpel 1", "Selatan Satpel 2", "Barat Satpel 1", "Barat Satpel 2", "Timur Satpel 1", "Timur Satpel 2", "Kab Pulau Seribu", "Dinas Bidang 1", "Dinas Bidang 2", "Bidang Pengembangan", "Bidang Penyuluhan dan Pengaduan", "JakEvo", "JakPintas", "LKPM"]
    @endphp

    <div>
        <div class="flex flex-row px-5 py-5 h-[91.7vh] ">

            <div class=" basis-3/12 h-[88vh] scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-400
            overflow-y-scroll">

                <div class="tabs ">
                    <div class="tab-hide-show">
                        <div class="relative">

                            <input class="w-full opacity-0 absolute z-10 cursor-pointer h-5 top-0 text-lg" checked
                                type="checkbox" id="cek">



                            <div class="flex items-center cursor-pointer select-none tab-judul" for="cek">

                                <div class="w-5 h-5 flex items-center justify-center tab-icon">

                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                        stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>

                                </div>

                                <span class="text-[#5a6474] text-base tracking-wide font-semibold  ml-1">PENTING</span>


                            </div>

                            <div class="tab-content">
                                <div class="text-grey-darkest py-3">
                                    <ul class="pl-3">

                                        <li class="">
                                            <div class="flex items-start cursor-pointer hover:bg-gray-300 rounded-md px-2"
                                                onclick="select_sector('Selamat Datang')">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 1w-4 text-gray-400 mt-1" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                                        clip-rule="evenodd" />
                                                </svg>


                                                <div class="text-base tracking-wide text-gray-500 py-1 ml-2 w-11/12">
                                                    Selamat Datang
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tabs ">
                    <div class="tab-hide-show">
                        <div class="relative">

                            <input class="w-full opacity-0 absolute z-10 cursor-pointer h-5 top-0 text-lg" checked
                                type="checkbox" id="cek">



                            <div class="flex items-center cursor-pointer select-none tab-judul" for="cek">

                                <div class="w-5 h-5 flex items-center justify-center tab-icon">

                                    <svg aria-hidden="true" class="" data-reactid="266" fill="none" height="24"
                                        stroke="#606F7B" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        viewbox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                    </svg>

                                </div>

                                <span class="text-[#5a6474] text-base tracking-wide font-semibold  ml-1">SEKTOR</span>

                            </div>

                            <div class="tab-content">
                                <div class="text-grey-darkest py-3">
                                    <ul class="pl-3">
                                        @foreach($sektor as $s)
                                        <li class="">
                                            <div class="flex items-start cursor-pointer py-1 hover:bg-gray-300 rounded-md px-2"
                                                onclick="select_sector('{{ $s }}')">

                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4 1w-4 text-gray-400 mt-1" viewBox="0 0 20 20"
                                                    fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                                        clip-rule="evenodd" />
                                                </svg>


                                                <div
                                                    class="text-base tracking-wide text-gray-500 py-1 -mt-1 ml-2 w-11/12">
                                                    {{ $s }}
                                                </div>
                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="basis-6/12   px-2 ">
                <div class="rounded-lg " style="background-image: url('{{ asset('assets/bg4.png') }}');">

                    <div class="flex flex-col h-[88vh]">

                        <div class=" flex-grow h-full flex flex-col">

                            {{-- Judul Chat --}}
                            <div class="w-full bg-white px-4 py-3">

                                <div class="flex items-center">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 1w-4 text-gray-500"
                                        viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                            clip-rule="evenodd"></path>
                                    </svg>


                                    <div class="text-base tracking-wide text-[#5a6474] font-semibold ml-2"
                                        id="room-sector">
                                        Selamat Datang
                                    </div>
                                </div>

                            </div>

                            {{-- Mengatur konten chat --}}
                            <div class="w-full flex-col py-3 " id="auto-scroll-bottom">

                                <div id="list-message"
                                    class=" h-[70vh] scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-400 overflow-y-scroll">
                                    {{-- tanggal per hari --}}

                                    {{-- penerima --}}
                                    {{-- penerima replay --}}
                                    {{-- <div class="w-9/12 py-3 px-4">

                                        <div class="flex items-start  ">

                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                                src="{{ asset('assets/person.jpg') }}" alt="">


                                            <div class="px-1.5 py-1.5 bg-gray-100  rounded-lg shadow-lg ">
                                                <div
                                                    class="flex flex-col text-xs text-zinc-500 py-1 px-2 bg-[#e8efec] rounded-md border-l-4 border-[#5b47da] ">

                                                    <div class="text-sm font-medium tracking-wide text-[#5b47da]">Me
                                                    </div>

                                                    <div class="mb-0.5 mt-0.5 text-xs font-normal tracking-wide">Lorem
                                                        ipsum
                                                        dolor sit amet consectetur adipisicing elit. Quas deserunt
                                                        commodi
                                                        reiciendis ab temporibus necessitatibus quae assumenda debitis
                                                        blanditiis. Dignissimos rem omnis maxime veniam ut commodi
                                                        eveniet,
                                                        asperiores doloribus soluta.</div>

                                                </div>

                                                <div
                                                    class="text-xs font-normal tracking-wide text-gray-700 mt-1.5 px-1">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                                    iusto, fugit quisquam minus hic impedit et ipsam officiis
                                                    exercitationem
                                                    omnis quaerat labore dolorem vitae error amet nesciunt nulla
                                                    excepturi
                                                    explicabo.</div>

                                            </div>


                                        </div>
                                    </div> --}}

                                    {{-- pengirim --}}





                                    {{-- pengirim replay --}}
                                    {{-- <div class="flex justify-end py-3 px-[3.7%] ">
                                        <div class="flex items-start w-9/12 justify-end">

                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                                src="{{ asset('assets/person.jpg') }}" alt="">

                                            <div class="px-1.5 py-1.5 bg-[#d1f4cc]  rounded-lg shadow-lg ">

                                                <div
                                                    class="flex flex-col text-xs text-zinc-500 py-1 px-2 bg-[#bee8b8] rounded-md border-l-4 border-[#06cf9c] ">

                                                    <div class="text-sm font-medium tracking-wide text-[#06cf9c]">Anda
                                                    </div>

                                                    <div class="mb-0.5 mt-0.5 text-xs font-normal tracking-wide">Lorem
                                                        ipsum
                                                        dolor sit amet consectetur adipisicing elit. Quas deserunt
                                                        commodi
                                                        reiciendis ab temporibus necessitatibus quae assumenda debitis
                                                        blanditiis. Dignissimos rem omnis maxime veniam ut commodi
                                                        eveniet,
                                                        asperiores doloribus soluta.</div>

                                                </div>

                                                <div
                                                    class="text-xs font-normal tracking-wide text-gray-700 mt-1.5 px-1">
                                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium
                                                    iusto, fugit quisquam minus hic impedit et ipsam officiis
                                                    exercitationem
                                                    omnis quaerat labore dolorem vitae error amet nesciunt nulla
                                                    excepturi
                                                    explicabo.</div>

                                            </div>

                                        </div>
                                    </div> --}}

                                    {{-- send file --}}
                                    {{-- <div class="w-9/12 py-3 px-4">

                                        <div class="flex items-start ">
                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                                src="{{ asset('assets/person.jpg') }}" alt="">
                                            <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                                <div class="text-sm font-medium ">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-gray-400 py-2">
                                                    <div class="w-52 h-16 bg-blue-100 rounded py-1">

                                                        <div class="flex flex-row">
                                                            <div class="">
                                                                <img class="w-14 h-14"
                                                                    src="{{ asset('assets/document.png') }}" />
                                                            </div>


                                                            <div class="flex flex-col px-1">
                                                                <div class="w-14 font-medium text-sm">Laporan.doc</div>

                                                                <div class="sm:flex text-xs font-normal">09:29 WIB - 20
                                                                    MB
                                                                </div>


                                                            </div>

                                                            <div class="py-2"><img class="w-10 h-10"
                                                                    src="{{ asset('assets/cloud_download.png') }}"
                                                                    alt="">
                                                            </div>



                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- send image --}}
                                    {{-- <div class="w-9/12 py-3 px-4">

                                        <div class="flex items-start ">
                                            <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                                src="{{ asset('assets/person.jpg') }}" alt="">
                                            <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                                <div class="text-sm font-medium ">
                                                    Fahmi
                                                </div>
                                                <div class="text-xs text-gray-400 py-2">
                                                    <img class="object-cover h-48 w-96"
                                                        src="{{ asset('assets/bg.jpeg') }}">

                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                {{-- send text --}}
                                <form action="" method="post" class="fixed bottom-4 w-[48%]" id="sendMessage">
                                    <div class="flex ml-6 mr-[3.7%] mb-3 mt-3 bg-gray-100 rounded-lg">

                                        <div class="flex-none w-14 h-14">
                                            <input type="file" id="upload_file"
                                                accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document">
                                            <a href="" id="link_upload">
                                                <img class="w-7/12 mx-2 my-3"
                                                    src="{{ asset('assets/icon_tambah.svg') }}" alt="">
                                            </a>

                                        </div>

                                        <div class="grow h-14 w-full">

                                            <div class="h-full flex ">

                                                <input type="text" placeholder="ketikan pesan disini" id="message"
                                                    class="flex-grow focus:outline-none -ml-2 pr-5 rounded-lg bg-transparent text-gray-700  ">

                                            </div>

                                        </div>

                                    </div>
                                </form>


                            </div>


                        </div>

                    </div>

                </div>
            </div>


            <div
                class="basis-3/12  px-2 h-[88vh]  scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-400 overflow-y-scroll">
                <div class="bg-white rounded-lg h-full">

                    <div class="flex flex-col ">

                        {{-- pencarian teks --}}

                        <div class="flex mx-[6%] mt-5 rounded-lg">

                            <div class="h-10 w-full bg-gray-100 rounded-md">

                                <div class="relative block">
                                    <input
                                        class="btn-hapus-pencarian w-full bg-transparent placeholder:font-italitc rounded-md py-2 pl-4 pr-8 focus:outline-none"
                                        placeholder="Cari Referensi" type="text" id="searchMessage" />

                                    <div class="" id="show-btn-hapus-pencarian" style="display: none">
                                        <span class="absolute inset-y-0 right-0 flex items-center pr-2">

                                            <svg onclick="removeSearch()"
                                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">

                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                        </span>
                                    </div>


                                </div>

                            </div>

                            <div class="flex-none w-10 h-10  py-[2.8%] pl-2">
                                <div class="cursor-pointer" id="btn_hideshow_dokumen">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
                                    </svg>

                                </div>

                            </div>
                        </div>


                        {{-- riwayat pencarian teks --}}
                        <div
                            class="py-2 mt-2 px-5 max-h-full">

                            <div class="scrollbar-thin scrollbar-thumb-gray-600 scrollbar-track-gray-400 overflow-y-scroll h-[50vh]" id="search-message">

                            </div>


                            {{-- konten iterasi start --}}
                        
                            {{-- konten iterasi end --}}


                        </div>

                    </div>

                    <div class="overflow-y-auto py-2 px-3 hidden" id="konten_hideshow_dokumen">

                        <ul class=" ">

                            <li>
                                <a href="#"
                                    class="flex items-center px-1 py-2 text-base font-normal rounded-lg text-gray-500  ">

                                    <img class="w-6 h-6" src="{{ asset('assets/icon-referensi-pdf.png') }}" alt="">

                                    <span class="ml-3">Pendaftaran.pdf</span>
                                </a>
                            </li>

                            <li>
                                <a href="#"
                                    class="flex items-center px-1 py-2 text-base font-normal rounded-lg text-gray-500  ">
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

    <script src="https://cdn.socket.io/socket.io-1.2.0.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.js"></script>
    <script src="{{ asset('assets/js/bindWithDelay.js') }}"></script>


    <script>
        // styling button upload file
        $(function() {
            $("#link_upload").on('click', function(e) {
                e.preventDefault();
                $("#upload_file:hidden").trigger('click');
            });
        });

        $("#btn_hideshow_dokumen").click(function() {
            $("#konten_hideshow_dokumen").toggle();
        });

        //Auto Scrolling
        const autoScroll = () => {
            let scroll_to_bottom = document.getElementById('list-message');
            scroll_to_bottom.scrollTop = scroll_to_bottom.scrollHeight;
        };

        // scroll bar auto bottom
        window.onload = (event) => {
            autoScroll();
            localStorage.setItem('room', 'Selamat Datang');
        };

        // hide show icon pencarian
        $("body").on("focus", ".btn-hapus-pencarian", function() {
            $("#show-btn-hapus-pencarian").css("display", "block");
        });

        $("#show-btn-hapus-pencarian").click(function() {
            $("#show-btn-hapus-pencarian").css("display", "none");
        });

    </script>

    {{-- Logical Script --}}
    <script>
        let user_id = parseInt("{!! Auth::user()->id !!}")
    console.log(user_id);
    let socket = io("wss://jakpintas.dpmptsp-dki.com:3500", {
    transports: ["websocket"],
    });

    //Connect to the server
    socket.on('connect', function() {
        console.log('connected');
    })

    //Search Message
    $('#searchMessage').bindWithDelay('keyup', function(){
        let search = $(this).val();
        let html = '';
        if (search.length > 0) {
            let query = '';
            // console.log(search.split(' '));
            let keyword = search.split(' ');
            if (keyword.length > 1) {
                query = 'WHERE (';
                for (let i = 0; i < keyword.length; i++) {
                    query += 'c.message LIKE "%' + keyword[i] + '%"';
                    if (i < keyword.length - 1) {
                        query += ' OR ';
                    }
                }
                query += ')';
            } else {
                query = 'WHERE c.message LIKE "%' + search + '%"';
            }
            socket.emit('searchMessage', query, (data)=>{
                if (data !== null) {
                    let result = data.reduce((r,a)=>{
                        r[a.room] = [...r[a.room] || [], a];
                        return r;
                    }, []);
                    for (let key in result){
                        html += `
                        <div class="flex items-start cursor-pointer py-1 hover:bg-gray-300 rounded-md px-2">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="h-4 1w-4 text-gray-400 mt-1" viewBox="0 0 20 20"
                                                            fill="currentColor">
                                                <path fill-rule="evenodd"
                                                                d="M9.243 3.03a1 1 0 01.727 1.213L9.53 6h2.94l.56-2.243a1 1 0 111.94.486L14.53 6H17a1 1 0 110 2h-2.97l-1 4H15a1 1 0 110 2h-2.47l-.56 2.242a1 1 0 11-1.94-.485L10.47 14H7.53l-.56 2.242a1 1 0 11-1.94-.485L5.47 14H3a1 1 0 110-2h2.97l1-4H5a1 1 0 110-2h2.47l.56-2.243a1 1 0 011.213-.727zM9.03 8l-1 4h2.938l1-4H9.031z"
                                                                clip-rule="evenodd" />
                                            </svg>
                                            <div
                                                class="text-base tracking-wide text-gray-500 py-1 -mt-1 ml-2 w-11/12">
                                                        ${key}
                                            </div>
                                            </div>
                        `;
                        result[key].forEach(el => {
                            html += `
                            <div class="py-1">
                                            <div class="p-2 text-sm text-gray-700 bg-gray-100 rounded-lg ">
                                                <div class="flex flex-row ">
                                                    <div class="flex items-start w-12/12 text-gray-700 bg-gray-100  rounded-lg ">
                                                        <img class="w-8 h-8 rounded-full "
                                                            src="{{ asset('assets/gambar/people.png') }}" alt="">
                                                        <div class="px-4">
                                                            <div class="text-sm mb-1">
                                                                ${el.username} <span class="px-1 text-xs text-slate-500">${date(el.date)}</span>
                                                            </div>
                                                            <div class="text-xs text-gray-400">
                                                                ${el.message}
                                                            </div>
                                                        </div>
                                                    </div>
            
                                                </div>
                                            </div>
                                        </div>
                            `
                        })
                    }
                }
                $('#search-message').html('')
                $('#search-message').html(html)
            });
        }else{
            $('#search-message').html('')
        }
    }, 1000)

    const removeSearch = () => {
        $('#searchMessage').val('');
        $('#search-message').html('')
    }

    const date = (val) =>{
        let date = new Date(val);
        let tahun = date.getFullYear();
        let bulan = date.getMonth();
        let tanggal = date.getDate();
        let hari = date.getDay();
        let jam = date.getHours();
        let menit = date.getMinutes();
        let detik = date.getSeconds();
        switch(bulan) {
        case 0: bulan = "Januari"; break;
        case 1: bulan = "Februari"; break;
        case 2: bulan = "Maret"; break;
        case 3: bulan = "April"; break;
        case 4: bulan = "Mei"; break;
        case 5: bulan = "Juni"; break;
        case 6: bulan = "Juli"; break;
        case 7: bulan = "Agustus"; break;
        case 8: bulan = "September"; break;
        case 9: bulan = "Oktober"; break;
        case 10: bulan = "November"; break;
        case 11: bulan = "Desember"; break;
        }
        let tampilTanggal = tanggal + " " + bulan + " " + tahun;

        return tampilTanggal;
    }

    //Select Sector
    const select_sector = (sector) =>{
        localStorage.setItem("room", sector);
        $("#room-sector").text(sector);
        socket.emit("selectRoom", sector, (data)=>{
            let html = '';
            if (data !== null) {
                let result = data.reduce((r,a)=>{
                        r[date(a.date)] = [...r[date(a.date)] || [], a];
                        return r;
                    }, {});
                console.log(result);
                for (let key in result) {
                    if (key.length > 0) {
                        html += `
                        <div class="w-full px-[3.7%]">
    
                            <div class="flex items-center py-4">
                                <div class="flex-grow h-[0.08rem] bg-gray-400"></div>
        
                                    <span class="flex-shrink text-gray-500 px-4 ">${key}</span>
        
                                <div class="flex-grow h-[0.08rem] bg-gray-400"></div>
                            </div>
                        </div>
                        `
                        result[key].forEach(el =>{
                            if (el.from == user_id) {
                                html += `
                                <div class="flex justify-end py-3 px-[3.7%]">
                                    <div class="flex justify-end w-9/12">
                                        <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                            src="/assets/person.jpg" alt="">
                                        <div class="px-3 py-2 bg-[#d1f4cc]  rounded-lg shadow-lg">
                                            <div class="text-sm tracking-wide font-medium text-[#06cf9c]">
                                                ${el.username}
                                            </div>
                                            <div class="text-xs text-zinc-700 font-normal tracking-wide py-1">
                                                ${el.message}
                                            </div>
    
                                        </div>
    
                                    </div>
                                </div>
                                `
                            }else{
                                html += `
                                <div class="w-9/12 py-3 px-4">
                                    <div class="flex items-start  ">
                                        <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="/assets/person.jpg" alt="">
                                        <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                            <div class="text-sm tracking-wide font-medium text-[#5b47da]">
                                                ${el.username}
                                            </div>
                                            <div class="text-xs text-zinc-700 font-normal tracking-wide py-1">
                                                ${el.message}
                                            </div>
    
                                        </div>
                                    </div>
                                </div>
                                `
                            }
                        })
                    }
                }
            }
            $("#list-message").html("");
            $("#list-message").html(html);
            autoScroll();
        });
    }

    //Inbox Message
    socket.on('msg', function(msg) {
        let html = '';
        if (msg.room == localStorage.getItem('room')) {
            if (msg.from == user_id) {
                html = `
                            <div class="flex justify-end py-3 px-[3.7%]">
                                <div class="flex justify-end w-9/12">
                                    <img class="mx-2 w-10 h-10 rounded-full shadow-lg"
                                        src="/assets/person.jpg" alt="">
                                    <div class="px-3 py-2 bg-[#d1f4cc]  rounded-lg shadow-lg">
                                        <div class="text-sm tracking-wide font-medium text-[#06cf9c]">
                                            ${msg.username}
                                        </div>
                                        <div class="text-xs text-zinc-700 font-normal tracking-wide py-1">
                                            ${msg.message}
                                        </div>

                                    </div>

                                </div>
                            </div>
                `
            }else{
                html = `
                            <div class="w-9/12 py-3 px-4">
                                <div class="flex items-start  ">
                                    <img class="mx-2 w-10 h-10 rounded-full shadow-lg" src="/assets/person.jpg" alt="">
                                    <div class="px-3 py-2 bg-gray-100 rounded-lg shadow-lg">
                                        <div class="text-sm tracking-wide font-medium text-[#5b47da]">
                                            ${msg.username}
                                        </div>
                                        <div class="text-xs text-zinc-700 font-normal tracking-wide py-1">
                                            ${msg.message}
                                        </div>

                                    </div>
                                </div>
                            </div>
                `
            }

            $('#list-message').append(html);
            autoScroll();
        }
    })

    //Send Message
    $('#sendMessage').submit((e)=>{
        e.preventDefault();
        let message = $("#message").val();
        let notice = {
            from: user_id,
            message: message,
            room: localStorage.getItem("room")
        }
        socket.emit('notice', notice)
        $("#message").val("");
    })
    </script>

</body>

</html>