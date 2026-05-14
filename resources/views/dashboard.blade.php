@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('content')
<!-- Top Bar -->
<header class="flex justify-between items-center mb-6 md:mb-8">
    <div class="flex items-center gap-3">
        <!-- Mobile Burger Menu -->
        <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 text-gray-500 hover:text-ejlals-teal transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <!-- Branding Logo (Mobile Only) -->
        <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Academy" class="h-8 w-auto md:hidden">
        
        <!-- Desktop/Tablet Greeting -->
        <div class="hidden md:block">
            <p class="text-[10px] md:text-xs font-bold text-gray-400 uppercase tracking-widest leading-none">Assalamu Alaikum,</p>
            <h1 class="text-xl md:text-2xl font-bold text-[#191c1e] mt-1">{{ $user->first_name ?: $user->name }}</h1>
            <p class="text-gray-400 text-[10px] md:text-xs mt-0.5 font-medium">Keep learning, keep growing! 🌱</p>
        </div>
    </div>
    <div class="flex items-center gap-3 md:gap-4">
        <button class="w-9 h-9 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-ejlals-teal transition-all shadow-sm">
            <span class="material-symbols-outlined text-lg">notifications</span>
        </button>
        <div class="flex items-center gap-2 p-1 pr-2 md:pr-3 rounded-xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all cursor-pointer group">
            <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg bg-ejlals-teal/10 flex items-center justify-center text-ejlals-teal font-bold overflow-hidden text-[10px]">
                @if($user->profile_photo_url ?? false)
                    <img src="{{ $user->profile_photo_url }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    {{ substr($user->first_name ?: $user->name, 0, 1) }}
                @endif
            </div>
            <div class="hidden sm:block">
                <p class="text-[10px] font-bold text-gray-900 leading-none">{{ $user->first_name ?: $user->name }}</p>
            </div>
            <span class="material-symbols-outlined text-gray-300 text-xs group-hover:text-ejlals-teal transition-colors">expand_more</span>
        </div>
    </div>
</header>

<!-- Mobile Branded Greeting Section -->
<div class="mb-6 md:hidden px-1">
    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-widest leading-none">Assalamu Alaikum,</p>
    <h1 class="text-xl font-bold text-[#191c1e] mt-1.5">{{ $user->first_name ?: $user->name }}</h1>
    <p class="text-gray-400 text-[10px] mt-1 font-medium">Keep learning, keep growing! 🌱</p>
</div>

<!-- Metrics Row (Optimized Grid for Mobile) -->
<section class="grid grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4 mb-6 md:mb-8">
    <div class="bg-white p-2.5 md:p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-2 group">
        <div class="w-7 h-7 md:w-10 md:h-10 rounded-lg bg-teal-50 flex items-center justify-center text-ejlals-teal group-hover:bg-teal-500 group-hover:text-white transition-all flex-shrink-0">
            <span class="material-symbols-outlined text-sm md:text-xl">book</span>
        </div>
        <div class="flex items-baseline gap-1.5 min-w-0">
            <h3 class="text-sm md:text-xl font-bold text-[#191c1e] leading-none">{{ $enrollments->count() }}</h3>
            <p class="text-gray-400 text-[7px] md:text-[9px] font-bold uppercase tracking-wider truncate">Enrolled</p>
        </div>
    </div>

    <div class="bg-white p-2.5 md:p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-2 group">
        <div class="w-7 h-7 md:w-10 md:h-10 rounded-lg bg-orange-50 flex items-center justify-center text-[#8d4f11] group-hover:bg-orange-500 group-hover:text-white transition-all flex-shrink-0">
            <span class="material-symbols-outlined text-sm md:text-xl fill-icon">assignment</span>
        </div>
        <div class="flex items-baseline gap-1.5 min-w-0">
            <h3 class="text-sm md:text-xl font-bold text-[#191c1e] leading-none">{{ $enrollments->where('status', 'approved')->count() }}</h3>
            <p class="text-gray-400 text-[7px] md:text-[9px] font-bold uppercase tracking-wider truncate">Active</p>
        </div>
    </div>

    <div class="bg-white p-2.5 md:p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-2 group">
        <div class="w-7 h-7 md:w-10 md:h-10 rounded-lg bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-all flex-shrink-0">
            <span class="material-symbols-outlined text-sm md:text-xl fill-icon">check_circle</span>
        </div>
        <div class="flex items-baseline gap-1.5 min-w-0">
            <h3 class="text-sm md:text-xl font-bold text-[#191c1e] leading-none">0</h3>
            <p class="text-gray-400 text-[7px] md:text-[9px] font-bold uppercase tracking-wider truncate">Done</p>
        </div>
    </div>

    <div class="bg-white p-2.5 md:p-4 rounded-2xl border border-gray-100 shadow-sm flex items-center gap-2 group">
        <div class="w-7 h-7 md:w-10 md:h-10 rounded-lg bg-blue-50 flex items-center justify-center text-blue-600 group-hover:bg-blue-500 group-hover:text-white transition-all flex-shrink-0">
            <span class="material-symbols-outlined text-sm md:text-xl">workspace_premium</span>
        </div>
        <div class="flex items-baseline gap-1.5 min-w-0">
            <h3 class="text-sm md:text-xl font-bold text-[#191c1e] leading-none">0</h3>
            <p class="text-gray-400 text-[7px] md:text-[9px] font-bold uppercase tracking-wider truncate">Badges</p>
        </div>
    </div>
</section>

<!-- Main Workspace -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
    <!-- Left Column -->
    <div class="lg:col-span-8 flex flex-col gap-6">
        
        <!-- Mobile-Compact Progress Card -->
        <div class="bg-[#2d3133] rounded-[2rem] p-4 md:p-6 text-white relative overflow-hidden shadow-lg">
            <div class="relative z-10 flex flex-row justify-between items-center gap-4">
                <div class="flex-1 min-w-0">
                    <h2 class="text-base md:text-xl font-bold mb-0.5 md:mb-1.5 leading-tight">Your Progress <span class="text-ejlals-teal">Summary</span></h2>
                    <p class="text-gray-400 text-[8px] md:text-xs mb-3 md:mb-4 max-w-xs line-clamp-1 md:line-clamp-none">You've completed 12 lessons this week. Great pace!</p>
                    <button class="px-3 md:px-5 py-1.5 md:py-2 bg-ejlals-teal hover:bg-teal-600 text-white rounded-lg md:rounded-xl text-[8px] md:text-xs font-bold transition-all shadow-md">
                        Resume Learning
                    </button>
                </div>
                
                <div class="relative w-14 h-14 md:w-24 md:h-24 flex-shrink-0">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-white/5" stroke-width="3"></circle>
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-ejlals-teal" stroke-width="3" stroke-dasharray="68, 100" stroke-linecap="round"></circle>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-xs md:text-2xl font-black">68%</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Courses -->
        <div>
            <div class="flex justify-between items-center mb-3 md:mb-4 px-1">
                <h2 class="text-base md:text-lg font-bold text-[#191c1e]">Active Courses</h2>
                <a href="{{ route('my-courses') }}" class="text-[9px] md:text-[10px] font-bold text-ejlals-teal hover:underline uppercase tracking-widest">View All</a>
            </div>

            @if($enrollments->isEmpty())
                <div class="bg-white rounded-[2rem] p-6 md:p-8 border border-gray-100 text-center">
                    <p class="text-gray-400 text-[10px] md:text-xs mb-3">No courses enrolled yet.</p>
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-5 py-1.5 bg-ejlals-teal text-white rounded-xl text-[10px] font-bold shadow-md hover:bg-teal-600 transition-all">
                        Explore Courses
                    </a>
                </div>
            @else
                <div class="grid grid-cols-2 gap-3 md:gap-4">
                    @foreach($enrollments as $enrollment)
                        <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all group flex flex-col">
                            <div class="relative h-20 md:h-28 w-full overflow-hidden">
                                @if($enrollment->course->image)
                                    <img src="{{ asset('storage/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full bg-teal-50 flex items-center justify-center text-ejlals-teal">
                                        <span class="material-symbols-outlined text-lg md:text-2xl opacity-20">library_books</span>
                                    </div>
                                @endif
                                <div class="absolute top-2 left-2">
                                    <span class="px-1.5 py-0.5 rounded bg-black/50 backdrop-blur-md text-white text-[6px] md:text-[8px] font-bold uppercase tracking-widest">{{ $enrollment->status }}</span>
                                </div>
                            </div>
                            <div class="p-2.5 md:p-4 flex-1 flex flex-col">
                                <h4 class="text-[10px] md:text-sm font-bold text-[#191c1e] mb-1 md:mb-1.5 line-clamp-1 group-hover:text-ejlals-teal transition-colors">{{ $enrollment->course->title }}</h4>
                                
                                <div class="flex items-center gap-2 md:gap-3 text-gray-400 mb-2 md:mb-4">
                                    <div class="flex items-center gap-0.5 md:gap-1">
                                        <span class="material-symbols-outlined text-[8px] md:text-xs">calendar_today</span>
                                        <span class="text-[6px] md:text-[9px] font-bold">{{ $enrollment->timeSlot ? substr($enrollment->timeSlot->day_of_week, 0, 3) : 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center gap-0.5 md:gap-1">
                                        <span class="material-symbols-outlined text-[8px] md:text-xs">schedule</span>
                                        <span class="text-[6px] md:text-[9px] font-bold">{{ $enrollment->timeSlot ? \Carbon\Carbon::parse($enrollment->timeSlot->start_time)->format('h:i') : 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="mt-auto">
                                    <div class="w-full h-0.5 md:h-1 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-ejlals-teal rounded-full" style="width: 0%"></div>
                                    </div>
                                    <button class="w-full mt-2 md:mt-3 py-1 md:py-1.5 border border-teal-500/10 rounded-lg md:rounded-xl text-ejlals-teal font-bold text-[8px] md:text-[10px] hover:bg-ejlals-teal hover:text-white transition-all">
                                        Continue
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Right Column -->
    <div class="lg:col-span-4 flex flex-col gap-6">
        <div class="grid grid-cols-5 gap-3 lg:contents">
            <!-- Compact Calendar -->
            <div class="col-span-3 lg:col-span-full bg-white p-3 md:p-5 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col justify-center">
                <div class="flex justify-between items-center mb-2">
                    <h3 class="text-[8px] md:text-[10px] font-bold text-[#191c1e] uppercase tracking-widest">Calendar</h3>
                    <div class="flex gap-1">
                        <button class="w-4 h-4 md:w-6 md:h-6 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400"><span class="material-symbols-outlined text-[8px] md:text-xs">chevron_left</span></button>
                        <button class="w-4 h-4 md:w-6 md:h-6 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400"><span class="material-symbols-outlined text-[8px] md:text-xs">chevron_right</span></button>
                    </div>
                </div>
                <div class="text-center">
                    <h4 class="text-[9px] md:text-xs font-bold text-[#191c1e] mb-1.5 md:mb-3">{{ now()->format('F Y') }}</h4>
                    <div class="grid grid-cols-7 gap-0.5 mb-1 md:mb-1.5">
                        @foreach(['S', 'M', 'T', 'W', 'T', 'F', 'S'] as $day)
                            <span class="text-[6px] md:text-[8px] font-black text-gray-300">{{ $day }}</span>
                        @endforeach
                    </div>
                    <div class="grid grid-cols-7 gap-0.5">
                        @php $today = now()->day; @endphp
                        @for($i = 1; $i <= 31; $i++)
                            <span class="w-4 h-4 md:w-6 md:h-6 flex items-center justify-center text-[7px] md:text-[9px] font-bold rounded-lg transition-all {{ $i == $today ? 'bg-ejlals-teal text-white shadow-sm shadow-teal-900/20' : 'text-gray-400 hover:bg-teal-50 hover:text-ejlals-teal cursor-pointer' }}">
                                {{ $i }}
                            </span>
                        @endfor
                    </div>
                </div>
            </div>

            <!-- Recent Achievements -->
            <div class="col-span-2 lg:col-span-full bg-white p-3 md:p-5 rounded-[2rem] border border-gray-100 shadow-sm flex flex-col">
                <div class="flex justify-between items-center mb-3">
                    <h3 class="text-[8px] md:text-[10px] font-bold text-[#191c1e] uppercase tracking-widest">Badges</h3>
                    <span class="material-symbols-outlined text-xs text-ejlals-teal">workspace_premium</span>
                </div>
                <div class="flex flex-col gap-2.5 md:space-y-3">
                    <div class="flex items-center gap-2 group">
                        <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg md:rounded-xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-all flex-shrink-0">
                            <span class="material-symbols-outlined text-xs md:text-sm fill-icon">stars</span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[8px] md:text-[10px] font-bold text-gray-900 leading-tight truncate">First Enrolled</p>
                            <p class="text-[6px] md:text-[8px] text-gray-400 mt-0.5">Today</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 group">
                        <div class="w-7 h-7 md:w-8 md:h-8 rounded-lg md:rounded-xl bg-orange-50 flex items-center justify-center text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-all flex-shrink-0">
                            <span class="material-symbols-outlined text-xs md:text-sm fill-icon">bolt</span>
                        </div>
                        <div class="min-w-0">
                            <p class="text-[8px] md:text-[10px] font-bold text-gray-900 leading-tight truncate">Quick Learner</p>
                            <p class="text-[6px] md:text-[8px] text-gray-400 mt-0.5">Level 1</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Compact Schedule -->
        <div class="bg-white p-4 md:p-5 rounded-[2rem] border border-gray-100 shadow-sm border-b-4 border-b-ejlals-teal">
            <h3 class="text-[10px] font-bold text-[#191c1e] mb-3 uppercase tracking-widest">Next Class</h3>
            @if($enrollments->isNotEmpty() && $enrollments->first()->timeSlot)
                <div class="flex items-center gap-3 p-2.5 rounded-2xl bg-gray-50 border border-gray-100">
                    <div class="text-center flex-shrink-0">
                        <p class="text-[8px] font-black text-gray-400 uppercase tracking-widest leading-none">{{ now()->format('M') }}</p>
                        <p class="text-base font-black text-[#191c1e] leading-none mt-0.5">{{ now()->format('d') }}</p>
                    </div>
                    <div class="w-px h-5 bg-gray-200"></div>
                    <div class="min-w-0">
                        <p class="text-[10px] font-bold text-gray-900 leading-tight truncate">{{ $enrollments->first()->course->title }}</p>
                        <p class="text-[8px] text-gray-400 mt-0.5">{{ $enrollments->first()->timeSlot->day_of_week }} • {{ \Carbon\Carbon::parse($enrollments->first()->timeSlot->start_time)->format('h:i A') }}</p>
                    </div>
                </div>
                <button class="w-full mt-3.5 py-1.5 bg-ejlals-teal hover:bg-teal-600 text-white rounded-xl font-bold text-[9px] transition-all">
                    Join Now
                </button>
            @else
                <p class="text-[10px] text-gray-400 text-center py-1">No classes today.</p>
            @endif
        </div>
    </div>
</div>
@endsection
