<?php
/**
 * Elementor Widget: Site Footer
 * Enables visual drag-and-drop editing for the global site footer
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Site_Footer extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_site_footer';
    }

    public function get_title() {
        return __( 'GFK Global Footer', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-footer';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        // Section: Brand & About
        $this->start_controls_section(
            'section_brand',
            array(
                'label' => __( 'Brand & About Column', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'logo_image',
            array(
                'label'   => __( 'Footer Logo', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png',
                ),
            )
        );

        $this->add_control(
            'tagline_title',
            array(
                'label'   => __( 'Tagline Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'BIG GREEK FLAVOUR. ZERO MEAL PREP.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'tagline_description',
            array(
                'label'   => __( 'Tagline Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Chef-crafted authentic Greek meal preparation delivered directly to your home or office in Toronto & the GTA.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // Section: Delivery Column
        $this->start_controls_section(
            'section_delivery_col',
            array(
                'label' => __( 'Scheduled Delivery Column', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'delivery_col_title',
            array(
                'label'   => __( 'Column Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Scheduled Delivery', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'delivery_sun_text',
            array(
                'label'   => __( 'Sunday Delivery Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Order by Friday 12:00 PM', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'delivery_wed_text',
            array(
                'label'   => __( 'Wednesday Delivery Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Order by Monday 12:00 PM', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'delivery_note',
            array(
                'label'   => __( 'Delivery Note', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Strict weekly delivery batches guarantee peak freshness and zero food waste.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // Section: Kitchen & Location
        $this->start_controls_section(
            'section_location',
            array(
                'label' => __( 'Kitchen & Contact Column', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'kitchen_title',
            array(
                'label'   => __( 'Location Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'George the Greek', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'kitchen_address',
            array(
                'label'   => __( 'Address', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => "3575 Lake Shore Blvd W\nEtobicoke, ON M8W 1P5\nGreater Toronto Area",
            )
        );

        $this->add_control(
            'kitchen_note',
            array(
                'label'   => __( 'Pickup Note', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Free local customer pickup available during regular restaurant operating hours.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // Section: Copyright
        $this->start_controls_section(
            'section_copyright',
            array(
                'label' => __( 'Copyright Text', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'copyright_note',
            array(
                'label'   => __( 'Copyright Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'All rights reserved. Managed by George the Greek. Powered by Lean Meal.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $logo_url = ! empty( $settings['logo_image']['url'] ) ? $settings['logo_image']['url'] : ( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' );
        ?>
        <footer id="siteFooter" class="mt-auto bg-[#101D3A] text-white pt-14 pb-6 border-t border-white/10" aria-label="Site Footer">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 pb-12 border-b border-white/10 text-xs">
              
              <div class="space-y-4">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="inline-block" aria-label="<?php bloginfo( 'name' ); ?>">
                  <img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php bloginfo( 'name' ); ?>" width="180" height="44" class="h-10 w-auto" />
                </a>
                <p class="text-slate-300 leading-relaxed">
                  <strong class="text-white block font-black mb-1"><?php echo esc_html( $settings['tagline_title'] ); ?></strong>
                  <?php echo esc_html( $settings['tagline_description'] ); ?>
                </p>
                <div class="inline-block bg-white/10 px-3 py-1.5 rounded-lg text-[11px] text-greek-gold font-bold border border-white/10">
                  All prices in Canadian Dollars (CAD)
                </div>
              </div>

              <div class="space-y-3">
                <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">
                  <?php echo esc_html( ! empty( $settings['delivery_col_title'] ) ? $settings['delivery_col_title'] : 'Scheduled Delivery' ); ?>
                </h4>
                <ul class="space-y-2 text-slate-300">
                  <li><strong class="text-white">Sunday Delivery:</strong><br /><?php echo esc_html( $settings['delivery_sun_text'] ); ?></li>
                  <li><strong class="text-white">Wednesday Delivery:</strong><br /><?php echo esc_html( $settings['delivery_wed_text'] ); ?></li>
                  <li class="pt-1 text-slate-400"><?php echo esc_html( $settings['delivery_note'] ); ?></li>
                </ul>
              </div>

              <div class="space-y-3">
                <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">Explore</h4>
                <?php
                if ( has_nav_menu( 'footer' ) ) {
                    wp_nav_menu( array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'space-y-2 text-slate-300',
                        'fallback_cb'    => 'gfk_footer_menu_fallback',
                        'depth'          => 1,
                    ) );
                } else {
                    gfk_footer_menu_fallback();
                }
                ?>
              </div>

              <div class="space-y-3">
                <h4 class="text-xs font-black text-white uppercase tracking-wider text-greek-gold">Commercial Kitchen</h4>
                <p class="text-slate-300 leading-relaxed">
                  <strong class="text-white block"><?php echo esc_html( $settings['kitchen_title'] ); ?></strong>
                  <?php echo nl2br( esc_html( $settings['kitchen_address'] ) ); ?>
                </p>
                <div class="pt-2 text-[11px] text-slate-400">
                  <?php echo esc_html( $settings['kitchen_note'] ); ?>
                </div>
              </div>

            </div>

            <div class="py-5 text-center text-xs text-slate-400">
              <p>&copy; <?php echo esc_html( date( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php echo esc_html( $settings['copyright_note'] ); ?></p>
            </div>
            
            <!-- Penta Services Credit Bottom Bar (Mandatory Rule 2) -->
            <div class="border-t border-white/[0.08] py-4 mt-2">
              <div class="flex flex-wrap items-center justify-center gap-x-3.5 gap-y-2.5 text-center text-[13px] text-white/50">
                <span>Website designed &amp; developed by</span>
                <a href="https://pentaservices.co.uk/en/?utm_source=referral&amp;utm_medium=site-credit" target="_blank" rel="noopener noreferrer" title="Penta Services: web design, development, SEO &amp; AI" class="group inline-flex items-center">
                  <img alt="Penta Services" width="94" height="40" class="h-9 w-auto rounded-md opacity-90 transition group-hover:-translate-y-px group-hover:opacity-100" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/brand/penta-services-logo.svg' ); ?>" />
                </a>
                <span>Web design, SEO &amp; digital solutions · <a href="https://pentaservices.co.uk/en/?utm_source=referral&amp;utm_medium=site-credit" target="_blank" rel="noopener noreferrer" class="ltr text-white/75 hover:text-white underline-offset-2 hover:underline transition-colors">pentaservices.co.uk</a></span>
              </div>
            </div>
          </div>
        </footer>
        <?php
    }
}
