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
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('image_path', 'image');
            $table->string('download_type')->default('link'); // 'file' or 'link'
            $table->string('download_file')->nullable();
            $table->string('download_link')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            $table->renameColumn('image', 'image_path');
            $table->dropColumn(['download_type', 'download_file', 'download_link']);
        });
    }
};
