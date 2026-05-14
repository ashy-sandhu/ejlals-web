@extends('layouts.dashboard')

@section('title', 'Account Settings')

@section('content')
<!-- Header -->
<div class="flex flex-col md:flex-row items-center justify-between mb-6 md:mb-8 gap-4 px-1">
    <div class="flex items-center gap-3">
        <!-- Mobile Burger Menu -->
        <button @click="mobileSidebarOpen = true" class="lg:hidden p-2 -ml-2 text-gray-500 hover:text-ejlals-teal transition-colors">
            <span class="material-symbols-outlined">menu</span>
        </button>
        <div>
            <h1 class="text-xl md:text-2xl font-bold text-[#191c1e]">Account Settings</h1>
            <p class="text-gray-400 text-[10px] md:text-xs font-medium mt-0.5">Manage your personal information and preferences.</p>
        </div>
    </div>
    <a href="{{ route('dashboard') }}" class="hidden sm:inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-white border border-gray-100 text-[10px] md:text-[11px] font-bold text-ejlals-teal shadow-sm hover:shadow-md transition-all group">
        <span class="material-symbols-outlined text-sm group-hover:-translate-x-0.5 transition-transform">arrow_back</span>
        Back
    </a>
</div>

@if (session('status') === 'profile-updated')
    <div class="mb-6 bg-emerald-50 border border-emerald-100 text-emerald-600 px-4 py-3 rounded-xl text-[10px] md:text-[11px] font-bold shadow-sm flex items-center gap-2 animate-in fade-in slide-in-from-top-4 duration-500">
        <span class="material-symbols-outlined text-base">check_circle</span>
        Profile updated successfully!
    </div>
@endif

<form action="{{ route('profile.update') }}" method="POST" class="max-w-4xl">
    @csrf
    @method('PATCH')

    <div class="space-y-6">
        <!-- Compact Personal Info -->
        <div class="bg-white rounded-[2rem] p-5 md:p-8 border border-gray-100 shadow-sm">
            <h2 class="text-xs md:text-sm font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-teal-50 flex items-center justify-center text-ejlals-teal">
                    <span class="material-symbols-outlined text-base fill-icon">person</span>
                </div>
                Personal Information
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">First Name</label>
                    <input type="text" name="first_name" value="{{ old('first_name', $user->first_name) }}" required class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all">
                </div>
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Last Name</label>
                    <input type="text" name="last_name" value="{{ old('last_name', $user->last_name) }}" required class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all">
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 mt-4 md:mt-6">
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Phone Number</label>
                    <input type="text" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}" class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all">
                </div>
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-300 uppercase tracking-widest mb-2 ml-1">Email (Read-only)</label>
                    <input type="email" disabled value="{{ $user->email }}" class="w-full bg-gray-100 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-400 cursor-not-allowed">
                </div>
            </div>
        </div>

        <!-- Location -->
        <div class="bg-white rounded-[2rem] p-5 md:p-8 border border-gray-100 shadow-sm">
            <h2 class="text-xs md:text-sm font-bold text-gray-900 mb-6 flex items-center gap-2">
                <div class="w-8 h-8 rounded-lg bg-orange-50 flex items-center justify-center text-orange-600">
                    <span class="material-symbols-outlined text-base fill-icon">location_on</span>
                </div>
                Location & Preferences
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Country</label>
                    <input type="text" name="country" value="{{ old('country', $user->country) }}" class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all">
                </div>
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">City</label>
                    <input type="text" name="city" value="{{ old('city', $user->city) }}" class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all">
                </div>
            </div>

            <div class="mt-4 md:mt-6">
                <label class="block text-[9px] md:text-[10px] font-black text-gray-400 uppercase tracking-widest mb-2 ml-1">Timezone</label>
                <select name="timezone" class="w-full bg-gray-50 border-gray-100 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-gray-900 focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all cursor-pointer">
                    @foreach($timezones as $tz)
                        <option value="{{ $tz }}" {{ old('timezone', $user->timezone) == $tz ? 'selected' : '' }}>{{ $tz }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Security -->
        <div class="bg-[#2d3133] rounded-[2rem] p-5 md:p-8 shadow-lg relative overflow-hidden">
            <h2 class="text-xs md:text-sm font-bold text-white mb-6 flex items-center gap-2 relative z-10">
                <div class="w-8 h-8 rounded-lg bg-white/10 flex items-center justify-center text-rose-400">
                    <span class="material-symbols-outlined text-base fill-icon">security</span>
                </div>
                Security
            </h2>
            
            <div class="grid grid-cols-1 gap-4 md:gap-6 relative z-10">
                <div>
                    <label class="block text-[9px] md:text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Current Password</label>
                    <input type="password" name="current_password" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/10">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                    <div>
                        <label class="block text-[9px] md:text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">New Password</label>
                        <input type="password" name="new_password" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/10">
                    </div>
                    <div>
                        <label class="block text-[9px] md:text-[10px] font-black text-gray-500 uppercase tracking-widest mb-2 ml-1">Confirm New</label>
                        <input type="password" name="new_password_confirmation" placeholder="••••••••" class="w-full bg-white/5 border-white/10 rounded-xl py-2.5 px-4 text-[11px] md:text-xs text-white focus:border-ejlals-teal focus:ring-ejlals-teal/10 transition-all placeholder-white/10">
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions -->
        <div class="flex justify-end gap-3 pt-2">
            <button type="reset" class="px-6 py-2.5 rounded-xl text-[10px] font-bold text-gray-400 hover:text-gray-600 transition-all">
                Cancel
            </button>
            <button type="submit" class="px-8 py-2.5 bg-ejlals-teal hover:bg-teal-600 text-white rounded-xl font-bold text-[10px] shadow-md transition-all active:scale-95">
                Save Changes
            </button>
        </div>
    </div>
</form>
@endsection
