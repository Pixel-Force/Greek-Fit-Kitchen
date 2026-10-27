<?php
/**
 * Elementor Widget: GFK How It Works
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_How_It_Works_Widget extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_how_it_works';
    }

    public function get_title() {
        return __( 'GFK How Ordering Works', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array( 'label' => __( 'How It Works Settings', 'greek-fit-kitchen' ) )
        );

        $this->add_control(
            'info_note',
            array(
                'type' => \Elementor\Controls_Manager::RAW_HTML,
                'raw'  => __( 'Displays the seamless 4-step ordering process (Choose meals, select delivery day, pay securely, receive scheduled delivery).', 'greek-fit-kitchen' ),
                'content_classes' => 'elementor-descriptor',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        get_template_part( 'template-parts/section-how-it-works' );
    }
}
