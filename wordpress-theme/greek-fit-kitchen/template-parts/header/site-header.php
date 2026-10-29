<?php
/**
 * Site Header Template Part (End-to-End Full Width)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cutoff_text = get_theme_mod( 'gfk_announcement_cutoff', 'Sundays & Wednesdays' );
$pickup_text = get_theme_mod( 'gfk_pickup_text', 'Free Kitchen Pickup: <strong class="text-white">George the Greek</strong> (3575 Lake Shore Blvd W, Etobicoke, ON)' );
$cta_text    = get_theme_mod( 'gfk_header_cta_text', 'Build Your Plan' );
$cta_url     = get_theme_mod( 'gfk_header_cta_url', home_url( '/meal-plans/' ) );
?>

<!-- Top Announcement Bar: 100% End-to-End Full Width -->
<aside class="w-full bg-[#0C172E] text-white text-[11px] font-semibold py-2 px-4 border-b border-white/10" aria-label="Announcement">
  <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-1.5 text-center sm:text-left">
    <div class="flex items-center gap-2">
      <span class="inline-block w-2 h-2 rounded-full bg-greek-lime animate-pulse"></span>
      <span class="text-white/80">Batch Delivery:</span>
      <span id="cutoffCountdown" class="text-greek-gold font-bold"><?php echo wp_kses_post( $cutoff_text ); ?></span>
    </div>
    <div class="text-white/70 text-[10px] hidden sm:block">
      <?php echo wp_kses_post( $pickup_text ); ?>
    </div>
  </div>
</aside>

<!-- Main Header Bar: 100% End-to-End Full Width -->
<header id="siteHeader" class="sticky top-0 z-40 w-full bg-[#101D3A] text-white border-b border-white/10 shadow-md">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
    
    <!-- Brand Logo: Strict size constraints -->
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none shrink-0" aria-label="<?php bloginfo( 'name' ); ?>">
      <img 
        src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' ); ?>" 
        alt="<?php bloginfo( 'name' ); ?>" 
        width="200" 
        height="48"
        class="h-11 sm:h-12 w-auto max-w-[190px] sm:max-w-[210px] object-contain drop-shadow" 
      />
    </a>

    <!-- Primary Desktop Navigation -->
    <nav class="hidden lg:flex items-center gap-6 font-semibold text-xs uppercase tracking-wider text-white/90" aria-label="Primary Navigation">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'primary',
              'container'      => false,
              'menu_class'     => 'flex items-center gap-6',
              'fallback_cb'    => 'gfk_primary_menu_fallback',
              'depth'          => 2,
          ) );
      } else {
          gfk_primary_menu_fallback();
      }
      ?>
    </nav>

    <!-- Right Header Utilities: Cart Drawer & Order CTA -->
    <div class="flex items-center gap-3 shrink-0">

            <!-- Interactive Light / Dark Theme Switcher (Mandatory Rule 1) -->
      <button 
        id="themeToggleBtn"
        type="button" 
        onclick="toggleTheme()"
        aria-label="Toggle Light or Dark Mode"
        class="theme-toggle-btn p-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/20 flex items-center justify-center focus:outline-none active:scale-95 shadow-sm"
        title="Toggle Light or Dark Mode"
      >
        <svg id="themeIconSun" class="w-5 h-5 hidden text-greek-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
        <svg id="themeIconMoon" class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path></svg>
      </button>

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
        <span id="headerCartCount" class="cart-count-badge absolute -top-1 -right-1 w-5 h-5 bg-greek-gold text-[#101D3A] text-[10px] font-black rounded-full flex items-center justify-center border-2 border-[#101D3A] shadow">
          0
        </span>
      </button>

      <!-- Order / Build Plan CTA Button -->
      <a href="<?php echo esc_url( $cta_url ); ?>" class="hidden sm:inline-flex items-center gap-1.5 py-2.5 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
        <span><?php echo esc_html( $cta_text ); ?></span>
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
    <div class="pt-4 border-t border-white/10 space-y-2.5">
      <?php if ( function_exists( 'wc_get_cart_url' ) ) : ?>
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="flex items-center justify-between py-2 px-1 text-white hover:text-greek-gold text-xs font-bold">
          <span>Shopping Cart</span>
          <span id="mobileCartCount" class="cart-count-badge bg-greek-gold text-[#101D3A] text-[10px] font-black rounded-full h-5 min-w-5 px-1.5 flex items-center justify-center font-mono">
            <?php echo ( function_exists( 'WC' ) && ! is_null( WC() ) && isset( WC()->cart ) && is_object( WC()->cart ) ) ? esc_html( WC()->cart->get_cart_contents_count() ) : '0'; ?>
          </span>
        </a>
      <?php endif; ?>
      <a href="<?php echo esc_url( $cta_url ); ?>" class="w-full inline-flex items-center justify-center gap-1.5 py-3 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
        <span>Build Weekly Plan (6+ Meals)</span>
      </a>
    </div>
  </div>
</header>
