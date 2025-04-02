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
            $table->string('title');
            $table->enum('grade',['leccion','curso']);
            $table->enum('type',['file','link','video','text']);
            $table->string('file')->nullable();
            $table->text('url')->nullable();
            $table->text('content')->nullable();
            $table->integer('order_in_lesson')->nullable();
            $table->foreignId('lesson_id')->nullable()->constrained('lessons')->onDelete('cascade');
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
