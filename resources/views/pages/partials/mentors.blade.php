<section id="mentors" class="py-20 bg-white overflow-hidden">
    <div class="container mx-auto px-6">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
            <div class="text-center md:text-left">
                <h4 class="text-fiesphere-yellow font-extrabold tracking-widest uppercase text-xs mb-2">Our Mentors</h4>
                <h2 class="text-3xl font-extrabold text-fiesphere-blue">Para Ahli di Fiesphere</h2>
            </div>
            
            <div class="flex gap-2">
                <button id="mentorPrev" class="bg-slate-50 p-3 rounded-full border border-slate-100 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all">
                    <i data-lucide="chevron-left" class="w-5 h-5"></i>
                </button>
                <button id="mentorNext" class="bg-slate-50 p-3 rounded-full border border-slate-100 text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all">
                    <i data-lucide="chevron-right" class="w-5 h-5"></i>
                </button>
            </div>
        </div>

        <div class="relative overflow-hidden py-4">
            <div id="mentorTrack" class="flex transition-transform duration-500 ease-out">
                {{-- Mentor Card 1 --}}
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[25%] px-2">
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                        <div class="aspect-square relative bg-slate-100 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Zaka+Al&background=1e3a8a&color=fff" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-5 text-center">
                            <h5 class="font-bold text-fiesphere-blue text-sm uppercase tracking-tight truncate">Ananda Zaka</h5>
                            <p class="text-fiesphere-yellow font-bold text-[10px] uppercase mt-1">Lead Instructor</p>
                        </div>
                    </div>
                </div>

                {{-- Mentor Card 2 --}}
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[25%] px-2">
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                        <div class="aspect-square relative bg-slate-100 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Sam+Bridges&background=fbbf24&color=1e3a8a" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-5 text-center">
                            <h5 class="font-bold text-fiesphere-blue text-sm uppercase tracking-tight truncate">Sam Bridges</h5>
                            <p class="text-fiesphere-yellow font-bold text-[10px] uppercase mt-1">Speaking Expert</p>
                        </div>
                    </div>
                </div>

                {{-- Mentor Card 3 --}}
                <div class="min-w-full sm:min-w-[50%] lg:min-w-[25%] px-2">
                    <div class="bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-300 group overflow-hidden">
                        <div class="aspect-square relative bg-slate-100 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Jon+Bellion&background=1e3a8a&color=fff" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        </div>
                        <div class="p-5 text-center">
                            <h5 class="font-bold text-fiesphere-blue text-sm uppercase tracking-tight truncate">Jon Bellion</h5>
                            <p class="text-fiesphere-yellow font-bold text-[10px] uppercase mt-1">Creative Coach</p>
                        </div>
                    </div>
                </div>

                {{-- Tambahin mentor 4, 5 dst supaya efek slide-nya kelihatan --}}
            </div>
        </div>
    </div>
</section>