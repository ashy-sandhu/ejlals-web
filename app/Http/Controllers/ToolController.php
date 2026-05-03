<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display the Situational Dua Finder tool.
     */
    public function duaFinder($category = null)
    {
        return view('tools.dua-finder', compact('category'));
    }

    /**
     * Display the Wirasat Visualizer tool.
     */
    public function wirasat()
    {
        return view('tools.wirasat-visualizer');
    }
}
