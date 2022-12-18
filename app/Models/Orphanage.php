<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphanage extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function orphans()
    {
        return $this->hasMany(Orphan::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function courseBookings()
    {
        return $this->hasMany(CourseBooking::class);
    }
}
