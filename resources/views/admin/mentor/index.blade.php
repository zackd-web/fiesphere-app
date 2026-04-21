<x-layouts.admin title="Manajemen Mentor">
    {{-- Header Section --}}
    <div class="mb-10 flex items-end justify-between">
        <div class="space-y-1">
            <h3 class="text-lg font-bold text-slate-400 uppercase tracking-widest">Daftar Mentor Edusphere</h3>
            <p class="text-sm text-slate-500">Kelola seluruh profil tenaga pengajar profesional Anda dalam satu tabel terpusat.</p>
        </div>
        <flux:button href="{{ route('admin.mentor.create') }}" variant="primary" icon="plus" class="rounded-md shadow-xl shadow-blue-500/20 font-black py-6">
            TAMBAH MENTOR BARU
        </flux:button>
    </div>

    {{-- Empty State Logic --}}
    @if($mentors->isEmpty())
        <div class="flex flex-col items-center justify-center py-32 bg-white/5 border border-white/10 rounded-md text-center">
            <div class="h-20 w-20 bg-white/5 rounded-md flex items-center justify-center mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-10 text-slate-600"><path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 <PASSWORD>">
            </div>
            <h4 class="text-white font-black uppercase tracking-tight">Belum Ada Mentor</h4>
            <p class="text-slate-500 text-sm mt-2">Daftar pengajar Anda akan muncul di sini setelah Anda menambahkannya.</p>
        </div>
    @else
        {{-- Table Container --}}
        <div class="bg-white/5 border border-white/10 rounded-md overflow-hidden shadow-2xl">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-white/5 border-white/10 text-[17px] font-black text-slate-400 uppercase tracking-[0.2em]">
                            <th class="px-8 py-6 ">Mentor</th>
                            <th class="px-6 py-6 text-center ">Badge</th>
                            <th class="px-6 py-6">Tags & Expertise</th>
                            <th class="px-6 py-6 text-center">Order</th>
                            <th class="px-6 py-6 text-center">Status</th>
                            <th class="px-8 py-6 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/5">
                        @foreach($mentors as $mentor)
                            <tr class="group hover:bg-white/2 transition-colors">
                                {{-- Info Mentor --}}
                                <td class="px-8 py-5">
                                    <div class="flex items-center gap-4">
                                        <div class="h-12 w-12 rounded-md overflow-hidden border border-white/10 bg-slate-800 shrink-0">
                                            {{-- Field asli adalah photo_path --}}
                                            <img src="{{ asset('storage/' . $mentor->photo_path) }}" class="h-full w-full object-cover">
                                        </div>
                                        <div class="flex flex-col">
                                            <span class="text-sm font-black text-white uppercase tracking-tight">{{ $mentor->name }}</span>
                                            {{-- Field asli adalah specialization --}}
                                            <span class="text-[10px] font-bold text-blue-500 uppercase tracking-widest">{{ $mentor->specialization }}</span>
                                        </div>
                                    </div>
                                </td>

                                {{-- Expertise Badge --}}
                                <td class="px-6 py-5 text-center">
                                    @if($mentor->expertise_badge)
                                        <span class="bg-fiesphere-yellow text-fiesphere-blue px-3 py-1 rounded-md text-[9px] font-black uppercase tracking-tighter shadow-sm">
                                            {{ $mentor->expertise_badge }}
                                        </span>
                                    @else
                                        <span class="text-slate-600 text-[10px] italic">No Badge</span>
                                    @endif
                                </td>

                                {{-- Tags (Casted as Array) --}}
                                <td class="px-6 py-5">
                                    <div class="flex flex-wrap gap-1.5 max-w-50">
                                        @foreach($mentor->tags ?? [] as $tag)
                                            <span class="px-2 py-0.5 bg-white/5 border border-white/5 text-[8px] font-bold text-slate-400 rounded-md uppercase tracking-wider">
                                                {{ $tag }}
                                            </span>
                                        @endforeach
                                    </div>
                                </td>

                                {{-- Order --}}
                                <td class="px-6 py-5 text-center">
                                    <span class="text-[11px] font-black text-white bg-white/5 w-8 h-8 inline-flex items-center justify-center rounded-md border border-white/5">
                                        {{ $mentor->order }}
                                    </span>
                                </td>

                                {{-- Status (Boolean) --}}
                                <td class="px-6 py-5 text-center">
                                    <span class="h-2 w-2 inline-block rounded-md {{ $mentor->is_active ? 'bg-green-500 shadow-[0_0_8px_rgba(34,197,94,0.6)]' : 'bg-red-500 shadow-[0_0_8px_rgba(239,68,68,0.6)]' }}"></span>
                                </td>

                                {{-- Actions --}}
                                <td class="px-8 py-5 text-right">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.mentor.edit', $mentor->id) }}" class="p-3 bg-white/5 hover:bg-blue-600 text-white rounded-md transition-all">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" /></svg>
                                        </a>

                                        {{-- Trigger Modal Hapus --}}
                                        <flux:modal.trigger name="delete-mentor-{{ $mentor->id }}">
                                            <button class="p-3 bg-white/5 text-red-400 hover:bg-red-500 hover:text-white rounded-md transition-all">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-4"><path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" /></svg>
                                            </button>
                                        </flux:modal.trigger>
                                    </div>

                                    {{-- Modal Konfirmasi (Inside row for context) --}}
                                    <flux:modal name="delete-mentor-{{ $mentor->id }}" class="max-w-sm bg-[#0f172a] border border-white/10 rounded-[40px] p-8 shadow-2xl text-left">
                                        <form action="{{ route('admin.mentor.destroy', $mentor->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <div class="text-center space-y-6">
                                                <div class="mx-auto w-20 h-20 rounded-md bg-red-500/10 flex items-center justify-center">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-10 text-red-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                                                </div>

                                                <div class="space-y-2">
                                                    <h4 class="text-xl font-black text-white uppercase tracking-tight">Hapus Mentor?</h4>
                                                    <p class="text-sm text-slate-400 leading-relaxed">Data mentor <span class="text-white font-bold">"{{ $mentor->name }}"</span> akan dihapus permanen beserta fotonya dari sistem.</p>
                                                </div>

                                                <div class="flex flex-col gap-3 pt-4">
                                                    <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white rounded-md font-black text-xs uppercase tracking-widest transition-all shadow-xl shadow-red-500/20">
                                                        Ya, Hapus Sekarang
                                                    </button>
                                                    <flux:modal.close>
                                                        <button type="button" class="w-full py-4 text-slate-500 hover:text-white font-bold text-xs uppercase tracking-widest transition-colors">
                                                            Batalkan
                                                        </button>
                                                    </flux:modal.close>
                                                </div>
                                            </div>
                                        </form>
                                    </flux:modal>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</x-layouts.admin>