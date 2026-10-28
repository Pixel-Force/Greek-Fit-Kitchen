<?php
/**
 * Generic Header Template for Greek Fit Kitchen WordPress Theme
 * Modular, standalone header included across all templates and Elementor pages
 *
 * @package GreekFitKitchen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <!-- Preconnect to Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" />
  
  <!-- Tailwind CSS CDN with Custom Color Palette -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            greek: {
              navy: '#101D3A',
              card: '#172A4D',
              gold: '#F5C542',
              goldHover: '#E5B432',
              cream: '#FAF9F5',
              lime: '#70B843',
            }
          },
          fontFamily: {
            sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui', 'sans-serif'],
          }
        }
      }
    };
  </script>

  <script>
    (function() {
      try {
        const storedTheme = localStorage.getItem('theme');
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        if (storedTheme === 'dark' || (!storedTheme && prefersDark)) {
          document.documentElement.classList.add('dark');
        } else {
          document.documentElement.classList.remove('dark');
        }
      } catch (e) {}
    })();
    function toggleTheme() {
      const isDark = document.documentElement.classList.toggle('dark');
      try {
        localStorage.setItem('theme', isDark ? 'dark' : 'light');
      } catch(e) {}
    }
  </script>

  <?php wp_head(); ?>
</head>

<body <?php body_class( 'bg-[#FAF9F5] text-slate-800 antialiased flex flex-col min-h-screen selection:bg-greek-gold selection:text-greek-navy' ); ?>>
<?php wp_body_open(); ?>

  <!-- Top Announcement Bar: Batch Delivery Cutoff & Location -->
  <aside class="bg-[#0C172E] text-white text-[11px] font-semibold py-2 px-4 border-b border-white/10" aria-label="Announcement">
    <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-1.5 text-center sm:text-left">
      <div class="flex items-center gap-2">
        <span class="inline-block w-2 h-2 rounded-full bg-greek-lime animate-pulse"></span>
        <span class="text-white/80">Batch Delivery:</span>
        <span id="cutoffCountdown" class="text-greek-gold font-bold">Sundays &amp; Wednesdays</span>
      </div>
      <div class="text-white/70 text-[10px] hidden sm:block">
        Free Kitchen Pickup: <strong class="text-white">George the Greek</strong> (3575 Lake Shore Blvd W, Etobicoke, ON)
      </div>
    </div>
  </aside>

  <!-- Generic Main Header Bar -->
  <header class="sticky top-0 z-40 w-full bg-[#101D3A] text-white border-b border-white/10 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
      
      <!-- Brand Logo -->
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none shrink-0" aria-label="<?php bloginfo( 'name' ); ?>">
        <?php
        if ( has_custom_logo() ) {
            the_custom_logo();
        } else {
            ?>
            <img 
              src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' ); ?>" 
              alt="<?php bloginfo( 'name' ); ?>" 
              width="200" 
              height="48"
              class="h-11 sm:h-12 w-auto max-w-[190px] sm:max-w-[210px] object-contain drop-shadow" 
            />
            <?php
        }
        ?>
      </a>

      <!-- Generic Desktop Navigation -->
      <nav class="hidden lg:flex items-center gap-6 font-semibold text-xs uppercase tracking-wider text-white/90" aria-label="Primary Navigation">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex items-center gap-6',
                'fallback_cb'    => 'gfk_primary_menu_fallback',
                'items_wrap'     => '%3$s',
                'depth'          => 2,
            ) );
        } else {
            gfk_primary_menu_fallback();
        }
        ?>
      </nav>

      <!-- Right Header Utilities: Cart Drawer Trigger & Order CTA -->
      <div class="flex items-center gap-3 shrink-0">



        <!-- Shopping Cart Icon Button with Live Counter Badge -->
        <button 
          onclick="openCartDrawer()"
          type="button" 
          aria-label="View Shopping Cart"
          class="relative p-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/20 flex items-center justify-center focus:outline-none active:scale-95"
        >
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
          </svg>
          <span class="cart-count-badge absolute -top-1 -right-1 w-5 h-5 bg-greek-gold text-[#101D3A] text-[10px] font-black rounded-full flex items-center justify-center border-2 border-[#101D3A] shadow">
            0
          </span>
        </button>

        <!-- Order / Build Plan CTA Button -->
        <a href="<?php echo esc_url( home_url( '/#mealPlans' ) ); ?>" class="hidden sm:inline-flex items-center gap-1.5 py-2.5 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
          <span>Build Your Plan</span>
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
          </svg>
        </a>

        <!-- Mobile Menu Toggle Button -->
        <button id="mobileMenuBtn" type="button" aria-label="Open Mobile Menu" class="lg:hidden p-2 text-white rounded-lg hover:bg-white/10 transition">
          <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>

    <!-- Mobile Drawer Menu -->
    <div id="mobileMenuDrawer" class="hidden lg:hidden border-t border-white/10 bg-[#101D3A] px-5 py-5 space-y-4">
      <nav class="flex flex-col space-y-3 text-sm font-semibold text-white">
        <?php
        if ( has_nav_menu( 'primary' ) ) {
            wp_nav_menu( array(
                'theme_location' => 'primary',
                'container'      => false,
                'menu_class'     => 'flex flex-col space-y-3',
                'fallback_cb'    => 'gfk_mobile_menu_fallback',
            ) );
        } else {
            gfk_mobile_menu_fallback();
        }
        ?>
      </nav>
      <div class="pt-4 border-t border-white/10">
        <a href="<?php echo esc_url( home_url( '/#mealPlans' ) ); ?>" class="w-full inline-flex items-center justify-center gap-1.5 py-3 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
          <span>Build Weekly Plan (6+ Meals)</span>
        </a>
      </div>
    </div>
  </header>
