<?php
/**
 * Template Part: Meal Plans & Savings Section
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="mealPlans">
  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
      CUSTOM E-COMMERCE WORKFLOW
    </span>
    <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] break-words">
      Build Your Weekly Meal Plan
    </h2>
    <p class="text-xs sm:text-sm text-slate-600 mt-2">
      Select your dishes, configure your sides, and track live multi-meal volume savings.
    </p>
  </div>

  <!-- Highlight Value Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
      <div>
        <span class="text-[11px] font-black uppercase tracking-wider text-greek-gold block mb-1">Tier 1 · Starter Plan</span>
        <h3 class="text-xl font-black text-[#101D3A]">6-Meal Package</h3>
        <p class="text-xs text-slate-600 mt-2">Perfect introductory week. Starting from <strong class="text-[#101D3A] font-bold font-mono">$59.94 CAD</strong>.</p>
      </div>
      <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs font-bold text-slate-500">Includes 2 sides per plate</span>
        <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Choose Meals →</a>
      </div>
    </div>

    <div class="bg-[#101D3A] text-white p-6 rounded-3xl border border-white/10 shadow-lg relative overflow-hidden flex flex-col justify-between">
      <div class="absolute -right-4 -top-4 w-24 h-24 bg-greek-gold/10 rounded-full blur-xl"></div>
      <div>
        <div class="inline-block px-2.5 py-0.5 rounded-full bg-greek-gold text-[#101D3A] text-[10px] font-black uppercase tracking-wider mb-2">Most Popular Value</div>
        <h3 class="text-xl font-black text-white">7 to 9 Meals Plan</h3>
        <p class="text-xs text-slate-300 mt-2">Automatically qualifies for <strong class="text-greek-gold font-bold">10% OFF</strong> entire food subtotal at checkout.</p>
      </div>
      <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
        <span class="text-xs font-bold text-slate-300">Active 10% Discount</span>
        <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Build Plan →</a>
      </div>
    </div>

    <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
      <div>
        <span class="text-[11px] font-black uppercase tracking-wider text-greek-gold block mb-1">Tier 3 · Maximum Fuel</span>
        <h3 class="text-xl font-black text-[#101D3A]">10+ Meals Family / Athlete</h3>
        <p class="text-xs text-slate-600 mt-2">Full weekly prep for couples or athletes. Full 10% volume savings on all plates.</p>
      </div>
      <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
        <span class="text-xs font-bold text-slate-500">Maximum Savings</span>
        <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Customize →</a>
      </div>
    </div>
  </div>

  <!-- Interactive Plan Tracker Drawer Trigger -->
  <div class="p-6 rounded-3xl bg-[#172A4D] text-white border border-white/10 flex flex-col md:flex-row items-center justify-between gap-6 shadow-md">
    <div class="space-y-1 text-center md:text-left">
      <div class="text-xs uppercase font-black text-greek-gold tracking-widest">Save 10% automatically on 7+ meals</div>
      <h4 class="text-lg sm:text-xl font-black">Live Meal Tracker &amp; Savings Summary</h4>
      <p class="text-xs text-slate-300">Select any dish to open the side customizer and begin building your weekly order.</p>
    </div>
    <button onclick="openCartDrawer()" class="px-6 py-3.5 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover rounded-xl text-xs font-black shadow-lg transition whitespace-nowrap">
      Review Selected Meals (<span class="cart-count-badge">0</span>)
    </button>
  </div>

</section>
