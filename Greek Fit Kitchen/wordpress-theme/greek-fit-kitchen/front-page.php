<?php
/**
 * Front Page Template for Greek Fit Kitchen WordPress Theme
 * Ultra-Fast Server-Side Rendered & 100% Elementor Compatible
 *
 * Section Order:
 * 1. Hero slider (Three slides: signature meals, 10% savings, six-meal packages)
 * 2. Featured meals (20 dishes, CAD prices, side-selection options, Add to Cart)
 * 3. Meal plans and savings (6-meal starter from $59.94 CAD, 10% volume discount)
 * 4. How ordering works (Choose meals, select delivery day, pay securely, receive scheduled delivery)
 * 5. Distance Delivery Fee Calculator ($5.99 + $0.99/km)
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main w-full">
  <?php
  while ( have_posts() ) :
      the_post();

      $content    = get_the_content();
      $is_preview = false;
      if ( class_exists( '\Elementor\Plugin' ) ) {
          $is_preview = \Elementor\Plugin::$instance->preview->is_preview_mode() || isset( $_GET['elementor-preview'] );
      }

      $has_gfk_home = ( strpos( $content, '[gfk_home]' ) !== false );
      $clean_text   = trim( strip_tags( $content ) );
      $is_empty     = empty( $clean_text ) || $clean_text === '[gfk_home]';

      if ( $is_preview ) {
          // Inside Elementor Visual Live Editor
          the_content();
      } elseif ( ! $is_empty && ! $has_gfk_home ) {
          // User created custom content in Elementor
          the_content();
      } else {
          // Full complete Greek Fit Kitchen layout (Default & [gfk_home])
          echo gfk_render_home();
          ?>
          <!-- Core hook required by Elementor to verify content area -->
          <div class="elementor-content-hook hidden" style="display:none;">
            <?php the_content(); ?>
          </div>
          <?php
      }

  endwhile;
  ?>
</main>

<?php get_footer(); ?>
