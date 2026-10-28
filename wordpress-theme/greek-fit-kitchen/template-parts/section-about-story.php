<?php
/**
 * Template Part: About Chef & Brand Story
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme_uri = get_template_directory_uri();
?>
<section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="aboutSection">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">
    
    <div class="space-y-4">
      <span class="text-xs font-black uppercase tracking-wider text-greek-gold block">
        ABOUT GREEK FIT KITCHEN
      </span>
      <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] leading-tight break-words">
        Big Greek Flavour Meets Modern Meal Prep
      </h2>
      <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
        Greek Fit Kitchen was established to bridge the gap between delicious Greek tavern cuisine and disciplined weekly meal preparation. 
      </p>
      <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
        Managed by <strong>George the Greek</strong> at 3575 Lake Shore Blvd W in Etobicoke and powered by <strong>Lean Meal</strong> (leanmeal.ca), we prepare our marinades with extra virgin olive oil, mountain oregano, fresh garlic, and citrus. No shortcuts, no greasy takeaways — just clean, protein-packed fuel.
      </p>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 pt-2 text-xs">
        <div class="p-4 rounded-2xl bg-white border border-slate-200">
          <strong class="text-sm text-[#101D3A] block mb-1">George the Greek</strong>
          <span class="text-slate-500">Authentic tavern recipes &amp; culinary kitchen operations in Etobicoke.</span>
        </div>
        <div class="p-4 rounded-2xl bg-white border border-slate-200">
          <strong class="text-sm text-[#101D3A] block mb-1">Powered by Lean Meal</strong>
          <span class="text-slate-500">Professional meal-prep standards, nutritional discipline &amp; fresh batches.</span>
        </div>
      </div>
    </div>

    <!-- Responsive Story Image: Restrained on mobile, aspect-[4/3] on desktop -->
    <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 h-52 sm:h-64 lg:h-auto lg:aspect-[4/3] bg-slate-100">
      <img src="<?php echo esc_url( gfk_get_asset_url( 'assets/images/slider/slide-1-greek-feast.jpg' ) ); ?>" alt="About Greek Fit Kitchen" class="w-full h-full object-cover" />
    </div>

  </div>
</section>
