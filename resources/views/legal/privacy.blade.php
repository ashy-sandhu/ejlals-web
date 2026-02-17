@extends('layouts.app')

@section('title', 'Privacy Policy - Ejlals Academy')

@section('content')
<section class="bg-gray-50 py-20 px-6">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white p-12 md:p-16 rounded-[3rem] border border-gray-100 shadow-sm">
            <h1 class="text-4xl font-bold text-slate-800 mb-10">Privacy Policy</h1>
            
            <div class="prose prose-slate max-w-none space-y-8 text-slate-600 leading-relaxed">
                <p>Welcome to Ejlals Academy. Your privacy is important to us. This policy outlines how we handle your data when you use our platform.</p>
                
                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">1. Data Collection</h3>
                    <p>We only collect information that is necessary for your learning experience, such as your email address when you subscribe or enroll in a course.</p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">2. Use of Information</h3>
                    <p>Your data is used to provide access to our educational content, send updates about new resources, and improve our services. We do not sell your personal information to third parties.</p>
                </div>

                <div>
                    <h3 class="text-xl font-bold text-slate-800 mb-4 uppercase tracking-widest text-sm">3. Security</h3>
                    <p>We implement industry-standard security measures to protect your personal information from unauthorized access.</p>
                </div>

                <div class="pt-10 border-t border-gray-100">
                    <p class="text-sm font-medium">Last updated: {{ date('M d, Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
