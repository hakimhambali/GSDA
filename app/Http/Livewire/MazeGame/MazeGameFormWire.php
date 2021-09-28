<?php

namespace App\Http\Livewire\MazeGame;

use Livewire\Component;
use App\Models\Question;

class MazeGameFormWire extends Component
{
    public $Question;
    public $id_questions;
    public $drawMoves;
    public $moves;

    protected $listeners = [
        'drawMoves' => 'popupQuiz',
    ];

    // public function mount($id_question)
    // { 

    //     $this->id_questions = $id_question;

    //     $this->questions = Question::find($this->id_questions);
    // }

    public function popupQuiz()
    {
        // dd($this->id_questions);
        // dd('hello');
        // $this->emit('popQuiz');
        // $question = Question::all();
    }
    

    public function render()
    {
        return view('livewire.maze-game.maze-game-form-wire');
    }
}
