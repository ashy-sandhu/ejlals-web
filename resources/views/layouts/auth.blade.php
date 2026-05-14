<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Authentication') - EJLALS Learning Horizon</title>
    
    <!-- Tailwind CSS v3 with plugins -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    
    <style>
        /* Subtle breathing animation for the globe/glow effect */
        @keyframes breathing {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.05); opacity: 1; }
        }
        
        @keyframes slowRotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .animate-breathing {
            animation: breathing 8s ease-in-out infinite;
        }

        .animate-slow-rotate {
            animation: slowRotate 120s linear infinite;
        }

        /* Custom scrollbar for better aesthetics */
        ::-webkit-scrollbar {
            width: 6px;
        }
        ::-webkit-scrollbar-thumb {
            background: #008080;
            border-radius: 10px;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
        }

        /* Colors Extension */
        @layer base {
            :root {
                --ejlals-dark: #06121a;
                --ejlals-teal: #008080;
                --ejlals-teal-hover: #006666;
                --ejlals-orange: #ff8c00;
            }
        }
    </style>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'ejlals-dark': '#06121a',
                        'ejlals-teal': '#008080',
                        'ejlals-teal-hover': '#006666',
                        'ejlals-orange': '#ff8c00'
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gray-50 overflow-x-hidden">
    <main class="auth-container flex flex-col md:flex-row w-full overflow-hidden">
        
        <!-- Left Hero Section (Persistent for both Login/Register) -->
        <section class="relative hidden md:flex md:w-1/2 lg:w-[45%] bg-ejlals-dark text-white p-8 lg:p-16 flex-col justify-between overflow-hidden">
            <!-- Background Elements -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-1/2 -right-32 transform -translate-y-1/2 w-[700px] h-[700px] opacity-60">
                    <!-- Rotating Circles & Stars -->
                    <div class="animate-slow-rotate w-full h-full relative">
                        <!-- Outer Circle -->
                        <div class="absolute inset-0 rounded-full border border-teal-500/20"></div>
                        <div class="absolute top-1/2 -left-1.5 w-3 h-3 rounded-full bg-teal-400 shadow-[0_0_15px_rgba(45,212,191,0.8)]"></div>
                        
                        <!-- Middle Circle -->
                        <div class="absolute inset-16 rounded-full border border-teal-500/15"></div>
                        <div class="absolute top-16 left-1/2 -ml-1 w-2 h-2 rounded-full bg-white shadow-[0_0_12px_rgba(255,255,255,0.8)]"></div>
                        
                        <!-- Inner Circle -->
                        <div class="absolute inset-32 rounded-full border border-teal-500/10"></div>
                        <div class="absolute bottom-32 right-1/2 -mr-1 w-1.5 h-1.5 rounded-full bg-teal-300 shadow-[0_0_10px_rgba(45,212,191,0.6)]"></div>
                    </div>

                    <!-- Ambient Glows -->
                    <div class="absolute top-1/4 left-1/4 w-80 h-80 bg-teal-500/20 blur-[120px] animate-breathing"></div>
                    <div class="absolute bottom-1/4 right-1/3 w-64 h-64 bg-orange-500/15 blur-[100px] animate-breathing" style="animation-delay: -4s"></div>
                </div>
            </div>

            <!-- Content Container -->
            <div class="relative z-10 flex flex-col h-full">
                <!-- Logo -->
                <div class="mb-12">
                    <a href="/" class="flex items-center gap-3">
                        <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-16 w-auto">
                    </a>
                </div>

                <!-- Headline -->
                <div class="max-w-md">
                    <h1 class="text-4xl lg:text-5xl font-bold leading-tight mb-4">
                        Your Horizon <br/>
                        <span class="text-teal-400">For Knowledge</span> <br/>
                        <span class="text-ejlals-orange">& Growth</span>
                    </h1>
                    <p class="text-gray-400 text-lg mb-12">
                        Access world-class courses, resources and tools designed to elevate your learning experience.
                    </p>
                </div>

                <!-- Features List -->
                <div class="space-y-8 flex-grow">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Expert-Led Courses</h3>
                            <p class="text-sm text-gray-400">Learn from industry experts</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Smart Learning</h3>
                            <p class="text-sm text-gray-400">Track progress and achieve goals</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-white/5 border border-white/10 flex items-center justify-center shrink-0">
                            <svg class="w-6 h-6 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                        <div>
                            <h3 class="font-semibold text-white">Anytime, Anywhere</h3>
                            <p class="text-sm text-gray-400">Access on any device, at any time</p>
                        </div>
                    </div>
                </div>

                <!-- Footer Text -->
                <div class="mt-8 text-xs text-gray-500">
                    © {{ date('Y') }} Ejlals Academy. All rights reserved.
                </div>
            </div>
        </section>

        <!-- Right Auth Section (Dynamic Content) -->
        <section class="flex-1 bg-white relative p-6 md:p-12 lg:p-24 flex flex-col items-center justify-center overflow-y-auto">
            <!-- Top Right Badge -->
            <div class="absolute top-6 right-6 hidden sm:flex items-center gap-2 px-3 py-1.5 rounded-full border border-gray-200 text-xs font-medium text-gray-600 bg-white/50 shadow-sm">
                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                Secure & Trusted Platform
            </div>

            <!-- Mobile Logo -->
            <div class="md:hidden self-start mb-8 flex items-center gap-3">
                <a href="/">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Logo" class="h-10 w-auto">
                </a>
            </div>

            <div class="w-full @yield('form-width', 'max-w-[420px]')">
                @yield('content')
            </div>
        </section>

    </main>
</body>
</html>
