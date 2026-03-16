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
<section class="relative islamic-pattern py-8 lg:py-12 border-y border-gray-50 overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-16 items-stretch">
            <!-- Left Side: Layered Images -->
            <div class="flex justify-start lg:justify-end order-1 lg:order-1 mb-10 lg:mb-0">
                <!-- Wrapper fixed width and stretched height -->
                <div class="relative w-full lg:w-[480px] xl:w-[550px] min-h-[350px] sm:min-h-[400px] lg:h-full z-10">
                    <!-- Image Container -->
                    <div class="relative rounded-2xl overflow-hidden layered-shadow w-full h-full z-10 bg-slate-100 text-left">
                        <img src="{{ asset('images/ejlals_academy_who_we_are.png') }}" alt="Ejlals Academy Scholars" class="absolute inset-0 w-full h-full object-cover object-top block">
                        <div class="absolute inset-0 bg-gradient-to-t from-brand-teal/10 to-transparent pointer-events-none"></div>
                    </div>
                    
                    <!-- Floating Experience Badge -->
                    <div class="absolute -bottom-5 -left-2 sm:-left-4 lg:-bottom-6 lg:-left-6 bg-white/95 backdrop-blur-md px-4 py-3 rounded-2xl shadow-xl z-20 flex items-center gap-3 border border-brand-gold/20">
                        <div class="size-10 bg-brand-gold/10 rounded-full flex items-center justify-center text-brand-gold shrink-0">
                            <span class="material-symbols-outlined text-[20px]">workspace_premium</span>
                        </div>
                        <div>
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest leading-none mb-1">Experience</p>
                            <p class="text-sm font-black text-slate-800 leading-none">10+ Years</p>
                        </div>
                    </div>

                    <!-- Decorative Layered Elements -->
                    <div class="absolute -bottom-4 -left-2 lg:-bottom-4 lg:-left-4 w-2/3 h-2/3 bg-brand-gold/10 border border-brand-gold/20 rounded-2xl z-0 pointer-events-none"></div>
                    <div class="absolute -top-4 -right-4 w-1/3 h-1/3 bg-brand-teal/5 rounded-full blur-2xl z-0 pointer-events-none"></div>
                </div>
            </div>

            <!-- Right Side: Content -->
            <div class="flex flex-col justify-center order-2 lg:order-2 lg:pl-4">
                <!-- Header Component -->
                <div class="text-center lg:text-left mb-4 lg:mb-6">
                    <div class="flex items-center justify-center lg:justify-start gap-3 mb-1.5 lg:mb-2">
                        <span class="w-6 h-[2px] bg-brand-gold rounded-full"></span>
                        <span class="text-brand-gold font-bold tracking-[0.4em] uppercase text-[9px] md:text-[10px]">Our Legacy</span>
                    </div>
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-serif font-bold text-slate-900 leading-[1.1] tracking-tight">
                        Who We Are
                    </h2>
                    <p class="mt-2 lg:mt-4 text-[13px] md:text-sm text-slate-600 leading-relaxed font-medium max-w-xl mx-auto lg:mx-0">
                        <span class="text-brand-teal font-bold">Ejlals Academy</span> is a sanctuary of knowledge where traditional spiritual wisdom meets modern academic rigor. We are dedicated to nurturing a generation of leaders who are intellectually capable, deeply rooted in faith, and prepared to illuminate the global community with purposeful action.
                    </p>
                </div>

                <!-- Square Feature Cards Container -->
                <div class="flex flex-col flex-1 justify-center mb-6 w-full">
                    <!-- Feature Cards Row -->
                    <div class="flex flex-row gap-1.5 lg:gap-3 w-full items-stretch">
                        <!-- Card 1 -->
                        <div class="group flex flex-col items-center justify-start pt-2.5 pb-1.5 px-1 rounded-xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-0 min-h-[100px]">
                            <div class="flex-shrink-0 size-10 md:size-11 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center group-hover:bg-brand-teal/10 transition-all duration-500 mb-1.5 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/authentic.lottie') }}" background="transparent" speed="0.5" style="width: 140%; height: 140%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-[11px] font-bold text-slate-800 group-hover:text-brand-teal transition-colors mb-1 leading-tight">Authentic</h3>
                            <p class="text-slate-500 text-[8px] md:text-[9px] leading-[1.2] px-0.5 hidden sm:block">Curriculum by experts.</p>
                        </div>
                        <!-- Card 2 -->
                        <div class="group flex flex-col items-center justify-start pt-2.5 pb-1.5 px-1 rounded-xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-0 min-h-[100px]">
                            <div class="flex-shrink-0 size-10 md:size-11 rounded-xl bg-brand-gold/5 text-brand-gold flex items-center justify-center group-hover:bg-brand-gold/10 transition-all duration-500 mb-1.5 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/spirtual.lottie') }}" background="transparent" speed="1.0" style="width: 140%; height: 140%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-[11px] font-bold text-slate-800 group-hover:text-brand-gold transition-colors mb-1 leading-tight">Spiritual</h3>
                            <p class="text-slate-500 text-[8px] md:text-[9px] leading-[1.2] px-0.5 hidden sm:block">Guided soul sessions.</p>
                        </div>
                        <!-- Card 3 -->
                        <div class="group flex flex-col items-center justify-start pt-2.5 pb-1.5 px-1 rounded-xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-0 min-h-[100px]">
                            <div class="flex-shrink-0 size-10 md:size-11 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center group-hover:bg-brand-teal/10 transition-all duration-500 mb-1.5 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/global.lottie') }}" background="transparent" speed="1.0" style="width: 140%; height: 140%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-[11px] font-bold text-slate-800 group-hover:text-brand-teal transition-colors mb-1 leading-tight">Global</h3>
                            <p class="text-slate-500 text-[8px] md:text-[9px] leading-[1.2] px-0.5 hidden sm:block">Worldwide network.</p>
                        </div>
                        <!-- Card 4 (Symmetry) -->
                        <div class="group flex flex-col items-center justify-start pt-2.5 pb-1.5 px-1 rounded-xl bg-white border border-brand-teal/10 hover:border-brand-gold/30 transition-all duration-300 shadow-sm hover:shadow-md text-center flex-1 min-w-0 min-h-[100px]">
                            <div class="flex-shrink-0 size-10 md:size-11 rounded-xl bg-brand-gold/5 text-brand-gold flex items-center justify-center group-hover:bg-brand-gold/10 transition-all duration-500 mb-1.5 overflow-hidden relative">
                                <dotlottie-player src="{{ asset('animations/expert.lottie') }}" background="transparent" speed="0.5" style="width: 140%; height: 140%;" loop autoplay></dotlottie-player>
                            </div>
                            <h3 class="text-[11px] md:text-[11px] font-bold text-slate-800 group-hover:text-brand-gold transition-colors mb-1 leading-tight">Expert</h3>
                            <p class="text-slate-500 text-[8px] md:text-[9px] leading-[1.2] px-0.5 hidden sm:block">Certified instructors.</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Button -->
                <div class="flex justify-center w-full">
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
<section class="max-w-7xl mx-auto px-4 py-0 lg:py-8" x-data="{ activeCategory: 'all' }">
    <!-- Header Section -->
    <div class="max-w-4xl mx-auto text-center mb-4">
        <span class="inline-block px-3 py-1 text-[10px] font-bold tracking-widest text-brand-gold uppercase bg-brand-gold/10 rounded-full mb-3">
            Ready to Begin
        </span>
        <h2 class="text-2xl md:text-4xl font-black text-slate-900 mb-3 leading-tight tracking-tight">
            Explore Our <span class="text-brand-teal">Learning Paths</span>
        </h2>
        <p class="text-[13px] md:text-sm text-slate-500 mb-4 max-w-2xl mx-auto leading-relaxed">
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
    <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-5 lg:gap-6">
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
                    <div class="p-3 md:p-4 md:p-5 flex flex-col flex-1 pb-4 md:pb-6 md:pb-8">
                        <h3 class="text-[11px] md:text-[14px] font-bold text-slate-800 mb-1 group-hover:text-brand-teal transition-colors leading-snug">
                            {{ $course->title }}
                        </h3>
                        <p class="text-slate-500 text-[10px] md:text-[11px] leading-relaxed mb-3 line-clamp-2 flex-1">
                            {{ Str::limit(strip_tags($course->description), 80) ?: 'Begin your journey into authentic Islamic scholarship.' }}
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
    <div class="mt-4 flex justify-center">
        <a href="{{ route('courses.index') }}" class="group inline-flex items-center gap-2 bg-brand-gold text-white px-8 py-3.5 rounded-lg text-sm font-bold shadow-lg shadow-brand-gold/20 hover:brightness-110 active:scale-[0.98] transition-all">
            Explore more courses
            <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
        </a>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="max-w-xl">
                <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Scholarly Resources</span>
                <h2 class="text-xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight mb-4">Digital Library</h2>
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
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6 mt-4">
            @forelse($featuredBooks as $index => $book)
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
                    
                    <div class="p-2 pt-1 md:p-3 md:pt-1 flex flex-col grow">
                        <div class="flex items-center justify-between mb-3.0 md:mb-3">
                            <span class="text-brand-teal text-[7px] md:text-xs lg:text-[10px] font-semibold">Ejlals Repository</span>
                            <div class="flex items-center gap-1">
                                <span class="material-symbols-outlined text-brand-gold text-[12px]! lg:text-[11px]!" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="text-[8px] md:text-xs lg:text-[10px] font-bold text-slate-500">4.9</span>
                            </div>
                        </div>
                        
                        <h3 class="text-[9px] md:text-sm lg:text-[13px] font-bold text-slate-700 mb-1 line-clamp-2 leading-[1.2] group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
                        <p class="text-[8px] md:text-[12px] lg:text-[11px] text-slate-500/90 mb-1 line-clamp-2 leading-tight">
                            {{ Str::limit(strip_tags($book->description), 80) ?: 'Explore this valuable scholarly resource within our digital library collection.' }}
                        </p>
                        
                        <div class="mt-auto pt-1 border-t border-slate-200 flex items-center justify-between">
                            <div class="flex flex-col">
                                <span class="text-[7px] text-slate-400 uppercase font-semibold tracking-tight mb-0.5">Resource Type</span>
                                <span class="text-[10px] lg:text-[9px] font-semibold text-slate-700">
                                    {{ $book->download_type === 'file' ? 'PDF eBook' : ($book->download_type === 'link' ? 'Guide' : 'Archive') }}
                                </span>
                            </div>
                            
                            @if($book->download_type === 'file' && $book->download_file)
                                <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="px-2.5 py-1.5 md:px-4 md:py-2 lg:px-3.5 lg:py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] md:text-[11px] lg:text-[10px] transition-colors flex items-center gap-1 no-underline shadow-sm">
                                    View
                                    <span class="material-symbols-outlined text-[12px] md:text-[14px] lg:text-base" style="font-size: 12px;">open_in_new</span>
                                </a>
                            @elseif($book->download_type === 'link' && $book->download_link)
                                <a href="{{ $book->download_link }}" target="_blank" class="px-2.5 py-1.5 md:px-4 md:py-2 lg:px-3.5 lg:py-1.5 bg-brand-teal/10 text-brand-teal hover:bg-brand-teal hover:text-white rounded-lg font-bold text-[10px] md:text-[11px] lg:text-[10px] transition-colors flex items-center gap-1 no-underline shadow-sm">
                                    View
                                    <span class="material-symbols-outlined text-[12px] md:text-[14px] lg:text-base" style="font-size: 12px;">open_in_new</span>
                                </a>
                            @else
                                <span class="px-4 py-2 bg-slate-50 text-slate-400 rounded-lg font-bold text-[11px] cursor-not-allowed">Soon</span>
                            @endif
                        </div>
                    </div>
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
<section class="bg-[#FDFDFC] py-8 px-6 overflow-hidden border-y border-gray-50">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <header class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-8 border-b border-brand-teal/10 pb-6">
            <div class="max-w-2xl">
                <div class="flex items-center gap-3 mb-3">
                    <span class="inline-block w-8 h-[2px] bg-brand-gold"></span>
                    <span class="text-brand-gold font-bold tracking-[0.2em] text-[10px] uppercase">The Academy Press</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-serif font-black text-slate-900 mb-3 tracking-tight">
                    Scholarly <span class="text-brand-teal italic font-serif">Insights</span>
                </h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-xl">
                    Deep dives into Islamic sciences, pedagogy, and modern leadership. Bridging traditional wisdom with contemporary excellence.
                </p>
            </div>
            <div class="flex items-center">
                <a class="group flex items-center gap-2 bg-brand-teal text-white px-5 py-2.5 rounded-lg text-xs font-bold transition-all hover:bg-brand-teal/90 shadow-lg shadow-brand-teal/20" href="{{ route('posts.index') }}">
                    <span>Explore All Articles</span>
                    <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>
        </header>

        <!-- Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            <!-- Featured Large Card (Left) -->
            <div class="lg:col-span-7 group flex flex-col h-full">
                @if($featuredPosts->count() > 0)
                @php $mainPost = $featuredPosts->first(); @endphp
                <article class="relative h-full flex flex-col bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:border-brand-teal/20 border border-slate-100 transition-all duration-300">
                    <div class="relative aspect-[16/8] sm:aspect-[16/7] lg:aspect-[21/9] overflow-hidden bg-slate-100">
                        <div class="absolute inset-0 bg-slate-900/10 group-hover:bg-slate-900/0 transition-colors z-10"></div>
                        @if($mainPost->image)
                            <img alt="{{ $mainPost->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ Storage::url($mainPost->image) }}"/>
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-teal/10 flex items-center justify-center">
                                <svg class="w-12 h-12 text-brand-teal/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-4 left-4 z-20">
                            <span class="bg-brand-teal text-white text-[9px] font-bold px-3 py-1 rounded-full uppercase tracking-wider shadow-sm">Featured Insight</span>
                        </div>
                    </div>
                    <div class="p-5 md:p-6 flex flex-col flex-1">
                        <div class="flex items-center gap-3 mb-3">
                            <span class="text-brand-gold text-[10px] font-bold uppercase tracking-widest">{{ $mainPost->category->name ?? 'Category' }}</span>
                            <span class="w-1 h-1 rounded-full bg-slate-200"></span>
                            <span class="text-slate-400 text-xs">{{ $mainPost->created_at->format('M d, Y') }}</span>
                        </div>
                        <h3 class="text-xl md:text-2xl font-bold font-serif text-slate-900 mb-3 leading-tight group-hover:text-brand-teal transition-colors line-clamp-2">
                            {{ $mainPost->title }}
                        </h3>
                        <p class="text-slate-500 text-sm leading-relaxed mb-6 line-clamp-2 flex-1">
                            {!! nl2br(e($mainPost->description ?? Str::limit(strip_tags($mainPost->content), 150))) !!}
                        </p>
                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-slate-50">
                            <div class="flex items-center gap-2.5">
                                <div class="w-8 h-8 rounded-full bg-brand-teal/10 flex items-center justify-center text-brand-teal font-bold text-xs shrink-0">
                                    {{ strtoupper(substr($mainPost->author->name ?? 'Ejlals', 0, 1)) }}
                                </div>
                                <div class="leading-none">
                                    <p class="text-[11px] font-bold text-slate-800">{{ $mainPost->author->name ?? 'Ejlals Scholar' }}</p>
                                    <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest mt-0.5">Author</p>
                                </div>
                            </div>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="flex items-center gap-1.5 text-brand-teal font-bold text-xs hover:underline group/btn transition-all">
                                <span>Read Article</span>
                                <span class="material-symbols-outlined !text-sm group-hover/btn:translate-x-0.5 transition-transform">menu_book</span>
                            </a>
                        </div>
                    </div>
                </article>
                @else
                <div class="bg-slate-50 rounded-2xl p-12 text-center flex items-center justify-center border border-dashed border-slate-200 h-full">
                    <p class="text-slate-400 italic text-sm">Academy insights coming soon.</p>
                </div>
                @endif
            </div>

            <!-- Smaller Cards (Right) -->
            <div class="lg:col-span-5 flex flex-col gap-4">
                @forelse($featuredPosts->skip(1)->take(3) as $post)
                <!-- Small Card -->
                <article class="group relative bg-white p-3 md:p-4 rounded-2xl shadow-sm border border-slate-100 flex gap-4 transition-all hover:shadow-md hover:border-brand-teal/20 items-center">
                    <div class="w-20 h-20 md:w-24 md:h-24 rounded-xl overflow-hidden shrink-0 bg-slate-100 relative">
                        @if($post->image)
                            <img alt="{{ $post->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ Storage::url($post->image) }}"/>
                        @else
                            <div class="w-full h-full flex items-center justify-center text-brand-teal/10"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg></div>
                        @endif
                    </div>
                    <div class="flex flex-col flex-1 py-1 justify-center min-w-0">
                        <span class="text-brand-teal text-[9px] font-bold uppercase tracking-widest mb-1.5 truncate">{{ $post->category->name ?? 'Article' }}</span>
                        <h4 class="text-sm md:text-[15px] font-bold text-slate-900 leading-snug mb-2 group-hover:text-brand-teal transition-colors line-clamp-2">
                            <a href="{{ route('posts.show', $post->slug) }}" class="before:absolute before:inset-0">{{ $post->title }}</a>
                        </h4>
                        <div class="flex items-center gap-1.5 text-slate-400 text-[10px] font-medium">
                            <span class="material-symbols-outlined !text-[12px]">schedule</span>
                            <span>{{ $post->created_at->format('M d, Y') }}</span>
                            <span class="material-symbols-outlined !text-[14px] ml-auto text-brand-teal opacity-0 -translate-x-2 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">arrow_forward</span>
                        </div>
                    </div>
                </article>
                @empty
                    <div class="bg-slate-50 rounded-2xl p-6 text-center border border-dashed border-slate-200">
                         <p class="text-slate-400 italic text-xs">More articles in development.</p>
                    </div>
                @endforelse

                <!-- Subscription Teaser -->
                <div class="mt-auto pt-2">
                    <div class="p-5 rounded-2xl bg-gradient-to-br from-brand-gold to-brand-gold/80 text-white shadow-lg shadow-brand-gold/20 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <h4 class="text-sm font-bold mb-1 tracking-tight">Never miss an insight</h4>
                            <p class="text-[11px] text-white/90 leading-tight">Get the Academy Press digest.</p>
                        </div>
                        <form action="#" class="flex gap-2 w-full md:w-auto shrink-0">
                            <input class="w-full md:w-40 rounded-lg bg-white/20 border-white/30 text-white placeholder:text-white/70 focus:ring-white focus:border-white text-xs py-2 px-3 backdrop-blur-sm" placeholder="Your email" type="email" required/>
                            <button type="submit" class="bg-slate-900 text-white px-4 py-2 rounded-lg text-xs font-bold hover:bg-slate-800 transition-colors shadow-sm active:scale-95 whitespace-nowrap">Join</button>
                        </form>
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
@endsection
