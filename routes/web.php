<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Book;
use App\Models\Post;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    $featuredCourses = Course::where('is_featured', true)->take(3)->get();
    $featuredBooks = Book::where('is_featured', true)->take(3)->get();
    $latestPosts = Post::orderBy('created_at', 'desc')->take(4)->get();

    return view('welcome', compact('featuredCourses', 'featuredBooks', 'latestPosts'));
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/enroll', [EnrollmentController::class, 'store'])->name('enroll.store');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

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
