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
        Schema::create('scholars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('title')->nullable(); // e.g. Hafiz, Sheikh, BS English
            $table->string('image')->nullable();
            $table->string('gender')->nullable();
            $table->string('qualification')->nullable();
            $table->string('location')->nullable();
            $table->string('availability')->nullable();
            $table->string('teaching_experience')->nullable();
            $table->json('subjects_taught')->nullable();
            $table->json('classes_can_teach')->nullable();
            $table->text('experience_details')->nullable();
            $table->text('about_me')->nullable();
            $table->decimal('rating', 3, 1)->default(5.0);
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholars');
    }
};
