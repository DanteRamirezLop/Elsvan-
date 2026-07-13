<header class="header">
    <nav class="bg-brown border-gray-200 px-4 lg:px-8 py-4 sm:py-4">
        <div class="flex flex-wrap items-center mx-auto max-w-screen-xl">
            <a href="{{route('inicio')}}" class="flex items-center">
                <img src="{{asset('images/logo-white.webp')}}" class="h-10 sm:h-13" alt="Elsvan Inmobiliaria" />
            </a>

            <div class="flex items-center ml-auto lg:ml-0 lg:order-2" id="mobile-menu-1">
                <a href="{{route('quote')}}" class="ms-0 lg:ms-8 btn-brochure ">Cotizar ahora</a>
                <button id="mobile-menu-toggle" type="button" class="inline-flex items-center p-2 ml-1 text-sm text-gray-300 border border-gray-300 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Abrir menú principal</span>
                    <svg id="mobile-menu-icon-open" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    <svg id="mobile-menu-icon-close" class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>

            <div class="hidden justify-between items-start w-full lg:flex lg:flex-row lg:items-center lg:w-auto lg:order-1 lg:ml-auto" id="mobile-menu-2">
                <ul class="flex flex-col w-full mt-4 font-medium lg:flex-row lg:space-x-8 lg:mt-0 text-lg ">
                    <li>
                        <a href="{{route('inicio')}}" class="block py-2 pr-4 pl-3 text-white hover:text-orange-500 border-b border-gray-100 [@media(hover:hover)_and_(max-width:1023px)]:hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Inicio</a>
                    </li>
                     <li>
                        <a href="{{route('proyectos.index')}}" class="block py-2 pr-4 pl-3 text-white hover:text-orange-500 border-b border-gray-100 [@media(hover:hover)_and_(max-width:1023px)]:hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Proyectos</a>
                    </li>
                     <li>
                        <a href="{{route('nosotros')}}" class="block py-2 pr-4 pl-3 text-white hover:text-orange-500 border-b border-gray-100 [@media(hover:hover)_and_(max-width:1023px)]:hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Nosotros</a>
                    </li>
                    <li>
                        <a href="{{route('galeria')}}" class="block py-2 pr-4 pl-3 text-white hover:text-orange-500 border-b border-gray-100 [@media(hover:hover)_and_(max-width:1023px)]:hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Galeria</a>
                    </li>
                    <li>
                        <a href="{{route('noticias.index')}}" class="block py-2 pr-4 pl-3 text-white hover:text-orange-500 border-b border-gray-100 [@media(hover:hover)_and_(max-width:1023px)]:hover:bg-gray-100 lg:hover:bg-transparent lg:border-0 lg:hover:text-primary-700 lg:p-0">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
