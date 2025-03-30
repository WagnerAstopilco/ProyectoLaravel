<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $table='courses';

    protected $fillable=[
    'name_long',
    'name_short',
    'price',
    'discount',
    'image',
    'start_date',
    'end_date',
    'duration_in_hours',
    'description',    
    'store_id',
    'category_id'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function trainers()
    {
        return $this->belongsToMany(Trainer::class, 'course_trainer');
    }

    public function modules()
    {
        return $this->hasMany(CourseModule::class);
    }

    public function evaluations()
    {
        return $this->hasMany(Evaluation::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function materials(){
        return $this->hasMany(CourseMaterial::class);
    }

}
