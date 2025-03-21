<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;
    
    protected $table='certificates';

    protected $fillable = [
        'user_id',
        'course_id',
        'issue_date',
        'start_date',
        'end_date',
        'duration_in_hours',
        'code',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
