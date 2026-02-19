<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display the student dashboard.
     */
    public function index()
    {
        $user = Auth::user();
        
        // Fetch enrollments with eager loaded courses and time slots
        $enrollments = Enrollment::with(['course', 'timeSlot'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('dashboard', compact('enrollments', 'user'));
    }
}
