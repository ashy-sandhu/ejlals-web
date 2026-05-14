<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex, nofollow">
        <title>@yield('title', config('app.name', 'Ejlals Academy'))</title>
        
        <!-- Primary Meta Tags -->
        <meta name="title" content="@yield('title', config('app.name', 'Ejlals Academy'))">
        <meta name="description" content="@yield('meta_description', 'Ejlals Academy: A premium educational platform focused on delivering clear, reliable, and easy-to-understand Islamic knowledge.')">

        <!-- Open Graph / Facebook -->
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="@yield('title', config('app.name', 'Ejlals Academy'))">
        <meta property="og:description" content="@yield('meta_description', 'Ejlals Academy: A premium educational platform focused on delivering clear, reliable, and easy-to-understand Islamic knowledge.')">
        <meta property="og:image" content="@yield('meta_image', asset('storage/ejlals-horizontal-v1.svg'))">

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="{{ url()->current() }}">
        <meta property="twitter:title" content="@yield('title', config('app.name', 'Ejlals Academy'))">
        <meta property="twitter:description" content="@yield('meta_description', 'Ejlals Academy: A premium educational platform focused on delivering clear, reliable, and easy-to-understand Islamic knowledge.')">
        <meta property="twitter:image" content="@yield('meta_image', asset('storage/ejlals-horizontal-v1.svg'))">

        <link rel="icon" type="image/svg+xml" href="{{ asset('storage/favicon.svg') }}">

        <!-- Google Material Symbols -->
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght@100..700,0..1&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
        <link href="https://fonts.googleapis.com/css2?family=Noto+Naskh+Arabic:wght@400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

        <!-- Professional SEO Structured Data -->
        {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::getOrganizationSchema()) !!}
        @yield('json_ld')
    </head>
    <body x-data="{ mobileMenuOpen: false, searchOpen: false }" class="bg-[#FDFDFC] text-[#1b1b18] antialiased" @keydown.escape="searchOpen = false">
        <!-- Search Overlay -->
        <div x-show="searchOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-[1000] bg-white/95 backdrop-blur-xl flex flex-col items-center justify-center p-6"
             x-cloak>
            
            <button @click="searchOpen = false" class="absolute top-8 right-8 p-3 text-slate-400 hover:text-brand-teal transition-colors">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>

            <div class="w-full max-w-3xl animate-in fade-in slide-in-from-bottom-4 duration-500">
                <div class="text-center mb-10">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-16 md:h-20 w-auto mx-auto mb-6 opacity-90">
                    <span class="text-brand-teal font-bold text-xs uppercase tracking-[0.4em] mb-3 block">Premium Islamic Education</span>
                    <h2 class="text-3xl md:text-4xl font-serif font-bold text-slate-800 tracking-tight leading-snug">
                        Discover Wisdom <br class="hidden md:block"> Across Our Academy
                    </h2>
                </div>

                <form action="{{ route('search') }}" method="GET" class="relative group">
                    <input type="text" 
                           name="search" 
                           placeholder="Search courses, scholars, or articles..." 
                           class="w-full bg-transparent border-b-2 border-slate-200 py-6 text-2xl font-medium focus:outline-none focus:border-brand-teal transition-all placeholder:text-slate-300"
                           x-ref="searchInput"
                           autocomplete="off">
                    
                    <button type="submit" class="absolute right-0 top-1/2 -translate-y-1/2 p-4 text-slate-400 group-focus-within:text-brand-teal transition-colors">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </form>

                <div class="mt-10 flex flex-wrap justify-center gap-3">
                    <span class="text-slate-400 text-sm font-medium mr-2 self-center">Quick Links:</span>
                    <a href="{{ route('search', ['search' => 'Quran']) }}" class="px-5 py-2 rounded-full bg-slate-50 border border-slate-200 text-slate-600 text-[11px] font-bold uppercase tracking-wider hover:border-brand-teal hover:text-brand-teal hover:bg-white transition-all">Quranic Studies</a>
                    <a href="{{ route('search', ['search' => 'Hilal']) }}" class="px-5 py-2 rounded-full bg-slate-50 border border-slate-200 text-slate-600 text-[11px] font-bold uppercase tracking-wider hover:border-brand-teal hover:text-brand-teal hover:bg-white transition-all">Hilal Al-Quran</a>
                    <a href="{{ route('scholars.index') }}" class="px-5 py-2 rounded-full bg-slate-50 border border-slate-200 text-slate-600 text-[11px] font-bold uppercase tracking-wider hover:border-brand-teal hover:text-brand-teal hover:bg-white transition-all">Our Scholars</a>
                </div>
            </div>
        </div>

        <!-- Standard Navbar -->
        <nav id="main-navbar" class="relative z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-2">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-12 md:h-14 w-auto min-h-[48px] object-contain">
                </a>

                <!-- Nav Links -->
                <div class="hidden md:flex items-center gap-6 lg:gap-8 text-sm font-medium">
                    <a href="/" class="group flex items-center gap-1.5 hover:text-brand-teal transition-colors {{ request()->is('/') ? 'text-brand-teal' : '' }}">
                        <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('/') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path></svg>
                        Home
                    </a>
                    <a href="{{ route('courses.index') }}" class="group flex items-center gap-1.5 hover:text-brand-teal transition-colors {{ request()->is('courses*') ? 'text-brand-teal' : '' }}">
                        <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('courses*') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                        Courses
                    </a>
                    <a href="{{ route('books.index') }}" class="group flex items-center gap-1.5 hover:text-brand-teal transition-colors {{ request()->is('books*') ? 'text-brand-teal' : '' }}">
                        <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('books*') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                        Library
                    </a>
                    <a href="{{ route('posts.index') }}" class="group flex items-center gap-1.5 hover:text-brand-teal transition-colors {{ request()->is('posts*') ? 'text-brand-teal' : '' }}">
                        <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('posts*') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                        Articles
                    </a>
                    <a href="{{ route('about') }}" class="group flex items-center gap-1.5 hover:text-brand-teal transition-colors {{ request()->is('about') ? 'text-brand-teal' : '' }}">
                        <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('about') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path></svg>
                        About Us
                    </a>

                    <!-- Tools Dropdown -->
                    <div x-data="{ toolsOpen: false }" @mouseenter="toolsOpen = true" @mouseleave="toolsOpen = false" class="relative group">
                        <button class="flex items-center gap-1 hover:text-brand-teal transition-colors {{ request()->is('tools*') ? 'text-brand-teal' : '' }}">
                            <div class="flex items-center gap-1.5">
                                <svg class="md:hidden w-[18px] h-[18px] {{ request()->is('tools*') ? 'text-brand-teal' : 'text-slate-400 group-hover:text-brand-teal' }} transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.315-2.315L14.25 6l1.176-.335a3.375 3.375 0 002.315-2.315L18 2.25l.259 1.035a3.375 3.375 0 002.315-2.315L21.75 6l-1.176.335a3.375 3.375 0 00-2.315 2.315zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"></path></svg>
                                Tools
                            </div>
                            <svg class="w-4 h-4 transition-transform duration-200" :class="toolsOpen ? 'rotate-180' : ''" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </button>
                        <div x-show="toolsOpen" 
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="opacity-0 scale-95"
                             x-transition:enter-end="opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="opacity-100 scale-100"
                             x-transition:leave-end="opacity-0 scale-95"
                             class="absolute left-0 mt-0 w-60 bg-white rounded-xl shadow-xl border border-gray-100 py-2 z-[100]"
                             x-cloak>
                            <a href="{{ route('tools.dua-finder') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-teal group">
                                <span class="flex items-center gap-2">
                                    <svg class="w-[18px] h-[18px] text-slate-400 group-hover:text-brand-teal transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075-7.425v4.5m1.5-3a1.575 1.575 0 013.15 0v5.625a7.125 7.125 0 01-12.7 3.958 1.575 1.575 0 01-.235-.295 1.5 1.5 0 01-.061-.153L3.375 15.6a1.575 1.575 0 012.35-2.025l1.125 1.125v-8.175a1.575 1.575 0 113.15 0v4.5m0-4.5v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0v4.5m0-4.5a1.575 1.575 0 013.15 0v4.5m-3.15 0a1.575 1.575 0 013.15 0v4.5m-3.15 0V15a1.575 1.575 0 013.15 0v.75m0-6.75a1.575 1.575 0 013.15 0v6.75"></path></svg>
                                    Situational Dua Finder
                                </span>
                            </a>
                            <a href="{{ route('tools.wirasat') }}" class="block px-4 py-2 text-sm text-slate-700 hover:bg-slate-50 hover:text-brand-teal group">
                                <span class="flex items-center gap-2">
                                    <svg class="w-[18px] h-[18px] text-slate-400 group-hover:text-brand-teal transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z"></path></svg>
                                    Wirasat Visualizer
                                </span>
                            </a>
                        </div>
                    </div>

                    <!-- Unified Search Button -->
                    <button @click="searchOpen = true; $nextTick(() => $refs.searchInput.focus())" class="ml-4 p-2 text-slate-400 hover:text-brand-teal hover:bg-slate-50 rounded-lg transition-all group" title="Search Everything">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <a href="https://store.ejlals.com" class="hidden md:block bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Visit Our Store
                    </a>
                    
                    @if (Route::has('login'))
                        <div class="hidden sm:flex items-center gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm font-medium hover:text-brand-teal flex items-center gap-2 group">
                                    <div class="w-8 h-8 rounded-lg bg-brand-gold/5 flex items-center justify-center text-brand-gold group-hover:bg-brand-gold group-hover:text-white transition-all">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                                    </div>
                                    <span class="hidden lg:block">My Horizon</span>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium hover:text-brand-teal">Login</a>
                            @endauth
                        </div>
                    @endif
                    
                    <button @click="searchOpen = true; $nextTick(() => $refs.searchInput.focus())" class="md:hidden p-2 text-slate-600 hover:text-brand-teal hover:bg-slate-50 rounded-lg transition-colors" aria-label="Open Search">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </button>

                    <button @click="mobileMenuOpen = true" class="md:hidden p-2 -mr-2 text-slate-600 hover:text-brand-teal hover:bg-slate-50 rounded-lg transition-colors" aria-label="Toggle Mobile Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </nav>

        <!-- Mobile Menu Drawer (Alpine.js) -->
        <div x-show="mobileMenuOpen" class="md:hidden" x-cloak>
                <!-- Backdrop -->
                <div x-show="mobileMenuOpen" 
                    x-transition:enter="transition-opacity ease-linear duration-300" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100" 
                    x-transition:leave="transition-opacity ease-linear duration-300" 
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0" 
                    @click="mobileMenuOpen = false"
                    class="fixed inset-0 z-[90] bg-slate-900/40 backdrop-blur-sm"></div>
                
                <!-- Drawer Container -->
                <div x-show="mobileMenuOpen" 
                    x-transition:enter="transition ease-out duration-300 transform" 
                    x-transition:enter-start="translate-x-full" 
                    x-transition:enter-end="translate-x-0" 
                    x-transition:leave="transition ease-in duration-300 transform" 
                    x-transition:leave-start="translate-x-0" 
                    x-transition:leave-end="translate-x-full" 
                    class="fixed top-0 right-0 bottom-0 w-[300px] z-[100] bg-white shadow-2xl flex flex-col border-l border-gray-100">
                    
                    <!-- Drawer Header -->
                    <div class="px-6 py-3 flex items-center justify-between border-b border-gray-200/50">
                        <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-12 w-auto object-contain">
                        <button @click="mobileMenuOpen = false" class="p-2 text-slate-500 hover:text-brand-teal hover:bg-white/50 rounded-full transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Navigation Links - Scrollable -->
                    <div class="flex-1 overflow-y-auto px-6 py-2">
                        <nav class="flex flex-col space-y-1.5">
                            <a @click="mobileMenuOpen = false; searchOpen = true; $nextTick(() => $refs.searchInput.focus())" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all text-slate-900 hover:bg-brand-teal/5 cursor-pointer">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                    Search
                                </div>
                                <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="/" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all {{ request()->is('/') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] {{ request()->is('/') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path></svg>
                                    Home
                                </div>
                                <svg class="w-4 h-4 {{ request()->is('/') ? 'text-brand-gold' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('courses.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all {{ request()->is('courses*') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] {{ request()->is('courses*') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                                    Courses
                                </div>
                                <svg class="w-4 h-4 {{ request()->is('courses*') ? 'text-brand-gold' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('books.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all {{ request()->is('books*') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] {{ request()->is('books*') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path></svg>
                                    Library
                                </div>
                                <svg class="w-4 h-4 {{ request()->is('books*') ? 'text-brand-gold' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('posts.index') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all {{ request()->is('posts*') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] {{ request()->is('posts*') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"></path></svg>
                                    Articles
                                </div>
                                <svg class="w-4 h-4 {{ request()->is('posts*') ? 'text-brand-gold' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('about') }}" class="flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all {{ request()->is('about') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                <div class="flex items-center gap-3">
                                    <svg class="w-[18px] h-[18px] {{ request()->is('about') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"></path></svg>
                                    About Us
                                </div>
                                <svg class="w-4 h-4 {{ request()->is('about') ? 'text-brand-gold' : 'text-slate-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            
                            <!-- Tools Accordion -->
                            <div x-data="{ mobileToolsOpen: {{ request()->is('tools*') ? 'true' : 'false' }} }" class="flex flex-col">
                                <button type="button" @click="mobileToolsOpen = !mobileToolsOpen" class="w-full flex items-center justify-between px-4 py-2.5 rounded-lg text-[15px] font-medium transition-all focus:outline-none {{ request()->is('tools*') ? 'bg-brand-gold/10 text-brand-gold' : 'text-slate-900 hover:bg-brand-teal/5' }}">
                                    <div class="flex items-center gap-3">
                                        <svg class="w-[18px] h-[18px] {{ request()->is('tools*') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.315-2.315L14.25 6l1.176-.335a3.375 3.375 0 002.315-2.315L18 2.25l.259 1.035a3.375 3.375 0 002.315 2.315L21.75 6l-1.176.335a3.375 3.375 0 00-2.315-2.315zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"></path></svg>
                                        Tools
                                    </div>
                                    <span class="transition-transform duration-300 flex items-center justify-center w-4 h-4" :class="mobileToolsOpen ? 'rotate-180 text-brand-gold' : 'text-slate-400'">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </span>
                                </button>
                                
                                <div x-show="mobileToolsOpen" 
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 -translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 -translate-y-2"
                                     class="mt-1.5 mx-4 bg-white rounded-lg shadow-sm border border-gray-100 p-1.5 space-y-0.5"
                                     x-cloak>
                                    <a href="{{ route('tools.dua-finder') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-[14px] font-medium transition-all {{ request()->routeIs('tools.dua-finder') ? 'text-brand-gold bg-brand-gold/10' : 'text-slate-900 hover:text-brand-teal hover:bg-brand-teal/5' }}">
                                        <svg class="w-[18px] h-[18px] {{ request()->routeIs('tools.dua-finder') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.05 4.575a1.575 1.575 0 10-3.15 0v3m3.15-3v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0l.075 5.925m3.075-7.425v4.5m1.5-3a1.575 1.575 0 013.15 0v5.625a7.125 7.125 0 01-12.7 3.958 1.575 1.575 0 01-.235-.295 1.5 1.5 0 01-.061-.153L3.375 15.6a1.575 1.575 0 012.35-2.025l1.125 1.125v-8.175a1.575 1.575 0 113.15 0v4.5m0-4.5v-1.5a1.575 1.575 0 013.15 0v1.5m-3.15 0v4.5m0-4.5a1.575 1.575 0 013.15 0v4.5m-3.15 0a1.575 1.575 0 013.15 0v4.5m-3.15 0V15a1.575 1.575 0 013.15 0v.75m0-6.75a1.575 1.575 0 013.15 0v6.75"></path></svg>
                                        Situational Dua Finder
                                    </a>
                                    <a href="{{ route('tools.wirasat') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-md text-[14px] font-medium transition-all {{ request()->routeIs('tools.wirasat') ? 'text-brand-gold bg-brand-gold/10' : 'text-slate-900 hover:text-brand-teal hover:bg-brand-teal/5' }}">
                                        <svg class="w-[18px] h-[18px] {{ request()->routeIs('tools.wirasat') ? 'text-brand-gold' : 'text-brand-teal' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0012 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 01-2.031.352 5.988 5.988 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0l2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 01-2.031.352 5.989 5.989 0 01-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971z"></path></svg>
                                        Wirasat Visualizer
                                    </a>
                                </div>
                            </div>
                        </nav>
                    </div>

                    <!-- Footer Actions -->
                    <div class="px-6 py-6 border-t border-gray-200/50 bg-white/30 backdrop-blur-md space-y-3">
                        <a href="https://store.ejlals.com" class="block w-full text-center bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-4 rounded-xl text-base font-bold transition-all shadow-md">
                            Visit Our Store
                        </a>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-brand-teal hover:bg-brand-teal/90 text-white px-5 py-4 rounded-xl text-base font-bold transition-all shadow-md">
                                    My Horizon
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block w-full text-center border-2 border-brand-teal text-brand-teal hover:bg-brand-teal/10 px-5 py-4 rounded-xl text-base font-bold transition-all bg-white/50">
                                    Login Account
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>

        <main>
            @yield('content')
        </main>


        <!-- Footer (Stitch Design) -->
        <footer class="bg-[#f0f9f9] dark:bg-[#0a1818] border-t border-brand-teal/5">
            <div class="max-w-7xl mx-auto p-6">
                @if(!request()->is('tools*'))
                <!-- Newsletter Section (Elevated) -->
                <div class="-mt-24 relative overflow-hidden bg-brand-teal rounded-3xl p-6 md:p-8 shadow-xl shadow-brand-teal/20 islamic-pattern z-10">
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="max-w-xl text-center md:text-left">
                            <h3 class="text-white text-xl md:text-2xl font-bold mb-2 leading-tight">Enlighten Your Journey With Ejlals Academy</h3>
                            <p class="text-white/80 text-sm md:text-base">Join our community receiving weekly insights on Islamic studies and spiritual growth.</p>
                        </div>
                        <div class="w-full max-w-md">
                            <form class="flex flex-col sm:flex-row gap-2">
                                <input class="flex-grow h-12 px-4 rounded-xl border-none bg-white/10 backdrop-blur-md text-white placeholder:text-white/60 focus:ring-2 focus:ring-brand-gold outline-none transition-all text-sm" placeholder="Your email address" type="email"/>
                                <button class="h-12 px-6 rounded-xl bg-brand-gold text-white font-bold hover:bg-white hover:text-slate-900 transition-all shadow-md whitespace-nowrap text-sm">
                                    Subscribe
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Decorative element -->
                    <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-brand-gold/10 rounded-full blur-3xl"></div>
                </div>
                @endif

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-6 pt-12">
                    <!-- Brand Section -->
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-2 mb-2">
                            <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-12 w-auto object-contain">
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm">
                            A premier digital sanctuary for Islamic learning, combining traditional wisdom with modern pedagogical excellence for the global Ummah.
                        </p>
                        <div class="flex gap-3 mt-2">
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="Facebook">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" fill-rule="evenodd"></path></svg>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="Instagram">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="WhatsApp">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.77-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.299.045-.677.063-1.092-.069-.252-.08-.575-.187-.988-.365-1.739-.751-2.874-2.502-2.961-2.617-.087-.116-.708-.94-.708-1.793s.448-1.273.607-1.446c.159-.173.346-.217.462-.217l.332.006c.106.005.249-.04.39.298.144.347.491 1.2.534 1.287.043.087.072.188.014.304-.058.116-.087.188-.173.289l-.26.304c-.087.086-.177.18-.076.354.101.174.449.741.964 1.201.662.591 1.221.774 1.394.86s.274.072.376-.043c.101-.116.433-.506.549-.68.116-.173.231-.145.39-.087s1.011.477 1.184.564.289.13.332.202c.045.072.045.418-.1.824zm-3.423-14.416c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm.029 18.88c-1.161 0-2.305-.292-3.318-.844l-3.677.964.984-3.595c-.607-1.052-.927-2.246-.926-3.468.001-3.825 3.113-6.937 6.937-6.937 3.825-.001 6.938 3.112 6.938 6.937 0 3.825-3.113 6.938-6.938 6.938z"></path></svg>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="Twitter">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"></path></svg>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="Tumblr">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M14.563 24c-5.093 0-7.031-3.756-7.031-6.411V9.747H5.116V6.648c3.63-1.313 4.512-4.596 4.71-6.469C9.84.051 9.941 0 9.999 0h3.517v6.114h4.801v3.633h-4.82v7.47c.016 1.001.375 2.371 2.207 2.371h.09c.631-.02 1.486-.205 1.936-.419l1.156 3.425c-.436.636-2.4 1.374-4.322 1.406h-.001z"></path></svg>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#" title="Pinterest">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.162-.105-.949-.199-2.403.041-3.439.219-.937 1.406-5.957 1.406-5.957s-.359-.72-.359-1.781c0-1.663.967-2.911 2.168-2.911 1.024 0 1.518.769 1.518 1.688 0 1.029-.653 2.567-.992 3.992-.285 1.193.6 2.165 1.775 2.165 2.128 0 3.768-2.245 3.768-5.487 0-2.861-2.063-4.869-5.008-4.869-3.41 0-5.409 2.562-5.409 5.199 0 1.033.394 2.143.889 2.741.099.12.112.225.085.345-.09.375-.293 1.199-.334 1.363-.053.225-.172.271-.401.165-1.495-.69-2.433-2.878-2.433-4.646 0-3.776 2.748-7.252 7.951-7.252 4.168 0 7.392 2.967 7.392 6.923 0 4.135-2.607 7.462-6.233 7.462-1.214 0-2.354-.629-2.758-1.379l-.749 2.848c-.269 1.045-1.004 2.352-1.498 3.146 1.123.345 2.306.535 3.55.535 6.607 0 11.985-5.365 11.985-11.987C23.97 5.39 18.592.026 11.985.026h.032z"></path></svg>
                            </a>
                        </div>
                    </div>

                    <!-- Academic Programs -->
                    <div>
                        <h4 class="text-slate-900 dark:text-slate-100 font-bold mb-6 text-base flex items-center gap-2">
                            <span class="w-4 h-px bg-brand-gold"></span>
                            Academic Programs
                        </h4>
                        <ul class="flex flex-col gap-3">
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('courses.index') }}">All Courses</a></li>
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('books.index') }}">Library</a></li>
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('posts.index') }}">Articles</a></li>
                        </ul>
                    </div>

                    <!-- Company -->
                    <div>
                        <h4 class="text-slate-900 dark:text-slate-100 font-bold mb-6 text-base flex items-center gap-2">
                            <span class="w-4 h-px bg-brand-gold"></span>
                            Company
                        </h4>
                        <ul class="flex flex-col gap-3">
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('about') }}">About Us</a></li>
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('contact') }}">Contact</a></li>
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('careers') }}">Careers</a></li>
                        </ul>
                    </div>

                    <!-- Legal -->
                    <div>
                        <h4 class="text-slate-900 dark:text-slate-100 font-bold mb-6 text-base flex items-center gap-2">
                            <span class="w-4 h-px bg-brand-gold"></span>
                            Legal
                        </h4>
                        <ul class="flex flex-col gap-3">
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('privacy') }}">Privacy Policy</a></li>
                            <li><a class="text-slate-600 dark:text-slate-400 hover:text-brand-gold hover:pl-1 text-sm font-medium transition-all" href="{{ route('terms') }}">Terms of Use</a></li>
                        </ul>
                    </div>
                </div>

                <div class="pt-6 border-t border-brand-teal/10 flex flex-col md:flex-row justify-between items-center gap-4">
                    <p class="text-slate-500 dark:text-slate-500 text-xs text-center md:text-left">
                        &copy; {{ date('Y') }} Ejlals Academy. Crafted with purpose and excellence.
                    </p>
                    <div class="flex items-center justify-center gap-6">
                        <a class="text-slate-500 hover:text-brand-teal text-[10px] font-semibold uppercase tracking-widest transition-colors" href="{{ route('privacy') }}">Privacy</a>
                        <a class="text-slate-500 hover:text-brand-teal text-[10px] font-semibold uppercase tracking-widest transition-colors" href="{{ route('terms') }}">Terms</a>
                    </div>
                </div>
            </div>
        </footer>

    </body>
</html>
