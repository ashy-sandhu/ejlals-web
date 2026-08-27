<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            // Admin can assign a specific scholar/teacher per student enrollment
            $table->foreignId('assigned_scholar_id')
                  ->nullable()
                  ->after('time_slot_id')
                  ->constrained('scholars')
                  ->nullOnDelete();

            // Trial period timestamps
            $table->timestamp('trial_started_at')->nullable()->after('assigned_scholar_id');
            $table->timestamp('trial_ends_at')->nullable()->after('trial_started_at');
        });
    }

    public function down(): void
    {
        Schema::table('enrollments', function (Blueprint $table) {
            $table->dropForeign(['assigned_scholar_id']);
            $table->dropColumn(['assigned_scholar_id', 'trial_started_at', 'trial_ends_at']);
        });
    }
};
