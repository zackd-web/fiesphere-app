<section id="register" class="py-24 bg-slate-50">
    {{-- MODAL BERHASIL (Success Modal) --}}
    @if(session('success'))
    <div id="successModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-fiesphere-blue/60 backdrop-blur-sm transition-all">
        <div class="bg-white rounded-[40px] max-w-md w-full p-10 text-center shadow-2xl border-4 border-fiesphere-yellow transform animate-in fade-in zoom-in duration-300">
            <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-green-100">
                <i data-lucide="check-circle" class="text-green-500 w-14 h-14"></i>
            </div>
            
            <h3 class="text-3xl font-black text-fiesphere-blue mb-3">Terima Kasih!</h3>
            <p class="text-slate-600 leading-relaxed mb-8">
                {{ session('success') }}
            </p>

            <button onclick="closeSuccessModal()" class="w-full py-4 bg-fiesphere-yellow text-fiesphere-blue font-black rounded-2xl hover:bg-[#f0c400] transition-all shadow-lg shadow-fiesphere-yellow/20 uppercase tracking-widest text-sm">
                Sip, Mengerti
            </button>
        </div>
    </div>
    <script>
        function closeSuccessModal() {
            const modal = document.getElementById('successModal');
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        // Kunci scroll saat modal muncul
        document.body.style.overflow = 'hidden';
    </script>
    @endif

    <div class="container mx-auto px-6">
        <div class="max-w-6xl mx-auto bg-fiesphere-blue rounded-[40px] overflow-hidden shadow-2xl flex flex-col lg:flex-row">
            
            {{-- Sidebar Info (Kiri) --}}
            <div class="p-12 lg:w-1/3 text-white space-y-8 bg-pattern flex flex-col justify-center border-b lg:border-b-0 lg:border-r border-blue-400/20">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold leading-tight">Mulai Perjalananmu di <span class="text-fiesphere-yellow">FSEC</span></h2>
                    <p class="text-blue-100 leading-relaxed">Dapatkan pengalaman belajar yang fleksibel dan terarah. Bergabunglah dengan ratusan siswa lainnya.</p>
                </div>
                
                <ul class="space-y-5">
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-fiesphere-yellow/20 flex items-center justify-center">
                            <i data-lucide="check-circle" class="text-fiesphere-yellow w-5 h-5"></i>
                        </div>
                        <span class="font-medium">Konsultasi Level Gratis</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-fiesphere-yellow/20 flex items-center justify-center">
                            <i data-lucide="check-circle" class="text-fiesphere-yellow w-5 h-5"></i>
                        </div>
                        <span class="font-medium">Sertifikat Resmi</span>
                    </li>
                    <li class="flex items-center gap-4">
                        <div class="w-8 h-8 rounded-full bg-fiesphere-yellow/20 flex items-center justify-center">
                            <i data-lucide="check-circle" class="text-fiesphere-yellow w-5 h-5"></i>
                        </div>
                        <span class="font-medium">Akses LMS 24/7</span>
                    </li>
                </ul>
            </div>

            {{-- Form Section (Kanan) --}}
            <div class="p-8 md:p-12 lg:w-2/3 bg-white">
                {{-- Bagian Error tetap di sini agar user tahu apa yang salah sebelum kirim --}}
                @if ($errors->any())
                    <div class="p-4 mb-6 text-sm text-red-800 rounded-2xl bg-red-50 border border-red-100" role="alert">
                        <p class="font-bold mb-2 text-lg">⚠️ Pendaftaran Belum Lengkap:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('fsec.register.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    {{-- Baris 1: Email & Nama --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Email Aktif</label>
                            <input type="email" name="email" placeholder="nama@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-fiesphere-blue/10 focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Nama Lengkap</label>
                            <input type="text" name="name" placeholder="Ananda Zaka Al-Izza" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-2 focus:ring-fiesphere-blue/10 focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    {{-- Baris 2: Nickname & WhatsApp --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Nama Panggilan</label>
                            <input type="text" name="nickname" placeholder="Zaka" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">WhatsApp</label>
                            <input type="tel" name="whatsapp" placeholder="08123456789" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    {{-- Baris 3: Gender & Birth Date --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Jenis Kelamin</label>
                            <select name="gender" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue appearance-none">
                                <option value="L">Laki-Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Tanggal Lahir</label>
                            <input type="date" name="birth_date" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    {{-- Baris 4: Address --}}
                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Alamat Lengkap</label>
                        <textarea name="address" rows="2" placeholder="Tuliskan alamat domisili saat ini..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required></textarea>
                    </div>

                    {{-- Baris 5: Education & Program --}}
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Jenjang Pendidikan</label>
                            <select name="education" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue" required>
                                <option value="">Pilih Jenjang...</option>
                                <option>SD (Kelas 4-6)</option>
                                <option>SMP/MTs</option>
                                <option>SMA/MA/SMK</option>
                                <option>Mahasiswa/Umum</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Program Pilihan</label>
                            <select name="program" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue" required>
                                <option value="">Pilih Program...</option>
                                <optgroup label="Reguler">
                                    <option>Reguler 2 Minggu</option>
                                    <option>Reguler 1 Bulan</option>
                                    <option>Reguler 2 Bulan</option>
                                </optgroup>
                                <optgroup label="Weekend">
                                    <option>Weekend 2 Minggu</option>
                                    <option>Weekend 1 Bulan</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>

                    {{-- Baris 6: Schedule, Shirt, Source --}}
                    <div class="grid md:grid-cols-3 gap-4 border-t border-slate-100 pt-4">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Jadwal Kelas</label>
                            <div class="flex flex-col gap-2 mt-2">
                                <label class=" flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="schedule" value="16:30" class="accent-fiesphere-blue" required> 16:30</label>
                                <label class="flex items-center gap-2 text-sm cursor-pointer"><input type="radio" name="schedule" value="18:30" class="accent-fiesphere-blue" required> 18:30</label>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Ukuran Kaos</label>
                            <select name="shirt_size" class="w-full px-2 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm" required>
                                <option value="">Pilih...</option>
                                <option>S</option><option>M</option><option>L</option><option>XL</option><option>XXL</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Sumber Informasi</label>
                            <select name="source" class="w-full px-2 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm" required>
                                <option value="">Pilih...</option>
                                <option>Instagram</option><option>TikTok</option><option>Teman</option><option>Lainnya</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-fiesphere-yellow text-fiesphere-blue font-black rounded-2xl hover:bg-[#f0c400] transition-all shadow-lg text-lg uppercase tracking-widest mt-4">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>