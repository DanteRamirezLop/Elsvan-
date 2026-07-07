@extends('layouts.web')

@section('content')
    <section class="relative min-h-screen overflow-hidden bg-orange lg:h-[668px] lg:min-h-0">
        <div class="mx-auto flex min-h-screen w-full max-w-[1440px] flex-col lg:h-full lg:min-h-0 lg:flex-row">
            <div class="relative hidden min-h-[430px] w-full items-end justify-center min-[1021px]:flex lg:min-h-0 lg:w-[46%] lg:justify-start">
                <img src="{{asset('images/ingeniero-elsvan.png')}}" alt="Ingeniero revisando un proyecto"
                    class="relative z-10 h-auto max-h-[480px] w-auto max-w-[90%]
                           object-contain drop-shadow-[0_6px_7px_rgba(0,0,0,0.22)]
                           lg:absolute lg:bottom-0 lg:left-[5%] lg:max-h-[92%]
                           lg:max-w-none xl:left-[8%]">
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
                                        focus:ring-2 focus:ring-green-600/20"
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
                                    focus:ring-offset-2 focus:ring-offset-[#fb6200]" >
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

@push('javascript')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        (function () {
            const form = document.getElementById('contactForm');
            const submitBtn = document.getElementById('contactFormSubmit');
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
                { field: form.nombres, label: 'Nombres' },
                { field: form.apellidos, label: 'Apellidos' },
                { field: form.celular, label: 'Celular' },
                { field: form.correo, label: 'Correo electrónico' },
                { field: form.solicitud, label: 'Tu solicitud' },
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

                if (!emailRegex.test(form.correo.value.trim())) {
                    Toast.fire({
                        icon: 'warning',
                        title: 'Revisa el formulario',
                        text: 'Ingresa un correo electrónico válido.',
                    });
                    form.correo.focus();
                    return false;
                }
                return true;
            }

            form.addEventListener('submit', function (event) {
                event.preventDefault();

                if (!validateForm()) {
                    return;
                }

                const payload = {
                    nombres: form.nombres.value,
                    apellidos: form.apellidos.value,
                    celular: form.celular.value,
                    correo: form.correo.value,
                    solicitud: form.solicitud.value,
                };

                submitBtn.disabled = true;

                fetch('{{ route('contactanos.send') }}', {
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
                                title: 'Consulta enviada',
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
                            text: 'No pudimos enviar tu consulta. Inténtalo nuevamente.',
                        });
                    })
                    .finally(function () {
                        submitBtn.disabled = false;
                    });
            });
        })();
    </script>
@endpush
