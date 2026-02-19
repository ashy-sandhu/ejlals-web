<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'time_slot_id' => 'required|exists:time_slots,id',
            'message' => 'nullable|string|max:1000',
        ]);

        // Check if already enrolled
        $existing = Enrollment::where('user_id', Auth::id())
            ->where('course_id', $request->course_id)
            ->first();

        if ($existing) {
            return back()->with('error', 'You are already enrolled in this course!');
        }

        Enrollment::create([
            'user_id' => Auth::id(),
            'course_id' => $request->course_id,
            'time_slot_id' => $request->time_slot_id,
            'status' => 'pending',
            'message' => $request->message,
        ]);

        return back()->with('success', 'Registration successful! We will contact you soon.');
    }
}
