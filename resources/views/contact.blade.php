@extends('layouts.app')

@section('title', 'Contact Us - Ejlals Academy')

@section('content')
<section class="bg-gray-50 py-20 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <span class="text-brand-teal font-bold text-xs uppercase tracking-[0.3em] mb-4 block">Get In Touch</span>
                <h1 class="text-4xl font-bold text-slate-800 mb-6">How Can We Help?</h1>
                <p class="text-slate-500 text-lg mb-10">
                    Have questions about our courses or want to contribute? Reach out to us, and we'll get back to you as soon as possible.
                </p>
                
                <div class="space-y-8">
                    <div class="flex items-center gap-6 p-6 bg-white rounded-3xl border border-gray-100 shadow-sm">
                        <div class="w-12 h-12 bg-brand-teal/10 rounded-2xl flex items-center justify-center text-brand-teal">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        </div>
                        <div>
                            <p class="text-xs font-bold uppercase tracking-widest text-slate-400 mb-1">Email Us</p>
                            <p class="text-slate-800 font-bold">contact@ejlals.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white p-10 md:p-12 rounded-[2.5rem] border border-gray-100 shadow-sm">
                <form action="#" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-2">Full Name</label>
                            <input type="text" class="w-full bg-gray-50 border border-gray-100 py-4 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                        </div>
                        <div class="space-y-2">
                            <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-2">Email</label>
                            <input type="email" class="w-full bg-gray-50 border border-gray-100 py-4 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                        </div>
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-2">Subject</label>
                        <input type="text" class="w-full bg-gray-50 border border-gray-100 py-4 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                    </div>
                    <div class="space-y-2">
                        <label class="text-xs font-bold text-slate-400 uppercase tracking-widest px-2">Message</label>
                        <textarea rows="5" class="w-full bg-gray-50 border border-gray-100 py-4 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all"></textarea>
                    </div>
                    <button class="w-full bg-brand-teal hover:bg-brand-teal/90 text-white font-bold py-4 rounded-2xl shadow-md transition-all">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
