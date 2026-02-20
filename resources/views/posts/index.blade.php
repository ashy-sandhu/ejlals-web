@extends('layouts.app')

@section('title', 'Academy Press - Knowledge Library')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <!-- Header -->
    <div class="bg-slate-900 pt-32 pb-40 px-6 relative overflow-hidden text-center">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-[400px] h-[400px] bg-brand-teal rounded-full blur-[100px]"></div>
        </div>
        <div class="max-w-7xl mx-auto relative z-10">
            <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.4em] mb-4 block">The Academy Library</span>
            <h1 class="text-4xl md:text-6xl font-extrabold text-white mb-6">Latest Articles</h1>
            <p class="text-white/60 max-w-2xl mx-auto text-lg leading-relaxed">Explore research, scholarly insights, and guides curated by our expert editorial board.</p>
        </div>
    </div>

    <!-- Articles Grid -->
    <div class="max-w-7xl mx-auto px-6 -mt-20 pb-32">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($posts as $post)
            <div class="group bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-700 overflow-hidden flex flex-col h-full p-4">
                <!-- Image Container -->
                <div class="relative aspect-[16/10] rounded-[2rem] overflow-hidden bg-slate-100 mb-8">
                    @if($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                            <svg class="w-12 h-12 text-brand-teal/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                        </div>
                    @endif
                    <div class="absolute top-6 left-6">
                        <span class="bg-white/95 backdrop-blur-md text-brand-teal text-[10px] font-bold uppercase tracking-widest px-4 py-2 rounded-full shadow-sm border border-slate-100">
                            {{ $post->category->name ?? 'Article' }}
                        </span>
                    </div>
                </div>

                <!-- Content -->
                <div class="px-6 pb-6 flex-1 flex flex-col">
                    <h3 class="text-xl font-extrabold text-slate-800 group-hover:text-brand-teal transition-colors mb-4 leading-tight line-clamp-2">{{ $post->title }}</h3>
                    <p class="text-slate-500 text-sm mb-8 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>
                    
                    <div class="mt-auto pt-8 border-t border-slate-50 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded-full bg-slate-50 border border-slate-100 flex items-center justify-center text-slate-300">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                            </div>
                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $post->created_at->format('M d, Y') }}</span>
                        </div>
                        <a href="{{ route('posts.show', $post->slug) }}" class="flex items-center gap-2 text-brand-teal font-extrabold text-sm group/btn">
                            Read Article
                            <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full py-20 text-center text-slate-400 italic">
                No articles published in the library yet. Check back soon!
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
