<?php

namespace App\Livewire;

use App\Models\BusStop;
use App\Models\Route;
use Livewire\Component;
use Livewire\WithPagination;

class RouteComponent extends Component
{
    use WithPagination;

    //variable para buscar
    public $search;
    public $buscapor = "name";
    public $search2;
    public $buscapor2 = "name";
   

    public $name;
    public $service_day = 'Lunes a Viernes';
    public $direction = '';
    public $departure_time;
    public $turn = '';

    // Enums Variable
    public $enumOptions = [];

    public $showCreateModal = false;
    public $showEditModal = false;

    public $routeIdBeingEdited;

    // RouteBusstop Variables
    public $showRoutebusstopModal = false; // Variable que indica si el modal de paraderos está visible o no
    public $selectedBusstopIds = []; // Arreglo de IDs de los paraderos seleccionados para la ruta
    public $selectedBusstopCounts = []; // Arreglo asociativo para mantener el conteo de paraderos seleccionados en el modal
    public $sortedSelectedRouteBusstops = [];
    public function mount()
    {
        // Enumeraciones para opciones select en el formulario
        $this->enumOptions = [
            'service_day' => ['Lunes a Viernes'],
            'turn' => ['Mañana', 'Tarde', 'Noche'],
            'direction' => ['Paradero Inicial a Tecsup', 'Tecsup a Paradero Final'],
        ];
    }

    //* Paraderos Modal
    public function getBusstopNameById($busstopId)
    {
        // Implementa la lógica necesaria para obtener el nombre del paradero por su ID
        $busstop = BusStop::find($busstopId);

        return $busstop ? $busstop->name : 'Paradero no encontrado';
    }

    public function openRoutebusstopModal($routeId)
    {
        // Establecer la ruta que está siendo editada
        $this->routeIdBeingEdited = $routeId;

        // Obtener la información relacionada con los paraderos de la ruta
        $route = Route::with('busstops')->find($routeId);

        // Establecer las variables necesarias para el modal
        $this->selectedBusstopIds = $route->busstops->pluck('id')->toArray();
        $this->selectedBusstopCounts = [];

        // Obtener el orden de cada paradero asociado a la ruta
        foreach ($route->busstops as $busstop) {
            $this->selectedBusstopCounts[$busstop->id] = $busstop->pivot->order;
        }

        // Abrir el modal de paraderos
        $this->showRoutebusstopModal = true;
    }

    public function saveOrUpdateBusstops()
    {
        // Lógica para guardar o actualizar los paraderos asociados a la ruta
        $route = Route::find($this->routeIdBeingEdited);

        if ($route) {
            // Asocia o actualiza los paraderos y sus conteos en la tabla pivot
            $busstopsData = [];

            foreach ($this->selectedBusstopIds as $busstopId) {
                // Verifica si el índice existe en el array antes de acceder a él
                if (isset($this->selectedBusstopCounts[$busstopId])) {
                    $busstopsData[$busstopId] = ['order' => $this->selectedBusstopCounts[$busstopId]];
                } else {
                    // Si el índice no existe, puedes asignar un valor predeterminado o manejarlo según tus necesidades
                    $busstopsData[$busstopId] = ['order' => 1]; // Por ejemplo, asignar 1 como valor predeterminado
                }
            }

            $route->busstops()->sync($busstopsData);

            // Limpiar las variables después de guardar o actualizar
            $this->selectedBusstopIds = [];
            $this->selectedBusstopCounts = [];

            // Cerrar el modal de paraderos
            $this->closeRoutebusstopModal();

            // Renderizar nuevamente la vista para reflejar los cambios
            $this->render();
        }
    }

    public function closeRoutebusstopModal()
    {
        // Cerrar el modal de paraderos y limpiar las variables asociadas
        $this->showRoutebusstopModal = false;
        $this->selectedBusstopIds = [];
        $this->selectedBusstopCounts = [];
    }


    //* Fin de Paraderos Modal

    //*  Metodos ruta


    public function openCreateModal()
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal()
    {
        $this->showCreateModal = false;
    }

    public function closeEditModal()
    {
        $this->showEditModal = false;
    }


    public function save()
    {
        $this->validate([
            'name' => 'required',
            'service_day' => 'required',
            'departure_time' => 'required',
            'turn' => 'required',
            'direction' => 'required',
        ]);

        Route::create([
            'name' => $this->name,
            'service_day' => $this->service_day,
            'departure_time' => $this->departure_time,
            'turn' => $this->turn,
            'direction' => $this->direction,
        ]);

        $this->name = '';
        $this->service_day = '';
        $this->departure_time = '';
        $this->turn = '';
        $this->direction = '';

        $this->showCreateModal = false;
    }

    public function edit($routeid)
    {
        $this->resetValidation();
        $this->showEditModal = true;
        $route = Route::find($routeid);

        $this->name = $route->name;
        $this->service_day = $route->service_day;
        $this->departure_time = $route->departure_time;
        $this->turn = $route->turn;
        $this->direction = $route->direction;

        $this->routeIdBeingEdited = $route->id;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required',
            'service_day' => 'required',
            'departure_time' => 'required',
            'turn' => 'required',
            'direction' => 'required',
        ]);

        $route = Route::find($this->routeIdBeingEdited);

        if ($route) {
            $route->update([
                'name' => $this->name,
                'service_day' => $this->service_day,
                'departure_time' => $this->departure_time,
                'turn' => $this->turn,
                'direction' => $this->direction,
            ]);

            $this->reset([
                'name', 'service_day', 'departure_time', 'turn', 'direction', 'routeIdBeingEdited'
            ]);

            $this->showEditModal = false;
        }
    }

    public function destroy($routeid)
    {
        $route = Route::find($routeid);

        if ($route) {
            $route->delete();
            $this->render();
        }
    }

    public function render()
    {
        $routes = Route::where($this->buscapor,'like','%'.$this->search.'%')->paginate(10);
        
        $selectedRouteBusstops = $this->routeIdBeingEdited ? Route::find($this->routeIdBeingEdited)->busstops : collect();
        $allBusstops = BusStop::all();

        // Ordena los paraderos según el valor del orden
        $sortedSelectedRouteBusstops = $selectedRouteBusstops->sortBy(function ($busstop) {
            return $busstop->pivot->order;
        });

        return view('livewire.route-component', compact('routes', 'selectedRouteBusstops', 'allBusstops'));
    }
}
