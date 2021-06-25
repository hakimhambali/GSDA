<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CreateQuiz extends Model
{
    protected $table = 'create_quizzes';

    public function course() {
        return $this->hasOne('App\Models\Course', 'id', 'id_course');
    }

    public function questions() {
        return $this->hasMany('App\Models\Question', 'id_createquizzes', 'id');
    }
}
