<?php
/**
 * Site Footer Template Part (End-to-End Full Width)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!-- Main Footer: 100% End-to-End Full Width -->
<footer id="siteFooter" class="mt-auto w-full bg-[#101D3A] text-white pt-14 pb-6 border-t border-white/10" aria-label="Site Footer">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <!-- 4-Column Responsive Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-12 border-b border-white/10 text-xs">
      
      <!-- Column 1: Brand & Identity -->
      <div class="space-y-4">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block" aria-label="<?php bloginfo( 'name' ); ?>">
          <img 
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' ); ?>" 
            alt="<?php bloginfo( 'name' ); ?>" 
            width="180" 
            height="44"
            class="h-10 w-auto object-contain" 
          />
        </a>
        <p class="text-slate-300 leading-relaxed">
          <strong class="text-white block font-black mb-1">BIG GREEK FLAVOUR. ZERO MEAL PREP.</strong>
          Chef-crafted authentic Greek meal preparation delivered directly to your home or office in Toronto &amp; the GTA.
        </p>
        <div class="inline-block bg-white/10 px-3 py-1.5 rounded-lg text-[11px] text-greek-gold font-bold border border-white/10">
          All prices in Canadian Dollars (CAD)
        </div>
      </div>

      <!-- Column 2: Scheduled Batch Delivery -->
      <div class="space-y-3">
        <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">Scheduled Delivery</h4>
        <ul class="space-y-2 text-slate-300">
          <li><strong class="text-white">Sunday Delivery:</strong><br />Order by Friday 12:00 PM</li>
          <li><strong class="text-white">Wednesday Delivery:</strong><br />Order by Monday 12:00 PM</li>
          <li class="pt-1 text-slate-400">Strict weekly delivery batches guarantee peak freshness and zero food waste.</li>
        </ul>
      </div>

      <!-- Column 3: Quick Navigation -->
      <div class="space-y-3">
        <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">Explore</h4>
        <?php
        if ( has_nav_menu( 'footer' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'footer',
                'container'      => false,
                'menu_class'     => 'space-y-2 text-slate-300',
                'fallback_cb'    => 'gfk_footer_menu_fallback',
                'depth'          => 1,
            ) );
        } else {
            gfk_footer_menu_fallback();
        }
        ?>
      </div>

      <!-- Column 4: Kitchen Pickup Location & Contact -->
      <div class="space-y-3">
        <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">Commercial Kitchen</h4>
        <p class="text-slate-300 leading-relaxed">
          <strong class="text-white block">George the Greek</strong>
          3575 Lake Shore Blvd W<br />
          Etobicoke, ON M8W 1P5<br />
          Greater Toronto Area
        </p>
        <div class="pt-2 text-[11px] text-slate-400">
          Free local customer pickup available during regular restaurant operating hours.
        </div>
      </div>

    </div>

    <!-- Copyright Bar -->
    <div class="py-5 text-center text-xs text-slate-400">
      <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. All rights reserved. Managed by George the Greek. Powered by Lean Meal.</p>
    </div>

    <!-- Penta Services Credit Bottom Bar (Mandatory Rule 2) -->
    <div class="border-t border-white/[0.08] py-4 mt-2">
      <div class="flex flex-wrap items-center justify-center gap-x-3.5 gap-y-2.5 text-center text-[13px] text-white/50">
        <span>Website designed &amp; developed by</span>
        <a href="https://pentaservices.co.uk/en/?utm_source=referral&amp;utm_medium=site-credit" target="_blank" rel="noopener noreferrer" title="Penta Services: web design, development, SEO &amp; AI" class="group inline-flex items-center">
          <img alt="Penta Services" width="94" height="40" class="h-9 w-auto rounded-md opacity-90 transition group-hover:-translate-y-px group-hover:opacity-100" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/penta-services-logo.svg' ); ?>" />
        </a>
        <span>Web design, SEO &amp; digital solutions · <a href="https://pentaservices.co.uk/en/?utm_source=referral&amp;utm_medium=site-credit" target="_blank" rel="noopener noreferrer" class="ltr text-white/75 hover:text-white underline-offset-2 hover:underline transition-colors">pentaservices.co.uk</a></span>
      </div>
    </div>

  </div>
</footer>
