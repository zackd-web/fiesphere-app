<section id="mentors" class="py-24 bg-fiesphere-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6">
            <div class="max-w-2xl">
                <h4 class="text-fiesphere-yellow font-extrabold tracking-widest uppercase text-sm mb-2">Expert Tutors</h4>
                <h2 class="text-4xl font-extrabold text-fiesphere-blue">Belajar dari yang Terbaik</h2>
                <p class="text-slate-500 mt-4 text-lg">Mentor kami bukan cuma jago teori, tapi punya skor resmi internasional dan pengalaman bertahun-tahun di Kampung Inggris.</p>
            </div>
        </div>

        <div class="relative overflow-hidden py-6">
            <div id="mentorTrack" class="flex transition-transform duration-700 cubic-bezier(0.4, 0, 0.2, 1)">
                
                @forelse($mentors as $mentor)
                    <div class="w-full sm:w-1/2 lg:w-1/4 px-3 shrink-0">
                        <div class="bg-white rounded-4xl border border-slate-400 shadow-sm hover:shadow-2xl transition-all duration-500 group overflow-hidden flex flex-col h-full">
                            <div class="aspect-square relative bg-slate-100 overflow-hidden">
                                {{-- Badge Keahlian --}}
                                <div class="absolute top-4 left-4 z-20 bg-fiesphere-yellow text-fiesphere-blue px-3 py-1 rounded-full text-[13px] font-black uppercase tracking-tighter shadow-lg">
                                    {{ $mentor->expertise_badge }}
                                </div>
                                <img
                                    src="{{ asset('storage/' . $mentor->photo_path) }}"
                                    alt="{{ $mentor->name }}"
                                    class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700"
                                >
                            </div>
                            <div class="p-6 text-center border-t-4 border-fiesphere-blue">
                                <h5 class="font-black text-fiesphere-blue text-lg uppercase leading-tight truncate">{{ $mentor->name }}</h5>
                                <p class="text-slate-400 font-bold text-[10px] uppercase tracking-widest mt-1">{{ $mentor->specialization }}</p>

                                <div class="mt-4 flex flex-wrap justify-center gap-2">
                                    @foreach($mentor->tags as $tag)
                                        <span class="bg-fiesphere-white text-slate-500 text-[15px] font-bold px-2 py-1 rounded-md border border-slate-300 max-w-full truncate">
                                            {{ $tag }}
                                        </span>
                                    @endforeach
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

        <div class="flex justify-center items-center gap-4 mt-10">
            <button id="mentorPrev" class="bg-white p-4 rounded-full border border-slate-300 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all group">
                <i data-lucide="chevron-left" class="group-hover:scale-110 transition-transform"></i>
            </button>
            <button id="mentorNext" class="bg-white p-4 rounded-full border border-slate-300 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all group">
                <i data-lucide="chevron-right" class="group-hover:scale-110 transition-transform"></i>
            </button>
        </div>
    </div>
</section>