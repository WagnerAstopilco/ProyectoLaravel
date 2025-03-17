<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserEvaluation extends Model
{
    use HasFactory;

    protected $table='user_evaluations';

    protected $fillable=[
        'user_id',
        'evaluation_id',
        'attempt_number',
        'start_time',
        'end_time',
        'score',
        'availability',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function evaluation(){
        return $this->belongsTo(Evaluation::class);
    }
    public function userAnswers(){
        return $this->hasMany(UserAnswer::class);
    }
}
