<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug', 'type'];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
