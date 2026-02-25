<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Registration extends Model
{

    protected $table = 'registrations'; // Pakai nama tabel hasil migrasi lu
    
    protected $fillable = [
        'pricing_id',
        'schedule_id',
        'name', 
        'nickname', 
        'email', 
        'whatsapp', 
        'gender', 
        'birth_date', 
        'address', 
        'school_origin', // Kolom baru lu
        'education', 
        'class_type',    // Kolom baru lu
        'source',        // Ini penyebab error tadi
        'status'
    ];

    public function pricing() {
        return $this->belongsTo(Program::class);
    }
    public function schedule() {
        return $this->belongsTo(Schedule::class);
}   
}