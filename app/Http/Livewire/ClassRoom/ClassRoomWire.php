<?php

namespace App\Http\Livewire\ClassRoom;

use Livewire\Component;
use App\Models\Team;

class ClassRoomWire extends Component
{
    public $class_id;
    public $owner_id;
    public $name;
    public $personal_team;
    public $action;

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete',
    ];

    public function selectItem($modelid , $action)
    {
        $class = Team::find($modelid);

        $this->class_id = $modelid;
        $this->name = $class->name;
        $this->action = $action;

        if($action == "update")
        {
            $this->emit('getModelId' , $this->class_id);
        }
        
    }

    public function delete()
    {
        $team = Team::find($this->class_id);

        $team->delete();

    }

    public function render()
    {
        if (auth()->user()->role == 'admin')
        {
            // $teams = Team::all();
            $teams = Team::orderBy('created_at','desc')->get();
        }
        else if(auth()->user()->role == 'lecturer')
        {
            // $teams = Team::where('id' , auth()->user()->current_team_id)->get();
            $teams = Team::where('id' , auth()->user()->current_team_id)->orderBy('created_at','desc')->get();

        }
        return view('livewire.class-room.class-room-wire')->with(compact('teams'));

        // return view('livewire.class-room.class-room-wire');
    }
}
