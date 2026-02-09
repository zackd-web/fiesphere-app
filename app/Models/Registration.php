<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids; // Karena lu pake UUID

class Registration extends Model
{
    use HasUuids; // Wajib karena ID lu UUID

    protected $table = 'registrations'; // Pakai nama tabel hasil migrasi lu
    
    protected $fillable = [
    'name', 'nickname', 'email', 'whatsapp', 'gender', 
    'birth_date', 'address', 'education', 'program', 
    'schedule', 'shirt_size', 'source', 'status'
    ];
}