@extends('layouts.web')

@section('content')

    <section class="banner-category container-fluid">
        <img src="{{asset('images/proyectos.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title"> Nuestros Proyectos</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> Elsvan Inmobiliaria</p>
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

    <section class="section">
        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 my-5">
            @foreach($articles as $article)
                <article class="p-5 bg-white rounded-lg border border-gray-200 shadow-md ">
                    <a href="{{ route('noticias.show', $article) }}">
                        <img class="w-full mb-4 rounded-lg" src="{{ $article->image ? Storage::disk('public')->url($article->image) : '' }}" alt="">
                    </a>
                    <h2 class="mb-2 text-2xl tracking-tight text-gray-900 "><a href="{{ route('noticias.show', $article) }}"> {{Str::limit($article->title,60)}} </a></h2>
                    <p class="mb-5 font-light text-gray-500 ">{{  Str::limit($article->excerpt , 200)}}</p>
                    <div class="flex justify-between items-center color-blue">
                        <div class="flex items-center space-x-4">
                            <span class="font-medium"> {{date('d M Y', strtotime($article->published_at))}}</span>
                        </div>
                        <a href="{{ route('noticias.show', $article) }}" class="inline-flex items-center font-medium  hover:underline">
                            Leer más <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>
        <div class="mt-8 flex justify-center">
            {{ $articles->links() }}
        </div>
    </section>
@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
