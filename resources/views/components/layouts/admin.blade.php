<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    <style>
        /* Memastikan Sidebar dan Body memiliki warna Deep Navy yang sama */
        [data-flux-sidebar] {
            background-color: #0f172a !important;
            border-right: 1px solid rgba(255,255,255,0.05) !important;
        }
        .nav-active {
            background-color: #2563eb !important; /* Biru Cerah */
            color: white !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.2);
        }
    </style>
</head>

<body class="min-h-screen bg-[#0f172a] antialiased flex">
    
    <aside class="w-72 bg-[#0f172a] text-slate-300 flex flex-col sticky top-0 h-screen z-50 border-r border-white/5">
        
        <div class="p-8 mb-4">
            <div class="flex items-center gap-3">
                <h1 class="text-2xl font-black text-white tracking-tighter font-sans">Fie<span class="text-blue-500">Sphere</span></h1>
            </div>
        </div>

        <nav class="flex-1 px-4 space-y-2">
            @php
                $menus = [
                    [
                        'name' => 'Dashboard', 
                        'route' => 'dashboard', 
                        'svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />'
                    ],

                    [
                        'name' => 'Promo & Event', 
                        'route' => 'admin.promo.index', 
                        'svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 1 1 0-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.448a13.435 13.435 0 0 1-1.316-4.225m2.92-9.18c.253-.962.584-1.892.985-2.783.247-.55.06-1.21-.463-1.511l-.657-.38c-.551-.318-1.26-.117-1.527-.448a13.435 13.435 0 0 0-1.316 4.225m1.316 4.95a12.975 12.975 0 0 0 2.924-3.636M10.34 10.89a12.975 12.975 0 0 1 2.924 3.636m0 0a12.975 12.975 0 0 1-2.924 3.636M13.264 14.53a12.975 12.975 0 0 0-2.924-3.636m2.924 3.636 4.545 3.636m0 0 1.136.91c.642.513 1.545.057 1.545-.772v-7.5c0-.83-.903-1.285-1.545-.772l-1.136.91-4.545 3.636Z" />'
                    ],
                    [
                        'name' => 'Kursus', 
                        'route' => 'admin.program.index', 
                        'svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.174L11.24 7.47a.75.75 0 0 1 .52 0l6.98 2.704a.375.375 0 0 1 0 .696L11.76 13.57a.75.75 0 0 1-.52 0L4.26 10.87a.375.375 0 0 1 0-.696Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.174l7.5 2.906 7.5-2.906M12 13.174v6.75m0 0l-3-3m3 3l3-3" />'
                    ],
                    [
                        'name' => 'Mentor', 
                        'route' => 'admin.mentor.index', 
                        'svg' => '<path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />'
                    ],
                ];
            @endphp

            @foreach($menus as $menu)
                @php $isActive = request()->routeIs($menu['route']); @endphp
                <a href="{{ route($menu['route']) }}" 
                   class="flex items-center gap-4 px-6 py-4 transition-all duration-200 group
                   {{ $isActive ? 'nav-active' : 'hover:bg-white/5 hover:text-white rounded-2xl' }}">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                         class="size-6 {{ $isActive ? 'text-white' : 'text-slate-400 group-hover:text-white' }}">
                        {!! $menu['svg'] !!}
                    </svg>
                    
                    <span class="text-base font-bold tracking-tight">{{ $menu['name'] }}</span>
                </a>
            @endforeach
        </nav>

        <div class="p-6">
            <div class="bg-white/5 border border-white/10 rounded-[28px] p-4 flex items-center justify-between gap-4">
                <div class="flex items-center gap-4 overflow-hidden">
                    <div class="flex flex-col overflow-hidden">
                        <span class="text-sm font-black text-white uppercase tracking-tight truncate">{{ auth()->user()->name }}</span>
                        <span class="text-[10px] text-white-500 font-bold uppercase tracking-widest">Admin</span>
                    </div>
                </div>

                {{-- Tombol Logout --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="p-2 text-slate-400 hover:text-red-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>


    </aside>

    <main class="flex-1 p-10 bg-[#0f172a] h-screen overflow-y-auto">
        <div class="flex items-center justify-between mb-12">
            <h2 class="text-3xl font-black text-white tracking-tighter uppercase">{{ $title ?? 'Dashboard' }}</h2>
            <!-- <div class="flex items-center gap-6">
                <div class="relative group">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" 
                         class="absolute left-4 top-1/2 -translate-y-1/2 size-4 text-slate-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                    <input type="text" placeholder="Cari data..." 
                           class="bg-white/5 border border-white/10 rounded-2xl py-3 pl-12 pr-6 text-sm w-72 text-white focus:outline-none focus:ring-4 focus:ring-blue-500/10 focus:border-blue-500 transition-all">
                </div>
                <button class="w-12 h-12 bg-white/5 border border-white/10 rounded-2xl flex items-center justify-center text-slate-400 hover:text-white transition-all">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" />
                    </svg>
                </button>
            </div> -->
        </div>

        <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
            {{ $slot }}
        </div>
    </main>

    @fluxScripts
</body>
</html>