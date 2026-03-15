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

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">
        <!-- Standard Navbar -->
        <nav x-data="{ mobileMenuOpen: false }" id="main-navbar" class="relative z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-2">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-12 md:h-14 w-auto min-h-[48px] object-contain">
                </a>

                <!-- Nav Links -->
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="/" class="hover:text-brand-teal transition-colors {{ request()->is('/') ? 'text-brand-teal' : '' }}">Home</a>
                    <a href="{{ route('courses.index') }}" class="hover:text-brand-teal transition-colors {{ request()->is('courses*') ? 'text-brand-teal' : '' }}">Courses</a>
                    <a href="{{ route('books.index') }}" class="hover:text-brand-teal transition-colors {{ request()->is('books*') ? 'text-brand-teal' : '' }}">Library</a>
                    <a href="{{ route('posts.index') }}" class="hover:text-brand-teal transition-colors {{ request()->is('posts*') ? 'text-brand-teal' : '' }}">Articles</a>
                    <a href="{{ route('about') }}" class="hover:text-brand-teal transition-colors {{ request()->is('about') ? 'text-brand-teal' : '' }}">About Us</a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <a href="https://store.ejlals.com" class="hidden md:block bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Visit Our Store
                    </a>
                    
                    @if (Route::has('login'))
                        <div class="hidden sm:flex items-center gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="text-sm font-medium hover:text-brand-teal flex items-center gap-2">
                                    <div class="w-8 h-8 rounded-lg bg-brand-teal/10 flex items-center justify-center text-brand-teal">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    </div>
                                    My Horizon
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium hover:text-brand-teal">Login</a>
                            @endauth
                        </div>
                    @endif
                    
                    <button @click="mobileMenuOpen = true" class="md:hidden p-2 -mr-2 text-slate-600 hover:text-brand-teal hover:bg-slate-50 rounded-lg transition-colors" aria-label="Toggle Mobile Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>

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
                    class="fixed top-0 right-0 bottom-0 w-[300px] z-[100] bg-white shadow-2xl flex flex-col"
                    style="background-color: white !important; opacity: 1 !important; visibility: visible !important;">
                    
                    <!-- Drawer Header -->
                    <div class="px-6 py-5 flex items-center justify-between border-b border-gray-100">
                        <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-8 w-auto object-contain">
                        <button @click="mobileMenuOpen = false" class="p-2 text-slate-400 hover:text-brand-teal hover:bg-slate-50 rounded-full transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                        </button>
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex-1 px-6 py-8">
                        <nav class="flex flex-col space-y-2">
                            <a href="/" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-lg font-bold transition-all {{ request()->is('/') ? 'bg-brand-teal/5 text-brand-teal border-l-4 border-brand-teal pl-3' : 'text-slate-700 hover:bg-slate-50' }}">
                                Home
                                <svg class="w-5 h-5 {{ request()->is('/') ? 'text-brand-teal' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('courses.index') }}" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-lg font-bold transition-all {{ request()->is('courses*') ? 'bg-brand-teal/5 text-brand-teal border-l-4 border-brand-teal pl-3' : 'text-slate-700 hover:bg-slate-50' }}">
                                Courses
                                <svg class="w-5 h-5 {{ request()->is('courses*') ? 'text-brand-teal' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('books.index') }}" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-lg font-bold transition-all {{ request()->is('books*') ? 'bg-brand-teal/5 text-brand-teal border-l-4 border-brand-teal pl-3' : 'text-slate-700 hover:bg-slate-50' }}">
                                Library
                                <svg class="w-5 h-5 {{ request()->is('books*') ? 'text-brand-teal' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('posts.index') }}" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-lg font-bold transition-all {{ request()->is('posts*') ? 'bg-brand-teal/5 text-brand-teal border-l-4 border-brand-teal pl-3' : 'text-slate-700 hover:bg-slate-50' }}">
                                Articles
                                <svg class="w-5 h-5 {{ request()->is('posts*') ? 'text-brand-teal' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                            <a href="{{ route('about') }}" class="flex items-center justify-between px-4 py-3.5 rounded-xl text-lg font-bold transition-all {{ request()->is('about') ? 'bg-brand-teal/5 text-brand-teal border-l-4 border-brand-teal pl-3' : 'text-slate-700 hover:bg-slate-50' }}">
                                About Us
                                <svg class="w-5 h-5 {{ request()->is('about') ? 'text-brand-teal' : 'text-slate-300' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                            </a>
                        </nav>
                    </div>

                    <!-- Footer Actions -->
                    <div class="px-6 py-6 border-t border-gray-100 bg-gray-50/50 space-y-3">
                        <a href="https://store.ejlals.com" class="block w-full text-center bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-4 rounded-xl text-base font-bold transition-all shadow-md">
                            Visit Our Store
                        </a>
                        
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ route('dashboard') }}" class="block w-full text-center bg-brand-teal hover:bg-brand-teal/90 text-white px-5 py-3.5 rounded-xl text-sm font-bold transition-all shadow-sm">
                                    My Horizon
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="block w-full text-center border-2 border-brand-teal text-brand-teal hover:bg-brand-teal hover:text-white px-5 py-3 rounded-xl text-sm font-bold transition-all">
                                    Login Account
                                </a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>


        <!-- Footer (Stitch Design) -->
        <footer class="bg-[#f0f9f9] dark:bg-[#0a1818] border-t border-brand-teal/5">
            <div class="max-w-7xl mx-auto px-6">
                <!-- Newsletter Section (Elevated) -->
                <div class="-mt-12 relative overflow-hidden bg-brand-teal rounded-3xl p-6 md:p-10 mb-12 shadow-xl shadow-brand-teal/20 islamic-pattern z-10">
                    <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-6">
                        <div class="max-w-xl text-center md:text-left">
                            <h3 class="text-white text-2xl md:text-3xl font-extrabold mb-2 leading-tight">Enlighten Your Journey With Ejlals Academy</h3>
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

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                    <!-- Brand Section -->
                    <div class="flex flex-col gap-4">
                        <div class="flex items-center gap-2 mb-2">
                            <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-10 w-auto object-contain">
                        </div>
                        <p class="text-slate-500 dark:text-slate-400 leading-relaxed text-sm">
                            A premier digital sanctuary for Islamic learning, combining traditional wisdom with modern pedagogical excellence for the global Ummah.
                        </p>
                        <div class="flex gap-3 mt-2">
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#">
                                <span class="material-symbols-outlined text-lg">language</span>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="#">
                                <span class="material-symbols-outlined text-lg">share</span>
                            </a>
                            <a class="w-8 h-8 rounded-full bg-brand-teal/5 flex items-center justify-center text-brand-teal hover:bg-brand-teal hover:text-white transition-all" href="mailto:hello@ejlals.com">
                                <span class="material-symbols-outlined text-lg">mail</span>
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
