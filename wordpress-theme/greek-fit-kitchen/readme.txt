=== Greek Fit Kitchen ===
Contributors: GreekFitKitchen
Tags: e-commerce, food-and-drink, custom-colors, custom-menu, featured-images, responsive-layout, elementor, full-width-template
Requires at least: 6.0
Tested up to: 6.7
Requires PHP: 7.4
Stable tag: 2.1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Next-generation healthy meal preparation, online ordering, and Elementor-compatible WordPress theme for Greek Fit Kitchen.

== Description ==

Greek Fit Kitchen is a modern, high-speed, production-grade WordPress theme designed specifically for scheduled meal-prep and advance delivery services. Managed by George the Greek in Etobicoke and powered by Lean Meal.

Key Architecture Features:
* Full Elementor Page Builder Compatibility (edit any page visually)
* 8 Custom Elementor Widgets with live drag-and-drop controls:
  1. GFK Hero Slider (editable slides, titles, buttons, background images)
  2. GFK Menu Grid (20 approved dishes, category filter pills, search bar)
  3. GFK Meal Plans & Savings (6-meal starter plan, 10% discount on 7+ meals)
  4. GFK How It Works (customizable 3-step meal prep workflow)
  5. GFK Chef Sides Showcase (11 approved sides, $4.99 extra sides notice)
  6. GFK Delivery Rates & Calculator (Sunday & Wednesday batch cutoff schedules, $5.99 base + $0.99/km distance pricing)
  7. GFK Catering & Events Banner (corporate wellness, parties & custom orders)
  8. GFK About & Brand Story (George the Greek bio, Etobicoke kitchen, Lean Meal credentials)
* Completely Separate & Generic Header (`header.php`) and Footer (`footer.php`)
* Custom Page Templates:
  - Elementor Full Width (`template-elementor.php` - retains generic header/footer with 100% width canvas)
  - Elementor Canvas (`template-canvas.php` - blank canvas)
  - Front Page (`front-page.php` - default modular sections or Elementor visual override)
  - Standard Page (`page.php` - auto-detects Elementor or standard layout)
* Working Interactive Functions:
  - Dish sides customizer modal (2 sides included with eligible plates, extra sides +$4.99 CAD, Pasta al Greco zero-sides exception)
  - Live slide-out cart drawer with volume discount calculations
  - Scheduled batch delivery cutoff countdown (Toronto local time)
  - Interactive distance calculator from 3575 Lake Shore Blvd W, Etobicoke
  - Full mobile responsiveness without horizontal scrolling or giant image heights

== Shortcodes ==

You can also place any section anywhere using standard WordPress shortcodes:
* `[gfk_hero_slider]` - Hero Slider
* `[gfk_menu_grid]` - Menu Grid (20 Dishes)
* `[gfk_meal_plans]` - Weekly Meal Plans & 10% Savings
* `[gfk_how_it_works]` - How Ordering Works
* `[gfk_sides_showcase]` - Chef-Crafted Sides
* `[gfk_delivery_calculator]` - Delivery Schedule & Distance Estimator
* `[gfk_catering_banner]` - Catering & Event Inquiry Banner
* `[gfk_about_story]` - About Chef & Brand Story

== Installation ==

1. In WordPress Admin, go to Appearance > Themes > Add New.
2. Click "Upload Theme" and select `greek-fit-kitchen.zip`.
3. Click "Install Now" and then "Activate".
4. To edit pages with Elementor:
   - Install and activate the free Elementor plugin from Plugins > Add New.
   - Go to Pages > Add New (or edit an existing page).
   - In Page Attributes, choose "Elementor Full Width" (or default template).
   - Click "Edit with Elementor" to drag Greek Fit Kitchen widgets from the widget panel!
