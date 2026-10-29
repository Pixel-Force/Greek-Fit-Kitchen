<?php
/**
 * Elementor Widget: Chef Sides Showcase
 * Fully editable in Elementor: badges, titles, descriptions, extra price, flexibility notes, and custom sides repeater.
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
        return array( 'sides', 'chef', 'rice', 'potatoes', 'showcase', 'greek', 'veggies' );
    }

    protected function register_controls() {

        // ==========================================
        // SECTION 1: HEADER & HEADINGS
        // ==========================================
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
                'rows'    => 2,
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

        // ==========================================
        // SECTION 2: EDITABLE SIDES REPEATER
        // ==========================================
        $this->start_controls_section(
            'section_sides_repeater',
            array(
                'label' => __( 'Sides Items (Edit Names & Badges)', 'greek-fit-kitchen' ),
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'name',
            array(
                'label'   => __( 'Side Name', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Lemon Roasted Potatoes', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'badge',
            array(
                'label'   => __( 'Tag / Badge (Optional)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Included', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'desc',
            array(
                'label'   => __( 'Short Description (Optional)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '',
            )
        );

        $this->add_control(
            'sides_list',
            array(
                'label'       => __( 'Sides List', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array( 'name' => __( 'Rice Pilaf with Veggies', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Yellow Basmati Rice', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Spinach Mushroom Rice', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Orzo in Tomato Sauce', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Garlic Butter Baked Potatoes', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Lemon Roasted Potatoes', 'greek-fit-kitchen' ), 'badge' => 'Chef Favorite' ),
                    array( 'name' => __( 'Sweet Potatoes', 'greek-fit-kitchen' ), 'badge' => 'Healthy Pick' ),
                    array( 'name' => __( 'Mashed Potatoes', 'greek-fit-kitchen' ), 'badge' => 'Included' ),
                    array( 'name' => __( 'Sautéed Veggies', 'greek-fit-kitchen' ), 'badge' => 'Low Carb' ),
                    array( 'name' => __( 'Steamed Veggies', 'greek-fit-kitchen' ), 'badge' => 'Clean Eat' ),
                    array( 'name' => __( 'Green Beans in Tomato Sauce', 'greek-fit-kitchen' ), 'badge' => 'Traditional' ),
                ),
                'title_field' => '{{{ name }}}',
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: BOTTOM BANNER & CTA
        // ==========================================
        $this->start_controls_section(
            'section_bottom_bar',
            array(
                'label' => __( 'Bottom Flexibility Bar & CTA', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'flexibility_title',
            array(
                'label'   => __( 'Flexibility Label', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sides Flexibility:', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'flexibility_text',
            array(
                'label'   => __( 'Flexibility Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( '2 sides are included with every eligible plate. Additional sides can be selected inside the meal customizer for', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'btn_text',
            array(
                'label'   => __( 'Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Choose Meals & Sides →', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'btn_url',
            array(
                'label'   => __( 'Button URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url' => '#featuredMeals',
                ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings   = $this->get_settings_for_display();
        $btn_url    = ! empty( $settings['btn_url']['url'] ) ? $settings['btn_url']['url'] : '#featuredMeals';
        $sides_list = ! empty( $settings['sides_list'] ) ? $settings['sides_list'] : array();

        // Fallback if repeater is empty
        if ( empty( $sides_list ) ) {
            $default_sides = gfk_get_default_sides();
            foreach ( $default_sides as $s ) {
                $sides_list[] = array( 'name' => $s, 'badge' => '' );
            }
        }
        ?>
        <section class="py-16 sm:py-20 bg-[#101D3A] text-white" id="sidesSection">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-12">
              <?php if ( ! empty( $settings['badge'] ) ) : ?>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
                  <?php echo esc_html( $settings['badge'] ); ?>
                </span>
              <?php endif; ?>

              <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-white break-words">
                  <?php echo esc_html( $settings['title'] ); ?>
                </h2>
              <?php endif; ?>

              <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-300 mt-2">
                  <?php echo esc_html( $settings['subtitle'] ); ?>
                </p>
              <?php endif; ?>
            </div>

            <!-- Editable Sides Grid -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-4 mb-10">
              <?php foreach ( $sides_list as $index => $side_item ) : 
                $name  = ! empty( $side_item['name'] ) ? $side_item['name'] : '';
                $badge = ! empty( $side_item['badge'] ) ? $side_item['badge'] : '';
              ?>
                <div class="p-3.5 sm:p-4 rounded-2xl bg-white/5 border border-white/10 hover:border-greek-gold/50 transition flex flex-col justify-between">
                  <div class="flex items-center gap-3">
                    <span class="w-6 h-6 rounded-full bg-greek-gold/20 text-greek-gold font-mono font-black text-[11px] flex items-center justify-center shrink-0">
                      <?php echo esc_html( $index + 1 ); ?>
                    </span>
                    <span class="text-xs font-bold text-white"><?php echo esc_html( $name ); ?></span>
                  </div>
                  <?php if ( ! empty( $badge ) ) : ?>
                    <div class="mt-2 text-right">
                      <span class="text-[9px] uppercase font-black px-2 py-0.5 rounded bg-greek-gold/10 text-greek-gold border border-greek-gold/20">
                        <?php echo esc_html( $badge ); ?>
                      </span>
                    </div>
                  <?php endif; ?>
                </div>
              <?php endforeach; ?>
            </div>

            <!-- Bottom Flexibility Info Bar -->
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs text-slate-300">
              <div>
                <strong class="text-white"><?php echo esc_html( $settings['flexibility_title'] ); ?></strong> 
                <?php echo esc_html( $settings['flexibility_text'] ); ?> 
                <span class="text-greek-gold font-bold font-mono">$<?php echo esc_html( $settings['extra_price'] ); ?> CAD each</span>.
              </div>
              <?php if ( ! empty( $settings['btn_text'] ) ) : ?>
                <a href="<?php echo esc_url( $btn_url ); ?>" class="px-5 py-2.5 bg-greek-gold text-[#101D3A] font-black rounded-xl hover:bg-greek-goldHover transition whitespace-nowrap shadow">
                  <?php echo esc_html( $settings['btn_text'] ); ?>
                </a>
              <?php endif; ?>
            </div>

          </div>
        </section>
        <?php
    }
}
