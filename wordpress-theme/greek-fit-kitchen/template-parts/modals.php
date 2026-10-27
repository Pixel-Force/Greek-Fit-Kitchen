<?php
/**
 * Interactive Modals and Drawers for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */
?>
<!-- Meal Customizer Modal -->
<div id="mealCustomizerModal" class="hidden fixed inset-0 z-50 bg-slate-950/75 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full max-h-[90vh] overflow-y-auto border border-slate-200 dark:border-slate-800 shadow-2xl relative flex flex-col">
    <div class="sticky top-0 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md px-6 py-4 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between z-10">
      <div>
        <span class="text-[10px] font-bold uppercase tracking-wider text-sky-500">Meal Customizer</span>
        <h3 id="customizerTitle" class="text-xl font-black text-slate-900 dark:text-white">Dish Name</h3>
      </div>
      <button onclick="closeMealCustomizer()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-900 dark:hover:text-white flex items-center justify-center font-bold">
        ✕
      </button>
    </div>

    <div class="p-6 space-y-5">
      <div class="relative rounded-2xl overflow-hidden aspect-video bg-slate-100 dark:bg-slate-800">
        <img id="customizerImg" src="" alt="Selected Dish" class="w-full h-full object-cover" />
        <div class="absolute bottom-3 left-3 bg-slate-900/80 backdrop-blur-md text-white text-xs font-bold px-3 py-1 rounded-full" id="customizerPrice">
          $0.00 CAD
        </div>
      </div>

      <p id="customizerDesc" class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed"></p>

      <div id="customizerSidesSection" class="space-y-2"></div>

      <div id="customizerExtraSidesSection" class="pt-3 border-t border-slate-200 dark:border-slate-800">
        <label class="block text-xs font-bold uppercase tracking-wider text-slate-800 dark:text-slate-200 mb-1">
          Extra Sides (+$4.99 CAD each) <span class="font-normal text-slate-400">(Optional)</span>
        </label>
        <div id="extraSidesList" class="grid grid-cols-1 sm:grid-cols-2 gap-2"></div>
      </div>

      <div class="pt-2">
        <label for="customizerNotes" class="block text-xs font-semibold text-slate-700 dark:text-slate-300 mb-1">
          Special Instructions / Dietary Notes:
        </label>
        <input 
          type="text" 
          id="customizerNotes" 
          placeholder="e.g. dressing on the side, extra lemon wedge, light salt..." 
          class="w-full px-3.5 py-2 text-xs rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white focus:ring-2 focus:ring-sky-500 focus:outline-none"
        />
      </div>
    </div>

    <div class="sticky bottom-0 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md px-6 py-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between gap-4">
      <div>
        <span class="text-[10px] text-slate-500 block uppercase font-medium">Plate Total:</span>
        <span id="customizerAddBtnTotal" class="text-lg font-black text-sky-600 dark:text-sky-400">$0.00 CAD</span>
      </div>
      <button onclick="addCustomizedMealToCart()" class="py-3 px-6 bg-sky-600 hover:bg-sky-500 text-white font-bold text-xs rounded-xl transition shadow-lg shadow-sky-600/30 flex items-center gap-2">
        <span>Add Plate to Cart</span>
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
      </button>
    </div>
  </div>
</div>

<!-- Cart Drawer -->
<div id="cartDrawer" class="fixed inset-y-0 right-0 z-50 w-full max-w-md bg-white dark:bg-slate-900 shadow-2xl border-l border-slate-200 dark:border-slate-800 transform translate-x-full transition-transform duration-300 ease-in-out flex flex-col">
  <div class="p-5 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
    <div class="flex items-center gap-2">
      <svg class="w-5 h-5 text-sky-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path></svg>
      <h3 class="font-extrabold text-lg text-slate-900 dark:text-white">Your Meal Prep Cart</h3>
    </div>
    <button onclick="closeCartDrawer()" class="p-2 text-slate-400 hover:text-slate-900 dark:hover:text-white">✕</button>
  </div>

  <div id="cartVolumeProgressBar" class="p-4 border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/40"></div>
  <div id="cartItemsList" class="flex-1 overflow-y-auto p-4 space-y-3"></div>

  <div class="p-4 border-t border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/40 space-y-2 text-xs">
    <div class="flex items-center justify-between font-bold text-slate-800 dark:text-slate-200">
      <span>Fulfillment Method:</span>
    </div>
    <div class="grid grid-cols-2 gap-2">
      <label class="flex items-center gap-2 p-2 border border-slate-300 dark:border-slate-700 rounded-lg cursor-pointer bg-white dark:bg-slate-800">
        <input type="radio" name="deliveryMethodRadio" value="delivery" checked class="text-sky-600" />
        <span class="font-semibold">🚚 Delivery</span>
      </label>
      <label class="flex items-center gap-2 p-2 border border-slate-300 dark:border-slate-700 rounded-lg cursor-pointer bg-white dark:bg-slate-800">
        <input type="radio" name="deliveryMethodRadio" value="pickup" class="text-sky-600" />
        <span class="font-semibold">📍 Free Pickup</span>
      </label>
    </div>
  </div>

  <div class="p-5 border-t border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 space-y-2 text-xs">
    <div class="flex justify-between text-slate-600 dark:text-slate-400">
      <span>Subtotal:</span>
      <span id="cartSubtotal" class="font-semibold">$0.00 CAD</span>
    </div>
    <div id="cartDiscountRow" class="hidden flex justify-between text-emerald-500 font-bold">
      <span>10% Volume Discount (7+ meals):</span>
      <span id="cartDiscount">-$0.00 CAD</span>
    </div>
    <div class="flex justify-between text-slate-600 dark:text-slate-400">
      <span>Delivery Fee:</span>
      <span id="cartDeliveryFee" class="font-semibold">$5.00 CAD</span>
    </div>
    <div class="flex justify-between text-slate-600 dark:text-slate-400">
      <span>Ontario HST (13%):</span>
      <span id="cartTax" class="font-semibold">$0.00 CAD</span>
    </div>
    <div class="flex justify-between text-base font-black text-slate-900 dark:text-white pt-2 border-t border-slate-200 dark:border-slate-800">
      <span>Total:</span>
      <span id="cartGrandTotal" class="text-sky-600 dark:text-sky-400">$0.00 CAD</span>
    </div>
    <button id="cartCheckoutBtn" onclick="openCheckoutModal()" class="w-full mt-3 py-3 px-4 bg-sky-600 hover:bg-sky-500 text-white font-black text-sm rounded-xl transition shadow-lg shadow-sky-600/30">
      Proceed to Checkout
    </button>
  </div>
</div>

<!-- Checkout Modal -->
<div id="checkoutModal" class="hidden fixed inset-0 z-50 bg-slate-950/75 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-lg w-full max-h-[90vh] overflow-y-auto border border-slate-200 dark:border-slate-800 shadow-2xl relative p-6">
    <div class="flex items-center justify-between pb-4 border-b border-slate-200 dark:border-slate-800">
      <div>
        <span class="text-xs font-bold text-sky-500 uppercase tracking-wider">Fast &amp; Secure Checkout</span>
        <h3 class="text-xl font-black text-slate-900 dark:text-white">Complete Your Meal Prep Order</h3>
      </div>
      <button onclick="closeCheckoutModal()" class="w-8 h-8 rounded-full bg-slate-100 dark:bg-slate-800 text-slate-500 hover:text-slate-900 dark:hover:text-white flex items-center justify-center">✕</button>
    </div>

    <form onsubmit="handleCheckoutSubmit(event)" class="mt-5 space-y-4 text-xs">
      <div>
        <label class="block font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider mb-1">Scheduled Delivery Batch</label>
        <select id="scheduledDeliveryDay" class="w-full px-3.5 py-2.5 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white font-semibold">
          <option value="Sunday (10:00 AM - 2:00 PM)">Sunday Delivery (10:00 AM - 2:00 PM)</option>
          <option value="Wednesday (4:00 PM - 8:00 PM)">Wednesday Delivery (4:00 PM - 8:00 PM)</option>
        </select>
      </div>

      <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
        <div>
          <label for="custName" class="block font-semibold text-slate-700 dark:text-slate-300 mb-1">Full Name</label>
          <input required type="text" id="custName" placeholder="George Smith" class="w-full px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white" />
        </div>
        <div>
          <label for="custPhone" class="block font-semibold text-slate-700 dark:text-slate-300 mb-1">Phone Number</label>
          <input required type="tel" id="custPhone" placeholder="416-555-0199" class="w-full px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white" />
        </div>
      </div>

      <div>
        <label for="custEmail" class="block font-semibold text-slate-700 dark:text-slate-300 mb-1">Email</label>
        <input required type="email" id="custEmail" placeholder="george@example.com" class="w-full px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white" />
      </div>

      <div id="deliveryAddressInputBox">
        <label for="custAddress" class="block font-semibold text-slate-700 dark:text-slate-300 mb-1">Delivery Street Address</label>
        <input type="text" id="custAddress" placeholder="3500 Lake Shore Blvd W, Etobicoke" class="w-full px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white" />
      </div>

      <div id="pickupLocationInfoBox" class="hidden p-3 bg-amber-500/10 border border-amber-500/20 rounded-xl text-amber-600 dark:text-amber-400">
        📍 Pickup: George the Greek, 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5.
      </div>

      <div class="pt-3 border-t border-slate-200 dark:border-slate-800 space-y-3">
        <label class="block font-bold text-slate-700 dark:text-slate-300 uppercase tracking-wider">Credit Card Information</label>
        <input required type="text" placeholder="Card Number (4500 •••• •••• 1234)" class="w-full px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white font-mono" />
        <div class="grid grid-cols-2 gap-3">
          <input required type="text" placeholder="MM / YY" class="px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white font-mono" />
          <input required type="text" placeholder="CVC" class="px-3 py-2 rounded-xl border border-slate-300 dark:border-slate-700 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-white font-mono" />
        </div>
      </div>

      <div class="pt-3 flex items-center justify-between">
        <div>
          <span class="text-slate-500">Total Charged:</span>
          <span id="checkoutTotalDisplay" class="font-black text-base text-sky-600 dark:text-sky-400 block">$0.00 CAD</span>
        </div>
        <button type="submit" class="py-3 px-6 bg-sky-600 hover:bg-sky-500 text-white font-bold rounded-xl shadow-lg">
          Confirm &amp; Place Order 🔒
        </button>
      </div>
    </form>
  </div>
</div>

<!-- Confirmation Modal -->
<div id="confirmationModal" class="hidden fixed inset-0 z-50 bg-slate-950/75 backdrop-blur-sm flex items-center justify-center p-4">
  <div class="bg-white dark:bg-slate-900 rounded-3xl max-w-md w-full p-6 border border-slate-200 dark:border-slate-800 shadow-2xl text-center space-y-4">
    <div class="w-14 h-14 mx-auto rounded-full bg-emerald-500/20 text-emerald-500 flex items-center justify-center text-2xl font-black">✓</div>
    <h3 class="text-2xl font-black text-slate-900 dark:text-white">Order Confirmed!</h3>
    <p class="text-xs text-slate-500">Your scheduled order has been routed to the kitchen prep team.</p>
    <div id="confirmationOrderDetails"></div>
    <div class="pt-3 flex gap-3">
      <button onclick="closeConfirmationModal()" class="flex-1 py-2.5 bg-sky-600 text-white font-bold text-xs rounded-xl">Done</button>
      <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="flex-1 py-2.5 border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-bold text-xs rounded-xl flex items-center justify-center">Kitchen View</a>
    </div>
  </div>
</div>
