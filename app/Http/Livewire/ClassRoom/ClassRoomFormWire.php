<?php

namespace App\Http\Livewire\ClassRoom;

use Livewire\Component;
use App\Models\Team;
use App\Models\User;

class ClassRoomFormWire extends Component
{
    public $owner_id;
    public $name;
    public $personal_team;
    public $model_id;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $team = Team::find($model_id);

        $this->owner_id = $team->user_id;
        $this->name = $team->name;
        $this->personal_team = $team->personal_team;
        $this->model_id = $team->id;
    
    }

    public function store()
    {
        

        if($this->model_id)
        {
            $this->validate([
                'owner_id' => 'required',
                'name' => 'required|string|max:255',
            ]);
            
            $update = Team::find($this->model_id);
            $update->name = $this->name;
            $update->user_id = $this->owner_id;
            $update->personal_team = 0;
            $update->save();
    
            session()->flash('message', 'Class successfully updated');
        }
        else
        {
            $this->validate([
                'name' => 'required|string|max:255',
            ]);

            $add = New Team;
            $add->name = $this->name;
            $add->user_id = $this->owner_id;
            $add->personal_team = 0;
            $add->save();
    
            session()->flash('message', 'New class successfully added');
        }
       
        $this->emit('refreshParent');

    }

    public function render()
    {
        // $users = User::where('role' , 'lecturer')->get();
        $users = User::where('role' , 'lecturer')->orderBy('created_at','desc')->get();
        return view('livewire.class-room.class-room-form-wire')->with(compact('users'));

        // return view('livewire.class-room.class-room-form-wire');
    }
}
