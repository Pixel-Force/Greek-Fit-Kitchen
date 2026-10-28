<?php
/**
 * Header template for Greek Fit Kitchen WordPress Theme
 * Full-width end-to-end responsive header
 *
 * @package GreekFitKitchen
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="scroll-smooth">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      darkMode: 'class',
      theme: {
        extend: {
          colors: {
            greek: {
              navy: '#101D3A',
              navyDark: '#0C172E',
              gold: '#F5C542',
              goldHover: '#E5B432',
              lime: '#82B82A'
            }
          }
        }
      }
    };
  </script>
  <?php wp_head(); ?>
</head>
<body <?php body_class( 'bg-white text-slate-800 antialiased flex flex-col min-h-screen selection:bg-greek-gold selection:text-greek-navy' ); ?>>
<?php wp_body_open(); ?>

<?php get_template_part( 'template-parts/header/site-header' ); ?>
