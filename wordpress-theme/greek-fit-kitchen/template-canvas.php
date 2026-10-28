<?php
/**
 * Template Name: Elementor Canvas (No Header & Footer)
 * Description: Completely blank canvas template for custom landing pages.
 *
 * @package GreekFitKitchen
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-[#FAF9F5] text-slate-800 antialiased min-h-screen' ); ?>>
<?php wp_body_open(); ?>

<main id="primary" class="site-main w-full min-h-screen">
  <?php
  while ( have_posts() ) :
      the_post();
      the_content();
  endwhile;
  ?>
</main>

<?php get_template_part( 'template-parts/modals' ); ?>
<?php wp_footer(); ?>
</body>
</html>
