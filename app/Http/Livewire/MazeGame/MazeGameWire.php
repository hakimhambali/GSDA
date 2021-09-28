<?php

namespace App\Http\Livewire\MazeGame;

use Livewire\Component;
use App\Models\LeaderboardGame;
use App\Models\Question;

class MazeGameWire extends Component
{   
    public $drawMoves;
    public $moves;
    public $Question;

    protected $listeners = [
        // 'drawMoves' => 'popupQuiz',
        'postTime' => 'finishAttempt'
    ];

    // public function mount($id)
    // { 
    //     $this->Question = Question::find($id);
    // }

    public function finishAttempt($hour , $minute, $sec)
    {
        // dd('hello');
        $leaderboardgames = new LeaderboardGame;
        $leaderboardgames->id_users = auth()->user()->id;
        $leaderboardgames->student_name = auth()->user()->name;
        $leaderboardgames->hour = $hour;
        $leaderboardgames->minute = $minute;
        $leaderboardgames->second = $sec;
        $leaderboardgames->save();
        session()->flash('message', 'You have successfully finish attempting the quiz');
    }

    // public function popupQuiz($questions)
    // {
    //     // dd($this->id_questions);
    //     dd('anjing');
    //     // $this->emit('popQuiz');
    //     // $question = Question::all();
    // }
    
    public function render()
    {
        return view('livewire.maze-game.maze-game-wire');
    }
}
