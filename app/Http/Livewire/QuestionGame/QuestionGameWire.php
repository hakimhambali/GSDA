<?php

namespace App\Http\Livewire\QuestionGame;

use Livewire\Component;
use App\Models\LeaderboardGame;
use App\Models\Answer;
use App\Models\Question;

class QuestionGameWire extends Component
{
    public function questionPop()
    {
           dd('john');
        // $question = Question::inRandomOrder()->get();
        $question = Question::find('31');
        $this->question = $question->question_text;
        $this->dispatchBrowserEvent('update-question', ['question' => $this->question]);
        // dd($this->question);
    }

    public function render()
    {
        return view('livewire.question-game.question-game-wire');
    }
}
