<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EnrollmentAttendance extends Model
{
    protected $fillable = [
        'enrollment_id',
        'course_lesson_id',
        'notes',
        'attachment_path',
        'attended_at',
    ];

    protected $casts = [
        'attended_at' => 'datetime',
    ];

    public function enrollment()
    {
        return $this->belongsTo(Enrollment::class);
    }

    public function lesson()
    {
        return $this->belongsTo(CourseLesson::class, 'course_lesson_id');
    }
}
