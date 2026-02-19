<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            // Add missing course_id if it doesn't exist
            if (!Schema::hasColumn('time_slots', 'course_id')) {
                $table->foreignId('course_id')->after('id')->constrained()->onDelete('cascade');
            }
            
            // Rename columns to match Model and Resource expectations
            if (Schema::hasColumn('time_slots', 'day_of_week')) {
                $table->renameColumn('day_of_week', 'day');
            }
            
            if (Schema::hasColumn('time_slots', 'start_time')) {
                $table->renameColumn('start_time', 'time');
            }
            
            if (Schema::hasColumn('time_slots', 'total_seats')) {
                $table->renameColumn('total_seats', 'capacity');
            }
            
            // Remove columns no longer used by the current model version
            if (Schema::hasColumn('time_slots', 'end_time')) {
                $table->dropColumn('end_time');
            }
            
            if (Schema::hasColumn('time_slots', 'is_available')) {
                $table->dropColumn('is_available');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('time_slots', function (Blueprint $table) {
            if (Schema::hasColumn('time_slots', 'course_id')) {
                $table->dropForeign(['course_id']);
                $table->dropColumn('course_id');
            }
            
            if (Schema::hasColumn('time_slots', 'day')) {
                $table->renameColumn('day', 'day_of_week');
            }
            
            if (Schema::hasColumn('time_slots', 'time')) {
                $table->renameColumn('time', 'start_time');
            }
            
            if (Schema::hasColumn('time_slots', 'capacity')) {
                $table->renameColumn('capacity', 'total_seats');
            }
            
            $table->time('end_time')->after('time')->nullable();
            $table->boolean('is_available')->default(true)->after('end_time');
        });
    }
};
