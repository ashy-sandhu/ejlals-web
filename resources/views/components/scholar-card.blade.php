@props(['scholar'])

<div class="group bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.06)] hover:shadow-[0_20px_40px_rgba(0,0,0,0.12)] hover:-translate-y-1 border border-slate-100 transition-all duration-300 flex flex-col h-full relative">
    <!-- Image Section -->
    <a href="{{ route('scholars.show', $scholar->slug) }}" class="relative h-[200px] w-full block shrink-0 overflow-hidden">
        @if($scholar->image)
            <img src="{{ asset('storage/' . $scholar->image) }}" alt="{{ $scholar->image_alt ?? $scholar->name }}" class="w-full object-cover transition-transform duration-700 group-hover:scale-110">
        @else
            <div class="w-full h-full flex items-center justify-center bg-slate-50">
                <span class="material-symbols-outlined text-slate-200 text-6xl">person</span>
            </div>
        @endif

        <!-- Gradient Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-60"></div>
        
        <!-- Online Badge (Top Left) -->
        <div class="absolute top-3 left-3 bg-white/90 backdrop-blur-md text-slate-900 text-[10px] font-bold px-3 py-1 rounded-full flex items-center gap-1.5 shadow-sm border border-white/20">
            <span class="relative flex h-2 w-2">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
            </span>
            Online
        </div>
        
        <!-- Favorite Icon (Top Right) -->
        <button class="absolute top-3 right-3 w-8 h-8 bg-white/90 hover:bg-brand-gold hover:text-white transition-all duration-300 backdrop-blur-md rounded-full flex items-center justify-center text-slate-900 shadow-sm z-10 hover:scale-110" onclick="event.preventDefault();">
            <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0;">favorite</span>
        </button>
    </a>
    
    <!-- Content Section -->
    <div class="px-4 py-4.5 flex flex-col grow">
        <!-- Line 1: Name + Star Rating -->
        <div class="flex items-center justify-between gap-2 mb-3">
            <div class="flex items-center gap-1.5 min-w-0">
                <a href="{{ route('scholars.show', $scholar->slug) }}" class="text-[15px] font-bold text-slate-800 hover:text-brand-teal transition-colors tracking-tight truncate">
                    {{ $scholar->name }}
                </a>
            </div>
            <div class="flex items-center gap-1 shrink-0">
                <span class="material-symbols-outlined text-brand-gold !text-[13px]" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="text-[13px] font-bold text-slate-700">{{ number_format($scholar->rating ?? 5.0, 1) }}</span>
            </div>
        </div>

        <!-- Line 2: Subject/Title Badge (Left) | Ejlals Tested Badge (Right) -->
        <div class="flex items-center justify-between gap-2 mb-3">
            @if($scholar->title)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[10px] font-semibold bg-brand-teal/10 text-brand-teal border border-brand-teal/10 uppercase tracking-wider whitespace-nowrap">
                {{ $scholar->title }}
            </span>
            @else
            <div></div>
            @endif

            @if($scholar->is_verified)
            <div class="flex items-center gap-1 text-[10px] font-semibold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded-full border border-emerald-100 shadow-[0_1px_2px_rgba(0,0,0,0.02)] uppercase tracking-wider">
                <span class="material-symbols-outlined !text-[12px] leading-none" style="font-variation-settings: 'FILL' 1;">verified</span>
                <span>Tested</span>
            </div>
            @endif
        </div>
        
        <!-- Line 3: Location Only -->
        <div class="flex items-center gap-1.5 text-slate-500 text-xs mb-3 min-w-0">
            <span class="material-symbols-outlined !text-[14px] shrink-0 text-slate-400">location_on</span>
            <span class="truncate font-medium">{{ $scholar->location ?? 'Lahore, Pakistan' }}</span>
        </div>
        
        <!-- Line 4: Skill Tags (Elegant Gold) -->
        <div class="flex items-center gap-2 mb-3.5 w-full overflow-hidden">
            @php
                $tags = array_filter((array) ($scholar->subjects_taught ?? []));
                $displayTags = array_slice($tags, 0, 3);
            @endphp
            
            @foreach($displayTags as $subject)
                <span class="px-2.5 py-0.5 bg-brand-gold/10 text-brand-gold/90 rounded-full text-[10px] font-semibold whitespace-nowrap uppercase tracking-wider border border-brand-gold/10">
                    {{ $subject }}
                </span>
            @endforeach
        </div>

        <!-- Line 5: Combined Info Row + CTA -->
        <div class="mt-auto pt-3 border-t border-slate-100 flex items-center justify-between gap-3">
            <div class="flex items-center text-[11px] font-medium text-slate-500 whitespace-nowrap">
                <span>{{ $scholar->teaching_experience ?? '3+ Years' }}</span>
                <span class="mx-1.5 opacity-30">•</span>
                <span>{{ $scholar->lessons_count ?? '150+' }} Lessons</span>
            </div>
            
            <a href="{{ route('scholars.show', $scholar->slug) }}" class="h-8 px-4 inline-flex items-center justify-center bg-brand-gold text-white hover:bg-brand-gold/90 rounded-lg text-[11px] font-bold transition-all duration-300 shadow-sm active:scale-95 whitespace-nowrap">
                View Profile
            </a>
        </div>
    </div>
</div>
