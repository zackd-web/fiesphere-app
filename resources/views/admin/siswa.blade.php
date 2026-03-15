<x-app>
    {{-- Header --}}
    <div class="flex flex-col gap-3 mb-6 md:flex-row md:items-center md:justify-between md:mb-8">
        {{-- Kiri: Judul --}}
        <div>
            <flux:heading size="xl" level="1" class="font-bold tracking-tight">Siswa Kursus FSEC</flux:heading>
            <flux:subheading class="mt-1">Siswa yang terdaftar di sistem Fiesphere.</flux:subheading>
        </div>

        {{-- Search + Tombol dalam satu grup --}}
        <div class="flex items-center gap-2">
            <div class="w-full md:w-64">
                <flux:input icon="magnifying-glass" placeholder="Cari nama atau email..." />
            </div>

            <flux:button href="{{'admin.create'}}" variant="primary" icon="plus">
                Tambah Siswa
            </flux:button>
        </div>
    </div>

    {{-- Stat Cards --}}
    <div class="grid grid-cols-3 gap-3 mb-6 md:gap-6 md:mb-8">
        <flux:card class="flex flex-col gap-2 p-4 md:flex-row md:items-center md:gap-4 md:p-5 border-zinc-700/40 shadow-sm">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-blue-500/10 text-blue-500">
                <flux:icon.users variant="outline" class="w-5 h-5" />
            </div>
            <div>
                <flux:text size="xs" class="font-medium text-zinc-400">Total Siswa</flux:text>
                <flux:heading size="lg" class="font-bold leading-tight">{{ count($activeStudents) }}</flux:heading>
            </div>
        </flux:card>

        <flux:card class="flex flex-col gap-2 p-4 md:flex-row md:items-center md:gap-4 md:p-5 border-zinc-700/40 shadow-sm">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-emerald-500/10 text-emerald-500">
                <flux:icon.academic-cap variant="outline" class="w-5 h-5" />
            </div>
            <div>
                <flux:text size="xs" class="font-medium text-zinc-400">Program</flux:text>
                <flux:heading size="lg" class="font-bold leading-tight">{{ count($activePrograms ?? []) }}</flux:heading>
            </div>
        </flux:card>

        <flux:card class="flex flex-col gap-2 p-4 md:flex-row md:items-center md:gap-4 md:p-5 border-zinc-700/40 shadow-sm">
            <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-amber-500/10 text-amber-500">
                <flux:icon.clock variant="outline" class="w-5 h-5" />
            </div>
            <div>
                <flux:text size="xs" class="font-medium text-zinc-400">Jadwal</flux:text>
                <flux:heading size="lg" class="font-bold leading-tight text-sm md:text-xl">{{ $nearestSchedule ?? '—' }}</flux:heading>
            </div>
        </flux:card>
    </div>

    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mb-5 flex items-center p-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50 dark:text-emerald-400 dark:bg-emerald-900/20 rounded-r-xl shadow-sm animate-in fade-in slide-in-from-top-4" role="alert">
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
        @forelse($activeStudents as $student)
            <flux:card class="p-4 border-zinc-700/40 shadow-sm space-y-3">
                {{-- Top: Avatar + Nama + Aksi --}}
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-xs font-bold text-white uppercase">
                            {{ mb_substr($student->name, 0, 2, 'UTF-8') }}
                        </div>
                        <div>
                            <div class="font-semibold text-sm text-zinc-800 dark:text-white">{{ $student->name }}</div>
                            <div class="text-[15px] text-zinc-400 truncate max-w-45">{{ $student->email }}</div>
                        </div>
                    </div>
                    {{-- Quick actions --}}
                    <div class="flex items-center gap-1 shrink-0">
                        <flux:modal.trigger name="detail-student-{{ $student->id }}">
                            <flux:button size="sm" variant="subtle" class="h-8 px-2 text-xs">Detail</flux:button>
                        </flux:modal.trigger>
                        <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.siswa.edit', $student->id) }}" />
                        <flux:modal.trigger name="delete-student-{{ $student->id }}">
                            <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                        </flux:modal.trigger>
                    </div>
                </div>

                <flux:separator variant="subtle" />

                {{-- Info row --}}

                <div class="flex items-end justify-between">
                    <div class="space-y-2">
                        <div>
                            <span class="text-zinc-400 block mb-0.5">Program</span>
                            <span class="font-medium text-zinc-700 dark:text-zinc-200">{{ $student->pricing?->title ?? '—' }}</span>
                        </div>
                        <div>
                            <span class="text-zinc-400 block mb-0.5">Jadwal</span>
                            <flux:badge size="sm" color="blue" variant="outline" class="font-semibold">
                                {{ $student->schedule->time_range }} WIB
                            </flux:badge>
                        </div>
                    </div>
                    
                    <div class="text-right align-center space-y-2">
                        <div>
                            <span class="text-zinc-400 block mb-0.5">Kontak</span>
                            <span class="font-mono text-zinc-600 dark:text-zinc-300">{{ $student->whatsapp }}</span>
                        </div>

                        <div>
                            <span class="text-zinc-400 block mb-0.5">Kelas</span>
                            <flux:badge size="sm" color="zinc" class="text-[10px] uppercase font-bold tracking-widest">
                                {{ $student->class_type ?? '—' }}
                            </flux:badge>
                        </div>
                    </div>
                </div>
            </flux:card>
        @empty
            <flux:card class="p-12 text-center border-zinc-700/40">
                <flux:icon.users class="mx-auto h-10 w-10 text-zinc-300 mb-3" />
                <flux:heading class="text-zinc-400 font-semibold">Belum ada siswa</flux:heading>
            </flux:card>
        @endforelse
    </div>

    {{-- DESKTOP: Table --}}
    <flux:card class="hidden md:block overflow-hidden p-0 border-zinc-700/40 shadow-sm rounded-xl">
        <flux:table>
            <flux:table.columns>
                <flux:table.column align="center">Siswa</flux:table.column>
                <flux:table.column>Kontak</flux:table.column>
                <flux:table.column>Program & Kelas</flux:table.column>
                <flux:table.column>Jadwal</flux:table.column>
                <flux:table.column>Diperbarui</flux:table.column>
                <flux:table.column align="center">Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @forelse($activeStudents as $student)
                    <flux:table.row class="hover:bg-zinc-50 dark:hover:bg-zinc-800/40 transition-colors duration-150">
                        <flux:table.cell>
                            <div class="flex items-center gap-3 pl-3">
                                <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-xs font-bold text-white uppercase">
                                    {{ mb_substr($student->name, 0, 2, 'UTF-8') }}
                                </div>
                                <div>
                                    <div class="ps-2 font-semibold text-sm text-zinc-800 dark:text-white leading-tight">{{ $student->name }}</div>
                                    <div class="text-[15px] text-zinc-400 mt-0.5 truncate max-w-50">{{ $student->email }}</div>
                                </div>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="flex items-center gap-1.5">
                                <flux:icon.phone variant="mini" class="w-3.5 h-3.5 text-zinc-400 shrink-0" />
                                <span class="font-mono text-[15px] text-zinc-600 dark:text-zinc-300 tracking-tight">{{ $student->whatsapp }}</span>
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <div class="space-y-1">
                                <div class="text-sm font-medium text-zinc-700 dark:text-zinc-200">{{ $student->pricing?->title ?? '—' }}</div>
                                @if($student->class_type)
                                    <flux:badge size="sm" color="zinc" class="text-[10px] uppercase font-bold tracking-widest">{{ $student->class_type }}</flux:badge>
                                @endif
                            </div>
                        </flux:table.cell>

                        <flux:table.cell>
                            <flux:badge size="sm" color="blue" variant="outline" class="font-semibold whitespace-nowrap">
                                {{ $student->schedule->time_range }} WIB
                            </flux:badge>
                        </flux:table.cell>

                        <flux:table.cell>
                            <span class="text-xs text-white-300">{{ $student->updated_at->diffForHumans() }}</span>
                        </flux:table.cell>

                        <flux:table.cell align="center">
                            <div class="flex items-center justify-center gap-1">
                                <flux:modal.trigger name="detail-student-{{ $student->id }}">
                                    <flux:button size="sm" variant="subtle" class="h-8 px-3 text-xs">Detail</flux:button>
                                </flux:modal.trigger>
                                <flux:button size="sm" variant="ghost" icon="pencil-square" class="h-8 w-8" href="{{ route('admin.siswa.edit', $student->id) }}" />
                                <flux:modal.trigger name="delete-student-{{ $student->id }}">
                                    <flux:button size="sm" variant="ghost" color="red" icon="trash" class="h-8 w-8" />
                                </flux:modal.trigger>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @empty
                    <flux:table.row>
                        <flux:table.cell colspan="6">
                            <div class="flex flex-col items-center justify-center py-20 text-center">
                                <div class="flex h-16 w-16 items-center justify-center rounded-full bg-zinc-100 dark:bg-zinc-800 mb-4">
                                    <flux:icon.users class="h-8 w-8 text-zinc-300" />
                                </div>
                                <flux:heading class="text-zinc-400 font-semibold">Tidak ada siswa ditemukan</flux:heading>
                            </div>
                        </flux:table.cell>
                    </flux:table.row>
                @endforelse
            </flux:table.rows>
        </flux:table>
    </flux:card>

    {{-- Modals (di luar loop) --}}
    @foreach($activeStudents as $student)
        <flux:modal name="detail-student-{{ $student->id }}" class="md:w-137.5 p-0 overflow-hidden rounded-xl">
            <div class="bg-zinc-50 dark:bg-zinc-900 px-6 py-5 border-b border-zinc-200 dark:border-zinc-800">
                <div class="flex items-center gap-3">
                    <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-linear-to-br from-blue-500 to-indigo-600 text-sm font-bold text-white uppercase">
                        {{ mb_substr($student->name, 0, 2, 'UTF-8') }}
                    </div>
                    <div>
                        <flux:heading size="lg" class=" text-m leading-tight">{{ $student->name }}</flux:heading>
                        <flux:subheading class="text-m">{{ $student->email }}</flux:subheading>
                    </div>
                </div>
            </div>
            <div class="p-6 space-y-5">
                <div class="grid grid-cols-2 gap-x-6 gap-y-4">
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Nama Panggilan</flux:text>
                        <p class="font-medium text-sm">{{ $student->nickname ?? '—' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Jenis Kelamin</flux:text>
                        <p class="font-medium text-sm">{{ $student->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Pendidikan</flux:text>
                        <p class="font-medium text-sm">{{ $student->education ?? '—' }}</p>
                    </div>
                    <div class="space-y-0.5">
                        <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Tanggal Lahir</flux:text>
                        <p class="font-medium text-sm">{{ $student->birth_date ? \Carbon\Carbon::parse($student->birth_date)->translatedFormat('d F Y') : '—' }}</p>
                    </div>
                </div>
                <flux:separator variant="subtle" />
                <div class="space-y-0.5">
                    <flux:text size="xs" class="uppercase font-bold text-zinc-400 tracking-widest">Alamat</flux:text>
                    <p class="text-sm leading-relaxed text-zinc-800 dark:text-zinc-300">{{ $student->address ?? 'Alamat tidak tersedia.' }}</p>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <flux:modal.close><flux:button variant="ghost" size="sm">Tutup</flux:button></flux:modal.close>
                    <flux:button variant="primary" size="sm" icon="chat-bubble-left-right" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $student->whatsapp) }}" target="_blank">WhatsApp</flux:button>
                </div>
            </div>
        </flux:modal>

        <flux:modal name="delete-student-{{ $student->id }}" class="max-w-sm rounded-xl">
            <form action="{{ route('admin.siswa.destroy', $student->id) }}" method="POST">
                @csrf @method('DELETE')
                <div class="p-4 text-center">
                    <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-red-100 dark:bg-red-900/30 mb-4">
                        <flux:icon.exclamation-triangle class="h-7 w-7 text-red-600" />
                    </div>
                    <flux:heading size="lg">Hapus Data Siswa?</flux:heading>
                    <flux:text class="mt-2 text-sm text-zinc-500">
                        Seluruh data <span class="font-semibold text-zinc-700 dark:text-zinc-200">{{ $student->name }}</span> akan dihapus permanen.
                    </flux:text>
                    <div class="mt-6 flex flex-col gap-2">
                        <flux:button type="submit" variant="filled" color="red" class="w-full">Ya, Hapus Sekarang</flux:button>
                        <flux:modal.close><flux:button variant="ghost" class="w-full">Batal</flux:button></flux:modal.close>
                    </div>
                </div>
            </form>
        </flux:modal>
    @endforeach
</x-app>
