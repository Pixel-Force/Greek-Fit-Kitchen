<?php
/**
 * Footer template for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */
?>
  <!-- ================= FOOTER ================= -->
  <footer class="mt-auto bg-greek-navy text-white pt-14 pb-8 border-t border-white/10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-10 border-b border-white/10 text-xs">
        
        <!-- Brand Info -->
        <div class="space-y-4">
          <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' ); ?>" alt="Greek Fit Kitchen" class="h-10 w-auto" />
          <p class="text-slate-300 leading-relaxed">
            "BIG GREEK FLAVOUR. ZERO MEAL PREP."<br />
            Authentic, nutritious Greek meal preparation delivered directly to your doorstep across Toronto and the GTA.
          </p>
          <div class="text-[11px] text-greek-gold font-bold">
            All prices in Canadian Dollar (CAD).
          </div>
        </div>

        <!-- Schedule & Hours -->
        <div class="space-y-3">
          <h4 class="text-sm font-black text-white uppercase tracking-wider">Scheduled Delivery</h4>
          <ul class="space-y-2 text-slate-300">
            <li><strong class="text-white">Sunday Delivery:</strong> Order by Friday 12:00 PM</li>
            <li><strong class="text-white">Wednesday Delivery:</strong> Order by Monday 12:00 PM</li>
            <li class="pt-1 text-slate-400">Toronto Local Time cutoff</li>
          </ul>
        </div>

        <!-- Location & Pickup -->
        <div class="space-y-3">
          <h4 class="text-sm font-black text-white uppercase tracking-wider">Pickup Location</h4>
          <p class="text-slate-300 leading-relaxed">
            <strong class="text-white block">George the Greek</strong>
            3575 Lake Shore Blvd W,<br />
            Etobicoke, ON M8W 1P5<br />
            <span class="text-greek-lime font-bold">FREE Store Pickup Available</span>
          </p>
        </div>

        <!-- Operations & Tech -->
        <div class="space-y-3">
          <h4 class="text-sm font-black text-white uppercase tracking-wider">Kitchen &amp; Operations</h4>
          <ul class="space-y-2 text-slate-300">
            <li>Managed by <strong>George the Greek</strong></li>
            <li>Powered by <strong>Lean Meal</strong> (<a href="https://leanmeal.ca" target="_blank" rel="noopener" class="underline hover:text-white">leanmeal.ca</a>)</li>
            <li><a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="text-greek-gold font-bold hover:underline flex items-center gap-1">👨‍🍳 Kitchen Tablet Display</a></li>
          </ul>
        </div>

      </div>

      <!-- Copyright row -->
      <div class="pt-6 text-center text-xs text-white/60 flex flex-wrap items-center justify-between gap-3">
        <span>© <?php echo date( 'Y' ); ?> Greek Fit Kitchen. All Rights Reserved. Canadian Dollar (CAD).</span>
        <div class="flex items-center gap-4">
          <a href="#featuredMeals" class="hover:text-white transition">Menu</a>
          <a href="#howItWorks" class="hover:text-white transition">How It Works</a>
          <a href="#deliverySection" class="hover:text-white transition">Delivery Rates</a>
        </div>
      </div>

    </div>
  </footer>

  <!-- Modals & Drawers Container -->
  <?php get_template_part( 'template-parts/modals' ); ?>

  <?php wp_footer(); ?>
</body>
</html>
