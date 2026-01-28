<x-app>
    <div class="mb-6">
        <flux:heading size="xl">Edit Paket: {{ $program->title }}</flux:heading>
    </div>

    <flux:card>
        <form action="{{ route('admin.program.update', $program->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT') <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <flux:input label="Judul Paket" name="title" value="{{ old('title', $program->title) }}" required />
                <flux:input label="Harga" name="price" value="{{ old('price', $program->price) }}" required />
            </div>

            <div class="space-y-3">
                <flux:label>Poin Fitur (Edit/Tambah Sesuka Hati)</flux:label>
                <div id="feature-list" class="space-y-3">
                    @foreach($program->features as $feature)
                        <div class="flex gap-2 feature-item">
                            <flux:input name="features[]" value="{{ $feature }}" class="flex-1" required />
                            <flux:button type="button" variant="ghost" icon="trash" class="remove-feature text-red-500" />
                        </div>
                    @endforeach
                </div>
                <flux:button type="button" variant="filled" size="sm" icon="plus" id="add-feature">
                    Tambah Poin Lagi
                </flux:button>
            </div>

            <flux:checkbox label="Jadikan Rekomendasi (Warna Biru)" name="is_featured" :checked="$program->is_featured" />

            <div class="flex gap-2 pt-4">
                <flux:button type="submit" variant="primary">Update Paket</flux:button>
                <flux:button href="{{ route('admin.program.index') }}" variant="ghost">Batal</flux:button>
            </div>
        </form>
    </flux:card>

    <script>
        // Gunakan logika JS yang sama dengan Create untuk menambah baris
        document.getElementById('add-feature').addEventListener('click', function() {
            const list = document.getElementById('feature-list');
            const newItem = document.querySelector('.feature-item').cloneNode(true);
            newItem.querySelector('input').value = '';
            newItem.querySelector('.remove-feature').addEventListener('click', function() {
                newItem.remove();
            });
            list.appendChild(newItem);
        });

        // Aktifkan tombol hapus untuk data yang sudah ada
        document.querySelectorAll('.remove-feature').forEach(btn => {
            btn.addEventListener('click', function() {
                if (document.querySelectorAll('.feature-item').length > 1) {
                    this.closest('.feature-item').remove();
                } else {
                    alert('Minimal harus ada satu fitur, bro.');
                }
            });
        });
    </script>
</x-app>