<?php
/**
 * Template Part: Chef Sides Showcase Section
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once dirname( __DIR__ ) . '/inc/meals-data.php';
$sides = gfk_get_default_sides();
?>
<section class="py-16 sm:py-20 bg-[#101D3A] text-white" id="sidesSection">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="text-center max-w-3xl mx-auto mb-12">
      <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
        CHEF-CRAFTED SIDES
      </span>
      <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-white break-words">
        MAKE IT A PLATE YOU LOVE
      </h2>
      <p class="text-xs sm:text-sm text-slate-300 mt-2">
        Choose two sides with eligible plates and create a meal that suits your taste. Additional sides: <strong class="text-greek-gold font-mono">$4.99 CAD each</strong>.
      </p>
    </div>

    <!-- 11 Approved Flyer Sides Grid -->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mb-10">
      <?php foreach ( $sides as $index => $side ) : ?>
        <div class="p-3.5 sm:p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-greek-gold/50 transition flex items-center gap-3">
          <span class="w-6 h-6 rounded-full bg-greek-gold/20 text-greek-gold font-mono font-black text-[11px] flex items-center justify-center shrink-0">
            <?php echo esc_html( $index + 1 ); ?>
          </span>
          <span class="text-xs font-bold text-white"><?php echo esc_html( $side ); ?></span>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="p-6 rounded-2xl bg-white/5 border border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-300">
      <div>
        <strong class="text-white">Sides Flexibility:</strong> 2 sides are included with every eligible plate. Additional sides can be selected inside the meal customizer for <span class="text-greek-gold font-bold font-mono">$4.99 CAD each</span>.
      </div>
      <a href="#featuredMeals" class="px-5 py-2.5 bg-greek-gold text-[#101D3A] font-black rounded-xl hover:bg-greek-goldHover transition whitespace-nowrap shadow">
        Choose Meals &amp; Sides →
      </a>
    </div>

  </div>
</section>
