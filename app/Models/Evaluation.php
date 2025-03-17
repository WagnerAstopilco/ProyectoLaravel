<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $table='evaluations';

    protected $fillable = [
        'title',
        'start_date',
        'end_date',
        'duration',
        'attempts_allowed',
        'state',
        'course_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function userEvaluations(){
        return $this->hasMany(UserEvaluation::class);
    }
}
