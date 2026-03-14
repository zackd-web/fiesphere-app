<x-app>
    {{-- Header --}}
    <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between md:mb-8">
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Manajemen Promo & Event</flux:heading>
            <flux:subheading class="mt-1">Daftar poster yang tampil di slider landing page.</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.promo.create') }}" variant="primary" icon="plus">
            Upload Poster
        </flux:button>
    </div>

    {{-- Grid Poster --}}
    @if($promos->isEmpty())
        <div class="flex flex-col items-center justify-center py-24 text-center">
            <div class="flex h-16 w-16 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 mb-4">
                <flux:icon.photo class="h-8 w-8 text-zinc-300" />
            </div>
            <flux:heading class="text-zinc-400 font-semibold">Belum ada poster</flux:heading>
            <flux:text size="sm" class="text-zinc-400 mt-1 mb-4">Upload poster pertama untuk ditampilkan di slider.</flux:text>
            <flux:button href="{{ route('admin.promo.create') }}" variant="primary" icon="plus" size="sm">
                Upload Poster
            </flux:button>
        </div>
    @else
        

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 md:gap-6">
        @foreach($promos as $item)
            <flux:card class="p-0 overflow-hidden group border-zinc-700/40 shadow-sm hover:shadow-lg transition-all duration-200 rounded-xl">

                {{-- Thumbnail --}}
                <div class="relative bg-zinc-900 overflow-hidden" style="aspect-ratio: 16/9;">
                    <img
                        src="{{ asset('storage/' . $item->image_path) }}"
                        alt="{{ $item->title }}"
                        class="w-full h-full object-cover opacity-85 group-hover:opacity-100 group-hover:scale-105 transition-all duration-300"
                    >
                    {{-- Gradient overlay --}}
                    <div class="absolute inset-0 bg-linear-to-t from-black/75 via-black/10 to-transparent"></div>

                    {{-- Title di dalam gambar --}}
                    <div class="absolute bottom-0 left-0 right-0 px-4 py-3">
                        <p class="text-white text-sm font-bold truncate leading-tight drop-shadow">{{ $item->title }}</p>
                    </div>

                    {{-- Action buttons overlay saat hover --}}
                    <div class="absolute top-2 right-2 flex gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-200  bg-zinc-700/40 dark:bg-zinc-300/20">
                        <flux:tooltip content="Edit poster">
                            <flux:button
                                size="sm"
                                variant="filled"
                                icon="pencil-square"
                                class="h-8 w-8 bg-white/90 hover:bg-white text-zinc-700 border-0 shadow-sm"
                                href="{{ route('admin.promo.edit', $item->id) }}"
                            />
                        </flux:tooltip>
                        <flux:tooltip content="Hapus poster">
                            <flux:modal.trigger name="delete-promo-{{ $item->id }}">
                                <flux:button
                                    size="sm"
                                    variant="filled"
                                    icon="trash"
                                    class="h-8 w-8 bg-red-500/90 hover:bg-red-500 text-white border-0 shadow-sm"
                                />
                            </flux:modal.trigger>
                        </flux:tooltip>
                    </div>
                </div>

            </flux:card>
        @endforeach
    </div>

    @endif

    {{-- Modals — di luar loop --}}
    @foreach($promos as $item)
        <flux:modal name="delete-promo-{{ $item->id }}" class="max-w-sm rounded-2xl">
            <form action="{{ route('admin.promo.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="p-2 text-center">
                    {{-- Preview thumbnail kecil --}}
                    <div class="mx-auto w-32 h-20 rounded-xl overflow-hidden mb-4 border border-zinc-200 dark:border-zinc-700 shadow-sm">
                        <img
                            src="{{ asset('storage/' . $item->image_path) }}"
                            alt="{{ $item->title }}"
                            class="w-full h-full object-cover"
                        >
                    </div>

                    <flux:heading size="lg" class="font-bold">Hapus Poster Ini?</flux:heading>

                    <flux:text class="mt-2 text-sm text-zinc-500 px-2">
                        Poster <span class="font-semibold text-zinc-700 dark:text-zinc-200">{{ $item->title }}</span>
                        akan dihapus permanen dari slider landing page.
                    </flux:text>

                    <div class="mt-6 flex flex-col gap-2">
                        <flux:button type="submit" variant="filled" color="red" class="w-full">
                            Hapus Poster
                        </flux:button>
                        <flux:modal.close>
                            <flux:button variant="ghost" class="w-full">Batal</flux:button>
                        </flux:modal.close>
                    </div>
                </div>
            </form>
        </flux:modal>
    @endforeach
</x-app>
