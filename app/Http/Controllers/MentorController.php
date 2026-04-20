<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mentor;
use Illuminate\Support\Facades\Storage;


class MentorController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $mentors = Mentor::orderBy('order')->get();
        return view('admin.mentor.index', compact('mentors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mentor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'specialization'  => 'required|string|max:255',
            'expertise_badge' => 'required|string|max:255',
            'photo'           => 'required|image|max:2048',
            'tags'            => 'nullable|array',
            'tags.*'          => 'string|max:100',
            'order'           => 'integer|min:0',
            'is_active'       => 'nullable',
        ]);

        $validated['photo_path'] = $request->file('photo')->store('mentors', 'public');
        $validated['is_active']  = $request->boolean('is_active');
        $validated['tags']       = array_filter($request->input('tags', []));

        
        Mentor::create($validated);

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $mentor = Mentor::findOrFail($id);

        return view('admin.mentor.edit', compact('mentor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {   
        $mentor = Mentor::findOrFail($id);
    
        $validated = $request->validate([
            'name'            => 'required|string|max:255',
            'specialization'  => 'required|string|max:255',
            'expertise_badge' => 'required|string|max:255',
            'photo_path'           => 'nullable|image|max:2048',
            'tags'            => 'nullable|array',
            'tags.*'          => 'string|max:100',
            'order'           => 'integer|min:0',
            'is_active'       => 'nullable',
        ]);

        if ($request->hasFile('photo_path')) {
            if ($mentor->photo_path && Storage::disk('public')->exists($mentor->photo_path)) {
                Storage::disk('public')->delete($mentor->photo_path);
            }
            $validated['photo_path'] = $request->file('photo_path')->store('mentors', 'public');
        }

        $validated['is_active'] = $request->boolean('is_active');
        $validated['tags']      = array_filter($request->input('tags', []));

        $mentor->update($validated);

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
         // Hapus foto dari storage
        $mentor = Mentor::findOrFail($id);
        
        if ($mentor->photo_path && Storage::disk('public')->exists($mentor->photo_path)) {
            Storage::disk('public')->delete($mentor->photo_path);
        }

        $mentor->delete();

        return redirect()->route('admin.mentor.index')->with('success', 'Mentor berhasil dihapus.');
    }

}
