<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Book;
use App\Models\Post;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Artisan;

// Temporary Bridge to Sync Database (Will be removed after fix)
Route::get('/bridge-sync-db-7739', function () {
    try {
        Artisan::call('migrate', ['--force' => true]);
        return "Database Synced Successfully!<br><pre>" . Artisan::output() . "</pre>";
    }
    catch (\Exception $e) {
        return "Sync Failed: " . $e->getMessage();
    }
});

Route::get('/', function () {
    $featuredCourses = Course::where('is_featured', true)->take(3)->get();
    $featuredBooks = Book::where('is_featured', true)->take(3)->get();

    // Fetch 3 featured posts specifically
    $featuredPosts = Post::where('is_featured', true)->latest()->take(3)->get();

    // Fetch 3 latest posts that ARE NOT in the featured list (to avoid duplicates)
    $featuredIds = $featuredPosts->pluck('id');
    $latestPosts = Post::whereNotIn('id', $featuredIds)->latest()->take(3)->get();

    return view('welcome', compact('featuredCourses', 'featuredBooks', 'featuredPosts', 'latestPosts'));
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class , 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class , 'login']);
    Route::get('/register', [AuthController::class , 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class , 'register']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
    Route::post('/enroll', [EnrollmentController::class , 'store'])->name('enroll.store');
    Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
});

Route::get('/courses', [CourseController::class , 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class , 'show'])->name('courses.show');

Route::get('/books', function () {
    // Debug: echo phpversion(); exit;
    $books = Book::latest()->paginate(12);
    return view('books.index', compact('books'));
})->name('books.index');

Route::get('/debug-php', function () {
    return phpversion();
});

use App\Http\Controllers\PostController;

Route::get('/posts', [PostController::class , 'index'])->name('posts.index');
Route::get('/posts/{slug}', [PostController::class , 'show'])->name('posts.show');

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
