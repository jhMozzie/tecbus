<?php

namespace App\Livewire;

use App\Models\UserType;
use Livewire\Component;
use Livewire\WithPagination;

class UserTypeComponent extends Component
{   
    use WithPagination;

    public $search;
    public $buscapor = "name";
    public $name;

    public $open2 =false;
    public $open =false;

    public $user_type_id = "";

    public $user_type_edit=[
        'ediname'=> '',
    ];

    public function crear(){
        $this->resetValidation();
        $this->open2 = true;
    }

    public function save(){

        $this->validate([
            'name' => 'required|string|max:255',
        ]);
        
        
        UserType::create($this->only('name'));

        $this->reset(['name', 'open2']);
    }

    public function edit($id){
        $this->resetValidation();
        $this-> open = true;
        $user_type = UserType::find($id);
        
        $this-> user_type_id = $id ;

        $this->user_type_edit['ediname'] = $user_type->name;
    }

    public function update(){
        
        $this->validate([
            'user_type_edit.ediname' => 'required',
        ]);
        
        $user_type  = UserType::find($this->user_type_id);

        $user_type->update([
            'name' => $this->user_type_edit['ediname'],
        ]);

        $this->reset(['user_type_edit','user_type_id','open']);
    }

    public function destroy($id){
        $user_type = UserType::find($id);
        $user_type->delete();
    }

    
    public function render()
    {   
        $user_types = UserType::where($this->buscapor,'like','%'.$this->search.'%')->paginate(10);
        return view('livewire.user-type-component',compact('user_types'));
    }
}
