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

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse ($books as $book)
                <div class="flex flex-col group">
                    <div class="aspect-[3/4] bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all hover:-translate-y-2 hover:shadow-xl relative mb-6">
                        @if($book->image)
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-tr from-slate-100 to-slate-200 flex items-center justify-center p-8 text-center">
                                <span class="text-slate-400 font-bold text-sm uppercase tracking-widest opacity-30">{{ $book->title }}</span>
                            </div>
                        @endif
                        <div class="absolute inset-x-0 bottom-0 p-4 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            <span class="bg-white/90 backdrop-blur-sm text-brand-teal text-[10px] font-bold px-4 py-2 rounded-lg shadow-sm">Ejlals Library</span>
                        </div>
                    </div>
                    <!-- Design Update: Text Content Wrapper -->
                    <div class="flex flex-col grow px-1">
                        <!-- Design Update: Repository & Rating -->
                        <div class="flex items-center justify-between mb-2 mt-1">
                            <span class="text-brand-teal text-[10px] font-bold tracking-widest uppercase">Ejlals Repository</span>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-brand-gold text-[14px] fill-current" style="font-variation-settings: 'FILL' 1">star</span>
                                <span class="text-[10px] font-bold text-slate-400">4.9</span>
                            </div>
                        </div>

                        <!-- Design Update: Title -->
                        <h3 class="font-bold text-slate-800 text-sm mb-1 line-clamp-2 leading-snug group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
                        <!-- Design Update: Short Description -->
                        <p class="text-slate-500 text-[11px] leading-relaxed mb-4 line-clamp-2">
                            {{ Str::limit(strip_tags($book->description), 80) ?: 'Explore this valuable scholarly resource within our digital library collection.' }}
                        </p>
                        
                        <!-- Design Update: Resource Type & Action -->
                        <div class="mt-auto pt-3 border-t border-slate-50 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[9px] text-slate-400 uppercase font-bold tracking-wider">Type</span>
                                <span class="text-[10px] font-bold text-slate-700">
                                    {{ $book->download_type === 'file' ? 'PDF eBook' : ($book->download_type === 'link' ? 'Guide' : 'Archive') }}
                                </span>
                            </div>

                            @if($book->download_type === 'file' && $book->download_file)
                                <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="px-3 py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] transition-all flex items-center gap-1.5 no-underline">
                                    Access
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            @elseif($book->download_type === 'link' && $book->download_link)
                                <a href="{{ $book->download_link }}" target="_blank" class="px-3 py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] transition-all flex items-center gap-1.5 no-underline">
                                    Access
                                    <span class="material-symbols-outlined text-[14px]">open_in_new</span>
                                </a>
                            @else
                                <span class="px-3 py-1.5 bg-gray-50 text-slate-300 rounded-lg font-bold text-[10px] cursor-not-allowed">Soon</span>
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
