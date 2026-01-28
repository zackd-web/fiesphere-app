<x-app>
    <div class="mb-6">
        <flux:heading size="xl">Edit Data Siswa</flux:heading>
        <flux:subheading>Pastikan data diperbarui sesuai dengan dokumen identitas siswa.</flux:subheading>
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

            <flux:input label="Nama Lengkap" name="name" value="{{ old('name', $student->name) }}" required />
            
            <flux:input label="WhatsApp" name="whatsapp" value="{{ old('whatsapp', $student->whatsapp) }}" required />
            
            <flux:select label="Metode Belajar" name="method">
                <option value="Online" {{ old('method', $student->method) == 'Online' ? 'selected' : '' }}>Online Class</option>
                <option value="Offline" {{ old('method', $student->method) == 'Offline' ? 'selected' : '' }}>Offline Class (Tatap Muka)</option>
            </flux:select>

            <flux:select label="Program" name="program">
                <option value="Speaking Class" {{ old('program', $student->program) == 'Speaking Class' ? 'selected' : '' }}>Speaking Class</option>
                <option value="IELTS/TOEFL Prep" {{ old('program', $student->program) == 'IELTS/TOEFL Prep' ? 'selected' : '' }}>IELTS/TOEFL Prep</option>
                <option value="Business English" {{ old('program', $student->program) == 'Business English' ? 'selected' : '' }}>Business English</option>
                <option value="Kids/Junior Program" {{ old('program', $student->program) == 'Kids/Junior Program' ? 'selected' : '' }}>Kids/Junior Program</option>
            </flux:select>

            <flux:select label="Status" name="status">
                <option value="pending" {{ old('status', $student->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="contacted" {{ old('status', $student->status) == 'contacted' ? 'selected' : '' }}>Contacted</option>
                <option value="enrolled" {{ old('status', $student->status) == 'enrolled' ? 'selected' : '' }}>Enrolled (Aktif)</option>
            </flux:select>

            <div class="flex gap-2">
                <flux:button type="submit" variant="primary">Simpan Perubahan</flux:button>
                <flux:button variant="ghost" href="{{ route('admin.siswa') }}">Batal</flux:button>
            </div>
        </form>
    </flux:card>
</x-app>