@extends('layouts.app')

@section('title', 'All Courses - Ejlals Academy')

@section('content')
<section class="bg-gray-50 py-16 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="mb-12">
            <h1 class="text-4xl font-bold text-slate-800 mb-4">Our Courses</h1>
            <p class="text-slate-500 max-w-2xl">Explore our curated collection of educational material designed to build practical knowledge and spiritual growth.</p>
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
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2">{{ $course->description }}</p>
                        
                        <div class="flex items-center justify-between pt-6 border-t border-gray-50">
                            <span class="text-brand-gold font-bold">Free</span>
                            <a href="#" class="text-brand-teal font-bold text-sm inline-flex items-center gap-1 group/btn">
                                Enroll Now 
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
