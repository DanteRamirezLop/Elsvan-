@extends('layouts.web')

@section('content')
<div class="py-5"></div>
<section class="location-section">
    <div class="grid w-full items-start gap-10 lg:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
        <!-- COLUMNA DERECHA -->
        <div class="h-full flex items-center">
            <section class="w-full max-w-[680px]">
                <!-- Título -->
                <h1 class="mb-6 text-2xl font-bold  text-primary sm:text-[40px] sm:leading-tight">
                    Cotiza y elige tu nuevo departamento en <span class="text-green"> {{$project->name}}</span>
                </h1>
                <form action="#" method="POST" class="space-y-4">
                    <!-- Tipo de departamento -->
                    <div>
                        <label for="departamento" class="mb-1.5 block text-sm font-medium sm:text-base">
                            Selecciona el tipo de departamento
                        </label>

                        <select
                            id="departamento"
                            name="departamento"
                            required
                            class="h-12 w-full appearance-none rounded-full border-2 border-[#FF8A48] bg-white px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                        >
                            <option value="" selected disabled>
                                Seleccionar departamento
                            </option>
                            <option value="flat">Flat</option>
                            <option value="duplex">Dúplex</option>
                            <option value="penthouse">Penthouse</option>
                        </select>
                    </div>

                    <!-- Nombre y celular -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-7">

                        <div>
                            <label
                                for="nombre"
                                class="mb-1.5 block text-sm font-medium sm:text-base"
                            >
                                Nombre
                            </label>

                            <input
                                id="nombre"
                                name="nombre"
                                type="text"
                                autocomplete="name"
                                class="h-12 w-full rounded-full border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                            >
                        </div>

                        <div>
                            <label
                                for="celular"
                                class="mb-1.5 block text-sm font-medium sm:text-base"
                            >
                                Celular*
                            </label>

                            <input
                                id="celular"
                                name="celular"
                                type="tel"
                                required
                                autocomplete="tel"
                                class="h-12 w-full rounded-full border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                            >
                        </div>

                    </div>

                    <!-- Documento -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-7">

                        <div>
                            <label
                                for="tipo_documento"
                                class="mb-1.5 block text-sm font-medium sm:text-base"
                            >
                                Tipo Documento
                            </label>

                            <select
                                id="tipo_documento"
                                name="tipo_documento"
                                class="h-12 w-full appearance-none rounded-full border-2 border-[#FF8A48] bg-white px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                            >
                                <option value="" selected disabled>Seleccione</option>
                                <option value="dni">DNI</option>
                                <option value="ce">Carné de extranjería</option>
                                <option value="pasaporte">Pasaporte</option>
                            </select>
                        </div>

                        <div>
                            <label
                                for="numero_documento"
                                class="mb-1.5 block text-sm font-medium sm:text-base"
                            >
                                Número Documento
                            </label>

                            <input
                                id="numero_documento"
                                name="numero_documento"
                                type="text"
                                inputmode="numeric"
                                class="h-12 w-full rounded-full border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                            >
                        </div>

                    </div>

                    <!-- Email -->
                    <div>
                        <label
                            for="email"
                            class="mb-1.5 block text-sm font-medium sm:text-base"
                        >
                            Email*
                        </label>

                        <input
                            id="email"
                            name="email"
                            type="email"
                            required
                            autocomplete="email"
                            class="h-12 w-full rounded-full border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                        >
                    </div>

                    <!-- Mensaje -->
                    <div>
                        <label
                            for="mensaje"
                            class="mb-1.5 block text-sm font-medium sm:text-base"
                        >
                            Mensaje
                        </label>

                        <textarea
                            id="mensaje"
                            name="mensaje"
                            rows="4"
                            class="min-h-[115px] w-full resize-y rounded-[28px] border-2 border-[#FF8A48] px-5 py-4 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                        ></textarea>
                    </div>

                    <!-- Términos -->
                    <label class="flex cursor-pointer items-start gap-2 text-sm sm:items-center sm:text-base">
                        <input
                            type="checkbox"
                            name="terminos"
                            required
                            class="mt-0.5 h-4 w-4 cursor-pointer accent-blue-600 sm:mt-0"
                        >

                        <span>
                            He leído y acepto los
                            <a
                                href="#"
                                class="font-medium transition hover:text-primary hover:underline"
                            >
                                Términos y condiciones
                            </a>
                        </span>
                    </label>

                    <!-- Botón -->
                    <div class="flex justify-center pt-2">
                        <button
                            type="submit"
                            class="min-w-[125px] rounded-full bg-primary px-8 py-3 text-base font-bold uppercase text-white shadow-sm transition duration-300 hover:-translate-y-0.5 hover:bg-[#e95000] hover:shadow-md focus:outline-none focus:ring-4 focus:ring-orange-200"
                        >
                            Enviar
                        </button>
                    </div>

                </form>
            </section>

        </div>

        <!-- COLUMNA IZQUIERDA -->
        <div class="min-w-0 self-center">
            <div class="rounded-xl relative overflow-hidden bg-gray-200 shadow-lg">
                <img src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}" alt="{{$project->name}}" class="h-full w-full object-cover">
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
