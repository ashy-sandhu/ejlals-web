<style>
    [x-cloak] { display: none !important; }
    .carousel-track {
        display: flex;
        transition-property: transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<div x-data="{ 
        activeSlide: 1, 
        totalSlides: 3,
        isTransitioning: false,
        isPaused: false,
        autoPlay() {
            setInterval(() => {
                if (!this.isPaused) {
                    this.next();
                }
            }, 8000);
        },
        next() {
            this.isTransitioning = true;
            this.activeSlide++;
            if (this.activeSlide > this.totalSlides) {
                setTimeout(() => {
                    this.isTransitioning = false;
                    this.activeSlide = 1;
                }, 1000);
            }
        },
        prev() {
            this.isTransitioning = true;
            this.activeSlide--;
            if (this.activeSlide < 1) {
                setTimeout(() => {
                    this.isTransitioning = false;
                    this.activeSlide = this.totalSlides;
                }, 1000);
            }
        },
        goToSlide(i) {
            this.isTransitioning = true;
            this.activeSlide = i;
        }
    }" 
    x-init="autoPlay()"
    class="relative w-full flex flex-col bg-[#f5f8f8] overflow-hidden group border-b border-brand-teal/5">
    
    <!-- Pause/Play Toggle (Pro Choice: Top Right Overlay) -->
    <div class="absolute top-4 right-4 lg:top-8 lg:right-8 z-40">
        <button @click="isPaused = !isPaused" 
                class="size-9 rounded-full bg-white/40 backdrop-blur-md border border-white/20 flex items-center justify-center text-slate-700 hover:bg-white hover:text-brand-teal transition-all duration-500 shadow-sm group/pause"
                :title="isPaused ? 'Resume Auto-play' : 'Pause Auto-play'">
            <span x-show="!isPaused" class="material-symbols-outlined text-[20px] group-hover/pause:scale-110 transition-transform">pause</span>
            <span x-show="isPaused" class="material-symbols-outlined text-[20px] group-hover/pause:scale-110 transition-transform">play_arrow</span>
        </button>
    </div>
    
    <!-- Slider Track -->
    <div class="carousel-track w-[400%]"
         :class="isTransitioning ? 'duration-1000' : 'duration-0'"
         :style="`transform: translateX(-${(activeSlide - 1) * 25}%)`">

        <!-- SLIDE 1: Enrolling Now Split -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 pt-6 lg:pt-2 lg:py-2">
            <div class="pb-4 lg:py-0 lg:flex-1 lg:flex lg:items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] lg:gap-4 items-center w-full">
                    <div class="flex flex-col gap-4 z-10 w-full text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-lg">auto_awesome</span>
                            <span class="text-xs font-bold text-brand-gold uppercase tracking-widest">Enrolling Now</span>
                        </div>
                        <div class="space-y-2 lg:space-y-4">
                            <h1 class="text-slate-900 tracking-tight leading-[1.1]">
                                <span class="block text-2xl md:text-3xl lg:text-4xl font-bold text-slate-400">Modern Minds,</span>
                                <span class="block text-4xl md:text-5xl lg:text-6xl font-black text-brand-teal -mt-1">Islamic Values<span class="text-slate-200">:</span></span>
                                <span class="block text-lg md:text-2xl lg:text-3xl font-serif italic text-brand-gold leading-relaxed">
                                    A Generation Built on <span class="not-italic font-bold text-slate-900 underline decoration-brand-gold/30 underline-offset-8">Faith and Character</span>
                                </span>
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl my-3 lg:my-0">
                                Learn Islam at your own pace with one-on-one online classes. Our flexible lessons and trusted study plan are designed to help learners grow spiritually, no matter how busy your day is.
                            </p>
                        </div>
                        <div class="flex flex-row gap-3 lg:mt-5">
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-gradient-to-r from-brand-teal to-[#226e78] px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-white shadow-lg shadow-brand-teal/25 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 active:scale-[0.98]">
                                Start Learning
                            </a>
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-white border-2 border-brand-teal/10 px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-brand-teal hover:bg-brand-teal hover:text-white transition-all duration-300 active:scale-[0.98]">
                                Explore Courses
                            </a>
                        </div>
                    </div>
                    
                    <div class="relative group mt-4 lg:mt-0 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="relative z-10 w-full aspect-[4/3] max-h-[180px] md:max-h-none rounded-3xl overflow-hidden shadow-2xl shadow-brand-teal/5 border-[6px] lg:border-[12px] border-white">
                            <img src="{{ asset('storage/hero-slide-1.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Online Islamic Learning Session" />
                            <div class="absolute bottom-3 left-3 lg:bottom-6 lg:left-6 z-20 bg-white/95 backdrop-blur-md p-2 lg:p-4 rounded-xl lg:rounded-2xl flex items-center gap-2 lg:gap-4 border border-white/20 shadow-sm">
                                <div class="size-8 lg:size-12 rounded-full bg-brand-teal/15 flex items-center justify-center text-brand-teal shrink-0">
                                    <span class="material-symbols-outlined text-base lg:text-2xl">video_chat</span>
                                </div>
                                <div>
                                    <p class="text-[8px] lg:text-xs font-bold text-brand-teal uppercase tracking-wider">Live Classes</p>
                                    <p class="text-[10px] lg:text-sm font-semibold text-slate-800 leading-tight">Personalized 1-on-1 Guidance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 1 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-6 lg:mt-auto lg:mb-4">
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">1-on-1 Sessions</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Tailored curriculum to match your learning pace.</p>
                    </div>
                </div>
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Verified Curriculum</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Lessons based on authentic scholarly wisdom.</p>
                    </div>
                </div>
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Global Flexibility</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Connect with expert tutors across any time zone.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- SLIDE 2: Laptop Mockup & Transform Journey -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 pt-6 lg:pt-2 lg:py-2">
            <div class="pb-4 lg:py-0 lg:flex-1 lg:flex lg:items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] lg:gap-4 items-center w-full mb-2">
                    <div class="flex flex-col gap-4 z-10 w-full text-left">
                        <div class="flex items-center gap-3 text-brand-gold font-bold text-sm uppercase tracking-widest">
                            <span class="w-10 h-[2px] bg-brand-gold"></span>
                            <span>Transform Your Journey</span>
                        </div>
                        <div class="space-y-2 lg:space-y-4">
                            <h1 class="text-slate-900 text-2xl md:text-4xl lg:text-[2.75rem] xl:text-5xl tracking-tight font-black leading-[1.1] max-w-[280px] md:max-w-none">
                                Shape Your <span class="text-brand-teal">Kid’s Future</span> <br class="hidden lg:block"> by Growing with <span class="text-brand-gold font-serif italic">Ejlals Islamic Horizon</span>
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl my-3 lg:my-0">
                                We offer live classes for all ages, from Tajweed for kids to advanced Fiqh for adults. Our mentors bridge the gap with native-level fluency in Urdu, Punjabi, and English, so you can learn in your own language.
                            </p>
                        </div>
                        <div class="flex flex-row gap-3 lg:mt-5">
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-brand-teal px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-white shadow-lg shadow-brand-teal/25 hover:-translate-y-1 hover:shadow-xl transition-all duration-300">
                                Book Free Trial
                            </a>
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-white border-2 border-brand-teal/10 px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-brand-teal hover:bg-brand-teal hover:text-white transition-all duration-300">
                                View Programs
                            </a>
                        </div>
                    </div>
                    <div class="relative group mt-4 lg:mt-0 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="relative z-10 w-full aspect-[4/3] max-h-[180px] md:max-h-none rounded-3xl overflow-hidden shadow-2xl shadow-brand-teal/5 border-[6px] lg:border-[12px] border-white">
                            <div class="w-full h-full bg-slate-200 bg-cover bg-center" style="background-image: url('{{ asset('storage/hero-slide-2.png') }}');"></div>
                            <div class="absolute top-3 left-3 lg:top-8 lg:left-8 bg-white p-2 lg:p-4 rounded-xl lg:rounded-2xl shadow-xl border border-slate-50 flex items-center gap-2 lg:gap-4">
                                <div class="size-8 lg:size-10 rounded-full bg-brand-gold/10 flex items-center justify-center text-brand-gold">
                                    <span class="material-symbols-outlined text-base lg:text-2xl">menu_book</span>
                                </div>
                                <div>
                                    <p class="text-[8px] lg:text-xs font-bold text-slate-400 uppercase tracking-tighter">Current Course</p>
                                    <p class="text-[10px] lg:text-sm font-bold text-slate-800 leading-tight">Tajweed Mastery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 2 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-6 lg:mt-auto lg:mb-4">
                <div class="group bg-white px-4 py-3 rounded-xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 flex items-center justify-center text-brand-teal shrink-0 group-hover:bg-brand-teal group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Quranic Sciences</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Master Hifz, Tajweed, and Tafseer.</p>
                    </div>
                </div>
                <div class="group bg-white px-4 py-3 rounded-xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-gold/5 flex items-center justify-center text-brand-gold shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">translate</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Multilingual Learnings</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Native Fluency for Better Understanding</p>
                    </div>
                </div>
                <div class="group bg-white px-4 py-3 rounded-xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 flex items-center justify-center text-brand-teal shrink-0 group-hover:bg-brand-teal group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">psychology</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Islamic Character</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Akhlaq and Adab development.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- SLIDE 3: Dashboard Mockup -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 pt-6 lg:pt-2 lg:py-2">
            <div class="pb-4 lg:py-0 lg:flex-1 lg:flex lg:items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] lg:gap-4 items-center w-full lg:mb-4">
                    <div class="flex flex-col gap-4 z-10 w-full text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-sm">verified_user</span>
                            <span class="text-brand-gold text-xs font-bold uppercase tracking-widest">Scholar-Verified</span>
                        </div>
                        <div class="space-y-2 lg:space-y-4">
                            <h1 class="text-slate-900 text-2xl md:text-4xl lg:text-[2.75rem] xl:text-5xl tracking-tight font-black leading-[1.1] max-w-[280px] md:max-w-none">
                                Certified Excellence in <br class="hidden lg:block"> <span class="text-brand-teal">Quran, Hadith,</span> and <span class="text-brand-gold font-serif italic">Islamic Guidance</span>
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl">
                                Learn to read and memorize the Quran with perfect Tajweed, explore the authentic life of Prophet Muhammad (PBUH), and find clear answers to everyday questions through practical Islamic rules. Our scholars simplify complex topics, providing you with authentic guidance for all life situations.
                            </p>
                        </div>
                        <div class="grid grid-cols-3 gap-6 lg:pt-6 border-t border-slate-200">
                            <div>
                                <p class="text-brand-gold text-2xl lg:text-3xl font-black">15k+</p>
                                <p class="text-slate-500 text-[10px] lg:text-sm font-medium mt-1 uppercase tracking-wider">Students</p>
                            </div>
                            <div>
                                <p class="text-brand-gold text-2xl lg:text-3xl font-black">50+</p>
                                <p class="text-slate-500 text-[10px] lg:text-sm font-medium mt-1 uppercase tracking-wider">Scholars</p>
                            </div>
                            <div>
                                <p class="text-brand-gold text-2xl lg:text-3xl font-black">4.9/5</p>
                                <p class="text-slate-500 text-[10px] lg:text-sm font-medium mt-1 uppercase tracking-wider">Rating</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative group mt-4 lg:mt-0 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden aspect-[4/3] max-h-[180px] md:max-h-none flex flex-col relative z-10 w-full">
                            <div class="h-10 border-b border-slate-50 bg-slate-50/50 px-4 flex items-center justify-between">
                                <div class="flex gap-1.5">
                                    <div class="size-2.5 rounded-full bg-red-400"></div>
                                    <div class="size-2.5 rounded-full bg-amber-400"></div>
                                    <div class="size-2.5 rounded-full bg-emerald-400"></div>
                                </div>
                                <div class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Live Session</div>
                                <div class="size-6 rounded-full bg-brand-teal/10 flex items-center justify-center">
                                    <span class="material-symbols-outlined text-[12px] text-brand-teal">more_horiz</span>
                                </div>
                            </div>
                            <div class="flex-1 p-3 flex gap-3">
                                <div class="flex-[3] bg-slate-100 rounded-xl relative overflow-hidden shadow-inner">
                                    <div class="absolute inset-0 bg-cover bg-center" style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuBE2JjYaT_CzZQcLd3c91Izx2EnFYJB59-sAlwx5ujW1HFh2_PZx8ajpxYE8RB8wexRzcyvpn3U7H1WLHtQbfURzY61kUDfIP3UgGRaDuHm_qcMEIz6R3GJBVjQ-LfFlp1kWh2d9hokjW--qtTTf5dxLja2j7S6tQ0E4O6Z9bGG7NQ_D8sYv7VNx3llO4yLeysmvGnVmCOJx9bT5romEPvpIYoLh098MCmB93bbQadhBelcgqS2zEqnJANbs2lk00K3tE034PMLxFA");'></div>
                                    <div class="absolute top-2 left-2 bg-red-500 px-2 py-0.5 rounded text-[8px] font-bold text-white tracking-widest uppercase flex items-center gap-1">
                                        <span class="size-1 rounded-full bg-white animate-pulse"></span>REC
                                    </div>
                                </div>
                                <div class="flex-1 flex flex-col gap-2">
                                    <div class="flex-1 bg-slate-50 rounded-lg p-2 border border-slate-100">
                                        <div class="space-y-2">
                                            <div class="flex items-center gap-1.5"><div class="size-5 rounded-full bg-brand-teal/20"></div><div class="h-1.5 w-8 bg-slate-200 rounded-full"></div></div>
                                            <div class="flex items-center gap-1.5"><div class="size-5 rounded-full bg-brand-gold/20"></div><div class="h-1.5 w-10 bg-slate-200 rounded-full"></div></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Slide 3 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-6 lg:mt-auto lg:mb-4">
                <div class="group px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all flex items-start gap-4">
                    <div class="size-10 flex items-center justify-center rounded-lg bg-brand-teal/5 text-brand-teal group-hover:bg-brand-gold group-hover:text-white transition-all shrink-0">
                        <span class="material-symbols-outlined">format_quote</span>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-sm font-bold leading-tight">Hadith & Sunnah</h3>
                        <p class="text-slate-500 text-[10px] mt-0.5">Authentic narrations and application.</p>
                    </div>
                </div>
                <div class="group px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all flex items-start gap-4">
                    <div class="size-10 flex items-center justify-center rounded-lg bg-brand-teal/5 text-brand-teal group-hover:bg-brand-gold group-hover:text-white transition-all shrink-0">
                        <span class="material-symbols-outlined">balance</span>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-sm font-bold leading-tight">Fiqh Jurisprudence</h3>
                        <p class="text-slate-500 text-[10px] mt-0.5">Practical rulings for everyday life.</p>
                    </div>
                </div>
                <div class="group px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all flex items-start gap-4">
                    <div class="size-10 flex items-center justify-center rounded-lg bg-brand-teal/5 text-brand-teal group-hover:bg-brand-gold group-hover:text-white transition-all shrink-0">
                        <span class="material-symbols-outlined">history_edu</span>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-sm font-bold leading-tight">Islamic History</h3>
                        <p class="text-slate-500 text-[10px] mt-0.5">Exploring our rich world heritage.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- CLONE OF SLIDE 1 (for seamless loop) -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 pt-6 lg:pt-2 lg:py-2">
            <div class="pb-4 lg:py-0 lg:flex-1 lg:flex lg:items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-[1.1fr_0.9fr] lg:gap-4 items-center w-full">
                    <div class="flex flex-col gap-4 z-10 w-full text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-lg">auto_awesome</span>
                            <span class="text-xs font-bold text-brand-gold uppercase tracking-widest">Enrolling Now</span>
                        </div>
                        <div class="space-y-2 lg:space-y-4">
                            <h1 class="text-slate-900 tracking-tight leading-[1.1]">
                                <span class="block text-2xl md:text-3xl lg:text-4xl font-bold text-slate-400">Modern Minds,</span>
                                <span class="block text-4xl md:text-5xl lg:text-6xl font-black text-brand-teal -mt-1">Islamic Values<span class="text-slate-200">:</span></span>
                                <span class="block text-lg md:text-2xl lg:text-3xl font-serif italic text-brand-gold leading-relaxed">
                                    A Generation Built on <span class="not-italic font-bold text-slate-900 underline decoration-brand-gold/30 underline-offset-8">Faith and Character</span>
                                </span>
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl my-3 lg:my-0">
                                Learn Islam at your own pace with one-on-one online classes. Our flexible lessons and trusted study plan are designed to help learners grow spiritually, no matter how busy your day is.
                            </p>
                        </div>
                        <div class="flex flex-row gap-3 lg:mt-5">
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-gradient-to-r from-brand-teal to-[#226e78] px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-white shadow-lg shadow-brand-teal/25 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 active:scale-[0.98]">
                                Start Learning
                            </a>
                            <a href="#" class="flex-1 sm:flex-none sm:min-w-[160px] flex items-center justify-center rounded-xl bg-white border-2 border-brand-teal/10 px-4 sm:px-8 py-3.5 sm:py-4 text-sm sm:text-base font-bold text-brand-teal hover:bg-brand-teal hover:text-white transition-all duration-300 active:scale-[0.98]">
                                Explore Courses
                            </a>
                        </div>
                    </div>
                    
                    <div class="relative group mt-4 lg:mt-0 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="relative z-10 w-full aspect-[4/3] max-h-[180px] md:max-h-none rounded-3xl overflow-hidden shadow-2xl shadow-brand-teal/5 border-[6px] lg:border-[12px] border-white">
                            <img src="{{ asset('storage/hero-slide-1.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Online Islamic Learning Session" />
                            <div class="absolute bottom-3 left-3 lg:bottom-6 lg:left-6 z-20 bg-white/95 backdrop-blur-md p-2 lg:p-4 rounded-xl lg:rounded-2xl flex items-center gap-2 lg:gap-4 border border-white/20 shadow-sm">
                                <div class="size-8 lg:size-12 rounded-full bg-brand-teal/15 flex items-center justify-center text-brand-teal shrink-0">
                                    <span class="material-symbols-outlined text-base lg:text-2xl">video_chat</span>
                                </div>
                                <div>
                                    <p class="text-[8px] lg:text-xs font-bold text-brand-teal uppercase tracking-wider">Live Classes</p>
                                    <p class="text-[10px] lg:text-sm font-semibold text-slate-800 leading-tight">Personalized 1-on-1 Guidance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 1 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-3 lg:gap-6 lg:mt-auto lg:mb-4">
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">1-on-1 Sessions</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Tailored curriculum to match your learning pace.</p>
                    </div>
                </div>
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Verified Curriculum</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Lessons based on authentic scholarly wisdom.</p>
                    </div>
                </div>
                <div class="px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-3">
                    <div class="size-10 rounded-lg bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm">Global Flexibility</h3>
                        <p class="text-slate-500 text-[10px] sm:text-xs mt-0.5">Connect with expert tutors across any time zone.</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="absolute inset-x-0 top-3 bottom-auto lg:top-auto lg:bottom-1 flex justify-center items-center gap-3 z-30">
        <template x-for="i in totalSlides" :key="i">
            <button @click="goToSlide(i)" 
                    class="transition-all duration-300 h-2 rounded-full box-border hover:scale-125"
                    :class="(activeSlide === i || (activeSlide > totalSlides && i === 1)) ? 'w-10 bg-brand-gold shadow-md shadow-brand-gold/20' : 'w-2 bg-brand-teal/20 hover:bg-brand-teal/50'"
                    :aria-label="'Go to slide ' + i">
            </button>
        </template>
    </div>
</div>
