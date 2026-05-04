@extends('layouts.app')

@section('title', 'Search Results for "' . $query . '" - Ejlals Academy')

@section('json_ld')
    @php
        $searchResultsSchema = [
            "@context" => "https://schema.org",
            "@type" => "SearchResultsPage",
            "mainEntity" => [
                "@type" => "ItemList",
                "name" => "Search results for " . $query,
                "itemListElement" => []
            ]
        ];

        // Combine all results for the ItemList
        $index = 1;
        foreach($courses as $course) {
            $searchResultsSchema['mainEntity']['itemListElement'][] = [
                "@type" => "ListItem",
                "position" => $index++,
                "url" => route('courses.show', $course->slug),
                "name" => $course->title
            ];
        }
        foreach($scholars as $scholar) {
            $searchResultsSchema['mainEntity']['itemListElement'][] = [
                "@type" => "ListItem",
                "position" => $index++,
                "url" => route('scholars.show', $scholar->slug),
                "name" => $scholar->name
            ];
        }
    @endphp
    {!! \App\Traits\HasSeoSchema::renderJsonLd($searchResultsSchema) !!}
    {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::generateBreadcrumbs([
        ['name' => 'Search Results', 'url' => route('search', ['search' => $query])]
    ])) !!}
@endsection

@section('content')
<section class="bg-[#FDFDFC] pt-12 pb-24 px-6 min-h-screen">
    <div class="max-w-7xl mx-auto">
        <!-- Header -->
        <div class="mb-12">
            <h1 class="text-sm font-bold text-slate-400 uppercase tracking-[0.3em] mb-4">Discovery Engine</h1>
            <h2 class="text-4xl md:text-5xl font-serif font-bold text-slate-900 leading-tight">
                Showing results for <span class="text-brand-teal italic">"{{ $query }}"</span>
            </h2>
            <div class="h-1.5 w-12 bg-brand-gold mt-6 rounded-full"></div>
        </div>

        @if($courses->isEmpty() && $posts->isEmpty() && $scholars->isEmpty() && $books->isEmpty())
            <div class="py-20 text-center bg-white rounded-3xl border border-gray-100 shadow-sm animate-in fade-in zoom-in duration-500">
                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center text-slate-300 mx-auto mb-6">
                    <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-2">No matches discovered</h3>
                <p class="text-slate-500 max-w-md mx-auto mb-8 text-lg">We couldn't find anything matching your search. Try different keywords or browse our popular categories.</p>
                <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 bg-brand-teal text-white px-8 py-3 rounded-xl font-bold hover:shadow-lg transition-all">
                    Explore Our Courses
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </a>
            </div>
        @else
            <!-- Results Grid -->
            <div class="space-y-20">
                
                <!-- Scholars Results -->
                @if($scholars->isNotEmpty())
                <div class="animate-in fade-in slide-in-from-bottom-4 duration-700">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                            <span class="w-2 h-8 bg-brand-teal rounded-full"></span>
                            Expert Scholars
                        </h3>
                        <span class="text-sm font-medium text-slate-400">{{ $scholars->count() }} found</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($scholars as $scholar)
                            <a href="{{ route('scholars.show', $scholar->slug) }}" class="group bg-white p-5 rounded-2xl border border-gray-100 hover:border-brand-teal/20 hover:shadow-xl transition-all duration-300 flex items-center gap-4">
                                <div class="w-16 h-16 rounded-xl overflow-hidden shrink-0 border-2 border-slate-50">
                                    <img src="{{ $scholar->image ? Storage::url($scholar->image) : asset('images/default-avatar.jpg') }}" alt="{{ $scholar->image_alt ?? $scholar->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-800 group-hover:text-brand-teal transition-colors">{{ $scholar->name }}</h4>
                                    <p class="text-xs text-slate-500 line-clamp-1 italic">{{ $scholar->title ?? 'Expert Scholar' }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Courses Results -->
                @if($courses->isNotEmpty())
                <div class="animate-in fade-in slide-in-from-bottom-4 duration-700 delay-100">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                            <span class="w-2 h-8 bg-brand-gold rounded-full"></span>
                            Academic Courses
                        </h3>
                        <span class="text-sm font-medium text-slate-400">{{ $courses->count() }} found</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($courses as $course)
                            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-100 flex flex-col">
                                <a href="{{ route('courses.show', $course->slug) }}" class="flex flex-col h-full">
                                    <div class="relative h-32 w-full overflow-hidden">
                                        @if($course->image)
                                            <img src="{{ Storage::url($course->image) }}" alt="{{ $course->image_alt ?? $course->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform">
                                        @else
                                            <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                                                <span class="text-[10px] text-slate-300 font-bold uppercase tracking-widest">Ejlals Academy</span>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="p-4 flex-1 flex flex-col">
                                        <h4 class="font-bold text-slate-800 mb-2 group-hover:text-brand-teal transition-colors text-sm line-clamp-2">{{ $course->title }}</h4>
                                        <div class="mt-auto pt-3 border-t border-gray-50 flex items-center justify-between">
                                            <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">{{ $course->level ?? 'All Levels' }}</span>
                                            <span class="material-symbols-outlined text-brand-teal text-lg">arrow_forward</span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Library Books Results -->
                @if($books->isNotEmpty())
                <div class="animate-in fade-in slide-in-from-bottom-4 duration-700 delay-150">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                            <span class="w-2 h-8 bg-emerald-600 rounded-full"></span>
                            Library Resources
                        </h3>
                        <span class="text-sm font-medium text-slate-400">{{ $books->count() }} found</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($books as $book)
                            <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all border border-gray-100 flex flex-col">
                                <div class="flex flex-col h-full p-4">
                                    <div class="relative h-40 w-full overflow-hidden rounded-lg mb-4 bg-slate-50 shadow-inner">
                                        @if($book->image)
                                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->image_alt ?? $book->title }}" class="w-full h-full object-contain p-2 group-hover:scale-110 transition-transform">
                                        @else
                                            <div class="w-full h-full flex flex-col items-center justify-center opacity-20">
                                                <svg class="w-12 h-12 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                                <span class="text-[8px] font-bold uppercase tracking-tighter">Library</span>
                                            </div>
                                        @endif
                                    </div>
                                    <h4 class="font-bold text-slate-800 mb-2 group-hover:text-brand-teal transition-colors text-sm line-clamp-2">{{ $book->title }}</h4>
                                    <p class="text-[10px] text-slate-500 line-clamp-2 mb-4 italic">{{ Str::limit(strip_tags($book->description), 60) }}</p>
                                    <div class="mt-auto pt-3 border-t border-gray-50">
                                        <a href="{{ route('books.index') }}" class="text-[10px] font-bold text-brand-teal hover:underline uppercase tracking-widest flex items-center gap-1">
                                            View in Library
                                            <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Articles Results -->
                @if($posts->isNotEmpty())
                <div class="animate-in fade-in slide-in-from-bottom-4 duration-700 delay-200">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <h3 class="text-xl font-bold text-slate-800 flex items-center gap-3">
                            <span class="w-2 h-8 bg-slate-800 rounded-full"></span>
                            Academy Press
                        </h3>
                        <span class="text-sm font-medium text-slate-400">{{ $posts->count() }} found</span>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach($posts as $post)
                            <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white p-5 rounded-2xl border border-gray-100 hover:border-slate-200 hover:shadow-lg transition-all">
                                <h4 class="font-bold text-slate-800 mb-3 group-hover:text-brand-teal transition-colors line-clamp-2 leading-snug">{{ $post->title }}</h4>
                                <div class="flex items-center justify-between">
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Article</span>
                                    <span class="text-brand-teal text-xs font-bold group-hover:underline">Read More</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif

            </div>
        @endif
    </div>
</section>
@endsection
