<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if (auth()->check())
                    @switch(auth()->user()->userType->name)
                        @case('Estudiante')
                            <!--Hero-->
                            <div class="py-4 gradient">
                                    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                                    <!--Left Col-->
                                        <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center md:text-left">
                                            <h1 class="my-4 px-8 text-5xl font-bold leading-tight text-white lg:text-4xl">
                                            ¡Bienvenido al panel de estudiante de Tecbus!
                                            </h1>
                                        </div>
                                    <!--Right Col-->
                                        <div class="w-full md:w-1/2 py-6 text-center">
                                            <img class="w-full md:w-full z-50" src="/img/hero-student.svg" />
                                            </div>
                                            </div>
                                        </div>
                                <!--Section-->
                                <section class="bg-gray-50 border-b py-8" id="m_reservas" >
                                    <div class="container mx-auto flex flex-wrap pt-4 pb-12 w-full">
                                    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                                        Características
                                    </h2>
                                    <div class="w-full mb-4">
                                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                                    </div>
                                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                            <div class="flex flex-wrap no-underline hover:no-underline">
                                                <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                                                    Gestión de buses
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
                        @break

                        @case('Profesor')
                            <h1>Bienvenido, Profesor</h1>
                            <!--Hero-->
                            <div class="py-4 gradient">
                                    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                                    <!--Left Col-->
                                        <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center md:text-left">
                                            <h1 class="my-4 px-8 text-5xl font-bold leading-tight text-white lg:text-4xl">
                                            ¡Bienvenido al panel de profesor de Tecbus!
                                            </h1>
                                        </div>
                                    <!--Right Col-->
                                        <div class="w-full md:w-1/2 py-6 text-center">
                                            <img class="w-full md:w-full z-50" src="/img/hero-teacher.svg" />
                                            </div>
                                            </div>
                                        </div>
                                <!--Section-->
                                <section class="bg-gray-50 border-b py-8" id="m_reservas" >
                                    <div class="container mx-auto flex flex-wrap pt-4 pb-12 w-full">
                                    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                                        Características
                                    </h2>
                                    <div class="w-full mb-4">
                                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                                    </div>
                                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                            <div class="flex flex-wrap no-underline hover:no-underline">
                                                <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                                                    Gestión de buses
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
                        @break

                        @case('Administrador')
                                <!--Hero-->
                                <div class="py-4 gradient">
                                    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                                    <!--Left Col-->
                                        <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center md:text-left">
                                            <h1 class="my-4 px-8 text-5xl font-bold leading-tight text-white lg:text-4xl">
                                            ¡Bienvenido al panel de administrador de Tecbus!
                                            </h1>
                                        </div>
                                    <!--Right Col-->
                                        <div class="w-full md:w-1/2 py-6 text-center">
                                            <img class="w-full md:w-full z-50" src="/img/hero-admin.svg" />
                                            </div>
                                            </div>
                                        </div>
                                <!--Section-->
                                <section class="bg-gray-50 border-b py-8" id="m_reservas" >
                                    <div class="container mx-auto flex flex-wrap pt-4 pb-12 w-full">
                                    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                                        Características
                                    </h2>
                                    <div class="w-full mb-4">
                                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                                    </div>
                                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                            <div class="flex flex-wrap no-underline hover:no-underline">
                                                <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                                                    Gestión de buses
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
                                
                        @break

                        @case('Chofer')
                        <!--Hero-->
                        <div class="py-4 gradient">
                                    <div class="container px-3 mx-auto flex flex-wrap flex-col md:flex-row items-center">
                                    <!--Left Col-->
                                        <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center md:text-left">
                                            <h1 class="my-4 px-8 text-5xl font-bold leading-tight text-white lg:text-4xl">
                                            ¡Bienvenido al panel de chofer de Tecbus!
                                            </h1>
                                        </div>
                                    <!--Right Col-->
                                        <div class="w-full md:w-1/2 py-6 text-center">
                                            <img class="w-full md:w-full z-50" src="/img/hero-admin.svg" />
                                            </div>
                                            </div>
                                        </div>
                                <!--Section-->
                                <section class="bg-gray-50 border-b py-8" id="m_reservas" >
                                    <div class="container mx-auto flex flex-wrap pt-4 pb-12 w-full">
                                    <h2 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
                                        Características
                                    </h2>
                                    <div class="w-full mb-4">
                                    <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t"></div>
                                    </div>
                                    <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
                                        <div class="flex-1 bg-white rounded-t rounded-b-none overflow-hidden shadow">
                                            <div class="flex flex-wrap no-underline hover:no-underline">
                                                <div class="w-full font-bold text-xl text-gray-800 px-6 py-4">
                                                    Gestión de buses
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

                        @default
                            <h1>¡Estás conectado!</h1>
                    @endswitch
                @else
                    <h1>¡No estás conectado!</h1>
                @endif
            </div>
        </div>
    </div>

</x-app-layout>
