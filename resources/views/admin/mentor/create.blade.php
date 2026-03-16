<x-app>
    {{-- Header --}}
    <div class="flex items-center gap-4 mb-8">
        <flux:button variant="ghost" icon="arrow-left" href="{{ route('admin.mentor.index') }}" size="sm" />
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Tambah Mentor</flux:heading>
            <flux:subheading class="mt-1">Isi data mentor baru yang akan tampil di landing page.</flux:subheading>
        </div>
    </div>

    <form action="{{ route('admin.mentor.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Kolom Kiri: Foto --}}
            <div class="lg:col-span-1">
                <flux:card class="p-5 border-zinc-700/40 shadow-sm space-y-4">
                    <flux:heading size="sm" class="font-semibold">Foto Mentor</flux:heading>

                    {{-- Preview --}}
                    <div class="relative group">
                        <div id="photo-preview" class="w-full aspect-square rounded-xl overflow-hidden bg-zinc-100 dark:bg-zinc-800 flex items-center justify-center border-2 border-dashed border-zinc-300 dark:border-zinc-700 transition-colors">
                            <div id="preview-placeholder" class="flex flex-col items-center gap-2 text-zinc-400">
                                <flux:icon.camera class="h-10 w-10" />
                                <span class="text-xs text-center">Klik untuk upload foto</span>
                            </div>
                            <img id="preview-img" src="#" alt="Preview" class="hidden w-full h-full object-cover">
                        </div>

                        <input
                            type="file"
                            name="photo"
                            id="photo-input"
                            accept="image/*"
                            class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                            onchange="previewPhoto(this)"
                        >
                    </div>

                    @error('photo')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror

                    <flux:text size="xs" class="text-zinc-400 text-center">
                        Format: JPG, PNG. Maks 2MB.<br>Rasio terbaik: 1:1 (square)
                    </flux:text>
                </flux:card>
            </div>

            {{-- Kolom Kanan: Data --}}
            <div class="lg:col-span-2 space-y-5">

                {{-- Info Dasar --}}
                <flux:card class="p-5 border-zinc-700/40 shadow-sm space-y-5">
                    <flux:heading size="sm" class="font-semibold">Informasi Dasar</flux:heading>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="md:col-span-2">
                            <flux:field>
                                <flux:label>Nama Lengkap <span class="text-red-500">*</span></flux:label>
                                <flux:input
                                    name="name"
                                    placeholder="contoh: Ananda Zaka"
                                    value="{{ old('name') }}"
                                    required
                                />
                                @error('name')
                                    <flux:error>{{ $message }}</flux:error>
                                @enderror
                            </flux:field>
                        </div>

                        <div class="md:col-span-2">
                            <flux:field>
                                <flux:label>Spesialisasi <span class="text-red-500">*</span></flux:label>
                                <flux:input
                                    name="specialization"
                                    placeholder="contoh: Grammar & Structure Master"
                                    value="{{ old('specialization') }}"
                                    required
                                />
                                @error('specialization')
                                    <flux:error>{{ $message }}</flux:error>
                                @enderror
                            </flux:field>
                        </div>

                        <div>
                            <flux:field>
                                <flux:label>Badge Keahlian <span class="text-red-500">*</span></flux:label>
                                <flux:input
                                    name="expertise_badge"
                                    placeholder="contoh: IELTS 8.0 EXPERT"
                                    value="{{ old('expertise_badge') }}"
                                    required
                                />
                                <flux:description>Teks label kuning di pojok foto.</flux:description>
                                @error('expertise_badge')
                                    <flux:error>{{ $message }}</flux:error>
                                @enderror
                            </flux:field>
                        </div>

                        <div>
                            <flux:field>
                                <flux:label>Urutan Tampil</flux:label>
                                <flux:input
                                    type="number"
                                    name="order"
                                    placeholder="0"
                                    value="{{ old('order', 0) }}"
                                    min="0"
                                />
                                <flux:description>Angka kecil tampil lebih dulu.</flux:description>
                                @error('order')
                                    <flux:error>{{ $message }}</flux:error>
                                @enderror
                            </flux:field>
                        </div>
                    </div>
                </flux:card>

                {{-- Tags --}}
                <flux:card class="p-5 border-zinc-700/40 shadow-sm space-y-4">
                    <div>
                        <flux:heading size="sm" class="font-semibold">Tags Pengalaman</flux:heading>
                        <flux:text size="xs" class="text-zinc-400 mt-0.5">Contoh: Ex-Tutor Pare, TESOL Certified</flux:text>
                    </div>

                    <div id="tags-container" class="space-y-2">
                        @if(old('tags'))
                            @foreach(old('tags') as $tag)
                                <div class="flex items-center gap-2 tag-row">
                                    <flux:input name="tags[]" value="{{ $tag }}" placeholder="contoh: TESOL Certified" class="flex-1" />
                                    <flux:button type="button" variant="ghost" color="red" icon="x-mark" class="h-9 w-9 shrink-0" onclick="removeTag(this)" />
                                </div>
                            @endforeach
                        @else
                            <div class="flex items-center gap-2 tag-row">
                                <flux:input name="tags[]" placeholder="contoh: TESOL Certified" class="flex-1" />
                                <flux:button type="button" variant="ghost" color="red" icon="x-mark" class="h-9 w-9 shrink-0" onclick="removeTag(this)" />
                            </div>
                        @endif
                    </div>

                    <flux:button type="button" variant="subtle" icon="plus" size="sm" onclick="addTag()">
                        Tambah Tag
                    </flux:button>

                    @error('tags')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </flux:card>

                {{-- Status --}}
                <flux:card class="p-5 border-zinc-700/40 shadow-sm">
                    <div class="flex items-center justify-between">
                        <div>
                            <flux:heading size="sm" class="font-semibold">Status Tampil</flux:heading>
                            <flux:text size="xs" class="text-zinc-400 mt-0.5">Mentor aktif akan tampil di landing page.</flux:text>
                        </div>
                        <flux:switch name="is_active" value="1" :checked="old('is_active', true)" />
                    </div>
                </flux:card>

                {{-- Action Buttons --}}
                <div class="flex items-center justify-end gap-3 pb-6">
                    <flux:button variant="ghost" href="{{ route('admin.mentor.index') }}">Batal</flux:button>
                    <flux:button type="submit" variant="primary" icon="check">Simpan Mentor</flux:button>
                </div>

            </div>
        </div>
    </form>

    <script>
        function previewPhoto(input) {
            const file = input.files[0];
            if (!file) return;

            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('preview-img').classList.remove('hidden');
                document.getElementById('preview-placeholder').classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        function addTag() {
            const container = document.getElementById('tags-container');
            const row = document.createElement('div');
            row.className = 'flex items-center gap-2 tag-row';
            row.innerHTML = `
                <input type="text" name="tags[]" placeholder="contoh: TESOL Certified"
                    class="flex-1 px-3 py-2 text-sm rounded-lg border border-zinc-200 dark:border-zinc-700 bg-white dark:bg-zinc-800 text-zinc-800 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500" />
                <button type="button" onclick="removeTag(this)"
                    class="h-9 w-9 shrink-0 flex items-center justify-center rounded-lg text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            `;
            container.appendChild(row);
        }

        function removeTag(btn) {
            const rows = document.querySelectorAll('.tag-row');
            if (rows.length <= 1) return; // minimal 1 tag
            btn.closest('.tag-row').remove();
        }
    </script>
</x-app>
