<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('order');
            $table->timestamps();        
            //TODO
            //crear tabla adicional para manejar el orden en cada curso    
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
