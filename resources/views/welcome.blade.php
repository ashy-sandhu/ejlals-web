@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Carousel Section (Stitch Integration) -->
<x-hero-carousel />

<!-- Lottie Player Script -->
<script src="https://unpkg.com/@dotlottie/player-component@2.7.12/dist/dotlottie-player.mjs" type="module"></script>

<!-- Animations & Scripts -->
<style>
@keyframes gradient-shift {
    0% { background-position: 0% 50%; }
    100% { background-position: 200% 50%; }
}
.animate-gradient-shift {
    animation: gradient-shift 3s linear infinite;
}
@keyframes fade-in-up {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}
.animate-fade-in-up {
    animation: fade-in-up 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
}
.text-shadow-sm {
    text-shadow: 0 1px 2px rgba(0,0,0,0.5);
}
.islamic-pattern {
    background-image: radial-gradient(circle at 2px 2px, rgba(19, 140, 144, 0.05) 1px, transparent 0);
    background-size: 24px 24px;
}
.layered-shadow {
    box-shadow: 0 10px 30px -10px rgba(19, 140, 144, 0.15), 0 4px 10px -5px rgba(234, 127, 38, 0.1);
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
<!-- Refined & Compact Who We Are Section -->
<section class="relative islamic-pattern py-10 lg:py-12 border-y border-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 lg:items-stretch items-center">
            <!-- Left Side: Layered Images (Scaled Down) -->
            <div class="relative max-w-xs lg:max-w-sm mx-auto w-full order-1 lg:order-1 h-fit mb-8 lg:mb-0">
                <!-- Image Container -->
                <div class="relative rounded-2xl overflow-hidden layered-shadow aspect-[4/3] lg:aspect-square z-10 w-full bg-slate-100">
                    <img src="{{ asset('images/ejlals_academy_who_we_are.png') }}" alt="Ejlals Academy Scholars" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-gradient-to-t from-brand-teal/10 to-transparent"></div>
                </div>
                
                <!-- Floating Experience Badge (Moved OUTSIDE overflow-hidden) -->
                <div class="absolute -bottom-4 -right-4 lg:bottom-4 lg:-right-6 bg-white/95 backdrop-blur-md px-3 py-2.5 rounded-2xl shadow-xl z-20 flex items-center gap-2.5 border border-brand-gold/20">
                    <div class="size-8 bg-brand-gold/10 rounded-full flex items-center justify-center text-brand-gold shrink-0">
                        <span class="material-symbols-outlined text-[16px]">workspace_premium</span>
                    </div>
                    <div>
                        <p class="text-[8px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-0.5">Experience</p>
                        <p class="text-xs font-black text-slate-800 leading-none">10+ Years</p>
                    </div>
                </div>

                <!-- Decorative Layered Elements -->
                <div class="absolute -bottom-3 -right-3 w-1/2 h-1/2 bg-brand-gold/10 border border-brand-gold/20 rounded-2xl z-0"></div>
                <div class="absolute -top-3 -left-3 w-1/4 h-1/4 bg-brand-teal/5 rounded-full blur-2xl z-0"></div>
            </div>

            <!-- Right Side: Content -->
            <div class="flex flex-col justify-between order-2 lg:order-2 lg:py-2">
                <!-- Header Component -->
                <div class="text-center lg:text-left mb-6">
                    <div class="flex items-center justify-center lg:justify-start gap-3 mb-2">
                        <span class="w-6 h-[2px] bg-brand-gold rounded-full"></span>
                        <span class="text-brand-gold font-bold tracking-[0.4em] uppercase text-[9px] md:text-[10px]">Our Legacy</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-slate-900 leading-[1.1] tracking-tight">
                        Who We Are
                    </h2>
                    <p class="mt-4 text-[13px] md:text-sm text-slate-600 leading-relaxed font-medium max-w-xl mx-auto lg:mx-0">
                        <span class="text-brand-teal font-bold">Ejlals Academy</span> is a sanctuary of knowledge where traditional spiritual wisdom meets modern academic rigor. We are dedicated to nurturing a generation of leaders who are intellectually capable, deeply rooted in faith, and prepared to illuminate the global community with purposeful action.
                    </p>
                </div>

                <!-- Square Feature Cards Container -->
                <div class="flex flex-col flex-1 justify-center mb-6 w-full">
                    <!-- Feature Cards Row -->
                    <div class="flex flex-row gap-2 lg:gap-3 w-full overflow-x-auto no-scrollbar pb-2 lg:pb-0">
                        <!-- Card 1 -->
                        <div class="group flex flex-col items-center justify-center p-3 rounded-2xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-[90px] md:min-w-[100px] h-28 lg:h-32">
                            <div class="flex-shrink-0 size-10 md:size-12 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center group-hover:bg-brand-teal/10 transition-all duration-500 mb-2 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/authentic.lottie') }}" background="transparent" speed="0.5" style="width: 130%; height: 130%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-xs font-bold text-slate-800 group-hover:text-brand-teal transition-colors mb-0.5 leading-tight">Authentic</h3>
                            <p class="text-slate-500 text-[9px] md:text-[10px] leading-tight px-0.5 sm:px-1 hidden sm:block">Curriculum by experts.</p>
                        </div>
                        <!-- Card 2 -->
                        <div class="group flex flex-col items-center justify-center p-3 rounded-2xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-[90px] md:min-w-[100px] h-28 lg:h-32">
                            <div class="flex-shrink-0 size-10 md:size-12 rounded-xl bg-brand-gold/5 text-brand-gold flex items-center justify-center group-hover:bg-brand-gold/10 transition-all duration-500 mb-2 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/spirtual.lottie') }}" background="transparent" speed="1.0" style="width: 130%; height: 130%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-xs font-bold text-slate-800 group-hover:text-brand-gold transition-colors mb-0.5 leading-tight">Spiritual</h3>
                            <p class="text-slate-500 text-[9px] md:text-[10px] leading-tight px-0.5 sm:px-1 hidden sm:block">Guided soul sessions.</p>
                        </div>
                        <!-- Card 3 -->
                        <div class="group flex flex-col items-center justify-center p-3 rounded-2xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-[90px] md:min-w-[100px] h-28 lg:h-32">
                            <div class="flex-shrink-0 size-10 md:size-12 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center group-hover:bg-brand-teal/10 transition-all duration-500 mb-2 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/global.lottie') }}" background="transparent" speed="1.0" style="width: 130%; height: 130%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-xs font-bold text-slate-800 group-hover:text-brand-teal transition-colors mb-0.5 leading-tight">Global</h3>
                            <p class="text-slate-500 text-[9px] md:text-[10px] leading-tight px-0.5 sm:px-1 hidden sm:block">Worldwide network.</p>
                        </div>
                        <!-- Card 4 (Symmetry) -->
                        <div class="group flex flex-col items-center justify-center p-3 rounded-2xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-[90px] md:min-w-[100px] h-28 lg:h-32">
                            <div class="flex-shrink-0 size-10 md:size-12 rounded-xl bg-brand-gold/5 text-brand-gold flex items-center justify-center group-hover:bg-brand-gold/10 transition-all duration-500 mb-2 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/expert.lottie') }}" background="transparent" speed="0.5" style="width: 130%; height: 130%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-xs font-bold text-slate-800 group-hover:text-brand-gold transition-colors mb-0.5 leading-tight">Expert</h3>
                            <p class="text-slate-500 text-[9px] md:text-[10px] leading-tight px-0.5 sm:px-1 hidden sm:block">Certified instructors.</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Button -->
                <div class="flex justify-center lg:justify-start">
                    <a href="#" class="group inline-flex items-center gap-2 bg-brand-teal text-white px-6 py-2.5 rounded-lg font-bold text-xs shadow-lg shadow-brand-teal/20 hover:shadow-brand-teal/30 hover:-translate-y-0.5 transition-all active:scale-[0.98]">
                        <span>About Us</span>
                        <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">trending_flat</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Courses Section (Modern Design) -->
<section class="max-w-7xl mx-auto px-4 py-16" x-data="{ activeCategory: 'all' }">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto text-center mb-12">
        <span class="inline-block px-3 py-1 text-[10px] font-bold tracking-widest text-brand-gold uppercase bg-brand-gold/10 rounded-full mb-3">
            Ready to Begin
        </span>
        <h2 class="text-3xl md:text-4xl font-black text-slate-900 mb-3 leading-tight tracking-tight">
            Explore Our <span class="text-brand-teal">Learning Paths</span>
        </h2>
        <p class="text-[13px] md:text-sm text-slate-500 mb-8 max-w-2xl mx-auto leading-relaxed">
            The academy offers structured Islamic courses designed for beginners, intermediate learners, and students seeking deeper knowledge.
        </p>

        <!-- Horizontal Category List -->
        <div class="flex flex-wrap md:flex-nowrap md:overflow-x-auto no-scrollbar gap-2 md:gap-3 pb-2 justify-center items-center">
            <button 
                @click="activeCategory = 'all'"
                :class="activeCategory === 'all' ? 'border-b-2 border-brand-teal bg-brand-teal/10 text-brand-teal font-bold' : 'border-b-2 border-transparent text-slate-500 hover:text-brand-teal hover:bg-brand-teal/5 font-semibold'"
                class="whitespace-nowrap px-4 py-2 md:px-5 md:py-2.5 rounded-full text-[11px] md:text-xs transition-all duration-300 w-auto flex-shrink-0">
                All Courses
            </button>
            @foreach($featuredCategories as $category)
                <button 
                    @click="activeCategory = '{{ $category->id }}'"
                    :class="activeCategory === '{{ $category->id }}' ? 'border-b-2 border-brand-teal bg-brand-teal/10 text-brand-teal font-bold' : 'border-b-2 border-transparent text-slate-500 hover:text-brand-teal hover:bg-brand-teal/5 font-semibold'"
                    class="whitespace-nowrap px-4 py-2 md:px-5 md:py-2.5 rounded-full text-[11px] md:text-xs transition-all duration-300 w-auto flex-shrink-0">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
    </div>

    <!-- Course Grid Section -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 lg:gap-6">
        @forelse($featuredCourses as $course)
            <div 
                x-show="activeCategory === 'all' || activeCategory === '{{ $course->category_id }}'"
                x-transition:enter="transition ease-out duration-500"
                x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                class="group bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 border border-brand-teal/5 flex flex-col h-full">
                
                <a href="{{ route('courses.show', $course->slug) }}" class="flex flex-col h-full">
                    <!-- Image Container -->
                    <div class="relative h-40 w-full overflow-hidden bg-slate-100 shrink-0">
                        @if($course->image)
                            <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" />
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                                <span class="material-symbols-outlined text-4xl text-brand-teal/20">school</span>
                            </div>
                        @endif
                        
                        <!-- Level Badge (Optional fallback if level is null) -->
                        <div class="absolute top-3 left-3 bg-brand-teal/90 backdrop-blur-sm text-white text-[9px] font-bold uppercase tracking-wider px-2 py-0.5 rounded shadow-sm">
                            {{ $course->level ?? 'All Levels' }}
                        </div>
                    </div>

                    <!-- Content Container -->
                    <div class="p-4 md:p-5 flex flex-col flex-1 pb-6 md:pb-8">
                        <h3 class="text-[13px] md:text-[14px] font-bold text-slate-800 mb-2 group-hover:text-brand-teal transition-colors leading-snug">
                            {{ $course->title }}
                        </h3>
                        <p class="text-slate-500 text-[11px] leading-relaxed mb-4 line-clamp-2 flex-1">
                            {{ Str::limit(strip_tags($course->description), 100) ?: 'Begin your journey into authentic Islamic scholarship.' }}
                        </p>
                        
                        <!-- Footer metadata -->
                        <div class="flex items-center justify-between pt-4 border-t border-brand-teal/5 mt-auto">
                            <span class="text-[9px] font-bold text-slate-400 uppercase tracking-widest flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-[13px]">view_module</span>
                                {{ $course->modules_count ?? 0 }} Modules
                            </span>
                            <span class="material-symbols-outlined text-brand-teal transform group-hover:translate-x-1 transition-transform duration-300 text-base md:text-lg">arrow_forward</span>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-span-full py-16 text-center bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                <span class="material-symbols-outlined text-4xl text-slate-300 mb-3 block">menu_book</span>
                <p class="text-slate-400 font-medium text-sm">Coming Soon: Curated Islamic Education</p>
            </div>
        @endforelse
    </div>

    <!-- Explore More Button & CTA -->
    <div class="mt-12 flex justify-center pb-4">
        <a href="{{ route('courses.index') }}" class="group inline-flex items-center gap-2 bg-brand-gold text-white px-8 py-3.5 rounded-lg text-sm font-bold shadow-lg shadow-brand-gold/20 hover:brightness-110 active:scale-[0.98] transition-all">
            Explore more courses
            <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="max-w-xl">
                <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Scholarly Resources</span>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight mb-4">Digital Library</h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-md">
                    Access our premium collection of Islamic texts, study guides, and supplementary materials designed to support your lifelong learning.
                </p>
            </div>
            <a href="{{ route('books.index') }}" class="group inline-flex items-center gap-3 bg-white border border-slate-200 px-6 py-3 rounded-xl text-slate-600 font-medium text-xs hover:bg-slate-50 hover:text-brand-teal hover:border-brand-teal/30 transition-all shadow-sm">
                Visit Archives
                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-brand-teal/10 group-hover:text-brand-teal transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
                    <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="mt-auto bg-brand-teal text-white py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-brand-teal transition-all flex items-center justify-center gap-2">
                        View Resource
                    </a>
                @elseif($book->download_type === 'link' && $book->download_link)
                    <a href="{{ $book->download_link }}" target="_blank" class="mt-auto bg-slate-50 text-brand-teal py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-brand-teal hover:text-white transition-all flex items-center justify-center gap-2">
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
                    <span class="w-8 h-[2px] bg-brand-teal rounded-full"></span>
                    <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em]">The Academy Press</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-900 leading-tight tracking-tight">Scholarly Insights</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-3 bg-white border border-slate-200 px-6 py-3 rounded-xl text-slate-600 font-medium text-xs hover:bg-slate-50 hover:text-brand-teal hover:border-brand-teal/30 transition-all shadow-sm">
                Explore Full Library
                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-brand-teal/10 group-hover:text-brand-teal transition-colors">
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
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-teal/5 flex items-center justify-center">
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
                        <h3 class="text-2xl font-serif font-bold text-slate-900 group-hover:text-brand-teal transition-colors mb-4 leading-tight line-clamp-2">
                            {{ $mainPost->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                            {!! nl2br(e($mainPost->description ?? Str::limit(strip_tags($mainPost->content), 150))) !!}
                        </p>
                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $mainPost->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="flex items-center gap-2 text-brand-teal font-bold text-sm group/btn">
                                Read Full Article
                                <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
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
            <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Social Proof</span>
            <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight">Student & Parent Reviews</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
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
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"I was looking for a authentic Tajweed course and Ejlals Academy delivered exactly what I needed. Highly professional scholars."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-teal/10 flex items-center justify-center font-bold text-brand-teal text-xs">OM</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Omar Mansoor</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Student</p>
                    </div>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-teal/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
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
            <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Clarifications</span>
            <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight">Frequently Asked Questions</h2>
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
    <div class="bg-gray-50 rounded-[2rem] p-6 md:p-10 flex flex-col md:flex-row items-center gap-6 md:gap-8 text-center md:text-left border border-gray-100 shadow-sm">
        <div class="flex-1">
            <h2 class="text-2xl font-serif font-bold mb-3 text-slate-800 uppercase tracking-tight">Practical Solutions?</h2>
            <p class="text-slate-500 text-xs leading-relaxed">
                After learning the concepts, you can explore our carefully selected products and resources designed to support your learning and daily needs.
            </p>
        </div>
        <div class="w-full max-w-sm">
            <form action="#" class="flex flex-col sm:flex-row gap-2 w-full">
                <input type="email" placeholder="Email Address" class="flex-1 bg-white border border-gray-200 py-2.5 px-4 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all w-full">
                <button class="bg-brand-teal hover:bg-brand-teal/90 text-white px-6 py-2.5 rounded-xl text-xs font-bold shadow-md transition-all whitespace-nowrap w-full sm:w-auto active:scale-95">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
