@extends('layouts.web')

@section('content')
    <livewire:slider/>

    <livewire:marquee/>

    <section class="about-section">
        <div class="about-text">
            <div class="marquee">
                Elsvan Inmobiliaria construyendo confianza
            </div>
            @if(isset($page->content))
                <p>{!! $page->content !!}</p>
            @endif
            <div id="estadisticas">
                <div class="estadistica-item">
                    <span class="estadistica-numero" data-count-target="{{ $year }}">0</span>
                    <span class="estadistica-label">Años de experiencia</span>
                </div>
                <div class="estadistica-item">
                    <span class="estadistica-numero" data-count-target="{{ $projectsCount }}">0</span>
                    <span class="estadistica-label">Proyectos entregados</span>
                </div>
            </div>
        </div>
        <div class="about-image">
            <img src="{{ isset($page) &&  $page->image ? Storage::disk('public')->url($page->image) : '' }}" alt="Proyecto inmobiliario ELSVAN" class="fade-zoom-img">
        </div>
    </section>

    @if(count($projects))
     <section class="section-projects">
        <div class="mx-auto flex flex-col justify-center gap-5 md:gap-10 pt-6  lg:flex-row lg:items-center lg:justify-between p-6 md:p-0">
            <!-- Contenido -->
            <div>
                <span class="mb-2 block text-[12px] font-semibold uppercase text-[#292929]
                        md:text-[14px] lg:text-[18px]">
                     Mira nuestros departamentos en venta
                </span>
                <h2 class="text-3xl  font-bold  md:text-4xl text-brown">
                    Tu nuevo hogar te espera
                </h2>
            </div>

            <!-- Botón -->
            <div class="shrink-0">
                <a
                    href="{{route('proyectos.index')}}"
                    class="inline-flex min-h-[55px] min-w-[240px] items-center justify-center rounded-[16px]
                        border-2 border-[#EA6109] px-8 text-[18px] font-bold text-[#EA6109]
                        transition duration-300 hover:bg-[#EA6109] hover:text-white
                        focus:outline-none focus:ring-4 focus:ring-[#EA6109]/20
                        md:text-[20px]">
                    Ver Proyectos
                </a>
            </div>
        </div>

        <div class="pt-1 sm:pt-6 md:pt-10" >
        <!-- Grid de proyectos -->
        <div class="grid grid-cols-1 gap-x-8 gap-y-2 sm:gap-y-8 md:gap-y-12 sm:grid-cols-2 lg:grid-cols-3">
            @foreach($projects as $project)
            <article class="project-card p-5 md:p-1">
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

        </div>
    </section>
    @endif

    <section class="section-projects">
        <div class="mb-8 mx-auto flex flex-col justify-center gap-5 md:gap-10 pt-2 lg:flex-row lg:items-center lg:justify-between p-6 md:p-0">
            <!-- Contenido -->
            <div>
                <span class="mb-2 block text-[12px] font-semibold uppercase text-[#292929]
                        md:text-[14px] lg:text-[18px]">
                       Elsvan Inmobiliaria
                </span>

                <h2 class="text-3xl  font-bold  md:text-4xl text-brown">
                     Visita nuestros proyectos
                </h2>
            </div>

            <!-- Botón -->
             <div class="shrink-0">
                <a href="{{route('proyectos.index')}}"
                    class="inline-flex min-h-[55px] min-w-[240px] items-center justify-center rounded-[16px]
                        border-2 border-[#EA6109] px-8 text-[18px] font-bold text-[#EA6109]
                        transition duration-300 hover:bg-[#EA6109] hover:text-white
                        focus:outline-none focus:ring-4 focus:ring-[#EA6109]/20
                        md:text-[20px]">
                    Ver Proyectos
                </a>
            </div>
        </div>

        @if(isset($page->info_1))
         {!! $page->info_1 !!}
        @endif
    </section>

     <section class="relative min-h-screen overflow-hidden bg-contact lg:h-[668px] lg:min-h-0">
        <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col lg:h-full lg:min-h-0 lg:flex-row">
            <div class="relative hidden min-h-[430px] w-full items-end justify-center min-[1021px]:flex lg:min-h-0 lg:w-[46%] lg:justify-start">
                <img src="{{asset('images/ventas.webp')}}" alt="Contactanos"
                    class="relative z-10 h-auto max-h-[480px] w-auto max-w-[90%]
                           object-contain drop-shadow-[0_6px_7px_rgba(0,0,0,0.22)]
                           lg:absolute lg:bottom-0 lg:left-1/2 lg:-translate-x-1/2
                           lg:max-h-[92%] lg:max-w-none">
            </div>
            <div class="flex justify-center w-full items-center px-6 pb-12 lg:w-[54%] lg:px-10 lg:pb-0 lg:pr-[7%]">
                    <div class="w-full max-w-[650px] my-12">

                        <h1 class="mb-6 text-center text-[30px] font-extrabold leading-tight text-white sm:text-[34px]">
                            CONTÁCTANOS AHORA
                        </h1>

                        <form id="contactForm" method="POST" class="space-y-4" novalidate>
                            <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                                <div>
                                    <label for="nombres" class="mb-1.5 block text-[16px] font-medium text-white">
                                        Nombres
                                    </label>

                                    <input id="nombres" name="nombres" type="text" placeholder="Jane" required class="h-[46px] w-full rounded-2xl border border-gray-300
                                            bg-white px-3 text-sm text-gray-800 outline-none
                                            transition placeholder:text-gray-400
                                            focus:border-green-600 focus:ring-2 focus:ring-green-600/20">
                                </div>

                                <div>
                                    <label for="apellidos" class="mb-1.5 block text-[16px] font-medium text-white">
                                        Apellidos
                                    </label>

                                    <input id="apellidos"
                                        name="apellidos"
                                        type="text"
                                        placeholder="Smitherton"
                                        required
                                        class="h-[46px] w-full rounded-2xl border border-gray-300
                                            bg-white px-3 text-sm text-gray-800 outline-none
                                            transition placeholder:text-gray-400
                                            focus:border-green-600 focus:ring-2 focus:ring-green-600/20">
                                </div>
                            </div>

                            <div>
                                <label for="celular" class="mb-1.5 block text-[16px] font-medium text-white">
                                    Celular
                                </label>

                                <input id="celular" name="celular" type="tel"
                                    placeholder="+51 123 123 123"
                                    required
                                    class="h-[46px] w-full rounded-2xl border border-gray-300
                                        bg-white px-3 text-sm text-gray-800 outline-none
                                        transition placeholder:text-gray-400
                                        focus:border-green-600 focus:ring-2 focus:ring-green-600/20">
                            </div>
                            <!-- Correo -->
                            <div>
                                <label for="correo" class="mb-1.5 block text-[16px] font-medium text-white">
                                    Correo electrónico
                                </label>

                                <input id="correo"
                                    name="correo"
                                    type="email"
                                    placeholder="email@dominio.com"
                                    required
                                    class="h-[46px] w-full rounded-2xl border border-gray-300
                                        bg-white px-3 text-sm text-gray-800 outline-none
                                        transition placeholder:text-gray-400
                                        focus:border-green-600 focus:ring-2 focus:ring-green-600/20">
                            </div>
                            <div>
                                <label for="solicitud"
                                    class="mb-1.5 block text-[16px] font-medium text-white">
                                    Tu solicitud
                                </label>
                                <textarea
                                    id="solicitud"
                                    name="solicitud"
                                    rows="5"
                                    placeholder="Escribe tu consulta o mensaje"
                                    required
                                    class="min-h-[154px] w-full resize-none rounded-2xl
                                        border border-gray-300 bg-white px-3 py-3
                                        text-sm text-gray-800 outline-none transition
                                        placeholder:text-gray-400 focus:border-green-600
                                        focus:ring-2 focus:ring-green-600/20 "
                                ></textarea>
                            </div>
                            <!-- Botón -->
                            <button
                                id="contactFormSubmit"
                                type="submit"
                                class="flex h-[45px] w-full items-center justify-center
                                    rounded-2xl bg-brown px-6 text-[16px] font-bold
                                    text-white transition duration-200
                                    hover:scale-[1.02] hover:bg-zinc-800 hover:shadow-lg
                                    focus:outline-none
                                    focus:ring-2 focus:bg-black
                                    focus:ring-offset-2 focus:ring-offset-[#fb6200] cursor-pointer" >
                                Enviar
                            </button>
                        </form>
                    </div>
            </div>
        </div>
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

