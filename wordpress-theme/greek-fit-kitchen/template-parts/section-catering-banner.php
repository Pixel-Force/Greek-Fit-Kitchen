<?php
/**
 * Template Part: Catering & Large Events Banner
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$theme_uri = get_template_directory_uri();
?>
<section class="py-16 sm:py-20 bg-white border-t border-slate-200" id="cateringSection">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
      
      <div class="w-full lg:w-1/2 space-y-5">
        <span class="text-xs font-black uppercase tracking-wider text-greek-gold block">
          EVENTS, CORPORATE &amp; PARTIES
        </span>
        <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] leading-tight break-words">
          PLANNING SOMETHING BIGGER?
        </h2>
        <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
          Get in touch with Greek Fit Kitchen about custom catering orders, corporate wellness meals, or special bulk requests. Managed by George the Greek with authentic culinary pride.
        </p>

        <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
          <button onclick="openCateringModal()" class="px-6 py-3.5 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover rounded-xl font-black text-xs shadow-lg transition text-center justify-center">
            Inquire About Catering
          </button>
          <button onclick="openContactModal()" class="px-6 py-3.5 border-2 border-[#101D3A] text-[#101D3A] hover:bg-[#101D3A] hover:text-white rounded-xl font-bold text-xs transition text-center justify-center">
            Special Dietary Inquiries
          </button>
        </div>
      </div>

      <!-- Responsive Showcase Image: Restrained on mobile, aspect-[16/10] on desktop -->
      <div class="w-full lg:w-1/2 rounded-3xl overflow-hidden shadow-2xl border border-slate-200 h-52 sm:h-64 lg:h-auto lg:aspect-[16/10] bg-slate-100">
        <img src="<?php echo esc_url( gfk_get_asset_url( 'assets/images/meals/meal-prep-showcase.jpg' ) ); ?>" alt="Greek Fit Kitchen Catering" class="w-full h-full object-cover" />
      </div>

    </div>
  </div>
</section>
