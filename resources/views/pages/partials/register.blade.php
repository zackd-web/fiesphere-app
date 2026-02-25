<section id="register" class="py-24 bg-fiepshere-white">
    {{-- MODAL BERHASIL (Success Modal) --}}
    @if(session('success'))
    <div id="successModal" class="fixed inset-0 z-[100] flex items-center justify-center p-4 bg-fiesphere-blue/60 backdrop-blur-sm transition-all">
        <div class="bg-white rounded-[40px] max-w-md w-full p-10 text-center shadow-2xl border-4 border-fiesphere-yellow transform animate-in fade-in zoom-in duration-300">
            <div class="w-24 h-24 bg-green-50 rounded-full flex items-center justify-center mx-auto mb-6 border-4 border-green-100">
                <i data-lucide="check-circle" class="text-green-500 w-14 h-14"></i>
            </div>
            <h3 class="text-3xl font-black text-fiesphere-blue mb-3">Terima Kasih!</h3>
            <p class="text-slate-600 leading-relaxed mb-8">{{ session('success') }}</p>
            <button onclick="closeSuccessModal()" class="w-full py-4 bg-fiesphere-yellow text-fiesphere-blue font-black rounded-2xl hover:bg-[#f0c400] transition-all shadow-lg uppercase tracking-widest text-sm">
                Sip, Mengerti
            </button>
        </div>
    </div>
    <script>
        function closeSuccessModal() {
            document.getElementById('successModal').classList.add('hidden');
            document.body.style.overflow = 'auto';
        }
        document.body.style.overflow = 'hidden';
    </script>
    @endif

    <div class="container mx-auto px-3">
        <div class="text-center mb-16 space-y-4">
            <h2 class="text-4xl font-extrabold text-fiesphere-blue">Ayo Daftar Sekarang</h2>
        </div>
        <div class="max-w-6xl mx-auto bg-fiesphere-blue rounded-[40px] overflow-hidden shadow-2xl flex flex-col lg:flex-row">
            {{-- Sidebar Info --}}
            <div class="p-12 lg:w-1/3 text-white space-y-8 bg-pattern flex flex-col justify-center border-b lg:border-b-0 lg:border-r border-blue-400/20">
                <div class="space-y-4">
                    <h2 class="text-4xl font-bold leading-tight">Mulai Perjalananmu di <span class="text-fiesphere-yellow">FSEC</span></h2>
                    <p class="text-blue-100 leading-relaxed">Dapatkan pengalaman belajar yang fleksibel dan terarah. Bergabunglah dengan ratusan siswa lainnya.</p>
                </div>
            </div>

            {{-- Form Section --}}
            <div class="p-8 md:p-12 lg:w-2/3 bg-white">
                @if ($errors->any())
                    <div class="p-4 mb-6 text-sm text-red-800 rounded-2xl bg-red-50 border border-red-100">
                        <p class="font-bold mb-2 text-lg">⚠️ Pendaftaran Belum Lengkap:</p>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('fsec.register.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Email Aktif</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="nama@email.com" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Ananda Zaka Al-Izza" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Nama Panggilan</label>
                            <input type="text" name="nickname" value="{{ old('nickname') }}" placeholder="Zaka" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">WhatsApp</label>
                            <input type="tel" name="whatsapp" value="{{ old('whatsapp') }}" placeholder="08123456789" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Jenis Kelamin</label>
                            <select name="gender" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue">
                                <option value="L" {{ old('gender') == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                <option value="P" {{ old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Tanggal Lahir</label>
                            <input type="date" name="birth_date" value="{{ old('birth_date') }}" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>
                        </div>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Alamat Lengkap</label>
                        <textarea name="address" rows="2" placeholder="Domisili saat ini..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all" required>{{ old('address') }}</textarea>
                    </div>

                    <div class="space-y-1">
                        <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Asal Sekolah</label>
                        <input type="text" name="school_origin" value="{{ old('school_origin') }}" placeholder="Sekolah Asal..." class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl focus:border-fiesphere-blue outline-none transition-all">
                    </div>


                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Jenjang Pendidikan</label>
                            <select name="education" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue" required>
                                <option value="">Pilih...</option>
                                <option value="SD" {{ old('education') == 'SD' ? 'selected' : '' }}>SD</option>
                                <option value="SMP" {{ old('education') == 'SMP' ? 'selected' : '' }}>SMP</option>
                                <option value="SMA" {{ old('education') == 'SMA' ? 'selected' : '' }}>SMA</option>
                                <option value="Umum" {{ old('education') == 'Umum' ? 'selected' : '' }}>Umum</option>
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-xs font-bold text-slate-500 uppercase tracking-wider ml-1">Program Pilihan</label>
                            <select name = "pricing_id" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-2xl outline-none focus:border-fiesphere-blue" required>
                                <option value="">Pilih...</option>
                                @foreach($pricings as $pricing)
                                    <option value="{{ $pricing->id }}">{{ $pricing->title }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-4 border-t border-slate-100 pt-4">
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Jadwal</label>
                            <div class="flex flex-col gap-2 mt-2">
                                <label class="flex items-center gap-2 text-sm cursor-pointer">
                                    @foreach($schedules as $schedule) 
                                        <input type="radio" name="schedule_id" value="{{ $schedule->id }}">
                                        {{ $schedule->time_range }}
                                    @endforeach
                                </label>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Jenis Kelas</label>
                            <select name="class_type" class="w-full px-2 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm" required>
                                <option value="">Pilih...</option>
                                @foreach(['online', 'offline'] as $type)
                                    <option value="{{ $type }}" {{ old('class_type') == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-1">
                            <label class="text-[10px] font-black text-slate-400 uppercase tracking-tighter">Sumber Info</label>
                            <select name="source" class="w-full px-2 py-2 bg-slate-50 border border-slate-200 rounded-xl text-sm" required>
                                <option value="">Pilih...</option>
                                <option value="IG" {{ old('source') == 'IG' ? 'selected' : '' }}>Instagram</option>
                                <option value="TikTok" {{ old('source') == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="w-full py-4 bg-fiesphere-yellow text-fiesphere-blue font-black rounded-2xl hover:bg-[#f0c400] shadow-lg text-lg uppercase tracking-widest mt-4">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>

    
</section>