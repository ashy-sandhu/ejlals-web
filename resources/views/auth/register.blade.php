@extends('layouts.app')

@section('title', 'Join the Academy - Ejlals Academy')

@section('content')
<div class="bg-[#FDFDFC] min-h-[80vh] flex items-center justify-center px-6 py-20 font-sans">
    <div class="max-w-md w-full">
        <!-- Brand Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-[2rem] bg-brand-gold/5 mb-6 border border-brand-gold/10">
                <svg class="w-10 h-10 text-brand-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path></svg>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Join Ejlals</h1>
            <p class="text-slate-500 font-medium">Start your journey of knowledge today</p>
        </div>

        <!-- Register Card -->
        <div class="bg-white rounded-[2.5rem] p-10 border border-slate-100 shadow-xl shadow-slate-200/50">
            @if ($errors->any())
                <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-2xl text-sm font-medium mb-6">
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Full Name</label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-gold focus:ring-brand-gold/20 transition-all placeholder:text-slate-300" placeholder="John Doe">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-gold focus:ring-brand-gold/20 transition-all placeholder:text-slate-300" placeholder="your@email.com">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Password</label>
                    <input type="password" name="password" required class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-gold focus:ring-brand-gold/20 transition-all placeholder:text-slate-300" placeholder="••••••••">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Confirm Password</label>
                    <input type="password" name="password_confirmation" required class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-gold focus:ring-brand-gold/20 transition-all placeholder:text-slate-300" placeholder="••••••••">
                </div>

                <button type="submit" class="w-full bg-brand-gold hover:bg-brand-gold/90 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-brand-gold/20 transition-all active:scale-[0.98]">
                    Create Account
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <p class="text-sm text-slate-500">Already a student?</p>
                <a href="{{ route('login') }}" class="inline-block mt-2 text-brand-teal font-bold hover:text-brand-gold transition-colors underline decoration-2 underline-offset-4">Sign in to Dashboard</a>
            </div>
        </div>

        <p class="mt-10 text-center text-xs text-slate-400 leading-relaxed font-medium">By creating an account, you agree to our <a href="{{ route('terms') }}" class="text-slate-600 underline">Terms of Service</a> and <a href="{{ route('privacy') }}" class="text-slate-600 underline">Privacy Policy</a>.</p>
    </div>
</div>
@endsection
