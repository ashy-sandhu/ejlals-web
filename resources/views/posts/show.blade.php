@extends('layouts.app')

@section('title', $post->title . ' - Academy Press')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <!-- Sophisticated, Compact Header -->
    <header class="bg-white border-b border-slate-100 pt-24 pb-12 relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(#e5e7eb_1px,transparent_1px)] [background-size:20px_20px] opacity-40"></div>
        <div class="max-w-7xl mx-auto px-6 relative z-10">
            <div class="flex items-center gap-3 text-brand-teal font-bold text-[11px] uppercase tracking-[0.4em] mb-6">
                <a href="{{ route('posts.index') }}" class="hover:text-brand-gold transition-colors">Library</a>
                <span class="text-slate-300">/</span>
                <span class="text-slate-500">{{ $post->category->name ?? 'Article' }}</span>
            </div>
            
            <h1 class="text-3xl md:text-5xl font-extrabold text-slate-900 leading-[1.2] mb-8 tracking-tight max-w-4xl">
                {{ $post->title }}
            </h1>

            <div class="flex items-center gap-8 text-slate-400 text-[11px] font-bold uppercase tracking-widest">
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                    {{ $post->created_at->format('M d, Y') }}
                </div>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    {{ ceil(str_word_count(strip_tags($post->content)) / 200) }} min read
                </div>
            </div>
        </div>
    </header>

    <!-- Corrected 2-Column Grid (3:1 Ratio) -->
    <div class="max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
            
            <!-- Left: Main Content (Ratio 3/4 -> 9 Columns) -->
            <div class="lg:col-span-9 space-y-12">
                <!-- Constrained Image -->
                @if($post->image)
                <div class="rounded-[2.5rem] overflow-hidden shadow-sm border border-slate-100 bg-white p-2">
                    <div class="rounded-[2.2rem] overflow-hidden aspect-[21/9] max-h-[450px]">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                </div>
                @endif

                <!-- Article Content -->
                <div class="bg-white rounded-[2.5rem] p-8 md:p-14 shadow-sm border border-slate-100 mb-12">
                    <article class="prose prose-slate prose-lg max-w-none font-serif
                        prose-headings:text-slate-900 prose-headings:font-extrabold prose-headings:tracking-tight prose-headings:font-sans
                        prose-p:text-slate-600 prose-p:leading-[1.9] prose-p:mb-8
                        prose-a:text-brand-teal prose-a:font-bold prose-strong:text-slate-900
                        prose-blockquote:border-l-4 prose-blockquote:border-brand-gold prose-blockquote:bg-slate-50 prose-blockquote:p-8 prose-blockquote:rounded-r-2xl prose-blockquote:italic prose-blockquote:text-slate-700">
                        {!! $post->content !!}
                    </article>

                    @if($post->gallery && count($post->gallery) > 0)
                    <div class="mt-20 pt-16 border-t border-slate-50">
                        <h3 class="text-xl font-extrabold text-slate-900 mb-10 flex items-center gap-3">
                            <span class="w-1.5 h-6 bg-brand-gold rounded-full"></span>
                            Visual Context
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-6">
                            @foreach($post->gallery as $img)
                            <div class="aspect-square rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm group">
                                <img src="{{ Storage::url($img) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 cursor-zoom-in">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>

                <!-- Author Footer -->
                <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 flex flex-col md:flex-row items-center gap-8">
                    <div class="w-20 h-20 shrink-0 rounded-full bg-brand-gold/10 border border-brand-gold/20 flex items-center justify-center text-brand-gold">
                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div class="text-center md:text-left">
                        <p class="text-[10px] font-bold text-brand-teal uppercase tracking-widest mb-1">Academy Board</p>
                        <h4 class="text-lg font-bold text-slate-900 mb-2">Ejlals Editorial Team</h4>
                        <p class="text-slate-400 text-sm leading-relaxed max-w-xl">Our articles are peer-reviewed by scholars to ensure the highest standards of accuracy and academic integrity.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Sidebar (Ratio 1/4 -> 3 Columns) -->
            <aside class="lg:col-span-3 space-y-8 lg:sticky lg:top-8">
                
                <!-- Compact Search -->
                <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm">
                    <h5 class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-6">Library Index</h5>
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="w-full bg-slate-50 border-none rounded-xl py-3 pl-4 pr-10 text-xs focus:ring-1 focus:ring-brand-teal transition-all">
                        <button class="absolute right-3 top-2.5 text-slate-300">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </div>
                </div>

                <!-- Recent Wisdom -->
                <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm">
                    <h5 class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-8">Related Wisdom</h5>
                    <div class="space-y-8">
                        @foreach($recentPosts as $recent)
                        <a href="{{ route('posts.show', $recent->slug) }}" class="group block">
                            <h6 class="text-xs font-bold text-slate-700 group-hover:text-brand-teal transition-colors leading-snug line-clamp-2 mb-2">{{ $recent->title }}</h6>
                            <span class="text-[9px] font-bold text-slate-300 uppercase tracking-widest">{{ $recent->created_at->format('M d') }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Categories -->
                <div class="bg-white rounded-[2rem] p-8 border border-slate-100 shadow-sm">
                    <h5 class="text-[11px] font-bold text-slate-400 uppercase tracking-widest mb-6">Subject Area</h5>
                    <div class="flex flex-col gap-2">
                        @foreach($categories as $category)
                        <a href="#" class="flex items-center justify-between px-4 py-3 rounded-lg bg-slate-50 hover:bg-brand-teal group transition-all">
                            <span class="text-[11px] font-bold text-slate-500 group-hover:text-white">{{ $category->name }}</span>
                            <span class="text-[9px] font-bold text-slate-300 group-hover:text-white/40">{{ $category->posts_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- CTA -->
                <div class="bg-slate-900 rounded-[2rem] p-10 text-white relative overflow-hidden group">
                    <div class="absolute inset-0 bg-brand-gold/10 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    <h5 class="text-brand-gold font-bold text-[9px] uppercase tracking-[0.3em] mb-4 relative z-10">Academy Admission</h5>
                    <p class="text-xs text-white/70 leading-relaxed mb-6 relative z-10">Expand your knowledge with our verified online courses.</p>
                    <a href="{{ route('courses.index') }}" class="inline-block px-6 py-3 bg-brand-teal text-white text-[10px] font-bold uppercase rounded-xl tracking-widest relative z-10 hover:bg-white hover:text-slate-900 transition-all">Enroll Now</a>
                </div>

            </aside>
        </div>
    </div>
</div>
@endsection
