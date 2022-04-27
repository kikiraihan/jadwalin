<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="shortcut icon" href="{{ asset('grid-3x3.svg') }}" />

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <!-- Tailwind -->
        <script src="https://cdn.tailwindcss.com"></script>
        


        <!-- Scripts -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            body.swal2-shown > [aria-hidden="true"] {
                transition: 0.1s filter;
                filter: blur(10px);
                }
        </style>

        {{$stylehalaman}}

    </head>
    <body class="font-sans antialiased">

        @include('layouts.sidebar')

        <div >{{-- ml-12 md:ml-0 --}}
            <div class="min-h-screen bg-gray-100">

                {{$header}}
    
                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
            </div>
    
            {{$footer}}
        </div>


    </body>


    {{$scripthalaman}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</html>
