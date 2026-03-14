<x-app>
    {{-- Header --}}
    <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between md:mb-8">
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Pendaftar Baru FSEC</flux:heading>
            <flux:subheading class="mt-1">Calon siswa yang mendaftar melalui sistem Fiesphere.</flux:subheading>
        </div>
        <div class="w-full md:w-64">
            <flux:input icon="magnifying-glass" placeholder="Cari nama atau email..." />
        </div>
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
        @forelse($registers as $item)
            <flux:card class="p-4 border-zinc-700/40 shadow-sm space-y-3">
                {{-- Top: Avatar + Nama + Status --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-xs font-bold text-white uppercase">
                            {{ mb_substr($item->name, 0, 2, 'UTF-8') }}
                        </div>
                        <div>
                            <div class="font-semibold text-sm text-zinc-800 dark:text-white">{{ $item->name }}</div>
                            <div class="text-[11px] text-zinc-400 truncate max-w-45">{{ $item->email }}</div>
                        </div>
                    </div>
                    <flux:badge size="sm" :color="$item->status === 'pending' ? 'red' : 'blue'">
                        {{ ucfirst($item->status) }}
                    </flux:badge>
                </div>

                <flux:separator variant="subtle" />

                {{-- Info --}}
                <div class="flex items-end justify-between text-xs">
                    <div class="space-y-2">
                        <div>
                            <span class="text-zinc-400 block mb-0.5">Program</span>
                            <span class="font-medium text-zinc-700 dark:text-zinc-200">{{ $item->pricing?->title ?? '—' }}</span>
                        </div>
                        <div>
                            <flux:badge size="sm" color="blue" variant="outline" class="font-semibold">
                                {{ $item->schedule?->time_range }} WIB
                            </flux:badge>
                        </div>
                    </div>
                    <div class="text-right space-y-2">
                        <div>
                            <flux:badge size="sm" color="zinc" class="text-[10px] uppercase font-bold tracking-widest">
                                {{ $item->class_type ?? '—' }}
                            </flux:badge>
                        </div>
                        <div class="flex items-center justify-end gap-1">
                            <flux:icon.phone variant="mini" class="w-3 h-3 text-zinc-400" />
                            <span class="font-mono text-zinc-500">{{ $item->whatsapp }}</span>
                        </div>
                    </div>
                </div>

                {{-- Actions --}}
                <div class="flex gap-2 pt-1">
                    <flux:modal.trigger name="detail-register-{{ $item->id }}">
                        <flux:button size="sm" variant="subtle" class="flex-1">Detail</flux:button>
                    </flux:modal.trigger>
                    <flux:tooltip content="Terima sebagai siswa">
                        <flux:modal.trigger name="enroll-confirm-{{ $item->id }}">
                            <flux:button size="sm" variant="filled" color="green" icon="check" class="h-8 w-8" />
                        </flux:modal.trigger>
                    </flux:tooltip>
                </div>
            </flux:card>
        @empty
            <flux:card class="p-12 text-center border-zinc-700/40">
                <flux:icon.user-plus class="mx-auto h-10 w-10 text-zinc-300 mb-3" />
                <flux:heading class="text-zinc-400 font-semibold">Belum ada pendaftaran baru.</flux:heading>
            </flux:card>
        @endforelse
    </div>

    {{-- DESKTOP: Table --}}
    <flux:card class="hidden md:block overflow-hidden p-0 border-zinc-700/40 shadow-sm rounded-xl">
        <flux:table>
            <flux:table.columns>
                <flux:table.column class="ps-6">Pendaftar</flux:table.column>
                <flux:table.column>Kontak</flux:table.column>
                <flux:table.column>Program & Kelas</flux:table.column>
                <flux:table.column>Jadwal</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column align="center">Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($registers as $item)
                    <flux:table.row class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors duration-150">
                        <flux:table.cell class="ps-6">
                            <div class="flex items-center gap-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-xs font-bold text-white uppercase">
                                    {{ mb_substr($item->name, 0, 2, 'UTF-8') }}
                                </div>
                                <div>
                                    <div class="font-semibold text-sm text-zinc-800 dark:text-white leading-tight">{{ $item->name }}</div>
                                    <div class="text-[11px] text-zinc-400 mt-0.5 truncate max-w-40">{{ $item->email }}</div>
                                </div>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="flex items-center gap-1.5">
                                <flux:icon.phone variant="mini" class="w-3.5 h-3.5 text-zinc-400 shrink-0" />
                                <span class="font-mono text-xs text-zinc-600 dark:text-zinc-300 tracking-tight">{{ $item->whatsapp }}</span>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="space-y-1">
                                <div class="text-sm font-medium text-zinc-700 dark:text-zinc-200">{{ $item->pricing?->title ?? '—' }}</div>
                                @if($item->class_type)
                                    <flux:badge size="sm" color="zinc" class="text-[10px] uppercase font-bold tracking-widest">{{ $item->class_type }}</flux:badge>
                                @endif
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <flux:badge size="sm" color="blue" variant="outline" class="font-semibold whitespace-nowrap">
                                {{ $item->schedule?->time_range }} WIB
                            </flux:badge>
                        </flux:table.cell>

                        <flux:table.cell>
                            <flux:badge size="sm" :color="$item->status === 'pending' ? 'red' : 'blue'">
                                {{ ucfirst($item->status) }}
                            </flux:badge>
                        </flux:table.cell>

                        <flux:table.cell align="center">
                            <div class="flex items-center justify-center gap-1">
                                <flux:modal.trigger name="detail-register-{{ $item->id }}">
                                    <flux:button size="sm" variant="subtle" class="h-8 px-3 text-xs">Detail</flux:button>
                                </flux:modal.trigger>
                                <flux:modal.trigger name="enroll-confirm-{{ $item->id }}" class="flex-1">
                                    <flux:button size="sm" variant="filled" color="green" class="w-20">Terima</flux:button>
                                </flux:modal.trigger>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="6">
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 mb-4">
                                    <flux:icon.user-plus class="h-8 w-8 text-zinc-300" />
                                </div>
                                <flux:heading class="text-zinc-400 font-semibold">Belum ada pendaftaran baru</flux:heading>
                                <flux:text size="sm" class="text-zinc-400 mt-1">Pendaftar baru akan muncul di sini.</flux:text>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>

    {{-- Modals — di luar loop --}}
    @foreach($registers as $item)
        <flux:modal name="detail-register-{{ $item->id }}" class="md:w-150 p-0 overflow-hidden rounded-xl">
            <div class="bg-zinc-50 dark:bg-zinc-900 px-6 py-5 border-b border-zinc-200 dark:border-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-sm font-bold text-white uppercase">
                        {{ mb_substr($item->name, 0, 2, 'UTF-8') }}
                    </div>
                    <div>
                        <flux:heading size="lg" class="leading-tight">{{ $item->name }}</flux:heading>
                        <flux:subheading class="text-xs">{{ $item->email }}</flux:subheading>
                    </div>
                    <div class="ms-auto">
                        <flux:badge size="sm" :color="$item->status === 'pending' ? 'red' : 'blue'">
                            {{ ucfirst($item->status) }}
                        </flux:badge>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-5">
                <div class="grid grid-cols-2 gap-x-6 gap-y-4 text-sm">
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Nama Panggilan</flux:text>
                        <p class="font-medium">{{ $item->nickname ?? '—' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Jenis Kelamin</flux:text>
                        <p class="font-medium">{{ $item->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Pendidikan</flux:text>
                        <p class="font-medium">{{ $item->education ?? '—' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Jadwal Kelas</flux:text>
                        <p class="font-medium">{{ $item->schedule?->time_range }} WIB</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Pilihan Kelas</flux:text>
                        <flux:badge size="sm" color="zinc" class="text-[10px] uppercase font-bold tracking-widest">{{ $item->class_type ?? '—' }}</flux:badge>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Sumber Informasi</flux:text>
                        <p class="font-medium">{{ $item->source ?? '—' }}</p>
                    </div>
                </div>

                <flux:separator variant="subtle" />

                <div class="space-y-0.5">
                    <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Alamat Lengkap</flux:text>
                    <p class="text-sm leading-relaxed text-zinc-600 dark:text-zinc-300">{{ $item->address ?? 'Alamat belum diisi.' }}</p>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <flux:modal.close>
                        <flux:button variant="ghost" size="sm">Tutup</flux:button>
                    </flux:modal.close>
                    <flux:button
                        variant="primary"
                        size="sm"
                        icon="chat-bubble-left-right"
                        href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->whatsapp) }}"
                        target="_blank"
                    >
                        Hubungi via WA
                    </flux:button>
                </div>
            </div>
        </flux:modal>

        {{-- Modal Konfirmasi Terima --}}
<flux:modal name="enroll-confirm-{{ $item->id }}" class="max-w-sm rounded-2xl">
    <div class="p-2 text-center">
        <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-emerald-100 dark:bg-emerald-900/30 mb-4">
            <flux:icon.user-plus class="h-7 w-7 text-emerald-600" />
        </div>

        <flux:heading size="lg" class="font-bold">Terima Siswa Ini?</flux:heading>

        <flux:text class="mt-2 text-sm text-zinc-500 px-2">
            <span class="font-semibold text-zinc-700 dark:text-zinc-200">{{ $item->name }}</span>
            akan didaftarkan sebagai siswa aktif di sistem Fiesphere.
        </flux:text>

        <div class="mt-6 flex flex-col gap-2">
            <form action="{{ route('admin.register.enroll', $item->id) }}" method="POST">
                @csrf
                <flux:button type="submit" variant="filled" color="green" class="w-full" icon="check">
                    Ya, Terima Sekarang
                </flux:button>
            </form>
            <flux:modal.close>
                <flux:button variant="ghost" class="w-full">Batal</flux:button>
            </flux:modal.close>
        </div>
    </div>
</flux:modal>

    @endforeach
</x-app>
