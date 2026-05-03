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
        $tables = ['posts', 'scholars', 'courses', 'books'];
        
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->string('seo_title')->nullable()->after('slug');
                $table->text('seo_description')->nullable()->after('seo_title');
                $table->string('image_alt')->nullable()->after('image');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['posts', 'scholars', 'courses', 'books'];
        
        foreach ($tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->dropColumn(['seo_title', 'seo_description', 'image_alt']);
            });
        }
    }
};
