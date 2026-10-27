<?php
/**
 * Greek Fit Kitchen - Core Shortcodes Engine
 *
 * Provides high-speed modular shortcodes for Elementor, Gutenberg, and classic editors:
 * [gfk_home]                -> Complete homepage layout (Hero Slider, 20 Meals, Plans, How It Works, Delivery Calculator)
 * [gfk_hero_slider]         -> 3-slide interactive Hero with Order Now CTAs
 * [gfk_featured_meals]      -> 20 meals with CAD pricing, 2-side customization & filters
 * [gfk_meals]               -> Alias for [gfk_featured_meals]
 * [gfk_meal_plans]          -> 6-meal minimum package check & 10% volume discount
 * [gfk_how_it_works]        -> 4-step ordering process
 * [gfk_delivery_calculator] -> Distance delivery calculator ($5.99 + $0.99/km)
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function gfk_render_hero_slider() {
    ob_start();
    get_template_part( 'template-parts/section-hero-slider' );
    return ob_get_clean();
}
add_shortcode( 'gfk_hero_slider', 'gfk_render_hero_slider' );

function gfk_render_featured_meals() {
    ob_start();
    get_template_part( 'template-parts/section-featured-meals' );
    return ob_get_clean();
}
add_shortcode( 'gfk_featured_meals', 'gfk_render_featured_meals' );
add_shortcode( 'gfk_meals', 'gfk_render_featured_meals' );

function gfk_render_meal_plans() {
    ob_start();
    get_template_part( 'template-parts/section-meal-plans' );
    return ob_get_clean();
}
add_shortcode( 'gfk_meal_plans', 'gfk_render_meal_plans' );

function gfk_render_how_it_works() {
    ob_start();
    get_template_part( 'template-parts/section-how-it-works' );
    return ob_get_clean();
}
add_shortcode( 'gfk_how_it_works', 'gfk_render_how_it_works' );

function gfk_render_delivery_calculator() {
    ob_start();
    get_template_part( 'template-parts/section-delivery-calculator' );
    return ob_get_clean();
}
add_shortcode( 'gfk_delivery_calculator', 'gfk_render_delivery_calculator' );

function gfk_render_home() {
    ob_start();
    get_template_part( 'template-parts/section-hero-slider' );
    get_template_part( 'template-parts/section-featured-meals' );
    get_template_part( 'template-parts/section-meal-plans' );
    get_template_part( 'template-parts/section-how-it-works' );
    get_template_part( 'template-parts/section-delivery-calculator' );
    return ob_get_clean();
}
add_shortcode( 'gfk_home', 'gfk_render_home' );
