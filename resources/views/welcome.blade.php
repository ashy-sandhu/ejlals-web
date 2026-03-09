@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Section & Features Bar Wrapper (Ensures 100vh fit) -->
<div class="relative bg-white min-h-[calc(100vh-80px)] flex flex-col">
    <!-- Hero Section -->
    <section class="flex-1 max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
        <div class="lg:col-span-7 max-w-4xl">
            <h1 class="text-4xl md:text-5xl font-extrabold text-slate-800 leading-[1.3] mb-6 tracking-tight">
                Empowering Modern Minds with Timeless Islamic 
                <span class="text-brand-teal italic inline-flex items-center whitespace-nowrap min-h-[1.3em] align-middle">
                    <span id="typewriter-text"></span><span id="cursor" class="inline-block w-0.5 h-[0.9em] bg-brand-gold ml-1.5 animate-pulse"></span>
                </span>
            </h1>
            <p class="text-slate-500 text-base md:text-lg mb-10 leading-relaxed max-w-xl opacity-90">
            Interactive one on one sessions thoughtfully designed around your busy life, so learning never feels overwhelming.
A nurturing space where knowledge of Deen is delivered with clarity, patience, and sincere care.
Guiding your heart and mind toward meaningful spiritual growth, one step at a time.
            </p>
            <div class="flex flex-wrap gap-4">
                <a href="#" class="bg-brand-gold hover:bg-brand-gold/90 text-white px-7 py-3.5 rounded-xl font-bold transition-all shadow-md hover:shadow-xl hover:-translate-y-1 active:scale-95 text-sm">
                    Start Free Trial
                </a>
                <a href="{{ route('courses.index') }}" class="bg-brand-teal hover:bg-brand-teal/90 text-white px-7 py-3.5 rounded-xl font-bold transition-all shadow-md hover:shadow-xl hover:-translate-y-1 active:scale-95 text-sm">
                    Explore Courses
                </a>
            </div>
        </div>
        
        <!-- Hero Illustration (Interactive Lottie) -->
        <div class="lg:col-span-5 relative group hidden lg:block">
            <div class="absolute -inset-4 bg-gradient-to-tr from-brand-teal/20 to-brand-gold/20 rounded-[3rem] blur-3xl opacity-60"></div>
            <div class="relative bg-transparent aspect-square w-full ml-auto max-w-[500px] flex items-center justify-center overflow-visible drop-shadow-2xl hover:scale-110 transition-transform duration-700">
                <dotlottie-player src="{{ asset('animations/hero.lottie') }}" background="transparent" speed="1" style="width: 130%; height: 130%;" loop autoplay></dotlottie-player>
            </div>
        </div>
    </section>

    <!-- Features Bar (Integrated into 100vh view) -->
    <section class="max-w-7xl mx-auto px-6 pb-12 w-full">
        <div class="bg-white rounded-[2rem] shadow-lg border border-gray-100 p-6 md:p-8 grid grid-cols-3 lg:grid-cols-6 gap-4 md:gap-8 backdrop-blur-sm bg-white/90">
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-teal/10 flex items-center justify-center text-brand-teal mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 1112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">1-on-1 Learning</span>
            </div>
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-gold/10 flex items-center justify-center text-brand-gold mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">Verified Scholars</span>
            </div>
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-teal/10 flex items-center justify-center text-brand-teal mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">Flexible Timings</span>
            </div>
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-gold/10 flex items-center justify-center text-brand-gold mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">Growth Reports</span>
            </div>
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-teal/10 flex items-center justify-center text-brand-teal mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2-2z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">Free Trial</span>
            </div>
            <div class="flex flex-col items-center text-center group">
                <div class="w-10 h-10 rounded-xl bg-brand-gold/10 flex items-center justify-center text-brand-gold mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                </div>
                <span class="text-[10px] md:text-xs font-bold text-slate-700 uppercase tracking-tighter">Certifications</span>
            </div>
        </div>
    </section>
</div>

<script>
    const typewriterWords = ["Values", "Education", "Faith", "Ethics"];
    let wordIdx = 0;
    let charIdx = 0;
    let isDeleting = false;
    const textElement = document.getElementById('typewriter-text');
    const typeSpeed = 150;
    const eraseSpeed = 100;
    const waitTime = 2500;

    function type() {
        const currentWord = typewriterWords[wordIdx];
        
        if (isDeleting) {
            textElement.textContent = currentWord.substring(0, charIdx - 1);
            charIdx--;
        } else {
            textElement.textContent = currentWord.substring(0, charIdx + 1);
            charIdx++;
        }

        let currentSpeed = isDeleting ? eraseSpeed : typeSpeed;

        if (!isDeleting && charIdx === currentWord.length) {
            currentSpeed = waitTime;
            isDeleting = true;
        } else if (isDeleting && charIdx === 0) {
            isDeleting = false;
            wordIdx = (wordIdx + 1) % typewriterWords.length;
            currentSpeed = 500;
        }

        setTimeout(type, currentSpeed);
    }

    document.addEventListener('DOMContentLoaded', type);
</script>
<section class="bg-white py-20 px-6 border-y border-gray-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="relative bg-white rounded-3xl aspect-[1.4/1] flex items-center justify-center overflow-hidden border border-gray-100 shadow-sm">
             <img src="{{ asset('storage/about-illustration-v1.jpg') }}" alt="About Ejlals Academy" class="w-full h-full object-cover">
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
        <!-- Desktop Link -->
        <a href="{{ route('courses.index') }}" class="hidden md:flex group items-center gap-2 text-brand-teal font-bold">
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

    <!-- Mobile Button (Centered & Wide) -->
    <div class="mt-12 flex justify-center md:hidden">
        <a href="{{ route('courses.index') }}" class="w-full bg-brand-teal text-white py-4 rounded-xl font-bold text-center shadow-md active:scale-95 transition-all">
            Explore All Courses
        </a>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-24 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-8 mb-16">
            <div class="max-w-xl">
                <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.4em] mb-3 block">Scholarly Resources</span>
                <h2 class="text-4xl font-bold text-slate-800 leading-tight">Digital Library</h2>
            </div>
            <a href="{{ route('books.index') }}" class="group inline-flex items-center gap-4 bg-slate-50 border border-slate-100 px-8 py-4 rounded-2xl text-slate-600 font-bold hover:bg-brand-gold hover:text-white hover:border-brand-gold transition-all shadow-sm">
                Visit Archives
                <div class="w-6 h-6 rounded-full bg-white flex items-center justify-center group-hover:bg-white/20 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            @forelse($featuredBooks as $book)
            <div class="flex flex-col group">
                <div class="aspect-[3/4] bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all hover:-translate-y-2 hover:shadow-xl relative mb-6">
                    @if($book->image)
                        <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-tr from-slate-100 to-slate-200 flex items-center justify-center p-8 text-center">
                            <span class="text-slate-400 font-bold text-sm uppercase tracking-widest opacity-30">{{ $book->title }}</span>
                        </div>
                    @endif
                </div>
                <h3 class="font-bold text-slate-800 mb-2 truncate group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                <p class="text-slate-400 text-[10px] uppercase tracking-widest font-bold mb-4">Ejlals Repository</p>
                
                @if($book->download_type === 'file' && $book->download_file)
                    <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="mt-auto bg-brand-teal text-white py-3 rounded-xl text-sm font-bold text-center hover:bg-slate-900 transition-all flex items-center justify-center gap-2">
                        View Resource
                    </a>
                @elseif($book->download_type === 'link' && $book->download_link)
                    <a href="{{ $book->download_link }}" target="_blank" class="mt-auto bg-gray-100 text-brand-teal py-3 rounded-xl text-sm font-bold text-center hover:bg-brand-teal hover:text-white transition-all flex items-center justify-center gap-2">
                        Access Guide
                    </a>
                @else
                    <span class="mt-auto bg-gray-50 text-slate-300 py-3 rounded-xl text-sm font-bold text-center cursor-not-allowed">Coming Soon</span>
                @endif
            </div>
            @empty
            <div class="col-span-full py-10 text-center bg-slate-50 rounded-3xl border-2 border-dashed border-slate-100">
                <p class="text-slate-400 italic">Library updates in progress.</p>
            </div>
            @endforelse
        </div>
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
                            {!! nl2br(e($mainPost->description ?? Str::limit(strip_tags($mainPost->content), 200))) !!}
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

<!-- Success Stories -->
<section class="bg-white py-24 px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.4em] mb-3 block">Social Proof</span>
            <h2 class="text-4xl font-bold text-slate-800 leading-tight">Student & Parent Reviews</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Review 1 -->
            <div class="bg-gray-50 p-10 rounded-[2.5rem] relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-6">
                    @for($i=0; $i<5; $i++) <svg class="w-4 h-4 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 italic leading-relaxed mb-8">"The 1-on-1 sessions have completely changed how my kids learn. The teachers are incredibly patient and the schedule is super flexible."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-brand-teal/10 flex items-center justify-center font-bold text-brand-teal">SA</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Sarah Ahmed</h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Parent</p>
                    </div>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="bg-gray-50 p-10 rounded-[2.5rem] relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-6">
                    @for($i=0; $i<5; $i++) <svg class="w-4 h-4 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 italic leading-relaxed mb-8">"I was looking for a authentic Tajweed course and Ejlals Academy delivered exactly what I needed. Highly professional scholars."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-brand-gold/10 flex items-center justify-center font-bold text-brand-gold">OM</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Omar Mansoor</h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Student</p>
                    </div>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="bg-gray-50 p-10 rounded-[2.5rem] relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-6">
                    @for($i=0; $i<5; $i++) <svg class="w-4 h-4 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 italic leading-relaxed mb-8">"The monthly progress reports are great. They keep me informed about my daughter's growth and what she's learning next."</p>
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-brand-teal/10 flex items-center justify-center font-bold text-brand-teal">FK</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Fatima Khan</h4>
                        <p class="text-[10px] text-slate-400 font-bold uppercase tracking-widest">Parent</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-[#FDFDFC] py-24 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-16">
            <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.4em] mb-3 block">Clarifications</span>
            <h2 class="text-4xl font-bold text-slate-800 leading-tight">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden text-left">
                <button class="w-full p-6 text-left flex items-center justify-between group focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800">How do the 1-on-1 sessions work?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="p-6 pt-0 text-slate-500 hidden leading-relaxed">
                    Our 1-on-1 sessions are conducted via our interactive platform. Each student is assigned a dedicated scholar who fits their specific learning goals and pace.
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden text-left">
                <button class="w-full p-6 text-left flex items-center justify-between group focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800">Are the teachers verified scholars?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="p-6 pt-0 text-slate-500 hidden leading-relaxed">
                    Absolutely. Every instructor at Ejlals Academy undergoes a rigorous background check and verification of their scholarly credentials to ensure the highest quality of education.
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden text-left">
                <button class="w-full p-6 text-left flex items-center justify-between group focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800">Can I choose my lesson timings?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="p-6 pt-0 text-slate-500 hidden leading-relaxed">
                    Yes, flexibility is one of our key features. You can schedule your sessions at times that are most convenient for you and your family.
                </div>
            </div>
        </div>
    </div>
</section>
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
