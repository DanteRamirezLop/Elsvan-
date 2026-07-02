@extends('layouts.web')

@section('content')
    <section class="relative min-h-screen overflow-hidden bg-[#fb6200] lg:h-[668px] lg:min-h-0">
        <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col lg:h-full lg:min-h-0 lg:flex-row">
            <!-- Imagen del trabajador -->
            <div class="relative flex min-h-[430px] w-full items-end justify-center lg:min-h-0 lg:w-[46%] lg:justify-start">
                <img src="{{asset('images/ingeniero-elsvan.png')}}"
                    alt="Ingeniero revisando un proyecto"
                    class="relative z-10 h-auto max-h-[480px] w-auto max-w-[90%]
                           object-contain drop-shadow-[0_6px_7px_rgba(0,0,0,0.22)]
                           lg:absolute lg:bottom-0 lg:left-[5%] lg:max-h-[92%]
                           lg:max-w-none xl:left-[8%]">
            </div>

            <!-- Formulario -->
            <div
                class="flex w-full items-center px-6 pb-12
                       lg:w-[54%] lg:px-10 lg:pb-0 lg:pr-[7%]"
            >
                <div class="w-full max-w-[650px]">

                    <h1
                        class="mb-6 text-center text-[30px] font-extrabold
                               leading-tight text-white sm:text-[34px]"
                    >
                        ¡CONSULTA TU PROYECTO!
                    </h1>

                    <form action="#" method="POST" class="space-y-4">

                        <!-- Nombres y apellidos -->
                        <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                            <div>
                                <label
                                    for="nombres"
                                    class="mb-1.5 block text-[16px] font-medium text-black"
                                >
                                    Nombres
                                </label>

                                <input
                                    id="nombres"
                                    name="nombres"
                                    type="text"
                                    placeholder="Jane"
                                    required
                                    class="h-[46px] w-full rounded-md border border-gray-300
                                           bg-white px-3 text-sm text-gray-800 outline-none
                                           transition placeholder:text-gray-400
                                           focus:border-black focus:ring-2 focus:ring-black/20"
                                >
                            </div>

                            <div>
                                <label
                                    for="apellidos"
                                    class="mb-1.5 block text-[16px] font-medium text-black"
                                >
                                    Apellidos
                                </label>

                                <input
                                    id="apellidos"
                                    name="apellidos"
                                    type="text"
                                    placeholder="Smitherton"
                                    required
                                    class="h-[46px] w-full rounded-md border border-gray-300
                                           bg-white px-3 text-sm text-gray-800 outline-none
                                           transition placeholder:text-gray-400
                                           focus:border-black focus:ring-2 focus:ring-black/20"
                                >
                            </div>

                        </div>

                        <!-- Celular -->
                        <div>
                            <label
                                for="celular"
                                class="mb-1.5 block text-[16px] font-medium text-black"
                            >
                                Celular
                            </label>

                            <input
                                id="celular"
                                name="celular"
                                type="tel"
                                placeholder="+51 123 123 123"
                                required
                                class="h-[46px] w-full rounded-md border border-gray-300
                                       bg-white px-3 text-sm text-gray-800 outline-none
                                       transition placeholder:text-gray-400
                                       focus:border-black focus:ring-2 focus:ring-black/20"
                            >
                        </div>

                        <!-- Correo -->
                        <div>
                            <label
                                for="correo"
                                class="mb-1.5 block text-[16px] font-medium text-black"
                            >
                                Correo electrónico
                            </label>

                            <input
                                id="correo"
                                name="correo"
                                type="email"
                                placeholder="email@dominio.com"
                                required
                                class="h-[46px] w-full rounded-md border border-gray-300
                                       bg-white px-3 text-sm text-gray-800 outline-none
                                       transition placeholder:text-gray-400
                                       focus:border-black focus:ring-2 focus:ring-black/20"
                            >
                        </div>

                        <!-- Solicitud -->
                        <div>
                            <label
                                for="solicitud"
                                class="mb-1.5 block text-[16px] font-medium text-black"
                            >
                                Tu solicitud
                            </label>

                            <textarea
                                id="solicitud"
                                name="solicitud"
                                rows="5"
                                placeholder="Escribe tu consulta o mensaje"
                                required
                                class="min-h-[154px] w-full resize-none rounded-md
                                       border border-gray-300 bg-white px-3 py-3
                                       text-sm text-gray-800 outline-none transition
                                       placeholder:text-gray-400 focus:border-black
                                       focus:ring-2 focus:ring-black/20"
                            ></textarea>
                        </div>

                        <!-- Botón -->
                        <button
                            type="submit"
                            class="flex h-[45px] w-full items-center justify-center
                                   rounded-md bg-black px-6 text-[16px] font-bold
                                   text-white transition duration-200
                                   hover:bg-zinc-800 focus:outline-none
                                   focus:ring-2 focus:ring-black
                                   focus:ring-offset-2 focus:ring-offset-[#fb6200]"
                        >
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
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush
