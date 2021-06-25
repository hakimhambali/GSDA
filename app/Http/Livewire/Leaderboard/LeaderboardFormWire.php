<?php

namespace App\Http\Livewire\Leaderboard;

use App\Http\Livewire\CreateQuiz\CreateQuizWire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Course;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use Livewire\WithFileUploads;
use App\Models\Leaderboard;

class LeaderboardFormWire extends Component
{
    use WithFileUploads;
    public $quiz_name;


    public function search()
    {
  
        $this->emit('postSearch', $this->quiz_name);
        // dd($this->emit('postSearch', $this->quiz_name));
        session()->flash('message', 'Your searching completed');
        // $this->emit('refreshParent');
    }

    public function render()
    {
        // if (auth()->user()->role == "admin") {
            $leaderboards = Leaderboard::all();
        // } else if(auth()->user()->role == "lecturer") {
        //     $createquizzes = CreateQuiz::where('id_lecturer',auth()->user()->id)->get();
        // }
        
        return view('livewire.leaderboard.leaderboard-form-wire')->with(compact('leaderboards'));
        // return view('livewire.paid-resources.paid-resources-form-wire')->with(compact('courses'));

        // return view('livewire.course-file.course-file-form-wire');
    }
}