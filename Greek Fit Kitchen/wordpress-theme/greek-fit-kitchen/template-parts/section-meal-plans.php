<?php
/**
 * Template Part: Section 3 - Meal Plans & Savings
 *
 * 6-meal minimum package check ($59.94 CAD starting price)
 * 10% volume discount for orders of 7+ meals
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="py-16 bg-white dark:bg-[#0A1D33] border-y border-slate-200 dark:border-white/10" id="mealPlans">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="text-center max-w-3xl mx-auto space-y-3 mb-12">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-greek-lime/20 text-greek-lime text-xs font-black uppercase tracking-wider">
        <span>💰</span> Transparent Pricing &amp; Savings
      </div>
      <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-greek-navy dark:text-white">
        Meal Plans &amp; Volume Savings
      </h2>
      <p class="text-sm text-slate-600 dark:text-slate-300">
        Flexible chef-prepared bundles tailored to your lifestyle. No subscriptions or locking contracts required.
      </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch">
      
      <!-- Card 1: 6-Meal Starter Package -->
      <div class="bg-greek-cream dark:bg-[#0E223D] rounded-3xl p-8 border border-slate-200 dark:border-white/10 flex flex-col justify-between shadow-sm relative">
        <div class="space-y-4">
          <div class="inline-block px-3 py-1 rounded-full bg-slate-200 dark:bg-white/10 text-greek-navy dark:text-white text-xs font-black uppercase tracking-wider">
            Minimum Order
          </div>
          <h3 class="text-2xl font-black text-greek-navy dark:text-white uppercase">
            6-Meal Starter
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300">
            Perfect for trying Greek Fit Kitchen or lunch coverage for your work week.
          </p>
          <div class="py-3 border-y border-slate-200 dark:border-white/10">
            <span class="text-xs text-slate-400 block font-semibold">Starting from</span>
            <div class="text-4xl font-black text-greek-navy dark:text-white">
              $59.94 <span class="text-sm font-bold text-slate-400">CAD</span>
            </div>
            <span class="text-[11px] text-slate-500 dark:text-slate-400">6 &times; $9.99 minimum dishes</span>
          </div>
          <ul class="space-y-2 text-xs text-slate-600 dark:text-slate-300">
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Choice of any 6 meals
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> 2 complimentary sides per plate
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Vacuum sealed fresh in BPA-free trays
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Sunday or Wednesday scheduled delivery
            </li>
          </ul>
        </div>
        <div class="pt-6">
          <a href="#featuredMeals" class="w-full py-3 rounded-2xl bg-greek-navy text-white hover:bg-slate-800 font-black text-xs uppercase tracking-wider flex items-center justify-center transition">
            Build 6-Meal Box
          </a>
        </div>
      </div>

      <!-- Card 2: 7+ Meals Weekly Volume Saver (FEATURED) -->
      <div class="bg-greek-navy text-white rounded-3xl p-8 border-2 border-greek-gold flex flex-col justify-between shadow-2xl relative transform md:-translate-y-2">
        <div class="absolute -top-3.5 left-1/2 -translate-x-1/2 px-4 py-1 rounded-full bg-greek-gold text-greek-navy text-xs font-black uppercase tracking-wider shadow">
          ★ Most Popular &amp; Best Value
        </div>
        <div class="space-y-4 pt-2">
          <div class="inline-block px-3 py-1 rounded-full bg-greek-gold/20 text-greek-gold text-xs font-black uppercase tracking-wider">
            10% Instant Discount
          </div>
          <h3 class="text-2xl font-black uppercase text-white">
            7+ Meals Saver
          </h3>
          <p class="text-xs text-slate-300">
            Automatic 10% volume discount applied at checkout on all orders of 7 or more meals.
          </p>
          <div class="py-3 border-y border-white/10">
            <span class="text-xs text-greek-gold block font-bold">Automatic Volume Savings</span>
            <div class="text-4xl font-black text-greek-gold">
              Save 10% <span class="text-sm font-bold text-white/80">OFF</span>
            </div>
            <span class="text-[11px] text-slate-300">No promo code required &middot; Applied in cart</span>
          </div>
          <ul class="space-y-2 text-xs text-slate-200">
            <li class="flex items-center gap-2">
              <span class="text-greek-gold font-bold">✓</span> Full 10% discount on entire food subtotal
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-gold font-bold">✓</span> Up to 14 sides included free of charge
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-gold font-bold">✓</span> Complete lunch &amp; dinner weekly coverage
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-gold font-bold">✓</span> Sunday or Wednesday scheduled drop-off
            </li>
          </ul>
        </div>
        <div class="pt-6">
          <a href="#featuredMeals" class="w-full py-3.5 rounded-2xl bg-greek-gold text-greek-navy hover:bg-greek-goldHover font-black text-xs uppercase tracking-wider flex items-center justify-center transition shadow-lg shadow-greek-gold/30">
            Order 7+ &amp; Save 10% Now
          </a>
        </div>
      </div>

      <!-- Card 3: Free Store Pickup -->
      <div class="bg-greek-cream dark:bg-[#0E223D] rounded-3xl p-8 border border-slate-200 dark:border-white/10 flex flex-col justify-between shadow-sm relative">
        <div class="space-y-4">
          <div class="inline-block px-3 py-1 rounded-full bg-greek-lime/20 text-greek-lime text-xs font-black uppercase tracking-wider">
            Zero Delivery Fee
          </div>
          <h3 class="text-2xl font-black text-greek-navy dark:text-white uppercase">
            Store Pickup
          </h3>
          <p class="text-xs text-slate-600 dark:text-slate-300">
            Pick up your freshly prepared meals directly from George the Greek in Etobicoke.
          </p>
          <div class="py-3 border-y border-slate-200 dark:border-white/10">
            <span class="text-xs text-slate-400 block font-semibold">Delivery Fee</span>
            <div class="text-4xl font-black text-greek-lime">
              FREE <span class="text-sm font-bold text-slate-400">($0 CAD)</span>
            </div>
            <span class="text-[11px] text-slate-500 dark:text-slate-400">3575 Lake Shore Blvd W, Etobicoke</span>
          </div>
          <ul class="space-y-2 text-xs text-slate-600 dark:text-slate-300">
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> $0.00 delivery fee on any order
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Pick up ready during Sunday/Wed windows
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Convenient Etobicoke lakefront location
            </li>
            <li class="flex items-center gap-2">
              <span class="text-greek-lime font-bold">✓</span> Free customer parking on premises
            </li>
          </ul>
        </div>
        <div class="pt-6">
          <a href="#featuredMeals" class="w-full py-3 rounded-2xl bg-greek-navy text-white hover:bg-slate-800 font-black text-xs uppercase tracking-wider flex items-center justify-center transition">
            Choose Store Pickup
          </a>
        </div>
      </div>

    </div>

  </div>
</section>
