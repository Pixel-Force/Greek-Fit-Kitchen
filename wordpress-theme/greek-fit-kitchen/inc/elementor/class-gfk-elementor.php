<?php
/**
 * Elementor Integration & Custom Widgets Registration
 * Enables visual drag-and-drop editing for all Greek Fit Kitchen components
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Elementor_Extension {

    private static $_instance = null;

    public static function instance() {
        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function __construct() {
        // Register Widget Category
        add_action( 'elementor/elements/categories_registered', array( $this, 'add_elementor_widget_categories' ) );

        // Register Widgets
        add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
    }

    /**
     * Register Greek Fit Kitchen Custom Elementor Category
     */
    public function add_elementor_widget_categories( $elements_manager ) {
        $elements_manager->add_category(
            'greek-fit-kitchen',
            array(
                'title' => __( 'Greek Fit Kitchen', 'greek-fit-kitchen' ),
                'icon'  => 'fa fa-cutlery',
            )
        );
    }

    /**
     * Register Custom Elementor Widgets
     */
    public function register_widgets( $widgets_manager ) {
        // Include widget files
        require_once __DIR__ . '/widget-site-header.php';
        require_once __DIR__ . '/widget-site-footer.php';
        require_once __DIR__ . '/widget-hero-slider.php';
        require_once __DIR__ . '/widget-menu-grid.php';
        require_once __DIR__ . '/widget-meal-plans.php';
        require_once __DIR__ . '/widget-how-it-works.php';
        require_once __DIR__ . '/widget-sides-showcase.php';
        require_once __DIR__ . '/widget-delivery-calculator.php';
        require_once __DIR__ . '/widget-catering-banner.php';
        require_once __DIR__ . '/widget-about-story.php';

        // Register each widget class
        $widgets_manager->register( new \GFK_Widget_Site_Header() );
        $widgets_manager->register( new \GFK_Widget_Site_Footer() );
        $widgets_manager->register( new \GFK_Widget_Hero_Slider() );
        $widgets_manager->register( new \GFK_Widget_Menu_Grid() );
        $widgets_manager->register( new \GFK_Widget_Meal_Plans() );
        $widgets_manager->register( new \GFK_Widget_How_It_Works() );
        $widgets_manager->register( new \GFK_Widget_Sides_Showcase() );
        $widgets_manager->register( new \GFK_Widget_Delivery_Calculator() );
        $widgets_manager->register( new \GFK_Widget_Catering_Banner() );
        $widgets_manager->register( new \GFK_Widget_About_Story() );
    }
}

// Initialize when Elementor is loaded
function gfk_init_elementor_extension() {
    if ( did_action( 'elementor/loaded' ) ) {
        GFK_Elementor_Extension::instance();
    }
}
add_action( 'init', 'gfk_init_elementor_extension' );
