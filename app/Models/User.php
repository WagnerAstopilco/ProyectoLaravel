<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'names',
        'last_names',
        'email',
        'phone_number',
        'birthday_date',
        'birthday_date',
        'birthday_date',
        'birthday_date',
        'country',
        'city',
        'address',
        'document_type',
        'document_number',
        'gender',
        'photo',
        'speciality',
        'biography',
        
    ];
    protected $guarded = [
        'role',
        'status',
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($usuario) {
            if ($usuario->password) {
                $usuario->password = bcrypt($usuario->password);
            }
        });
    }


}


$table->id();
            
            