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



    wp_enqueue_style( 'gfk-style', get_stylesheet_uri(), array(), '2.5.0' );



    // Custom CSS with mobile image height protections



    wp_enqueue_style( 'gfk-custom-styles', get_template_directory_uri() . '/assets/css/styles.css', array(), '2.5.0' );



    // Master App Engine Script (deferred)



    wp_enqueue_script( 'gfk-app', get_template_directory_uri() . '/assets/js/app.js', array(), '2.5.0', array(



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



// 8. Auto-populate Elementor Builder Data for Homepage & Subpages (Fully Editable Widgets)

/**
 * Return complete Elementor sections configuration for Greek Fit Kitchen Homepage
 * Includes all 8 sections and all 20 dishes with fully editable controls.
 */
function gfk_get_elementor_full_homepage_sections() {
    $theme_uri = get_template_directory_uri();

    // Default meals for repeater
    $default_meals_raw = function_exists( 'gfk_get_default_meals' ) ? gfk_get_default_meals() : array();
    $custom_meals_repeater = array();
    foreach ( $default_meals_raw as $dm ) {
        $custom_meals_repeater[] = array(
            '_id'         => substr( md5( $dm['id'] ), 0, 7 ),
            'id'          => $dm['id'],
            'name'        => $dm['name'],
            'price'       => number_format( (float) $dm['price'], 2 ),
            'category'    => $dm['category'],
            'image'       => array(
                'id'  => '',
                'url' => function_exists( 'gfk_get_asset_url' ) ? gfk_get_asset_url( $dm['image'] ) : ( $theme_uri . '/assets/images/meals/grilled-chicken.jpg' ),
            ),
            'description' => $dm['description'],
            'calories'    => (string) $dm['calories'],
            'protein'     => (string) $dm['protein'],
            'carbs'       => (string) $dm['carbs'],
            'fat'         => (string) $dm['fat'],
            'badge'       => ! empty( $dm['popular'] ) ? 'Popular' : '',
            'has_sides'   => ! empty( $dm['hasSides'] ) ? 'yes' : 'no',
            'btn_text'    => ! empty( $dm['hasSides'] ) ? 'Customize & Add' : 'Add to Plan',
        );
    }

    // Default sides for repeater
    $default_sides_raw = function_exists( 'gfk_get_default_sides' ) ? gfk_get_default_sides() : array();
    $custom_sides_repeater = array();
    foreach ( $default_sides_raw as $idx => $s ) {
        $custom_sides_repeater[] = array(
            '_id'   => substr( md5( 'side_' . $idx ), 0, 7 ),
            'name'  => $s,
            'badge' => ( $idx === 5 ) ? 'Chef Favorite' : ( ( $idx === 6 ) ? 'Healthy Pick' : 'Included' ),
            'desc'  => '',
        );
    }

    return array(
        // 1. Hero Slider
        array(
            'widget'   => 'gfk_hero_slider',
            'settings' => array(
                'slides' => array(
                    array(
                        '_id'                => 'slide_1',
                        'badge'              => 'Big Greek Flavour. Zero Meal Prep.',
                        'title'              => 'Chef-Prepared Greek Meals Delivered in Toronto & GTA',
                        'subtitle'           => 'Nutritious, authentic Greek taverna favourites cooked fresh by George the Greek. 6-meal packages starting from $59.94 CAD with 2 sides included.',
                        'btn_text'           => 'Build Your Meal Plan',
                        'btn_url'            => array( 'url' => '#mealPlans' ),
                        'btn_secondary_text' => 'Explore the Menu',
                        'btn_secondary_url'  => array( 'url' => '#featuredMeals' ),
                        'image'              => array( 'id' => '', 'url' => $theme_uri . '/assets/images/slider/slide-1-greek-feast.jpg' ),
                    ),
                    array(
                        '_id'                => 'slide_2',
                        'badge'              => 'Sunday & Wednesday Delivery',
                        'title'              => 'Disciplined Weekly Meal Prep Made Delicious',
                        'subtitle'           => 'High protein, lean cuts, extra virgin olive oil and mountain herbs. Receive your fresh batch order right to your doorstep.',
                        'btn_text'           => 'View Delivery Schedule',
                        'btn_url'            => array( 'url' => '#deliverySection' ),
                        'btn_secondary_text' => 'View All 20 Dishes',
                        'btn_secondary_url'  => array( 'url' => '#featuredMeals' ),
                        'image'              => array( 'id' => '', 'url' => $theme_uri . '/assets/images/slider/slide-2-meal-prep.jpg' ),
                    ),
                    array(
                        '_id'                => 'slide_3',
                        'badge'              => 'Save 10% On 7+ Meals',
                        'title'              => 'Volume Savings For Fitness & Busy Lifestyles',
                        'subtitle'           => 'Stock your fridge for the week with healthy, macro-balanced Greek meals. Automatic 10% discount applied at checkout on 7 or more plates.',
                        'btn_text'           => 'Order Now & Save',
                        'btn_url'            => array( 'url' => '#featuredMeals' ),
                        'btn_secondary_text' => 'How It Works',
                        'btn_secondary_url'  => array( 'url' => '#howItWorks' ),
                        'image'              => array( 'id' => '', 'url' => $theme_uri . '/assets/images/slider/slide-3-mediterranean.jpg' ),
                    ),
                ),
            ),
        ),
        // 2. About Story
        array(
            'widget'   => 'gfk_about_story',
            'settings' => array(
                'badge'        => 'ABOUT GREEK FIT KITCHEN',
                'title'        => 'Big Greek Flavour Meets Modern Meal Prep',
                'story_p1'     => 'Greek Fit Kitchen was established to bridge the gap between delicious Greek tavern cuisine and disciplined weekly meal preparation.',
                'story_p2'     => 'Managed by George the Greek at 3575 Lake Shore Blvd W in Etobicoke and powered by Lean Meal (leanmeal.ca), we prepare our marinades with extra virgin olive oil, mountain oregano, fresh garlic, and citrus. No shortcuts, no greasy takeaways — just clean, protein-packed fuel.',
                'image'        => array( 'id' => '', 'url' => $theme_uri . '/assets/images/brand/about-greek-fit.jpg' ),
                'card_1_title' => 'George the Greek',
                'card_1_desc'  => 'Authentic tavern recipes & culinary kitchen operations in Etobicoke.',
                'card_2_title' => 'Powered by Lean Meal',
                'card_2_desc'  => 'Professional meal-prep standards, nutritional discipline & fresh batches.',
                'show_stats'   => 'yes',
                'stat_1_num'   => '6',
                'stat_1_lbl'   => 'Min Meals Plan',
                'stat_2_num'   => '10%',
                'stat_2_lbl'   => 'Off 7+ Meals',
                'stat_3_num'   => '2',
                'stat_3_lbl'   => 'Sides Per Meal',
                'stat_4_num'   => '100%',
                'stat_4_lbl'   => 'Fresh Prepared',
            ),
        ),
        // 3. Menu Grid (with all 20 dishes in custom_meals repeater)
        array(
            'widget'   => 'gfk_menu_grid',
            'settings' => array(
                'badge'              => 'APPROVED FLYER SELECTION',
                'title'              => 'Our Main Dishes (20 Options)',
                'subtitle'           => 'All prices in Canadian Dollars (CAD). Any plate includes 2 sides of your choice (excludes Pasta al Greco).',
                'show_search'        => 'yes',
                'search_placeholder' => 'Search chicken, salmon, souvlaki...',
                'show_categories'    => 'yes',
                'custom_meals'       => $custom_meals_repeater,
            ),
        ),
        // 4. How It Works
        array(
            'widget'   => 'gfk_how_it_works',
            'settings' => array(
                'badge'    => 'EFFORTLESS MEAL PREP',
                'title'    => 'How Greek Fit Kitchen Works',
                'subtitle' => 'From George the Greek's commercial kitchen straight to your weekly schedule in three simple steps.',
                'steps'    => array(
                    array(
                        '_id'      => 'step_1',
                        'step_num' => '01',
                        'title'    => 'Choose Your Meals & Sides',
                        'desc'     => 'Explore 20 approved Greek dishes. Choose 2 included sides for eligible plates and select minimum 6 meals to start.',
                    ),
                    array(
                        '_id'      => 'step_2',
                        'step_num' => '02',
                        'title'    => 'Select Batch Delivery Day',
                        'desc'     => 'We dispatch fresh scheduled batch deliveries on Sundays & Wednesdays. Order before local batch cutoff times.',
                    ),
                    array(
                        '_id'      => 'step_3',
                        'step_num' => '03',
                        'title'    => 'Enjoy Authentic Greek Nutrition',
                        'desc'     => 'Chef-prepared meals delivered chilled and sealed. Heat in 2-3 minutes for authentic Greek taverna flavour with zero prep.',
                    ),
                ),
            ),
        ),
        // 5. Meal Plans
        array(
            'widget'   => 'gfk_meal_plans',
            'settings' => array(
                'display_style'    => 'builder',
                'badge'            => 'Interactive Plan Builder',
                'title'            => 'CUSTOMIZE YOUR WEEKLY MEAL PLAN',
                'subtitle'         => 'Select at least 6 meals to meet our minimum order requirement. When you select 7 or more meals, a 10% volume discount is automatically applied to your entire food order.',
                'starter_badge'    => 'Fastest Way to Start',
                'starter_title'    => "Chef's 6-Meal Starter Package",
                'starter_desc'     => '6 diverse plates (Pork souvlaki, chicken leg, chicken souvlaki, grilled chicken, veggie souvlaki & pasta al greco).',
                'starter_price'    => '59.94',
                'starter_btn_text' => 'Load 6-Meal Pack',
                'min_meals'        => 6,
                'discount_text'    => 'Save 10% automatically on 7+ meals',
            ),
        ),
        // 6. Sides Showcase
        array(
            'widget'   => 'gfk_sides_showcase',
            'settings' => array(
                'badge'             => 'CHEF-CRAFTED SIDES',
                'title'             => 'MAKE IT A PLATE YOU LOVE',
                'subtitle'          => 'Choose two sides with eligible plates and create a meal that suits your taste. Additional sides: $4.99 CAD each.',
                'extra_price'       => '4.99',
                'sides_list'        => $custom_sides_repeater,
                'flexibility_title' => 'Sides Flexibility:',
                'flexibility_text'  => '2 sides are included with every eligible plate. Additional sides can be selected inside the meal customizer for',
                'btn_text'          => 'Choose Meals & Sides →',
                'btn_url'           => array( 'url' => '#featuredMeals' ),
            ),
        ),
        // 7. Delivery Calculator
        array(
            'widget'   => 'gfk_delivery_calculator',
            'settings' => array(
                'badge'                => 'SCHEDULED BATCH DISPATCH',
                'title'                => 'Delivery Schedule & Rates',
                'subtitle'             => 'Greek Fit Kitchen operates scheduled batch deliveries on Sundays & Wednesdays across Toronto and the GTA.',
                'schedule_badge'       => 'Toronto & GTA Delivery Schedule',
                'schedule_heading'     => 'Twice-Weekly Fresh Batches',
                'schedule_desc'        => 'Meals are cooked and blast-chilled immediately prior to scheduled dispatch to lock in taverna-quality freshness, tenderness, and aroma.',
                'batch_1_day'          => 'SUN',
                'batch_1_title'        => 'Sunday Batch Delivery',
                'batch_1_cutoff'       => 'Friday at 12:00 PM (noon) Toronto time',
                'batch_2_day'          => 'WED',
                'batch_2_title'        => 'Wednesday Batch Delivery',
                'batch_2_cutoff'       => 'Monday at 12:00 PM (noon) Toronto time',
                'pickup_label'         => 'Free local pickup @ George the Greek (Etobicoke)',
                'pickup_rate'          => '0 km = $0.00 Delivery',
                'calc_badge'           => 'Interactive Delivery Estimator',
                'calc_heading'         => 'Distance-Based Delivery Pricing',
                'calc_kitchen_address' => '3575 Lake Shore Blvd W, Etobicoke',
                'tier_1_fee'           => '0.00',
                'tier_2_fee'           => '5.00',
                'tier_3_rate'          => '1.00',
                'calc_input_label'     => 'Enter Postal Code or Distance (KM)',
                'calc_placeholder'     => 'e.g. M8W 1P5 or 8 km',
                'calc_btn_text'        => 'Calculate',
                'calc_cta_text'        => 'Start Your Order with 6+ Meals →',
                'calc_cta_url'         => array( 'url' => '#featuredMeals' ),
            ),
        ),
        // 8. Catering Banner
        array(
            'widget'   => 'gfk_catering_banner',
            'settings' => array(
                'badge'              => 'EVENTS, CORPORATE & PARTIES',
                'title'              => 'PLANNING SOMETHING BIGGER?',
                'description'        => 'Get in touch with Greek Fit Kitchen about custom catering orders, corporate wellness meals, or special bulk requests. Managed by George the Greek with authentic culinary pride.',
                'btn_text'           => 'Inquire About Catering',
                'btn_secondary_text' => 'Special Dietary Inquiries',
                'image'              => array( 'id' => '', 'url' => $theme_uri . '/assets/images/meals/meal-prep-showcase.jpg' ),
            ),
        ),
    );
}

/**
 * Format widget list into standard Elementor section tree
 */
function gfk_convert_widgets_to_elementor_tree( $widgets, $prefix = 'sec' ) {
    $elementor_data = array();
    $idx = 0;
    foreach ( $widgets as $w_item ) {
        $idx++;
        $sec_id = substr( md5( $prefix . '_' . $idx . '_s' ), 0, 7 );
        $col_id = substr( md5( $prefix . '_' . $idx . '_c' ), 0, 7 );
        $wid_id = substr( md5( $prefix . '_' . $idx . '_w' ), 0, 7 );

        $elementor_data[] = array(
            'id'       => $sec_id,
            'elType'   => 'section',
            'isInner'  => false,
            'settings' => (object) array(),
            'elements' => array(
                array(
                    'id'       => $col_id,
                    'elType'   => 'column',
                    'isInner'  => false,
                    'settings' => array(
                        '_column_size' => 100,
                    ),
                    'elements' => array(
                        array(
                            'id'         => $wid_id,
                            'elType'     => 'widget',
                            'isInner'    => false,
                            'widgetType' => $w_item['widget'],
                            'settings'   => $w_item['settings'],
                        ),
                    ),
                ),
            ),
        );
    }
    return $elementor_data;
}

/**
 * Apply full Elementor layout to a page ID
 */
function gfk_apply_elementor_to_page( $page_id, $widgets, $prefix = 'page' ) {
    if ( ! $page_id ) {
        return false;
    }
    $elementor_data = gfk_convert_widgets_to_elementor_tree( $widgets, $prefix );
    $json_data = wp_json_encode( $elementor_data );

    update_post_meta( $page_id, '_elementor_data', wp_slash( $json_data ) );
    update_post_meta( $page_id, '_elementor_edit_mode', 'builder' );
    update_post_meta( $page_id, '_elementor_template_type', 'wp-page' );
    update_post_meta( $page_id, '_elementor_version', '3.25.0' );
    update_post_meta( $page_id, '_wp_page_template', 'template-elementor.php' );
    return true;
}

function gfk_auto_setup_elementor_pages() {
    if ( get_option( 'gfk_elementor_pages_initialized_v20' ) ) {
        return;
    }

    $home_sections = gfk_get_elementor_full_homepage_sections();

    // 1. Target Home Page
    $home_page = get_page_by_path( 'home' ) ?: get_post( 17 );
    if ( ! $home_page ) {
        $front_id = get_option( 'page_on_front' );
        if ( $front_id ) {
            $home_page = get_post( $front_id );
        }
    }

    if ( ! $home_page ) {
        $new_id = wp_insert_post( array(
            'post_title'    => 'Home',
            'post_name'     => 'home',
            'post_status'   => 'publish',
            'post_type'     => 'page',
            'page_template' => 'template-elementor.php',
        ) );
        if ( ! is_wp_error( $new_id ) ) {
            $home_page = get_post( $new_id );
        }
    }

    if ( $home_page ) {
        gfk_apply_elementor_to_page( $home_page->ID, $home_sections, 'home' );
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $home_page->ID );
    }

    update_option( 'gfk_elementor_pages_initialized_v20', 1 );
}
add_action( 'init', 'gfk_auto_setup_elementor_pages' );

// 8b. One-Click Admin Tool to Sync/Reset Editable Elementor Homepage
function gfk_admin_elementor_sync_menu() {
    add_theme_page(
        __( 'Elementor Editable Sync', 'greek-fit-kitchen' ),
        __( 'Elementor Sync', 'greek-fit-kitchen' ),
        'manage_options',
        'gfk-elementor-sync',
        'gfk_render_elementor_sync_page'
    );
}
add_action( 'admin_menu', 'gfk_admin_elementor_sync_menu' );

function gfk_render_elementor_sync_page() {
    $synced = false;
    if ( isset( $_POST['gfk_run_sync'] ) && check_admin_referer( 'gfk_sync_action', 'gfk_sync_nonce' ) ) {
        $home_sections = gfk_get_elementor_full_homepage_sections();
        $home_page = get_page_by_path( 'home' ) ?: get_post( 17 );
        if ( ! $home_page ) {
            $front_id = get_option( 'page_on_front' );
            if ( $front_id ) {
                $home_page = get_post( $front_id );
            }
        }
        if ( $home_page ) {
            gfk_apply_elementor_to_page( $home_page->ID, $home_sections, 'home' );
            $synced = true;
        }
    }

    $front_id = get_option( 'page_on_front' ) ?: 17;
    $edit_url = admin_url( 'post.php?post=' . $front_id . '&action=elementor' );
    ?>
    <div class="wrap" style="max-width: 800px; margin-top: 30px;">
        <h1 style="font-weight: 800; color: #101D3A;">⚡ Greek Fit Kitchen — Elementor Full Editable Sync</h1>
        
        <?php if ( $synced ) : ?>
            <div class="notice notice-success is-dismissible" style="padding: 15px; border-left-color: #D4AF37;">
                <p style="font-size: 15px; font-weight: bold; margin: 0 0 8px 0; color: #101D3A;">
                    ✅ All 8 homepage sections and all 20 dishes have been synced into Elementor!
                </p>
                <p style="margin: 0;">
                    <a href="<?php echo esc_url( $edit_url ); ?>" class="button button-primary" style="background: #101D3A; border-color: #101D3A;">
                        👉 Click here to Open Elementor &amp; Edit All Elements
                    </a>
                </p>
            </div>
        <?php endif; ?>

        <div style="background: #fff; padding: 25px; border-radius: 12px; border: 1px solid #ccd0d4; margin-top: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <h2 style="margin-top: 0; font-size: 18px;">Make Every Website Element Editable in Elementor</h2>
            <p style="font-size: 14px; line-height: 1.6; color: #444;">
                This tool sets up every element of your website as fully editable widgets inside Elementor.
            </p>
            <ul style="list-style: disc; padding-left: 20px; font-size: 13px; color: #555; line-height: 1.8;">
                <li><strong>Hero Slider:</strong> All slide headlines, subtexts, CTA buttons, and background images.</li>
                <li><strong>About Story:</strong> Headings, bio paragraphs, chef photos, feature cards, and stats.</li>
                <li><strong>Menu Grid (20 Dishes):</strong> Every dish photo, title, price, calories, protein, carbs, badge, and description!</li>
                <li><strong>How It Works:</strong> All 3 process steps, numbers, titles, and descriptions.</li>
                <li><strong>Meal Plans:</strong> Starter package pricing, volume discount notices, and plan builder tiers.</li>
                <li><strong>Chef Sides Showcase:</strong> All 11 sides, extra side pricing, and flexibility notices.</li>
                <li><strong>Delivery Calculator:</strong> Sunday &amp; Wednesday cutoff times, distance pricing rates, and estimator texts.</li>
                <li><strong>Catering Banner:</strong> Event headlines, descriptions, button texts, and photos.</li>
            </ul>

            <form method="post" style="margin-top: 25px;">
                <?php wp_nonce_field( 'gfk_sync_action', 'gfk_sync_nonce' ); ?>
                <button type="submit" name="gfk_run_sync" value="1" class="button button-primary button-hero" style="background: #D4AF37; color: #101D3A; border-color: #D4AF37; font-weight: bold;">
                    ⚡ Sync &amp; Populate All Editable Elements in Elementor
                </button>
                <a href="<?php echo esc_url( $edit_url ); ?>" class="button button-secondary button-hero" style="margin-left: 10px;">
                    Open Elementor Editor →
                </a>
            </form>
        </div>
    </div>
    <?php
}




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

 * Add "Edit header with Elementor" & "Edit footer with Elementor"

 * inside the native "Edit with Elementor" Admin Bar dropdown menu.

 * Ensures strictly ONE single "Edit with Elementor" button is ever displayed.

 */

function gfk_admin_bar_header_footer_links() {

    global $wp_admin_bar;

    if ( ! is_object( $wp_admin_bar ) || ! current_user_can( 'edit_theme_options' ) ) {

        return;

    }



    $header_post = gfk_get_global_header_post();

    $footer_post = gfk_get_global_footer_post();



    // 1. Clean up legacy top-level admin bar links

    $wp_admin_bar->remove_node( 'gfk-edit-header' );

    $wp_admin_bar->remove_node( 'gfk-edit-footer' );



    // 2. Check for Elementor's native admin bar node

    $elementor_node = $wp_admin_bar->get_node( 'elementor_edit_page' );



    if ( ! $elementor_node ) {

        // Only if Elementor didn't register a node on this screen, create a single clean one

        $edit_id  = get_the_ID() ?: 17;

        $edit_url = admin_url( 'post.php?post=' . $edit_id . '&action=elementor' );

        $wp_admin_bar->add_node( array(

            'id'    => 'elementor_edit_page',

            'title' => '<span class="ab-icon dashicons dashicons-edit"></span> ' . __( 'Edit with Elementor', 'greek-fit-kitchen' ),

            'href'  => $edit_url,

        ) );

    }



    // 3. Attach "Edit header with Elementor" inside Elementor's dropdown

    if ( $header_post && ! $wp_admin_bar->get_node( 'elementor-header-edit' ) ) {

        $wp_admin_bar->add_node( array(

            'id'     => 'elementor-header-edit',

            'parent' => 'elementor_edit_page',

            'title'  => __( 'Edit header with Elementor', 'greek-fit-kitchen' ),

            'href'   => admin_url( 'post.php?post=' . $header_post->ID . '&action=elementor' ),

            'meta'   => array(

                'title' => __( 'Edit Global Header Template with Elementor', 'greek-fit-kitchen' ),

            ),

        ) );

    }



    // 4. Attach "Edit footer with Elementor" inside Elementor's dropdown

    if ( $footer_post && ! $wp_admin_bar->get_node( 'elementor-footer-edit' ) ) {

        $wp_admin_bar->add_node( array(

            'id'     => 'elementor-footer-edit',

            'parent' => 'elementor_edit_page',

            'title'  => __( 'Edit footer with Elementor', 'greek-fit-kitchen' ),

            'href'   => admin_url( 'post.php?post=' . $footer_post->ID . '&action=elementor' ),

            'meta'   => array(

                'title' => __( 'Edit Global Footer Template with Elementor', 'greek-fit-kitchen' ),

            ),

        ) );

    }

}

// Run strictly on wp_before_admin_bar_render (priority 9999) after Elementor has registered its single node

add_action( 'wp_before_admin_bar_render', 'gfk_admin_bar_header_footer_links', 9999 );



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



