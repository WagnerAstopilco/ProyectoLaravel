<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonSession extends Model
{
    use HasFactory;

    protected $table='lesson_sessions';

    protected $fillable=[
        'lesson_id',
        'session_date',
        'type',
        'link',
        'password',
    ];

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }

}
