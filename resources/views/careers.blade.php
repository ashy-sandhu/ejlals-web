@extends('layouts.app')

@section('title', 'Careers - Ejlals Academy')

@section('content')
<section class="bg-white py-20 px-6">
    <div class="max-w-4xl mx-auto text-center">
        <span class="text-brand-gold font-bold text-xs uppercase tracking-[0.3em] mb-4 block">Join Our Mission</span>
        <h1 class="text-5xl font-bold text-slate-800 mb-8 leading-tight">Grow With Us</h1>
        <p class="text-slate-500 text-lg leading-relaxed mb-16">
            We are always looking for passionate educators, designers, and developers who want to make a difference in Islamic education. Even if no positions are listed, feel free to reach out.
        </p>

        <div class="space-y-6 text-left">
            <div class="p-8 bg-gray-50 rounded-3xl border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">Content Creator (Voluntary)</h3>
                    <p class="text-slate-500 text-sm">Help us write engaging educational guides and articles.</p>
                </div>
                <a href="#" class="bg-white text-brand-teal border border-brand-teal/20 px-8 py-3 rounded-xl font-bold hover:bg-brand-teal hover:text-white transition-all">Apply Now</a>
            </div>
            
            <div class="p-8 bg-gray-50 rounded-3xl border border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-2">UI/UX Designer</h3>
                    <p class="text-slate-500 text-sm">Help us maintain and enhance the beautiful visual identity of Ejlals.</p>
                </div>
                <a href="#" class="bg-white text-brand-teal border border-brand-teal/20 px-8 py-3 rounded-xl font-bold hover:bg-brand-teal hover:text-white transition-all">Apply Now</a>
            </div>
        </div>
        
        <div class="mt-20 p-12 bg-brand-teal rounded-[3rem] text-white">
            <h3 class="text-2xl font-bold mb-4 text-white">Don't see a fit?</h3>
            <p class="opacity-80 mb-8">Send your CV and a brief introduction to careers@ejlals.com. We'd love to hear from you.</p>
            <a href="mailto:careers@ejlals.com" class="bg-white text-brand-teal px-10 py-4 rounded-2xl font-bold hover:bg-brand-gold hover:text-white transition-all">Get in touch</a>
        </div>
    </div>
</section>
@endsection
