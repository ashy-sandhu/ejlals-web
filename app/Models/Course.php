<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use \Illuminate\Database\Eloquent\SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'category_id',
        'is_featured',
        'instructor_name',
        'image',
        'gallery',
        'seo_meta'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'gallery' => 'array',
        'seo_meta' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
