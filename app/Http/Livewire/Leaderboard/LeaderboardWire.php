<?php

namespace App\Http\Livewire\Leaderboard;

use App\Models\Course;
use Livewire\Component;
use App\Models\CourseFile;
use App\Models\CreateQuiz;
use App\Models\Leaderboard;

class LeaderboardWire extends Component
{
    public $id_coursefile;
    public $action;
    public $store;
    public $resourcesfile;
    public $name;
    public $quiz_name;

    protected $listeners = [
        'refreshParent' => '$refresh',
        'postSearch',
    ];

    public function postSearch($quiz_name){
        // dd($quiz_name);
        $this->quiz_name = $quiz_name;
        // dd($this->quiz_name);
        $this->emit('refreshParent');
       }

    public function render()
    {
        // $resourcesfiles = IpfsResources::where('resources_name' , 'like' , '%'.$this->name.'%')->orderBy('created_at','desc')->get();
        $leaderboards = Leaderboard::where('quiz_name' , 'like' , '%'.$this->quiz_name.'%')->orderBy('total_marks','desc')->orderBy('hour','asc')->orderBy('minute','asc')->orderBy('second','asc')->get();
        return view('livewire.leaderboard.leaderboard-wire')->with(compact('leaderboards'));
        // return view('livewire.attempt-quiz.attempt-quiz-wire')->with(compact('attemptquizzes'));
    }
}