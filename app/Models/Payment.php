<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $table='payments';

    protected $fillable=[
        'enrollment_id',
        'transaction_code',
        'voucher',
        'amount',
        'type',
        'status',
        'payment_date',
    ];

    public function enrollment(){
        return $this->belongsTo(Enrollment::class);
    }
}
