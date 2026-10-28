<?php
/**
 * WooCommerce Integration Module for Greek Fit Kitchen
 *
 * Provides:
 * 1. WooCommerce Theme Support & Gallery Features
 * 2. Custom Tailwind Responsive Container Wrappers
 * 3. Dynamic Ajax Cart Fragments (Updates header counter & drawer)
 * 4. Custom Sides, Extra Sides & Notes Data Persistence (Cart -> Checkout -> Order Meta)
 * 5. 10% Multi-Meal Volume Discount (7+ Meals automatic deduction)
 * 6. 6-Meal Minimum Order Validation
 * 7. Automatic Sync: Seeds all 20 flyer dishes as WooCommerce Products
 * 8. WooCommerce Page Provisioning (Shop, Cart, Checkout, My Account)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * 1. Declare WooCommerce Support
 */
function gfk_woocommerce_setup() {
    add_theme_support( 'woocommerce', array(
        'thumbnail_image_width' => 450,
        'single_image_width'    => 800,
        'product_grid'          => array(
            'default_rows'    => 4,
            'min_rows'        => 2,
            'max_rows'        => 8,
            'default_columns' => 3,
            'min_columns'     => 1,
            'max_columns'     => 4,
        ),
    ) );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'gfk_woocommerce_setup' );

/**
 * 2. Custom WooCommerce Template Wrappers
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

function gfk_woocommerce_wrapper_start() {
    ?>
    <main id="primary" class="site-main flex-1 bg-white">
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 sm:py-14">
    <?php
}
add_action( 'woocommerce_before_main_content', 'gfk_woocommerce_wrapper_start', 10 );

function gfk_woocommerce_wrapper_end() {
    ?>
      </div>
    </main>
    <?php
}
add_action( 'woocommerce_after_main_content', 'gfk_woocommerce_wrapper_end', 10 );

/**
 * 3. Dynamic Cart Fragments (AJAX Header Counter Update)
 */
function gfk_woocommerce_cart_fragments( $fragments ) {
    if ( ! function_exists( 'WC' ) || is_null( WC() ) || ! isset( WC()->cart ) || ! is_object( WC()->cart ) ) {
        return $fragments;
    }

    try {
        $count = WC()->cart->get_cart_contents_count();
    } catch ( Exception $e ) {
        $count = 0;
    }

    ob_start();
    ?>
    <span class="cart-count-badge absolute -top-1 -right-1 w-5 h-5 bg-greek-gold text-[#101D3A] text-[10px] font-black rounded-full flex items-center justify-center border-2 border-[#101D3A] shadow">
        <?php echo esc_html( $count ); ?>
    </span>
    <?php
    $fragments['span.cart-count-badge'] = ob_get_clean();

    return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'gfk_woocommerce_cart_fragments' );

/**
 * 4. Pass Selected Sides & Notes into WooCommerce Cart Item Data
 */
function gfk_wc_add_cart_item_data( $cart_item_data, $product_id, $variation_id ) {
    if ( isset( $_POST['gfk_side_1'] ) && ! empty( $_POST['gfk_side_1'] ) ) {
        $cart_item_data['gfk_side_1'] = sanitize_text_field( wp_unslash( $_POST['gfk_side_1'] ) );
    }
    if ( isset( $_POST['gfk_side_2'] ) && ! empty( $_POST['gfk_side_2'] ) ) {
        $cart_item_data['gfk_side_2'] = sanitize_text_field( wp_unslash( $_POST['gfk_side_2'] ) );
    }
    if ( isset( $_POST['gfk_extra_sides'] ) && ! empty( $_POST['gfk_extra_sides'] ) ) {
        $extra_sides = is_array( $_POST['gfk_extra_sides'] ) ? array_map( 'sanitize_text_field', wp_unslash( $_POST['gfk_extra_sides'] ) ) : array( sanitize_text_field( wp_unslash( $_POST['gfk_extra_sides'] ) ) );
        $cart_item_data['gfk_extra_sides'] = $extra_sides;
    }
    if ( isset( $_POST['gfk_notes'] ) && ! empty( $_POST['gfk_notes'] ) ) {
        $cart_item_data['gfk_notes'] = sanitize_textarea_field( wp_unslash( $_POST['gfk_notes'] ) );
    }
    if ( isset( $_POST['gfk_batch_plan'] ) && ! empty( $_POST['gfk_batch_plan'] ) ) {
        $cart_item_data['gfk_batch_plan'] = sanitize_text_field( wp_unslash( $_POST['gfk_batch_plan'] ) );
    }

    // Force unique line item if customized
    $cart_item_data['unique_key'] = md5( microtime() . wp_rand() );

    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'gfk_wc_add_cart_item_data', 10, 3 );

/**
 * Display Sides & Notes in Cart and Checkout
 */
function gfk_wc_display_cart_item_data( $item_data, $cart_item ) {
    if ( ! empty( $cart_item['gfk_side_1'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Side 1 (Included)', 'greek-fit-kitchen' ),
            'value' => esc_html( $cart_item['gfk_side_1'] ),
        );
    }
    if ( ! empty( $cart_item['gfk_side_2'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Side 2 (Included)', 'greek-fit-kitchen' ),
            'value' => esc_html( $cart_item['gfk_side_2'] ),
        );
    }
    if ( ! empty( $cart_item['gfk_extra_sides'] ) && is_array( $cart_item['gfk_extra_sides'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Extra Sides (+$4.99 ea)', 'greek-fit-kitchen' ),
            'value' => esc_html( implode( ', ', $cart_item['gfk_extra_sides'] ) ),
        );
    }
    if ( ! empty( $cart_item['gfk_notes'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Special Instructions', 'greek-fit-kitchen' ),
            'value' => esc_html( $cart_item['gfk_notes'] ),
        );
    }
    if ( ! empty( $cart_item['gfk_batch_plan'] ) ) {
        $item_data[] = array(
            'key'   => __( 'Meal Plan Tier', 'greek-fit-kitchen' ),
            'value' => esc_html( $cart_item['gfk_batch_plan'] ),
        );
    }
    return $item_data;
}
add_filter( 'woocommerce_get_item_data', 'gfk_wc_display_cart_item_data', 10, 2 );

/**
 * Save Sides & Notes to Order Line Item Meta (Saved to Admin Order & Kitchen Invoices)
 */
function gfk_wc_save_cart_item_sides_to_order_meta( $item, $cart_item_key, $values, $order ) {
    if ( ! empty( $values['gfk_side_1'] ) ) {
        $item->add_meta_data( __( 'Side 1 (Included)', 'greek-fit-kitchen' ), $values['gfk_side_1'], true );
    }
    if ( ! empty( $values['gfk_side_2'] ) ) {
        $item->add_meta_data( __( 'Side 2 (Included)', 'greek-fit-kitchen' ), $values['gfk_side_2'], true );
    }
    if ( ! empty( $values['gfk_extra_sides'] ) && is_array( $values['gfk_extra_sides'] ) ) {
        $item->add_meta_data( __( 'Extra Sides', 'greek-fit-kitchen' ), implode( ', ', $values['gfk_extra_sides'] ), true );
    }
    if ( ! empty( $values['gfk_notes'] ) ) {
        $item->add_meta_data( __( 'Special Instructions', 'greek-fit-kitchen' ), $values['gfk_notes'], true );
    }
    if ( ! empty( $values['gfk_batch_plan'] ) ) {
        $item->add_meta_data( __( 'Meal Plan Tier', 'greek-fit-kitchen' ), $values['gfk_batch_plan'], true );
    }
}
add_action( 'woocommerce_checkout_create_order_line_item', 'gfk_wc_save_cart_item_sides_to_order_meta', 10, 4 );

/**
 * 5. Automatic 10% Multi-Meal Volume Discount (When 7+ Meals in Cart)
 */
function gfk_wc_apply_volume_discount( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }

    if ( ! $cart || ! is_object( $cart ) || $cart->is_empty() ) {
        return;
    }

    try {
        $meal_count = 0;
        $food_subtotal = 0;

        foreach ( $cart->get_cart() as $cart_item ) {
            if ( empty( $cart_item['data'] ) || ! is_object( $cart_item['data'] ) ) {
                continue;
            }
            $product = $cart_item['data'];
            $qty     = isset( $cart_item['quantity'] ) ? (int) $cart_item['quantity'] : 1;

            $meal_count += $qty;
            if ( method_exists( $product, 'get_price' ) ) {
                $food_subtotal += (float) $product->get_price() * $qty;
            }
        }

        // Apply 10% volume discount for 7 or more meals
        if ( $meal_count >= 7 && $food_subtotal > 0 ) {
            $discount = round( $food_subtotal * 0.10, 2 );
            $cart->add_fee( __( '10% Multi-Meal Volume Discount (7+ Meals)', 'greek-fit-kitchen' ), -$discount, false );
        }
    } catch ( Exception $e ) {
        // Fail gracefully
    }
}
add_action( 'woocommerce_cart_calculate_fees', 'gfk_wc_apply_volume_discount', 20, 1 );

/**
 * 6. 6-Meal Minimum Order Enforcement on Checkout
 */
function gfk_wc_enforce_min_meals() {
    if ( ! function_exists( 'WC' ) || is_null( WC() ) || ! isset( WC()->cart ) || ! is_object( WC()->cart ) || WC()->cart->is_empty() ) {
        return;
    }

    try {
        $count = WC()->cart->get_cart_contents_count();
    } catch ( Exception $e ) {
        return;
    }
    $min_meals = 6;

    if ( $count < $min_meals ) {
        $remaining = $min_meals - $count;
        $message = sprintf(
            /* translators: 1: current count, 2: remaining meals */
            __( 'Minimum order requirement is %1$d meals. You currently have %2$d. Please add %3$d more meal(s) to place your order.', 'greek-fit-kitchen' ),
            $min_meals,
            $count,
            $remaining
        );
        wc_add_notice( $message, 'error' );
    }
}
add_action( 'woocommerce_check_cart_items', 'gfk_wc_enforce_min_meals' );

/**
 * 7. AJAX Endpoint: Add Meal with Custom Sides to WooCommerce Cart
 */
function gfk_ajax_wc_add_meal() {
    check_ajax_referer( 'gfk_wc_nonce', 'nonce' );

    if ( ! function_exists( 'WC' ) || ! WC()->cart ) {
        wp_send_json_error( array( 'message' => __( 'WooCommerce is not active.', 'greek-fit-kitchen' ) ) );
    }

    $meal_slug = isset( $_POST['meal_slug'] ) ? sanitize_text_field( wp_unslash( $_POST['meal_slug'] ) ) : '';
    $quantity  = isset( $_POST['quantity'] ) ? max( 1, intval( $_POST['quantity'] ) ) : 1;

    // Find product by slug
    $product_id = 0;
    $product_post = get_page_by_path( $meal_slug, OBJECT, 'product' );
    if ( $product_post ) {
        $product_id = $product_post->ID;
    } else {
        // Search in meals data
        require_once get_template_directory() . '/inc/meals-data.php';
        $meals = gfk_get_meals();
        foreach ( $meals as $m ) {
            if ( $m['id'] === $meal_slug ) {
                // Auto create product on the fly
                $product = new WC_Product_Simple();
                $product->set_name( $m['name'] );
                $product->set_slug( $m['id'] );
                $product->set_regular_price( (string) $m['price'] );
                $product->set_description( $m['description'] );
                $product->set_short_description( sprintf( '%d kcal | %dg protein | %dg carbs | %dg fat', $m['calories'], $m['protein'], $m['carbs'], $m['fat'] ) );
                $product->set_status( 'publish' );
                $product_id = $product->save();
                break;
            }
        }
    }

    if ( ! $product_id ) {
        wp_send_json_error( array( 'message' => __( 'Meal product not found.', 'greek-fit-kitchen' ) ) );
    }

    $custom_data = array();
    if ( ! empty( $_POST['side_1'] ) ) {
        $custom_data['gfk_side_1'] = sanitize_text_field( wp_unslash( $_POST['side_1'] ) );
    }
    if ( ! empty( $_POST['side_2'] ) ) {
        $custom_data['gfk_side_2'] = sanitize_text_field( wp_unslash( $_POST['side_2'] ) );
    }
    if ( ! empty( $_POST['notes'] ) ) {
        $custom_data['gfk_notes'] = sanitize_textarea_field( wp_unslash( $_POST['notes'] ) );
    }
    $custom_data['unique_key'] = md5( microtime() . wp_rand() );

    $cart_item_key = WC()->cart->add_to_cart( $product_id, $quantity, 0, array(), $custom_data );

    if ( $cart_item_key ) {
        wp_send_json_success( array(
            'cart_count' => WC()->cart->get_cart_contents_count(),
            'cart_total' => WC()->cart->get_cart_total(),
            'cart_url'   => wc_get_cart_url(),
            'message'    => __( 'Plate added to WooCommerce cart!', 'greek-fit-kitchen' ),
        ) );
    } else {
        wp_send_json_error( array( 'message' => __( 'Could not add to cart.', 'greek-fit-kitchen' ) ) );
    }
}
add_action( 'wp_ajax_gfk_wc_add_meal', 'gfk_ajax_wc_add_meal' );
add_action( 'wp_ajax_nopriv_gfk_wc_add_meal', 'gfk_ajax_wc_add_meal' );

/**
 * 8. Automatic Sync: Seed 20 Dishes into WooCommerce Products
 */
function gfk_sync_meals_to_woocommerce() {
    if ( ! class_exists( 'WooCommerce' ) || ! class_exists( 'WC_Product_Simple' ) ) {
        return;
    }

    if ( get_option( 'gfk_wc_products_seeded_v1' ) ) {
        return;
    }

    require_once get_template_directory() . '/inc/meals-data.php';
    $meals = gfk_get_meals();

    foreach ( $meals as $meal ) {
        // Check if product already exists
        $existing = get_page_by_path( $meal['id'], OBJECT, 'product' );
        if ( $existing ) {
            continue;
        }

        $product = new WC_Product_Simple();
        $product->set_name( $meal['name'] );
        $product->set_slug( $meal['id'] );
        $product->set_regular_price( (string) $meal['price'] );
        $product->set_description( $meal['description'] . "\n\nIncludes 2 gourmet sides of your choice." );
        $product->set_short_description( sprintf( '%d kcal · %dg protein · %dg carbs · %dg fat', $meal['calories'], $meal['protein'], $meal['carbs'], $meal['fat'] ) );
        $product->set_status( 'publish' );
        $product->set_manage_stock( false );
        $product->set_virtual( false );

        // Assign product category
        if ( ! empty( $meal['category'] ) ) {
            $cat_names = array(
                'poultry'    => 'Poultry & Chicken',
                'beef'       => 'Beef & Steak',
                'pork'       => 'Pork Plates',
                'seafood'    => 'Seafood / Salmon',
                'vegetarian' => 'Vegetarian & Pies',
                'pasta'      => 'Pasta & Specialties',
            );
            $cat_name = isset( $cat_names[ $meal['category'] ] ) ? $cat_names[ $meal['category'] ] : ucfirst( $meal['category'] );
            $term = term_exists( $cat_name, 'product_cat' );
            if ( ! $term ) {
                $term = wp_insert_term( $cat_name, 'product_cat' );
            }
            if ( ! is_wp_error( $term ) && isset( $term['term_id'] ) ) {
                $product->set_category_ids( array( $term['term_id'] ) );
            }
        }

        $product_id = $product->save();

        if ( $product_id ) {
            update_post_meta( $product_id, '_gfk_calories', $meal['calories'] );
            update_post_meta( $product_id, '_gfk_protein', $meal['protein'] );
            update_post_meta( $product_id, '_gfk_carbs', $meal['carbs'] );
            update_post_meta( $product_id, '_gfk_fat', $meal['fat'] );
            update_post_meta( $product_id, '_gfk_image_url', $meal['image'] );
            update_post_meta( $product_id, '_gfk_is_popular', ! empty( $meal['isPopular'] ) ? 'yes' : 'no' );
        }
    }

    update_option( 'gfk_wc_products_seeded_v1', 1 );
}
add_action( 'init', 'gfk_sync_meals_to_woocommerce', 30 );

/**
 * 9. Ensure Standard WooCommerce Pages Exist (Shop, Cart, Checkout, My Account)
 */
function gfk_ensure_woocommerce_pages() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        return;
    }

    if ( get_option( 'gfk_wc_pages_ensured_v1' ) ) {
        return;
    }

    $pages = array(
        'shop'       => array(
            'title'   => __( 'Shop', 'greek-fit-kitchen' ),
            'content' => '',
        ),
        'cart'       => array(
            'title'   => __( 'Cart', 'greek-fit-kitchen' ),
            'content' => '<!-- wp:woocommerce/cart -->[woocommerce_cart]<!-- /wp:woocommerce/cart -->',
        ),
        'checkout'   => array(
            'title'   => __( 'Checkout', 'greek-fit-kitchen' ),
            'content' => '<!-- wp:woocommerce/checkout -->[woocommerce_checkout]<!-- /wp:woocommerce/checkout -->',
        ),
        'my-account' => array(
            'title'   => __( 'My Account', 'greek-fit-kitchen' ),
            'content' => '[woocommerce_my_account]',
        ),
    );

    foreach ( $pages as $slug => $page_data ) {
        $existing = get_page_by_path( $slug );
        if ( ! $existing ) {
            $page_id = wp_insert_post( array(
                'post_name'      => $slug,
                'post_title'     => $page_data['title'],
                'post_content'   => $page_data['content'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );
            if ( $page_id && ! is_wp_error( $page_id ) ) {
                update_option( 'woocommerce_' . str_replace( '-', '_', $slug ) . '_page_id', $page_id );
            }
        }
    }

    update_option( 'gfk_wc_pages_ensured_v1', 1 );
}
add_action( 'init', 'gfk_ensure_woocommerce_pages', 35 );

/**
 * 10. Dashboard Notice if WooCommerce is Not Installed
 */
function gfk_woocommerce_admin_notice() {
    if ( ! class_exists( 'WooCommerce' ) ) {
        ?>
        <div class="notice notice-info is-dismissible">
            <p>
                <strong><?php esc_html_e( 'Greek Fit Kitchen WooCommerce Integration:', 'greek-fit-kitchen' ); ?></strong>
                <?php esc_html_e( 'Install and activate WooCommerce to enable online card checkout, automatic volume discounts, and seamless kitchen order management.', 'greek-fit-kitchen' ); ?>
                <a href="<?php echo esc_url( admin_url( 'plugin-install.php?s=woocommerce&tab=search&type=term' ) ); ?>" class="button button-primary" style="margin-left: 8px;">
                    <?php esc_html_e( 'Install WooCommerce', 'greek-fit-kitchen' ); ?>
                </a>
            </p>
        </div>
        <?php
    }
}
add_action( 'admin_notices', 'gfk_woocommerce_admin_notice' );
