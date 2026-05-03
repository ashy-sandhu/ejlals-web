@extends('layouts.app')

@section('title', 'Wirasat Visualizer - ' . config('app.name'))
@section('meta_description', 'An advanced Islamic inheritance calculator for all four Sunni madhabs — Hanafi, Maliki, Shafi\'i, Hanbali.')

@section('json_ld')
    @php
        // WebApplication Schema Data
        $appSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebApplication",
            "name" => "Ejlal's Wirasat Visualizer",
            "url" => route('tools.wirasat'),
            "applicationCategory" => "FinanceApplication",
            "operatingSystem" => "All",
            "abstract" => "An advanced Islamic inheritance calculator for all four Sunni madhabs — Hanafi, Maliki, Shafi'i, Hanbali.",
            "offers" => [
                "@type" => "Offer",
                "price" => "0",
                "priceCurrency" => "USD"
            ]
        ];

        // Breadcrumb Schema
        $breadcrumbSchema = \App\Traits\HasSeoSchema::generateBreadcrumbs([
            ['name' => 'Wirasat Visualizer', 'url' => route('tools.wirasat')]
        ]);
    @endphp

    {!! \App\Traits\HasSeoSchema::renderJsonLd($appSchema) !!}
    {!! \App\Traits\HasSeoSchema::renderJsonLd($breadcrumbSchema) !!}
@endsection

@section('content')
<div class="fixed inset-0 pointer-events-none overflow-hidden" style="z-index: 0;">
    <div class="absolute top-[-20%] left-[-20%] w-[70%] h-[70%] rounded-full bg-emerald-500/15 blur-[120px] animate-glow-1"></div>
    <div class="absolute bottom-[-20%] right-[-20%] w-[80%] h-[80%] rounded-full bg-brand-gold/15 blur-[140px] animate-glow-2"></div>
    <div class="absolute top-[10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-emerald-600/10 blur-[100px] animate-glow-3"></div>
</div>

<div class="relative z-10 pt-6 pb-12 px-4 max-w-4xl mx-auto" x-data="wirasatApp()" x-init="initApp()" x-cloak>
    
    <style>
        [x-cloak] { display: none !important; }

        @keyframes glow-1 {
            0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.8; }
            33% { transform: translate(15vw, 20vh) scale(1.2); opacity: 1; }
            66% { transform: translate(-10vw, 35vh) scale(0.9); opacity: 0.7; }
        }
        @keyframes glow-2 {
            0%, 100% { transform: translate(0, 0) scale(1.2); opacity: 0.7; }
            40% { transform: translate(-20vw, -15vh) scale(1); opacity: 1; }
            70% { transform: translate(-10vw, -30vh) scale(1.3); opacity: 0.8; }
        }
        @keyframes glow-3 {
            0%, 100% { transform: translate(0, 0); opacity: 0.6; }
            50% { transform: translate(-15vw, 10vh) scale(1.2); opacity: 1; }
        }

        .animate-glow-1 { animation: glow-1 5s infinite ease-in-out; }
        .animate-glow-2 { animation: glow-2 5s infinite ease-in-out; }
        .animate-glow-3 { animation: glow-3 5s infinite ease-in-out; }

        @media (prefers-reduced-motion: reduce) {
            .animate-glow-1, .animate-glow-2, .animate-glow-3 { animation: none !important; }
        }
        .print-only { display: none; }
        @media print {
            html, body {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
                background-color: white !important;
            }
            body * { visibility: hidden; }
            #wirasat-printable, #wirasat-printable * { visibility: visible; }
            
            #wirasat-printable { 
                position: absolute; 
                left: 0; 
                top: 0; 
                width: 100%; 
                border: none !important; 
                box-shadow: none !important; 
                margin: 0; 
                padding: 0; 
            }
            
            /* Force layout elements to disappear completely so they don't cause page breaks */
            header, footer, nav, .footer { display: none !important; }
            
            /* Erase the parent's padding during print so the page doesn't artificially stretch */
            .pt-24, .pb-12 { padding-top: 0 !important; padding-bottom: 0 !important; }

            .no-print { display: none !important; }
            .print-only { display: block; }
        }
    </style>

    <div id="wirasat-printable" class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
        <!-- Header -->
        <div class="bg-brand-teal text-white p-4 sm:p-5 border-b border-brand-teal/20">
            <div class="flex flex-col sm:flex-row justify-between sm:items-center gap-2 relative z-10">
                <div>
                    <h1 class="text-xl sm:text-2xl font-bold">Ejlal's Wirasat Visualizer</h1>
                    <p class="text-xs sm:text-sm text-brand-teal-100 mt-0.5">All 4 Sunni Schools · Quranic Fixed Shares & Asabah</p>
                </div>
                <div class="text-sm font-arabic font-bold opacity-90 text-right sm:text-left" dir="rtl">
                    حاسبة المواريث الإسلامية
                </div>
            </div>
            
            <!-- Stepper (No print) -->
            <div class="no-print flex items-center gap-1.5 sm:gap-2 mt-5 text-[11px] sm:text-xs font-semibold overflow-x-auto pb-1 hide-scrollbar">
                <button @click="goToStep(1)" :class="step === 1 ? 'bg-white text-brand-teal' : (step > 1 ? 'bg-brand-teal text-white border border-white hover:bg-white/10' : 'bg-brand-teal text-white border border-white/30')" class="px-2.5 py-1.5 rounded-md transition-colors whitespace-nowrap">1. Basics</button>
                <div class="w-3 sm:w-5 h-px shrink-0" :class="step >= 2 ? 'bg-white' : 'bg-white/30'"></div>
                
                <button :disabled="step < 2 && maxStepReached < 2" @click="goToStep(2)" :class="step === 2 ? 'bg-white text-brand-teal' : (step > 2 ? 'bg-brand-teal text-white border border-white hover:bg-white/10' : 'bg-brand-teal text-white border border-white/30 opacity-60')" class="px-2.5 py-1.5 rounded-md transition-colors whitespace-nowrap">2. Finance</button>
                <div class="w-3 sm:w-5 h-px shrink-0" :class="step >= 3 ? 'bg-white' : 'bg-white/30'"></div>
                
                <button :disabled="step < 3 && maxStepReached < 3" @click="goToStep(3)" :class="step === 3 ? 'bg-white text-brand-teal' : (step > 3 ? 'bg-brand-teal text-white border border-white hover:bg-white/10' : 'bg-brand-teal text-white border border-white/30 opacity-60')" class="px-2.5 py-1.5 rounded-md transition-colors whitespace-nowrap">3. Warisan</button>
                <div class="w-3 sm:w-5 h-px shrink-0" :class="step >= 4 ? 'bg-white' : 'bg-white/30'"></div>
                
                <button :disabled="step < 4 && maxStepReached < 4" @click="goToStep(4)" :class="step === 4 ? 'bg-white text-brand-teal' : 'bg-brand-teal text-white border border-white/30 opacity-60'" class="px-2.5 py-1.5 rounded-md transition-colors whitespace-nowrap">4. Results</button>
            </div>
        </div>

        <div class="p-4 sm:p-5">
            
            <!-- Step 1: Basics -->
            <div x-show="step === 1" x-transition.opacity class="space-y-6">
                <!-- Gender -->
                <div>
                    <h3 class="font-bold text-slate-800 text-sm mb-2">Marhoom Ka Gender (Deceased)</h3>
                    <div class="flex bg-slate-100 p-1 rounded-lg max-w-sm">
                        <button @click="st.g = 'male'; updateFilters()" :class="st.g === 'male' ? 'bg-white shadow-sm font-bold text-brand-teal' : 'text-slate-600 hover:text-slate-800'" class="flex-1 py-1.5 text-[13px] rounded-md transition-all">Male - مرد</button>
                        <button @click="st.g = 'female'; updateFilters()" :class="st.g === 'female' ? 'bg-white shadow-sm font-bold text-brand-teal' : 'text-slate-600 hover:text-slate-800'" class="flex-1 py-1.5 text-[13px] rounded-md transition-all">Female - عورت</button>
                    </div>
                </div>

                <!-- Madhab -->
                <div>
                    <h3 class="font-bold text-slate-800 text-sm mb-2">Fiqhi School (مذہب)</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                        <template x-for="(md, key) in MI" :key="key">
                            <div @click="st.m = key; updateFilters()" 
                                 class="border rounded-xl p-3 cursor-pointer transition-all border-b-[3px]"
                                 :class="st.m === key ? 'border-brand-teal bg-brand-teal/5' : 'border-slate-200 bg-white hover:border-brand-teal/30'">
                                <div class="font-bold text-sm text-slate-800 mb-0.5" x-text="md.n"></div>
                                <div class="text-[10px] text-slate-500 mb-1" x-text="md.reg"></div>
                                <div class="text-[11px] font-arabic font-bold text-brand-gold text-right" dir="rtl" x-text="md.ar"></div>
                            </div>
                        </template>
                    </div>
                    
                    <!-- Fiqhi Warning Banner -->
                    <div class="mt-3 bg-brand-gold/10 border border-brand-gold/20 rounded-lg p-3 text-[11px] text-slate-700 flex gap-2 items-start">
                        <span class="material-symbols-outlined text-brand-gold text-base shrink-0">info</span>
                        <div>
                            <strong class="text-brand-gold block mb-0.5" x-text="MI[st.m].n + ' Notes:'"></strong>
                            <span x-text="MI[st.m].note"></span> 
                            (Dadi Rule: <span x-text="MI[st.m].dadi_f"></span>)
                        </div>
                    </div>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-end">
                    <button @click="nextStep(2)" class="bg-brand-teal hover:bg-brand-teal/90 text-white font-bold py-2 px-5 rounded-lg text-sm transition-colors shadow-sm flex items-center gap-1">
                        Next: Estate Details <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>

            <!-- Step 2: Finance -->
            <div x-show="step === 2" x-transition.opacity class="space-y-6" style="display:none;">
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block font-bold text-slate-800 text-sm mb-1.5">Gross Assets (کل مال)</label>
                        <div class="flex gap-2">
                            <select x-model="st.cur" class="w-20 bg-slate-50 border border-slate-200 text-slate-800 text-[13px] rounded-lg px-2 py-2 focus:border-brand-teal focus:ring-0 outline-none">
                                <option>PKR</option><option>USD</option><option>GBP</option><option>AED</option><option>SAR</option><option>EUR</option><option>BDT</option>
                            </select>
                            <input type="number" x-model.number="st.ta" min="0" step="1000" class="flex-1 bg-white border border-slate-200 text-slate-800 text-[13px] rounded-lg px-3 py-2 outline-none focus:border-brand-teal transition-colors">
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block font-bold text-slate-800 text-[13px] mb-1.5">1. Funeral (تجہیز و تکفین)</label>
                        <input type="number" x-model.number="st.fun" min="0" class="w-full bg-white border border-slate-200 text-slate-800 text-[13px] rounded-lg px-3 py-2 outline-none focus:border-brand-teal transition-colors" :class="errors.fun ? 'border-red-500' : ''">
                        <p x-show="errors.fun" class="text-[10px] text-red-500 mt-1">Cannot exceed gross assets</p>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-800 text-[13px] mb-1.5">2. Debts (قرض)</label>
                        <input type="number" x-model.number="st.dbt" min="0" class="w-full bg-white border border-slate-200 text-slate-800 text-[13px] rounded-lg px-3 py-2 outline-none focus:border-brand-teal transition-colors" :class="errors.dbt ? 'border-red-500' : ''">
                        <p x-show="errors.dbt" class="text-[10px] text-red-500 mt-1">Cannot exceed remaining assets</p>
                    </div>
                    <div>
                        <label class="block font-bold text-slate-800 text-[13px] mb-1.5">3. Bequest (وصیت)</label>
                        <input type="number" x-model.number="st.was" min="0" class="w-full bg-white border border-slate-200 text-slate-800 text-[13px] rounded-lg px-3 py-2 outline-none focus:border-brand-teal transition-colors" :class="errors.was ? 'border-brand-gold' : ''">
                        <p class="text-[10px] mt-1" :class="errors.was ? 'text-brand-gold font-bold' : 'text-slate-500'">Max permitted: <span x-text="st.cur + ' ' + fmt(maxWasiyyat)"></span></p>
                    </div>
                </div>

                <!-- Live Net Status -->
                <div class="bg-brand-teal/5 border border-brand-teal/20 rounded-xl p-4 flex flex-col sm:flex-row justify-between items-center gap-2">
                    <span class="text-[13px] font-bold text-slate-700">Net Distributable Estate:</span>
                    <span class="text-xl font-extrabold text-brand-teal" x-text="st.cur + ' ' + fmt(netEstate)"></span>
                </div>

                <div class="pt-4 border-t border-slate-100 flex justify-between">
                    <button @click="goToStep(1)" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-lg text-sm transition-colors">Back</button>
                    <button @click="nextStep(3)" class="bg-brand-teal hover:bg-brand-teal/90 text-white font-bold py-2 px-5 rounded-lg text-sm transition-colors shadow-sm flex items-center gap-1" :class="errors.fun || errors.dbt ? 'opacity-50 cursor-not-allowed' : ''">
                        Next: Select Heirs <span class="material-symbols-outlined text-sm">arrow_forward</span>
                    </button>
                </div>
            </div>

            <!-- Step 3: Heirs Selection -->
            <div x-show="step === 3" x-transition.opacity style="display:none;">
                <div class="mb-4">
                    <p class="text-[11px] sm:text-xs text-slate-500">Select all surviving relatives. The system applies Fiqh exclusion (Hajb) rules automatically in real-time.</p>
                </div>
                
                <div class="space-y-4">
                    <template x-for="grp in visibleGroups" :key="grp.l">
                        <div>
                            <div class="bg-slate-50 border border-slate-100 text-[10px] font-bold uppercase tracking-widest text-slate-500 px-3 py-1.5 rounded-t-lg" x-text="grp.l"></div>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5 p-2.5 border border-t-0 border-slate-100 rounded-b-lg">
                                <template x-for="hd in grp.heirs" :key="hd.k">
                                    <div class="border rounded-lg p-2.5 flex flex-col relative transition-all cursor-pointer select-none"
                                         :class="hajb[hd.k] ? 'bg-slate-50 opacity-40 border-slate-200 cursor-not-allowed' : (st.heirs[hd.k].sel ? 'border-brand-teal bg-brand-teal/5 shadow-[0_0_0_1px_rgba(19,140,144,0.1)]' : 'bg-white border-slate-200 hover:border-slate-300')"
                                         @click="toggleHeir(hd.k)">
                                        
                                        <div class="flex justify-between items-start mb-0.5">
                                            <span class="text-[12px] font-bold text-slate-800 leading-tight" x-text="hd.l1"></span>
                                        </div>
                                        <span class="text-[10px] text-slate-500 font-arabic text-left mb-1 opacity-80 leading-relaxed" dir="rtl" x-text="hd.l2"></span>
                                        
                                        <div class="mt-auto flex items-end">
                                            <!-- Badges -->
                                            <span x-show="hajb[hd.k]" class="text-[9px] bg-red-100 text-red-700 px-1 py-0.5 rounded inline-block w-max font-bold">Excluded</span>
                                            <span x-show="!hajb[hd.k] && hd.cat==='q'" class="text-[9px] bg-brand-teal/10 text-brand-teal px-1.5 py-0.5 rounded inline-block w-max font-bold">Fard</span>
                                            <span x-show="!hajb[hd.k] && hd.cat==='r'" class="text-[9px] bg-brand-gold/10 text-brand-gold px-1.5 py-0.5 rounded inline-block w-max font-bold">Asabah</span>
                                            <span x-show="!hajb[hd.k] && hd.cat==='dh'" class="text-[9px] bg-purple-100 text-purple-700 px-1.5 py-0.5 rounded inline-block w-max font-bold">D.A.</span>
                                        </div>

                                        <!-- Multi-count controls -->
                                        <div x-show="!hajb[hd.k] && hd.multi && st.heirs[hd.k].sel" class="flex items-center gap-0.5 bg-white border border-brand-teal/30 shadow-sm rounded px-0.5 py-0.5 absolute bottom-2 right-2" @click.stop>
                                            <button @click="changeCount(hd.k, -1)" class="w-5 h-5 flex items-center justify-center text-slate-500 hover:text-brand-teal hover:bg-slate-50 rounded transition-colors" :disabled="st.heirs[hd.k].count <= 1">-</button>
                                            <span class="text-[11px] font-bold w-3 text-center text-brand-teal" x-text="st.heirs[hd.k].count"></span>
                                            <button @click="changeCount(hd.k, 1)" class="w-5 h-5 flex items-center justify-center text-slate-500 hover:text-brand-teal hover:bg-slate-50 rounded transition-colors">+</button>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Dynamic Exclusions Log -->
                <div x-show="exclusionNotes.length > 0" class="mt-4 space-y-1.5 p-3 rounded-lg border border-slate-100 bg-slate-50/50">
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mb-1">Active Rules</p>
                    <template x-for="note in exclusionNotes" :key="note.m">
                        <div class="px-2.5 py-1.5 rounded border text-[11px] leading-tight"
                             :class="note.t === 'w' ? 'bg-orange-50 border-orange-100 text-orange-800' : 'bg-blue-50 border-blue-100 text-blue-800'"
                             x-html="note.m"></div>
                    </template>
                </div>

                <div class="pt-4 mt-5 border-t border-slate-100 flex justify-between">
                    <button @click="goToStep(2)" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-lg text-sm transition-colors">Back</button>
                    <button @click="nextStep(4)" class="bg-brand-teal hover:bg-brand-teal/90 text-white font-bold py-2 px-5 rounded-lg text-sm transition-colors shadow-sm flex items-center gap-1">
                        Calculate Results <span class="material-symbols-outlined text-sm">calculate</span>
                    </button>
                </div>
            </div>

            <!-- Step 4: Results -->
            <div x-show="step === 4" x-transition.opacity style="display:none;">
                <template x-if="results">
                    <div class="space-y-5">
                        
                        <!-- Top Summary Cards -->
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-2.5">
                            <div class="bg-slate-50 border border-slate-100 rounded-lg p-2.5">
                                <div class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Gross Estate</div>
                                <div class="text-[13px] font-bold text-slate-800 mt-0.5" x-text="st.cur + ' ' + fmt(st.ta)"></div>
                            </div>
                            <div class="bg-slate-50 border border-slate-100 rounded-lg p-2.5">
                                <div class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Deductions</div>
                                <div class="text-[13px] font-bold text-slate-800 mt-0.5" x-text="st.cur + ' ' + fmt(st.fun + st.dbt + results.actualWas)"></div>
                            </div>
                            <div class="bg-brand-teal/10 border border-brand-teal/20 rounded-lg p-2.5">
                                <div class="text-[10px] text-brand-teal uppercase tracking-widest font-bold">Net Distributable</div>
                                <div class="text-[13px] font-extrabold text-brand-teal mt-0.5" x-text="st.cur + ' ' + fmt(results.net)"></div>
                            </div>
                            <div class="bg-slate-50 border border-slate-100 rounded-lg p-2.5">
                                <div class="text-[10px] text-slate-500 uppercase tracking-widest font-bold">Madhab Setting</div>
                                <div class="text-[13px] font-bold text-slate-800 mt-0.5" x-text="MI[st.m].n"></div>
                            </div>
                        </div>

                        <!-- Special Alert Banners -->
                        <div x-show="results.awl" class="bg-red-50 border border-red-100 text-red-800 text-[11.5px] px-3 py-2 rounded-lg flex items-start gap-2">
                            <span class="material-symbols-outlined text-[15px] mt-0.5 shrink-0">warning</span>
                            <div><strong>Awl (عَوْل) Applied:</strong> Fixed shares exceeded the full estate. All shares proportionately reduced (Tanzeel method).</div>
                        </div>
                        <div x-show="results.radd" class="bg-brand-gold/10 border border-brand-gold/20 text-slate-800 text-[11.5px] px-3 py-2 rounded-lg flex items-start gap-2">
                            <span class="material-symbols-outlined text-brand-gold text-[15px] mt-0.5 shrink-0">info</span>
                            <div><strong>Radd (رَدّ) Applied:</strong> Remaining estate redistributed back to eligible Quranic heirs.</div>
                        </div>

                        <!-- Visual Proportional Bar Graph -->
                        <div>
                            <div class="flex justify-between items-end mb-1.5">
                                <h3 class="font-bold text-slate-800 text-[13px]">Visual Layout</h3>
                            </div>
                            <div x-show="activeShares.length > 0" class="w-full flex h-8 rounded-md overflow-hidden border border-slate-200 shadow-inner">
                                <template x-for="(sh, i) in activeShares" :key="sh.k">
                                    <div class="h-full flex flex-col justify-center items-center text-white transition-all relative group border-r border-white/20 last:border-r-0 cursor-default"
                                         :class="getBarColor(i)"
                                         :style="'width: ' + sh.pct + '%'">
                                        <!-- Only show label if enough width -->
                                        <span class="text-[9px] font-bold whitespace-nowrap overflow-hidden px-1 tracking-wider" x-show="sh.pct >= 8" x-text="sh.lbl.split(' ')[0]"></span>
                                        <span class="text-[8px] font-bold opacity-80 leading-none" x-show="sh.pct >= 12" x-text="sh.pct.toFixed(1) + '%'"></span>
                                        
                                        <!-- Hover Tooltip -->
                                        <div class="hidden group-hover:flex flex-col items-center absolute bottom-full mb-1.5 left-1/2 -translate-x-1/2 bg-slate-800 text-white px-2 py-1.5 rounded z-20 shadow-lg pointer-events-none min-w-[max-content]">
                                            <span class="font-bold text-[11px] block" x-text="sh.lbl"></span>
                                            <span class="text-[10px] text-slate-300" x-text="sh.pct.toFixed(2) + '% • ' + st.cur + ' ' + fmt(sh.amt)"></span>
                                            <!-- Tiny triangle tail -->
                                            <div class="absolute top-full left-1/2 -translate-x-1/2 border-4 border-transparent border-t-slate-800"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                            <p x-show="activeShares.length === 0" class="text-[11px] text-slate-500 mt-2">No heirs assigned.</p>
                        </div>

                        <!-- Distribution List -->
                        <div>
                            <h3 class="font-bold text-slate-800 text-[13px] mb-2">Detailed Distribution</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-2.5">
                                <template x-for="sh in activeShares" :key="sh.k">
                                    <div class="border rounded-lg p-3 bg-white" :class="sh.isBM ? 'border-slate-200 bg-slate-50' : (sh.type === 'q' ? 'border-brand-teal/30' : 'border-brand-gold/30')">
                                        <div class="flex justify-between items-start mb-1.5">
                                            <span class="text-[13px] font-bold text-slate-800" x-text="sh.lbl"></span>
                                            <span class="text-[9px] font-bold px-1.5 py-0.5 rounded tracking-wide" 
                                                  :class="sh.type === 'q' ? 'bg-brand-teal/10 text-brand-teal' : (sh.type === 'r' ? 'bg-brand-gold/10 text-brand-gold' : 'bg-slate-200 text-slate-600')"
                                                  x-text="sh.pct.toFixed(2) + '%'"></span>
                                        </div>
                                        <div class="flex justify-between items-end mt-2">
                                            <div>
                                                <div class="text-[10px] text-slate-500 font-medium" x-text="'Share: ' + sh.fractionStr"></div>
                                                <div class="text-[10px] text-slate-500 mt-0.5" x-text="sh.count > 1 ? `Each: ${st.cur} ${fmt(sh.pp)}` : ''"></div>
                                            </div>
                                            <div class="text-[13px] font-extrabold text-slate-800" x-text="st.cur + ' ' + fmt(sh.amt)"></div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <!-- Compare View (Tabbed neatly) -->
                        <div class="mt-4 border border-slate-200 rounded-lg overflow-hidden no-print bg-white">
                            <button @click="showCompare = !showCompare" class="w-full bg-slate-50 p-2.5 text-left text-[11px] font-bold text-slate-700 flex justify-between items-center hover:bg-slate-100 transition-colors">
                                <span class="uppercase tracking-widest">Compare All 4 Fiqhi Schools</span>
                                <span class="material-symbols-outlined text-sm transition-transform" :class="showCompare ? 'rotate-180' : ''">expand_more</span>
                            </button>
                            <div x-show="showCompare" x-collapse>
                                <div class="p-0 border-t border-slate-200 overflow-x-auto">
                                    <table class="w-full text-left text-[11px]">
                                        <thead>
                                            <tr class="text-slate-500 bg-slate-50 uppercase tracking-widest border-b border-slate-100">
                                                <th class="py-2 px-3 font-bold">Heir / Item</th>
                                                <th class="py-2 px-2 font-bold text-center border-l border-slate-100">Hanafi</th>
                                                <th class="py-2 px-2 font-bold text-center border-l border-slate-100">Maliki</th>
                                                <th class="py-2 px-2 font-bold text-center border-l border-slate-100">Shafi'i</th>
                                                <th class="py-2 px-2 font-bold text-center border-l border-slate-100">Hanbali</th>
                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-slate-100">
                                            <template x-for="row in compareData" :key="row.k">
                                                <tr class="hover:bg-slate-50/50 transition-colors">
                                                    <td class="py-2.5 px-3 font-bold text-slate-700" x-text="row.lbl"></td>
                                                    <template x-for="(m, midx) in ['hanafi', 'maliki', 'shafii', 'hanbali']" :key="m">
                                                        <td class="py-2.5 px-2 text-center border-l border-slate-100">
                                                            <span :class="row.diff && row.vals[midx] !== '—' ? 'bg-brand-gold/10 text-brand-gold px-1.5 py-0.5 rounded font-bold' : 'text-slate-600'" x-text="row.vals[midx]"></span>
                                                        </td>
                                                    </template>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </template>

                 <!-- Disclaimer -->
                 <div class="mt-4 p-3 bg-slate-50 border border-slate-100 rounded-lg text-[10px] text-slate-500 leading-relaxed print-only:text-black">
                    <strong>Disclaimer:</strong> This tool performs mathematical distributions based on established Sunni Fiqh rules. It does not replace a fatwa. For final inheritance distribution, complex multi-generational cases, and legally disputed assets, please consult a certified Mufti or authorized Islamic court in your local jurisdiction.
                </div>

                <div class="pt-4 mt-5 border-t border-slate-100 flex justify-between no-print items-center">
                    <button @click="goToStep(3)" class="text-brand-teal hover:bg-brand-teal/5 font-bold py-2 px-3 rounded-lg text-xs transition-colors">← Edit Heirs</button>
                    <div class="flex gap-2">
                        <button @click="window.print()" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold py-2 px-4 rounded-lg text-xs transition-colors flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">print</span> Print Report
                        </button>
                        <button @click="window.location.reload()" class="bg-brand-teal hover:bg-brand-teal/90 text-white font-bold py-2 px-4 rounded-lg text-xs transition-colors shadow-sm flex items-center gap-1">
                            <span class="material-symbols-outlined text-[14px]">refresh</span> Start New
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
// ---------- CORE PURE MATH LOGIC ---------- //
function gcd(a,b) { a=Math.abs(a); b=Math.abs(b); while(b) { var t=b; b=a%b; a=t; } return a||1; }
function F(n,d) {
    if(d===undefined) d=1;
    n=Math.round(n*1e9)/1e9; d=Math.round(d*1e9)/1e9;
    if(!isFinite(n)||!isFinite(d)||d===0) return F(0,1);
    var g=gcd(Math.abs(n),Math.abs(d));
    var fn=(d<0?-n:n)/g, fd=Math.abs(d)/g;
    fn=Math.round(fn); fd=Math.round(fd);
    return {
        n:fn, d:fd,
        add: function(b){ return F(fn*b.d+b.n*fd, fd*b.d); },
        sub: function(b){ return F(fn*b.d-b.n*fd, fd*b.d); },
        mul: function(b){ return F(fn*b.n, fd*b.d); },
        div: function(b){ return (!b||b.n===0)?F(0,1):F(fn*b.d, fd*b.n); },
        toD: function(){ return fn/fd; },
        toS: function(){ return fd===1?''+fn:fn+'/'+fd; },
        isZ: function(){ return fn===0; },
        gt: function(b){ return fn*b.d>b.n*fd; },
        gte: function(b){ return fn*b.d>=b.n*fd; },
        lte: function(b){ return fn*b.d<=b.n*fd; }
    };
}
const ONE = F(1), ZERO = F(0);

const MI = {
  hanafi: {n:'Hanafi', ar:'حنفی', reg:'PK, IN, BD, TR', radd:'Radd to ALL', dadi_f:'Allows Dadi + Father (1/6)', mu:'Yes', note:'Uses Istihsaan.'},
  maliki: {n:'Maliki', ar:'مالکی', reg:'North Africa', radd:'NOT to spouse', dadi_f:'Father excludes Dadi', mu:'Yes', note:'Based on Ahl al-Madina.'},
  shafii: {n:"Shafi'i", ar:'شافعی', reg:'SE Asia, EG', radd:'NOT to spouse', dadi_f:'Father excludes Dadi', mu:'No', note:"Heavy Qiyas reliance."},
  hanbali: {n:'Hanbali', ar:'حنبلی', reg:'KSA, Gulf', radd:'To all (Ibn Qudama)', dadi_f:'Father excludes Dadi', mu:'No', note:'Literal Hadith base.'}
};

const HD = [
  {k:'shohar',l1:'Shohar (Husband)',l2:'الزوج',cat:'q',gl:'mf'},
  {k:'biwi',l1:'Biwi (Wife)',l2:'الزوجة',cat:'q',gl:'mm',multi:true},
  {k:'beta',l1:'Beta (Son)',l2:'الابن',cat:'r',multi:true},
  {k:'beti',l1:'Beti (Daughter)',l2:'البنت',cat:'q',multi:true},
  {k:'ibn_ibn',l1:'Pota (Grandson)',l2:'ابن الابن',cat:'r',multi:true},
  {k:'bint_ibn',l1:'Poti (Granddaughter)',l2:'بنت الابن',cat:'q',multi:true},
  {k:'baap',l1:'Baap (Father)',l2:'الأب',cat:'q'},
  {k:'maa',l1:'Maa (Mother)',l2:'الأم',cat:'q'},
  {k:'dada',l1:'Dada (Pat. GF)',l2:'الجد',cat:'r'},
  {k:'dadi',l1:'Dadi (Pat. GM)',l2:'الجدة',cat:'q'},
  {k:'nana',l1:'Nana (Mat. GF)',l2:'الجد لأم',cat:'dh'},
  {k:'nani',l1:'Nani (Mat. GM)',l2:'الجدة لأم',cat:'q'},
  {k:'akh_shaqiq',l1:'Full Bhai',l2:'الأخ الشقيق',cat:'r',multi:true},
  {k:'ukht_shaqiqa',l1:'Full Behan',l2:'الأخت الشقيقة',cat:'q',multi:true},
  {k:'akh_abi',l1:'Half Bhai (Pat)',l2:'الأخ لأب',cat:'r',multi:true},
  {k:'ukht_abiyya',l1:'Half Behan (Pat)',l2:'الأخت لأب',cat:'q',multi:true},
  {k:'akh_ummi',l1:'Uteri Bhai',l2:'الأخ لأم',cat:'q',multi:true},
  {k:'ukht_ummiyya',l1:'Uteri Behan',l2:'الأخت لأم',cat:'q',multi:true},
  {k:'ibn_akh_shaqiq',l1:'Bhatija (Full)',l2:'ابن الأخ',cat:'r',multi:true},
  {k:'ibn_akh_abi',l1:'Bhatija (Pat)',l2:'ابن الأخ لأب',cat:'r',multi:true},
  {k:'amm_shaqiq',l1:'Chacha (Full)',l2:'العم الشقيق',cat:'r',multi:true},
  {k:'amm_abi',l1:'Chacha (Pat)',l2:'العم لأب',cat:'r',multi:true},
  {k:'ibn_amm_shaqiq',l1:'Cousin (Full)',l2:'ابن العم الشقيق',cat:'r',multi:true},
  {k:'ibn_amm_abi',l1:'Cousin (Pat)',l2:'ابن العم لأب',cat:'r',multi:true},
];

const GROUPS = [
  {l:'Spouse', keys:['shohar','biwi']}, {l:'Children', keys:['beta','beti']},
  {l:'Grandchildren', keys:['ibn_ibn','bint_ibn']}, {l:'Parents', keys:['baap','maa']},
  {l:'Grandparents', keys:['dada','dadi','nana','nani']},
  {l:'Siblings', keys:['akh_shaqiq','ukht_shaqiqa','akh_abi','ukht_abiyya','akh_ummi','ukht_ummiyya']},
  {l:'Nephews', keys:['ibn_akh_shaqiq','ibn_akh_abi']}, {l:'Uncles & Cousins', keys:['amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi']}
];

function computeHajb(madhab, h) {
  var has = function(k){ return !!(h[k]&&h[k].sel&&h[k].count>0); };
  var excl = {};
  var hasBeta = has('beta'), hasIbnIbn = has('ibn_ibn');
  var hasBaap = has('baap'), hasMaa = has('maa'), hasDada = has('dada');

  if(hasBeta) ['ibn_ibn','bint_ibn','akh_shaqiq','ukht_shaqiqa','akh_abi','ukht_abiyya','akh_ummi','ukht_ummiyya','ibn_akh_shaqiq','ibn_akh_abi','amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi','nana'].forEach(k=>excl[k]=true);
  if(hasIbnIbn&&!hasBeta) ['akh_shaqiq','ukht_shaqiqa','akh_abi','ukht_abiyya','akh_ummi','ukht_ummiyya','ibn_akh_shaqiq','ibn_akh_abi','amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi','nana'].forEach(k=>excl[k]=true);
  if(hasBaap) { 
      excl['dada']=true; 
      ['akh_shaqiq','ukht_shaqiqa','akh_abi','ukht_abiyya','ibn_akh_shaqiq','ibn_akh_abi','amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi','nana'].forEach(k=>excl[k]=true); 
      if(madhab!=='hanafi') excl['dadi']=true; 
  }
  if(hasMaa) { excl['nani']=true; excl['nana']=true; }
  if(hasDada&&!hasBaap&&!hasBeta&&!hasIbnIbn) ['akh_shaqiq','ukht_shaqiqa','akh_abi','ukht_abiyya','ibn_akh_shaqiq','ibn_akh_abi','amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  if(has('akh_shaqiq')) ['akh_abi','ibn_akh_shaqiq','ibn_akh_abi','amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  if(has('ibn_akh_shaqiq')) ['amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  if(has('ibn_akh_abi')) ['amm_shaqiq','amm_abi','ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  if(has('amm_shaqiq')) ['amm_abi','ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  if(has('amm_abi')) ['ibn_amm_shaqiq','ibn_amm_abi'].forEach(k=>excl[k]=true);
  return excl;
}

function computeShares(config) {
  var madhab=config.m, h=config.heirs;
  var excl=computeHajb(madhab, h);
  var has=function(k){return !!(h[k]&&h[k].sel&&h[k].count>0&&!excl[k]);};
  var cnt=function(k){return has(k)?h[k].count:0;};

  var gross=Math.max(0,parseFloat(config.ta)||0);
  var fun=Math.max(0,parseFloat(config.fun)||0);
  var dbt=Math.max(0,parseFloat(config.dbt)||0);
  var was=Math.max(0,parseFloat(config.was)||0);

  var actualWas=Math.min(was, Math.max(0, gross-fun-dbt)/3);
  var net=Math.max(0, gross-fun-dbt-actualWas);

  var hasBeta=has('beta'), hasIbnIbn=has('ibn_ibn'), hasBeti=has('beti'), hasBintIbn=has('bint_ibn');
  var hasMaleDesc=hasBeta||hasIbnIbn, hasAnyDesc=hasMaleDesc||hasBeti||hasBintIbn;
  var hasBaap=has('baap'), hasMaa=has('maa'), hasDada=has('dada'), hasDadi=has('dadi'), hasNani=has('nani');
  var hasShohar=config.g==='female'&&has('shohar'), hasBiwi=config.g==='male'&&has('biwi');
  var hasAkhShaqiq=has('akh_shaqiq'), hasUkhtShaqiqa=has('ukht_shaqiqa');
  var hasAkhAbi=has('akh_abi'), hasUkhtAbiyya=has('ukht_abiyya');
  var hasAkhUmmi=has('akh_ummi'), hasUkhtUmmiyya=has('ukht_ummiyya');
  var uterineOk=!hasAnyDesc&&!hasBaap&&!hasDada;

  var sh={};
  function add(k,f,lbl,c,type){ if(!sh[k])sh[k]={f:ZERO,cnt:1,lbl:lbl,type:type||'q',k:k}; sh[k].f=sh[k].f.add(f); if(c)sh[k].cnt=c; }

  if(hasShohar) add('shohar', hasAnyDesc?F(1,4):F(1,2), 'Shohar', 1, 'q');
  if(hasBiwi)   add('biwi',   hasAnyDesc?F(1,8):F(1,4), 'Biwi ×'+cnt('biwi'), cnt('biwi'), 'q');

  if(hasMaa) {
    var mulSib=(cnt('akh_shaqiq')+cnt('ukht_shaqiqa')+cnt('akh_abi')+cnt('ukht_abiyya'))>=2;
    add('maa', hasAnyDesc||mulSib?F(1,6):F(1,3), 'Maa', 1, 'q');
  }

  if(hasBaap) { add('baap', F(1,6), 'Baap', 1, 'q'); sh._baapRes = !hasMaleDesc; }
  if(hasDada&&!hasBaap) { add('dada', F(1,6), 'Dada', 1, 'r'); sh._dadaRes=true; }

  if(hasDadi){
    var dadaExclByFather=(madhab!=='hanafi')&&hasBaap;
    if(!hasMaa&&!dadaExclByFather){
      if(hasNani){ add('dadi',F(1,12),'Dadi',1,'q'); add('nani',F(1,12),'Nani',1,'q'); } else { add('dadi',F(1,6),'Dadi',1,'q'); }
    }
  } else if(hasNani&&!hasMaa){ add('nani',F(1,6),'Nani',1,'q'); }

  if(hasBeti&&!hasBeta&&!hasIbnIbn) add('beti', cnt('beti')===1?F(1,2):F(2,3), 'Beti ×'+cnt('beti'), cnt('beti'), 'q');
  if(hasBintIbn&&!hasBeta&&!hasIbnIbn){
    if(!hasBeti) add('bint_ibn', cnt('bint_ibn')===1?F(1,2):F(2,3), 'Poti ×'+cnt('bint_ibn'), cnt('bint_ibn'), 'q');
    else if(cnt('beti')===1) add('bint_ibn', F(1,6), 'Poti (Takmila)', cnt('bint_ibn'), 'q');
  }

  if(uterineOk&&(hasAkhUmmi||hasUkhtUmmiyya)){
    var uc=cnt('akh_ummi')+cnt('ukht_ummiyya');
    var uf=uc===1?F(1,6):F(1,3), upu=uf.div(F(uc));
    if(hasAkhUmmi) add('akh_ummi', upu.mul(F(cnt('akh_ummi'))), 'Uteri Bhai ×'+cnt('akh_ummi'), cnt('akh_ummi'),'q');
    if(hasUkhtUmmiyya) add('ukht_ummiyya', upu.mul(F(cnt('ukht_ummiyya'))), 'Uteri Behan ×'+cnt('ukht_ummiyya'), cnt('ukht_ummiyya'),'q');
  }

  var sisterFardOk=!hasMaleDesc&&!hasBaap&&!hasDada;
  if(hasUkhtShaqiqa&&!hasAkhShaqiq&&sisterFardOk&&!hasBeti&&!hasBintIbn) add('ukht_shaqiqa', cnt('ukht_shaqiqa')===1?F(1,2):F(2,3), 'Full Behan ×'+cnt('ukht_shaqiqa'), cnt('ukht_shaqiqa'), 'q');
  if(hasUkhtAbiyya&&!hasAkhShaqiq&&!hasAkhAbi&&!hasUkhtShaqiqa&&sisterFardOk&&!hasBeti&&!hasBintIbn) add('ukht_abiyya', cnt('ukht_abiyya')===1?F(1,2):F(2,3), 'Half Behan (Pat) ×'+cnt('ukht_abiyya'), cnt('ukht_abiyya'), 'q');

  var fixedTot=ZERO;
  Object.keys(sh).forEach(k=>{if(!k.startsWith('_')&&sh[k]&&sh[k].f) fixedTot=fixedTot.add(sh[k].f);});
  var residue=ONE.sub(fixedTot); if(residue.n<0) residue=ZERO;

  if(!residue.isZ()){
    if(hasBeta){
      var sons=cnt('beta'), daus=hasBeti?cnt('beti'):0, units=sons*2+daus, pu=residue.div(F(units));
      sh['beta']={f:pu.mul(F(2)),cnt:sons,lbl:'Beta ×'+sons,type:'r',k:'beta'};
      if(hasBeti) sh['beti']={f:pu,cnt:daus,lbl:'Beti ×'+daus,type:'r',k:'beti'}; residue=ZERO;
    } else if(hasIbnIbn){
      var gs=cnt('ibn_ibn'), gd=hasBintIbn?cnt('bint_ibn'):0, gu=gs*2+gd, gpu=residue.div(F(gu));
      sh['ibn_ibn']={f:gpu.mul(F(2)),cnt:gs,lbl:'Pota ×'+gs,type:'r',k:'ibn_ibn'};
      if(hasBintIbn&&!sh['bint_ibn']) sh['bint_ibn']={f:gpu,cnt:gd,lbl:'Poti ×'+gd,type:'r',k:'bint_ibn'}; residue=ZERO;
    } else if(hasBaap&&sh._baapRes&&sh['baap']){ sh['baap'].f=sh['baap'].f.add(residue); residue=ZERO;
    } else if(hasDada&&!hasBaap&&sh['dada']){ sh['dada'].f=sh['dada'].f.add(residue); residue=ZERO;
    } else if(hasAkhShaqiq){
      var fb=cnt('akh_shaqiq'), fs=hasUkhtShaqiqa?cnt('ukht_shaqiqa'):0, fu=fb*2+fs, fpu=residue.div(F(fu));
      sh['akh_shaqiq']={f:fpu.mul(F(2)),cnt:fb,lbl:'Full Bhai ×'+fb,type:'r',k:'akh_shaqiq'};
      if(hasUkhtShaqiqa) sh['ukht_shaqiqa']={f:fpu,cnt:fs,lbl:'Full Behan ×'+fs,type:'r',k:'ukht_shaqiqa'}; residue=ZERO;
    } else if(hasUkhtShaqiqa&&(hasBeti||hasBintIbn)){ sh['ukht_shaqiqa']={f:residue,cnt:cnt('ukht_shaqiqa'),lbl:"Full Behan (Asabah ma'al Ghair) ×"+cnt('ukht_shaqiqa'),type:'r',k:'ukht_shaqiqa'}; residue=ZERO;
    } else if(hasAkhAbi){
      var hb=cnt('akh_abi'), hs=hasUkhtAbiyya?cnt('ukht_abiyya'):0, hu=hb*2+hs, hpu=residue.div(F(hu));
      sh['akh_abi']={f:hpu.mul(F(2)),cnt:hb,lbl:'Half Bhai (Pat) ×'+hb,type:'r',k:'akh_abi'};
      if(hasUkhtAbiyya) sh['ukht_abiyya']={f:hpu,cnt:hs,lbl:'Half Behan (Pat) ×'+hs,type:'r',k:'ukht_abiyya'}; residue=ZERO;
    } else if(hasUkhtAbiyya&&(hasBeti||hasBintIbn)){ sh['ukht_abiyya']={f:residue,cnt:cnt('ukht_abiyya'),lbl:'Half Behan (Pat)',type:'r',k:'ukht_abiyya'}; residue=ZERO;
    } else {
      var chain=[['ibn_akh_shaqiq','Full Bhatija'],['ibn_akh_abi','Pat Bhatija'],['amm_shaqiq','Full Chacha'],['amm_abi','Pat Chacha'],['ibn_amm_shaqiq','Full Cousin'],['ibn_amm_abi','Pat Cousin']];
      for(var ci=0;ci<chain.length;ci++){var ck=chain[ci][0]; if(has(ck)){ sh[ck]={f:residue,cnt:cnt(ck),lbl:chain[ci][1]+' ×'+cnt(ck),type:'r',k:ck}; residue=ZERO; break; }}
    }
  }

  var gt=ZERO; Object.keys(sh).forEach(k=>{if(!k.startsWith('_')&&sh[k]&&sh[k].f) gt=gt.add(sh[k].f);});
  var awl=false, radd=false;

  if(gt.gt(ONE)){
    awl=true; Object.keys(sh).forEach(k=>{if(!k.startsWith('_')&&sh[k]&&sh[k].f) sh[k].f=sh[k].f.div(gt);});
    gt=ONE;
  }

  var rem=ONE.sub(gt);
  if(!rem.isZ()&&rem.gt(ZERO)){
    var eligKeys=Object.keys(sh).filter(k=>!k.startsWith('_')&&sh[k]&&sh[k].f&&!sh[k].f.isZ()&&(madhab==='hanbali'||(k!=='shohar'&&k!=='biwi')));
    if(eligKeys.length>0){
      radd=true; var eligTot=ZERO; eligKeys.forEach(k=>eligTot=eligTot.add(sh[k].f));
      if(!eligTot.isZ()) eligKeys.forEach(k=>sh[k].f=sh[k].f.add(sh[k].f.div(eligTot).mul(rem)));
    } else { sh['_baytulmal']={f:rem,cnt:1,lbl:'Bayt-ul-Mal (Treasury)',type:'bm',k:'_baytulmal',isBM:true}; }
  }

  var anyHeir=Object.keys(sh).filter(k=>!k.startsWith('_')&&sh[k]&&sh[k].f&&!sh[k].f.isZ()).length>0;
  if(!anyHeir) sh['_baytulmal']={f:ONE,cnt:1,lbl:'Bayt-ul-Mal (Treasury)',type:'bm',k:'_baytulmal',isBM:true};

  Object.keys(sh).forEach(k=>{
    if(k.startsWith('_')&&k!=='_baytulmal') return;
    if(!sh[k]||!sh[k].f) return;
    sh[k].amt=sh[k].f.toD()*net;
    if(sh[k].cnt>1) sh[k].pp=sh[k].amt/sh[k].cnt;
  });

  return { shares:sh, net:net, awl:awl, radd:radd, actualWas:actualWas };
}

// Smart Percentage Distribution (Always exactly 100%)
function smartPct(shares) {
  var keys=Object.keys(shares).filter(k=>shares[k]&&shares[k].f&&!shares[k].f.isZ());
  if(!keys.length) return {};
  var raws={}; keys.forEach(k=>raws[k]=shares[k].f.toD()*100);
  var floored={}; keys.forEach(k=>floored[k]=Math.floor(raws[k]*100)/100);
  var tot=keys.reduce((a,k)=>a+floored[k],0);
  var rem=Math.round((100-tot)*100);
  var sorted=keys.slice().sort((a,b)=>(raws[b]-floored[b])-(raws[a]-floored[a]));
  var res={}; keys.forEach(k=>res[k]=floored[k]);
  for(var i=0;i<sorted.length&&rem>0;i++){res[sorted[i]]=Math.round((res[sorted[i]]+0.01)*100)/100;rem--;}
  return res;
}

// ---------- ALPINE JS COMPONENT ---------- //
document.addEventListener('alpine:init', () => {
    Alpine.data('wirasatApp', () => ({
        step: 1,
        maxStepReached: 1,
        MI: MI, HD: HD, GROUPS: GROUPS,
        
        st: { m: 'hanafi', g: 'male', ta: 1000000, fun: 0, dbt: 0, was: 0, cur: 'PKR', heirs: {} },
        hajb: {},
        results: null,
        activeShares: [],
        showCompare: false,
        compareData: [],

        initApp() {
            this.HD.forEach(h => { this.st.heirs[h.k] = { sel: false, count: 1 }; });
            this.updateFilters();
        },

        get netEstate() {
            var gross = Math.max(0, this.st.ta || 0);
            var afterFun = Math.max(0, gross - (this.st.fun || 0));
            var afterDbt = Math.max(0, afterFun - (this.st.dbt || 0));
            var actualWas = Math.min((this.st.was || 0), afterDbt / 3);
            return Math.max(0, afterDbt - actualWas);
        },

        get maxWasiyyat() {
            var gross = Math.max(0, this.st.ta || 0);
            var afterFun = Math.max(0, gross - (this.st.fun || 0));
            var afterDbt = Math.max(0, afterFun - (this.st.dbt || 0));
            return afterDbt / 3;
        },

        get errors() {
            var gross = Math.max(0, this.st.ta || 0);
            var afterFun = Math.max(0, gross - (this.st.fun || 0));
            return {
                fun: (this.st.fun || 0) > gross,
                dbt: (this.st.dbt || 0) > afterFun,
                was: (this.st.was || 0) > (afterFun - Math.max(0, this.st.dbt || 0)) / 3
            };
        },

        get visibleGroups() {
            return this.GROUPS.map(grp => {
                var visibleHeirs = grp.keys.map(k => this.HD.find(h => h.k === k)).filter(h => {
                    if(!h) return false;
                    if(h.gl === 'mf' && this.st.g !== 'female') return false;
                    if(h.gl === 'mm' && this.st.g !== 'male') return false;
                    return true;
                });
                return { l: grp.l, heirs: visibleHeirs };
            }).filter(g => g.heirs.length > 0);
        },

        get exclusionNotes() {
            var notes = [];
            var h = this.st.heirs;
            var has = (k) => !!(h[k] && h[k].sel && h[k].count > 0);
            if(has('beta')) notes.push({t:'w', m:'<strong>Hajb التام:</strong> Son present — Grandsons, siblings, and uncles completely excluded.'});
            if(has('baap')){
                var dadimsg = this.st.m === 'hanafi' ? 'Hanafi: Dadi gets 1/6.' : 'Dadi excluded by Father in '+this.MI[this.st.m].n+'.';
                notes.push({t:'i', m:'<strong>Hajb (Father):</strong> Grandfather, siblings, nephews excluded. ' + dadimsg});
            }
            if(has('maa')) notes.push({t:'i', m:'<strong>Hajb (Mother):</strong> Maternal & Paternal Grandmothers (Nani & Dadi) excluded.'});
            if(has('biwi') && h.biwi.count > 1) notes.push({t:'i', m:'<strong>Ta\'addud Zaujaat:</strong> Combined wife share is split equally among ' + h.biwi.count + ' wives.'});
            return notes;
        },

        updateFilters() {
            Object.keys(this.st.heirs).forEach(k => {
                var def = this.HD.find(x => x.k === k);
                if(def && def.gl === 'mf' && this.st.g !== 'female' && this.st.heirs[k].sel) this.st.heirs[k].sel = false;
                if(def && def.gl === 'mm' && this.st.g !== 'male' && this.st.heirs[k].sel) this.st.heirs[k].sel = false;
            });
            this.hajb = computeHajb(this.st.m, this.st.heirs);
        },

        toggleHeir(k) {
            if(this.hajb[k]) return;
            this.st.heirs[k].sel = !this.st.heirs[k].sel;
            if(this.st.heirs[k].sel && this.st.heirs[k].count < 1) this.st.heirs[k].count = 1;
            if(!this.st.heirs[k].sel) this.st.heirs[k].count = 0;
            this.updateFilters();
        },

        changeCount(k, delta) {
            if(this.hajb[k]) return;
            let n = this.st.heirs[k].count + delta;
            this.st.heirs[k].count = Math.max(1, n);
            this.updateFilters();
        },

        goToStep(s) {
            if(s === 2 && (this.errors.fun || this.errors.dbt)) return;
            if(s === 4) this.calculate();
            
            this.step = s;
            this.maxStepReached = Math.max(this.maxStepReached, this.step);
            
            setTimeout(() => {
                if(window.innerWidth < 640) window.scrollTo({top: 0, behavior: 'smooth'});
            }, 50);
        },

        nextStep(s) {
            if(s === 3 && (this.errors.fun || this.errors.dbt)) return;
            this.goToStep(s);
        },

        calculate() {
            var rawConfig = JSON.parse(JSON.stringify(this.st)); 
            this.results = computeShares(rawConfig);
            var pmap = smartPct(this.results.shares);
            
            this.activeShares = Object.keys(this.results.shares)
                .filter(k => !k.startsWith('_') || k === '_baytulmal')
                .filter(k => this.results.shares[k].f && !this.results.shares[k].f.isZ())
                .map(k => {
                    var sh = this.results.shares[k];
                    return {
                        ...sh,
                        pct: pmap[k] || 0,
                        fractionStr: sh.f.toS()
                    };
                })
                .sort((a,b) => b.pct - a.pct);
                
            this.buildCompare(rawConfig);
        },

        buildCompare(conf) {
            var madhabs = ['hanafi', 'maliki', 'shafii', 'hanbali'];
            var resultsM = {};
            var allKeys = new Set();
            
            madhabs.forEach(m => {
                var cfg = { ...conf, m: m };
                resultsM[m] = computeShares(cfg);
                var pm = smartPct(resultsM[m].shares);
                Object.keys(resultsM[m].shares).forEach(k => {
                    if((!k.startsWith('_') || k === '_baytulmal') && !resultsM[m].shares[k].f.isZ()) {
                        resultsM[m].shares[k]._pct = pm[k] || 0;
                        allKeys.add(k);
                    }
                });
            });

            var compareRows = [];
            allKeys.forEach(k => {
                var vals = madhabs.map(m => {
                    var sh = resultsM[m].shares[k];
                    return sh && !sh.f.isZ() ? sh._pct.toFixed(2) + '%' : '—';
                });
                var allSame = vals.every(v => v === vals[0]);
                var lbl = madhabs.map(m => resultsM[m].shares[k]?.lbl).find(l => !!l) || k;
                
                compareRows.push({ k:k, lbl: lbl, vals: vals, diff: !allSame });
            });
            this.compareData = compareRows;
        },

        fmt(n) {
            return Math.round(n).toLocaleString();
        },

        getBarColor(index) {
            const colors = ['bg-[#0F6E56]', 'bg-[#185FA5]', 'bg-[#C7681C]', 'bg-[#0E686A]', 'bg-[#A32D2D]', 'bg-[#5F5E5A]'];
            return colors[index % colors.length];
        }
    }));
});
</script>
@endsection
