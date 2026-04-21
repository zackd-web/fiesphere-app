<x-layouts.admin title="Manajemen Program & Harga">
    <div class="mb-10 flex items-end justify-between">
        <div class="space-y-1">
            <h3 class="text-lg font-bold text-slate-400 uppercase tracking-widest">Daftar Paket Kursus</h3>
            <p class="text-sm text-slate-500">Atur paket investasi pendidikan yang tampil di landing page Fiesphere.</p>
        </div>
        <flux:button href="{{ route('admin.program.create') }}" variant="primary" icon="plus" class="rounded-md shadow-xl shadow-blue-500/20 font-black py-6">
            TAMBAH PAKET BARU
        </flux:button>
    </div>

    <div class="bg-white/5 border border-white/10 rounded-md overflow-hidden shadow-2xl">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-white/5 border-white/10 text-[17px] font-black text-slate-400 uppercase tracking-[0.2em]">
                        <th class="px-8 py-6">Nama Paket</th>
                        <th class="px-8 py-6">Harga & Durasi</th>
                        <th class="px-8 py-6">Fitur Unggulan</th>
                        <th class="px-8 py-6">Status</th>
                        <th class="px-8 py-6 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($programs as $item)
                        <tr class="hover:bg-white/2 transition-colors group">
                            <td class="px-8 py-6">
                                <span class="text-lg font-black text-white uppercase tracking-tight">{{ $item->title }}</span>
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex flex-col">
                                    <span class="text-blue-400 font-black">Rp {{ $item->price }}</span>
                                    <span class="text-[10px] text-slate-500 font-bold uppercase tracking-widest">{{ $item->duration }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6">
                                <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-md bg-white/5 border border-white/10 text-xs font-bold text-slate-300">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-3 text-blue-500">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    {{ count($item->features) }} Poin Fitur
                                </span>
                            </td>
                            <td class="px-8 py-6">
                                @if($item->is_featured)
                                    <span class="px-4 py-1 rounded-md bg-blue-600/20 border border-blue-500/30 text-[10px] font-black text-blue-400 uppercase tracking-widest">Recommended</span>
                                @else
                                    <span class="px-4 py-1 rounded-md bg-white/5 border border-white/10 text-[10px] font-black text-slate-500 uppercase tracking-widest">Standard</span>
                                @endif
                            </td>
                            <td class="px-8 py-6">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.program.edit', $item->id) }}" class="p-3 bg-white/5 hover:bg-blue-600 text-slate-400 hover:text-white rounded-md transition-all">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                                        </svg>
                                    </a>
                                    
                                    <flux:modal.trigger name="delete-program-{{ $item->id }}">
                                        <button class="p-3 bg-white/5 hover:bg-red-600/20 text-red-400 hover:text-red-500 rounded-md transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </flux:modal.trigger>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-8 py-20 text-center">
                                <div class="flex flex-col items-center opacity-20">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" class="size-20 mb-4">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75-6.75a9.001 9.001 0 0 1 14.502-7.006 9 9 0 0 1-2.002 12.756M12 9v3.75m0 0 3 3m-3-3l-3 3" />
                                    </svg>
                                    <p class="font-black uppercase tracking-widest">Belum ada paket program</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modals Loop --}}
    @foreach($programs as $item)
        <flux:modal name="delete-program-{{ $item->id }}" class="max-w-sm rounded-md p-10 bg-[#0f172a] border border-white/10">
            <form action="{{ route('admin.program.destroy', $item->id) }}" method="POST">
                @csrf @method('DELETE')
                <div class="text-center space-y-6">
                    <div class="mx-auto w-20 h-20 bg-red-500/10 rounded-md flex items-center justify-center border-4 border-red-500/20">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-10 text-red-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div class="space-y-2">
                        <h4 class="font-black text-white uppercase tracking-tight">Hapus Program?</h4>
                        <p class="text-slate-400 text-sm leading-relaxed">Paket <span class="text-white font-bold">{{ $item->title }}</span> bakal dihapus permanen. Data siswa yang terdaftar mungkin terpengaruh.</p>
                    </div>
                    <div class="flex flex-col gap-3">
                        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white rounded-md font-black uppercase tracking-widest text-xs border-0 transition-all shadow-lg shadow-red-600/20">Hapus Sekarang</button>
                        <flux:modal.close><button type="button" class="w-full py-4 bg-white/5 text-slate-400 rounded-md font-bold uppercase tracking-widest text-xs hover:bg-white/10 transition-all">Batal</button></flux:modal.close>
                    </div>
                </div>
            </form>
        </flux:modal>
    @endforeach
</x-layouts.admin>