@extends('layouts.app')

@section('title', 'Server Error')

@section('content')
<div class="min-h-[70vh] flex flex-col items-center justify-center text-center px-4">
    <div class="w-24 h-24 bg-red-50 rounded-full flex items-center justify-center text-red-500 mb-6">
        <span class="material-symbols-outlined text-4xl">error</span>
    </div>
    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">500</h1>
    <h2 class="text-xl md:text-2xl font-semibold text-gray-700 mb-4">Something went wrong</h2>
    <p class="text-gray-500 mb-8 max-w-md mx-auto">
        We experienced an unexpected issue on our servers. Our team has been notified and we are working to fix it.
    </p>
    <div class="flex gap-4">
        <button onclick="window.location.reload()" class="px-8 py-3 bg-white border border-gray-200 text-gray-700 rounded-xl font-bold shadow-sm hover:bg-gray-50 transition-all">
            Try Again
        </button>
        <a href="{{ route('home') }}" class="px-8 py-3 bg-ejlals-teal text-white rounded-xl font-bold shadow-lg shadow-teal-900/20 hover:bg-teal-600 transition-all">
            Return Home
        </a>
    </div>
</div>
@endsection
