<?php
/**
 * Elementor Widget: Meal Plans & Interactive Builder
 * Fully editable in Elementor: badges, titles, descriptions, starter package details, tier cards repeater, and summary sidebar notes.
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Meal_Plans extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_meal_plans';
    }

    public function get_title() {
        return __( 'GFK Meal Plans & Builder', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-price-table';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    public function get_keywords() {
        return array( 'meal', 'plans', 'pricing', 'builder', 'tiers', 'packages', 'discount' );
    }

    protected function register_controls() {

        // ==========================================
        // SECTION 1: HEADER & LAYOUT MODE
        // ==========================================
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Meal Plan Content & Layout', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'display_style',
            array(
                'label'   => __( 'Layout Mode', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'builder',
                'options' => array(
                    'builder' => __( 'Interactive Plan Builder (Live Cart & Meal Selector)', 'greek-fit-kitchen' ),
                    'tiers'   => __( '3-Tier Value Cards (Pricing Highlights)', 'greek-fit-kitchen' ),
                ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Interactive Plan Builder', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Section Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'CUSTOMIZE YOUR WEEKLY MEAL PLAN', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => __( 'Select at least 6 meals to meet our minimum order requirement. When you select 7 or more meals, a 10% volume discount is automatically applied to your entire food order.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 2: 1-CLICK STARTER PACKAGE CARD
        // ==========================================
        $this->start_controls_section(
            'section_starter_card',
            array(
                'label'     => __( 'Starter Package Card', 'greek-fit-kitchen' ),
                'condition' => array(
                    'display_style' => 'builder',
                ),
            )
        );

        $this->add_control(
            'starter_badge',
            array(
                'label'   => __( 'Starter Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Fastest Way to Start', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'starter_title',
            array(
                'label'   => __( 'Starter Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( "Chef's 6-Meal Starter Package", 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'starter_desc',
            array(
                'label'   => __( 'Starter Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( '6 diverse plates (Pork souvlaki, chicken leg, chicken souvlaki, grilled chicken, veggie souvlaki & pasta al greco).', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'starter_price',
            array(
                'label'   => __( 'Starter Price (CAD)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '59.94',
            )
        );

        $this->add_control(
            'starter_btn_text',
            array(
                'label'   => __( 'Starter Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Load 6-Meal Pack', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'min_meals',
            array(
                'label'   => __( 'Minimum Meals Required', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::NUMBER,
                'default' => 6,
            )
        );

        $this->add_control(
            'discount_text',
            array(
                'label'   => __( 'Volume Discount Offer Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Save 10% automatically on 7+ meals', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: 3-TIER VALUE CARDS REPEATER
        // ==========================================
        $this->start_controls_section(
            'section_tiers',
            array(
                'label'     => __( '3-Tier Value Cards', 'greek-fit-kitchen' ),
                'condition' => array(
                    'display_style' => 'tiers',
                ),
            )
        );

        $tier_repeater = new \Elementor\Repeater();

        $tier_repeater->add_control(
            'badge',
            array(
                'label'   => __( 'Tier Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Tier 1 · Starter Plan', 'greek-fit-kitchen' ),
            )
        );

        $tier_repeater->add_control(
            'title',
            array(
                'label'   => __( 'Tier Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '6-Meal Package', 'greek-fit-kitchen' ),
            )
        );

        $tier_repeater->add_control(
            'desc',
            array(
                'label'   => __( 'Tier Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( 'Perfect introductory week. Starting from $59.94 CAD with 2 sides included.', 'greek-fit-kitchen' ),
            )
        );

        $tier_repeater->add_control(
            'is_featured',
            array(
                'label'        => __( 'Featured / Highlighted Card', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'no',
                'return_value' => 'yes',
            )
        );

        $tier_repeater->add_control(
            'feature_text',
            array(
                'label'   => __( 'Included Feature Note', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Includes 2 sides per plate', 'greek-fit-kitchen' ),
            )
        );

        $tier_repeater->add_control(
            'btn_text',
            array(
                'label'   => __( 'Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Choose Meals →', 'greek-fit-kitchen' ),
            )
        );

        $tier_repeater->add_control(
            'btn_url',
            array(
                'label'   => __( 'Button URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '#featuredMeals',
            )
        );

        $this->add_control(
            'tiers_list',
            array(
                'label'       => __( 'Tiers Cards List', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $tier_repeater->get_controls(),
                'default'     => array(
                    array(
                        'badge'        => __( 'Tier 1 · Starter Plan', 'greek-fit-kitchen' ),
                        'title'        => __( '6-Meal Package', 'greek-fit-kitchen' ),
                        'desc'         => __( 'Perfect introductory week. Starting from $59.94 CAD with 2 sides included.', 'greek-fit-kitchen' ),
                        'is_featured'  => 'no',
                        'feature_text' => __( 'Includes 2 sides per plate', 'greek-fit-kitchen' ),
                        'btn_text'     => __( 'Choose Meals →', 'greek-fit-kitchen' ),
                        'btn_url'      => '#featuredMeals',
                    ),
                    array(
                        'badge'        => __( 'Most Popular Value', 'greek-fit-kitchen' ),
                        'title'        => __( '7 to 9 Meals Plan', 'greek-fit-kitchen' ),
                        'desc'         => __( 'Automatically qualifies for 10% OFF entire food subtotal at checkout.', 'greek-fit-kitchen' ),
                        'is_featured'  => 'yes',
                        'feature_text' => __( 'Active 10% Discount', 'greek-fit-kitchen' ),
                        'btn_text'     => __( 'Build Plan →', 'greek-fit-kitchen' ),
                        'btn_url'      => '#featuredMeals',
                    ),
                    array(
                        'badge'        => __( 'Tier 3 · Maximum Fuel', 'greek-fit-kitchen' ),
                        'title'        => __( '10+ Meals Family / Athlete', 'greek-fit-kitchen' ),
                        'desc'         => __( 'Full weekly prep for couples or athletes. Full 10% volume savings on all plates.', 'greek-fit-kitchen' ),
                        'is_featured'  => 'no',
                        'feature_text' => __( 'Maximum Savings', 'greek-fit-kitchen' ),
                        'btn_text'     => __( 'Customize →', 'greek-fit-kitchen' ),
                        'btn_url'      => '#featuredMeals',
                    ),
                ),
                'title_field' => '{{{ title }}}',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( 'tiers' === $settings['display_style'] ) :
            $tiers = ! empty( $settings['tiers_list'] ) ? $settings['tiers_list'] : array();
            ?>
            <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="mealPlans">
              <div class="text-center max-w-3xl mx-auto mb-12">
                <?php if ( ! empty( $settings['badge'] ) ) : ?>
                  <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-1">
                    <?php echo esc_html( $settings['badge'] ); ?>
                  </span>
                <?php endif; ?>

                <?php if ( ! empty( $settings['title'] ) ) : ?>
                  <h2 class="text-xl xs:text-2xl sm:text-3xl lg:text-4xl font-black text-[#101D3A] dark:text-white break-words">
                    <?php echo esc_html( $settings['title'] ); ?>
                  </h2>
                <?php endif; ?>

                <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                  <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-300 mt-2">
                    <?php echo esc_html( $settings['subtitle'] ); ?>
                  </p>
                <?php endif; ?>
              </div>

              <!-- Highlight Value Cards -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <?php foreach ( $tiers as $t ) : 
                  $is_feat = ( isset( $t['is_featured'] ) && 'yes' === $t['is_featured'] );
                  $card_bg = $is_feat 
                    ? 'bg-[#101D3A] text-white border-white/10 shadow-lg relative overflow-hidden' 
                    : 'bg-white dark:bg-[#101D3A] text-[#101D3A] dark:text-white border-slate-200 dark:border-white/10 shadow-sm';
                  $badge_class = $is_feat 
                    ? 'inline-block px-2.5 py-0.5 rounded-full bg-greek-gold text-[#101D3A] text-[10px] font-black uppercase tracking-wider mb-2' 
                    : 'text-[11px] font-black uppercase tracking-wider text-greek-gold block mb-1';
                  $desc_class = $is_feat ? 'text-xs text-slate-300 mt-2' : 'text-xs text-slate-600 dark:text-slate-400 mt-2';
                ?>
                  <div class="<?php echo esc_attr( $card_bg ); ?> p-6 rounded-3xl border flex flex-col justify-between">
                    <?php if ( $is_feat ) : ?>
                      <div class="absolute -right-4 -top-4 w-24 h-24 bg-greek-gold/10 rounded-full blur-xl"></div>
                    <?php endif; ?>
                    <div>
                      <span class="<?php echo esc_attr( $badge_class ); ?>"><?php echo esc_html( $t['badge'] ); ?></span>
                      <h3 class="text-xl font-black"><?php echo esc_html( $t['title'] ); ?></h3>
                      <p class="<?php echo esc_attr( $desc_class ); ?>"><?php echo esc_html( $t['desc'] ); ?></p>
                    </div>
                    <div class="mt-6 pt-4 border-t border-slate-100 dark:border-white/10 flex items-center justify-between">
                      <span class="text-xs font-bold <?php echo $is_feat ? 'text-slate-300' : 'text-slate-500 dark:text-slate-400'; ?>">
                        <?php echo esc_html( $t['feature_text'] ); ?>
                      </span>
                      <a href="<?php echo esc_attr( ! empty( $t['btn_url'] ) ? $t['btn_url'] : '#featuredMeals' ); ?>" class="text-xs font-black text-greek-gold hover:underline">
                        <?php echo esc_html( $t['btn_text'] ); ?>
                      </a>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </section>
        <?php else : 
            // Default: Full Interactive Plan Builder matching build-plan.html
            require_once dirname( dirname( __DIR__ ) ) . '/inc/meals-data.php';
            $meals = gfk_get_meals();
            $min_meals = ! empty( $settings['min_meals'] ) ? intval( $settings['min_meals'] ) : 6;
            ?>
            <!-- ================= PLAN BUILDER PAGE HERO ================= -->
            <section class="bg-[#101D3A] text-white py-12 border-b border-white/10">
              <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-3xl space-y-3">
                  <?php if ( ! empty( $settings['badge'] ) ) : ?>
                    <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-greek-gold/20 text-greek-gold text-xs font-black uppercase tracking-wider border border-greek-gold/30">
                      <span><?php echo esc_html( $settings['badge'] ); ?></span>
                    </div>
                  <?php endif; ?>
                  <h1 class="text-3xl sm:text-5xl font-black uppercase text-white tracking-tight">
                    <?php echo esc_html( $settings['title'] ); ?>
                  </h1>
                  <?php if ( ! empty( $settings['subtitle'] ) ) : ?>
                    <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                      <?php echo esc_html( $settings['subtitle'] ); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>
            </section>

            <!-- ================= BUILDER MAIN CONTENT ================= -->
            <main class="flex-1 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 w-full">
              <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Left 2 Cols: Meal Selector & Builder Controls -->
                <div class="lg:col-span-2 space-y-6">
                  
                  <!-- Live Progress Status Bar -->
                  <div id="planBuilderStatusNotice" class="p-4 rounded-2xl bg-amber-500/10 border border-amber-500/30 text-amber-600 dark:text-amber-400 text-xs font-bold flex items-center justify-between">
                    <span>⚠️ Select at least <?php echo esc_html( $min_meals ); ?> meals. Add <span id="planRemainingCount"><?php echo esc_html( $min_meals ); ?></span> more to unlock delivery.</span>
                    <span class="font-mono text-xs"><span id="planSelectedCount">0</span> / <?php echo esc_html( $min_meals ); ?></span>
                  </div>

                  <!-- 1-Click Starter Plan Card -->
                  <div class="p-6 rounded-3xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="space-y-1 text-center sm:text-left">
                      <span class="text-[10px] uppercase font-black text-greek-gold tracking-wider"><?php echo esc_html( $settings['starter_badge'] ); ?></span>
                      <h3 class="font-black text-lg text-[#101D3A] dark:text-white"><?php echo esc_html( $settings['starter_title'] ); ?></h3>
                      <p class="text-xs text-slate-500 dark:text-slate-400">
                        <?php echo esc_html( $settings['starter_desc'] ); ?>
                      </p>
                      <div class="text-greek-gold font-mono font-black text-base">$<?php echo esc_html( $settings['starter_price'] ); ?> CAD</div>
                    </div>
                    <button type="button" onclick="window.addStarterSixMealPackage ? window.addStarterSixMealPackage() : (location.href='#featuredMeals')" class="px-6 py-3 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover rounded-xl text-xs font-black shadow whitespace-nowrap hover:scale-105 transition">
                      <?php echo esc_html( $settings['starter_btn_text'] ); ?>
                    </button>
                  </div>

                  <!-- Quick Categories Selector -->
                  <div class="flex flex-wrap items-center gap-2 pt-2">
                    <button onclick="filterBuilderCategory('all')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-[#101D3A] text-white">All (20)</button>
                    <button onclick="filterBuilderCategory('chicken')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-200">Poultry</button>
                    <button onclick="filterBuilderCategory('beef')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-200">Beef &amp; Steak</button>
                    <button onclick="filterBuilderCategory('fish')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-200">Fish / Salmon</button>
                    <button onclick="filterBuilderCategory('pork')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-200">Pork Plates</button>
                    <button onclick="filterBuilderCategory('vegetarian')" class="builder-cat-btn px-4 py-2 rounded-xl text-xs font-bold bg-slate-100 dark:bg-white/10 text-slate-700 dark:text-slate-300 hover:bg-slate-200">Vegetarian</button>
                  </div>

                  <!-- Dishes Grid for Selection -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4" id="builderMealsGrid">
                    <?php foreach ( $meals as $m ) : 
                      $img_url = gfk_get_asset_url( $m['image'] );
                    ?>
                      <div class="p-4 rounded-2xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 flex gap-4 items-center meal-builder-card" data-cat="<?php echo esc_attr( $m['category'] ); ?>" data-id="<?php echo esc_attr( $m['id'] ); ?>">
                        <img src="<?php echo esc_url( $img_url ); ?>" alt="<?php echo esc_attr( $m['name'] ); ?>" class="w-16 h-16 rounded-xl object-cover shrink-0" />
                        <div class="flex-1 min-w-0">
                          <h4 class="font-black text-sm text-[#101D3A] dark:text-white truncate"><?php echo esc_html( $m['name'] ); ?></h4>
                          <span class="text-xs font-mono font-bold text-greek-gold">$<?php echo esc_html( number_format( (float) $m['price'], 2 ) ); ?> CAD</span>
                          <span class="text-[11px] text-slate-400 block"><?php echo esc_html( $m['calories'] ); ?> kcal &middot; <?php echo esc_html( $m['protein'] ); ?></span>
                        </div>
                        <button type="button" onclick="window.addMealToCart ? window.addMealToCart('<?php echo esc_attr( $m['id'] ); ?>') : (location.href='#featuredMeals')" class="px-3 py-1.5 rounded-lg bg-[#101D3A] dark:bg-greek-gold text-white dark:text-[#101D3A] text-xs font-bold hover:opacity-90 shrink-0">
                          + Add
                        </button>
                      </div>
                    <?php endforeach; ?>
                  </div>

                </div>

                <!-- Right Col: Summary Card -->
                <div class="space-y-6">
                  <div class="p-6 rounded-3xl bg-[#FAF9F5] dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm space-y-4">
                    <h3 class="text-lg font-black text-[#101D3A] dark:text-white border-b border-slate-200 dark:border-white/10 pb-3">Plan Summary</h3>
                    <div class="space-y-2 text-xs text-slate-600 dark:text-slate-300">
                      <div class="flex justify-between">
                        <span>Selected Meals:</span>
                        <strong id="planSelectedTotal" class="font-mono text-[#101D3A] dark:text-white">0 meals</strong>
                      </div>
                      <div class="flex justify-between">
                        <span>Volume Discount:</span>
                        <strong class="text-greek-gold"><?php echo esc_html( $settings['discount_text'] ); ?></strong>
                      </div>
                      <div class="flex justify-between">
                        <span>Sides Included:</span>
                        <span class="font-bold text-greek-gold">2 per plate</span>
                      </div>
                    </div>
                    <a href="#featuredMeals" class="block w-full py-3.5 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover text-center font-black text-xs rounded-xl shadow transition">
                      Proceed to Review &amp; Sides →
                    </a>
                  </div>
                </div>

              </div>
            </main>
        <?php endif;
    }
}
