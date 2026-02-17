<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', config('app.name', 'Ejlals Academy'))</title>

        <!-- Fonts (Google Fonts: Outfit / Inter) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            body { font-family: 'Outfit', sans-serif; }
        </style>
    </head>
    <body class="bg-[#FDFDFC] text-[#1b1b18] antialiased">
        <!-- Sticky Navbar -->
        <nav class="sticky top-0 z-50 bg-white/80 backdrop-blur-md border-b border-gray-100 px-6 py-3">
            <div class="max-w-7xl mx-auto flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-brand-teal rounded flex items-center justify-center text-white font-bold">E</div>
                    <span class="font-bold text-xl tracking-tight">Ejlals Academy</span>
                </div>

                <!-- Nav Links -->
                <div class="hidden md:flex items-center gap-8 text-sm font-medium">
                    <a href="/" class="hover:text-brand-teal transition-colors">Home</a>
                    <a href="#" class="hover:text-brand-teal transition-colors">About Us</a>
                    <a href="#" class="hover:text-brand-teal transition-colors">Articles</a>
                    <a href="#" class="hover:text-brand-teal transition-colors">Guides</a>
                    <a href="#" class="hover:text-brand-teal transition-colors">Resources</a>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center gap-4">
                    <a href="https://store.ejlals.com" class="hidden sm:block bg-brand-gold hover:bg-brand-gold/90 text-white px-5 py-2 rounded-lg text-sm font-semibold transition-all shadow-sm">
                        Visit Our Store
                    </a>
                    
                    @if (Route::has('login'))
                        <div class="flex items-center gap-2">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="text-sm font-medium hover:text-brand-teal flex items-center gap-1">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium hover:text-brand-teal">Login</a>
                            @endauth
                        </div>
                    @endif
                    
                    <!-- Mobile Menu Icon -->
                    <button class="md:hidden">
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
                        <div class="w-8 h-8 bg-brand-teal rounded flex items-center justify-center text-white font-bold">E</div>
                        <span class="font-bold text-xl tracking-tight">Ejlals Academy</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        An educational platform focused on delivering clear, reliable, and easy-to-understand information.
                    </p>
                </div>
                
                <div>
                    <h4 class="font-bold text-sm mb-4 uppercase tracking-wider">Quick Links</h4>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="#" class="hover:text-brand-teal transition-colors">All Courses</a></li>
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Library</a></li>
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Blog</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-sm mb-4 uppercase tracking-wider">Company</h4>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="#" class="hover:text-brand-teal transition-colors">About Us</a></li>
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Contact</a></li>
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Careers</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-sm mb-4 uppercase tracking-wider">Legal</h4>
                    <ul class="text-gray-500 text-sm space-y-2">
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="hover:text-brand-teal transition-colors">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="max-w-7xl mx-auto pt-8 border-t border-gray-200 text-center text-gray-400 text-xs">
                &copy; {{ date('Y') }} Ejlals Learning Horizon. All rights reserved.
            </div>
        </footer>
    </body>
</html>
