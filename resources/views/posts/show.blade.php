@extends('layouts.app')

@section('title', $post->title . ' - Ejlals Academy')

@section('content')
<div class="bg-white min-h-screen font-sans pb-24">
    <!-- Article Header -->
    <header class="bg-slate-50 pt-16 pb-24 px-6 border-b border-slate-100">
        <div class="max-w-4xl mx-auto">
            <div class="flex items-center gap-3 mb-8">
                <a href="{{ route('posts.index') }}" class="text-brand-teal font-bold text-sm hover:underline">Articles</a>
                <span class="text-slate-300">/</span>
                <span class="text-slate-500 text-sm font-medium">{{ $post->category->name ?? 'Uncategorized' }}</span>
            </div>
            
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-extrabold text-slate-900 leading-[1.1] mb-10 tracking-tight">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-6">
                <div class="w-12 h-12 rounded-full bg-brand-gold/10 border border-brand-gold/20 flex items-center justify-center text-brand-gold">
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/></svg>
                </div>
                <div>
                    <p class="text-sm font-bold text-slate-900">Ejlals Editorial</p>
                    <p class="text-xs text-slate-500 font-medium">Published on {{ $post->created_at->format('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-16 mt-[-4rem]">
        <div class="lg:col-span-8">
            <!-- Featured Image -->
            @if($post->image)
            <div class="rounded-[3rem] overflow-hidden shadow-2xl shadow-slate-200 border border-white mb-16 relative group">
                <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-auto max-h-[600px] object-cover">
            </div>
            @endif

            <!-- Article Body -->
            <article class="prose prose-slate prose-lg max-w-none prose-headings:text-slate-900 prose-headings:font-extrabold prose-p:text-slate-600 prose-p:leading-relaxed prose-a:text-brand-teal prose-strong:text-slate-900">
                {!! nl2br($post->content) !!}
            </article>

            <!-- Gallery Section -->
            @if($post->gallery && count($post->gallery) > 0)
            <div class="mt-20 pt-20 border-t border-slate-100">
                <h3 class="text-2xl font-extrabold text-slate-900 mb-8">Visual Context</h3>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @foreach($post->gallery as $img)
                    <div class="aspect-square rounded-3xl overflow-hidden border border-slate-100 bg-slate-50 group">
                        <img src="{{ Storage::url($img) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 cursor-zoom-in">
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Tags -->
            @if($post->tags->count() > 0)
            <div class="mt-16 flex flex-wrap gap-2">
                @foreach($post->tags as $tag)
                <span class="px-4 py-2 bg-slate-50 text-slate-500 text-xs font-bold rounded-full uppercase tracking-wider">#{{ $tag->name }}</span>
                @endforeach
            </div>
            @endif
        </div>

        <!-- Sidebar -->
        <aside class="lg:col-span-4 space-y-12">
            <!-- Related Articles -->
            @if($relatedPosts->count() > 0)
            <div class="bg-slate-50 rounded-[2.5rem] p-8 border border-slate-100">
                <h4 class="text-lg font-bold text-slate-900 mb-8 flex items-center gap-2">
                    <span class="w-1.5 h-6 bg-brand-gold rounded-full"></span>
                    Related Knowledge
                </h4>
                <div class="space-y-8">
                    @foreach($relatedPosts as $related)
                    <a href="{{ route('posts.show', $related->slug) }}" class="group block">
                        <p class="text-xs font-bold text-brand-teal uppercase mb-2">{{ $related->category->name ?? 'Article' }}</p>
                        <h5 class="text-slate-800 font-bold group-hover:text-brand-teal transition-colors leading-snug line-clamp-2">
                            {{ $related->title }}
                        </h5>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            <!-- Newsletter Box (Mock) -->
            <div class="bg-brand-teal rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-xl shadow-brand-teal/20">
                <div class="relative z-10">
                    <h4 class="text-xl font-bold mb-4">Weekly Insights</h4>
                    <p class="text-sm text-white/80 leading-relaxed mb-8">Get scholarly articles and academy updates delivered right to your inbox.</p>
                    <div class="flex flex-col gap-3">
                        <input type="email" placeholder="your@email.com" class="bg-white/10 border-white/20 rounded-xl py-3 px-4 text-sm placeholder:text-white/40 focus:bg-white/20 transition-all outline-none">
                        <button class="bg-brand-gold text-white font-bold py-3 rounded-xl shadow-lg shadow-black/10">Subscribe</button>
                    </div>
                </div>
                <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-white/5 rounded-full blur-2xl"></div>
            </div>
        </aside>
    </div>
</div>
@endsection
