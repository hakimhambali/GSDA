<?php

namespace App\Http\Livewire\AttemptQuiz;

use Livewire\Component;
use App\Models\Course;
use App\Models\AttemptQuiz;
use Livewire\WithFileUploads;
use App\Models\Answer;
use App\Models\Question;
use App\Models\User;

class AttemptQuizFormWire extends Component
{
    use WithFileUploads;

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
    // public $id;

    public function mount($id_createquizzes)
    { 
        
        $this->id_createquizzes = $id_createquizzes;
    }

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $question = Question::find($model_id);
        //  dd($question);
        $this->question_text = $question->question_text;
        // dd($this->question_text);
        // $this->id_question = $question->id;
        $this->question = $question;
        // dd($this->question);
   
        // dd($this->id_question);
        // $this->answer = $question->answers->answer;
        //    dd($this->answer);

        $this->model_id = $question->id;
        // dd($this->model_id);
    
    }

    public function store()
    {
        $this->validate([
            'answer' => 'required',
        ]);
        
        
        // $search = New AttemptQuiz;
        // $question1 = Question::find($this->model_id);
        //  dd($question1);
        // $search = AttemptQuiz::find ([
        //     'id_question' => $this->model_id
        // ]);
        // dd($id_question);
        // $update = CreateQuiz::find($this->model_id);
        //  dd($this->model_id);
        // $search->id_question = $this->model_id;
        // dd($search->id_question);
        // dd($search);
        // $search = AttemptQuiz::find($id);
        // dd(AttemptQuiz::find($this->id_question));
        // if($this->model_id != $attemptquizzes->$answer->$question1->id_question)
        // $question = Question::find($this->model_id);
        // foreach($question->answer as $answer)
        // {if(count($answer->attemptquiz) > 0); }
        // $search = AttemptQuiz::find($this->model_id);

        $attemptquiz = AttemptQuiz::where('id_users' , '=' , auth()->user()->id)->where('id_question' , '=' , $this->model_id)->get();
        $status = Answer::where('id' , '=' , $this->answer)->first();
        // $status=Answer::where('id', '=', $this->answer)->first();
        // dd($status);
        $status_answer=$status->status_answer;

        $question = Question::where('id' , '=' , $this->model_id)->first();
        // dd($this->model_id);
        $id_createquizzes=$question->id_createquizzes;

        // dd($status_answer);
        if(count($attemptquiz) > 0){
            // $status=getStatusAnswer($this->answer);
            // dd($status);
            
            foreach ($attemptquiz as $key => $update) {
                $update->id_answer = $this->answer;
                // $update->status_answer = $status_answer;
                // $update->id_createquizzes = $id_createquizzes;
                // dd($this->status_answer);
                $update->save();           
            }
            session()->flash('message', 'Your answer successfully updated');
        }
        else{
            // $status=getStatusAnswer($this->answer);
           
            // dd($status);
            $add = New AttemptQuiz;
            // dd( New AttemptQuiz);
            $add->id_answer = $this->answer;
            $add->id_question = $this->model_id;
            $add->id_users = auth()->user()->id;
            $add->status_answer = $status_answer;
            $add->id_createquizzes = $id_createquizzes;
            $add->save();
            session()->flash('message', 'Your answer successfully submitted');
        }

        // if($this->model_id != 1)
        // {
            
        //     // dd(count($question->answer));
        //     $add = New AttemptQuiz;
        //     // dd( New AttemptQuiz);
        //     $add->id_answer = $this->answer;
        //     $add->id_question = $this->model_id;
        //     $add->id_users = auth()->user()->id;
        //     $add->save();
    
        //     session()->flash('message', 'Your answer successfully submitted');
        // }
        // else
        // {
        //     $update = AttemptQuiz::find(23);
        //     $update->id_answer = $this->answer;
        //     $update->save();
    
        //     session()->flash('message', 'Your answer successfully updated');
        // }
         
        // $update = AttemptQuiz::find($this->model_id);
        // if($this->model_id ==  $update->id_question)
        // {
        //     // dd($this->id_question);
        //     // dd($this->answer);
        //     // dd($this->model_id);
        //     // dd(AttemptQuiz::find( auth()->user()->id));
        //     // $update = Answer::find($this->model_id);
        //     // $update->id_question = $this->id_question;
        //     // $update->id_users = auth()->user()->id;

        //     $update = AttemptQuiz::find($this->model_id);
        //     $update->id_answer = $this->answer;
        //     $update->save();
    
        //     session()->flash('message', 'Your answer successfully updated');
        // }
        // else
        // {
        //     //  dd($this->answer);
        //     // dd(auth()->user()->id);
        //     // $add->id_course = $this->id_course;
        //     // $add->file_type = $this->file_type;
        //     // $add->file_name = $fileNameToStore;
        //     // $add->file_path = $path;

        //     $add = New AttemptQuiz;
        //     $add->id_answer = $this->answer;
        //     $add->id_question = $this->model_id;
        //     $add->id_users = auth()->user()->id;
        //     $add->save();
    
        //     session()->flash('message', 'Your answer successfully submitted');
        // }

        $this->emit('refreshParent');
    }

    
    public function render()
    {
        // $questions = Question::find($this->id_question);
        // dd($this->id_question);
        // if (auth()->user()->role == "admin") {
            // $attemptquizzes = AttemptQuiz::all();
        // } else if(auth()->user()->role == "lecturer") {
        //     $courses = Course::where('id_lecturer',auth()->user()->id)->get();
        // }

        return view('livewire.attempt-quiz.attempt-quiz-form-wire');

        // return view('livewire.course-file.course-file-form-wire');
    }
}
