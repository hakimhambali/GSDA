<?php

namespace App\Http\Livewire\ClassCourse;

use Livewire\Component;
use App\Models\ClassCourse;

class ClassCourseWire extends Component
{
    public $id_classcourse;
    public $id_class;
    public $id_course;
    public $action;

    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete',
    ];


    public function selectItem($modelid , $action)
    {
        $this->id_classcourse = $modelid;
        $this->action = $action;

    }

    public function delete()
    {
        $classcourse = ClassCourse::find($this->id_classcourse);

        $classcourse->delete();

    }

    public function render()
    {
        if(auth()->user()->role == 'admin')
        {
            // $classcourses = ClassCourse::all();
            $classcourses = ClassCourse::orderBy('created_at','desc')->get();

            $classcourses = ClassCourse::whereHas('course')->orderBy('created_at','desc')->get();
        }
        else
        {
            // $classcourses = ClassCourse::all();
            $classcourses = ClassCourse::orderBy('created_at','desc')->get();

            $classcourses = ClassCourse::whereHas('course' , function ($query) {
                $query->where('id_lecturer' , auth()->user()->id);
            })->orderBy('created_at','desc')->get();
        }
        

        
        return view('livewire.class-course.class-course-wire')->with(compact('classcourses'));

        // return view('livewire.class-course.class-course-wire');
    }
}
