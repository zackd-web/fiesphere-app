<x-app>
    {{-- Header Section --}}
    <div class="mb-6">
        <flux:heading size="xl" level="1">Daftar Siswa Aktif</flux:heading>
        <flux:subheading>Daftar seluruh siswa yang sudah resmi terdaftar di Fiesphere.</flux:subheading>
    </div>


    <flux:separator variant="subtle" />


    {{-- Success Alert --}}
    @if(session('success'))
        <div class="mt-6 flex items-center p-4 text-emerald-800 border-l-4 border-emerald-500 bg-emerald-50/10 dark:text-emerald-400 dark:bg-emerald-900/20 rounded-r-xl shadow-sm" role="alert">
            <flux:icon.check-circle variant="mini" class="shrink-0 w-5 h-5 text-emerald-500" />
            <div class="ms-3 text-sm font-medium tracking-wide">
                <span class="font-bold">Berhasil:</span> {{ session('success') }}
            </div>
            <button type="button" class="ms-auto p-1.5 text-emerald-500 hover:bg-emerald-100 dark:hover:bg-emerald-800/30 rounded-lg transition-colors" onclick="this.parentElement.remove()">
                <flux:icon.x-mark variant="mini" />
            </button>
        </div>
    @endif


    <div class="mt-6">
        <flux:card class="overflow-hidden">
            <flux:table>
                <flux:table.columns>
                    <flux:table.column>Nama Siswa</flux:table.column>
                    <flux:table.column>Kontak</flux:table.column>
                    <flux:table.column>Program</flux:table.column>
                    <flux:table.column>Metode</flux:table.column>
                    <flux:table.column>Tanggal Join</flux:table.column>
                    <flux:table.column align="center">Aksi</flux:table.column>
                </flux:table.columns>


                <flux:table.rows>
                    @forelse($activeStudents as $siswa)
                        <flux:table.row>
                            <flux:table.cell class="font-bold text-zinc-800 dark:text-white">
                                {{ $siswa->name }}
                            </flux:table.cell>
                            
                            <flux:table.cell>
                                <flux:text class="font-mono text-xs">{{ $siswa->whatsapp }}</flux:text>
                            </flux:table.cell>
                            
                            <flux:table.cell>{{ $siswa->program }}</flux:table.cell>
                            
                            <flux:table.cell>
                                <flux:badge size="sm" :color="$siswa->method === 'Online' ? 'blue' : 'orange'" inset="top bottom">
                                    {{ $siswa->method }}
                                </flux:badge>
                            </flux:table.cell>
                            
                            <flux:table.cell>{{ $siswa->updated_at->format('d M Y') }}</flux:table.cell>


                            <flux:table.cell class="flex justify-center gap-1">
                                {{-- Tombol Edit --}}
                                <flux:button size="sm" variant="ghost" icon="pencil-square" href="{{ route('admin.siswa.edit', $siswa->id) }}" />


                                {{-- Trigger Hapus --}}
                                <flux:modal.trigger name="delete-student-{{ $siswa->id }}">
                                    <flux:button size="sm" variant="ghost" color="red" icon="trash" />
                                </flux:modal.trigger>


                                <flux:modal name="delete-student-{{ $siswa->id }}" class="min-w-[22rem] max-w-md">
                                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <div class="space-y-6">
                                            {{-- Visual Danger Indicator --}}
                                            <div class="flex flex-col items-center text-center">
                                                {{-- Icon diperbesar --}}
                                                <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-red-100/10 dark:bg-red-900/20">
                                                    <flux:icon.exclamation-triangle class="h-10 w-10 text-red-600 dark:text-red-500" />
                                                </div>
                                                
                                                <flux:heading size="lg" class="text-zinc-900 dark:text-white">Hapus Data Siswa?</flux:heading>
                                                
                                                <flux:text class="mt-2 leading-relaxed text-zinc-600 dark:text-zinc-400">
                                                    Kamu akan menghapus seluruh catatan data atas nama
                                                </flux:text>

                                                {{-- Nama Siswa: Putih/Terang & Bold (High Contrast) --}}
                                                <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white tracking-tight">
                                                    {{ $siswa->name }}
                                                </p>
                                                
                                                {{-- Warning kecil di bawah --}}
                                                <p class="mt-4 text-xs font-medium text-red-600 dark:text-red-400">
                                                    ⚠️ Data tidak dapat dipulihkan setelah dihapus
                                                </p>
                                            </div>

                                            {{-- Action Buttons --}}
                                            <div class="flex flex-col-reverse gap-3 pt-2">
                                                <flux:modal.close>
                                                    <flux:button variant="ghost" class="w-full text-zinc-500 hover:text-zinc-700 dark:text-zinc-400 dark:hover:text-zinc-200">
                                                        Batal
                                                    </flux:button>
                                                </flux:modal.close>

                                                <flux:button type="submit" variant="filled" class="w-full bg-red-600 hover:bg-red-700 text-white shadow-lg shadow-red-500/20 border-0">
                                                    Hapus Data
                                                </flux:button>
                                            </div>
                                        </div>
                                    </form>
                                </flux:modal>

                            </flux:table.cell>
                        </flux:table.row>
                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="6" class="py-12 text-center">
                                <flux:icon.users class="mx-auto h-12 w-12 text-zinc-300" />
                                <flux:heading class="mt-4">Tidak ada siswa ditemukan</flux:heading>
                                <flux:subheading>Coba sesuaikan filter atau tambahkan siswa baru.</flux:subheading>
                            </flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </flux:card>
    </div>
</x-app>
