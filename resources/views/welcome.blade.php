@extends('layouts.app')

@section('title', 'Ejlals Academy - Learn, Grow & Build Knowledge')

@section('content')
<!-- Hero Section -->
<section class="max-w-7xl mx-auto px-6 py-16 md:py-24 grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
    <div class="max-w-xl">
        <h1 class="text-5xl md:text-6xl font-bold text-slate-800 leading-tight mb-6">
            Learn, Grow & Build <br>
            <span class="text-brand-teal">Knowledge</span> That Matters
        </h1>
        <p class="text-slate-500 text-lg mb-8 leading-relaxed">
            High-quality educational content, practical guidance, and trusted resources to help you learn, improve, and make better decisions.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#" class="bg-brand-gold hover:bg-brand-gold/90 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md">
                Start Learning
            </a>
            <a href="#" class="bg-brand-teal hover:bg-brand-teal/90 text-white px-8 py-3.5 rounded-xl font-bold transition-all shadow-md">
                Explore Guides
            </a>
        </div>

        <!-- Trust Marks -->
        <div class="mt-12 flex flex-wrap gap-6 text-sm text-slate-400 font-medium">
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Research-based content
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Clear & easy explanations
            </div>
            <div class="flex items-center gap-2">
                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path></svg>
                Updated and practical knowledge
            </div>
        </div>
    </div>
    
    <!-- Hero Illustration Placeholder -->
    <div class="bg-gray-100 rounded-[2rem] aspect-square flex items-center justify-center relative overflow-hidden">
        <div class="w-full h-full bg-gradient-to-br from-brand-teal/5 to-brand-gold/5"></div>
        <div class="absolute inset-12 border-2 border-dashed border-gray-300 rounded-3xl flex items-center justify-center">
            <span class="text-gray-400 font-medium">Hero Illustration</span>
        </div>
    </div>
</section>

<!-- Who We Are Section -->
<section class="bg-white py-20 px-6 border-y border-gray-50">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
        <div class="bg-gray-50 rounded-3xl aspect-[1.4/1] flex items-center justify-center border border-gray-100">
             <span class="text-gray-400 font-medium">About Illustration</span>
        </div>
        <div>
            <h2 class="text-4xl font-bold mb-6 text-slate-800 tracking-tight">Who We Are</h2>
            <p class="text-slate-500 mb-6 leading-relaxed">
                We are an educational platform focused on delivering clear, reliable, and easy-to-understand information. Our mission is to simplify learning by providing structured guides, explanations, and resources that anyone can apply in real life.
            </p>
            <p class="text-slate-500 mb-8 leading-relaxed">
                We believe education should be accessible, practical, and trustworthy.
            </p>
            <a href="#" class="inline-flex items-center text-brand-teal font-bold hover:gap-2 transition-all">
                About Us 
                <svg class="w-5 h-5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
            </a>
        </div>
    </div>
</section>

<!-- What You'll Learn Section -->
<section class="max-w-7xl mx-auto px-6 py-20">
    <h2 class="text-3xl font-bold mb-12 text-center text-slate-800">What You'll Learn Here</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach([
            ['icon' => 'book-open', 'title' => 'Educational Guides', 'desc' => 'Step-by-step learning material designed for beginners and intermediates.'],
            ['icon' => 'academic-cap', 'title' => 'Practical Tutorials', 'desc' => 'Simple explanations with real-world examples.'],
            ['icon' => 'document-text', 'title' => 'In-Depth Articles', 'desc' => 'Well-researched content focusing on clarity and accuracy.'],
            ['icon' => 'database', 'title' => 'Resources & Tools', 'desc' => 'Helpful materials to support your learning journey.']
        ] as $card)
        <div class="p-8 bg-white border border-gray-100 rounded-3xl hover:border-brand-teal/30 hover:shadow-xl transition-all group">
            <div class="w-12 h-12 bg-gray-50 rounded-2xl flex items-center justify-center text-brand-teal mb-6 group-hover:bg-brand-teal group-hover:text-white transition-colors">
                 <!-- Simple Icon Representation -->
                 <div class="w-6 h-6 border-2 border-current rounded-sm"></div>
            </div>
            <h3 class="font-bold text-lg mb-3">{{ $card['title'] }}</h3>
            <p class="text-slate-500 text-sm leading-relaxed">{{ $card['desc'] }}</p>
        </div>
        @endforeach
    </div>
</section>

<!-- Articles Section -->
<section class="bg-gray-50 py-24 px-6">
    <div class="max-w-7xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-16 items-start">
        <div>
            <h2 class="text-3xl font-bold mb-8 text-slate-800">Popular & Latest Articles</h2>
            <div class="space-y-6">
                @forelse($latestPosts as $post)
                <a href="#" class="block p-4 border-b border-gray-200 hover:text-brand-teal flex items-center justify-between group">
                    <span class="font-medium">{{ $post->title }}</span>
                    <svg class="w-5 h-5 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
                @empty
                <p class="text-gray-400 italic">No articles published yet.</p>
                @endforelse
            </div>
            <div class="mt-10">
                <a href="#" class="bg-brand-teal text-white px-8 py-3 rounded-xl font-bold hover:bg-brand-teal/90 transition-all inline-block">
                    View All Articles
                </a>
            </div>
        </div>
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex items-center justify-center aspect-[1.2/1]">
             <span class="text-gray-400 font-medium">Articles Illustration</span>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="max-w-5xl mx-auto px-6 py-20">
    <div class="bg-gray-50 rounded-[2.5rem] p-12 md:p-16 flex flex-col md:flex-row items-center gap-12 text-center md:text-left border border-gray-100">
        <div class="flex-1">
            <h2 class="text-3xl font-bold mb-4 text-slate-800 uppercase tracking-tight">Looking for Practical Solutions?</h2>
            <p class="text-slate-500 leading-relaxed">
                After learning the concepts, you can explore our carefully selected products and resources designed to support your learning and daily needs.
            </p>
        </div>
        <div class="w-full max-w-md">
            <form action="#" class="flex gap-2">
                <input type="email" placeholder="Email Address" class="flex-1 bg-white border border-gray-200 py-3.5 px-6 rounded-2xl focus:outline-none focus:ring-2 focus:ring-brand-teal/20 focus:border-brand-teal transition-all">
                <button class="bg-brand-teal hover:bg-brand-teal/90 text-white px-6 py-3.5 rounded-2xl font-bold shadow-md transition-all whitespace-nowrap">
                    Subscribe Now
                </button>
            </form>
        </div>
    </div>
</section>
@endsection
