<?php
/**
 * Greek Fit Kitchen Theme Functions & Performance Optimizations
 *
 * @package GreekFitKitchen
 * @author Penta Services
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

// 2. Theme Setup
function gfk_setup_theme() {
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'responsive-embeds' );
    add_theme_support( 'align-wide' );

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

// 3. Enqueue Styles & Deferred High-Performance Scripts
function gfk_enqueue_scripts() {
    // Main Stylesheet
    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '2.0.0' );

    // Core High-Speed Zero-Dependency App Script (loaded deferred)
    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '2.0.0', array(
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

// 4. Register Custom Post Type for Meals (GFK Meals)
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
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
    );

    register_post_type( 'gfk_meal', $args );

    // Register Category Taxonomy for Meals
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

// 5. REST API Endpoint for Instant Kitchen Order Retrieval
function gfk_register_rest_routes() {
    register_rest_route( 'gfk/v1', '/orders', array(
        'methods'  => 'GET',
        'callback' => 'gfk_get_kitchen_orders_endpoint',
        'permission_callback' => '__return_true',
    ) );
}
add_action( 'rest_api_init', 'gfk_register_rest_routes' );

function gfk_get_kitchen_orders_endpoint() {
    return rest_ensure_response( array(
        'success' => true,
        'message' => 'Greek Fit Kitchen API Operational',
        'currency' => 'CAD',
        'cutoffs' => array(
            'sunday'    => 'Order by Friday 12:00 PM',
            'wednesday' => 'Order by Monday 12:00 PM'
        )
    ) );
}
