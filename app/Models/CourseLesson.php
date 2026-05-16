<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    protected $fillable = ['course_module_id', 'title', 'duration', 'sort_order'];

    public function module()
    {
        return $this->belongsTo(CourseModule::class, 'course_module_id');
    }
}
