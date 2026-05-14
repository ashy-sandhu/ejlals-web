@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('json_ld')
    @php
        $websiteSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebSite",
            "name" => "Ejlals Academy",
            "url" => url('/'),
            "potentialAction" => [
                "@type" => "SearchAction",
                "target" => url('/courses') . "?search={search_term_string}",
                "query-input" => "required name=search_term_string"
            ],
            "description" => "A premier digital sanctuary for Islamic learning, combining traditional wisdom with modern pedagogical excellence for the global Ummah."
        ];
    @endphp
    {!! \App\Traits\HasSeoSchema::renderJsonLd($websiteSchema) !!}
@endsection

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
.dashed-connector {
    position: absolute;
    top: 50%;
    left: 60%;
    width: 80%;
    height: 4px;
    background: linear-gradient(90deg, #138c90 0%, #ea7f26 100%);
    border-radius: 2px;
    z-index: 0;
    transform: translateY(-50%);
}

.hero-gradient-overlay {
    background: linear-gradient(90deg, rgba(253, 251, 247, 1) 0%, rgba(253, 251, 247, 0.8) 30%, rgba(253, 251, 247, 0) 60%);
}
.step-circle {
    width: 96px;
    height: 96px;
    border-radius: 9999px;
    border: 2px solid #f1f5f9;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: white;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
    position: relative;
    z-index: 10;
}
.step-circle-teal { border-color: rgba(19, 140, 144, 0.15); }
.step-circle-gold { border-color: rgba(234, 127, 38, 0.15); }

.icon-thin {
    font-variation-settings: 'wght' 200, 'opsz' 24;
}
.pattern-float {
    animation: float-pattern 45s ease-in-out infinite;
}
.pattern-float-alt {
    animation: float-pattern-alt 60s ease-in-out infinite;
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
                            <p class="text-sm font-black text-slate-800 leading-none">8+ Years</p>
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
                    <div class="text-center lg:text-left mb-3">
                        <div class="flex items-center justify-center lg:justify-start gap-3 mb-3">
                            <span class="w-8 h-[2px] bg-brand-gold rounded-full"></span>
                            <span class="text-brand-gold font-bold tracking-[0.4em] uppercase text-[10px]">Our Identity</span>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="relative group mb-3">
                                <!-- Elegant Vertical Accent (Visible on LG) -->
                                <div class="hidden lg:block absolute -left-6 top-2 bottom-2 w-1 bg-gradient-to-b from-brand-teal via-brand-gold to-transparent rounded-full opacity-20"></div>
                                
                                <p class="text-lg md:text-xl text-slate-800 font-medium leading-relaxed">
                                    <span class="text-brand-teal font-serif italic font-black text-3xl md:text-4xl block mb-2 tracking-tight leading-none">
                                        Ejlals Islamic Horizon
                                    </span>
                                    <span class="text-brand-gold font-bold uppercase tracking-[0.2em] text-[10px] block mb-3 opacity-80">Established 2016 • Global Learning Platform</span>
                                    
                                    has evolved from a dedicated social media community into a <span class="text-slate-900 font-bold underline decoration-brand-teal/30 underline-offset-8">premier global platform</span> for authentic Islamic education.
                                </p>
                            </div>

                            <p class="text-[13px] md:text-sm text-slate-500 leading-relaxed font-medium max-w-xl border-t border-slate-100 pt-3 mx-auto lg:mx-0">
                                With over 8 years of experience, we specialize in bridging the linguistic gap for millions of Muslims who connect most deeply with their Deen in <span class="text-brand-teal font-bold italic">Urdu, Punjabi, or English</span>. Unlike conventional platforms, we offer personalized, live one-on-one online Quran classes tailored for children, adults, women, and new Muslims anywhere in the world.
                            </p>
                        </div>
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

<!-- Course Categories Section (Modernized & Aligned) -->
<section class="relative py-8 bg-[#FCF9F2] overflow-hidden border-t border-brand-gold/5">
    <!-- Animated Islamic Pattern Background -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none overflow-hidden">
        <svg class="absolute w-full h-full animate-[spin_120s_linear_infinite]" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <pattern id="islamic-grid" width="20" height="20" patternUnits="userSpaceOnUse">
                    <path d="M10 0l2.5 7.5H20l-6 4.5 2.5 7.5-6.5-4.5-6.5 4.5 2.5-7.5-6-4.5h7.5z" fill="currentColor" class="text-brand-gold"/>
                </pattern>
            </defs>
            <rect width="100%" height="100%" fill="url(#islamic-grid)"/>
        </svg>
    </div>
    
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="text-center max-w-2xl mx-auto mb-4 space-y-3">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/80 backdrop-blur-md border border-brand-gold/20 shadow-sm mb-4">
                <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em]">Academic Excellence</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-black text-slate-900 tracking-tight leading-tight">
                {{ $courseCategory->name ?? 'Quran Courses' }} at <span class="text-brand-teal">Ejlals</span><span class="text-brand-gold">.com</span>
            </h2>
            <div class="h-1 w-20 bg-gradient-to-r from-brand-teal to-brand-gold mx-auto rounded-full mt-2"></div>
            <p class="text-[14px] text-slate-500 leading-relaxed pt-4 text-balance font-medium">
                {{ $courseCategory->description ?? 'Structured Islamic curriculum designed to bridge classical wisdom with modern practical application.' }}
            </p>
        </div>

        <!-- Course Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            @foreach($courseCategories as $category)
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-brand-teal/10 border border-slate-100 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden bg-slate-50">
                    @if($category->image)
                        <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ Storage::url($category->image) }}" alt="{{ $category->image_alt ?? $category->name }}"/>
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <span class="material-symbols-outlined text-slate-300 text-5xl">category</span>
                        </div>
                    @endif
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 backdrop-blur-md text-brand-teal font-black text-[9px] uppercase tracking-wider px-3 py-1 rounded-full shadow-sm border border-brand-teal/10">Explore</span>
                    </div>
                </div>
                <div class="px-6 py-3 flex flex-col flex-grow text-center items-center">
                    <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-brand-teal transition-colors">{{ $category->name }}</h3>
                    <p class="text-[12px] text-slate-500 leading-relaxed mb-6 flex-grow text-balance">
                        {{ Str::limit($category->description, 100) ?? 'Master the correct pronunciation and beautiful recitation with expert guidance.' }}
                    </p>
                    <a href="{{ route('courses.index', ['category' => $category->slug]) }}" class="inline-flex items-center bg-brand-teal/5 text-brand-teal px-5 py-2 rounded-xl font-bold text-[11px] gap-2 group/link hover:bg-brand-teal hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        Explore Courses 
                        <span class="material-symbols-outlined text-[16px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Explore More CTA -->
        <div class="mt-8 text-center">
            <a href="{{ route('courses.index') }}" class="group inline-flex items-center gap-3 bg-brand-gold text-white px-10 py-4 rounded-xl font-bold text-sm shadow-xl shadow-brand-gold/20 hover:brightness-110 hover:-translate-y-1 active:scale-[0.98] transition-all">
                View Detailed Curriculum
                <span class="material-symbols-outlined text-[20px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>
    </div>
</section>

<!-- Process Section (3 Simple Steps) -->
<section class="bg-[#FDFDFC] py-10 px-6 border-t border-gray-50 overflow-hidden relative">
    <div class="absolute inset-0 islamic-pattern pointer-events-none opacity-50"></div>
    <div class="max-w-7xl mx-auto relative z-10">
        <!-- Section Header -->
        <div class="text-center mb-12 space-y-2">
            <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-white/50 backdrop-blur-md border border-brand-gold/10 shadow-sm hover:shadow-md hover:shadow-brand-gold/5 hover:-translate-y-0.5 transition-all duration-500 cursor-default mb-4 group/badge">
                <span class="text-brand-gold font-bold text-[10px] uppercase tracking-[0.4em]">Our Process</span>
            </div>
            <h2 class="text-2xl md:text-4xl font-black text-slate-900 tracking-tight">
                Start Learning <span class="text-brand-teal">Quran</span> in <span class="text-brand-gold">3 Easy Steps</span>
            </h2>
            <p class="max-w-xl mx-auto text-[13px] text-slate-500 leading-relaxed pt-2">
                Simple registration, free trial class, and smooth enrollment for students worldwide.
            </p>
        </div>

        <!-- Process Flow Layout -->
        <div class="relative">
            <!-- Connecting Line (Desktop) -->
            <div class="hidden md:block absolute top-[80px] left-[15%] right-[15%] h-[2px] bg-gradient-to-r from-transparent via-brand-teal/20 to-transparent"></div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 lg:gap-16">
                <!-- Step 1 -->
                <div class="relative flex flex-col items-center text-center group">
                    <span class="absolute -top-16 left-1/2 -translate-x-1/2 text-[100px] font-black text-brand-teal/5 leading-none select-none z-0 transition-transform group-hover:-translate-y-2 duration-500">01</span>
                    <div class="relative z-10 w-[75%] aspect-[3/2] max-w-[300px] mb-5 flex items-center justify-center bg-white border border-slate-100 rounded-2xl group-hover:border-brand-teal/30 group-hover:shadow-lg group-hover:shadow-brand-teal/10 transition-all duration-500">
                        <img alt="Registration Form" class="w-[90%] h-[90%] object-contain group-hover:scale-110 transition-transform duration-500" src="{{ asset('images/onboarding/step_1.png') }}"/>
                        <div class="absolute -bottom-2.5 right-2 md:right-4 bg-brand-teal text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">Step One</div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-base md:text-lg font-bold text-slate-800 mb-2 group-hover:text-brand-teal transition-colors">Registration Form</h3>
                        <p class="text-[12px] md:text-[13px] text-slate-500 leading-relaxed px-4 text-center text-balance mx-auto">
                            Complete a simple registration form to share your learning goals and preferred course so we can connect you with the right teacher.
                        </p>
                    </div>
                </div>

                <!-- Step 2 -->
                <div class="relative flex flex-col items-center text-center group">
                    <span class="absolute -top-16 left-1/2 -translate-x-1/2 text-[100px] font-black text-brand-gold/5 leading-none select-none z-0 transition-transform group-hover:-translate-y-2 duration-500">02</span>
                    <div class="relative z-10 w-[75%] aspect-[3/2] max-w-[300px] mb-5 flex items-center justify-center bg-white border border-slate-100 rounded-2xl group-hover:border-brand-gold/30 group-hover:shadow-lg group-hover:shadow-brand-gold/10 transition-all duration-500">
                        <img alt="Free Demo Class" class="w-[90%] h-[90%] object-contain group-hover:scale-110 transition-transform duration-500" src="{{ asset('images/onboarding/step_2.png') }}"/>
                        <div class="absolute -bottom-2.5 right-2 md:right-4 bg-brand-gold text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">Step Two</div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-base md:text-lg font-bold text-slate-800 mb-2 group-hover:text-brand-gold transition-colors">Free Demo Class</h3>
                        <p class="text-[12px] md:text-[13px] text-slate-500 leading-relaxed px-4 text-center text-balance mx-auto">
                            Attend a free one-on-one demo session with your selected tutor and experience the teaching style before making your final decision.
                        </p>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="relative flex flex-col items-center text-center group">
                    <span class="absolute -top-16 left-1/2 -translate-x-1/2 text-[100px] font-black text-brand-teal/5 leading-none select-none z-0 transition-transform group-hover:-translate-y-2 duration-500">03</span>
                    <div class="relative z-10 w-[75%] aspect-[3/2] max-w-[300px] mb-5 flex items-center justify-center bg-white border border-slate-100 rounded-2xl group-hover:border-brand-teal/30 group-hover:shadow-lg group-hover:shadow-brand-teal/10 transition-all duration-500">
                        <img alt="Course Enrollment" class="w-[90%] h-[90%] object-contain group-hover:scale-110 transition-transform duration-500" src="{{ asset('images/onboarding/step_3.png') }}"/>
                        <div class="absolute -bottom-2.5 right-2 md:right-4 bg-brand-teal text-white text-[10px] font-bold px-3 py-1 rounded-full shadow-sm">Step Three</div>
                    </div>
                    <div class="relative z-10">
                        <h3 class="text-base md:text-lg font-bold text-slate-800 mb-2 group-hover:text-brand-teal transition-colors">Course Enrollment</h3>
                        <p class="text-[12px] md:text-[13px] text-slate-500 leading-relaxed px-4 text-center text-balance mx-auto">
                            Once you are satisfied, complete your enrollment and begin your personalized Quran and Islamic learning journey with confidence.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Subtle CTA -->
        <div class="mt-12 text-center flex flex-col items-center">
            <a href="#" class="group inline-flex items-center gap-2 bg-brand-gold text-white px-8 py-3.5 rounded-lg text-sm font-bold shadow-lg shadow-brand-gold/20 hover:brightness-110 active:scale-[0.98] transition-all">
                Book Your Free Demo
                <span class="material-symbols-outlined text-[18px] group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
            <!-- Social Proof Line (Fixed Layout) -->
            <div class="mt-6 flex items-center justify-center gap-3 bg-white/50 py-2 px-4 rounded-full border border-slate-100/50 shadow-sm">
                <div class="flex -space-x-3.5 overflow-hidden shrink-0">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&q=80&w=100" alt="Student 1">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1491013516836-7ad643ee175a?auto=format&fit=crop&q=80&w=100" alt="Student 2">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1519238263530-99bdd11df2ea?auto=format&fit=crop&q=80&w=100" alt="Student 3">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1544717297-fa95b3ee51f8?auto=format&fit=crop&q=80&w=100" alt="Student 4">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1509062522246-3755977927d7?auto=format&fit=crop&q=80&w=100" alt="Student 5">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1516627145497-ae6968895b74?auto=format&fit=crop&q=80&w=100" alt="Student 6">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1471286174890-9c112ffca5b4?auto=format&fit=crop&q=80&w=100" alt="Student 7">
                    <img class="inline-block size-5 md:size-6 rounded-full ring-2 ring-white object-cover" src="https://images.unsplash.com/photo-1513258496099-48168024aec0?auto=format&fit=crop&q=80&w=100" alt="Student 8">
                    <div class="flex items-center justify-center size-5 md:size-6 rounded-full ring-2 ring-white bg-brand-teal text-white text-[7px] md:text-[8px] font-black shrink-0">+99</div>
                </div>
                <p class="text-slate-600 text-[10px] md:text-[11px] font-bold whitespace-nowrap">
                    Join over <span class="text-brand-teal">1,500+</span> students worldwide
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Meet Our Expert Scholars Section (Refined) -->
<section class="relative py-16 bg-[#FDFBF7] overflow-hidden border-y border-brand-gold/5">
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <!-- Section Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div class="max-w-xl">
                <div class="inline-flex items-center px-4 py-1.5 rounded-full bg-brand-teal/5 border border-brand-teal/10 shadow-sm mb-4">
                    <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em]">Qualified Faculty</span>
                </div>
                <h2 class="text-2xl md:text-4xl font-serif font-bold text-slate-900 tracking-tight leading-tight">
                    Meet Our Expert <span class="text-brand-gold">Scholars</span>
                </h2>
                <p class="text-[13px] text-slate-500 leading-relaxed pt-2 font-medium">
                    Learn from verified experts with years of experience in Islamic education and academic excellence.
                </p>
            </div>
            <a href="{{ route('scholars.index') }}" class="group inline-flex items-center gap-2 text-brand-teal font-bold text-xs hover:text-brand-gold transition-colors">
                View All Tutors
                <span class="material-symbols-outlined text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
            </a>
        </div>

        <!-- Scholars Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-8">
            @forelse($featuredScholars as $scholar)
                <x-scholar-card :scholar="$scholar" />
            @empty
            <div class="col-span-full py-12 text-center">
                <p class="text-slate-400 italic">Our directory is being updated with new scholar profiles.</p>
            </div>
            @endforelse
        </div>
        </div>
    </div>
</section>

<!-- GSAP Animation Library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/TextPlugin.min.js"></script>

<!-- Our Teaching Languages Section -->
<section class="relative py-8 px-6 border-y border-slate-100 bg-[#FCFDFD] overflow-hidden" id="languages-section">
    <div class="max-w-6xl mx-auto relative z-10">
        <!-- Header Block -->
        <div class="flex flex-col items-center text-center mb-12 scroll-reveal-header">
            <!-- Centered Premium Multilingual Badge (Forced to new line) -->
            <div class="w-full flex justify-center mb-6">
                <div class="inline-flex items-center gap-3 p-3 rounded-full bg-white border border-brand-teal/20 shadow-sm">
                    <div class="w-10 h-10 flex items-center justify-center bg-brand-teal/5 rounded-full text-brand-teal shrink-0 relative overflow-hidden">
                        <!-- Creative Custom SVG for Multilingualism -->
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 relative z-10">
                            <path d="M2 5h12M7 2h1M5 8l6 6M4 14l6-6"/>
                            <path d="M15.5 22L18 17l2.5 5M17 21h2" stroke="currentColor" stroke-width="2.5" class="text-brand-gold"/>
                        </svg>
                        <!-- Background decorative circles -->
                        <div class="absolute inset-0 bg-brand-gold/5 blur-sm rounded-full translate-x-3 translate-y-3"></div>
                    </div>
                    <div class="flex flex-col items-start leading-none">
                        <span class="text-[9px] font-black text-slate-400 uppercase tracking-[0.2em] mb-1">Global Academy</span>
                        <span class="text-[11px] font-bold text-slate-700 uppercase tracking-[0.1em]">Multilingual <span class="text-brand-teal">Excellence</span></span>
                    </div>
                </div>
            </div>
            
            <div class="relative inline-block mb-8">
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-serif font-black text-slate-900 tracking-tight leading-tight">
                    Learn in Your <br class="md:hidden"/>
                    <span id="typewriter-text" class="text-brand-teal italic"></span>
                    <span id="typewriter-cursor" class="inline-block w-[3px] h-[0.8em] bg-brand-gold ml-1 translate-y-1"></span>
                </h2>
                <!-- Decorative brand accent -->
                <div class="absolute -bottom-4 left-1/2 -translate-x-1/2 flex items-center gap-2">
                    <div class="w-8 h-[1px] bg-brand-teal/30"></div>
                    <div class="w-2 h-2 rounded-full border border-brand-gold/40"></div>
                    <div class="w-8 h-[1px] bg-brand-teal/30"></div>
                </div>
            </div>
            
            <p class="text-slate-500 text-sm md:text-base max-w-xl mx-auto leading-relaxed font-medium">
                We remove the language barrier from your spiritual journey. Learn Quranic and Islamic wisdom in the language that resonates with your heart.
            </p>
        </div>

        <!-- Language Card Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 items-stretch relative">
            <!-- Card 1: Urdu -->
            <div class="language-card group perspective-1000 h-full">
                <div class="card-inner h-full bg-white rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.03)] hover:shadow-[0_30px_60px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 relative overflow-hidden flex flex-col items-center text-center">
                    <!-- Top Accent -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-teal transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <!-- SVG Icon (Urdu) -->
                    <div class="w-16 h-16 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-teal/5 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                        <svg viewBox="0 0 100 100" class="w-full h-full text-brand-teal relative z-10">
                            <text x="50" y="65" font-family="'Noto Nastaliq Urdu'" font-size="40" text-anchor="middle" fill="currentColor">اردو</text>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-slate-800 mb-3">Urdu Medium</h3>
                    <p class="text-[13px] text-slate-500 leading-relaxed font-medium mb-6">
                        Complete Islamic courses in Urdu for the global South Asian community.
                    </p>
                    
                    <div class="mt-auto">
                        <span class="text-[11px] font-bold text-brand-teal uppercase tracking-widest flex items-center gap-2 group-hover:gap-3 transition-all duration-300">
                            Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Card 2: Punjabi -->
            <div class="language-card group perspective-1000 h-full">
                <div class="card-inner h-full bg-white rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.03)] hover:shadow-[0_30px_60px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 relative overflow-hidden flex flex-col items-center text-center">
                    <!-- Top Accent -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-gold transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <!-- SVG Icon (Punjabi) -->
                    <div class="w-16 h-16 mb-6 relative">
                        <div class="absolute inset-0 bg-brand-gold/5 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                        <svg viewBox="0 0 100 100" class="w-full h-full text-brand-gold relative z-10">
                            <text x="50" y="65" font-family="'Noto Nastaliq Urdu'" font-size="40" text-anchor="middle" fill="currentColor">پنجابی</text>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-slate-800 mb-3">Punjabi Medium</h3>
                    <p class="text-[13px] text-slate-500 leading-relaxed font-medium mb-6">
                        Unique Islamic instruction available in the Punjabi language.
                    </p>
                    
                    <div class="mt-auto">
                        <span class="text-[11px] font-bold text-brand-gold uppercase tracking-widest flex items-center gap-2 group-hover:gap-3 transition-all duration-300">
                            Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Card 3: English -->
            <div class="language-card group perspective-1000 h-full">
                <div class="card-inner h-full bg-white rounded-3xl p-8 border border-slate-100 shadow-[0_10px_30px_rgba(0,0,0,0.03)] hover:shadow-[0_30px_60px_rgba(0,0,0,0.1)] hover:-translate-y-3 transition-all duration-500 relative overflow-hidden flex flex-col items-center text-center">
                    <!-- Top Accent -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-brand-teal transform origin-left scale-x-0 group-hover:scale-x-100 transition-transform duration-500"></div>
                    
                    <!-- SVG Icon (English) -->
                    <div class="w-16 h-16 mb-6 relative flex items-center justify-center">
                        <div class="absolute inset-0 bg-brand-teal/5 rounded-full group-hover:scale-110 transition-transform duration-500"></div>
                        <svg viewBox="0 0 100 100" class="w-full h-full text-brand-teal relative z-10">
                            <text x="50" y="62" font-family="'Playfair Display'" font-style="italic" font-size="30" text-anchor="middle" fill="currentColor">English</text>
                        </svg>
                    </div>

                    <h3 class="text-lg font-bold text-slate-800 mb-3">English Medium</h3>
                    <p class="text-[13px] text-slate-500 leading-relaxed font-medium mb-6">
                        Modern courses designed for English-speaking students worldwide.
                    </p>
                    
                    <div class="mt-auto">
                        <span class="text-[11px] font-bold text-brand-teal uppercase tracking-widest flex items-center gap-2 group-hover:gap-3 transition-all duration-300">
                            Explore <span class="material-symbols-outlined text-sm">arrow_forward</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    gsap.registerPlugin(ScrollTrigger, TextPlugin);

    // Typewriter Entrance Animation
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: "#languages-section",
            start: "top 80%",
        }
    });

    tl.from(".scroll-reveal-header", {
        y: 30,
        opacity: 0,
        duration: 1,
        ease: "power3.out"
    })
    .to("#typewriter-text", {
        duration: 2,
        text: "Language",
        ease: "none"
    })
    .to("#typewriter-cursor", {
        opacity: 0,
        duration: 0.5,
        repeat: -1,
        yoyo: true
    }, 0);

    // Hide cursor after typing
    tl.to("#typewriter-cursor", {
        display: "none",
        duration: 0.1
    });

    // Cards staggered reveal
    gsap.from(".language-card", {
        y: 60,
        opacity: 0,
        scale: 0.95,
        stagger: 0.15,
        duration: 1,
        ease: "power3.out",
        scrollTrigger: {
            trigger: "#languages-section",
            start: "top 75%",
        }
    });
});
</script>

<!-- Become a Tutor Section (Refined Framed Design) -->
<section class="relative py-6 px-6 bg-[#FCFDFD]" id="tutor-section">
    <div class="max-w-7xl mx-auto relative z-10">
        <!-- Main Container (Subtle Card Surface) -->
        <div class="flex flex-col lg:flex-row gap-3 items-stretch overflow-hidden relative">
            
            <!-- Left Column: Content (Flat Surface) -->
            <div class="w-full flex flex-col justify-center px-6 py-8 relative z-10">
                <div class="flex items-center gap-2 mb-6">
                    <span class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal">
                        <span class="material-symbols-outlined text-sm">stars</span>
                    </span>
                    <span class="text-[10px] font-black text-brand-teal uppercase tracking-[0.4em]">Join our teaching community</span>
                </div>
                
                <h2 class="text-4xl md:text-5xl lg:text-6xl font-serif font-black text-slate-900 mb-6 leading-[1.1]">
                    Share Knowledge.<br/>
                    <span class="text-brand-teal italic">Inspire</span> <span class="text-brand-gold">Generations.</span>
                </h2>
                
                <p class="text-slate-500 text-sm md:text-base mb-3 max-w-lg font-medium leading-relaxed">
                    Ejlals Academy welcomes passionate Islamic scholars and qualified teachers to join our mission of spreading authentic knowledge worldwide.
                </p>
                
                <!-- Refined Horizontal Stats Bar -->
                <div class="flex flex-wrap gap-8 pt-6 border-t border-slate-200/40">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-brand-teal shadow-sm border border-slate-100">
                            <span class="material-symbols-outlined text-lg">groups</span>
                        </div>
                        <div>
                            <div class="font-black text-lg text-slate-800 leading-none">150+</div>
                            <div class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mt-1.5">Expert Tutors</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-cyan-600 shadow-sm border border-slate-100">
                            <span class="material-symbols-outlined text-lg">public</span>
                        </div>
                        <div>
                            <div class="font-black text-lg text-slate-800 leading-none">30+</div>
                            <div class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mt-1.5">Countries</div>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-brand-gold shadow-sm border border-slate-100">
                            <span class="material-symbols-outlined text-lg">workspace_premium</span>
                        </div>
                        <div>
                            <div class="font-black text-lg text-slate-800 leading-none">15K+</div>
                            <div class="text-[8px] text-slate-400 font-bold uppercase tracking-widest mt-1.5">Students</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Image in a distinct Premium Frame -->
            <div class="w-full flex py-4">
                <div class="w-full bg-white p-4 rounded-[3rem] border border-white flex overflow-hidden group">
                    <div class="w-full h-full rounded-[2.2rem] overflow-hidden relative">
                        <img src="{{ asset('images/tutor-hero.png') }}" alt="Tutor Community" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000">
                        <!-- Subtle overlay -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-brand-teal/10 to-transparent pointer-events-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', () => {
    // tutor section animation
    gsap.from(".tutor-card", {
        y: 80,
        opacity: 0,
        scale: 0.98,
        duration: 1.5,
        ease: "power4.out",
        scrollTrigger: {
            trigger: "#tutor-section",
            start: "top 80%",
        }
    });
});
</script>

<!-- Process Section (Wavy Journey - Realigned) -->
<section class="py-8 bg-white relative">
    <div class="max-w-7xl mx-auto px-6 relative">
        <div class="text-center mb-12">
            <span class="text-brand-teal font-black text-[10px] uppercase tracking-[0.5em] mb-4 block">THE JOURNEY TO BECOME A VERIFIED TUTOR</span>
            <h2 class="text-3xl md:text-5xl font-serif font-black text-slate-900 tracking-tight">Our Simple 4-Step Process</h2>
        </div>
        
        <div class="relative">
            <!-- Wavy Dashed Line SVG (Centered between Step 1 and Step 4) -->
            <div class="absolute top-2 left-[12.5%] w-[75%] h-16 z-0 hidden lg:block opacity-50">
                <svg class="w-full h-full" viewBox="0 0 1000 100" fill="none" preserveAspectRatio="none">
                    <defs>
                        <linearGradient id="step-gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                            <stop offset="0%" stop-color="#138C90" />
                            <stop offset="33%" stop-color="#EA7F26" />
                            <stop offset="66%" stop-color="#138C90" />
                            <stop offset="100%" stop-color="#EA7F26" />
                        </linearGradient>
                    </defs>
                    <path d="M0,50 C100,0 230,100 333,50 C433,0 566,100 666,50 C766,0 900,100 1000,50" 
                          stroke="url(#step-gradient)" stroke-width="2" stroke-dasharray="6 6" stroke-linecap="round" fill="none" />
                </svg>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-y-16 relative z-10">
                <!-- Step 1 -->
                <div class="flex flex-col items-center text-center relative group">
                    <div class="relative mb-10">
                        <div class="w-[88px] h-[88px] bg-white rounded-full flex items-center justify-center border border-slate-100 shadow-[0_8px_24px_rgba(0,0,0,0.04)] mx-auto relative z-10 group-hover:-translate-y-1 group-hover:shadow-[0_12px_30px_rgba(0,0,0,0.08)] transition-all duration-500">
                            <span class="material-symbols-outlined text-[28px] text-brand-teal">edit_note</span>
                        </div>
                    </div>
                    <span class="text-brand-teal font-bold text-[10px] mb-2 tracking-[0.3em] uppercase">Step 01</span>
                    <h3 class="font-serif font-black text-slate-900 text-2xl mb-3">Apply Online</h3>
                    <p class="text-[13px] text-slate-500 px-12 leading-relaxed font-medium">Fill out the application form with your academic and teaching information.</p>
                </div>

                <!-- Step 2 -->
                <div class="flex flex-col items-center text-center relative group">
                    <div class="relative mb-10">
                        <div class="w-[88px] h-[88px] bg-white rounded-full flex items-center justify-center border border-slate-100 shadow-[0_8px_24px_rgba(0,0,0,0.04)] mx-auto relative z-10 group-hover:-translate-y-1 group-hover:shadow-[0_12px_30px_rgba(0,0,0,0.08)] transition-all duration-500">
                            <span class="material-symbols-outlined text-[28px] text-brand-gold">forum</span>
                        </div>
                    </div>
                    <span class="text-brand-gold font-bold text-[10px] mb-2 tracking-[0.3em] uppercase">Step 02</span>
                    <h3 class="font-serif font-black text-slate-900 text-2xl mb-3">Interview & Review</h3>
                    <p class="text-[13px] text-slate-500 px-12 leading-relaxed font-medium">Our academic team will review your profile and conduct an interview.</p>
                </div>

                <!-- Step 3 -->
                <div class="flex flex-col items-center text-center relative group">
                    <div class="relative mb-10">
                        <div class="w-[88px] h-[88px] bg-white rounded-full flex items-center justify-center border border-slate-100 shadow-[0_8px_24px_rgba(0,0,0,0.04)] mx-auto relative z-10 group-hover:-translate-y-1 group-hover:shadow-[0_12px_30px_rgba(0,0,0,0.08)] transition-all duration-500">
                            <span class="material-symbols-outlined text-[28px] text-brand-teal">verified_user</span>
                        </div>
                    </div>
                    <span class="text-brand-teal font-bold text-[10px] mb-2 tracking-[0.3em] uppercase">Step 03</span>
                    <h3 class="font-serif font-black text-slate-900 text-2xl mb-3">Verification</h3>
                    <p class="text-[13px] text-slate-500 px-12 leading-relaxed font-medium">Upon successful evaluation, you'll be verified as an Ejlals Tutor.</p>
                </div>

                <!-- Step 4 -->
                <div class="flex flex-col items-center text-center relative group">
                    <div class="relative mb-10">
                        <div class="w-[88px] h-[88px] bg-white rounded-full flex items-center justify-center border border-slate-100 shadow-[0_8px_24px_rgba(0,0,0,0.04)] mx-auto relative z-10 group-hover:-translate-y-1 group-hover:shadow-[0_12px_30px_rgba(0,0,0,0.08)] transition-all duration-500">
                            <span class="material-symbols-outlined text-[28px] text-brand-gold">workspace_premium</span>
                        </div>
                    </div>
                    <span class="text-brand-gold font-bold text-[10px] mb-2 tracking-[0.3em] uppercase">Step 04</span>
                    <h3 class="font-serif font-black text-slate-900 text-2xl mb-3">Start Teaching</h3>
                    <p class="text-[13px] text-slate-500 px-12 leading-relaxed font-medium">Create your tutor profile, set your schedule, and start inspiring students.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Final CTA Box (Keeping your preferred Dark Design) -->

<!-- Final CTA Box (Keeping your preferred Dark Design) -->
<section class="pb-20">
    <div class="max-w-7xl mx-auto px-6">
        <div class="bg-slate-900 rounded-[2.5rem] p-8 md:p-12 lg:p-16 relative overflow-hidden shadow-2xl">
            <!-- Decorative Background Star -->
            <div class="absolute -top-20 -right-20 opacity-10 text-white pointer-events-none">
                <svg class="w-96 h-96" viewBox="0 0 100 100" fill="currentColor">
                    <path d="M50 0 L64.6 35.4 L100 50 L64.6 64.6 L50 100 L35.4 64.6 L0 50 L35.4 35.4 Z" />
                </svg>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12 items-center relative z-10">
                <div class="lg:col-span-3">
                    <h2 class="text-2xl md:text-4xl font-serif font-bold text-white mb-8">Why Teach with Ejlals Academy?</h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                        <!-- Benefit 1 -->
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-brand-gold shrink-0">
                                <span class="material-symbols-outlined">public</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm mb-1">Global Exposure</h4>
                                <p class="text-[11px] text-slate-400 leading-relaxed">Teach students from over 30 countries worldwide.</p>
                            </div>
                        </div>
                        <!-- Benefit 2 -->
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-brand-teal shrink-0">
                                <span class="material-symbols-outlined">schedule</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm mb-1">Flexible Schedule</h4>
                                <p class="text-[11px] text-slate-400 leading-relaxed">You decide your own teaching hours and availability.</p>
                            </div>
                        </div>
                        <!-- Benefit 3 -->
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-brand-gold shrink-0">
                                <span class="material-symbols-outlined">payments</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm mb-1">Fair Earnings</h4>
                                <p class="text-[11px] text-slate-400 leading-relaxed">Competitive pay with secure and timely payments.</p>
                            </div>
                        </div>
                        <!-- Benefit 4 -->
                        <div class="flex gap-4">
                            <div class="w-12 h-12 rounded-2xl bg-white/10 flex items-center justify-center text-brand-teal shrink-0">
                                <span class="material-symbols-outlined">auto_graph</span>
                            </div>
                            <div>
                                <h4 class="font-bold text-white text-sm mb-1">Grow & Impact</h4>
                                <p class="text-[11px] text-slate-400 leading-relaxed">Build your reputation and inspire students daily.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="lg:col-span-2 bg-white/5 backdrop-blur-xl border border-white/10 p-8 rounded-3xl text-center">
                    <h3 class="text-xl font-bold text-white mb-2">Ready to make a difference?</h3>
                    <p class="text-slate-400 text-xs mb-8">Join our network of dedicated educators today.</p>
                    <a href="#" class="group block bg-brand-teal text-white py-4 rounded-xl font-black text-sm shadow-xl shadow-brand-teal/20 hover:scale-105 active:scale-95 transition-all mb-4">
                        Apply Now to Join
                    </a>
                    <div class="flex items-center justify-center gap-4 text-[10px] text-slate-500 font-black uppercase tracking-widest">
                        <span class="flex items-center gap-1.5">
                            <span class="material-symbols-outlined text-xs">lock</span>
                            Secure
                        </span>
                        <span class="w-1.5 h-1.5 bg-slate-700 rounded-full"></span>
                        <span>Takes < 10 min</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Digital Library Preview -->
<section class="bg-white py-10 px-6" x-data="{ 
    isOpen: false, 
    selectedBook: {
        title: '',
        image: '',
        description: '',
        type: '',
        link: '',
        bgClass: ''
    } 
}">
    <div class="max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="max-w-xl">
                <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Scholarly Resources</span>
                <h2 class="text-xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight mb-4">{{ $bookCategory->name ?? 'Digital Library' }}</h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-md">
                    {{ $bookCategory->description ?? 'Access our premium collection of Islamic texts, study guides, and supplementary materials designed to support your lifelong learning.' }}
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
            
            .custom-scrollbar::-webkit-scrollbar {
                width: 5px;
            }
            .custom-scrollbar::-webkit-scrollbar-track {
                background: #f1f1f1;
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb {
                background: #cbd5e1;
                border-radius: 10px;
            }
            .custom-scrollbar::-webkit-scrollbar-thumb:hover {
                background: #94a3b8;
            }
        </style>
        <div class="grid grid-cols-2 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 lg:gap-6 mt-4">
            @forelse($featuredBooks as $index => $book)
                @php
                    // Assign a rotating background color class based on the index to mimic the design's colorful canvases
                    $bgClasses = ['book-bg-1', 'book-bg-2', 'book-bg-3'];
                    $bgClass = $bgClasses[$index % 3];
                @endphp
                <div class="group card-hover transition-all duration-300 bg-white border border-slate-100 rounded-xl overflow-hidden flex flex-col shadow-sm">
                    <div class="relative aspect-[4/3] overflow-hidden image-zoom {{ $bgClass }} flex items-center justify-center p-4 cursor-pointer group/canvas" 
                        data-book="{{ json_encode([
                            'title' => $book->title,
                            'image' => $book->image ? Storage::url($book->image) : '',
                            'description' => strip_tags($book->description),
                            'type' => $book->download_type === 'file' ? 'PDF eBook' : ($book->download_type === 'link' ? 'Guide' : 'Archive'),
                            'link' => $book->download_type === 'file' ? Storage::url($book->download_file) : $book->download_link,
                            'bgClass' => $bgClass
                        ]) }}"
                        @click="isOpen = true; selectedBook = JSON.parse($el.dataset.book)">
                        @if($book->image)
                            <!-- Apply a softer, elegant drop shadow to the book image -->
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->image_alt ?? $book->title }}" class="w-[75%] max-h-full object-contain drop-shadow-[0_10px_15px_rgba(0,0,0,0.2)] transition-transform duration-500">
                        @else
                            <div class="w-[75%] h-full bg-white/50 flex items-center justify-center p-4 text-center drop-shadow-[0_10px_15px_rgba(0,0,0,0.1)] transition-transform duration-500 border border-slate-200/50">
                                <span class="text-slate-400 font-bold text-[10px] uppercase tracking-widest opacity-60">{{ $book->title }}</span>
                            </div>
                        @endif
                        
                        <!-- Overlay gradient on hover like the design -->
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity flex items-end p-5">
                            <span class="text-white text-[13px] font-medium flex items-center gap-2 transform translate-y-2 group-hover:translate-y-0 transition-transform duration-300">
                                <span class="material-symbols-outlined text-sm">visibility</span>
                                Quick Preview
                            </span>
                        </div>
                    </div>
                    
                    <div class="p-2 pt-1.5 md:p-3 md:pt-2 flex flex-col grow">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-brand-teal text-[8px] md:text-xs lg:text-[10px] font-bold">Ejlals Repository</span>
                            <div class="flex items-center gap-0.5">
                                <span class="material-symbols-outlined text-brand-gold text-[12px]! lg:text-[11px]!" style="font-variation-settings: 'FILL' 1;">star</span>
                                <span class="text-[9px] md:text-xs lg:text-[10px] font-black text-slate-500">4.9</span>
                            </div>
                        </div>
                        
                        <h3 class="text-[10px] md:text-sm lg:text-[14px] font-bold text-slate-800 mb-1 truncate leading-[1.2] group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
                        <p class="text-[9px] md:text-[12px] lg:text-[11px] text-slate-600 mb-2 line-clamp-2 leading-tight">
                            {{ Str::limit(strip_tags($book->description), 80) ?: 'Explore this valuable scholarly resource within our digital library collection.' }}
                        </p>
                        
                        <div class="mt-auto pt-1.5 border-t border-slate-100 flex items-center justify-between gap-1">
                            <div class="flex flex-col min-w-0">
                                <span class="text-[7px] text-slate-400 uppercase font-bold tracking-tight mb-0.5 truncate">Resource Type</span>
                                <span class="text-[10px] lg:text-[9px] font-bold text-slate-700 truncate">
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

        <!-- Quick View Modal -->
        <template x-teleport="body">
            <div 
                x-show="isOpen" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-6"
                x-cloak>
                
                <!-- Backdrop -->
                <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="isOpen = false"></div>

                <!-- Modal Content -->
                <div 
                    x-show="isOpen"
                    x-transition:enter="transition ease-out duration-300 delay-100"
                    x-transition:enter-start="opacity-0 scale-95 translate-y-4"
                    x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                    class="relative bg-white w-full max-w-4xl max-h-[90vh] rounded-3xl overflow-hidden shadow-2xl flex flex-col md:flex-row border border-white/20"
                    @click.away="isOpen = false">
                    
                    <!-- Left: Book Preview (3D feel) -->
                    <div class="w-full md:w-1/2 aspect-square md:aspect-auto flex items-center justify-center p-8 relative overflow-hidden" :class="selectedBook.bgClass">
                        <!-- Decorative background elements -->
                        <div class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
                        
                        <img :src="selectedBook.image" :alt="selectedBook.title" 
                            x-show="selectedBook.image"
                            class="relative z-10 w-[70%] max-h-full object-contain drop-shadow-[20px_25px_35px_rgba(0,0,0,0.5)] transform -rotate-2 hover:rotate-0 transition-transform duration-500">
                        
                        <div x-show="!selectedBook.image" class="relative z-10 w-[70%] aspect-[3/4] bg-white rounded-lg shadow-2xl flex items-center justify-center p-6 text-center border border-slate-100">
                            <span class="text-slate-400 font-bold text-lg uppercase tracking-widest opacity-40" x-text="selectedBook.title"></span>
                        </div>
                    </div>

                    <!-- Right: Details -->
                    <div class="w-full md:w-1/2 flex flex-col p-6 md:p-10 bg-white overflow-y-auto">
                        <!-- Header & Close -->
                        <div class="flex items-start justify-between mb-6">
                            <div>
                                <span class="inline-block px-3 py-1 bg-brand-teal/10 text-brand-teal text-[10px] font-bold uppercase tracking-widest rounded-full mb-2">Ejlals Repository</span>
                                <div class="flex items-center gap-1 text-xs text-brand-gold">
                                    <span class="material-symbols-outlined text-sm font-variation-fill-1">star</span>
                                    <span class="material-symbols-outlined text-sm font-variation-fill-1">star</span>
                                    <span class="material-symbols-outlined text-sm font-variation-fill-1">star</span>
                                    <span class="material-symbols-outlined text-sm font-variation-fill-1">star</span>
                                    <span class="material-symbols-outlined text-sm font-variation-fill-1">star_half</span>
                                    <span class="text-slate-500 font-bold ml-1">4.9 / 5.0</span>
                                </div>
                            </div>
                            <button @click="isOpen = false" class="size-10 rounded-full bg-slate-50 flex items-center justify-center text-slate-400 hover:bg-slate-100 hover:text-slate-600 transition-colors">
                                <span class="material-symbols-outlined">close</span>
                            </button>
                        </div>

                        <div class="flex-1 overflow-y-auto pr-2 custom-scrollbar">
                            <!-- Book Info -->
                            <h2 class="text-2xl md:text-3xl font-serif font-black text-slate-800 mb-4 leading-tight" x-text="selectedBook.title"></h2>
                            
                            <div class="flex items-center gap-4 mb-6">
                                <div class="flex items-center gap-2">
                                    <div class="size-8 rounded-full bg-brand-gold/10 flex items-center justify-center text-brand-gold">
                                        <span class="material-symbols-outlined text-lg">menu_book</span>
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Type</p>
                                        <p class="text-[11px] font-bold text-slate-700" x-text="selectedBook.type"></p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-2">
                                    <div class="size-8 rounded-full bg-brand-teal/10 flex items-center justify-center text-brand-teal">
                                        <span class="material-symbols-outlined text-lg">verified</span>
                                    </div>
                                    <div>
                                        <p class="text-[9px] text-slate-400 font-bold uppercase tracking-widest">Quality</p>
                                        <p class="text-[11px] font-bold text-slate-700">Verified Original</p>
                                    </div>
                                </div>
                            </div>

                            <div class="text-slate-600 mb-8">
                                <p class="leading-relaxed text-sm" x-text="selectedBook.description"></p>
                            </div>
                        </div>

                        <!-- CTA -->
                        <div class="mt-auto pt-6 border-t border-slate-100 flex flex-col sm:flex-row gap-3">
                            <a :href="selectedBook.link" target="_blank" class="flex-1 bg-brand-teal text-white px-6 py-3 rounded-xl font-bold text-sm text-center shadow-lg shadow-brand-teal/20 hover:brightness-110 transition-all flex items-center justify-center gap-2">
                                <span class="material-symbols-outlined text-lg">download</span>
                                Access Now
                            </a>
                            <button @click="isOpen = false" class="px-6 py-3 bg-slate-50 text-slate-600 rounded-xl font-bold text-sm hover:bg-slate-100 transition-colors">
                                Close Preview
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
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
                    {{ $postCategory->name ?? 'Scholarly Insights' }}
                </h2>
                <p class="text-slate-500 text-sm leading-relaxed max-w-xl">
                    {{ $postCategory->description ?? 'Deep dives into Islamic sciences, pedagogy, and modern leadership. Bridging traditional wisdom with contemporary excellence.' }}
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
                            <img alt="{{ $mainPost->image_alt ?? $mainPost->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105" src="{{ Storage::url($mainPost->image) }}"/>
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
                            <img alt="{{ $post->image_alt ?? $post->title }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" src="{{ Storage::url($post->image) }}"/>
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
<section class="bg-[#FDFDFC] pt-8 pb-24 px-6 relative overflow-hidden" x-data="{ activeFaq: null }">
    <!-- Subtle Background Decor -->
    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-teal/5 rounded-full -mr-48 -mt-48 blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-0 left-0 w-96 h-96 bg-brand-gold/5 rounded-full -ml-48 -mb-48 blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto relative z-10">
        <div class="text-center mb-16">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 mb-4">
                <span class="material-symbols-outlined text-brand-gold text-sm">quiz</span>
                <span class="text-[10px] font-bold text-brand-gold uppercase tracking-[0.3em]">Common Inquiries</span>
            </div>
            <h2 class="text-3xl md:text-5xl font-serif font-black text-slate-900 tracking-tight mb-4">Frequently Asked Questions</h2>
            <p class="text-slate-500 text-sm md:text-base max-w-xl mx-auto leading-relaxed">
                Everything you need to know about our online Islamic academy and how we help students grow in faith and character.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-12 items-start">
            <!-- Column 1 -->
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 1 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 1 ? null : 1)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">Do you teach Quran and Islamic studies in Urdu online?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 1 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 1 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Yes, all our courses at Ejlals Islamic Horizon are available in Urdu. This includes Quran recitation, Tajweed, Islamic studies, women's masail, Arabic language and daily adhkar. We also teach in Punjabi and English. This makes us one of the very few online Islamic academies offering full Urdu and Punjabi medium instruction.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 2 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 2 ? null : 2)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">Can my child learn Quran online with you?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 2 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 2 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Absolutely. We offer online Quran classes for kids starting from age 5. Our children's program begins with Noorani Qaida and progresses to full Quran recitation with Tajweed. All children's classes are one-on-one, patient, and available in Urdu, Punjabi or English.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 3 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 3 ? null : 3)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">I am a new Muslim. Do you have classes for me?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 3 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 3 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Yes, we have a dedicated program for new Muslims. It covers the basics of Islamic belief, how to perform salah (prayer), Quran reading from scratch, and everyday Islamic knowledge. Classes are available in English with Urdu support if needed. Our teachers are welcoming, patient and experienced in teaching new Muslims.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 4 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 4 ? null : 4)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">Do you offer Islamic classes specifically for women?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 4 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 4 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Yes. We have a dedicated women's Islamic studies program that covers women's masail (personal and religious questions), purification, prayer rulings, and Islamic knowledge relevant to sisters. Classes are taught by qualified female teachers, privately and comfortably, in Urdu or English.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Column 2 -->
            <div class="space-y-4">
                <!-- FAQ 5 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 5 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 5 ? null : 5)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">How does the free trial class work?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 5 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 5 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Your first three classes are completely free with no obligation. Simply contact us, tell us what course you want and your preferred language, and we will schedule a one-on-one trial class via Zoom, Skype or WhatsApp. After the trial, if you are happy, we set up a regular schedule and payment plan. There is no pressure.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 6 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 6 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 6 ? null : 6)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">What countries do you teach in?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 6 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 6 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                We teach students worldwide. Our students are based in the UK, USA, Canada, Australia, New Zealand, Pakistan, Saudi Arabia and beyond. Because all classes are online and one-on-one, we work around your timezone and schedule wherever you are in the world.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 7 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 7 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 7 ? null : 7)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">I want to learn Quran online — where do I start?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 7 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 7 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                The best place to start is our free trial class. Whether you are a complete beginner who wants to learn Quran online from scratch, or an intermediate student wanting to improve Tajweed. We assess your current level in your first session and create a personalised learning plan from there.
                            </div>
                        </div>
                    </div>
                </div>

                <!-- FAQ 8 -->
                <div class="bg-white rounded-2xl border transition-all duration-300 group"
                     :class="activeFaq === 8 ? 'border-brand-teal/40 shadow-xl shadow-brand-teal/5' : 'border-slate-100'">
                    <button class="w-full py-5 px-7 text-left flex items-center justify-between focus:outline-none" @click="activeFaq = (activeFaq === 8 ? null : 8)">
                        <span class="font-semibold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px] md:text-[16px]">Are your teachers qualified?</span>
                        <svg class="w-5 h-5 text-slate-400 transition-all duration-300" :class="activeFaq === 8 ? 'rotate-180 text-brand-teal' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </button>
                    <div class="grid transition-all duration-300 ease-in-out" :class="activeFaq === 8 ? 'grid-rows-[1fr] opacity-100' : 'grid-rows-[0fr] opacity-0'">
                        <div class="overflow-hidden">
                            <div class="px-7 pb-6 text-slate-500 leading-relaxed text-sm">
                                Yes. All our teachers at Ejlals Online Islamic Horizon hold formal Islamic qualifications in Quran, Tajweed, Islamic studies or fiqh. Female courses are taught by qualified female teachers. Our teachers are experienced in online teaching and are patient, supportive educators.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</section>
@endsection
