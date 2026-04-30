@extends('layouts.app')

@section('title', 'Scholars Directory - Ejlals Academy')

@section('content')
<div class="bg-slate-50 min-h-screen py-8 lg:py-12">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div class="max-w-2xl">
                <h1 class="text-3xl md:text-4xl font-serif font-black text-slate-900 tracking-tight mb-3">Our Expert Scholars</h1>
                <p class="text-slate-500 text-sm leading-relaxed font-medium">
                    Connect with our verified Islamic scholars and academic experts. Browse profiles, check availability, and book your free demo session.
                </p>
            </div>
        </div>

        <!-- Directory Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($scholars as $scholar)
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden shadow-sm hover:shadow-md transition-all duration-300 flex flex-col group">
                <!-- Image Section -->
                <a href="{{ route('scholars.show', $scholar->slug) }}" class="relative h-48 w-full bg-slate-100 block overflow-hidden">
                    @if($scholar->image)
                        <img src="{{ asset('storage/' . $scholar->image) }}" alt="{{ $scholar->name }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                    @else
                        <div class="w-full h-full flex items-center justify-center bg-slate-200">
                            <span class="material-symbols-outlined text-slate-400 text-5xl">person</span>
                        </div>
                    @endif
                    
                    <!-- Online Badge -->
                    <div class="absolute top-3 left-3 bg-slate-900/60 backdrop-blur-sm text-white text-[10px] font-medium px-2.5 py-1 rounded-full flex items-center gap-1.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-green-500 shadow-[0_0_4px_rgba(34,197,94,0.8)]"></span> Online
                    </div>
                    
                    <!-- Favorite Icon -->
                    <button class="absolute top-3 right-3 size-8 bg-slate-900/40 hover:bg-slate-900/60 transition-colors backdrop-blur-sm rounded-full flex items-center justify-center text-white z-10" onclick="event.preventDefault();">
                        <span class="material-symbols-outlined text-[16px]">favorite_border</span>
                    </button>
                </a>
                
                <!-- Content Section -->
                <div class="p-5 flex flex-col flex-grow">
                    <!-- Name & Verified -->
                    <div class="flex items-center gap-1.5 mb-0.5">
                        <a href="{{ route('scholars.show', $scholar->slug) }}" class="text-[17px] font-bold text-slate-900 hover:text-brand-teal transition-colors line-clamp-1">
                            {{ $scholar->name }}
                        </a>
                        @if($scholar->is_verified)
                            <span class="material-symbols-outlined text-blue-500 text-[18px]" style="font-variation-settings: 'FILL' 1;" title="Verified Expert">verified</span>
                        @endif
                    </div>
                    
                    <!-- Subject/Title -->
                    <p class="text-slate-600 text-[13px] mb-2.5 line-clamp-1">{{ $scholar->title }}</p>
                    
                    <!-- Location -->
                    <div class="flex items-center gap-1 text-slate-500 text-xs mb-4">
                        <span class="material-symbols-outlined text-[14px]">location_on</span>
                        <span class="truncate">{{ $scholar->location ?? 'Global Online' }}</span>
                    </div>
                    
                    <!-- Tags -->
                    <div class="flex flex-wrap gap-2 mb-5">
                        @php
                            $tagColors = [
                                'bg-purple-50 text-purple-600',
                                'bg-blue-50 text-blue-600',
                                'bg-emerald-50 text-emerald-600',
                                'bg-amber-50 text-amber-600',
                                'bg-rose-50 text-rose-600',
                            ];
                        @endphp
                        @foreach(array_slice($scholar->subjects_taught ?? [], 0, 3) as $index => $subject)
                            <span class="px-2.5 py-1 {{ $tagColors[$index % count($tagColors)] }} rounded-md text-[11px] font-medium">{{ $subject }}</span>
                        @endforeach
                        @if(count($scholar->subjects_taught ?? []) > 3)
                            <span class="px-2.5 py-1 bg-slate-50 text-slate-500 rounded-md text-[11px] font-medium border border-slate-100">+{{ count($scholar->subjects_taught) - 3 }}</span>
                        @endif
                    </div>
                    
                    <!-- Footer Info -->
                    <div class="mt-auto pt-4 border-t border-slate-50 flex items-center gap-3 text-[13px] font-medium text-slate-700">
                        <div class="flex items-center gap-1">
                            <span class="material-symbols-outlined text-amber-400 text-[16px]" style="font-variation-settings: 'FILL' 1;">star</span>
                            <span>{{ $scholar->rating }}</span>
                        </div>
                        <span class="text-slate-300">•</span>
                        <span class="text-slate-500 truncate">{{ $scholar->teaching_experience }} Exp</span>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-4">search_off</span>
                <p class="text-slate-500 text-lg">No scholars found matching your criteria.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $scholars->links() }}
        </div>
    </div>
</div>
@endsection
