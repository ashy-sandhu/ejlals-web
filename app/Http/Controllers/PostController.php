<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     */
    public function index(Request $request)
    {
        $selectedCategory = $request->category;

        $posts = Post::with('category')
            ->when($selectedCategory, function($query, $selectedCategory) {
                return $query->whereHas('category', function($q) use ($selectedCategory) {
                    $q->where('slug', $selectedCategory);
                });
            })
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('posts.index', compact('posts', 'selectedCategory'));
    }

    /**
     * Display the specified post.
     */
    public function show(string $slug)
    {
        $post = Post::with(['category', 'tags'])->where('slug', $slug)->firstOrFail();
        
        // Fetch categories for sidebar
        $categories = \App\Models\Category::where('type', 'post')->withCount('posts')->get();

        // Fetch recent posts for sidebar
        $recentPosts = Post::where('id', '!=', $post->id)->latest()->take(5)->get();

        return view('posts.show', compact('post', 'recentPosts', 'categories'));
    }
}
