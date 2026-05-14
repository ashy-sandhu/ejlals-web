@extends('layouts.dashboard')

@section('title', 'Student Dashboard')

@section('content')
<!-- Top Bar -->
<header class="flex justify-between items-center mb-10">
    <div>
        <p class="text-gray-500 font-medium">Assalamu Alaikum,</p>
        <h1 class="text-3xl font-bold text-[#191c1e]">{{ $user->first_name ?: $user->name }}</h1>
        <p class="text-gray-500 text-sm mt-1">Keep learning, keep growing! 🌱</p>
    </div>
    <div class="flex items-center gap-6">
        <button class="relative w-12 h-12 rounded-2xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-ejlals-teal hover:border-ejlals-teal/20 transition-all shadow-sm">
            <span class="material-symbols-outlined">notifications</span>
            <span class="absolute top-3 right-3 w-2 h-2 bg-rose-500 rounded-full border-2 border-white"></span>
        </button>
        <div class="flex items-center gap-3 p-1.5 pr-4 rounded-2xl bg-white border border-gray-100 shadow-sm hover:shadow-md transition-all cursor-pointer group">
            <div class="w-10 h-10 rounded-xl bg-ejlals-teal/10 flex items-center justify-center text-ejlals-teal font-bold overflow-hidden">
                @if($user->profile_photo_url ?? false)
                    <img src="{{ $user->profile_photo_url }}" alt="Profile" class="w-full h-full object-cover">
                @else
                    {{ substr($user->first_name ?: $user->name, 0, 1) }}
                @endif
            </div>
            <div class="hidden md:block">
                <p class="text-xs font-bold text-gray-900 line-clamp-1">{{ $user->name }}</p>
                <p class="text-[10px] text-gray-400">Student</p>
            </div>
            <span class="material-symbols-outlined text-gray-300 text-sm group-hover:text-ejlals-teal transition-colors">expand_more</span>
        </div>
    </div>
</header>

<!-- Metrics Row -->
<section class="grid grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
    <!-- Card 1: Enrolled -->
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group">
        <div class="w-12 h-12 rounded-2xl bg-teal-50 flex items-center justify-center mb-4 group-hover:bg-teal-500 transition-colors duration-300">
            <span class="material-symbols-outlined text-ejlals-teal group-hover:text-white transition-colors duration-300">book</span>
        </div>
        <h3 class="text-4xl font-extrabold text-[#191c1e] mb-1">{{ $enrollments->count() }}</h3>
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Enrolled Courses</p>
    </div>

    <!-- Card 2: In Progress -->
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group">
        <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center mb-4 group-hover:bg-orange-500 transition-colors duration-300">
            <span class="material-symbols-outlined text-[#8d4f11] group-hover:text-white transition-colors duration-300 fill-icon">assignment</span>
        </div>
        <h3 class="text-4xl font-extrabold text-[#191c1e] mb-1">{{ $enrollments->where('status', 'approved')->count() }}</h3>
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Active Courses</p>
    </div>

    <!-- Card 3: Completed -->
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group">
        <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center mb-4 group-hover:bg-emerald-500 transition-colors duration-300">
            <span class="material-symbols-outlined text-emerald-600 group-hover:text-white transition-colors duration-300 fill-icon">check_circle</span>
        </div>
        <h3 class="text-4xl font-extrabold text-[#191c1e] mb-1">0</h3>
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Completed</p>
    </div>

    <!-- Card 4: Certificates -->
    <div class="bg-white p-6 rounded-[2rem] border border-gray-100 shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300 flex flex-col items-center text-center group">
        <div class="w-12 h-12 rounded-2xl bg-blue-50 flex items-center justify-center mb-4 group-hover:bg-blue-500 transition-colors duration-300">
            <span class="material-symbols-outlined text-blue-600 group-hover:text-white transition-colors duration-300">workspace_premium</span>
        </div>
        <h3 class="text-4xl font-extrabold text-[#191c1e] mb-1">0</h3>
        <p class="text-gray-400 text-xs font-bold uppercase tracking-wider">Certificates</p>
    </div>
</section>

<!-- Main Workspace -->
<div class="grid grid-cols-1 lg:grid-cols-12 gap-8">
    <!-- Left Column: Progress & Courses -->
    <div class="lg:col-span-8 flex flex-col gap-10">
        
        <!-- Progress Highlight Card -->
        <div class="bg-[#2d3133] rounded-[2.5rem] p-8 text-white relative overflow-hidden shadow-2xl">
            <!-- Decorative Glow -->
            <div class="absolute -right-20 -top-20 w-80 h-80 bg-ejlals-teal opacity-10 rounded-full blur-[100px]"></div>
            
            <div class="relative z-10 flex flex-col md:flex-row justify-between items-center gap-8">
                <div class="text-center md:text-left flex-1">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/10 text-xs font-bold mb-6">
                        <span class="w-2 h-2 bg-ejlals-teal rounded-full animate-pulse"></span>
                        Active Learning Journey
                    </div>
                    <h2 class="text-4xl font-bold mb-4 leading-tight">Your Progress <br/><span class="text-ejlals-teal">Is Looking Great!</span></h2>
                    <p class="text-gray-400 mb-8 max-w-sm">You are in the top 15% of students this week. Keep maintaining your streak to earn the "Consistent Learner" badge.</p>
                    <button class="px-8 py-3.5 bg-ejlals-teal hover:bg-teal-600 text-white rounded-2xl font-bold transition-all shadow-lg shadow-teal-900/40">
                        Continue Learning
                    </button>
                </div>
                
                <div class="relative w-48 h-48 flex-shrink-0">
                    <svg class="w-full h-full -rotate-90" viewBox="0 0 36 36">
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-white/5" stroke-width="3"></circle>
                        <circle cx="18" cy="18" r="16" fill="none" class="stroke-ejlals-teal" stroke-width="3" stroke-dasharray="68, 100" stroke-linecap="round"></circle>
                    </svg>
                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                        <span class="text-5xl font-black">68<span class="text-lg font-medium text-ejlals-teal">%</span></span>
                        <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mt-1">Average</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Current Courses -->
        <div>
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold text-[#191c1e] flex items-center gap-3">
                    Current Courses
                    <span class="px-3 py-1 rounded-full bg-ejlals-teal/5 text-ejlals-teal text-xs font-bold">{{ $enrollments->count() }}</span>
                </h2>
                <a href="#" class="text-sm font-bold text-ejlals-teal hover:underline decoration-2 underline-offset-4 transition-all">View All Courses</a>
            </div>

            @if($enrollments->isEmpty())
                <div class="bg-white rounded-[2rem] p-12 border-2 border-dashed border-gray-100 text-center">
                    <div class="w-20 h-20 rounded-full bg-gray-50 flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <span class="material-symbols-outlined text-4xl">history_edu</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">No courses enrolled yet</h3>
                    <p class="text-gray-400 mb-8 max-w-sm mx-auto">Explore our premium courses and start your journey towards spiritual growth today.</p>
                    <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-8 py-3 bg-ejlals-teal text-white rounded-2xl font-bold shadow-lg shadow-teal-900/20 hover:bg-teal-600 transition-all">
                        Browse Academy
                        <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </a>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($enrollments as $enrollment)
                        <div class="bg-white rounded-[2.5rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 group flex flex-col">
                            <div class="relative h-44 w-full overflow-hidden">
                                @if($enrollment->course->image)
                                    <img src="{{ asset('storage/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full bg-teal-50 flex items-center justify-center text-ejlals-teal">
                                        <span class="material-symbols-outlined text-5xl opacity-20">library_books</span>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4">
                                    <span class="px-3 py-1 rounded-lg bg-black/50 backdrop-blur-md text-white text-[10px] font-bold uppercase tracking-widest">{{ $enrollment->status }}</span>
                                </div>
                            </div>
                            <div class="p-6 flex-1 flex flex-col">
                                <h4 class="text-xl font-bold text-[#191c1e] mb-4 line-clamp-1 group-hover:text-ejlals-teal transition-colors">{{ $enrollment->course->title }}</h4>
                                
                                <div class="space-y-3 mb-6">
                                    <div class="flex items-center gap-3 text-gray-500">
                                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center group-hover:bg-teal-50 transition-colors">
                                            <span class="material-symbols-outlined text-sm">calendar_today</span>
                                        </div>
                                        <span class="text-xs font-bold uppercase tracking-wider">{{ $enrollment->timeSlot ? $enrollment->timeSlot->day_of_week : 'N/A' }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-gray-500">
                                        <div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center group-hover:bg-teal-50 transition-colors">
                                            <span class="material-symbols-outlined text-sm">schedule</span>
                                        </div>
                                        <span class="text-xs font-bold uppercase tracking-wider">{{ $enrollment->timeSlot ? \Carbon\Carbon::parse($enrollment->timeSlot->start_time)->format('h:i A') : 'N/A' }}</span>
                                    </div>
                                </div>

                                <div class="mt-auto">
                                    <div class="flex justify-between items-center mb-2">
                                        <span class="text-[10px] font-black text-gray-400 uppercase tracking-widest">Progress</span>
                                        <span class="text-[10px] font-black text-ejlals-teal uppercase tracking-widest">0%</span>
                                    </div>
                                    <div class="w-full h-2 bg-gray-100 rounded-full overflow-hidden">
                                        <div class="h-full bg-ejlals-teal rounded-full" style="width: 0%"></div>
                                    </div>
                                    <button class="w-full mt-6 py-4 border-2 border-teal-500/10 rounded-2xl text-ejlals-teal font-extrabold text-sm hover:bg-ejlals-teal hover:text-white hover:border-ejlals-teal transition-all duration-300">
                                        Continue Journey
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Right Column: Schedule & Achievements -->
    <div class="lg:col-span-4 flex flex-col gap-8">
        
        <!-- Calendar Widget -->
        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
            <div class="flex justify-between items-center mb-6">
                <h3 class="font-bold text-[#191c1e]">Calendar</h3>
                <div class="flex gap-2">
                    <button class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:text-ejlals-teal transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_left</span>
                    </button>
                    <button class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center text-gray-400 hover:text-ejlals-teal transition-all">
                        <span class="material-symbols-outlined text-sm">chevron_right</span>
                    </button>
                </div>
            </div>
            <div class="text-center">
                <h4 class="text-xl font-bold text-[#191c1e] mb-6">{{ now()->format('F Y') }}</h4>
                <div class="grid grid-cols-7 gap-2 mb-4">
                    @foreach(['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'] as $day)
                        <span class="text-[10px] font-black text-gray-300 uppercase tracking-widest">{{ $day }}</span>
                    @endforeach
                </div>
                <div class="grid grid-cols-7 gap-2">
                    @php $today = now()->day; @endphp
                    @for($i = 1; $i <= 31; $i++)
                        <span class="w-8 h-8 flex items-center justify-center text-xs font-bold rounded-lg transition-all {{ $i == $today ? 'bg-ejlals-teal text-white shadow-lg shadow-teal-900/30' : 'text-gray-400 hover:bg-teal-50 hover:text-ejlals-teal cursor-pointer' }}">
                            {{ $i }}
                        </span>
                    @endfor
                </div>
            </div>
        </div>

        <!-- Recent Achievements -->
        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm">
            <h3 class="text-xl font-bold text-[#191c1e] mb-6">Recent Achievements</h3>
            <div class="space-y-6">
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined fill-icon">stars</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900 leading-tight">First Course Enrolled</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Achieved Today</p>
                    </div>
                </div>
                <div class="flex items-center gap-4 group">
                    <div class="w-12 h-12 rounded-2xl bg-orange-50 flex items-center justify-center text-orange-600 group-hover:bg-orange-500 group-hover:text-white transition-all duration-300">
                        <span class="material-symbols-outlined fill-icon">bolt</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-900 leading-tight">Quick Learner</p>
                        <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mt-1">Unlocked Level 1</p>
                    </div>
                </div>
            </div>
            <button class="w-full mt-8 py-3 text-xs font-bold text-gray-400 hover:text-ejlals-teal transition-all">
                View All Badges
            </button>
        </div>

        <!-- Upcoming Schedule -->
        <div class="bg-white p-8 rounded-[2.5rem] border border-gray-100 shadow-sm border-b-8 border-b-ejlals-teal">
            <h3 class="text-xl font-bold text-[#191c1e] mb-6">Upcoming Class</h3>
            @if($enrollments->isNotEmpty() && $enrollments->first()->timeSlot)
                <div class="flex items-center gap-6 p-4 rounded-3xl bg-gray-50 border border-gray-100">
                    <div class="text-center flex-shrink-0">
                        <p class="text-[10px] font-black text-gray-400 uppercase tracking-widest mb-1">{{ now()->format('M') }}</p>
                        <p class="text-2xl font-black text-[#191c1e]">{{ now()->format('d') }}</p>
                    </div>
                    <div class="w-px h-10 bg-gray-200"></div>
                    <div class="min-w-0">
                        <p class="text-sm font-bold text-gray-900 leading-tight line-clamp-1">{{ $enrollments->first()->course->title }}</p>
                        <p class="text-[10px] text-gray-400 font-bold mt-1">{{ $enrollments->first()->timeSlot->day_of_week }} • {{ \Carbon\Carbon::parse($enrollments->first()->timeSlot->start_time)->format('h:i A') }}</p>
                    </div>
                </div>
                <button class="w-full mt-6 py-4 bg-ejlals-teal hover:bg-teal-600 text-white rounded-2xl font-bold text-sm shadow-lg shadow-teal-900/20 transition-all">
                    Join Virtual Classroom
                </button>
            @else
                <div class="text-center py-4">
                    <p class="text-sm text-gray-400">No classes scheduled today.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
