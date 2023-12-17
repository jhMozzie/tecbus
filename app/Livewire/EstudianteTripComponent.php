<?php

namespace App\Livewire;

use App\Models\Boarding;
use App\Models\Trip;
use Livewire\Component;
use Livewire\WithPagination;

class EstudianteTripComponent extends Component
{
    use WithPagination;

    public $reservaRealizada = false;// Propiedad para controlar el estado del botón de reserva
    //variable para buscar
        public $search;
        public $buscapor = "name";
    // este dato usuario ya tiene todos los valores de estudiante
    public $usuario;

   public function reservar($viaje)
   {
       // Verifica si hay lugares disponibles
       
       $studentCapacity = $viaje['student_capacity'];
   
       if ($studentCapacity <= 35) {
           // Crea un nuevo abordaje
           $boarding = Boarding::create([
               'confirmation' => 'no',
               'trip_id' => $viaje['id']
           ]);
   
        // Aumenta student_capacity en uno
        $viajeModel = Trip::find($viaje['id']);
        $viajeModel->increment('student_capacity');

           // Relaciona el abordaje con el usuario actual
           $this->usuario->boardings()->attach($boarding->id);
   
           // Mensaje de éxito
           $mensaje = '¡Reserva exitosa!';
       } else {
           // Mensaje si no hay lugares disponibles
           $mensaje = '¡No hay lugares disponibles!';
       }
   
       dd($this->usuario, $viaje['student_capacity'], $mensaje);
   }

   public function eliminar($tripId)
   {
       // Lógica para eliminar el boarding y la relación en la tabla intermedia
       $boarding = Boarding::where('trip_id', $tripId)->first();

       if ($boarding) {
           $boarding->delete();
           $this->usuario->boardings()->detach($boarding->id);
           $this->reservaRealizada = false; // Habilitar nuevamente el botón de reserva
       }
       
       // Resta student_capacity en uno
       $viajeModel = Trip::find($tripId);
       $viajeModel->decrement('student_capacity');
   }

   public function render()
   {
       $query = Trip::query();
   
       if ($this->search) {
           if ($this->buscapor === 'name') {
               // Búsqueda por nombre de la ruta
               $query->whereHas('route', function ($routeQuery) {
                   $routeQuery->where('name', 'like', '%' . $this->search . '%');
               });
           } elseif ($this->buscapor === 'license_plate') {
               // Búsqueda por placa del bus
               $query->whereHas('busdriver.bus', function ($busQuery) {
                   $busQuery->where('license_plate', 'like', '%' . $this->search . '%');
               });
           } elseif ($this->buscapor === 'driver_name') {
               // Búsqueda por nombre del chofer
               $query->whereHas('busdriver.driver', function ($driverQuery) {
                   $driverQuery->where('name', 'like', '%' . $this->search . '%');
               });
           } elseif ($this->buscapor === 'driver_lastname') {
               // Búsqueda por nombre del chofer
               $query->whereHas('busdriver.driver', function ($driverQuery) {
                   $driverQuery->where('lastname', 'like', '%' . $this->search . '%');
               });
           }
       }
   
       $trips = $query->paginate(9);
   
       return view('livewire.estudiante-trip-component', compact('trips'));
    }
}