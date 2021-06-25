<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseFile extends Model
{
    protected $table = 'course_file';

    public function course() {
        return $this->hasOne('App\Models\Course', 'id', 'id_course');
    }
}
