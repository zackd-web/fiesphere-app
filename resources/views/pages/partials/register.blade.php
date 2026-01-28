<!-- Registration Form Section (NEW) -->
    <section id="register" class="py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-5xl mx-auto bg-fiesphere-blue rounded-[40px] overflow-hidden shadow-2xl flex flex-col md:flex-row">
                <div class="p-12 md:w-1/2 text-white space-y-8 bg-pattern">
                    <h2 class="text-4xl font-bold">Gabung Sekarang!</h2>
                    <p class="text-blue-100">Dapatkan pengalaman belajar yang fleksibel dan terarah. Bisa daftar kelas <b>Online</b> dari mana saja atau <b>Offline</b> di lokasi kami.</p>
                    <ul class="space-y-4">
                        <li class="flex items-center gap-3"><i data-lucide="check-circle" class="text-fiesphere-yellow"></i> Konsultasi Level Gratis</li>
                        <li class="flex items-center gap-3"><i data-lucide="check-circle" class="text-fiesphere-yellow"></i> Sertifikat Resmi</li>
                        <li class="flex items-center gap-3"><i data-lucide="check-circle" class="text-fiesphere-yellow"></i> Akses LMS 24/7</li>
                    </ul>
                </div>
                <div class="p-12 md:w-1/2 bg-white">
                    @if(session('success'))
                        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-fiesphere-blue mb-1">Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Contoh: Budi Santoso" value="{{ old('name') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:border-fiesphere-blue outline-none" required>
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-fiesphere-blue mb-1">No. WhatsApp</label>
                            <input type="tel" name="whatsapp" placeholder="0812xxxxxx" value="{{ old('whatsapp') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:border-fiesphere-blue outline-none" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-fiesphere-blue mb-1">Pilih Metode</label>
                            <select name="method" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none">
                                <option value="Online">Online Class (Zoom/Meet)</option>
                                <option value="Offline">Offline Class (Tatap Muka)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-fiesphere-blue mb-1">Program</label>
                            <select name="program" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl outline-none">
                                <option value="Speaking Class">Speaking Class</option>
                                <option value="IELTS/TOEFL Prep">IELTS/TOEFL Prep</option>
                                <option value="Business English">Business English</option>
                                <option value="Kids/Junior Program">Kids/Junior Program</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full py-4 bg-fiesphere-yellow text-fiesphere-blue font-bold rounded-xl hover:scale-[1.02] transition-transform shadow-lg">Kirim Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact & Map Section (NEW) -->
    <section class="py-24">
        <div class="container mx-auto px-6">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl font-bold text-fiesphere-blue">Kunjungi Kami</h2>
                    <p class="text-slate-500 leading-relaxed text-lg">
                        Ingin mendaftar secara <b>Offline</b>? Datang langsung ke kantor kami. Tim kami siap menyambutmu dengan kopi hangat dan konsultasi pendidikan gratis.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-fiesphere-blue text-fiesphere-yellow rounded-xl flex items-center justify-center shrink-0">
                                <i data-lucide="map-pin"></i>
                            </div>
                            <p class="font-semibold">Jl. Sudimoro, Sukoharjo, Gribig, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333</p>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-green-500 text-white rounded-xl flex items-center justify-center shrink-0">
                                <i data-lucide="phone"></i>
                            </div>
                            <p class="font-semibold">+628-5292-4095-45 (Admin WhatsApp)</p>
                        </div>
                    </div>
                    <!-- Sosmed Grid -->
                    <div class="flex gap-4">
                        <a href="https://www.instagram.com/fiesphere.english?igsh=OG1wNTZlc2I2N3F2&utm_source=qr" target="_blank" class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center hover:bg-fiesphere-yellow hover:text-fiesphere-blue transition-all" title="Instagram">
                            <i class="fab fa-instagram text-2xl"></i>
                        </a>
                        <a href="https://www.tiktok.com/@fiesphere.english?_t=ZS-8zLK1LGdHcd&_r=1" target="_blank" class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center hover:bg-fiesphere-yellow hover:text-fiesphere-blue transition-all" title="TikTok">
                             <i class="fab fa-tiktok text-2xl"></i>
                        </a>
                        <a href="https://wa.me/6285292409545"  target="_blank" class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center hover:bg-fiesphere-yellow hover:text-fiesphere-blue transition-all" title="WhatsApp">
                            <i class="fab fa-whatsapp text-2xl"></i>
                        </a>
                        <a href="https://maps.app.goo.gl/TBRCzPGAXJxzpPfw7?g_st=ipc"  target="_blank" class="w-14 h-14 bg-slate-100 rounded-2xl flex items-center justify-center hover:bg-fiesphere-yellow hover:text-fiesphere-blue transition-all" title="WhatsApp">
                            <i class="fas fa-map-location-dot text-2xl"></i>
                        </a>
                    </div>
                </div>
                <!-- Google Maps Slot -->
                <div class="h-[400px] bg-slate-200 rounded-[40px] overflow-hidden shadow-xl border border-slate-100 relative">
                    <!-- PASTE IFRAME GOOGLE MAPS ASLI DI SINI -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15847.389330158858!2d110.82584131262323!3d-6.788424944010168!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70dbf4fea1baf5%3A0x277e427f5bb6f4a5!2sFiesphere%20English%20Course!5e0!3m2!1sid!2sid!4v1769430316303!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </section>  