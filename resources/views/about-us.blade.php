@extends('layouts.web')

@section('content')
    <section class=" banner-category container-fluid">
        <img src="{{asset('images/sobre-nosotros.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title"> Expertos en proyectos</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> de construcción </p>
            <div class="text-center mt-5">
                <a href="" class="btn-banner"> Cotiza aquí </a>
            </div>
        </div>
    </section>
    <section class="contact-bar">
        <div class="contact-content ">
            <strong class="text-brown text-lg">¡CONTÁCTANOS AHORA!</strong>
            <span class="text-sm md:text-lg">
                <svg class="w-6 h-6 text-white inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z"/>
                </svg>
                (+51) 967-344-992
            </span>
            <span class="text-sm md:text-lg">
                <svg class="w-6 h-6 text-white inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z"/>
                </svg>
                (+51) 969-389-863
            </span>
            <span class="text-sm md:text-lg">
                <svg class="w-6 h-6 text-white inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z"/>
                </svg>
                (+51) 986-369-350
            </span>
        </div>
    </section>
    <!-- Descripción -->
    <section class="section">
        <p class="text-justify text-sm leading-6 md:text-base md:leading-7 mt-8">
            ELSVAN, es una empresa dedicada al desarrollo y construcción de
            proyectos inmobiliarios modernos, principalmente destinados a la
            vivienda. Tenemos el gran reto de desarrollar proyectos que mejoren
            la calidad de vida de las familias y que a su vez contribuyan
            actualmente con el desarrollo de una mejor ciudad, yendo acorde con
            las nuevas tendencias del mercado y participando en la implementación
            de nuevas alternativas de vivienda con altos estándares en calidad.
        </p>
    </section>
    <!-- Reproductor -->
    <section class="section">
        <div class="mb-14 overflow-hidden rounded-2xl bg-white shadow-sm">

            <div
                id="videoContainer"
                class="group relative aspect-video overflow-hidden rounded-t-2xl bg-[#202020]"
            >
                <video
                    id="video"
                    class="h-full w-full object-cover"
                    preload="metadata"
                    poster="images/portada-video.jpg"
                >
                    <source src="videos/video-elsvan.mp4" type="video/mp4">
                    Tu navegador no soporta videos HTML5.
                </video>

                <!-- Botón central -->
                <button
                    id="mainPlayButton"
                    type="button"
                    aria-label="Reproducir video"
                    class="absolute left-1/2 top-1/2 flex h-20 w-20 -translate-x-1/2 -translate-y-1/2 items-center justify-center rounded-full bg-white/25 backdrop-blur-sm transition hover:scale-105 hover:bg-white/35"
                >
                    <svg
                        class="ml-1 h-10 w-10 text-white"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </button>
            </div>

            <!-- Controles -->
            <div class="flex h-14 items-center gap-4 bg-white px-5">

                <!-- Play / pausa -->
                <button
                    id="playButton"
                    type="button"
                    aria-label="Reproducir o pausar"
                    class="text-gray-800 transition hover:text-orange-600"
                >
                    <svg
                        id="playIcon"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="currentColor"
                    >
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </button>

                <!-- Retroceder -->
                <button
                    id="backButton"
                    type="button"
                    aria-label="Retroceder 10 segundos"
                    class="text-gray-800 transition hover:text-orange-600"
                >
                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M9 7H5v-4"/>
                        <path d="M5 7a8 8 0 1 1-1 7"/>
                        <path d="M12 9v6"/>
                    </svg>
                </button>

                <!-- Adelantar -->
                <button
                    id="forwardButton"
                    type="button"
                    aria-label="Adelantar 10 segundos"
                    class="text-gray-800 transition hover:text-orange-600"
                >
                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M15 7h4v-4"/>
                        <path d="M19 7a8 8 0 1 0 1 7"/>
                        <path d="M12 9v6"/>
                    </svg>
                </button>

                <!-- Barra de progreso -->
                <input
                    id="progressBar"
                    type="range"
                    min="0"
                    max="100"
                    value="0"
                    aria-label="Progreso del video"
                    class="min-w-0 flex-1 cursor-pointer"
                >

                <!-- Volumen -->
                <button
                    id="volumeButton"
                    type="button"
                    aria-label="Activar o silenciar volumen"
                    class="text-gray-800 transition hover:text-orange-600"
                >
                    <svg
                        id="volumeIcon"
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M11 5 6 9H2v6h4l5 4z"/>
                        <path d="M15.5 8.5a5 5 0 0 1 0 7"/>
                        <path d="M18 6a8 8 0 0 1 0 12"/>
                    </svg>
                </button>

                <!-- Pantalla completa -->
                <button
                    id="fullscreenButton"
                    type="button"
                    aria-label="Pantalla completa"
                    class="text-gray-800 transition hover:text-orange-600"
                >
                    <svg
                        class="h-5 w-5"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path d="M8 3H3v5"/>
                        <path d="M16 3h5v5"/>
                        <path d="M8 21H3v-5"/>
                        <path d="M16 21h5v-5"/>
                    </svg>
                </button>

            </div>
        </div>
    </section>
    <!-- Misión y visión -->
    <div class="section">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Misión -->
            <article class="flex min-h-[290px] flex-col items-center rounded-2xl bg-[#f45b00] px-8 py-7 text-center text-white shadow-lg">
                <div class="mb-2">
                    <svg
                        class="h-16 w-16"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <circle cx="12" cy="12" r="8"/>
                        <circle cx="12" cy="12" r="4"/>
                        <path d="M12 12 20 4"/>
                        <path d="M16 4h4v4"/>
                    </svg>
                </div>

                <h2 class="mb-4 text-4xl font-black uppercase tracking-tight">
                    Misión
                </h2>

                <p class="text-sm font-medium leading-5">
                    Desarrollamos proyectos de construcción con los más exigentes
                    estándares de seguridad, calidad y puntualidad. Somos una de las
                    empresas más confiables del sector inmobiliario, puesto que
                    trabajamos de forma íntegra demostrando nuestra honestidad en
                    cada proyecto. De esta manera, ofrecemos una de las mejores
                    soluciones de vivienda para nuestros clientes, logrando alcanzar
                    sus expectativas.
                </p>
            </article>
            <!-- Visión -->
            <article class="flex min-h-[290px] flex-col items-center rounded-2xl bg-[#92c509] px-8 py-7 text-center text-white shadow-lg">
                <div class="mb-2">
                    <svg
                        class="h-16 w-16"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                    >
                        <path d="M2 12s3.5-6 10-6 10 6 10 6-3.5 6-10 6S2 12 2 12z"/>
                        <circle cx="12" cy="12" r="3"/>
                    </svg>
                </div>

                <h2 class="mb-4 text-4xl font-black uppercase tracking-tight">
                    Visión
                </h2>

                <p class="text-sm font-medium leading-5">
                    Ser una de las empresas líderes en construcción utilizando
                    procedimientos innovadores, que nos permitan promover productos
                    inmobiliarios de alta calidad y amigables con el medio ambiente,
                    asegurando la comodidad a nuestros clientes e influyendo en el
                    desarrollo del país y de nuestros colaboradores.
                </p>
            </article>
        </div>
    </div>
    <div class="bg-orange">
        <div class="section">
            <div class="swiper sliderContact">
                <div class="swiper-wrapper mt-8">
                    <div class="swiper-slide">
                        <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="rounded-2xl">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="rounded-2xl">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="rounded-2xl">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="rounded-2xl">
                    </div>
                    <div class="swiper-slide">
                        <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="rounded-2xl">
                    </div>
                </div>
                {{-- Flechas --}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
