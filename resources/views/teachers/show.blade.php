@extends('layouts.app')

@section('title', $scholar->seo_title ?? $scholar->name . ' - Expert Scholar Profile')
@section('meta_description', $scholar->seo_description ?? 'Learn from ' . $scholar->name . ' at Ejlals Academy. ' . Str::limit(strip_tags($scholar->about_me), 150))


@section('json_ld')
    {!! $scholar->renderJsonLd($scholar->generateSchema()) !!}
    {!! $scholar->renderJsonLd($scholar->generateBreadcrumbs([
        ['name' => 'Scholars', 'url' => route('scholars.index')],
        ['name' => $scholar->name, 'url' => route('scholars.show', $scholar->slug)]
    ])) !!}
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen pt-4 pb-8 lg:pb-12 lg:pt-6">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Breadcrumb -->
        <nav class="flex mb-8 text-[10px] font-bold uppercase tracking-widest text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-brand-teal transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="{{ route('scholars.index') }}" class="hover:text-brand-teal transition-colors">Scholars</a>
            <span class="mx-2">/</span>
            <span class="text-slate-600">{{ $scholar->name }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 lg:gap-8">
            
            <!-- Left Column: Profile Card & Quick Info (4 Cols) - Sticky -->
            <div class="lg:col-span-4">
                <div class="lg:sticky lg:top-24 space-y-5">
                    <!-- Profile Card -->
                    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                        <div class="aspect-[4/5] bg-slate-50 relative group">
                            @if($scholar->image)
                                <img src="{{ asset('storage/' . $scholar->image) }}" alt="{{ $scholar->image_alt ?? $scholar->name }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center">
                                    <span class="material-symbols-outlined text-slate-200 text-5xl">person</span>
                                </div>
                            @endif
                            
                            @if($scholar->is_verified)
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-md px-3 py-1.5 rounded-xl shadow-sm border border-brand-teal/10 flex items-center gap-1.5">
                                <span class="material-symbols-outlined text-brand-teal text-[16px]" style="font-variation-settings: 'FILL' 1;">verified</span>
                                <span class="text-brand-teal font-bold text-[9px] uppercase tracking-widest">Verified</span>
                            </div>
                            @endif
                        </div>
                        
                        <div class="p-6 text-center">
                            <div class="flex items-center justify-center gap-0.5 text-brand-gold mb-2">
                                @for($i = 0; $i < 5; $i++)
                                    <span class="material-symbols-outlined text-[14px]" style="font-variation-settings: 'FILL' 1;">star</span>
                                @endfor
                                <span class="text-slate-400 text-[10px] font-bold ml-1">{{ $scholar->rating }}</span>
                            </div>
                            <h1 class="text-xl font-serif font-bold text-slate-900 mb-1">{{ $scholar->name }}</h1>
                            <p class="text-brand-teal font-bold text-[9px] uppercase tracking-widest mb-6">{{ $scholar->title }}</p>
                            
                            <div class="flex flex-col gap-3">
                                <a href="#" class="w-full py-3 bg-brand-teal text-white rounded-xl font-bold text-[10px] uppercase tracking-widest shadow-sm hover:brightness-110 transition-all flex items-center justify-center gap-2">
                                    Book Free Demo
                                    <span class="material-symbols-outlined text-sm">arrow_forward</span>
                                </a>
                                <div class="py-2.5 px-3 bg-slate-50 rounded-xl border border-slate-100/50">
                                    <span class="text-[8px] font-bold text-slate-400 uppercase tracking-widest block mb-0.5">Availability</span>
                                    <span class="text-[10px] font-bold text-slate-700">{{ $scholar->availability ?: '10:00 AM - 09:00 PM' }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Why Ejlals (More Compact) -->
                    <div class="bg-brand-teal rounded-2xl p-6 text-white relative overflow-hidden group">
                        <h3 class="text-lg font-serif font-bold mb-3 relative z-10">Why Ejlals?</h3>
                        <p class="text-white/80 text-[12px] leading-relaxed mb-6 relative z-10">
                            Hand-picked scholars for academic and spiritual integrity.
                        </p>
                        <div class="space-y-4 relative z-10">
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-base opacity-70">verified_user</span>
                                <span class="text-[9px] font-bold uppercase tracking-widest">Verified Faculty</span>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="material-symbols-outlined text-base opacity-70">schedule</span>
                                <span class="text-[9px] font-bold uppercase tracking-widest">Flexible Slots</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Details (8 Cols) -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Educational Info (Compact) -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                    <h2 class="text-lg font-serif font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <span class="w-1 h-4 bg-brand-teal rounded-full"></span>
                        Educational Information
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <div class="space-y-1">
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Experience</p>
                            <p class="text-sm font-bold text-slate-700">{{ $scholar->teaching_experience }}</p>
                        </div>
                        <div class="space-y-1">
                            <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest">Qualification</p>
                            <p class="text-sm font-bold text-slate-700">{{ $scholar->qualification }}</p>
                        </div>
                        <div class="md:col-span-2 space-y-4 pt-2">
                            <div>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-3">Subjects Taught</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($scholar->subjects_taught ?? [] as $subject)
                                        <span class="px-3 py-1 bg-brand-teal/5 text-brand-teal rounded-lg text-[10px] font-bold border border-brand-teal/10">{{ $subject }}</span>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <p class="text-[9px] font-bold text-slate-400 uppercase tracking-widest mb-3">Levels</p>
                                <div class="flex flex-wrap gap-2">
                                    @foreach($scholar->classes_can_teach ?? [] as $class)
                                        <span class="px-3 py-1 bg-brand-gold/5 text-brand-gold rounded-lg text-[10px] font-bold border border-brand-gold/10">{{ $class }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- About & Bio (Compact) -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                    <div class="space-y-8">
                        <div>
                            <h2 class="text-lg font-serif font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <span class="w-1 h-4 bg-brand-gold rounded-full"></span>
                                About Me
                            </h2>
                            <div class="prose prose-slate prose-sm max-w-none text-slate-600 leading-relaxed">
                                {!! $scholar->rendered_about !!}
                            </div>
                        </div>
                        
                        <hr class="border-slate-50">

                        <div>
                            <h2 class="text-lg font-serif font-bold text-slate-900 mb-4 flex items-center gap-2">
                                <span class="w-1 h-4 bg-brand-teal rounded-full"></span>
                                Experience Details
                            </h2>
                            <div class="prose prose-slate prose-sm max-w-none text-slate-600 leading-relaxed">
                                {!! $scholar->rendered_experience !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feedback (Compact) -->
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-slate-100">
                    <h2 class="text-base font-serif font-bold text-slate-900 mb-4">Student Feedback</h2>
                    <div class="py-10 text-center bg-slate-50/50 rounded-xl border border-slate-100 border-dashed">
                        <p class="text-slate-400 text-[11px] font-medium">No reviews yet for {{ $scholar->name }}.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
