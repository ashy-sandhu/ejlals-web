<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Course;
use App\Models\Post;
use App\Models\Scholar;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('search');
        
        if (!$query) {
            return redirect()->back();
        }

        $courses = Course::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit(8)
            ->get();

        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('content', 'like', "%{$query}%")
            ->limit(8)
            ->get();

        $scholars = Scholar::where('name', 'like', "%{$query}%")
            ->orWhere('about_me', 'like', "%{$query}%")
            ->limit(8)
            ->get();

        $books = Book::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->limit(8)
            ->get();

        return view('search', compact('courses', 'posts', 'scholars', 'books', 'query'));
    }
}
