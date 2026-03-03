<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Models\Program;
use App\Models\Schedule;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Menampilkan daftar pendaftar di Dashboard Admin.
     */
    public function index() 
    {
        // PERBAIKAN: Gunakan 'with' untuk Eager Loading agar tidak terjadi N+1 Query
        $registers = Registration::with(['pricing', 'schedule'])
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('admin.register.index', compact('registers'));
    }

    /**
     * Handle pendaftaran dari Landing Page (Publik).
     */
    public function store(Request $request) 
    {
        // 1. Validasi field (GANTI: Gunakan ID relasi, bukan string)
        $validated = $request->validate([
            'email'         => 'required|email|unique:registrations,email',
            'name'          => 'required|string|max:255',
            'nickname'      => 'required|string|max:100',
            'whatsapp'      => 'required|string',
            'gender'        => 'required|in:L,P',
            'birth_date'    => 'required|date',
            'address'       => 'required|string',
            'education'     => 'required|string',
            'school_origin' => 'required|string|max:255',
            'class_type'    => 'required|in:online,offline',
            'source'        => 'required|string',
            
            // PERBAIKAN: Validasi keberadaan ID di tabel induk
            'pricing_id'    => 'required|exists:pricings,id', 
            'schedule_id'   => 'required|exists:schedules,id',
        ]);

        // 2. Simpan ke database
        Registration::create($validated);

        return redirect()->to(route('home') . '#home')
            ->with('success', 'Pendaftaran FSEC Berhasil! Kami akan segera menghubungi Anda.');
    }

    /**
     * Proses "Promosi" dari Register ke Student (Cukup ubah status).
     */
    public function enroll($id) 
    {
        // Cari data pendaftar berdasarkan UUID
        $registration = Registration::findOrFail($id);

        // Cukup ubah status menjadi active
        $registration->update(['status' => 'active']); 

        return redirect()->route('admin.register.index')->with('success', 'Siswa resmi aktif di Fiesphere.');
    }
}