<?php
/**
 * Generic Footer Template for Greek Fit Kitchen WordPress Theme
 * Modular, standalone footer included across all templates and Elementor pages
 *
 * @package GreekFitKitchen
 */

// Render Global Footer (Editable with Elementor, Customizer, or Modular Template)
gfk_render_footer();
?>

  <!-- Modals & Drawers Container (Sides Selection, Cart Drawer, Catering Inquiry) -->
  <?php get_template_part( 'template-parts/modals' ); ?>

  <?php wp_footer(); ?>
</body>
</html>
