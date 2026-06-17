<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Layout para vistas blade - sin livewire -->
        <!-- Espacion para etiquetas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title ?? config('app.name') }}</title>
        <!-- Descriptio, keywork, title -->
        @stack('seo')
        <meta name="author" content="Onfleek Media S.A.C">
         <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" itemprop="headline" content="Elsvan" />
        <meta property="og:description" itemprop="description" content="Expertos en proyectos de construcción" />
        <meta property="og:url" itemprop="url" content="https://elsvan.pe/" />
        <meta property="og:type" content="website" />
        <!-- Google icons-->
        <link rel="icon" type="image/png" sizes="192x192" href="https://elsvan.pe/images/logo-min-192x192.png">
        <link rel="icon" type="image/png" sizes="96x96" href="https://elsvan.pe/images/logo-min-96x96.png">
        <link rel="icon" type="image/png" sizes="32x32" href="https://elsvan.pe/images/logo-min-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="https://elsvan.pe/images/logo-min-16x16.png">
        <link rel="stylesheet" href="{{asset('css/style.css')}}?v=1993.1.1">
         <link rel="stylesheet" href="{{asset('css/responsive.css')}}?v=1993.1.1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('style')
        @stack('css')
    </head>
    <body>
        <main class="wrapper-main">
            @include('header')
            <main class="main">
                @yield('content')
           </main>
            @include('footer')
        </main>
        @stack('javascript')
    </body>
</html>
