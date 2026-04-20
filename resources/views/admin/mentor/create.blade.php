<x-layouts.admin title="Tambah Mentor">
    {{-- 1. Blok Error (Dipindah ke atas grid agar tidak merusak layout) --}}
    @if ($errors->any())
        <div class="max-w-6xl mx-auto mb-6 bg-red-500/10 border border-red-500 text-red-500 p-4 rounded-2xl">
            <ul class="text-xs font-bold uppercase tracking-widest list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.mentor.store') }}" method="POST" enctype="multipart/form-data" class="max-w-6xl mx-auto pb-20">
        @csrf
        <div class="grid lg:grid-cols-3 gap-8">
            
            {{-- Bagian Foto (Kiri) --}}
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white/5 border border-white/10 rounded-[40px] p-8 text-center shadow-2xl">
                    <label class="block text-sm font-black text-slate-400 uppercase tracking-widest mb-6">Foto Mentor</label>
                    {{-- NAMA INPUT HARUS 'photo' SESUAI CONTROLLER --}}
                    <input type="file" name="photo" id="photo-upload" class="hidden" accept="image/*" required>
                    <label for="photo-upload" class="relative block w-full aspect-square border-2 border-dashed border-white/10 rounded-[30px] overflow-hidden cursor-pointer hover:bg-white/5 transition-all group">
                        <div id="placeholder" class="absolute inset-0 flex flex-col items-center justify-center space-y-4 group-hover:scale-110 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-slate-600"><path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.822 1.316Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" /></svg>
                            <p class="text-xs font-black text-slate-500 uppercase">Klik untuk upload foto</p>
                        </div>
                        <img id="preview" class="hidden absolute inset-0 w-full h-full object-cover">
                    </label>
                </div>
            </div>

            {{-- Bagian Informasi (Kanan) --}}
            <div class="lg:col-span-2 space-y-8">
                <div class="bg-white/5 border border-white/10 rounded-[40px] p-10 space-y-8 shadow-2xl">
                    <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em] mb-4">Informasi Dasar</h4>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Nama Lengkap<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="name" required placeholder="contoh: Ananda Zaka" value="{{ old('name') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Spesialisasi<span class="text-red-500 ml-1">*</span></label>
                            {{-- NAMA INPUT HARUS 'specialization' --}}
                            <input type="text" name="specialization" required placeholder="contoh: Grammar Master" value="{{ old('specialization') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        </div>
                    </div>
                    <div class="grid md:grid-cols-2 gap-8">
                        <div class="space-y-3">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Badge Keahlian<span class="text-red-500 ml-1">*</span></label>
                            <input type="text" name="expertise_badge" required placeholder="contoh: IELTS 8.0 EXPERT" value="{{ old('expertise_badge') }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        </div>
                        <div class="space-y-3">
                            <label class="text-xs font-black text-slate-500 uppercase tracking-widest ml-1">Urutan Tampil</label>
                            {{-- NAMA INPUT HARUS 'order' --}}
                            <input type="number" name="order" value="{{ old('order', 0) }}" class="w-full bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all">
                        </div>
                    </div>
                </div>

                {{-- Tags Pengalaman --}}
                <div class="bg-white/5 border border-white/10 rounded-[40px] p-10 space-y-6 shadow-2xl">
                    <h4 class="text-sm font-black text-slate-400 uppercase tracking-[0.2em]">Tags Pengalaman</h4>
                    <div id="tags-container" class="space-y-4">
                        <div class="flex items-center gap-3 tag-item">
                            <input type="text" name="tags[]" placeholder="contoh: TESOL Certified" class="flex-1 bg-white/5 border border-white/10 rounded-2xl py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 transition-all">
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
                <div class="bg-white/5 border border-white/10 rounded-[30px] p-8 flex items-center justify-between shadow-2xl">
                    <div>
                        <h4 class="text-sm font-black text-white uppercase tracking-tight">Status Tampil</h4>
                        <p class="text-[10px] text-slate-500 mt-1 uppercase tracking-widest font-bold">Mentor aktif akan tampil di landing page.</p>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                        <div class="w-14 h-8 bg-slate-800 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-1 after:left-1 after:bg-white after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-blue-600"></div>
                    </label>
                </div>

                <div class="flex items-center justify-end gap-6 pt-4">
                    <a href="{{ route('admin.mentor.index') }}" class="text-xs font-black text-slate-500 uppercase tracking-widest hover:text-white transition-colors">Batal</a>
                    <button type="submit" class="px-10 py-5 bg-blue-600 text-white rounded-2xl font-black uppercase tracking-widest text-xs shadow-xl shadow-blue-500/20 hover:bg-blue-700 transition-all flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                        Simpan Mentor
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script>
        document.getElementById('photo-upload').onchange = evt => {
            const [file] = document.getElementById('photo-upload').files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
                document.getElementById('preview').classList.remove('hidden');
                document.getElementById('placeholder').classList.add('hidden');
            }
        }
        document.getElementById('add-tag').onclick = () => {
            const container = document.getElementById('tags-container');
            const newItem = container.querySelector('.tag-item').cloneNode(true);
            newItem.querySelector('input').value = '';
            container.appendChild(newItem);
        }
        document.getElementById('tags-container').onclick = (e) => {
            if (e.target.closest('.remove-tag')) {
                const container = document.getElementById('tags-container');
                if (container.querySelectorAll('.tag-item').length > 1) {
                    e.target.closest('.tag-item').remove();
                }
            }
        }
    </script>
</x-layouts.admin>