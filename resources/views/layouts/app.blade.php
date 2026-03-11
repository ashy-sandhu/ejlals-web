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
    <body class="bg-[#FDFDFC] text-[#1b1b18] antialiased pt-20">
        <!-- Smart "Drawer" Navbar -->
        <nav id="main-navbar" class="fixed top-0 left-0 right-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-3 transition-transform duration-500 ease-in-out">
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
                    <a href="https://store.ejlals.com" class="hidden sm:block bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-colors shadow-sm">
                        Visit Our Store
                    </a>
                    
                    @if (Route::has('login'))
                        <div class="flex items-center gap-2">
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
                    
                    <button class="md:hidden" aria-label="Toggle Mobile Menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path></svg>
                    </button>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>


        <!-- Footer -->
        <footer class="bg-gray-50 border-t border-gray-100 pt-16 pb-8 px-6 mt-12">
            <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-4 gap-12 mb-12">
                <div class="col-span-1 md:col-span-1">
                    <div class="flex items-center gap-2 mb-4">
                        <img src="{{ asset('storage/home-page-logo.svg') }}" alt="Ejlals Logo" class="h-10 md:h-12 w-auto object-contain">
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        An educational platform focused on delivering clear, reliable, and easy-to-understand information.
                    </p>
                </div>
                
                <div>
                    <h3 class="font-bold text-sm mb-4 uppercase tracking-wider flex items-center gap-2 text-slate-800">
                        <svg class="w-4 h-4 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"></path></svg>
                        Quick Links
                    </h3>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="{{ route('courses.index') }}" class="hover:text-brand-teal transition-colors">All Courses</a></li>
                        <li><a href="{{ route('books.index') }}" class="hover:text-brand-teal transition-colors">Library</a></li>
                        <li><a href="{{ route('posts.index') }}" class="hover:text-brand-teal transition-colors">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-sm mb-4 uppercase tracking-wider flex items-center gap-2 text-slate-800">
                        <svg class="w-4 h-4 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                        Company
                    </h3>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="{{ route('about') }}" class="hover:text-brand-teal transition-colors">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-brand-teal transition-colors">Contact</a></li>
                        <li><a href="{{ route('careers') }}" class="hover:text-brand-teal transition-colors">Careers</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="font-bold text-sm mb-4 uppercase tracking-wider flex items-center gap-2 text-slate-800">
                        <svg class="w-4 h-4 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                        Legal
                    </h3>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="{{ route('privacy') }}" class="hover:text-brand-teal transition-colors">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}" class="hover:text-brand-teal transition-colors">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto pt-8 border-t border-gray-200 text-center text-gray-400 text-xs">
                &copy; {{ date('Y') }} Ejlals Learning Horizon. All rights reserved.
            </div>
        </footer>

        <script>
            let lastScrollTop = 0;
            const navbar = document.getElementById('main-navbar');
            
            window.addEventListener('scroll', () => {
                let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                
                if (scrollTop > lastScrollTop && scrollTop > 100) {
                    // Scrolling down - hide
                    navbar.style.transform = 'translateY(-100%)';
                } else {
                    // Scrolling up - show
                    navbar.style.transform = 'translateY(0)';
                }
                
                lastScrollTop = Math.max(0, scrollTop);
            });
        </script>
    </body>
</html>
