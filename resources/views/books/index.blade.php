@extends('layouts.app')

@section('title', 'Library - Ejlals Academy')

@section('content')
<section class="relative bg-slate-900 overflow-hidden pt-32 pb-24 px-6 border-b border-white/5">
    <!-- Mesh Gradient Layer -->
    <div class="absolute inset-0 pointer-events-none opacity-50">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_30%,#2C8793_0%,transparent_70%),radial-gradient(circle_at_80%_70%,#EA7F26_0%,transparent_70%),radial-gradient(circle_at_50%_0%,#1a2e35_0%,transparent_100%)]"></div>
    </div>
    
    <!-- Diagonal Glass Overlays -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none select-none">
        <div class="absolute -top-1/4 -right-1/4 w-3/4 h-full bg-white/[0.03] backdrop-blur-3xl rotate-12" style="clip-path: polygon(20% 0, 100% 0, 100% 100%, 0% 100%);"></div>
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
            @forelse($books as $book)
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
                    <h3 class="font-bold text-slate-800 mb-2 truncate group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                    <p class="text-slate-400 text-xs uppercase tracking-widest font-bold mb-4">By Ejlals Academy</p>
                    
                    @if($book->download_type === 'file' && $book->download_file)
                        <a href="{{ Storage::url($book->download_file) }}" download="{{ $book->title }}" class="mt-auto bg-brand-teal text-white py-3 rounded-xl text-sm font-bold text-center hover:bg-slate-900 transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                            Download PDF
                        </a>
                    @elseif($book->download_type === 'link' && $book->download_link)
                        <a href="{{ $book->download_link }}" target="_blank" class="mt-auto bg-gray-100 text-brand-teal py-3 rounded-xl text-sm font-bold text-center hover:bg-brand-teal hover:text-white transition-all flex items-center justify-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                            Access Guide
                        </a>
                    @else
                        <span class="mt-auto bg-gray-50 text-slate-300 py-3 rounded-xl text-sm font-bold text-center cursor-not-allowed">Coming Soon</span>
                    @endif
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
