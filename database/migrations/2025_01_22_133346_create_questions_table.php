<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evaluation_id')->constrained('evaluations')->onDelete('cascade');
            $table->enum('type',['multiple_choise','open']);
            $table->text('question_text');
            $table->decimal('weight', 10,2);
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
