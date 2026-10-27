<?php
/**
 * Main Template File (Fallback)
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <div class="mb-10 text-center">
    <h1 class="text-3xl sm:text-4xl font-black uppercase text-slate-900 dark:text-white">
      <?php single_post_title(); ?>
    </h1>
  </div>

  <div class="space-y-8 max-w-4xl mx-auto">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class( 'glass-card p-6 rounded-2xl border border-slate-200 dark:border-slate-800' ); ?>>
        <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">
          <a href="<?php the_permalink(); ?>" class="hover:text-sky-500 transition"><?php the_title(); ?></a>
        </h2>
        <div class="text-xs text-slate-400 mb-4"><?php echo get_the_date(); ?></div>
        <div class="text-sm text-slate-600 dark:text-slate-300 leading-relaxed"><?php the_excerpt(); ?></div>
      </article>
    <?php endwhile; endif; ?>
  </div>
</main>

<?php get_footer(); ?>
