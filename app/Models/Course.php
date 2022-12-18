<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function tutor()
    {
        return $this->belongsTo(Tutor::class);
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function courseBookings()
    {
        return $this->hasMany(CourseBooking::class);
    }
}
