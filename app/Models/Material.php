<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table='materials';

    protected $fillable = [
        'title',
        'grade',
        'type',
        'url',
        'content',
        'order_in_lesson',
        'lesson_id'
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_material')
                    ->withPivot('order');
    }
}
