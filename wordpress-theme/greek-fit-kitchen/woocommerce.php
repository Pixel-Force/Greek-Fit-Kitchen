<?php
/**
 * WooCommerce Base Template
 *
 * Wraps WooCommerce product listings, categories, and single products
 * inside the Greek Fit Kitchen full-width header and responsive layout.
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 bg-white">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <?php
    if ( function_exists( 'woocommerce_content' ) ) {
        woocommerce_content();
    } else {
        while ( have_posts() ) :
            the_post();
            the_content();
        endwhile;
    }
    ?>
  </div>
</main>

<?php get_footer(); ?>
