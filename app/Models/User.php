<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table='users';
    
    protected $fillable = [
        'names',
        'last_names',
        'email',
        'phone_number',
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
        'password',
        'role',
        'status',
    ];

    public function trainer()
    {
        return $this->hasOne(Trainer::class);
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }
    
    public function userEvaluations(){
        return $this->hasMany(UserEvaluation::class);
    }
}
            
            