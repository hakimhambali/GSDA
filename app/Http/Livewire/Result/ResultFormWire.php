<?php

namespace App\Http\Livewire\Result;

use App\Http\Livewire\CreateQuiz\CreateQuizWire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Course;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use App\Models\Result;
use App\Models\Leaderboard;
use App\Models\Question;
use App\Models\Answer;
use Livewire\WithFileUploads;
// use Symfony\Component\Console\Question\Question;
use Illuminate\Support\Facades\DB;

class ResultFormWire extends Component
{
    use WithFileUploads;

    public $quiz_name;
    public $id_createquizzes;
    public $id_questions;
    public $id_question;
    public $model_id;
    public $actual_answer;
    public $answer_explanation;
    
    protected $listeners = [
        'getModelId'
    ];

    public function mount($id_createquizzes)
    { 
        // dd($id_questions);
        // $this->id_createquizzes = $id_createquizzes;
        // $this->id_createquizzes = CreateQuiz::find($this->id_createquizzes);
        // dd($this->id_createquizzes);
        $this->id_createquizzes = $id_createquizzes;
        // $this->id_question = $id_question;
    }

   

    public function getModelId($model_id)
    {
       
        $question = Question::find($model_id);
        // $this->actual_answer = $question->question_text;
        // $this->answer_explanation = $question->question_text;
        $this->model_id = $question->id;
    }

    public function render()
    {
        // if (auth()->user()->role == "admin") {
            // $totalMark = Attemptquiz::where([['status_answer', '=', '1'] ,[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $quiz_id]])->count();
            $leaderboards = Leaderboard::where([[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $this->id_createquizzes ]])->get();
            $answers = Answer::where( [['id_question', '=', $this->model_id], ['status_answer', '=', '1']] )->get();
            // dd($this->model_id);
            // $quizName = Question::where([['id', '='. 'this->id_question'] , ['id_createquizzes', '=', 'this->CreateQuiz']])->first();
            // $results = DB::select('SELECT * FROM leaderboards WHERE email = ?' , ['useremailaddress@email.com']);
            // $createQuiz = CreateQuiz::where('id' , '=' , $this->CreateQuiz->id)->first();
        // } else if(auth()->user()->role == "lecturer") {
        //     $createquizzes = CreateQuiz::where('id_lecturer',auth()->user()->id)->get();
        // }

        // return view('livewire.leaderboard.leaderboard-form-wire')->with(compact('leaderboards'));
        
        return view('livewire.result.result-form-wire')->with(compact('leaderboards', 'answers'));
        // return view('livewire.paid-resources.paid-resources-form-wire')->with(compact('courses'));

        // return view('livewire.course-file.course-file-form-wire');
    }
}
