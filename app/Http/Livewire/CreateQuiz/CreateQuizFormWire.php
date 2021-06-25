<?php

namespace App\Http\Livewire\CreateQuiz;

use Livewire\Component;
use App\Models\Course;
use App\Models\CreateQuiz;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\CourseFile;

class CreateQuizFormWire extends Component
{
    use WithFileUploads;

    public $id_coursefile;
    public $id_createquizzes;
    public $id_createquiz;
    public $name;
    public $file_path;
    public $file_name;
    public $id_quiz;
    public $id_course;
    public $file_type;
    public $model_id;
    public $topic_name;
    public $quiz_name;
    public $timer;
    public $hour_allocated;
    public $minute_allocated;

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        // dd($model_id);
        $createquiz = CreateQuiz::find($model_id);

        $this->topic_name = $createquiz->id_course;
        // dd($createquiz->id_course);
        $this->quiz_name = $createquiz->name;
        $this->hour_allocated = $createquiz->hour;
        $this->minute_allocated = $createquiz->minute;
        
        // $this->personal_team = $team->personal_team;
        $this->model_id = $createquiz->id;
    
    }
    

    public function store()
    {
        // dd($this->model_id);

        if($this->model_id)
        {
            // dd($this->model_id);
            // $this->validate([
            //     'name' => 'required|string|max:255',
            // ]);
            // dd($this->model_id);
            $update = CreateQuiz::find($this->model_id);
             // dd($update);
            $update->name = $this->quiz_name;
            $update->id_course = $this->topic_name;
            $update->hour = $this->hour_allocated;
            $update->minute = $this->minute_allocated;
            // $update->timer = $this->time_allocated;
            //  dd($this->model_id);
            $update->save();
    
            session()->flash('message', 'Quiz successfully updated');
        }
        else
        {
            $this->validate([
                'quiz_name' => 'required',
                'topic_name' => 'required',
            ]);

            $add = New CreateQuiz;
            $add->name = $this->quiz_name;
            $add->id_course = $this->topic_name;
            $add->hour = $this->hour_allocated;
            $add->minute = $this->minute_allocated;
            // $add->timer = $this->time_allocated;

            // Handle File Upload
            // if ($this->file_path) {
            //     // Get filename with the extension
            //     $filenameWithExt = $this->file_path->getClientOriginalName();
            //     // Get just filename
            //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            //     // Get just ext
            //     if($this->file_type == "3dfile") {
            //         $extension = "glb";
            //     } else {
            //         $extension = $this->file_path->getClientOriginalExtension();
            //     }
            //     // Filename to store
            //     $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            //     // Upload Image
            //     $this->file_path->storeAs('public' . DIRECTORY_SEPARATOR . 'quizfile', $fileNameToStore);
            // } else {
            //     $fileNameToStore = 'nofile_' . $this->id_course . '_' . time() . '.png';
                
            //     $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'quizfile' . DIRECTORY_SEPARATOR . 'nofile_' . $this->id_course . '_' . time() . '.png';
               
            //     copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
            // }

            // //path
            // $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'quizfile' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            
            // $add->file_type = $this->file_type;
            // $add->file_name = $fileNameToStore;
            // $add->file_path = $path;
            $add->save();
    
            session()->flash('message', 'New Quiz successfully added into topic');
        
            }
        $this->emit('refreshParent');

    }

    
    public function render()
    {
        // if (auth()->user()->role == "admin") {
            // $courses = Course::all();
            $courses = Course::orderBy('created_at','desc')->get();
            
        // } else if(auth()->user()->role == "lecturer") {
        //     $courses = Course::where('id_lecturer',auth()->user()->id)->get();
        // }

        return view('livewire.create-quiz.create-quiz-form-wire')->with(compact('courses'));

        // return view('livewire.course-file.course-file-form-wire');
    }
}
