<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Promo;

class PromoController extends Controller {
    public function store (Request $request ){
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $path = $request->file('image')->store('promos', 'public');

        \App\Models\Promo::create([
            'title' => $request->input('title'),
            'image_path' => $path,
        ]);

        return redirect()->route('admin.promo.index')->with('success', 'Poster promo berhasil diupload!');
    }

    public function index() {
        $promos = \App\Models\Promo::all();
        return view('admin.promo.index', compact('promos'));
    }

    public function create(){
        return view('admin.promo.create');
    }

    public function edit($id){
        $promo = Promo::findOrFail($id);
        return view('admin.promo.edit', compact('promo'));
    }

    public function update(Request $request, $id){
        $promo = Promo::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama biar storage nggak penuh sampah
            Storage::disk('public')->delete($promo->image_path);
            $path = $request->file('image')->store('promos', 'public');
            $promo->image_path = $path;
        }

        $promo->title = $request->title;
        $promo->save();

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil diupdate!');
    }

    public function destroy($id){
        $promo = Promo::findOrFail($id);
        Storage::disk('public')->delete($promo->image_path);
        $promo->delete();

        return redirect()->route('admin.promo.index')->with('success', 'Promo berhasil dihapus!');
    }
}
