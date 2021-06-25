<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttemptQuiz extends Model
{
    protected $table = 'attempt_quizzes';

    // public function course() {
    //     return $this->hasOne('App\Models\Course', 'id', 'id_course');
    // }

    public function answer() {
        return $this->hasOne('App\Models\Answer', 'id', 'id_answer');
    }

    public function question() {
        return $this->hasMany('App\Models\Question', 'id', 'id_question');
    }

    // public function result() {
    //     return $this->hasOne('App\Models\Result', 'id', 'id_question');
    // }

    // public function result() {
    //     return $this->hasOne('App\Models\Result', 'id', 'id_result');
    // }

}