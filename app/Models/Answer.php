<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';

    // public function course() {
    //     return $this->hasOne('App\Models\Course', 'id_course', 'id');
    // }

    public function questions() {
        return $this->hasOne('App\Models\Question', 'id', 'id_question');
    }

    public function attemptquiz() {
        return $this->hasOne('App\Models\Answer', 'id_answer', 'id');
    }

    // public function createquiz() {
    //     return $this->hasMany('App\Models\CreateQuiz', 'id_createquizzes', 'id');
    // }

}
