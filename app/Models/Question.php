<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $table = 'questions';

    protected $fillable = [
        'evaluation_id',
        'type',
        'question_text',
        'weight',
    ];

    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
    public function userAnswers(){
        return $this->hasMany(UserAnswer::class);
    }
}
