<?php
/**
 * Footer template for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */
?>
  <!-- ================= FOOTER ================= -->
  <footer class="mt-auto bg-slate-950 text-white pt-16 border-t border-slate-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-8 pb-12">
        
        <!-- Brand Bio -->
        <div class="lg:col-span-2 space-y-4">
          <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-tr from-sky-600 to-blue-800 flex items-center justify-center text-white font-bold text-lg">
              🇬🇷
            </div>
            <span class="font-black text-xl tracking-tight text-white">
              GREEK <span class="text-sky-400">FIT</span> KITCHEN
            </span>
          </div>

          <p class="text-xs text-slate-400 leading-relaxed max-w-sm">
            Big Greek flavour. Zero meal prep. Convenient scheduled meal ordering and delivery across Etobicoke and the Greater Toronto Area.
          </p>

          <div class="flex items-center gap-4 pt-2">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/george-the-greek.svg' ); ?>" alt="George the Greek" class="h-8 w-auto opacity-80" />
            <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/lean-meal.svg' ); ?>" alt="Lean Meal" class="h-8 w-auto opacity-80" />
          </div>
        </div>

        <!-- Quick Links -->
        <div class="space-y-3">
          <h4 class="text-xs font-bold uppercase tracking-wider text-sky-400">Navigation</h4>
          <ul class="space-y-2 text-xs text-slate-400">
            <li><a href="#menuSection" class="hover:text-white transition">Menu Catalog</a></li>
            <li><a href="#packagePricing" class="hover:text-white transition">6-Meal Plan ($59.94)</a></li>
            <li><a href="#howItWorks" class="hover:text-white transition">How It Works</a></li>
            <li><a href="#deliveryCalculator" class="hover:text-white transition">Delivery Fee Calculator</a></li>
            <li><a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="hover:text-white transition">Kitchen Tablet View</a></li>
          </ul>
        </div>

        <!-- Delivery Schedule -->
        <div class="space-y-3">
          <h4 class="text-xs font-bold uppercase tracking-wider text-sky-400">Scheduled Days</h4>
          <div class="text-xs text-slate-400 space-y-2">
            <p><strong class="text-white">Sunday Delivery:</strong><br />Order by Friday 12:00 p.m.</p>
            <p><strong class="text-white">Wednesday Delivery:</strong><br />Order by Monday 12:00 p.m.</p>
            <p class="text-[11px] text-slate-500">Toronto Local Time</p>
          </div>
        </div>

        <!-- Pickup Location -->
        <div class="space-y-3">
          <h4 class="text-xs font-bold uppercase tracking-wider text-sky-400">Pickup Location</h4>
          <div class="text-xs text-slate-400 space-y-1">
            <p class="font-bold text-white">George the Greek</p>
            <p>3575 Lake Shore Blvd W</p>
            <p>Etobicoke, ON M8W 1P5</p>
            <p class="text-emerald-400 font-semibold pt-1">Pickup is always FREE</p>
          </div>
        </div>

      </div>

      <!-- Copyright Bar -->
      <div class="border-t border-slate-800/80 py-6 text-center text-xs text-slate-500">
        <p>&copy; <?php echo date( 'Y' ); ?> Greek Fit Kitchen. Managed by George the Greek. Powered by Lean Meal. All prices in CAD.</p>
      </div>

      <!-- ================= MANDATORY REQUIREMENT 2: PENTA SERVICES CREDIT BOTTOM BAR ================= -->
      <div class="border-t border-white/[0.08] py-4">
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

  <!-- Modals & Drawers Container -->
  <?php get_template_part( 'template-parts/modals' ); ?>

  <?php wp_footer(); ?>
</body>
</html>
