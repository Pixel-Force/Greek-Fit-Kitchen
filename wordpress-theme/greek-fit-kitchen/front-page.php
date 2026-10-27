<?php
/**
 * Front Page Template for Greek Fit Kitchen WordPress Theme
 *
 * Section Order:
 * 1. Hero slider (Three slides: signature meals, 10% savings, six-meal packages)
 * 2. Featured meals (20 dishes, CAD prices, side-selection options, Add to Cart)
 * 3. Meal plans and savings (6-meal starter from $59.94 CAD, 10% volume discount)
 * 4. How ordering works (Choose meals, select delivery day, pay securely, receive scheduled delivery)
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="flex-1">

  <!-- =========================================================================
       1. HERO SLIDER SECTION (Order requirement #1)
       Three slides: Signature Meals, 10% Savings, and Six-Meal Packages.
       Each slide has a clear Order Now button.
       ========================================================================= -->
  <section class="relative bg-greek-midnight text-white overflow-hidden hero-slider-container" id="heroSlider">
    
    <!-- SLIDE 1: Signature Meals -->
    <div class="slide-item active">
      <img 
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg' ); ?>" 
        alt="Signature Greek Meals" 
        width="1600" 
        height="680"
        class="w-full h-full object-cover opacity-40 filter brightness-75 scale-105 transition-transform duration-700" 
      />
      <div class="absolute inset-0 bg-gradient-to-t from-greek-midnight via-greek-midnight/60 to-transparent"></div>
      
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
          <div class="max-w-2xl space-y-5">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-greek-lime/20 border border-greek-lime/40 backdrop-blur-md text-greek-lime text-xs font-black tracking-wider uppercase">
              <span>🇬🇷 Authentic Mediterranean Meal Prep</span>
            </div>
            
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
              BIG GREEK <span class="text-white">FLAVOUR.</span><br />
              <span class="text-greek-gold">ZERO MEAL PREP.</span>
            </h1>

            <p class="text-base sm:text-lg text-slate-200 max-w-xl font-normal leading-relaxed">
              Enjoy authentic Aegean recipes cooked fresh to order by George the Greek. 20 high-protein main dishes with your choice of 2 custom sides per plate.
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
              <a href="#featuredMeals" class="px-8 py-3.5 btn-gold rounded-xl text-sm font-black flex items-center gap-2 shadow-xl">
                <span>Order Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </a>
              <button onclick="addSixMealPackage()" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-xl text-sm backdrop-blur-md transition-all flex items-center gap-2">
                <span>⚡ Quick 6-Meal Pack ($59.94)</span>
              </button>
            </div>

            <div class="grid grid-cols-3 gap-3 pt-4 border-t border-white/10 max-w-md">
              <div>
                <span class="block text-2xl font-black text-greek-gold">$59.94</span>
                <span class="text-[11px] text-slate-300">6-Meal Starter</span>
              </div>
              <div>
                <span class="block text-2xl font-black text-greek-lime">10% OFF</span>
                <span class="text-[11px] text-slate-300">Orders of 7+ Meals</span>
              </div>
              <div>
                <span class="block text-2xl font-black text-white">2 Sides</span>
                <span class="text-[11px] text-slate-300">Included Per Plate</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 2: 10% Savings on 7+ Meals -->
    <div class="slide-item">
      <img 
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-2-meal-prep.jpg' ); ?>" 
        alt="10% Savings on Meal Prep" 
        width="1600" 
        height="680"
        loading="lazy"
        class="w-full h-full object-cover opacity-40 filter brightness-75 scale-105 transition-transform duration-700" 
      />
      <div class="absolute inset-0 bg-gradient-to-t from-greek-midnight via-greek-midnight/60 to-transparent"></div>
      
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
          <div class="max-w-2xl space-y-5">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-greek-gold/20 border border-greek-gold/40 backdrop-blur-md text-greek-gold text-xs font-black tracking-wider uppercase">
              <span>💰 Automatic Volume Savings</span>
            </div>
            
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
              10% OFF ORDERS<br />
              <span class="text-greek-gold">OF 7 MEALS OR MORE.</span>
            </h2>

            <p class="text-base sm:text-lg text-slate-200 max-w-xl font-normal leading-relaxed">
              Stock your fridge for the entire week and save! Our 10% volume discount applies automatically in your cart as soon as you add 7 or more plates.
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
              <a href="#featuredMeals" class="px-8 py-3.5 btn-gold rounded-xl text-sm font-black flex items-center gap-2 shadow-xl">
                <span>Order Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </a>
              <a href="#mealPlans" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-xl text-sm backdrop-blur-md transition-all">
                <span>View Savings Breakdown</span>
              </a>
            </div>

            <div class="flex items-center gap-6 pt-4 text-xs text-slate-300">
              <span class="flex items-center gap-1.5"><span class="text-greek-lime">✓</span> Automatically Applied in Cart</span>
              <span class="flex items-center gap-1.5"><span class="text-greek-lime">✓</span> Mix &amp; Match Any Dishes</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 3: Six-Meal Packages -->
    <div class="slide-item">
      <img 
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-3-mediterranean.jpg' ); ?>" 
        alt="Six-Meal Packages" 
        width="1600" 
        height="680"
        loading="lazy"
        class="w-full h-full object-cover opacity-40 filter brightness-75 scale-105 transition-transform duration-700" 
      />
      <div class="absolute inset-0 bg-gradient-to-t from-greek-midnight via-greek-midnight/60 to-transparent"></div>
      
      <div class="absolute inset-0 flex items-center">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
          <div class="max-w-2xl space-y-5">
            <div class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full bg-greek-lime/20 border border-greek-lime/40 backdrop-blur-md text-greek-lime text-xs font-black tracking-wider uppercase">
              <span>📦 Complete Nutrition Package</span>
            </div>
            
            <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black tracking-tight uppercase leading-none font-heading">
              SIX-MEAL PACKAGES.<br />
              <span class="text-greek-gold">STARTING FROM $59.94 CAD.</span>
            </h2>

            <p class="text-base sm:text-lg text-slate-200 max-w-xl font-normal leading-relaxed">
              Minimum order of 6 meals guarantees peak cooking freshness. Choose your favorites and pick 2 gourmet sides for each plate.
            </p>

            <div class="flex flex-wrap items-center gap-4 pt-2">
              <a href="#featuredMeals" class="px-8 py-3.5 btn-gold rounded-xl text-sm font-black flex items-center gap-2 shadow-xl">
                <span>Order Now</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </a>
              <button onclick="addSixMealPackage()" class="px-6 py-3.5 btn-lime rounded-xl text-sm font-black flex items-center gap-2">
                <span>Add 6-Meal Starter ($59.94)</span>
              </button>
            </div>

            <div class="flex items-center gap-4 pt-4 text-xs text-slate-300">
              <span>🚚 Sunday &amp; Wednesday Scheduled Delivery or Free Pickup in Etobicoke</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Slider Arrows -->
    <button onclick="prevSlide()" aria-label="Previous Slide" class="absolute left-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/40 hover:bg-black/70 text-white backdrop-blur-md flex items-center justify-center transition border border-white/10 z-20">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button onclick="nextSlide()" aria-label="Next Slide" class="absolute right-4 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/40 hover:bg-black/70 text-white backdrop-blur-md flex items-center justify-center transition border border-white/10 z-20">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>

    <!-- Slider Dots -->
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2.5 z-20">
      <button onclick="goToSlide(0)" aria-label="Slide 1" class="slider-dot w-8 h-2.5 rounded-full bg-greek-gold transition-all"></button>
      <button onclick="goToSlide(1)" aria-label="Slide 2" class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition-all"></button>
      <button onclick="goToSlide(2)" aria-label="Slide 3" class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition-all"></button>
    </div>
  </section>

  <!-- =========================================================================
       2. FEATURED MEALS SECTION (Order requirement #2)
       Display meal photos, prices in CAD, side-selection options, and Add to Cart.
       ========================================================================= -->
  <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="featuredMeals">
    
    <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
      <div>
        <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-greek-gold/15 text-greek-navy dark:text-greek-gold font-black text-xs uppercase tracking-wider mb-2">
          🥗 Chef Prepared · 2 Sides Included
        </div>
        <h2 class="text-3xl sm:text-4xl font-black text-greek-navy dark:text-white uppercase tracking-tight">
          Featured Greek Meals
        </h2>
        <p class="text-sm text-slate-600 dark:text-slate-300 mt-1 max-w-xl">
          Choose from 20 authentic chef-crafted dishes. Every plate comes with <strong>2 sides of your choice</strong> (or add extra sides for +$4.99 CAD each).
        </p>
      </div>

      <!-- Filter Tabs -->
      <div class="flex flex-wrap items-center gap-2 bg-slate-200/60 dark:bg-white/5 p-1.5 rounded-2xl border border-slate-200 dark:border-white/10">
        <button onclick="filterCategory('all', this)" class="category-tab-btn active px-4 py-2 rounded-xl text-xs font-black transition-all bg-greek-navy text-white">
          All (20)
        </button>
        <button onclick="filterCategory('poultry', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white dark:bg-white/5 text-slate-700 dark:text-slate-300">
          Poultry
        </button>
        <button onclick="filterCategory('meat', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white dark:bg-white/5 text-slate-700 dark:text-slate-300">
          Souvlaki &amp; Beef
        </button>
        <button onclick="filterCategory('seafood', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white dark:bg-white/5 text-slate-700 dark:text-slate-300">
          Seafood
        </button>
        <button onclick="filterCategory('vegetarian', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold transition-all bg-white dark:bg-white/5 text-slate-700 dark:text-slate-300">
          Vegetarian
        </button>
      </div>
    </div>

    <!-- Meals Grid (Populated dynamically by app.js) -->
    <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6"></div>
  </section>

  <!-- =========================================================================
       3. MEAL PLANS AND SAVINGS SECTION (Order requirement #3)
       Promote the six-meal plan from $59.94 CAD and seven-plus meal discount.
       ========================================================================= -->
  <section class="py-16 bg-white dark:bg-[#0A1D33] border-y border-slate-200 dark:border-white/10" id="mealPlans">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center bg-gradient-to-br from-greek-navy to-greek-midnight rounded-3xl p-6 sm:p-12 text-white shadow-2xl relative overflow-hidden border border-greek-gold/20">
        
        <div class="absolute -right-20 -top-20 w-96 h-96 bg-greek-gold/15 rounded-full blur-3xl pointer-events-none"></div>

        <div class="lg:col-span-7 space-y-5">
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-greek-gold text-greek-navy font-black text-xs uppercase tracking-wider">
            ⭐ Official Meal Plans &amp; Savings
          </div>

          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-black uppercase tracking-tight leading-tight">
            6-Meal Plan <span class="text-greek-gold">Starting From $59.94</span> CAD
          </h2>

          <p class="text-sm sm:text-base text-slate-200 leading-relaxed max-w-xl">
            Eliminate meal prep stress with chef-prepared Greek feasts delivered cold and ready to heat. Our 6-meal minimum starter plan begins at just <strong>$59.94 CAD</strong> ($9.99/meal starting tier).
          </p>

          <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 pt-2">
            <div class="p-3.5 bg-white/5 border border-white/10 rounded-xl">
              <span class="text-xs text-slate-400 block font-medium">6-Meal Starter</span>
              <strong class="text-base text-greek-gold">From $59.94 CAD</strong>
              <span class="text-[10px] text-slate-400 block mt-0.5">Minimum 6 meals</span>
            </div>
            <div class="p-3.5 bg-white/5 border border-white/10 rounded-xl">
              <span class="text-xs text-slate-400 block font-medium">Volume Discount</span>
              <strong class="text-base text-greek-lime">10% OFF (7+ meals)</strong>
              <span class="text-[10px] text-slate-400 block mt-0.5">Auto applied in cart</span>
            </div>
            <div class="p-3.5 bg-white/5 border border-white/10 rounded-xl">
              <span class="text-xs text-slate-400 block font-medium">Custom Sides</span>
              <strong class="text-base text-white">2 Sides Included</strong>
              <span class="text-[10px] text-slate-400 block mt-0.5">11 gourmet sides</span>
            </div>
          </div>

          <div class="pt-3 flex flex-wrap items-center gap-4">
            <button onclick="addSixMealPackage()" class="px-7 py-3.5 btn-gold rounded-xl text-sm font-black transition shadow-lg flex items-center gap-2">
              <span>⚡ 1-Click Add 6-Meal Starter ($59.94 CAD)</span>
            </button>
            <a href="#featuredMeals" class="px-6 py-3.5 bg-white/10 hover:bg-white/20 border border-white/20 text-white font-bold rounded-xl text-sm transition">
              <span>Custom Build Plate-by-Plate</span>
            </a>
          </div>
        </div>

        <!-- Savings Breakdown Comparison Card -->
        <div class="lg:col-span-5 bg-white/10 backdrop-blur-xl border border-white/15 rounded-2xl p-6 space-y-4">
          <h3 class="text-base font-black uppercase text-greek-gold flex items-center gap-2">
            <span>📊 Meal Savings Comparison</span>
          </h3>

          <div class="space-y-3 text-xs">
            <div class="p-3 rounded-xl bg-black/30 border border-white/5 flex justify-between items-center">
              <div>
                <span class="font-bold text-white block">Starter 6-Meal Pack</span>
                <span class="text-slate-400 text-[11px]">Meets required minimum</span>
              </div>
              <div class="text-right">
                <span class="font-black text-greek-gold text-sm block">$59.94 CAD</span>
                <span class="text-[10px] text-slate-400">($9.99 / meal)</span>
              </div>
            </div>

            <div class="p-3 rounded-xl bg-greek-lime/10 border border-greek-lime/30 flex justify-between items-center">
              <div>
                <span class="font-bold text-greek-lime block">7-Meal Week Pack</span>
                <span class="text-greek-lime text-[11px]">Includes 10% OFF discount!</span>
              </div>
              <div class="text-right">
                <span class="font-black text-white text-sm block">10% Savings</span>
                <span class="text-[10px] text-greek-lime font-bold">Best Value</span>
              </div>
            </div>

            <div class="p-3 rounded-xl bg-black/30 border border-white/5 flex justify-between items-center">
              <div>
                <span class="font-bold text-white block">10+ Meals Family / Athlete</span>
                <span class="text-slate-400 text-[11px]">Maximum protein &amp; savings</span>
              </div>
              <div class="text-right">
                <span class="font-black text-greek-gold text-sm block">10% Off All</span>
                <span class="text-[10px] text-slate-400">Save $13.00+ CAD</span>
              </div>
            </div>
          </div>

          <div class="pt-2 text-[11px] text-slate-300 flex items-center gap-1.5">
            <span class="text-greek-lime">✓</span> <span>All prices in Canadian Dollars (CAD). Managed by George the Greek.</span>
          </div>
        </div>

      </div>

    </div>
  </section>

  <!-- =========================================================================
       4. HOW ORDERING WORKS SECTION (Order requirement #4)
       Choose meals, select a delivery day, pay securely, and receive scheduled delivery.
       ========================================================================= -->
  <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="howItWorks">
    
    <div class="text-center max-w-3xl mx-auto mb-14">
      <div class="inline-flex items-center gap-1.5 px-3 py-1 rounded-md bg-greek-navy/10 dark:bg-white/10 text-greek-navy dark:text-greek-gold font-black text-xs uppercase tracking-wider mb-2">
        Simple 4-Step Process
      </div>
      <h2 class="text-3xl sm:text-4xl font-black text-greek-navy dark:text-white uppercase tracking-tight">
        How Ordering Works
      </h2>
      <p class="text-sm text-slate-600 dark:text-slate-300 mt-2">
        Healthy meal prep delivered fresh across Toronto &amp; the GTA. Zero preservatives, zero cooking hassle.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
      
      <!-- Step 1 -->
      <div class="p-6 rounded-2xl bg-white dark:bg-[#0E223D] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col justify-between group hover:-translate-y-1 transition duration-200">
        <div>
          <div class="w-12 h-12 rounded-xl bg-greek-navy text-greek-gold flex items-center justify-center font-black text-lg mb-4 shadow">
            01
          </div>
          <h3 class="text-base font-black text-greek-navy dark:text-white uppercase mb-2">
            Choose Meals &amp; Sides
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
            Select at least 6 meals from our 20 signature dishes. Pick your 2 complimentary gourmet sides per plate (or extra sides for +$4.99 CAD).
          </p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 dark:border-white/5 text-[11px] font-bold text-greek-lime">
          ✓ 6-meal minimum starter
        </div>
      </div>

      <!-- Step 2 -->
      <div class="p-6 rounded-2xl bg-white dark:bg-[#0E223D] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col justify-between group hover:-translate-y-1 transition duration-200">
        <div>
          <div class="w-12 h-12 rounded-xl bg-greek-navy text-greek-gold flex items-center justify-center font-black text-lg mb-4 shadow">
            02
          </div>
          <h3 class="text-base font-black text-greek-navy dark:text-white uppercase mb-2">
            Select Delivery Day
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
            Choose between <strong>Sunday</strong> or <strong>Wednesday</strong> delivery. Lock in your order before the 12:00 PM cutoff time.
          </p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 dark:border-white/5 text-[11px] font-bold text-greek-gold">
          ⏱️ Sunday (Fri 12pm) · Wed (Mon 12pm)
        </div>
      </div>

      <!-- Step 3 -->
      <div class="p-6 rounded-2xl bg-white dark:bg-[#0E223D] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col justify-between group hover:-translate-y-1 transition duration-200">
        <div>
          <div class="w-12 h-12 rounded-xl bg-greek-navy text-greek-gold flex items-center justify-center font-black text-lg mb-4 shadow">
            03
          </div>
          <h3 class="text-base font-black text-greek-navy dark:text-white uppercase mb-2">
            Pay Securely (CAD)
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
            Complete your checkout with credit card through our encrypted payment gateway. 10% volume discount applies automatically for 7+ meals!
          </p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 dark:border-white/5 text-[11px] font-bold text-greek-lime">
          🔒 Visa, Mastercard &amp; Amex
        </div>
      </div>

      <!-- Step 4 -->
      <div class="p-6 rounded-2xl bg-white dark:bg-[#0E223D] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col justify-between group hover:-translate-y-1 transition duration-200">
        <div>
          <div class="w-12 h-12 rounded-xl bg-greek-navy text-greek-gold flex items-center justify-center font-black text-lg mb-4 shadow">
            04
          </div>
          <h3 class="text-base font-black text-greek-navy dark:text-white uppercase mb-2">
            Scheduled Delivery
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed">
            Receive temperature-controlled refrigerated meals at your door ($5.99 + $0.99/km) or pick up for free at George the Greek in Etobicoke.
          </p>
        </div>
        <div class="mt-4 pt-3 border-t border-slate-100 dark:border-white/5 text-[11px] font-bold text-greek-gold">
          📍 3575 Lake Shore Blvd W, Etobicoke
        </div>
      </div>

    </div>

  </section>

  <!-- =========================================================================
       DISTANCE-BASED DELIVERY CALCULATOR SECTION
       Formula from flyer: $5.99 + $0.99 per km from George the Greek
       ========================================================================= -->
  <section class="py-14 bg-slate-100 dark:bg-[#071526] border-t border-slate-200 dark:border-white/10" id="deliverySection">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="max-w-4xl mx-auto bg-white dark:bg-[#0E223D] rounded-3xl p-6 sm:p-10 border border-slate-200 dark:border-white/10 shadow-lg">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6 pb-6 border-b border-slate-200 dark:border-white/10">
          <div>
            <span class="text-xs font-black uppercase text-greek-gold tracking-wider block">Official Flyer Delivery Rates</span>
            <h3 class="text-2xl font-black text-greek-navy dark:text-white uppercase mt-1">
              Distance Delivery Calculator
            </h3>
            <p class="text-xs text-slate-500 dark:text-slate-400 mt-1">
              From George the Greek: <strong>3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5</strong>
            </p>
          </div>
          <div class="px-4 py-2 rounded-xl bg-greek-cream dark:bg-white/5 border border-slate-200 dark:border-white/10 text-right">
            <span class="text-[11px] text-slate-400 block font-bold">Standard Formula</span>
            <strong class="text-sm font-black text-greek-navy dark:text-greek-gold">$5.99 + $0.99 / km</strong>
          </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
          
          <div class="md:col-span-7 space-y-4">
            <div>
              <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                Enter Your Distance from Etobicoke (km):
              </label>
              <div class="flex items-center gap-2">
                <input 
                  type="number" 
                  id="deliveryKmInput" 
                  value="5" 
                  min="0" 
                  step="0.5" 
                  oninput="handleDistanceCalculation(this.value)"
                  class="w-32 px-4 py-2.5 rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 text-sm font-bold focus:ring-2 focus:ring-greek-gold outline-none" 
                />
                <span class="text-xs font-bold text-slate-500">Kilometres</span>
              </div>
            </div>

            <!-- Quick Zone Buttons -->
            <div>
              <span class="text-[11px] font-semibold text-slate-400 block mb-2">Or select common delivery zones:</span>
              <div class="flex flex-wrap gap-2">
                <button onclick="setPresetDeliveryZone(3, 'South Etobicoke')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-navy hover:text-white transition font-medium">
                  Etobicoke (3 km)
                </button>
                <button onclick="setPresetDeliveryZone(8, 'Mississauga East')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-navy hover:text-white transition font-medium">
                  Mississauga (8 km)
                </button>
                <button onclick="setPresetDeliveryZone(14, 'Downtown Toronto')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-navy hover:text-white transition font-medium">
                  Downtown Toronto (14 km)
                </button>
                <button onclick="setPresetDeliveryZone(22, 'Oakville / North York')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-navy hover:text-white transition font-medium">
                  Oakville (22 km)
                </button>
              </div>
            </div>
          </div>

          <!-- Fee Result Box -->
          <div class="md:col-span-5 bg-greek-navy text-white p-6 rounded-2xl text-center space-y-2 shadow-md">
            <span class="text-xs text-slate-300 font-medium block">Calculated Delivery Fee</span>
            <div id="calcResultFee" class="text-3xl font-black text-greek-gold">
              $10.94 CAD
            </div>
            <p id="calcResultBreakdown" class="text-[11px] text-slate-300">
              Base fee $5.99 + (5 km × $0.99/km)
            </p>
            <div class="pt-2 border-t border-white/10 text-[11px] text-greek-lime font-bold">
              🛍️ Store Pickup is always FREE ($0.00 CAD)
            </div>
          </div>

        </div>

      </div>

    </div>
  </section>

</main>

<?php get_footer(); ?>
