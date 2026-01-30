<?php

namespace App\Http\Controllers;

use App\Models\Register;
use App\Models\Student;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    // Menampilkan daftar pendaftar di Dashboard Admin
    public function index() {
        $registers = Register::where('status', 'pending')->latest()->get();
        return view('admin.register.index', compact('registers'));
    }

    // Handle pendaftaran dari Landing Page (Publik)
    public function store(Request $request) {
    // 1. Validasi SEMUA field agar data masuk ke database
    $validated = $request->validate([
        'email'      => 'required|email|unique:registers,email',
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

    // 2. Simpan ke database
    \App\Models\Register::create($validated);

    // 3. JANGAN pake back(), arahkan langsung ke anchor #register di Home
    return redirect()->to(route('home'))
        ->with('success', 'Pendaftaran FSEC Berhasil! Kami akan segera menghubungi Anda.');
}

    // Proses "Promosi" dari Register ke Student
    public function enroll($id) {
        $register = Register::findOrFail($id);

        // 1. Copy data ke tabel Student
        Student::create([
        'name'       => $register->name,
        'email'      => $register->email,
        'nickname'   => $register->nickname,
        'whatsapp'   => $register->whatsapp,
        'gender'     => $register->gender,
        'birth_date' => $register->birth_date,
        'address'    => $register->address,
        'education'  => $register->education, // Ini penyebab error tadi
        'program'    => $register->program,
        'schedule'   => $register->schedule,
        'shirt_size' => $register->shirt_size,
        'source'     => $register->source,
        'status'     => 'active', 
    ]);

        // 2. Hapus dari pendaftar (atau ubah status agar tidak muncul lagi)
        $register->delete(); 

        return redirect()->route('admin.register.index')->with('success', 'Siswa resmi terdaftar di Fiesphere.');
    }
}