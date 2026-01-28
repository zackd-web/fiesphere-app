<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function store(Request $request) {

        // validasi data masuk
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'method' => 'required|in:Online,Offline',
            'program' => 'required|string|max:100',
        ]);

        // simpan data ke database
        Student::create($validated);

        // alihkan kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Pendaftaran berhasil! Kami akan menghubungimu segera.');
    }

    // app/Http/Controllers/StudentController.php

    public function pendaftaran(){
        // Ambil calon siswa yang statusnya masih 'pending' atau 'contacted'
        $pendaftar = \App\Models\Student::whereIn('status', ['pending', 'contacted'])->latest()->get();
        return view('admin.pendaftaran', compact('pendaftar'));
    }

    public function siswa(){
        // Ambil siswa yang sudah resmi 'enrolled'
        $activeStudents = \App\Models\Student::where('status', 'enrolled')->latest()->get();
        return view('admin.siswa', compact('activeStudents'));
    }

    public function enroll($id){
        // Cari siswa berdasarkan ID
        $student = \App\Models\Student::findOrFail($id);

        // Ubah status jadi enrolled
        $student->update([
            'status' => 'enrolled'
        ]);

        // Kembalikan ke halaman pendaftaran dengan pesan sukses
        return redirect()->route('admin.pendaftaran')->with('success', 'Siswa berhasil diterima dan dipindahkan ke daftar Siswa Aktif.');
    }

    public function edit($id){
        $student = \App\Models\Student::findOrFail($id);
        return view('admin.edit_siswa', compact('student'));
    }

    // app/Http/Controllers/StudentController.php

    public function update(Request $request, $id){
        $student = \App\Models\Student::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'whatsapp' => 'required|string|max:20',
            'program' => 'required|string',
            'method' => 'required|in:Online,Offline',
            'status' => 'required|in:pending,contacted,enrolled',
        ]);

        $student->update($validated);

        // Redirect ke DAFTAR SISWA dengan pesan sukses
        return redirect()->route('admin.siswa')->with('success', 'Data siswa ' . $student->name . ' berhasil diperbarui.');
    }

    public function destroy($id){
        $student = \App\Models\Student::findOrFail($id);
        $student->delete();

        // Redirect ke DAFTAR SISWA dengan pesan sukses
        return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus dari sistem.');
    }
}
