<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use Illuminate\Http\Request;

class StudentProgressController extends Controller
{
    /**
     * Get the student's enrollments and overall progress.
     */
    public function getProgress(Request $request)
    {
        $user = $request->user();

        // Get all enrollments for this student
        $enrollments = Enrollment::with(['course:id,title,image'])
            ->where('user_id', $user->id)
            ->get()
            ->map(function ($enrollment) {
                return [
                    'id' => $enrollment->id,
                    'course' => $enrollment->course,
                    'status' => $enrollment->status,
                    'progress_percentage' => $enrollment->getProgressPercentage(),
                    'trial_ends_at' => $enrollment->trial_ends_at,
                ];
            });

        return response()->json([
            'enrollments' => $enrollments
        ]);
    }

    /**
     * Get detailed attendance records and curriculum for a specific enrollment.
     */
    public function getCurriculumDetails(Request $request, $enrollmentId)
    {
        $user = $request->user();

        // Ensure the enrollment belongs to the authenticated user
        $enrollment = Enrollment::with([
            'course.modules.lessons',
            'attendances.lesson'
        ])
        ->where('user_id', $user->id)
        ->findOrFail($enrollmentId);

        return response()->json([
            'progress_percentage' => $enrollment->getProgressPercentage(),
            'enrollment' => $enrollment
        ]);
    }
}
