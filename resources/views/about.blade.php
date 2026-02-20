@extends('layouts.app')

@section('title', 'About Us - Ejlals Academy')

@section('content')
<section class="bg-white py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center mb-24">
            <div>
                <span class="text-brand-teal font-bold text-xs uppercase tracking-[0.3em] mb-4 block">Our Story</span>
                <h1 class="text-5xl font-bold text-slate-800 mb-8 leading-tight">Elevating Education Through <span class="text-brand-teal">Sincerity</span></h1>
                <p class="text-slate-500 text-lg leading-relaxed mb-6">
                    Ejlals Academy was founded on the principle of "Ejlal" (Honoring/Elevation). We believe that knowledge is a sacred trust, and the way it is delivered should reflect that beauty and integrity.
                </p>
                <p class="text-slate-500 text-lg leading-relaxed">
                    Our mission is to bridge the gap between traditional wisdom and modern learning needs, providing a serene digital environment for seekers of knowledge.
                </p>
            </div>
            <div class="relative">
                <div class="absolute -inset-4 bg-brand-teal/5 rounded-[3rem] blur-2xl"></div>
                <img src="{{ asset('storage/about-illustration-v1.jpg') }}" alt="Ejlals Story" class="relative rounded-[2.5rem] border border-gray-100 shadow-sm w-full h-full object-cover aspect-[4/3]">
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 text-center">
            <div class="p-10 bg-gray-50 rounded-[2.5rem] border border-gray-100">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-brand-teal mx-auto mb-8 shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-4">Our Mission</h3>
                <p class="text-slate-500 text-sm leading-relaxed">To provide clear, reliable, and spiritually-aligned educational resources accessible to everyone.</p>
            </div>
            <div class="p-10 bg-gray-50 rounded-[2.5rem] border border-gray-100">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-brand-gold mx-auto mb-8 shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-4">Our Vision</h3>
                <p class="text-slate-500 text-sm leading-relaxed">A global community of learners guided by clarity, wisdom, and a deep love for truth.</p>
            </div>
            <div class="p-10 bg-gray-50 rounded-[2.5rem] border border-gray-100">
                <div class="w-16 h-16 bg-white rounded-2xl flex items-center justify-center text-brand-teal mx-auto mb-8 shadow-sm">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-4">Our Community</h3>
                <p class="text-slate-500 text-sm leading-relaxed">Built by volunteers, designers, and educators dedicated to making knowledge accessible.</p>
            </div>
        </div>
    </div>
</section>
@endsection
