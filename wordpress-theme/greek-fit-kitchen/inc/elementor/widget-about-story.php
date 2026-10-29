<?php
/**
 * Elementor Widget: About Chef & Brand Story
 * Fully editable in Elementor: headings, texts, cards, stats, button, and image.
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

    public function get_keywords() {
        return array( 'about', 'story', 'chef', 'george', 'greek', 'brand', 'bio' );
    }

    protected function register_controls() {

        // ==========================================
        // SECTION 1: MAIN HEADLINE & STORY TEXT
        // ==========================================
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Headlines & Story Paragraphs', 'greek-fit-kitchen' ),
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
                'rows'    => 4,
                'default' => __( 'Greek Fit Kitchen was established to bridge the gap between delicious Greek tavern cuisine and disciplined weekly meal preparation.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'story_p2',
            array(
                'label'   => __( 'Second Paragraph', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 4,
                'default' => __( 'Managed by George the Greek at 3575 Lake Shore Blvd W in Etobicoke and powered by Lean Meal (leanmeal.ca), we prepare our marinades with extra virgin olive oil, mountain oregano, fresh garlic, and citrus. No shortcuts, no greasy takeaways — just clean, protein-packed fuel.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'image',
            array(
                'label'   => __( 'Story Photo / Image', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/brand/about-greek-fit.jpg',
                ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 2: EDITABLE HIGHLIGHT CARDS
        // ==========================================
        $this->start_controls_section(
            'section_cards',
            array(
                'label' => __( 'Highlight Feature Cards', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'card_1_title',
            array(
                'label'   => __( 'Card 1 Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'George the Greek', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'card_1_desc',
            array(
                'label'   => __( 'Card 1 Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( 'Authentic tavern recipes & culinary kitchen operations in Etobicoke.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'card_2_title',
            array(
                'label'   => __( 'Card 2 Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Powered by Lean Meal', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'card_2_desc',
            array(
                'label'   => __( 'Card 2 Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( 'Professional meal-prep standards, nutritional discipline & fresh batches.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: EDITABLE STATS COUNTERS
        // ==========================================
        $this->start_controls_section(
            'section_stats',
            array(
                'label' => __( 'Key Stats / Numbers', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'show_stats',
            array(
                'label'        => __( 'Display Stats Row', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $this->add_control(
            'stat_1_num',
            array(
                'label'     => __( 'Stat 1 Number / Value', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '6',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_1_lbl',
            array(
                'label'     => __( 'Stat 1 Label', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Min Meals Plan',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_2_num',
            array(
                'label'     => __( 'Stat 2 Number / Value', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '10%',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_2_lbl',
            array(
                'label'     => __( 'Stat 2 Label', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Off 7+ Meals',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_3_num',
            array(
                'label'     => __( 'Stat 3 Number / Value', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '2',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_3_lbl',
            array(
                'label'     => __( 'Stat 3 Label', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Sides Per Meal',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_4_num',
            array(
                'label'     => __( 'Stat 4 Number / Value', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => '100%',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->add_control(
            'stat_4_lbl',
            array(
                'label'     => __( 'Stat 4 Label', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => 'Fresh Prepared',
                'condition' => array( 'show_stats' => 'yes' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $fallback = get_template_directory_uri() . '/assets/images/brand/about-greek-fit.jpg';
        $img_url  = ! empty( $settings['image']['url'] ) ? $settings['image']['url'] : $fallback;
        $show_stats = isset( $settings['show_stats'] ) && 'yes' === $settings['show_stats'];
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="aboutSection">
          <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-14 items-center">
            
            <div class="space-y-4">
              <?php if ( ! empty( $settings['badge'] ) ) : ?>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block">
                  <?php echo esc_html( $settings['badge'] ); ?>
                </span>
              <?php endif; ?>

              <?php if ( ! empty( $settings['title'] ) ) : ?>
                <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] dark:text-white leading-tight break-words">
                  <?php echo esc_html( $settings['title'] ); ?>
                </h2>
              <?php endif; ?>

              <?php if ( ! empty( $settings['story_p1'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                  <?php echo esc_html( $settings['story_p1'] ); ?>
                </p>
              <?php endif; ?>

              <?php if ( ! empty( $settings['story_p2'] ) ) : ?>
                <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 leading-relaxed">
                  <?php echo esc_html( $settings['story_p2'] ); ?>
                </p>
              <?php endif; ?>

              <!-- Highlight Cards -->
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 pt-2 text-xs">
                <?php if ( ! empty( $settings['card_1_title'] ) || ! empty( $settings['card_1_desc'] ) ) : ?>
                  <div class="p-5 rounded-2xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm">
                    <?php if ( ! empty( $settings['card_1_title'] ) ) : ?>
                      <strong class="text-sm text-[#101D3A] dark:text-white font-black block mb-1">
                        <?php echo esc_html( $settings['card_1_title'] ); ?>
                      </strong>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['card_1_desc'] ) ) : ?>
                      <span class="text-slate-500 dark:text-slate-400 leading-relaxed">
                        <?php echo esc_html( $settings['card_1_desc'] ); ?>
                      </span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

                <?php if ( ! empty( $settings['card_2_title'] ) || ! empty( $settings['card_2_desc'] ) ) : ?>
                  <div class="p-5 rounded-2xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm">
                    <?php if ( ! empty( $settings['card_2_title'] ) ) : ?>
                      <strong class="text-sm text-[#101D3A] dark:text-white font-black block mb-1">
                        <?php echo esc_html( $settings['card_2_title'] ); ?>
                      </strong>
                    <?php endif; ?>
                    <?php if ( ! empty( $settings['card_2_desc'] ) ) : ?>
                      <span class="text-slate-500 dark:text-slate-400 leading-relaxed">
                        <?php echo esc_html( $settings['card_2_desc'] ); ?>
                      </span>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>
              </div>

              <!-- Stats Counters Row -->
              <?php if ( $show_stats ) : ?>
                <div class="grid grid-cols-4 gap-2 pt-4 border-t border-slate-100 dark:border-white/10 text-center">
                  <div>
                    <div class="font-mono text-xl sm:text-2xl font-black text-greek-gold">
                      <?php echo esc_html( $settings['stat_1_num'] ); ?>
                    </div>
                    <div class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider">
                      <?php echo esc_html( $settings['stat_1_lbl'] ); ?>
                    </div>
                  </div>
                  <div>
                    <div class="font-mono text-xl sm:text-2xl font-black text-greek-gold">
                      <?php echo esc_html( $settings['stat_2_num'] ); ?>
                    </div>
                    <div class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider">
                      <?php echo esc_html( $settings['stat_2_lbl'] ); ?>
                    </div>
                  </div>
                  <div>
                    <div class="font-mono text-xl sm:text-2xl font-black text-greek-gold">
                      <?php echo esc_html( $settings['stat_3_num'] ); ?>
                    </div>
                    <div class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider">
                      <?php echo esc_html( $settings['stat_3_lbl'] ); ?>
                    </div>
                  </div>
                  <div>
                    <div class="font-mono text-xl sm:text-2xl font-black text-greek-gold">
                      <?php echo esc_html( $settings['stat_4_num'] ); ?>
                    </div>
                    <div class="text-[10px] sm:text-xs text-slate-500 dark:text-slate-400 font-bold uppercase tracking-wider">
                      <?php echo esc_html( $settings['stat_4_lbl'] ); ?>
                    </div>
                  </div>
                </div>
              <?php endif; ?>

            </div>

            <!-- Responsive Story Image: Restrained on mobile, rounded card with shadow -->
            <div class="rounded-3xl overflow-hidden shadow-2xl border border-slate-200 dark:border-white/10 bg-[#101D3A] aspect-[4/3] sm:aspect-auto">
              <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>" class="w-full h-full object-cover block" />
            </div>

          </div>
        </section>
        <?php
    }
}
