<?php
/**
 * Elementor Widget: GFK Meal Plans & Savings
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Meal_Plans_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_meal_plans';
    }

    public function get_title() {
        return __( 'GFK Meal Plans & Volume Discounts', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array( 'label' => __( 'Meal Plans Settings', 'greek-fit-kitchen' ) )
        );

        $this->add_control(
            'info_note',
            array(
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => __( 'Displays the 6-meal minimum package check ($59.94 CAD starting price) and 10% volume discount for orders of 7+ meals.', 'greek-fit-kitchen' ),
                'content_classes' => 'elementor-descriptor',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        get_template_part( 'template-parts/section-meal-plans' );
    }
}
