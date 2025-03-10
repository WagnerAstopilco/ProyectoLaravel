<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id(); 
            $table->string('name_long'); 
            $table->string('name_short'); 
            $table->decimal('price', 10, 2); 
            $table->decimal('discount', 10, 2)->nullable(); 
            $table->string('image',255)->nullable(); 
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_in_hours');
            $table->text('description'); 
            $table->timestamps(); 
            $table->string('store_id');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); 
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
