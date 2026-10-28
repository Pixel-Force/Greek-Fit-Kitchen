<?php
/**
 * Elementor Widget: Chef Sides Showcase
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once dirname( __DIR__ ) . '/meals-data.php';

class GFK_Widget_Sides_Showcase extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_sides_showcase';
    }

    public function get_title() {
        return __( 'GFK Chef Sides Showcase', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-bullet-list';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    public function get_keywords() {
        return array( 'sides', 'chef', 'rice', 'potatoes', 'showcase', 'greek' );
    }

    protected function register_controls() {
        // Section 1: Content
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Sides Showcase Content', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'CHEF-CRAFTED SIDES', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Section Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'MAKE IT A PLATE YOU LOVE', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Choose two sides with eligible plates and create a meal that suits your taste. Additional sides: $4.99 CAD each.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'extra_price',
            array(
                'label'   => __( 'Extra Side Price (CAD)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '4.99',
            )
        );

        $this->end_controls_section();

        // Section 2: Sides Selection & Visibility
        $this->start_controls_section(
            'section_sides_selection',
            array(
                'label' => __( 'Sides Visibility & Selection', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'show_sides_grid',
            array(
                'label'        => __( 'Show Sides Grid', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'greek-fit-kitchen' ),
                'label_off'    => __( 'Hide', 'greek-fit-kitchen' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            )
        );

        $default_sides = gfk_get_default_sides();
        $sides_options = array();
        foreach ( $default_sides as $side ) {
            $sides_options[ $side ] = $side;
        }

        $this->add_control(
            'selected_sides',
            array(
                'label'       => __( 'Select Sides to Display', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => $sides_options,
                'default'     => array_keys( $sides_options ),
                'condition'   => array(
                    'show_sides_grid' => 'yes',
                ),
                'description' => __( 'Choose which side items are displayed in the showcase grid.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings      = $this->get_settings_for_display();
        $all_sides     = gfk_get_default_sides();
        $show_grid     = isset( $settings['show_sides_grid'] ) && 'yes' === $settings['show_sides_grid'];
        $selected      = ! empty( $settings['selected_sides'] ) && is_array( $settings['selected_sides'] )
            ? $settings['selected_sides']
            : $all_sides;

        $sides = array_values( array_filter( $all_sides, function( $s ) use ( $selected ) {
            return in_array( $s, $selected, true );
        } ) );
        ?>
        <section class="py-16 sm:py-20 bg-[#101D3A] text-white" id="sidesSection">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
              <?php if ( ! empty( $settings['badge'] ) ) : ?>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
                  <?php echo esc_html( $settings['badge'] ); ?>
                </span>
              <?php endif; ?>
              <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-white break-words">
                <?php echo esc_html( $settings['title'] ); ?>
              </h2>
              <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-300 mt-2">
                  <?php echo esc_html( $settings['subtitle'] ); ?>
                </p>
              <?php endif; ?>
            </div>

            <?php if ( $show_grid && ! empty( $sides ) ) : ?>
              <!-- Selected Sides Grid -->
              <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mb-10">
                <?php foreach ( $sides as $index => $side ) : ?>
                  <div class="p-3.5 sm:p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-greek-gold/50 transition flex items-center gap-3">
                    <span class="w-6 h-6 rounded-full bg-greek-gold/20 text-greek-gold font-mono font-black text-[11px] flex items-center justify-center shrink-0">
                      <?php echo esc_html( $index + 1 ); ?>
                    </span>
                    <span class="text-xs font-bold text-white"><?php echo esc_html( $side ); ?></span>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-300">
              <div>
                <strong class="text-white"><?php esc_html_e( 'Sides Flexibility:', 'greek-fit-kitchen' ); ?></strong> <?php esc_html_e( '2 sides are included with every eligible plate. Additional sides can be selected inside the meal customizer for', 'greek-fit-kitchen' ); ?> <span class="text-greek-gold font-bold font-mono">$<?php echo esc_html( $settings['extra_price'] ); ?> CAD each</span>.
              </div>
              <a href="#featuredMeals" class="px-5 py-2.5 bg-greek-gold text-[#101D3A] font-black rounded-xl hover:bg-greek-goldHover transition whitespace-nowrap shadow">
                <?php esc_html_e( 'Choose Meals & Sides →', 'greek-fit-kitchen' ); ?>
              </a>
            </div>

          </div>
        </section>
        <?php
    }
}
