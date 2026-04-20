<x-layouts.admin title="Edit Profil Mentor">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.mentor.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-blue-500 transition-colors font-black uppercase text-xs tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-[40px] shadow-2xl overflow-hidden">
            <div class="p-10 md:p-16">
                <form action="{{ route('admin.mentor.update', $mentor->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')
                    
                    <div class="lg:col-span-2 space-y-8">
                        {{-- Dasar --}}
                        <div class="bg-white/5 border border-white/10 rounded-sm p-10 space-y-8 shadow-2xl">
                            <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Informasi Dasar</h4>
                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Nama Lengkap<span class="text-red-500 ml-1">*</span></label>
                                    <input type="text" name="name" required value="{{ old('name', $mentor->name) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all"></input>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Spesialisasi<span class="text-red-500 ml-1">*</span></label>
                                    <input type="text" name="specialization" value="{{ old('specialization', $mentor->specialization) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 gap-8">
                                <div class="space-y-3">
                                    <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Badge Keahlian<span class="text-red-500 ml-1">*</span></label>
                                    <input type="text" name="expertise_badge" value="{{ old('expertise_badge', $mentor->expertise_badge) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                                    <p class="text-[10px] text-slate-500 ml-1">Teks label kuning di pojok foto.</p>
                                </div>
                                <div class="space-y-3">
                                    <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Urutan Tampil</label>
                                    <input type="number" name="order" value="{{ old('order', $mentor->order) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all">
                                    <p class="text-[10px] text-slate-500 ml-1">Angka kecil tampil lebih dulu.</p>
                                </div>
                            </div>
                        </div>

                        {{-- Tags Pengalaman --}}
                        <div class="bg-white/5 border border-white/10 rounded-sm p-10 space-y-6 shadow-2xl">
                            <div class="space-y-1">
                                <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em]">Tags Pengalaman</h4>
                                <p class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Contoh: Ex-Tutor Pare, TESOL Certified</p>
                            </div>
                            <div id="tags-container" class="space-y-4">
                                <div class="flex items-center gap-3 tag-item">
                                    <input type="text" name="tags[]" value="{{ old('tags.0', $mentor->tags[0] ?? '') }}" placeholder="contoh: TESOL Certified" class="flex-1 bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all">
                                    <button type="button" class="remove-tag p-4 bg-white/5 text-slate-600 hover:text-red-500 rounded-2xl transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" /></svg>
                                    </button>
                                </div>
                            </div>
                            <button type="button" id="add-tag" class="flex items-center gap-2 text-xs font-black text-blue-500 uppercase tracking-widest hover:text-blue-400 transition-colors ml-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-3"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" /></svg>
                                Tambah Tag
                            </button>
                        </div>

                        {{-- Status Toggle --}}
                        <div class="bg-white/5 border border-white/10 rounded-sm p-8 flex items-center justify-between shadow-2xl">
                            <div>
                                <h4 class="text-sm font-black text-white uppercase tracking-tight">Status Tampil</h4>
                                <p class="text-xs text-slate-500 mt-1 uppercase tracking-widest font-bold">Mentor aktif akan tampil di landing page.</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                                <div class="w-14 h-8 bg-slate-800 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:border-slate-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600"></div>
                            </label>
                        </div>

                    </div>

                
                    <div class="grid md:grid-cols-2 gap-10">
                        {{-- Foto Aktif --}}
                        <div class="space-y-3 text-center">
                            <label class="block text-xs font-black text-slate-500 uppercase tracking-[0.2em] mb-4">Foto Saat Ini</label>
                            <div class="relative w-48 h-48 mx-auto rounded-sm overflow-hidden border-4 border-white/5 shadow-2xl shadow-black">
                                <img src="{{ asset('storage/' . $mentor->photo_path) }}" class="w-full h-full object-cover">
                            </div>
                        </div>

                        {{-- Ganti Foto --}}
                        <div class="space-y-3">
                            <label class="block text-xs font-black text-blue-500 uppercase tracking-[0.2em] mb-4 text-center">Ganti Foto Baru</label>
                            <input type="file" name="photo_path" id="photo-upload" class="hidden" accept="image/*">
                            <label for="photo-upload" class="flex flex-col items-center justify-center w-full h-48 border-2 border-dashed border-white/10 rounded-sm bg-white/5 hover:bg-blue-600/10 hover:border-blue-500/50 cursor-pointer transition-all relative overflow-hidden group">
                                <div class="text-center group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8 text-blue-500 mx-auto mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                    <p class="text-[10px] font-black text-white uppercase tracking-widest">Klik Ganti</p>
                                </div>
                                <img id="preview" class="hidden absolute inset-0 w-full h-full object-cover rounded-sm p-2">
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-4 pt-6 border-t border-white/5">
                        <button type="submit" class="w-full md:flex-1 py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-2xl font-black shadow-xl shadow-blue-600/20 transition-all uppercase tracking-widest text-sm">
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('admin.mentor.index') }}" class="w-full md:w-auto px-10 py-5 bg-white/5 hover:bg-white/10 text-slate-400 rounded-2xl font-black transition-all uppercase tracking-widest text-sm text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('photo-upload').onchange = evt => {
            const [file] = document.getElementById('photo-upload').files
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file)
                document.getElementById('preview').classList.remove('hidden')
            }
        }
    </script>
</x-layouts.admin>