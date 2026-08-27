@extends('layouts.app')

@section('title', 'Page Not Found')

@section('content')
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-4">
    <div class="w-24 h-24 bg-teal-50 rounded-full flex items-center justify-center text-ejlals-teal mb-6">
        <span class="material-symbols-outlined text-4xl">search_off</span>
    </div>
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">404</h1>
    <h2 class="text-xl md:text-2xl font-semibold text-gray-700 mb-4">Page Not Found</h2>
    <p class="text-gray-500 mb-8 max-w-md mx-auto">
        The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.
    </p>
    <a href="{{ route('home') }}" class="px-8 py-3 bg-ejlals-teal text-white rounded-xl font-bold shadow-lg shadow-teal-900/20 hover:bg-teal-600 transition-all">
        Return Home
    </a>
</div>
@endsection
