<?php
/**
 * Template Part: Section 5 - Distance Delivery Fee Calculator
 *
 * Official Flyer Rate: $5.99 base + $0.99 / km from George the Greek (3575 Lake Shore Blvd W, Etobicoke)
 * Free Store Pickup ($0 CAD)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="py-14 bg-slate-100 dark:bg-[#071526] border-t border-slate-200 dark:border-white/10" id="deliverySection">
  <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
    
    <div class="bg-white dark:bg-[#0E223D] rounded-3xl p-6 sm:p-10 border border-slate-200 dark:border-white/10 shadow-lg">
      <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-8">
        <div>
          <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-greek-gold/20 text-greek-navy dark:text-greek-gold text-xs font-black uppercase tracking-wider mb-2">
            <span>📍</span> Transparent GTA Distance Rate
          </div>
          <h2 class="text-2xl sm:text-3xl font-black uppercase text-greek-navy dark:text-white">
            Delivery Fee Calculator
          </h2>
          <p class="text-xs text-slate-600 dark:text-slate-300 mt-1">
            Official Flyer Pricing: <strong>$5.99 base fee + $0.99 per km</strong> from George the Greek (3575 Lake Shore Blvd W, Etobicoke).
          </p>
        </div>
        <div class="text-right">
          <span class="inline-block px-3.5 py-1.5 rounded-xl bg-greek-lime/20 text-greek-lime font-black text-xs uppercase tracking-wider">
            FREE Store Pickup Available
          </span>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-12 gap-6 items-center">
        
        <div class="md:col-span-7 space-y-4">
          <label for="deliveryDistanceInput" class="block text-xs font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">
            Enter Distance from Etobicoke Kitchen (KM):
          </label>
          <div class="flex items-center gap-3">
            <input 
              type="number" 
              id="deliveryDistanceInput" 
              value="5" 
              min="0" 
              max="100" 
              step="0.5" 
              oninput="calculateDeliveryFee(this.value)"
              class="w-32 px-4 py-3 rounded-2xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 text-lg font-black text-greek-navy dark:text-white focus:outline-none focus:ring-2 focus:ring-greek-gold" 
            />
            <span class="text-sm font-black text-slate-500 dark:text-slate-400">Kilometers (KM)</span>
          </div>

          <div class="flex flex-wrap gap-2 pt-1">
            <span class="text-xs text-slate-400 block w-full">Quick GTA Presets:</span>
            <button onclick="setPresetDeliveryZone(0, 'Store Pickup')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-lime hover:text-greek-navy font-bold transition">
              Store Pickup (0 km)
            </button>
            <button onclick="setPresetDeliveryZone(5, 'Mimico / Long Branch')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-gold hover:text-greek-navy font-bold transition">
              Etobicoke (5 km)
            </button>
            <button onclick="setPresetDeliveryZone(12, 'Downtown Toronto')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-gold hover:text-greek-navy font-bold transition">
              Downtown Toronto (12 km)
            </button>
            <button onclick="setPresetDeliveryZone(15, 'Mississauga City Centre')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-gold hover:text-greek-navy font-bold transition">
              Mississauga (15 km)
            </button>
            <button onclick="setPresetDeliveryZone(22, 'Oakville / North York')" class="px-2.5 py-1 text-xs rounded-lg bg-slate-100 dark:bg-white/5 hover:bg-greek-gold hover:text-greek-navy font-bold transition">
              Oakville (22 km)
            </button>
          </div>
        </div>

        <div class="md:col-span-5 bg-greek-navy text-white p-6 rounded-2xl text-center space-y-2 shadow-md">
          <span class="text-xs text-slate-300 font-medium block">Calculated Delivery Fee</span>
          <div id="calcResultFee" class="text-3xl font-black text-greek-gold">
            $10.94 CAD
          </div>
          <p id="calcResultBreakdown" class="text-[11px] text-slate-300">
            Base fee $5.99 + (5 km &times; $0.99/km)
          </p>
          <div class="pt-2 border-t border-white/10 text-[11px] text-greek-lime font-bold">
            🛍️ Store Pickup is always FREE ($0.00 CAD)
          </div>
        </div>

      </div>

    </div>

  </div>
</section>
