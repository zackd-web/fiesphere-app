<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang terkait dengan model.
     * Secara default Laravel bakal nyari 'students', tapi kita tegesin di sini.
     */
    protected $table = 'students';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Wajib diisi supaya Student::create() di Controller jalan.
     */
    protected $fillable = [
        'email', 
        'name', 
        'nickname', // Pastikan sudah ditambah
        'whatsapp', 
        'gender',   // Pastikan sudah ditambah
        'birth_date', 
        'address', 
        'education', 
        'program', 
        'schedule', 
        'shirt_size', 
        'source', 
        'status',
    ];

    /**
     * Nilai default untuk atribut.
     */
    protected $attributes = [
        'status' => 'pending',
    ];
}