@extends('layouts.app')

@section('title', 'Academy Press - Repository of Wisdom')

@section('content')
<div class="bg-slate-50 min-h-screen">
<section class="relative bg-slate-900 overflow-hidden pt-32 pb-24 px-6 border-b border-white/5">
    <!-- Cinematic Background Image -->
    <div class="absolute inset-0 pointer-events-none">
        <img src="https://images.unsplash.com/photo-1457369804613-52c61a468e7d?auto=format&fit=crop&q=80&w=2000" alt="Articles Background" class="w-full h-full object-cover opacity-25 grayscale saturate-50">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/80 to-transparent"></div>
    </div>
    
    <!-- Manuscript Grid Accents -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute inset-0" style="background-image: linear-gradient(to right, #2C8793 1px, transparent 1px), linear-gradient(to bottom, #2C8793 1px, transparent 1px); background-size: 80px 80px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-transparent to-slate-900"></div>
    </div>

    <div class="relative max-w-7xl mx-auto text-center">
        <div class="max-w-2xl mx-auto">
            <div class="inline-flex items-center gap-3 mb-8 px-4 py-1.5 rounded-full border border-brand-teal/30 bg-brand-teal/5">
                <span class="text-brand-teal text-[10px] font-bold uppercase tracking-[0.4em]">Wisdom Repository</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-[1.1] tracking-tight">
                Academy <span class="text-brand-teal">Press</span>
            </h1>
            <p class="text-slate-400 text-lg md:text-xl leading-relaxed font-medium opacity-90">
                Explore a distinguished collection of reflections, research, and scholarly guides curated by the Ejlals Board for the contemporary seeker.
            </p>
        </div>
    </div>
</section>

    <!-- Articles Grid -->
    <div class="max-w-7xl mx-auto px-6 py-20 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($posts as $post)
            <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-700 overflow-hidden flex flex-col h-full bg-slate-50/30">
                <!-- Image Container -->
                <div class="relative aspect-[16/10] overflow-hidden bg-slate-100">
                    @if($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                    @else
                        <div class="w-full h-full bg-slate-900 flex items-center justify-center">
                            <span class="text-brand-gold/20 font-bold uppercase tracking-widest">Ejlals Press</span>
                        </div>
                    @endif
                    <div class="absolute top-6 left-6">
                        <span class="bg-white/90 backdrop-blur-md text-slate-900 text-[10px] font-bold uppercase tracking-widest px-4 py-2 rounded-full border border-slate-100 shadow-sm">
                            {{ $post->category->name ?? 'Article' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="p-10 flex-1 flex flex-col">
                    <div class="flex items-center gap-3 mb-6">
                        <span class="text-brand-gold text-[10px] font-bold uppercase tracking-widest">{{ $post->created_at->format('M d, Y') }}</span>
                        <span class="text-slate-200">|</span>
                        <span class="text-slate-400 text-[10px] font-bold uppercase tracking-widest">Read</span>
                    </div>
                    <h3 class="text-xl font-extrabold text-slate-800 group-hover:text-brand-teal transition-colors mb-4 leading-tight line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-slate-500 text-sm mb-10 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                    
                    <div class="mt-auto pt-8 border-t border-slate-50 flex items-center justify-between">
                        <a href="{{ route('posts.show', $post->slug) }}" class="flex items-center gap-2 text-brand-teal font-extrabold text-xs uppercase tracking-widest group/btn">
                            Full Article
                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center">
                <p class="text-slate-400 italic">No threads of wisdom found in the library yet.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-20">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
