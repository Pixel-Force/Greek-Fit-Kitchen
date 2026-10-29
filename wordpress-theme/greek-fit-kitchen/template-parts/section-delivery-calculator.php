<?php
/**
 * Template Part: Delivery Rates & Calculator Section
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="deliverySection">
  <div class="text-center max-w-3xl mx-auto mb-12">
    <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
      SCHEDULED BATCH DISPATCH
    </span>
    <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] break-words">
      Delivery Schedule &amp; Rates
    </h2>
    <p class="text-xs sm:text-sm text-slate-600 mt-2">
      Greek Fit Kitchen operates scheduled batch deliveries on <strong>Sundays &amp; Wednesdays</strong> across Toronto and the GTA.
    </p>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
    
    <!-- Delivery Schedules -->
    <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
      <div>
        <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">Toronto &amp; GTA Delivery Schedule</span>
        <h3 class="text-2xl font-black text-[#101D3A] mb-4">Twice-Weekly Fresh Batches</h3>
        <p class="text-xs text-slate-600 leading-relaxed mb-6">
          Meals are cooked and blast-chilled immediately prior to scheduled dispatch to lock in taverna-quality freshness, tenderness, and aroma.
        </p>

        <div class="space-y-4">
          <div class="p-4 rounded-2xl bg-[#FAF9F5] border border-slate-200 flex items-start gap-4">
            <span class="w-10 h-10 rounded-xl bg-[#101D3A] text-white flex items-center justify-center font-black text-sm shrink-0">SUN</span>
            <div>
              <h4 class="text-sm font-black text-[#101D3A]">Sunday Batch Delivery</h4>
              <p class="text-xs text-slate-500 mt-0.5">Order cutoff: <strong class="text-[#101D3A]">Friday at 12:00 PM</strong> (noon) Toronto time.</p>
            </div>
          </div>

          <div class="p-4 rounded-2xl bg-[#FAF9F5] border border-slate-200 flex items-start gap-4">
            <span class="w-10 h-10 rounded-xl bg-[#101D3A] text-white flex items-center justify-center font-black text-sm shrink-0">WED</span>
            <div>
              <h4 class="text-sm font-black text-[#101D3A]">Wednesday Batch Delivery</h4>
              <p class="text-xs text-slate-500 mt-0.5">Order cutoff: <strong class="text-[#101D3A]">Monday at 12:00 PM</strong> (noon) Toronto time.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
        <span>Free local pickup @ George the Greek (Etobicoke)</span>
        <span class="font-bold text-[#101D3A]">0 km = $0.00 Delivery</span>
      </div>
    </div>

    <!-- Interactive Distance Pricing Engine -->
    <div class="p-8 rounded-3xl bg-[#172A4D] text-white border border-white/10 shadow-lg flex flex-col justify-between">
      <div>
        <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">Interactive Delivery Estimator</span>
        <h3 class="text-2xl font-black text-white mb-2">Distance-Based Delivery Pricing</h3>
        <p class="text-xs text-slate-300 leading-relaxed mb-6">
          Calculated from our commercial kitchen at <strong>3575 Lake Shore Blvd W, Etobicoke</strong>.
          <span class="text-greek-gold font-medium">Up to 2 km: <strong>FREE</strong> &middot; Over 2 to 5 km: <strong>$5.00 flat</strong> &middot; Over 5 km: <strong>$1.00/km</strong></span>
        </p>

        <div class="space-y-4">
          <div>
            <label class="block text-xs font-bold text-slate-300 mb-1.5">Enter Postal Code or Distance (KM)</label>
            <div class="flex gap-2">
              <input 
                type="text" 
                id="deliveryCalcInput" oninput="calculateDeliveryEstimate()"
                placeholder="e.g. M8W 1P5 or 8 km" 
                class="flex-1 px-4 py-3 rounded-xl text-xs bg-white/10 border border-white/20 text-white placeholder-slate-400 outline-none focus:ring-2 focus:ring-greek-gold"
              />
              <button 
                type="button" 
                onclick="calculateDeliveryEstimate()"
                class="px-5 py-3 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover font-black text-xs rounded-xl transition shadow"
              >
                Calculate
              </button>
            </div>
          </div>

          <!-- Result Box -->
          <div id="deliveryCalcResult" class="p-4 rounded-2xl bg-white/5 border border-white/10 text-xs">
            <div class="flex items-center justify-between">
              <span class="text-slate-300">Estimated Delivery:</span>
              <span id="deliveryEstPrice" class="text-base font-black font-mono text-greek-gold">FREE ($0.00 CAD)</span>
            </div>
            <div id="deliveryEstNotes" class="text-[11px] text-slate-400 mt-1">
              Distance: 1.8 km from George the Greek kitchen (3575 Lake Shore Blvd W). Ultra-local delivery is FREE!
            </div>
          </div>
        </div>
      </div>

      <div class="mt-8 pt-4 border-t border-white/10 text-center">
        <a href="#featuredMeals" class="text-xs font-black text-greek-gold hover:underline">
          Start Your Order with 6+ Meals →
        </a>
      </div>
    </div>

  </div>
<script>
function calculateDeliveryEstimate() {
  var input = document.getElementById("deliveryCalcInput");
  var price = document.getElementById("deliveryEstPrice");
  var notes = document.getElementById("deliveryEstNotes");
  if (!input || !price || !notes) return;
  var val = input.value.trim();
  if (!val) {
    price.innerText = "FREE ($0.00 CAD)";
    notes.innerText = "Enter your postal code or distance in km to calculate delivery.";
    return;
  }
  var km = 5.0;
  var clean = val.toUpperCase().replace(/\s+/g, '');
  var postalMap = {
    'M8W1P5': 1.8, 'M8W': 1.8, 'M8V': 3.5, 'M8Z': 4.2, 'M9C': 6.5,
    'M6S': 6.0, 'M6R': 7.5, 'M5V': 12.0, 'M5H': 13.0, 'M4W': 15.0,
    'L5E': 7.0, 'L5G': 8.5
  };
  if (postalMap[clean]) {
    km = postalMap[clean];
  } else if (clean.length >= 3 && postalMap[clean.substring(0, 3)]) {
    km = postalMap[clean.substring(0, 3)];
  } else {
    var num = val.match(/([0-9]+(?:\.[0-9]+)?)/);
    if (num) km = parseFloat(num[1]);
  }
  var fee = 0;
  var note = "";
  if (km <= 2.0) {
    fee = 0.00;
    note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen (3575 Lake Shore Blvd W). Ultra-local delivery (up to 2 km) is FREE!";
    price.innerText = "FREE ($0.00 CAD)";
  } else if (km <= 5.0) {
    fee = 5.00;
    note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen. Flat delivery fee (2 to 5 km): $5.00 CAD.";
    price.innerText = "$5.00 CAD";
  } else {
    fee = Number((km * 1.00).toFixed(2));
    note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen. Over 5 km rate ($1.00 per km): $" + fee.toFixed(2) + " CAD.";
    price.innerText = "$" + fee.toFixed(2) + " CAD";
  }
  notes.innerText = note;
}
</script>

</section>
