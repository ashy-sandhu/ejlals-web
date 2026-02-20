@extends('layouts.app')

@section('title', 'Academy Press - Repository of Wisdom')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <!-- Sophisticated Header -->
    <div class="bg-slate-900 pt-32 pb-48 px-6 relative overflow-hidden text-center">
        <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/carbon-fibre.png')] opacity-10"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.5em] mb-6 block">Documenting the Journey</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-8 tracking-tight">The Library</h1>
            <p class="text-white/50 max-w-2xl mx-auto text-lg leading-relaxed">Reflections, research, and scholarly guides curated by the Ejlals Board.</p>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="max-w-7xl mx-auto px-6 -mt-24 pb-32">
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
