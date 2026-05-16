@extends('layouts.app')

@section('title', $course->seo_title ?? $course->title . ' - Ejlals Academy')
@section('meta_description', $course->seo_description ?? 'Enroll in ' . $course->title . ' at Ejlals Academy. ' . Str::limit(strip_tags($course->description), 150))


@section('json_ld')
    {!! $course->renderJsonLd($course->generateSchema()) !!}
    {!! $course->renderJsonLd($course->generateBreadcrumbs([
        ['name' => 'Courses', 'url' => route('courses.index')],
        ['name' => $course->title, 'url' => route('courses.show', $course->slug)]
    ])) !!}
@endsection

@section('content')
<!-- BEGIN: HeroSection -->
<section class="bg-ejlals-dark text-white relative overflow-hidden" data-purpose="course-hero">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 lg:py-16 relative z-10">
        <!-- Breadcrumbs -->
        <nav aria-label="Breadcrumb" class="flex text-[10px] uppercase tracking-widest text-gray-400 mb-6">
            <ol class="flex items-center space-x-2">
                <li><a class="hover:text-white" href="{{ route('courses.index') }}">Courses</a></li>
                <li><svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"></path></svg></li>
                <li class="text-gray-300 truncate">{{ $course->title }}</li>
            </ol>
        </nav>
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            <!-- Hero Content -->
            <div class="space-y-5">
                <span class="inline-block bg-teal-800/50 text-teal-200 text-[10px] font-bold px-3 py-1 rounded-sm tracking-widest uppercase">{{ optional($course->category)->name ?? 'TAJWEED' }}</span>
                <h1 class="text-3xl lg:text-5xl font-bold leading-tight">{{ $course->title }}</h1>
                <p class="text-lg lg:text-xl font-arabic text-teal-400 opacity-90 leading-loose">
                    وَأَنْزَلْنَا إِلَيْكَ الذِّكْرَ لِتُبَيِّنَ لِلنَّاسِ مَا نُزِّلَ إِلَيْهِمْ
                </p>
                <p class="text-gray-300 max-w-xl text-sm leading-relaxed">
                    {{ $course->summary ?? 'Unlock the wisdom of the Quran through Tafseer and connect with its true meaning.' }}
                </p>
                <div class="flex flex-wrap items-center gap-6 pt-2">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-full bg-slate-100 flex items-center justify-center text-slate-400 overflow-hidden border border-gray-600">
                            @if($course->scholar && $course->scholar->image)
                                <img src="{{ Storage::url($course->scholar->image) }}" alt="{{ $course->scholar->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            @endif
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 leading-none mb-1">Instructor</p>
                            <p class="text-xs lg:text-sm font-semibold">{{ $course->scholar->name ?? 'Expert Faculty' }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <div class="p-2 bg-gray-800 rounded-full">
                            <svg class="w-4 h-4 text-teal-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-400 leading-none mb-1">Timing</p>
                            <p class="text-xs lg:text-sm font-semibold">Flexible Timing</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Video/Image Preview -->
            <div class="relative rounded-2xl overflow-hidden shadow-2xl group cursor-pointer border border-white/10 aspect-video max-w-xl mx-auto lg:ml-auto lg:mr-0 z-20">
                @if($course->image)
                    <img src="{{ Storage::url($course->image) }}" alt="{{ $course->image_alt ?? $course->title }}" class="w-full h-full object-cover">
                @else
                    <img alt="{{ $course->title }}" class="w-full h-full object-cover" src="{{ asset('images/ejlals_academy_who_we_are.png') }}"/>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Hero Background Watermark (Favicon) -->
    <div class="absolute top-0 right-0 w-[200px] h-[200px] bg-contain opacity-[0.05] pointer-events-none z-10" 
         style="background-image: url('{{ asset('storage/favicon.svg') }}'); background-repeat: no-repeat; background-position: center;">
    </div>
</section>
<!-- END: HeroSection -->

<!-- BEGIN: CourseStats -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-3 sm:p-5 lg:p-6 grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
        <!-- Duration -->
        <div class="flex flex-col items-center lg:items-start lg:flex-row gap-2 lg:gap-3">
            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-teal-50 rounded-lg flex items-center justify-center text-teal-600 shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <div class="text-center lg:text-left">
                <p class="text-sm lg:text-base font-bold text-slate-800 leading-tight">{{ $course->duration ?? '12' }} Weeks</p>
                <p class="text-[9px] lg:text-[10px] text-gray-500 font-medium uppercase tracking-wider">Duration</p>
            </div>
        </div>
        <!-- Level -->
        <div class="flex flex-col items-center lg:items-start lg:flex-row gap-2 lg:gap-3 border-l border-gray-50 lg:pl-6">
            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-teal-50 rounded-lg flex items-center justify-center text-teal-600 shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <div class="text-center lg:text-left">
                <p class="text-sm lg:text-base font-bold text-slate-800 leading-tight">{{ $course->level ?? 'Beg. to Adv.' }}</p>
                <p class="text-[9px] lg:text-[10px] text-gray-500 font-medium uppercase tracking-wider">Level</p>
            </div>
        </div>
        <!-- Enrolled -->
        <div class="flex flex-col items-center lg:items-start lg:flex-row gap-2 lg:gap-3 border-l border-gray-50 lg:pl-6 max-sm:border-t max-sm:pt-4 max-sm:mt-2 max-sm:border-l-0">
            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-teal-50 rounded-lg flex items-center justify-center text-teal-600 shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.35.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <div class="text-center lg:text-left">
                <p class="text-sm lg:text-base font-bold text-slate-800 leading-tight">{{ $course->enrolled_display ?? ($course->enrollments_count . '+') }} Students</p>
                <p class="text-[9px] lg:text-[10px] text-gray-500 font-medium uppercase tracking-wider">Enrolled</p>
            </div>
        </div>
        <!-- Language -->
        <div class="flex flex-col items-center lg:items-start lg:flex-row gap-2 lg:gap-3 border-l border-gray-50 lg:pl-6 max-sm:border-t max-sm:pt-4 max-sm:mt-2">
            <div class="w-8 h-8 lg:w-10 lg:h-10 bg-teal-50 rounded-lg flex items-center justify-center text-teal-600 shrink-0">
                <svg class="w-4 h-4 lg:w-5 lg:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <div class="text-center lg:text-left">
                <p class="text-sm lg:text-base font-bold text-slate-800 leading-tight">{{ $course->language ?? 'English' }}</p>
                <p class="text-[9px] lg:text-[10px] text-gray-500 font-medium uppercase tracking-wider">Language</p>
            </div>
        </div>
    </div>
</div>
<!-- END: CourseStats -->

<!-- BEGIN: ContentArea -->
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 lg:py-12">
    <div class="grid lg:grid-cols-3 gap-8 lg:gap-12">
        <!-- Main Content Tabs & About -->
        <div class="lg:col-span-2">
            <!-- Tab Navigation -->
            <div x-data="{ tab: 'about' }">
                <div class="flex space-x-6 border-b border-gray-100 mb-6 overflow-x-auto whitespace-nowrap">
                    <button @click="tab = 'about'" :class="tab === 'about' ? 'tab-active' : 'text-gray-400 hover:text-gray-600'" class="pb-3 px-1 text-sm font-bold transition-all">About</button>
                    <button @click="tab = 'curriculum'" :class="tab === 'curriculum' ? 'tab-active' : 'text-gray-400 hover:text-gray-600'" class="pb-3 px-1 text-sm font-medium transition-all">Curriculum</button>
                    <button @click="tab = 'instructor'" :class="tab === 'instructor' ? 'tab-active' : 'text-gray-400 hover:text-gray-600'" class="pb-3 px-1 text-sm font-medium transition-all">Instructor</button>
                    <button @click="tab = 'reviews'" :class="tab === 'reviews' ? 'tab-active' : 'text-gray-400 hover:text-gray-600'" class="pb-3 px-1 text-sm font-medium transition-all">Reviews</button>
                </div>

                <div x-show="tab === 'about'" class="space-y-5">
                    <h2 class="text-lg font-bold">About the Course</h2>
                    <div class="prose prose-slate prose-sm lg:prose-base max-w-none text-gray-600 leading-relaxed">
                        {!! $course->rendered_description !!}
                    </div>
                </div>

                <div x-show="tab === 'curriculum'" class="space-y-4" x-cloak>
                    @if($course->modules->count() > 0)
                        <div class="space-y-3">
                            @foreach($course->modules as $module)
                                <div x-data="{ open: {{ $loop->first ? 'true' : 'false' }} }" class="border border-gray-100 rounded-xl overflow-hidden bg-white shadow-sm">
                                    <button @click="open = !open" class="w-full flex items-center justify-between p-4 text-left hover:bg-gray-50 transition-all">
                                        <div class="flex items-center gap-4">
                                            <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center text-teal-600 font-bold text-xs">
                                                {{ $loop->iteration }}
                                            </div>
                                            <div>
                                                <h4 class="text-sm font-bold text-slate-800">{{ $module->title }}</h4>
                                                <p class="text-[10px] text-gray-500 uppercase tracking-widest font-semibold">{{ $module->lessons->count() }} Lessons</p>
                                            </div>
                                        </div>
                                        <span class="material-symbols-outlined text-gray-400 transition-transform" :class="open ? 'rotate-180' : ''">expand_more</span>
                                    </button>
                                    <div x-show="open" 
                                         x-transition:enter="transition ease-out duration-200"
                                         x-transition:enter-start="opacity-0 -translate-y-2"
                                         x-transition:enter-end="opacity-100 translate-y-0"
                                         class="border-t border-gray-50 bg-gray-50/30">
                                        <div class="p-2">
                                            @if($module->lessons->count() > 0)
                                                @foreach($module->lessons as $lesson)
                                                    <div class="flex items-center justify-between p-3 rounded-lg hover:bg-white transition-all group">
                                                        <div class="flex items-center gap-3">
                                                            <svg class="w-4 h-4 text-gray-300 group-hover:text-teal-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path><path d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                                                            <span class="text-xs font-medium text-gray-600 group-hover:text-slate-800 transition-all">{{ $lesson->title }}</span>
                                                        </div>
                                                        @if($lesson->duration)
                                                            <span class="text-[10px] text-gray-400 font-medium">{{ $lesson->duration }}</span>
                                                        @endif
                                                    </div>
                                                @endforeach
                                            @else
                                                <p class="text-[10px] text-gray-400 italic p-3">No lessons added yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="p-8 bg-gray-50 rounded-xl text-center">
                            <span class="material-symbols-outlined text-3xl text-gray-300 mb-3">menu_book</span>
                            <p class="text-sm text-gray-500 italic">Detailed curriculum coming soon!</p>
                        </div>
                    @endif
                </div>

                <div x-show="tab === 'instructor'" class="space-y-6" x-cloak>
                    @if($course->scholar)
                        <div class="bg-gray-50 rounded-2xl p-6 lg:p-8">
                            <div class="flex flex-col md:flex-row gap-6 md:items-center mb-8">
                                <div class="w-24 h-24 rounded-2xl bg-white shadow-sm flex items-center justify-center text-gray-300 overflow-hidden border border-gray-100 shrink-0">
                                    @if($course->scholar->image)
                                        <img src="{{ Storage::url($course->scholar->image) }}" alt="{{ $course->scholar->name }}" class="w-full h-full object-cover">
                                    @else
                                        <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                    @endif
                                </div>
                                <div class="space-y-1">
                                    <h3 class="text-xl font-bold text-slate-800">{{ $course->scholar->name }}</h3>
                                    <p class="text-teal-600 font-semibold text-sm">{{ $course->scholar->qualification ?? 'Qualified Scholar' }}</p>
                                    <p class="text-xs text-gray-500">Instructor at Ejlals Academy</p>
                                </div>
                            </div>
                            
                            <div class="prose prose-slate prose-sm max-w-none text-gray-600 leading-relaxed">
                                {!! $course->scholar->rendered_about ?? 'Biography coming soon.' !!}
                            </div>
                        </div>
                    @else
                        <div class="p-8 bg-gray-50 rounded-xl text-center">
                            <span class="material-symbols-outlined text-3xl text-gray-300 mb-3">person</span>
                            <p class="text-sm text-gray-500 italic">Instructor details coming soon!</p>
                        </div>
                    @endif
                </div>

                <div x-show="tab === 'reviews'" class="p-8 bg-gray-50 rounded-xl text-center" x-cloak>
                    <span class="material-symbols-outlined text-3xl text-gray-300 mb-3">star</span>
                    <p class="text-sm text-gray-500 italic">Be the first to review this course!</p>
                </div>
            </div>
        </div>

        <!-- Enrollment Sidebar -->
        <div class="lg:col-span-1">
            <div class="bg-white border border-gray-100 rounded-2xl p-6 shadow-sm sticky top-24" data-purpose="enrollment-card">
                <h3 class="text-lg font-bold mb-5">Enroll in Course</h3>
                
                @if(session('success'))
                    <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl text-xs font-medium mb-5 border border-emerald-100">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-rose-50 text-rose-700 p-4 rounded-xl text-xs font-medium mb-5 border border-rose-100">
                        {{ session('error') }}
                    </div>
                @endif

                @auth
                    <form action="{{ route('enroll.store') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="course_id" value="{{ $course->id }}">

                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 mb-3 uppercase tracking-widest">Select Schedule</label>
                            @if($course->timeSlots->count() > 0)
                                <div class="grid grid-cols-1 gap-3">
                                    @foreach($course->timeSlots as $slot)
                                        <label class="relative flex items-center p-3 rounded-xl border border-gray-100 cursor-pointer hover:bg-gray-50 transition-all has-[:checked]:border-teal-500 has-[:checked]:bg-teal-50/50 group">
                                            <input type="radio" name="time_slot_id" value="{{ $slot->id }}" class="w-4 h-4 text-teal-600 focus:ring-teal-500" required>
                                            <div class="ml-3">
                                                <p class="text-sm font-bold text-slate-800">{{ $slot->day }}</p>
                                                <p class="text-[11px] text-gray-500">{{ date('h:i A', strtotime($slot->time)) }}</p>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>
                            @else
                                <div class="w-full bg-gray-50 border border-gray-100 rounded-lg p-4 text-xs text-gray-400 italic text-center">
                                    New slots opening soon!
                                </div>
                            @endif
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-gray-400 mb-3 uppercase tracking-widest">Notes (Optional)</label>
                            <textarea name="message" class="w-full bg-gray-50 border-gray-100 rounded-lg text-sm p-3 focus:ring-teal-500 focus:border-teal-500 min-h-[80px]" placeholder="Requirements..."></textarea>
                        </div>

                        <button type="submit" @if($course->timeSlots->count() == 0) disabled @endif class="w-full bg-ejlals-orange text-white font-bold py-3.5 rounded-xl flex items-center justify-center gap-2 hover:bg-orange-600 transition shadow-lg shadow-orange-200 disabled:opacity-50 disabled:cursor-not-allowed">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" fill-rule="evenodd"></path></svg>
                            Enroll in Course
                        </button>
                    </form>
                @else
                    <div class="text-center py-2">
                        <p class="text-gray-500 text-[11px] mb-5 leading-relaxed">Please sign in to your account to enroll in scheduling options for this course.</p>
                        <a href="{{ route('login') }}" class="inline-block w-full bg-ejlals-dark text-white font-bold py-3.5 rounded-xl hover:bg-slate-800 transition-all shadow-md">
                            Login to Enroll
                        </a>
                    </div>
                @endif

                <div class="mt-5 space-y-2 pt-5 border-t border-gray-50">
                    <div class="flex items-center gap-2 text-[10px] text-gray-400 font-medium">
                        <svg class="w-3.5 h-3.5 text-ejlals-orange" fill="currentColor" viewBox="0 0 20 20"><path clip-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 4.908-3.067 9.126-7.403 10.796a.75.75 0 01-.594 0C5.667 16.126 2.6 11.908 2.6 7c0-.68.056-1.35.166-2.001zM10 4.25a.75.75 0 01.75.75v4.25h2.75a.75.75 0 010 1.5H10a.75.75 0 01-.75-.75V5a.75.75 0 01.75-.75z" fill-rule="evenodd"></path></svg>
                        Secure Enrollment Process
                    </div>
                    <div class="flex items-center gap-2 text-[10px] text-gray-400 font-medium">
                        <svg class="w-3.5 h-3.5 text-ejlals-orange" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"></path><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"></path></svg>
                        Instant Email Confirmation
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- END: ContentArea -->

<!-- BEGIN: ValueProps -->
<section class="bg-gray-50 border-t border-gray-100 py-10 lg:py-12 mb-16 ">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
            <!-- Feature 1 -->
            <div class="flex items-center gap-4 group">
                <div class="flex-shrink-0 w-11 h-11 bg-white rounded-xl shadow-sm flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Structured Learning</h4>
                    <p class="text-[10px] text-gray-500">Step-by-step curriculum</p>
                </div>
            </div>
            <!-- Feature 2 -->
            <div class="flex items-center gap-4 group">
                <div class="flex-shrink-0 w-11 h-11 bg-white rounded-xl shadow-sm flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Expert Instructor</h4>
                    <p class="text-[10px] text-gray-500">Qualified scholars</p>
                </div>
            </div>
            <!-- Feature 3 -->
            <div class="flex items-center gap-4 group">
                <div class="flex-shrink-0 w-11 h-11 bg-white rounded-xl shadow-sm flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Flexible Timing</h4>
                    <p class="text-[10px] text-gray-500">Learn at your pace</p>
                </div>
            </div>
            <!-- Feature 4 -->
            <div class="flex items-center gap-4 group">
                <div class="flex-shrink-0 w-11 h-11 bg-white rounded-xl shadow-sm flex items-center justify-center text-teal-600 group-hover:bg-teal-600 group-hover:text-white transition duration-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
                </div>
                <div>
                    <h4 class="text-xs font-bold text-slate-800">Lifetime Access</h4>
                    <p class="text-[10px] text-gray-500">Revisit anytime</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END: ValueProps -->

<style>
    .hero-gradient {
        background: linear-gradient(90deg, rgba(10,25,47,1) 0%, rgba(10,25,47,0.85) 50%, rgba(10,25,47,0.7) 100%);
    }
    .tab-active {
        color: #138C90;
        border-bottom: 2px solid #138C90;
    }
    [x-cloak] { display: none !important; }
</style>
@endsection
