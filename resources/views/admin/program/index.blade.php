<x-app>
    <div class="flex justify-between items-center mb-6">
        <div>
            <flux:heading size="xl">Manajemen Harga</flux:heading>
            <flux:subheading>Atur paket kursus yang tampil di landing page Fiesphere.</flux:subheading>
        </div>
        <flux:button href="{{ route('admin.program.create') }}" variant="primary" icon="plus">
            Tambah Paket
        </flux:button>
    </div>

    <flux:card>
        <flux:table>
            <flux:table.columns>
                <flux:table.column>Nama Paket</flux:table.column>
                <flux:table.column>Harga</flux:table.column>
                <flux:table.column>Fitur</flux:table.column>
                <flux:table.column>Status</flux:table.column>
                <flux:table.column>Aksi</flux:table.column>
            </flux:table.columns>

            <flux:table.rows>
                @foreach($programs as $item)
                    <flux:table.row>
                        <flux:table.cell class="font-bold">{{ $item->title }}</flux:table.cell>
                        <flux:table.cell>{{ $item->price }} {{ $item->duration }}</flux:table.cell>
                        <flux:table.cell>
                            <span class="text-xs text-zinc-400">{{ count($item->features) }} Poin Fitur</span>
                        </flux:table.cell>
                        <flux:table.cell>
                            @if($item->is_featured)
                                <flux:badge color="blue" size="sm">Rekomendasi</flux:badge>
                            @else
                                <flux:badge size="sm">Standar</flux:badge>
                            @endif
                        </flux:table.cell>
                        <flux:table.cell>
    <div class="flex items-center gap-2">
        {{-- Tombol Edit --}}
        <flux:button size="sm" variant="ghost" icon="pencil-square" href="{{ route('admin.program.edit', $item->id) }}" />

        {{-- TRIGGER MODAL HAPUS --}}
        <flux:modal.trigger name="delete-program-{{ $item->id }}">
            <flux:button size="sm" variant="ghost" color="red" icon="trash" />
        </flux:modal.trigger>

        {{-- MODAL KONFIRMASI --}}
        <flux:modal name="delete-program-{{ $item->id }}" class="min-w-[22rem] max-w-md">
            <form action="{{ route('admin.program.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <div class="space-y-6">
                    <div class="flex flex-col items-center text-center">
                        {{-- Icon Danger Indicator --}}
                        <div class="mb-4 flex h-20 w-20 items-center justify-center rounded-full bg-red-100/10 dark:bg-red-900/20">
                            <flux:icon.exclamation-triangle class="h-10 w-10 text-red-600 dark:text-red-500" />
                        </div>
                        
                        <flux:heading size="lg" class="text-zinc-900 dark:text-white">Hapus Program?</flux:heading>
                        
                        <flux:text class="mt-2 leading-relaxed text-zinc-600 dark:text-zinc-400">
                            Kamu akan menghapus Program Paket
                        </flux:text>

                        {{-- Nama Program: High Contrast --}}
                        <p class="mt-2 text-xl font-black text-zinc-900 dark:text-white tracking-tight uppercase">
                            {{ $item->title }}
                        </p>
                        
                        {{-- Warning --}}
                        <p class="mt-4 text-xs font-medium text-red-600 dark:text-red-400">
                            ⚠️ Perubahan ini permanen dan akan langsung hilang dari landing page
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
                            Hapus Program
                        </flux:button>
                    </div>
                </div>
            </form>
        </flux:modal>
    </div>
</flux:table.cell>
                    </flux:table.row>
                @endforeach
            </flux:table.rows>
        </flux:table>
    </flux:card>
</x-app>