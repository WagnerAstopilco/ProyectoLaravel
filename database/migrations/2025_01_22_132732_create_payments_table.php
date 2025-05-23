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
            $table->foreignId('enrollment_id')->constrained('enrollments')->onDelete('cascade');
            $table->string('transaction_code'); 
            $table->string('voucher');
            $table->decimal('amount', 10, 2); 
            $table->enum('type',['transferencia','yape','plin','tarjeta']); 
            $table->enum('status', ['pendiente', 'completada', 'fallida']); 
            $table->date('payment_date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
