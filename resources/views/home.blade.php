@extends('layouts.web')

@section('content')
    <div class="swiper sliderHome">
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
    </div>

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
        <section class="proeyct-home-section mt-8 mb-14 py-10">
            <div class="section">
                <div class="grid w-full items-start gap-8 lg:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
                    <!-- COLUMNA IZQUIERDA -->
                    <div class="min-w-0 {{ $loop->even ? 'lg:order-2' : 'lg:order-1' }}">
                        <h2 class="text-4xl text-center pt-5"> {{$project->name}} </h2>
                        <p class="text-center mb-2">  {{$project->location}} </p>
                        <div class="swiper sliderBlueprint">
                            <div class="swiper-wrapper">
                                @foreach($project->blueprints as $blueprint)
                                <div class="swiper-slide">
                                    <article id="property-card" class="overflow-hidden rounded-[26px] bg-[#f06400] shadow-[0_18px_45px_rgba(15,23,42,0.12)]">
                                        <!-- Ficha blanca -->
                                        <div class="m-[5px] mb-0 rounded-t-[22px] rounded-br-[22px] bg-white px-5 pb-7 pt-4 sm:px-9 sm:pb-8 sm:pt-5">
                                        <!-- Plano -->
                                        <div class="mt-6 overflow-hidden rounded-xl bg-white sm:mt-8">
                                            <img id="floor-plan"
                                                src="{{ $blueprint->image ? Storage::disk('public')->url($blueprint->image) : '' }}"
                                                alt="Plano del departamento del Residencial Escudero"
                                                class=" w-full object-contain"/>
                                            </div>
                                        </div>
                                        <!-- Franja naranja -->
                                        <div class="grid gap-5 px-5 py-5 text-white sm:grid-cols-[1fr_auto] sm:px-9 sm:py-6">
                                            <div>
                                                <p id="property-type" class="text-xl font-black uppercase leading-none sm:text-2xl">
                                                    {{$blueprint->name}}
                                                </p>
                                                <p id="apartment-number" class="mt-2 text-lg font-medium sm:text-xl"> {{$blueprint->number_departments}}</p>
                                                <!-- <p id="price" class="mt-1 text-xl font-black tracking-tight sm:text-2xl">S/687,000</p> -->
                                            </div>
                                            <ul class="grid grid-cols-4 items-center gap-4 sm:gap-5" aria-label="Características">
                                            <li class="text-center">
                                                <!-- <svg class="mx-auto h-7 w-8" viewBox="0 0 34 28" fill="none" aria-hidden="true">
                                                <path d="M3 9v15m28-15v15M3 17h28M7 12h8v5H7v-5Zm12 0h8v5h-8v-5ZM1 22h32" stroke="currentColor" stroke-width="2.4" stroke-linecap="round"/>
                                                </svg> -->
                                                <i class="las la-bed text-2xl"></i>
                                                <span class="mt-1 block text-lg font-bold">{{$blueprint->bedrooms}}</span>
                                            </li>
                                            <li class="text-center">
                                                <i class="las la-bath text-2xl"></i>
                                                <span class="mt-1 block text-lg font-bold">{{$blueprint->bathrooms}}</span>
                                            </li>
                                            <li class="text-center">
                                                <i class="las la-seedling text-2xl"></i>
                                                <span class="mt-1 block text-base font-semibold">{{$blueprint->garden}}</span>
                                            </li>
                                            <li class="text-center">
                                                <i class="las la-seedling text-2xl"></i>
                                                <span class="mt-1 block text-base font-semibold">{{$blueprint->balcony}}</span>
                                            </li>
                                            </ul>
                                        </div>
                                    </article>
                                </div>
                                @endforeach
                            </div>
                            {{-- Flechas --}}
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                    <!-- COLUMNA DERECHA -->
                    <div class="h-full  flex items-center {{ $loop->even ? 'lg:order-1' : 'lg:order-2' }}">
                        <div>
                            <img src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}"
                            alt="{{$project->name}}"
                            class=" inset-0 min-h-[380px] sm:min-h-[500px] object-cover object-center"/>
                            <div class="flex justify-center">
                                <a href="#" class="btn-projects mt-3">Ver proyecto <i class="las la-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="location-section">
            <div class="location-card">
                <div class="map-panel">
                    @if($project->environments->first())
                    <img class="mapImage" src="{{Storage::disk('public')->url($project->environments->first()->image)}}" alt="Image de portada"/>
                    @endif
                </div>
                <div class="info-panel">
                    <h1 class="text-center">Áreas internas</h1>
                    <div class="category-grid">
                        @foreach($project->environments as $environment)
                        <button class="category-btn" data-image="{{ $environment->image ? Storage::disk('public')->url($environment->image) : '' }}">
                            <span class="icon">
                                <img src="{{ asset('images/item-icon').'/'.$environment->type.'.webp' }}" class="h-8" alt="{{$environment->title}}">
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

        buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const card = button.closest(".location-card");
            const mapImage = card.querySelector(".mapImage");
            const newImage = button.getAttribute("data-image");

            card.querySelectorAll(".category-btn").forEach((btn) => btn.classList.remove("active"));
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
