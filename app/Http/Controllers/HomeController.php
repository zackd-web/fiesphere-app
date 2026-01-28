<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

class HomeController extends Controller
{
    public function index(){
    // Nama variabel harus sama dengan yang di-compact
    $programs = Program::orderBy('id', 'asc')->get(); 
    return view('pages.home', compact('programs'));
}
}
