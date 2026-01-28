<x-app>
    <div class="mb-6">
        <flux:heading size="xl">Tambah Paket Baru</flux:heading>
    </div>

    <flux:card>
        <form action="{{ route('admin.program.store') }}" method="POST" class="space-y-6">
            @csrf
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <flux:input label="Judul Paket" name="title" placeholder="Contoh: Intensive Class" required />
                <flux:input label="Harga" name="price" placeholder="Contoh: 549k" required />
            </div>

            <div class="space-y-3">
                <flux:label>Poin Fitur (Input Sesuka Hati)</flux:label>
                <div id="feature-list" class="space-y-3">
                    <div class="flex gap-2 feature-item">
                        <flux:input name="features[]" placeholder="Contoh: 16x Pertemuan / Bulan" class="flex-1" required />
                        <flux:button type="button" variant="ghost" icon="trash" class="remove-feature" />
                    </div>
                </div>
                <flux:button type="button" variant="filled" size="sm" icon="plus" id="add-feature">
                    Tambah Poin Baru
                </flux:button>
            </div>

            <flux:separator variant="subtle" />

            <div class="flex items-center gap-4">
                <flux:checkbox label="Tampilkan sebagai Rekomendasi (Warna Biru)" name="is_featured" />
            </div>

            <div class="flex gap-2">
                <flux:button type="submit" variant="primary">Simpan Paket</flux:button>
                <flux:button href="{{ route('admin.program.index') }}" variant="ghost">Batal</flux:button>
            </div>
        </form>
    </flux:card>

    <script>
        // Logika Menambah Baris Fitur
        document.getElementById('add-feature').addEventListener('click', function() {
            const list = document.getElementById('feature-list');
            const newItem = document.querySelector('.feature-item').cloneNode(true);
            
            // Reset nilai input di baris baru
            const input = newItem.querySelector('input');
            input.value = '';
            
            // Aktifkan tombol hapus untuk baris baru
            const removeBtn = newItem.querySelector('.remove-feature');
            removeBtn.addEventListener('click', function() {
                if (document.querySelectorAll('.feature-item').length > 1) {
                    newItem.remove();
                }
            });

            list.appendChild(newItem);
        });

        // Inisialisasi tombol hapus untuk baris pertama
        document.querySelector('.remove-feature').addEventListener('click', function() {
            alert('Minimal harus ada satu poin fitur, bro.');
        });
    </script>
</x-app>