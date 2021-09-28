<?php

namespace App\Http\Livewire\BoardGame;

use Livewire\Component;
use App\Models\AttemptQuiz;
use App\Models\Answer;
use App\Models\Question;

class BoardGameFormWire extends Component
{
    public $id_attemptquiz;
    public $name;
    public $id_course;
    public $id_createquizzes;
    public $model_id;
    public $id_question;
    public $answer;
    public $id_answer;
    public $question;
    public $question_text;
    public $id_users;
    public $attemptquiz;
    public $status_answer;

    public function render()
    {
        return view('livewire.board-game.board-game-form-wire');
    }
}
