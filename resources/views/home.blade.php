@extends('layouts.web')

@section('content')
    <div class="banner-category container-fluid">
        <img src="{{asset('images/banner.jpg')}}" alt="La confianza no se vende se construye" class="banner-category-img">
        <div class="banner-category-box-title">
            <h1 class="banner-category-title"> La confianza no se vende</h1>
            <p class="text-center text-white text-xl lg:text-3xl"> se construye</p>
            <div class="text-center mt-5">
                <a href="" class="btn-banner"> Cotiza aquí </a>
                <!-- <a href="#" class="btn-line bg-orange mr-2">
                    <span class="min-w-24"> Cotiza aquí </span>
                </a> -->
            </div>
        </div>
    </div>

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

    <section class="about-section">
        <div class="about-text">
            <div class="marquee">
                Más de 13 años <br>
                <span>construyendo confianza...</span>
            </div>
            <p>
                Desde 2012, ELSVAN desarrolla proyectos inmobiliarios que combinan
                diseño, calidad y sostenibilidad, consolidando una trayectoria
                respaldada por la confianza de sus clientes y la entrega exitosa de
                sus proyectos. Apostamos por ubicaciones estratégicas, espacios
                funcionales y altos estándares de construcción, ofreciendo soluciones
                de vivienda que generan valor y seguridad para tu familia de hoy y
                del futuro.
            </p>
            <a href="#" class="btn-projects">Ver nuestros proyectos</a>
        </div>
        <div class="about-image">
            <img src="{{asset('images/edificio.png')}}" alt="Proyecto inmobiliario ELSVAN">
        </div>
    </section>


   <section class="section" >
    <div class="location-section">
    <div class="location-card">

    <div class="map-panel">
        <img id="mapImage"
          src="https://edifica.com.pe/uploads/02-proyectos-en-venta/monument/monument-areas-comunes/aacc-reel/yoga-zone-1.jpg"
          alt="Mapa de ubicación en Miraflores"/>
      </div>

      <div class="info-panel">
        <h1 class="text-center">Áreas internas</h1>

        <div class="category-grid">
          <button class="category-btn" data-image="img/mapa-entretenimiento.jpg">
            <span class="icon">
                <img src="https://edifica.com.pe/uploads/item-icon-2.png" class="h-6" alt="">
            </span>
            <span class="min-w-24">Sala de estar</span>
          </button>

          <button class="category-btn" data-image="img/mapa-gastronomia.jpg">
            <span class="icon">
                <img src="https://edifica.com.pe/uploads/item-icon-2.png" class="h-6" alt="">
            </span>
            <span class="min-w-24">Cocina</span>
          </button>

          <button class="category-btn" data-image="img/mapa-hoteles.jpg">
            <span class="icon">
                <img src="https://edifica.com.pe/uploads/item-icon-2.png" class="h-6" alt="">
            </span>
            <span class="min-w-24">Comedor</span>
          </button>

          <button class="category-btn" data-image="img/mapa-servicios.jpg">
            <span class="icon">
                <img src="https://edifica.com.pe/uploads/item-icon-2.png" class="h-6" alt="">
            </span>
            <span class="min-w-24">Habitaciones </span>
          </button>

          <button class="category-btn active" data-image="img/mapa-parques.jpg">
            <span class="icon">
                <img src="https://edifica.com.pe/uploads/item-icon-2.png" class="h-6" alt="">
            </span>
            <span class="min-w-24">Baños</span>
          </button>
        </div>
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
    <script>
        const buttons = document.querySelectorAll(".category-btn");
        const mapImage = document.getElementById("mapImage");

        buttons.forEach((button) => {
        button.addEventListener("click", () => {
            const newImage = button.getAttribute("data-image");

            buttons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");

            mapImage.classList.add("fade");

            setTimeout(() => {
            mapImage.src = newImage;
            mapImage.alt = `Mapa de ${button.innerText}`;
            mapImage.classList.remove("fade");
            }, 250);
        });
        });
    </script>
@endpush
