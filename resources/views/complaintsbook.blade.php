@extends('layouts.web')

@section('content')

        <!-- <section class="banner-category container-fluid">
       </section> -->


        <div>
            <section class="section page-title">
                <h1 class="mt-32 font-bold text-center text-5xl">Libro de reclamaciones</h1>
                <h2 class="text-center my-5 text-2xl">Construcciones Inmobiliarias Elsvan S.A.C.</h2>
                <h3 class="text-center  mt-5 leading-normal">Calle Los Antares 320, Torre B, Oficina 407, Urb. La Alborada, Distrito de Santiago de Surco</h3>
                <span class="">Conforme a lo establecido en el código de protección y defensa del
                    consumidor, esta institución cuenta con un libro de reclamaciones
                    a su disposición.
                </span>
            </section>

            <section class="section">
                    <div class="grid grid-cols-12 gap-4">
                        <div class="col-span-12">
                            <!-- <form action=""> -->
                                <div class="grid grid-cols-12 gap-4">
                                    <div class="col-span-12 mb-4">
                                        <h4 class="text-orange text-xl">HOJA DE RECLAMO</h4>
                                        <div class="flex justify-between">
                                            <strong class="">N° 00{{$number +1}}-{{$anioActual}}</strong>
                                            <input id="numberReclamo" type="hidden" value="N° 00{{$number +1}}-{{$anioActual}}">
                                            <strong class="ml-5 ">Fecha del reclamo: {{$fechaActual}}</strong>
                                            <input id="fechaReclamo" type="hidden" value="{{$fechaActual}}">
                                        </div>
                                    </div>
                                    <div class="col-span-12 mb-2">
                                        <h4 class="text-orange text-xl">1. Identificación del Consumidor reclamante:</h4>
                                    </div>

                                    <div class="col-span-12 mb-1">
                                        <div class="flex items-center m-[5px]">
                                            <input id="persona" type="radio" value="persona" name="empresaPersona" checked class="h-5 w-5">
                                            <label for="persona" class="ml-2 ">Persona natural</label>
                                            <input id="empresa" type="radio" value="empresa" name="empresaPersona" class="h-5 w-5 ml-[10px]">
                                            <label for="empresa" class="ml-2 ">Empresa</label>
                                        </div>
                                    </div>

                                    <div class="col-span-12" id="isPerson">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-12 md:col-span-6">
                                                <input id="nombre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" type="text" placeholder="Nombre" required>
                                            </div>
                                            <div class="col-span-12 md:col-span-6">
                                                <input id="apellidos" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="Apellidos" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12" id="isBusiness" style="display:none">
                                        <input id="business" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="Razón Social" required>
                                    </div>

                                    <div class="col-span-12">
                                        <input id="direccion" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="Dirección" required>
                                    </div>

                                    <div class="col-span-12 md:col-span-6">
                                        <input id="correo" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="Correo" required>
                                    </div>

                                    <div class="col-span-12 md:col-span-6">
                                        <input id="telefono" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="Teléfono" required>
                                    </div>

                                    <div class="col-span-12 md:col-span-6">
                                        <select name="Tipo de Documento" id="tipodoc" value="" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" >
                                            <option value="" selected disabled >Tipo de Documento</option>
                                            <option value="DNI" class="text-black">DNI</option>
                                            <option value="PASAPORTE">PASAPORTE</option>
                                            <option value="RUC">RUC</option>
                                        </select>
                                    </div>

                                    <div class="col-span-12 md:col-span-6">
                                        <input id="documento" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" placeholder="N° de Documento" required>
                                    </div>

                                    <div id="questionEdad" class="col-span-12">
                                        <strong class=" ml-2 mb-2">
                                            ¿El reclamante es menor de edad?
                                        </strong>
                                        <div class="flex items-center m-[5px]">
                                            <input id="mayor" type="radio" value="mayor" name="mayoriaEdad" checked class="h-5 w-5">
                                            <label for="mayor" class="ml-2 ">No</label>
                                            <input id="menor" type="radio" value="menor" name="mayoriaEdad" class="h-5 w-5 ml-[10px]">
                                            <label for="menor" class="ml-2 ">Si</label>
                                        </div>
                                    </div>

                                    <div id="menorEdad" class="col-span-12" style="display: none;">
                                        <div class="grid grid-cols-12 gap-4">
                                            <div class="col-span-12 md:col-span-6">
                                                <input id="nombre_padre" placeholder="Nombre del padre o de la madre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" >
                                            </div>

                                            <div class="col-span-12 md:col-span-6">
                                                <input id="documento_padre" placeholder="Documento del padre o de la madre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" >
                                            </div>

                                            <div class="col-span-12 md:col-span-6">
                                                <input id="telefono_padre" placeholder="Teléfono del padre o de la madre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" >
                                            </div>

                                            <div class="col-span-12 md:col-span-6">
                                                <input id="correo_padre" placeholder="Correo del padre o de la madre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" >
                                            </div>

                                            <div class="col-span-12">
                                                <input id="direccion_padre" placeholder="Dirección del padre o de la madre" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  type="text" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-span-12 mb-2 mt-4">
                                        <h4 class="text-orange">2. Identificación del Bien contratado:</h4>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="flex items-center mb-[10px]">
                                            <input id="servicio" type="radio" value="Servicio" name="serviceProduct" checked class="h-5 w-5">
                                            <label for="servicio" class="ml-2 ">Servicio</label>
                                            <input id="producto" type="radio" value="Producto" name="serviceProduct" class="h-5 w-5 ml-[10px]">
                                            <label for="producto" class="ml-2 ">Producto</label>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <textarea id="bienContratado" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  rows="5" placeholder="Descrición"></textarea>
                                    </div>



                                    <div class="col-span-12 mb-2 mt-4">
                                        <h4 class="text-orange">3. Detalle de la Reclamación y Pedido del consumidor:</h4>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="flex items-center mb-[10px]">
                                            <input id="default-radio-1" type="radio" value="Queja" name="quejaReclamo" checked class="h-5 w-5">
                                            <label for="default-radio-1" class="ml-2 ">Queja</label>
                                            <input id="default-radio-2" type="radio" value="Reclamo" name="quejaReclamo" class="h-5 w-5 ml-[10px]">
                                            <label for="default-radio-2" class="ml-2 ">Reclamo</label>
                                        </div>
                                    </div>

                                    <div class="col-span-12">
                                        <textarea id="description" class=" border border-default-medium text-heading text-sm rounded-md focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"  rows="5" placeholder="Descrición"></textarea>
                                    </div>

                                    <div class="col-span-12 mb-2 mt-4">
                                        <h4 class="text-orange">4. Observaciones y acciones adoptadas por el Proveedor:</h4>
                                    </div>

                                    <div class="col-span-12 mb-2 mt-2">
                                        <p class="">Al ser un reclamo virtual su caso será derivado al área de atención al cliente, a fin de dar respuesta dentro del plazo legalmente establecido.* <p>
                                    </div>

                                    <div class="col-span-12 mb-2 mt-4">
                                        <h4 class="text-orange">5. Autorizo notificación del resultado del reclamo al e-mail consignado:</h4>
                                    </div>

                                    <div class="col-span-12">
                                        <div class="flex items-center mb-[10px]">
                                            <input id="default-radio1" type="radio" value="Si" name="autorizo" checked class="h-5 w-5">
                                            <label for="default-radio1" class="ml-2 ">Si</label>
                                            <input id="default-radio2" type="radio" value="No" name="autorizo" class="h-5 w-5 ml-[10px]">
                                            <label for="default-radio2" class="ml-2 ">No</label>
                                        </div>
                                        <p class=" mb-4">Todos los campos son obligatorios (*)</p>
                                        <div>
                                            <label class=""><input type="checkbox" id="politicas" class="h-[15px] w-[15px]"> He leído las <a href="{{route('privacypolicies')}}" target="_blank"> <strong> políticas de privacidad.</a></strong> </label>
                                        </div>
                                        <div>
                                            <label class=""><input type="checkbox" id="terminos" class="h-[15px] w-[15px]"> He leído los <a href="{{route('termsandconditions')}}" target="_blank"> <strong> Términos y condiciones.</a></strong> </label>
                                        </div>
                                        <div class=" mt-2">*La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito previo.</div>
                                        <div class=" mt-2 mb-2"> *El proveedor deberá dar respuesta al reclamo en un plazo no mayor a quince (15) días hábiles.</div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="col-span-12 text-right mb-5">
                                        <input type="button" class="btn btn--md Enviarconsulta font-bold bg-transparent rounded-[20px] " value="ENVIAR">

                                    </div>
                                </div>
                            <!-- </form> -->

                        </div>
                    </div>

            </section>


        </div>

        <div class="scroll-top-to">
            <i class="ti-angle-up mr-0 leading-none"></i>
        </div>


@endsection

@push('seo')
    <title>{{$seo['title']}}</title>
    <meta name="description" content="{{$seo['description']}}">
    <meta name="keywords" content="{{$seo['keywords']}}">
    <meta property="og:image" itemprop="image" content="{{$seo['image']}}" />
@endpush

   @push('script')
        <script>
            $(document).ready(function() {
            $('input[name="empresaPersona"]').change(function() {
                if ($(this).val() === "persona") {
                    $("#isBusiness").hide();
                     $("#isPerson").show();
                     $("#questionEdad").show();

                    $("#business").val('');
                   $("#tipodoc").val("DNI");


                } else {
                    $("#isBusiness").show();
                    $("#isPerson").hide();
                    $("#questionEdad").hide();

                     $("#nombre").val('');
                    $("#apellidos").val('');
                     $("#tipodoc").val("RUC");
                }
            });
        });
        </script>

        <script>
            $(document).ready(function() {
            $('input[name="mayoriaEdad"]').change(function() {
                if ($(this).val() === "menor") {
                    $("#menorEdad").fadeIn();
                } else {
                    $("#menorEdad").fadeOut();
                }
            });
        });
        </script>
	    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
			let token = $('meta[name="csrf-token"]').attr('content');
			$(function() {
				$(".Enviarconsulta").on('click',function () {
					var nombre = $("#nombre").val();
					var apellidos = $("#apellidos").val();
					var business = $("#business").val();
					let empresaPersona = $('input[name=empresaPersona]:checked').val();

                    var direccion = $("#direccion").val();
                    var correo = $("#correo").val();
					var telefono = $("#telefono").val();
                    var tipodoc = $("#tipodoc option:selected").val();
                    var documento = $("#documento").val();
                    let serviceProduct = $('input[name=serviceProduct]:checked').val();
                    var bienContratado = $("#bienContratado").val();
                    let quejaReclamo = $('input[name=quejaReclamo]:checked').val();
                    var description = $("#description").val();
                    let isAutorizo = $('input[name=autorizo]:checked').val();

                    let menorEdad = $('input[name=mayoriaEdad]:checked').val();
                    var nombre_padre = $("#nombre_padre").val();
                    var direccion_padre = $("#direccion_padre").val();
                    var correo_padre = $("#correo_padre").val();
					var telefono_padre = $("#telefono_padre").val();
                    var documento_padre = $("#documento_padre").val();

                    var numberReclamo = $("#numberReclamo").val();
                    var fechaReclamo = $("#fechaReclamo").val();

                    if(empresaPersona == 'empresa'){
                            if(business == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes que ingresar tu razon social",
    						});
    						return false;
    					}
                    }else{
                            if(nombre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes que ingresar tu nombre",
    						});
    						return false;
    					}

    			        if(apellidos == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes que ingresar tus apellidos",
    						});
    						return false;
    					}
                    }

                    if(direccion == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes ingresar tu dirección",
						});
						return false;
					}

                    if(correo == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes ingresar tu correo electrónico",
						});
						return false;
					}else{
						emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
						if (emailRegex.test(correo) != true) {
							Swal.fire({
								icon:'warning',
								text: "Tienes que ingresar un correo electrónico válido",
							});
							return false;
						}
					}
                    if(telefono == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes ingresar un teléfono",
						});
						return false;
					}

                    if(tipodoc == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que seleccionar tu tipo de documento de identidad",
						});
						return false;
					}

                    if(documento == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que ingresar tu documento de identidad",
						});
						return false;
					}
					if(menorEdad == 'menor'){
                        if(nombre_padre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes ingresar el nombre del padre o de la madre",
    						});
    						return false;
    					}

    					 if(documento_padre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes que ingresar el documento de identidad de la padre o madre",
    						});
    						return false;
    					}

    					 if(telefono_padre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes ingresar un teléfono del padre o de la madre",
    						});
    						return false;
    					}

    					if(correo_padre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes ingresar el correo electrónico del padre o de la madre)",
    						});
    						return false;
    					}else{
    						emailRegex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    						if (emailRegex.test(correo_padre) != true) {
    							Swal.fire({
    								icon:'warning',
    								text: "Tienes que ingresar un correo electrónico válido (*Padre o Madre)",
    							});
    							return false;
    						}
    					}

                        if(direccion_padre == ''){
    						Swal.fire({
    							icon:'warning',
    							text: "Tienes ingresar la dirección del padre o de la madre)",
    						});
    						return false;
    					}
                    }
                    if(bienContratado == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que ingresar la descripción del bien contratado",
						});
						return false;
					}

                    if(description == ''){
						Swal.fire({
							icon:'warning',
							text: "Tienes que ingresar la descripción de la queja ó reclamo",
						});
						return false;
					}

                    if(!$('#terminos').is(':checked')){
                       	Swal.fire({
							icon:'warning',
							text: "Tienes que aceptar los términos y condiciones.",
						});
						return false;
                    }

                     if(!$('#politicas').is(':checked')){
                       	Swal.fire({
							icon:'warning',
							text: "Tienes que aceptar las políticas de privacidad.",
						});
						return false;
                    }
					Swal.fire({
						header: '...',
						title: 'loading...',
						allowOutsideClick:false,
						didOpen: () => {
							Swal.showLoading()
						}
					});

					$.ajax({
						url: "/reclamos",
						method: "post",
						dataType: 'json',
						data: {
							_token: token,
                            numberReclamo: numberReclamo,
                            fechaReclamo: fechaReclamo,
                            name: business + nombre + ' '+ apellidos ,
                            address: direccion ,
                            mail: correo ,
                            phone: telefono ,
                            typedocument: tipodoc ,
                            document: documento ,
                            services: serviceProduct ,
                            hired: bienContratado ,
                            typeclaim: quejaReclamo ,
                            description: description,
                            isauthorization: isAutorizo,
                            father_name: nombre_padre,
                            father_document:documento_padre,
                            father_mail: correo_padre,
                            father_phone: telefono_padre,
                            father_address: direccion_padre,

						},
						success: function (response) {
							if (response.status) {
								Swal.fire({
									icon: 'success',
									title: 'OK',
									text: response.msg,
								}).then((result) => {
                                    location.reload();
                                });

							} else {
								Swal.fire({
									icon: 'warning',
									title: 'Oops...',
									text: response.msg,
								})
							}

                            $("#nombre").val('');
                            $("#apellidos").val('');
                            $("#business").val('');
                            $("#direccion").val('');
                            $("#correo").val('');
					        $("#telefono").val('');
                            $("#tipodoc").val('');
                            $("#documento").val('');
                            $("#bienContratado").val('');
                            $("#description").val('');

                            $("#nombre_padre").val('');
                            $("#documento_padre").val('');
                            $("#correo_padre").val('');
                            $("#telefono_padre").val('');
                            $("#direccion_padre").val('');
						},
						error: function () {
							Swal.fire({
								icon: 'error',
								title: 'Oops...!!',
								text: 'Algo salió mal, Inténtalo más tarde!',
							})
						}
					});
				});
			})
		</script>
    @endpush
