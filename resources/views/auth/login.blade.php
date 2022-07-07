@extends('layouts.app')

@section('content')
    <div class="flex flex-row min-h-screen">
        <div class="w-9/12">
            <video class="object-fill w-full h-full" src="" id="bg-video" type="video/mp4" autoplay muted loop></video>
        </div>
        <div class="w-3/12 gradient_card">
            <div class="flex flex-col h-screen">
                <div class="flex flex-row items-center justify-center bg-white">
                    <div class="flex items-center justify-center mr-6 mb-1">
                        <img class="" style="width: 100%" src="/login-assets/logo_jakpintas.png" alt="" />
                    </div>
                    <div class="flex flex-col items-center justify-center text-center mb-2 py-2">
                        <div class="w-50">
                            <span class="text-lg text-black" style="font-size: 14px">Peta Perizinan dan Investasi</span>
                        </div>
                        <div class="w-40">
                            <div style="font-size: 10px; padding-top: 1.5%"
                                class="rounded-full slogan h-5 text-xs text-white tracking-wider">
                                Sistem Pelayanan Informasi
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-12">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="">
                            <div class="">
                                <input name="email" type="email"
                                    class="w-full px-4 py-1 text-xs border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600"
                                    placeholder="Email" />
                            </div>

                            <div class="" x-data="{ show: true }">
                                <div class="relative">
                                    <input name="password" placeholder="Password" :type="show ? 'password' : 'text'"
                                        class="w-full mt-4 px-4 py-1 text-xs border rounded-md focus:border-blue-400 focus:outline-none focus:ring-1 focus:ring-blue-600" />
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm pt-4">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 text-gray-700" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" @click="show = !show"
                                            :class="{ 'hidden': !show, 'block': show }">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>

                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 text-gray-700 hidden "
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            @click="show = !show" :class="{ 'block': !show, 'hidden': show }">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="block w-full px-4 py-2 mt-4 text-xs font-medium text-center text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-full btn_masuk"
                                type="submit">
                                Login
                            </button>

                            <hr class="my-7" />

                            <div class="flex items-center justify-center gap-4">
                                <a href="{{ route('login-google') }}"
                                    class="flex items-center justify-center w-full px-4 py-2 text-sm text-white text-gray-700 border border-gray-300 rounded-full bg-slate-50 border-2 border-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        class="w-4 h-4 mr-2" viewBox="0 0 48 48">
                                        <defs>
                                            <path id="a"
                                                d="M44.5 20H24v8.5h11.8C34.7 33.9 30.1 37 24 37c-7.2 0-13-5.8-13-13s5.8-13 13-13c3.1 0 5.9 1.1 8.1 2.9l6.4-6.4C34.6 4.1 29.6 2 24 2 11.8 2 2 11.8 2 24s9.8 22 22 22c11 0 21-8 21-22 0-1.3-.2-2.7-.5-4z">
                                            </path>
                                        </defs>
                                        <clipPath id="b">
                                            <use xlink:href="#a" overflow="visible"></use>
                                        </clipPath>
                                        <path clip-path="url(#b)" fill="#FBBC05" d="M0 37V11l17 13z"></path>
                                        <path clip-path="url(#b)" fill="#EA4335" d="M0 11l17 13 7-6.1L48 14V0H0z"></path>
                                        <path clip-path="url(#b)" fill="#34A853" d="M0 37l30-23 7.9 1L48 0v48H0z"></path>
                                        <path clip-path="url(#b)" fill="#4285F4" d="M48 48L17 24l-4-3 35-10z"></path>
                                    </svg>
                                    <span class="text-black text-xs">Login dengan Google</span>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>

                <footer class="mt-auto mb-12 text-center text-xs text-gray-300 title_slogan">
                    ©2022 DPMPTSP Pemprov DKI Jakarta
                </footer>
            </div>
        </div>
    </div>
@endsection
