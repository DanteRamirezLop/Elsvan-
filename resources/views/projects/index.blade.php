@extends('layouts.web')

@section('content')

    <section class="banner-category container-fluid">
        <img src="{{asset('images/proyectos.webp')}}" alt="La confianza no se vende se construye" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title tracking-wider"> Nuestros Proyectos</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> Elsvan Inmobiliaria</p>
            <div class="text-center mt-5">
                <a href="{{route('quote')}}" class="btn-banner"> Cotiza aquí </a>
            </div>
        </div>
    </section>

    <livewire:marquee/>

    <section class="section-projects py-12" >
        <!-- Grid de proyectos -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
            <article class="project-card">
                <a href="{{$project->tag == 'vendido' ? '' : route('proyectos.show', $project) }}" class="{{ $project->tag == 'vendido' ? 'project-link-sold' : '' }}">
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
                     <a href="{{$project->tag == 'vendido' ? '' : route('proyectos.show', $project) }}" class="{{ $project->tag == 'vendido' ? 'project-link-sold' : '' }}">
                        <h2 class="text-xl font-extrabold uppercase text-green">
                            {{$project->name}}
                        </h2>
                    </a>
                    <p class="text-white">
                        {{ Str::limit($project->location, 72) }}
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
