<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Layout para vistas blade - sin livewire -->
        <!-- Espacion para etiquetas -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Descriptio, keywork, title -->
        @stack('seo')
        <meta name="author" content="Onfleek Media S.A.C">
         <!-- META -->
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" itemprop="headline" content="Elsvan" />
        <meta property="og:description" itemprop="description" content="Expertos en proyectos de construcción" />
        <meta property="og:url" itemprop="url" content="{{env('APP_URL')}}" />
        <meta property="og:type" content="website" />
        <!-- Google icons-->
        <link rel="icon" type="image/png" sizes="192x192" href="{{env('APP_URL')}}/images/icon/favicon-192x192.png">
        <link rel="icon" type="image/png" sizes="96x96" href="{{env('APP_URL')}}/images/icon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="32x32" href="{{env('APP_URL')}}/images/icon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="{{env('APP_URL')}}/images/icon/favicon.ico">
        <link rel="apple-touch-icon" href="{{env('APP_URL')}}/images/icon/favicon.ico" />
        <!-- css -->
        <link rel="stylesheet" href="{{asset('css/line-awesome.css')}}?v=1993.1.1">
         <link rel="stylesheet" href="{{asset('css/whatsapp.css')}}?v=1993.1.1">
        <link rel="stylesheet" href="{{asset('css/style.css')}}?v=1993.1.1">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}?v=1993.1.1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('style')
        @stack('css')
    </head>
    <body>
        <livewire:whatsapp />
        <main class="wrapper-main">
            @include('header')
            <main class="main">
                @yield('content')

           </main>
            @include('footer')
        </main>
        @stack('javascript')
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}?v=1993.1.3"></script>
        <script src="{{asset('js/cookies.js')}}"></script>
         <script>
            document.getElementById('years-in-market').textContent = '+' + (new Date().getFullYear() - 2012) + ' años';
            document.getElementById('current-year').textContent = new Date().getFullYear();
        </script>
    </body>
</html>
