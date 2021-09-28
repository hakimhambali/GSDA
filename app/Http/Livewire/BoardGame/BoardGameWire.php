<?php

namespace App\Http\Livewire\BoardGame;

use Livewire\Component;
use App\Models\LeaderboardGame;
use App\Models\Answer;
use App\Models\Question;

class BoardGameWire extends Component
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

    protected $listeners = [
        'postTime' => 'finishAttempt',
        // 'questionQuiz' => 'questionPop',
        'answerQuiz' => 'answerPop'
    ];

    // public function questionPop()
    // {
    //     //    dd('john');
    //     // $question = Question::inRandomOrder()->get();
    //     $question = Question::find('31');
    //     $this->question = $question->question_text;
    //     $this->dispatchBrowserEvent('update-question', ['question' => $this->question]);
    //     // dd($this->question);
    // }

    public function answerPop()
    {
        $answer = Answer::find('31');
        $this->answer = $answer->answer;
        // dd($this->answer);
    }

    public function finishAttempt($hour , $minute, $sec)
    {
        $leaderboardgames = new LeaderboardGame;
        $leaderboardgames->id_users = auth()->user()->id;
        $leaderboardgames->student_name = auth()->user()->name;
        $leaderboardgames->hour = $hour;
        $leaderboardgames->minute = $minute;
        $leaderboardgames->second = $sec;
        $leaderboardgames->save();
        // session()->flash('message', 'You have successfully finish attempting the quiz');
    }

    public function render()
    {
        return view('livewire.board-game.board-game-wire');
    }
}
