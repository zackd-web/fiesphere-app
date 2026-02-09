<?php

namespace App\Http\Controllers;

use App\Models\Registration; // Gunakan ini, hapus Student karena sudah tidak dipakai
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Menampilkan daftar pendaftar di Dashboard Admin.
     */
    public function index() 
    {
        // Ambil data dari tabel registrations dengan status pending
        $registers = Registration::where('status', 'pending')->latest()->get();
        return view('admin.register.index', compact('registers'));
    }

    /**
     * Handle pendaftaran dari Landing Page (Publik).
     */
    public function store(Request $request) 
    {
        // 1. Validasi field (Pastikan email unik di tabel registrations)
        $validated = $request->validate([
            'email'      => 'required|email|unique:registrations,email',
            'name'       => 'required|string|max:255',
            'nickname'   => 'required|string|max:100',
            'whatsapp'   => 'required|string',
            'gender'     => 'required|in:L,P',
            'birth_date' => 'required|date',
            'address'    => 'required|string',
            'education'  => 'required|string',
            'program'    => 'required|string',
            'schedule'   => 'required|string',
            'shirt_size' => 'required|string',
            'source'     => 'required|string',
        ]);

        // 2. Simpan ke database (PERBAIKAN: Gunakan Registration, bukan Register!)
        \App\Models\Registration::create($validated);

        // 3. Arahkan kembali ke home dengan pesan sukses
        return redirect()->to(route('home') . '#register')
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