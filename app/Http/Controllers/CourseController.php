<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->category;
        $searchTerm = $request->search;
        $selectedLanguage = $request->language;
        
        $courses = Course::with('category')
            ->when($selectedCategory, function($query, $selectedCategory) {
                return $query->whereHas('category', function($q) use ($selectedCategory) {
                    $q->where('slug', $selectedCategory);
                });
            })
            ->when($selectedLanguage, function($query, $selectedLanguage) {
                return $query->where('language', 'like', '%' . $selectedLanguage . '%');
            })
            ->when($searchTerm, function($query, $searchTerm) {
                return $query->where(function($q) use ($searchTerm) {
                    $q->where('title', 'like', '%' . $searchTerm . '%')
                      ->orWhere('description', 'like', '%' . $searchTerm . '%');
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        $categories = \App\Models\Category::whereHas('courses')->get();

        return view('courses.index', compact('courses', 'categories', 'selectedCategory', 'searchTerm', 'selectedLanguage'));
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
