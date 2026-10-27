<?php
/**
 * 404 Template
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-3xl mx-auto px-4 py-24 text-center">
  <div class="glass-card p-12 rounded-3xl border border-slate-200 dark:border-slate-800">
    <span class="text-6xl font-black text-sky-500 block mb-4">404</span>
    <h1 class="text-3xl font-black uppercase text-slate-900 dark:text-white mb-2">Page Not Found</h1>
    <p class="text-xs text-slate-500 mb-6">The page or meal prep package you are looking for does not exist or has been moved.</p>
    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="px-6 py-3 bg-sky-600 text-white font-bold text-xs rounded-xl shadow-lg hover:bg-sky-500 transition">
      Return to Home
    </a>
  </div>
</main>

<?php get_footer(); ?>
