<section id="pricing" class="py-24 bg-slate-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-extrabold text-fiesphere-blue mb-4">Investasi Pendidikan Anda</h2>
            <p class="text-slate-500">Pilih paket yang paling sesuai dengan target dan budget Anda.</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto items-start">
            @foreach($programs as $plan)
                @if($plan->is_featured)
                    <div class="p-10 bg-fiesphere-blue text-white rounded-[32px] shadow-2xl relative space-y-8 lg:-mt-4">
                        @if($plan->badge)
                            <div class="absolute top-0 right-0 bg-fiesphere-yellow text-fiesphere-blue px-6 py-1.5 rounded-bl-2xl font-bold text-xs uppercase">{{ $plan->badge }}</div>
                        @endif
                        <div>
                            <h4 class="text-lg font-bold text-blue-200 uppercase tracking-widest mb-2">{{ $plan->title }}</h4>
                            <div class="flex items-end gap-1">
                                <span class="text-4xl font-extrabold text-fiesphere-yellow">Rp {{ $plan->price }}</span>
                                <span class="text-blue-300 text-sm mb-1">{{ $plan->duration }}</span>
                            </div>
                        </div>
                        <ul class="space-y-4 font-medium text-blue-100">
                            @foreach($plan->features as $feature)
                                <li class="flex items-center gap-3"><i data-lucide="check" class="text-fiesphere-yellow w-5 h-5"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ $plan->button_link }}" class="block w-full text-center py-4 bg-fiesphere-yellow text-fiesphere-blue rounded-xl font-bold shadow-lg hover:brightness-110 transition-all uppercase tracking-wider">{{ $plan->button_text }}</a>
                    </div>
                @else
                    <div class="p-10 border border-slate-200 bg-white rounded-[32px] space-y-8 hover:border-fiesphere-blue transition-colors group">
                        <div>
                            <h4 class="text-lg font-bold text-slate-400 uppercase tracking-widest mb-2">{{ $plan->title }}</h4>
                            <div class="flex items-end gap-1">
                                <span class="text-4xl font-extrabold text-fiesphere-blue">Rp {{ $plan->price }}</span>
                                <span class="text-slate-400 text-sm mb-1">{{ $plan->duration }}</span>
                            </div>
                        </div>
                        <ul class="space-y-4 text-slate-600 font-medium">
                            @foreach($plan->features as $feature)
                                <li class="flex items-center gap-3"><i data-lucide="check" class="text-green-500 w-5 h-5"></i> {{ $feature }}</li>
                            @endforeach
                        </ul>
                        <a href="{{ $plan->button_link }}" class="block w-full text-center py-3 border-2 border-fiesphere-blue text-fiesphere-blue rounded-xl font-bold group-hover:bg-fiesphere-blue group-hover:text-white transition-all">{{ $plan->button_text }}</a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>