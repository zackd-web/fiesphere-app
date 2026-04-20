<x-layouts.admin title="Upload Poster Baru">
    <div class="max-w-4xl mx-auto">
        {{-- Tombol Kembali --}}
        <div class="mb-8">
            <a href="{{ route('admin.promo.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-blue-500 transition-colors font-black uppercase text-xs tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali ke Daftar
            </a>
        </div>

        {{-- Container Form --}}
        <div class="bg-white/5 border border-white/10 rounded-sm shadow-2xl overflow-hidden">
            <div class="p-10 md:p-16">
                <form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    
                    {{-- Input Judul --}}
                    <div class="space-y-3">
                        <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">Judul Poster</label>
                        <input type="text" name="title" required placeholder="Masukkan nama promo..." 
                               class="w-full bg-white/5 border border-white/10 rounded-md py-4 px-6 text-white font-medium focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>

                    {{-- Custom File Upload dengan Preview --}}
                    <div class="space-y-3">
                        <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">File Gambar (4:5)</label>
                        <div class="relative group">
                            <input type="file" name="image" required id="image-upload" class="hidden" accept="image/*">
                            <label for="image-upload" class="flex flex-col items-center justify-center w-full h-80 border-2 border-dashed border-white/10 rounded-md bg-white/5 hover:bg-white/10 hover:border-blue-500/50 cursor-pointer transition-all relative overflow-hidden">
                                <div class="text-center p-6 group-hover:scale-110 transition-transform duration-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-12 text-blue-500 mx-auto mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 0 1-1.41-8.775 5.25 5.25 0 0 1 10.233-2.33 3 3 0 0 1 3.758 3.848A3.752 3.752 0 0 1 18 19.5H6.75z" />
                                    </svg>
                                    <p class="text-sm font-black text-white uppercase tracking-tight">Klik untuk Pilih Gambar</p>
                                    <p class="text-[10px] text-slate-500 mt-2 font-bold uppercase tracking-widest">Format: JPG, PNG, WEBP</p>
                                </div>
                                <img id="preview" class="hidden absolute inset-0 w-full h-full object-cover rounded-md p-2">
                            </label>
                        </div>
                    </div>

                    {{-- Action --}}
                    <div class="flex flex-col md:flex-row items-center gap-4 pt-6 border-t border-white/5">
                        <button type="submit" class="w-full md:flex-1 py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-black shadow-xl shadow-blue-600/20 transition-all uppercase tracking-widest text-sm">
                            Publish Sekarang
                        </button>
                        <a href="{{ route('admin.promo.index') }}" class="w-full md:w-auto px-10 py-5 bg-white/5 hover:bg-white/10 text-slate-400 rounded-md font-black transition-all uppercase tracking-widest text-sm text-center">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('image-upload').onchange = evt => {
            const [file] = document.getElementById('image-upload').files
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file)
                document.getElementById('preview').classList.remove('hidden')
            }
        }
    </script>
</x-layouts.admin>