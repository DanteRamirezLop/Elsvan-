@extends('layouts.web')

@section('content')


    <div class="swiper mySwiper">
        <div class="swiper-wrapper">

            <div class="swiper-slide">
                <div class="banner-category container-fluid">
                    <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
                    <div class="banner-category-box-title">
                        <h1 class="banner-category-title"> La confianza no se vende</h1>
                        <p class="text-center text-white text-xl lg:text-3xl"> se construye</p>
                        <div class="text-center mt-5">
                            <a href="" class="btn-banner"> Cotiza aquí </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="banner-category container-fluid">
                    <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
                    <div class="banner-category-box-title">
                        <h1 class="banner-category-title"> La confianza no se vende 1</h1>
                        <p class="text-center text-white text-xl lg:text-3xl"> se construye</p>
                        <div class="text-center mt-5">
                            <a href="" class="btn-banner"> Cotiza aquí </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="swiper-slide">
                <div class="banner-category container-fluid">
                    <img src="{{asset('images/inicio.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
                    <div class="banner-category-box-title">
                        <h1 class="banner-category-title"> La confianza no se vende 2</h1>
                        <p class="text-center text-white text-xl lg:text-3xl"> se construye</p>
                        <div class="text-center mt-5">
                            <a href="" class="btn-banner"> Cotiza aquí </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        {{-- Paginación --}}
        <div class="swiper-pagination"></div>
        {{-- Flechas --}}
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
    </div>



    <!-- <section class="py-12">
    <div class="max-w-7xl mx-auto px-4">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img
                        src="{{asset('images/inicio.webp')}}"
                        alt="Imagen del slide 1"
                        class="w-full h-80 object-cover rounded-xl">
                </div>

                <div class="swiper-slide">
                    <img
                        src="{{ asset('images/slide-2.jpg') }}"
                        alt="Imagen del slide 2"
                        class="w-full h-80 object-cover rounded-xl"
                    >
                </div>

                <div class="swiper-slide">
                    <img
                        src="{{ asset('images/slide-3.jpg') }}"
                        alt="Imagen del slide 3"
                        class="w-full h-80 object-cover rounded-xl"
                    >
                </div>

                <div class="swiper-slide">
                    <img
                        src="{{ asset('images/slide-4.jpg') }}"
                        alt="Imagen del slide 4"
                        class="w-full h-80 object-cover rounded-xl"
                    >
                </div>

            </div>

            {{-- Paginación --}}
            <div class="swiper-pagination"></div>

            {{-- Flechas --}}
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>

    </div>
</section> -->

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

    <section class="about-section">
        <div class="about-text">
            <div class="marquee">
                Más de 13 años <br>
                <span>construyendo confianza...</span>
            </div>
            <p>
                Desde 2012, ELSVAN desarrolla proyectos inmobiliarios que combinan
                diseño, calidad y sostenibilidad, consolidando una trayectoria
                respaldada por la confianza de sus clientes y la entrega exitosa de
                sus proyectos. Apostamos por ubicaciones estratégicas, espacios
                funcionales y altos estándares de construcción, ofreciendo soluciones
                de vivienda que generan valor y seguridad para tu familia de hoy y
                del futuro.
            </p>
            <a href="#" class="btn-projects">Ver nuestros proyectos</a>
        </div>
        <div class="about-image">
            <img src="{{asset('images/construyendo-confianza.webp')}}" alt="Proyecto inmobiliario ELSVAN">
        </div>
    </section>

@foreach($projects as $project)
    <h2 class="text-4xl text-center py-8"> {{$project->name}} </h2>

    <section class="section">
        <div class="grid w-full items-start gap-8 lg:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
        <!-- COLUMNA IZQUIERDA -->
        <div class="min-w-0">
            <article id="property-card" class="overflow-hidden rounded-[26px] bg-[#f06400] shadow-[0_18px_45px_rgba(15,23,42,0.12)]">
            <!-- Ficha blanca -->
            <div class="m-[5px] mb-0 rounded-t-[22px] rounded-br-[22px] bg-white px-5 pb-7 pt-4 sm:px-9 sm:pb-8 sm:pt-5">
                <header class="flex items-start justify-between gap-5">
                    <div class="pt-1 text-[9px] font-medium uppercase leading-tight tracking-wide text-slate-500 sm:text-[10px]">
                        <p>{{$project->name}}</p>
                        <p class="normal-case">{{$project->name}}</p>
                    </div>

                    <div class="flex flex-col items-center text-slate-600" aria-label="Elsvan">
                        <svg class="h-8 w-10" viewBox="0 0 48 38" fill="none" aria-hidden="true">
                        <path d="M5 18 17 11v17L5 35V18Zm14-9L31 2v17l-12 7V9Zm14 8 10-6v17l-10 6V17Z" fill="currentColor"/>
                        <path d="M5 12 17 5v4L5 16v-4Zm14-9L25 0v4l-6 4V3Zm14 8 10-6v4l-10 6v-4Z" fill="currentColor" opacity=".75"/>
                        </svg>
                        <span class="mt-0.5 text-[9px] font-extrabold tracking-wide">ELSVAN</span>
                    </div>
                </header>

                <!-- Datos principales -->
                <dl class="mt-5 grid grid-cols-3 gap-3 text-slate-500 sm:mt-7 sm:gap-6">
                <div>
                    <dt class="text-[11px] sm:text-sm">Departamento</dt>
                    <dd id="apartment-range" class="mt-0.5 text-base font-extrabold text-slate-600 sm:text-xl">
                        202° al 602
                    </dd>
                </div>

                <div>
                    <dt class="text-[11px] sm:text-sm">Área total</dt>
                    <dd id="area" class="mt-0.5 text-base font-extrabold text-slate-600 sm:text-xl">
                        81.12m²
                    </dd>
                </div>

                <div>
                    <dt class="text-[11px] sm:text-sm">Dormitorios</dt>
                    <dd id="bedrooms" class="mt-0.5 text-base font-extrabold text-slate-600 sm:text-xl">
                        03
                    </dd>
                </div>
                </dl>

                <!-- Plano -->
                <div class="mt-6 overflow-hidden rounded-xl bg-white sm:mt-8">
                <img id="floor-plan"
                    src="./assets/plano-escudero.jpg"
                    alt="Plano del departamento del Residencial Escudero"
                    class="aspect-[1.43/1] w-full object-contain"/>
                </div>
            </div>

            <!-- Franja naranja -->
            <div class="grid gap-5 px-5 py-5 text-white sm:grid-cols-[1fr_auto] sm:px-9 sm:py-6">
                <div>
                    <p id="property-type" class="text-xl font-black uppercase leading-none sm:text-2xl">
                        Flat
                    </p>
                    <p id="apartment-number" class="mt-2 text-lg font-medium sm:text-xl">Dpto. 202</p>
                    <!-- <p id="price" class="mt-1 text-xl font-black tracking-tight sm:text-2xl">S/687,000</p> -->
                </div>

                <ul class="grid grid-cols-4 items-center gap-4 sm:gap-5" aria-label="Características">
                <li class="text-center">
                    <!-- <svg class="mx-auto h-7 w-8" viewBox="0 0 34 28" fill="none" aria-hidden="true">
                    <path d="M3 9v15m28-15v15M3 17h28M7 12h8v5H7v-5Zm12 0h8v5h-8v-5ZM1 22h32" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                    </svg> -->

                    <i class="las la-bed text-2xl"></i>
                    <span class="mt-1 block text-lg font-bold">2</span>
                </li>

                <li class="text-center">
                    <!-- <svg class="mx-auto h-7 w-8" viewBox="0 0 34 28" fill="none" aria-hidden="true">
                    <path d="M9 3h13v8H9V3Zm-2 9h19v6a6 6 0 0 1-6 6h-7a6 6 0 0 1-6-6v-6Zm17 12 3 3M10 24l-3 3" stroke="currentColor" stroke-width="2.3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> -->
                    <i class="las la-bath text-2xl"></i>
                    <span class="mt-1 block text-lg font-bold">2</span>
                </li>

                <li class="text-center">
                    <!-- <svg class="mx-auto h-7 w-8" viewBox="0 0 34 28" fill="none" aria-hidden="true">
                    <path d="M17 8v17M17 13c-6 0-9-3-9-8 6 0 9 3 9 8Zm0 4c6 0 9-3 9-8-6 0-9 3-9 8ZM8 25h18" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> -->

                    <i class="las la-seedling text-2xl"></i>
                    <span class="mt-1 block text-base font-semibold">No</span>
                </li>

                <li class="text-center">
                    <!-- <svg class="mx-auto h-7 w-8" viewBox="0 0 34 28" fill="none" aria-hidden="true">
                    <path d="M5 4v20M5 13h9v6H5m9-9v14m7-11h9v6h-9m0-9v14M4 24h11m5 0h11" stroke="currentColor" stroke-width="2.1" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg> -->
                       <i class="las la-seedling text-2xl"></i>
                    <span class="mt-1 block text-base font-semibold">No</span>
                </li>
                </ul>
            </div>
            </article>

            <!-- Navegación -->
            <!-- <nav class="mt-5 flex items-center justify-center gap-4" aria-label="Navegación del carrusel">
            <button
                id="previous"
                type="button"
                class="group grid h-16 w-16 place-items-center rounded-full bg-slate-200 text-white transition hover:bg-slate-300 disabled:cursor-not-allowed disabled:opacity-60"
                aria-label="Departamento anterior">
                <svg class="h-8 w-8 transition group-active:-translate-x-0.5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="m15 5-7 7 7 7" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <div class="h-1 w-28 rounded-full bg-slate-200 sm:w-32">
                <div id="progress" class="h-full rounded-full bg-slate-400 transition-all duration-300" style="width: 100%"></div>
            </div>

            <button
                id="next"
                type="button"
                class="group grid h-16 w-16 place-items-center rounded-full bg-slate-200 text-white transition hover:bg-slate-300 disabled:cursor-not-allowed disabled:opacity-60"
                aria-label="Siguiente departamento">
                <svg class="h-8 w-8 transition group-active:translate-x-0.5" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                <path d="m9 5 7 7-7 7" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>
            </nav> -->
        </div>

        <!-- COLUMNA DERECHA -->
        <article class="relative min-h-[500px] overflow-hidden rounded-[22px] bg-slate-100 shadow-[0_18px_45px_rgba(15,23,42,0.10)] sm:min-h-[630px]">
            <img
            id="building-image"
            src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}"
            alt="Vista exterior del Residencial Escudero"
            class="absolute inset-0 h-full w-full object-cover object-top"
            />

            <!-- <div class="absolute inset-x-0 bottom-0 h-32 bg-gradient-to-t from-black/25 to-transparent"></div>

            <a
            id="project-link"
            href="#"
            class="absolute bottom-7 left-1/2 flex w-[78%] -translate-x-1/2 items-center justify-center rounded-full bg-[#f06400] px-6 py-4 text-center text-lg font-bold text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-[#db5b00] focus:outline-none focus:ring-4 focus:ring-orange-300 sm:text-xl"
            >
            Ver proyecto
            </a> -->
        </article>
        </div>
    </section>

    <section class="location-section">
        <div class="location-card">
            <div class="map-panel">
                <img id="mapImage" src="{{Storage::disk('public')->url($project->environments->first()->image)}}" alt="Image de portada"/>
            </div>
            <div class="info-panel">
                <h1 class="text-center">Áreas internas</h1>
                <div class="category-grid">
                    @foreach($project->environments as $environment)
                    <button class="category-btn" data-image="{{ $environment->image ? Storage::disk('public')->url($environment->image) : '' }}">
                        <span class="icon">
                            <img src="{{ asset('images/item-icon').'/'.$environment->type.'.webp' }}" class="h-6" alt="{{$environment->title}}">
                        </span>
                        <span class="min-w-24">{{$environment->title}}</span>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endforeach

@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush

@push('javascript')
    <script>
        const buttons = document.querySelectorAll(".category-btn");
        const mapImage = document.getElementById("mapImage");

        buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const newImage = button.getAttribute("data-image");

            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            mapImage.classList.add("fade");

            setTimeout(() => {
            mapImage.src = newImage;
            mapImage.alt = `Mapa de ${button.innerText}`;
            mapImage.classList.remove("fade");
            }, 250);
        });
        });
    </script>
@endpush
