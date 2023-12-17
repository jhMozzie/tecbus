<?php

namespace App\Livewire;

use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class DriverComponent extends Component
{   
        //si no tiene el esto la paginacion te dara muchos errores es para hacer que sea dinamico 
    use WithPagination;
        //variable para buscar
    public $search;
    public $buscapor = "dni";
    // atribustods para el crear 
    public $dni,$name,$lastname,$phone,$license_number,$license_type;
    // 
    //public $edidni,$ediname,$edilastname,$ediphone,$edilicense_number,$edilicense_type;

    public $open2 =false;
    public $open =false;
    
    public $driverid = "";

    public $driveredit =[
        'edidni'=> '',
        'ediname'=> '',
        'ediphone'=> '',
        'edilastname'=> '',
        'edilicense_number'=> '',
        'edilicense_type'=> ''
    ];

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
    
    public function edit($id){
        $this->resetValidation();
        $this-> open = true;
        $conductor = Driver::find($id);
        
        $this-> driverid = $id ;

        $this->driveredit['edidni'] = $conductor->dni;
        $this->driveredit['ediname'] = $conductor->name;
        $this->driveredit['edilastname'] = $conductor->lastname;
        $this->driveredit['ediphone'] = $conductor->phone;
        $this->driveredit['edilicense_number'] = $conductor->license_number;
        $this->driveredit['edilicense_type'] = $conductor->license_type;
    
    }

    public function update(){
        
        $this->validate([
            'driveredit.edidni' => 'required',
            'driveredit.ediname' => 'required',
            'driveredit.edilastname' => 'required',
            'driveredit.ediphone' => 'required',
            'driveredit.edilicense_number' => 'required',
            'driveredit.edilicense_type' => 'required',
        ]);
        
        $conductor  = Driver::find($this->driverid);

        $conductor->update([
            'dni' => $this->driveredit['edidni'],
            'name' => $this->driveredit['ediname'],
            'lastname' => $this->driveredit['edilastname'],
            'phone' => $this->driveredit['ediphone'],
            'license_number' => $this->driveredit['edilicense_number'],
            'license_type' => $this->driveredit['edilicense_type'],
        ]);

        $this->reset(['driveredit','driverid','open']);
    }


    public function destroy($id){
        $conductor = Driver::find($id);
        $conductor->delete();
    }

    public function render()
    {

        $drivers = Driver::where($this->buscapor,'like','%'.$this->search.'%')->paginate(10);
        return view('livewire.driver-component',compact('drivers'));
    }
}
