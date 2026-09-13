<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeacherAttendanceController;
use App\Http\Controllers\Api\StudentProgressController;

// Return the authenticated user
Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

// Mobile App Routes (Protected by Sanctum)
Route::middleware(['auth:sanctum'])->group(function () {
    
    // Teacher Endpoints
    Route::prefix('teacher')->group(function () {
        Route::get('/courses', [TeacherAttendanceController::class, 'getCourses']);
        Route::get('/enrollment/{id}/curriculum', [TeacherAttendanceController::class, 'getCurriculum']);
        Route::post('/attendance', [TeacherAttendanceController::class, 'markAttendance']);
    });

    // Student Endpoints
    Route::prefix('student')->group(function () {
        Route::get('/progress', [StudentProgressController::class, 'getProgress']);
        Route::get('/enrollment/{id}/details', [StudentProgressController::class, 'getCurriculumDetails']);
    });

});
