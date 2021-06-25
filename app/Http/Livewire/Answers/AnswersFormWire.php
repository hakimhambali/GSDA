<?php

namespace App\Http\Livewire\Answers;

use App\Models\Course;
use Livewire\Component;
use App\Models\Question;
use App\Models\Questions;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use Livewire\WithFileUploads;
use App\Models\Answer;

class AnswersFormWire extends Component
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
    public $questions;
    public $status_answer;
    public $model_id;


    public function mount($id_question)
    { 

        $this->id_questions = $id_question;

        $this->questions = Question::find($this->id_questions);
    }

    protected $listeners = [
        'getModelId'
    ];

    public function getModelId($model_id)
    {
        $answer = Answer::find($model_id);

        $this->answer = $answer->answer;
        $this->answer_explanation = $answer->answer_explanation;

        $this->model_id = $answer->id;
        // dd($this->model_id);
    
    }

    public function store()
    {
        // dd($this->model_id);
        if($this->model_id)
        {
            // dd(Answer::find($this->model_id));
            $update = Answer::find($this->model_id);
            $update->id_question = $this->id_questions;
            $update->answer = $this->answer;
            $update->answer_explanation = $this->answer_explanation;
            $update->save();
    
            session()->flash('message', 'Answer successfully updated');
        }
        else
        {
            $this->validate([
                'answer' => 'required',
            ]);
           
            $add = New Answer();
         
            $add->id_question = $this->id_questions;
            $add->answer = $this->answer;
            $add->answer_explanation = $this->answer_explanation;
            $add->status_answer = 0;
            // $add->answer = $this->answer;  
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
       
            session()->flash('message', 'New answers successfully added into question');
        }
       
        $this->emit('refreshParent');

    }

    public function render()
    {
        return view('livewire.answers.answers-form-wire');
    }
}