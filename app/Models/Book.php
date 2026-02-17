<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'is_featured',
        'media_path',
        'seo_meta'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'seo_meta' => 'json',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
