<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'enrollment_id',
        'student_name',
        'student_email',
        'student_phone',
        'student_country',
        'student_city',
        'student_timezone',
        'course_name',
        'time_slot_details',
        'student_message',
        'lead_status',
        'admin_notes',
    ];

    /**
     * The enrollment this lead belongs to.
     */
    public function enrollment(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Enrollment::class);
    }

    /**
     * Convenience: get the student user through enrollment.
     */
    public function student(): \Illuminate\Database\Eloquent\Relations\HasOneThrough
    {
        return $this->hasOneThrough(User::class, Enrollment::class, 'id', 'id', 'enrollment_id', 'user_id');
    }
}
