<?php
/**
 * Interactive Modals and Drawers for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */
?>
<!-- =========================================================================
     SIDE SELECTION & PRODUCT CUSTOMIZATION MODAL
     (Allows picking Included Side 1, Included Side 2, and Extra Sides +$4.99 CAD)
     ========================================================================= -->
<div id="sideModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/75 backdrop-blur-sm overflow-y-auto">
  <div class="bg-white dark:bg-[#0E223D] text-slate-900 dark:text-white rounded-3xl max-w-xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
    
    <!-- Modal Header -->
    <div class="flex items-start justify-between gap-4 pb-4 border-b border-slate-200 dark:border-white/10">
      <div class="flex gap-4 items-center">
        <img id="modalMealImg" src="" alt="Meal" class="w-16 h-16 rounded-2xl object-cover bg-slate-100 border border-slate-200 dark:border-white/10" />
        <div>
          <span class="text-[11px] font-black uppercase text-greek-gold tracking-wider">Custom Meal Combination</span>
          <h3 id="modalMealName" class="text-xl font-black leading-tight text-greek-navy dark:text-white"></h3>
          <span id="modalMealPrice" class="font-black text-greek-gold text-sm"></span>
        </div>
      </div>
      <button onclick="closeSideModal()" class="text-slate-400 hover:text-slate-600 dark:hover:text-white p-2 text-xl font-bold">
        ✕
      </button>
    </div>

    <p id="modalMealDesc" class="text-xs text-slate-600 dark:text-slate-300 py-3"></p>

    <!-- Side Selections Form -->
    <div class="space-y-5 max-h-[60vh] overflow-y-auto pr-1">
      
      <!-- Included Side 1 -->
      <div>
        <div class="flex items-center justify-between mb-2">
          <label class="text-xs font-black uppercase tracking-wider text-greek-navy dark:text-white">
            Choose Side #1 <span class="text-greek-lime font-bold">(Included)</span>
          </label>
          <span class="text-[10px] text-slate-400">Required</span>
        </div>
        <div id="side1Options" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
      </div>

      <!-- Included Side 2 -->
      <div>
        <div class="flex items-center justify-between mb-2">
          <label class="text-xs font-black uppercase tracking-wider text-greek-navy dark:text-white">
            Choose Side #2 <span class="text-greek-lime font-bold">(Included)</span>
          </label>
          <span class="text-[10px] text-slate-400">Required</span>
        </div>
        <div id="side2Options" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
      </div>

      <!-- Optional Extra Sides -->
      <div class="pt-2 border-t border-slate-200 dark:border-white/10">
        <div class="flex items-center justify-between mb-2">
          <label class="text-xs font-black uppercase tracking-wider text-greek-navy dark:text-white">
            Add Extra Sides <span class="text-greek-lime">(+$4.99 CAD each)</span>
          </label>
          <span class="text-[10px] text-slate-400">Optional</span>
        </div>
        <div id="extraSidesOptions" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
      </div>

      <!-- Special Dietary / Prep Notes -->
      <div>
        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">
          Special Instructions / Dietary Notes (Optional):
        </label>
        <input 
          type="text" 
          id="modalMealNotes" 
          placeholder="e.g. Lemon sauce on the side, extra crispy..."
          class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" 
        />
      </div>

    </div>

    <!-- Modal Footer -->
    <div class="pt-5 mt-4 border-t border-slate-200 dark:border-white/10 flex items-center justify-end gap-3">
      <button onclick="closeSideModal()" class="px-4 py-2.5 rounded-xl text-xs font-bold text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-white/5 transition">
        Cancel
      </button>
      <button id="confirmAddCustomMealBtn" onclick="confirmAddCustomMeal()" class="px-6 py-2.5 btn-gold rounded-xl text-xs font-black transition shadow">
        <span>Add to Order</span>
      </button>
    </div>

  </div>
</div>

<!-- =========================================================================
     SHOPPING CART DRAWER (With 6-Meal Minimum & 10% Discount Engine)
     ========================================================================= -->
<div id="cartOverlay" onclick="closeCartDrawer()" class="fixed inset-0 z-50 bg-black/60 backdrop-blur-sm hidden transition-opacity"></div>
<div id="cartDrawer" class="fixed top-0 right-0 h-full w-full max-w-md bg-white dark:bg-[#0A1A2E] text-slate-900 dark:text-white z-50 shadow-2xl flex flex-col transform translate-x-full transition-transform duration-300 ease-in-out border-l border-slate-200 dark:border-white/10">
  
  <div class="p-5 border-b border-slate-200 dark:border-white/10 flex items-center justify-between">
    <div class="flex items-center gap-2">
      <h3 class="text-lg font-black uppercase text-greek-navy dark:text-white">Your Meal Prep Order</h3>
      <span class="cart-count-badge px-2 py-0.5 rounded-full text-xs font-black bg-greek-gold text-greek-navy">0</span>
    </div>
    <button onclick="closeCartDrawer()" class="p-2 text-slate-400 hover:text-slate-600 dark:hover:text-white transition">
      ✕
    </button>
  </div>

  <!-- 6-Meal Minimum Progress Bar -->
  <div id="cartMinMealProgress" class="p-4 bg-slate-50 dark:bg-white/5 border-b border-slate-200 dark:border-white/10"></div>

  <!-- Empty State -->
  <div id="cartEmptyState" class="flex-1 flex flex-col items-center justify-center p-8 text-center hidden">
    <div class="w-16 h-16 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center text-3xl mb-4">
      🥗
    </div>
    <h4 class="text-base font-bold text-slate-800 dark:text-white">Your cart is empty</h4>
    <p class="text-xs text-slate-500 dark:text-slate-400 mt-1 max-w-xs">
      Add at least 6 meals to start your order. Choose from our 20 authentic Greek plates!
    </p>
    <button onclick="closeCartDrawer(); addSixMealPackage();" class="mt-4 px-5 py-2.5 btn-gold rounded-xl text-xs font-black">
      + Add Quick 6-Meal Starter ($59.94)
    </button>
  </div>

  <!-- Filled State Items List -->
  <div id="cartFilledState" class="flex-1 flex flex-col overflow-hidden">
    <div id="cartItemsList" class="flex-1 overflow-y-auto p-4 space-y-3"></div>

    <div class="p-5 border-t border-slate-200 dark:border-white/10 bg-slate-50 dark:bg-white/5 space-y-3">
      <div class="space-y-1.5 text-xs text-slate-600 dark:text-slate-300">
        <div class="flex justify-between">
          <span>Food Subtotal</span>
          <span id="cartFoodSubtotal" class="font-bold text-slate-900 dark:text-white">$0.00 CAD</span>
        </div>

        <div id="cartDiscountRow" class="flex justify-between text-greek-lime font-bold hidden">
          <span>10% Volume Discount (7+ Meals)</span>
          <span id="cartDiscountAmount">-$0.00 CAD</span>
        </div>

        <div class="flex justify-between">
          <span>Estimated Delivery Fee</span>
          <span id="cartEstDelivery" class="font-bold text-slate-900 dark:text-white">$10.94 CAD</span>
        </div>

        <div class="flex justify-between">
          <span>Ontario HST (13%)</span>
          <span id="cartTaxAmount" class="font-bold text-slate-900 dark:text-white">$0.00 CAD</span>
        </div>

        <div class="pt-2 border-t border-slate-200 dark:border-white/10 flex justify-between text-base font-black text-greek-navy dark:text-greek-gold">
          <span>Total (CAD)</span>
          <span id="cartGrandTotal">$0.00 CAD</span>
        </div>
      </div>

      <button 
        id="cartCheckoutBtn" 
        onclick="openCheckoutModal()"
        class="w-full py-3.5 px-4 rounded-xl text-sm font-black btn-gold flex items-center justify-center gap-2 shadow-lg"
      >
        <span>Proceed to Checkout</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
      </button>
    </div>
  </div>

</div>

<!-- =========================================================================
     CREDIT CARD PAYMENTS & CHECKOUT MODAL
     ========================================================================= -->
<div id="checkoutModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/80 backdrop-blur-md overflow-y-auto">
  <div class="bg-white dark:bg-[#0E223D] text-slate-900 dark:text-white rounded-3xl max-w-2xl w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8">
    
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-white/10">
      <div>
        <span class="text-[11px] font-black uppercase text-greek-gold tracking-wider">Encrypted Advance Ordering</span>
        <h3 class="text-2xl font-black text-greek-navy dark:text-white">Checkout &amp; Payment (CAD)</h3>
      </div>
      <button onclick="closeCheckoutModal()" class="text-slate-400 hover:text-white text-xl p-2 font-bold">
        ✕
      </button>
    </div>

    <div class="p-3 my-4 rounded-xl bg-greek-navy text-white text-xs border border-greek-gold/30 flex items-center justify-between gap-3">
      <div id="checkoutCutoffNotice">Loading cutoff notice...</div>
      <span class="text-[10px] uppercase font-black text-greek-gold bg-black/40 px-2 py-0.5 rounded">Advance Order</span>
    </div>

    <form onsubmit="handleProcessPayment(event)" class="space-y-4">
      
      <!-- Fulfillment Method -->
      <div>
        <label class="block text-xs font-black uppercase text-greek-navy dark:text-white mb-2">1. Fulfillment Method</label>
        <div class="grid grid-cols-2 gap-3">
          <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-300 dark:border-white/20 hover:border-greek-gold cursor-pointer transition text-xs font-bold">
            <input type="radio" name="checkoutMethod" value="delivery" checked onchange="toggleCheckoutMethod('delivery')" class="text-greek-gold focus:ring-greek-gold" />
            <div>
              <span>🚚 Scheduled Delivery</span>
              <span class="block text-[10px] text-slate-400 font-normal">$5.99 + $0.99 / km</span>
            </div>
          </label>
          <label class="flex items-center gap-3 p-3 rounded-xl border border-slate-300 dark:border-white/20 hover:border-greek-gold cursor-pointer transition text-xs font-bold">
            <input type="radio" name="checkoutMethod" value="pickup" onchange="toggleCheckoutMethod('pickup')" class="text-greek-gold focus:ring-greek-gold" />
            <div>
              <span>🛍️ Store Pickup (FREE)</span>
              <span class="block text-[10px] text-greek-lime font-semibold">George the Greek, Etobicoke</span>
            </div>
          </label>
        </div>
      </div>

      <!-- Schedule Date Batch -->
      <div>
        <label class="block text-xs font-black uppercase text-greek-navy dark:text-white mb-2">2. Scheduled Delivery Day</label>
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
          <label class="p-3 rounded-xl border border-slate-300 dark:border-white/20 hover:border-greek-gold cursor-pointer transition font-medium flex items-center gap-3">
            <input type="radio" name="deliveryDay" value="Upcoming Sunday (10:00 AM - 2:00 PM)" checked class="text-greek-gold focus:ring-greek-gold" />
            <div>
              <strong class="block text-greek-navy dark:text-white">Upcoming Sunday Batch</strong>
              <span class="text-[11px] text-slate-500 dark:text-slate-400">Order cutoff: Friday 12:00 PM</span>
            </div>
          </label>
          <label class="p-3 rounded-xl border border-slate-300 dark:border-white/20 hover:border-greek-gold cursor-pointer transition font-medium flex items-center gap-3">
            <input type="radio" name="deliveryDay" value="Upcoming Wednesday (4:00 PM - 8:00 PM)" class="text-greek-gold focus:ring-greek-gold" />
            <div>
              <strong class="block text-greek-navy dark:text-white">Upcoming Wednesday Batch</strong>
              <span class="text-[11px] text-slate-500 dark:text-slate-400">Order cutoff: Monday 12:00 PM</span>
            </div>
          </label>
        </div>
      </div>

      <!-- Contact Details -->
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
          <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Email Address *</label>
          <input type="email" id="checkoutEmail" required placeholder="your.name@example.com" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
        </div>
        <div>
          <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Phone Number *</label>
          <input type="tel" id="checkoutPhone" required placeholder="416-555-0199" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
        </div>
      </div>

      <div id="checkoutAddressFields">
        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Delivery Street Address &amp; Unit *</label>
        <input type="text" id="checkoutAddress" placeholder="e.g. 3200 Lake Shore Blvd W, Unit 4, Etobicoke, ON" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
      </div>

      <div id="checkoutPickupNotice" class="hidden p-3 rounded-xl bg-slate-100 dark:bg-white/5 text-xs text-slate-600 dark:text-slate-300">
        📍 Free Pickup: <strong>George the Greek, 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5</strong>.
      </div>

      <!-- Credit Card Gateway -->
      <div class="pt-3 border-t border-slate-200 dark:border-white/10 space-y-3">
        <div class="flex items-center justify-between">
          <label class="text-xs font-black uppercase text-greek-navy dark:text-white flex items-center gap-2">
            <span>3. Credit Card Payment</span>
            <span id="cardBrandBadge" class="px-2 py-0.5 rounded text-[10px] font-black bg-blue-600 text-white">VISA</span>
          </label>
          <button type="button" onclick="fillDemoCreditCard()" class="text-[11px] font-bold text-greek-gold hover:underline">
            ⚡ Fill Demo Card
          </button>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Card Number *</label>
          <input type="text" id="ccNumber" required maxlength="19" placeholder="4500 1234 5678 9012" class="w-full px-3 py-2 text-xs font-mono rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
        </div>

        <div class="grid grid-cols-3 gap-3">
          <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Expiry (MM/YY) *</label>
            <input type="text" id="ccExpiry" required maxlength="5" placeholder="12/28" class="w-full px-3 py-2 text-xs font-mono rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">CVC *</label>
            <input type="text" id="ccCvc" required maxlength="4" placeholder="888" class="w-full px-3 py-2 text-xs font-mono rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>
          <div>
            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Postal Code *</label>
            <input type="text" id="ccPostal" required maxlength="7" placeholder="M8W 1P5" class="w-full px-3 py-2 text-xs uppercase rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
          </div>
        </div>

        <div>
          <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1">Cardholder Name *</label>
          <input type="text" id="ccName" required placeholder="Dimitrios Papadopoulos" class="w-full px-3 py-2 text-xs rounded-xl border border-slate-300 dark:border-white/20 bg-slate-50 dark:bg-white/5 outline-none focus:ring-2 focus:ring-greek-gold" />
        </div>
      </div>

      <!-- Final Charge Summary -->
      <div class="p-3.5 rounded-xl bg-greek-cream dark:bg-white/5 border border-slate-200 dark:border-white/10 text-xs space-y-1">
        <div class="flex justify-between">
          <span>Ordered Meals</span>
          <span id="checkoutMealsCount" class="font-bold">6 meals</span>
        </div>
        <div class="flex justify-between">
          <span>Food Subtotal</span>
          <span id="checkoutSubtotal" class="font-bold">$0.00 CAD</span>
        </div>
        <div id="checkoutDiscountRow" class="flex justify-between text-greek-lime font-bold hidden">
          <span>10% Volume Savings (7+ Meals)</span>
          <span id="checkoutDiscount">-$0.00 CAD</span>
        </div>
        <div class="flex justify-between">
          <span>Delivery Fee</span>
          <span id="checkoutDeliveryFee" class="font-bold">$10.94 CAD</span>
        </div>
        <div class="flex justify-between">
          <span>Ontario HST (13%)</span>
          <span id="checkoutTax" class="font-bold">$0.00 CAD</span>
        </div>
        <div class="pt-2 border-t border-slate-200 dark:border-white/10 flex justify-between text-base font-black text-greek-navy dark:text-greek-gold">
          <span>Final Charge</span>
          <span id="checkoutGrandTotal">$0.00 CAD</span>
        </div>
      </div>

      <button 
        type="submit" 
        id="paySubmitButton"
        class="w-full py-4 btn-gold rounded-xl font-black text-sm flex items-center justify-center gap-2 shadow-xl"
      >
        <span>Pay &amp; Authorize in CAD (<span id="payButtonAmount">$0.00 CAD</span>)</span>
      </button>

    </form>

  </div>
</div>

<!-- =========================================================================
     ORDER CONFIRMATION RECEIPT MODAL
     ========================================================================= -->
<div id="confirmationModal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 bg-black/85 backdrop-blur-md overflow-y-auto">
  <div class="bg-white dark:bg-[#0E223D] text-slate-900 dark:text-white rounded-3xl max-w-lg w-full p-6 sm:p-8 shadow-2xl border border-slate-200 dark:border-white/10 my-8 text-center space-y-4">
    
    <div class="w-16 h-16 rounded-full bg-greek-lime/20 text-greek-lime flex items-center justify-center mx-auto text-3xl">✓</div>
    <h3 class="text-2xl font-black text-greek-navy dark:text-white uppercase">Order Confirmed!</h3>
    <p class="text-xs text-slate-500 dark:text-slate-300">
      Your payment was authorized and your prep ticket has been sent to George the Greek's kitchen station.
    </p>

    <div class="p-4 rounded-2xl bg-greek-cream dark:bg-white/5 border border-slate-200 dark:border-white/10 text-left text-xs space-y-2">
      <div class="flex justify-between">
        <span class="text-slate-400">Order ID:</span>
        <strong id="confirmOrderId" class="font-mono text-greek-gold text-sm font-black"></strong>
      </div>
      <div class="flex justify-between">
        <span class="text-slate-400">Customer:</span>
        <span id="confirmCustomer" class="font-bold"></span>
      </div>
      <div class="flex justify-between">
        <span class="text-slate-400">Scheduled Delivery Batch:</span>
        <span id="confirmSlot" class="font-bold text-greek-lime"></span>
      </div>
      <div class="flex justify-between">
        <span class="text-slate-400">Fulfillment:</span>
        <span id="confirmAddress" class="font-medium text-[11px]"></span>
      </div>
      <div class="pt-2 border-t border-slate-200 dark:border-white/10">
        <span class="text-slate-400 block mb-1">Meals &amp; Custom Sides:</span>
        <div id="confirmItemsList" class="space-y-1"></div>
      </div>
      <div class="pt-2 border-t border-slate-200 dark:border-white/10 flex justify-between font-black text-sm text-greek-navy dark:text-greek-gold">
        <span>Amount Paid:</span>
        <span id="confirmTotal"></span>
      </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 pt-2">
      <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="flex-1 py-3 px-4 rounded-xl text-xs font-bold bg-greek-navy text-white hover:bg-greek-navy/90 transition flex items-center justify-center gap-1.5">
        <span>👨‍🍳 View in Kitchen Tablet</span>
      </a>
      <button onclick="closeConfirmationModal()" class="flex-1 py-3 px-4 btn-gold rounded-xl text-xs font-black transition">
        <span>Done / Back to Home</span>
      </button>
    </div>

  </div>
</div>
