<style>
    [x-cloak] { display: none !important; }
    .carousel-track {
        display: flex;
        height: 100%;
        transition-property: transform;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }
</style>

<div x-data="{ 
        activeSlide: 1, 
        totalSlides: 3,
        isTransitioning: false,
        autoPlay() {
            setInterval(() => {
                this.next();
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
    class="relative w-full min-h-[600px] flex flex-col bg-[#f5f8f8] overflow-hidden group border-b border-brand-teal/5">
    
    <!-- Slider Track -->
    <div class="carousel-track w-[400%]"
         :class="isTransitioning ? 'duration-1000' : 'duration-0'"
         :style="`transform: translateX(-${(activeSlide - 1) * 25}%)`">

        <!-- SLIDE 1: Enrolling Now Split -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 py-2 pb-12">
            <div class="flex-1 flex items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
                    <div class="flex flex-col gap-8 z-10 w-full">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-lg">auto_awesome</span>
                            <span class="text-xs font-bold text-brand-gold uppercase tracking-widest">Enrolling Now</span>
                        </div>
                        <div class="space-y-4">
                            <h1 class="text-slate-900 text-2xl md:text-4xl lg:text-5xl tracking-tight font-black leading-[1.05]">
                                Empowering Modern Minds with <span class="text-brand-teal">Timeless Islamic</span> Knowledge
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl">
                                Personalized one-on-one sessions designed to help students understand the beauty, wisdom, and guidance of authentic Islamic teachings.
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-2">
                            <a href="#" class="flex min-w-[160px] items-center justify-center rounded-xl bg-gradient-to-r from-brand-teal to-[#226e78] px-8 py-4 text-base font-bold text-white shadow-lg shadow-brand-teal/25 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 active:scale-[0.98]">
                                Start Learning
                            </a>
                            <a href="#" class="flex min-w-[160px] items-center justify-center rounded-xl bg-white border-2 border-brand-teal/10 px-8 py-4 text-base font-bold text-brand-teal hover:bg-brand-teal hover:text-white transition-all duration-300 active:scale-[0.98]">
                                Explore Courses
                            </a>
                        </div>
                    </div>
                    
                    <div class="relative group mt-8 lg:mt-0 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="relative rounded-[2rem] overflow-hidden border-8 border-white shadow-xl aspect-[4/3] max-h-[300px] md:max-h-none">
                            <img src="{{ asset('storage/hero-slide-1.png') }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" alt="Online Islamic Learning Session" />
                            <div class="absolute bottom-6 left-6 z-20 bg-white/95 backdrop-blur-md p-4 rounded-2xl flex items-center gap-4 border border-white/20 shadow-sm">
                                <div class="size-12 rounded-full bg-brand-teal/15 flex items-center justify-center text-brand-teal shrink-0">
                                    <span class="material-symbols-outlined">video_chat</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-brand-teal uppercase tracking-wider">Live Classes</p>
                                    <p class="text-sm font-semibold text-slate-800">Personalized 1-on-1 Guidance</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Slide 1 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div class="px-6 py-4 rounded-2xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">person</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">1-on-1 Sessions</h3>
                        <p class="text-slate-500 text-xs mt-1">Tailored curriculum to match your specific learning pace.</p>
                    </div>
                </div>
                <div class="px-6 py-4 rounded-2xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Verified Curriculum</h3>
                        <p class="text-slate-500 text-xs mt-1">Lessons based on authentic sources and scholarly wisdom.</p>
                    </div>
                </div>
                <div class="px-6 py-4 rounded-2xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all group flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-teal/5 text-brand-teal flex items-center justify-center shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">schedule</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Global Flexibility</h3>
                        <p class="text-slate-500 text-xs mt-1">Connect with expert tutors across any time zone.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- SLIDE 2: Laptop Mockup & Transform Journey -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 py-2 pb-12">
            <div class="flex-1 flex items-center">
                <div class="max-w-7xl mx-auto flex flex-col-reverse gap-10 lg:flex-row lg:items-center lg:gap-16 w-full">
                    <div class="flex flex-col gap-8 flex-1">
                        <div class="flex items-center gap-3 text-brand-gold font-bold text-sm uppercase tracking-widest">
                            <span class="w-10 h-[2px] bg-brand-gold"></span>
                            <span>Transform Your Journey</span>
                        </div>
                        <div class="space-y-4">
                            <h1 class="text-slate-900 text-2xl md:text-4xl lg:text-5xl tracking-tight font-black leading-[1.05]">
                                Personalized <span class="text-brand-teal">Islamic Education</span> for Every Student
                            </h1>
                            <p class="text-slate-600 text-sm leading-relaxed max-w-xl">
                                Flexible learning schedules, qualified scholars, and structured courses designed to nurture both knowledge and character in a modern digital environment.
                            </p>
                        </div>
                        <div class="flex flex-wrap gap-4 mt-2">
                            <a href="#" class="flex min-w-[160px] items-center justify-center rounded-xl bg-brand-teal px-8 py-4 text-base font-bold text-white shadow-lg shadow-brand-teal/25 hover:-translate-y-1 hover:shadow-xl transition-all duration-300 active:scale-[0.98]">
                                Book Free Trial
                            </a>
                            <a href="#" class="flex min-w-[160px] items-center justify-center rounded-xl bg-white border-2 border-brand-teal/10 px-8 py-4 text-base font-bold text-brand-teal hover:bg-brand-teal hover:text-white transition-all duration-300 active:scale-[0.98]">
                                View Programs
                            </a>
                        </div>
                    </div>
                    <div class="flex-1 relative w-full lg:max-w-none max-w-lg mx-auto">
                        <div class="relative z-10 w-full aspect-[4/3] rounded-3xl overflow-hidden shadow-2xl shadow-brand-teal/5 border-[12px] border-white max-h-[300px] md:max-h-none">
                            <div class="w-full h-full bg-slate-200 bg-cover bg-center" style="background-image: url('{{ asset('storage/hero-slide-2.png') }}');"></div>
                            <div class="absolute top-8 left-8 bg-white p-4 rounded-2xl shadow-xl border border-slate-50 flex items-center gap-4">
                                <div class="size-10 rounded-full bg-brand-gold/10 flex items-center justify-center text-brand-gold">
                                    <span class="material-symbols-outlined">menu_book</span>
                                </div>
                                <div>
                                    <p class="text-xs font-bold text-slate-400 uppercase tracking-tighter">Current Course</p>
                                    <p class="text-sm font-bold text-slate-800">Tajweed Mastery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2 Cards -->
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 md:grid-cols-3 gap-4 mt-2">
                <div class="group bg-white px-6 py-4 rounded-2xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-teal/5 flex items-center justify-center text-brand-teal shrink-0 group-hover:bg-brand-teal group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">auto_stories</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Quranic Sciences</h3>
                        <p class="text-slate-500 text-xs mt-1">In-depth Hifz, Tajweed, and Tafseer courses tailored to you.</p>
                    </div>
                </div>
                <div class="group bg-white px-6 py-4 rounded-2xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-gold/5 flex items-center justify-center text-brand-gold shrink-0 group-hover:bg-brand-gold group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">translate</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Arabic Language</h3>
                        <p class="text-slate-500 text-xs mt-1">Master Classical Fusha and Modern Standard Arabic.</p>
                    </div>
                </div>
                <div class="group bg-white px-6 py-4 rounded-2xl border border-brand-teal/5 shadow-sm hover:shadow-xl hover:border-brand-gold/30 transition-all flex items-start gap-4">
                    <div class="size-12 rounded-xl bg-brand-teal/5 flex items-center justify-center text-brand-teal shrink-0 group-hover:bg-brand-teal group-hover:text-white transition-all">
                        <span class="material-symbols-outlined">psychology</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-slate-900">Islamic Character</h3>
                        <p class="text-slate-500 text-xs mt-1">Akhlaq and Adab development to build spiritual foundations.</p>
                    </div>
                </div>
            </div>
        </main>

        <!-- SLIDE 3: Dashboard Mockup -->
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 py-2 pb-12">
            <div class="flex-1 flex items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
                    <div class="flex flex-col gap-8 order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-sm">verified_user</span>
                            <span class="text-brand-gold text-xs font-bold uppercase tracking-widest">Scholar-Verified</span>
                        </div>
                        <div class="space-y-4">
                            <h1 class="text-slate-900 text-2xl md:text-4xl lg:text-5xl tracking-tight font-black leading-[1.05]">
                                A Trusted Platform for <span class="text-brand-teal">Authentic</span> Islamic Education
                            </h1>
                            <p class="text-slate-600 text-sm md:text-base leading-relaxed max-w-xl">
                                Learn Quran, Hadith, Fiqh, and essential Islamic knowledge through interactive online sessions guided by experienced scholars.
                            </p>
                        </div>
                        <div class="grid grid-cols-3 gap-6 pt-6 mt-4 border-t border-slate-200">
                            <div>
                                <p class="text-brand-gold text-3xl font-black">15k+</p>
                                <p class="text-slate-500 text-sm font-medium mt-1">Students</p>
                            </div>
                            <div>
                                <p class="text-brand-gold text-3xl font-black">50+</p>
                                <p class="text-slate-500 text-sm font-medium mt-1">Scholars</p>
                            </div>
                            <div>
                                <p class="text-brand-gold text-3xl font-black">4.9/5</p>
                                <p class="text-slate-500 text-sm font-medium mt-1">Rating</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative order-1 lg:order-2 w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="bg-white rounded-2xl shadow-xl border border-slate-100 overflow-hidden aspect-[4/3] flex flex-col relative z-10 max-h-[300px] md:max-h-none">
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
            <div class="max-w-7xl mx-auto w-full grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 mt-2">
                <div class="group px-4 py-3 rounded-xl border border-brand-teal/5 bg-white shadow-sm hover:border-brand-gold/30 hover:shadow-xl transition-all flex items-start gap-4">
                    <div class="size-10 flex items-center justify-center rounded-lg bg-brand-teal/5 text-brand-teal group-hover:bg-brand-gold group-hover:text-white transition-all shrink-0">
                        <span class="material-symbols-outlined">menu_book</span>
                    </div>
                    <div>
                        <h3 class="text-slate-900 text-sm font-bold leading-tight">Quranic Studies</h3>
                        <p class="text-slate-500 text-[10px] mt-0.5">Hifz & Tajweed certification.</p>
                    </div>
                </div>
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
        <main class="w-1/4 shrink-0 relative flex flex-col px-6 lg:px-20 py-2 pb-12">
            <div class="flex-1 flex items-center">
                <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center w-full">
                    <div class="flex flex-col gap-8">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-gold/10 border border-brand-gold/20 w-fit">
                            <span class="material-symbols-outlined text-brand-gold text-lg">auto_awesome</span>
                            <span class="text-xs font-bold text-brand-gold uppercase tracking-widest">Enrolling Now</span>
                        </div>
                        <div class="space-y-4">
                            <h2 class="text-slate-900 text-2xl md:text-4xl lg:text-5xl tracking-tight font-black leading-[1.05]">
                                Empowering Modern Minds with <span class="text-brand-teal">Timeless Islamic</span> Knowledge
                            </h2>
                        </div>
                    </div>
                    <div class="relative w-full max-w-lg mx-auto lg:max-w-none">
                        <div class="relative rounded-[2rem] overflow-hidden border-8 border-white shadow-xl aspect-[4/3]">
                            <img src="{{ asset('storage/hero-slide-1.png') }}" class="w-full h-full object-cover" alt="Online Islamic Learning Session" />
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Unified Global Controls Container -->
    <div class="absolute bottom-2 left-0 right-0 z-40 px-6 pointer-events-none">
        <div class="max-w-7xl mx-auto flex items-center justify-center">
            
            <!-- Progress Indicators -->
            <div class="flex items-center gap-3 bg-white/60 backdrop-blur-md px-4 py-2 rounded-full shadow-sm border border-white/50 pointer-events-auto">
                <template x-for="i in totalSlides" :key="i">
                    <button @click="goToSlide(i)" 
                            class="transition-all duration-300 rounded-full box-border hover:scale-125"
                            :class="(activeSlide === i || (activeSlide > totalSlides && i === 1)) ? 'w-10 h-2 bg-brand-gold shadow-md shadow-brand-gold/20' : 'w-2 h-2 bg-brand-teal/20 hover:bg-brand-teal/50'"
                            :aria-label="'Go to slide ' + i">
                    </button>
                </template>
            </div>
        </div>
    </div>
</div>
