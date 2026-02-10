<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{

    protected $table = 'registrations'; // Pakai nama tabel hasil migrasi lu
    
    protected $fillable = [
    'name', 'nickname', 'email', 'whatsapp', 'gender', 
    'birth_date', 'address', 'education', 'program', 
    'schedule', 'shirt_size', 'source', 'status'
    ];
}