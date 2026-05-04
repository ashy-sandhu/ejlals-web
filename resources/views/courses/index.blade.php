@extends('layouts.app')

@section('title', 'All Courses - Ejlals Academy')

@section('json_ld')
    @php
        $breadcrumbItems = [['name' => 'Courses', 'url' => route('courses.index')]];
        if(isset($selectedCategory) && $selectedCategory && $categories->firstWhere('slug', $selectedCategory)) {
            $breadcrumbItems[] = [
                'name' => $categories->firstWhere('slug', $selectedCategory)->name, 
                'url' => route('courses.index', ['category' => $selectedCategory])
            ];
        }
    @endphp
    {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::generateBreadcrumbs($breadcrumbItems)) !!}
@endsection

@section('content')
<section class="relative bg-slate-900 overflow-hidden pt-32 pb-24 px-6 border-b border-white/5">
    <!-- Cinematic Background Image -->
    <div class="absolute inset-0 pointer-events-none">
        <img src="https://images.unsplash.com/photo-1609599006353-e629aaabfeae?auto=format&fit=crop&q=80&w=2000" alt="Courses Rehal Background" class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <!-- Manuscript Grid Accents (Structural Unity) -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute inset-0" style="background-image: linear-gradient(to right, #2C8793 1px, transparent 1px), linear-gradient(to bottom, #2C8793 1px, transparent 1px); background-size: 80px 80px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-transparent to-slate-900"></div>
    </div>
    
    <!-- Organic Knowledge Blobs (Unique Artistic Layer) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[10%] right-[15%] w-96 h-96 bg-brand-gold/[0.08] rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[20%] left-[10%] w-80 h-80 bg-brand-teal/[0.06] rounded-full blur-[100px]"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-8">
                <span class="h-2 w-2 rounded-full bg-brand-gold animate-ping"></span>
                <span class="text-brand-gold text-[10px] font-bold uppercase tracking-[0.4em]">Enlightenment Archives</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-[1.1] tracking-tight">
                Premium <span class="bg-gradient-to-r from-brand-gold to-brand-gold/50 bg-clip-text text-transparent">Learning</span>
            </h1>
            <p class="text-slate-300 text-lg md:text-xl leading-relaxed font-medium max-w-2xl opacity-90">
                Explore a meticulously curated syllabus designed to bridge classical wisdom with modern practical application, fostering both intellectual depth and spiritual growth.
            </p>
        </div>
    </div>
</section>

<section class="bg-white p-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-100">
            <div>
                <h2 class="text-sm font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">
                    @if(isset($searchTerm) && $searchTerm)
                        Search Results for: <span class="text-brand-teal">"{{ $searchTerm }}"</span>
                    @else
                        Academic Curriculum
                    @endif
                </h2>
                <div class="h-1.5 w-8 bg-brand-gold rounded-full"></div>
            </div>
            
            @if(isset($searchTerm) && $searchTerm)
                <a href="{{ route('courses.index') }}" class="text-xs font-bold text-slate-400 hover:text-brand-teal flex items-center gap-1 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    Clear Search
                </a>
            @endif

            <!-- Sleek Category Filter -->
            <div x-data="{ open: false }" class="relative">
                <button @click="open = !open" 
                        @click.away="open = false"
                        class="flex items-center gap-2.5 px-4 py-2 bg-slate-50/50 border border-slate-200/50 rounded-full text-[11px] font-black text-slate-600 uppercase tracking-widest hover:bg-white hover:shadow-md transition-all duration-300">
                    <span class="material-symbols-outlined text-lg text-brand-gold">filter_list</span>
                    <span class="hidden md:inline">Sort:</span>
                    <span class="text-slate-800">{{ $categories->firstWhere('slug', $selectedCategory)->name ?? 'All Courses' }}</span>
                    <span class="material-symbols-outlined text-base transition-transform duration-300" :class="open ? 'rotate-180' : ''">expand_more</span>
                </button>
                
                <div x-show="open" 
                     x-cloak
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2 scale-95"
                     x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                     x-transition:leave-end="opacity-0 translate-y-2 scale-95"
                     class="absolute right-0 mt-2 w-56 bg-white/95 backdrop-blur-md rounded-2xl shadow-2xl border border-slate-100 p-2 z-50 origin-top-right">
                    
                    <a href="{{ route('courses.index') }}" 
                       class="flex items-center justify-between px-4 py-2.5 rounded-xl text-[11px] font-bold uppercase tracking-wider transition-all {{ !$selectedCategory ? 'bg-brand-teal/10 text-brand-teal' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                        All Courses
                        @if(!$selectedCategory)
                            <span class="material-symbols-outlined text-sm">check_circle</span>
                        @endif
                    </a>

                    <div class="my-1 h-px bg-slate-100 mx-2"></div>

                    @foreach($categories as $category)
                        <a href="{{ route('courses.index', ['category' => $category->slug]) }}" 
                           class="flex items-center justify-between px-4 py-2.5 rounded-xl text-[11px] font-bold uppercase tracking-wider transition-all {{ $selectedCategory === $category->slug ? 'bg-brand-teal/10 text-brand-teal' : 'text-slate-500 hover:bg-slate-50 hover:text-slate-800' }}">
                            {{ $category->name }}
                            @if($selectedCategory === $category->slug)
                                <span class="material-symbols-outlined text-sm">check_circle</span>
                            @endif
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5 lg:gap-6">
            @forelse($courses as $course)
                <div class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-brand-teal/5 flex flex-col h-full">
                    <a href="{{ route('courses.show', $course->slug) }}" class="flex flex-col h-full">
                        <!-- Image Container -->
                        <div class="relative h-40 w-full overflow-hidden bg-slate-100 shrink-0">
                            @if($course->image)
                                <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ Storage::url($course->image) }}" alt="{{ $course->image_alt ?? $course->title }}" />
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-brand-teal/10 to-brand-gold/10 flex items-center justify-center">
                                    <span class="text-brand-teal font-bold uppercase tracking-widest text-[10px] opacity-20">Course Preview</span>
                                </div>
                            @endif
                            
                            <!-- Level Badge -->
                            <div class="absolute top-3 left-3 bg-brand-teal/90 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm">
                                {{ $course->level ?? 'All Levels' }}
                            </div>
                        </div>

                        <!-- Content Container -->
                        <div class="p-3 md:p-4 md:p-5 flex flex-col flex-1 pb-4 md:pb-6">
                            <h3 class="text-[11px] md:text-[14px] font-bold text-slate-800 mb-1 group-hover:text-brand-teal transition-colors leading-snug">
                                {{ $course->title }}
                            </h3>
                            <p class="text-slate-500 text-[10px] md:text-[11px] leading-relaxed mb-3 line-clamp-2 flex-1">
                                {{ Str::limit(strip_tags($course->description), 80) ?: 'Begin your journey into authentic Islamic scholarship.' }}
                            </p>
                            
                            <!-- Footer metadata -->
                            <div class="flex items-center justify-between pt-4 border-t border-brand-teal/5 mt-auto">
                                <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                                    <span class="material-symbols-outlined text-[13px]">view_module</span>
                                    {{ $course->modules_count ?? 0 }} Modules
                                </span>
                                <span class="material-symbols-outlined text-brand-teal transform group-hover:translate-x-1 transition-transform duration-300 text-base md:text-lg">arrow_forward</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full py-20 text-center bg-slate-50 rounded-3xl border-2 border-dashed border-slate-100 animate-in fade-in zoom-in duration-500">
                    <div class="flex flex-col items-center max-w-md mx-auto">
                        <div class="w-16 h-16 bg-slate-100 rounded-full flex items-center justify-center text-slate-300 mb-4">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </div>
                        <h3 class="text-slate-800 font-bold mb-2">No results found</h3>
                        <p class="text-slate-500 text-sm mb-6">We couldn't find any courses matching <span class="text-brand-teal">"{{ $searchTerm ?? '' }}"</span>. Try checking your spelling or using more general keywords.</p>
                        <a href="{{ route('courses.index') }}" class="bg-brand-teal text-white px-6 py-2 rounded-lg text-sm font-bold shadow-sm hover:shadow-lg transition-all">Explore All Courses</a>
                    </div>
                </div>
            @endforelse
        </div>

        <!-- Custom Sleek Pagination -->
        @if ($courses->hasPages())
        <nav class="flex items-center justify-center gap-3 mt-8 mb-4">
            {{-- Previous Page Link --}}
            @if ($courses->onFirstPage())
                <span class="size-11 rounded-full flex items-center justify-center text-slate-200 bg-slate-50/30 border border-slate-100 cursor-default">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </span>
            @else
                <a href="{{ $courses->previousPageUrl() }}" class="size-11 rounded-full flex items-center justify-center text-slate-600 bg-white border border-slate-200 hover:border-brand-teal hover:text-brand-teal hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </a>
            @endif

            {{-- Page Counter Pill --}}
            <div class="px-6 py-2.5 rounded-full bg-slate-50 border border-slate-100 shadow-inner flex items-center gap-2">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Curriculum</span>
                <div class="w-px h-3 bg-slate-200"></div>
                <span class="text-[11px] font-bold text-slate-700">
                    Page {{ $courses->currentPage() }} <span class="text-slate-400 font-medium">of</span> {{ $courses->lastPage() }}
                </span>
            </div>

            {{-- Next Page Link --}}
            @if ($courses->hasMorePages())
                <a href="{{ $courses->nextPageUrl() }}" class="size-11 rounded-full flex items-center justify-center text-slate-600 bg-white border border-slate-200 hover:border-brand-teal hover:text-brand-teal hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </a>
            @else
                <span class="size-11 rounded-full flex items-center justify-center text-slate-200 bg-slate-50/30 border border-slate-100 cursor-default">
                    <span class="material-symbols-outlined text-xl">chevron_right</span>
                </span>
            @endif
        </nav>
        @endif
    </div>
</section>
@endsection
