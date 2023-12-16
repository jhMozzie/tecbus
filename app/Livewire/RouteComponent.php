<?php

namespace App\Livewire;

use App\Models\BusStop;
use App\Models\Route;
use Livewire\Component;
use Livewire\WithPagination;

class RouteComponent extends Component
{
    use WithPagination;

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
    public $routebusstops;
    public $showRoutebusstopModal = false;
    public $routebusstopId;
    public $routeName;
    public $busstopsForRoute;
    public $allBusstops;
    public $selectedBusstops = [];



    // Select radio buttons
    public $selectedBusstopIds = [];

    public function confirmRouteBusstops()
    {
        $route = Route::find($this->routeIdBeingEdited);

        // Sincroniza los paraderos asociados a la ruta
        $route->busstops()->sync($this->selectedBusstopIds);

        // Después de realizar las operaciones necesarias, puedes cerrar el modal
        $this->closeRoutebusstopModal();
    }

    public function mount()
    {
        $this->enumOptions = [
            'service_day' => ['Lunes a Viernes'],
            'turn' => ['Mañana', 'Tarde', 'Noche'],
            'direction' =>  ['Paradero Inicial a Tecsup', 'Tecsup a Paradero Final'],
        ];
    }

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

    public function openRoutebusstopModal($routeId)
    {
        $this->showRoutebusstopModal = true;
        $this->routeIdBeingEdited = $routeId;
        $route = Route::find($routeId);
        $this->routeName = $route->name;
        $this->busstopsForRoute = $route->busstops;
        $this->allBusstops = BusStop::all();
    }

    public function closeRoutebusstopModal()
    {
        $this->showRoutebusstopModal = false;
        $this->selectedBusstopIds = []; // Reinicia los paraderos seleccionados cuando se cierra el modal
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
        $routes = Route::paginate(5);
        $selectedRouteBusstops = $this->routeIdBeingEdited ? Route::find($this->routeIdBeingEdited)->busstops : collect();
        $allBusstops = BusStop::all();

        return view('livewire.route-component', compact('routes', 'selectedRouteBusstops', 'allBusstops'));
    }
}
