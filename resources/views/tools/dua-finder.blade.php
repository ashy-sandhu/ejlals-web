@extends('layouts.app')

@section('title', 'Situational Dua Finder – Authentic Islamic Duas for Every Moment | Ejlals')

@section('json_ld')
    @php
        // FAQ Schema Data
        $faqSchema = [
            "@context" => "https://schema.org",
            "@type" => "FAQPage",
            "mainEntity" => [
                [
                    "@type" => "Question",
                    "name" => "What is the best dua for anxiety and stress?",
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => "The Prophet ﷺ regularly recited the comprehensive dua from Sahih al-Bukhari 6369, seeking refuge from anxiety, sorrow, weakness, laziness, miserliness, cowardice, debt and being overpowered."
                    ]
                ],
                [
                    "@type" => "Question",
                    "name" => "What is Dua-e-Yunus and when should I read it?",
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => "Dua-e-Yunus (La ilaha illa anta subhanaka inni kuntu minaz-zalimin) was made by Prophet Yunus (AS) from inside the whale. It is recommended for extreme sadness, hopelessness, or any situation where you feel completely trapped."
                    ]
                ],
                [
                    "@type" => "Question",
                    "name" => "Is there a dua for loneliness?",
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => "Yes. The dua: Ya Hayyu ya Qayyum bi-rahmatika astaghith, aslih li sha'ni kullahu wa la takilni ila nafsi tarfata ayn is deeply recommended for feeling alone or overwhelmed."
                    ]
                ],
                [
                    "@type" => "Question",
                    "name" => "Can duas be read in English?",
                    "acceptedAnswer" => [
                        "@type" => "Answer",
                        "text" => "Yes. Allah ﷻ hears and responds to all sincere supplications in any language. The Arabic duas from Quran and Sunnah carry original blessing, but praying in your own language is fully valid."
                    ]
                ]
            ]
        ];

        // WebApplication Schema Data
        $appSchema = [
            "@context" => "https://schema.org",
            "@type" => "WebApplication",
            "name" => "Situational Dua Finder",
            "url" => route('tools.dua-finder'),
            "applicationCategory" => "EducationalApplication",
            "operatingSystem" => "All",
            "abstract" => "Find authentic duas from Quran and Sunnah based on your current emotion or situation.",
            "offers" => [
                "@type" => "Offer",
                "price" => "0",
                "priceCurrency" => "USD"
            ]
        ];

        // Breadcrumb Schema
        $breadcrumbSchema = \App\Traits\HasSeoSchema::generateBreadcrumbs([
            ['name' => 'Situational Dua Finder', 'url' => route('tools.dua-finder')]
        ]);
    @endphp

    {!! \App\Traits\HasSeoSchema::renderJsonLd($faqSchema) !!}
    {!! \App\Traits\HasSeoSchema::renderJsonLd($appSchema) !!}
    {!! \App\Traits\HasSeoSchema::renderJsonLd($breadcrumbSchema) !!}
@endsection

@section('content')
<!-- START OF EXACT DATA FROM situational Dua_Tool.html -->
<style>
.dua-body-full {
  --g1:#054a30;--g2:#065f46;--g3:#0d7a57;--g4:#10b981;
  --gold:#c8973a;--gold-lt:#fef3c7;--gold-pale:#fffbf0;
  --ivory:#faf8f3;--parch:#f4f0e6;--cream:#fffef9;
  --ink:#1c1c1e;--ink2:#374151;--muted:#6b7280;--border:#e8e2d6;
  --card:#ffffff;
  --sh1:0 2px 10px rgba(5,74,48,.07);
  --sh2:0 8px 32px rgba(5,74,48,.11);
  --sh3:0 20px 64px rgba(5,74,48,.15);
  --r:14px;--rs:8px;
  --ease:all .28s cubic-bezier(.4,0,.2,1);
  font-family:'Inter',sans-serif;
  background:var(--ivory);
  color:var(--ink);
  padding-bottom: 0;
  position: relative;
  overflow: hidden;
}
.dua-body-full .page{max-width:880px;margin:0 auto;padding:0 20px 0;position:relative;z-index:10}

/* Adjustable Background Watermarks */
.watermark-bg {
  position: absolute; top: 0; left: 0; right: 0; bottom: 0;
  overflow: hidden; pointer-events: none; z-index: 0;
}
.wm-img {
  position: absolute;
  /* Adjust this variable to make images lighter or darker (e.g. 0.03 to 0.15) */
  opacity: var(--wm-opacity, 0.20);
  mix-blend-mode: multiply;
}
.wm-1 {
  top: var(--wm1-top, 2%);
  left: var(--wm1-left, 2%);
  width: var(--wm1-size, 400px);
}
.wm-2 {
  top: var(--wm2-top, 35%);
  right: var(--wm2-right, 10%);
  width: var(--wm2-size, 450px);
}
.wm-3 {
  bottom: var(--wm3-bottom, 0%);
  left: var(--wm3-left, 0%);
  width: var(--wm3-size, 350px);
}

.dua-body-full .hero{text-align:center;padding:8px; position: relative;}
.dua-body-full .badge{display:inline-flex;align-items:center;gap:7px;background:linear-gradient(135deg,var(--g1),var(--g3));color:#fff;font-size:.72rem;font-weight:600;letter-spacing:.1em;text-transform:uppercase;padding:5px 16px;border-radius:999px;margin-bottom:12px;box-shadow:0 4px 14px rgba(5,74,48,.25)}
.dua-body-full .hero h1{font-family:'Playfair Display',serif;font-size:clamp(1.75rem,5vw,2.5rem);font-weight:700;color:var(--g1);line-height:1.15;margin-bottom:8px}
.dua-body-full .hero h1 em{font-style:italic;color:var(--gold)}
.dua-body-full .hero-sub{font-size:clamp(0.875rem,2vw,1rem);color:var(--muted);max-width:500px;margin:0 auto 16px;line-height:1.5}
.dua-body-full .bismillah{display:none;}
.dua-body-full .tab-row{display:flex;flex-wrap:wrap;justify-content:center;gap:8px;margin-bottom:20px}
.dua-body-full .tab{background:var(--parch);border:1.5px solid var(--border);border-radius:999px;padding:10px 22px;font-family:'Inter',sans-serif;font-size:.88rem;font-weight:500;color:var(--muted);cursor:pointer;transition:var(--ease);white-space:nowrap}
.dua-body-full .tab.on{background:linear-gradient(135deg,var(--g1),var(--g2));border-color:transparent;color:#fff;box-shadow:0 5px 18px rgba(5,74,48,.3)}
.dua-body-full .tab:hover:not(.on){color:var(--g2);border-color:var(--g3);background:#fff}
.dua-body-full .panel{display:none}.dua-body-full .panel.on{display:block}
.dua-body-full .panel-label{text-align:center;font-size:.72rem;font-weight:700;letter-spacing:.12em;text-transform:uppercase;color:var(--gold);margin-bottom:16px}
.dua-body-full .grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(min(100%, 190px),1fr));gap:10px;margin-bottom:32px}
.dua-body-full .btn{background:var(--card);border:1.5px solid var(--border);border-radius:var(--r);padding:12px;font-family:'Inter',sans-serif;font-size:0.875rem;font-weight:500;color:var(--ink2);cursor:pointer;text-align:left;transition:var(--ease);display:flex;align-items:flex-start;gap:10px;box-shadow:var(--sh1);line-height:1.3;hyphens:auto;word-break:break-word;overflow-wrap:anywhere}
.dua-body-full .btn:hover{border-color:var(--g4);color:var(--g1);transform:translateY(-2px);box-shadow:var(--sh2)}
.dua-body-full .btn.sel{border-color:var(--g2);background:linear-gradient(135deg,#f0fdf8 0%,#fff 100%);color:var(--g1);box-shadow:0 0 0 3px rgba(16,185,129,.18),var(--sh2)}
.dua-body-full .btn-ic{font-size:1.2rem;flex-shrink:0;margin-top:2px}
.dua-body-full .btn-txt{display:flex;flex-direction:column;min-width:0}
.dua-body-full .btn-name{font-weight:600;font-size:clamp(0.8rem, 2.5vw, 0.875rem)}
.dua-body-full .btn-sub{font-size:clamp(0.65rem, 2vw, 0.73rem);color:var(--muted);margin-top:2px;font-weight:400;line-height:1.3}
.dua-body-full .card{background:var(--cream);border-radius:22px;padding:clamp(24px,5vw,52px);box-shadow:var(--sh3);display:none;position:relative;overflow:hidden;border:1px solid rgba(200,151,58,.18);animation:cIn .42s cubic-bezier(.22,1,.36,1) forwards}
.dua-body-full .card::before{content:'';position:absolute;top:0;left:0;right:0;height:3.5px;background:linear-gradient(90deg,var(--g1),var(--gold),var(--g4),var(--gold),var(--g1));background-size:200% 100%;animation:shim 4s linear infinite}
@keyframes shim{0%{background-position:200% 0}100%{background-position:-200% 0}}
.dua-body-full .card::after{content:'☽';position:absolute;bottom:-28px;right:-6px;font-size:9rem;color:rgba(16,185,129,.06);line-height:1;pointer-events:none}
@keyframes cIn{from{opacity:0;transform:translateY(18px) scale(.98)}to{opacity:1;transform:translateY(0) scale(1)}}
.dua-body-full .card-badge{display:inline-flex;align-items:center;gap:6px;background:var(--g1);color:#fff;font-size:.7rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:4px 13px;border-radius:999px;margin-bottom:18px}
.dua-body-full .c-title{font-family:'Playfair Display',serif;font-size:1.4rem;font-weight:700;color:var(--g1);margin-bottom:26px;line-height:1.35}
.dua-body-full .arabic-box{background:linear-gradient(160deg,#f0fdf8 0%,var(--gold-pale) 100%);border:1px solid rgba(16,185,129,.15);border-radius:var(--r);padding:32px 22px;margin-bottom:22px;text-align:center;position:relative}
.dua-body-full .arabic-box::before{content:'';position:absolute;top:10px;left:10px;right:10px;bottom:10px;border:1px dashed rgba(200,151,58,.2);border-radius:10px;pointer-events:none}
.dua-body-full .arabic{font-family:'Noto Naskh Arabic',serif;font-size:clamp(1.5rem,4vw,2.4rem);color:var(--ink);line-height:2.1;direction:rtl;text-align:center}
.dua-body-full .translit{font-family:'Playfair Display',serif;font-style:italic;color:var(--g2);font-size:clamp(0.85rem, 2.5vw, 0.97rem);line-height:1.6;margin-bottom:16px;padding:0 2px}
.dua-body-full .transl{font-size:clamp(0.9rem, 2.5vw, 1rem);font-weight:500;color:var(--ink2);line-height:1.7;margin-bottom:20px;padding:14px 18px;border-left:3px solid var(--gold);background:var(--gold-lt);border-radius:0 var(--rs) var(--rs) 0}
.dua-body-full .virtue{font-size:.88rem;color:var(--muted);line-height:1.75;margin-bottom:18px;font-style:italic;padding:10px 14px;background:var(--parch);border-radius:var(--rs)}
.dua-body-full .virtue strong{color:var(--g2);font-style:normal}
.dua-body-full .c-foot{display:flex;align-items:center;justify-content:space-between;flex-wrap:wrap;gap:12px;margin-top:8px;padding-top:18px;border-top:1px solid var(--border)}
.dua-body-full .ref{display:inline-flex;align-items:center;gap:5px;background:var(--parch);border:1px solid var(--border);color:var(--g1);font-size:.8rem;font-weight:600;padding:6px 14px;border-radius:999px}
.dua-body-full .acts{display:flex;gap:8px}
.dua-body-full .act{background:transparent;border:1.5px solid var(--border);color:var(--muted);font-family:'Inter',sans-serif;font-size:.8rem;font-weight:500;padding:7px 15px;border-radius:999px;cursor:pointer;transition:var(--ease);display:flex;align-items:center;gap:5px}
.dua-body-full .act:hover{border-color:var(--g4);color:var(--g2);background:rgba(16,185,129,.06)}
.dua-body-full .act.ok{background:rgba(16,185,129,.1);border-color:var(--g4);color:var(--g2)}
.dua-body-full .seo{margin-top:24px;padding-top:12px;border-top:1px solid var(--border);position:relative;z-index:10;}
.dua-body-full .seo h2{font-family:'Playfair Display',serif;font-size:clamp(1.4rem, 4vw, 1.85rem);color:var(--g1);margin-bottom:16px;font-weight:700}
.dua-body-full .seo h3{font-family:'Playfair Display',serif;font-size:clamp(1.1rem, 3vw, 1.25rem);color:var(--g2);margin:32px 0 12px;font-weight:700}
.dua-body-full .seo p{font-size:clamp(0.875rem, 2.5vw, 0.975rem);color:var(--ink2);line-height:1.75;margin-bottom:14px}
.dua-body-full .seo ul{list-style:none;padding:0;margin:0 0 20px}
.dua-body-full .seo ul li{font-size:clamp(0.85rem, 2.5vw, 0.95rem);color:var(--ink2);line-height:1.7;padding:5px 0 5px 24px;position:relative}
.dua-body-full .seo ul li::before{content:'◆';position:absolute;left:0;color:var(--gold);font-size:.5rem;top:10px}
@media(max-width:520px){
  .dua-body-full .hero{padding:40px 12px 24px}
  .dua-body-full .tab-row{gap:4px; margin-bottom: 24px}
  .dua-body-full .tab{padding:8px 14px;font-size:.78rem}
  .dua-body-full .grid{grid-template-columns:1fr 1fr; gap: 8px}
  .dua-body-full .btn{padding: 10px 8px; gap: 6px}
  .dua-body-full .btn-ic{font-size: 1.1rem}
  .dua-body-full .card{padding: 24px 16px; border-radius: 16px}
  .dua-body-full .c-title{font-size: 1.2rem; margin-bottom: 18px}
  .dua-body-full .arabic-box{padding: 24px 14px; margin-bottom: 18px}
  .dua-body-full .transl{padding: 12px 14px}
  .dua-body-full .c-foot{flex-direction:column;align-items:flex-start; gap: 16px}
  .dua-body-full .acts{width: 100%; justify-content: flex-start}
}

@media(min-width: 521px) and (max-width: 800px) {
  .dua-body-full .grid{grid-template-columns: 1fr 1fr 1fr}
}
</style>

<div class="dua-body-full">

<!-- Adjustable Background Watermarks -->
<div class="watermark-bg">
   <img src="{{ asset('images/illustrations/dua-2.svg') }}" class="wm-img wm-2" alt="" aria-hidden="true">
   <img src="{{ asset('images/illustrations/dua-3.svg') }}" class="wm-img wm-3" alt="" aria-hidden="true">
</div>

<main class="page">

<header class="hero">
  <!-- Generated Hero Background Illustration -->
  <img src="{{ asset('images/illustrations/hero_dua_bg.png') }}" alt="" class="absolute top-[40%] left-1/2 -translate-x-1/2 -translate-y-1/2 w-[120%] max-w-[1000px] opacity-[0.80] mix-blend-multiply pointer-events-none" style="z-index: -1; mask-image: radial-gradient(ellipse at center, rgba(0,0,0,1) 20%, rgba(0,0,0,0) 65%); -webkit-mask-image: radial-gradient(ellipse at center, rgba(0,0,0,1) 20%, rgba(0,0,0,0) 65%);" aria-hidden="true">

  <div class="badge">✦ Authentic Duas from Quran &amp; Sunnah</div>
  <h1>Find the Duas<br><em>Your Heart Needs</em></h1>
  <p class="hero-sub">Select your emotion or situation to receive an authentic dua — Arabic text, transliteration, English meaning &amp; verified source.</p>
  
  <div style="max-width: 480px; margin: 0 auto 20px; position: relative; z-index: 20;">
      <span class="material-symbols-outlined absolute left-5 top-1/2 -translate-y-1/2 text-slate-400 pointer-events-none">search</span>
      <input type="text" id="dua-search" placeholder="Search for anxiety, forgiveness, rain..." onkeyup="searchDuas(this.value)" class="w-full pl-12 pr-5 py-3.5 rounded-full border-2 border-slate-100 bg-white shadow-lg shadow-brand-teal/5 focus:outline-none focus:border-brand-teal focus:ring-4 focus:ring-brand-teal/10 text-sm transition-all" style="font-family: 'Inter', sans-serif;">
  </div>
</header>

<nav class="tab-row" role="tablist">
  <button class="tab on"  role="tab" onclick="swTab('emotions',this)">💭 Emotions</button>
  <button class="tab"     role="tab" onclick="swTab('situations',this)">🌿 Situations</button>
  <button class="tab"     role="tab" onclick="swTab('daily',this)">☀️ Daily Prayers</button>
  <button class="tab"     role="tab" onclick="swTab('special',this)">⭐ Special Duas</button>
</nav>

<div id="panel-emotions" class="panel on">
  <p class="panel-label">Choose your current feeling</p>
  <div class="grid">
    <button class="btn" onclick="show('anxiety',this)"><span class="btn-ic">😰</span><span class="btn-txt"><span class="btn-name">Anxious / Stressed</span><span class="btn-sub">Overwhelmed by worries</span></span></button>
    <button class="btn" onclick="show('sadness',this)"><span class="btn-ic">😢</span><span class="btn-txt"><span class="btn-name">Sad / Grieving</span><span class="btn-sub">Loss or deep sorrow</span></span></button>
    <button class="btn" onclick="show('depression',this)"><span class="btn-ic">🌧️</span><span class="btn-txt"><span class="btn-name">Depress / Hopeless</span><span class="btn-sub">Darkness within</span></span></button>
    <button class="btn" onclick="show('angry',this)"><span class="btn-ic">😠</span><span class="btn-txt"><span class="btn-name">Angry / Frustrated</span><span class="btn-sub">Rage or irritation</span></span></button>
    <button class="btn" onclick="show('lonely',this)"><span class="btn-ic">🕊️</span><span class="btn-txt"><span class="btn-name">Lonely / Abandoned</span><span class="btn-sub">Feeling all alone</span></span></button>
    <button class="btn" onclick="show('fear',this)"><span class="btn-ic">😨</span><span class="btn-txt"><span class="btn-name">Fearful / Scared</span><span class="btn-sub">Fear of the unknown</span></span></button>
    <button class="btn" onclick="show('jealousy',this)"><span class="btn-ic">💚</span><span class="btn-txt"><span class="btn-name">Jealous / Envious</span><span class="btn-sub">Hasad of others</span></span></button>
    <button class="btn" onclick="show('shame',this)"><span class="btn-ic">😔</span><span class="btn-txt"><span class="btn-name">Ashamed / Guilty</span><span class="btn-sub">Weighed by sin</span></span></button>
    <button class="btn" onclick="show('confused',this)"><span class="btn-ic">🔦</span><span class="btn-txt"><span class="btn-name">Confused / Lost</span><span class="btn-sub">No clear path</span></span></button>
    <button class="btn" onclick="show('impatient',this)"><span class="btn-ic">⏳</span><span class="btn-txt"><span class="btn-name">Impatient / Tired</span><span class="btn-sub">Awaiting Allah's relief</span></span></button>
    <button class="btn" onclick="show('grateful',this)"><span class="btn-ic">🤲</span><span class="btn-txt"><span class="btn-name">Grateful / Happy</span><span class="btn-sub">Thankful to Allah</span></span></button>
    <button class="btn" onclick="show('heartbroken',this)"><span class="btn-ic">💔</span><span class="btn-txt"><span class="btn-name">Heartbroken</span><span class="btn-sub">Emotional pain</span></span></button>
  </div>
</div>

<div id="panel-situations" class="panel">
  <p class="panel-label">Choose your situation</p>
  <div class="grid">
    <button class="btn" onclick="show('exam',this)"><span class="btn-ic">📝</span><span class="btn-txt"><span class="btn-name">Exams / Hardship</span><span class="btn-sub">Difficulty or challenge</span></span></button>
    <button class="btn" onclick="show('travel',this)"><span class="btn-ic">✈️</span><span class="btn-txt"><span class="btn-name">Traveling</span><span class="btn-sub">Any journey</span></span></button>
    <button class="btn" onclick="show('knowledge',this)"><span class="btn-ic">📚</span><span class="btn-txt"><span class="btn-name">Seeking Knowledge</span><span class="btn-sub">Studying or learning</span></span></button>
    <button class="btn" onclick="show('rizq',this)"><span class="btn-ic">🌾</span><span class="btn-txt"><span class="btn-name">Rizq / Provision</span><span class="btn-sub">Financial worry</span></span></button>
    <button class="btn" onclick="show('illness',this)"><span class="btn-ic">🌿</span><span class="btn-txt"><span class="btn-name">Illness / Healing</span><span class="btn-sub">For yourself or loved one</span></span></button>
    <button class="btn" onclick="show('marriage',this)"><span class="btn-ic">💍</span><span class="btn-txt"><span class="btn-name">Seeking Marriage</span><span class="btn-sub">Finding a spouse</span></span></button>
    <button class="btn" onclick="show('forgiveness',this)"><span class="btn-ic">🌹</span><span class="btn-txt"><span class="btn-name">Seeking Forgiveness</span><span class="btn-sub">Turning back to Allah</span></span></button>
    <button class="btn" onclick="show('parents',this)"><span class="btn-ic">👨‍👩‍👦</span><span class="btn-txt"><span class="btn-name">For Parents</span><span class="btn-sub">Dua for mother &amp; father</span></span></button>
    <button class="btn" onclick="show('debt',this)"><span class="btn-ic">💸</span><span class="btn-txt"><span class="btn-name">Debt / Financial Stress</span><span class="btn-sub">Burdened by debt</span></span></button>
    <button class="btn" onclick="show('children',this)"><span class="btn-ic">🌸</span><span class="btn-txt"><span class="btn-name">For Children</span><span class="btn-sub">Righteous offspring</span></span></button>
    <button class="btn" onclick="show('deceased',this)"><span class="btn-ic">🕌</span><span class="btn-txt"><span class="btn-name">For the Deceased</span><span class="btn-sub">Lost a loved one</span></span></button>
    <button class="btn" onclick="show('evil_eye',this)"><span class="btn-ic">🛡️</span><span class="btn-txt"><span class="btn-name">Evil Eye / Nazar</span><span class="btn-sub">Protection from hasad</span></span></button>
  </div>
</div>

<div id="panel-daily" class="panel">
  <p class="panel-label">Daily supplications from Sunnah</p>
  <div class="grid">
    <button class="btn" onclick="show('waking',this)"><span class="btn-ic">🌅</span><span class="btn-txt"><span class="btn-name">Upon Waking Up</span><span class="btn-sub">First words of the day</span></span></button>
    <button class="btn" onclick="show('sleeping',this)"><span class="btn-ic">🌙</span><span class="btn-txt"><span class="btn-name">Before Sleeping</span><span class="btn-sub">Last words at night</span></span></button>
    <button class="btn" onclick="show('morning_adhkar',this)"><span class="btn-ic">☀️</span><span class="btn-txt"><span class="btn-name">Morning Adhkar</span><span class="btn-sub">Begin the day with Allah</span></span></button>
    <button class="btn" onclick="show('eating',this)"><span class="btn-ic">🍽️</span><span class="btn-txt"><span class="btn-name">Before Eating</span><span class="btn-sub">Sunnah before meals</span></span></button>
    <button class="btn" onclick="show('after_eating',this)"><span class="btn-ic">🙏</span><span class="btn-txt"><span class="btn-name">After Eating</span><span class="btn-sub">Gratitude after food</span></span></button>
    <button class="btn" onclick="show('entering_home',this)"><span class="btn-ic">🏠</span><span class="btn-txt"><span class="btn-name">Entering Home</span><span class="btn-sub">Barakah in the house</span></span></button>
    <button class="btn" onclick="show('leaving_home',this)"><span class="btn-ic">🚪</span><span class="btn-txt"><span class="btn-name">Leaving Home</span><span class="btn-sub">Step out with protection</span></span></button>
    <button class="btn" onclick="show('masjid',this)"><span class="btn-ic">🕌</span><span class="btn-txt"><span class="btn-name">Entering Masjid</span><span class="btn-sub">Dua at the mosque</span></span></button>
    <button class="btn" onclick="show('wudu',this)"><span class="btn-ic">💧</span><span class="btn-txt"><span class="btn-name">After Wudu</span><span class="btn-sub">Completion of ablution</span></span></button>
    <button class="btn" onclick="show('after_salah',this)"><span class="btn-ic">🤲</span><span class="btn-txt"><span class="btn-name">After Salah</span><span class="btn-sub">Post-prayer supplication</span></span></button>
    <button class="btn" onclick="show('rain',this)"><span class="btn-ic">🌧️</span><span class="btn-txt"><span class="btn-name">During Rain</span><span class="btn-sub">Accepted time for dua</span></span></button>
    <button class="btn" onclick="show('mirror',this)"><span class="btn-ic">🪞</span><span class="btn-txt"><span class="btn-name">Looking in Mirror</span><span class="btn-sub">Dua upon seeing yourself</span></span></button>
  </div>
</div>

<div id="panel-special" class="panel">
  <p class="panel-label">Powerful duas for key moments</p>
  <div class="grid">
    <button class="btn" onclick="show('istikhara',this)"><span class="btn-ic">🔮</span><span class="btn-txt"><span class="btn-name">Istikhara</span><span class="btn-sub">Seeking Allah's guidance</span></span></button>
    <button class="btn" onclick="show('qunoot',this)"><span class="btn-ic">🌙</span><span class="btn-txt"><span class="btn-name">Dua Qunoot</span><span class="btn-sub">For Witr prayer</span></span></button>
    <button class="btn" onclick="show('tahajjud',this)"><span class="btn-ic">⭐</span><span class="btn-txt"><span class="btn-name">Tahajjud / Night</span><span class="btn-sub">Last third of night</span></span></button>
    <button class="btn" onclick="show('laylatul_qadr',this)"><span class="btn-ic">✨</span><span class="btn-txt"><span class="btn-name">Laylatul Qadr</span><span class="btn-sub">Night of Power</span></span></button>
    <button class="btn" onclick="show('protection_all',this)"><span class="btn-ic">🛡️</span><span class="btn-txt"><span class="btn-name">Full Protection Dua</span><span class="btn-sub">Shield from all harm</span></span></button>
    <button class="btn" onclick="show('dua_masood',this)"><span class="btn-ic">💎</span><span class="btn-txt"><span class="btn-name">Dua of Ibn Mas'ud</span><span class="btn-sub">For grief &amp; distress</span></span></button>
    <button class="btn" onclick="show('prophet_Ibrahim',this)"><span class="btn-ic">🔥</span><span class="btn-txt"><span class="btn-name">Dua of Ibrahim ﷺ</span><span class="btn-sub">For acceptance</span></span></button>
    <button class="btn" onclick="show('tawbah',this)"><span class="btn-ic">🌱</span><span class="btn-txt"><span class="btn-name">Dua for Tawbah</span><span class="btn-sub">Complete repentance</span></span></button>
  </div>
</div>

<article id="dua-card" class="card" role="region" aria-live="polite">
  <span class="card-badge">✦ Authentic Dua</span>
  <h2 class="c-title" id="c-title"></h2>
  <div class="arabic-box">
    <p class="arabic" id="c-arabic" lang="ar" dir="rtl"></p>
  </div>
  <p class="translit" id="c-translit"></p>
  <blockquote class="transl" id="c-transl"></blockquote>
  <p class="virtue" id="c-virtue"></p>
  <div class="c-foot">
    <span class="ref" id="c-ref"></span>
    <div class="acts">
      <button class="act" onclick="copyDua()" id="copy-btn">📋 Copy</button>
      <button class="act" onclick="shareDua()">🔗 Share</button>
    </div>
  </div>
</article>

<section class="seo" aria-label="Guide to Islamic Duas">
  <div class="flex items-center gap-3">
    <span class="w-8 h-[2px] bg-brand-gold rounded-full"></span>
    <span class="text-brand-gold font-bold tracking-[0.4em] uppercase text-[10px]">Academic Guide</span>
  </div>
  <h2>What is a Dua? The Complete Islamic Guide to Supplication</h2>
  <p>A <strong>dua</strong> (دُعَاء) is the most intimate form of Islamic worship — a direct conversation between a believer and Allah ﷻ. Unlike the structured ritual of salah, dua has no fixed time, place or language requirement. It is the voice of the heart raised to the Creator of the universe. The Prophet Muhammad ﷺ said: <em>"Dua is the essence of worship."</em> (Jami' at-Tirmidhi 3371)</p>
  <p>This tool collects specific duas the Prophet ﷺ himself taught — carefully sourced from Sahih al-Bukhari, Sahih Muslim, Sunan Abu Dawood, Jami' at-Tirmidhi, Sunan Ibn Majah and the Quran — so that every Muslim can find the right words for every emotion and situation in life.</p>

  <h3>Why Use Duas from Quran &amp; Sunnah?</h3>
  <p>While any sincere supplication is heard by Allah ﷻ, the duas preserved in the Quran and authentic hadiths carry special blessing (barakah). They are the exact words taught by the Prophet ﷺ — carrying centuries of spiritual weight and scholarly verification. Every dua in this tool is graded Sahih (authentic) or Hasan (good) by hadith scholars.</p>

  <h3>Etiquette of Making Dua</h3>
  <ul>
    <li>Begin with the praise of Allah ﷻ (Alhamdulillah) and salawat upon the Prophet ﷺ</li>
    <li>Face the Qibla if possible and raise your hands with palms facing upward</li>
    <li>Speak with complete certainty (yaqeen) that Allah hears and will respond</li>
    <li>Repeat the dua three times — the Prophet ﷺ would repeat supplications three times</li>
    <li>Make dua for others as well — the angels say "Ameen, and for you the same"</li>
    <li>Never give up — Allah loves persistent supplication</li>
  </ul>

  <h3>Best Times for Dua to be Accepted</h3>
  <p>The Prophet ﷺ taught us that certain moments are particularly blessed: the last third of the night (during Tahajjud), in sujood (prostration), between the adhan and iqamah, when breaking fast (Iftar), on Fridays between Asr and Maghrib, during rain, when travelling, and when a parent makes dua for their child.</p>
</section>

<!-- FAQ Section -->
<section class="py-16 px-6 border-t border-[#e8e2d6] mt-8" style="position:relative; z-index:10;">
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-10">
            <span class="text-brand-teal font-bold text-[10px] uppercase tracking-[0.4em] mb-2 block">Clarifications</span>
            <h2 class="text-2xl md:text-3xl font-serif font-bold text-slate-800 tracking-tight">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-3">
            <!-- FAQ 1 -->
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden text-left transition-all duration-300 hover:border-brand-teal/40 hover:shadow-lg hover:shadow-brand-teal/5 group">
                <button class="w-full py-4 px-6 text-left flex items-center justify-between focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px]">What is the best dua for anxiety and stress?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-all duration-300 group-hover:text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 pb-5 text-slate-500 hidden leading-relaxed text-sm">
                    The Prophet ﷺ regularly recited the comprehensive dua from Sahih al-Bukhari 6369, seeking refuge from anxiety, sorrow, weakness, laziness, miserliness, cowardice, debt and being overpowered. Select "Anxious / Stressed" in the Emotions tab above to read it in full.
                </div>
            </div>
            <!-- FAQ 2 -->
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden text-left transition-all duration-300 hover:border-brand-teal/40 hover:shadow-lg hover:shadow-brand-teal/5 group">
                <button class="w-full py-4 px-6 text-left flex items-center justify-between focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px]">What is Dua-e-Yunus and when should I read it?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-all duration-300 group-hover:text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 pb-5 text-slate-500 hidden leading-relaxed text-sm">
                    Dua-e-Yunus (La ilaha illa anta subhanaka inni kuntu minaz-zalimin) was made by Prophet Yunus (AS) from inside the whale. Allah responded and saved him. It is recommended for extreme sadness, hopelessness, or any situation where you feel completely trapped with no way out.
                </div>
            </div>
            <!-- FAQ 3 -->
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden text-left transition-all duration-300 hover:border-brand-teal/40 hover:shadow-lg hover:shadow-brand-teal/5 group">
                <button class="w-full py-4 px-6 text-left flex items-center justify-between focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px]">Is there a dua for loneliness?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-all duration-300 group-hover:text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 pb-5 text-slate-500 hidden leading-relaxed text-sm">
                    Yes. The dua: Ya Hayyu ya Qayyum bi-rahmatika astaghith, aslih li sha'ni kullahu wa la takilni ila nafsi tarfata ayn — deeply recommended for feeling alone. The Prophet ﷺ recited it when facing overwhelming difficulties. Select "Lonely / Abandoned" to read it in full.
                </div>
            </div>
            <!-- FAQ 4 -->
            <div class="bg-white rounded-2xl border border-slate-100 overflow-hidden text-left transition-all duration-300 hover:border-brand-teal/40 hover:shadow-lg hover:shadow-brand-teal/5 group">
                <button class="w-full py-4 px-6 text-left flex items-center justify-between focus:outline-none" onclick="this.nextElementSibling.classList.toggle('hidden'); this.querySelector('svg').classList.toggle('rotate-180')">
                    <span class="font-bold text-slate-800 group-hover:text-brand-gold transition-colors duration-300 text-[15px]">Can duas be read in English?</span>
                    <svg class="w-5 h-5 text-slate-400 transition-all duration-300 group-hover:text-brand-teal" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                </button>
                <div class="px-6 pb-5 text-slate-500 hidden leading-relaxed text-sm">
                    Yes. Allah ﷻ hears and responds to all sincere supplications in any language. The Arabic duas from Quran and Sunnah carry their original blessing, but praying to Allah in your own language is fully valid. Many scholars recommend learning the Arabic alongside the meaning so you can supplicate with both understanding and the original blessed words.
                </div>
            </div>
        </div>
    </div>
</section>
</main>
</div>

<script>
const db={
anxiety:{title:"Dua for Anxiety & Stress",arabic:"اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنَ الْهَمِّ وَالْحُزْنِ، وَالْعَجْزِ وَالْكَسَلِ، وَالْجُبْنِ وَالْبُخْلِ، وَضَلَعِ الدَّيْنِ وَغَلَبَةِ الرِّجَالِ",translit:"Allāhumma innī a'ūdhu bika minal-hammi wal-ḥuzni, wal-'ajzi wal-kasali, wal-jubni wal-bukhli, wa ḍala'id-dayni wa ghalabatir-rijāl",transl:"O Allah, I seek refuge in You from anxiety and sorrow, from weakness and laziness, from miserliness and cowardice, and from being overcome by debt and overpowered by people.",virtue:"<strong>The Prophet ﷺ recited this dua regularly.</strong> It covers every root cause of anxiety — inner weakness, financial burden, social pressure — placing them all before Allah to relieve. Reported by Abu Sa'eed al-Khudri ؓ.",ref:"Sahih al-Bukhari 6369"},

sadness:{title:"Dua-e-Yunus — For Deep Sadness & Grief",arabic:"لَا إِلَٰهَ إِلَّا أَنْتَ سُبْحَانَكَ إِنِّي كُنْتُ مِنَ الظَّالِمِينَ",translit:"Lā ilāha illā anta subḥānaka innī kuntu minaẓ-ẓālimīn",transl:"There is no deity except You; exalted are You. Indeed, I have been of the wrongdoers.",virtue:"<strong>Made by Prophet Yunus (AS) from inside the whale in complete darkness.</strong> Allah says: 'We responded to him and saved him from distress. Thus do We save the believers.' (21:88). The Prophet ﷺ said whoever in distress says this, Allah will answer his prayer.",ref:"Surah Al-Anbiya 21:87 | Tirmidhi 3505"},

depression:{title:"Dua for Depression & Hopelessness",arabic:"يَا حَيُّ يَا قَيُّومُ بِرَحْمَتِكَ أَسْتَغِيثُ، أَصْلِحْ لِي شَأْنِي كُلَّهُ، وَلَا تَكِلْنِي إِلَى نَفْسِي طَرْفَةَ عَيْنٍ",translit:"Yā Ḥayyu yā Qayyūm, bi-raḥmatika astaghīth, aṣliḥ lī sha'nī kullahu, wa lā takilnī ilā nafsī ṭarfata 'ayn",transl:"O Ever-Living, O Sustainer of all existence, by Your mercy I seek help. Set right all my affairs and do not leave me to myself even for the blink of an eye.",virtue:"<strong>Recited by the Prophet ﷺ when faced with any serious calamity.</strong> Anas ibn Malik ؓ narrated this. Calling upon Allah by His names Al-Hayy (Ever-Living) and Al-Qayyum (Self-Sustaining) is among the most powerful forms of supplication.",ref:"Mustadrak al-Hakim 1/545 | Al-Albani: Hasan"},

angry:{title:"Dua for Controlling Anger",arabic:"أَعُوذُ بِاللَّهِ مِنَ الشَّيْطَانِ الرِّجِيمِ",translit:"A'ūdhu billāhi minash-shayṭānir-rajīm",transl:"I seek refuge with Allah from the accursed devil.",virtue:"<strong>The Prophet ﷺ said: 'When a man gets angry and says this, his anger subsides.'</strong> He also advised: if angry while standing, sit; if sitting, lie down — then recite this phrase, as anger comes from Shaytan who is repelled by seeking refuge in Allah.",ref:"Sahih al-Bukhari 6115 | Abu Dawood 4781"},

lonely:{title:"Dua for Loneliness & Feeling Abandoned",arabic:"اللَّهُمَّ إِنِّي عَبْدُكَ ابْنُ عَبْدِكَ ابْنُ أَمَتِكَ، نَاصِيَتِي بِيَدِكَ، مَاضٍ فِيَّ حُكْمُكَ، عَدْلٌ فِيَّ قَضَاؤُكَ",translit:"Allāhumma innī 'abduka, ibnu 'abdika, ibnu amatik, nāṣiyatī biyadik, māḍin fiyya ḥukmuk, 'adlun fiyya qaḍā'uk",transl:"O Allah, I am Your servant, the son of Your servant, the son of Your maidservant. My forelock is in Your hand, Your command over me is forever executed, and Your decree upon me is always just.",virtue:"<strong>The Prophet ﷺ said: 'Whoever says this, Allah will remove his grief and replace his sorrow with joy.'</strong> It is a declaration that even in utter loneliness, one is never truly alone — Allah holds every affair in His hand.",ref:"Musnad Ahmad 3712 | Al-Albani: Sahih"},

fear:{title:"Dua for Fear & Protection",arabic:"اللَّهُمَّ احْفَظْنِي مِنْ بَيْنِ يَدَيَّ، وَمِنْ خَلْفِي، وَعَنْ يَمِينِي، وَعَنْ شِمَالِي، وَمِنْ فَوْقِي، وَأَعُوذُ بِعَظَمَتِكَ أَنْ أُغْتَالَ مِنَ التَّحْتِي",translit:"Allāhumma iḥfaẓnī min bayni yadayya, wa min khalfī, wa 'an yamīnī, wa 'an shimālī, wa min fawqī, wa a'ūdhu bi'aẓamatika an ughtāla min taḥtī",transl:"O Allah, guard me from my front, from behind me, from my right, from my left, and from above me. And I seek refuge in Your greatness from being struck from below.",virtue:"<strong>Ibn 'Abbas ؓ reported that the Prophet ﷺ used to recite this dua.</strong> It asks Allah for protection from all six directions — a comprehensive shield from every harm whether seen or unseen, physical or spiritual.",ref:"Sunan Abu Dawood 5074 | Sahih"},

jealousy:{title:"Dua to Purify the Heart from Jealousy (Hasad)",arabic:"اللَّهُمَّ إِنِّي أَعُوذُ بِكَ مِنَ الْحَسَدِ وَالْحِقْدِ، وَطَهِّرْ قَلْبِي مِنَ الْغِلِّ وَالْبُغْضَاءِ",translit:"Allāhumma innī a'ūdhu bika minal-ḥasadi wal-ḥiqdi, wa ṭahhir qalbī minal-ghilli wal-bughḍā'",transl:"O Allah, I seek refuge in You from envy and malice, and purify my heart from rancour and hatred.",virtue:"<strong>Envy (hasad) destroys good deeds as fire destroys wood</strong> (Abu Dawood 4903). The Prophet ﷺ warned it was the disease of nations before us. Recite this dua when you feel jealousy rising — it is a shield for the heart and a cure for the disease at its root.",ref:"Based on Sahih principles | See Abu Dawood 4903"},

shame:{title:"Dua for Shame, Guilt & Seeking Forgiveness",arabic:"اللَّهُمَّ اغْفِرْ لِي ذَنْبِي كُلَّهُ، دِقَّهُ وَجِلَّهُ، وَأَوَّلَهُ وَآخِرَهُ، وَعَلَانِيَتَهُ وَسِرَّهُ",translit:"Allāhummaghfir lī dhanbī kullahu, diqqahu wa jillahu, wa awwalahu wa ākhirahu, wa 'alāniyatahu wa sirrah",transl:"O Allah, forgive me all my sins — the small and the great, the first and the last, and the public and the private.",virtue:"<strong>Abu Hurayrah ؓ reported that the Prophet ﷺ would recite this dua in sujood (prostration).</strong> It is the most comprehensive request for forgiveness covering every type of sin without exception. A powerful dua to say when feeling crushed by guilt.",ref:"Sahih Muslim 483"},

confused:{title:"Dua for Guidance & Clarity",arabic:"رَبَّنَا لَا تُزِغْ قُلُوبَنَا بَعْدَ إِذْ هَدَيْتَنَا وَهَبْ لَنَا مِن لَّدُنكَ رَحْمَةً إِنَّكَ أَنتَ الْوَهَّابُ",translit:"Rabbanā lā tuzigh qulūbanā ba'da idh hadaytanā wa hab lanā min ladunka raḥmah, innaka antal-Wahhāb",transl:"Our Lord, do not let our hearts deviate after You have guided us, and grant us from Yourself mercy. Indeed, You are the Bestower.",virtue:"<strong>A Quranic dua for steadfastness when feeling lost or confused.</strong> This was the supplication of those firmly grounded in knowledge who feared going astray. It acknowledges that guidance belongs entirely to Allah and asks Him not to allow it to be taken away.",ref:"Surah Aal-Imran 3:8"},

impatient:{title:"Dua for Patience & Endurance",arabic:"رَبَّنَا أَفْرِغْ عَلَيْنَا صَبْرًا وَثَبِّتْ أَقْدَامَنَا وَانصُرْنَا عَلَى الْقَوْمِ الْكَافِرِينَ",translit:"Rabbanā afrigh 'alaynā ṣabran wa thabbit aqdāmanā wanṣurnā 'alal-qawmil-kāfirīn",transl:"Our Lord, pour upon us patience and plant our feet firmly, and give us victory over the disbelieving people.",virtue:"<strong>The supplication of the believers in the Quran when facing an overwhelming trial.</strong> It asks for three things: an outpouring of patience, firm footing so we do not stumble, and ultimate victory. Recite when exhausted by prolonged hardship.",ref:"Surah Al-Baqarah 2:250"},

grateful:{title:"Dua of Gratitude & Praise",arabic:"اللَّهُمَّ لَكَ الْحَمْدُ كُلُّهُ، وَلَكَ الشُّكْرُ كُلُّهُ، وَلَكَ الْمُلْكُ كُلُّهُ، وَبِيَدِكَ الْخَيْرُ كُلُّهُ",translit:"Allāhumma lakal-ḥamdu kulluh, wa lakash-shukru kulluh, wa lakal-mulku kulluh, wa biyadikal-khayru kulluh",transl:"O Allah, all praise belongs to You, all gratitude belongs to You, all sovereignty belongs to You, and all goodness is in Your hands.",virtue:"<strong>Express shukr to attract more blessings.</strong> Allah promises in the Quran: 'If you are grateful, I will surely increase you in favour.' (Ibrahim 14:7). The Prophet ﷺ taught that a Muslim who gives thanks in every state — ease or hardship — has attained the station of the truly grateful.",ref:"Sunan Abu Dawood 770 | Sahih"},

heartbroken:{title:"Dua for a Broken Heart",arabic:"اللَّهُمَّ إِنِّي أَسْأَلُكَ قَلْبًا سَلِيمًا، وَلِسَانًا صَادِقًا، وَأَعُوذُ بِكَ مِنْ شَرِّ مَا تَعْلَمُ",translit:"Allāhumma innī as'aluka qalban salīmā, wa lisānan ṣādiqā, wa a'ūdhu bika min sharri mā ta'lam",transl:"O Allah, I ask You for a sound and healed heart and a truthful tongue, and I seek refuge in You from the evil of what You know.",virtue:"<strong>A dua for emotional healing and a pure heart.</strong> The Quran says on the Day of Judgment only one who comes with a 'sound heart' (qalbun saleem) will be saved (26:89). This dua asks Allah to restore and heal the heart — emotionally, spiritually and morally.",ref:"Musnad Ahmad | Hasan"},

exam:{title:"Dua for Exams & Difficulty",arabic:"اللَّهُمَّ لَا سَهْلَ إِلَّا مَا جَعَلْتَهُ سَهْلًا، وَأَنْتَ تَجْعَلُ الْحَزْنَ إِذَا شِئْتَ سَهْلًا",translit:"Allāhumma lā sahla illā mā ja'altahu sahlā, wa anta taj'alul-ḥazna idhā shi'ta sahlā",transl:"O Allah, there is no ease except in that which You have made easy, and You make the difficult easy if You so wish.",virtue:"<strong>A complete acknowledgement that ease comes only from Allah.</strong> Recite before every exam, interview or difficult task. Found in Sahih Ibn Hibban and Ibn al-Sunni. Many scholars recommend repeating it three times before beginning.",ref:"Sahih Ibn Hibban 974 | Ibn al-Sunni"},

travel:{title:"Dua for Safe Travel",arabic:"سُبْحَانَ الَّذِي سَخَّرَ لَنَا هَٰذَا وَمَا كُنَّا لَهُ مُقْرِنِينَ، وَإِنَّا إِلَىٰ رَبِّنَا لَمُنقَلِبُونَ",translit:"Subḥānalladhī sakhkhara lanā hādhā wa mā kunnā lahu muqrinīn, wa innā ilā rabbinā lamunqalibūn",transl:"Exalted is He who has subjected this to us, and we could not have subdued it ourselves. And indeed, to our Lord we will surely return.",virtue:"<strong>Read upon boarding any vehicle — car, plane, boat or train.</strong> Ibn 'Umar ؓ reported that the Prophet ﷺ would say this dua whenever he mounted for travel, adding Alhamdulillah ×3 and Allahu Akbar ×3. (Abu Dawood 2602)",ref:"Surah Az-Zukhruf 43:13-14 | Abu Dawood 2602"},

knowledge:{title:"Dua for Knowledge",arabic:"رَّبِّ زِدْنِي عِلْمًا",translit:"Rabbi zidnī 'ilmā",transl:"My Lord, increase me in knowledge.",virtue:"<strong>The shortest and most profound dua in the Quran.</strong> It is the only place in the entire Quran where Allah commands the Prophet ﷺ to ask for more of something — and that something is knowledge. Recite before every class, study session or book.",ref:"Surah Ta-Ha 20:114"},

rizq:{title:"Dua for Rizq (Provision & Sustenance)",arabic:"اللَّهُمَّ إِنِّي أَسْأَلُكَ عِلْمًا نَافِعًا، وَرِزْقًا طَيِّبًا، وَعَمَلًا مُتَقَبَّلًا",translit:"Allāhumma innī as'aluka 'ilman nāfi'ā, wa rizqan ṭayyibā, wa 'amalan mutaqabbalā",transl:"O Allah, I ask You for knowledge that is of benefit, a good and blessed provision, and deeds that will be accepted.",virtue:"<strong>The Prophet ﷺ recited this dua after Fajr prayer every morning.</strong> It asks not just for wealth but for provision that is ṭayyib — pure, clean, halal and filled with barakah. The combination of knowledge, provision and accepted deeds makes it one of the most complete morning supplications.",ref:"Sunan Ibn Majah 925 | Hasan"},

illness:{title:"Dua for Illness & Healing (Shifa)",arabic:"اللَّهُمَّ رَبَّ النَّاسِ، أَذْهِبِ الْبَأْسَ، وَاشْفِ أَنْتَ الشَّافِي، لَا شِفَاءَ إِلَّا شِفَاؤُكَ، شِفَاءً لَا يُغَادِرُ سَقَمًا",translit:"Allāhumma rabban-nāsi, adh-hibil-ba'sa, washfi antash-Shāfī, lā shifā'uka illā shifā'uka, shifā'an lā yughādiru saqamā",transl:"O Allah, Lord of mankind, remove this harm and heal — You are the Healer. There is no healing except Your healing, a healing that leaves no illness behind.",virtue:"<strong>The Ruqyah dua of the Prophet ﷺ for the sick.</strong> It affirms that true healing (shifa) belongs only to Allah — Al-Shafi (the Healer). Recite while placing the right hand on the area of pain and blowing lightly, as the Prophet ﷺ did.",ref:"Sahih al-Bukhari 5742"},

marriage:{title:"Dua of Prophet Musa ﷺ — For Seeking a Spouse",arabic:"رَبِّ إِنِّي لِمَا أَنزَلْتَ إِلَيَّ مِنْ خَيْرٍ فَقِيرٌ",translit:"Rabbi innī limā anzalta ilayya min khayrin faqīr",transl:"My Lord, indeed I am, for whatever good You would send down to me, in need.",virtue:"<strong>Prophet Musa (AS) made this humble dua when he was alone, penniless and without family.</strong> Shortly after, Allah sent him a righteous wife through His planning. It is the most recommended Quranic dua for those seeking a pious spouse — a confession of complete need before Allah.",ref:"Surah Al-Qasas 28:24"},

forgiveness:{title:"Sayyidul Istighfar — Master Dua for Forgiveness",arabic:"اللَّهُمَّ أَنْتَ رَبِّي لَا إِلَٰهَ إِلَّا أَنْتَ، خَلَقْتَنِي وَأَنَا عَبْدُكَ، وَأَنَا عَلَى عَهْدِكَ وَوَعْدِكَ مَا اسْتَطَعْتُ، أَعُوذُ بِكَ مِنْ شَرِّ مَا صَنَعْتُ، أَبُوءُ لَكَ بِنِعْمَتِكَ عَلَيَّ، وَأَبُوءُ بِذَنْبِي فَاغْفِرْ لِي فَإِنَّهُ لَا يَغْفِرُ الذُّنُوبَ إِلَّا أَنْتَ",translit:"Allāhumma anta rabbī lā ilāha illā ant, khalaqtanī wa anā 'abduk, wa anā 'alā 'ahdika wa wa'dika mastaṭa't, a'ūdhu bika min sharri mā ṣana't, abū'u laka bini'matika 'alayya, wa abū'u bidhanbī faghfir lī, fa innahu lā yaghfirudh-dhunūba illā ant",transl:"O Allah, You are my Lord. There is no deity except You. You created me and I am Your servant. I am upon Your covenant and promise as best I can. I seek refuge in You from the evil of what I have done. I acknowledge Your favour upon me and I acknowledge my sin. So forgive me, for no one forgives sins except You.",virtue:"<strong>The greatest dua for forgiveness in Islam.</strong> The Prophet ﷺ said: 'Whoever says this during the day with firm belief and dies before evening is among the people of Paradise; and whoever says it at night with firm belief and dies before morning is among the people of Paradise.'",ref:"Sahih al-Bukhari 6306"},

parents:{title:"Dua for Parents",arabic:"رَّبِّ ارْحَمْهُمَا كَمَا رَبَّيَانِي صَغِيرًا",translit:"Rabbi irḥamhumā kamā rabbayānī ṣaghīrā",transl:"My Lord, have mercy upon them both as they raised and cared for me when I was small.",virtue:"<strong>A Quranic command and a dua in one.</strong> Allah Himself instructed us to make this supplication. Recite after every salah. It is accepted for living parents and equally valid as sadaqah jariyah for those who have passed away.",ref:"Surah Al-Isra 17:24"},

debt:{title:"Dua for Relief from Debt",arabic:"اللَّهُمَّ اكْفِنِي بِحَلَالِكَ عَنْ حَرَامِكَ، وَأَغْنِنِي بِفَضْلِكَ عَمَّنْ سِوَاكَ",translit:"Allāhumm-akfinī biḥalālika 'an ḥarāmik, wa aghnini bifaḍlika 'amman siwāk",transl:"O Allah, make me sufficed with what You have made lawful so that I have no need of what You have made forbidden, and make me independent by Your grace so that I need no one other than You.",virtue:"<strong>Ali ibn Abi Talib ؓ reported that the Prophet ﷺ taught this dua</strong>, saying: 'If you had debt like a mountain, Allah would pay it for you.' It addresses the root of debt — needing others — and asks Allah to replace every need with His sufficiency.",ref:"Jami' at-Tirmidhi 3563 | Sahih"},

children:{title:"Dua for Righteous Children",arabic:"رَبِّ هَبْ لِي مِن لَّدُنكَ ذُرِّيَّةً طَيِّبَةً إِنَّكَ سَمِيعُ الدُّعَاءِ",translit:"Rabbi hab lī min ladunka dhurriyyatan ṭayyibah, innaka samī'ud-du'ā'",transl:"My Lord, grant me from Yourself a good offspring. Indeed, You are the All-Hearing of supplication.",virtue:"<strong>The dua of Prophet Zakariyyah (AS) when he asked for a child in old age.</strong> Allah responded and gave him Yahya (AS). This is the dua for those seeking children and equally for those who have children and want them to be righteous and pious.",ref:"Surah Aal-Imran 3:38"},

deceased:{title:"Dua for a Deceased Person",arabic:"اللَّهُمَّ اغْفِرْ لَهُ وَارْحَمْهُ وَعَافِهِ وَاعْفُ عَنْهُ، وَأَكْرِمْ نُزُلَهُ، وَوَسِّعْ مُدْخَلَهُ",translit:"Allāhummaghfir lahu warḥamhu wa 'āfihi wa'fu 'anh, wa akrim nuzulahu, wa wassi' mudkhalah",transl:"O Allah, forgive him, have mercy on him, grant him wellbeing, pardon him, honour his reception, and widen his entry.",virtue:"<strong>The dua read in Salat al-Janazah (funeral prayer).</strong> Abu Hurayrah ؓ reported the Prophet ﷺ used to recite this. For a female, say 'laha' instead of 'lahu'. Do not stop making dua for the deceased — it reaches them and benefits them.",ref:"Sahih Muslim 963"},

evil_eye:{title:"Dua for Protection from Evil Eye (Nazar)",arabic:"أَعُوذُ بِكَلِمَاتِ اللَّهِ التَّامَّةِ مِنْ كُلِّ شَيْطَانٍ وَهَامَّةٍ، وَمِنْ كُلِّ عَيْنٍ لَامَّةٍ",translit:"A'ūdhu bikalimātillāhit-tāmmati min kulli shayṭānin wa hāmmah, wa min kulli 'aynin lāmmah",transl:"I seek refuge in the perfect words of Allah from every devil and every harmful creature, and from every evil eye.",virtue:"<strong>Prophet Ibrahim (AS) used this dua to protect Ismail and Ishaq (AS).</strong> Ibn 'Abbas ؓ reported that the Prophet ﷺ used it to protect Al-Hasan and Al-Husayn ؓ. Recite over yourself and your children morning and evening for protection.",ref:"Sahih al-Bukhari 3371"},

waking:{title:"Dua Upon Waking Up",arabic:"الْحَمْدُ لِلَّهِ الَّذِي أَحْيَانَا بَعْدَ مَا أَمَاتَنَا وَإِلَيْهِ النُّشُورُ",translit:"Alḥamdulillāhilladhī aḥyānā ba'da mā amātanā wa ilayhin-nushūr",transl:"All praise is for Allah who gave us life after having taken it from us, and unto Him is the resurrection.",virtue:"<strong>The first words the Prophet ﷺ said upon waking.</strong> Sleep is described in the Quran as a minor death (39:42). Every new morning is a gift from Allah — this dua acknowledges that and sets the entire day's tone with gratitude.",ref:"Sahih al-Bukhari 6325"},

sleeping:{title:"Dua Before Sleeping",arabic:"بِاسْمِكَ اللَّهُمَّ أَمُوتُ وَأَحْيَا",translit:"Bismika Allāhumma amūtu wa aḥyā",transl:"In Your name, O Allah, I die and I live.",virtue:"<strong>The Prophet ﷺ said this every night before sleeping.</strong> It is a declaration that even in sleep — a state of complete vulnerability — we are entirely in Allah's care. Upon waking he would say: 'All praise to Allah who gave us life after taking it.' (Sahih al-Bukhari 6324)",ref:"Sahih al-Bukhari 6324"},

morning_adhkar:{title:"Morning Adhkar — Daily Protection",arabic:"اللَّهُمَّ بِكَ أَصْبَحْنَا وَبِكَ أَمْسَيْنَا، وَبِكَ نَحْيَا وَبِكَ نَمُوتُ، وَإِلَيْكَ النُّشُورُ",translit:"Allāhumma bika aṣbaḥnā wa bika amsaynā, wa bika naḥyā wa bika namūtu, wa ilaykan-nushūr",transl:"O Allah, by Your will we have entered the morning and by Your will we have entered the evening. By Your will we live, by Your will we die, and to You is the resurrection.",virtue:"<strong>Begin every morning with tawakkul (trust in Allah).</strong> This comprehensive adhkar acknowledges Allah's absolute control over every phase of existence. In the evening, replace 'asbahna' with 'amsayna' and 'nushur' with 'maseer'. (Abu Dawood 5068)",ref:"Sunan Abu Dawood 5068 | Hasan"},

eating:{title:"Dua Before Eating",arabic:"بِسْمِ اللَّهِ وَعَلَى بَرَكَةِ اللَّهِ",translit:"Bismillāhi wa 'alā barakatillāh",transl:"In the name of Allah and upon the blessings of Allah.",virtue:"<strong>The Sunnah before every meal.</strong> If you forget at the start, say: 'Bismillahi fi awwalihi wa akhirihi.' The Prophet ﷺ said this prevents Shaytan from sharing in the food and the home. (Abu Dawood 3767)",ref:"Sunan Abu Dawood 3767 | Sahih"},

after_eating:{title:"Dua After Eating",arabic:"الْحَمْدُ لِلَّهِ الَّذِي أَطْعَمَنَا وَسَقَانَا وَجَعَلَنَا مِنَ الْمُسْلِمِينَ",translit:"Alḥamdulillāhilladhī aṭ'amanā wa saqānā wa ja'alanā minal-muslimīn",transl:"Praise be to Allah who fed us and gave us drink and made us among the Muslims.",virtue:"<strong>The Prophet ﷺ recited this after finishing a meal.</strong> (Abu Dawood 3850, Sahih). Giving thanks after eating turns an ordinary daily act into worship and invites continued barakah in provision.",ref:"Sunan Abu Dawood 3850 | Sahih"},

entering_home:{title:"Dua for Entering the Home",arabic:"بِسْمِ اللَّهِ وَلَجْنَا، وَبِسْمِ اللَّهِ خَرَجْنَا، وَعَلَى اللَّهِ رَبِّنَا تَوَكَّلْنَا",translit:"Bismillāhi walajnā, wa bismillāhi kharajnā, wa 'alallāhi rabbinā tawakkalnā",transl:"In the name of Allah we enter, in the name of Allah we leave, and in Allah our Lord we place our trust.",virtue:"<strong>The Prophet ﷺ said: when a person mentions Allah's name upon entering home, Shaytan says to his companions: 'No lodging here and no supper here.'</strong> Making this a daily habit fills the home with barakah and protection. (Sahih Muslim 2018)",ref:"Sahih Muslim 2018 | Abu Dawood 5096"},

leaving_home:{title:"Dua for Leaving the Home",arabic:"بِسْمِ اللَّهِ تَوَكَّلْتُ عَلَى اللَّهِ، وَلَا حَوْلَ وَلَا قُوَّةَ إِلَّا بِاللَّهِ",translit:"Bismillāh, tawakkaltu 'alallāh, wa lā ḥawla wa lā quwwata illā billāh",transl:"In the name of Allah, I place my trust in Allah, and there is no power and no strength except with Allah.",virtue:"<strong>The Prophet ﷺ said: whoever leaves home saying this, it will be said to him: 'You are guided, defended and protected.'</strong> Shaytan retreats and another shaytan says: 'What can you do with a man who has been guided, defended and protected?' (Abu Dawood 5095)",ref:"Sunan Abu Dawood 5095 | Sahih"},

masjid:{title:"Dua for Entering the Masjid",arabic:"اللَّهُمَّ افْتَحْ لِي أَبْوَابَ رَحْمَتِكَ",translit:"Allāhummaftaḥ lī abwāba raḥmatik",transl:"O Allah, open for me the doors of Your mercy.",virtue:"<strong>Enter with the right foot and say this dua.</strong> Upon leaving the masjid, step out with the left foot and say: 'Allahumma inni as'aluka min fadlik — O Allah, I ask You of Your bounty.' These two duas frame every visit to the house of Allah. (Sahih Muslim 713)",ref:"Sahih Muslim 713"},

wudu:{title:"Dua After Wudu (Ablution)",arabic:"أَشْهَدُ أَنْ لَا إِلَٰهَ إِلَّا اللَّهُ وَحْدَهُ لَا شَرِيكَ لَهُ، وَأَشْهَدُ أَنَّ مُحَمَّدًا عَبْدُهُ وَرَسُولُهُ",translit:"Ash-hadu an lā ilāha illallāhu waḥdahu lā sharīka lah, wa ash-hadu anna Muḥammadan 'abduhu wa rasūluh",transl:"I testify that there is no deity except Allah alone with no partner, and I testify that Muhammad is His servant and messenger.",virtue:"<strong>The Prophet ﷺ said: 'Whoever performs wudu well and then says this, the eight gates of Paradise are opened for him to enter through whichever he wishes.'</strong> (Sahih Muslim 234). One of the easiest ways to earn Jannah — say it after every wudu.",ref:"Sahih Muslim 234"},

after_salah:{title:"Dua After Salah",arabic:"اللَّهُمَّ أَنْتَ السَّلَامُ، وَمِنْكَ السَّلَامُ، تَبَارَكْتَ يَا ذَا الْجَلَالِ وَالْإِكْرَامِ",translit:"Allāhumma antas-Salām, wa minkas-salām, tabārakta yā dhal-jalāli wal-ikrām",transl:"O Allah, You are Peace and from You is peace. Blessed are You, O Possessor of Glory and Honour.",virtue:"<strong>Thawban ؓ reported that when the Prophet ﷺ finished his prayer, he would seek forgiveness three times then recite this.</strong> (Sahih Muslim 591). Follow with Subhanallah ×33, Alhamdulillah ×33, Allahu Akbar ×34. This routine of post-prayer dhikr is a shield for the whole day.",ref:"Sahih Muslim 591"},

rain:{title:"Dua During Rain",arabic:"اللَّهُمَّ صَيِّبًا نَافِعًا",translit:"Allāhumma ṣayyiban nāfi'ā",transl:"O Allah, make it a beneficial rain.",virtue:"<strong>The Prophet ﷺ said this when rain fell.</strong> (Sahih al-Bukhari 1032). Rain is one of the most blessed times for dua — the Prophet said rain-time dua is not rejected. Say this first, then pour out your deepest needs to Allah while the rain falls.",ref:"Sahih al-Bukhari 1032"},

mirror:{title:"Dua When Looking in the Mirror",arabic:"اللَّهُمَّ أَنْتَ حَسَّنْتَ خَلْقِي فَأَحْسِنْ خُلُقِي",translit:"Allāhumma anta ḥassanta khalqī fa-aḥsin khuluqī",transl:"O Allah, just as You have made my physical form beautiful, beautify my character.",virtue:"<strong>The Prophet ﷺ recited this dua when looking in the mirror.</strong> It is a powerful reminder that physical beauty is a gift from Allah, but the beauty of character (akhlaq) is what truly matters before Him. A dua that realigns priorities every single day.",ref:"Musnad Ahmad 3423 | Hasan"},

istikhara:{title:"Dua al-Istikhara — Seeking Allah's Guidance",arabic:"اللَّهُمَّ إِنِّي أَسْتَخِيرُكَ بِعِلْمِكَ، وَأَسْتَقْدِرُكَ بِقُدْرَتِكَ، وَأَسْأَلُكَ مِنْ فَضْلِكَ الْعَظِيمِ، فَإِنَّكَ تَقْدِرُ وَلَا أَقْدِرُ، وَتَعْلَمُ وَلَا أَعْلَمُ، وَأَنْتَ عَلَّامُ الْغُيُوبِ",translit:"Allāhumma innī astakhīruka bi'ilmik, wa astaqdiruka biqudratik, wa as'aluka min faḍlikal-'aẓīm, fa innaka taqdiru wa lā aqdiru, wa ta'lamu wa lā a'lamu, wa anta 'allāmul-ghuyūb",transl:"O Allah, I seek Your guidance through Your knowledge, and I seek ability through Your power, and I ask You from Your great bounty. For You have power and I do not, You know and I do not know, and You are the Knower of the unseen.",virtue:"<strong>Pray 2 voluntary raka'at then recite this while naming the specific matter.</strong> Jabir ؓ said the Prophet ﷺ taught Istikhara as he taught a surah of the Quran — it is a Sunnah muakkadah. It is the ultimate surrender: trusting Allah's knowledge over your own limited perspective.",ref:"Sahih al-Bukhari 1166"},

qunoot:{title:"Dua Qunoot — For Witr Prayer",arabic:"اللَّهُمَّ اهْدِنِي فِيمَنْ هَدَيْتَ، وَعَافِنِي فِيمَنْ عَافَيْتَ، وَتَوَلَّنِي فِيمَنْ تَوَلَّيْتَ، وَبَارِكْ لِي فِيمَا أَعْطَيْتَ، وَقِنِي شَرَّ مَا قَضَيْتَ، إِنَّكَ تَقْضِي وَلَا يُقْضَى عَلَيْكَ",translit:"Allāhummahdini fīman hadayt, wa 'āfinī fīman 'āfayt, wa tawallanī fīman tawallayt, wa bārik lī fīmā a'ṭayt, wa qinī sharra mā qaḍayt, innaka taqḍī wa lā yuqḍā 'alayk",transl:"O Allah, guide me among those You have guided, grant me health among those You have granted health, take me under Your care, bless me in what You have given me, and protect me from the evil of what You have decreed. For You decree and none can decree over You.",virtue:"<strong>The Prophet ﷺ taught this dua to Al-Hasan ibn Ali ؓ for the Witr prayer.</strong> It covers six complete requests: guidance, health, divine care, blessing, protection from evil decree, and acknowledgement of Allah's supreme authority.",ref:"Sunan Abu Dawood 1425 | Sahih"},

tahajjud:{title:"Dua for Tahajjud (Night Prayer)",arabic:"اللَّهُمَّ لَكَ الْحَمْدُ أَنْتَ نُورُ السَّمَاوَاتِ وَالْأَرْضِ وَمَنْ فِيهِنَّ، وَلَكَ الْحَمْدُ أَنْتَ قَيِّمُ السَّمَاوَاتِ وَالْأَرْضِ",translit:"Allāhumma lakal-ḥamd, anta nūrus-samāwāti wal-arḍi wa man fīhinn, wa lakal-ḥamd, anta qayyimus-samāwāti wal-arḍ",transl:"O Allah, all praise is for You. You are the light of the heavens and the earth and all who are in them. And all praise is for You; You are the Sustainer of the heavens and earth.",virtue:"<strong>The Prophet ﷺ began his Tahajjud prayer with this supplication.</strong> (Sahih al-Bukhari 1120). The last third of the night is the most accepted time for dua. Allah descends to the nearest heaven and says: 'Is there anyone supplicating that I may respond? Is there anyone seeking forgiveness that I may forgive?'",ref:"Sahih al-Bukhari 1120"},

laylatul_qadr:{title:"Dua for Laylatul Qadr — Night of Power",arabic:"اللَّهُمَّ إِنَّكَ عَفُوٌّ تُحِبُّ الْعَفْوَ فَاعْفُ عَنِّي",translit:"Allāhumma innaka 'afuwwun tuḥibbul-'afwa fa'fu 'annī",transl:"O Allah, indeed You are Pardoning. You love to pardon, so pardon me.",virtue:"<strong>'A'isha ؓ asked the Prophet ﷺ: What should I say if I find Laylatul Qadr? He said: Say this dua.</strong> (Tirmidhi 3513 — Sahih). Laylatul Qadr is better than 1000 months of worship (Quran 97:3). Repeat this abundantly throughout all odd nights of the last 10 days of Ramadan.",ref:"Jami' at-Tirmidhi 3513 | Sahih"},

protection_all:{title:"Comprehensive Daily Protection Dua",arabic:"بِسْمِ اللَّهِ الَّذِي لَا يَضُرُّ مَعَ اسْمِهِ شَيْءٌ فِي الْأَرْضِ وَلَا فِي السَّمَاءِ وَهُوَ السَّمِيعُ الْعَلِيمُ",translit:"Bismillāhilladhī lā yaḍurru ma'asmihi shay'un fil-arḍi wa lā fis-samā'i wa huwas-Samī'ul-'Alīm",transl:"In the name of Allah, with whose name nothing can cause harm on earth or in the heavens, and He is the All-Hearing, the All-Knowing.",virtue:"<strong>Whoever says this three times in the morning and three times in the evening will not be harmed by anything.</strong> Uthman ibn Affan ؓ reported that the Prophet ﷺ said: 'Nothing will harm him.' (Abu Dawood 5088 — Sahih). Among the most powerful daily shields against all harm.",ref:"Sunan Abu Dawood 5088 | Sahih"},

dua_masood:{title:"Dua of Ibn Mas'ud — For Deep Grief & Distress",arabic:"اللَّهُمَّ إِنِّي عَبْدُكَ ابْنُ عَبْدِكَ ابْنُ أَمَتِكَ، نَاصِيَتِي بِيَدِكَ، مَاضٍ فِيَّ حُكْمُكَ، عَدْلٌ فِيَّ قَضَاؤُكَ، أَسْأَلُكَ بِكُلِّ اسْمٍ هُوَ لَكَ سَمَّيْتَ بِهِ نَفْسَكَ أَوْ عَلَّمْتَهُ أَحَدًا مِنْ خَلْقِكَ، أَنْ تَجْعَلَ الْقُرْآنَ رَبِيعَ قَلْبِي وَنُورَ صَدْرِي وَجِلَاءَ حُزْنِي وَذَهَابَ هَمِّي",translit:"Allāhumma innī 'abduka, ibnu 'abdika, ibnu amatik, nāṣiyatī biyadik, māḍin fiyya ḥukmuk, 'adlun fiyya qaḍā'uk, as'aluka bikulli ismin huwa laka sammayta bihi nafsaka aw 'allamtahu aḥadan min khalqika, an taj'alal-Qur'āna rabī'a qalbī wa nūra ṣadrī wa jalā'a ḥuznī wa dhahāba hammī",transl:"O Allah, I am Your servant, the son of Your servant, the son of Your maidservant. My forelock is in Your hand, Your command over me is forever executed, and Your decree upon me is always just. I ask You by every name that belongs to You — that You make the Quran the spring of my heart, the light of my chest, the remover of my sadness, and the expeller of my anxiety.",virtue:"<strong>The Prophet ﷺ said: 'No one says this but Allah will remove his grief and replace his sorrow with joy.'</strong> When asked if they should learn it, the Prophet replied: 'Of course — whoever hears it should study it.' This is among the most powerful duas for grief and emotional healing ever taught.",ref:"Musnad Ahmad 3712 | Al-Albani: Sahih"},

prophet_Ibrahim:{title:"Dua of Ibrahim ﷺ — For Acceptance",arabic:"رَبَّنَا تَقَبَّلْ مِنَّا إِنَّكَ أَنتَ السَّمِيعُ الْعَلِيمُ وَتُبْ عَلَيْنَا إِنَّكَ أَنتَ التَّوَّابُ الرَّحِيمُ",translit:"Rabbanā taqabbal minnā innaka antas-Samī'ul-'Alīm, wa tub 'alaynā innaka antat-Tawwābur-Raḥīm",transl:"Our Lord, accept this from us. Indeed You are the All-Hearing, the All-Knowing. And accept our repentance. Indeed, You are the Accepting of Repentance, the Merciful.",virtue:"<strong>Prophet Ibrahim (AS) made this dua with his son Ismail (AS) while raising the foundations of the Kaaba.</strong> (Al-Baqarah 2:127-128). Even the greatest of Prophets expressed humility and fear of their deeds not being accepted. Recite after every good deed as the Sunnah of Ibrahim (AS).",ref:"Surah Al-Baqarah 2:127-128"},

tawbah:{title:"Dua of Adam (AS) — For Complete Repentance",arabic:"رَبَّنَا ظَلَمْنَا أَنفُسَنَا وَإِن لَّمْ تَغْفِرْ لَنَا وَتَرْحَمْنَا لَنَكُونَنَّ مِنَ الْخَاسِرِينَ",translit:"Rabbanā ẓalamnā anfusanā wa il-lam taghfir lanā wa tarḥamnā lenakūnanna minal-khāsirīn",transl:"Our Lord, we have wronged ourselves, and if You do not forgive us and have mercy upon us, we will surely be among the losers.",virtue:"<strong>The dua of Prophet Adam and Hawwa (AS) after their departure from Paradise.</strong> (Al-A'raf 7:23). Allah accepted their repentance fully. This is the template of tawbah — full acknowledgement of wrongdoing, complete reliance on Allah's mercy, no excuses and no blaming others.",ref:"Surah Al-A'raf 7:23"}
};

let cur=null;

const slugMap = {
    'emotions': 'emotional-duas',
    'situations': 'situational-duas',
    'daily': 'daily-prayers',
    'special': 'special-duas'
};

function swTab(name, el, updateUrl = true){
  document.querySelectorAll('.tab').forEach(t=>t.classList.remove('on'));
  document.querySelectorAll('.panel').forEach(p=>p.classList.remove('on'));
  el.classList.add('on');
  document.getElementById('panel-'+name).classList.add('on');
  document.getElementById('dua-card').style.display='none';
  document.querySelectorAll('.btn').forEach(b=>b.classList.remove('sel'));

  if(updateUrl && slugMap[name]) {
      const newUrl = "{{ route('tools.dua-finder') }}/" + slugMap[name];
      window.history.pushState(null, '', newUrl);
  }
}

document.addEventListener('DOMContentLoaded', () => {
    const currentCategory = "{{ $category ?? '' }}";
    let initialTab = 'emotions';
    
    if (currentCategory === 'situational-duas') initialTab = 'situations';
    else if (currentCategory === 'daily-prayers') initialTab = 'daily';
    else if (currentCategory === 'special-duas') initialTab = 'special';

    const tabButton = document.querySelector(`.tab[onclick*="swTab('${initialTab}'"]`);
    if (tabButton) {
        swTab(initialTab, tabButton, false);
    }
});

function show(id,el){
  const d=db[id];if(!d)return;cur=d;
  document.querySelectorAll('.btn').forEach(b=>b.classList.remove('sel'));
  if(el)el.classList.add('sel');
  document.getElementById('c-title').innerHTML=d.title;
  document.getElementById('c-arabic').textContent=d.arabic;
  document.getElementById('c-translit').textContent=d.translit;
  document.getElementById('c-transl').textContent=d.transl;
  document.getElementById('c-virtue').innerHTML=d.virtue;
  document.getElementById('c-ref').textContent='📖 '+d.ref;
  const b=document.getElementById('copy-btn');b.textContent='📋 Copy';b.classList.remove('ok');
  const card=document.getElementById('dua-card');
  card.style.display='none';void card.offsetWidth;card.style.display='block';
  setTimeout(()=>card.scrollIntoView({behavior:'smooth',block:'nearest'}),50);
}

function copyDua(){
  if(!cur)return;
  const t=`${cur.title}\n\n${cur.arabic}\n\n${cur.translit}\n\n"${cur.transl}"\n\nSource: ${cur.ref}\n\nejlals.com`;
  navigator.clipboard.writeText(t).then(()=>{
    const b=document.getElementById('copy-btn');b.textContent='✅ Copied!';b.classList.add('ok');
    setTimeout(()=>{b.textContent='📋 Copy';b.classList.remove('ok')},2600);
  }).catch(()=>{});
}

function shareDua(){
  if(!cur)return;
  const t=`${cur.title}\n\n${cur.arabic}\n\n"${cur.transl}"\n\nSource: ${cur.ref}\n\nMore authentic duas → ejlals.com/dua-finder/`;
  if(navigator.share){navigator.share({title:cur.title,text:t})}
  else{navigator.clipboard.writeText(t).then(()=>alert('Dua copied to clipboard for sharing!'))}
}

function searchDuas(query) {
    query = query.toLowerCase().trim();
    const isSearching = query.length > 0;
    
    if (isSearching) {
        document.querySelector('.tab-row').style.display = 'none';
        document.querySelectorAll('.panel').forEach(p => {
            p.style.display = 'block';
            if(p.querySelector('.panel-label')) p.querySelector('.panel-label').style.display = 'none';
        });
        
        document.querySelectorAll('.btn').forEach(btn => {
            const title = btn.querySelector('.btn-name').textContent.toLowerCase();
            const sub = btn.querySelector('.btn-sub').textContent.toLowerCase();
            if (title.includes(query) || sub.includes(query)) {
                btn.style.display = 'flex';
            } else {
                btn.style.display = 'none';
            }
        });
    } else {
        document.querySelector('.tab-row').style.display = 'flex';
        document.querySelectorAll('.panel').forEach(p => {
            p.style.display = '';
            if(p.querySelector('.panel-label')) p.querySelector('.panel-label').style.display = 'block';
        });
        document.querySelectorAll('.btn').forEach(btn => {
            btn.style.display = 'flex';
        });
        const activeTab = document.querySelector('.tab.on');
        if(activeTab) activeTab.click();
    }
}
</script>
@endsection
