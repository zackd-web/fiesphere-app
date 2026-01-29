<x-app>
    <div class="flex justify-between items-center mb-6">
        <div>
            <flux:heading size="xl">Manajemen Promo & Event</flux:heading>
            <flux:subheading>Daftar poster yang tampil di slider landing page.</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.promo.create') }}" variant="primary" icon="plus">Upload Poster</flux:button>
    </div>

    <div class="grid grid-cols-3 md:grid-cols-3 lg:grid-cols-3 gap-6">
        @foreach($promos as $item)
            <flux:card class="p-0 overflow-hidden group">
                <div class="aspect-video relative relative bg-zinc-900">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="w-full h-full object-cover opacity-80 group-hover:opacity-100 transition-opacity">
                    <div class="absolute bottom-0 left-0 w-full p-4 bg-gradient-to-t from-black/80 to-transparent">
                        <p class="text-white font-bold truncate">{{ $item->title }}</p>
                    </div>
                </div>
                <div class="p-4 flex justify-end gap-1">
                    <flux:button size="sm" variant="ghost" href="{{ route('admin.promo.edit', $item->id) }}" icon="pencil-square">Edit</flux:button>
                    
                    <flux:modal.trigger name="delete-{{ $item->id }}">
                        <flux:button size="sm" variant="ghost" color="red" icon="trash" />
                    </flux:modal.trigger>
                </div>
            </flux:card>

            <flux:modal name="delete-{{ $item->id }}" class="max-w-md space-y-6">
                <form action="{{ route('admin.promo.destroy', $item->id) }}" method="POST">
                    @csrf @method('DELETE')
                    <div class="text-center">
                        <flux:heading size="lg">Hapus Poster Ini?</flux:heading>
                        <p class="text-zinc-400 mt-2">Poster "{{ $item->title }}" bakal ilang selamanya dari slider.</p>
                    </div>
                    <div class="flex gap-2">
                        <flux:modal.close class="flex-1"><flux:button variant="ghost" class="w-full">Batal</flux:button></flux:modal.close>
                        <flux:button type="submit" variant="danger" class="flex-1">Hapus</flux:button>
                    </div>
                </form>
            </flux:modal>
        @endforeach
    </div>
</x-app>