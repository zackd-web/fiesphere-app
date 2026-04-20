<x-layouts.admin title="Dashboard Overview">
    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
        {{-- Card: Total Siswa --}}
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-sm border border-slate-100 dark:border-zinc-800 flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-50 dark:bg-blue-900/20 text-blue-600 rounded-xl flex items-center justify-center">
                <flux:icon.users class="size-6" />
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Total Siswa</p>
                <h3 class="text-2xl font-black text-slate-800 dark:text-white">1,240</h3>
            </div>
        </div>

        {{-- Card: Pendaftar Baru --}}
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-sm border border-slate-100 dark:border-zinc-800 flex items-center gap-4">
            <div class="w-12 h-12 bg-green-50 dark:bg-green-900/20 text-green-600 rounded-xl flex items-center justify-center">
                <flux:icon.clipboard-document-list class="size-6" />
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Pendaftar Baru</p>
                <h3 class="text-2xl font-black text-slate-800 dark:text-white">12</h3>
            </div>
        </div>

        {{-- Card: Promo Aktif --}}
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-sm border border-slate-100 dark:border-zinc-800 flex items-center gap-4">
            <div class="w-12 h-12 bg-amber-50 dark:bg-amber-900/20 text-amber-600 rounded-xl flex items-center justify-center">
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Promo Aktif</p>
                <h3 class="text-2xl font-black text-slate-800 dark:text-white">3</h3>
            </div>
        </div>
        
        {{-- Card: Revenue/Omzet (Optional) --}}
        <div class="bg-white dark:bg-zinc-900 p-6 rounded-md shadow-sm border border-slate-100 dark:border-zinc-800 flex items-center gap-4">
            <div class="w-12 h-12 bg-indigo-50 dark:bg-indigo-900/20 text-indigo-600 rounded-xl flex items-center justify-center">
                <flux:icon.banknotes class="size-6" />
            </div>
            <div>
                <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Omzet Bulan Ini</p>
                <h3 class="text-2xl font-black text-slate-800 dark:text-white">4.5M</h3>
            </div>
        </div>
    </div>

    {{-- Grafik atau Aktivitas Terbaru --}}
    <div class="bg-white dark:bg-zinc-900 rounded-md p-8 border border-slate-100 dark:border-zinc-800 shadow-sm">
        <flux:heading size="lg">Aktivitas Pendaftaran Terakhir</flux:heading>
        <flux:subheading>Siswa yang baru saja mendaftar melalui website Fiesphere.</flux:subheading>
        
        <div class="mt-6">
            {{-- Disini nanti lo bisa masukin tabel ringkas pendaftar --}}
            <flux:text>Belum ada aktivitas pendaftaran hari ini.</flux:text>
        </div>
    </div>
</x-layouts.admin>