<x-app>
    {{-- Header --}}
    <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between md:mb-8">
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Manajemen Harga</flux:heading>
            <flux:subheading class="mt-1">Atur paket kursus yang tampil di landing page Fiesphere.</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.program.create') }}" variant="primary" icon="plus">
            Tambah Paket
        </flux:button>
    </div>

    {{-- MOBILE: Card List --}}
    <div class="flex flex-col gap-3 md:hidden">
        @forelse($programs as $item)
            <flux:card class="p-4 border-zinc-700/40 shadow-sm space-y-3">
                <div class="flex items-start justify-between gap-3">
                    <div>
                        <div class="font-bold text-sm text-zinc-800 dark:text-white">{{ $item->title }}</div>
                        <div class="text-xs text-zinc-400 mt-0.5">{{ $item->price }} · {{ $item->duration }}</div>
                    </div>
                    @if($item->is_featured)
                        <flux:badge color="blue" size="sm" class="shrink-0">Rekomendasi</flux:badge>
                    @else
                        <flux:badge size="sm" class="shrink-0">Standar</flux:badge>
                    @endif
                </div>

                <flux:separator variant="subtle" />

                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-1.5 text-xs text-zinc-400">
                        <flux:icon.list-bullet variant="mini" class="w-3.5 h-3.5" />
                        <span>{{ count($item->features) }} fitur</span>
                    </div>
                    <div class="flex items-center gap-1">
                        <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.program.edit', $item->id) }}" />
                        <flux:modal.trigger name="delete-program-{{ $item->id }}">
                            <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                        </flux:modal.trigger>
                    </div>
                </div>
            </flux:card>
        @empty
            <flux:card class="p-12 text-center border-zinc-700/40">
                <flux:icon.tag class="mx-auto h-10 w-10 text-zinc-300 mb-3" />
                <flux:heading class="text-zinc-400 font-semibold">Belum ada paket program.</flux:heading>
            </flux:card>
        @endforelse
    </div>

    {{-- DESKTOP: Table --}}
    <flux:card class="hidden md:block overflow-hidden p-0 border-zinc-700/40 shadow-sm rounded-xl">
        <flux:table>
            <flux:table.columns>
                <flux:table.column align="center">Nama Paket</flux:table.column>
                <flux:table.column>Harga & Durasi</flux:table.column>
                <flux:table.column>Fitur</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column align="center">Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($programs as $item)
                    <flux:table.row class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors duration-150">
                        <flux:table.cell align="center">
                            <div class="font-bold text-sm text-zinc-800 dark:text-white">{{ $item->title }}</div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="text-sm font-semibold text-zinc-700 dark:text-zinc-200">{{ $item->price }}</div>
                            <div class="text-xs text-zinc-400">{{ $item->duration }}</div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="flex items-center gap-1.5 text-xs text-white bg-zinc-700/40 dark:bg-zinc-300/20 rounded-full px-2 py-1 w-max">
                                <flux:icon.list-bullet variant="mini" class="w-3.5 h-3.5 text-white" />
                                <span>{{ count($item->features) }} poin fitur</span>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            @if($item->is_featured)
                                <flux:badge color="blue" size="sm">Rekomendasi</flux:badge>
                            @else
                                <flux:badge size="sm" color="zinc">Standar</flux:badge>
                            @endif
                        </flux:table.cell>

                        <flux:table.cell align="center">
                            <div class="flex items-center justify-center gap-1">
                                <flux:tooltip content="Edit paket">
                                    <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.program.edit', $item->id) }}" />
                                </flux:tooltip>
                                <flux:tooltip content="Hapus paket">
                                    <flux:modal.trigger name="delete-program-{{ $item->id }}">
                                        <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                                    </flux:modal.trigger>
                                </flux:tooltip>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="5">
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 mb-4">
                                    <flux:icon.tag class="h-8 w-8 text-zinc-300" />
                                </div>
                                <flux:heading class="text-zinc-400 font-semibold">Belum ada paket program</flux:heading>
                                <flux:text size="sm" class="text-zinc-400 mt-1">Tambahkan paket baru untuk ditampilkan di landing page.</flux:text>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>

    {{-- Modals — di luar loop --}}
    @foreach($programs as $item)
        <flux:modal name="delete-program-{{ $item->id }}" class="max-w-sm rounded-2xl">
            <form action="{{ route('admin.program.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="p-2 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                        <flux:icon.exclamation-triangle class="h-7 w-7 text-red-600" />
                    </div>

                    <flux:heading size="lg" class="font-bold">Hapus Program?</flux:heading>

                    <flux:text class="mt-2 text-sm text-zinc-500 px-2">
                        Kamu akan menghapus paket
                        <span class="font-semibold text-zinc-700 dark:text-zinc-200">{{ $item->title }}</span>
                        secara permanen dari landing page.
                    </flux:text>

                    <div class="mt-6 flex flex-col gap-2">
                        <flux:button type="submit" variant="filled" color="red" class="w-full">
                            Hapus Program
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
