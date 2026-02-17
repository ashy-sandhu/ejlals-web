@extends('layouts.app')

@section('title', 'Articles & Blog - Ejlals Academy')

@section('content')
<section class="bg-gray-50 py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="max-w-3xl mb-16">
            <h1 class="text-4xl font-bold text-slate-800 mb-6">Latest Articles</h1>
            <p class="text-slate-500 text-lg leading-relaxed">Thought-provoking articles, practical explanations, and reflections on education, faith, and daily living.</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            @forelse($posts as $post)
                <article class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm hover:shadow-xl transition-all group flex flex-col md:flex-row gap-8">
                    <div class="w-full md:w-48 shrink-0 aspect-square bg-gray-50 rounded-3xl overflow-hidden border border-gray-50">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                                <svg class="w-8 h-8 text-brand-teal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2zM14 2v4h4"></path></svg>
                            </div>
                        @endif
                    </div>
                    <div class="flex flex-col justify-center">
                        <div class="flex items-center gap-3 mb-4 text-[10px] font-bold uppercase tracking-widest text-slate-400">
                            <span class="text-brand-gold">{{ $post->created_at->format('M d, Y') }}</span>
                            <span>•</span>
                            <span class="text-brand-teal">5 min read</span>
                        </div>
                        <h2 class="text-2xl font-bold text-slate-800 mb-4 group-hover:text-brand-teal transition-colors leading-tight">
                            <a href="#">{{ $post->title }}</a>
                        </h2>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-3">
                            {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 150) }}
                        </p>
                        <a href="#" class="mt-auto text-brand-teal font-bold flex items-center gap-2 hover:gap-3 transition-all">
                            Read Full Article
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </article>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 italic">We are busy writing new articles. Check back soon!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
