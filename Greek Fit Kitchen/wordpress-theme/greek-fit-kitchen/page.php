<?php
/**
 * Single Page Template with Elementor Compatibility
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

      if ( is_front_page() && ( $is_empty || $has_gfk_home ) && ! $is_preview ) {
          // Front page default rendering
          echo gfk_render_home();
          ?>
          <div class="elementor-content-hook hidden" style="display:none;">
            <?php the_content(); ?>
          </div>
          <?php
      } else {
          $is_elementor = false;
          if ( class_exists( '\Elementor\Plugin' ) ) {
              $is_elementor = \Elementor\Plugin::$instance->db->is_built_with_elementor( get_the_ID() ) || $is_preview;
          }

          if ( $is_elementor ) {
              // Full-width canvas for Elementor page builder
              the_content();
          } else {
              // Standard styling for default WordPress pages
              ?>
              <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
                <article id="page-<?php the_ID(); ?>" class="bg-white dark:bg-[#0E223D] p-8 sm:p-12 rounded-3xl border border-slate-200 dark:border-white/10 shadow-sm">
                  <h1 class="text-3xl sm:text-4xl font-black text-greek-navy dark:text-white uppercase mb-6">
                    <?php the_title(); ?>
                  </h1>
                  <div class="text-sm text-slate-700 dark:text-slate-300 leading-relaxed space-y-4">
                    <?php the_content(); ?>
                  </div>
                </article>
              </div>
              <?php
          }
      }
  endwhile;
  ?>
</main>

<?php get_footer(); ?>
