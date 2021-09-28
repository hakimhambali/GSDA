<?php

namespace App\Http\Livewire\AttemptQuiz;

use Livewire\Component;
use App\Models\AttemptQuiz;
use App\Models\CreateQuiz;
use App\Models\Result;
use App\Models\Leaderboard;
use App\Models\Answer;
use App\Models\Question;

class AttemptQuizWire extends Component
{

    public $id_attemptquiz;
    public $action;
    public $CreateQuiz;
    public $id_createquiz;
    public $id_users;
    public $id_question;
    public $id_quiz;
    public $id_createquizzes;
    public $totalMark;
    public $hour;
    public $minute;
    // public $hours;
    // public $minutes;
    public $name;
    public $durationQuizMin;
    public $durationQuizHour;
    // public $postTime;


    protected $listeners = [
        'postTime' => 'finishAttempt',
        'refreshParent' => '$refresh',
        'delete'
    ];

    

    public function mount($id)
    { 
        $this->CreateQuiz = CreateQuiz::find($id);

    }
  
    public function selectItem($modelid , $action)
    {
        $this->id_question = $modelid;
        // dd($this->id_question);
        $this->action = $action;
        // dd($this->action);  
        if($action == "update")
        {
     
            $this->emit('getModelId' , $this->id_question);
            // dd($this->id_question);
        } 
        // else if($action == "add")
        //  {
        //     $this->emit('getModelId' , $this->id_attemptquiz);
        //  } 
    }

    public function delete()
    {
        $attemptquiz = AttemptQuiz::find($this->id_attemptquiz);

        $attemptquiz->delete();

    }

    public function seeResult($id_questions)
    {
        
        return redirect()->to('seeResult/'.$id_questions.'');
    }

    public function finishAttempt($modelid , $hour , $minute, $sec)
    {
    //    dd($modelid , $hour , $minute, $sec);
        $this->id_question = $modelid;
        // dd($this->id_question);
        // $totalMark = Attemptquiz::where('status_answer', '=' , '1' , 'id_users' , '=' , auth()->user()->id)->count();
        
        // $quizName = Question::where([['id', '='. 'this->id_question'] , ['id_createquizzes', '=', 'this->CreateQuiz']])->first();
        $createQuiz = CreateQuiz::where('id' , '=' , $this->CreateQuiz->id)->first();
        $quiz_id=$createQuiz->id;
        $quizName=$createQuiz->name;
       
        // $hour=$createQuiz->hour;
        // $minute=$createQuiz->minute;
        $totalMark = Attemptquiz::where([['status_answer', '=', '1'] ,[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $quiz_id]])->count();
        // dd($totalMark);
        // dd($quiz_id);
        // dd($this->CreateQuiz->id);
        // $status = Answer::where('id' , '=' , $this->answer)->first();
        // $status_answer=$status->status_answer;

        $leaderboard = new Leaderboard;
        $leaderboard->id_users = auth()->user()->id;
        $leaderboard->student_name = auth()->user()->name;
        $leaderboard->id_createquizzes = $quiz_id;
        $leaderboard->quiz_name = $quizName;
        $leaderboard->total_marks = $totalMark;
        $leaderboard->hour = $hour;
        $leaderboard->minute = $minute;
        $leaderboard->second = $sec;
        // $leaderboard->hour = $durationQuizHour;
        // $leaderboard->minute = $durationQuizMin;
        // $leaderboard->minute = $seconds;
        $leaderboard->save();
        // $status = Answer::where('id' , '=' , $this->answer)->first();
        session()->flash('message', 'You have successfully finish attempting the quiz');
    }
   
    public function editTime($durationHour1, $durationMin1, $durationSec1)
    {
        // dd($durationHour1);
        
    }

    public function render()
    {
        // if (auth()->user()->role == "admin") {
            // $attemptquizzes = AttemptQuiz::all();
            $attemptquizzes = AttemptQuiz::orderBy('created_at','desc')->get();
        // } else if(auth()->user()->role == "lecturer"){
        //     $coursefiles = CourseFile::whereHas('course' , function ($query) {
        //         $query->where('id_lecturer' , auth()->user()->id);
        //     })->get();
        // }

        return view('livewire.attempt-quiz.attempt-quiz-wire')->with(compact('attemptquizzes'));

        // return view('livewire.course-file.course-file-wire');
    }
}
