<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar siswa yang sudah resmi (enrolled/active).
     * Sesuai dengan route('admin.siswa.index')
     */
    public function index() {
    // Ambil dari tabel yang sama, tapi filter yang sudah active
        $activeStudents = \App\Models\Registration::where('status', 'active')->latest()->get();
        return view('admin.siswa', compact('activeStudents'));
    }

    public function edit($id)
    {
        $student = Registration::findOrFail($id);
        return view('admin.edit_siswa', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Registration::findOrFail($id);
        
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'nickname'      => 'required|string|max:100',
            'email'         => 'required|email|unique:registrations,email,' . $id,
            'whatsapp'      => 'required|string|max:20',
            'gender'        => 'required|in:L,P',
            'birth_date'    => 'required|date',
            'address'       => 'required|string',
            'school_origin' => 'nullable|string|max:255', // Kolom baru
            'education'     => 'required|string',
            'program'       => 'required|string',
            'class_type'    => 'required|in:online,offline', // Kolom baru
            'schedule'      => 'required|string',
            'source'        => 'required|string',
            'status'        => 'required|in:active,enrolled,inactive,pending',
        ]);

        $student->update($validated);

        return redirect()->route('admin.siswa')->with('success', 'Data siswa ' . $student->name . ' berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Registration::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}