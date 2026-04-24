<x-layouts.admin title="Promo & Event">
    {{-- Header Section --}}
    <div class="mb-10 flex items-end justify-between">
        <div class="space-y-1">
            <h3 class="text-lg font-bold text-slate-400  tracking-widest">Manajemen Poster Fiesphere</h3>
            <p class="text-md text-slate-500">Atur tampilan slider promo di halaman utama Fiesphere.</p>
        </div>
        <flux:button href="{{ route('admin.promo.create') }}" variant="primary" icon="plus" class="rounded-md shadow-xl shadow-blue-500/20 font-black py-6">
            TAMBAH POSTER BARU
        </flux:button>
    </div>

    {{-- Grid Promo --}}
    <div class="grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($promos as $item)
            <div class="group bg-white/5 border border-white/10 rounded-md overflow-hidden hover:border-blue-500/50 transition-all duration-500 hover:shadow-2xl hover:shadow-blue-500/10 hover:-translate-y-2">
                
                {{-- Image Area --}}
                <div class="relative aspect-4/3 overflow-hidden">
                    <img src="{{ asset('storage/' . $item->image_path) }}" class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <div class="absolute inset-0 bg-linear-to-t from-[#0f172a] via-transparent to-transparent"></div>
                    <div class="absolute top-6 right-6">
                        <span class="rounded-md border border-white/20 bg-blue-600/40 px-4 py-1.5 text-[10px] font-black tracking-widest text-white backdrop-blur-md  shadow-lg">Active</span>
                    </div>
                </div>

                {{-- Content Area --}}
                <div class="p-8">
                    <h4 class="mb-6 text-lg font-black text-white  tracking-tight truncate">{{ $item->title }}</h4>

                    <div class="flex items-center gap-3">
                        <a href="{{ route('admin.promo.edit', $item->id) }}" 
                           class="flex-1 rounded-md bg-white/5 hover:bg-blue-600 text-white text-center font-bold py-4 text-xs  tracking-widest transition-all">
                            Edit Data
                        </a>

                        {{-- TRIGGER MODAL HAPUS --}}
                        <flux:modal.trigger name="delete-promo-{{ $item->id }}">
                            <button class="p-4 bg-white/5 text-red-400 hover:bg-red-500 hover:text-white rounded-md transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </flux:modal.trigger>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    {{-- MODAL SECTION — Berada di luar grid agar tidak merusak layout --}}
    @foreach($promos as $item)
        <flux:modal name="delete-promo-{{ $item->id }}" class="max-w-sm bg-[#0f172a] border border-white/10 rounded-md p-8 shadow-2xl">
            <form action="{{ route('admin.promo.destroy', $item->id) }}" method="POST">
                @csrf
                @method('DELETE')
                
                <div class="text-center space-y-6">
                    {{-- Ikon Peringatan --}}
                    <div class="mx-auto w-20 h-20 rounded-md bg-red-500/10 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-10 text-red-500"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z" /></svg>
                    </div>

                    <div class="space-y-2">
                        <h4 class="text-xl font-black text-white  tracking-tight">Hapus Poster?</h4>
                        <p class="text-sm text-slate-400">Poster <span class="text-white font-bold">"{{ $item->title }}"</span> akan dihapus permanen dari sistem.</p>
                    </div>

                    <div class="flex flex-col gap-3 pt-4">
                        <button type="submit" class="w-full py-4 bg-red-600 hover:bg-red-700 text-white rounded-md font-black text-xs  tracking-widest transition-all shadow-xl shadow-red-500/20">
                            Konfirmasi Hapus
                        </button>
                        <flux:modal.close>
                            <button type="button" class="w-full py-4 text-slate-500 hover:text-white font-bold text-xs  tracking-widest transition-colors">
                                Batalkan
                            </button>
                        </flux:modal.close>
                    </div>
                </div>
            </form>
        </flux:modal>
    @endforeach
</x-layouts.admin>