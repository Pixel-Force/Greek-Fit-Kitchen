<?php
/**
 * Elementor Widget: How It Works
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_How_It_Works extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_how_it_works';
    }

    public function get_title() {
        return __( 'GFK How It Works', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-number-field';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'How It Works Content', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'EFFORTLESS MEAL PREP', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Section Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'How Greek Fit Kitchen Works', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'From George the Greek\'s commercial kitchen straight to your weekly schedule in three simple steps.', 'greek-fit-kitchen' ),
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'step_num',
            array(
                'label'   => __( 'Step Number (e.g. 01)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '01',
            )
        );

        $repeater->add_control(
            'title',
            array(
                'label'   => __( 'Step Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Choose Your Meals', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'desc',
            array(
                'label'   => __( 'Step Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Explore 20 approved Greek dishes. Choose 2 included sides for eligible plates and select minimum 6 meals to start.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'steps',
            array(
                'label'       => __( 'Steps List', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'step_num' => '01',
                        'title'    => __( 'Choose Your Meals & Sides', 'greek-fit-kitchen' ),
                        'desc'     => __( 'Explore 20 approved Greek dishes. Choose 2 included sides for eligible plates and select minimum 6 meals to start.', 'greek-fit-kitchen' ),
                    ),
                    array(
                        'step_num' => '02',
                        'title'    => __( 'Select Batch Delivery Day', 'greek-fit-kitchen' ),
                        'desc'     => __( 'We dispatch fresh scheduled batch deliveries on Sundays & Wednesdays. Order before local batch cutoff times.', 'greek-fit-kitchen' ),
                    ),
                    array(
                        'step_num' => '03',
                        'title'    => __( 'Enjoy Authentic Greek Nutrition', 'greek-fit-kitchen' ),
                        'desc'     => __( 'Chef-prepared meals delivered chilled and sealed. Heat in 2-3 minutes for authentic Greek taverna flavour with zero prep.', 'greek-fit-kitchen' ),
                    ),
                ),
                'title_field' => '{{{ title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $steps    = ! empty( $settings['steps'] ) ? $settings['steps'] : array();
        ?>
        <section class="py-16 sm:py-20 bg-white border-y border-slate-200" id="howItWorks">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-14">
              <?php if ( ! empty( $settings['badge'] ) ) : ?>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
                  <?php echo esc_html( $settings['badge'] ); ?>
                </span>
              <?php endif; ?>
              <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] break-words">
                <?php echo esc_html( $settings['title'] ); ?>
              </h2>
              <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-600 mt-2">
                  <?php echo esc_html( $settings['subtitle'] ); ?>
                </p>
              <?php endif; ?>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
              <?php foreach ( $steps as $step ) : ?>
                <div class="p-8 rounded-3xl bg-[#FAF9F5] border border-slate-200 flex flex-col justify-between hover:shadow-lg transition">
                  <div>
                    <div class="w-12 h-12 rounded-2xl bg-greek-gold text-[#101D3A] font-black font-mono text-lg flex items-center justify-center mb-6 shadow-sm">
                      <?php echo esc_html( $step['step_num'] ); ?>
                    </div>
                    <h3 class="text-lg font-black text-[#101D3A] mb-3">
                      <?php echo esc_html( $step['title'] ); ?>
                    </h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                      <?php echo esc_html( $step['desc'] ); ?>
                    </p>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </section>
        <?php
    }
}
