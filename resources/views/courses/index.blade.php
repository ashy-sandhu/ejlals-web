@extends('layouts.app')

@section('title', 'All Courses - Ejlals Academy')

@section('content')
<section class="relative bg-slate-900 overflow-hidden pt-24 pb-24 px-6 border-b border-white/5">
    <!-- Mesh Gradient Layer -->
    <div class="absolute inset-0 pointer-events-none opacity-40">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_70%_20%,#EA7F26_0%,transparent_60%),radial-gradient(circle_at_10%_80%,#1a2e35_0%,transparent_70%)]"></div>
    </div>
    
    <!-- Manuscript Grid Accents (Structural Unity) -->
    <div class="absolute inset-0 pointer-events-none opacity-[0.05]">
        <div class="absolute inset-0" style="background-image: linear-gradient(to right, #2C8793 1px, transparent 1px), linear-gradient(to bottom, #2C8793 1px, transparent 1px); background-size: 80px 80px;"></div>
    </div>
    
    <!-- Organic Knowledge Blobs (Unique Artistic Layer) -->
    <div class="absolute inset-0 overflow-hidden pointer-events-none">
        <div class="absolute top-[10%] right-[15%] w-96 h-96 bg-brand-gold/[0.05] rounded-full blur-[120px] animate-pulse"></div>
        <div class="absolute bottom-[20%] left-[10%] w-80 h-80 bg-brand-teal/[0.08] rounded-full blur-[100px]"></div>
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

<section class="bg-white py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex items-center justify-between mb-16 pb-8 border-b border-gray-100">
            <div>
                <h2 class="text-sm font-bold text-slate-400 uppercase tracking-[0.2em] mb-2">Academic Curriculum</h2>
                <div class="h-1.5 w-8 bg-brand-gold rounded-full"></div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($courses as $course)
                <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all group">
                    <div class="aspect-video bg-gray-100 relative overflow-hidden">
                        @if($course->image)
                            <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/10 to-brand-gold/10 flex items-center justify-center">
                                <span class="text-brand-teal font-bold uppercase tracking-widest text-xs opacity-50">Course Preview</span>
                            </div>
                        @endif
                    </div>
                    <div class="p-8">
                        <div class="flex items-center gap-2 mb-4">
                            <span class="bg-brand-teal/10 text-brand-teal text-[10px] font-bold uppercase tracking-wider px-2.5 py-1 rounded-full">Educational</span>
                        </div>
                        <h3 class="text-xl font-bold text-slate-800 mb-3 group-hover:text-brand-teal transition-colors">{{ $course->title }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">{!! nl2br(e($course->summary ?? Str::limit(strip_tags($course->description), 150))) !!}</p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                            <span class="text-brand-gold font-bold">Free</span>
                            <a href="{{ route('courses.show', $course->slug) }}" class="text-brand-teal font-bold text-sm inline-flex items-center gap-1 group/btn">
                                Enrollment Info 
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full py-20 text-center">
                    <p class="text-slate-400 italic">No courses available at the moment. Please check back later!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-16">
            {{ $courses->links() }}
        </div>
    </div>
</section>
@endsection
