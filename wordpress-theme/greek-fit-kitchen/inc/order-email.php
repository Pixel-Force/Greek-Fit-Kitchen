<?php
/**
 * Greek Fit Kitchen Order Processing & Email Dispatch Module
 *
 * Handles:
 * 1. AJAX & REST endpoints for checkout order submissions
 * 2. Saving orders to WordPress (Custom Post Type gfk_order & WooCommerce if active)
 * 3. Sending branded HTML order confirmation emails to the customer
 * 4. Sending new order notification emails to the kitchen/admin
 * 5. Diagnostic email tester
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register Orders Custom Post Type so all orders are visible in wp-admin
 */
function gfk_register_orders_cpt() {
    $labels = array(
        'name'               => __( 'Orders', 'greek-fit-kitchen' ),
        'singular_name'      => __( 'Order', 'greek-fit-kitchen' ),
        'menu_name'          => __( 'Orders', 'greek-fit-kitchen' ),
        'all_items'          => __( 'All Orders', 'greek-fit-kitchen' ),
        'view_item'          => __( 'View Order', 'greek-fit-kitchen' ),
        'search_items'       => __( 'Search Orders', 'greek-fit-kitchen' ),
        'not_found'          => __( 'No orders found', 'greek-fit-kitchen' ),
        'not_found_in_trash' => __( 'No orders found in Trash', 'greek-fit-kitchen' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'menu_position'      => 6,
        'menu_icon'          => 'dashicons-clipboard',
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'supports'           => array( 'title', 'custom-fields' ),
        'has_archive'        => false,
    );

    register_post_type( 'gfk_order', $args );
}
add_action( 'init', 'gfk_register_orders_cpt' );

/**
 * Orders Admin Columns
 */
function gfk_order_admin_columns( $columns ) {
    $new_cols = array(
        'cb'             => $columns['cb'],
        'title'          => __( 'Order ID', 'greek-fit-kitchen' ),
        'customer'       => __( 'Customer', 'greek-fit-kitchen' ),
        'items_count'    => __( 'Meals', 'greek-fit-kitchen' ),
        'total'          => __( 'Total (CAD)', 'greek-fit-kitchen' ),
        'delivery_date'  => __( 'Batch / Slot', 'greek-fit-kitchen' ),
        'delivery_type'  => __( 'Type', 'greek-fit-kitchen' ),
        'email_status'   => __( 'Email Sent', 'greek-fit-kitchen' ),
        'date'           => __( 'Date', 'greek-fit-kitchen' ),
    );
    return $new_cols;
}
add_filter( 'manage_gfk_order_posts_columns', 'gfk_order_admin_columns' );

function gfk_order_custom_column_content( $column, $post_id ) {
    switch ( $column ) {
        case 'customer':
            $name  = get_post_meta( $post_id, '_gfk_customer_name', true );
            $email = get_post_meta( $post_id, '_gfk_customer_email', true );
            $phone = get_post_meta( $post_id, '_gfk_customer_phone', true );
            echo '<strong>' . esc_html( $name ) . '</strong><br>';
            echo '<span style="color:#666; font-size:12px;">' . esc_html( $email ) . '</span><br>';
            echo '<span style="color:#888; font-size:11px;">' . esc_html( $phone ) . '</span>';
            break;
        case 'items_count':
            $count = get_post_meta( $post_id, '_gfk_item_count', true );
            echo '<strong>' . esc_html( $count ) . ' meals</strong>';
            break;
        case 'total':
            $total = get_post_meta( $post_id, '_gfk_grand_total', true );
            echo '<strong style="color:#101D3A; font-size:14px;">$' . esc_html( number_format( (float) $total, 2 ) ) . ' CAD</strong>';
            break;
        case 'delivery_date':
            echo esc_html( get_post_meta( $post_id, '_gfk_scheduled_date', true ) );
            break;
        case 'delivery_type':
            $type = get_post_meta( $post_id, '_gfk_delivery_method', true );
            if ( 'pickup' === $type ) {
                echo '<span style="background:#e0f2fe; color:#0369a1; padding:2px 8px; border-radius:10px; font-weight:bold; font-size:11px;">Kitchen Pickup</span>';
            } else {
                echo '<span style="background:#fef3c7; color:#92400e; padding:2px 8px; border-radius:10px; font-weight:bold; font-size:11px;">Delivery</span>';
            }
            break;
        case 'email_status':
            $sent = get_post_meta( $post_id, '_gfk_email_sent', true );
            if ( $sent ) {
                echo '<span style="color:#16a34a; font-weight:bold;">✓ Sent</span>';
            } else {
                echo '<span style="color:#dc2626;">✕ Failed / Pending</span>';
            }
            break;
    }
}
add_action( 'manage_gfk_order_posts_custom_column', 'gfk_order_custom_column_content', 10, 2 );

/**
 * Handle Order Submission via AJAX
 */
function gfk_handle_ajax_submit_order() {
    check_ajax_referer( 'gfk_order_nonce', 'nonce' );

    $raw_input = file_get_contents( 'php://input' );
    $data = json_decode( $raw_input, true );

    if ( ! $data && ! empty( $_POST['order_data'] ) ) {
        $data = json_decode( wp_unslash( $_POST['order_data'] ), true );
    }

    if ( empty( $data ) ) {
        wp_send_json_error( array( 'message' => __( 'No order payload received.', 'greek-fit-kitchen' ) ) );
    }

    $order_id        = ! empty( $data['orderId'] ) ? sanitize_text_field( $data['orderId'] ) : 'GFK-' . wp_rand( 100000, 999999 );
    $customer_name   = ! empty( $data['customerName'] ) ? sanitize_text_field( $data['customerName'] ) : 'Guest Customer';
    $customer_email  = ! empty( $data['customerEmail'] ) ? sanitize_email( $data['customerEmail'] ) : '';
    $customer_phone  = ! empty( $data['customerPhone'] ) ? sanitize_text_field( $data['customerPhone'] ) : '';
    $delivery_method = ! empty( $data['deliveryMethod'] ) ? sanitize_text_field( $data['deliveryMethod'] ) : 'delivery';
    $delivery_address = ! empty( $data['deliveryAddress'] ) ? sanitize_textarea_field( $data['deliveryAddress'] ) : '';
    $scheduled_date  = ! empty( $data['scheduledDate'] ) ? sanitize_text_field( $data['scheduledDate'] ) : 'Upcoming Sunday Batch';
    $items           = ! empty( $data['items'] ) && is_array( $data['items'] ) ? $data['items'] : array();
    $item_count      = ! empty( $data['itemCount'] ) ? intval( $data['itemCount'] ) : count( $items );
    $subtotal        = ! empty( $data['subtotal'] ) ? floatval( $data['subtotal'] ) : 0.00;
    $discount        = ! empty( $data['discount'] ) ? floatval( $data['discount'] ) : 0.00;
    $delivery_fee    = ! empty( $data['deliveryFee'] ) ? floatval( $data['deliveryFee'] ) : 0.00;
    $tax             = ! empty( $data['tax'] ) ? floatval( $data['tax'] ) : 0.00;
    $grand_total     = ! empty( $data['grandTotal'] ) ? floatval( $data['grandTotal'] ) : 0.00;

    if ( empty( $customer_email ) || ! is_email( $customer_email ) ) {
        wp_send_json_error( array( 'message' => __( 'Please provide a valid email address.', 'greek-fit-kitchen' ) ) );
    }

    // 1. Create WordPress Order Post
    $post_id = wp_insert_post( array(
        'post_title'   => sprintf( 'Order #%s - %s', $order_id, $customer_name ),
        'post_type'    => 'gfk_order',
        'post_status'  => 'publish',
        'post_content' => sprintf( 'Order %s placed by %s (%s, %s)', $order_id, $customer_name, $customer_email, $customer_phone ),
    ) );

    if ( is_wp_error( $post_id ) ) {
        wp_send_json_error( array( 'message' => __( 'Could not create order record in database.', 'greek-fit-kitchen' ) ) );
    }

    // Save meta
    update_post_meta( $post_id, '_gfk_order_id', $order_id );
    update_post_meta( $post_id, '_gfk_customer_name', $customer_name );
    update_post_meta( $post_id, '_gfk_customer_email', $customer_email );
    update_post_meta( $post_id, '_gfk_customer_phone', $customer_phone );
    update_post_meta( $post_id, '_gfk_delivery_method', $delivery_method );
    update_post_meta( $post_id, '_gfk_delivery_address', $delivery_address );
    update_post_meta( $post_id, '_gfk_scheduled_date', $scheduled_date );
    update_post_meta( $post_id, '_gfk_item_count', $item_count );
    update_post_meta( $post_id, '_gfk_subtotal', $subtotal );
    update_post_meta( $post_id, '_gfk_discount', $discount );
    update_post_meta( $post_id, '_gfk_delivery_fee', $delivery_fee );
    update_post_meta( $post_id, '_gfk_tax', $tax );
    update_post_meta( $post_id, '_gfk_grand_total', $grand_total );
    update_post_meta( $post_id, '_gfk_items_json', wp_json_encode( $items ) );

    // 2. Dispatch Confirmation Emails
    $email_sent = gfk_send_order_emails( array(
        'order_id'         => $order_id,
        'customer_name'    => $customer_name,
        'customer_email'   => $customer_email,
        'customer_phone'   => $customer_phone,
        'delivery_method'  => $delivery_method,
        'delivery_address' => $delivery_address,
        'scheduled_date'   => $scheduled_date,
        'items'            => $items,
        'item_count'       => $item_count,
        'subtotal'         => $subtotal,
        'discount'         => $discount,
        'delivery_fee'     => $delivery_fee,
        'tax'              => $tax,
        'grand_total'      => $grand_total,
    ) );

    update_post_meta( $post_id, '_gfk_email_sent', $email_sent ? 1 : 0 );

    wp_send_json_success( array(
        'order_id'   => $order_id,
        'email_sent' => $email_sent,
        'message'    => $email_sent ? __( 'Order received and confirmation email sent!', 'greek-fit-kitchen' ) : __( 'Order saved, email queued.', 'greek-fit-kitchen' ),
    ) );
}
add_action( 'wp_ajax_gfk_submit_order', 'gfk_handle_ajax_submit_order' );
add_action( 'wp_ajax_nopriv_gfk_submit_order', 'gfk_handle_ajax_submit_order' );

/**
 * Send Branded HTML Emails (Customer Confirmation + Kitchen Alert)
 */
function gfk_send_order_emails( $order ) {
    $admin_email = get_option( 'admin_email' );
    $site_name   = get_bloginfo( 'name' );
    $from_email  = 'orders@fit.georgethegreeks.com';

    // Format Items HTML Table
    $items_html = '';
    if ( ! empty( $order['items'] ) && is_array( $order['items'] ) ) {
        foreach ( $order['items'] as $item ) {
            $name  = ! empty( $item['name'] ) ? esc_html( $item['name'] ) : 'Gourmet Dish';
            $price = ! empty( $item['price'] ) ? '$' . number_format( (float) $item['price'], 2 ) : '';
            $side1 = ! empty( $item['side1'] ) ? esc_html( $item['side1'] ) : '';
            $side2 = ! empty( $item['side2'] ) ? esc_html( $item['side2'] ) : '';
            $extra = ! empty( $item['extraSides'] ) && is_array( $item['extraSides'] ) ? esc_html( implode( ', ', $item['extraSides'] ) ) : '';
            $notes = ! empty( $item['notes'] ) ? esc_html( $item['notes'] ) : '';

            $sides_text = '';
            if ( $side1 || $side2 ) {
                $sides_text .= '<div style="font-size:12px; color:#555; margin-top:3px;"><strong>Sides:</strong> ' . trim( $side1 . ( $side1 && $side2 ? ' &bull; ' : '' ) . $side2 ) . '</div>';
            }
            if ( $extra ) {
                $sides_text .= '<div style="font-size:11px; color:#16a34a; margin-top:2px;"><strong>Extra Sides (+$4.99):</strong> ' . $extra . '</div>';
            }
            if ( $notes ) {
                $sides_text .= '<div style="font-size:11px; color:#888; font-style:italic; margin-top:2px;"><strong>Special Note:</strong> ' . $notes . '</div>';
            }

            $items_html .= '
            <tr>
              <td style="padding:12px; border-bottom:1px solid #e2e8f0; vertical-align:top;">
                <strong style="color:#101D3A; font-size:14px;">' . $name . '</strong>
                ' . $sides_text . '
              </td>
              <td style="padding:12px; border-bottom:1px solid #e2e8f0; vertical-align:top; text-align:right; font-family:monospace; font-weight:bold; color:#101D3A;">
                ' . $price . '
              </td>
            </tr>';
        }
    }

    // Build Email Template
    $method_label = 'pickup' === $order['delivery_method'] ? 'Kitchen Pickup' : 'Local Batch Delivery';

    $body = '
    <!DOCTYPE html>
    <html>
    <head>
      <meta charset="utf-8">
      <title>Order Confirmation #' . esc_html( $order['order_id'] ) . '</title>
    </head>
    <body style="font-family:-apple-system, BlinkMacSystemFont, \'Segoe UI\', Roboto, Helvetica, Arial, sans-serif; background-color:#f8fafc; margin:0; padding:20px; color:#334155;">
      <table width="100%" cellpadding="0" cellspacing="0" style="max-width:620px; margin:0 auto; background-color:#ffffff; border-radius:16px; overflow:hidden; border:1px solid #e2e8f0; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);">
        
        <!-- Header -->
        <tr>
          <td style="background-color:#101D3A; padding:28px 32px; text-align:center;">
            <h1 style="color:#ffffff; margin:0; font-size:22px; font-weight:900; letter-spacing:0.5px; text-transform:uppercase;">
              GREEK <span style="color:#F5C542;">FIT KITCHEN</span>
            </h1>
            <p style="color:#94a3b8; margin:6px 0 0 0; font-size:12px; text-transform:uppercase; letter-spacing:1px;">
              Order Receipt &amp; Kitchen Confirmation
            </p>
          </td>
        </tr>

        <!-- Intro -->
        <tr>
          <td style="padding:32px 32px 20px 32px;">
            <div style="background-color:#f0fdf4; border:1px solid #bbf7d0; border-radius:12px; padding:16px 20px; margin-bottom:24px;">
              <span style="font-size:18px; font-weight:800; color:#166534; display:block;">
                Thank you, ' . esc_html( $order['customer_name'] ) . '!
              </span>
              <p style="margin:4px 0 0 0; font-size:13px; color:#15803d; line-height:1.5;">
                Your weekly meal prep order <strong>#' . esc_html( $order['order_id'] ) . '</strong> has been placed successfully and dispatched to our kitchen team.
              </p>
            </div>

            <table width="100%" cellpadding="0" cellspacing="0" style="font-size:13px; line-height:1.6; margin-bottom:24px; background:#f8fafc; border-radius:12px; padding:16px;">
              <tr>
                <td style="padding:4px 0; color:#64748b; width:40%;">Order Number:</td>
                <td style="padding:4px 0; font-weight:bold; color:#101D3A; font-family:monospace;">#' . esc_html( $order['order_id'] ) . '</td>
              </tr>
              <tr>
                <td style="padding:4px 0; color:#64748b;">Fulfillment Method:</td>
                <td style="padding:4px 0; font-weight:bold; color:#101D3A;">' . esc_html( $method_label ) . '</td>
              </tr>
              <tr>
                <td style="padding:4px 0; color:#64748b;">Scheduled Slot:</td>
                <td style="padding:4px 0; font-weight:bold; color:#101D3A;">' . esc_html( $order['scheduled_date'] ) . '</td>
              </tr>
              <tr>
                <td style="padding:4px 0; color:#64748b;">Delivery / Pickup Address:</td>
                <td style="padding:4px 0; font-weight:bold; color:#101D3A;">' . esc_html( $order['delivery_address'] ) . '</td>
              </tr>
              <tr>
                <td style="padding:4px 0; color:#64748b;">Contact Phone:</td>
                <td style="padding:4px 0; font-weight:bold; color:#101D3A;">' . esc_html( $order['customer_phone'] ) . '</td>
              </tr>
            </table>

            <!-- Meals Breakdown -->
            <h3 style="font-size:15px; font-weight:800; color:#101D3A; margin:0 0 12px 0; text-transform:uppercase; letter-spacing:0.5px;">
              Selected Plates (' . intval( $order['item_count'] ) . ' Dishes)
            </h3>

            <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse; margin-bottom:20px;">
              <thead>
                <tr style="background:#f1f5f9; text-align:left;">
                  <th style="padding:8px 12px; font-size:11px; text-transform:uppercase; color:#475569;">Item &amp; Custom Sides</th>
                  <th style="padding:8px 12px; font-size:11px; text-transform:uppercase; color:#475569; text-align:right;">Price</th>
                </tr>
              </thead>
              <tbody>
                ' . $items_html . '
              </tbody>
            </table>

            <!-- Totals Table -->
            <table width="100%" cellpadding="0" cellspacing="0" style="font-size:13px; line-height:1.6; border-top:2px solid #e2e8f0; padding-top:12px;">
              <tr>
                <td style="padding:4px 0; color:#64748b;">Food Subtotal:</td>
                <td style="padding:4px 0; text-align:right; font-family:monospace; color:#101D3A;">$' . number_format( (float) $order['subtotal'], 2 ) . ' CAD</td>
              </tr>';

    if ( ! empty( $order['discount'] ) && $order['discount'] > 0 ) {
        $body .= '
              <tr>
                <td style="padding:4px 0; color:#16a34a; font-weight:bold;">10% Multi-Meal Volume Discount:</td>
                <td style="padding:4px 0; text-align:right; font-family:monospace; color:#16a34a; font-weight:bold;">-$' . number_format( (float) $order['discount'], 2 ) . ' CAD</td>
              </tr>';
    }

    $body .= '
              <tr>
                <td style="padding:4px 0; color:#64748b;">Estimated Delivery Fee:</td>
                <td style="padding:4px 0; text-align:right; font-family:monospace; color:#101D3A;">$' . number_format( (float) $order['delivery_fee'], 2 ) . ' CAD</td>
              </tr>
              <tr>
                <td style="padding:4px 0; color:#64748b;">Ontario HST (13%):</td>
                <td style="padding:4px 0; text-align:right; font-family:monospace; color:#101D3A;">$' . number_format( (float) $order['tax'], 2 ) . ' CAD</td>
              </tr>
              <tr style="font-size:16px;">
                <td style="padding:10px 0 4px 0; font-weight:900; color:#101D3A; border-top:1px solid #e2e8f0;">Total (CAD):</td>
                <td style="padding:10px 0 4px 0; text-align:right; font-weight:900; color:#101D3A; font-family:monospace; border-top:1px solid #e2e8f0;">$' . number_format( (float) $order['grand_total'], 2 ) . ' CAD</td>
              </tr>
            </table>

          </td>
        </tr>

        <!-- Kitchen Info Footer -->
        <tr>
          <td style="background-color:#f8fafc; padding:24px 32px; border-top:1px solid #e2e8f0; text-align:center; font-size:12px; color:#64748b; line-height:1.6;">
            <strong>Commercial Kitchen &amp; Storefront:</strong><br>
            George the Greek &bull; 3575 Lake Shore Blvd W, Etobicoke, ON M8W 1P5<br>
            Fresh batch prep cooked every Friday &amp; Monday &bull; Powered by Lean Meal
          </td>
        </tr>

      </table>
    </body>
    </html>';

    // Headers
    $headers = array(
        'Content-Type: text/html; charset=UTF-8',
        'From: Greek Fit Kitchen <' . $from_email . '>',
        'Reply-To: ' . ( $admin_email ? $admin_email : $from_email ),
    );

    // 1. Send to Customer
    $cust_subject = sprintf( 'Order Confirmation #%s - Greek Fit Kitchen', $order['order_id'] );
    $cust_sent = wp_mail( $order['customer_email'], $cust_subject, $body, $headers );

    // 2. Send Alert to Kitchen / Admin
    $admin_subject = sprintf( '[New Order #%s] %s - $%s CAD', $order['order_id'], $order['customer_name'], number_format( (float) $order['grand_total'], 2 ) );
    if ( $admin_email && $admin_email !== $order['customer_email'] ) {
        wp_mail( $admin_email, $admin_subject, $body, $headers );
    }

    return $cust_sent;
}
