<?php
/**
 * Template Part: Hero Slider Section
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme_uri = get_template_directory_uri();
?>
<section class="relative bg-[#101D3A] text-white overflow-hidden hero-slider-container" id="heroSlider">
  <div class="relative w-full overflow-hidden">
    
    <!-- SLIDE 1: Signature Meals -->
    <div class="slide-item active" style="opacity: 1; position: relative; transition: opacity 0.8s ease-in-out;">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( gfk_get_asset_url( 'assets/images/slider/slide-1-greek-feast.jpg' ) ); ?>');"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-[#101D3A]/95 via-[#101D3A]/90 to-transparent"></div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 min-h-[380px] xs:min-h-[420px] sm:min-h-[520px] md:min-h-[600px] flex flex-col justify-center">
        <div class="max-w-2xl space-y-4">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-gold/20 text-greek-gold text-xs font-black uppercase tracking-wider border border-greek-gold/40">
            <span>Big Greek Flavour. Zero Meal Prep.</span>
          </div>

          <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight tracking-tight">
            Chef-Prepared Greek Meals Delivered in Toronto &amp; GTA
          </h1>

          <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
            Nutritious, authentic Greek taverna favourites cooked fresh by George the Greek. 6-meal packages starting from $59.94 CAD with 2 sides included.
          </p>

          <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <a href="#mealPlans" class="px-6 py-3.5 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow-lg text-center">
              Build Your Meal Plan
            </a>
            <a href="#featuredMeals" class="px-6 py-3.5 rounded-xl border-2 border-white/30 text-white hover:border-greek-gold hover:text-greek-gold font-bold text-xs transition text-center">
              Explore the Menu
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 2: Scheduled Batch Delivery -->
    <div class="slide-item" style="opacity: 0; position: absolute; inset: 0; transition: opacity 0.8s ease-in-out;">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( gfk_get_asset_url( 'assets/images/slider/slide-2-meal-prep.jpg' ) ); ?>');"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-[#101D3A]/95 via-[#101D3A]/90 to-transparent"></div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 min-h-[380px] xs:min-h-[420px] sm:min-h-[520px] md:min-h-[600px] flex flex-col justify-center">
        <div class="max-w-2xl space-y-4">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-lime/20 text-greek-lime text-xs font-black uppercase tracking-wider border border-greek-lime/40">
            <span>Sunday &amp; Wednesday Delivery</span>
          </div>

          <h2 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight tracking-tight">
            Disciplined Weekly Meal Prep Made Delicious
          </h2>

          <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
            High protein, lean cuts, extra virgin olive oil and mountain herbs. Receive your fresh batch order right to your doorstep.
          </p>

          <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <a href="#deliverySection" class="px-6 py-3.5 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow-lg text-center">
              View Delivery Schedule
            </a>
            <a href="#featuredMeals" class="px-6 py-3.5 rounded-xl border-2 border-white/30 text-white hover:border-greek-gold hover:text-greek-gold font-bold text-xs transition text-center">
              View All 20 Dishes
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- SLIDE 3: 10% Volume Savings -->
    <div class="slide-item" style="opacity: 0; position: absolute; inset: 0; transition: opacity 0.8s ease-in-out;">
      <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( gfk_get_asset_url( 'assets/images/slider/slide-3-mediterranean.jpg' ) ); ?>');"></div>
      <div class="absolute inset-0 bg-gradient-to-r from-[#101D3A]/95 via-[#101D3A]/90 to-transparent"></div>

      <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 min-h-[380px] xs:min-h-[420px] sm:min-h-[520px] md:min-h-[600px] flex flex-col justify-center">
        <div class="max-w-2xl space-y-4">
          <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-gold/20 text-greek-gold text-xs font-black uppercase tracking-wider border border-greek-gold/40">
            <span>Save 10% On 7+ Meals</span>
          </div>

          <h2 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight tracking-tight">
            Volume Savings For Fitness &amp; Busy Lifestyles
          </h2>

          <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
            Stock your fridge for the week with healthy, macro-balanced Greek meals. Automatic 10% discount applied at checkout on 7 or more plates.
          </p>

          <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
            <a href="#featuredMeals" class="px-6 py-3.5 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow-lg text-center">
              Order Now &amp; Save
            </a>
            <a href="#howItWorks" class="px-6 py-3.5 rounded-xl border-2 border-white/30 text-white hover:border-greek-gold hover:text-greek-gold font-bold text-xs transition text-center">
              How It Works
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Prev / Next Controls -->
    <button onclick="window.prevHeroSlide && window.prevHeroSlide()" aria-label="Previous Slide" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition border border-white/20 z-20">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
    </button>
    <button onclick="window.nextHeroSlide && window.nextHeroSlide()" aria-label="Next Slide" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition border border-white/20 z-20">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
    </button>
  </div>
</section>
