<x-guest-layout>

    <x-slot name="header">
        @include('layouts.guest-nav',['warna'=>''])
    </x-slot>

    <x-slot name="footer">
        @include('layouts.guest-landing-footer')
    </x-slot>

    <x-slot name="stylehalaman">
    </x-slot>
    
    <x-slot name="scripthalaman">
    </x-slot>

    <div class="relative pt-16 pb-32 flex content-center items-center justify-center" style="min-height: 75vh;">
        <div class="absolute top-0 w-full h-full bg-center bg-cover"
            style='background-image: url("{{asset('/images/landing.jpg')}}");'>
            <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>
        </div>
        <div class="container relative mx-auto">
            <div class="items-center flex flex-wrap">
                <div class="w-full lg:w-8/12 px-4 ml-auto mr-auto text-center">
                    <div>
                        <h1 class="text-white font-semibold text-5xl">
                            Jasa Pembuatan Peta
                        </h1>
                        <p class="mt-4 text-lg text-gray-300">
                            Selamat datang di GeoMap, <br>
                            Mulai buat Peta Anda Sekarang Juga
                        </p>
                        <div class="flex items-center justify-center mt-12">
                            <a href="https://api.whatsapp.com/send?phone=+6285298972355&text=Halo,%20saya%20ingin%20membuat%20peta"
                                class="text-lg bg-green-500 text-gray-100 active:bg-gray-100 text-xs font-bold uppercase px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none lg:mr-1 lg:mb-0 ml-3 mb-3"
                                style="transition: all 0.15s ease 0s;"
                                >
                                Hubungi Kami
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden"
            style="height: 70px; transform: translateZ(0px);">
            <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg"
                preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
                <polygon class="text-gray-300 fill-current" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>
    
    <section class="pb-20 bg-gray-300 -mt-24">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap">
                <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                                <i class="fas fa-award"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Kerja Cepat & Profesional</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Hasil yang berkualitas terbaik dalam waktu pengerjaan yang cepat, dan professional.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-blue-400">
                                <i class="fas fa-retweet"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Bebas Revisi</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Kami selalu memberikan kesempatan revisi tanpa batas, berdasarkan kesepakatan awal.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                        <div class="px-4 py-5 flex-auto">
                            <div
                                class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-green-400">
                                <i class="fas fa-donate"></i>
                            </div>
                            <h6 class="text-xl font-semibold">Terjangkau</h6>
                            <p class="mt-2 mb-4 text-gray-600">
                                Kami akan terus memprioritaskan untuk memberikan yang terbaik dengan harga yang terjangkau
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-wrap items-center mt-32">
                <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                    <div
                        class="text-gray-600 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-gray-100">
                        <i class="fas fa-user-friends text-xl"></i>
                    </div>
                    <h3 class="text-3xl mb-2 font-semibold leading-normal">
                        Bekerja bersama kami dengan senang hati
                    </h3>
                    <p class="text-lg font-light leading-relaxed mt-4 mb-4 text-gray-700">
                        Pada saat ini, pembuatan sebuah peta sebagian besar sudah berbasis digital. 
                        Software yang paling populer digunakan dalam pembuatan atau mensimulasikan peta tersebut 
                        salah satunya adalah <b>ArcGIS</b> yang merupakan aplikasi pemetaan pada tingkat lanjut. 
                        Namun saat ini tenaga yang mampu mengaplikasikan software ini masih kurang, 
                        karena tergolong rumit dalam pengoperasiannya.
                    </p>
                    <p class="text-lg font-light leading-relaxed mt-0 mb-4 text-gray-700">
                        Kami menyediakan tenaga ahli dalam pembuatan peta dan pengolahan analisis data spasial berbasis <b>GIS <span class="italic">(Geographic Information System)</span></b>, 
                        untuk berbagai macam kebutuhan pengerjaan anda seperti tugas penelitian, skripsi, tesis, project pekerjaan pemetaan untuk Instansi Pemerintah, 
                        Swasta atau Perusahaan dan lain sebagainya. Dengan waktu pengerjaan yang cepat dan tidak ada batasan revisi hingga acc. 
                        Biaya pengerjaan terjangkau dan disesuaikan dengan ketersediaan data dan tingkat kesulitan.
                    </p>
                </div>
                <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-lg bg-pink-600">
                        <img alt="..."
                            src="{{asset('images/DroneRSBayangkara.jpg')}}"
                            class="w-full align-middle rounded-t-lg" />
                        <blockquote class="relative p-8 mb-4">
                            <svg preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 583 95"
                                class="absolute left-0 w-full block" style="height: 95px; top: -94px;">
                                <polygon points="-30,95 583,95 583,65" class="text-pink-600 fill-current"></polygon>
                            </svg>
                            <h4 class="text-xl font-bold text-white">
                                Tenaga Ahli dan Terampil
                            </h4>
                            <p class="text-md font-light mt-2 text-white">
                                Kami menguasai pengaplikasian software <b>ArcGIS</b> untuk pembuatan peta dan pengolahan analisis data spasial berbasis <b>GIS (Geographic Information System)</b>.
                            </p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </div>
    </section>

    


    

    <section class="pt-20 pb-48">
        <div class="container mx-auto px-4">
            <div class="flex flex-wrap justify-center text-center mb-24">
                <div class="w-full lg:w-6/12 px-4">
                    <h2 class="text-4xl font-semibold">Tim kami</h2>
                    <p class="text-lg leading-relaxed m-4 text-gray-600">
                        Tim GeoMap.web.id terdiri dari tenaga ahli pada bidangnya:
                    </p>
                </div>
            </div>
            <div class="flex flex-wrap">
                
                @foreach ([
                    'Fiqry Hidayat'=>[asset('images/tim/fikri1.jpg'),'Leader'],
                    'Algafari'=>[asset('images/tim/alga1.jpg'),'Drafter'],
                    'Rifky Reynaldi'=>[asset('images/tim/rifky1.jpg'),'Analis Data'],
                ] as $key=>$item)
                <div class="w-full md:w-6/12 lg:w-4/12 lg:mb-0 mb-12 px-4">
                    <div class="px-6">
                        <img alt="..." src="{{ asset($item[0]) }}"
                            class="shadow-lg rounded-full max-w-full mx-auto" style="max-width: 120px;" />
                        <div class="pt-6 text-center">
                            <h5 class="text-xl font-bold">{{$key}}</h5>
                            <p class="mt-1 text-sm text-gray-500 uppercase font-semibold">
                                {{$item[1]}}
                            </p>
                            <div class="mt-6">
                                <button
                                    class="bg-blue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button
                                    class="bg-blue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button
                                    class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                    type="button"><i class="fab fa-instagram"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    


</x-guest-layout>