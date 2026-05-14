@extends('layouts.auth')

@section('title', 'Create Student Account')
@section('form-width', 'max-w-[640px]')

@section('content')
<div class="mb-10 text-center md:text-left">
    <h2 class="text-3xl font-bold text-gray-900 mb-2">Join Ejlals Academy</h2>
    <p class="text-gray-500">Start your interactive learning journey today</p>
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

<form action="{{ route('register') }}" method="POST" class="space-y-5">
    @csrf
    
    <!-- Names Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="first_name">First Name</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="first_name" name="first_name" value="{{ old('first_name') }}" placeholder="Ahmed" required type="text"/>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="last_name">Last Name</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="last_name" name="last_name" value="{{ old('last_name') }}" placeholder="Khan" required type="text"/>
        </div>
    </div>

    <!-- Contact Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="email">Email Address</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="email" name="email" value="{{ old('email') }}" placeholder="your@email.com" required type="email"/>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="phone_number">Phone Number</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="phone_number" name="phone_number" value="{{ old('phone_number') }}" placeholder="+1234567890" required type="tel"/>
        </div>
    </div>

    <!-- Location Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="country">Country</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="country" name="country" value="{{ old('country') }}" placeholder="Pakistan" required type="text"/>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="city">City</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="city" name="city" value="{{ old('city') }}" placeholder="Karachi" required type="text"/>
        </div>
    </div>

    <!-- Timezone & Password -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="timezone">Preferred Timezone</label>
            <select name="timezone" id="timezone" class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm">
                @foreach($timezones as $tz)
                    <option value="{{ $tz }}" {{ old('timezone', 'UTC') == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2 ml-1" for="password">Password</label>
            <input class="block w-full px-4 py-3 border-gray-300 rounded-lg focus:ring-ejlals-teal focus:border-ejlals-teal text-sm placeholder-gray-300" id="password" name="password" placeholder="Min. 8 characters" required type="password"/>
        </div>
    </div>

    <div class="pt-2">
        <button class="w-full flex justify-center items-center gap-2 py-3.5 px-4 border border-transparent rounded-lg shadow-sm text-sm font-semibold text-white bg-ejlals-teal hover:bg-ejlals-teal-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-ejlals-teal transition-all" type="submit">
            Register Account
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24"><path d="M16 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" x2="20" y1="8" y2="14"></line><line x1="23" x2="17" y1="11" y2="11"></line></svg>
        </button>
    </div>
</form>

<!-- Divider -->
<div class="relative my-6">
    <div aria-hidden="true" class="absolute inset-0 flex items-center">
        <div class="w-full border-t border-gray-200"></div>
    </div>
    <div class="relative flex justify-center text-sm">
        <span class="px-2 bg-white text-gray-400">already a member?</span>
    </div>
</div>

<!-- Create Account Section -->
<div class="text-center">
    <a class="text-sm font-bold text-ejlals-teal hover:text-ejlals-teal-hover transition-colors" href="{{ route('login') }}">
        Sign in to your account instead
    </a>
</div>

<div class="mt-8 text-center text-[10px] text-gray-400">
    By registering, you agree to our <a href="#" class="underline">Terms of Service</a> and <a href="#" class="underline">Privacy Policy</a>.
</div>
@endsection
