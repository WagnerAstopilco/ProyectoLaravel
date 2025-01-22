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
        Schema::create('lesson_sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lesson_id')->constrained('course_lessons')->onDelete('cascade');
            $table->timestamp('session_date');
            $table->string('zoom_link');
            $table->string('meeting_link');
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_sessions');
    }
};
