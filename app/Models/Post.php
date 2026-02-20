<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'gallery',
        'content',
        'category_id',
        'is_featured',
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
