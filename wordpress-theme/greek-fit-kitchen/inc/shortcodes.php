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
    if ( class_exists( 'GFK_Widget_Hero_Slider' ) ) {
        $widget = new \GFK_Widget_Hero_Slider();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 2. Menu Grid (20 Dishes) Shortcode
add_shortcode( 'gfk_menu_grid', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_Menu_Grid' ) ) {
        $widget = new \GFK_Widget_Menu_Grid();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 3. Meal Plans & Savings Shortcode
add_shortcode( 'gfk_meal_plans', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_Meal_Plans' ) ) {
        $widget = new \GFK_Widget_Meal_Plans();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 4. How It Works Shortcode
add_shortcode( 'gfk_how_it_works', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_How_It_Works' ) ) {
        $widget = new \GFK_Widget_How_It_Works();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 5. Sides Showcase Shortcode
add_shortcode( 'gfk_sides_showcase', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_Sides_Showcase' ) ) {
        $widget = new \GFK_Widget_Sides_Showcase();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 6. Delivery Rates & Calculator Shortcode
add_shortcode( 'gfk_delivery_calculator', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_Delivery_Calculator' ) ) {
        $widget = new \GFK_Widget_Delivery_Calculator();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 7. Catering & Events Banner Shortcode
add_shortcode( 'gfk_catering_banner', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_Catering_Banner' ) ) {
        $widget = new \GFK_Widget_Catering_Banner();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );

// 8. About Story Shortcode
add_shortcode( 'gfk_about_story', function( $atts ) {
    ob_start();
    if ( class_exists( 'GFK_Widget_About_Story' ) ) {
        $widget = new \GFK_Widget_About_Story();
        $widget->render_plain_content();
    }
    return ob_get_clean();
} );
