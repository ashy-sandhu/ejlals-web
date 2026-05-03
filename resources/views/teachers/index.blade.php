@extends('layouts.app')

@section('title', 'Scholars Directory - Ejlals Academy')

@section('json_ld')
    {!! \App\Traits\HasSeoSchema::renderJsonLd(\App\Traits\HasSeoSchema::generateBreadcrumbs([
        ['name' => 'Scholars', 'url' => route('scholars.index')]
    ])) !!}
@endsection

@section('content')
<div class="bg-slate-50 min-h-screen py-8 lg:py-12">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Header -->
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-10">
            <div class="max-w-2xl">
                <h1 class="text-3xl md:text-4xl font-serif font-black text-slate-900 tracking-tight mb-3">Our Expert Scholars</h1>
                <p class="text-slate-500 text-sm leading-relaxed font-medium">
                    Connect with our verified Islamic scholars and academic experts. Browse profiles, check availability, and book your free demo session.
                </p>
            </div>
        </div>

        <!-- Directory Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            @forelse($scholars as $scholar)
                <x-scholar-card :scholar="$scholar" />
            @empty
            <div class="col-span-full py-20 text-center">
                <span class="material-symbols-outlined text-6xl text-slate-200 mb-4">search_off</span>
                <p class="text-slate-500 text-lg">No scholars found matching your criteria.</p>
            </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-12">
            {{ $scholars->links() }}
        </div>
    </div>
</div>
@endsection
