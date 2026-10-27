<?php
/**
 * Elementor Widget: GFK Featured Meals
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Featured_Meals_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_featured_meals';
    }

    public function get_title() {
        return __( 'GFK Featured Meals (20 Dishes)', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array( 'label' => __( 'Featured Meals Settings', 'greek-fit-kitchen' ) )
        );

        $this->add_control(
            'info_note',
            array(
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => __( 'Displays all 20 authentic Greek meals from the official flyer with category filters (Poultry, Meat, Seafood, Veggie), CAD pricing, nutritional macros, and 2 included sides customization.', 'greek-fit-kitchen' ),
                'content_classes' => 'elementor-descriptor',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        get_template_part( 'template-parts/section-featured-meals' );
    }
}
