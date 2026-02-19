@extends('layouts.app')

@section('title', 'Sign In - Ejlals Academy')

@section('content')
<div class="bg-[#FDFDFC] min-h-[80vh] flex items-center justify-center px-6 py-20 font-sans">
    <div class="max-w-md w-full">
        <!-- Brand Header -->
        <div class="text-center mb-10">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-[2rem] bg-brand-teal/5 mb-6 border border-brand-teal/10">
                <svg class="w-10 h-10 text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 00-2 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
            </div>
            <h1 class="text-3xl font-extrabold text-slate-900 mb-2 tracking-tight">Welcome Back</h1>
            <p class="text-slate-500 font-medium">Please sign in to access your Horizon</p>
        </div>

        <!-- Login Card -->
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

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Email Address</label>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-teal focus:ring-brand-teal/20 transition-all placeholder:text-slate-300" placeholder="your@email.com">
                </div>

                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-2 mx-1">Password</label>
                    <input type="password" name="password" required class="w-full bg-slate-50 border-slate-100 rounded-2xl py-4 px-6 text-slate-900 focus:border-brand-teal focus:ring-brand-teal/20 transition-all placeholder:text-slate-300" placeholder="••••••••">
                </div>

                <div class="flex items-center justify-between px-1">
                    <label class="flex items-center gap-2 cursor-pointer group">
                        <input type="checkbox" name="remember" class="w-4 h-4 rounded border-slate-300 text-brand-teal focus:ring-brand-teal transition-all">
                        <span class="text-sm text-slate-500 group-hover:text-slate-700 transition-colors">Remember me</span>
                    </label>
                    <a href="#" class="text-xs font-bold text-brand-teal hover:text-brand-gold transition-colors">Forgot password?</a>
                </div>

                <button type="submit" class="w-full bg-brand-teal hover:bg-brand-teal/90 text-white font-extrabold py-4 rounded-2xl shadow-lg shadow-brand-teal/20 transition-all active:scale-[0.98]">
                    Sign In
                </button>
            </form>

            <div class="mt-10 pt-8 border-t border-slate-50 text-center">
                <p class="text-sm text-slate-500">Don't have an account yet?</p>
                <a href="{{ route('register') }}" class="inline-block mt-2 text-brand-gold font-bold hover:text-brand-teal transition-colors underline decoration-2 underline-offset-4">Create Student Account</a>
            </div>
        </div>

        <!-- Trust Footer -->
        <div class="mt-12 flex items-center justify-center gap-6 opacity-40 grayscale">
            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Secure Protocol</span>
            <div class="w-1 h-1 rounded-full bg-slate-300"></div>
            <span class="text-[10px] font-bold uppercase tracking-widest text-slate-400">Ejlals Authenticated</span>
        </div>
    </div>
</div>
@endsection
