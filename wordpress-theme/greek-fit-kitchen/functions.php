<?php
/**
 * Greek Fit Kitchen Theme Functions & Definitions
 *
 * @package GreekFitKitchen
 * @author Penta Services
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

// 1. Theme Setup
function gfk_setup_theme() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );
    add_image_size( 'gfk-meal-thumb', 600, 450, true );
    add_image_size( 'gfk-slider-hero', 1600, 900, true );

    // Register navigation menus
    register_nav_menus( array(
        'primary' => __( 'Primary Navigation', 'greek-fit-kitchen' ),
        'footer'  => __( 'Footer Navigation', 'greek-fit-kitchen' ),
    ) );

    // Switch default core markup to output valid HTML5.
    add_theme_support( 'html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // WooCommerce support declaration
    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'gfk_setup_theme' );

// 2. Enqueue Scripts and Styles
function gfk_enqueue_scripts() {
    // Tailwind CDN (for high-speed zero-build preview)
    wp_enqueue_script( 'tailwind-cdn', 'https://cdn.tailwindcss.com', array(), null, false );

    // Main Theme Stylesheet
    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '1.0.0' );

    // App Script
    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '1.0.0', true );

    // Localize Data for AJAX & REST API
    wp_localize_script( 'gfk-app', 'gfkData', array(
        'ajaxUrl'        => admin_url( 'admin-ajax.php' ),
        'restUrl'        => esc_url_raw( rest_url( 'gfk/v1' ) ),
        'nonce'          => wp_create_nonce( 'wp_rest' ),
        'themeUri'       => get_template_directory_uri(),
        'minMeals'       => 6,
        'packagePrice'   => 59.94,
        'volumeDiscount' => 0.10, // 10% for 7+
        'currency'       => 'CAD',
        'rates'          => array(
            'tier1Km'  => 2,
            'tier1Fee' => 0, // Free up to 2 km
            'tier2Km'  => 5,
            'tier2Fee' => 5.00, // $5 for 2 - 5 km
            'tier3PerKm' => 1.00 // $1 per km over 5 km
        ),
        'schedule'       => array(
            'sunday'    => 'Order by Friday 12:00 PM',
            'wednesday' => 'Order by Monday 12:00 PM',
        ),
        'pickupAddress'  => 'George the Greek, 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5'
    ) );
}
add_action( 'wp_enqueue_scripts', 'gfk_enqueue_scripts' );

// 3. Register Custom Post Type for Meals (GFK Meals)
function gfk_register_meal_cpt() {
    $labels = array(
        'name'               => _x( 'Meals', 'post type general name', 'greek-fit-kitchen' ),
        'singular_name'      => _x( 'Meal', 'post type singular name', 'greek-fit-kitchen' ),
        'menu_name'          => _x( 'GFK Meals', 'admin menu', 'greek-fit-kitchen' ),
        'add_new'            => _x( 'Add New Meal', 'meal', 'greek-fit-kitchen' ),
        'add_new_item'       => __( 'Add New Meal', 'greek-fit-kitchen' ),
        'edit_item'          => __( 'Edit Meal', 'greek-fit-kitchen' ),
        'all_items'          => __( 'All Meals', 'greek-fit-kitchen' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'meals' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-food',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'gfk_meal', $args );

    // Category Taxonomy
    register_taxonomy( 'meal_category', 'gfk_meal', array(
        'hierarchical' => true,
        'labels' => array(
            'name' => __( 'Meal Categories', 'greek-fit-kitchen' ),
            'singular_name' => __( 'Meal Category', 'greek-fit-kitchen' ),
        ),
        'show_ui' => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'meal-category' ),
    ) );
}
add_action( 'init', 'gfk_register_meal_cpt' );

// 4. Custom REST API Routes for Meals & Kitchen Orders
add_action( 'rest_api_init', function () {
    register_rest_route( 'gfk/v1', '/meals', array(
        'methods'  => 'GET',
        'callback' => 'gfk_rest_get_meals',
        'permission_callback' => '__return_true',
    ) );

    register_rest_route( 'gfk/v1', '/calculate-delivery', array(
        'methods'  => 'POST',
        'callback' => 'gfk_rest_calculate_delivery',
        'permission_callback' => '__return_true',
    ) );
} );

function gfk_rest_get_meals() {
    $meals = array();
    $query = new WP_Query( array(
        'post_type'      => 'gfk_meal',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
    ) );

    if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
            $query->the_post();
            $id = get_the_ID();
            $meals[] = array(
                'id'          => get_post_field( 'post_name', $id ),
                'name'        => get_the_title(),
                'price'       => (float) get_post_meta( $id, '_gfk_price', true ) ?: 12.99,
                'calories'    => get_post_meta( $id, '_gfk_calories', true ) ?: 450,
                'protein'     => get_post_meta( $id, '_gfk_protein', true ) ?: '45g',
                'hasSides'    => get_post_meta( $id, '_gfk_has_sides', true ) !== 'no',
                'description' => get_the_excerpt(),
                'image'       => get_the_post_thumbnail_url( $id, 'gfk-meal-thumb' ) ?: '',
            );
        }
        wp_reset_postdata();
    }
    return rest_ensure_response( $meals );
}

function gfk_rest_calculate_delivery( $request ) {
    $params = $request->get_json_params();
    $km = isset( $params['distanceKm'] ) ? floatval( $params['distanceKm'] ) : 0;
    $method = isset( $params['method'] ) ? sanitize_text_field( $params['method'] ) : 'delivery';

    if ( $method === 'pickup' ) {
        return rest_ensure_response( array( 'fee' => 0, 'zone' => 'Pickup (Free)' ) );
    }

    if ( $km <= 2.0 ) {
        $fee = 0;
        $zone = 'Under 2 km (Free Zone)';
    } elseif ( $km <= 5.0 ) {
        $fee = 5.00;
        $zone = 'Standard Local Zone ($5.00)';
    } else {
        $fee = $km * 1.00;
        $zone = 'Extended Zone ($1.00/km)';
    }

    return rest_ensure_response( array(
        'distanceKm' => $km,
        'fee'        => $fee,
        'zone'       => $zone,
        'currency'   => 'CAD'
    ) );
}

// 5. Volume Discount Hook (10% off for 7+ meals) for WooCommerce
add_action( 'woocommerce_cart_calculate_fees', 'gfk_apply_volume_discount', 20, 1 );
function gfk_apply_volume_discount( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) return;

    $item_count = $cart->get_cart_contents_count();
    if ( $item_count >= 7 ) {
        $subtotal = $cart->get_subtotal();
        $discount = $subtotal * 0.10; // 10% OFF
        $cart->add_fee( __( '10% Volume Discount (7+ Meals)', 'greek-fit-kitchen' ), -$discount, true );
    }
}

// 6. Minimum 6 Meals Checkout Validation for WooCommerce
add_action( 'woocommerce_check_cart_items', 'gfk_validate_minimum_order_count' );
function gfk_validate_minimum_order_count() {
    if ( ! is_cart() && ! is_checkout() ) return;
    $item_count = WC()->cart->get_cart_contents_count();
    if ( $item_count > 0 && $item_count < 6 ) {
        wc_add_notice( sprintf(
            __( 'A minimum order of <strong>6 meals</strong> is required to proceed with Greek Fit Kitchen meal prep. You currently have %d meals in your cart.', 'greek-fit-kitchen' ),
            $item_count
        ), 'error' );
    }
}
