<?php

namespace App\Livewire;

<<<<<<< Updated upstream
use App\Models\User;
use App\Models\UserType;
use Livewire\Component;
use Livewire\WithPagination;
=======
use Livewire\Component;
>>>>>>> Stashed changes

class UserComponent extends Component
{   
    use WithPagination;
<<<<<<< Updated upstream

    public $search;
    public $buscapor = "dni";
    public $user_types;

    public function mount()
    {
        $this->user_types = Usertype::all();
    }
=======
    
    public $search;
    public $buscapor = "dni";
>>>>>>> Stashed changes

    public $dni,$name,$lastname,$email,$phone,$user_type_id;

    public $open2 =false;
    public $open =false;

<<<<<<< Updated upstream
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
=======
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
>>>>>>> Stashed changes
    }
    
    public function edit($id){
        $this->resetValidation();
        $this-> open = true;
<<<<<<< Updated upstream
        $user = User::find($id);
        
        $this-> userid = $id ;

        $this->useredit['edidni'] = $user->dni;
        $this->useredit['ediname'] = $user->name;
        $this->useredit['edilastname'] = $user->lastname;
        $this->useredit['ediemail'] = $user->email;
        $this->useredit['ediphone'] = $user->phone;
        $this->useredit['ediuser_type_id'] = $user->user_type_id;
=======
        $conductor = Driver::find($id);
        
        $this-> driverid = $id ;

        $this->driveredit['edidni'] = $conductor->dni;
        $this->driveredit['ediname'] = $conductor->name;
        $this->driveredit['edilastname'] = $conductor->lastname;
        $this->driveredit['ediphone'] = $conductor->phone;
        $this->driveredit['edilicense_number'] = $conductor->license_number;
        $this->driveredit['edilicense_type'] = $conductor->license_type;
    
>>>>>>> Stashed changes
    }

    public function update(){
        
        $this->validate([
<<<<<<< Updated upstream
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
=======
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
        return view('livewire.user-component');
>>>>>>> Stashed changes
    }
}
