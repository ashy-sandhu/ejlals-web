@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Section & Features Bar Wrapper (Ensures 100vh fit) -->
<div class="relative bg-white min-h-[calc(100vh-80px)] flex flex-col justify-center overflow-hidden">
    <!-- Hero Section -->
    <section class="max-w-7xl w-full mx-auto px-6 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center py-16 md:py-8 flex-1">
        <div class="lg:col-span-7 max-w-4xl flex flex-col justify-center">
            <h1 class="text-3xl md:text-5xl font-bold text-slate-800 leading-[1.1] mb-12 tracking-tighter">
                Empowering Modern Minds with Timeless Islamic 
                <span class="text-brand-teal italic inline-flex items-center whitespace-nowrap min-h-[1.3em] align-middle">
                    <span id="typewriter-text"></span><span id="cursor" class="inline-block w-0.5 h-[0.9em] bg-brand-gold ml-1.5 animate-pulse"></span>
                </span>
            </h1>
            <p class="text-slate-600 text-sm md:text-base mb-16 leading-relaxed max-w-md opacity-90">
            Interactive one on one sessions thoughtfully designed around your busy life. 
            A nurturing space where knowledge of Deen is delivered with clarity and care.
            </p>
            <div class="flex flex-wrap gap-6">
                <a href="#" class="bg-brand-gold hover:bg-brand-gold/90 text-white px-8 py-3.5 rounded-2xl font-bold transition-all shadow-md hover:shadow-lg hover:-translate-y-0.5 active:scale-95 text-sm">
                    Get Started Free
                </a>
                <a href="#" class="bg-white hover:bg-slate-50 text-slate-700 px-8 py-3.5 rounded-2xl font-bold transition-all ring-1 ring-inset ring-slate-900/5 hover:ring-brand-teal/30 hover:text-brand-teal shadow-sm text-sm">
                    View Programs
                </a>
            </div>
        </div>
        <div class="lg:col-span-5 relative hidden lg:flex items-center justify-center">
            <!-- Animation Backglow (Increased scale and opacity) -->
            <div class="absolute inset-0 bg-gradient-to-tr from-brand-teal/15 via-brand-gold/10 to-transparent rounded-full blur-[120px] scale-110 opacity-70"></div>
            
            <div class="relative w-full max-w-[500px]">
                <dotlottie-player src="{{ asset('animations/hero.lottie') }}" background="transparent" speed="1" style="width: 100%; height: auto;" loop autoplay class="hover:scale-105 transition-transform duration-700"></dotlottie-player>
            </div>
            
            <div class="absolute -bottom-4 -left-4 bg-white p-3 rounded-2xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce-slow">
                <div class="w-8 h-8 rounded-full bg-brand-gold/20 flex items-center justify-center text-brand-gold">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                </div>
                <div>
                    <div class="font-bold text-slate-800 text-[10px]">Top Rated Platform</div>
                    <div class="text-[8px] text-slate-400 font-bold uppercase tracking-wider">4.9/5 Student Reviews</div>
                </div>
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

<!-- Lottie Player & Styles -->
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>
<style>
@keyframes bounce-slow {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.animate-bounce-slow {
    animation: bounce-slow 4s infinite ease-in-out;
}
</style>

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
<section class="bg-white py-14 px-6 border-y border-gray-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="relative bg-white rounded-3xl aspect-[1.4/1] flex items-center justify-center overflow-hidden border border-gray-100 shadow-sm">
             <img src="{{ asset('storage/about-illustration-v1.jpg') }}" alt="About Ejlals Academy" class="w-full h-full object-cover">
        </div>
        <div>
            <h2 class="text-3xl font-bold mb-4 text-slate-800 tracking-tight">Who We Are</h2>
            <p class="text-slate-500 text-sm mb-4 leading-relaxed">
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

<!-- Featured Courses Section (Procreate Style) -->
<section class="max-w-7xl mx-auto px-6 py-10" x-data="{ activeCategory: 'all' }">
    <div class="text-center mb-8 max-w-2xl mx-auto">
        <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Ready to begin?</span>
        <h2 class="text-2xl md:text-3xl font-bold text-slate-900 tracking-tight mb-4">Lesson ideas.</h2>
        <p class="text-slate-500 text-sm leading-relaxed px-4">
            Explore our carefully curated modules tailored for every level of understanding. Whether you are beginning your journey or deepening your knowledge, find the structured guidance you need.
        </p>
    </div>

    <!-- Category Filters -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-8">
        <button 
            @click="activeCategory = 'all'"
            :class="activeCategory === 'all' ? 'bg-slate-900 text-white shadow-md' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
            class="px-5 py-2 rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-widest transition-all duration-300">
            See All
        </button>
        @foreach($featuredCategories as $category)
            <button 
                @click="activeCategory = '{{ $category->id }}'"
                :class="activeCategory === '{{ $category->id }}' ? 'bg-slate-900 text-white shadow-md' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
                class="px-5 py-2 rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-widest transition-all duration-300">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <!-- Courses Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-12 lg:gap-16">
        @forelse($featuredCourses as $course)
            <div 
                x-show="activeCategory === 'all' || activeCategory === '{{ $course->category_id }}'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="group cursor-pointer">
                <a href="{{ route('courses.show', $course->slug) }}" class="block p-3 rounded-3xl hover:bg-slate-50/50 transition-colors">
                    <!-- Card Image -->
                    <div class="relative aspect-video rounded-3xl overflow-hidden bg-slate-100 mb-4 border border-slate-100 shadow-sm transition-all duration-500 group-hover:shadow-xl group-hover:-translate-y-1">
                        @if($course->image)
                            <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center p-8">
                                <svg class="w-12 h-12 text-brand-teal/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Card Info -->
                    <div class="px-2">
                        <div class="flex items-center justify-between group/title">
                            <h3 class="text-[11px] md:text-xs uppercase font-bold text-slate-800 tracking-tight transition-colors group-hover:text-brand-teal">
                                {{ $course->title }}
                            </h3>
                            <span class="text-slate-300 group-hover:text-brand-teal group-hover:translate-x-1 transition-all">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7"></path></svg>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-full py-12 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                <p class="text-slate-400 font-medium text-sm">Coming Soon: Curated Islamic Education</p>
            </div>
        @endforelse
    </div>

    <!-- Explore More Button -->
    <div class="mt-10 flex justify-center">
        <a href="{{ route('courses.index') }}" class="group inline-flex items-center gap-2 bg-brand-teal text-white px-8 py-3 rounded-full text-sm font-bold transition-all shadow-md hover:shadow-brand-teal/20 hover:-translate-y-1 active:scale-95">
            Explore more courses
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="max-w-xl">
                <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Scholarly Resources</span>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight mb-4">Digital Library</h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-md">
                    Access our premium collection of Islamic texts, study guides, and supplementary materials designed to support your lifelong learning.
                </p>
            </div>
            <a href="{{ route('books.index') }}" class="group inline-flex items-center gap-3 bg-slate-50 border border-slate-100 px-6 py-3 rounded-2xl text-slate-600 font-bold text-xs hover:bg-brand-gold hover:text-white hover:border-brand-gold transition-all shadow-sm">
                Visit Archives
                <div class="w-6 h-6 rounded-full bg-white flex items-center justify-center group-hover:bg-white/20 transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                </div>
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 md:gap-6 mt-4">
            @forelse($featuredBooks as $book)
            <div class="flex flex-col group">
                <div class="aspect-[3/4] bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg relative mb-4">
                    @if($book->image)
                        <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-tr from-slate-100 to-slate-200 flex items-center justify-center p-8 text-center">
                            <span class="text-slate-400 font-bold text-sm uppercase tracking-widest opacity-30">{{ $book->title }}</span>
                        </div>
                    @endif
                </div>
                <h3 class="font-bold text-slate-800 text-sm mb-1 line-clamp-2 leading-snug group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                <p class="text-slate-400 text-[9px] uppercase tracking-widest font-bold mb-3">Ejlals Repository</p>
                
                @if($book->download_type === 'file' && $book->download_file)
                    <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="mt-auto bg-brand-teal text-white py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-slate-900 transition-all flex items-center justify-center gap-2">
                        View Resource
                    </a>
                @elseif($book->download_type === 'link' && $book->download_link)
                    <a href="{{ $book->download_link }}" target="_blank" class="mt-auto bg-gray-100 text-brand-teal py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-brand-teal hover:text-white transition-all flex items-center justify-center gap-2">
                        Access Guide
                    </a>
                @else
                    <span class="mt-auto bg-gray-50 text-slate-300 py-2.5 px-3 rounded-xl text-xs font-bold text-center cursor-not-allowed">Coming Soon</span>
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
<section class="bg-[#FDFDFC] py-10 px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="max-w-xl">
                <div class="flex items-center gap-3 mb-1.5">
                    <span class="w-8 h-[2px] bg-brand-gold rounded-full"></span>
                    <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em]">The Academy Press</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-slate-900 leading-tight tracking-tight">Scholarly Insights</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-3 bg-white border border-slate-100 px-6 py-3 rounded-2xl text-slate-600 font-bold text-xs hover:bg-brand-teal hover:text-white hover:border-brand-teal transition-all shadow-sm">
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
                <div class="relative bg-white rounded-3xl border border-slate-100 p-2 shadow-sm hover:shadow-xl transition-all duration-700 h-full flex flex-col">
                    <div class="relative aspect-[2/1] rounded-2xl overflow-hidden bg-slate-100 mb-4">
                        @if($mainPost->image)
                            <img src="{{ Storage::url($mainPost->image) }}" alt="{{ $mainPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                                <svg class="w-12 h-12 text-brand-teal/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-6 left-6">
                            <span class="bg-white/95 backdrop-blur-md text-brand-teal text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-sm border border-slate-100">
                                {{ $mainPost->category->name ?? 'Featured' }}
                            </span>
                        </div>
                    </div>
                    <div class="px-4 pb-4 flex-1 flex flex-col">
                        <h3 class="text-2xl font-bold text-slate-900 group-hover:text-brand-teal transition-colors mb-4 leading-tight line-clamp-2">
                            {{ $mainPost->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                            {!! nl2br(e($mainPost->description ?? Str::limit(strip_tags($mainPost->content), 150))) !!}
                        </p>
                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $mainPost->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="flex items-center gap-2 text-brand-teal font-bold text-sm group/btn">
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
                <a href="{{ route('posts.show', $post->slug) }}" class="group bg-white rounded-3xl p-3 border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 flex items-center gap-5">
                    <div class="w-24 h-24 shrink-0 rounded-xl overflow-hidden bg-slate-100">
                        @if($post->image)
                            <img src="{{ Storage::url($post->image) }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        @else
                           <div class="w-full h-full flex items-center justify-center text-brand-teal/10"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg></div>
                        @endif
                    </div>
                    <div class="flex-1 pr-2">
                        <span class="text-brand-teal font-bold text-[9px] uppercase tracking-widest mb-1.5 block">{{ $post->category->name ?? 'Article' }}</span>
                        <h4 class="text-md font-bold text-slate-900 group-hover:text-brand-teal transition-colors line-clamp-2 leading-snug">
                            {{ $post->title }}
                        </h4>
                    </div>
                </a>
                @empty
                @endforelse

                <!-- Latest Text List -->
                <div class="mt-4 p-6 bg-slate-50 rounded-3xl border border-slate-100">
                    <h4 class="text-[10px] font-bold text-slate-400 uppercase tracking-[0.2em] mb-6 pb-3 border-b border-slate-200/50">Recent Updates</h4>
                    <div class="space-y-6">
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
<section class="bg-white py-10 px-6 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-8">
            <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Social Proof</span>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">Student & Parent Reviews</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"The 1-on-1 sessions have completely changed how my kids learn. The teachers are incredibly patient and the schedule is super flexible."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-teal/10 flex items-center justify-center font-bold text-brand-teal text-xs">SA</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Sarah Ahmed</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Parent</p>
                    </div>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"I was looking for a authentic Tajweed course and Ejlals Academy delivered exactly what I needed. Highly professional scholars."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-gold/10 flex items-center justify-center font-bold text-brand-gold text-xs">OM</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Omar Mansoor</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Student</p>
                    </div>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"The monthly progress reports are great. They keep me informed about my daughter's growth and what she's learning next."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-teal/10 flex items-center justify-center font-bold text-brand-teal text-xs">FK</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Fatima Khan</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Parent</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="bg-[#FDFDFC] py-10 px-6">
    <div class="max-w-3xl mx-auto">
        <div class="text-center mb-8">
            <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Clarifications</span>
            <h2 class="text-2xl md:text-3xl font-bold text-slate-800 tracking-tight">Frequently Asked Questions</h2>
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
<section class="max-w-5xl mx-auto px-6 py-12">
    <div class="bg-gray-50 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-left border border-gray-100">
        <div class="flex-1">
            <h2 class="text-2xl font-bold mb-3 text-slate-800 uppercase tracking-tight">Practical Solutions?</h2>
            <p class="text-slate-500 text-xs leading-relaxed">
                After learning the concepts, you can explore our carefully selected products and resources designed to support your learning and daily needs.
            </p>
        </div>
        <div class="w-full max-w-sm">
            <form action="#" class="flex gap-2">
                <input type="email" placeholder="Email Address" class="flex-1 bg-white border border-gray-200 py-2.5 px-4 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                <button class="bg-brand-teal hover:bg-brand-teal/90 text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md transition-all whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
