<!DOCTYPE html>
<html class="w-full h-full" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Nota: Occhio ai metatag di default --}}
        {{-- <title>Laravel</title> --}}
        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        {{-- Nota: aggiungere font da Google Fonts quando disponibile, con i preconnect per velocizzare loading pagina --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700&display=swap" rel="stylesheet">

        @vite('resources/css/app.css')
    </head>
    <body class="w-full h-full bg-black">
        <div id="app"></div>
        
        @include('parts.age-gate')

        @include('parts.footer')



        @vite('resources/js/app.js')
        @vite('resources/js/ageGate.js')
    </body>
</html>
