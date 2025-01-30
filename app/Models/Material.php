<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table='materials';

    protected $fillable = [
        'grado',
        'type',
        'url',
        'content',
        'title',
        'order',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_materials');
    }
}
