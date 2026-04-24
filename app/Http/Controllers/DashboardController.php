<?php

namespace App\Http\Controllers;

use App\Models\Mentor;   // Pastikan Model ini ada
use App\Models\Program;  // Pastikan Model ini ada
use App\Models\Promo;    // Pastikan Model ini ada
// Pastikan Model ini ada (pendaftar baru)

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil semua data dari database
        $promos = Promo::all();
        $mentors = Mentor::all();
        $programs = Program::all();

        // Lempar semua variabel ke view 'dashboard'
        return view('dashboard', compact('promos', 'mentors', 'programs'));
    }
}