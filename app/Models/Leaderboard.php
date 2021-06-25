<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leaderboard extends Model
{
    protected $table = 'leaderboards';

    // public function questions() {
    //     return $this->hasOne('App\Models\Question', 'id', 'id_question');
    // }

    public function createquiz() {
        return $this->hasOne('App\Models\Leaderboard', 'id', 'id_createquizzes');
    }

}
