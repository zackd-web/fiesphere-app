<section id="about" class="py-24 bg-fiesphere-light">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <div class="grid grid-cols-2 gap-4">
                    <div class="img-slot h-64 rounded-3xl mt-12 shadow-lg">
                        <i data-lucide="image" class="w-8 h-8 text-slate-400 absolute"></i>
                        <!-- <img src="URL_TENTANG_1"> -->
                    </div>
                    <div class="img-slot h-64 rounded-3xl shadow-lg">
                        <i data-lucide="image" class="w-8 h-8 text-slate-400 absolute"></i>
                        <!-- <img src="URL_TENTANG_2"> -->
                    </div>
                </div>
                <div class="space-y-6">
                    <h4 class="text-fiesphere-yellow font-extrabold tracking-widest uppercase text-sm">About Fiesphere</h4>
                    <h2 class="text-4xl font-extrabold text-fiesphere-blue leading-tight">Membangun Kepercayaan Diri Lewat Bahasa Inggris</h2>
                    <p class="text-slate-500 leading-relaxed text-lg">Bingung? cari kursus bahasa inggris di kudus ?</p>
                    <p class="text-slate-500 leading-relaxed text-lg">
                        Fiesphere bukan sekadar kursus biasa. Kami menggabungkan kurikulum berstandar internasional dengan pendekatan psikologi belajar yang menyenangkan. Fokus kami adalah memastikan setiap siswa tidak hanya mengerti tata bahasa, tapi berani berbicara.
                    </p>
                    <div class="grid grid-cols-2 gap-6 pt-4">
                        <div class="flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="text-fiesphere-yellow"></i>
                            <span class="font-bold text-slate-700">English Area</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="text-fiesphere-yellow"></i>
                            <span class="font-bold text-slate-700">Fun Learning</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="text-fiesphere-yellow"></i>
                            <span class="font-bold text-slate-700">Games Seru</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <i data-lucide="check-circle-2" class="text-fiesphere-yellow"></i>
                            <span class="font-bold text-slate-700">Banyak Praktek</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="facilities" class="py-24">
    <div class="container mx-auto px-6">
        <!-- Header Section -->
        <div class="flex flex-col lg:flex-row justify-between items-end mb-12 gap-8">
            <div class="max-w-xl">
                <h2 class="text-4xl font-extrabold text-fiesphere-blue mb-4">Fasilitas Premium</h2>
                <p class="text-slate-500">Kami memberikan kenyamanan maksimal untuk menunjang proses belajarmu baik di kelas maupun di rumah.</p>
            </div>
            <!-- Slot Gambar Utama (Gedung/Lobby) -->
            <div class="hidden lg:flex w-96 h-32 rounded-3xl shadow-md bg-slate-100 items-center justify-center relative overflow-hidden border border-slate-200">
                <i data-lucide="building-2" class="w-6 h-6 text-slate-400"></i>
                <!-- <img src="URL_UTAMA" class="w-full h-full object-cover"> -->
            </div>
        </div>

        <!-- Slider Fasilitas -->
        <div class="relative group mb-20">
            <!-- Navigation Buttons -->
            <button id="prevBtn" class="absolute left-[-20px] top-1/2 -translate-y-1/2 z-10 bg-white p-3 rounded-full shadow-xl text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all opacity-0 group-hover:opacity-100 hidden md:block border border-slate-100">
                <i data-lucide="chevron-left"></i>
            </button>
            <button id="nextBtn" class="absolute right-[-20px] top-1/2 -translate-y-1/2 z-10 bg-white p-3 rounded-full shadow-xl text-fiesphere-blue hover:bg-fiesphere-blue hover:text-white transition-all opacity-0 group-hover:opacity-100 hidden md:block border border-slate-100">
                <i data-lucide="chevron-right"></i>
            </button>

            <!-- Scroll Container -->
            <div id="sliderContainer" class="flex overflow-x-auto gap-6 pb-8 snap-x snap-mandatory scrollbar-hide scroll-smooth">
                <!-- Slot 1: Ruang Kelas -->
                <div class="min-w-[85%] md:min-w-[45%] lg:min-w-[30%] snap-center">
                    <div class="aspect-video bg-slate-100 rounded-3xl shadow-lg flex flex-col items-center justify-center border border-slate-200 overflow-hidden relative group/item transition-transform hover:scale-[1.02]">
                        <div class="text-center p-6">
                            <i data-lucide="image" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                            <span class="block text-sm font-bold text-slate-500 uppercase tracking-widest">Ruang Kelas</span>
                        </div>
                        <img src="4.png" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>

                <!-- Slot 2: Lounge -->
                <div class="min-w-[85%] md:min-w-[45%] lg:min-w-[30%] snap-center">
                    <div class="aspect-video bg-slate-100 rounded-3xl shadow-lg flex flex-col items-center justify-center border border-slate-200 overflow-hidden relative group/item transition-transform hover:scale-[1.02]">
                        <div class="text-center p-6">
                            <i data-lucide="image" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                            <span class="block text-sm font-bold text-slate-500 uppercase tracking-widest">Student Lounge</span>
                        </div>
                        <img src="5.png" class="absolute inset-0 w-full h-full object-cover">
                    </div>
                </div>

                <!-- Slot 3: Lab/CBT -->
                <div class="min-w-[85%] md:min-w-[45%] lg:min-w-[30%] snap-center">
                    <div class="aspect-video bg-slate-100 rounded-3xl shadow-lg flex flex-col items-center justify-center border border-slate-200 overflow-hidden relative group/item transition-transform hover:scale-[1.02]">
                        <div class="text-center p-6">
                            <i data-lucide="image" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                            <span class="block text-sm font-bold text-slate-500 uppercase tracking-widest">CBT Center</span>
                        </div>
                        <!-- <img src="URL_CBT" class="absolute inset-0 w-full h-full object-cover"> -->
                    </div>
                </div>

                <!-- Slot 4: Library -->
                <div class="min-w-[85%] md:min-w-[45%] lg:min-w-[30%] snap-center">
                    <div class="aspect-video bg-slate-100 rounded-3xl shadow-lg flex flex-col items-center justify-center border border-slate-200 overflow-hidden relative group/item transition-transform hover:scale-[1.02]">
                        <div class="text-center p-6">
                            <i data-lucide="image" class="w-10 h-10 text-slate-300 mx-auto mb-3"></i>
                            <span class="block text-sm font-bold text-slate-500 uppercase tracking-widest">Library Area</span>
                        </div>
                        <!-- <img src="URL_PERPUSTAKAAN" class="absolute inset-0 w-full h-full object-cover"> -->
                    </div>
                </div>
            </div>
            
            <!-- Mobile Indicator -->
            <div class="flex justify-center gap-2 mt-4 md:hidden">
                <div class="w-8 h-1 bg-fiesphere-blue rounded-full"></div>
                <div class="w-2 h-1 bg-slate-200 rounded-full"></div>
                <div class="w-2 h-1 bg-slate-200 rounded-full"></div>
            </div>
        </div>

        <!-- Detail Fasilitas (Ikon Grid) -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-12">
            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="air-vent"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Ruang Belajar Full AC</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="wifi"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">WiFi Internet Cepat</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="book-open"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Modul Belajar Lengkap</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="monitor"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Try Out Berbasis Komputer (CBT)</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="message-circle"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Konsultasi Akademik & KBM</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="clipboard-check"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Laporan Perkembangan Siswa</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="library"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Perpustakaan & Area Belajar</h5>
            </div>

            <div class="text-center p-2 space-y-4">
                <div class="w-16 h-16 bg-slate-100 text-fiesphere-blue rounded-full flex items-center justify-center mx-auto mb-4 border border-white shadow-sm">
                    <i data-lucide="droplet"></i>
                </div>
                <h5 class="font-extrabold text-fiesphere-blue text-sm uppercase leading-tight">Air Minum Gratis (Dispenser)</h5>
            </div>
        </div>
    </div>