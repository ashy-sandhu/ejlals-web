@extends('layouts.app')

@section('title', 'Terms of Use - Ejlals Academy')

@section('content')
<section class="bg-gray-50 py-20 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-12 md:p-16 rounded-[3rem] border border-gray-100 shadow-sm">
            <h1 class="text-4xl font-bold text-slate-800 mb-10">Terms of Use</h1>
            
            <div class="prose prose-slate max-w-none space-y-8 text-slate-600 leading-relaxed">
                <p>By accessing Ejlals Academy, you agree to comply with the following terms and conditions.</p>
                
                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">1. Intellectual Property</h3>
                    <p>All content provided on this platform, including courses, articles, and guides, remains the intellectual property of Ejlals Academy or its respective contributors.</p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">2. Use of Content</h3>
                    <p>Our resources are for personal educational use only. Unauthorized reproduction or commercial distribution of our material is strictly prohibited.</p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">3. Disclaimer</h3>
                    <p>The information on Ejlals Academy is for educational purposes. We strive for accuracy but cannot guarantee that all content is free from errors.</p>
                </div>

                <div class="pt-10 border-t border-gray-100">
                    <p class="text-sm font-medium">Last updated: {{ date('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
