<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\EnrollmentAttendance;
use App\Models\Scholar;
use Illuminate\Http\Request;

class TeacherAttendanceController extends Controller
{
    /**
     * Get all assigned students and their courses for the authenticated teacher.
     */
    public function getCourses(Request $request)
    {
        // Assuming the authenticated user is a Scholar/Teacher.
        // Or if user->scholar is how you link users to teachers.
        $user = $request->user();
        
        // Find the scholar record for this user
        $scholar = Scholar::where('user_id', $user->id)->first();

        if (!$scholar) {
            return response()->json(['message' => 'Teacher profile not found for this user.'], 403);
        }

        // Get enrollments assigned to this scholar, or courses where this scholar is the main instructor
        $enrollments = Enrollment::with(['user:id,name,email', 'course:id,title'])
            ->where('assigned_scholar_id', $scholar->id)
            ->whereIn('status', ['active', 'trial'])
            ->get();

        return response()->json([
            'enrollments' => $enrollments
        ]);
    }

    /**
     * Get the curriculum (modules and lessons) and attendance status for a specific enrollment.
     */
    public function getCurriculum(Request $request, $enrollmentId)
    {
        $enrollment = Enrollment::with([
            'course.modules.lessons',
            'attendances'
        ])->findOrFail($enrollmentId);

        return response()->json([
            'enrollment' => $enrollment
        ]);
    }

    /**
     * Mark a specific lesson as attended for a student.
     */
    public function markAttendance(Request $request)
    {
        $request->validate([
            'enrollment_id' => 'required|exists:enrollments,id',
            'course_lesson_id' => 'required|exists:course_lessons,id',
            'notes' => 'nullable|string',
            'attachment' => 'nullable|file|max:10240', // 10MB max
        ]);

        $attachmentPath = null;
        if ($request->hasFile('attachment')) {
            $attachmentPath = $request->file('attachment')->store('attendance-attachments', 'public');
        }

        $attendance = EnrollmentAttendance::updateOrCreate(
            [
                'enrollment_id' => $request->enrollment_id,
                'course_lesson_id' => $request->course_lesson_id,
            ],
            [
                'notes' => $request->notes,
                'attachment_path' => $attachmentPath,
                'attended_at' => now(),
            ]
        );

        $enrollment = Enrollment::findOrFail($request->enrollment_id);
        $progress = $enrollment->getProgressPercentage();

        return response()->json([
            'message' => 'Attendance marked successfully',
            'attendance' => $attendance,
            'new_progress_percentage' => $progress
        ]);
    }
}
