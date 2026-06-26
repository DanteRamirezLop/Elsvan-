<footer class="bg-brown text-white">
    <div class="max-w-7xl mx-auto px-6 lg:px-10 pt-12 pb-8">
      <!-- Footer superior -->
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-[1.4fr_1fr_1fr_1fr] gap-10 lg:gap-14 items-start pb-8 border-footer">
        <!-- Logo + redes -->
        <div class="flex flex-col items-center lg:items-start">

          <img src="{{asset('images/logo-blanco.webp')}}" alt="Elsvan Construcciones Inmobiliarias" class="w-full max-w-xs p-6"/>

          <div class="flex gap-5 text-gray-300 text-lg mx-auto">
            <a href="#" class="hover:text-orange transition ">
              <i class="lab la-facebook text-2xl"></i>
            </a>
            <a href="#" class="hover:text-orange transition">
              <i class="lab la-linkedin text-2xl"></i>
            </a>
            <a href="#" class="hover:text-orange transition">
              <i class="lab la-whatsapp text-2xl"></i>
            </a>
            <a href="#" class="hover:text-orange transition">
              <i class="lab la-instagram text-2xl"></i>
            </a>
          </div>
        </div>

        <!-- Menú -->
        <nav class="flex flex-col gap-5 text-center lg:text-left text-[15px] font-medium">
          <a href="{{route('nosotros')}}" class="hover:text-orange-500 transition">Nosotros</a>
          <a href="{{route('proyectos.index')}}" class="hover:text-orange-500 transition">Proyectos</a>
          <a href="{{route('galeria')}}" class="hover:text-orange-500 transition">Galería</a>
          <a href="{{route('contactanos')}}" class="hover:text-orange-500 transition">Contáctanos</a>
          <a href="{{route('termsandconditions')}}" class="hover:text-orange-500 transition">Términos y condiciones</a>

        </nav>

        <!-- Información de contacto -->
        <div class="space-y-7 text-[15px] leading-relaxed min-w-xs">

          <div class="flex gap-5">
             <!-- <i class="las la-home text-orange text-4xl w-8 mt-1"></i> -->
            <div class="flex items-center">
                <svg class="w-10 h-10 text-orange inline " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>
            </div>
            <p>
               <span>Cal. los Antares Nro. 320, Torre B Dpto. 407 Santiago de Surco </span>
            </p>
          </div>

          <div class="flex gap-5">
           <div class="flex items-center">
                <svg class="w-10 h-10 text-orange inline" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M2.038 5.61A2.01 2.01 0 0 0 2 6v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6c0-.12-.01-.238-.03-.352l-.866.65-7.89 6.032a2 2 0 0 1-2.429 0L2.884 6.288l-.846-.677Z"/>
                    <path d="M20.677 4.117A1.996 1.996 0 0 0 20 4H4c-.225 0-.44.037-.642.105l.758.607L12 10.742 19.9 4.7l.777-.583Z"/>
                </svg>
            </div>
            <p>
                <span>ventas@elsvan.pe</span><br/>
                <span>ventas2@elsvan.pe</span><br/>
                <span>ventas3@elsvan.pe</span><br/>
            </p>
          </div>

          <div class="flex gap-5">
            <div class="flex items-center">
                <svg class="w-10 h-10 text-orange inline"  aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path d="M7.978 4a2.553 2.553 0 0 0-1.926.877C4.233 6.7 3.699 8.751 4.153 10.814c.44 1.995 1.778 3.893 3.456 5.572 1.68 1.679 3.577 3.018 5.57 3.459 2.062.456 4.115-.073 5.94-1.885a2.556 2.556 0 0 0 .001-3.861l-1.21-1.21a2.689 2.689 0 0 0-3.802 0l-.617.618a.806.806 0 0 1-1.14 0l-1.854-1.855a.807.807 0 0 1 0-1.14l.618-.62a2.692 2.692 0 0 0 0-3.803l-1.21-1.211A2.555 2.555 0 0 0 7.978 4Z"/>
                </svg>
            </div>
            <p>
                <span>(+51) 967-344-992</span><br/>
                <span>(+51) 969-389-863</span><br/>
                <span>(+51) 986-369-350</span><br/>
            </p>
          </div>

        </div>

        <!-- Miembro -->
        <div class="flex flex-col items-center lg:items-start">
          <!-- <p class="text-[15px] font-medium mb-5">Miembro de:</p> -->

          <img
            src="{{asset('images/codip_white.webp')}}"
            alt="Miembros de CODIP"
            class="w-52 mb-5"
          />

          <a href="{{route('complaintsbook')}}">
            <img src="{{asset('images/libro-reclamaciones.webp')}}" alt="Libro de Reclamaciones" class="w-52 bg-white rounded-sm"/>
          </a>
        </div>

      </div>

      <!-- Métricas inferiores -->
      <div class="flex flex-col lg:flex-row justify-center items-center gap-10 mt-8 lg:gap-16">
        <!-- 100% cumplimiento -->
        <div class="flex flex-col sm:flex-row items-center gap-5 text-center sm:text-left">
          <i class="la la-calendar text-orange text-7xl"></i>

          <div class="flex items-center gap-5">
            <span class="text-6xl lg:text-7xl font-bold leading-none">100%</span>
            <p class="text-base font-semibold leading-tight">
              Cumplimiento de<br />
              fechas de entrega
            </p>
          </div>
        </div>

        <!-- Línea separadora -->
        <div class="hidden lg:block h-24 w-px bg-white/80"></div>

        <!-- +14 años -->
        <div class="flex flex-col sm:flex-row items-center gap-6 text-center sm:text-left">
          <i class="la la-shield-alt text-orange text-7xl"></i>

          <div>
            <span id="years-in-market" class="text-5xl lg:text-6xl font-bold leading-none">+0 años</span>
            <p class="text-base font-semibold">
              en el mercado inmobiliario
            </p>
          </div>
        </div>

      </div>

    </div>

    <!-- Barra copyright -->
    <div class="bg-orange py-4 text-center text-white text-sm  px-4">
      Copyright © <span id="current-year"></span>. Designed & Developed by
      <a href="https://onfleekmedia.com/" target="_blank" class="underline underline-offset-4 hover:text-gray-200">
        Onfleek Media
      </a>
    </div>
  </footer>


