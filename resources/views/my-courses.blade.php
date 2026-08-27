@extends('layouts.dashboard')

@section('title', 'My Courses')

@section('content')
<!-- Header -->
<header class="flex justify-between items-center mb-6 md:mb-8">
    <div class="flex items-center gap-3">
        <!-- Mobile Burger Menu -->
        <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 text-gray-500 hover:text-ejlals-teal transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <!-- Branding Logo (Mobile Only) -->
        <img src="{{ asset('storage/ejlals-horizontal-v1.svg') }}" alt="Ejlals Academy" class="h-8 w-auto md:hidden">
        
        <!-- Desktop/Tablet Title -->
        <div class="hidden md:block">
            <h1 class="text-xl md:text-2xl font-bold text-[#191c1e]">My Enrolled Courses</h1>
            <p class="text-gray-400 text-[10px] md:text-xs font-medium mt-0.5">Access all your active and pending courses here.</p>
        </div>
    </div>
    <div class="flex items-center gap-3">
        <a href="{{ route('courses.index') }}" class="hidden sm:inline-flex items-center gap-2 px-5 py-2 rounded-xl bg-ejlals-teal text-white text-[10px] md:text-xs font-bold shadow-md hover:bg-teal-600 transition-all group">
            <span class="material-symbols-outlined text-sm">add_circle</span>
            Enroll
        </a>
        <button class="w-9 h-9 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-ejlals-teal transition-all shadow-sm">
            <span class="material-symbols-outlined text-lg">notifications</span>
        </button>
    </div>
</header>

<!-- Mobile Page Title Section -->
<div class="mb-6 md:hidden px-1">
    <h1 class="text-xl font-bold text-[#191c1e]">My Enrolled Courses</h1>
    <p class="text-gray-400 text-[10px] font-medium mt-1">Access all your active and pending courses here.</p>
</div>

@if($enrollments->isEmpty())
    <div class="bg-white rounded-[2rem] p-10 md:p-12 border border-gray-100 text-center max-w-2xl mx-auto mt-6">
        <div class="w-12 h-12 md:w-16 md:h-16 rounded-full bg-teal-50 flex items-center justify-center mx-auto mb-5 text-ejlals-teal">
            <span class="material-symbols-outlined text-2xl md:text-3xl">school</span>
        </div>
        <h3 class="text-base md:text-lg font-bold text-gray-900 mb-2">Your library is empty</h3>
        <p class="text-gray-400 text-[10px] md:text-xs mb-6 md:mb-8 max-w-sm mx-auto">You haven't enrolled in any courses yet. Explore our academy to start your journey.</p>
        <a href="{{ route('courses.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 bg-ejlals-teal text-white rounded-xl text-[10px] md:text-xs font-bold shadow-lg shadow-teal-900/20 hover:bg-teal-600 transition-all">
            Browse All Courses
            <span class="material-symbols-outlined text-sm">arrow_forward</span>
        </a>
    </div>
@else
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-6">
        @foreach($enrollments as $enrollment)
            <div class="bg-white rounded-[2rem] overflow-hidden border border-gray-100 shadow-sm hover:shadow-md transition-all duration-300 group flex flex-col">
                <!-- Course Image -->
                <div class="relative h-24 md:h-40 w-full overflow-hidden">
                    @if($enrollment->course->image)
                        <img src="{{ asset('storage/' . $enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    @else
                        <div class="w-full h-full bg-teal-50 flex items-center justify-center text-ejlals-teal">
                            <span class="material-symbols-outlined text-xl md:text-4xl opacity-20">library_books</span>
                        </div>
                    @endif
                    <div class="absolute top-2 left-2">
                        @php
                            $badgeColor = 'bg-black/50';
                            $badgeText = strtoupper(str_replace('_', ' ', $enrollment->status));
                            
                            if ($enrollment->isUnderReview()) { $badgeColor = 'bg-amber-500/90'; $badgeText = 'UNDER REVIEW'; }
                            elseif ($enrollment->isOnTrial()) { $badgeColor = 'bg-teal-500/90 animate-pulse'; $badgeText = 'TRIAL ACTIVE'; }
                            elseif ($enrollment->status === 'trial_expired') { $badgeColor = 'bg-orange-500/90'; $badgeText = 'TRIAL ENDED'; }
                            elseif ($enrollment->isActive()) { $badgeColor = 'bg-green-500/90'; $badgeText = 'ACTIVE'; }
                            elseif ($enrollment->isCompleted()) { $badgeColor = 'bg-emerald-600/90'; $badgeText = 'COMPLETED ✓'; }
                            elseif ($enrollment->isRejected()) { $badgeColor = 'bg-gray-500/90'; $badgeText = 'NOT CONTINUED'; }
                        @endphp
                        <span class="px-1.5 py-0.5 rounded-lg {{ $badgeColor }} backdrop-blur-md text-white text-[6px] md:text-[9px] font-bold tracking-widest">{{ $badgeText }}</span>
                    </div>
                </div>

                <!-- Course Details -->
                <div class="p-3 md:p-5 flex-1 flex flex-col">
                    <h4 class="text-[10px] md:text-sm font-bold text-[#191c1e] mb-2 md:mb-4 line-clamp-2 group-hover:text-ejlals-teal transition-colors min-h-[2rem] md:min-h-[2.5rem]">{{ $enrollment->course->title }}</h4>
                    
                    <div class="space-y-1 md:space-y-2 mb-3 md:mb-6">
                        <div class="flex items-center gap-1.5 md:gap-2 text-gray-500">
                            <span class="material-symbols-outlined text-[8px] md:text-xs">calendar_today</span>
                            <span class="text-[7px] md:text-[10px] font-bold uppercase tracking-wider">{{ $enrollment->timeSlot ? substr($enrollment->timeSlot->day, 0, 3) : 'N/A' }}</span>
                        </div>
                        <div class="flex items-center gap-1.5 md:gap-2 text-gray-500">
                            <span class="material-symbols-outlined text-[8px] md:text-xs">schedule</span>
                            <span class="text-[7px] md:text-[10px] font-bold uppercase tracking-wider">{{ $enrollment->timeSlot ? \Carbon\Carbon::parse($enrollment->timeSlot->time)->format('h:i A') : 'N/A' }}</span>
                        </div>
                        
                        @if($enrollment->isOnTrial())
                        <div class="flex items-center gap-1.5 md:gap-2 text-teal-600 mt-2">
                            <span class="material-symbols-outlined text-[8px] md:text-xs">hourglass_empty</span>
                            <span class="text-[7px] md:text-[10px] font-bold uppercase tracking-wider">{{ $enrollment->trialCountdownLabel() }}</span>
                        </div>
                        @elseif($enrollment->status === 'trial_expired')
                        <div class="flex items-center gap-1.5 md:gap-2 text-orange-600 mt-2">
                            <span class="material-symbols-outlined text-[8px] md:text-xs">pending_actions</span>
                            <span class="text-[7px] md:text-[10px] font-bold uppercase tracking-wider">Awaiting Admin Review</span>
                        </div>
                        @endif
                    </div>

                    <div class="mt-auto pt-2.5 md:pt-4 border-t border-gray-50">
                        @if($enrollment->isOnTrial() || $enrollment->isActive() || $enrollment->isCompleted())
                            <div class="flex justify-between items-center mb-1 md:mb-2">
                                <span class="text-[7px] md:text-[9px] font-black text-gray-300 uppercase tracking-widest">Progress</span>
                                <span class="text-[7px] md:text-[9px] font-black text-ejlals-teal uppercase tracking-widest">0%</span>
                            </div>
                            <div class="w-full h-0.5 md:h-1.5 bg-gray-100 rounded-full overflow-hidden mb-2.5 md:mb-4">
                                <div class="h-full bg-ejlals-teal rounded-full" style="width: 0%"></div>
                            </div>
                            <button class="w-full py-1.5 md:py-2 bg-gray-50 border border-gray-100 rounded-lg md:rounded-xl text-ejlals-teal font-bold text-[8px] md:text-[11px] hover:bg-ejlals-teal hover:text-white transition-all">
                                Enter Course
                            </button>
                        @elseif($enrollment->isUnderReview())
                            <div class="text-center py-2">
                                <span class="text-[8px] md:text-[11px] font-bold text-amber-600">Application Under Review</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
