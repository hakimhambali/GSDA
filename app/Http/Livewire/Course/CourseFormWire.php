<?php

namespace App\Http\Livewire\Course;

use Livewire\Component;
use App\Models\User;
use App\Models\Course;


class CourseFormWire extends Component
{
    public $name;
    public $topic_name;
    public $id_lecturer;
    public $model_id;
    public $id_course;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $course = Course::find($model_id);

        $this->model_id = $course->id;
        $this->topic_name = $course->name;
        // dd($this->topic_name);
        $this->id_lecturer = $course->id_lecturer;

    }

    public function store()
    {
        

        if($this->model_id)
        {
            $this->validate([
                'topic_name' => 'required|string|max:255',
                'id_lecturer' => 'required',
            ]);
            
            $update = Course::find($this->model_id);
            $update->name = $this->topic_name;
            $update->id_lecturer = $this->id_lecturer;
            $update->save();
    
            session()->flash('message', 'Topic successfully updated');
        }
        else
        {
            $this->validate([
                'topic_name' => 'required|string|max:255',
                'id_lecturer' => 'required',
            ]);

            $add = New Course;
            $add->name = $this->topic_name;
            $add->id_lecturer = $this->id_lecturer;
            $add->save();
    
            session()->flash('message', 'New topic successfully added');
        }
       
        $this->emit('refreshParent');


    }

    public function render()
    {
        // $lecturers = User::where('role' , 'lecturer')->get();
        $lecturers = User::where('role' , 'lecturer')->orderBy('created_at','desc')->get();
        return view('livewire.course.course-form-wire')->with(compact('lecturers'));

        // return view('livewire.course.course-form-wire');
    }
}
