<?php
/**
 * Header template for Greek Fit Kitchen WordPress Theme
 *
 * @package GreekFitKitchen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
  <script>
    // Theme initialization (Rule 1)
    (function() {
      const saved = localStorage.getItem('gfk_theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (saved === 'dark' || (!saved && prefersDark)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    })();
  </script>
</head>
<body <?php body_class( 'bg-slate-50 dark:bg-[#090d16] text-slate-900 dark:text-slate-100 antialiased min-h-screen flex flex-col selection:bg-sky-500 selection:text-white' ); ?>>
<?php wp_body_open(); ?>

  <!-- Top Announcement & Cutoff Countdown -->
  <div class="bg-gradient-to-r from-blue-950 via-slate-900 to-sky-950 text-white text-xs py-2 px-4 border-b border-sky-400/20 relative z-50">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-2">
      <div class="flex items-center gap-2">
        <span class="inline-flex items-center gap-1 bg-amber-500 text-slate-950 font-black px-2 py-0.5 rounded text-[11px] uppercase tracking-wider">
          🔥 Promo
        </span>
        <span class="font-medium">6-Meal Starter Plan from <strong class="text-amber-300">$59.94 CAD</strong> · <strong>10% OFF</strong> orders of 7+ meals!</span>
      </div>

      <div class="flex items-center gap-3">
        <div id="cutoffCountdown" class="hidden md:inline-flex items-center gap-1 text-[11px] bg-slate-900/60 px-2.5 py-0.5 rounded-full border border-white/10">
          <span>Loading Toronto delivery cutoff...</span>
        </div>
        <span class="text-white/40 hidden sm:inline">|</span>
        <div class="flex items-center gap-1.5 text-[11px] text-sky-200">
          <span>📍 Pickup: <strong>George the Greek</strong> (FREE)</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Header Bar -->
  <header class="sticky top-0 z-40 w-full glass-header border-b border-slate-200/80 dark:border-slate-800/80 transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
      
      <!-- Brand Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none">
        <div class="w-11 h-11 rounded-xl bg-gradient-to-tr from-sky-600 to-blue-800 flex items-center justify-center shadow-md shadow-sky-600/30 text-white font-bold text-xl group-hover:scale-105 transition-transform">
          🇬🇷
        </div>
        <div class="flex flex-col">
          <span class="font-extrabold text-lg sm:text-xl tracking-tight leading-none text-slate-900 dark:text-white flex items-center gap-1">
            GREEK <span class="text-sky-500">FIT</span> KITCHEN
          </span>
          <span class="text-[10px] tracking-widest uppercase font-semibold text-slate-500 dark:text-slate-400 mt-1">
            Healthy Meal Prep &amp; Delivery
          </span>
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden lg:flex items-center gap-8 font-medium text-sm text-slate-700 dark:text-slate-300">
        <a href="#menuSection" class="hover:text-sky-500 dark:hover:text-sky-400 transition-colors">Menu Catalog</a>
        <a href="#howItWorks" class="hover:text-sky-500 dark:hover:text-sky-400 transition-colors">How It Works</a>
        <a href="#packagePricing" class="hover:text-sky-500 dark:hover:text-sky-400 transition-colors">6-Meal Plan ($59.94)</a>
        <a href="#deliveryCalculator" class="hover:text-sky-500 dark:hover:text-sky-400 transition-colors">Delivery Zones</a>
        <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="flex items-center gap-1 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 text-xs font-semibold text-sky-600 dark:text-sky-400 hover:bg-sky-50 dark:hover:bg-slate-700 transition">
          <span>👨‍🍳 Kitchen Tablet</span>
        </a>
      </nav>

      <!-- Utilities: Light / Dark Theme Switcher (Rule 1) & Cart -->
      <div class="flex items-center gap-3">
        
        <!-- Mandatory Theme Toggle Button -->
        <button 
          id="themeToggleBtn"
          onclick="toggleTheme()" 
          type="button"
          aria-label="Toggle Light and Dark Theme"
          class="w-10 h-10 rounded-full border border-slate-300 dark:border-slate-700 flex items-center justify-center text-slate-700 dark:text-slate-300 bg-white/80 dark:bg-slate-800/80 hover:bg-slate-100 dark:hover:bg-slate-700 transition-all focus:outline-none shadow-sm"
        >
          <!-- Moon Icon in Light mode -->
          <svg class="theme-icon-moon w-5 h-5 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
          </svg>
          <!-- Sun Icon in Dark mode -->
          <svg class="theme-icon-sun w-5 h-5 text-amber-400" style="display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9h-1m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
        </button>

        <!-- Cart Button -->
        <button 
          onclick="openCartDrawer()"
          type="button" 
          aria-label="View Shopping Cart"
          class="relative p-2.5 rounded-full bg-sky-600 hover:bg-sky-500 text-white transition-all shadow-md shadow-sky-600/30 flex items-center justify-center focus:outline-none active:scale-95"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
          </svg>
          <span class="cart-count-badge absolute -top-1.5 -right-1.5 w-5 h-5 bg-amber-500 text-slate-950 text-[11px] font-black rounded-full flex items-center justify-center border-2 border-white dark:border-slate-900 shadow">
            0
          </span>
        </button>

        <a href="#menuSection" class="hidden sm:inline-flex items-center gap-1.5 py-2 px-4 rounded-xl font-bold text-xs bg-slate-900 dark:bg-white text-white dark:text-slate-900 hover:bg-slate-800 dark:hover:bg-slate-100 transition shadow">
          <span>Order Now</span>
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" aria-label="Open Mobile Menu" class="lg:hidden p-2 text-slate-700 dark:text-slate-300 rounded-lg hover:bg-slate-100 dark:hover:bg-slate-800">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenuDrawer" class="hidden lg:hidden border-t border-slate-200 dark:border-slate-800 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md px-4 py-5 space-y-4">
      <nav class="flex flex-col space-y-3 text-base font-semibold text-slate-800 dark:text-slate-200">
        <a href="#menuSection" class="hover:text-sky-500">Menu Catalog (20 Meals)</a>
        <a href="#howItWorks" class="hover:text-sky-500">How It Works</a>
        <a href="#packagePricing" class="hover:text-sky-500">6-Meal Package ($59.94)</a>
        <a href="#deliveryCalculator" class="hover:text-sky-500">Delivery Fee Calculator</a>
        <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="text-sky-500 flex items-center gap-2">👨‍🍳 Kitchen Tablet App</a>
      </nav>
      <div class="pt-4 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between">
        <span class="text-xs text-slate-500">Switch Color Theme</span>
        <button onclick="toggleTheme()" class="flex items-center gap-2 text-xs font-semibold px-3 py-1.5 rounded-lg border border-slate-300 dark:border-slate-700">
          <span class="theme-icon-moon">🌙 Dark Mode</span>
          <span class="theme-icon-sun" style="display:none;">☀️ Light Mode</span>
        </button>
      </div>
    </div>
  </header>
