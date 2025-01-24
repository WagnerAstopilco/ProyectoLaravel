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
        Schema::create('enrollment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->contrained('users')->onDelete('cascade');
            $table->foreignId('course_id')->contrained('courses')->onDelete('cascade');
            $table->date('enrollment_date');
            $table->date('end_enrollment_date');
            $table->enum('state',['activo','suspendido']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enrollment');
    }
};
