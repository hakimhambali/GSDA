<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserFormWire extends Component
{

    public $name;
    public $email;
    public $password;
    public $role;
    public $model_id;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $user = User::find($model_id);

        $this->model_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->role;

    }

    public function store()
    {
        
        if($this->model_id)
        {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255',
                'role' => 'required',
            ]);
            
            $update = User::find($this->model_id);
            $update->name = $this->name;
            $update->email = $this->email;

            if(($this->password != null) || ($this->password != ''))
            {
                $this->validate([
                   
                    'password' => 'required|string|min:6',
                    
                ]);

                $update->password = Hash::make($this->password);
            }

            $update->role = $this->role;
            $update->save();
    
            session()->flash('message', 'User successfully updated');
        }
        else
        {
            $this->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',
                'role' => 'required',
            ]);

            $add = New User;
            $add->name = $this->name;
            $add->email = $this->email;
            $add->password = Hash::make($this->password);
            $add->role = $this->role;
            $add->save();
    
            session()->flash('message', 'New user successfully added');
        }
       
        $this->emit('refreshParent');

    }
    
    public function render()
    {
        return view('livewire.user.user-form-wire');
    }
}
