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

Route::get('/courses', function () {
    $courses = Course::latest()->paginate(12);
    return view('courses.index', compact('courses'));
})->name('courses.index');

Route::get('/books', function () {
    $books = Book::latest()->paginate(12);
    return view('books.index', compact('books'));
})->name('books.index');

Route::get('/posts', function () {
    $posts = Post::latest()->paginate(10);
    return view('posts.index', compact('posts'));
})->name('posts.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/privacy-policy', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/terms', function () {
    return view('legal.terms');
})->name('terms');
