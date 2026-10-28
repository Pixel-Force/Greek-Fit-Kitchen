<?php
/**
 * Canonical Greek Fit Kitchen Menu & Sides Data
 * Managed by George the Greek (3575 Lake Shore Blvd W, Etobicoke)
 * All flyer approved items & prices in Canadian Dollars (CAD)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function gfk_get_default_sides() {
    return array(
        'Rice Pilaf with Veggies',
        'Yellow Basmati Rice',
        'Spinach Mushroom Rice',
        'Orzo in Tomato Sauce',
        'Garlic Butter Baked Potatoes',
        'Lemon Roasted Potatoes',
        'Sweet Potatoes',
        'Mashed Potatoes',
        'Sautéed Veggies',
        'Steamed Veggies',
        'Green Beans in Tomato Sauce',
    );
}

function gfk_get_default_meals() {
    return array(
        array(
            'id'          => 'grilled-chicken',
            'name'        => 'Grilled Chicken',
            'price'       => 12.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/grilled-chicken.jpg',
            'description' => 'Tender herb-marinated chicken breast flame-grilled with Greek oregano, garlic, and extra virgin olive oil.',
            'calories'    => 420,
            'protein'     => '48g',
            'carbs'       => '18g',
            'fat'         => '9g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chilly-chicken',
            'name'        => 'Chilly Chicken',
            'price'       => 13.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chilly-chicken.jpg',
            'description' => 'Lean chicken breast tossed in a zesty Mediterranean chili and herb glaze for a vibrant metabolic kick.',
            'calories'    => 430,
            'protein'     => '46g',
            'carbs'       => '22g',
            'fat'         => '10g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'salmon',
            'name'        => 'Salmon',
            'price'       => 14.99,
            'category'    => 'fish',
            'image'       => 'public/images/meals/salmon.jpg',
            'description' => 'Pan-seared Atlantic salmon fillet with sea salt, cracked black pepper, oregano, and fresh lemon essence.',
            'calories'    => 490,
            'protein'     => '44g',
            'carbs'       => '14g',
            'fat'         => '18g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'spinach-feta-chicken',
            'name'        => 'Spinach & Feta Stuffed Chicken',
            'price'       => 14.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/spinach-feta-chicken.jpg',
            'description' => 'Lean chicken breast stuffed with authentic Greek feta, wilted baby spinach, and roasted garlic cloves.',
            'calories'    => 470,
            'protein'     => '51g',
            'carbs'       => '15g',
            'fat'         => '13g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'tandoori-chicken',
            'name'        => 'Tandoori Chicken',
            'price'       => 14.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/tandoori-chicken.jpg',
            'description' => 'Greek-yogurt and aromatic spice-marinated chicken fillet, roasted tender with caramelized edges.',
            'calories'    => 440,
            'protein'     => '47g',
            'carbs'       => '16g',
            'fat'         => '11g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chicken-mushroom',
            'name'        => 'Chicken Mushroom Sauce',
            'price'       => 13.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chicken-mushroom.jpg',
            'description' => 'Succulent chicken breast smothered in a savory, simmered cremini mushroom reduction with Greek herbs.',
            'calories'    => 450,
            'protein'     => '47g',
            'carbs'       => '19g',
            'fat'         => '12g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chicken-fajita',
            'name'        => 'Chicken Fajita',
            'price'       => 12.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chicken-fajita.jpg',
            'description' => 'Sliced grilled chicken breast sautéed with sweet bell peppers, red onions, and smoky Mediterranean spices.',
            'calories'    => 410,
            'protein'     => '45g',
            'carbs'       => '20g',
            'fat'         => '9g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'beef-fajita',
            'name'        => 'Beef Fajita',
            'price'       => 14.99,
            'category'    => 'beef',
            'image'       => 'public/images/meals/beef-fajita.jpg',
            'description' => 'Char-broiled strips of tender Canadian flank beef seared with colorful sweet peppers and charred sweet onions.',
            'calories'    => 480,
            'protein'     => '44g',
            'carbs'       => '19g',
            'fat'         => '16g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'beef-mushroom',
            'name'        => 'Beef Mushroom Sauce',
            'price'       => 14.99,
            'category'    => 'beef',
            'image'       => 'public/images/meals/beef-mushroom.jpg',
            'description' => 'Slow-braised lean beef medallions topped with a rich garlic mushroom glaze and garden fresh parsley.',
            'calories'    => 510,
            'protein'     => '46g',
            'carbs'       => '17g',
            'fat'         => '18g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'smoked-turkey',
            'name'        => 'Smoked Turkey Breast',
            'price'       => 13.99,
            'category'    => 'other',
            'image'       => 'public/images/meals/smoked-turkey.jpg',
            'description' => 'Naturally hardwood-smoked lean turkey breast carved into tender slices with fragrant rosemary jus.',
            'calories'    => 390,
            'protein'     => '50g',
            'carbs'       => '14g',
            'fat'         => '7g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chicken-leg',
            'name'        => 'Chicken Leg Plate',
            'price'       => 10.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chicken-leg.jpg',
            'description' => 'Slow-roasted bone-in chicken leg quarters seasoned with aromatic garlic, wild thyme, and fresh lemon.',
            'calories'    => 460,
            'protein'     => '42g',
            'carbs'       => '12g',
            'fat'         => '14g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chicken-fillet',
            'name'        => 'Chicken Fillet',
            'price'       => 12.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chicken-fillet.jpg',
            'description' => 'Ultra-lean grilled chicken breast fillet prepared simply with Greek lemon, sea salt, and extra virgin olive oil.',
            'calories'    => 400,
            'protein'     => '49g',
            'carbs'       => '14g',
            'fat'         => '8g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'veggie-souvlaki',
            'name'        => 'Veggie Souvlaki',
            'price'       => 11.99,
            'category'    => 'vegetarian',
            'image'       => 'public/images/meals/veggie-souvlaki.jpg',
            'description' => 'Skewered char-grilled zucchini, bell peppers, cremini mushrooms, and red onions with Greek herb marinade.',
            'calories'    => 320,
            'protein'     => '14g',
            'carbs'       => '34g',
            'fat'         => '8g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'chicken-souvlaki',
            'name'        => 'Chicken Souvlaki Plate',
            'price'       => 12.99,
            'category'    => 'chicken',
            'image'       => 'public/images/meals/chicken-souvlaki.jpg',
            'description' => 'Traditional skewers of cubed chicken breast marinated in lemon, garlic, white wine, and Greek mountain oregano.',
            'calories'    => 430,
            'protein'     => '48g',
            'carbs'       => '16g',
            'fat'         => '10g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'beef-souvlaki',
            'name'        => 'Beef Souvlaki Plate',
            'price'       => 13.99,
            'category'    => 'beef',
            'image'       => 'public/images/meals/beef-souvlaki.jpg',
            'description' => 'Tender sirloin steak skewers grilled over open flame with extra virgin olive oil and fragrant spices.',
            'calories'    => 470,
            'protein'     => '45g',
            'carbs'       => '15g',
            'fat'         => '15g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'pork-souvlaki',
            'name'        => 'Pork Souvlaki Plate',
            'price'       => 9.99,
            'category'    => 'pork',
            'image'       => 'public/images/meals/pork-souvlaki.jpg',
            'description' => 'Authentic Greek street-style marinated pork tenderloin skewers with vibrant lemon and crushed oregano.',
            'calories'    => 440,
            'protein'     => '43g',
            'carbs'       => '14g',
            'fat'         => '13g',
            'popular'     => true,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'spinach-pie',
            'name'        => 'Spinach Pie Dinner',
            'price'       => 12.99,
            'category'    => 'vegetarian',
            'image'       => 'public/images/meals/spinach-pie.jpg',
            'description' => 'Traditional homemade Spanakopita with flaky phyllo pastry, organic baby spinach, scallions, and sheep\'s milk feta.',
            'calories'    => 450,
            'protein'     => '18g',
            'carbs'       => '42g',
            'fat'         => '22g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'pasta-al-greco',
            'name'        => 'Pasta al Greco',
            'price'       => 9.99,
            'category'    => 'other',
            'image'       => 'public/images/meals/pasta-al-greco.jpg',
            'description' => 'Penne pasta tossed in rich Greek roasted tomato sauce, virgin olive oil, fragrant basil, and crumbled sheep\'s feta. (Complete dish — no sides included).',
            'calories'    => 460,
            'protein'     => '16g',
            'carbs'       => '68g',
            'fat'         => '12g',
            'popular'     => false,
            'hasSides'    => false,
            'inStock'     => true,
        ),
        array(
            'id'          => 'smoked-pork-loin',
            'name'        => 'Smoked Pork Loin',
            'price'       => 12.99,
            'category'    => 'pork',
            'image'       => 'public/images/meals/smoked-pork-loin.jpg',
            'description' => 'Tender center-cut pork loin, lightly smoked with natural applewood and served with aromatic citrus jus.',
            'calories'    => 460,
            'protein'     => '46g',
            'carbs'       => '14g',
            'fat'         => '13g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
        array(
            'id'          => 'turkey-souvlaki',
            'name'        => 'Turkey Souvlaki Plate',
            'price'       => 13.99,
            'category'    => 'other',
            'image'       => 'public/images/meals/turkey-souvlaki.jpg',
            'description' => 'Lean cubed turkey breast skewers flame-broiled with lemon, garlic, Greek sea salt, and extra virgin olive oil.',
            'calories'    => 410,
            'protein'     => '49g',
            'carbs'       => '14g',
            'fat'         => '8g',
            'popular'     => false,
            'hasSides'    => true,
            'inStock'     => true,
        ),
    );
}

function gfk_get_meal_by_id( $id ) {
    $meals = gfk_get_meals();
    foreach ( $meals as $meal ) {
        if ( $meal['id'] === $id ) {
            return $meal;
        }
    }
    return null;
}

function gfk_get_meals() {
    $posts = get_posts( array(
        'post_type'      => 'gfk_meal',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order title',
        'order'          => 'ASC',
    ) );

    if ( ! empty( $posts ) ) {
        $meals = array();
        foreach ( $posts as $p ) {
            $cats = wp_get_post_terms( $p->ID, 'meal_category', array( 'fields' => 'slugs' ) );
            $cat  = ! empty( $cats ) ? $cats[0] : 'chicken';
            $thumb_id = get_post_thumbnail_id( $p->ID );
            $img_url  = $thumb_id ? wp_get_attachment_image_url( $thumb_id, 'gfk-meal-thumb' ) : get_post_meta( $p->ID, '_gfk_image_url', true );
            if ( ! $img_url ) {
                $img_url = get_template_directory_uri() . '/assets/images/meals/grilled-chicken.jpg';
            }

            $meals[] = array(
                'id'          => $p->post_name,
                'name'        => $p->post_title,
                'price'       => (float) get_post_meta( $p->ID, '_gfk_price', true ) ?: 12.99,
                'category'    => $cat,
                'image'       => $img_url,
                'description' => $p->post_content,
                'calories'    => (int) get_post_meta( $p->ID, '_gfk_calories', true ) ?: 400,
                'protein'     => get_post_meta( $p->ID, '_gfk_protein', true ) ?: '40g',
                'carbs'       => get_post_meta( $p->ID, '_gfk_carbs', true ) ?: '20g',
                'fat'         => get_post_meta( $p->ID, '_gfk_fat', true ) ?: '10g',
                'popular'     => (bool) get_post_meta( $p->ID, '_gfk_popular', true ),
                'hasSides'    => get_post_meta( $p->ID, '_gfk_has_sides', true ) !== '0',
                'inStock'     => true,
            );
        }
        return $meals;
    }

    return gfk_get_default_meals();
}


function gfk_get_asset_url( $path ) {
    $clean_path = ltrim( str_replace( 'assets/', '', str_replace( 'public/', '', $path ) ), '/' );
    $local_file = get_template_directory() . '/assets/' . $clean_path;
    if ( file_exists( $local_file ) ) {
        return get_template_directory_uri() . '/assets/' . $clean_path;
    }
    // High-speed CDN fallback
    return 'https://pixel-force.github.io/Greek-Fit-Kitchen/public/' . $clean_path;
}
