<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'names',
        'last_names',
        'email',
        'password',
        'role',
        'status',
        'phone_number',
        'birthday_date',
        'country',
        'city',
        'address_type',
        'address',
        'address_number',
        'document_type',
        'document_number',
        'gender',
        'photo',
        'speciality',
        'biography',
    ];

    protected $hidden = [
        'password',
        'remember_token',
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

    public function userEvaluations()
    {
        return $this->hasMany(UserEvaluation::class);
    }

    public function lessons()
    {
        return $this->hasMany(LessonUser::class);
    }
}
