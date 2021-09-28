<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\ClassCourse;
use App\Models\AttemptQuiz;
use App\Models\Answer;
use App\Models\Leaderboard;

// use App\Models\CreateQuiz;

class MyClassWire extends Component
{
    public $course;
    public $action;

    public function selectItem($modelid , $action)
    {
        $this->course = Course::find($modelid);
       
        $this->action = $action;
// dd($this->course);
        if($action == "showCourseContent")
        {
            $this->dispatchBrowserEvent('openModal_showCourseContent');
        }
        
    }

    // public function attemptQuiz($id_answers)
    // {
        
    //     return redirect()->to('attemptQuiz/'.$id_answers.'');
    // }

    public function attemptQuiz($id_createquizzes)
    {
        
        return redirect()->to('attemptQuiz/'.$id_createquizzes.'');
    }

    public function seeResult($id_questions)
    {
        
        return redirect()->to('seeResult/'.$id_questions.'');
    }

    // public function mount($id)
    // { 
    //     $this->CreateQuiz = CreateQuiz::find($id);
    //     dd($this->CreateQuiz);
    // }

    public function render()
    {
   
        if (auth()->user()->currentClass) {
            // $classcourses = ClassCourse::where('id_class' , auth()->user()->currentClass->id)->get();
            $classcourses = ClassCourse::where('id_class' , auth()->user()->currentClass->id)->orderBy('created_at','desc')->get();
            $leaderboards = Leaderboard::where( 'id_users', '=', auth()->user()->id)->get();

            return view('livewire.my-class-wire')->with(compact('classcourses', 'leaderboards'));
        }
        else {
            $classcourses = [];
            $leaderboards = Leaderboard::where('id_users' , auth()->user()->id)->first();

            return view('livewire.my-class-wire')->with(compact('classcourses', 'leaderboards'));
        }
       
        // return view('livewire.my-class-wire');
    }
}
