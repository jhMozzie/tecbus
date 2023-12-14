<div>
    {{-- Lista de posts --}}

    <div class="bg-white shadow rounded-lg p-6">
        <ul class="list-disc list-inside space-y-2">
            {{-- boton crear --}}
            <x-primary-button wire:click="crear">Crear</x-primary-button>
            {{-- boton selecionar --}}
            <div class="relative">
                <select
                    class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline"
                    wire:model.live="buscapor">
                    <option value="model">modelo</option>
                    <option value="soat">soat</option>
                    <option value="capacity">capacidad</option>
                    <option value="brand">marca</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5 7l5 5 5-5z" />
                    </svg>
                </div>
            </div>
            {{-- buscar por --}}
            <input type="text" class="form-control w-full" placeholder="Buscar... " wire:model.live="search">
            @foreach ($buses as $bus)
                <li class="flex justify-between" wire:key="post-{{ $bus->id }}"> {{ $bus->model }}
                    <div>
                        <x-primary-button wire:click="edit({{ $bus->id }})">Editar</x-primary-button>
                        <x-primary-button wire:click="destroy({{ $bus->id }})">Eliminar</x-primary-button>
                    </div>
                </li>
            @endforeach
        </ul>
        <div class="mt-4">
            {{ $buses->links() }}
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex flex-col ">
            <h2 class="text-3xl font-semibold mb-2">Lista de Rutas </h2>
            <div class="flex flex-row justify-between mb-4 ">
                <div>
                    <button wire:click="crear"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" >
                        Agregar
                    </button>    
                </div>
                <div class="flex">
                    <select class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="buscapor">
                        <option value="license_plate">Numero de placa</option>
                        <option value="model">modelo</option>
                        <option value="soat">soat</option>
                        <option value="capacity">capacidad</option>
                        <option value="brand">marca</option>
                    </select>
                    <input type="text" class="w-11/12 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none" placeholder="Buscar... " wire:model.live="search">
                </div>
            </div>

            {{-- de aca pa arriba --}}
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">

                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Numero de placa
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Modelo
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Marca
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                       Soat
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Capacidad
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Fila de ejemplo -->
                                @foreach ($buses as $bus)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{$bus->license_plate}}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$bus->model}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$bus->brand}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$bus->soat}}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$bus->capacity}}</div>
                                        </td>
                                        {{-- aca  pa arriba --}}

                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button class="text-blue-600 hover:text-blue-900 focus:outline-none" wire:click="edit({{$bus->id}})">
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
                                            <button class="text-red-600 hover:text-red-900 focus:outline-none" wire:click="destroy({{$bus->id}})">
                                                <!-- Add your edit icon here, e.g., Edit Icon from Tailwind -->
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
                        {{ $buses->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Formulario de crear --}}
    @if ($open2)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form wire:submit="save">
                            <div class="mb-4">
                                <label for="create-license_plate">Numero de placa</label>
                                <input type="text" id="create-license_plate" class="w-full" wire:model="license_plate">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('license_plate')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-model">Modelos</label>
                                <input type="text" id="create-model" class="w-full" wire:model="model">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('model')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-brand">Marca</label>
                                <input type="text" id="create-brand" class="w-full" wire:model="brand">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('brand')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-soat">Soat</label>
                                <input type="text" id="create-soat" class="w-full" wire:model="soat">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('soat')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-capacity">Capacidad</label>
                                <input type="text" id="create-capacity" class="w-full" wire:model="capacity">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('capacity')" />
                            </div>
                            <div class="mb-4">
                                <label>Conductores</label>
                                <div>
                                    @foreach ($drivers as $driver)
                                        <div class="mb-2">
                                            <label>
                                                <input type="checkbox" wire:model="chofer" value="{{ $driver->id }}">
                                                {{ $driver->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <x-input-error :messages="$errors->get('chofer')" />
                                <div class="flex justify-end">
                                    <button type="button" class="mr-2"
                                        wire:click="set('open2', false)">Cancelar</button>
                                    <x-primary-button>Crear</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif


    {{-- Formulario de actualizar --}}
    @if ($open)
        <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
            <div class="py-12">
                <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white shadow rounded-lg p-6">
                        <form wire:submit="update">
                            <div class="mb-4">
                                <label for="create-license_plate">Numero de placa</label>
                                <input type="text" id="create-license_plate" class="w-full" wire:model="busedit.v_license_plate">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('busedit.v_license_plate')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-model">Modelos</label>
                                <input type="text" id="create-model" class="w-full" wire:model="busedit.v_model">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('busedit.v_model')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-brand">Marca</label>
                                <input type="text" id="create-brand" class="w-full" wire:model="busedit.v_brand">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('busedit.v_brand')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-soat">Soat</label>
                                <input type="text" id="create-soat" class="w-full" wire:model="busedit.v_soat">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('busedit.v_soat')" />
                            </div>
                            <div class="mb-4">
                                <label for="create-capacity">Capacidad</label>
                                <input type="text" id="create-capacity" class="w-full"
                                    wire:model="busedit.v_capacity">
                                {{-- modifique el input-error --}}
                                <x-errores :messages="$errors->get('busedit.v_capacity')" />
                            </div>
                            <div class="mb-4">
                                <label>Conductores</label>
                                <div>
                                    @foreach ($drivers as $driver)
                                        <div class="mb-2">
                                            <label>
                                                <input type="checkbox" wire:model="busedit.v_chofer"
                                                    value="{{ $driver->id }}">
                                                {{ $driver->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                <x-errores :messages="$errors->get('busedit.v_chofer')" />
                                <div class="flex justify-end">
                                    <button type="button" class="mr-2"
                                        wire:click="set('open', false)">Cancelar</button>
                                    <x-primary-button>Crear</x-primary-button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endif








</div>
