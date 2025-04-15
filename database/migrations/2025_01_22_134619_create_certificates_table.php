<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
            $table->date('issue_date');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_in_hours');
            $table->string('code');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
