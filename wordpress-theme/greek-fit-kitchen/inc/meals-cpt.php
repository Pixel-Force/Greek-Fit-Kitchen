<?php
/**
 * Greek Fit Kitchen - Custom Post Type for Meals & Categories
 * Enables managing all meals directly from WordPress Dashboard (Meals -> All Meals)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Register Custom Post Type & Taxonomy
function gfk_register_meal_cpt() {
    $labels = array(
        'name'               => _x( 'Meals', 'post type general name', 'greek-fit-kitchen' ),
        'singular_name'      => _x( 'Meal', 'post type singular name', 'greek-fit-kitchen' ),
        'menu_name'          => _x( 'Meals', 'admin menu', 'greek-fit-kitchen' ),
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
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
    );

    register_post_type( 'gfk_meal', $args );

    // Category Taxonomy
    $cat_labels = array(
        'name'              => __( 'Meal Categories', 'greek-fit-kitchen' ),
        'singular_name'     => __( 'Meal Category', 'greek-fit-kitchen' ),
        'search_items'      => __( 'Search Categories', 'greek-fit-kitchen' ),
        'all_items'         => __( 'All Categories', 'greek-fit-kitchen' ),
        'parent_item'       => __( 'Parent Category', 'greek-fit-kitchen' ),
        'parent_item_colon' => __( 'Parent Category:', 'greek-fit-kitchen' ),
        'edit_item'         => __( 'Edit Category', 'greek-fit-kitchen' ),
        'update_item'       => __( 'Update Category', 'greek-fit-kitchen' ),
        'add_new_item'      => __( 'Add New Meal Category', 'greek-fit-kitchen' ),
        'new_item_name'     => __( 'New Category Name', 'greek-fit-kitchen' ),
        'menu_name'         => __( 'Categories', 'greek-fit-kitchen' ),
    );

    register_taxonomy( 'meal_category', 'gfk_meal', array(
        'hierarchical'      => true,
        'labels'            => $cat_labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'meal-category' ),
    ) );
}
add_action( 'init', 'gfk_register_meal_cpt', 0 );

// 2. Custom Meta Box for Meal Pricing, Nutrition & Options
function gfk_meal_add_meta_box() {
    add_meta_box(
        'gfk_meal_details_box',
        __( 'Meal Pricing & Nutrition Specs', 'greek-fit-kitchen' ),
        'gfk_meal_meta_box_html',
        'gfk_meal',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'gfk_meal_add_meta_box' );

function gfk_meal_meta_box_html( $post ) {
    wp_nonce_field( 'gfk_save_meal_details', 'gfk_meal_details_nonce' );

    $price     = get_post_meta( $post->ID, '_gfk_price', true ) ?: '12.99';
    $calories  = get_post_meta( $post->ID, '_gfk_calories', true ) ?: '400';
    $protein   = get_post_meta( $post->ID, '_gfk_protein', true ) ?: '45g';
    $carbs     = get_post_meta( $post->ID, '_gfk_carbs', true ) ?: '20g';
    $fat       = get_post_meta( $post->ID, '_gfk_fat', true ) ?: '10g';
    $has_sides = get_post_meta( $post->ID, '_gfk_has_sides', true );
    if ( '' === $has_sides ) {
        $has_sides = '1';
    }
    $popular   = get_post_meta( $post->ID, '_gfk_popular', true );
    $img_url   = get_post_meta( $post->ID, '_gfk_image_url', true );
    ?>
    <div style="display:grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px; padding: 12px 0;">
      <div>
        <label for="gfk_price"><strong>Price ($ CAD):</strong></label><br />
        <input type="number" step="0.01" id="gfk_price" name="gfk_price" value="<?php echo esc_attr( $price ); ?>" style="width:100%; margin-top:4px;" />
      </div>

      <div>
        <label for="gfk_calories"><strong>Calories (kcal):</strong></label><br />
        <input type="number" id="gfk_calories" name="gfk_calories" value="<?php echo esc_attr( $calories ); ?>" style="width:100%; margin-top:4px;" />
      </div>

      <div>
        <label for="gfk_protein"><strong>Protein:</strong></label><br />
        <input type="text" id="gfk_protein" name="gfk_protein" value="<?php echo esc_attr( $protein ); ?>" style="width:100%; margin-top:4px;" />
      </div>

      <div>
        <label for="gfk_carbs"><strong>Carbs:</strong></label><br />
        <input type="text" id="gfk_carbs" name="gfk_carbs" value="<?php echo esc_attr( $carbs ); ?>" style="width:100%; margin-top:4px;" />
      </div>

      <div>
        <label for="gfk_fat"><strong>Fat:</strong></label><br />
        <input type="text" id="gfk_fat" name="gfk_fat" value="<?php echo esc_attr( $fat ); ?>" style="width:100%; margin-top:4px;" />
      </div>

      <div>
        <label for="gfk_image_url"><strong>Fallback Image URL:</strong></label><br />
        <input type="text" id="gfk_image_url" name="gfk_image_url" value="<?php echo esc_attr( $img_url ); ?>" style="width:100%; margin-top:4px;" placeholder="Optional image path or URL" />
      </div>
    </div>

    <div style="margin-top: 14px; padding-top: 14px; border-top: 1px solid #ddd; display: flex; gap: 24px;">
      <label>
        <input type="checkbox" name="gfk_has_sides" value="1" <?php checked( $has_sides, '1' ); ?> />
        <strong>2 Sides Included</strong> (Uncheck for Pasta or standalone plates)
      </label>

      <label>
        <input type="checkbox" name="gfk_popular" value="1" <?php checked( $popular, '1' ); ?> />
        <strong>Popular Badge</strong> (Highlights dish with gold badge)
      </label>
    </div>
    <?php
}

function gfk_save_meal_details( $post_id ) {
    if ( ! isset( $_POST['gfk_meal_details_nonce'] ) || ! wp_verify_nonce( $_POST['gfk_meal_details_nonce'], 'gfk_save_meal_details' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    if ( isset( $_POST['gfk_price'] ) ) {
        update_post_meta( $post_id, '_gfk_price', floatval( $_POST['gfk_price'] ) );
    }
    if ( isset( $_POST['gfk_calories'] ) ) {
        update_post_meta( $post_id, '_gfk_calories', intval( $_POST['gfk_calories'] ) );
    }
    if ( isset( $_POST['gfk_protein'] ) ) {
        update_post_meta( $post_id, '_gfk_protein', sanitize_text_field( $_POST['gfk_protein'] ) );
    }
    if ( isset( $_POST['gfk_carbs'] ) ) {
        update_post_meta( $post_id, '_gfk_carbs', sanitize_text_field( $_POST['gfk_carbs'] ) );
    }
    if ( isset( $_POST['gfk_fat'] ) ) {
        update_post_meta( $post_id, '_gfk_fat', sanitize_text_field( $_POST['gfk_fat'] ) );
    }
    if ( isset( $_POST['gfk_image_url'] ) ) {
        update_post_meta( $post_id, '_gfk_image_url', esc_url_raw( $_POST['gfk_image_url'] ) );
    }

    $has_sides = isset( $_POST['gfk_has_sides'] ) ? '1' : '0';
    update_post_meta( $post_id, '_gfk_has_sides', $has_sides );

    $popular = isset( $_POST['gfk_popular'] ) ? '1' : '0';
    update_post_meta( $post_id, '_gfk_popular', $popular );
}
add_action( 'save_post_gfk_meal', 'gfk_save_meal_details' );

// 3. Custom Columns in Meals Admin List (edit.php?post_type=gfk_meal)
function gfk_meal_columns( $columns ) {
    $new_cols = array(
        'cb'        => $columns['cb'],
        'thumbnail' => __( 'Photo', 'greek-fit-kitchen' ),
        'title'     => __( 'Meal Name', 'greek-fit-kitchen' ),
        'category'  => __( 'Category', 'greek-fit-kitchen' ),
        'price'     => __( 'Price (CAD)', 'greek-fit-kitchen' ),
        'protein'   => __( 'Protein', 'greek-fit-kitchen' ),
        'calories'  => __( 'Calories', 'greek-fit-kitchen' ),
        'has_sides' => __( 'Sides', 'greek-fit-kitchen' ),
        'date'      => $columns['date'],
    );
    return $new_cols;
}
add_filter( 'manage_gfk_meal_posts_columns', 'gfk_meal_columns' );

function gfk_meal_custom_column_data( $column, $post_id ) {
    switch ( $column ) {
        case 'thumbnail':
            $thumb_id = get_post_thumbnail_id( $post_id );
            $url = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'thumbnail' ) : get_post_meta( $post_id, '_gfk_image_url', true );
            if ( $url ) {
                echo '<img src="' . esc_url( $url ) . '" style="width:48px; height:48px; object-fit:cover; border-radius:8px;" />';
            } else {
                echo '<span class="dashicons dashicons-format-image" style="font-size:24px; color:#ccc;"></span>';
            }
            break;
        case 'category':
            $terms = get_the_term_list( $post_id, 'meal_category', '', ', ' );
            echo $terms ? $terms : '—';
            break;
        case 'price':
            $p = get_post_meta( $post_id, '_gfk_price', true );
            echo $p ? '$' . number_format( (float) $p, 2 ) : '—';
            break;
        case 'protein':
            echo esc_html( get_post_meta( $post_id, '_gfk_protein', true ) ?: '—' );
            break;
        case 'calories':
            $cal = get_post_meta( $post_id, '_gfk_calories', true );
            echo $cal ? esc_html( $cal ) . ' kcal' : '—';
            break;
        case 'has_sides':
            $hs = get_post_meta( $post_id, '_gfk_has_sides', true );
            echo ( '0' === $hs ) ? '<span style="color:#d97706;">No Sides</span>' : '<span style="color:#15803d; font-weight:bold;">2 Sides</span>';
            break;
    }
}
add_action( 'manage_gfk_meal_posts_custom_column', 'gfk_meal_custom_column_data', 10, 2 );

// 4. Auto-Seed Default 20 Meals into Database
function gfk_auto_seed_meals() {
    if ( get_option( 'gfk_meals_seeded_v1' ) ) {
        return;
    }

    $existing_count = wp_count_posts( 'gfk_meal' );
    if ( ! empty( $existing_count->publish ) && (int) $existing_count->publish > 0 ) {
        update_option( 'gfk_meals_seeded_v1', 1 );
        return;
    }

    if ( ! function_exists( 'gfk_get_default_meals' ) ) {
        require_once __DIR__ . '/meals-data.php';
    }

    $categories_map = array(
        'chicken'    => 'Poultry & Chicken',
        'beef'       => 'Beef & Steak',
        'pork'       => 'Pork Plates',
        'fish'       => 'Seafood / Salmon',
        'vegetarian' => 'Vegetarian & Pies',
        'other'      => 'Pasta & Specialties',
    );

    // Ensure terms exist
    foreach ( $categories_map as $slug => $name ) {
        if ( ! term_exists( $slug, 'meal_category' ) ) {
            wp_insert_term( $name, 'meal_category', array( 'slug' => $slug ) );
        }
    }

    $meals = gfk_get_default_meals();
    $order = 1;

    foreach ( $meals as $m ) {
        $existing = get_page_by_path( $m['id'], OBJECT, 'gfk_meal' );
        if ( $existing ) {
            continue;
        }

        $post_id = wp_insert_post( array(
            'post_title'   => $m['name'],
            'post_name'    => $m['id'],
            'post_content' => $m['description'],
            'post_excerpt' => $m['description'],
            'post_status'  => 'publish',
            'post_type'    => 'gfk_meal',
            'menu_order'   => $order++,
        ) );

        if ( ! is_wp_error( $post_id ) ) {
            // Assign Category
            wp_set_object_terms( $post_id, $m['category'], 'meal_category' );

            // Assign Meta
            update_post_meta( $post_id, '_gfk_price', floatval( $m['price'] ) );
            update_post_meta( $post_id, '_gfk_calories', intval( $m['calories'] ) );
            update_post_meta( $post_id, '_gfk_protein', sanitize_text_field( $m['protein'] ) );
            update_post_meta( $post_id, '_gfk_carbs', sanitize_text_field( $m['carbs'] ) );
            update_post_meta( $post_id, '_gfk_fat', sanitize_text_field( $m['fat'] ) );
            update_post_meta( $post_id, '_gfk_has_sides', ! empty( $m['hasSides'] ) ? '1' : '0' );
            update_post_meta( $post_id, '_gfk_popular', ! empty( $m['popular'] ) ? '1' : '0' );

            $asset_url = gfk_get_asset_url( $m['image'] );
            update_post_meta( $post_id, '_gfk_image_url', $asset_url );
        }
    }

    update_option( 'gfk_meals_seeded_v1', 1 );
}
add_action( 'init', 'gfk_auto_seed_meals', 10 );
