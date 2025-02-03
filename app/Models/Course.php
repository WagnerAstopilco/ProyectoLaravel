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
    'description',    
    'store_id',
    'category_id'
    ];

    //relacion con category
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
        return $this->belongsToMany(Module::class, 'course_module');
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
        return $this->belongsToMany(Material::class, 'course_material');
    }

}
