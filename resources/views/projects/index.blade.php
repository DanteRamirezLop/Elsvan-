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

    <section class="section-projects py-12" >
        <!-- Grid de proyectos -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
            <article class="project-card">
                <a href="{{ route('proyectos.show', $project) }}">
                    <div class="rounded-t-xl project-image relative overflow-hidden bg-gray-200 shadow-lg">
                        @if($project->tag == 'vendido')
                            <div class="absolute inset-0 z-20 flex items-center justify-center">
                                <span class="rounded-lg bg-white px-10 py-3 text-2xl font-extrabold uppercase text-orange shadow-lg">
                                     {{$project->tag}}
                                </span>
                            </div>
                        @else
                            <div class="uppercase absolute left-0 top-0 z-20 flex h-14 w-full items-center justify-center bg-green-tranparence px-4 text-center text-xl font-extrabold text-white">
                                {{$project->tag}}
                            </div>
                        @endif

                        <img src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}" alt="{{$project->name}}" class="h-full w-full object-cover">
                    </div>
                </a>
                <div class=" rounded-b-xl bg-brown px-5 py-4 text-center shadow-project">
                    <h2 class="text-xl font-extrabold uppercase text-green">
                        {{$project->name}}
                    </h2>
                    <p class="text-white">
                        {{$project->location}}
                    </p>
                    <div class="project-list-details">
                        <div class="project-list-detail-box ">
                            <i class="la la-bed text-2xl text-gray-200 mr-1" aria-hidden="true"></i>
                            <span class="project-list-detail-text">{{$project->rooms_from}} </span>
                        </div>
                        <div class="project-list-detail-box ">
                            <i class="la la-bath text-2xl text-gray-200 mr-1" aria-hidden="true"></i>
                            <span class="project-list-detail-text">{{$project->bathrooms_from}} </span>
                        </div>
                        <div class="project-list-detail-box ">
                            <i class="la la-ruler-combined text-2xl text-gray-200 mr-2" aria-hidden="true"></i>
                            <span class="project-list-detail-text">Desde {{ number_format($project->area_from,0)}} m² </span>
                        </div>
                    </div>
                    <p class="mt-1 text-sm">
                        <span class="text-gray-200"> Entrega: </span> <strong class="text-white"> {{$project->delivery_date}}  </strong>
                    </p>
                </div>
            </article>
            @endforeach
        </div>
        <div class="mt-10">
            {{ $projects->links() }}
        </div>
    </section>
@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
