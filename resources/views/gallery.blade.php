@extends('layouts.web')

@section('content')
  <section class="banner-category container-fluid">
        <img src="{{asset('images/sobre-nosotros.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title"> Galeria</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> Elsvan Inmobiliaria </p>
        </div>
    </section>

    <section class="bg-white py-10">
    <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

        <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
            @foreach ($images as $image)
                @php
                    // Posiciones: 0, 1, 2, 3, 4 y vuelve a comenzar
                    $position = $loop->index % 6;
                @endphp

                <figure class="
                        group relative overflow-hidden rounded-[24px] bg-gray-100
                        @if ($position === 2 || $position === 5)
                             aspect-[4/3] md:col-span-2 md:aspect-[2.18/1]
                        @else
                            aspect-[4/3] md:aspect-[1.8/1]
                        @endif
                    ">

                    <a href="{{ $image->image ? Storage::disk('public')->url($image->image) : '' }}" data-lightbox="imagen" data-title="Descripción de la imagen" class="block h-full w-full">
                        <img
                            src=" {{ $image->image ? Storage::disk('public')->url($image->image) : '' }} "
                            alt="{{ $image->alt ?? 'Galería del proyecto' }}"
                            loading="lazy"
                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
                        <div class="absolute inset-0 flex flex-col items-center justify-center bg-black/50 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                            <span class="text-white font-semibold text-lg tracking-wide">Ver Imagen</span>
                        </div>
                    </a>
                </figure>
            @endforeach
        </div>

    </div>

        <div class="mt-8 flex justify-center">
            {{ $images->links() }}
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


@endpush
