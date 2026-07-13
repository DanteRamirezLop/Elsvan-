@extends('layouts.web')

@section('content')
    <livewire:slider/>

    <livewire:marquee/>

    <section class="about-section">
        <div class="about-text">
            <div class="marquee">
                Más de {{$year}} años construyendo confianza
            </div>
            @if(isset($page->content))
                <p>{!! $page->content !!}</p>
            @endif
            <a href="{{route('proyectos.index')}}" class="btn-projects">Ver nuestros proyectos</a>
        </div>
        <div class="about-image">
            <img src="{{ $page->image ? Storage::disk('public')->url($page->image) : '' }}" alt="Proyecto inmobiliario ELSVAN">
        </div>
    </section>

    @if(count($projects))
    <!-- Dirección -->
    <div class="text-center my-10">
        <h2 class="text-3xl  font-bold  md:text-4xl text-brown">
             Mira nuestros departamentos en venta
        </h2>
    </div>
    @endif

    @foreach($projects as $project)
        <section class="proeyct-home-section mt-8  mb-8 lg:mb-14 py-10">
            <div class="section">
                <div class="grid w-full items-start gap-10 md:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
                    <!-- COLUMNA IZQUIERDA -->
                    <div class="min-w-0 {{ $loop->even ? 'lg:order-2' : 'lg:order-1' }}">
                        <div class="swiper sliderBlueprint">
                            <div class="swiper-wrapper">
                                @foreach($project->blueprints as $blueprint)
                                    <div class="swiper-slide ">
                                        <article id="property-card" class="overflow-hidden rounded-[26px] bg-orange ">
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
                                                </div>
                                                <ul class="grid grid-cols-4 items-center gap-4 sm:gap-5" aria-label="Características">
                                                <li class="text-center">
                                                    <img src="{{ asset('images/item-icon/dormitorio.webp') }}" alt="Dormitorios" class="mx-auto w-7 h-7">
                                                    <span class="mt-1 block text-base font-semibold">{{ $blueprint->bedrooms }}</span>
                                                </li>
                                                <li class="text-center">
                                                    <img src="{{ asset('images/item-icon/bano.webp') }}" alt="Baños" class="mx-auto w-7 h-7">
                                                    <span class="mt-1 block text-base font-semibold">{{$blueprint->bathrooms}}</span>
                                                </li>
                                                <li class="text-center">
                                                    <img src="{{ asset('images/item-icon/jardin.webp') }}" alt="Jardín" class="mx-auto w-7 h-7">
                                                    <span class="mt-1 block text-base font-semibold">{{$blueprint->garden}}</span>
                                                </li>
                                                <li class="text-center">
                                                    <img src="{{ asset('images/item-icon/balcon.webp') }}" alt="Balcón" class="mx-auto w-7 h-7">
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
                    <div class="h-full flex items-center {{ $loop->even ? 'lg:order-1' : 'lg:order-2' }}">
                        <div>
                            <h2 class="text-2xl lg:text-3xl text-center mb-2"><i class="las la-map-marker text-orange "aria-hidden="true"></i> {{$project->name}} - <span class="text-brown"> {{$project->district}} </span> </h2>
                            <div class="inset-0 min-h-[380px] sm:min-h-[500px] object-cover object-center  mx-auto">
                                <article>
                                    <a href="{{ route('proyectos.show', $project) }}">
                                        <div class="rounded-t-xl relative overflow-hidden bg-gray-200 shadow-lg">
                                            <div class="uppercase absolute left-0 top-0 z-20 flex h-14 w-full items-center justify-center bg-green-tranparence px-4 text-center text-xl font-extrabold text-white">
                                                {{$project->tag}}
                                            </div>
                                            <img src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}" alt="{{$project->name}}" class="h-full w-full object-cover">
                                        </div>
                                    </a>
                                    <div class="rounded-b-xl bg-brown shadow-project">
                                        <a href="{{ route('proyectos.show', $project) }}" class="btn-projects-see text-white block w-full px-5 py-6 text-center h-14">  VER PROYECTO </a>
                                    </div>
                                </article>
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

    @if($articles->count())
    <section class="section my-14">
        <div class="text-center mb-10">
            <h2 class="text-3xl font-bold md:text-4xl text-brown">Últimas noticias</h2>
        </div>

        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
            @foreach($articles as $article)
                <article class="p-5 bg-white rounded-lg border border-gray-200 shadow-md">
                    <a href="{{ route('noticias.show', $article) }}">
                        <img class="w-full mb-4 rounded-lg" src="{{ $article->image ? Storage::disk('public')->url($article->image) : '' }}" alt="{{ $article->title }}">
                    </a>
                    <h3 class="mb-2 text-2xl tracking-tight text-gray-900">
                        <a href="{{ route('noticias.show', $article) }}">{{ Str::limit($article->title, 60) }}</a>
                    </h3>
                    <p class="mb-5 font-light text-gray-500">{{ Str::limit($article->excerpt, 200) }}</p>
                    <div class="flex justify-between items-center">
                        <span class="font-medium text-brown">{{ $article->published_at ? date('d M Y', strtotime($article->published_at)) : '' }}</span>
                        <a href="{{ route('noticias.show', $article) }}" class="inline-flex items-center font-medium text-orange hover:underline">
                            Leer más <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center mt-10">
            <a href="{{ route('noticias.index') }}" class="btn-projects">Ver más</a>
        </div>
    </section>
    @endif

@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:title" content="{{$seo['title']}}" />
    <meta property="og:description" content="{{$seo['description']}}" />
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

            if (!newImage || newImage === mapImage.src) return;

            card.querySelectorAll(".category-btn").forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
            mapImage.classList.add("fade");

            const preload = new Promise((resolve) => {
                const img = new Image();
                img.onload = resolve;
                img.onerror = resolve;
                img.src = newImage;
            });
            const minFadeOut = new Promise((resolve) => setTimeout(resolve, 250));

            Promise.all([preload, minFadeOut]).then(() => {
                mapImage.src = newImage;
                mapImage.alt = `Mapa de ${button.innerText}`;
                mapImage.classList.remove("fade");
            });
        });
        });
    </script>
@endpush
