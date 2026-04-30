<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'title',
        'image',
        'gender',
        'qualification',
        'location',
        'availability',
        'teaching_experience',
        'subjects_taught',
        'classes_can_teach',
        'experience_details',
        'about_me',
        'rating',
        'is_verified',
        'is_featured',
    ];

    protected $casts = [
        'subjects_taught' => 'array',
        'classes_can_teach' => 'array',
        'is_verified' => 'boolean',
        'is_featured' => 'boolean',
        'rating' => 'decimal:1',
    ];
}
