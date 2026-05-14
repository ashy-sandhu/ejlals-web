<?php

use Illuminate\Support\Facades\Route;
use App\Models\Course;
use App\Models\Book;
use App\Models\Post;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ToolController;
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
    // Fetch all featured courses
    $featuredCourses = Course::where('is_featured', true)->with('category')->latest()->get();

    // Fetch categories by type for section headers
    $courseCategory = \App\Models\Category::where('type', 'course')->first();
    $bookCategory = \App\Models\Category::where('type', 'book')->first();
    $postCategory = \App\Models\Category::where('type', 'post')->first();

    // Fetch all course categories for the cards
    $courseCategories = \App\Models\Category::where('type', 'course')->get();

    $featuredBooks = Book::where('is_featured', true)->orderBy('created_at', 'desc')->take(4)->get();
    $featuredPosts = Post::where('is_featured', true)->latest()->take(4)->get();
    $featuredIds = $featuredPosts->pluck('id');
    $latestPosts = Post::whereNotIn('id', $featuredIds)->latest()->take(3)->get();

    // Fetch featured scholars
    $featuredScholars = \App\Models\Scholar::where('is_featured', true)->take(4)->get();

    return view('welcome', compact(
        'featuredCourses', 
        'courseCategory', 
        'bookCategory', 
        'postCategory', 
        'courseCategories', 
        'featuredBooks', 
        'featuredPosts', 
        'latestPosts', 
        'featuredScholars'
    ));
})->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class , 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class , 'login']);
    Route::get('/register', [AuthController::class , 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class , 'register']);
});

// OTP Verification Routes (Must be outside 'guest' so logged-in users can verify)
Route::get('/verify-otp', [AuthController::class, 'showVerifyOtp'])->name('verification.notice');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('otp.submit');
Route::post('/resend-otp', [AuthController::class, 'resendOtp'])->name('otp.resend');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class , 'index'])->name('dashboard');
    Route::get('/my-courses', [DashboardController::class , 'myCourses'])->name('my-courses');
    Route::post('/enroll', [EnrollmentController::class , 'store'])->name('enroll.store');
    
    // Profile Management
    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class , 'logout'])->name('logout');
});

Route::get('/courses', [CourseController::class , 'index'])->name('courses.index');
Route::get('/courses/{slug}', [CourseController::class , 'show'])->name('courses.show');

Route::get('/books', function () {
    // Debug: echo phpversion(); exit;
    $books = Book::latest()->paginate(4);
    return view('books.index', compact('books'));
})->name('books.index');

Route::get('/debug-php', function () {
    return phpversion();
});


Route::get('/learn', [PostController::class , 'index'])->name('posts.index');

Route::get('/learn/{slug}', [PostController::class , 'show'])->name('posts.show');

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

// Tools
Route::get('/tools/dua-finder/{category?}', [App\Http\Controllers\ToolController::class, 'duaFinder'])->name('tools.dua-finder');
Route::get('/tools/wirasat-visualizer', [ToolController::class, 'wirasat'])->name('tools.wirasat');

Route::get('/terms', function () {
    return view('legal.terms');
})->name('terms');

// Global Search
Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

// Scholars Directory
Route::get('/scholars', [App\Http\Controllers\ScholarController::class, 'index'])->name('scholars.index');
Route::get('/scholar/{slug}', [App\Http\Controllers\ScholarController::class, 'show'])->name('scholars.show');
