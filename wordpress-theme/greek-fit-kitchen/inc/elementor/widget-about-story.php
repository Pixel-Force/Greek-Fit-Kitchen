<?php
/**
 * Elementor Widget: About Chef & Brand Story
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_About_Story extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_about_story';
    }

    public function get_title() {
        return __( 'GFK About & Brand Story', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-person';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'About Story Content', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'ABOUT GREEK FIT KITCHEN', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Main Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Big Greek Flavour Meets Modern Meal Prep', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'story_p1',
            array(
                'label'   => __( 'First Paragraph', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Greek Fit Kitchen was established to bridge the gap between delicious Greek tavern cuisine and disciplined weekly meal preparation.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'story_p2',
            array(
                'label'   => __( 'Second Paragraph', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Managed by George the Greek at 3575 Lake Shore Blvd W in Etobicoke and powered by Lean Meal (leanmeal.ca), we prepare our marinades with extra virgin olive oil, mountain oregano, fresh garlic, and citrus. No shortcuts, no greasy takeaways — just clean, protein-packed fuel.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'image',
            array(
                'label'   => __( 'Story Photo', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/brand/about-greek-fit.jpg',
                ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $fallback = get_template_directory_uri() . '/assets/images/brand/about-greek-fit.jpg';
        $img_url  = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : $fallback;
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="aboutSection">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            
            <div class="space-y-4">
              <?php if ( ! empty( $settings['badge'] ) ) : ?>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block">
                  <?php echo esc_html( $settings['badge'] ); ?>
                </span>
              <?php endif; ?>
              <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] leading-tight break-words">
                <?php echo esc_html( $settings['title'] ); ?>
              </h2>
              <?php if ( ! empty( $settings['story_p1'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  <?php echo esc_html( $settings['story_p1'] ); ?>
                </p>
              <?php endif; ?>
              <?php if ( ! empty( $settings['story_p2'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-600 leading-relaxed">
                  <?php echo esc_html( $settings['story_p2'] ); ?>
                </p>
              <?php endif; ?>

              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs">
                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm">
                  <strong class="text-sm text-[#101D3A] font-black block mb-1">George the Greek</strong>
                  <span class="text-slate-500 leading-relaxed">Authentic tavern recipes &amp; culinary kitchen operations in Etobicoke.</span>
                </div>
                <div class="p-5 rounded-2xl bg-white border border-slate-200 shadow-sm">
                  <strong class="text-sm text-[#101D3A] font-black block mb-1">Powered by Lean Meal</strong>
                  <span class="text-slate-500 leading-relaxed">Professional meal-prep standards, nutritional discipline &amp; fresh batches.</span>
                </div>
              </div>
            </div>

            <!-- Responsive Story Image: Restrained on mobile, rounded card with shadow -->
            <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 bg-[#101D3A]">
              <img src="<?php echo esc_url( $img_url ); ?>" alt="Big Greek Flavour Meets Modern Meal Prep" class="w-full h-full object-cover block" />
            </div>

          </div>
        </section>
        <?php
    }
}
