<?php

namespace App\Livewire;

use App\Models\Bus as ModelsBus;
use App\Models\Driver;
use Livewire\Component;
use Livewire\WithPagination;

class BusComponent extends Component
{
    //si no tiene el esto la paginacion te dara muchos errores es para hacer que sea dinamico 
    use WithPagination;
    // atributos de la tabla 
    public $drivers;
    //para cerrar y abrir con los if
    public $open2 = false;
    public $open = false;
    //atributos del bus
    public $model, $brand, $soat, $capacity;
    public $chofer = [];
    // propiedades para poder hacer el update e pintar el edit
    public $buside = '';
    public $busedit = [
        'v_model' => '',
        'v_brand' => '',
        'v_soat' => '',
        'v_capacity' => '',
        'v_chofer' => []
    ];

    public function save()
    {
        //validaciones para mi create son a los campos que tiene como valor en la vista
        $this->validate([
            'model' => 'required',
            'brand' => 'required',
            'soat' => 'required',
            'capacity' => 'required',
            'chofer' => 'required|array'
        ]);
        //se crea el nuevo bus y los guardon en bus
        $bus = ModelsBus::create($this->only('model', 'brand', 'soat', 'capacity'));
        //se hace la relacion de bus a chofer
        $bus->drivers()->attach($this->chofer);
        $this->reset(['model', 'brand', 'soat', 'capacity', 'chofer', 'open2']);
    }
    // al para pintar la tabla update
    public function edit($busid)
    {
        //falta poner el validate de este campo

        $this->resetValidation();
        //abre el pedaso de codigo 
        $this->open = true;
        $bus = ModelsBus::find($busid);
        //guardando el id para hacer el update despues 
        $this->buside = $busid;

        $this->busedit['v_model'] = $bus->model;
        $this->busedit['v_brand'] = $bus->brand;
        $this->busedit['v_soat'] = $bus->soat;
        $this->busedit['v_capacity'] = $bus->capacity;
        // aca tienes que poner $bus->drivers en este caso drivers es el nombre de la tabla a relacionar xd
        $this->busedit['v_chofer'] = $bus->drivers->pluck('id')->toArray();
    }

    public function update()
    {
        //aca tengo que poner los validadores para los campos de update  metele los erroes en el campo vista -------------
        $this->validate([
            'busedit.v_model' => 'required',
            'busedit.v_brand' => 'required',
            'busedit.v_soat' => 'required',
            'busedit.v_capacity' => 'required',
            'busedit.v_chofer' => 'required|array',
        ]);

        $bus = ModelsBus::find($this->buside);

        $bus->update([
            'model' => $this->busedit['v_model'],
            'brand' => $this->busedit['v_brand'],
            'soat' => $this->busedit['v_soat'],
            'capacity' => $this->busedit['v_capacity'],
        ]);
        //ese metodo se usa para sincronizar
        $bus->drivers()->sync($this->busedit['v_chofer']);
        //reseteo tambien el open para cerrarlo
        $this->reset(['buside', 'busedit', 'open']);
        //con esto actualizo en tiempo real 
    }

    //funcion usada solo para abrir el crear y tambien para que resete las validaciones
    public function crear()
    {
        $this->resetValidation();
        $this->open2 = true;
    }
    // eliminando el delete papu
    public function destroy($bustid)
    {
        $bus = ModelsBus::find($bustid);
        $bus->delete();
    }
    public function mount()
    {
        $this->drivers = Driver::all();
    }
    public function render()
    {
        $buses = ModelsBus::paginate(10);
        return view('livewire.bus-component', compact('buses'));
    }
}
