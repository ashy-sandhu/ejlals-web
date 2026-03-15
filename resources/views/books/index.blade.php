@extends('layouts.app')

@section('title', 'Library - Ejlals Academy')

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

<section class="bg-white py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-16 pb-8 border-b border-gray-100">
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
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @forelse ($books as $index => $book)
                @php
                    // Assign a rotating background color class based on the index to mimic the design's colorful canvases
                    $bgClasses = ['book-bg-1', 'book-bg-2', 'book-bg-3'];
                    $bgClass = $bgClasses[$index % 3];
                @endphp
                <div class="group card-hover transition-all duration-300 bg-white border border-slate-100 rounded-xl overflow-hidden flex flex-col shadow-sm">
                    <div class="relative aspect-[4/3] overflow-hidden image-zoom {{ $bgClass }} flex items-center justify-center p-4">
                        @if($book->image)
                            <!-- Apply a deep drop shadow to the book image to give it the 3D book feel on the canvas -->
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-[75%] max-h-full object-contain drop-shadow-[0_15px_15px_rgba(0,0,0,0.4)] transition-transform duration-500">
                        @else
                            <div class="w-[75%] h-full bg-white flex items-center justify-center p-4 text-center drop-shadow-[0_15px_15px_rgba(0,0,0,0.15)] transition-transform duration-500 border border-slate-200">
                                <span class="text-slate-400 font-bold text-xs uppercase tracking-widest opacity-60">{{ $book->title }}</span>
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
                    
                    <div class="p-5 flex flex-col grow">
                        <div class="flex items-center justify-between mb-2.5">
                            <span class="text-brand-teal text-[10px] font-extrabold tracking-widest uppercase">Ejlals Repository</span>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-brand-gold text-[15px]" style="font-variation-settings: 'FILL' 1">star</span>
                                <span class="text-[11px] font-bold text-slate-500">4.9</span>
                            </div>
                        </div>
                        
                        <h3 class="text-base font-bold text-slate-800 mb-2 line-clamp-2 leading-[1.3] group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
                        <p class="text-[12px] text-slate-500/90 mb-6 line-clamp-2 leading-relaxed">
                            {{ Str::limit(strip_tags($book->description), 90) ?: 'Explore this valuable scholarly resource within our digital library collection.' }}
                        </p>
                        
                        <div class="mt-auto pt-4 border-t border-slate-100 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[9px] text-slate-400 uppercase font-black tracking-widest mb-0.5">Resource Type</span>
                                <span class="text-[12px] font-bold text-slate-700">
                                    {{ $book->download_type === 'file' ? 'PDF eBook' : ($book->download_type === 'link' ? 'Guide' : 'Archive') }}
                                </span>
                            </div>
                            
                            @if($book->download_type === 'file' && $book->download_file)
                                <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="px-4 py-2 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[11px] transition-colors flex items-center gap-1.5 no-underline shadow-sm">
                                    View Resource
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            @elseif($book->download_type === 'link' && $book->download_link)
                                <a href="{{ $book->download_link }}" target="_blank" class="px-4 py-2 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[11px] transition-colors flex items-center gap-1.5 no-underline shadow-sm">
                                    View Resource
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
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

        <div class="mt-16">
            {{ $books->links() }}
        </div>
    </div>
</section>
@endsection
