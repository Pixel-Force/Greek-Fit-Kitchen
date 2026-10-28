<?php
/**
 * Elementor Widget: Catering & Large Events Banner
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Catering_Banner extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_catering_banner';
    }

    public function get_title() {
        return __( 'GFK Catering & Events Banner', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Catering Banner Content', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'EVENTS, CORPORATE & PARTIES', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'PLANNING SOMETHING BIGGER?', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'description',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Get in touch with Greek Fit Kitchen about custom catering orders, corporate wellness meals, or special bulk requests. Managed by George the Greek with authentic culinary pride.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'btn_text',
            array(
                'label'   => __( 'Primary Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Inquire About Catering', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'image',
            array(
                'label'   => __( 'Showcase Photo', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/meals/meal-prep-showcase.jpg',
                ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $img_url  = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : ( get_template_directory_uri() . '/assets/images/meals/meal-prep-showcase.jpg' );
        ?>
        <section class="py-16 sm:py-20 bg-white border-t border-slate-200" id="cateringSection">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row items-center justify-between gap-10">
              
              <div class="w-full lg:w-1/2 space-y-5">
                <?php if ( ! empty( $settings['badge'] ) ) : ?>
                  <span class="text-xs font-black uppercase tracking-wider text-greek-gold block">
                    <?php echo esc_html( $settings['badge'] ); ?>
                  </span>
                <?php endif; ?>
                <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] leading-tight break-words">
                  <?php echo esc_html( $settings['title'] ); ?>
                </h2>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  <?php echo esc_html( $settings['description'] ); ?>
                </p>

                <div class="pt-2 flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                  <button onclick="openCateringModal()" class="px-6 py-3.5 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover rounded-xl font-black text-xs shadow-lg transition text-center justify-center">
                    <?php echo esc_html( $settings['btn_text'] ); ?>
                  </button>
                  <button onclick="openContactModal()" class="px-6 py-3.5 border-2 border-[#101D3A] text-[#101D3A] hover:bg-[#101D3A] hover:text-white rounded-xl font-bold text-xs transition text-center justify-center">
                    Special Dietary Inquiries
                  </button>
                </div>
              </div>

              <!-- Responsive Showcase Image: Restrained on mobile, aspect-[16/10] on desktop -->
              <div class="w-full lg:w-1/2 rounded-3xl overflow-hidden shadow-2xl border border-slate-200 h-52 sm:h-64 lg:h-auto lg:aspect-[16/10] bg-slate-100">
                <img src="<?php echo esc_url( $img_url ); ?>" alt="Greek Fit Kitchen Catering" class="w-full h-full object-cover" />
              </div>

            </div>
          </div>
        </section>
        <?php
    }
}
