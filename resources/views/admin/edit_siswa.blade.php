<x-app>
    <div class="mb-6">
        <flux:heading size="xl">Edit Profil Siswa</flux:heading>
        <flux:subheading>Perbarui data lengkap siswa sesuai dokumen pendaftaran terbaru.</flux:subheading>
    </div>

    <flux:card>
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border border-red-200">
                <ul class="list-disc ml-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.siswa.update', $student->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Identitas Utama --}}
                <flux:input label="Nama Lengkap" name="name" value="{{ old('name', $student->name) }}" required />
                <flux:input label="Nama Panggilan" name="nickname" value="{{ old('nickname', $student->nickname) }}" required />
                
                <flux:input label="Email" type="email" name="email" value="{{ old('email', $student->email) }}" required />
                <flux:input label="WhatsApp" name="whatsapp" value="{{ old('whatsapp', $student->whatsapp) }}" required />
                
                <flux:select label="Jenis Kelamin" name="gender">
                    <option value="L" {{ old('gender', $student->gender) == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                    <option value="P" {{ old('gender', $student->gender) == 'P' ? 'selected' : '' }}>Perempuan</option>
                </flux:select>
                
                <flux:input label="Tanggal Lahir" type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" required />
            </div>

            <flux:textarea label="Alamat Lengkap" name="address" required>{{ old('address', $student->address) }}</flux:textarea>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                {{-- Akademik --}}
                <flux:select label="Jenjang Pendidikan" name="education">
                    <option value="SD (Kelas 4-6)" {{ old('education', $student->education) == 'SD (Kelas 4-6)' ? 'selected' : '' }}>SD (Kelas 4-6)</option>
                    <option value="SMP/MTs" {{ old('education', $student->education) == 'SMP/MTs' ? 'selected' : '' }}>SMP/MTs</option>
                    <option value="SMA/MA/SMK" {{ old('education', $student->education) == 'SMA/MA/SMK' ? 'selected' : '' }}>SMA/MA/SMK</option>
                    <option value="Mahasiswa/Umum" {{ old('education', $student->education) == 'Mahasiswa/Umum' ? 'selected' : '' }}>Mahasiswa/Umum</option>
                </flux:select>

                <flux:select label="Program" name="program">
                    <option value="Reguler 2 Minggu" {{ old('program', $student->program) == 'Reguler 2 Minggu' ? 'selected' : '' }}>Reguler 2 Minggu</option>
                    <option value="Reguler 1 Bulan" {{ old('program', $student->program) == 'Reguler 1 Bulan' ? 'selected' : '' }}>Reguler 1 Bulan</option>
                    <option value="Weekend 1 Bulan" {{ old('program', $student->program) == 'Weekend 1 Bulan' ? 'selected' : '' }}>Weekend 1 Bulan</option>
                    {{-- Tambahkan opsi lain sesuai kebutuhan --}}
                </flux:select>

                <flux:select label="Jadwal" name="schedule">
                    <option value="16:30" {{ old('schedule', $student->schedule) == '16:30' ? 'selected' : '' }}>16:30 WIB</option>
                    <option value="18:30" {{ old('schedule', $student->schedule) == '18:30' ? 'selected' : '' }}>18:30 WIB</option>
                </flux:select>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- {{-- Lain-lain --}}
                <flux:select label="Ukuran Kaos" name="shirt_size">
                    <option value="S" {{ old('shirt_size', $student->shirt_size) == 'S' ? 'selected' : '' }}>S</option>
                    <option value="M" {{ old('shirt_size', $student->shirt_size) == 'M' ? 'selected' : '' }}>M</option>
                    <option value="L" {{ old('shirt_size', $student->shirt_size) == 'L' ? 'selected' : '' }}>L</option>
                    <option value="XL" {{ old('shirt_size', $student->shirt_size) == 'XL' ? 'selected' : '' }}>XL</option>
                    <option value="XXL" {{ old('shirt_size', $student->shirt_size) == 'XXL' ? 'selected' : '' }}>XXL</option>
                </flux:select> -->

                <flux:select label="Jenis Kelas" name="class_type">
                    <option value="online" {{ old('class_type', $student->class_type) == 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ old('class_type', $student->class_type) == 'offline' ? 'selected' : '' }}>Offline</option>
                </flux:select>

                <flux:select label="Sumber Info" name="source">
                    <option value="Instagram" {{ old('source', $student->source) == 'Instagram' ? 'selected' : '' }}>Instagram</option>
                    <option value="TikTok" {{ old('source', $student->source) == 'TikTok' ? 'selected' : '' }}>TikTok</option>
                    <option value="Teman" {{ old('source', $student->source) == 'Teman' ? 'selected' : '' }}>Teman</option>
                </flux:select>

                <flux:select label="Status Keaktifan" name="status">
                    <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="enrolled" {{ old('status', $student->status) == 'enrolled' ? 'selected' : '' }}>Enrolled</option>
                    <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </flux:select>
            </div>

            <div class="flex gap-2 pt-4">
                <flux:button type="submit" variant="primary">Simpan Perubahan</flux:button>
                <flux:button variant="ghost" href="{{ route('admin.siswa') }}">Batal</flux:button>
            </div>
        </form>
    </flux:card>
</x-app>