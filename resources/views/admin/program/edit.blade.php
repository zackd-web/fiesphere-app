<x-layouts.admin title="Edit Paket Kursus">
    <div class="max-w-4xl mx-auto">
        {{-- Tombol Kembali --}}
        <div class="mb-8">
            <a href="{{ route('admin.program.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-blue-500 transition-colors font-black uppercase text-xs tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        {{-- Form Container --}}
        <div class="bg-white/5 border border-white/10 rounded-md shadow-2xl overflow-hidden">
            <div class="p-10 md:p-16">
                <div class="mb-10">
                    <h3 class="text-2xl font-black text-white tracking-tight uppercase">Edit Paket : 
                        <br><span class="text-blue-500">{{ $program->title }}</span></h3>
                    <p class="text-sm text-slate-500 mt-2 font-medium">Perbarui detail harga dan fitur untuk paket ini.</p>
                </div>

                <form action="{{ route('admin.program.update', $program->id) }}" method="POST" class="space-y-10">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid md:grid-cols-2 gap-8">
                        {{-- Judul Paket --}}
                        <div class="space-y-3">
                            <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">Nama Program</label>
                            <input type="text" name="title" value="{{ old('title', $program->title) }}" required 
                                   class="w-full bg-white/5 border border-white/10 rounded-md py-4 px-6 text-white font-medium focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        </div>
                        {{-- Harga --}}
                        <div class="space-y-3">
                            <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">Harga Paket</label>
                            <input type="text" name="price" value="{{ old('price', $program->price) }}" required 
                                   class="w-full bg-white/5 border border-white/10 rounded-md py-4 px-6 text-white font-medium focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                        </div>
                    </div>

                    {{-- Dynamic Feature Points --}}
                    <div class="space-y-6">
                        <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">Edit Poin Fitur</label>
                        <div id="feature-list" class="space-y-4">
                            @foreach($program->features as $feature)
                                <div class="flex gap-3 feature-item">
                                    <input type="text" name="features[]" value="{{ $feature }}" required 
                                           class="flex-1 bg-white/5 border border-white/10 rounded-md py-4 px-6 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                                    <button type="button" class="remove-feature p-4 bg-white/5 text-red-400 hover:bg-red-500/20 rounded-md transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" id="add-feature" class="flex items-center gap-2 px-6 py-3 bg-blue-600/10 text-blue-400 rounded-xl font-bold uppercase text-xs tracking-widest hover:bg-blue-600/20 transition-all">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="size-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Tambah Fitur Lagi
                        </button>
                    </div>

                    {{-- Featured Status --}}
                    <div class="flex items-center gap-4 bg-white/5 p-6 rounded-[28px] border border-white/5 hover:border-blue-500/30 transition-all cursor-pointer">
                        <input type="checkbox" name="is_featured" id="is_featured" class="size-6 bg-transparent border-white/20 rounded-lg accent-blue-600" {{ $program->is_featured ? 'checked' : '' }}>
                        <label for="is_featured" class="text-sm font-bold text-slate-300 uppercase tracking-tight cursor-pointer">Pasang Badge "Rekomendasi" (Warna Biru)</label>
                    </div>

                    {{-- Actions --}}
                    <div class="flex flex-col md:flex-row items-center gap-4 pt-6 border-t border-white/5">
                        <button type="submit" class="w-full md:flex-1 py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-black shadow-xl shadow-blue-600/20 transition-all uppercase tracking-widest text-sm">
                            Update Paket
                        </button>
                        <a href="{{ route('admin.program.index') }}" class="w-full md:w-auto px-10 py-5 bg-white/5 hover:bg-white/10 text-slate-400 rounded-md font-black transition-all uppercase tracking-widest text-sm text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Dynamic Features --}}
    <script>
        document.getElementById('add-feature').addEventListener('click', function() {
            const list = document.getElementById('feature-list');
            const items = document.querySelectorAll('.feature-item');
            if (items.length > 0) {
                const newItem = items[0].cloneNode(true);
                newItem.querySelector('input').value = '';
                
                // Tambahkan event hapus ke baris baru
                newItem.querySelector('.remove-feature').onclick = function() {
                    if(document.querySelectorAll('.feature-item').length > 1) {
                        newItem.remove();
                    }
                };
                list.appendChild(newItem);
            }
        });

        // Inisialisasi tombol hapus untuk data yang sudah ada
        document.querySelectorAll('.remove-feature').forEach(btn => {
            btn.onclick = function() {
                if (document.querySelectorAll('.feature-item').length > 1) {
                    this.closest('.feature-item').remove();
                } else {
                    alert('Minimal harus ada satu poin fitur, bro.');
                }
            };
        });
    </script>
</x-layouts.admin>