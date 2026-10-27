<?php
/**
 * Single Meal or Post Template
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
  <?php while ( have_posts() ) : the_post(); ?>
    <article class="glass-card p-8 sm:p-12 rounded-3xl border border-slate-200 dark:border-slate-800">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="rounded-2xl overflow-hidden mb-8 aspect-video">
          <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
        </div>
      <?php endif; ?>

      <h1 class="text-3xl sm:text-4xl font-black text-slate-900 dark:text-white uppercase mb-4">
        <?php the_title(); ?>
      </h1>
      
      <div class="prose dark:prose-invert max-w-none text-sm text-slate-700 dark:text-slate-300 leading-relaxed mb-8">
        <?php the_content(); ?>
      </div>

      <a href="<?php echo esc_url( home_url( '/#menuSection' ) ); ?>" class="px-6 py-3 bg-sky-600 text-white rounded-xl text-xs font-bold hover:bg-sky-500 transition">
        ← Back to Meal Catalog
      </a>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
