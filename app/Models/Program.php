<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illmuninate\Database\Eloquent\Relations\HasMany;

class Program extends Model // Pastikan nama class sama dengan nama file
{
    // Jika tabel di database lu masih bernama 'pricings', tambahkan ini
    protected $table = 'pricings'; 

    protected $fillable = [
        'title', 'price', 'duration', 'badge', 
        'features', 'button_text', 'button_link', 'is_featured'
    ];

    protected $casts = [
        'features' => 'array', // Casting ini WAJIB ada
        'is_featured' => 'boolean',
    ];

    public function registrations(): HasMany {
        return $this->hasMany(Registration::class);
    }
}