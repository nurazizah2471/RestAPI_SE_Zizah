<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tutor extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    public function courseBookings()
    {
        return $this->hasMany(CourseBooking::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
