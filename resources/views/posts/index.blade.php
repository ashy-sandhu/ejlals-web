@extends('layouts.app')

@section('title', 'Academy Press - Repository of Wisdom')

@section('json_ld')
    @php
        $breadcrumbItems = [['name' => 'Articles', 'url' => route('posts.index')]];
        if(isset($selectedCategory) && $selectedCategory) {
            $categoryModel = \App\Models\Category::where('slug', $selectedCategory)->first();
            if($categoryModel) {
                $breadcrumbItems[] = [
                    'name' => $categoryModel->name, 
                    'url' => route('posts.index', ['category' => $selectedCategory])
                ];
            }
        }
    @endphp
    {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::generateBreadcrumbs($breadcrumbItems)) !!}
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen">
<section class="relative bg-slate-900 overflow-hidden pt-32 pb-24 px-6 border-b border-white/5">
    <!-- Cinematic Background Image -->
    <div class="absolute inset-0 pointer-events-none">
        <img src="https://images.unsplash.com/photo-1488190211105-8b0e65b80b4e?q=80&w=2070&auto=format&fit=crop" alt="Articles Heritage Background" class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <!-- Manuscript Grid Accents -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute inset-0" style="background-image: linear-gradient(to right, #2C8793 1px, transparent 1px), linear-gradient(to bottom, #2C8793 1px, transparent 1px); background-size: 80px 80px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-transparent to-slate-900"></div>
    </div>

    <!-- Diagonal Glass Overlays (Structural Unity) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none select-none">
        <div class="absolute -top-1/4 -right-1/4 w-3/4 h-full bg-white/[0.03] backdrop-blur-3xl rotate-12 saturate-150" style="clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);"></div>
        <div class="absolute -bottom-1/4 -left-1/4 w-2/3 h-full bg-brand-teal/[0.04] backdrop-blur-2xl -rotate-6" style="clip-path: polygon(0 0, 80% 0, 100% 100%, 0% 100%);"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-8">
                <span class="h-[1px] w-12 bg-brand-teal/50"></span>
                <span class="text-brand-teal text-[10px] font-bold uppercase tracking-[0.4em]">Wisdom Repository</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-[1.1] tracking-tight">
                Academy <span class="text-brand-teal italic">Press</span>
            </h1>
            <p class="text-slate-300 text-lg md:text-xl leading-relaxed font-medium max-w-2xl opacity-90">
                Explore a distinguished collection of reflections, research, and scholarly guides curated by the Ejlals Board for the contemporary seeker.
            </p>
        </div>
    </div>
</section>

    <!-- Articles Grid -->
    <div class="max-w-7xl mx-auto p-20 pt-6">
        @if(isset($selectedCategory) && $selectedCategory)
            <div class="flex items-center justify-between mb-12 pb-6 border-b border-slate-200">
                <div class="flex items-center gap-4">
                    <div class="w-2 h-10 bg-brand-teal rounded-full"></div>
                    <div>
                        <h2 class="text-xs font-bold text-slate-400 uppercase tracking-widest mb-1">Subject Area</h2>
                        <h3 class="text-2xl font-serif font-bold text-slate-800 italic">
                            "{{ \App\Models\Category::where('slug', $selectedCategory)->first()->name ?? $selectedCategory }}"
                        </h3>
                    </div>
                </div>
                <a href="{{ route('posts.index') }}" class="text-xs font-bold text-slate-400 hover:text-brand-teal flex items-center gap-1.5 transition-colors group">
                    <svg class="w-4 h-4 group-hover:rotate-90 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Clear Filter
                </a>
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            @forelse($posts as $post)
            <div class="group relative bg-white rounded-[2.5rem] border border-slate-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-700 overflow-hidden flex flex-col h-full bg-slate-50/30">
                <a href="{{ route('posts.show', $post->slug) }}" class="absolute inset-0 z-10" aria-label="Read {{ $post->title }}"></a>
                
                <!-- Card Content -->
                <div class="relative h-64 overflow-hidden">
                    @if($post->image)
                        <img src="{{ Storage::url($post->image) }}" alt="{{ $post->image_alt ?? $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    @else
                        <div class="w-full h-full bg-slate-200 flex items-center justify-center">
                            <span class="text-slate-400 font-bold uppercase tracking-widest text-[10px]">Ejlals Wisdom</span>
                        </div>
                    @endif
                    <div class="absolute top-6 left-6 z-20">
                        <span class="px-4 py-1.5 rounded-full bg-white/90 backdrop-blur-md text-[9px] font-black text-brand-teal uppercase tracking-widest shadow-sm">
                            {{ $post->category->name ?? 'Islamic Posts' }}
                        </span>
                    </div>
                </div>

                <div class="p-6 md:p-7 flex flex-col flex-1">
                    <div class="flex items-center gap-4 mb-3">
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.2em]">{{ $post->created_at->format('M d, Y') }}</span>
                        <span class="h-1 w-1 rounded-full bg-slate-300"></span>
                        <span class="text-[9px] font-bold text-slate-400 uppercase tracking-[0.2em]">5 Min Read</span>
                    </div>
                    
                    <h2 class="text-lg md:text-xl font-bold text-slate-800 mb-3 group-hover:text-brand-teal transition-colors leading-tight line-clamp-1">
                        {{ $post->title }}
                    </h2>
                    
                    <p class="text-slate-500 text-xs leading-relaxed mb-5 line-clamp-2">
                        {{ Str::limit(strip_tags($post->content), 120) }}
                    </p>

                    <div class="mt-auto pt-5 border-t border-slate-100 flex items-center justify-between">
                        <span class="text-[9px] font-black text-brand-teal uppercase tracking-[0.2em] group-hover:tracking-[0.3em] transition-all">Full Article</span>
                        <svg class="w-4 h-4 text-brand-teal transform group-hover:translate-x-2 transition-transform duration-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
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
