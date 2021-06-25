<?php

namespace App\Http\Livewire\CourseFile;

use Livewire\Component;
use App\Models\CourseFile;

class CourseFileWire extends Component
{

    public $id_coursefile;
    public $action;


    protected $listeners = [
        'refreshParent' => '$refresh',
        'delete'
    ];

  
    public function selectItem($modelid , $action)
    {
        $this->id_coursefile = $modelid;
        $this->action = $action;  
    }

    public function delete()
    {
        $coursefile = CourseFile::find($this->id_coursefile);

        $coursefile->delete();

    }

    public function render()
    {
        // if (auth()->user()->role == "admin") {
            // $coursefiles = CourseFile::all();
            // $coursefiles = CourseFile::orderBy('created_at','desc')->get();
        // } else if(auth()->user()->role == "lecturer"){
        //     $coursefiles = CourseFile::whereHas('course' , function ($query) {
        //         $query->where('id_lecturer' , auth()->user()->id);
        //     })->get();
        // }

        // $coursefiles = CourseFile::orderBy('created_at','desc')->get();

        if (auth()->user()->role == "admin") {
            $coursefiles = CourseFile::orderBy('created_at','desc')->get();
        } else if(auth()->user()->role == "lecturer"){
            $coursefiles = CourseFile::whereHas('course' , function ($query) {      
                $query->where('id_lecturer' , auth()->user()->id);
            })->orderBy('created_at','desc')->get();
        }

        return view('livewire.course-file.course-file-wire')->with(compact('coursefiles'));

        // return view('livewire.course-file.course-file-wire');
    }
}
