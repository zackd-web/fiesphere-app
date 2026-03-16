<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Promo;
use App\Models\Schedule;
use App\Models\Mentor;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil data program (buat section pricing/program)
        $programs = Program::orderBy('id', 'asc')->get(); 

        // 2. Ambil data promo yang aktif (buat slider promo & event)
        // Kita ambil yang is_active-nya true aja biar promo basi nggak tampil
        $promos = Promo::where('is_active', true)->orderBy('created_at', 'desc')->get();

        // Ambil data paket dan jadwal yang aktif dari database
        $pricings = \App\Models\Program::where('is_active', true)->get();
        $schedules = \App\Models\Schedule::where('is_active', true)->get();
         $mentors = Mentor::where('is_active', true)->orderBy('order')->get();
        // 3. Kirim SEMUA data dalam SATU fungsi compact ke view
        return view('pages.home', compact('programs', 'promos', 'pricings', 'schedules', 'mentors'));
    }
}