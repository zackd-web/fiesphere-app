<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['time_range', 'is_active'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}