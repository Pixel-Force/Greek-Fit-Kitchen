<?php
/**
 * Elementor Widget: GFK Hero Slider
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Hero_Slider_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_hero_slider';
    }

    public function get_title() {
        return __( 'GFK Hero Slider (3 Slides)', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-slider-album';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array( 'label' => __( 'Hero Slider Settings', 'greek-fit-kitchen' ) )
        );

        $this->add_control(
            'info_note',
            array(
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => __( 'Displays the 3 signature slides: Signature Greek Meals, 10% Savings on 7+ Meals, and 6-Meal Starter Package from $59.94 CAD with clear Order Now buttons.', 'greek-fit-kitchen' ),
                'content_classes' => 'elementor-descriptor',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        get_template_part( 'template-parts/section-hero-slider' );
    }
}
