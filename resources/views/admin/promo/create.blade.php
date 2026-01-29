<x-app>
    <flux:heading size="xl">Upload Promo Baru</flux:heading>
    
    <flux:card class="mt-6">
        <form action="{{ route('admin.promo.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            <flux:input label="Judul/Nama Promo" name="title" required />
            
            <div class="space-y-2">
                <flux:label>File Gambar Poster (4:5 recommended)</flux:label>
                <input type="file" name="image" class="w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-fiesphere-blue file:text-white hover:file:bg-blue-700" required>
            </div>

            <flux:button type="submit" variant="primary">Upload Sekarang</flux:button>
        </form>
    </flux:card>
</x-app>