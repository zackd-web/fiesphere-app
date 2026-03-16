<x-app>
    {{-- Header --}}
    <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between md:mb-8">
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Manajemen Mentor</flux:heading>
            <flux:subheading class="mt-1">Kelola data mentor dan pengajar yang tampil di landing page.</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.mentor.create') }}" variant="primary" icon="plus">
            Tambah Mentor
        </flux:button>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mb-6 flex items-center p-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 dark:text-emerald-400 dark:bg-emerald-900/20 rounded-r-xl shadow-sm animate-in fade-in slide-in-from-top-4" role="alert">
            <flux:icon.check-circle variant="mini" class="shrink-0 w-5 h-5 text-emerald-500" />
            <div class="ms-3 text-sm font-medium">
                <span class="font-bold">Berhasil:</span> {{ session('success') }}
            </div>
            <button type="button" class="ms-auto p-1.5 text-emerald-500 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 rounded-lg transition-colors" onclick="this.parentElement.remove()">
                <flux:icon.x-mark variant="mini" />
            </button>
        </div>
    @endif

    {{-- MOBILE: Card List --}}
    <div class="flex flex-col gap-3 md:hidden">
        @forelse($mentors as $mentor)
            <flux:card class="p-4 border-zinc-700/40 shadow-sm space-y-3">
                <div class="flex items-center justify-between gap-3">
                    <div class="flex items-center gap-3">
                        <div class="relative shrink-0">
                            <img
                                src="{{ asset('storage/' . $mentor->photo_path) }}"
                                alt="{{ $mentor->name }}"
                                class="h-12 w-12 rounded-xl object-cover"
                            >
                        </div>
                        <div>
                            <div class="font-bold text-sm text-zinc-800 dark:text-white leading-tight">{{ $mentor->name }}</div>
                            <div class="text-[11px] text-zinc-400 mt-0.5">{{ $mentor->specialization }}</div>
                        </div>
                    </div>
                    @if($mentor->is_active)
                        <flux:badge color="green" size="sm" class="shrink-0">Aktif</flux:badge>
                    @else
                        <flux:badge color="zinc" size="sm" class="shrink-0">Nonaktif</flux:badge>
                    @endif
                </div>

                <flux:separator variant="subtle" />

                <div class="flex items-end justify-between text-xs">
                    <div class="space-y-2">
                        <div>
                            <span class="text-zinc-400 block mb-0.5">Badge Keahlian</span>
                            <flux:badge size="sm" color="yellow" class="font-bold uppercase text-[10px]">
                                {{ $mentor->expertise_badge }}
                            </flux:badge>
                        </div>
                        <div class="flex flex-wrap gap-1">
                            @foreach($mentor->tags as $tag)
                                <flux:badge size="sm" color="zinc" variant="outline" class="text-[10px]">{{ $tag }}</flux:badge>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex items-center gap-1 shrink-0">
                        <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.mentor.edit', $mentor->id) }}" />
                        <flux:modal.trigger name="delete-mentor-{{ $mentor->id }}">
                            <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                        </flux:modal.trigger>
                    </div>
                </div>
            </flux:card>
        @empty
            <flux:card class="p-12 text-center border-zinc-700/40">
                <flux:icon.user-circle class="mx-auto h-10 w-10 text-zinc-300 mb-3" />
                <flux:heading class="text-zinc-400 font-semibold">Belum ada mentor.</flux:heading>
                <flux:text size="sm" class="text-zinc-400 mt-1 mb-4">Tambahkan mentor pertama untuk ditampilkan di landing page.</flux:text>
                <flux:button href="{{ route('admin.mentor.create') }}" variant="primary" icon="plus" size="sm">Tambah Mentor</flux:button>
            </flux:card>
        @endforelse
    </div>

    {{-- DESKTOP: Table --}}
    <flux:card class="hidden md:block overflow-hidden p-0 border-zinc-700/40 shadow-sm rounded-xl">
        <flux:table>
            <flux:table.columns>
                <flux:table.column align="center" class="ps-6">Mentor</flux:table.column>
                <flux:table.column>Badge Keahlian</flux:table.column>
                <flux:table.column>Tags</flux:table.column>
                <flux:table.column>Urutan</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column>Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($mentors as $mentor)
                    <flux:table.row class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors duration-150">

                        {{-- Mentor --}}
                        <flux:table.cell class="ps-6">
                            <div class="flex items-center gap-3 pl-3">
                                <img
                                    src="{{ asset('storage/' . $mentor->photo_path) }}"
                                    alt="{{ $mentor->name }}"
                                    class="h-10 w-10 shrink-0 rounded-xl object-cover"
                                >
                                <div>
                                    <div class="font-bold text-sm text-zinc-800 dark:text-white leading-tight">{{ $mentor->name }}</div>
                                    <div class="text-[11px] text-zinc-400 mt-0.5">{{ $mentor->specialization }}</div>
                                </div>
                            </div>
                        </flux:table.cell>

                        {{-- Badge --}}
                        <flux:table.cell>
                            <flux:badge size="sm" color="yellow" class="font-bold uppercase text-[10px] tracking-wide">
                                {{ $mentor->expertise_badge }}
                            </flux:badge>
                        </flux:table.cell>

                        {{-- Tags --}}
                        <flux:table.cell>
                            <div class="flex flex-wrap gap-1">
                                @foreach($mentor->tags as $tag)
                                    <flux:badge size="sm" color="zinc" variant="outline" class="text-[10px]">{{ $tag }}</flux:badge>
                                @endforeach
                            </div>
                        </flux:table.cell>

                        {{-- Urutan --}}
                        <flux:table.cell>
                            <span class="text-sm font-mono text-zinc-500">{{ $mentor->order }}</span>
                        </flux:table.cell>

                        {{-- Status --}}
                        <flux:table.cell>
                            @if($mentor->is_active)
                                <flux:badge color="green" size="sm">Aktif</flux:badge>
                            @else
                                <flux:badge color="zinc" size="sm">Nonaktif</flux:badge>
                            @endif
                        </flux:table.cell>

                        {{-- Aksi --}}
                        <flux:table.cell align="center">
                            <div class="flex items-center justify-center gap-1">
                                <flux:tooltip content="Edit mentor">
                                    <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.mentor.edit', $mentor->id) }}" />
                                </flux:tooltip>
                                <flux:tooltip content="Hapus mentor">
                                    <flux:modal.trigger name="delete-mentor-{{ $mentor->id }}">
                                        <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                                    </flux:modal.trigger>
                                </flux:tooltip>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="6">
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 mb-4">
                                    <flux:icon.user-circle class="h-8 w-8 text-zinc-300" />
                                </div>
                                <flux:heading class="text-zinc-400 font-semibold">Belum ada mentor</flux:heading>
                                <flux:text size="sm" class="text-zinc-400 mt-1 mb-4">Tambahkan mentor pertama untuk ditampilkan di landing page.</flux:text>
                                <flux:button href="{{ route('admin.mentor.create') }}" variant="primary" icon="plus" size="sm">Tambah Mentor</flux:button>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>

    {{-- Modals --}}
    @foreach($mentors as $mentor)
        <flux:modal name="delete-mentor-{{ $mentor->id }}" class="max-w-sm rounded-2xl">
                <form action="{{ route('admin.mentor.destroy', $mentor->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="p-2 text-center">
                        <div class="mx-auto w-16 h-16 rounded-2xl overflow-hidden mb-4 border border-zinc-200 dark:border-zinc-700 shadow-sm">
                            <img src="{{ asset('storage/' . $mentor->photo_path) }}" alt="{{ $mentor->name }}" class="w-full h-full object-cover">
                        </div>

                        <flux:heading size="lg" class="font-bold">Hapus Mentor Ini?</flux:heading>

                        <flux:text class="mt-2 text-sm text-zinc-500 px-2">
                            Data <span class="font-semibold text-zinc-700 dark:text-zinc-200">{{ $mentor->name }}</span>
                            akan dihapus permanen dari sistem dan landing page.
                        </flux:text>

                        <div class="mt-6 flex flex-col gap-2">
                            <flux:button type="submit" variant="filled" color="red" class="w-full">
                                Hapus Mentor
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
