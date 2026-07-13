@extends('layouts.web')

@section('content')
    <section class=" banner-category container-fluid">
        <img
        src="{{ isset($page) && $page->image ? Storage::disk('public')->url($page->image) : asset('images/nosotros.webp') }}"
         alt="Expertos en proyectos de construcción" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title tracking-wider"> Expertos en proyectos</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> de construcción </p>
        </div>
    </section>

    <livewire:marquee/>
    <!-- Descripción -->
     @if(isset($page->content))
    <section class="section">
        <div class="text-justify text-lg leading-6 md:leading-7 mt-8">
            {!! $page->content !!}
        </div>
    </section>
    @endif


    <div class="iframe-center">
        <div class="w-5/6 lg:w-3/5">
            @if(isset($page->info_1))
                <div class="iframe-container">
                    {!! $page->info_1 !!}
                </div>
            @endif
        </div>

    </div>
    <!-- Misión y visión -->
    <div class="section">
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Misión -->
            <article class="mission-vision-card flex min-h-[290px] flex-col items-center rounded-2xl bg-[#f45b00] px-8 py-7 text-center text-white shadow-lg">
                <div class="mb-2">
                    <img src="{{ asset('images/mision.webp') }}" alt="Misión" class="h-16 w-16 object-contain">
                </div>
                <h2 class="mb-4 text-4xl font-black uppercase tracking-tight">
                    Misión
                </h2>
                <p class="text-base font-medium leading-5">
                    {{  $page->info_2 }}
                </p>
            </article>
            <!-- Visión -->
            <article class="mission-vision-card flex min-h-[290px] flex-col items-center rounded-2xl bg-[#92c509] px-8 py-7 text-center text-white shadow-lg">
                <div class="mb-2">
                    <img src="{{ asset('images/vision.webp') }}" alt="Visión" class="h-16 w-16 object-contain">
                </div>

                <h2 class="mb-4 text-4xl font-black uppercase tracking-tight">
                    Visión
                </h2>

                <p class="text-base font-medium leading-5">
                     {{  $page->info_3 }}
                </p>
            </article>
        </div>
    </div>
    <div class="bg-orange">
        <div class="section">
            <div class="swiper sliderContact" style="height: 320px;">
                <div class="swiper-wrapper mt-8">
                    @foreach($images as $image)
                    <div class="swiper-slide">
                        <img src="{{ $image->image ? Storage::disk('public')->url($image->image) : '' }}" alt="{{ $image->title ?? 'Galería del proyecto' }}" class="rounded-2xl w-full h-full object-cover">
                    </div>
                    @endforeach
                </div>
                {{-- Flechas --}}
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>
    <section class="section">

        <!-- Dirección -->
        <div class="text-center my-8">
            <h2 class="text-2xl font-bold leading-tight md:text-3xl ">
                <i class="las la-map-marker text-3xl text-orange md:text-4xl "aria-hidden="true"></i>
                Visítanos nuestras oficionas en <br>
                <span class="text-green">
                    Cal. los Antares Nro. 320, Torre B Dpto. 407 Santiago de Surco
                </span>
            </h2>
        </div>

       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.7875888482818!2d-76.98794409999999!3d-12.126681000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c7f53709d4c5%3A0xa2cad75c27a0e021!2sCentro%20Empresarial%20nuevo%20Trigal%2C%20C.%20Los%20Antares%20320%2C%20Santiago%20de%20Surco%20LIMA%2033!5e0!3m2!1ses-419!2spe!4v1783372585297!5m2!1ses-419!2spe" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
    </section>
@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:title" content="{{$seo['title']}}" />
    <meta property="og:description" content="{{$seo['description']}}" />
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
