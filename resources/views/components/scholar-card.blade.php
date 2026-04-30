@props(['scholar'])

<div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-[0_2px_10px_-3px_rgba(6,81,237,0.05)] hover:shadow-[0_8px_20px_-6px_rgba(6,81,237,0.1)] transition-all duration-300 flex flex-col h-full group">
    <!-- Image Section -->
    <a href="{{ route('scholars.show', $scholar->slug) }}" class="relative h-[180px] w-full bg-slate-50 block shrink-0 overflow-hidden">
        @if($scholar->image)
            <img src="{{ asset('storage/' . $scholar->image) }}" alt="{{ $scholar->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        @else
            <div class="w-full h-full flex items-center justify-center bg-slate-100">
                <span class="material-symbols-outlined text-slate-300 text-5xl">person</span>
            </div>
        @endif
        
        <!-- Online Badge -->
        <div class="absolute top-3 left-3 bg-slate-900/60 backdrop-blur-md text-white text-[10px] font-medium px-2 py-1 rounded-md flex items-center gap-1.5 border border-white/10 shadow-sm">
            <span class="w-1.5 h-1.5 rounded-full bg-green-400 shadow-[0_0_4px_rgba(74,222,128,0.6)]"></span> Online
        </div>
        
        <!-- Favorite Icon -->
        <button class="absolute top-3 right-3 w-8 h-8 bg-slate-900/40 hover:bg-brand-teal transition-colors backdrop-blur-md rounded-full flex items-center justify-center text-white border border-white/10 shadow-sm z-10" onclick="event.preventDefault();">
            <span class="material-symbols-outlined text-[16px]" style="font-variation-settings: 'FILL' 0;">favorite</span>
        </button>
    </a>
    
    <!-- Content Section -->
    <div class="p-2 flex flex-col grow">
        <!-- Name, Verified & Title Badge -->
        <div class="flex items-start justify-between gap-2 mb-2">
            <div class="flex items-center gap-1 min-w-0">
                <a href="{{ route('scholars.show', $scholar->slug) }}" class="text-[15px] font-bold text-slate-900 hover:text-brand-teal transition-colors truncate">
                    {{ $scholar->name }}
                </a>
                @if($scholar->is_verified)
                    <span class="material-symbols-outlined text-blue-500 text-[16px] shrink-0" style="font-variation-settings: 'FILL' 1;" title="Verified Expert">verified</span>
                @endif
            </div>
            
            @if($scholar->title)
            <div class="shrink-0 mt-0.5">
                <span class="inline-flex items-center px-1.5 py-0.5 rounded text-[9px] font-bold uppercase tracking-widest bg-brand-teal/10 text-brand-teal whitespace-nowrap">
                    {{ $scholar->title }}
                </span>
            </div>
            @endif
        </div>
        
        <!-- Location & Rating -->
        <div class="flex items-center justify-between gap-2 mb-2.5">
            <div class="flex items-center gap-1 text-slate-500 text-[11px] min-w-0">
                <span class="material-symbols-outlined text-[13px] shrink-0 text-slate-400">location_on</span>
                <span class="truncate">{{ $scholar->location ?? 'Global Online' }}</span>
            </div>
            
            <div class="flex items-center gap-1 text-brand-gold text-[11px] shrink-0">
                <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
                <span class="font-bold">{{ number_format($scholar->rating ?? 5.0, 1) }}</span>
            </div>
        </div>
        
        <!-- Tags -->
        <div class="grid grid-cols-2 gap-1.5 mb-2.5">
            @php
                $tags = array_filter((array) ($scholar->subjects_taught ?? []));
                $displayTags = array_slice($tags, 0, 3);
                $remaining = count($tags) - 3;
            @endphp
            
            @foreach($displayTags as $index => $subject)
                @php
                    $isLastOdd = ($index === count($displayTags) - 1 && $remaining === 0 && count($displayTags) % 2 !== 0);
                    $colSpan = $isLastOdd ? 'col-span-2' : 'col-span-1';
                @endphp
                <div class="flex items-center justify-center px-1.5 py-1 bg-slate-50 text-slate-600 rounded text-[10px] font-medium border border-slate-100 overflow-hidden {{ $colSpan }}" title="{{ $subject }}">
                    <span class="truncate">{{ $subject }}</span>
                </div>
            @endforeach
            
            @if($remaining > 0)
                <div class="flex items-center justify-center px-1.5 py-1 bg-brand-teal/5 text-brand-teal rounded text-[10px] font-bold border border-brand-teal/10 overflow-hidden col-span-1">
                    <span class="truncate">+{{ $remaining }}</span>
                </div>
            @endif
        </div>
        
        <!-- Footer Info -->
        <div class="mt-auto pt-2.5 border-t border-slate-100 flex items-center justify-between gap-2">
            <span class="text-[11px] font-bold text-slate-600 truncate">{{ $scholar->teaching_experience ?? '2+ Years' }}</span>
            
            <a href="{{ route('scholars.show', $scholar->slug) }}" class="inline-flex items-center justify-center px-2.5 py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded text-[9px] font-bold uppercase tracking-widest transition-colors shrink-0">
                View Scholar
            </a>
        </div>
    </div>
</div>
