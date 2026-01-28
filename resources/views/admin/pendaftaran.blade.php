<x-app>
    <div class="mb-6">
        <flux:heading size="xl" level="1">Data Pendaftaran Baru</flux:heading>
        <flux:subheading>Calon siswa yang mendaftar melalui landing page.</flux:subheading>
    </div>

    <flux:separator variant="subtle" />

    <div class="mt-6">
        <flux:card>
            <flux:table>
                <flux:table.columns>
                    <flux:table.column>Nama</flux:table.column>
                    <flux:table.column>WhatsApp</flux:table.column>
                    <flux:table.column>Program</flux:table.column>
                    <flux:table.column>Status</flux:table.column>
                    <flux:table.column>Aksi</flux:table.column>
                </flux:table.columns>

                <flux:table.rows>
                    @forelse($pendaftar as $item)
                        <flux:table.row>
                            <flux:table.cell class="font-bold">{{ $item->name }}</flux:table.cell>
                            <flux:table.cell>{{ $item->whatsapp }}</flux:table.cell>
                            <flux:table.cell>{{ $item->program }}</flux:table.cell>
                            <flux:table.cell>
                                <flux:badge size="sm" :color="$item->status === 'pending' ? 'zinc' : 'blue'">
                                    {{ ucfirst($item->status) }}
                                </flux:badge>
                            </flux:table.cell>
                            <flux:table.cell>
                                <flux:button size="sm" variant="primary" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->whatsapp) }}" target="_blank">Hubungi</flux:button>
                            </flux:table.cell>

                            <flux:table.cell class="flex gap-2">
                                <flux:button size="sm" variant="primary" href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $item->whatsapp) }}" target="_blank">
                                    Hubungi
                                </flux:button>

                                <form action="{{ route('admin.pendaftaran.enroll', $item->id) }}" method="POST">
                                    @csrf
                                    <flux:button type="submit" size="sm" variant="filled" color="green" onclick="return confirm('Terima siswa ini?')">
                                        Terima
                                    </flux:button>
                                </form>
                            </flux:table.cell>
                        </flux:table.row>
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