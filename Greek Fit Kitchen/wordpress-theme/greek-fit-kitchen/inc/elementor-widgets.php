<?php
/**
 * Greek Fit Kitchen - Native Elementor Widgets Registration
 * Allows editing EVERY element directly through Elementor's visual sidebar controls.
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Register Custom Elementor Category: "Greek Fit Kitchen"
add_action( 'elementor/elements/categories_registered', function( $elements_manager ) {
    $elements_manager->add_category(
        'greek-fit-kitchen',
        array(
            'title' => __( 'Greek Fit Kitchen', 'greek-fit-kitchen' ),
            'icon'  => 'fa fa-cutlery',
        )
    );
});

// 2. Register Widgets with Elementor
add_action( 'elementor/widgets/register', function( $widgets_manager ) {
    if ( ! class_exists( '\Elementor\Widget_Base' ) ) {
        return;
    }

    // Include Widget Classes
    require_once __DIR__ . '/widgets/widget-hero-slider.php';
    require_once __DIR__ . '/widgets/widget-featured-meals.php';
    require_once __DIR__ . '/widgets/widget-meal-plans.php';
    require_once __DIR__ . '/widgets/widget-how-it-works.php';
    require_once __DIR__ . '/widgets/widget-delivery-calculator.php';

    $widgets_manager->register( new \GFK_Hero_Slider_Widget() );
    $widgets_manager->register( new \GFK_Featured_Meals_Widget() );
    $widgets_manager->register( new \GFK_Meal_Plans_Widget() );
    $widgets_manager->register( new \GFK_How_It_Works_Widget() );
    $widgets_manager->register( new \GFK_Delivery_Calculator_Widget() );
});
