<?php
/**
 * Greek Fit Kitchen Theme Shortcodes
 * Enables placing any section into Elementor, Gutenberg, or standard pages via shortcodes
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once __DIR__ . '/meals-data.php';

// 1. Hero Slider Shortcode
add_shortcode( 'gfk_hero_slider', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-hero-slider' );
    return ob_get_clean();
} );

// 2. Menu Grid (20 Dishes) Shortcode
add_shortcode( 'gfk_menu_grid', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-menu-grid' );
    return ob_get_clean();
} );

// 3. Meal Plans & Savings Shortcode
add_shortcode( 'gfk_meal_plans', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-meal-plans' );
    return ob_get_clean();
} );

// 4. How It Works Shortcode
add_shortcode( 'gfk_how_it_works', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-how-it-works' );
    return ob_get_clean();
} );

// 5. Sides Showcase Shortcode
add_shortcode( 'gfk_sides_showcase', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-sides-showcase' );
    return ob_get_clean();
} );

// 6. Delivery Rates & Calculator Shortcode
add_shortcode( 'gfk_delivery_calculator', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-delivery-calculator' );
    return ob_get_clean();
} );

// 7. Catering & Events Banner Shortcode
add_shortcode( 'gfk_catering_banner', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-catering-banner' );
    return ob_get_clean();
} );

// 8. About Story Shortcode
add_shortcode( 'gfk_about_story', function( $atts ) {
    ob_start();
    get_template_part( 'template-parts/section-about-story' );
    return ob_get_clean();
} );
