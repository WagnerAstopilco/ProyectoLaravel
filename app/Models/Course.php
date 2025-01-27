<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
    'name_long',
    'name_short',
    'price',
    'discount',
    'image',
    'description',    
    ];
    
    protected $guarded=[
        'store_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
