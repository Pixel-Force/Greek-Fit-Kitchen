<?php
/**
 * Front Page Template for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<!-- ================= HERO SLIDER SECTION ================= -->
<section class="relative bg-slate-900 text-white overflow-hidden hero-slider-container" id="heroSlider">
  <!-- SLIDE 1: Flyer Main Headline -->
  <div class="slide-item active">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg' ); ?>" alt="Greek Souvlaki &amp; Meal Prep" class="w-full h-full object-cover opacity-35 filter brightness-75 scale-105 transition-transform duration-700" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-2xl space-y-5">
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-sky-500/20 border border-sky-400/30 backdrop-blur-md text-sky-300 text-xs font-bold tracking-wider uppercase">
            <span>🇬🇷 Authentic Mediterranean Meal Prep</span>
          </div>
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
            BIG GREEK <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-amber-300">FLAVOUR.</span><br />
            ZERO MEAL PREP.
          </h1>
          <p class="text-base sm:text-lg text-slate-300 max-w-xl font-normal leading-relaxed">
            Freshly cooked healthy Greek meals delivered across Toronto every Sunday &amp; Wednesday. Packed with lean protein, authentic Aegean herbs, and custom sides.
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#menuSection" class="px-7 py-3.5 bg-sky-500 hover:bg-sky-400 active:scale-95 text-slate-950 font-black rounded-xl text-sm transition-all shadow-lg shadow-sky-500/30 flex items-center gap-2">
              <span>Explore Meals &amp; Order</span>
              <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
            </a>
            <button onclick="addSixMealPackage()" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-xl text-sm backdrop-blur-md transition-all">
              <span>Quick Add 6-Meal Pack ($59.94)</span>
            </button>
          </div>
          <div class="grid grid-cols-3 gap-3 pt-4 border-t border-white/10 max-w-md">
            <div>
              <span class="block text-2xl font-black text-amber-400">$59.94</span>
              <span class="text-[11px] text-slate-400">6-Meal Starter</span>
            </div>
            <div>
              <span class="block text-2xl font-black text-sky-400">10% OFF</span>
              <span class="text-[11px] text-slate-400">7+ Meals</span>
            </div>
            <div>
              <span class="block text-2xl font-black text-emerald-400">2 Sides</span>
              <span class="text-[11px] text-slate-400">Included Per Plate</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SLIDE 2: Your Meal Your Way -->
  <div class="slide-item">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-2-meal-prep.jpg' ); ?>" alt="Healthy Meal Prep Containers" class="w-full h-full object-cover opacity-35 filter brightness-75 scale-105 transition-transform duration-700" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-2xl space-y-5">
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-amber-500/20 border border-amber-400/30 backdrop-blur-md text-amber-300 text-xs font-bold tracking-wider uppercase">
            <span>🥗 Completely Customizable Plates</span>
          </div>
          <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
            YOUR MEAL.<br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 to-sky-300">YOUR WAY.</span>
          </h2>
          <p class="text-base sm:text-lg text-slate-300 max-w-xl font-normal leading-relaxed">
            20 delicious main dishes — from Souvlaki to Atlantic Salmon and Spinach Feta Chicken. Any plate comes with 2 gourmet sides of your choice!
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#menuSection" class="px-7 py-3.5 bg-amber-500 hover:bg-amber-400 text-slate-950 font-black rounded-xl text-sm transition-all shadow-lg shadow-amber-500/30">
              Build Your Plates
            </a>
            <a href="#deliveryCalculator" class="px-6 py-3.5 bg-white/10 border border-white/20 text-white font-bold rounded-xl text-sm">
              Check Delivery Rates
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SLIDE 3: Scheduled Deliveries -->
  <div class="slide-item">
    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-3-mediterranean.jpg' ); ?>" alt="Fresh Mediterranean Food" class="w-full h-full object-cover opacity-35 filter brightness-75 scale-105 transition-transform duration-700" />
    <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/50 to-transparent"></div>
    <div class="absolute inset-0 flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
        <div class="max-w-2xl space-y-5">
          <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-emerald-500/20 border border-emerald-400/30 backdrop-blur-md text-emerald-300 text-xs font-bold tracking-wider uppercase">
            <span>🚚 Scheduled Toronto Deliveries</span>
          </div>
          <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
            ADVANCE PREP.<br /><span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-400 to-sky-300">MAXIMUM FRESHNESS.</span>
          </h2>
          <p class="text-base sm:text-lg text-slate-300 max-w-xl font-normal leading-relaxed">
            Cooked fresh in advance batches so food never sits around. Order before cutoff for prompt delivery or pickup at George the Greek.
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#deliveryCalculator" class="px-7 py-3.5 bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-black rounded-xl text-sm">
              Calculate Delivery Fee
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <button onclick="prevSlide()" aria-label="Previous Slide" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/40 hover:bg-black/70 text-white backdrop-blur-md flex items-center justify-center transition border border-white/10">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
  </button>
  <button onclick="nextSlide()" aria-label="Next Slide" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/40 hover:bg-black/70 text-white backdrop-blur-md flex items-center justify-center transition border border-white/10">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
  </button>
  <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2 z-20">
    <button onclick="goToSlide(0)" aria-label="Slide 1" class="slider-dot w-8 h-2 rounded-full bg-sky-400 transition-all"></button>
    <button onclick="goToSlide(1)" aria-label="Slide 2" class="slider-dot w-2.5 h-2 rounded-full bg-white/40 hover:bg-white transition-all"></button>
    <button onclick="goToSlide(2)" aria-label="Slide 3" class="slider-dot w-2.5 h-2 rounded-full bg-white/40 hover:bg-white transition-all"></button>
  </div>
</section>

<!-- ================= FLYER PACKAGE PRICING SECTION ================= -->
<section class="py-12 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-slate-800" id="packagePricing">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-gradient-to-br from-slate-900 to-sky-950 rounded-3xl p-6 sm:p-10 text-white shadow-2xl relative overflow-hidden border border-sky-500/20">
      <div class="lg:col-span-7 space-y-4">
        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-amber-500 text-slate-950 font-black text-xs uppercase tracking-wider">
          ⭐ Official Flyer Package Deal
        </div>
        <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight leading-tight">
          6-Meal Plan <span class="text-amber-400">Starting From $59.94</span> CAD
        </h2>
        <p class="text-sm text-slate-300 leading-relaxed">
          Order your week of healthy meals with Greek Fit Kitchen. Enjoy chef-prepared lean proteins, slow-roasted lemon potatoes, wholesome rice, and fresh vegetables. Minimum order is 6 meals.
        </p>
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2">
          <div class="p-3 bg-white/5 border border-white/10 rounded-xl">
            <span class="text-xs text-slate-400 block">Single Meals</span>
            <strong class="text-base text-white">Individually Priced</strong>
          </div>
          <div class="p-3 bg-white/5 border border-white/10 rounded-xl">
            <span class="text-xs text-slate-400 block">Volume Discount</span>
            <strong class="text-base text-emerald-400">10% OFF (7+ meals)</strong>
          </div>
          <div class="p-3 bg-white/5 border border-white/10 rounded-xl col-span-2 sm:col-span-1">
            <span class="text-xs text-slate-400 block">Sides Rule</span>
            <strong class="text-base text-sky-400">2 Sides Included</strong>
          </div>
        </div>
        <div class="pt-3 flex flex-wrap items-center gap-4">
          <button onclick="addSixMealPackage()" class="px-6 py-3 bg-amber-500 hover:bg-amber-400 text-slate-950 font-black rounded-xl text-sm transition shadow-lg flex items-center gap-2">
            <span>⚡ One-Click Add 6-Meal Starter ($59.94)</span>
          </button>
          <a href="#menuSection" class="text-xs font-semibold text-sky-300 hover:text-white underline underline-offset-4">
            Or pick individual custom meals →
          </a>
        </div>
      </div>
      <div class="lg:col-span-5 relative">
        <div class="relative rounded-2xl overflow-hidden border-2 border-white/20 shadow-2xl group">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/meals/meal-prep-showcase.jpg' ); ?>" alt="Greek Fit Kitchen Meal Trays" class="w-full h-auto object-cover group-hover:scale-105 transition-transform duration-500" />
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ================= HOW IT WORKS ================= -->
<section class="py-16 bg-slate-100/60 dark:bg-slate-900/40" id="howItWorks">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <span class="text-xs font-bold uppercase tracking-wider text-sky-600 dark:text-sky-400 bg-sky-100 dark:bg-sky-900/40 px-3 py-1 rounded-full">
        Simple 4-Step Process
      </span>
      <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-slate-900 dark:text-white mt-3 font-heading">
        HOW GREEK FIT KITCHEN WORKS
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm mt-2">
        Advance scheduled meal-preparation ensuring zero food waste and maximum freshness.
      </p>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
      <div class="glass-card p-6 rounded-2xl border border-slate-200 dark:border-slate-800 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-sky-600/10 text-sky-600 dark:text-sky-400 font-black text-xl flex items-center justify-center mb-4">1</div>
        <h3 class="font-bold text-base text-slate-900 dark:text-white mb-2">Select Your Meals</h3>
        <p class="text-xs text-slate-600 dark:text-slate-400">Choose a minimum of 6 meals from our 20 dishes. 7+ meals get 10% OFF.</p>
      </div>
      <div class="glass-card p-6 rounded-2xl border border-slate-200 dark:border-slate-800 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-sky-600/10 text-sky-600 dark:text-sky-400 font-black text-xl flex items-center justify-center mb-4">2</div>
        <h3 class="font-bold text-base text-slate-900 dark:text-white mb-2">Choose 2 Sides Free</h3>
        <p class="text-xs text-slate-600 dark:text-slate-400">Any plate comes with 2 included sides (potatoes, rice, greens, etc.), except Pasta al Greco.</p>
      </div>
      <div class="glass-card p-6 rounded-2xl border border-slate-200 dark:border-slate-800 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-sky-600/10 text-sky-600 dark:text-sky-400 font-black text-xl flex items-center justify-center mb-4">3</div>
        <h3 class="font-bold text-base text-slate-900 dark:text-white mb-2">Schedule Delivery / Pickup</h3>
        <p class="text-xs text-slate-600 dark:text-slate-400">Sunday or Wednesday delivery. Order before advance cutoff. Pickup at George the Greek is free.</p>
      </div>
      <div class="glass-card p-6 rounded-2xl border border-slate-200 dark:border-slate-800 text-center">
        <div class="w-12 h-12 mx-auto rounded-full bg-sky-600/10 text-sky-600 dark:text-sky-400 font-black text-xl flex items-center justify-center mb-4">4</div>
        <h3 class="font-bold text-base text-slate-900 dark:text-white mb-2">Heat, Eat &amp; Thrive</h3>
        <p class="text-xs text-slate-600 dark:text-slate-400">Arrives fresh and refrigerated. Ready in just 2 minutes. Healthy fuel with zero cleanup!</p>
      </div>
    </div>
  </div>
</section>

<!-- ================= MENU CATALOG ================= -->
<section class="py-16 bg-white dark:bg-slate-900" id="menuSection">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 mb-8">
      <div>
        <span class="text-xs font-bold uppercase tracking-wider text-sky-600 dark:text-sky-400">Chef Curated</span>
        <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-slate-900 dark:text-white mt-1 font-heading">
          20 GOURMET MAIN DISHES
        </h2>
        <p class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 mt-1">
          Minimum order 6 meals · 10% volume discount applied at 7+ meals · All prices in CAD
        </p>
      </div>
      <div class="flex flex-wrap items-center gap-2">
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-sky-600 text-white shadow-md" data-cat="all">All (20)</button>
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-slate-200/60 dark:bg-slate-800 text-slate-700 dark:text-slate-300" data-cat="poultry">Poultry</button>
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-slate-200/60 dark:bg-slate-800 text-slate-700 dark:text-slate-300" data-cat="beef">Beef</button>
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-slate-200/60 dark:bg-slate-800 text-slate-700 dark:text-slate-300" data-cat="pork">Pork</button>
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-slate-200/60 dark:bg-slate-800 text-slate-700 dark:text-slate-300" data-cat="seafood">Seafood</button>
        <button class="cat-filter-btn px-3.5 py-1.5 rounded-full text-xs font-bold bg-slate-200/60 dark:bg-slate-800 text-slate-700 dark:text-slate-300" data-cat="vegetarian">Veggie</button>
      </div>
    </div>
    <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"></div>
  </div>
</section>

<!-- ================= DELIVERY DISTANCE CALCULATOR ================= -->
<section class="py-16 bg-slate-100/70 dark:bg-slate-900/60 border-t border-b border-slate-200 dark:border-slate-800" id="deliveryCalculator">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="max-w-3xl mx-auto text-center mb-10">
      <span class="text-xs font-bold uppercase tracking-wider text-sky-600 dark:text-sky-400 bg-sky-100 dark:bg-sky-900/40 px-3 py-1 rounded-full">Transparent Rates</span>
      <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-slate-900 dark:text-white mt-3 font-heading">
        DELIVERY FEE CALCULATOR
      </h2>
      <p class="text-slate-600 dark:text-slate-400 text-sm mt-2">
        Enter distance from George the Greek (3575 Lake Shore Blvd W, Etobicoke):
      </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 max-w-5xl mx-auto items-stretch">
      <div class="lg:col-span-7 glass-card p-6 sm:p-8 rounded-2xl border border-slate-200 dark:border-slate-800 flex flex-col justify-between">
        <div>
          <label for="calcDistanceInput" class="block text-xs font-bold uppercase tracking-wider mb-2">Distance in Kilometres (KM)</label>
          <div class="relative">
            <input type="number" id="calcDistanceInput" min="0" max="50" step="0.5" value="4.5" oninput="updateDistanceCalculatorUI()" class="w-full px-4 py-3 rounded-xl border border-slate-300 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white font-bold text-lg" />
            <span class="absolute right-4 top-1/2 -translate-y-1/2 text-xs font-semibold text-slate-400">KM</span>
          </div>
          <div class="flex items-center gap-2 text-xs mt-3">
            <span class="text-slate-400">Presets:</span>
            <button onclick="document.getElementById('calcDistanceInput').value=1.5; updateDistanceCalculatorUI();" class="px-2.5 py-1 rounded bg-slate-200 dark:bg-slate-700">1.5 km</button>
            <button onclick="document.getElementById('calcDistanceInput').value=4.0; updateDistanceCalculatorUI();" class="px-2.5 py-1 rounded bg-slate-200 dark:bg-slate-700">4.0 km</button>
            <button onclick="document.getElementById('calcDistanceInput').value=12; updateDistanceCalculatorUI();" class="px-2.5 py-1 rounded bg-slate-200 dark:bg-slate-700">12 km</button>
          </div>
        </div>

        <div class="mt-8 p-5 rounded-xl bg-slate-50 dark:bg-slate-800/80 border border-slate-200 dark:border-slate-700 flex items-center justify-between">
          <div>
            <span class="text-xs text-slate-500 block">Delivery Charge:</span>
            <div id="calcResultFee" class="mt-0.5"><span class="text-sky-400 font-bold text-2xl">$5.00 CAD</span></div>
          </div>
          <div id="calcResultBadge"><span class="bg-sky-500/20 text-sky-400 text-xs px-2.5 py-1 rounded-full font-semibold">Standard Local Zone (2–5 km)</span></div>
        </div>
      </div>

      <div class="lg:col-span-5 bg-gradient-to-br from-slate-900 to-sky-950 text-white p-6 sm:p-8 rounded-2xl border border-sky-500/20 flex flex-col justify-between">
        <div>
          <h4 class="font-bold text-lg mb-4">Official Rate Tiers</h4>
          <div class="space-y-3 text-xs">
            <div class="p-3 rounded-xl bg-white/5 flex justify-between"><span>Up to 2 km</span><strong class="text-emerald-400">FREE</strong></div>
            <div class="p-3 rounded-xl bg-white/5 flex justify-between"><span>Over 2 km up to 5 km</span><strong class="text-sky-300">$5.00 CAD</strong></div>
            <div class="p-3 rounded-xl bg-white/5 flex justify-between"><span>Over 5 km</span><strong class="text-amber-300">$1.00 / km</strong></div>
          </div>
        </div>
        <div class="mt-6 pt-5 border-t border-white/10 text-xs text-slate-300">
          📍 Free Pickup: George the Greek, 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
