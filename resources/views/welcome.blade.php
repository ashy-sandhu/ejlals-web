@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-16 md:py-24 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="max-w-xl">
        <h1 class="text-5xl md:text-6xl font-bold text-slate-800 leading-tight mb-6">
            Learn, Grow & Build <br>
            <span class="text-brand-teal">Knowledge</span> That Matters
        </h1>
        <p class="text-slate-500 text-lg mb-8 leading-relaxed">
            High-quality educational content, practical guidance, and trusted resources to help you learn, improve, and make better decisions.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#" class="bg-brand-gold hover:bg-brand-gold/90 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md">
                Start Learning
            </a>
            <a href="#" class="bg-brand-teal hover:bg-brand-teal/90 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md">
                Explore Guides
            </a>
        </div>

        <!-- Trust Marks -->
        <div class="mt-12 flex flex-wrap gap-6 text-sm text-slate-400 font-medium">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Research-based content
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Clear & easy explanations
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Updated and practical knowledge
            </div>
        </div>
    </div>
    
    <!-- Hero Illustration -->
    <div class="relative group">
        <div class="absolute -inset-4 bg-gradient-to-tr from-brand-teal/20 to-brand-gold/20 rounded-[3rem] blur-2xl opacity-50 group-hover:opacity-75 transition-opacity duration-500"></div>
        <div class="relative bg-white rounded-[2.5rem] aspect-square flex items-center justify-center overflow-hidden border border-gray-100 shadow-sm">
            <img src="{{ asset('storage/hero-illustration.svg') }}" alt="Sacred Spiritual Learning" class="w-full h-full object-cover">
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="bg-white py-20 px-6 border-y border-gray-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative bg-white rounded-3xl aspect-[1.4/1] flex items-center justify-center overflow-hidden border border-gray-100 shadow-sm">
             <img src="{{ asset('storage/about-illustration.svg') }}" alt="About Ejlals Academy" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-4xl font-bold mb-6 text-slate-800 tracking-tight">Who We Are</h2>
            <p class="text-slate-500 mb-6 leading-relaxed">
                We are an educational platform focused on delivering clear, reliable, and easy-to-understand information. Our mission is to simplify learning by providing structured guides, explanations, and resources that anyone can apply in real life.
            </p>
            <p class="text-slate-500 mb-8 leading-relaxed">
                We believe education should be accessible, practical, and trustworthy.
            </p>
            <a href="#" class="inline-flex items-center text-brand-teal font-bold hover:gap-2 transition-all">
                About Us 
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- Featured Courses Section -->
<section class="max-w-7xl mx-auto px-6 py-24">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
        <div>
            <span class="text-brand-teal font-bold text-xs uppercase tracking-[0.3em] mb-3 block">Expert-Led Learning</span>
            <h2 class="text-4xl font-bold text-slate-800 leading-tight">Featured Courses</h2>
        </div>
        <a href="{{ route('courses.index') }}" class="group flex items-center gap-2 text-brand-teal font-bold">
            Explore All Courses
            <div class="w-10 h-10 rounded-full border border-brand-teal/20 flex items-center justify-center group-hover:bg-brand-teal group-hover:text-white transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </div>
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @forelse($featuredCourses as $course)
        <div class="bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group">
            <div class="aspect-[16/10] bg-slate-100 relative overflow-hidden">
                @if($course->image)
                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                @else
                    <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                        <svg class="w-12 h-12 text-brand-teal/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                    </div>
                @endif
                <div class="absolute top-6 left-6">
                    <span class="bg-white/95 backdrop-blur-sm text-slate-800 text-[10px] font-bold px-3 py-1.5 rounded-full shadow-sm">Popular</span>
                </div>
            </div>
            <div class="p-8">
                <h3 class="text-xl font-bold text-slate-800 mb-4 group-hover:text-brand-teal transition-colors line-clamp-1">{{ $course->title }}</h3>
                <div class="flex items-center gap-4 text-xs text-slate-400 mb-6 pb-6 border-b border-gray-50">
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        12 Lessons
                    </span>
                    <span class="flex items-center gap-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        Beginner
                    </span>
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-brand-teal font-extrabold text-lg">Free</span>
                    <a href="{{ route('courses.show', $course->slug) }}" class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-slate-400 group-hover:bg-brand-gold group-hover:text-white transition-all shadow-inner" aria-label="View Course Details: {{ $course->title }}">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                    </a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full bg-gray-50 rounded-[2.5rem] py-20 text-center border-2 border-dashed border-gray-200">
            <p class="text-slate-400 font-medium">Coming Soon: Curated Islamic Education</p>
        </div>
        @endforelse
    </div>
</section>

<!-- Articles Section -->
<section class="bg-[#FDFDFC] py-28 px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-20">
            <div class="max-w-xl">
                <div class="flex items-center gap-3 mb-4">
                    <span class="w-12 h-[2px] bg-brand-gold rounded-full"></span>
                    <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.4em]">The Academy Press</span>
                </div>
                <h2 class="text-4xl md:text-5xl font-extrabold text-slate-900 leading-tight tracking-tight">Scholarly Insights</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-4 bg-white border border-slate-100 px-8 py-4 rounded-2xl text-slate-600 font-bold hover:bg-brand-teal hover:text-white hover:border-brand-teal transition-all shadow-sm">
                Explore Full Library
                <div class="w-6 h-6 rounded-full bg-slate-50 flex items-center justify-center group-hover:bg-white/20 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
            <!-- Main Featured Card (Left) -->
            <div class="lg:col-span-7 group">
                @if($featuredPosts->count() > 0)
                @php $mainPost = $featuredPosts->first(); @endphp
                <div class="relative bg-white rounded-[3rem] border border-slate-100 p-4 shadow-sm hover:shadow-xl transition-all duration-700 h-full flex flex-col">
                    <div class="relative aspect-[16/10] rounded-[2.2rem] overflow-hidden bg-slate-100 mb-8">
                        @if($mainPost->image)
                            <img src="{{ Storage::url($mainPost->image) }}" alt="{{ $mainPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                                <svg class="w-16 h-16 text-brand-teal/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-8 left-8">
                            <span class="bg-white/95 backdrop-blur-md text-brand-teal text-[10px] font-bold uppercase tracking-widest px-5 py-2 rounded-full shadow-sm border border-slate-100">
                                {{ $mainPost->category->name ?? 'Featured' }}
                            </span>
                        </div>
                    </div>
                    <div class="px-6 pb-6 flex-1 flex flex-col">
                        <h3 class="text-3xl font-extrabold text-slate-900 group-hover:text-brand-teal transition-colors mb-5 leading-tight line-clamp-2">
                            {{ $mainPost->title }}
                        </h3>
                        <p class="text-slate-500 mb-8 line-clamp-3 leading-relaxed">
                            {{ Str::limit(strip_tags($mainPost->content), 200) }}
                        </p>
                        <div class="mt-auto pt-8 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $mainPost->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="flex items-center gap-2 text-brand-teal font-extrabold text-sm group/btn">
                                Read Full Article
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                            </a>
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-slate-50 rounded-[3rem] p-12 text-center flex items-center justify-center border border-dashed border-slate-200">
                    <p class="text-slate-400 italic">Academy insights coming soon.</p>
                </div>
                @endif
            </div>

            <!-- Side List (Right) -->
            <div class="lg:col-span-5 flex flex-col gap-6">
                <!-- Secondary Featured -->
                @forelse($featuredPosts->skip(1) as $post)
                <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white rounded-[2.5rem] p-4 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 flex items-center gap-6">
                    <div class="w-32 h-32 shrink-0 rounded-2xl overflow-hidden bg-slate-100">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                           <div class="w-full h-full flex items-center justify-center text-brand-teal/10"><svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg></div>
                        @endif
                    </div>
                    <div class="flex-1 pr-4">
                        <span class="text-brand-teal font-bold text-[10px] uppercase tracking-widest mb-2 block">{{ $post->category->name ?? 'Article' }}</span>
                        <h4 class="text-lg font-bold text-slate-900 group-hover:text-brand-teal transition-colors line-clamp-2 leading-snug">
                            {{ $post->title }}
                        </h4>
                    </div>
                </a>
                @empty
                @endforelse

                <!-- Latest Text List -->
                <div class="mt-4 p-8 bg-slate-50 rounded-[2.5rem] border border-slate-100">
                    <h4 class="text-xs font-bold text-slate-400 uppercase tracking-[0.2em] mb-8 pb-4 border-b border-slate-200/50">Recent Updates</h4>
                    <div class="space-y-8">
                        @forelse($latestPosts as $post)
                        <div class="group">
                            <a href="{{ route('posts.show', $post->slug) }}" class="block">
                                <h5 class="font-bold text-slate-800 group-hover:text-brand-teal transition-colors mb-2 line-clamp-1">{{ $post->title }}</h5>
                                <div class="flex items-center gap-3 text-[10px] font-bold text-slate-400 uppercase tracking-widest">
                                    <span>{{ $post->created_at->format('M d') }}</span>
                                    <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                                    <span>{{ $post->category->name ?? 'Article' }}</span>
                                </div>
                            </a>
                        </div>
                        @empty
                        <p class="text-slate-400 text-xs italic">More articles in development.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="max-w-5xl mx-auto px-6 py-20">
    <div class="bg-gray-50 rounded-[2.5rem] p-12 md:p-16 flex flex-col md:flex-row items-center gap-12 text-center md:text-left border border-gray-100">
        <div class="flex-1">
            <h2 class="text-3xl font-bold mb-4 text-slate-800 uppercase tracking-tight">Looking for Practical Solutions?</h2>
            <p class="text-slate-500 leading-relaxed">
                After learning the concepts, you can explore our carefully selected products and resources designed to support your learning and daily needs.
            </p>
        </div>
        <div class="w-full max-w-md">
            <form action="#" class="flex gap-2">
                <input type="email" placeholder="Email Address" class="flex-1 bg-white border border-gray-200 py-3.5 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                <button class="bg-brand-teal hover:bg-brand-teal/90 text-white px-6 py-3.5 rounded-2xl font-bold shadow-md transition-all whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
