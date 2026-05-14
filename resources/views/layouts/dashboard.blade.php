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
<body class="bg-[#f7f9fb] text-[#191c1e] min-h-screen flex">

    <!-- Sidebar -->
    <aside class="fixed h-full w-[80px] lg:w-[260px] left-0 top-0 bg-[#2d3133] shadow-md flex flex-col justify-between py-8 z-40 transition-all duration-300">
        <!-- Brand Section -->
        <div class="flex flex-col items-center lg:items-start lg:px-6">
            <div class="mb-10">
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Logo" class="h-10 w-auto brightness-0 invert hidden lg:block">
                    <div class="lg:hidden w-10 h-10 bg-ejlals-teal rounded-lg flex items-center justify-center">
                        <span class="material-symbols-outlined text-white fill-icon">school</span>
                    </div>
                </a>
            </div>

            <!-- Navigation Links -->
            <nav class="flex flex-col gap-2 w-full">
                <a href="{{ route('dashboard') }}" class="flex items-center justify-center lg:justify-start gap-3 px-3 py-3 {{ request()->routeIs('dashboard') ? 'bg-ejlals-teal text-white shadow-lg shadow-teal-900/20' : 'text-gray-400 hover:text-white hover:bg-white/5' }} rounded-xl mx-3 transition-all duration-200 group">
                    <span class="material-symbols-outlined {{ request()->routeIs('dashboard') ? 'fill-icon' : '' }}">dashboard</span>
                    <span class="hidden lg:block font-semibold text-sm">Dashboard</span>
                </a>
                
                <a href="#" class="flex items-center justify-center lg:justify-start gap-3 px-3 py-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl mx-3 transition-all duration-200 group">
                    <span class="material-symbols-outlined">menu_book</span>
                    <span class="hidden lg:block font-semibold text-sm">My Courses</span>
                </a>

                <a href="#" class="flex items-center justify-center lg:justify-start gap-3 px-3 py-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl mx-3 transition-all duration-200 group">
                    <span class="material-symbols-outlined">trending_up</span>
                    <span class="hidden lg:block font-semibold text-sm">Progress</span>
                </a>

                <a href="#" class="flex items-center justify-center lg:justify-start gap-3 px-3 py-3 text-gray-400 hover:text-white hover:bg-white/5 rounded-xl mx-3 transition-all duration-200 group">
                    <span class="material-symbols-outlined">workspace_premium</span>
                    <span class="hidden lg:block font-semibold text-sm">Certificates</span>
                </a>
            </nav>
        </div>

        <!-- Footer Actions -->
        <div class="flex flex-col gap-2 w-full border-t border-white/5 pt-6">
            <a href="{{ route('profile.edit') }}" class="flex items-center justify-center lg:justify-start gap-3 px-3 py-3 {{ request()->routeIs('profile.edit') ? 'text-white' : 'text-gray-400 hover:text-white' }} mx-3 transition-all duration-200">
                <span class="material-symbols-outlined {{ request()->routeIs('profile.edit') ? 'fill-icon' : '' }}">person_settings</span>
                <span class="hidden lg:block font-semibold text-sm">My Profile</span>
            </a>
            
            <form action="{{ route('logout') }}" method="POST" class="w-full">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center lg:justify-start gap-3 px-3 py-3 text-gray-400 hover:text-rose-400 mx-3 transition-all duration-200">
                    <span class="material-symbols-outlined">logout</span>
                    <span class="hidden lg:block font-semibold text-sm">Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content Area -->
    <main class="ml-[80px] lg:ml-[260px] flex-1 p-6 md:p-10 lg:p-12 overflow-x-hidden transition-all duration-300">
        @yield('content')
    </main>

</body>
</html>
