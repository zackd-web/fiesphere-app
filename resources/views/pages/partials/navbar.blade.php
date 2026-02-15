<header class="fixed w-full z-50 bg-fiesphere-white backdrop-blur-md border-b border-slate-100">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <div class="flex items-center gap-2">
                <img src="{{ asset('images/fiesphere.png') }}" alt="Logo Fiesphere" class="w-60 h-auto">
            </div>
            
            <div class="hidden lg:flex items-center gap-10 text-sm font-semibold text-fiesphere-blue uppercase tracking-wide">
                <a href="#home" class="hover:text-fiesphere-yellow transition-colors">Beranda</a>
                <a href="#about" class="hover:text-fiesphere-yellow transition-colors">Tentang</a>
                <a href="#programs" class="hover:text-fiesphere-yellow transition-colors">Program</a>
                <a href="#pricing" class="hover:text-fiesphere-yellow transition-colors">Biaya</a>
                <a href="#register" class="bg-fiesphere-yellow px-6 py-2.5 rounded-full text-fiesphere-blue hover:shadow-lg transition-all">Daftar Sekarang</a>
            </div>

            <button class="lg:hidden text-fiesphere-blue" id="mobile-toggle">
                <i data-lucide="menu" class="w-8 h-8"></i>
            </button>
        </nav>
        
        <!-- Mobile Dropdown -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-white border-b border-slate-100 flex flex-col p-6 gap-4 text-center font-bold text-fiesphere-blue">
            <a href="#home">Beranda</a>
            <a href="#about">Tentang</a>
            <a href="#programs">Program</a>
            <a href="#pricing">Biaya</a>
            <a href="#register" class="text-amber-600">Daftar Sekarang</a>
        </div>
    </header>