<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('course_lessons', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('order');
            $table->timestamps();
            $table->foreignId('module_id')->constrained('course_modules')->onDelete('cascade');
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('course_lessons');
    }
};
