<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Promo;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data program (buat section pricing/program)
        $programs = Program::orderBy('id', 'asc')->get(); 

        // 2. Ambil data promo yang aktif (buat slider promo & event)
        // Kita ambil yang is_active-nya true aja biar promo basi nggak tampil
        $promos = Promo::where('is_active', true)->orderBy('created_at', 'desc')->get();

        // 3. Kirim SEMUA data dalam SATU fungsi compact ke view
        return view('pages.home', compact('programs', 'promos'));
    }
}