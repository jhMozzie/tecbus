<?php

namespace App\Livewire;

use App\Models\Boarding;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class ProfesorTripComponent extends Component
{
    use WithPagination;

    public $reservasRealizadas = [];
    public $search;
    public $buscapor = "name";
    public $usuario;

    public function reservar($viaje)
    {
        $professorCapacity = $viaje['professor_capacity'];

        if ($professorCapacity <= 5) {
            $boarding = Boarding::create([
                'confirmation' => 'no',
                'trip_id' => $viaje['id']
            ]);

            $viajeModel = Trip::find($viaje['id']);
            $viajeModel->increment('professor_capacity');

            $this->usuario->boardings()->attach($boarding->id);

            $this->reservasRealizadas[$viaje['id']] = true;
            $mensaje = '¡Reserva exitosa!';
        } else {
            $mensaje = '¡No hay lugares disponibles!';
        }
    }

    public function eliminar($tripId)
    {
        $boarding = Boarding::where('trip_id', $tripId)->first();

        if ($boarding) {
            $boarding->delete();
            $this->usuario->boardings()->detach($boarding->id);

            $viajeModel = Trip::find($tripId);
            $viajeModel->decrement('professor_capacity');

            $this->reservasRealizadas[$tripId] = false;
        }
    }

    public function render()
    {
        $query = Trip::query();
    
        if ($this->search) {
            if ($this->buscapor === 'name') {
                $query->whereHas('route', function ($routeQuery) {
                    $routeQuery->where('name', 'like', '%' . $this->search . '%');
                });
            } elseif ($this->buscapor === 'license_plate') {
                $query->whereHas('busdriver.bus', function ($busQuery) {
                    $busQuery->where('license_plate', 'like', '%' . $this->search . '%');
                });
            } elseif ($this->buscapor === 'driver_name') {
                $query->whereHas('busdriver.driver', function ($driverQuery) {
                    $driverQuery->where('name', 'like', '%' . $this->search . '%');
                });
            } elseif ($this->buscapor === 'driver_lastname') {
                $query->whereHas('busdriver.driver', function ($driverQuery) {
                    $driverQuery->where('lastname', 'like', '%' . $this->search . '%');
                });
            }
        }
    
        $trips = $query->paginate(9);

        // Inicializa el estado de las reservas para cada viaje
        foreach ($trips as $trip) {
            if (!isset($this->reservasRealizadas[$trip->id])) {
                $this->reservasRealizadas[$trip->id] = false;
            }
        }
    
        return view('livewire.profesor-trip-component', compact('trips'));
    }
}
