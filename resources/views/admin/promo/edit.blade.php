<x-layouts.admin title="Edit Data Promo">
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.promo.index') }}" class="flex items-center gap-2 text-slate-500 hover:text-blue-500 transition-colors font-black uppercase text-xs tracking-widest">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7.5M3 12h18" />
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white/5 border border-white/10 rounded-md shadow-2xl overflow-hidden">
            <div class="p-10 md:p-16">
                <form action="{{ route('admin.promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-10">
                    @csrf
                    @method('PUT')
                    
                    <div class="space-y-3">
                        <label class="block text-sm font-black text-slate-400 uppercase tracking-widest ml-1">Judul Promo</label>
                        <input type="text" name="title" value="{{ old('title', $promo->title) }}" required 
                               class="w-full bg-white/5 border border-white/10 rounded-md py-4 px-6 text-white font-medium focus:outline-none focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all">
                    </div>

                    <div class="grid md:grid-cols-2 gap-10">
                        {{-- Current Image --}}
                        <div class="space-y-3">
                            <label class="block text-sm font-black text-slate-500 uppercase tracking-widest ml-1 text-center">Poster Aktif</label>
                            <div class="relative aspect-4/5 rounded-md overflow-hidden border-4 border-white/5 shadow-2xl">
                                <img src="{{ asset('storage/' . $promo->image_path) }}" class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-slate-900/40"></div>
                            </div>
                        </div>

                        {{-- New Upload --}}
                        <div class="space-y-3">
                            <label class="block text-sm font-black text-white uppercase tracking-tight ml-1 text-center">Ganti Poster</label>
                            <input type="file" name="image" id="image-upload" class="hidden" accept="image/*">
                            <label for="image-upload" class="flex flex-col items-center justify-center w-full h-full min-h-75 border-2 border-dashed border-white/10 rounded-md bg-white/5 hover:bg-blue-600/10 hover:border-blue-500/50 cursor-pointer transition-all relative overflow-hidden group">
                                <div class="text-center p-6 group-hover:scale-110 transition-transform">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-blue-500 mx-auto mb-3">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>
                                    <p class="text-xs font-black text-white uppercase tracking-widest">Klik untuk Ganti</p>
                                </div>
                                <img id="preview" class="hidden absolute inset-0 w-full h-full object-cover rounded-md p-2">
                            </label>
                        </div>
                    </div>

                    <div class="flex flex-col md:flex-row items-center gap-4 pt-6 border-t border-white/5">
                        <button type="submit" class="w-full md:flex-1 py-5 bg-blue-600 hover:bg-blue-700 text-white rounded-md font-black shadow-xl shadow-blue-600/20 transition-all uppercase tracking-widest text-sm">
                            Simpan Perubahan
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