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
    $menu_url     = home_url( '/menu/' );
    $plans_url    = home_url( '/meal-plans/' );
    $how_url      = home_url( '/how-it-works/' );
    $delivery_url = home_url( '/delivery-rates/' );
    $about_url    = home_url( '/about-us/' );

    echo '<a href="' . esc_url( $menu_url ) . '" class="hover:text-greek-gold transition-colors">Menu</a>';
    echo '<a href="' . esc_url( $plans_url ) . '" class="hover:text-greek-gold transition-colors">Meal Plans</a>';
    echo '<a href="' . esc_url( $how_url ) . '" class="hover:text-greek-gold transition-colors">How it Works</a>';
    echo '<a href="' . esc_url( $delivery_url ) . '" class="hover:text-greek-gold transition-colors">Delivery Rates</a>';
    echo '<a href="' . esc_url( $about_url ) . '" class="hover:text-greek-gold transition-colors">About Us</a>';
}

function gfk_mobile_menu_fallback() {
    $menu_url     = home_url( '/menu/' );
    $plans_url    = home_url( '/meal-plans/' );
    $how_url      = home_url( '/how-it-works/' );
    $delivery_url = home_url( '/delivery-rates/' );
    $about_url    = home_url( '/about-us/' );

    echo '<a href="' . esc_url( $menu_url ) . '" class="hover:text-greek-gold py-1">Menu</a>';
    echo '<a href="' . esc_url( $plans_url ) . '" class="hover:text-greek-gold py-1">Meal Plans</a>';
    echo '<a href="' . esc_url( $how_url ) . '" class="hover:text-greek-gold py-1">How it Works</a>';
    echo '<a href="' . esc_url( $delivery_url ) . '" class="hover:text-greek-gold py-1">Delivery Rates</a>';
    echo '<a href="' . esc_url( $about_url ) . '" class="hover:text-greek-gold py-1">About Us</a>';
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
    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '2.4.0' );

    // Custom CSS with mobile image height protections
    wp_enqueue_style( 'gfk-custom-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '2.4.0' );

    // Master App Engine Script (deferred)
    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '2.4.0', array(
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
        'wcActive'       => class_exists( 'WooCommerce' ),
        'wcCartUrl'      => function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : home_url( '/cart/' ),
        'wcCheckoutUrl'  => function_exists( 'wc_get_checkout_url' ) ? wc_get_checkout_url() : home_url( '/checkout/' ),
        'wcNonce'        => wp_create_nonce( 'gfk_wc_nonce' ),
        'orderNonce'     => wp_create_nonce( 'gfk_order_nonce' ),
    ) );
}
add_action( 'wp_enqueue_scripts', 'gfk_enqueue_scripts' );

// 5. Load Theme Includes: Data, Shortcodes, CPT, & Elementor Widgets
require_once get_template_directory() . '/inc/meals-data.php';
require_once get_template_directory() . '/inc/meals-cpt.php';
require_once get_template_directory() . '/inc/shortcodes.php';
require_once get_template_directory() . '/inc/elementor/class-gfk-elementor.php';
require_once get_template_directory() . '/inc/woocommerce.php';
require_once get_template_directory() . '/inc/order-email.php';



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

// 8. Auto-populate Elementor Builder Data for Subpages & Global Header/Footer
function gfk_auto_setup_elementor_pages() {
    if ( get_option( 'gfk_elementor_pages_initialized_v8' ) ) {
        return;
    }

    $pages_config = array(
        'global-header' => array(
            'title'    => 'Global Header',
            'widget'   => 'gfk_site_header',
            'settings' => array(
                'show_announcement' => 'yes',
                'batch_cutoff_text' => 'Sundays & Wednesdays',
                'pickup_info_text'  => 'Free Kitchen Pickup: George the Greek (3575 Lake Shore Blvd W, Etobicoke, ON)',
                'cta_button_text'   => 'Build Your Plan',
                'cta_button_url'    => home_url( '/meal-plans/' ),
                'show_cart_icon'    => 'yes',
            ),
        ),
        'global-footer' => array(
            'title'    => 'Global Footer',
            'widget'   => 'gfk_site_footer',
            'settings' => array(
                'tagline_title'       => 'BIG GREEK FLAVOUR. ZERO MEAL PREP.',
                'tagline_description' => 'Chef-crafted authentic Greek meal preparation delivered directly to your home or office in Toronto & the GTA.',
                'kitchen_title'       => 'George the Greek',
                'kitchen_address'     => "3575 Lake Shore Blvd W\nEtobicoke, ON M8W 1P5\nGreater Toronto Area",
            ),
        ),
        'menu' => array(
            'title'    => 'Menu',
            'widget'   => 'gfk_menu_grid',
            'settings' => array(
                'badge'           => 'APPROVED FLYER SELECTION',
                'title'           => 'Our Main Dishes (20 Options)',
                'subtitle'        => 'All prices in Canadian Dollars (CAD). Tax and delivery calculated at checkout.',
                'show_search'     => 'yes',
                'show_categories' => 'yes',
            ),
        ),
        'meal-plans' => array(
            'title'    => 'Meal Plans',
            'widget'   => 'gfk_meal_plans',
            'settings' => array(
                'display_style' => 'builder',
                'badge'         => 'Interactive Plan Builder',
                'title'         => 'CUSTOMIZE YOUR WEEKLY MEAL PLAN',
                'subtitle'      => 'Select at least 6 meals to meet our minimum order requirement. When you select 7 or more meals, a 10% volume discount is automatically applied to your entire food order.',
                'starter_title' => "Chef's 6-Meal Starter Package",
                'starter_desc'  => '6 diverse plates (Pork souvlaki, chicken leg, chicken souvlaki, grilled chicken, veggie souvlaki and pasta al greco).',
                'starter_price' => '59.94',
                'min_meals'     => 6,
                'discount_text' => 'Save 10% automatically on 7+ meals',
            ),
        ),
        'how-it-works' => array(
            'title'    => 'How it Works',
            'widget'   => 'gfk_how_it_works',
            'settings' => array(
                'badge'    => 'EFFORTLESS MEAL PREP',
                'title'    => 'How Greek Fit Kitchen Works',
                'subtitle' => 'Fresh, healthy, high-protein meals cooked in small batches and delivered across Toronto and the GTA.',
            ),
        ),
        'delivery-rates' => array(
            'title'    => 'Delivery Rates',
            'widget'   => 'gfk_delivery_calculator',
            'settings' => array(
                'badge'    => 'SCHEDULED BATCH DISPATCH',
                'title'    => 'Delivery Schedule & Rates',
                'subtitle' => 'Calculate your delivery fee from our Etobicoke commercial kitchen.',
            ),
        ),
        'about-us' => array(
            'title'    => 'About Us',
            'widget'   => 'gfk_about_story',
            'settings' => array(
                'badge' => 'ABOUT GREEK FIT KITCHEN',
                'title' => 'Big Greek Flavour Meets Modern Meal Prep',
            ),
        ),
    );

    foreach ( $pages_config as $slug => $cfg ) {
        $page = get_page_by_path( $slug );
        if ( ! $page ) {
            $page_id = wp_insert_post( array(
                'post_title'    => $cfg['title'],
                'post_name'     => $slug,
                'post_status'   => 'publish',
                'post_type'     => 'page',
                'page_template' => 'template-elementor.php',
            ) );
            if ( ! is_wp_error( $page_id ) ) {
                $page = get_post( $page_id );
            }
        }

        if ( ! $page ) {
            continue;
        }

        $elementor_data = array(
            array(
                'id'       => substr( md5( $slug . '_sec' ), 0, 7 ),
                'elType'   => 'section',
                'isInner'  => false,
                'settings' => (object) array(),
                'elements' => array(
                    array(
                        'id'       => substr( md5( $slug . '_col' ), 0, 7 ),
                        'elType'   => 'column',
                        'isInner'  => false,
                        'settings' => array(
                            '_column_size' => 100,
                        ),
                        'elements' => array(
                            array(
                                'id'         => substr( md5( $slug . '_wid' ), 0, 7 ),
                                'elType'     => 'widget',
                                'isInner'    => false,
                                'widgetType' => $cfg['widget'],
                                'settings'   => $cfg['settings'],
                            ),
                        ),
                    ),
                ),
            ),
        );

        if ( 'menu' === $slug ) {
            $elementor_data[] = array(
                'id'       => substr( md5( $slug . '_sides_sec' ), 0, 7 ),
                'elType'   => 'section',
                'isInner'  => false,
                'settings' => (object) array(),
                'elements' => array(
                    array(
                        'id'       => substr( md5( $slug . '_sides_col' ), 0, 7 ),
                        'elType'   => 'column',
                        'isInner'  => false,
                        'settings' => array(
                            '_column_size' => 100,
                        ),
                        'elements' => array(
                            array(
                                'id'         => substr( md5( $slug . '_sides_wid' ), 0, 7 ),
                                'elType'     => 'widget',
                                'isInner'    => false,
                                'widgetType' => 'gfk_sides_showcase',
                                'settings'   => array(
                                    'badge' => 'COMPLEMENTARY SIDES',
                                    'title' => 'Greek Sides, Rice & Roasted Potatoes',
                                ),
                            ),
                        ),
                    ),
                ),
            );
        }

        $json_data = wp_json_encode( $elementor_data );
        update_post_meta( $page->ID, '_elementor_data', wp_slash( $json_data ) );
        update_post_meta( $page->ID, '_elementor_edit_mode', 'builder' );
        update_post_meta( $page->ID, '_elementor_template_type', 'wp-page' );
        update_post_meta( $page->ID, '_elementor_version', '3.25.0' );
        update_post_meta( $page->ID, '_wp_page_template', 'template-elementor.php' );
    }

    // 8b. Setup Primary and Footer Menus in WordPress Database
    if ( ! function_exists( 'wp_update_nav_menu_item' ) ) {
        require_once ABSPATH . 'wp-admin/includes/nav-menu.php';
    }
    $primary_menu_name = 'Main Menu';
    $primary_menu = wp_get_nav_menu_object( $primary_menu_name );
    if ( ! $primary_menu ) {
        $primary_menu_id = wp_create_nav_menu( $primary_menu_name );
    } else {
        $primary_menu_id = $primary_menu->term_id;
    }

    if ( ! is_wp_error( $primary_menu_id ) ) {
        $existing_items = wp_get_nav_menu_items( $primary_menu_id );
        if ( empty( $existing_items ) ) {
            $pages_to_add = array(
                'menu'           => 'Menu',
                'meal-plans'     => 'Meal Plans',
                'how-it-works'   => 'How it Works',
                'delivery-rates' => 'Delivery Rates',
                'about-us'       => 'About Us',
            );
            $order = 1;
            foreach ( $pages_to_add as $pslug => $ptitle ) {
                $pobj = get_page_by_path( $pslug );
                if ( $pobj ) {
                    wp_update_nav_menu_item( $primary_menu_id, 0, array(
                        'menu-item-title'     => $ptitle,
                        'menu-item-object-id' => $pobj->ID,
                        'menu-item-object'    => 'page',
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $order++,
                    ) );
                } else {
                    wp_update_nav_menu_item( $primary_menu_id, 0, array(
                        'menu-item-title'     => $ptitle,
                        'menu-item-url'       => home_url( '/' . $pslug . '/' ),
                        'menu-item-type'      => 'custom',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $order++,
                    ) );
                }
            }
        }
    }

    // Setup Footer Navigation Menu
    $footer_menu_name = 'Footer Menu';
    $footer_menu = wp_get_nav_menu_object( $footer_menu_name );
    if ( ! $footer_menu ) {
        $footer_menu_id = wp_create_nav_menu( $footer_menu_name );
    } else {
        $footer_menu_id = $footer_menu->term_id;
    }

    if ( ! is_wp_error( $footer_menu_id ) ) {
        $existing_footer_items = wp_get_nav_menu_items( $footer_menu_id );
        if ( empty( $existing_footer_items ) ) {
            $footer_pages_to_add = array(
                'menu'           => 'Menu & Dishes',
                'meal-plans'     => 'Weekly Meal Plans',
                'how-it-works'   => 'How Ordering Works',
                'delivery-rates' => 'Distance Delivery Rates',
                'about-us'       => 'About George the Greek',
            );
            $order = 1;
            foreach ( $footer_pages_to_add as $pslug => $ptitle ) {
                $pobj = get_page_by_path( $pslug );
                if ( $pobj ) {
                    wp_update_nav_menu_item( $footer_menu_id, 0, array(
                        'menu-item-title'     => $ptitle,
                        'menu-item-object-id' => $pobj->ID,
                        'menu-item-object'    => 'page',
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $order++,
                    ) );
                } else {
                    wp_update_nav_menu_item( $footer_menu_id, 0, array(
                        'menu-item-title'     => $ptitle,
                        'menu-item-url'       => home_url( '/' . $pslug . '/' ),
                        'menu-item-type'      => 'custom',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $order++,
                    ) );
                }
            }
        }
    }

    // Assign Locations to Theme Mod
    $locations = get_theme_mod( 'nav_menu_locations', array() );
    if ( ! is_wp_error( $primary_menu_id ) ) {
        $locations['primary'] = (int) $primary_menu_id;
    }
    if ( ! is_wp_error( $footer_menu_id ) ) {
        $locations['footer'] = (int) $footer_menu_id;
    }
    set_theme_mod( 'nav_menu_locations', $locations );

    update_option( 'gfk_elementor_pages_initialized_v8', 1 );
}
add_action( 'init', 'gfk_auto_setup_elementor_pages' );

// 9. Global Header & Footer Engine (Modular & Elementor Editable)

/**
 * Get the global header post (page or template)
 */
function gfk_get_global_header_post() {
    $header_id = get_theme_mod( 'gfk_global_header_id' );
    if ( $header_id && 'publish' === get_post_status( $header_id ) ) {
        return get_post( $header_id );
    }

    $header_page = get_page_by_path( 'global-header' );
    if ( ! $header_page ) {
        $header_page = get_page_by_path( 'header' );
    }
    return $header_page;
}

/**
 * Render Global Header
 */
function gfk_render_header() {
    $header_post = gfk_get_global_header_post();

    if ( $header_post && 'publish' === get_post_status( $header_post->ID ) ) {
        if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
            $document = \Elementor\Plugin::$instance->documents->get( $header_post->ID );
            if ( $document && $document->is_built_with_elementor() ) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $header_post->ID );
                return;
            }
        }

        if ( ! empty( $header_post->post_content ) ) {
            echo apply_filters( 'the_content', $header_post->post_content );
            return;
        }
    }

    // Default Fallback Header Template Part
    get_template_part( 'template-parts/header/site-header' );
}

/**
 * Get the global footer post (page or template)
 */
function gfk_get_global_footer_post() {
    $footer_id = get_theme_mod( 'gfk_global_footer_id' );
    if ( $footer_id && 'publish' === get_post_status( $footer_id ) ) {
        return get_post( $footer_id );
    }

    $footer_page = get_page_by_path( 'global-footer' );
    if ( ! $footer_page ) {
        $footer_page = get_page_by_path( 'footer' );
    }
    return $footer_page;
}

/**
 * Render Global Footer
 */
function gfk_render_footer() {
    $footer_post = gfk_get_global_footer_post();

    if ( $footer_post && 'publish' === get_post_status( $footer_post->ID ) ) {
        if ( did_action( 'elementor/loaded' ) && class_exists( '\Elementor\Plugin' ) ) {
            $document = \Elementor\Plugin::$instance->documents->get( $footer_post->ID );
            if ( $document && $document->is_built_with_elementor() ) {
                echo \Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $footer_post->ID );
                return;
            }
        }

        if ( ! empty( $footer_post->post_content ) ) {
            echo apply_filters( 'the_content', $footer_post->post_content );
            return;
        }
    }

    // Default Fallback Footer Template Part
    get_template_part( 'template-parts/footer/site-footer' );
}

/**
 * Add Admin Bar Quick-Edit Links for Header & Footer
 */
function gfk_admin_bar_header_footer_links( $wp_admin_bar ) {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }

    $header_post = gfk_get_global_header_post();
    if ( $header_post ) {
        $wp_admin_bar->add_node( array(
            'id'    => 'gfk-edit-header',
            'title' => '<span class="ab-icon dashicons dashicons-admin-appearance"></span> Edit Global Header',
            'href'  => admin_url( 'post.php?post=' . $header_post->ID . '&action=elementor' ),
            'meta'  => array( 'target' => '_blank' ),
        ) );
    }

    $footer_post = gfk_get_global_footer_post();
    if ( $footer_post ) {
        $wp_admin_bar->add_node( array(
            'id'    => 'gfk-edit-footer',
            'title' => '<span class="ab-icon dashicons dashicons-admin-appearance"></span> Edit Global Footer',
            'href'  => admin_url( 'post.php?post=' . $footer_post->ID . '&action=elementor' ),
            'meta'  => array( 'target' => '_blank' ),
        ) );
    }
}
add_action( 'admin_bar_menu', 'gfk_admin_bar_header_footer_links', 100 );

// 10. Theme Customizer Header Controls
function gfk_customize_register( $wp_customize ) {
    $wp_customize->add_section( 'gfk_header_section', array(
        'title'    => __( 'Header & Announcement Bar', 'greek-fit-kitchen' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'gfk_announcement_cutoff', array(
        'default'           => 'Sundays & Wednesdays',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gfk_announcement_cutoff', array(
        'label'   => __( 'Batch Delivery Cutoff Text', 'greek-fit-kitchen' ),
        'section' => 'gfk_header_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'gfk_pickup_text', array(
        'default'           => 'Free Kitchen Pickup: <strong class="text-white">George the Greek</strong> (3575 Lake Shore Blvd W, Etobicoke, ON)',
        'sanitize_callback' => 'wp_kses_post',
    ) );
    $wp_customize->add_control( 'gfk_pickup_text', array(
        'label'   => __( 'Kitchen Pickup Text', 'greek-fit-kitchen' ),
        'section' => 'gfk_header_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'gfk_header_cta_text', array(
        'default'           => 'Build Your Plan',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'gfk_header_cta_text', array(
        'label'   => __( 'Header CTA Button Text', 'greek-fit-kitchen' ),
        'section' => 'gfk_header_section',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'gfk_header_cta_url', array(
        'default'           => home_url( '/meal-plans/' ),
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( 'gfk_header_cta_url', array(
        'label'   => __( 'Header CTA Button URL', 'greek-fit-kitchen' ),
        'section' => 'gfk_header_section',
        'type'    => 'url',
    ) );
}
add_action( 'customize_register', 'gfk_customize_register' );

// 11. Nav Menu Link and Item Class Styling Filters
function gfk_nav_menu_link_attributes( $atts, $item, $args ) {
    $loc = '';
    if ( is_object( $args ) && isset( $args->theme_location ) ) {
        $loc = $args->theme_location;
    } elseif ( is_array( $args ) && isset( $args['theme_location'] ) ) {
        $loc = $args['theme_location'];
    }

    if ( 'primary' === $loc ) {
        $atts['class'] = ( isset( $atts['class'] ) ? $atts['class'] . ' ' : '' ) . 'hover:text-greek-gold transition-colors';
    } elseif ( 'footer' === $loc ) {
        $atts['class'] = ( isset( $atts['class'] ) ? $atts['class'] . ' ' : '' ) . 'hover:text-white transition';
    }
    return $atts;
}
add_filter( 'nav_menu_link_attributes', 'gfk_nav_menu_link_attributes', 10, 3 );

function gfk_nav_menu_css_class( $classes, $item, $args ) {
    $loc = '';
    if ( is_object( $args ) && isset( $args->theme_location ) ) {
        $loc = $args->theme_location;
    } elseif ( is_array( $args ) && isset( $args['theme_location'] ) ) {
        $loc = $args['theme_location'];
    }

    if ( 'primary' === $loc ) {
        $classes[] = 'list-none inline-flex items-center';
    } elseif ( 'footer' === $loc ) {
        $classes[] = 'list-none';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'gfk_nav_menu_css_class', 10, 3 );
