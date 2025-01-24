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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->enum('grado',['lesson','course']);
            $table->enum('type',['file','link','video','pdf']);
            $table->text('url');
            $table->text('content');
            $table->string('title');
            $table->integer('order')->nullable();
            $table->foreignId('lesson_id')->constrained('course_lessons')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
