<?php
/**
 * Template Name: Elementor Full Width (Greek Fit Kitchen)
 * Template Post Type: page, post, gfk_meal
 * Description: A full-width template designed specifically for seamless editing with Elementor.
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main w-full min-h-screen">
  <?php
  while ( have_posts() ) :
      the_post();
      the_content();
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
