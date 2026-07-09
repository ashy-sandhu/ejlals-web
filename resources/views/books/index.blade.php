@extends('layouts.app')

@section('title', 'Library - Ejlals Academy')

@section('json_ld')
    {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::generateBreadcrumbs([
        ['name' => 'Library', 'url' => route('books.index')]
    ])) !!}
@endsection

@section('content')
<section class="relative bg-slate-900 overflow-hidden pt-32 pb-24 px-6 border-b border-white/5">
    <!-- Cinematic Background Image -->
    <div class="absolute inset-0 pointer-events-none">
        <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?auto=format&fit=crop&q=80&w=2000" alt="Library Background" class="w-full h-full object-cover opacity-80">
        <div class="absolute inset-0 bg-gradient-to-r from-slate-900 via-slate-900/40 to-transparent"></div>
    </div>
    
    <!-- Manuscript Grid Accents (Structural Unity) -->
    <div class="absolute inset-0 pointer-events-none opacity-10">
        <div class="absolute inset-0" style="background-image: linear-gradient(to right, #2C8793 1px, transparent 1px), linear-gradient(to bottom, #2C8793 1px, transparent 1px); background-size: 80px 80px;"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900 via-transparent to-slate-900"></div>
    </div>
    
    <!-- Diagonal Glass Overlays (Unique Artistic Layer) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none select-none">
        <div class="absolute -top-1/4 -right-1/4 w-3/4 h-full bg-white/[0.03] backdrop-blur-3xl rotate-12 saturate-150" style="clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);"></div>
        <div class="absolute -bottom-1/4 -left-1/4 w-2/3 h-full bg-brand-teal/[0.04] backdrop-blur-2xl -rotate-6" style="clip-path: polygon(0 0, 80% 0, 100% 100%, 0% 100%);"></div>
    </div>

    <div class="relative max-w-7xl mx-auto">
        <div class="max-w-3xl">
            <div class="flex items-center gap-3 mb-8">
                <span class="h-[1px] w-12 bg-brand-gold/50"></span>
                <span class="text-brand-gold text-[10px] font-bold uppercase tracking-[0.4em]">Academic Repository</span>
            </div>
            <h1 class="text-5xl md:text-7xl font-extrabold text-white mb-8 leading-[1.1] tracking-tight">
                Library <span class="text-brand-gold italic">Archives</span>
            </h1>
            <p class="text-slate-300 text-lg md:text-xl leading-relaxed font-medium max-w-2xl saturate-150 opacity-90">
                Access a distinguished collection of digital manuscripts, curated guides, and scholarly resources designed to support profound learning and methodical research.
            </p>
        </div>
    </div>
</section>

<section class="bg-white p-20 pt-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-100">
            <div>
                <h2 class="text-sm font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Available Collections</h2>
                <div class="h-1.5 w-8 bg-brand-teal rounded-full"></div>
            </div>
        </div>

        <style>
            .card-hover:hover {
                transform: translateY(-4px);
                box-shadow: 0 10px 25px -5px rgba(44, 135, 147, 0.15); /* #2C8793 */
            }
            .image-zoom:hover img {
                transform: scale(1.05);
            }
            /* Colors array for dynamic backgrounds if needed, or stick to slate */
            .book-bg-1 { background-color: #E6DFD3; } /* Beige */
            .book-bg-2 { background-color: #386A6B; } /* Teal */
            .book-bg-3 { background-color: #AED5C0; } /* Mint */
        </style>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6 mt-4">
            @forelse ($books as $index => $book)
                @php
                    // Assign a rotating background color class based on the index to mimic the design's colorful canvases
                    $bgClasses = ['book-bg-1', 'book-bg-2', 'book-bg-3'];
                    $bgClass = $bgClasses[$index % 3];
                @endphp
                <div class="group card-hover transition-all duration-300 bg-white border border-slate-100 rounded-xl overflow-hidden flex flex-col shadow-sm">
                    <div class="relative aspect-[4/3] overflow-hidden image-zoom {{ $bgClass }} flex items-center justify-center p-4">
                        @if($book->image)
                            <!-- Apply a softer, elegant drop shadow to the book image -->
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->image_alt ?? $book->title }}" class="w-[75%] max-h-full object-contain drop-shadow-[0_10px_15px_rgba(0,0,0,0.2)] transition-transform duration-500">
                        @else
                            <div class="w-[75%] h-full bg-white flex items-center justify-center p-4 text-center drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] transition-transform duration-500 border border-slate-200/50">
                                <span class="text-slate-400 font-bold text-[10px] uppercase tracking-widest opacity-60">{{ $book->title }}</span>
                            </div>
                        @endif
                        
                        <!-- Overlay gradient on hover like the design -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-5">
                            <span class="text-white text-[13px] font-medium flex items-center gap-2">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                Quick Preview
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-2 pt-1.5 md:p-3 md:pt-2 flex flex-col grow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-brand-teal text-[8px] md:text-xs lg:text-[10px] font-bold">Ejlals Repository</span>
                            <div class="flex items-center gap-0.5">
                                <span class="material-symbols-outlined text-brand-gold text-[12px]! lg:text-[11px]!" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="text-[9px] md:text-xs lg:text-[10px] font-black text-slate-500">4.9</span>
                            </div>
                        </div>
                        
                        <h3 class="text-[10px] md:text-sm lg:text-[14px] font-bold text-slate-800 mb-1 line-clamp-2 leading-[1.2] group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
                        <p class="text-[9px] md:text-[12px] lg:text-[11px] text-slate-600 mb-2 line-clamp-2 leading-tight">
                            {{ Str::limit(strip_tags($book->description), 80) ?: 'Explore this valuable scholarly resource within our digital library collection.' }}
                        </p>
                        
                        <div class="mt-auto pt-1.5 border-t border-slate-100 flex items-center justify-between gap-1">
                            <div class="flex flex-col min-w-0">
                                <span class="text-[7px] text-slate-400 uppercase font-bold tracking-tight mb-0.5 truncate">Resource Type</span>
                                <span class="text-[10px] lg:text-[9px] font-bold text-slate-700 truncate">
                                    {{ $book->download_type === 'file' ? 'PDF eBook' : ($book->download_type === 'link' ? 'Guide' : 'Archive') }}
                                </span>
                            </div>
                            
                            @if($book->download_type === 'file' && $book->download_file)
                                <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="px-2.5 py-1.5 md:px-4 md:py-2 lg:px-3.5 lg:py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] md:text-[11px] lg:text-[10px] transition-colors flex items-center gap-1 no-underline shadow-sm">
                                    View
                                    <span class="material-symbols-outlined text-[12px] md:text-[14px] lg:text-base" style="font-size: 12px;">open_in_new</span>
                                </a>
                            @elseif($book->download_type === 'link' && $book->download_link)
                                <a href="{{ $book->download_link }}" target="_blank" class="px-2.5 py-1.5 md:px-4 md:py-2 lg:px-3.5 lg:py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] md:text-[11px] lg:text-[10px] transition-colors flex items-center gap-1 no-underline shadow-sm">
                                    View
                                    <span class="material-symbols-outlined text-[12px] md:text-[14px] lg:text-base" style="font-size: 12px;">open_in_new</span>
                                </a>
                            @else
                                <span class="px-4 py-2 bg-slate-50 text-slate-400 rounded-lg font-bold text-[11px] cursor-not-allowed">Soon</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 italic">Our library is currently being stocked. Stay tuned!</p>
                </div>
            @endforelse
        </div>

        <!-- Custom Sleek Pagination -->
        @if ($books->hasPages())
        <nav class="flex items-center justify-center gap-3 mt-8 mb-4">
            {{-- Previous Page Link --}}
            @if ($books->onFirstPage())
                <span class="size-11 rounded-full flex items-center justify-center text-slate-200 bg-slate-50/30 border border-slate-100 cursor-default">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </span>
            @else
                <a href="{{ $books->previousPageUrl() }}" class="size-11 rounded-full flex items-center justify-center text-slate-600 bg-white border border-slate-200 hover:border-brand-teal hover:text-brand-teal hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">chevron_left</span>
                </a>
            @endif

            {{-- Page Counter Pill --}}
            <div class="px-6 py-2.5 rounded-full bg-slate-50 border border-slate-100 shadow-inner flex items-center gap-2">
                <span class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em]">Archives</span>
                <div class="w-px h-3 bg-slate-200"></div>
                <span class="text-[11px] font-bold text-slate-700">
                    Page {{ $books->currentPage() }} <span class="text-slate-400 font-medium">of</span> {{ $books->lastPage() }}
                </span>
            </div>

            {{-- Next Page Link --}}
            @if ($books->hasMorePages())
                <a href="{{ $books->nextPageUrl() }}" class="size-11 rounded-full flex items-center justify-center text-slate-600 bg-white border border-slate-200 hover:border-brand-teal hover:text-brand-teal hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
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
