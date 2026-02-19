@extends('layouts.app')

@section('title', 'My Horizon - Student Dashboard')

@section('content')
<div class="bg-slate-50 min-h-screen pt-12 pb-24 px-6 font-sans">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-12">
            <div>
                <h1 class="text-4xl font-extrabold text-slate-900 mb-2">My Horizon</h1>
                <p class="text-slate-500 font-medium">Welcome back, <span class="text-brand-teal capitalize">{{ $user->name }}</span>. Ready to continue your journey?</p>
            </div>
            <div class="flex items-center gap-4 bg-white p-2 rounded-2xl border border-slate-100 shadow-sm">
                <div class="w-12 h-12 rounded-xl bg-brand-teal/10 flex items-center justify-center text-brand-teal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <div class="pr-4">
                    <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Active Courses</p>
                    <p class="text-xl font-extrabold text-slate-800">{{ $enrollments->count() }}</p>
                </div>
            </div>
        </div>

        @if($enrollments->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($enrollments as $enrollment)
                    <div class="bg-white rounded-[2.5rem] border border-slate-100 shadow-sm overflow-hidden flex flex-col group hover:shadow-xl transition-all duration-500">
                        <!-- Card Header (Course Image/Icon) -->
                        <div class="h-40 bg-slate-100 relative overflow-hidden">
                            @if($enrollment->course->image)
                                <img src="{{ Storage::url($enrollment->course->image) }}" alt="{{ $enrollment->course->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-brand-teal/20" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                                </div>
                            @endif
                            <div class="absolute top-6 left-6">
                                <span class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-widest shadow-sm @if($enrollment->status == 'active') bg-emerald-500 text-white @else bg-slate-900 text-white @endif">
                                    {{ $enrollment->status }}
                                </span>
                            </div>
                        </div>

                        <!-- Card Body -->
                        <div class="p-8 flex-1 flex flex-col">
                            <h3 class="text-xl font-bold text-slate-800 mb-4 line-clamp-1 h-8 group-hover:text-brand-teal transition-colors">
                                {{ $enrollment->course->title }}
                            </h3>
                            
                            <!-- Schedule Info -->
                            <div class="space-y-4 mb-8">
                                <div class="flex items-center gap-3 text-sm text-slate-500 font-medium">
                                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 00-2 2z"></path></svg>
                                    </div>
                                    <span>Class Day: <b class="text-slate-800">{{ $enrollment->timeSlot->day ?? 'TBD' }}</b></span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-500 font-medium">
                                    <div class="w-8 h-8 rounded-lg bg-slate-50 flex items-center justify-center text-slate-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <span>Start Time: <b class="text-slate-800">{{ $enrollment->timeSlot ? date('h:i A', strtotime($enrollment->timeSlot->time)) : 'TBD' }}</b></span>
                                </div>
                            </div>

                            <!-- CTA -->
                            <div class="mt-auto">
                                <a href="{{ route('courses.show', $enrollment->course->slug) }}" class="inline-flex w-full items-center justify-center gap-2 bg-slate-50 hover:bg-brand-teal hover:text-white text-slate-600 font-bold py-3 rounded-2xl transition-all duration-300 group/btn">
                                    Go to Course
                                    <svg class="w-4 h-4 group-hover/btn:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Empty State -->
            <div class="bg-white rounded-[3rem] p-16 text-center border border-slate-100 shadow-sm max-w-3xl mx-auto">
                <div class="w-24 h-24 bg-brand-teal/5 rounded-full flex items-center justify-center mx-auto mb-8">
                    <svg class="w-12 h-12 text-brand-teal/30" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-4">Your Horizon is Empty</h3>
                <p class="text-slate-500 mb-10 leading-relaxed max-w-md mx-auto">You haven't joined any courses yet. Explore our catalog to find knowledge that matters to you.</p>
                <a href="{{ route('courses.index') }}" class="bg-brand-gold text-white px-10 py-4 rounded-2xl font-extrabold shadow-lg shadow-brand-gold/20 hover:scale-[1.02] transition-all inline-block">
                    Browse Courses
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
