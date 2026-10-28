<?php
/**
 * 404 Template
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-3xl mx-auto px-4 py-24 text-center">
  <div class="bg-white p-12 rounded-3xl border border-slate-200 shadow-sm">
    <span class="text-6xl font-black text-greek-gold block mb-4">404</span>
    <h1 class="text-3xl font-black uppercase text-[#101D3A] mb-2">Page Not Found</h1>
    <p class="text-xs text-slate-500 mb-6">The page or meal prep package you are looking for does not exist or has been moved.</p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-6 py-3.5 bg-greek-gold text-[#101D3A] font-black text-xs rounded-xl shadow-lg hover:bg-greek-goldHover transition inline-block">
      Return to Home
    </a>
  </div>
</main>

<?php get_footer(); ?>
