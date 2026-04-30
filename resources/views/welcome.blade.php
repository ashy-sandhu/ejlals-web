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
                Quran Courses at <span class="text-brand-teal">Ejlals</span><span class="text-brand-gold">.com</span>
            </h2>
            <div class="h-1 w-20 bg-gradient-to-r from-brand-teal to-brand-gold mx-auto rounded-full mt-2"></div>
            <p class="text-[14px] text-slate-500 leading-relaxed pt-4 text-balance font-medium">
                Structured Islamic curriculum designed to bridge classical wisdom with modern practical application.
            </p>
        </div>

        <!-- Course Cards Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <!-- Card 1: Tajweed Course -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-brand-teal/10 border border-slate-100 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden bg-slate-50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVr6PzF6RqgD_AdFs_RZZdF82npziHHo8Bm8vbR4wN-qYn-59c4DjE25gkrxw3tTEG8ylM6ffRGIWbt5XvTqFVgYiZxQYH99YEgxGrqTK9Pz0EBCYCyYizdVUt3e27C3G1dIYdd1dLdw8VbF6cDUe65Ye1uZaRkBygNJCYX47EtAVexwk6rJCOMoCsewQ6a97S094caaPvLEV0_NSJT2d-7OdlQN-HH1QtkRPscXNJo6rhSZtbCNmaxLYYEqnPIASipN-oPvt54Ws" alt="Tajweed Course"/>
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 backdrop-blur-md text-brand-teal font-black text-[9px] uppercase tracking-wider px-3 py-1 rounded-full shadow-sm border border-brand-teal/10">All Levels</span>
                    </div>
                </div>
                <div class="px-6 py-3 flex flex-col flex-grow text-center items-center">
                    <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-brand-teal transition-colors">Tajweed Course</h3>
                    <p class="text-[12px] text-slate-500 leading-relaxed mb-6 flex-grow text-balance">Master the correct pronunciation and beautiful recitation of the Holy Quran with expert guidance.</p>
                    <a href="#" class="inline-flex items-center bg-brand-teal/5 text-brand-teal px-5 py-2 rounded-xl font-bold text-[11px] gap-2 group/link hover:bg-brand-teal hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        Explore Course 
                        <span class="material-symbols-outlined text-[16px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Card 2: Noorani Qaida -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-brand-gold/10 border border-slate-100 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden bg-slate-50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset('images/courses/noorani_qaida.png') }}" alt="Noorani Qaida"/>
                    <div class="absolute top-4 left-4">
                        <span class="bg-brand-gold text-white font-black text-[9px] uppercase tracking-wider px-3 py-1 rounded-full shadow-sm">Beginners</span>
                    </div>
                </div>
                <div class="px-6 py-3 flex flex-col flex-grow text-center items-center">
                    <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-brand-gold transition-colors">Noorani Qaida</h3>
                    <p class="text-[12px] text-slate-500 leading-relaxed mb-6 flex-grow text-balance">Build strong Quran reading foundations with step-by-step learning for beginners and children.</p>
                    <a href="#" class="inline-flex items-center bg-brand-gold/5 text-brand-gold px-5 py-2 rounded-xl font-bold text-[11px] gap-2 group/link hover:bg-brand-gold hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        Explore Course 
                        <span class="material-symbols-outlined text-[16px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Card 3: Arabic Course -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-brand-teal/10 border border-slate-100 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden bg-slate-50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCKmBtMoVofP0Dl8qzuXubvx254VcBh6VrjoItaTlJA22BvOzSdCU1Q_vHNiY7yhHl-FSwRd5OnFkSlmIdBR6oU1cLwSTpakszocphMkCUjmoSAqMm_i4tuHI89m7NiH1i2qTxIGk2IgTW2_ktlVaDQOSgDQyejOVcQmmU5fC9EGTX41tYW-KKFbgfjBEnTkv_QklVdonPPebWtFzLjtgSa-uCPyCfXltao1D1Je5T5Gaj-oyCnxsL-5vQ8BmmXJnhy6F1LoclO3zQ" alt="Arabic Course"/>
                    <div class="absolute top-4 left-4">
                        <span class="bg-white/95 backdrop-blur-md text-brand-teal font-black text-[9px] uppercase tracking-wider px-3 py-1 rounded-full shadow-sm border border-brand-teal/10">All Levels</span>
                    </div>
                </div>
                <div class="px-6 py-3 flex flex-col flex-grow text-center items-center">
                    <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-brand-teal transition-colors">Arabic Course</h3>
                    <p class="text-[12px] text-slate-500 leading-relaxed mb-6 flex-grow text-balance">Master the Arabic language to understand the Quran and classical Islamic texts in their original form.</p>
                    <a href="#" class="inline-flex items-center bg-brand-teal/5 text-brand-teal px-5 py-2 rounded-xl font-bold text-[11px] gap-2 group/link hover:bg-brand-teal hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        Explore Course 
                        <span class="material-symbols-outlined text-[16px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>

            <!-- Card 4: Hifz ul Quran -->
            <div class="group bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:shadow-brand-gold/10 border border-slate-100 overflow-hidden flex flex-col transition-all duration-500 hover:-translate-y-2">
                <div class="relative h-48 overflow-hidden bg-slate-50">
                    <img class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" src="{{ asset('images/courses/hifz_course.png') }}" alt="Hifz ul Quran"/>
                    <div class="absolute top-4 left-4">
                        <span class="bg-brand-gold text-white font-black text-[9px] uppercase tracking-wider px-3 py-1 rounded-full shadow-sm">Memorization</span>
                    </div>
                </div>
                <div class="px-6 py-3 flex flex-col flex-grow text-center items-center">
                    <h3 class="text-lg font-black text-slate-800 mb-2 group-hover:text-brand-gold transition-colors">Hifz ul Quran</h3>
                    <p class="text-[12px] text-slate-500 leading-relaxed mb-6 flex-grow text-balance">Memorize the Holy Quran with proper technique and systematic revision under expert guidance.</p>
                    <a href="#" class="inline-flex items-center bg-brand-gold/5 text-brand-gold px-5 py-2 rounded-xl font-bold text-[11px] gap-2 group/link hover:bg-brand-gold hover:text-white transition-all duration-300 shadow-sm uppercase tracking-wider">
                        Explore Course 
                        <span class="material-symbols-outlined text-[16px] transition-transform group-hover/link:translate-x-1">arrow_forward</span>
                    </a>
                </div>
            </div>
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

<!-- Meet Our Expert Scholars Section (New) -->
<section class="relative py-12 bg-white overflow-hidden">
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
                            <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}" class="w-[75%] max-h-full object-contain drop-shadow-[0_10px_15px_rgba(0,0,0,0.2)] transition-transform duration-500">
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
                        
                        <h3 class="text-[10px] md:text-sm lg:text-[14px] font-bold text-slate-800 mb-1 line-clamp-2 leading-[1.2] group-hover:text-brand-teal transition-colors">{{ $book->title }}</h3>
                        
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
