<?php

namespace App\Http\Controllers;

use App\Models\Scholar;
use Illuminate\Http\Request;

class ScholarController extends Controller
{
    public function index()
    {
        $scholars = Scholar::latest()->paginate(12);
        return view('teachers.index', compact('scholars'));
    }

    public function show($slug)
    {
        $scholar = Scholar::where('slug', $slug)->firstOrFail();
        
        // Related categories or other context if needed
        $categories = \App\Models\Category::where('type', 'course')->get();

        return view('teachers.show', compact('scholar', 'categories'));
    }
}
