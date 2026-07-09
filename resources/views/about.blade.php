@extends('layouts.app')

@section('title', 'About Us | Ejlals Islamic Horizon')
@section('meta_description', 'Discover the legacy of Ejlals Islamic Horizon. Learn about our mission to bridge traditional Islamic scholarship with modern technology to provide accessible online education.')

@section('json_ld')
    @php
        $aboutSchema = [
            "@context" => "https://schema.org",
            "@type" => "AboutPage",
            "mainEntity" => \App\Traits\HasSeoSchema::getOrganizationSchema()
        ];
        $breadcrumbSchema = \App\Traits\HasSeoSchema::generateBreadcrumbs([
            ['name' => 'About Us', 'url' => route('about')]
        ]);
    @endphp
    {!! \App\Traits\HasSeoSchema::renderJsonLd($aboutSchema) !!}
    {!! \App\Traits\HasSeoSchema::renderJsonLd($breadcrumbSchema) !!}
@endsection

@section('content')
<!-- Tailwind CDN & Config for this page only -->
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script>
    tailwind.config = {
        darkMode: "class",
        theme: {
            extend: {
                "colors": {
                    "outline-variant": "#cbd5e1",
                    "on-secondary-fixed": "#311400",
                    "error": "#ba1a1a",
                    "on-secondary-fixed-variant": "#723600",
                    "error-container": "#ffdad6",
                    "on-surface": "#1b1b18",
                    "surface": "#FDFDFC",
                    "inverse-on-surface": "#f1f1f0",
                    "on-secondary": "#ffffff",
                    "on-tertiary-fixed-variant": "#5d4201",
                    "on-primary-fixed": "#002021",
                    "on-primary-container": "#f2ffff",
                    "outline": "#64748b",
                    "on-secondary-container": "#673100",
                    "on-background": "#1b1b18",
                    "surface-container-lowest": "#ffffff",
                    "surface-tint": "#138C90",
                    "inverse-primary": "#72d6da",
                    "primary": "#138C90",
                    "secondary": "#EA7F26",
                    "tertiary": "#755717",
                    "on-surface-variant": "#64748b",
                    "tertiary-fixed-dim": "#e9c176",
                    "primary-fixed-dim": "#72d6da",
                    "secondary-fixed-dim": "#ffb786",
                    "surface-bright": "#FDFDFC",
                    "secondary-container": "#EA7F26",
                    "on-error-container": "#93000a",
                    "surface-container-highest": "#e2e2e2",
                    "surface-container": "#f8fafd",
                    "on-primary-fixed-variant": "#004f52",
                    "tertiary-fixed": "#ffdea5",
                    "surface-dim": "#dadad9",
                    "on-tertiary-fixed": "#261900",
                    "primary-container": "#138C90",
                    "on-error": "#ffffff",
                    "background": "#FDFDFC",
                    "surface-variant": "#e2e2e2",
                    "primary-fixed": "#8ff2f6",
                    "on-tertiary": "#ffffff",
                    "surface-container-high": "#f1f5f9",
                    "tertiary-container": "#90702e",
                    "on-primary": "#ffffff",
                    "inverse-surface": "#2f3130",
                    "on-tertiary-container": "#fffbff",
                    "secondary-fixed": "#ffdcc6",
                    "surface-container-low": "#f8fafc"
                },
                "borderRadius": {
                    "DEFAULT": "0.125rem",
                    "lg": "0.25rem",
                    "xl": "0.5rem",
                    "full": "0.75rem"
                },
                "spacing": {
                    "max-width": "1280px",
                    "base": "4px",
                    "margin": "32px",
                    "sm": "1rem",
                    "md": "1.5rem",
                    "lg": "1.5rem",
                    "gutter": "24px",
                    "xl": "4rem",
                    "xs": "0.5rem"
                },
                "fontFamily": {
                    "label-md": ["Inter"],
                    "headline-xl": ["Playfair Display"],
                    "headline-lg": ["Playfair Display"],
                    "headline-md": ["Playfair Display"],
                    "body-lg": ["Inter"],
                    "body-md": ["Inter"],
                    "ornamental": ["Noto Nastaliq Urdu"]
                },
                "fontSize": {
                    "label-md": ["14px", {"lineHeight": "1.4", "letterSpacing": "0.05em", "fontWeight": "500"}],
                    "headline-xl": ["48px", {"lineHeight": "1.2", "letterSpacing": "-0.02em", "fontWeight": "700"}],
                    "headline-lg": ["36px", {"lineHeight": "1.2", "fontWeight": "600"}],
                    "headline-md": ["24px", {"lineHeight": "1.3", "fontWeight": "600"}],
                    "body-lg": ["18px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "body-md": ["16px", {"lineHeight": "1.6", "fontWeight": "400"}],
                    "ornamental": ["20px", {"lineHeight": "2.0", "fontWeight": "400"}]
                }
            },
        },
    }
</script>

<style>
    /* New Design Specific Styles */
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(189, 201, 201, 0.3);
    }
    .islamic-pattern {
        background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M30 0l5 20 20 5-20 5-5 20-5-20-20-5 20-5z' fill='%23138C90' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
    }
    .mesh-gradient {
        background: radial-gradient(at 0% 0%, rgba(19, 140, 144, 0.05) 0px, transparent 50%),
                    radial-gradient(at 100% 100%, rgba(234, 127, 38, 0.05) 0px, transparent 50%);
    }
    .vertical-line {
        width: 1px;
        background: linear-gradient(to bottom, transparent, #bdc9c9 15%, #bdc9c9 85%, transparent);
    }
    details > summary {
        list-style: none;
    }
    details > summary::-webkit-details-marker {
        display: none;
    }
    details[open] summary .expand-icon {
        transform: rotate(180deg);
    }
    .text-brand-teal { color: #138C90; }
    .text-brand-gold { color: #EA7F26; }
</style>

<main class="about-new-design font-body-md selection:bg-primary/20 overflow-hidden">
    <!-- Hero Section -->
    <section class="bg-white border-b border-surface-container pt-12 pb-16 text-center relative overflow-hidden">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_50%_-20%,rgba(19,140,144,0.05),transparent_70%)]"></div>
        <div class="max-w-max-width mx-auto px-margin">
        <div class="inline-block px-md py-xs bg-secondary/10 text-secondary font-label-md mb-md rounded border border-secondary/20">
            ESTABLISHED 2016
        </div>
        <h1 class="font-headline-xl text-headline-xl text-on-background mb-sm">
            A Legacy of Faith and Innovation
        </h1>
        <p class="font-body-lg text-body-lg text-on-surface-variant max-w-3xl mx-auto leading-relaxed mb-lg">
            Ejlals Islamic Horizon represents a historic bridge between classical scholarship and the digital frontier. Our foundation is built upon the timeless wisdom of traditional Ulamas, refined and delivered through the precision of modern technological excellence.
        </p>
        <div class="flex flex-wrap gap-sm justify-center">
            <a href="{{ route('courses.index') }}" class="bg-primary text-on-primary px-lg py-sm rounded font-label-md flex items-center gap-xs hover:bg-secondary transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                Explore Programs <span class="material-symbols-outlined text-[18px]">arrow_forward</span>
            </a>
            <button class="border border-primary/20 text-primary px-lg py-sm rounded font-label-md hover:bg-primary/5 hover:border-primary/40 transition-all duration-300 flex items-center gap-xs">
                <span class="material-symbols-outlined text-[18px]">play_circle</span> Watch Vision
            </button>
        </div>
    </section>

    <!-- Founders Section -->
    <section class="bg-surface py-xl">
        <div class="max-w-max-width mx-auto px-margin grid grid-cols-1 md:grid-cols-2 gap-gutter">
        <!-- Founder 1 -->
        <div class="glass-card group p-lg flex flex-col md:flex-row gap-md items-start rounded-xl hover:shadow-lg transition-all duration-500 border border-transparent hover:border-secondary/20">
            <div class="w-full md:w-48 h-64 flex-shrink-0 bg-surface-container overflow-hidden rounded-lg">
                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVznxwlXRuWJnj37bkX7JOjCnD1nV79aE8cWONWE7k_wXry95fgVcCzQLE3KVKsc0X-CX9AFOMWBZRMuN3b98NsjKivDUALjnOS5j48Hy7_ww51To8kbEE0nijy5cr27YH4EdcQgJDxOPl2FoezwH0iBbnoqkmFrWehDpR62m7UVfRt30koStEm14EwE-C6HiYZwr8glFw4NtXc3mVyexmMD5S8_lkURb5CEXbIFaXaZSBA4RAC6Bqoas4Oy3-G8Age5fHGNi3330" alt="Professor Abdullah Ejlal">
            </div>
            <div>
                <h2 class="font-headline-md text-headline-md text-primary group-hover:text-secondary transition-colors duration-500">Prof. Abdul Manan</h2>
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-[10px] block mb-1">Founder & CEO — Ejlals Islamic Horizon</span>
                <div class="mt-sm space-y-xs text-on-surface-variant">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm text-primary/60 group-hover:text-secondary transition-colors">school</span>
                        <p class="font-label-md">Al-Azhar University, Cairo</p>
                    </div>
                    <p class="font-body-md italic mt-md leading-relaxed">"Senior Islamic Scholar specializing in Tafseer, Hadith, and Islamic Psychology with 11+ years of teaching experience and a vision for accessible digital Islamic education."</p>
                </div>
            </div>
        </div>
        <!-- Founder 2 -->
        <div class="glass-card group p-lg flex flex-col md:flex-row gap-md items-start rounded-xl hover:shadow-lg transition-all duration-500 border border-transparent hover:border-secondary/20">
            <div class="w-full md:w-48 h-64 flex-shrink-0 bg-surface-container overflow-hidden rounded-lg">
                <img class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC7FM1FKLbfAGwfTrgX3OBhzYD789T-vdg_NiN4ibIRqwoHYai_0kPkbo48LPL2Cj9wfsr4chmhYA8IdPOUP1B5KBtnUPtkE5swnLbw4fh54fZRY01-dDvEOi7GVvaJYhqT3yDJPEAHYqC7errs_YvarfcVNoFnLR_0TVOIV5GhhZVjnNDyEBRk6P3Yq9pTgxnCSVdfK59PRLqxg7PC7jj6RCc9-tH2vYmN6Y5UK5EIIXyh9euj3AMTo1gtCGFXR8jlW6Siqln6qqE" alt="Dr. Salman Faris">
            </div>
            <div>
                <h2 class="font-headline-md text-headline-md text-primary group-hover:text-secondary transition-colors duration-500">Prof. Usama Siddiqui</h2>
                <span class="text-secondary font-bold tracking-[0.2em] uppercase text-[10px] block mb-1">Dean of Ejlals Islamic Horizon</span>
                <div class="mt-sm space-y-xs text-on-surface-variant">
                    <div class="flex items-center gap-xs">
                        <span class="material-symbols-outlined text-sm text-primary/60 group-hover:text-secondary transition-colors">school</span>
                        <p class="font-label-md">Islamic University of Madinah</p>
                    </div>
                    <p class="font-body-md italic mt-md leading-relaxed">"WeQuran Translation & Tafseer specialist with expertise in youth Hifz training, Islamic character building, and multilingual Quran education."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Timeline Section -->
    <section class="bg-[#F4F9F9] border-y border-surface-container pt-[2rem] pb-[3rem]">
        <h3 class="font-headline-lg text-headline-lg text-center mb-xl text-on-background">Our Journey Since <span class="text-secondary">2016</span></h3>
        <div class="relative max-w-4xl mx-auto px-margin">
            <!-- Central Vertical Line -->
            <div class="absolute left-1/2 top-0 bottom-0 w-px bg-primary/20 -translate-x-1/2 hidden md:block"></div>
            
            <div class="space-y-12">
                <!-- Event 1: 2016 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 w-full md:w-1/2 md:text-right md:pr-12 order-2 md:order-1">
                        <p class="font-body-md font-bold text-primary text-left group-hover:text-secondary transition-colors duration-500 mb-1">The Visionary Start</p>
                        <p class="font-label-md text-on-surface-variant leading-relaxed text-left md:ml-auto max-w-md">What began as a social media page grew into a global mission. We were founded with a clear purpose making authentic Islamic knowledge accessible.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 order-1 md:order-2 my-4 md:my-0">
                        <div class="w-3 h-3 bg-white border-2 border-primary group-hover:border-secondary group-hover:bg-secondary rotate-45 transition-all duration-500 shadow-[0_0_10px_rgba(19,140,144,0.1)] group-hover:shadow-[0_0_15px_rgba(234,127,38,0.2)]"></div>
                    </div>
                    <div class="flex-1 w-full md:w-1/2 md:pl-12 order-3">
                        <span class="font-headline-md text-primary/40 group-hover:text-secondary transition-colors duration-500">2016</span>
                    </div>
                </div>

                <!-- Event 2: 2018 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 w-full md:w-1/2 md:text-right md:pr-12 order-3 md:order-1">
                        <span class="font-headline-md text-primary/40 group-hover:text-secondary transition-colors duration-500">2018</span>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 order-1 md:order-2 my-4 md:my-0">
                        <div class="w-3 h-3 bg-white border-2 border-primary group-hover:border-secondary group-hover:bg-secondary rotate-45 transition-all duration-500 shadow-[0_0_10px_rgba(19,140,144,0.1)] group-hover:shadow-[0_0_15px_rgba(234,127,38,0.2)]"></div>
                    </div>
                    <div class="flex-1 w-full md:w-1/2 md:pl-12 order-2">
                        <p class="font-body-md font-bold text-primary group-hover:text-secondary transition-colors duration-500 mb-1">Digital Innovation</p>
                        <p class="font-label-md text-on-surface-variant leading-relaxed max-w-md">We moved beyond content-sharing, offering organized Quran sessions online, bringing structured, guided learning directly to students worldwide.</p>
                    </div>
                </div>

                <!-- Event 3: 2021 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 w-full md:w-1/2 md:text-right md:pr-12 order-2 md:order-1">
                        <p class="font-body-md font-bold text-primary text-left group-hover:text-secondary transition-colors duration-500 mb-1">Global Expansion</p>
                        <p class="font-label-md text-on-surface-variant leading-relaxed text-left md:ml-auto max-w-md">Our reach expanded across borders as students from every continent joined our family through personalized 1-on-1 sessions.</p>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 order-1 md:order-2 my-4 md:my-0">
                        <div class="w-3 h-3 bg-white border-2 border-primary group-hover:border-secondary group-hover:bg-secondary rotate-45 transition-all duration-500 shadow-[0_0_10px_rgba(19,140,144,0.1)] group-hover:shadow-[0_0_15px_rgba(234,127,38,0.2)]"></div>
                    </div>
                    <div class="flex-1 w-full md:w-1/2 md:pl-12 order-3">
                        <span class="font-headline-md text-primary/40 group-hover:text-secondary transition-colors duration-500">2021</span>
                    </div>
                </div>

                <!-- Event 4: 2024 -->
                <div class="relative flex flex-col md:flex-row items-center group">
                    <div class="flex-1 w-full md:w-1/2 md:text-right md:pr-12 order-3 md:order-1">
                        <span class="font-headline-md text-primary/40 group-hover:text-secondary transition-colors duration-500">2024</span>
                    </div>
                    <div class="z-10 flex items-center justify-center w-8 h-8 order-1 md:order-2 my-4 md:my-0">
                        <div class="w-3 h-3 bg-white border-2 border-primary group-hover:border-secondary group-hover:bg-secondary rotate-45 transition-all duration-500 shadow-[0_0_10px_rgba(19,140,144,0.1)] group-hover:shadow-[0_0_15px_rgba(234,127,38,0.2)]"></div>
                    </div>
                    <div class="flex-1 w-full md:w-1/2 md:pl-12 order-2">
                        <p class="font-body-md font-bold text-primary group-hover:text-secondary transition-colors duration-500 mb-1">Academic Excellence</p>
                        <p class="font-label-md text-on-surface-variant leading-relaxed max-w-md">We launched a modern, student-centered platform delivering structured Quran and Islamic education to every Muslim who seeks it.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Identity: The Bridge -->
    <section class="py-xl bg-[#FCF9F2] relative overflow-hidden">
        <div class="absolute left-0 bottom-0 w-64 h-64 bg-secondary/5 rounded-full -ml-32 -mb-32 blur-3xl"></div>
        <div class="max-w-max-width mx-auto px-margin">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter">
                <div class="md:col-span-1 space-y-md">
                    <h2 class="font-headline-lg text-headline-lg text-on-background">A Modern Scholarly <span class="text-secondary">Legacy</span></h2>
                    <p class="text-body-md text-on-surface-variant">Founded by scholars and technologists, our mission is to make authentic knowledge accessible without compromising on academic rigor or spiritual depth.</p>
                </div>
                <div class="md:col-span-2 space-y-lg">
                    <div class="flex flex-col sm:flex-row gap-md items-start group">
                        <div class="w-16 h-16 flex-shrink-0 bg-primary/5 rounded-2xl flex items-center justify-center border border-primary/10 transition-all duration-300 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20">
                            <span class="material-symbols-outlined text-primary text-3xl group-hover:text-secondary transition-colors">verified_user</span>
                        </div>
                        <div class="space-y-xs pt-xs">
                            <h3 class="font-headline-md text-headline-md text-on-background group-hover:text-secondary transition-colors duration-300">Authentic Knowledge</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed max-w-2xl">Curriculum based on the Quran and Sahih Hadith, vetted by recognized global scholars and academic boards.</p>
                        </div>
                    </div>
                    
                    <div class="w-full h-px bg-outline-variant/30"></div>
                    
                    <div class="flex flex-col sm:flex-row gap-md items-start group">
                        <div class="w-16 h-16 flex-shrink-0 bg-primary/5 rounded-2xl flex items-center justify-center border border-primary/10 transition-all duration-300 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20">
                            <span class="material-symbols-outlined text-primary text-3xl group-hover:text-secondary transition-colors">public</span>
                        </div>
                        <div class="space-y-xs pt-xs">
                            <h3 class="font-headline-md text-headline-md text-on-background group-hover:text-secondary transition-colors duration-300">Global Community</h3>
                            <p class="text-on-surface-variant text-sm leading-relaxed max-w-2xl">A diverse student body from over 50+ countries, fostering a unified Ummah through collective learning.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Values -->
    <section class="py-xl bg-[#F4F9F9] border-y border-surface-container">
        <div class="max-w-max-width mx-auto px-margin">
            <div class="flex flex-col md:flex-row justify-between items-end border-b border-outline-variant/30 pb-md mb-xl">
                <h2 class="font-headline-lg text-headline-lg text-on-background">Core Tenets of Our <span class="text-secondary">Mission</span></h2>
                <p class="text-on-surface-variant font-label-md">Faith Without Borders</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Global Access -->
                <div class="group p-lg rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white border border-outline-variant/20 hover:border-secondary/20 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col items-start relative overflow-hidden">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 border border-primary/10 flex items-center justify-center mb-md transition-all duration-500 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20 group-hover:shadow-[0_4px_20px_rgba(234,127,38,0.15)]">
                        <span class="material-symbols-outlined text-primary group-hover:text-secondary text-2xl transition-colors duration-500" translate="no">explore</span>
                    </div>
                    <h4 class="font-bold text-lg text-on-background mb-xs transition-colors duration-500 group-hover:text-secondary">Global Access</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Connecting students to qualified scholars worldwide regardless of geographic location.</p>
                </div>

                <!-- Empower Learners -->
                <div class="group p-lg rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white border border-outline-variant/20 hover:border-secondary/20 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col items-start relative overflow-hidden">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 border border-primary/10 flex items-center justify-center mb-md transition-all duration-500 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20 group-hover:shadow-[0_4px_20px_rgba(234,127,38,0.15)]">
                        <span class="material-symbols-outlined text-primary group-hover:text-secondary text-2xl transition-colors duration-500" translate="no">menu_book</span>
                    </div>
                    <h4 class="font-bold text-lg text-on-background mb-xs transition-colors duration-500 group-hover:text-secondary">Empower Learners</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">A private, judgment-free environment designed for all ages, from toddlers to seniors.</p>
                </div>

                <!-- Promote Unity -->
                <div class="group p-lg rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white border border-outline-variant/20 hover:border-secondary/20 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col items-start relative overflow-hidden">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 border border-primary/10 flex items-center justify-center mb-md transition-all duration-500 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20 group-hover:shadow-[0_4px_20px_rgba(234,127,38,0.15)]">
                        <span class="material-symbols-outlined text-primary group-hover:text-secondary text-2xl transition-colors duration-500" translate="no">diversity_3</span>
                    </div>
                    <h4 class="font-bold text-lg text-on-background mb-xs transition-colors duration-500 group-hover:text-secondary">Promote Unity</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Quran and Sahih Hadith education that transcends sectarian divides and cultural barriers.</p>
                </div>

                <!-- Multi-language -->
                <div class="group p-lg rounded-2xl bg-white/60 backdrop-blur-sm hover:bg-white border border-outline-variant/20 hover:border-secondary/20 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col items-start relative overflow-hidden">
                    <div class="w-12 h-12 rounded-xl bg-primary/5 border border-primary/10 flex items-center justify-center mb-md transition-all duration-500 group-hover:-translate-y-1 group-hover:bg-secondary/10 group-hover:border-secondary/20 group-hover:shadow-[0_4px_20px_rgba(234,127,38,0.15)]">
                        <span class="material-symbols-outlined text-primary group-hover:text-secondary text-2xl transition-colors duration-500" translate="no">language</span>
                    </div>
                    <h4 class="font-bold text-lg text-on-background mb-xs transition-colors duration-500 group-hover:text-secondary">Multi-language</h4>
                    <p class="text-sm text-on-surface-variant leading-relaxed">Courses available in Urdu, Punjabi, Saraiki, and English for inclusive understanding.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- The Ejlals Advantage -->
    <section class="py-xl bg-surface relative overflow-hidden">
        <div class="absolute right-0 top-0 w-64 h-64 bg-primary/5 rounded-full -mr-32 -mt-32 blur-3xl"></div>
        <div class="max-w-max-width mx-auto px-margin">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-xl">
                <div class="lg:col-span-5">
                    <span class="text-secondary font-label-md tracking-widest uppercase mb-sm block">Our Distinction</span>
                    <h2 class="font-headline-lg text-headline-lg text-on-background mb-md">The Ejlals Advantage: Why <span class="text-secondary">Families Trust Us</span></h2>
                    <p class="text-body-md text-on-surface-variant mb-lg">
                        We go beyond mere instruction, offering a holistic ecosystem designed for the modern Muslim family's success in this life and the hereafter.
                    </p>
                    <img class="rounded-xl shadow-lg w-full aspect-video object-cover hidden lg:block grayscale-[30%] hover:grayscale-0 transition-all" 
                         src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIQPz1QBnSg2ivzx353kaAN8f4kW6RBhY3LhXxiVqi7Ssblok6DucCLDSPwtGyXYRN11O7lOv53GD5aKOpkpPcdv4cPnzmrTkFsMQONNpIxQAQGedjcBFFABdaipeCK4SfiHayq--umn73iPjeiC8C4FO9baqmiLmCktQLwxvEnpw0hyVy1oPU0-n3yJGkh73H4LhsJCsspoOZGOApisvrcks7Zw9KhJnWuOtjzcLCSApYVlaweg3pU9bQ8qXEhDwx3rs5uQV87Bo" alt="Advantage">
                </div>
                <div class="lg:col-span-7 space-y-sm">
                    <!-- Accordion Items -->
                    <details class="group bg-surface rounded-xl border border-outline-variant/30 overflow-hidden" open="">
                        <summary class="flex items-center justify-between p-md cursor-pointer select-none group/summary transition-colors">
                            <div class="flex items-center gap-md">
                                <span class="font-headline-md text-primary/30 group-hover/summary:text-secondary transition-colors">01</span>
                                <h4 class="font-bold text-primary group-hover/summary:text-secondary transition-colors">Accredited Authority</h4>
                            </div>
                            <span class="material-symbols-outlined expand-icon transition-transform text-primary group-hover/summary:text-secondary">expand_more</span>
                        </summary>
                        <div class="px-md pb-md ml-12">
                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                Our curriculum follows the high standards of Wifaq-ul-Madaris Pakistan, and designed those courses which are practically Result-Oriented, ensuring your education is recognized, authentic and saves your time as much as it can.
                            </p>
                        </div>
                    </details>
                    <details class="group bg-surface rounded-xl border border-outline-variant/30 overflow-hidden">
                        <summary class="flex items-center justify-between p-md cursor-pointer select-none group/summary transition-colors">
                            <div class="flex items-center gap-md">
                                <span class="font-headline-md text-primary/30 group-hover/summary:text-secondary transition-colors">02</span>
                                <h4 class="font-bold text-primary group-hover/summary:text-secondary transition-colors">Certified & Expert Faculty</h4>
                            </div>
                            <span class="material-symbols-outlined expand-icon transition-transform text-primary group-hover/summary:text-secondary">expand_more</span>
                        </summary>
                        <div class="px-md pb-md ml-12">
                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                Our team includes qualified scholars like Shoaib Tariq, Hafiz Abdul Manan, &amp; Muhammad Usama, who hold an M.A. in Arabic &amp; Islamiyat and a degree from a prestigious university in Saudi Arabia.
                            </p>
                        </div>
                    </details>
                    <details class="group bg-surface rounded-xl border border-outline-variant/30 overflow-hidden">
                        <summary class="flex items-center justify-between p-md cursor-pointer select-none group/summary transition-colors">
                            <div class="flex items-center gap-md">
                                <span class="font-headline-md text-primary/30 group-hover/summary:text-secondary transition-colors">03</span>
                                <h4 class="font-bold text-primary group-hover/summary:text-secondary transition-colors">Uncompromising Safety</h4>
                            </div>
                            <span class="material-symbols-outlined expand-icon transition-transform text-primary group-hover/summary:text-secondary">expand_more</span>
                        </summary>
                        <div class="px-md pb-md ml-12">
                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                We maintain a "Zero Tolerance" policy toward harassment. With monitored class links and active supervision, we provide the safest online environment for children and women.
                            </p>
                        </div>
                    </details>
                    <details class="group bg-surface rounded-xl border border-outline-variant/30 overflow-hidden">
                        <summary class="flex items-center justify-between p-md cursor-pointer select-none group/summary transition-colors">
                            <div class="flex items-center gap-md">
                                <span class="font-headline-md text-primary/30 group-hover/summary:text-secondary transition-colors">04</span>
                                <h4 class="font-bold text-primary group-hover/summary:text-secondary transition-colors">Modern Islamic Tools</h4>
                            </div>
                            <span class="material-symbols-outlined expand-icon transition-transform text-primary group-hover/summary:text-secondary">expand_more</span>
                        </summary>
                        <div class="px-md pb-md ml-12">
                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                We are leaders in Digital Deen. We provide practical tools like our Inheritance Calculator (Wirasat) and Situational Dua Finder to help you apply Islamic values to daily life.
                            </p>
                        </div>
                    </details>
                    <details class="group bg-surface rounded-xl border border-outline-variant/30 overflow-hidden">
                        <summary class="flex items-center justify-between p-md cursor-pointer select-none group/summary transition-colors">
                            <div class="flex items-center gap-md">
                                <span class="font-headline-md text-primary/30 group-hover/summary:text-secondary transition-colors">05</span>
                                <h4 class="font-bold text-primary group-hover/summary:text-secondary transition-colors">Flexible Learning</h4>
                            </div>
                            <span class="material-symbols-outlined expand-icon transition-transform text-primary group-hover/summary:text-secondary">expand_more</span>
                        </summary>
                        <div class="px-md pb-md ml-12">
                            <p class="text-sm text-on-surface-variant leading-relaxed">
                                Whether you prefer One-on-One sessions in your free time or Live Group Classes, we adapt to your busy schedule and individual learning pace.
                            </p>
                        </div>
                    </details>
                </div>
            </div>
        </div>
    </section>

    <!-- Faculty Highlight -->
    <section class="pt-[2px] pb-xl bg-surface border-y border-surface-container">
        <div class="max-w-max-width mx-auto px-margin text-center">
            <h2 class="font-headline-lg text-headline-lg text-on-background mb-xl">Guided by <span class="text-secondary">Wisdom</span></h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-lg">
                <div class="flex flex-col items-center group">
                    <img class="w-32 h-32 rounded-full object-cover mb-md grayscale group-hover:grayscale-0 transition-all duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAHBnLkgj3YjKDBjw6v6DKAfyFSGls_rVowtRn3IVzkVRx1MyCfl7oqTW1xYgEJ05ri0pUiw4u67f0T_MiV2drVsjqay5A3JE9-TyOLGvjXSUZAfzmXHJGgcWkCPzNYsEmJTj1r9N6Fc2HXUEwMFoLLSEd8gd9cewFHUkHv45eQgLTwpscG-7Lmc4NSq-DRHvbmUDwPh84JIkcyQUjgoYoh-cpI4d9SkG9JQRSVbu_ACW7PtD5XuMsDuOll9-AY5PXJtSF8atjtRZM" alt="Dr. Salman Faris">
                    <h4 class="font-bold text-primary transition-colors group-hover:text-secondary">Dr. Salman Faris</h4>
                    <p class="text-xs text-on-surface-variant">Dean of Shariah</p>
                </div>
                <div class="flex flex-col items-center group">
                    <img class="w-32 h-32 rounded-full object-cover mb-md grayscale group-hover:grayscale-0 transition-all duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAOL4Ei8jjhturwPtJdGG_PfYNrYY33aJB2Qq28AweNegr7h2CdIROhLvm0Kspbs5nInhkXHCKkB29LhFgzLAYJe9gdIBszBstt-2dy3-2oSc3qoxnt4qEgCjVlgC8bMFTUO8NAAaMW6ubk4xFJzheZt9TOIpI86xOpup5uy-AGJcT9M6a61cxDCbbGLVeXrGeMOpsmCDK0VHnWy8BtI5YzdDDJ3X90z7OOK0aJhF2hGJlalfb5c6yc-kWBbvpXjRLRBJxX8fIPgzE" alt="Ustaza Mariam B.">
                    <h4 class="font-bold text-primary transition-colors group-hover:text-secondary">Ustaza Mariam B.</h4>
                    <p class="text-xs text-on-surface-variant">Director of Quranics</p>
                </div>
                <div class="flex flex-col items-center group">
                    <img class="w-32 h-32 rounded-full object-cover mb-md grayscale group-hover:grayscale-0 transition-all duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCB4von-cvsRzse3JZ6sDuhYWMa5rb6DVGv9D7-KdKIbVC1hPG7Lg0s-16JHBWKler-fvemTaUGoQPP_veEB1jucq8AHKHpM1GhRUXExPngKEHU--xrS8wKOwR5RRmLMGi0wlZ0gA_lecBI0NnD_DmjrNEM7l4sxHXfKcFxXw1QFij1EdRWBpvfpIdItcrgot-XwyBJS3prODY4Vqd5gXw5XbWWMRMvR9Ui0_SCxSHdLJpJzjSS-X4z7v9qeEpTEo1XIpWgce4hdpU" alt="Shaykh Ahmed Raza">
                    <h4 class="font-bold text-primary transition-colors group-hover:text-secondary">Shaykh Ahmed Raza</h4>
                    <p class="text-xs text-on-surface-variant">Head of Hadith</p>
                </div>
                <div class="flex flex-col items-center group">
                    <img class="w-32 h-32 rounded-full object-cover mb-md grayscale group-hover:grayscale-0 transition-all duration-300" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDapN-1cIv9CIo9Cz5h4cjtqGKEX78qHTc1rVcr_AEDQxSTC5AXzhfiyBELrsnZuWsZ9kgoWA_MHrF4vbI2izL6RhrAWgh_xsQ8E8RmdRcLKYU6NbvnINsAUejkkzPMXAGmaPDtgO6NeczCL3FDgyqFvdQBKRhq509kXn4po88I2KpCddJuCuFlLp6JCBDS3eXGEbUkLYCI65Ilz8XtQxg8dUQQ1FGiNU2KnpsC8DQ8Sua_wsm4MVVWPpfDP3MtCbLOJa2SsELbF1U" alt="Dr. Zainab Tariq">
                    <h4 class="font-bold text-primary transition-colors group-hover:text-secondary">Dr. Zainab Tariq</h4>
                    <p class="text-xs text-on-surface-variant">Academic Advisor</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Digital Islamic Tools -->
    <section class="py-xl bg-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="islamic-pattern h-full w-full"></div>
        </div>
        <div class="max-w-max-width mx-auto px-margin relative z-10 grid grid-cols-1 md:grid-cols-2 gap-xl items-center">
            <div class="text-on-primary">
                <h2 class="font-headline-lg text-headline-lg mb-md">Technology Serving Deen</h2>
                <p class="opacity-90 mb-lg">We develop bespoke digital tools to help our students apply their knowledge in real-time. From automated inheritance calculations to daily spiritual trackers.</p>
                <div class="space-y-md">
                    <div class="flex items-center gap-md group/tool cursor-pointer">
                        <span class="material-symbols-outlined bg-white/10 p-sm rounded-full group-hover/tool:bg-secondary group-hover/tool:text-white transition-all duration-300">calculate</span>
                        <div>
                            <h5 class="font-bold group-hover/tool:text-secondary transition-colors duration-300">Wirasat Calculator</h5>
                            <p class="text-sm opacity-70">Accurate, scholar-verified inheritance distribution tool.</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-md group/tool cursor-pointer">
                        <span class="material-symbols-outlined bg-white/10 p-sm rounded-full group-hover/tool:bg-secondary group-hover/tool:text-white transition-all duration-300">search</span>
                        <div>
                            <h5 class="font-bold group-hover/tool:text-secondary transition-colors duration-300">Dua Finder</h5>
                            <p class="text-sm opacity-70">Categorized prophetic supplications for every life situation.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="glass-card p-sm rounded-xl rotate-3 shadow-2xl relative z-20">
                    <img class="rounded shadow-inner" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBIQPz1QBnSg2ivzx353kaAN8f4kW6RBhY3LhXxiVqi7Ssblok6DucCLDSPwtGyXYRN11O7lOv53GD5aKOpkpPcdv4cPnzmrTkFsMQONNpIxQAQGedjcBFFABdaipeCK4SfiHayq--umn73iPjeiC8C4FO9baqmiLmCktQLwxvEnpw0hyVy1oPU0-n3yJGkh73H4LhsJCsspoOZGOApisvrcks7Zw9KhJnWuOtjzcLCSApYVlaweg3pU9bQ8qXEhDwx3rs5uQV87Bo" alt="Tool Mockup">
                </div>
                <div class="absolute -bottom-4 -left-4 w-48 h-48 bg-secondary/30 blur-2xl rounded-full"></div>
            </div>
        </div>
    </section>

    <!-- Founder Message -->
    <section class="py-xl bg-[#FCF9F2] relative overflow-hidden">
        <div class="absolute inset-0 opacity-[0.03] islamic-pattern"></div>
        <div class="max-w-3xl mx-auto px-margin text-center relative z-10">
            <span class="material-symbols-outlined text-secondary text-5xl mb-md">format_quote</span>
            <p class="font-headline-md  text-[21px] font-[500] text-on-surface italic mb-lg">
                "With over 8 years of experience in providing online education, I realized that the future of our Ummah lies in making authentic knowledge safe, accessible, and easy to understand. Ejlals Islamic Horizon is my humble contribution to ensuring that no Muslim - regardless of their location, age, or language - is left behind in their spiritual journey."
            </p>
            <div class="flex flex-col items-center">
                <p class="font-bold text-primary">Founder & Rector, Ejlals Islamic Horizon</p>
                <p class="text-sm text-on-surface-variant">Prof. Abdul Manan</p>
            </div>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="py-xl px-margin bg-white relative overflow-hidden">
        <div class="absolute right-0 bottom-0 w-96 h-96 bg-primary/5 rounded-full -mr-48 -mb-48 blur-3xl"></div>
        <div class="max-w-max-width mx-auto bg-[#FCF9F2] rounded-3xl py-xl px-xl flex flex-col md:flex-row justify-between items-center gap-lg text-center md:text-left border border-secondary/10 shadow-sm relative z-10">
            <div>
                <h2 class="font-headline-md text-headline-md text-on-background mb-xs">Start Your <span class="text-secondary">Journey Today</span></h2>
                <p class="text-on-surface-variant">Join 1,000+ students on the path of authentic knowledge.</p>
            </div>
            <div class="flex flex-wrap justify-center md:justify-start gap-sm shrink-0">
                <button class="bg-secondary text-white px-lg py-sm rounded-full font-label-md flex items-center gap-xs hover:brightness-110 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-300">
                    <span class="material-symbols-outlined text-[18px]">chat</span> WhatsApp Us
                </button>
                <button class="bg-primary text-on-primary px-lg py-sm rounded-full font-label-md flex items-center gap-xs hover:bg-secondary transition-all duration-300 hover:shadow-lg hover:-translate-y-0.5">
                    Enroll Now <span class="material-symbols-outlined text-[18px]">bolt</span>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection
