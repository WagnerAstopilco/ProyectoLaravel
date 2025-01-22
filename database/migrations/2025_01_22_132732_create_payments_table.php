<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade'); 
            $table->string('transaction_code'); 
            $table->decimal('amount', 10, 2); 
            $table->string('payment_method'); 
            $table->enum('status', ['pending', 'completed', 'failed']); 
            $table->timestamp('payment_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
