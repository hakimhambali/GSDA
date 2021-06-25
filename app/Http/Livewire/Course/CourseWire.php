<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\Course;

class CourseWire extends Component
{
    public $course_id;
    public $name;
    public $action;
    
    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

    public function selectItem($modelid , $action)
    {
        // dd($modelid);
        // dd($action);
        $this->course_id = $modelid;
        $this->action = $action;

        if($action == "update")
        {
            $this->emit('getModelId' , $this->course_id);
        }
        // else if($action == "manageCourseResources")
        // {
        //     $this->emit('getModelIdDeeper' , $this->course_id);
        //     $this->dispatchBrowserEvent('openModal_manageCourseResources');
        // }
        
    }

    public function delete()
    {
        $course = Course::find($this->course_id);

        $course->delete();

    }

    public function render()
    {
    //     if (auth()->user()->role == 'admin') {
            // $courses = Course::all();
            // $courses = Course::orderBy('created_at','desc')->get();
    //     }
    //     else if (auth()->user()->role == 'lecturer')
    //     {
    //         $courses = Course::where('id_lecturer',auth()->user()->id)->get();
    //     }

        // $courses = Course::orderBy('created_at','desc')->get();

        if (auth()->user()->role == 'admin') {
            $courses = Course::orderBy('created_at','desc')->get();
        }
        else if (auth()->user()->role == 'lecturer')
        {
            $courses = Course::where('id_lecturer',auth()->user()->id)->orderBy('created_at','desc')->get();
        }
        return view('livewire.course.course-wire')->with(compact('courses'));
        
        // return view('livewire.course.course-wire')->with(compact('courses'));

        // return view('livewire.course.course-wire');
    }
}
