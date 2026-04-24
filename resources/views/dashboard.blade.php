<x-layouts.admin>
    {{-- Statistik Dinamis --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
        {{-- Card: Promo Aktif --}}
        <div class="bg-white/5 border border-white/10 p-8 rounded-md flex items-center gap-6 shadow-2xl transition-all hover:border-blue-500/30">
            <div class="w-14 h-14 bg-blue-600/20 text-blue-500 rounded-md flex items-center justify-center">
                <flux:icon.megaphone class="size-7" />
            </div>
            <div>
                <p class="text-md font-black text-white tracking-[0.2em]">Promo Aktif</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $promos->count() ?? 0 }}</h3>
            </div>
        </div>

        {{-- Card: Mentor Pengajar --}}
        <div class="bg-white/5 border border-white/10 p-8 rounded-md flex items-center gap-6 shadow-2xl transition-all hover:border-blue-500/30">
            <div class="w-14 h-14 bg-purple-600/20 text-purple-500 rounded-md flex items-center justify-center">
                <flux:icon.users class="size-7" />
            </div>
            <div>
                <p class="text-md font-black text-white tracking-[0.2em]">Mentor Aktif</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $mentors->count() ?? 0 }}</h3>
            </div>
        </div>

        {{-- Card: Program Kursus --}}
        <div class="bg-white/5 border border-white/10 p-8 rounded-md flex items-center gap-6 shadow-2xl transition-all hover:border-blue-500/30">
            <div class="w-14 h-14 bg-emerald-600/20 text-emerald-500 rounded-md flex items-center justify-center">
                <flux:icon.academic-cap class="size-7" />
            </div>
            <div>
                <p class="text-md font-black text-white tracking-[0.2em]">Paket Kursus</p>
                <h3 class="text-2xl font-black text-white mt-1">{{ $programs->count() ?? 0 }}</h3>
            </div>
        </div>
    </div>
</x-layouts.admin>