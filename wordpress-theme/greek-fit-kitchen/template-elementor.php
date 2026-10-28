<?php
/**
 * Template Name: Elementor Full Width (Header & Footer)
 * Description: Page template providing a 100% full-width canvas for Elementor while retaining the generic header and footer.
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 w-full overflow-hidden bg-white">
  <?php
  while ( have_posts() ) :
      the_post();
      the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
