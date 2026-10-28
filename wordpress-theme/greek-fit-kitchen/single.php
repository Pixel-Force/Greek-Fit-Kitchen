<?php
/**
 * Single Meal or Post Template
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16 flex-1">
  <?php while ( have_posts() ) : the_post(); ?>
    <article class="bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm">
      <?php if ( has_post_thumbnail() ) : ?>
        <div class="rounded-2xl overflow-hidden mb-8 aspect-video">
          <?php the_post_thumbnail( 'large', array( 'class' => 'w-full h-full object-cover' ) ); ?>
        </div>
      <?php endif; ?>

      <h1 class="text-3xl sm:text-4xl font-black text-[#101D3A] uppercase mb-4">
        <?php the_title(); ?>
      </h1>
      
      <div class="prose max-w-none text-sm text-slate-700 leading-relaxed mb-8">
        <?php the_content(); ?>
      </div>

      <a href="<?php echo esc_url( home_url( '/#featuredMeals' ) ); ?>" class="inline-flex items-center gap-2 px-6 py-3 bg-[#101D3A] text-white hover:bg-greek-gold hover:text-[#101D3A] rounded-xl text-xs font-black transition shadow">
        &larr; Back to Meal Catalog
      </a>
    </article>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
