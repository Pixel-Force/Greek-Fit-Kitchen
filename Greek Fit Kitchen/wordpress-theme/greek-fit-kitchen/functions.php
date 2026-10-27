<?php
/**
 * Greek Fit Kitchen Theme Functions & Elementor Compatibility Engine
 *
 * @package GreekFitKitchen
 * @author Greek Fit Kitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 1. Performance: Preconnect & Resource Hints for Ultra-Fast Loading
function gfk_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href' => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $urls[] = array(
            'href' => 'https://fonts.gstatic.com',
            'crossorigin' => 'anonymous',
        );
    }
    return $urls;
}
add_filter( 'wp_resource_hints', 'gfk_resource_hints', 10, 2 );

// 2. Theme Setup & Elementor Support Declaration
function gfk_setup_theme() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

    // Elementor theme support
    add_theme_support( 'elementor' );
    add_post_type_support( 'page', 'elementor' );
    add_post_type_support( 'post', 'elementor' );
    add_post_type_support( 'gfk_meal', 'elementor' );

    add_image_size( 'gfk-meal-thumb', 600, 450, true );
    add_image_size( 'gfk-slider-hero', 1600, 700, true );

    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'greek-fit-kitchen' ),
        'footer'  => __( 'Footer Navigation', 'greek-fit-kitchen' ),
    ) );

    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // WooCommerce support declaration
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'gfk_setup_theme' );

// Load Native Elementor Widgets
if ( file_exists( get_template_directory() . '/inc/elementor-widgets.php' ) ) {
    require_once get_template_directory() . '/inc/elementor-widgets.php';
}

// 3. Register Elementor Theme Builder Locations (Header, Footer, Single, Archive)
function gfk_register_elementor_locations( $elementor_theme_manager ) {
    $elementor_theme_manager->register_all_core_location();
}
add_action( 'elementor/theme/register_locations', 'gfk_register_elementor_locations' );

// 4. Enqueue Styles & Deferred High-Performance Scripts
function gfk_enqueue_scripts() {
    // Compiled Fast-Loading Tailwind Stylesheet
    if ( file_exists( get_template_directory() . '/assets/css/tailwind.min.css' ) ) {
        wp_enqueue_style( 'gfk-tailwind', get_template_directory_uri() . '/assets/css/tailwind.min.css', array(), '2.5.0' );
    }

    // Main Stylesheet
    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '2.5.0' );

    // Core High-Speed Zero-Dependency App Script (loaded deferred)
    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '2.5.0', array(
        'in_footer' => true,
        'strategy'  => 'defer',
    ) );

    // Pass Configuration & Localization Data
    wp_localize_script( 'gfk-app', 'gfkConfig', array(
        'ajaxUrl'        => admin_url( 'admin-ajax.php' ),
        'themeUri'       => get_template_directory_uri(),
        'siteUrl'        => home_url( '/' ),
        'currency'       => 'CAD',
        'minMeals'       => 6,
        'starterPrice'   => 59.94,
        'volumeDiscount' => 0.10, // 10% on 7+ meals
        'baseDelivery'   => 5.99,
        'perKmDelivery'  => 0.99,
        'storeAddress'   => '3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5',
    ) );
}
add_action( 'wp_enqueue_scripts', 'gfk_enqueue_scripts' );

// 5. Register Custom Post Type for Meals (GFK Meals)
function gfk_register_meal_cpt() {
    $labels = array(
        'name'               => _x( 'Meals', 'post type general name', 'greek-fit-kitchen' ),
        'singular_name'      => _x( 'Meal', 'post type singular name', 'greek-fit-kitchen' ),
        'menu_name'          => _x( 'GFK Meals', 'admin menu', 'greek-fit-kitchen' ),
        'add_new'            => _x( 'Add New Meal', 'meal', 'greek-fit-kitchen' ),
        'add_new_item'       => __( 'Add New Meal', 'greek-fit-kitchen' ),
        'edit_item'          => __( 'Edit Meal', 'greek-fit-kitchen' ),
        'new_item'           => __( 'New Meal', 'greek-fit-kitchen' ),
        'view_item'          => __( 'View Meal', 'greek-fit-kitchen' ),
        'search_items'       => __( 'Search Meals', 'greek-fit-kitchen' ),
        'not_found'          => __( 'No meals found', 'greek-fit-kitchen' ),
        'not_found_in_trash' => __( 'No meals found in Trash', 'greek-fit-kitchen' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'meals' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-food',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'elementor' ),
    );

    register_post_type( 'gfk_meal', $args );

    register_taxonomy( 'meal_category', 'gfk_meal', array(
        'hierarchical' => true,
        'labels'       => array(
            'name'          => __( 'Meal Categories', 'greek-fit-kitchen' ),
            'singular_name' => __( 'Meal Category', 'greek-fit-kitchen' ),
        ),
        'show_ui'      => true,
        'show_in_rest' => true,
        'rewrite'      => array( 'slug' => 'meal-category' ),
    ) );
}
add_action( 'init', 'gfk_register_meal_cpt' );

// =========================================================================
// 6. MENU DATA & SHORTCODES ENGINE
// =========================================================================
if ( file_exists( get_template_directory() . '/inc/meals-data.php' ) ) {
    require_once get_template_directory() . '/inc/meals-data.php';
}

if ( file_exists( get_template_directory() . '/inc/shortcodes.php' ) ) {
    require_once get_template_directory() . '/inc/shortcodes.php';
}
