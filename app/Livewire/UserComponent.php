<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\UserType;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{   
    use WithPagination;

    public $search;
    public $buscapor = "dni";
    public $user_types;

    public function mount()
    {
        $this->user_types = Usertype::all();
    }

    public $dni,$name,$lastname,$email,$phone,$user_type_id;

    public $open2 =false;
    public $open =false;

    public $userid = "";

    public $useredit =[
        'edidni'=> '',
        'ediname'=> '',
        'edilastname'=> '',
        'ediemail'=> '',
        'ediphone'=> '',
        'ediuser_type_id'=> '',
    ];

    public function save(){

        $this->validate([
            'dni' => 'required|string|unique:users,dni',
            'name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'email' => 'required|string|unique:users,email',
            'phone' => 'required|string', 
            'user_type_id' => 'required|string',
        ]);
        
        
        User::create($this->only('dni', 'name','lastname', 'email', 'password', 'phone'));

        $this->reset(['dni', 'name', 'lastname', 'email', 'password', 'phone', 'user_type', 'open2']);
    }
    
    public function edit($id){
        $this->resetValidation();
        $this-> open = true;
        $user = User::find($id);
        
        $this-> userid = $id ;

        $this->useredit['edidni'] = $user->dni;
        $this->useredit['ediname'] = $user->name;
        $this->useredit['edilastname'] = $user->lastname;
        $this->useredit['ediemail'] = $user->email;
        $this->useredit['ediphone'] = $user->phone;
        $this->useredit['ediuser_type_id'] = $user->user_type_id;
    }

    public function update(){
        
        $this->validate([
            'useredit.edidni' => 'required',
            'useredit.ediname' => 'required',
            'useredit.edilastname' => 'required',
            'useredit.ediemail' => 'required',
            'useredit.ediphone' => 'required',
            'useredit.ediuser_type_id' => 'required',
        ]);
        
        $user  = User::find($this->userid);

        $user->update([
            'dni' => $this->useredit['edidni'],
            'name' => $this->useredit['ediname'],
            'lastname' => $this->useredit['edilastname'],
            'email' => $this->useredit['ediemail'],
            'phone' => $this->useredit['ediphone'],
            'user_type_id' => $this->useredit['ediuser_type_id'],
        ]);

        $this->reset(['useredit','userid','open']);
    }

    public function destroy($id){
        $user = User::find($id);
        $user->delete();
    }

    public function render()
    {   
        $users = User::where($this->buscapor, 'like', '%' . $this->search . '%')->paginate(10);
        return view('livewire.user-component',compact('users'));
    }
}
