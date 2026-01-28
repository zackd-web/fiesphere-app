<?php

namespace App\Http\Controllers;

use App\Models\Program; // Pastikan ini benar
use Illuminate\Http\Request;

class ProgramController extends Controller // Nama class WAJIB sama dengan file
{
    public function index()
    {
        $programs = Program::all(); // Ganti jadi $programs biar sinkron
        return view('admin.program.index', compact('programs'));
    }

    public function create() {
        return view('admin.program.create');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id); // Ganti jadi Program
        return view('admin.program.edit', compact('program'));
    }

    public function destroy($id) {
    $program = Program::findOrFail($id);
    $program->delete();

    return redirect()->route('admin.program.index')->with('success', 'Program berhasil dihapus permanen!');
    }

    // memproses penyimpanan data
    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string',
            'price' => 'required|string',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        Program::create([ // Manggil Program, bukan Pricing
            'title' => $validated['title'],
            'price' => $validated['price'],
            'features' => $validated['features'],
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.program.index')->with('success', 'Paket berhasil diterbitkan!');
    }

    // Memproses perubahan data
    public function update(Request $request, $id){
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string',
            'price' => 'required|string',
            'features' => 'required|array',
            'features.*' => 'required|string',
        ]);

        $program->update([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'features' => $validated['features'], // Eloquent cast otomatis urus JSON-nya
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('admin.program.index')->with('success', 'Data paket berhasil diperbarui!');
    }
}