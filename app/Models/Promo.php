<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promo extends Model
{
    use HasFactory;
    // Nama tabel di database
    protected $table = 'promos';

    // Kolom yang boleh diisi (Security: Mass Assignment Protection)
    protected $fillable = [
        'title', 
        'image_path', 
        'is_active'
    ];

    // Casting is_active biar Laravel otomatis anggep sebagai boolean
    protected $casts = [
        'is_active' => 'boolean',
    ];
}