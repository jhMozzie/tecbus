<div>
    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <div class="flex flex-row justify-between mb-4 py-4">
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
                <div>
                    <button wire:click="crear"
                        class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 rounded lg:text-base" >
                        Agregar
                    </button>    
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
                                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M240-120q-17 0-28.5-11.5T200-160v-82q-18-20-29-44.5T160-340v-380q0-83 77-121.5T480-880q172 0 246 37t74 123v380q0 29-11 53.5T760-242v82q0 17-11.5 28.5T720-120h-40q-17 0-28.5-11.5T640-160v-40H320v40q0 17-11.5 28.5T280-120h-40Zm0-440h480v-120H240v120Zm100 240q25 0 42.5-17.5T400-380q0-25-17.5-42.5T340-440q-25 0-42.5 17.5T280-380q0 25 17.5 42.5T340-320Zm280 0q25 0 42.5-17.5T680-380q0-25-17.5-42.5T620-440q-25 0-42.5 17.5T560-380q0 25 17.5 42.5T620-320Z"/></svg>
                                            </button>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button wire:click="edit({{ $route->id }})"
                                                class="text-blue-600 hover:text-blue-900 focus:outline-none">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M420.182-384Q405-384 394.5-394.297q-10.5-10.298-10.5-25.52v-86.856Q384-521 389-534q5-13 15.659-23.659L738-891q11-11 24-16t26.5-5q14.4 0 27.45 5 13.05 5 23.991 15.783L891-840q11 11 16 24.182 5 13.182 5 26.818 0 13.661-5.022 26.866Q901.957-748.929 891-738L557.659-404.659Q547-394 534.05-389q-12.949 5-27.239 5h-86.629ZM789-738l51-51-51-51-51 51 51 51ZM216-144q-29.7 0-50.85-21.15Q144-186.3 144-216v-528q0-30.112 21-51.556T216-816h346L333-587q-11 11-16 23.98t-5 27.302v152.178Q312-354 333.106-333q21.105 21 50.743 21H535.63q14.37 0 27.37-5 13-5 24-16l229-229v346q0 29.7-21.15 50.85Q773.7-144 744-144H216Z"/></svg>
                                            </button>
                                            <button wire:click="destroy({{ $route->id }})"
                                                class="text-red-600 hover:text-red-900 focus:outline-none">
                                                <!-- Add your delete icon here, e.g., Edit Icon from Tailwind -->
                                                <svg class="svg" xmlns="http://www.w3.org/2000/svg" height="20" viewBox="0 -960 960 960" width="20"><path d="M312-144q-29.7 0-50.85-21.15Q240-186.3 240-216v-480h-12q-15.3 0-25.65-10.289-10.35-10.29-10.35-25.5Q192-747 202.35-757.5 212.7-768 228-768h156v-12q0-15.3 10.35-25.65Q404.7-816 420-816h120q15.3 0 25.65 10.35Q576-795.3 576-780v12h156q15.3 0 25.65 10.289 10.35 10.29 10.35 25.5Q768-717 757.65-706.5 747.3-696 732-696h-12v479.566Q720-186 698.85-165 677.7-144 648-144H312Zm107.789-144Q435-288 445.5-298.35 456-308.7 456-324v-264q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q405-624 394.5-613.65 384-603.3 384-588v264q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35Zm120 0Q555-288 565.5-298.35 576-308.7 576-324v-264q0-15.3-10.289-25.65-10.29-10.35-25.5-10.35Q525-624 514.5-613.65 504-603.3 504-588v264q0 15.3 10.289 25.65 10.29 10.35 25.5 10.35Z"/></svg>
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
                                    <li class="flex flex-row justify-between items-center mb-4">
                                        <div>
                                            Paradero: {{ $this->getBusstopNameById($busstopId) }}
                                        </div>
                                        <div class="flex">
                                            <select wire:model="selectedBusstopCounts.{{ $busstopId }}"
                                                name="selectedBusstopCounts[]"
                                                class="rounded-l-lg border-t border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none">
                                                @for ($i = 1; $i <= count($selectedBusstopIds); $i++)
                                                    <option value="{{ $i }}">{{ $i }}</option>
                                                @endfor
                                            </select>
                                        </div>
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
                            <button wire:click="saveOrUpdateBusstops"
                                class="px-4 py-2 bg-blue-500 text-white rounded ml-2">Asociar</button>
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
