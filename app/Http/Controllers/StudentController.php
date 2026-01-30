<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Menampilkan daftar siswa yang sudah resmi (enrolled/active).
     * Sesuai dengan route('admin.siswa.index')
     */
    public function index()
    {
        // Kita hanya mengambil siswa yang statusnya 'active' atau 'enrolled'
        $activeStudents = Student::where('status', 'active')
            ->orWhere('status', 'enrolled')
            ->latest()
            ->get();

        return view('admin.siswa', compact('activeStudents'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('admin.edit_siswa', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'whatsapp' => 'required|string|max:20',
            'program' => 'required|string',
            'status' => 'required|in:active,enrolled,inactive',
        ]);

        $student->update($validated);

        return redirect()->route('admin.siswa')->with('success', 'Data siswa ' . $student->name . ' berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus.');
    }
}