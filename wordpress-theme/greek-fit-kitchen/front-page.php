<?php
/**
 * Front Page Template for Greek Fit Kitchen WordPress Theme
 *
 * Full Elementor compatibility:
 * - If page has been edited with Elementor or is in Elementor Editor/Preview: renders Elementor visual content.
 * - If default theme: renders the 8 production sections cleanly between generic header and footer.
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 bg-white dark:bg-[#0C172E]">
  <?php
  // 1. Check if inside Elementor editor or preview
  $in_elementor_editor = false;
  if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
      if ( ( isset( \Elementor\Plugin::$instance->editor ) && \Elementor\Plugin::$instance->editor->is_edit_mode() ) ||
           ( isset( \Elementor\Plugin::$instance->preview ) && \Elementor\Plugin::$instance->preview->is_preview_mode() ) ) {
          $in_elementor_editor = true;
      }
  }

  // 2. Check if page is customized using Elementor and has actual element data
  $is_elementor = false;
  $page_id = get_the_ID();
  if ( $page_id && did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) && isset( \Elementor\Plugin::$instance->documents ) ) {
      $document = \Elementor\Plugin::$instance->documents->get( $page_id );
      if ( $document && method_exists( $document, 'is_built_with_elementor' ) && $document->is_built_with_elementor() ) {
          $is_elementor = true;
      }
  }

  if ( $in_elementor_editor || $is_elementor ) :
      // When page is customized in Elementor or being edited, render Elementor output
      while ( have_posts() ) :
          the_post();
          the_content();
      endwhile;
  else :
      // Default production modular sections: About Story right after Hero Slider
      get_template_part( 'template-parts/section-hero-slider' );
      get_template_part( 'template-parts/section-about-story' );
      get_template_part( 'template-parts/section-menu-grid' );
      get_template_part( 'template-parts/section-how-it-works' );
      get_template_part( 'template-parts/section-meal-plans' );
      get_template_part( 'template-parts/section-sides-showcase' );
      get_template_part( 'template-parts/section-delivery-calculator' );
      get_template_part( 'template-parts/section-catering-banner' );
  endif;
  ?>
</main>

<?php get_footer(); ?>
