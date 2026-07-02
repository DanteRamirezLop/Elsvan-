@extends('layouts.web')

@section('content')
    <section class="relative overflow-hidden bg-orange">
        <div class="grid min-h-[420px] grid-cols-1 lg:grid-cols-[39.2%_60.8%]">
            <!-- Imagen del edificio -->
             <div class="relative min-h-[430px] bg-escudero lg:min-h-[420px]">
              <div class="absolute inset-y-0 right-0 w-full overflow-hidden sm:w-[86%] lg:w-[72%]">
                     <img src="{{$project->main_image ? Storage::disk('public')->url($project->main_image) : ''}}" alt="{{$project->name}}" class="h-full w-full object-cover object-center">
                </div>
            </div>
            <!-- Información -->
            <div class="flex items-center bg-escudero px-6 py-12 sm:px-12 lg:px-16 xl:px-24">
                <div class="mx-auto w-full max-w-[780px]">
                    <!-- Ubicación -->
                    <article class="grid grid-cols-[70px_1fr] items-start gap-6 border-b-2 border-white pb-9 sm:grid-cols-[120px_1fr] sm:gap-10">
                        <div class="flex justify-center pt-1">
                            <!-- Ícono ubicación -->
                            <svg class="h-[70px] w-[70px] text-white sm:h-[62px] sm:w-[62px]" viewBox="0 0 100 100"  fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M50 8C35.8 8 24 19.7 24 34.2C24 54.3 50 76 50 76C50 76 76 54.3 76 34.2C76 19.7 64.2 8 50 8Z" fill="currentColor"/>
                                <circle cx="50" cy="34" r="10" fill="#ff6800"/>
                                <path d="M32 72C19 75 11 80 11 86C11 94 28 98 50 98C72 98 89 94 89 86C89 80 81 75 68 72"
                                    stroke="currentColor"
                                    stroke-width="5"
                                    stroke-linecap="round"/>
                                <path d="M38 81C30 82.5 26 84.5 26 87C26 90 37 92 50 92C63 92 74 90 74 87C74 84.5 70 82.5 62 81"
                                    stroke="currentColor"
                                    stroke-width="4"
                                    stroke-linecap="round"/>
                            </svg>
                        </div>

                        <p class="text-lg font-light leading-[1.45] text-white sm:text-xl lg:text-xl">
                            {{$project->location}}
                        </p>
                    </article>

                    <!-- Acabados -->
                    <article class="grid grid-cols-[70px_1fr] items-center gap-6
                               border-b-2 border-white py-8
                               sm:grid-cols-[120px_1fr] sm:gap-10">
                        <div class="flex justify-center">
                            <!-- Ícono rodillo -->
                            <svg
                                class="h-[64px] w-[64px] text-white sm:h-[62px] sm:w-[62px]"
                                viewBox="0 0 100 100"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <rect
                                    x="15"
                                    y="15"
                                    width="58"
                                    height="25"
                                    rx="7"
                                    stroke="currentColor"
                                    stroke-width="5"
                                />
                                <path
                                    d="M73 23H84C87.3 23 90 25.7 90 29V49H53V64"
                                    stroke="currentColor"
                                    stroke-width="5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <rect
                                    x="45"
                                    y="62"
                                    width="16"
                                    height="31"
                                    rx="5"
                                    stroke="currentColor"
                                    stroke-width="5"
                                />
                                <path
                                    d="M8 27H15"
                                    stroke="currentColor"
                                    stroke-width="5"
                                    stroke-linecap="round"
                                />
                            </svg>

                        </div>

                        <p class="text-lg font-light leading-[1.45] text-white sm:text-xl lg:text-xl">
                            Acabados y equipamiento de primera calidad.
                        </p>
                    </article>

                    <!-- Seguridad y áreas comunes -->
                    <article
                        class="grid grid-cols-[70px_1fr] items-start gap-6 pt-8
                               sm:grid-cols-[120px_1fr] sm:gap-10"
                    >
                        <div class="flex justify-center pt-1">

                            <!-- Ícono escudo -->
                            <svg
                                class="h-[70px] w-[70px] text-white sm:h-[62px] sm:w-[62px]"
                                viewBox="0 0 100 100"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    d="M50 7L84 20V45C84 68 70 84 50 93C30 84 16 68 16 45V20L50 7Z"
                                    stroke="currentColor"
                                    stroke-width="6"
                                    stroke-linejoin="round"
                                />
                                <rect
                                    x="35"
                                    y="43"
                                    width="30"
                                    height="28"
                                    rx="4"
                                    fill="currentColor"
                                />
                                <path
                                    d="M41 43V36C41 31 45 27 50 27C55 27 59 31 59 36V43"
                                    stroke="currentColor"
                                    stroke-width="6"
                                    stroke-linecap="round"
                                />
                                <circle cx="50" cy="55" r="3.5" fill="#ff6800"/>
                                <path
                                    d="M50 57V64"
                                    stroke="#ff6800"
                                    stroke-width="4"
                                    stroke-linecap="round"
                                />
                            </svg>

                        </div>

                        <p class="text-lg font-light leading-[1.45] text-white sm:text-xl lg:text-xl">
                             {{$project->description}}
                        </p>
                    </article>

                </div>
            </div>

        </div>
    </section>

    <section class="proeyct-home-section mb-14 py-12">
        <div class="section">
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
        </div>
    </section>

        <!-- <section class="proeyct-home-section mt-8 mb-14 py-10"> -->
         <section class="location-section">

                <div class="grid w-full items-start gap-10 lg:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
                    <!-- COLUMNA IZQUIERDA -->
                    <div class="min-w-0">
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
                    <div class="h-full flex items-center">
                        <div>

                            <!-- formulario -->

                        </div>
                    </div>
                </div>

        </section>





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
