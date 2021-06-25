<?php

namespace App\Http\Livewire\Result;

use App\Models\AttemptQuiz;
use App\Models\Course;
use Livewire\Component;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use App\Models\Leaderboard;
use App\Models\Result;
use App\Models\Question;
use App\Models\Answer;

class ResultWire extends Component
{
    
    public $id_coursefile;
    public $action;
    public $store;
    public $resourcesfile;
    public $name = null;
    public $id_createquizzes;
    public $CreateQuiz;
    public $Question;
    public $id_question;
    public $modelid;
    public $model_id;

    // public $id;


    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function mount($id)
    { 
        $this->CreateQuiz = CreateQuiz::find($id);
        $this->id_createquizzes = $id;
        // $this->Question = Question::find($id2);
        // $this->id_question = $id2;
        // dd($this->id_question);
    }

    public function selectItem($modelid , $action)
    {
        
        $this->id_question = $modelid;
        // dd($this->id_question);
        $this->action = $action;
        // dd( $this->action);
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_question);
            $attemptQuizzes = AttemptQuiz::where([['id_question', '=', $this->id_question] , ['status_answer', '=', '1']])->count();
        }  
        // $attemptQuizzes = AttemptQuiz::where([['id_question', '=', $this->id_question] , ['status_answer', '=', '1']])->count();
        // dd($attemptQuizzes);
        // $question = Question::find($modelid);
        // $this->model_id = $question->id;
        // dd($this->model_id);
    }

    // public function selectItem2($modelid , $action)
    // {
        
    //     $this->id_question = $modelid;
    //     // dd($this->id_question);
    //     $this->action = $action;
    //     // dd( $this->action);
    //     if($action == "update")
    //     {
    //         $this->emit('getModelId' , $this->id_question);
    //          $attemptQuizzes = AttemptQuiz::where([['id_question', '=', $this->id_question] , ['status_answer', '=', '1']])->count();
    //     }  
    // }

    // public function finishAttempt($modelid , $action)
    // {
    //     // $this->id_question = $modelid;
    //     // $createQuiz = CreateQuiz::where('id' , '=' , $this->CreateQuiz->id)->first();
    //     // $quiz_id=$createQuiz->id;
    //     // $quizName=$createQuiz->name;
    //     // $hour=$createQuiz->hour;
    //     // $minute=$createQuiz->minute;
    //     // $totalMark = Attemptquiz::where([['status_answer', '=', '1'] ,[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $quiz_id]])->count();
    //     $this->id_question = $modelid;
    //     $this->action = $action;
    //     if($action == "update")
    //     {
    //         $this->emit('getModelId' , $this->id_question);
    //     }  
        
    // }

    // public function seeResult($id_questions)
    // {
        
    //     return redirect()->to('result/'.$id_questions.'');
    // }

    public function render()
    {
        // if ($this->name != null) {
        //     if (auth()->user()->role == "admin") {
        //         $resourcesfiles = IpfsResources::where('resources_name' , 'like' , '%'.$this->name.'%')->orderBy('created_at','desc')->get();
        //     } else if(auth()->user()->role == "lecturer"){
        //         $resourcesfiles = IpfsResources::where('resources_name' , 'like' , '%'.$this->name.'%')->orderBy('created_at','desc')->get();
        //     }
        // } else if($this->name == null || $this->name == ""){
        //     if (auth()->user()->role == "admin") {
        //         $resourcesfiles = IpfsResources::orderBy('created_at','desc')->get();
        //     } else if(auth()->user()->role == "lecturer"){
        //         $resourcesfiles = IpfsResources::where('resources_name' , 'like' , '%'.$this->name.'%')->orderBy('created_at','desc')->get();
        //     }
        // }
        // else{
        //     if (auth()->user()->role == "admin") {
        //         $resourcesfiles = IpfsResources::orderBy('created_at','desc')->get();
        //     } else if(auth()->user()->role == "lecturer"){
        //         $resourcesfiles = IpfsResources::where('resources_name' , 'like' , '%'.$this->name.'%')->orderBy('created_at','desc')->get();
        //     }
        // }
        
        $questions = Question::where([[ 'id_createquizzes', '=', $this->id_createquizzes ]])->get();
        $attemptQuizzes = AttemptQuiz::where([['id_question', '=',  $this->id_question] , ['status_answer', '=', '1']])->count();
        // dd($this->id_question);
        // dd($this->CreateQuiz);
        // dd($results);
        // $answers = Answer::where([[ 'id_question', '=', '19' ] ,[ 'status_answer', '=', '1']])->get();
        // dd($answers);
        // dd($results2);
        // $attemptQuizzes = AttemptQuiz::where([[ 'id_users', '=', auth()->user()->id], [ 'id_createquizzes', '=', $this->id_createquizzes ]])->get();
        // dd($results3);
        // $leaderboards = Leaderboard::where([[ 'id_users', '=', auth()->user()->id] ,[ 'id_createquizzes', '=', $this->id_createquizzes ]])->get();
        $leaderboards = Leaderboard::where([[ 'id_createquizzes', '=', $this->id_createquizzes ]])->count();
        // dd($results4);
        // dd(view('livewire.result.result-wire')->with(compact('results', 'results2', 'results3', 'results4')));
        return view('livewire.result.result-wire')->with(compact('questions', 'attemptQuizzes', 'leaderboards'));
        
        // return view('livewire.class-room-resources.class-room-resources-form-wire')->with(compact('courses', 'ipfsusers'));
        // return view('livewire.paid-resources.paid-resources-wire')->with(compact('resourcesfiles'));
    }
}