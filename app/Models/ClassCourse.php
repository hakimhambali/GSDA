<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassCourse extends Model
{
    use HasFactory;

    public function course() {
        return $this->hasOne('App\Models\Course', 'id', 'id_course');
    }

    public function class() {
        return $this->hasOne('App\Models\Team', 'id', 'id_class');
    }
}
