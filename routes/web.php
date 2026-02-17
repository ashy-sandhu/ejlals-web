<?php

use Illuminate\Support\Facades\Route;

use App\Models\Course;
use App\Models\Book;
use App\Models\Post;

Route::get('/', function () {
    $featuredCourses = Course::where('is_featured', true)->take(3)->get();
    $featuredBooks = Book::where('is_featured', true)->take(3)->get();
    $latestPosts = Post::orderBy('created_at', 'desc')->take(4)->get();

    return view('welcome', compact('featuredCourses', 'featuredBooks', 'latestPosts'));
});
