<div>
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <div class="flex flex-row justify-between mb-4 ">
                <h2 class="text-3xl font-semibold mb-2">Lista de Rutas </h2>
                <button wire:click="openModal"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Agregar
                </button>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nombre
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Días de Servicio
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Hora de Partida
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Turno
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Paraderos
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Fila de ejemplo -->
                                @foreach ($routes as $route)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $route->name }}
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                De {{ $route->direction }}
                                            </div>

                                            <div class="text-sm text-gray-500">
                                                {{-- Aquí puedes mostrar otros detalles de la ruta --}}
                                                {{-- Por ejemplo, la lista de paraderos --}}
                                                {{-- {{ implode(', ', $route->busstops->pluck('name')->toArray()) }} --}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{ $route->service_day }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ $route->departure_time }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $route->turn }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                            <button class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2 19c0 1.1.9 2 2 2h12a2 2 0 002-2V7c0-1.1-.9-2-2-2H4a2 2 0 00-2 2v12z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2 19c0 1.1.9 2 2 2h12a2 2 0 002-2V7c0-1.1-.9-2-2-2H4a2 2 0 00-2 2v12z">
                                                    </path>
                                                </svg>
                                            </button>
                                            <button class="text-red-600 hover:text-red-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M2 19c0 1.1.9 2 2 2h12a2 2 0 002-2V7c0-1.1-.9-2-2-2H4a2 2 0 00-2 2v12z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $routes->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Crear --}}
    @if ($showModal)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <form wire:submit="save">
                            <div class="mb-4">
                                <x-label>Nombre</x-label>
                                <x-input wire:model="name" class="w-full" />
                            </div>
                            <div class="mb-4">
                                <x-label>Dias de servicio</x-label>
                                <x-input class="w-full" value="{{ $enumOptions['service_day'][0] }}" readonly />
                            </div>
                            <div class="mb-4">
                                <x-label>Hora de partida</x-label>
                                <x-input wire:model="departure_time" class="w-full" />
                            </div>
                            <div class="mb-4">
                                <x-label>Turno</x-label>
                                <x-select wire:model="turn" class="w-full">
                                    <option value="" disabled selected>Selecciona un turno</option>
                                    @foreach ($enumOptions['turn'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="mb-8">
                                <x-label>Direccion</x-label>
                                <x-select wire:model="direction" class="w-full">
                                    <option value="" disabled selected>Selecciona una opcion</option>
                                    @foreach ($enumOptions['direction'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="flex justify-end">
                                <x-primary-button class="mr-2">
                                    Confirmar
                                </x-primary-button>
                                <x-danger-button wire:click="set('showModal',false)">
                                    Cancelar
                                </x-danger-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
