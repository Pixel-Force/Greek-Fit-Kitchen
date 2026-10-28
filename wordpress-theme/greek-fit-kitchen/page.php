<?php
/**
 * Generic Page Template
 * Seamlessly handles both standard WordPress pages and Elementor designed pages
 *
 * @package GreekFitKitchen
 */

get_header(); ?>

<main id="primary" class="site-main flex-1 bg-white">
  <?php
  while ( have_posts() ) :
      the_post();

      // Check if the page is designed using Elementor
      $is_elementor = false;
      $page_id = get_the_ID();
      if ( $page_id && did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) && isset( \Elementor\Plugin::$instance->documents ) ) {
          $document = \Elementor\Plugin::$instance->documents->get( $page_id );
          if ( $document && method_exists( $document, 'is_built_with_elementor' ) ) {
              $is_elementor = $document->is_built_with_elementor();
          }
      }

      if ( $is_elementor ) :
          // Elementor Full Width Container
          the_content();
      else :
          // Standard WordPress Page Container
          ?>
          <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14 sm:py-16">
            <article id="page-<?php the_ID(); ?>" <?php post_class( 'bg-white p-8 sm:p-12 rounded-3xl border border-slate-200 shadow-sm' ); ?>>
              <header class="mb-8 border-b border-slate-100 pb-6">
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A]">
                  <?php the_title(); ?>
                </h1>
              </header>
              <div class="prose max-w-none text-sm text-slate-700 leading-relaxed space-y-4">
                <?php the_content(); ?>
              </div>
            </article>
          </div>
          <?php
      endif;

  endwhile;
  ?>
</main>

<?php get_footer(); ?>
