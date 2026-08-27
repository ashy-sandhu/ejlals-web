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

        try {
            $user = Auth::user();

            // Check if already enrolled
            $existing = Enrollment::where('user_id', $user->id)
                ->where('course_id', $request->course_id)
                ->first();

            if ($existing) {
                return back()->with('error', 'You are already enrolled in this course.');
            }

            // Create Enrollment
            $enrollment = Enrollment::create([
                'user_id' => $user->id,
                'course_id' => $request->course_id,
                'time_slot_id' => $request->time_slot_id,
                'status' => 'under_review',
                'message' => $request->message,
            ]);

            // Attempt to create a Lead (fail silently for user if this fails, but log it)
            try {
                $enrollment->load(['course', 'timeSlot']);
                
                $timeSlotDetails = null;
                if ($enrollment->timeSlot) {
                    $timeSlotDetails = $enrollment->timeSlot->day . ' at ' . \Carbon\Carbon::parse($enrollment->timeSlot->time)->format('h:i A');
                }

                \App\Models\Lead::create([
                    'enrollment_id' => $enrollment->id,
                    'student_name' => $user->first_name ?: $user->name,
                    'student_email' => $user->email,
                    'student_phone' => $user->phone_number,
                    'student_country' => $user->country,
                    'student_city' => $user->city,
                    'student_timezone' => $user->timezone,
                    'course_name' => $enrollment->course->title ?? 'Unknown Course',
                    'time_slot_details' => $timeSlotDetails,
                    'student_message' => $request->message,
                    'lead_status' => 'new'
                ]);
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error('Failed to create lead for enrollment ID ' . $enrollment->id . ': ' . $e->getMessage());
                // Don't throw, let the user see success since enrollment worked
            }

            return back()->with('success', 'Registration successful! Your application is under review.');

        } catch (\Exception $e) {
            \Illuminate\Support\Facades\Log::error('Enrollment failed for user ' . Auth::id() . ': ' . $e->getMessage());
            return back()->with('error', 'Something went wrong while processing your enrollment. Please try again.');
        }
    }
}
