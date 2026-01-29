<x-app>
    <flux:heading size="xl">Edit Promo</flux:heading>
    
    <flux:card class="mt-6">
        <form action="{{ route('admin.promo.update', $promo->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf @method('PUT')
            <flux:input label="Judul Promo" name="title" value="{{ old('title', $promo->title) }}" required />
            
            <div class="space-y-2">
                <flux:label>Ganti Gambar (Kosongkan jika tidak ingin ganti)</flux:label>
                <div class="mb-4 w-32 aspect-[4/5] rounded-lg overflow-hidden border border-zinc-700">
                    <img src="{{ asset('storage/' . $promo->image_path) }}" class="w-full h-full object-cover">
                </div>
                <input type="file" name="image" class="w-full text-sm text-zinc-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-zinc-800 file:text-white">
            </div>

            <div class="flex gap-2">
                <flux:button type="submit" variant="primary">Update Poster</flux:button>
                <flux:button href="{{ route('admin.promo.index') }}" variant="ghost">Batal</flux:button>
            </div>
        </form>
    </flux:card>
</x-app>