<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orphan extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function orphanage()
    {
        return $this->belongsTo(Orphanage::class);
    }
}
