<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('names');
            $table->string('last_names');            
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone_number')->nullable();
            $table->date('birthday_date')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->nullable();
            $table->char('gender',1)->nullable();
            $table->string('photo')->nullable();
            $table->string('speciality')->nullable();
            $table->text('biography')->nullable();
            $table->enum('role', ['admin', 'comercial', 'supervisor', 'alumno', 'capacitador']);
            $table->enum('status', ['active', 'inactive']);
            $table->timestamps();
        });
    }

 
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
