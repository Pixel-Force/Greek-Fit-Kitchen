<?php
/**
 * Template Name: Kitchen Display Tablet
 *
 * @package GreekFitKitchen
 */
get_header(); ?>

<main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 py-8 w-full">
  <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
    <div>
      <h1 class="text-2xl font-black uppercase text-slate-900 dark:text-white flex items-center gap-2">
        <span>👨‍🍳 KITCHEN DISPLAY TABLET</span>
        <span class="text-xs bg-sky-500/20 text-sky-400 font-bold px-2.5 py-0.5 rounded-full border border-sky-400/30">
          KDS Active
        </span>
      </h1>
      <p class="text-xs text-slate-500">Live order management station · George the Greek, Etobicoke</p>
    </div>

    <div class="flex items-center gap-3">
      <button onclick="seedSampleKitchenOrders()" class="px-3.5 py-2 rounded-xl bg-sky-600/20 text-sky-500 dark:text-sky-300 hover:bg-sky-600 hover:text-white text-xs font-bold transition border border-sky-500/30">
        + Load Sample Orders
      </button>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-3.5 py-2 rounded-xl bg-slate-200 dark:bg-slate-800 text-slate-700 dark:text-slate-300 text-xs font-bold">
        ← Customer View
      </a>
    </div>
  </div>

  <div id="kitchenOrdersList" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
  if (typeof initKitchenView === 'function') {
    initKitchenView();
  }
});
</script>

<?php get_footer(); ?>
