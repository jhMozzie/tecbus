<?php

namespace App\Livewire;

use App\Models\Boarding;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class ProfesorTripComponent extends Component
{
    use WithPagination;

    public $profesorReservasRealizadas = [];
    public $search;
    public $buscapor = "name";
    public $usuario;

    public function reservar($viaje)
    {
        $haReservado = $this->usuario->boardings()->where('trip_id', $viaje['id'])->exists();

        if (!$haReservado && $viaje['professor_capacity'] < 5) {
            $boarding = Boarding::create([
                'confirmation' => 'no',
                'trip_id' => $viaje['id']
            ]);

            $viajeModel = Trip::find($viaje['id']);
            $viajeModel->increment('professor_capacity');

            $this->usuario->boardings()->attach($boarding->id);

            $this->profesorReservasRealizadas[$viaje['id']] = true;
        } else {
            $this->profesorReservasRealizadas[$viaje['id']] = true;
        }
    }

    public function eliminar($tripId)
    {
        $boarding = Boarding::where('trip_id', $tripId)->first();

        if ($boarding) {
            $this->usuario->boardings()->detach($boarding->id);

            $viajeModel = Trip::find($tripId);

            if ($viajeModel) {
                $viajeModel->decrement('professor_capacity');
                $this->profesorReservasRealizadas[$tripId] = false;
            }

            $boarding->delete();
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

        foreach ($trips as $trip) {
            if (!isset($this->profesorReservasRealizadas[$trip->id])) {
                $this->profesorReservasRealizadas[$trip->id] = false;
            }
        }

        return view('livewire.profesor-trip-component', compact('trips'));
    }
}
