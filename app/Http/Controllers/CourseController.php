<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::latest()->paginate(12);
        return view('courses.index', compact('courses'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $course = Course::with(['timeSlots' => function($query) {
            $query->orderBy('day')->orderBy('time');
        }, 'category', 'tags'])->where('slug', $slug)->firstOrFail();

        return view('courses.show', compact('course'));
    }
}
