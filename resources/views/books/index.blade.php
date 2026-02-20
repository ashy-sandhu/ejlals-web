@extends('layouts.app')

@section('title', 'Library - Ejlals Academy')

@section('content')
<section class="bg-white py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-slate-800 mb-4">Library & Guides</h1>
            <p class="text-slate-500 max-w-2xl">Access our collection of digital books and guides designed for deep learning and quick reference.</p>
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
