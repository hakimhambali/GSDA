<?php

namespace App\Http\Livewire\Questions;

use App\Models\Course;
use Livewire\Component;
use App\Models\Question;
use App\Models\Questions;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use Livewire\WithFileUploads;

class QuestionsFormWire extends Component
{
    use WithFileUploads;

    public $id_coursefile;
    public $name;
    public $file_path;
    public $file_name;
    public $question_text;
    public $id_course;
    public $file_type;
    public $id_createquizzes;
    public $id_questions;
    public $answer_explanation;
    public $answer;
    public $id_answer;
    public $model_id;

    public function mount($id_createquizzes)
    { 
        
        $this->id_createquizzes = $id_createquizzes;
    }

    protected $listeners = [
        // 'drawMoves' => 'popupQuiz',
        'getModelId'
    ];

    public function getModelId($model_id)
    {
          
        $question = Question::find($model_id);
        // dd($question);

        $this->id_createquizzes = $question->id_createquizzes;
        $this->question_text = $question->question_text;

        $this->model_id = $question->id;
        
        // dd($this->model_id);
    
    }
    
    public function store()
    {
        // dd($this->model_id);
        if($this->model_id)
        {
            $update = Question::find($this->model_id);
            $update->id_createquizzes = $this->id_createquizzes;
            $update->question_text = $this->question_text;
            $update->save();
    
            session()->flash('message', 'Question successfully updated');
        }
        else
        {
            $this->validate([
                'question_text' => 'required',
            ]);
           
            $add = New Question();
         
            $add->id_createquizzes = $this->id_createquizzes;
            $add->question_text = $this->question_text;
            // $add->answer = $this->answer;
            // $add->answer_explanation = $this->answer_explanation;
            // $add->answer_explanation = $this->answer_explanation;
            

            

            // Handle File Upload
        //     if ($this->file_path) {
        //         // Get filename with the extension
        //         $filenameWithExt = $this->file_path->getClientOriginalName();
        //         // Get just filename
        //         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        //         // Get just ext
        //         if($this->file_type == "3dfile") {
        //             $extension = "glb";
        //         } else {
        //             $extension = $this->file_path->getClientOriginalExtension();
        //         }
        //         // Filename to store
        //         $fileNameToStore = $filename . '_' . time() . '.' . $extension;
        //         // Upload Image
        //         $this->file_path->storeAs('public' . DIRECTORY_SEPARATOR . 'coursefile', $fileNameToStore);
        //     } else {
        //         $fileNameToStore = 'nofile_' . $this->id_course . '_' . time() . '.png';
                
        //         $img_path = public_path() . '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'coursefile' . DIRECTORY_SEPARATOR . 'nofile_' . $this->id_course . '_' . time() . '.png';
               
        //         copy(public_path() . '' . DIRECTORY_SEPARATOR . 'img' . DIRECTORY_SEPARATOR . 'noimage.png', $img_path);
        //     }

        //     //path
        //     $path = '' . DIRECTORY_SEPARATOR . 'storage' . DIRECTORY_SEPARATOR . 'coursefile' . DIRECTORY_SEPARATOR . '' . $fileNameToStore;
            
        //     $add->file_type = $this->file_type;
        //     $add->file_name = $fileNameToStore;
        //     $add->file_path = $path;
            $add->save();
       
            session()->flash('message', 'New question successfully added into quiz');
        }
       
        $this->emit('refreshParent');

    }

    // public function popupQuiz()
    // {
    //     dd('kucing');
    //     $question = Question::all();
    // }
    
    public function render()
    {
        
        // if (auth()->user()->role == "admin") {
            // $questions = Question::all();
        // } else if(auth()->user()->role == "lecturer") {
        //     $courses = Course::where('id_lecturer',auth()->user()->id)->get();
        // }
        
        return view('livewire.questions.questions-form-wire');

        // return view('livewire.course-file.course-file-form-wire');
    }
}
