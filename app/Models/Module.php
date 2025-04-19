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
    
    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    public function courses()
    {
        return $this->hasMany(CourseModule::class);
    }
}
