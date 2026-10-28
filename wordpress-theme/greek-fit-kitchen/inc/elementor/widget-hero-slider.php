<?php
/**
 * Elementor Widget: Hero Slider
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Hero_Slider extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_hero_slider';
    }

    public function get_title() {
        return __( 'GFK Hero Slider', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-slider-push';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        // Content Section
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Hero Slides', 'greek-fit-kitchen' ),
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'badge',
            array(
                'label'   => __( 'Top Badge Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Big Greek Flavour. Zero Meal Prep.', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'title',
            array(
                'label'   => __( 'Main Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Chef-Prepared Greek Meals Delivered in Toronto & GTA', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'subtitle',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Nutritious, authentic Greek taverna favourites cooked fresh by George the Greek. 6-meal packages starting from $59.94 CAD with 2 sides included.', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'btn_text',
            array(
                'label'   => __( 'Primary Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Build Your Meal Plan', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'btn_url',
            array(
                'label'   => __( 'Primary Button URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url' => '#mealPlans',
                ),
            )
        );

        $repeater->add_control(
            'btn_secondary_text',
            array(
                'label'   => __( 'Secondary Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Explore the Menu', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'btn_secondary_url',
            array(
                'label'   => __( 'Secondary Button URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url' => '#featuredMeals',
                ),
            )
        );

        $repeater->add_control(
            'image',
            array(
                'label'   => __( 'Background Slide Image', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg',
                ),
            )
        );

        $this->add_control(
            'slides',
            array(
                'label'       => __( 'Slides List', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => array(
                    array(
                        'badge'              => __( 'Big Greek Flavour. Zero Meal Prep.', 'greek-fit-kitchen' ),
                        'title'              => __( 'Chef-Prepared Greek Meals Delivered in Toronto & GTA', 'greek-fit-kitchen' ),
                        'subtitle'           => __( 'Nutritious, authentic Greek taverna favourites cooked fresh by George the Greek. 6-meal packages starting from $59.94 CAD with 2 sides included.', 'greek-fit-kitchen' ),
                        'btn_text'           => __( 'Build Your Meal Plan', 'greek-fit-kitchen' ),
                        'btn_url'            => array( 'url' => '#mealPlans' ),
                        'btn_secondary_text' => __( 'Explore the Menu', 'greek-fit-kitchen' ),
                        'btn_secondary_url'  => array( 'url' => '#featuredMeals' ),
                        'image'              => array( 'url' => get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg' ),
                    ),
                    array(
                        'badge'              => __( 'Sunday & Wednesday Delivery', 'greek-fit-kitchen' ),
                        'title'              => __( 'Disciplined Weekly Meal Prep Made Delicious', 'greek-fit-kitchen' ),
                        'subtitle'           => __( 'High protein, lean cuts, extra virgin olive oil and mountain herbs. Receive your fresh batch order right to your doorstep.', 'greek-fit-kitchen' ),
                        'btn_text'           => __( 'View Delivery Schedule', 'greek-fit-kitchen' ),
                        'btn_url'            => array( 'url' => '#deliverySection' ),
                        'btn_secondary_text' => __( 'View All 20 Dishes', 'greek-fit-kitchen' ),
                        'btn_secondary_url'  => array( 'url' => '#featuredMeals' ),
                        'image'              => array( 'url' => get_template_directory_uri() . '/assets/images/slider/slide-2-meal-prep.jpg' ),
                    ),
                    array(
                        'badge'              => __( 'Save 10% On 7+ Meals', 'greek-fit-kitchen' ),
                        'title'              => __( 'Volume Savings For Fitness & Busy Lifestyles', 'greek-fit-kitchen' ),
                        'subtitle'           => __( 'Stock your fridge for the week with healthy, macro-balanced Greek meals. Automatic 10% discount applied at checkout on 7 or more plates.', 'greek-fit-kitchen' ),
                        'btn_text'           => __( 'Order Now & Save', 'greek-fit-kitchen' ),
                        'btn_url'            => array( 'url' => '#featuredMeals' ),
                        'btn_secondary_text' => __( 'How It Works', 'greek-fit-kitchen' ),
                        'btn_secondary_url'  => array( 'url' => '#howItWorks' ),
                        'image'              => array( 'url' => get_template_directory_uri() . '/assets/images/slider/slide-3-mediterranean.jpg' ),
                    ),
                ),
                'title_field' => '{{{ title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $slides   = ! empty( $settings['slides'] ) ? $settings['slides'] : array();

        if ( empty( $slides ) ) {
            return;
        }
        ?>
        <section class="relative bg-[#101D3A] text-white overflow-hidden hero-slider-container" id="heroSlider">
          <div class="relative w-full overflow-hidden">
            <?php foreach ( $slides as $index => $slide ) : 
              $is_active = ( $index === 0 ) ? 'active' : '';
              $img_url   = ! empty( $slide['image']['url'] ) ? $slide['image']['url'] : ( get_template_directory_uri() . '/assets/images/slider/slide-1-greek-feast.jpg' );
              $btn_url   = ! empty( $slide['btn_url']['url'] ) ? $slide['btn_url']['url'] : '#mealPlans';
              $sec_url   = ! empty( $slide['btn_secondary_url']['url'] ) ? $slide['btn_secondary_url']['url'] : '#featuredMeals';
            ?>
              <div class="slide-item <?php echo esc_attr( $is_active ); ?>" style="<?php echo ( $index === 0 ) ? 'opacity: 1; position: relative;' : 'opacity: 0; position: absolute; inset: 0;'; ?> transition: opacity 0.8s ease-in-out;">
                <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('<?php echo esc_url( $img_url ); ?>');"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-[#101D3A]/95 via-[#101D3A]/90 to-transparent"></div>

                <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-20 min-h-[380px] xs:min-h-[420px] sm:min-h-[520px] md:min-h-[600px] flex flex-col justify-center">
                  <div class="max-w-2xl space-y-4">
                    <?php if ( ! empty( $slide['badge'] ) ) : ?>
                      <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-greek-gold/20 text-greek-gold text-xs font-black uppercase tracking-wider border border-greek-gold/40">
                        <span><?php echo esc_html( $slide['badge'] ); ?></span>
                      </div>
                    <?php endif; ?>

                    <h1 class="text-2xl sm:text-4xl md:text-5xl font-black text-white leading-tight tracking-tight">
                      <?php echo esc_html( $slide['title'] ); ?>
                    </h1>

                    <p class="text-xs sm:text-base text-slate-300 leading-relaxed max-w-xl">
                      <?php echo esc_html( $slide['subtitle'] ); ?>
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                      <?php if ( ! empty( $slide['btn_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $btn_url ); ?>" class="px-6 py-3.5 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow-lg text-center">
                          <?php echo esc_html( $slide['btn_text'] ); ?>
                        </a>
                      <?php endif; ?>

                      <?php if ( ! empty( $slide['btn_secondary_text'] ) ) : ?>
                        <a href="<?php echo esc_url( $sec_url ); ?>" class="px-6 py-3.5 rounded-xl border-2 border-white/30 text-white hover:border-greek-gold hover:text-greek-gold font-bold text-xs transition text-center">
                          <?php echo esc_html( $slide['btn_secondary_text'] ); ?>
                        </a>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <!-- Prev / Next Controls -->
            <button onclick="window.prevHeroSlide && window.prevHeroSlide()" aria-label="Previous Slide" class="absolute left-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition border border-white/20 z-20">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <button onclick="window.nextHeroSlide && window.nextHeroSlide()" aria-label="Next Slide" class="absolute right-4 top-1/2 -translate-y-1/2 w-10 h-10 rounded-full bg-black/40 hover:bg-black/60 text-white flex items-center justify-center transition border border-white/20 z-20">
              <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            </button>
          </div>
        </section>
        <?php
    }
}
