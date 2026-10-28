<?php
/**
 * Elementor Widget: Site Header
 * Enables visual drag-and-drop editing for the global site header
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Site_Header extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_site_header';
    }

    public function get_title() {
        return __( 'GFK Global Header', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-header';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        // Section: Announcement Bar
        $this->start_controls_section(
            'section_announcement',
            array(
                'label' => __( 'Top Announcement Bar', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'show_announcement',
            array(
                'label'        => __( 'Show Announcement Bar', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $this->add_control(
            'batch_cutoff_text',
            array(
                'label'   => __( 'Batch Delivery Cutoff Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sundays & Wednesdays', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'pickup_info_text',
            array(
                'label'   => __( 'Kitchen Pickup Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Free Kitchen Pickup: George the Greek (3575 Lake Shore Blvd W, Etobicoke, ON)', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // Section: Main Navigation Bar
        $this->start_controls_section(
            'section_main_header',
            array(
                'label' => __( 'Header Bar & CTA', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'logo_image',
            array(
                'label'   => __( 'Custom Logo Image', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png',
                ),
            )
        );

        $this->add_control(
            'cta_button_text',
            array(
                'label'   => __( 'CTA Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Build Your Plan', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'cta_button_url',
            array(
                'label'   => __( 'CTA Button URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => home_url( '/meal-plans/' ),
            )
        );

        $this->add_control(
            'show_cart_icon',
            array(
                'label'        => __( 'Show Cart Button', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $logo_url = ! empty( $settings['logo_image']['url'] ) ? $settings['logo_image']['url'] : ( get_template_directory_uri() . '/assets/images/brand/greek-fit-kitchen-logo.png' );
        $cta_text = ! empty( $settings['cta_button_text'] ) ? $settings['cta_button_text'] : 'Build Your Plan';
        $cta_url  = ! empty( $settings['cta_button_url'] ) ? $settings['cta_button_url'] : home_url( '/meal-plans/' );
        ?>

        <?php if ( 'yes' === $settings['show_announcement'] ) : ?>
          <aside class="bg-[#0C172E] text-white text-[11px] font-semibold py-2 px-4 border-b border-white/10" aria-label="Announcement">
            <div class="max-w-7xl mx-auto flex flex-col sm:flex-row items-center justify-between gap-1.5 text-center sm:text-left">
              <div class="flex items-center gap-2">
                <span class="inline-block w-2 h-2 rounded-full bg-greek-lime animate-pulse"></span>
                <span class="text-white/80">Batch Delivery:</span>
                <span id="cutoffCountdown" class="text-greek-gold font-bold"><?php echo esc_html( $settings['batch_cutoff_text'] ); ?></span>
              </div>
              <div class="text-white/70 text-[10px] hidden sm:block">
                <?php echo esc_html( $settings['pickup_info_text'] ); ?>
              </div>
            </div>
          </aside>
        <?php endif; ?>

        <header id="siteHeader" class="sticky top-0 z-40 w-full bg-[#101D3A] text-white border-b border-white/10 shadow-md">
          <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between gap-4">
            
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="flex items-center gap-3 group focus:outline-none shrink-0" aria-label="<?php bloginfo( 'name' ); ?>">
              <img 
                src="<?php echo esc_url( $logo_url ); ?>" 
                alt="<?php bloginfo( 'name' ); ?>" 
                width="200" 
                height="48"
                class="h-11 sm:h-12 w-auto max-w-[190px] sm:max-w-[210px] object-contain drop-shadow" 
              />
            </a>

            <nav class="hidden lg:flex items-center gap-6 font-semibold text-xs uppercase tracking-wider text-white/90" aria-label="Primary Navigation">
              <?php
              if ( has_nav_menu( 'primary' ) ) {
                  wp_nav_menu( array(
                      'theme_location' => 'primary',
                      'container'      => false,
                      'menu_class'     => 'flex items-center gap-6',
                      'fallback_cb'    => 'gfk_primary_menu_fallback',
                      'items_wrap'     => '%3$s',
                      'depth'          => 2,
                  ) );
              } else {
                  gfk_primary_menu_fallback();
              }
              ?>
            </nav>

            <div class="flex items-center gap-3 shrink-0">
              <?php if ( 'yes' === $settings['show_cart_icon'] ) : ?>
                <button 
                  onclick="openCartDrawer()"
                  type="button" 
                  aria-label="View Shopping Cart"
                  class="relative p-2.5 rounded-full bg-white/10 hover:bg-white/20 text-white transition-all border border-white/20 flex items-center justify-center focus:outline-none active:scale-95"
                >
                  <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                  </svg>
                  <span id="headerCartCount" class="cart-count-badge absolute -top-1 -right-1 w-5 h-5 bg-greek-gold text-[#101D3A] text-[10px] font-black rounded-full flex items-center justify-center border-2 border-[#101D3A] shadow">
                    0
                  </span>
                </button>
              <?php endif; ?>

              <a href="<?php echo esc_url( $cta_url ); ?>" class="hidden sm:inline-flex items-center gap-1.5 py-2.5 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
                <span><?php echo esc_html( $cta_text ); ?></span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                </svg>
              </a>

              <button id="mobileMenuBtn" type="button" aria-label="Open Mobile Menu" class="lg:hidden p-2 text-white rounded-lg hover:bg-white/10 transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
              </button>
            </div>
          </div>

          <div id="mobileMenuDrawer" class="hidden lg:hidden border-t border-white/10 bg-[#101D3A] px-5 py-5 space-y-4">
            <nav class="flex flex-col space-y-3 text-sm font-semibold text-white">
              <?php
              if ( has_nav_menu( 'primary' ) ) {
                  wp_nav_menu( array(
                      'theme_location' => 'primary',
                      'container'      => false,
                      'menu_class'     => 'flex flex-col space-y-3',
                      'fallback_cb'    => 'gfk_mobile_menu_fallback',
                  ) );
              } else {
                  gfk_mobile_menu_fallback();
              }
              ?>
            </nav>
            <div class="pt-4 border-t border-white/10">
              <a href="<?php echo esc_url( $cta_url ); ?>" class="w-full inline-flex items-center justify-center gap-1.5 py-3 px-4 rounded-xl font-black text-xs bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover transition shadow">
                <span><?php echo esc_html( $cta_text ); ?></span>
              </a>
            </div>
          </div>
        </header>
        <?php
    }
}
