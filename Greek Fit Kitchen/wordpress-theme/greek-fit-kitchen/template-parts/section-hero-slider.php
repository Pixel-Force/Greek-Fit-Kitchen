<?php
/**
 * Template Part: Section 1 - Hero Slider
 *
 * 3 Slides:
 * Slide 1: Signature Meals (Order Now)
 * Slide 2: 10% Savings on 7+ Meals (Order Now)
 * Slide 3: Six-Meal Packages starting at $59.94 CAD (Order Now)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="relative bg-greek-midnight text-white overflow-hidden hero-slider-container w-full" id="heroSlider" style="position:relative; overflow:hidden; min-height:580px; height:640px; width:100%;">
  
  <!-- SLIDE 1: Signature Meals -->
  <div class="slide-item active" style="position:absolute; inset:0; width:100%; height:100%; opacity:1; visibility:visible; z-index:10; transition:opacity 0.7s ease, transform 0.7s ease;">
    <img 
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg' ); ?>" 
      alt="Signature Greek Meals" 
      width="1600" 
      height="680"
      class="w-full h-full object-cover object-center opacity-40 transform scale-100 transition-transform duration-1000"
    />
    <div class="absolute inset-0 bg-gradient-to-r from-greek-midnight via-greek-midnight/80 to-transparent flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-24">
        <div class="max-w-2xl space-y-6">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-gold/20 text-greek-gold border border-greek-gold/30 text-xs font-black uppercase tracking-wider">
            <span>🇬🇷</span> Authentic Mediterranean Nutrition
          </div>
          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight leading-none text-white">
            Big Greek Flavour.<br />
            <span class="text-greek-gold">Zero Meal Prep.</span>
          </h1>
          <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
            20 chef-crafted Greek meals prepared with virgin olive oil, wild oregano, and lean proteins. Every plate includes 2 complimentary sides.
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#featuredMeals" class="inline-flex items-center justify-center px-7 py-3.5 rounded-2xl bg-greek-gold text-greek-navy font-black text-sm uppercase tracking-wider hover:bg-greek-goldHover transition-all shadow-lg shadow-greek-gold/20 transform hover:-translate-y-0.5">
              Order Now &rarr;
            </a>
            <a href="#howItWorks" class="inline-flex items-center justify-center px-6 py-3.5 rounded-2xl bg-white/10 text-white font-bold text-sm hover:bg-white/20 transition-all border border-white/15">
              How It Works
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SLIDE 2: 10% Savings on 7+ Meals -->
  <div class="slide-item" style="position:absolute; inset:0; width:100%; height:100%; opacity:0; visibility:hidden; z-index:1; transition:opacity 0.7s ease, transform 0.7s ease;">
    <img 
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-2-meal-prep.jpg' ); ?>" 
      alt="10% Volume Savings" 
      width="1600" 
      height="680"
      class="w-full h-full object-cover object-center opacity-40 transform scale-100 transition-transform duration-1000"
    />
    <div class="absolute inset-0 bg-gradient-to-r from-greek-midnight via-greek-midnight/80 to-transparent flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-24">
        <div class="max-w-2xl space-y-6">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-lime/20 text-greek-lime border border-greek-lime/30 text-xs font-black uppercase tracking-wider">
            <span>🔥</span> Smart Volume Savings
          </div>
          <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight leading-none text-white">
            Order 7+ Meals,<br />
            <span class="text-greek-lime">Save 10% Off.</span>
          </h2>
          <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
            Fuel your entire work week and workout recovery. Automatic 10% volume discount applied instantly at checkout when ordering 7 or more meals.
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#featuredMeals" class="inline-flex items-center justify-center px-7 py-3.5 rounded-2xl bg-greek-lime text-greek-navy font-black text-sm uppercase tracking-wider hover:bg-greek-limeHover transition-all shadow-lg shadow-greek-lime/20 transform hover:-translate-y-0.5">
              Order Now &rarr;
            </a>
            <a href="#mealPlans" class="inline-flex items-center justify-center px-6 py-3.5 rounded-2xl bg-white/10 text-white font-bold text-sm hover:bg-white/20 transition-all border border-white/15">
              View Plans &amp; Savings
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SLIDE 3: Six-Meal Packages -->
  <div class="slide-item" style="position:absolute; inset:0; width:100%; height:100%; opacity:0; visibility:hidden; z-index:1; transition:opacity 0.7s ease, transform 0.7s ease;">
    <img 
      src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/slider/slide-3-mediterranean.jpg' ); ?>" 
      alt="Six-Meal Starter Packages" 
      width="1600" 
      height="680"
      class="w-full h-full object-cover object-center opacity-40 transform scale-100 transition-transform duration-1000"
    />
    <div class="absolute inset-0 bg-gradient-to-r from-greek-midnight via-greek-midnight/80 to-transparent flex items-center">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-24">
        <div class="max-w-2xl space-y-6">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-gold/20 text-greek-gold border border-greek-gold/30 text-xs font-black uppercase tracking-wider">
            <span>📦</span> 6-Meal Minimum Package
          </div>
          <h2 class="text-4xl sm:text-5xl lg:text-6xl font-black uppercase tracking-tight leading-none text-white">
            Starter Pack from<br />
            <span class="text-greek-gold">$59.94 CAD</span>
          </h2>
          <p class="text-base sm:text-lg text-slate-300 leading-relaxed font-normal">
            Build your personalized box with our 6-meal minimum package. Mix and match poultry, AAA beef, fresh seafood, and vegetarian specialties.
          </p>
          <div class="flex flex-wrap items-center gap-4 pt-2">
            <a href="#featuredMeals" class="inline-flex items-center justify-center px-7 py-3.5 rounded-2xl bg-greek-gold text-greek-navy font-black text-sm uppercase tracking-wider hover:bg-greek-goldHover transition-all shadow-lg shadow-greek-gold/20 transform hover:-translate-y-0.5">
              Order Now &rarr;
            </a>
            <a href="#deliverySection" class="inline-flex items-center justify-center px-6 py-3.5 rounded-2xl bg-white/10 text-white font-bold text-sm hover:bg-white/20 transition-all border border-white/15">
              Check Delivery Rates
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Slider Controls -->
  <button 
    onclick="prevSlide()" 
    type="button"
    aria-label="Previous Slide" 
    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center z-20 backdrop-blur transition-all border border-white/25 shadow-lg active:scale-95">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7"></path></svg>
  </button>
  <button 
    onclick="nextSlide()" 
    type="button"
    aria-label="Next Slide" 
    class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 rounded-full bg-black/50 hover:bg-black/80 text-white flex items-center justify-center z-20 backdrop-blur transition-all border border-white/25 shadow-lg active:scale-95">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path></svg>
  </button>

  <!-- Slider Indicators -->
  <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-2.5 z-20">
    <button onclick="goToSlide(0)" class="slider-dot w-8 h-2 rounded-full bg-greek-gold transition-all" aria-label="Slide 1"></button>
    <button onclick="goToSlide(1)" class="slider-dot w-2 h-2 rounded-full bg-white/40 hover:bg-white transition-all" aria-label="Slide 2"></button>
    <button onclick="goToSlide(2)" class="slider-dot w-2 h-2 rounded-full bg-white/40 hover:bg-white transition-all" aria-label="Slide 3"></button>
  </div>
</section>
