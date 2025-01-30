<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $table='lessons';

    protected $fillable=[
        'title',
        'description',
        'order',
    ];

    //relacion con modules
    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function sessions()
    {
        return $this->hasMany(LessonSession::class);
    }

    public function materials()
    {
        return $this->hasMany(Material::class);
    }
}
