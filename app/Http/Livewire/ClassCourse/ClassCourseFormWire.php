<?php

namespace App\Http\Livewire\ClassCourse;

use Livewire\Component;
use App\Models\Team;
use App\Models\Course;
use App\Models\ClassCourse;

class ClassCourseFormWire extends Component
{
    public $id_class;
    public $id_course;
    public $topic_name;

    public function store()
    {

            $this->validate([
                'topic_name' => 'required',
                'id_class' => 'required',
            ]);

            $add = New ClassCourse;
            $add->id_class = $this->id_class;
            $add->id_course = $this->topic_name;
            $add->save();
    
            session()->flash('message', 'New topic successfully added into class');
        
       
        $this->emit('refreshParent');

    }


    public function render()
    {
        if(auth()->user()->role == 'admin')
        {
            // $courses = Course::all();
            // $classes = Team::all();
            $courses = Course::orderBy('created_at','desc')->get();
            $classes = Team::orderBy('created_at','desc')->get();
        }
        else
        {
            // $courses = Course::where('id_lecturer' , auth()->user()->id)->get();
            // $classes = auth()->user()->allTeams();
            $courses = Course::where('id_lecturer' , auth()->user()->id)->orderBy('created_at','desc')->get();
            $classes = auth()->user()->allTeams();
        }

        
        return view('livewire.class-course.class-course-form-wire')->with(compact('courses' , 'classes'));

        // return view('livewire.class-course.class-course-form-wire');
    }

   
}
