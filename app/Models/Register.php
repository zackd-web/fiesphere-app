<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Register extends Model
{
    protected $fillable = [
    'email', 'name', 'nickname', 'whatsapp', 'gender', 
    'birth_date', 'address', 'education', 'program', 
    'schedule', 'shirt_size', 'source', 'status'
];
}
