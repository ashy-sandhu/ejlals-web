@extends('layouts.auth')

@section('title', 'Verify Your Account')

@section('content')
<div class="mb-10 text-center md:text-left">
    <h2 class="text-3xl font-bold text-gray-900 mb-2">Check Your Inbox</h2>
    <p class="text-gray-500 leading-relaxed">
        We've sent a 6-digit verification code to <br class="hidden md:block">
        <span class="font-bold text-ejlals-teal">{{ auth()->user()?->email ?? 'your email' }}</span>.
    </p>
</div>

@if (session('status'))
    <div class="bg-emerald-50 border border-emerald-100 text-emerald-600 p-4 rounded-xl text-sm font-medium mb-6 animate-in fade-in zoom-in duration-300">
        {{ session('status') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-rose-50 border border-rose-100 text-rose-600 p-4 rounded-xl text-sm font-medium mb-6">
        {{ $errors->first('otp') }}
    </div>
@endif

<form action="{{ route('otp.submit') }}" method="POST" id="otp-form" class="space-y-8">
    @csrf
    <div class="flex justify-between gap-2 sm:gap-4 max-w-xs mx-auto md:mx-0">
        @for ($i = 0; $i < 6; $i++)
            <input type="text" 
                   name="otp[]" 
                   maxlength="1" 
                   data-index="{{ $i }}"
                   class="otp-input w-12 h-14 text-2xl font-bold text-center bg-gray-50 border-2 border-gray-100 rounded-xl focus:border-ejlals-teal focus:ring-4 focus:ring-ejlals-teal/10 transition-all outline-none text-gray-900"
                   pattern="\d*" 
                   inputmode="numeric" 
                   required>
        @endfor
    </div>

    <button type="submit" class="w-full flex justify-center items-center gap-2 py-4 px-4 border border-transparent rounded-xl shadow-lg text-sm font-bold text-white bg-ejlals-teal hover:bg-teal-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ejlals-teal transition-all active:scale-[0.98]">
        Verify & Activate Account
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path></svg>
    </button>
</form>

<!-- Divider -->
<div class="relative my-10">
    <div aria-hidden="true" class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-gray-100"></div>
    </div>
    <div class="relative flex justify-center text-xs">
        <span class="px-2 bg-white text-gray-400">didn't receive the code?</span>
    </div>
</div>

<!-- Resend Section -->
<div class="flex flex-col md:flex-row items-center justify-between gap-4">
    <form action="{{ route('otp.resend') }}" method="POST">
        @csrf
        <button type="submit" class="text-sm font-bold text-ejlals-teal hover:text-teal-700 transition-colors underline decoration-2 underline-offset-4">
            Resend Verification Email
        </button>
    </form>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-sm font-medium text-gray-400 hover:text-rose-600 transition-colors">
            Sign Out
        </button>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const inputs = document.querySelectorAll('.otp-input');
        const form = document.getElementById('otp-form');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.inputType === 'deleteContentBackward') return;
                input.value = input.value.replace(/[^0-9]/g, '');
                if (input.value && index < inputs.length - 1) {
                    inputs[index + 1].focus();
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !input.value && index > 0) {
                    inputs[index - 1].focus();
                }
            });

            input.addEventListener('paste', (e) => {
                e.preventDefault();
                const data = e.clipboardData.getData('text').slice(0, 6).split('');
                data.forEach((char, i) => {
                    if (inputs[index + i]) {
                        inputs[index + i].value = char;
                        if (inputs[index + i + 1]) inputs[index + i + 1].focus();
                    }
                });
            });
        });
    });
</script>
@endsection
