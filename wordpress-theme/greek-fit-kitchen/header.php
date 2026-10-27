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
  
  <!-- Preconnect to Google Fonts for Fast Loading -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  
  <!-- Tailwind CSS CDN with Custom Color Palette -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            greek: {
              navy: '#0C2B54',
              midnight: '#071526',
              card: '#0E223D',
              gold: '#F5BA13',
              goldHover: '#DE9B08',
              lime: '#82B82A',
              limeHover: '#6EA31E',
              cream: '#F9F8F5',
              slate: '#1E293B',
            }
          }
        }
      }
    };
  </script>

  <?php wp_head(); ?>

  <script>
    // Theme initialization (Mandatory Rule 1)
    (function() {
      const saved = localStorage.getItem('theme');
      const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      if (saved === 'dark' || (!saved && prefersDark)) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    })();
  </script>
</head>
<body <?php body_class( 'bg-greek-cream dark:bg-greek-midnight text-greek-slate dark:text-slate-100 antialiased min-h-screen flex flex-col selection:bg-greek-gold selection:text-greek-navy' ); ?>>
<?php wp_body_open(); ?>

  <!-- ================= TOP ANNOUNCEMENT & CUTOFF BAR ================= -->
  <div class="bg-greek-navy text-white text-xs py-2.5 px-4 border-b border-white/10 relative z-50">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
      <div class="flex items-center gap-2.5">
        <span class="inline-flex items-center gap-1 bg-greek-gold text-greek-navy font-black px-2 py-0.5 rounded text-[11px] uppercase tracking-wider shadow-sm">
          🔥 SPECIAL
        </span>
        <span class="font-medium text-xs">
          6-Meal Plan from <strong class="text-greek-gold">$59.94 CAD</strong> · <strong>10% OFF</strong> orders of 7+ meals!
        </span>
      </div>

      <div class="flex items-center gap-3">
        <div id="cutoffCountdown" class="hidden md:inline-flex items-center gap-1.5 text-[11px] bg-black/40 text-greek-gold px-3 py-1 rounded-full border border-white/10">
          <span>Loading delivery cutoff...</span>
        </div>
        <span class="text-white/20 hidden sm:inline">|</span>
        <div class="flex items-center gap-1.5 text-[11px] text-white/80">
          <span>📍 Pickup at <strong>George the Greek</strong> (FREE)</span>
        </div>
      </div>
    </div>
  </div>

  <!-- ================= MAIN HEADER BAR ================= -->
  <header class="sticky top-0 z-40 w-full glass-header transition-colors">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
      
      <!-- Brand Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none" aria-label="Greek Fit Kitchen Home">
        <div class="flex items-center py-1 px-2 rounded-xl transition-transform group-hover:scale-105">
          <img 
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' ); ?>" 
            alt="Greek Fit Kitchen" 
            width="200" 
            height="48"
            class="h-12 w-auto max-w-[200px] object-contain drop-shadow" 
          />
        </div>
      </a>

      <!-- Desktop Nav -->
      <nav class="hidden lg:flex items-center gap-7 font-semibold text-sm text-white/90">
        <a href="#featuredMeals" class="hover:text-greek-gold transition-colors">Featured Meals</a>
        <a href="#mealPlans" class="hover:text-greek-gold transition-colors">6-Meal Packages &amp; Savings</a>
        <a href="#howItWorks" class="hover:text-greek-gold transition-colors">How Ordering Works</a>
        <a href="#deliverySection" class="hover:text-greek-gold transition-colors">Delivery Rates</a>
        <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-white/10 text-xs font-bold text-greek-gold hover:bg-white/20 transition border border-white/10">
          <span>👨‍🍳 Kitchen Tablet KDS</span>
        </a>
      </nav>

      <!-- Header Utilities: Theme Switcher (Rule 1), Shopping Cart, Order CTA -->
      <div class="flex items-center gap-3">

        <!-- Theme Toggle Button (Mandatory Requirement 1) -->
        <button 
          id="themeToggleBtn"
          onclick="toggleTheme()" 
          type="button"
          aria-label="Toggle Light and Dark Theme"
          class="w-10 h-10 rounded-full border border-white/20 flex items-center justify-center text-white bg-white/10 hover:bg-white/20 transition-all focus:outline-none shadow-sm"
        >
          <!-- Moon Icon (Visible in Light mode to switch to dark) -->
          <svg class="theme-icon-moon w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
          </svg>
          <!-- Sun Icon (Visible in Dark mode to switch to light) -->
          <svg class="theme-icon-sun w-5 h-5 text-greek-gold" style="display:none;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 9h-1m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path>
          </svg>
        </button>

        <!-- Shopping Cart Icon Button with Count Badge -->
        <button 
          onclick="openCartDrawer()"
          type="button" 
          aria-label="View Shopping Cart"
          class="relative p-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/20 flex items-center justify-center focus:outline-none active:scale-95"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
          </svg>
          <span class="cart-count-badge absolute -top-1 -right-1 w-5 h-5 bg-greek-gold text-greek-navy text-[11px] font-black rounded-full flex items-center justify-center border-2 border-greek-navy shadow">
            0
          </span>
        </button>

        <!-- Order Now CTA Button -->
        <a href="#featuredMeals" class="hidden sm:inline-flex items-center gap-1.5 py-2.5 px-4 rounded-xl font-black text-xs btn-gold transition shadow">
          <span>Order Now</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" aria-label="Open Mobile Menu" class="lg:hidden p-2 text-white rounded-lg hover:bg-white/10">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer -->
    <div id="mobileMenuDrawer" class="hidden lg:hidden border-t border-white/10 bg-greek-navy px-5 py-5 space-y-4">
      <nav class="flex flex-col space-y-3 text-sm font-semibold text-white">
        <a href="#featuredMeals" class="hover:text-greek-gold py-1">Featured Meals (20 Dishes)</a>
        <a href="#mealPlans" class="hover:text-greek-gold py-1">Meal Plans &amp; Savings ($59.94)</a>
        <a href="#howItWorks" class="hover:text-greek-gold py-1">How Ordering Works</a>
        <a href="#deliverySection" class="hover:text-greek-gold py-1">Distance Delivery Rates</a>
        <a href="<?php echo esc_url( home_url( '/kitchen-display/' ) ); ?>" class="text-greek-gold py-1 flex items-center gap-2">👨‍🍳 Kitchen Tablet Display</a>
      </nav>
      <div class="pt-4 border-t border-white/10 flex items-center justify-between">
        <span class="text-xs text-white/60">Theme Preference</span>
        <button onclick="toggleTheme()" class="flex items-center gap-2 text-xs font-semibold px-3 py-1.5 rounded-lg border border-white/20 text-white">
          <span class="theme-icon-moon">🌙 Dark Mode</span>
          <span class="theme-icon-sun" style="display:none;">☀️ Light Mode</span>
        </button>
      </div>
    </div>
  </header>
