@extends('layouts.dashboard')

@section('title', 'Account Settings')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-4">
    <div>
        <h1 class="text-3xl font-bold text-[#191c1e]">Account Settings</h1>
        <p class="text-gray-500 font-medium mt-1">Manage your personal information and preferences.</p>
    </div>
    <a href="{{ route('dashboard') }}" class="inline-flex items-center gap-2 px-6 py-3 rounded-2xl bg-white border border-gray-100 text-sm font-bold text-ejlals-teal shadow-sm hover:shadow-md transition-all group">
        <span class="material-symbols-outlined text-sm group-hover:-translate-x-1 transition-transform">arrow_back</span>
        Back to Dashboard
    </a>
</div>

@if (session('status') === 'profile-updated')
    <div class="mb-8 bg-emerald-50 border border-emerald-100 text-emerald-600 px-6 py-4 rounded-2xl text-sm font-bold shadow-sm flex items-center gap-3 animate-in fade-in slide-in-from-top-4 duration-500">
        <span class="material-symbols-outlined text-sm">check_circle</span>
        Profile updated successfully!
    </div>
@endif

<form action="{{ route('profile.update') }}" method="POST" class="max-w-4xl">
    @csrf
    @method('PATCH')

    <div class="space-y-8">
        <!-- Personal Info -->
        <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-gray-100 shadow-sm">
            <h2 class="text-xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-teal-50 flex items-center justify-center text-ejlals-teal">
                    <span class="material-symbols-outlined fill-icon">person</span>
                </div>
                Personal Information
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-gray-300">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-gray-300">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-8">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-gray-300">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-300 uppercase tracking-widest mb-3 ml-1">Email Address</label>
                    <input type="email" disabled value="{{ $user->email }}" class="w-full bg-gray-100 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-400 cursor-not-allowed">
                    <p class="mt-2 text-[10px] text-gray-400 px-1 italic">Contact support to change your primary email.</p>
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="bg-white rounded-[2.5rem] p-8 md:p-10 border border-gray-100 shadow-sm">
            <h2 class="text-xl font-bold text-gray-900 mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-orange-50 flex items-center justify-center text-orange-600">
                    <span class="material-symbols-outlined fill-icon">location_on</span>
                </div>
                Location & Preferences
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Country</label>
                    <input type="text" name="country" value="{{ old('country', $user->country) }}" class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-gray-300">
                </div>
                <div>
                    <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">City</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-gray-300">
                </div>
            </div>

            <div class="mt-8">
                <label class="block text-[10px] font-black text-gray-400 uppercase tracking-widest mb-3 ml-1">Preferred Timezone</label>
                <select name="timezone" class="w-full bg-gray-50 border-gray-100 rounded-2xl py-4 px-6 text-sm text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all cursor-pointer">
                    @foreach($timezones as $tz)
                        <option value="{{ $tz }}" {{ old('timezone', $user->timezone) == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Security -->
        <div class="bg-[#2d3133] rounded-[2.5rem] p-8 md:p-10 shadow-2xl relative overflow-hidden">
            <div class="absolute -right-20 -bottom-20 w-64 h-64 bg-rose-500 opacity-5 rounded-full blur-[80px]"></div>
            
            <h2 class="text-xl font-bold text-white mb-8 flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-white/10 flex items-center justify-center text-rose-400">
                    <span class="material-symbols-outlined fill-icon">security</span>
                </div>
                Security Settings
            </h2>
            
            <div class="grid grid-cols-1 gap-8">
                <div>
                    <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-3 ml-1">Current Password</label>
                    <input type="password" name="current_password" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-6 text-sm text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/20">
                    <p class="mt-2 text-[10px] text-gray-500 px-1">Required only if changing password.</p>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-3 ml-1">New Password</label>
                        <input type="password" name="new_password" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-6 text-sm text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/20">
                    </div>
                    <div>
                        <label class="block text-[10px] font-black text-gray-500 uppercase tracking-widest mb-3 ml-1">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-2xl py-4 px-6 text-sm text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/20">
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex flex-col sm:flex-row justify-end gap-4 pt-4">
            <button type="reset" class="px-10 py-4 rounded-2xl text-sm font-bold text-gray-400 hover:text-gray-600 hover:bg-gray-50 transition-all">
                Cancel Changes
            </button>
            <button type="submit" class="px-12 py-4 bg-ejlals-teal hover:bg-teal-600 text-white rounded-2xl font-bold shadow-lg shadow-teal-900/30 transition-all active:scale-95">
                Save Profile Changes
            </button>
        </div>
    </div>
</form>
@endsection
