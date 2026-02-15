<section id="programs" class="py-24 bg-fiesphere-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16 space-y-4">
                <h2 class="text-4xl font-extrabold text-fiesphere-blue">Program Unggulan</h2>
                <p class="text-slate-500 max-w-xl mx-auto">Kami menawarkan berbagai program, silakan pilih program yang paling sesuai untuk Anda.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Program 1 -->
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 hover:shadow-2xl transition-all group overflow-hidden">
                    <!-- SLOT GAMBAR PROGRAM 1 -->
                    <div class="h-40 bg-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400">
                        <i data-lucide="mic" class="w-10 h-10"></i>
                        <!-- <img src="URL_GAMBAR_SPEAKING" class="w-full h-full object-cover"> -->
                    </div>
                    <h3 class="text-2xl font-bold text-fiesphere-blue mb-4">Speaking Class</h3>
                    <p class="text-slate-500 mb-6">Fokus pada kelancaran berbicara, pengucapan, dan rasa percaya diri saat berkomunikasi.</p>
                    <a href="#register" class="text-fiesphere-blue font-bold flex items-center gap-2 group-hover:gap-4 transition-all uppercase text-sm">Pelajari Selengkapnya →</a>
                </div>

                <!-- Program 2 -->
                <div class="bg-white p-8 rounded-[32px] border-2 border-fiesphere-yellow shadow-xl relative overflow-hidden group">
                    <div class="absolute top-0 right-0 bg-fiesphere-yellow px-4 py-1 text-[10px] font-bold uppercase tracking-widest text-fiesphere-blue">Populer</div>
                    <!-- SLOT GAMBAR PROGRAM 2 -->
                    <div class="h-40 bg-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400">
                        <i data-lucide="graduation-cap" class="w-10 h-10"></i>
                        <!-- <img src="URL_GAMBAR_IELTS" class="w-full h-full object-cover"> -->
                    </div>
                    <h3 class="text-2xl font-bold text-fiesphere-blue mb-4">IELTS/TOEFL Prep</h3>
                    <p class="text-slate-500 mb-6">Persiapan intensif untuk meraih skor impian guna beasiswa atau karir internasional.</p>
                    <a href="#register" class="text-fiesphere-blue font-bold flex items-center gap-2 uppercase text-sm">Daftar Sekarang →</a>
                </div>

                <!-- Program 3 -->
                <div class="bg-white p-8 rounded-[32px] border border-slate-100 hover:shadow-2xl transition-all group">
                    <!-- SLOT GAMBAR PROGRAM 3 -->
                    <div class="h-40 bg-slate-100 rounded-2xl mb-6 flex items-center justify-center text-slate-400">
                        <i data-lucide="briefcase" class="w-10 h-10"></i>
                        <!-- <img src="URL_GAMBAR_BUSINESS" class="w-full h-full object-cover"> -->
                    </div>
                    <h3 class="text-2xl font-bold text-fiesphere-blue mb-4">Business English</h3>
                    <p class="text-slate-500 mb-6">Materi khusus untuk dunia kerja: presentasi, negosiasi, dan penulisan email profesional.</p>
                    <a href="#register" class="text-fiesphere-blue font-bold flex items-center gap-2 group-hover:gap-4 transition-all uppercase text-sm">Pelajari Selengkapnya →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- NEW & IMPROVED: Poster Section (Horizontal Slider) -->
    <section id="announcement" class="py-24 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-6">
            <div class="max-w-xl">
                <h2 class="text-4xl font-extrabold text-fiesphere-blue mb-4">Promo & Event Mendatang</h2>
                <p class="text-slate-500">Gulir ke samping untuk melihat berbagai penawaran menarik kami. Klik untuk memperbesar.</p>
            </div>
            
            <div class="hidden md:flex gap-3">
                <button id="posterPrev" class="bg-white p-4 rounded-full shadow-lg border border-slate-100 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all">
                    <i data-lucide="chevron-left"></i>
                </button>
                <button id="posterNext" class="bg-white p-4 rounded-full shadow-lg border border-slate-100 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all">
                    <i data-lucide="chevron-right"></i>
                </button>
            </div>
        </div>
        
        <div id="posterSlider" class="flex overflow-x-auto gap-6 pb-12 snap-x snap-mandatory scrollbar-hide scroll-smooth">
            @forelse($promos as $promo)
                <div class="min-w-[85%] md:min-w-[45%] lg:min-w-[35%] snap-center">
                    <div class="relative group cursor-pointer overflow-hidden rounded-[40px] shadow-xl border-4 border-fiesphere-blue" onclick="openPoster(this)">
                        <div class="bg-slate-100 aspect-[4/5] relative">
                            {{-- Panggil gambar dari storage Laravel --}}
                            <img src="{{ asset('storage/' . $promo->image_path) }}" class="absolute inset-0 w-full h-full object-cover" alt="{{ $promo->title }}">
                            
                            <div class="absolute inset-0 bg-fiesphere-blue/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                <i data-lucide="maximize-2" class="text-white w-10 h-10"></i>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan kalau admin belum upload promo sama sekali --}}
                <div class="w-full py-20 text-center border-2 border-dashed border-slate-200 rounded-[40px]">
                    <p class="text-slate-400 italic">Belum ada promo atau event aktif saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>