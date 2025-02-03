<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;

    protected $table = 'user_answers';

    protected $fillable =[
        'user_evaluation_id',
        'question_id',
        'answer_text',
        'is_correct'
    ];

    public function userEvaluation(){
        return $this->belongsTo(UserEvaluation::class);
    }
    
    public function question(){
        return $this->belongsTo(Question::class);
    }
}
