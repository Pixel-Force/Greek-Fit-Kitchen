# Greek Fit Kitchen — Platform Operations & Administrator Manual

> **"BIG GREEK FLAVOUR. ZERO MEAL PREP."**  
> Managed by **George the Greek** (3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5)  
> Powered by **Lean Meal** ([leanmeal.ca](https://leanmeal.ca))  
> Designed & Developed by **Penta Services** ([pentaservices.co.uk](https://pentaservices.co.uk))

---

## 1. System Architecture Overview

Greek Fit Kitchen is engineered as a zero-dependency, ultra-fast web application and WordPress theme with real-time operational integration:

```
[ Customer Storefront (index.html) ]
                ↕ (Web Storage Event Bus & Central DB)
[ Admin Operations Console (admin.html) ]  ↔  [ Kitchen Display Tablet (kitchen.html) ]
```

* **Frontend**: Next-level responsive UI with custom navy/yellow branding, dark mode toggle, and sticky meal-plan builder.
* **Reactive Database**: Central state management across `gfk_menu_items`, `gfk_orders`, `gfk_settings`, and `gfk_cart`.
* **Real-Time KDS**: Immediate ticket advancement across *Received* → *In Prep* → *Ready* → *Dispatched*.
* **Encrypted Checkout**: Stripe-compatible checkout interface with live cutoff verification, distance fee calculation, and test card simulation.

---

## 2. Business Rules & Configuration Reference

### A. Delivery Schedule & Cutoff Times (Toronto Local Time)
Greek Fit Kitchen runs a scheduled batch delivery model:
1. **Sunday Delivery Batch**: Order cutoff is **Friday at 12:00 PM (noon)**.
2. **Wednesday Delivery Batch**: Order cutoff is **Monday at 12:00 PM (noon)**.
3. **Timezone**: Handled via `America/Toronto` to accurately respect daylight saving transitions.

### B. Delivery Pricing Engine
* **Base Delivery Fee**: **$5.99 CAD**
* **Distance Rate**: **$0.99 CAD per kilometre**
* **Pickup**: **100% FREE** at George the Greek in Etobicoke.
* **Calculation**:
  $$\text{Fee} = \$5.99 + (\text{Distance in km} \times \$0.99)$$

### C. 6-Meal Minimum & Volume Discounts
* **Minimum Order**: **6 meals**. The checkout flow automatically blocks orders with fewer than 6 meals.
* **Starting Price**: Starts from **$59.94 CAD** ($9.99 CAD tier × 6 meals).
* **Volume Discount**: **10% OFF** applies automatically to all orders containing **7 or more meals**.
* **Sides Included**: Every plate includes **2 sides of choice** (11 options available).
* **Pasta al Greco Exception**: Complete plate; no included sides.
* **Extra Sides**: **$4.99 CAD each**.

---

## 3. How to Update Prices, Menu Items & Settings

### Updating Dish Prices & Details
1. Open the **Admin Console** at `admin.html` (or click `⚙️ Admin` in the top navigation).
2. Click the **🍲 Menu & Pricing** tab.
3. Find any dish (e.g. *Salmon* or *Pork Souvlaki Plate*) and click **Edit**.
4. Modify the dish title, price in CAD, category, sides eligibility, or stock availability.
5. Click **Save Changes**. The updated price immediately reflects across the customer menu, meal plan builder, and cart.

### Updating Delivery Fees & Cutoff Rules
1. In `admin.html`, navigate to the **🚚 Delivery & Cutoffs** tab.
2. Modify the **Base Delivery Charge** (default `$5.99`) or **Per-Kilometre Rate** (default `$0.99`).
3. Update the cutoff text, pickup address, or extra side price (`$4.99`).
4. Click **Save Delivery & Cutoff Engine Settings**.

### Updating Promotional Discounts
1. In `admin.html`, navigate to the **🏷️ Promotions & Discounts** tab.
2. Adjust the minimum meal threshold (default `6`), volume discount threshold (default `7`), or discount percentage (default `10%`).
3. Click **Update Promotional Rules**.

---

## 4. Kitchen Tablet Display (KDS) Operations

The kitchen station display at `kitchen.html` is purpose-built for commercial touchscreens:
* **Real-time updates**: When an order is placed on `index.html`, it pops up instantly in the **1. New Orders** column.
* **One-tap advancement**:
  * Tap **Start Prep 👨‍🍳** to move ticket to **In Prep**.
  * Tap **Mark Ready ✅** once bagged and labeled with sides.
  * Tap **Dispatch 🚀** when collected by driver or customer.
* **Ticket Slip Printing**: Tap the 🖨️ icon to generate an immediate thermal printer ticket format with exact customer sides and special dietary notes.
* **Batch Filtering**: Switch between *All Batches*, *Sunday Batch*, and *Wednesday Batch*.

---

## 5. Local Setup & Testing

### Running Locally
Double-click `Launch-Website.bat` or open `index.html` in any modern web browser.

### Running Automated Test Suite
Open terminal in the project directory and execute:
```bash
node test-business-rules.js
```
All 48 business rule tests will execute and confirm flyer compliance.

---

## 6. Mandatory Project Guidelines Compliance

1. **Light / Dark Theme Switcher**:
   * Interactive circular icon button in header across `index.html`, `admin.html`, and `kitchen.html`.
   * Displays Crescent Moon in light mode; Sun in dark mode.
   * Persists in `localStorage` and respects system preferences.

2. **Penta Services Footer Credit Bar**:
   * Placed at the very bottom of the website footer across all pages.
   * Displays official Penta Services SVG logo badge linking to `pentaservices.co.uk`.
