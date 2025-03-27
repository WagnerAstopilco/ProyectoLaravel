<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $table='modules';

    protected $fillable=[
        'name',
        'description',
    ];
    
    //relacion course_lesson
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function courses()
    {
        // return $this->belongsToMany(Course::class,'course_module');
                    // ->withPivot('order');
        return $this->hasMany(Curriculum::class);
    }
}
