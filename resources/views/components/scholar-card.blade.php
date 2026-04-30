@props(['scholar'])

<div class="group bg-white rounded-2xl overflow-hidden shadow-[0_2px_12px_rgba(0,0,0,0.06)] hover:shadow-[0_8px_24px_rgba(0,0,0,0.1)] border border-slate-100 transition-all duration-300 flex flex-col h-full relative">
    <!-- Image Section -->
    <a href="{{ route('scholars.show', $scholar->slug) }}" class="relative h-[200px] w-full block shrink-0 overflow-hidden">
        @if($scholar->image)
            <img src="{{ asset('storage/' . $scholar->image) }}" alt="{{ $scholar->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        @else
            <div class="w-full h-full flex items-center justify-center bg-slate-50">
                <span class="material-symbols-outlined text-slate-200 text-6xl">person</span>
            </div>
        @endif
        
        <!-- Online Badge (Top Left) -->
        <div class="absolute top-3 left-3 bg-black/40 backdrop-blur-md text-white text-[10px] font-bold px-2 py-1 rounded-full flex items-center gap-1.5 border border-white/10 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-brand-teal"></span> Online
        </div>
        
        <!-- Favorite Icon (Top Right) -->
        <button class="absolute top-3 right-3 w-8 h-8 bg-black/40 hover:bg-brand-teal transition-colors backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/10 shadow-sm z-10" onclick="event.preventDefault();">
            <span class="material-symbols-outlined text-[18px]" style="font-variation-settings: 'FILL' 0;">favorite</span>
        </button>
    </a>
    
    <!-- Content Section -->
    <div class="px-5 pb-5 pt-4 flex flex-col grow">
        <!-- Line 1: Name + Verified (Left) | Star Rating (Right) -->
        <div class="flex items-center justify-between gap-2 mb-2.5">
            <div class="flex items-center gap-1.5 min-w-0">
                <a href="{{ route('scholars.show', $scholar->slug) }}" class="text-base font-semibold text-slate-800 hover:text-brand-teal transition-colors tracking-tight truncate">
                    {{ $scholar->name }}
                </a>
                @if($scholar->is_verified)
                    <span class="material-symbols-outlined text-brand-teal text-[18px] shrink-0" style="font-variation-settings: 'FILL' 1;" title="Verified Expert">verified</span>
                @endif
            </div>
            <div class="flex items-center gap-1 text-brand-gold text-[13px] font-black shrink-0">
                <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                <span>{{ number_format($scholar->rating ?? 5.0, 1) }}</span>
            </div>
        </div>

        <!-- Line 2: Degree Badge (Left) | Lessons Count (Right) -->
        <div class="flex items-center justify-between gap-4 mb-2">
            @if($scholar->title)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border border-brand-teal text-brand-teal whitespace-nowrap">
                {{ $scholar->title }}
            </span>
            @else
            <div></div>
            @endif
            <span class="text-sm text-slate-400 font-normal">150+ lessons</span>
        </div>
        
        <!-- Line 3: Location Only -->
        <div class="flex items-center gap-1.5 text-slate-600 text-[12px] mb-3.5 min-w-0">
            <span class="material-symbols-outlined text-[16px] shrink-0 text-slate-400">location_on</span>
            <span class="truncate font-medium">{{ $scholar->location ?? 'Lahore/Pakistan' }}</span>
        </div>
        
        <!-- Line 4: Skill Tags/Pills (Full Width Spread) -->
        <div class="flex items-center justify-between gap-3 mb-6 w-full">
            @php
                $tags = array_filter((array) ($scholar->subjects_taught ?? []));
                $displayTags = array_slice($tags, 0, 3);
            @endphp
            
            @foreach($displayTags as $subject)
                <span class="flex-1 text-center px-2 py-1 border border-brand-teal text-brand-teal rounded-full text-[12px] font-medium whitespace-nowrap">
                    {{ $subject }}
                </span>
            @endforeach
        </div>

        <!-- Line 5: Experience (Left) | Button (Right) -->
        <div class="mt-auto pt-4 border-t border-slate-50 flex items-center justify-between gap-4">
            <span class="text-[13px] font-bold text-slate-800">{{ $scholar->teaching_experience ?? '2+ Years' }}</span>
            
            <a href="{{ route('scholars.show', $scholar->slug) }}" class="inline-flex items-center justify-center px-4 py-2 bg-brand-teal text-white hover:bg-brand-teal/90 rounded-lg text-[10px] font-black uppercase tracking-widest transition-all duration-300 shadow-sm active:scale-95 whitespace-nowrap">
                View Scholar
            </a>
        </div>
    </div>
</div>
