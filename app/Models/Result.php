<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;

    public function lecturer() {
        return $this->hasOne('App\Models\User', 'id', 'id_lecturer');
    }

    public function student() {
        return $this->hasOne('App\Models\User', 'id', 'id_student');
    }

    public function attemptquiz() {
        return $this->hasOne('App\Models\Answer', 'id_answer', 'id');
    }

    // public function question() {
    //     return $this->hasMany('App\Models\Question', 'id', 'id_question');
    // }

    // public function coursefile() {
    //     return $this->hasMany('App\Models\CourseFile', 'id_course', 'id');
    // }

    // public function classcourse() {
    //     return $this->hasMany('App\Models\ClassCourse', 'id_course', 'id');
    // }

    // public function createquiz() {
    //     return $this->hasMany('App\Models\CreateQuiz', 'id_course', 'id');
    // }


}
