<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $table = 'registrations'; // Pakai nama tabel hasil migrasi lu
    
    protected $fillable = [
        'name', 
        'nickname', 
        'email', 
        'whatsapp', 
        'gender', 
        'birth_date', 
        'address', 
        'school_origin', // Kolom baru lu
        'education', 
        'program', 
        'class_type',    // Kolom baru lu
        'schedule', 
        'source',        // Ini penyebab error tadi
        'status'
    ];
}