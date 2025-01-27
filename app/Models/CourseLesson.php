<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseLesson extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'order',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }
}
