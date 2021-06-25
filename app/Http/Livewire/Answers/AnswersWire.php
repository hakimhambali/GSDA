<?php

namespace App\Http\Livewire\Answers;

use App\Models\CreateQuiz;
use Livewire\Component;
use App\Models\Question;
use App\Models\Answer;
use Illuminate\Http\Request;
use App\Models\Course;


class AnswersWire extends Component
{
    public $id_createquiz;
    public $action;
    public $CreateQuiz;
    public $id_question;
    public $id_answer;
    public $Answer;
    public $Question;
    public $status;
    

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function mount($id)
    { 
        // dd($id);
        $this->Question = Question::find($id);
        // dd($this->Question);

    }

    // public function selectItem($modelid , $action)
    // {
    //     $this->id_answer = $modelid;
    //     $this->action = $action;  
    // }

    public function selectItem($modelid , $action)
    {
        // dd($modelid);
        $this->id_answer = $modelid;
        $this->action = $action;
        if($action == "update")
        {
            $this->emit('getModelId' , $this->id_answer);
        }  
    }

    public function delete()
    {  
        $answer = Answer::find($this->id_answer);
        // dd($this->id_question);
        $answer->delete();
    }

    public function changeStatus($id_answer)
    {
        // dd($id_answer);

        foreach ($this->Question->answer  as $key => $answer_no) {
           if ($answer_no->id == $id_answer)
           {
            //    dump('lol');
               $answer_no->status_answer=1;
               $answer_no->save();}
           else 
           {$answer_no->status_answer=0;
           $answer_no->save();}
        }

  
       
        // $answer = Answer::find($id_answer);
        
        // $answer->status=true;
        
        // $add = New Answer();
        // $add->status = $this->status;
       

    }

        public function render()
    {
        
        return view('livewire.answers.answers-wire');
        // dd($this->Question);
    }
}
