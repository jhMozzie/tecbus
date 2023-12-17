<div>
    {{-- Table --}}
    <div class="bg-white shadow rounded-lg p-6 w-full">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between mb-4 py-4 ">
                <div class="flex">
                    <select class="w-fit rounded-l-lg border-t mr-0 border-b border-l text-gray-800 bg-white px-3 py-2 pr-8 focus:outline-none" wire:model.live="buscapor">
                        <option value="name">Ruta</option>
                        <option value="license_plate">Bus</option>
                        <option value="driver_name">Chofer - Nombre</option>
                        <option value="driver_lastname">Chofer - Apellido</option>
                    </select>
                    <input type="text" class="w-11/12 rounded-r-lg border-t border-b border-r text-gray-800 bg-white px-3 py-2 focus:outline-none" placeholder="Buscar... " wire:model.live="search">
                </div> 
                <div>
                    <button wire:click="crear"
                        class="bg-sky-500 hover:bg-sky-400 text-white font-bold py-2 px-4 rounded lg:text-base" >
                        Agregar
                    </button>    
                </div>               
            </div>
            {{-- <div>
            <div class="grid grid-cols-1 md:grid-cols-2 py-4">
                <div class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="https://www.google.com/url?sa=i&url=https%3A%2F%2Fbuffer.com%2Flibrary%2Ffree-images%2F&psig=AOvVaw2pMg6MO7K7Sm00SbfnJzoa&ust=1702885700953000&source=images&cd=vfe&ved=0CBEQjRxqFwoTCMDygdz9lYMDFQAAAAAdAAAAABAE" alt="">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                </div>
            </div>
            </div> --}}
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">

                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Ruta
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Conductor
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Bus
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        fecha
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <!-- Fila de ejemplo -->
                                @foreach ($trips as $trip)
                                    <tr wire:key="trip-{{ $trip->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm font-medium text-gray-900">
                                               {{ $trip->route->name }}                                      
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Chofer {{ $trip->busdriver->driver->name }} {{ $trip->busdriver->driver->lastname }}</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Bus-{{ $trip->busdriver->bus->license_plate }} </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">{{$trip->trip_date}}</div>
                                        </td>

                                        {{-- aca  pa arriba --}}

                                        <td class="px-6 py-4 whitespace-nowrap text-center mb-8">
                                            <button class="text-blue-600 hover:text-blue-900 focus:outline-none" wire:click="edit({{$trip->id}})">
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
                                            <button class="text-red-600 hover:text-red-900 focus:outline-none" wire:click="destroy({{$trip->id}})">
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
                        {{ $trips->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- crear --}}
    @if ($open2)
    <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <form wire:submit="save">
                        <div class="mb-4">
                            <label  for="create-category" >Ruta</label>
                            <x-select  id="create-category" class="w-full" wire:model="route_id">
                                <option value="" disabled>Seleccione una de las categorías</option>
                                @foreach ($routes as $route)
                                <option value="{{$route->id}}">{{$route->name}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('route_id')"/>
                        </div>
                       
                        <div class="mb-4">
                            <label >Bus</label>
                            <x-select  class="w-full" wire:model="bus_driver_id">
                                <option value="" disabled>Seleccione una de las categorías</option>
                                @foreach ($buses_conductor as $bus)
                                <option value="{{$bus->id}}">Conductor - {{$bus->driver->name}} {{$bus->driver->lastname}} // Bus nro de placa {{$bus->bus->license_plate}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('bus_driver_id')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Fecha</label>
                            <input type="datetime-local" id="create-trip_date" class="w-full" wire:model="trip_date">
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('trip_date')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Cantidad de Estudiantes actuales</label>
                            <input type="number" id="create-trip_date" class="w-full" wire:model="student_capacity" disabled>
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('student_capacity')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Cantidad de Profesores actuales</label>
                            <input type="number" id="create-trip_date" class="w-full" wire:model="professor_capacity" disabled>
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('professor_capacity')"/>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="mr-2" wire:click="set('open2', false)">Cancelar</button>
                            <x-primary-button>Crear</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

    {{-- actualizar --}}
    @if ($open)
    <div class="bg-gray-800 bg-opacity-25 fixed inset-0">
        <div class="py-12">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow rounded-lg p-6">
                    <form wire:submit="update">
                        <div class="mb-4">
                            <label  for="create-category" >Ruta</label>
                            <x-select  id="create-category" class="w-full" wire:model="tripedit.route_id">
                                <option value="" disabled>Seleccione una de las categorías</option>
                                @foreach ($routes as $route)
                                <option value="{{$route->id}}">{{$route->name}}</option>
                                @endforeach
                            </x-trip_dateselect>
                            <x-input-error :messages="$errors->get('tripedit.route_id')"/>
                        </div>
                       
                        <div class="mb-4">
                            <label >Bus</label>
                            <x-select  class="w-full" wire:model="tripedit.bus_driver_id">
                                <option value="" disabled>Seleccione una de las categorías</option>
                                @foreach ($buses_conductor as $bus)
                                <option value="{{$bus->id}}">Conductor - {{$bus->driver->name}} {{$bus->driver->lastname}} // Bus nro de placa {{$bus->bus->license_plate}}</option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('tripedit.bus_driver_id')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Fecha</label>
                            <input type="datetime-local" id="create-trip_date" class="w-full" wire:model="tripedit.trip_date">
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('tripedit.trip_date')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Cantidad de Estudiantes actuales</label>
                            <input type="number" id="create-trip_date" class="w-full" wire:model="tripedit.student_capacity" disabled>
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('tripedit.student_capacity')"/>
                        </div>
                        <div class="mb-4">
                            <label for="create-trip_date">Cantidad de Profesores actuales</label>
                            <input type="number" id="create-trip_date" class="w-full" wire:model="tripedit.professor_capacity" disabled>
                            {{-- modifique el input-error --}}
                            <x-input-error :messages="$errors->get('tripedit.professor_capacity')"/>
                        </div>

                        <div class="flex justify-end">
                            <button type="button" class="mr-2" wire:click="set('open', false)">Cancelar</button>
                            <x-primary-button>Actualizar</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

</div>
