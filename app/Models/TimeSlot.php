<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $course_id
 * @property string $day
 * @property string $time
 * @property int $capacity
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Course $course
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Enrollment> $enrollments
 * @property-read int|null $enrollments_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereCapacity($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereCourseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TimeSlot whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TimeSlot extends Model
{
    protected $fillable = [
        'course_id',
        'day',
        'time',
        'capacity'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
}
