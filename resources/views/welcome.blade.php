@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Carousel Section (Stitch Integration) -->
<x-hero-carousel />

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
            <h2 class="text-3xl font-serif font-bold mb-5 text-slate-800 tracking-tight">Who We Are</h2>
            <p class="text-slate-600 text-sm mb-4 leading-relaxed">
                We are an educational platform focused on delivering clear, reliable, and easy-to-understand information. Our mission is to simplify learning by providing structured guides, explanations, and resources that anyone can apply in real life.
            </p>
            <p class="text-slate-600 mb-8 text-sm leading-relaxed">
                We believe education should be accessible, practical, and trustworthy.
            </p>
            <a href="#" class="inline-flex items-center text-brand-green font-bold hover:gap-3 transition-all">
                About Us 
                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- Featured Courses Section (Procreate Style) -->
<section class="max-w-7xl mx-auto px-6 py-10" x-data="{ activeCategory: 'all' }">
    <div class="text-center mb-8 max-w-2xl mx-auto">
        <span class="text-brand-green font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Ready to begin?</span>
        <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-900 tracking-tight mb-4">Lesson ideas.</h2>
        <p class="text-slate-500 text-sm leading-relaxed px-4">
            Explore our carefully curated modules tailored for every level of understanding. Whether you are beginning your journey or deepening your knowledge, find the structured guidance you need.
        </p>
    </div>

    <!-- Category Filters -->
    <div class="flex flex-wrap justify-center gap-2 md:gap-3 mb-8">
        <button 
            @click="activeCategory = 'all'"
            :class="activeCategory === 'all' ? 'bg-brand-green text-white shadow-md' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
            class="px-5 py-2 rounded-full text-[9px] md:text-[10px] font-bold uppercase tracking-widest transition-all duration-300">
            See All
        </button>
        @foreach($featuredCategories as $category)
            <button 
                @click="activeCategory = '{{ $category->id }}'"
                :class="activeCategory === '{{ $category->id }}' ? 'bg-brand-green text-white shadow-md' : 'bg-slate-50 text-slate-500 hover:bg-slate-100'"
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
                            <div class="w-full h-full bg-gradient-to-br from-brand-green/5 to-brand-teal/5 flex items-center justify-center p-8">
                                <svg class="w-12 h-12 text-brand-green/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Card Info -->
                    <div class="px-2">
                        <div class="flex items-center justify-between group/title">
                            <h3 class="text-[11px] md:text-xs uppercase font-bold text-slate-800 tracking-tight transition-colors group-hover:text-brand-green">
                                {{ $course->title }}
                            </h3>
                            <span class="text-slate-300 group-hover:text-brand-green group-hover:translate-x-1 transition-all">
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
        <a href="{{ route('courses.index') }}" class="group inline-flex items-center gap-2 bg-gradient-to-r from-brand-green to-brand-teal text-white px-8 py-3.5 rounded-xl text-sm font-medium transition-all shadow-md hover:shadow-lg hover:opacity-95 hover:-translate-y-0.5 active:scale-95">
            Explore more courses
            <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
        </a>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-10 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
            <div class="max-w-xl">
                <span class="text-brand-green font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Scholarly Resources</span>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight mb-4">Digital Library</h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-md">
                    Access our premium collection of Islamic texts, study guides, and supplementary materials designed to support your lifelong learning.
                </p>
            </div>
            <a href="{{ route('books.index') }}" class="group inline-flex items-center gap-3 bg-white border border-slate-200 px-6 py-3 rounded-xl text-slate-600 font-medium text-xs hover:bg-slate-50 hover:text-brand-green hover:border-brand-green/30 transition-all shadow-sm">
                Visit Archives
                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-brand-green/10 group-hover:text-brand-green transition-colors">
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
                <h3 class="font-bold text-slate-800 text-sm mb-1 line-clamp-2 leading-snug group-hover:text-brand-green transition-colors">{{ $book->title }}</h3>
                <p class="text-slate-400 text-[9px] uppercase tracking-widest font-bold mb-3">Ejlals Repository</p>
                
                @if($book->download_type === 'file' && $book->download_file)
                    <a href="{{ Storage::url($book->download_file) }}" target="_blank" class="mt-auto bg-brand-green text-white py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-brand-green transition-all flex items-center justify-center gap-2">
                        View Resource
                    </a>
                @elseif($book->download_type === 'link' && $book->download_link)
                    <a href="{{ $book->download_link }}" target="_blank" class="mt-auto bg-slate-50 text-brand-green py-2.5 px-3 rounded-xl text-xs font-bold text-center hover:bg-brand-green hover:text-white transition-all flex items-center justify-center gap-2">
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
                    <span class="w-8 h-[2px] bg-brand-green rounded-full"></span>
                    <span class="text-brand-green font-bold text-[10px] uppercase tracking-[0.4em]">The Academy Press</span>
                </div>
                <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-900 leading-tight tracking-tight">Scholarly Insights</h2>
            </div>
            <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-3 bg-white border border-slate-200 px-6 py-3 rounded-xl text-slate-600 font-medium text-xs hover:bg-slate-50 hover:text-brand-green hover:border-brand-green/30 transition-all shadow-sm">
                Explore Full Library
                <div class="w-6 h-6 rounded-full bg-slate-100 flex items-center justify-center group-hover:bg-brand-green/10 group-hover:text-brand-green transition-colors">
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
                            <div class="w-full h-full bg-gradient-to-br from-brand-green/5 to-brand-teal/5 flex items-center justify-center">
                                <svg class="w-12 h-12 text-brand-green/10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                            </div>
                        @endif
                        <div class="absolute top-6 left-6">
                            <span class="bg-white/95 backdrop-blur-md text-brand-green text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-sm border border-slate-100">
                                {{ $mainPost->category->name ?? 'Featured' }}
                            </span>
                        </div>
                    </div>
                    <div class="px-4 pb-4 flex-1 flex flex-col">
                        <h3 class="text-2xl font-serif font-bold text-slate-900 group-hover:text-brand-green transition-colors mb-4 leading-tight line-clamp-2">
                            {{ $mainPost->title }}
                        </h3>
                        <p class="text-slate-500 text-sm mb-6 line-clamp-2 leading-relaxed">
                            {!! nl2br(e($mainPost->description ?? Str::limit(strip_tags($mainPost->content), 150))) !!}
                        </p>
                        <div class="mt-auto pt-6 border-t border-slate-50 flex items-center justify-between">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-widest">{{ $mainPost->created_at->format('M d, Y') }}</span>
                            <a href="{{ route('posts.show', $mainPost->slug) }}" class="flex items-center gap-2 text-brand-green font-bold text-sm group/btn">
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
                           <div class="w-full h-full flex items-center justify-center text-brand-green/10"><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg></div>
                        @endif
                    </div>
                    <div class="flex-1 pr-2">
                        <span class="text-brand-green font-bold text-[9px] uppercase tracking-widest mb-1.5 block">{{ $post->category->name ?? 'Article' }}</span>
                        <h4 class="text-md font-bold text-slate-900 group-hover:text-brand-green transition-colors line-clamp-2 leading-snug">
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
                                <h5 class="font-bold text-slate-800 group-hover:text-brand-green transition-colors mb-2 line-clamp-1">{{ $post->title }}</h5>
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
            <span class="text-brand-green font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Social Proof</span>
            <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight">Student & Parent Reviews</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Review 1 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-green/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"The 1-on-1 sessions have completely changed how my kids learn. The teachers are incredibly patient and the schedule is super flexible."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center font-bold text-brand-green text-xs">SA</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Sarah Ahmed</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Parent</p>
                    </div>
                </div>
            </div>
            <!-- Review 2 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-green/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"I was looking for a authentic Tajweed course and Ejlals Academy delivered exactly what I needed. Highly professional scholars."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center font-bold text-brand-green text-xs">OM</div>
                    <div>
                        <h4 class="font-bold text-slate-800 text-sm">Omar Mansoor</h4>
                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Student</p>
                    </div>
                </div>
            </div>
            <!-- Review 3 -->
            <div class="bg-gray-50 p-8 rounded-3xl relative group border border-gray-100 hover:border-brand-green/20 transition-all shadow-sm">
                <div class="flex gap-1 mb-5 text-xs">
                    @for($i=0; $i<5; $i++) <svg class="w-3.5 h-3.5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg> @endfor
                </div>
                <p class="text-slate-600 text-sm italic leading-relaxed mb-6">"The monthly progress reports are great. They keep me informed about my daughter's growth and what she's learning next."</p>
                <div class="flex items-center gap-4">
                    <div class="w-10 h-10 rounded-full bg-brand-green/10 flex items-center justify-center font-bold text-brand-green text-xs">FK</div>
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
            <span class="text-brand-green font-bold text-[10px] uppercase tracking-[0.4em] mb-1 block">Clarifications</span>
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
    <div class="bg-gray-50 rounded-3xl p-8 md:p-10 flex flex-col md:flex-row items-center gap-8 text-center md:text-left border border-gray-100">
        <div class="flex-1">
            <h2 class="text-2xl font-serif font-bold mb-3 text-slate-800 uppercase tracking-tight">Practical Solutions?</h2>
            <p class="text-slate-500 text-xs leading-relaxed">
                After learning the concepts, you can explore our carefully selected products and resources designed to support your learning and daily needs.
            </p>
        </div>
        <div class="w-full max-w-sm">
            <form action="#" class="flex gap-2">
                <input type="email" placeholder="Email Address" class="flex-1 bg-white border border-gray-200 py-2.5 px-4 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-brand-green/20 focus:border-brand-green transition-all">
                <button class="bg-brand-green hover:bg-brand-green text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md transition-colors whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
