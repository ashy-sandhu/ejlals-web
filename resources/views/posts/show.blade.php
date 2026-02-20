@extends('layouts.app')

@section('title', $post->title . ' - Academy Press')

@section('content')
<div class="bg-slate-50 min-h-screen">
    <!-- Sophisticated Header -->
    <div class="bg-slate-900 pt-32 pb-48 px-6 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-gold rounded-full blur-[120px]"></div>
            <div class="absolute bottom-0 left-0 w-[300px] h-[300px] bg-brand-teal rounded-full blur-[100px]"></div>
        </div>
        
        <div class="max-w-7xl mx-auto relative z-10 text-center">
            <div class="inline-flex items-center gap-3 bg-white/5 backdrop-blur-md border border-white/10 px-6 py-2 rounded-full mb-8">
                <span class="w-1.5 h-1.5 rounded-full bg-brand-gold"></span>
                <span class="text-white/70 text-xs font-bold uppercase tracking-[0.3em]">{{ $post->category->name ?? 'Article' }}</span>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-[1.1] mb-10 tracking-tight max-w-5xl mx-auto">
                {{ $post->title }}
            </h1>

            <div class="flex flex-wrap items-center justify-center gap-8 text-white/50 text-sm font-medium">
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
    </div>

    <!-- Article Content + Sidebar -->
    <div class="max-w-7xl mx-auto px-6 -mt-32 pb-32">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
            
            <!-- Left: Main Content -->
            <div class="lg:col-span-8">
                <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 mb-12">
                    @if($post->image)
                    <div class="aspect-[16/9] w-full overflow-hidden border-b border-slate-50">
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                    @endif

                    <div class="p-8 md:p-16">
                        <article class="prose prose-slate prose-lg max-w-none 
                            prose-headings:text-slate-900 prose-headings:font-extrabold prose-headings:tracking-tight
                            prose-p:text-slate-600 prose-p:leading-[1.8] prose-p:mb-8
                            prose-a:text-brand-teal prose-a:font-bold prose-strong:text-slate-900
                            prose-blockquote:border-l-4 prose-blockquote:border-brand-gold prose-blockquote:bg-slate-50 prose-blockquote:p-8 prose-blockquote:rounded-r-2xl prose-blockquote:italic prose-blockquote:text-slate-700">
                            {!! nl2br($post->content) !!}
                        </article>

                        @if($post->gallery && count($post->gallery) > 0)
                        <div class="mt-20 pt-16 border-t border-slate-100">
                            <h3 class="text-2xl font-extrabold text-slate-900 mb-10 flex items-center gap-3">
                                <svg class="w-6 h-6 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                                Exhibition Gallery
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
                </div>

                <!-- Author Box (Optional but common in screenshots) -->
                <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 flex items-center gap-8 mb-12">
                    <div class="w-24 h-24 shrink-0 rounded-full bg-brand-gold/10 border-2 border-brand-gold/20 flex items-center justify-center text-brand-gold">
                        <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-brand-teal uppercase tracking-widest mb-1">Author</p>
                        <h4 class="text-xl font-bold text-slate-900 mb-2">Ejlals Scholarly Board</h4>
                        <p class="text-slate-500 text-sm leading-relaxed">Dedicated to preserving and promoting Islamic knowledge through rigorous research and modern educational practices.</p>
                    </div>
                </div>
            </div>

            <!-- Right: Sidebar Widgets -->
            <aside class="lg:col-span-4 space-y-8">
                
                <!-- Search Widget -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h4 class="text-lg font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-brand-gold rounded-full"></span>
                        Library Search
                    </h4>
                    <form action="#" class="relative">
                        <input type="text" placeholder="Type keywords..." class="w-full bg-slate-50 border-none rounded-2xl py-4 pl-6 pr-14 text-sm focus:ring-2 focus:ring-brand-teal transition-all">
                        <button class="absolute right-2 top-2 w-10 h-10 bg-brand-teal text-white rounded-xl flex items-center justify-center shadow-lg shadow-brand-teal/20">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </button>
                    </form>
                </div>

                <!-- Recent Posts Widget -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h4 class="text-lg font-bold text-slate-900 mb-8 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-brand-teal rounded-full"></span>
                        Recent Wisdom
                    </h4>
                    <div class="space-y-10">
                        @foreach($recentPosts as $recent)
                        <a href="{{ route('posts.show', $recent->slug) }}" class="group flex gap-4">
                            <div class="w-20 h-20 shrink-0 rounded-2xl overflow-hidden bg-slate-50 border border-slate-100">
                                @if($recent->image)
                                    <img src="{{ Storage::url($recent->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                @else
                                    <div class="w-full h-full flex items-center justify-center text-slate-300"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24"><path d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg></div>
                                @endif
                            </div>
                            <div class="flex-1">
                                <h5 class="text-sm font-bold text-slate-800 group-hover:text-brand-teal transition-colors leading-snug line-clamp-2 mb-2">{{ $recent->title }}</h5>
                                <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $recent->created_at->format('M d, Y') }}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- Categories Widget -->
                <div class="bg-white rounded-[2.5rem] p-8 border border-slate-100 shadow-sm">
                    <h4 class="text-lg font-bold text-slate-900 mb-8 flex items-center gap-2">
                        <span class="w-1.5 h-6 bg-brand-gold rounded-full"></span>
                        Categories
                    </h4>
                    <div class="flex flex-col gap-3">
                        @foreach($categories as $category)
                        <a href="#" class="flex items-center justify-between p-4 rounded-2xl bg-slate-50 hover:bg-brand-teal group transition-all">
                            <span class="text-sm font-bold text-slate-600 group-hover:text-white">{{ $category->name }}</span>
                            <span class="bg-white/10 text-slate-400 text-xs font-bold px-3 py-1 rounded-lg group-hover:text-white/80 transition-colors">{{ $category->posts_count }}</span>
                        </a>
                        @endforeach
                    </div>
                </div>

                <!-- CTA Widget -->
                <div class="bg-gradient-to-br from-brand-teal to-slate-900 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-xl shadow-brand-teal/20">
                    <div class="relative z-10">
                        <h4 class="text-2xl font-bold mb-4">Start Your Journey</h4>
                        <p class="text-white/70 text-sm leading-relaxed mb-10">Enroll in our professional courses today and learn from verified scholars.</p>
                        <a href="{{ route('courses.index') }}" class="inline-block bg-brand-gold hover:bg-white hover:text-brand-teal text-white font-extrabold px-8 py-4 rounded-2xl transition-all shadow-lg shadow-black/20">Find a Course</a>
                    </div>
                    <div class="absolute -bottom-12 -right-12 w-48 h-48 bg-white/5 rounded-full blur-3xl"></div>
                </div>

            </aside>
        </div>
    </div>
</div>
@endsection
