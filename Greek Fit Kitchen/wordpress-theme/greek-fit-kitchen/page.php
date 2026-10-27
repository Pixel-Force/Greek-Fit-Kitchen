<?php
/**
 * Single Page Template
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <?php while ( have_posts() ) : the_post(); ?>
    <article id="page-<?php the_ID(); ?>" class="glass-card p-8 sm:p-12 rounded-3xl border border-slate-200 dark:border-slate-800">
      <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white uppercase mb-6">
        <?php the_title(); ?>
      </h1>
      <div class="prose dark:prose-invert max-w-none text-sm text-slate-700 dark:text-slate-300 leading-relaxed">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
