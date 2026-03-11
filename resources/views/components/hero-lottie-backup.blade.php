<div class="lg:col-span-5 relative hidden lg:flex items-center justify-center">
    <!-- Animation Backglow -->
    <div class="absolute inset-0 bg-gradient-to-tr from-brand-teal/15 via-brand-gold/10 to-transparent rounded-full blur-[120px] scale-110 opacity-70"></div>
    
    <div class="relative w-full max-w-[500px]">
        <dotlottie-player src="{{ asset('animations/hero.lottie') }}" background="transparent" speed="1" style="width: 100%; height: auto;" loop autoplay class="hover:scale-105 transition-transform duration-700"></dotlottie-player>
    </div>
    
    <div class="absolute -bottom-4 -left-4 bg-white p-3 rounded-xl shadow-md border border-slate-100 flex items-center gap-3 animate-bounce-slow">
        <div class="w-8 h-8 rounded-full bg-brand-teal/10 flex items-center justify-center text-brand-teal">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
        </div>
        <div>
            <div class="font-bold text-slate-800 text-[10px]">Top Rated Platform</div>
            <div class="text-[8px] text-slate-400 font-medium uppercase tracking-wider">4.9/5 Student Reviews</div>
        </div>
    </div>
</div>
