<!DOCTYPE html>
<html class="light" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - EJLALS Learning Horizon</title>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
    <!-- Material Symbols -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet"/>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "ejlals-teal": "#008080",
                        "primary-container": "#008080",
                        "on-primary": "#ffffff",
                        "secondary": "#8d4f11",
                        "background": "#f7f9fb",
                        "on-background": "#191c1e",
                        "surface": "#ffffff",
                        "on-surface": "#191c1e",
                        "on-surface-variant": "#3e4949",
                        "inverse-surface": "#2d3133",
                        "outline-variant": "#bdc9c8",
                        "surface-container-lowest": "#ffffff",
                        "surface-container-low": "#f2f4f6",
                    },
                    "fontFamily": {
                        "jakarta": ["Plus Jakarta Sans", "sans-serif"],
                    }
                },
            },
        }
    </script>
    <style>
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .fill-icon {
            font-variation-settings: 'FILL' 1;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-thumb { background: #008080; border-radius: 10px; }
    </style>
</head>
<body class="bg-[#f7f9fb] text-[#191c1e] min-h-screen flex" x-data="{ mobileSidebarOpen: false }">

    <!-- Sidebar (Drawer on Mobile, Rail on Desktop) -->
    <aside 
        class="fixed inset-y-0 left-0 bg-[#2d3133] shadow-2xl flex flex-col justify-between py-5 z-[100] transition-all duration-300 transform -translate-x-full lg:translate-x-0"
        :class="mobileSidebarOpen ? 'translate-x-0 w-[200px]' : '-translate-x-full w-[70px] lg:w-[220px]'">
        
        <!-- Mobile Overlay -->
        <div x-show="mobileSidebarOpen" x-transition.opacity @click="mobileSidebarOpen = false" class="fixed inset-0 bg-black/60 z-[-1] lg:hidden"></div>
        
        <!-- Brand Section -->
        <div class="flex flex-col items-center lg:items-start lg:px-4">
            <div class="mb-6 px-4 flex items-center justify-between w-full">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Logo" class="h-10 w-auto" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">
                    <div class="w-8 h-8 bg-ejlals-teal rounded-lg flex items-center justify-center" :class="mobileSidebarOpen ? 'hidden' : 'lg:hidden'">
                        <span class="material-symbols-outlined text-white text-lg fill-icon">school</span>
                    </div>
                </a>
                <!-- Mobile Close Button -->
                <button @click="mobileSidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col gap-1.5 w-full">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-start gap-2.5 px-2.5 py-2.5 {{ request()->routeIs('dashboard') ? 'bg-ejlals-teal text-white shadow-lg shadow-teal-900/20' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-xl mx-2 transition-all duration-200 group">
                    <span class="material-symbols-outlined text-xl {{ request()->routeIs('dashboard') ? 'fill-icon' : '' }}">dashboard</span>
                    <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">Dashboard</span>
                </a>
                
                <a href="{{ route('my-courses') }}" class="flex items-center justify-start gap-2.5 px-2.5 py-2.5 {{ request()->routeIs('my-courses') ? 'bg-ejlals-teal text-white shadow-lg shadow-teal-900/20' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-xl mx-2 transition-all duration-200 group">
                    <span class="material-symbols-outlined text-xl {{ request()->routeIs('my-courses') ? 'fill-icon' : '' }}">menu_book</span>
                    <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">My Courses</span>
                </a>

                <a href="#" class="flex items-center justify-start gap-2.5 px-2.5 py-2.5 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl mx-2 transition-all duration-200 group">
                    <span class="material-symbols-outlined text-xl">trending_up</span>
                    <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">Progress</span>
                </a>

                <a href="#" class="flex items-center justify-start gap-2.5 px-2.5 py-2.5 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl mx-2 transition-all duration-200 group">
                    <span class="material-symbols-outlined text-xl">workspace_premium</span>
                    <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">Certificates</span>
                </a>
            </nav>
        </div>

        <!-- Footer Actions -->
        <div class="flex flex-col gap-1.5 w-full border-t border-white/5 pt-5">
            <a href="{{ route('profile.edit') }}" class="flex items-center justify-start gap-2.5 px-2.5 py-2.5 {{ request()->routeIs('profile.edit') ? 'text-white bg-white/10' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-xl mx-2 transition-all duration-200">
                <span class="material-symbols-outlined text-xl {{ request()->routeIs('profile.edit') ? 'fill-icon' : '' }}">person</span>
                <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">My Profile</span>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-start gap-2.5 px-2.5 py-2.5 text-gray-400 hover:text-rose-400 mx-2 transition-all duration-200">
                    <span class="material-symbols-outlined text-xl">logout</span>
                    <span class="font-medium text-xs transition-all" :class="mobileSidebarOpen ? 'block' : 'hidden lg:block'">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="flex-1 p-3 sm:p-6 md:p-8 lg:p-6 lg:ml-[220px] md:ml-[70px] overflow-x-hidden transition-all duration-300"
          :class="mobileSidebarOpen ? 'overflow-hidden h-screen' : ''">
        @yield('content')
    </main>

</body>
</html>
