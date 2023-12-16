<div>
    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <h2 class="text-3xl font-semibold mb-4">Lista de Rutas </h2>
            <div class="flex flex-row justify-between mb-4 ">
                <div>
                    <button wire:click="openCreateModal"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Agregar
                    </button>
                </div>
                <div class="flex">
                    <select
                        class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none">
                        <option>Buscar por...</option>
                        <option>N° Licencia</option>
                        <option>Tipo Licencia</option>
                        <option>Edad</option>
                    </select>
                    <input type="text"
                        class="w-11/12 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none"
                        placeholder="Buscar...">
                </div>
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
                                        Disponibilidad
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Partida
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
                                            <button wire:click="openRoutebusstopModal({{ $route->id }})"
                                                class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="h-8 w-8 text-orange-500" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <circle cx="11" cy="11" r="8" />
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button wire:click="edit({{ $route->id }})"
                                                class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="h-8 w-8 text-indigo-500" <svg width="24" height="24"
                                                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                                    fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round">
                                                    <path
                                                        d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                </svg>
                                            </button>
                                            <button wire:click="destroy({{ $route->id }})"
                                                class="text-red-600 hover:text-red-900 focus:outline-none">
                                                <!-- Add your delete icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="h-8 w-8 text-red-500" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round">
                                                    <polyline points="3 6 5 6 21 6" />
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    <line x1="10" y1="11" x2="10" y2="17" />
                                                    <line x1="14" y1="11" x2="14" y2="17" />
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
    @if ($showCreateModal)
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
                                <x-label>Disponibilidad</x-label>
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
                                <x-danger-button wire:click="closeCreateModal">
                                    Cancelar
                                </x-danger-button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    @endif

    {{-- Modal Edit --}}
    @if ($showEditModal)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <form wire:submit="update">
                            <!-- Agrega aquí los campos de edición según tus necesidades -->
                            <div class="mb-4">
                                <x-label>Nombre</x-label>
                                <x-input wire:model="name" class="w-full" />
                            </div>
                            <div class="mb-4">
                                <x-label>Día de servicio</x-label>
                                <x-input wire:model="service_day" class="w-full" />
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
                                <x-label>Dirección</x-label>
                                <x-select wire:model="direction" class="w-full">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    @foreach ($enumOptions['direction'] as $option)
                                        <option value="{{ $option }}">{{ $option }}</option>
                                    @endforeach
                                </x-select>
                            </div>
                            <div class="flex justify-end">
                                <x-primary-button class="mr-2">
                                    Actualizar
                                </x-primary-button>
                                <x-danger-button wire:click="closeEditModal">
                                    Cancelar
                                </x-danger-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{--  Busstops Modal  --}}
    <!-- Muestra los paraderos asociados a la ruta seleccionada -->

    @if ($showRoutebusstopModal)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6 mb-8">
                        <h1>Ruta ID: {{ $routeIdBeingEdited }}</h1>

                        <!-- Dentro del div "Paraderos Asociados" -->
                        <div class="my-8">
                            <h2>Paraderos Asociados:</h2>
                            <ul>
                                @foreach ($selectedBusstopIds as $busstopId)
                                    <li>
                                        Busstop ID: {{ $busstopId }} -
                                        {{ $this->getBusstopNameById($busstopId) }}

                                        <select wire:model="selectedBusstopCounts.{{ $busstopId }}"
                                            name="selectedBusstopCounts[]"
                                            id="selectedBusstopCounts-{{ $busstopId }}">
                                            @for ($i = 1; $i <= count($selectedBusstopIds); $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="my-8 overflow-y-auto max-h-64">
                            <h1>Lista de paraderos</h1>
                            <div class="grid grid-cols-2 gap-4">
                                @foreach ($allBusstops as $busstop)
                                    <div
                                        class="flex items-center ps-4 border border-gray-200 rounded dark:border-gray-700">
                                        <input wire:model.live="selectedBusstopIds" id="busstop-{{ $busstop->id }}"
                                            type="checkbox" value="{{ $busstop->id }}" name="selectedBusstopIds[]"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="busstop-{{ $busstop->id }}"
                                            class="w-full py-4 ms-2 text-sm font-medium text-black">{{ $busstop->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button wire:click="confirmRouteBusstops"
                                class="px-4 py-2 bg-green-500 text-white rounded">Crear</button>
                            <button wire:click="updateAllBusstopOrders"
                                class="px-4 py-2 bg-blue-500 text-white rounded ml-2">Actualizar</button>
                            <button wire:click="closeRoutebusstopModal"
                                class="px-4 py-2 bg-red-500 text-white rounded ml-2">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- ... -->


</div>
