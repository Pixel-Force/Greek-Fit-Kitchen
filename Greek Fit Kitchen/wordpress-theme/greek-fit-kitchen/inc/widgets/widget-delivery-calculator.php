<?php
/**
 * Elementor Widget: GFK Delivery Fee Calculator
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Delivery_Calculator_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_delivery_calculator';
    }

    public function get_title() {
        return __( 'GFK Delivery Fee Calculator', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array( 'label' => __( 'Delivery Calculator Settings', 'greek-fit-kitchen' ) )
        );

        $this->add_control(
            'info_note',
            array(
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => __( 'Calculates distance-based GTA delivery fee ($5.99 base + $0.99/km from 3575 Lake Shore Blvd W, Etobicoke; Store pickup FREE).', 'greek-fit-kitchen' ),
                'content_classes' => 'elementor-descriptor',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        get_template_part( 'template-parts/section-delivery-calculator' );
    }
}
