<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Display the Situational Dua Finder tool.
     */
    public function duaFinder()
    {
        return view('tools.dua-finder');
    }
}
