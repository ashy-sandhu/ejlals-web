<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enrollment_id')->constrained('enrollments')->cascadeOnDelete();

            // Student snapshot (captured at time of enrollment — safe even if user updates profile later)
            $table->string('student_name');
            $table->string('student_email');
            $table->string('student_phone')->nullable();
            $table->string('student_country')->nullable();
            $table->string('student_city')->nullable();
            $table->string('student_timezone')->nullable();

            // Course & schedule snapshot
            $table->string('course_name');
            $table->string('time_slot_details')->nullable(); // e.g. "Monday at 07:00 PM"

            // Student's message at enrollment
            $table->text('student_message')->nullable();

            // Admin working fields
            $table->enum('lead_status', ['new', 'contacted', 'converted', 'closed'])->default('new');
            $table->text('admin_notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('leads');
    }
};
