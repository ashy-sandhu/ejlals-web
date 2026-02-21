@extends('layouts.app')

@section('title', $course->title . ' - Ejlals Academy')

@section('content')
<div class="bg-[#FDFDFC] pt-12 pb-24 px-6">
    <div class="max-w-7xl mx-auto">
        <!-- Breadcrumbs -->
        <nav class="flex mb-8 text-sm font-medium text-slate-400">
            <a href="{{ route('courses.index') }}" class="hover:text-brand-teal transition-colors">Courses</a>
            <span class="mx-2">/</span>
            <span class="text-slate-600 truncate">{{ $course->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Left: Course Content -->
            <div class="lg:col-span-2">
                <div class="relative aspect-video rounded-[2.5rem] overflow-hidden bg-gray-100 mb-10 shadow-sm border border-gray-100">
                    @if($course->image)
                        <img src="{{ Storage::url($course->image) }}" alt="{{ $course->title }}" class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full bg-gradient-to-br from-brand-teal/10 to-brand-gold/10 flex items-center justify-center">
                            <span class="text-brand-teal font-bold uppercase tracking-widest opacity-50">Course Illustration</span>
                        </div>
                    @endif
                    
                    <div class="absolute top-6 left-6">
                        <span class="bg-brand-teal text-white text-[10px] font-bold uppercase tracking-widest px-4 py-1.5 rounded-full shadow-lg">
                            {{ $course->category->name ?? 'Course' }}
                        </span>
                    </div>
                </div>

                <h1 class="text-4xl md:text-5xl font-extrabold text-slate-900 mb-6 leading-tight">
                    {{ $course->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-6 mb-10 text-sm text-slate-500 font-medium">
                    <div class="flex items-center gap-2">
                        <div class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-400">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </div>
                        <span>Instructor: <b class="text-slate-900">{{ $course->instructor_name ?? 'Expert Faculty' }}</b></span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        <span>Flexible Timing</span>
                    </div>
                </div>

                <div class="prose prose-slate prose-lg max-w-none mb-12">
                    <h3 class="text-2xl font-bold text-slate-800 mb-4">About the Course</h3>
                    {!! $course->description !!}
                </div>

                @if($course->tags->count() > 0)
                    <div class="flex flex-wrap gap-2 mb-12">
                        @foreach($course->tags as $tag)
                            <span class="bg-slate-50 text-slate-500 border border-slate-100 px-3 py-1 rounded-lg text-xs font-medium italic">#{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- Right: Enrollment Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-[2.5rem] p-8 border border-gray-100 shadow-xl sticky top-28">
                    <h4 class="text-xl font-bold text-slate-900 mb-6">Enroll in Course</h4>

                    @if(session('success'))
                        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-2xl text-sm font-medium mb-6 border border-emerald-100">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="bg-rose-50 text-rose-700 p-4 rounded-2xl text-sm font-medium mb-6 border border-rose-100">
                            {{ session('error') }}
                        </div>
                    @endif

                    @auth
                        <form action="{{ route('enroll.store') }}" method="POST" class="space-y-6">
                            @csrf
                            <input type="hidden" name="course_id" value="{{ $course->id }}">

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-3">Pick your Preferred Schedule</label>
                                @if($course->timeSlots->count() > 0)
                                    <div class="grid grid-cols-1 gap-3">
                                        @foreach($course->timeSlots as $slot)
                                            <label class="relative flex items-center p-4 rounded-2xl border-2 border-slate-50 cursor-pointer hover:bg-slate-50 transition-all peer-checked:border-brand-teal has-[:checked]:border-brand-teal has-[:checked]:bg-brand-teal/5">
                                                <input type="radio" name="time_slot_id" value="{{ $slot->id }}" class="w-4 h-4 text-brand-teal focus:ring-brand-teal" required>
                                                <div class="ml-4">
                                                    <p class="text-sm font-bold text-slate-900">{{ $slot->day }}</p>
                                                    <p class="text-xs text-slate-500">{{ date('h:i A', strtotime($slot->time)) }} ({{ $slot->capacity }} seats)</p>
                                                </div>
                                            </label>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="p-6 bg-slate-50 rounded-2xl text-center">
                                        <p class="text-slate-400 text-sm italic">New slots opening soon!</p>
                                    </div>
                                @endif
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-3">Additional Notes (Optional)</label>
                                <textarea name="message" rows="3" class="w-full rounded-2xl border-slate-100 focus:border-brand-teal focus:ring-brand-teal text-sm" placeholder="Any specific requirements..."></textarea>
                            </div>

                            <button type="submit" @if($course->timeSlots->count() == 0) disabled @endif class="w-full bg-brand-gold hover:bg-brand-gold/90 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-brand-gold/20 transition-all active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed">
                                Register for Course
                            </button>
                        </form>
                    @else
                        <div class="text-center py-6">
                            <p class="text-slate-500 text-sm mb-6 leading-relaxed">Please sign in to your account to enroll in scheduling options for this course.</p>
                            <a href="{{ route('login') }}" class="inline-block w-full bg-slate-900 text-white font-bold py-4 rounded-2xl hover:bg-slate-800 transition-all">
                                Login to Enroll
                            </a>
                        </div>
                    @endif

                    <div class="mt-8 pt-8 border-t border-slate-50 space-y-4">
                        <div class="flex items-center gap-3 text-sm text-slate-500 italic">
                            <svg class="w-5 h-5 text-brand-gold" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                            Secure Enrollment Process
                        </div>
                        <div class="flex items-center gap-3 text-sm text-slate-500 italic">
                            <svg class="w-5 h-5 text-brand-teal" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                            Instant Email Confirmation
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
