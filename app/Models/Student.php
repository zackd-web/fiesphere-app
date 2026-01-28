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
        'name',
        'whatsapp',
        'method',
        'program',
        'status',
        'note',
    ];

    /**
     * Nilai default untuk atribut.
     */
    protected $attributes = [
        'status' => 'pending',
    ];
}