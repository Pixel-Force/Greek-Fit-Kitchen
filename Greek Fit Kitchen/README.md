# Greek Fit Kitchen — Next-Level Meal Preparation Website & WordPress Theme

> **"BIG GREEK FLAVOUR. ZERO MEAL PREP."**  
> Managed by **George the Greek** (3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5)  
> Powered by **Lean Meal** ([leanmeal.ca](https://leanmeal.ca))  
> Designed & Developed by **Penta Services** ([pentaservices.co.uk](https://pentaservices.co.uk))

---

## 🌟 Overview & Key Features

Greek Fit Kitchen is a modern, high-performance web platform and WordPress theme purpose-built for scheduled meal-prep delivery services.

### 1. Flyer & Business Requirements Implemented
* **6-Meal Minimum Starter Plan**: Clear pricing starting from **$59.94 CAD** ($9.99/meal starting tier). Cart enforces a minimum of 6 meals before checkout with progress gauge.
* **10% Volume Discount**: Automatically applied to all orders containing **7 or more meals**.
* **2 Sides Included Rule**: Any plate comes with **2 gourmet sides of the customer's choice** (11 options available). Automatically excluded for *Pasta al Greco* (served complete with roasted sauce & feta).
* **Extra Sides Option**: Add additional side portions for **+$4.99 CAD each**.
* **All 20 Main Dishes from Flyer**:
  1. Grilled Chicken ($12.99)
  2. Chicken Leg Plate ($10.99)
  3. Chilly Chicken ($13.99)
  4. Chicken Fillet ($12.99)
  5. Salmon ($14.99)
  6. Veggie Souvlaki ($11.99)
  7. Spinach & Feta Stuffed Chicken ($14.99)
  8. Chicken Souvlaki Plate ($12.99)
  9. Tandoori Chicken ($14.99)
  10. Beef Souvlaki Plate ($13.99)
  11. Chicken Mushroom Sauce ($13.99)
  12. Pork Souvlaki Plate ($9.99)
  13. Chicken Fajita ($12.99)
  14. Spinach Pie Dinner / Spanakopita ($12.99)
  15. Beef Fajita ($14.99)
  16. Pasta al Greco ($9.99 - No sides)
  17. Beef Mushroom Sauce ($14.99)
  18. Smoked Pork Loin ($12.99)
  19. Smoked Turkey Breast ($13.99)
  20. Turkey Souvlaki Plate ($13.99)
* **All 11 Sides from Flyer**:
  Rice Pilaf with Veggies, Yellow Basmati Rice, Spinach Mushroom Rice, Orzo in Tomato Sauce, Garlic Butter Baked Potatoes, Lemon Roasted Potatoes, Sweet Potatoes, Mashed Potatoes, Sautéed Veggies, Steamed Veggies, Green Beans in Tomato Sauce.

### 2. Scheduled Delivery & Distance Calculation
* **Delivery Schedule**:
  * **Sunday Delivery**: Advance order cutoff is **Friday 12:00 PM** (Toronto local time).
  * **Wednesday Delivery**: Advance order cutoff is **Monday 12:00 PM** (Toronto local time).
  * **Live Cutoff Countdown Bar**: Shows real-time hours/minutes remaining to lock in the next delivery batch.
* **Distance Pricing Tiers**:
  * **Up to 2 km**: **FREE**
  * **Over 2 km and up to 5 km**: **$5.00 flat**
  * **Over 5 km**: **$1.00 per km**
* **Pickup**: Free pickup at George the Greek in Etobicoke.

### 3. Integrated Kitchen Display Tablet (KDS)
* Dedicated interface (`kitchen.html` & `page-kitchen.php`) for kitchen staff.
* View orders categorized by scheduled Sunday / Wednesday batch.
* One-click ticket status transitions: `Received` ➔ `In Prep` ➔ `Ready for Delivery/Pickup` ➔ `Completed`.
* Print kitchen slip tickets with exact customer side selections and dietary notes.

### 4. Mandatory User Rules
* **Light / Dark Theme Switcher**:
  * Moon icon in Light mode (to switch to Dark mode).
  * Sun icon in Dark mode (to switch to Light mode).
  * Circular `rounded-full` button placed in header nav and mobile drawer.
  * Toggles `dark` class on root `<html>`.
  * Persists selection in `localStorage` and respects system preferences.
* **Penta Services Footer Bottom Credit Bar**:
  * Exact link to `https://pentaservices.co.uk/en/?utm_source=referral&utm_medium=site-credit`
  * Official SVG badge included at `public/images/brand/penta-services-logo.svg`
  * Sub-bar styling with subtle divider and responsive flex container.

---

## 📁 Project Directory Structure

```text
greek-fit-kitchen/
├── index.html                   # High-speed responsive customer ordering web app
├── kitchen.html                 # Dedicated Kitchen Tablet Display System (KDS)
├── styles.css                   # Custom theme CSS & animations
├── app.js                       # Cart logic, cutoff countdown, distance calculator, theme engine
├── Launch-Website.bat           # 1-Click desktop launcher
├── public/
│   └── images/
│       ├── flyer-page-1.png     # Rendered high-res flyer page 1
│       ├── flyer-page-2.png     # Rendered high-res flyer page 2
│       ├── brand/               # Greek Fit Kitchen, George the Greek, Lean Meal, Penta Services SVGs
│       ├── meals/               # 20 dish photos + cropped flyer meal prep containers
│       └── slider/              # 3 high-impact hero slider slides
└── wordpress-theme/
    ├── greek-fit-kitchen.zip    # Production-ready theme zip for 1-click WP Admin upload
    └── greek-fit-kitchen/       # Full WordPress theme source files
        ├── style.css            # WordPress theme header metadata & styles
        ├── functions.php        # CPT, WooCommerce hooks, delivery & volume discount filters
        ├── header.php           # Theme toggle, navigation, announcement bar
        ├── footer.php           # Links, schedule, Penta Services credit bar
        ├── front-page.php       # Homepage with slider, 6-meal pack, menu grid, distance calculator
        ├── page.php             # Generic page template
        ├── single.php           # Single meal / post template
        ├── index.php            # Archive template
        ├── 404.php              # Not found template
        ├── page-kitchen.php     # Kitchen Display Tablet template
        ├── template-parts/      # Modals, cart drawer, customizer
        ├── screenshot.png       # 1200x900 theme preview card
        └── assets/              # Theme assets (CSS, JS, Images)
```

---

## 🚀 How to Run & Deploy

### Quick Local Preview
1. Double-click `Launch-Website.bat` or open `index.html` in any modern web browser.
2. Test the slider, customize meals with 2 included sides, check the 10% volume discount at 7+ meals, test the distance calculator, and complete checkout.
3. Open `kitchen.html` to view the live kitchen tablet interface.

### Installing in WordPress
1. Log in to your WordPress Admin dashboard (`/wp-admin`).
2. Navigate to **Appearance** > **Themes** > **Add New** > **Upload Theme**.
3. Select `wordpress-theme/greek-fit-kitchen.zip` and click **Install Now**.
4. Click **Activate**.
5. Set your **Settings** > **Reading** > **Your homepage displays** to "A static page" and choose your Front Page.
