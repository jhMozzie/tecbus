<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tecbus</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased leading-normal tracking-normal text-white gradient">
    <!-- Navegador -->  
    <nav id="header" class="fixed w-full z-30 top-0 text-white bg-white">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
        <div class="pl-4 flex items-center">
          <a href="{{ route('dashboard') }}" wire:navigate class="toggleColour text-sky-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl">
            <img id="logoImg" src="/img/logo.png" class="block h-9 w-auto fill-current text-white">
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-sky-600 hover:text-sky-200 focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        @if (Route::has('login'))
        <div class="w-full flex-grow lg:flex lg:items-center lg:w-auto hidden mt-2 lg:mt-0 bg-white lg:bg-transparent text-black p-4 lg:p-0 z-20 xl:text-base" id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center">
            @auth
            <li class="mr-3">
              <a href="{{ url('/dashboard') }}" class="toggleColour inline-block py-2 px-4 text-sky-600 hover:text-sky-300 font-bold no-underline">Inicio</a>
            </li>
            @else
                <li class="mr-3">
                <a href="{{ route('login') }}" class="toggleColour inline-block text-sky-600 no-underline hover:text-sky-300 hover:text-underline py-2 px-4" wire:navigate>Iniciar sesión</a>
                </li>
                @if (Route::has('register'))
                    <li class="mr-3">
                        <a href="{{ route('register') }}" class="toggleColour inline-block text-sky-600 no-underline hover:text-sky-300 hover:text-underline py-2 px-4" wire:navigate>Registrarse</a>
                    </li>
                @endif
            @endauth
          </ul>
        </div>
        @endif
      </div>
      <hr class="border-b border-gray-100 opacity-25 my-0 py-0" />
    </nav>
    
    <!--Hero-->
    <div class="py-24">
        <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
            <!--Left Col-->
            <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center md:text-left">
                <p class="uppercase tracking-loose w-full lg:text-xl">SERVICIO DE TRANSPORTE</p>
                <h1 class="my-4 text-5xl font-bold leading-tight lg:text-4xl">
                ¡Realiza tu reserva para viajar cómodo!
                </h1>
                <p class="leading-normal text-2xl">
                Explora nuestros viajes disponibles al iniciar sesión
                </p>
                <div class="flex items-center justify-start">
                  <a href="#m_reservas" class="mx-auto lg:mx-0 hover:underline bg-white text-sky-600 font-bold rounded-full my-6 py-4 px-8 shadow-lg focus:outline-none focus:shadow-outline transform transition hover:scale-105 duration-300 ease-in-out">
                  Método de reservas
                  </a>
                </div>
            </div>

            <!--Right Col-->
            <div class="w-full md:w-1/2 py-6 text-center">
              <img class="w-full md:w-full z-50" src="/img/index-image.png" />
            </div>
          </div>
        </div>
        <div class="relative -mt-12 lg:-mt-24 w-full">
      <svg viewBox="0 0 1428 174" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g transform="translate(-2.000000, 44.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path d="M0,0 C90.7283404,0.927527913 147.912752,27.187927 291.910178,59.9119003 C387.908462,81.7278826 543.605069,89.334785 759,82.7326078 C469.336065,156.254352 216.336065,153.6679 0,74.9732496" opacity="0.100000001"></path>
            <path
              d="M100,104.708498 C277.413333,72.2345949 426.147877,52.5246657 546.203633,45.5787101 C666.259389,38.6327546 810.524845,41.7979068 979,55.0741668 C931.069965,56.122511 810.303266,74.8455141 616.699903,111.243176 C423.096539,147.640838 250.863238,145.462612 100,104.708498 Z"
              opacity="0.100000001"
            ></path>
            <path d="M1046,51.6521276 C1130.83045,29.328812 1279.08318,17.607883 1439,40.1656806 L1439,120 C1271.17211,77.9435312 1140.17211,55.1609071 1046,51.6521276 Z" id="Path-4" opacity="0.200000003"></path>
          </g>
          <g transform="translate(-4.000000, 76.000000)" fill="#FFFFFF" fill-rule="nonzero">
            <path
              d="M0.457,34.035 C57.086,53.198 98.208,65.809 123.822,71.865 C181.454,85.495 234.295,90.29 272.033,93.459 C311.355,96.759 396.635,95.801 461.025,91.663 C486.76,90.01 518.727,86.372 556.926,80.752 C595.747,74.596 622.372,70.008 636.799,66.991 C663.913,61.324 712.501,49.503 727.605,46.128 C780.47,34.317 818.839,22.532 856.324,15.904 C922.689,4.169 955.676,2.522 1011.185,0.432 C1060.705,1.477 1097.39,3.129 1121.236,5.387 C1161.703,9.219 1208.621,17.821 1235.4,22.304 C1285.855,30.748 1354.351,47.432 1440.886,72.354 L1441.191,104.352 L1.121,104.031 L0.457,34.035 Z"
            ></path>
          </g>
        </g>
      </svg>
    </div>
    <section class="bg-white border-b py-8">
      <div class="container max-w-5xl mx-auto m-8">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        Acerca de Tecbus
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="flex flex-wrap">
          <div class="w-5/6 sm:w-1/2 p-6">
            <h3 class="text-3xl text-gray-800 font-bold leading-none mb-3">
            Tu viaje exclusivo
            </h3>
            <p class="text-gray-600 mb-8 lg:text-lg">
            ¡Bienvenido a Tecbus, el servicio de transporte exclusivo de Tecsup! Nos enorgullece brindar un medio de transporte eficiente y seguro para la comunidad de este prestigioso instituto. Con Tecbus, tu viaje hacia el conocimiento comienza desde el momento en que subes a bordo.
            </p>
          </div>
          <div class="w-full sm:w-1/2 p-6">
            <img src="/img/undraw_booking_re_gw4j.svg">
          </div>
        </div>
      </div>
    </section>
        <section class="bg-gray-50 border-b py-8" id="m_reservas" >
      <div class="container mx-auto flex flex-wrap pt-4 pb-12 w-full">
        <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        Reservas
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <div class="flex flex-wrap no-underline hover:no-underline">
              <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
              Cómo Reservar tu Asiento
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
              Descubre la sencillez de nuestro proceso de reserva. Elige el viaje que deseas realizar  y asegura tu lugar en Tecbus. ¡No te olvides de confirmar tu viaje!
              </p>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <div class="flex flex-wrap no-underline hover:no-underline">
              <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
              Asignación de Asientos
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
              Cada pasajero tiene la oportunidad de asegurar su asiento, pero recuerda, ¡es un juego de azar! Las reservas se cierran cuando todos los asientos están ocupados para garantizar un viaje cómodo y seguro para todos.
              </p>
            </div>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
            <div class="flex flex-wrap no-underline hover:no-underline">
              <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
              Asientos designados para profesores
              </div>
              <p class="text-gray-800 text-base px-6 mb-5">
              En Tecbus, comprendemos la importancia de un entorno educativo adecuado. Por ello, reservamos 8 asientos exclusivos para profesores en cada viaje, brindándoles comodidad y un espacio propio. 
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <script src="/js/nav.js"></script>
    </body>
</html>

