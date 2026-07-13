<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Etiquetas  -->
        {!! optional(\App\Models\Setting::first())->head_scripts !!}
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
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
        <!-- css -->
        <link rel="stylesheet" href="{{asset('css/line-awesome.css')}}?v=1993.1.2">
         <link rel="stylesheet" href="{{asset('css/whatsapp.css')}}?v=1993.1.2">
        <link rel="stylesheet" href="{{asset('css/style.css')}}?v=1993.1.8">
        <link rel="stylesheet" href="{{asset('css/responsive.css')}}?v=1993.1.8">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('style')
        @stack('css')
    </head>
    <body>
        <!-- Etiquetas (noscript) -->
        {!! optional(\App\Models\Setting::first())->body_scripts !!}
        <!-- boton de whatsapp -->
        <livewire:whatsapp />
        <div class="wrapper-main">
            @include('header')
            <main class="main">
                @yield('content')
           </main>
           <livewire:footer/>
        </div>
        <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
        <script src="{{asset('js/jquery-ui.min.js')}}"></script>
        <script src="{{asset('js/app.js')}}?v=1993.1.3"></script>
        @stack('javascript')
        <!-- <script src="{{asset('js/cookies.js')}}"></script> -->
    </body>
</html>
