<?php
/**
 * Greek Fit Kitchen Theme Functions & Elementor Integration
 *
 * @package GreekFitKitchen
 * @author Greek Fit Kitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Performance: Preconnect & Resource Hints
function gfk_resource_hints( $urls, $relation_type ) {
    if ( 'preconnect' === $relation_type ) {
        $urls[] = array(
            'href'        => 'https://fonts.googleapis.com',
            'crossorigin' => 'anonymous',
        );
        $urls[] = array(
            'href'        => 'https://fonts.gstatic.com',
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
    add_theme_support( 'custom-logo', array(
        'height'      => 48,
        'width'       => 200,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Elementor Support
    add_theme_support( 'elementor' );

    add_image_size( 'gfk-meal-thumb', 600, 450, true );
    add_image_size( 'gfk-slider-hero', 1600, 700, true );

    // Register Navigation Menus
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
}
add_action( 'after_setup_theme', 'gfk_setup_theme' );

// 3. Fallback Navigation Menus (When no menu is assigned in WP Admin)
function gfk_primary_menu_fallback() {
    $home = home_url( '/' );
    echo '<a href="' . esc_url( $home . '#featuredMeals' ) . '" class="hover:text-greek-gold transition-colors">Menu (20 Dishes)</a>';
    echo '<a href="' . esc_url( $home . '#mealPlans' ) . '" class="hover:text-greek-gold transition-colors">Meal Plans &amp; Savings</a>';
    echo '<a href="' . esc_url( $home . '#howItWorks' ) . '" class="hover:text-greek-gold transition-colors">How It Works</a>';
    echo '<a href="' . esc_url( $home . '#deliverySection' ) . '" class="hover:text-greek-gold transition-colors">Delivery Rates</a>';
    echo '<a href="' . esc_url( $home . '#cateringSection' ) . '" class="hover:text-greek-gold transition-colors">Catering</a>';
    echo '<a href="' . esc_url( $home . '#aboutSection' ) . '" class="hover:text-greek-gold transition-colors">About Us</a>';
}

function gfk_mobile_menu_fallback() {
    $home = home_url( '/' );
    echo '<a href="' . esc_url( $home . '#featuredMeals' ) . '" class="hover:text-greek-gold py-1">Menu (20 Dishes)</a>';
    echo '<a href="' . esc_url( $home . '#mealPlans' ) . '" class="hover:text-greek-gold py-1">Meal Plans &amp; Savings</a>';
    echo '<a href="' . esc_url( $home . '#howItWorks' ) . '" class="hover:text-greek-gold py-1">How It Works</a>';
    echo '<a href="' . esc_url( $home . '#deliverySection' ) . '" class="hover:text-greek-gold py-1">Delivery Rates</a>';
    echo '<a href="' . esc_url( $home . '#cateringSection' ) . '" class="hover:text-greek-gold py-1">Catering</a>';
    echo '<a href="' . esc_url( $home . '#aboutSection' ) . '" class="hover:text-greek-gold py-1">About Us</a>';
}

function gfk_footer_menu_fallback() {
    $home = home_url( '/' );
    echo '<ul class="space-y-2 text-slate-300">';
    echo '<li><a href="' . esc_url( $home . '#featuredMeals' ) . '" class="hover:text-white transition">Menu &amp; Dishes</a></li>';
    echo '<li><a href="' . esc_url( $home . '#mealPlans' ) . '" class="hover:text-white transition">Weekly Meal Plans</a></li>';
    echo '<li><a href="' . esc_url( $home . '#howItWorks' ) . '" class="hover:text-white transition">How Ordering Works</a></li>';
    echo '<li><a href="' . esc_url( $home . '#deliverySection' ) . '" class="hover:text-white transition">Distance Delivery Rates</a></li>';
    echo '<li><a href="' . esc_url( $home . '#cateringSection' ) . '" class="hover:text-white transition">Corporate &amp; Catering</a></li>';
    echo '<li><a href="' . esc_url( $home . '#aboutSection' ) . '" class="hover:text-white transition">About George the Greek</a></li>';
    echo '</ul>';
}

// 4. Enqueue Styles & High-Performance Scripts
function gfk_enqueue_scripts() {
    // Theme Master Stylesheet
    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '2.1.0' );

    // Custom CSS with mobile image height protections
    wp_enqueue_style( 'gfk-custom-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '2.1.0' );

    // Master App Engine Script (deferred)
    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '2.1.0', array(
        'in_footer' => true,
        'strategy'  => 'defer',
    ) );

    // Localize Data for E-Commerce & Calculations
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

// 5. Load Theme Includes: Data, Shortcodes, & Elementor Widgets
require_once get_template_directory() . '/inc/meals-data.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/elementor/class-gfk-elementor.php';

// 6. Register Custom Post Type for Meals (GFK Meals)
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

    // Category Taxonomy for Meals
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

// 7. REST API Endpoint for Orders & Batch Cutoffs
function gfk_register_rest_routes() {
    register_rest_route( 'gfk/v1', '/orders', array(
        'methods'             => 'GET',
        'callback'            => 'gfk_get_kitchen_orders_endpoint',
        'permission_callback' => '__return_true',
    ) );
}
add_action( 'rest_api_init', 'gfk_register_rest_routes' );

function gfk_get_kitchen_orders_endpoint() {
    return rest_ensure_response( array(
        'success'  => true,
        'message'  => 'Greek Fit Kitchen API Operational',
        'currency' => 'CAD',
        'cutoffs'  => array(
            'sunday'    => 'Order by Friday 12:00 PM',
            'wednesday' => 'Order by Monday 12:00 PM',
        ),
    ) );
}
