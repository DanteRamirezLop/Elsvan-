@extends('layouts.web')

@section('content')
<div class="py-0 lg:py-5"></div>
<section class="location-section">
    <div class="grid w-full items-start gap-10 lg:grid-cols-[1fr_1fr] lg:gap-16" aria-label="Departamentos disponibles">
        <!-- COLUMNA DERECHA -->
        <div class="h-full flex items-center">
            <section class="w-full max-w-[680px]">
                <!-- Título -->
                <h1 class="mb-6 text-2xl font-bold  text-primary sm:text-[40px] sm:leading-tight">
                    Cotiza y elige tu nuevo departamento en <span id="proyecto-nombre" class="text-green"> {{$project->name}}</span>
                </h1>
                <form id="quoteForm" method="POST" class="space-y-4" novalidate>
                    <!-- Proyecto -->
                    <div>
                        <label for="proyecto" class="mb-1.5 block text-sm font-medium sm:text-base">
                            Selecciona el proyecto
                        </label>

                        <select
                            id="proyecto"
                            name="proyecto"
                            required
                            class="h-12 w-full appearance-none rounded-2xl border-2 border-[#FF8A48] bg-white px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                        >
                            <option value="" disabled {{ $project ? '' : 'selected' }}>
                                Seleccionar proyecto
                            </option>
                            @foreach($projects as $item)
                                <option
                                    value="{{ $item->slug }}"
                                    data-name="{{ $item->name }}"
                                    data-image="{{ $item->main_image ? Storage::disk('public')->url($item->main_image) : '' }}"
                                    data-blueprints="{{ $item->blueprints->pluck('name')->toJson() }}"
                                    {{ $project && $project->id === $item->id ? 'selected' : '' }}
                                >
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Plano del proyecto -->
                    <div>
                        <label for="departamento" class="mb-1.5 block text-sm font-medium sm:text-base">
                            Selecciona el plano
                        </label>

                        <select
                            id="departamento"
                            name="departamento"
                            required
                            class="h-12 w-full appearance-none rounded-2xl border-2 border-[#FF8A48] bg-white px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
                        >
                            <option value="" selected disabled>
                                Seleccionar plano
                            </option>
                        </select>
                    </div>

                    <!-- Nombre y celular -->
                    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 sm:gap-7">

                        <div>
                            <label for="nombre" class="mb-1.5 block text-sm font-medium sm:text-base">
                                Nombre
                            </label>

                            <input
                                id="nombre"
                                name="nombre"
                                type="text"
                                autocomplete="name"
                                required
                                class="h-12 w-full rounded-2xl border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
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
                                autocomplete="tel"
                                required
                                class="h-12 w-full rounded-2xl border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
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
                                required
                                class="h-12 w-full appearance-none rounded-2xl border-2 border-[#FF8A48] bg-white px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
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
                                required
                                class="h-12 w-full rounded-2xl border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
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
                            class="h-12 w-full rounded-2xl border-2 border-[#FF8A48] px-5 text-sm outline-none transition focus:border-primary focus:ring-2 focus:ring-orange-100"
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
                            id="terminos"
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
                    <button
                        id="quoteFormSubmit"
                        type="submit"
                        class="flex h-[45px] w-full items-center justify-center
                            rounded-2xl bg-brown px-6 text-[16px] font-bold
                            text-white transition duration-200
                            hover:scale-[1.02] hover:bg-zinc-800 hover:shadow-lg
                            focus:outline-none
                            focus:ring-2 focus:bg-black
                            focus:ring-offset-2 focus:ring-offset-[#fb6200]" >
                        Enviar
                    </button>

                </form>
            </section>

        </div>

        <!-- COLUMNA IZQUIERDA -->
        <div class="min-w-0 self-center">
            <div class="rounded-xl relative overflow-hidden bg-gray-200 shadow-lg">
                <img id="proyecto-imagen" src="{{ $project->main_image ? Storage::disk('public')->url($project->main_image) : '' }}" alt="{{$project->name}}" class="h-full w-full object-cover">
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const select = document.getElementById('proyecto');
            const nombre = document.getElementById('proyecto-nombre');
            const imagen = document.getElementById('proyecto-imagen');
            const departamento = document.getElementById('departamento');

            if (!select) return;

            function updatePlanos(option) {
                if (!departamento) return;

                let blueprints = [];
                try {
                    blueprints = JSON.parse(option.dataset.blueprints || '[]');
                } catch (e) {
                    blueprints = [];
                }

                departamento.innerHTML = '';

                const placeholder = document.createElement('option');
                placeholder.value = '';
                placeholder.disabled = true;
                placeholder.selected = true;
                placeholder.textContent = blueprints.length ? 'Seleccionar plano' : 'No hay planos disponibles';
                departamento.appendChild(placeholder);

                blueprints.forEach((name) => {
                    const opt = document.createElement('option');
                    opt.value = name;
                    opt.textContent = name;
                    departamento.appendChild(opt);
                });
            }

            select.addEventListener('change', () => {
                const option = select.options[select.selectedIndex];

                if (nombre) {
                    nombre.textContent = ' ' + option.dataset.name;
                }

                if (imagen) {
                    imagen.src = option.dataset.image || '';
                    imagen.alt = option.dataset.name || '';
                }

                updatePlanos(option);
            });

            const initialOption = select.options[select.selectedIndex];
            if (initialOption) {
                updatePlanos(initialOption);
            }
        });

        (function () {
            const form = document.getElementById('quoteForm');
            const submitBtn = document.getElementById('quoteFormSubmit');
            const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2800,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            const emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            const requiredFields = [
                { field: form.proyecto, label: 'Proyecto' },
                { field: form.departamento, label: 'Plano del proyecto' },
                { field: form.nombre, label: 'Nombre' },
                { field: form.celular, label: 'Celular' },
                { field: form.tipo_documento, label: 'Tipo de documento' },
                { field: form.numero_documento, label: 'Número de documento' },
                { field: form.email, label: 'Email' },
            ];

            function validateForm() {
                for (const { field, label } of requiredFields) {
                    if (!field.value.trim()) {
                        Toast.fire({
                            icon: 'warning',
                            title: 'Revisa el formulario',
                            text: `El campo "${label}" es obligatorio.`,
                        });
                        field.focus();
                        return false;
                    }
                }

                if (!emailRegex.test(form.email.value.trim())) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Revisa el formulario',
                        text: 'Ingresa un correo electrónico válido.',
                    });
                    form.email.focus();
                    return false;
                }

                if (!form.terminos.checked) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Revisa el formulario',
                        text: 'Debes aceptar los términos y condiciones.',
                    });
                    form.terminos.focus();
                    return false;
                }
                return true;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                const proyectoOption = form.proyecto.options[form.proyecto.selectedIndex];
                const departamentoOption = form.departamento.options[form.departamento.selectedIndex];

                const payload = {
                    proyecto: proyectoOption ? proyectoOption.text : form.proyecto.value,
                    departamento: departamentoOption ? departamentoOption.text : form.departamento.value,
                    nombre: form.nombre.value,
                    celular: form.celular.value,
                    tipo_documento: form.tipo_documento.value,
                    numero_documento: form.numero_documento.value,
                    email: form.email.value,
                    mensaje: form.mensaje.value,
                    terminos: form.terminos.checked,
                };

                submitBtn.disabled = true;

                fetch('{{ route('quote.send') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': token,
                    },
                    body: JSON.stringify(payload),
                })
                    .then(async (response) => {
                        const data = await response.json();

                        if (response.ok) {
                            Toast.fire({
                                icon: 'success',
                                title: 'Cotización enviada',
                                text: data.message,
                            });
                            form.reset();
                        } else if (response.status === 422) {
                            const firstError = Object.values(data.errors)[0][0];
                            Toast.fire({
                                icon: 'warning',
                                title: 'Revisa el formulario',
                                text: firstError,
                            });
                        } else {
                            throw new Error(data.message || 'Error al enviar');
                        }
                    })
                    .catch(function () {
                        Toast.fire({
                            icon: 'error',
                            title: 'Ocurrió un error',
                            text: 'No pudimos enviar tu cotización. Inténtalo nuevamente.',
                        });
                    })
                    .finally(function () {
                        submitBtn.disabled = false;
                    });
            });
        })();
    </script>
@endpush
