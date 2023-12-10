<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;

class DriverComponent extends Component
{   
    public $dni,$name,$lastname,$phone,$license_number,$license_type;

    public $open2 =false;



    public function crear(){
        $this->resetValidation();
        $this->open2 = true;
    }





    public function save(){
    // Validaciones para el formulario de creación
    $this->validate([
        'dni' => 'required|string|unique:drivers,dni',
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'phone' => 'required|string', 
        'license_number' => 'required|string|max:50|unique:drivers,license_number',
        'license_type' => 'required|string|max:50',
    ]);

    // Se crea el nuevo conductor y se guarda en la tabla 'drivers'
    Driver::create($this->only('dni', 'name', 'lastname', 'phone', 'license_number', 'license_type'));

    // Se reinician los campos y se cierra el formulario
    $this->reset(['dni', 'name', 'lastname', 'phone', 'license_number', 'license_type', 'open2']);
}

    public function render()
    {
        $drivers = Driver::paginate(10);
        return view('livewire.driver-component',compact('drivers'));
    }
}
