<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    public function answer() {
        return $this->hasMany('App\Models\Answer', 'id_question', 'id');
    }

    public function createquiz() {
        return $this->hasOne('App\Models\CreateQuiz', 'id', 'id_createquizzes');
    }

    public function attemptquiz() {
        return $this->hasOne('App\Models\AttemptQuiz', 'id_question', 'id');
    }

    // protected $fillable = ['question_text', 'answer_explanation', 'course_id'];

    // public function setTopicIdAttribute($input)
    // {
    //     $this->attributes['course_id'] = $input ? $input : null;
    // }

    // public function course()
    // {
    //     return $this->belongsTo(Course::class, 'course_id');
    // }

    // public function options()
    // {
    //     return $this->hasMany(QuestionsOption::class, 'question_id');
    // }
}