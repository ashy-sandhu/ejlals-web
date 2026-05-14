@extends('layouts.auth')

@section('title', 'Welcome Back')

@section('content')
<div class="mb-10 text-center md:text-left">
    <h2 class="text-3xl font-bold text-gray-900 mb-2">Welcome Back</h2>
    <p class="text-gray-500">Sign in to continue your learning journey</p>
</div>

@if ($errors->any())
    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-xl text-sm font-medium mb-6">
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
        <label class="block text-sm font-medium text-gray-700 mb-2" for="email">Email Address</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <input class="block w-full pl-10 pr-3 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-400" id="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required type="email" autofocus/>
        </div>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2" for="password">Password</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </div>
            <input class="block w-full pl-10 pr-10 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-400" id="password" name="password" placeholder="Enter your password" required type="password"/>
            <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer text-gray-400 hover:text-gray-600">
                <svg id="eye-icon" class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
            </button>
        </div>
    </div>

    <div class="flex items-center justify-between">
        <div class="flex items-center">
            <input class="h-4 w-4 text-ejlals-teal focus:ring-ejlals-teal border-gray-300 rounded" id="remember" name="remember" type="checkbox"/>
            <label class="ml-2 block text-sm text-gray-600" for="remember">Remember me</label>
        </div>
        <div class="text-sm">
            <a class="font-semibold text-ejlals-teal hover:text-ejlals-teal-hover" href="#">Forgot password?</a>
        </div>
    </div>

    <button class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-ejlals-teal hover:bg-ejlals-teal-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ejlals-teal transition-colors" type="submit">
        Sign In
        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"><line x1="22" x2="11" y1="2" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
    </button>
</form>

<!-- Divider -->
<div class="relative my-8">
    <div aria-hidden="true" class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-gray-200"></div>
    </div>
    <div class="relative flex justify-center text-sm">
        <span class="px-2 bg-white text-gray-400">or</span>
    </div>
</div>

<!-- Create Account Section -->
<div class="space-y-4 text-center">
    <p class="text-sm text-gray-500">Don't have an account?</p>
    <a class="w-full flex justify-center items-center gap-2 py-3 px-4 border border-ejlals-teal/30 rounded-lg text-sm font-semibold text-ejlals-teal hover:bg-ejlals-teal/5 transition-colors" href="{{ route('register') }}">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
        Create Student Account
    </a>
</div>

<!-- Support Info -->
<div class="mt-12 text-center text-sm text-gray-400 flex items-center justify-center gap-2">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
    Need help? <a class="text-ejlals-teal font-medium" href="#">Contact Support</a>
</div>

<script>
    function togglePassword() {
        const input = document.getElementById('password');
        const icon = document.getElementById('eye-icon');
        if (input.type === 'password') {
            input.type = 'text';
            // eye icon (simple change)
            icon.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle>';
        } else {
            input.type = 'password';
            icon.innerHTML = '<path d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>';
        }
    }
</script>
@endsection
