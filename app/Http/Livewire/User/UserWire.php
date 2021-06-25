<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

use App\Models\User;

class UserWire extends Component
{
  
    public $id_user;
    public $action;
    
    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

   
    public function selectItem($id_user , $action)
    {
        
        $this->id_user = $id_user;
       
        $this->action = $action;
      
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_user);
        }
        
    }

    public function delete()
    {
        $user = User::find($this->id_user);

        $user->delete();
    }

    
    public function render()
    {
        // $users = User::all();
        $users = User::orderBy('created_at','desc')->get();

        return view('livewire.user.user-wire')->with(compact('users'));

        // return view('livewire.user.user-wire');
    }
}
