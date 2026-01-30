<x-app>
    <div class="mb-6">
        <flux:heading size="xl" level="1">Pendaftar Baru FSEC</flux:heading>
        <flux:subheading>Daftar calon siswa yang baru saja mendaftar melalui sistem Fiesphere.</flux:subheading>
    </div>

    <flux:separator variant="subtle" />

    <div class="mt-6">
        @if(session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <flux:card>
            <flux:table>
                <flux:table.columns>
                    <flux:table.column>Nama & Email</flux:table.column>
                    <flux:table.column>WhatsApp</flux:table.column>
                    <flux:table.column>Program</flux:table.column>
                    <flux:table.column>Status</flux:table.column>
                    <flux:table.column>Aksi</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse($registers as $item)
                        <flux:table.row>
                            <flux:table.cell>
                                <div class="font-bold text-white">{{ $item->name }}</div>
                                <div class="text-xs text-zinc-500">{{ $item->email }}</div>
                            </flux:table.cell>
                            <flux:table.cell>{{ $item->whatsapp }}</flux:table.cell>
                            <flux:table.cell>{{ $item->program }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge size="sm" :color="$item->status === 'pending' ? 'zinc' : 'blue'">
                                    {{ ucfirst($item->status) }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell class="flex gap-2">
                                {{-- Trigger Modal Detail --}}
                                <flux:modal.trigger name="detail-register-{{ $item->id }}">
                                    <flux:button size="sm" variant="subtle">Detail</flux:button>
                                </flux:modal.trigger>

                                {{-- Form Enroll --}}
                                <form action="{{ route('admin.register.enroll', $item->id) }}" method="POST">
                                    @csrf
                                    <flux:button type="submit" size="sm" variant="filled" color="green" onclick="return confirm('Terima siswa ini ke sistem Fiesphere?')">
                                        Terima
                                    </flux:button>
                                </form>
                            </flux:table.cell>
                        </flux:table.row>

                        {{-- Modal Detail Pendaftar --}}
                        <flux:modal name="detail-register-{{ $item->id }}" class="md:w-[600px] space-y-6">
                            <div>
                                <flux:heading size="lg">Detail Calon Siswa</flux:heading>
                                <flux:subheading>Data lengkap pendaftaran {{ $item->name }}</flux:subheading>
                            </div>

                            <div class="grid grid-cols-2 gap-y-4 gap-x-6 text-sm">
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Nama Panggilan</label>
                                    <p class="mt-1 font-medium">{{ $item->nickname ?? '-' }}</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Jenis Kelamin</label>
                                    <p class="mt-1 font-medium">{{ $item->gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Pendidikan</label>
                                    <p class="mt-1 font-medium">{{ $item->education }}</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Jadwal Kelas</label>
                                    <p class="mt-1 font-medium">{{ $item->schedule }} WIB</p>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Ukuran Kaos</label>
                                    <flux:badge size="sm" color="yellow">{{ $item->shirt_size ?? '-' }}</flux:badge>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Sumber Informasi</label>
                                    <p class="mt-1 font-medium">{{ $item->source }}</p>
                                </div>
                            </div>

                            <flux:separator variant="subtle" />

                            <div>
                                <label class="block text-xs font-bold text-zinc-400 uppercase tracking-wider">Alamat Lengkap</label>
                                <p class="mt-1 text-zinc-600">{{ $item->address ?? 'Alamat belum diisi.' }}</p>
                            </div>

                            <div class="flex justify-end gap-2 pt-4">
                                <flux:button variant="ghost" x-on:click="$modal.close()">Tutup</flux:button>
                                <flux:button variant="primary" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->whatsapp) }}" target="_blank">
                                    Hubungi Via WA
                                </flux:button>
                            </div>
                        </flux:modal>

                    @empty
                        <flux:table.row>
                            <flux:table.cell colspan="5" class="text-center py-10">Belum ada pendaftaran baru.</flux:table.cell>
                        </flux:table.row>
                    @endforelse
                </flux:table.rows>
            </flux:table>
        </flux:card>
    </div>
</x-app>