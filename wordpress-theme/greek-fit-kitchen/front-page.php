<?php
/**
 * Front Page Template for Greek Fit Kitchen WordPress Theme
 *
 * Full Elementor compatibility:
 * - If page has been edited with Elementor: renders Elementor visual content.
 * - If default theme: renders the 8 production sections cleanly between generic header and footer.
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main flex-1">
  <?php
  // Check if page is customized using Elementor
  $is_elementor = false;
  $page_id = get_the_ID();
  if ( $page_id && did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) && isset( \Elementor\Plugin::$instance->documents ) ) {
      $document = \Elementor\Plugin::$instance->documents->get( $page_id );
      if ( $document && method_exists( $document, 'is_built_with_elementor' ) ) {
          $is_elementor = $document->is_built_with_elementor();
      }
  }

  if ( $is_elementor ) :
      // When page is customized in Elementor, render Elementor output
      while ( have_posts() ) :
          the_post();
          the_content();
      endwhile;
  else :
      // Default production modular sections
      get_template_part( 'template-parts/section-hero-slider' );
      get_template_part( 'template-parts/section-menu-grid' );
      get_template_part( 'template-parts/section-how-it-works' );
      get_template_part( 'template-parts/section-meal-plans' );
      get_template_part( 'template-parts/section-sides-showcase' );
      get_template_part( 'template-parts/section-delivery-calculator' );
      get_template_part( 'template-parts/section-catering-banner' );
      get_template_part( 'template-parts/section-about-story' );
  endif;
  ?>
</main>

<?php get_footer(); ?>
