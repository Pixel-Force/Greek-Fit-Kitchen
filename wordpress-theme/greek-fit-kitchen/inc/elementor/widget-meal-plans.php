<?php
/**
 * Elementor Widget: Meal Plans & Interactive Builder
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

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Meal Plan Builder Content', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'display_style',
            array(
                'label'   => __( 'Layout Mode', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'builder',
                'options' => array(
                    'builder' => __( 'Interactive Plan Builder (build-plan.html)', 'greek-fit-kitchen' ),
                    'tiers'   => __( '3-Tier Value Cards', 'greek-fit-kitchen' ),
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
                'default' => __( 'Select at least 6 meals to meet our minimum order requirement. When you select 7 or more meals, a 10% volume discount is automatically applied to your entire food order.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'starter_title',
            array(
                'label'     => __( 'Starter Package Title', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXT,
                'default'   => __( "Chef's 6-Meal Starter Package", 'greek-fit-kitchen' ),
                'condition' => array(
                    'display_style' => 'builder',
                ),
            )
        );

        $this->add_control(
            'starter_desc',
            array(
                'label'     => __( 'Starter Package Description', 'greek-fit-kitchen' ),
                'type'      => \Elementor\Controls_Manager::TEXTAREA,
                'default'   => __( '6 diverse plates (Pork souvlaki, chicken leg, chicken souvlaki, grilled chicken, veggie souvlaki & pasta al greco).', 'greek-fit-kitchen' ),
                'condition' => array(
                    'display_style' => 'builder',
                ),
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
                'label'   => __( 'Volume Discount Offer', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Save 10% automatically on 7+ meals', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();

        if ( 'tiers' === $settings['display_style'] ) :
            // 3-Tier Value Cards Layout
            ?>
            <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="mealPlans">
              <div class="text-center max-w-3xl mx-auto mb-12">
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

              <!-- Highlight Value Cards -->
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
                  <div>
                    <span class="text-[11px] font-black uppercase tracking-wider text-greek-gold block mb-1">Tier 1 · Starter Plan</span>
                    <h3 class="text-xl font-black text-[#101D3A]">6-Meal Package</h3>
                    <p class="text-xs text-slate-600 mt-2">Perfect introductory week. Starting from <strong class="text-[#101D3A] font-bold font-mono">$<?php echo esc_html( $settings['starter_price'] ); ?> CAD</strong>.</p>
                  </div>
                  <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Includes 2 sides per plate</span>
                    <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Choose Meals →</a>
                  </div>
                </div>

                <div class="bg-[#101D3A] text-white p-6 rounded-3xl border border-white/10 shadow-lg relative overflow-hidden flex flex-col justify-between">
                  <div class="absolute -right-4 -top-4 w-24 h-24 bg-greek-gold/10 rounded-full blur-xl"></div>
                  <div>
                    <div class="inline-block px-2.5 py-0.5 rounded-full bg-greek-gold text-[#101D3A] text-[10px] font-black uppercase tracking-wider mb-2">Most Popular Value</div>
                    <h3 class="text-xl font-black text-white">7 to 9 Meals Plan</h3>
                    <p class="text-xs text-slate-300 mt-2">Automatically qualifies for <strong class="text-greek-gold font-bold">10% OFF</strong> entire food subtotal at checkout.</p>
                  </div>
                  <div class="mt-6 pt-4 border-t border-white/10 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-300">Active 10% Discount</span>
                    <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Build Plan →</a>
                  </div>
                </div>

                <div class="bg-white p-6 rounded-3xl border border-slate-200 shadow-sm flex flex-col justify-between">
                  <div>
                    <span class="text-[11px] font-black uppercase tracking-wider text-greek-gold block mb-1">Tier 3 · Maximum Fuel</span>
                    <h3 class="text-xl font-black text-[#101D3A]">10+ Meals Family / Athlete</h3>
                    <p class="text-xs text-slate-600 mt-2">Full weekly prep for couples or athletes. Full 10% volume savings on all plates.</p>
                  </div>
                  <div class="mt-6 pt-4 border-t border-slate-100 flex items-center justify-between">
                    <span class="text-xs font-bold text-slate-500">Maximum Savings</span>
                    <a href="<?php echo esc_url( home_url( '/meal-plans/' ) ); ?>" class="text-xs font-black text-greek-gold hover:underline">Customize →</a>
                  </div>
                </div>
              </div>

            </section>
        <?php else : 
            // Default: Full Interactive Plan Builder matching build-plan.html
            require_once dirname( dirname( __DIR__ ) ) . '/inc/meals-data.php';
            $meals = gfk_get_meals();
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
                    <span>⚠️ Select at least <?php echo esc_html( $settings['min_meals'] ); ?> meals. Add <?php echo esc_html( $settings['min_meals'] ); ?> more to unlock delivery.</span>
                    <span class="font-mono text-xs">0 / <?php echo esc_html( $settings['min_meals'] ); ?></span>
                  </div>

                  <!-- 1-Click Starter Plan Card -->
                  <div class="p-6 rounded-3xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col sm:flex-row items-center justify-between gap-4">
                    <div class="space-y-1 text-center sm:text-left">
                      <span class="text-[10px] uppercase font-black text-greek-gold tracking-wider">Fastest Way to Start</span>
                      <h3 class="font-black text-lg text-[#101D3A] dark:text-white"><?php echo esc_html( $settings['starter_title'] ); ?></h3>
                      <p class="text-xs text-slate-500 dark:text-slate-400">
                        <?php echo esc_html( $settings['starter_desc'] ); ?>
                      </p>
                      <div class="text-greek-gold font-mono font-black text-base">$<?php echo esc_html( $settings['starter_price'] ); ?> CAD</div>
                    </div>
                    <button type="button" onclick="addStarterSixMealPackage()" class="px-6 py-3 btn-gold rounded-xl text-xs font-black shadow whitespace-nowrap hover:scale-105 transition">
                      Load 6-Meal Pack
                    </button>
                  </div>

                  <!-- Selected Plates in Active Plan -->
                  <div class="p-6 rounded-3xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm space-y-4">
                    <div class="flex items-center justify-between border-b border-slate-100 dark:border-white/5 pb-3">
                      <div>
                        <h3 class="font-black text-base text-[#101D3A] dark:text-white">Plates Selected in Plan</h3>
                        <span class="text-[11px] text-slate-400">Each plate includes 2 sides (except Pasta al Greco)</span>
                      </div>
                      <button type="button" onclick="clearCart()" class="text-xs text-red-500 hover:underline font-bold">Clear All</button>
                    </div>

                    <div id="planBuilderSelectedList" class="space-y-2.5">
                      <div class="py-8 text-center text-slate-400 text-xs">
                        <p>No meals selected yet.</p>
                        <p class="mt-1">Browse the menu cards below and customize your sides!</p>
                      </div>
                    </div>
                  </div>

                  <!-- Add More Meals Strip (Full Menu Quick Cards) -->
                  <div class="space-y-4">
                    <div class="flex items-center justify-between">
                      <h3 class="font-black text-lg text-[#101D3A] dark:text-white">Add Meals from Our Kitchen</h3>
                      <a href="<?php echo esc_url( home_url( '/menu/' ) ); ?>" class="text-xs font-bold text-greek-gold hover:underline">View Menu Details →</a>
                    </div>

                    <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                      <?php foreach ( $meals as $meal ) : ?>
                        <div class="bg-white rounded-3xl border border-slate-200 overflow-hidden shadow-sm hover:shadow-md transition flex flex-col justify-between">
                          <div class="relative h-44 sm:h-48 overflow-hidden bg-slate-100">
                            <img src="<?php echo esc_url( $meal['image'] ); ?>" alt="<?php echo esc_attr( $meal['name'] ); ?>" class="w-full h-full object-cover">
                            <span class="absolute bottom-2.5 right-2.5 px-2.5 py-1 rounded-full bg-[#101D3A]/90 text-white font-mono font-bold text-xs backdrop-blur-sm">$<?php echo esc_html( number_format( (float) $meal['price'], 2 ) ); ?> CAD</span>
                            <?php if ( ! empty( $meal['isPopular'] ) ) : ?>
                              <span class="absolute top-2.5 right-2.5 px-2 py-0.5 rounded-full bg-greek-gold text-[#101D3A] font-black text-[10px] uppercase">Popular</span>
                            <?php endif; ?>
                            <span class="absolute top-2.5 left-2.5 px-2 py-0.5 rounded-full bg-white text-slate-800 border border-slate-200 font-bold text-[10px] shadow-sm">2 Sides Included</span>
                          </div>
                          <div class="p-4 flex-1 flex flex-col justify-between space-y-3">
                            <div>
                              <h4 class="font-black text-base text-[#101D3A]"><?php echo esc_html( $meal['name'] ); ?></h4>
                              <p class="text-xs text-slate-600 line-clamp-2 mt-1"><?php echo esc_html( $meal['description'] ); ?></p>
                            </div>
                            <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                              <div class="text-[11px] font-mono text-slate-500"><?php echo esc_html( $meal['calories'] ); ?> kcal · <?php echo esc_html( $meal['protein'] ); ?>g protein</div>
                              <button type="button" onclick="openSideModal('<?php echo esc_js( $meal['id'] ); ?>')" class="px-3 py-1.5 btn-gold rounded-xl text-xs font-black shadow hover:scale-105 transition">Add Plate +</button>
                            </div>
                          </div>
                        </div>
                      <?php endforeach; ?>
                    </div>
                  </div>

                </div>

                <!-- Right 1 Col: Sticky Live Summary & Checkout Action -->
                <div class="lg:col-span-1">
                  <div class="sticky top-28 p-6 rounded-3xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-2xl space-y-5">
                    <div class="border-b border-slate-200 dark:border-white/10 pb-4">
                      <span class="text-[10px] uppercase font-black text-greek-gold tracking-wider">Live Calculation</span>
                      <h3 class="text-xl font-black text-[#101D3A] dark:text-white">Order Summary (CAD)</h3>
                    </div>

                    <div class="space-y-3 text-xs">
                      <div class="flex justify-between">
                        <span class="text-slate-500">Total Meals</span>
                        <strong id="planBuilderCount" class="font-mono text-[#101D3A] dark:text-white font-bold">0 of <?php echo esc_html( $settings['min_meals'] ); ?> meals</strong>
                      </div>

                      <div class="flex justify-between">
                        <span class="text-slate-500">Food Subtotal</span>
                        <span id="planBuilderSubtotal" class="font-mono font-bold text-slate-800 dark:text-slate-200">$0.00 CAD</span>
                      </div>

                      <div class="flex justify-between text-greek-lime font-bold hidden">
                        <span>10% Volume Savings (7+ Meals)</span>
                        <span id="planBuilderDiscount" class="font-mono">-$0.00 CAD</span>
                      </div>

                      <div class="flex justify-between">
                        <span class="text-slate-500">Estimated Delivery</span>
                        <span class="font-mono text-slate-800 dark:text-slate-200 font-bold">$10.94 CAD</span>
                      </div>

                      <div class="flex justify-between">
                        <span class="text-slate-500">Ontario HST (13%)</span>
                        <span class="font-mono text-slate-800 dark:text-slate-200 font-bold">Calculated at checkout</span>
                      </div>

                      <div class="pt-3 border-t border-slate-200 dark:border-white/10 flex justify-between items-baseline">
                        <span class="font-black text-sm text-[#101D3A] dark:text-white">Estimated Total:</span>
                        <span id="planBuilderGrandTotal" class="font-mono text-2xl font-black text-[#101D3A] dark:text-greek-gold">$0.00 CAD</span>
                      </div>
                    </div>

                    <button 
                      type="button"
                      id="planBuilderCtaBtn"
                      onclick="openCartDrawer()"
                      class="w-full py-4 btn-gold rounded-2xl font-black text-sm shadow-xl flex items-center justify-center gap-2 text-center hover:scale-[1.02] transition"
                    >
                      <span>Proceed to Scheduled Checkout →</span>
                    </button>

                    <div class="p-3.5 rounded-2xl bg-slate-50 dark:bg-white/5 border border-slate-200 dark:border-white/10 text-[11px] text-slate-500 dark:text-slate-400 space-y-1">
                      <div>✓ Minimum order: <strong><?php echo esc_html( $settings['min_meals'] ); ?> meals</strong></div>
                      <div>✓ Sunday Delivery: Order by Friday 12 p.m.</div>
                      <div>✓ Wednesday Delivery: Order by Monday 12 p.m.</div>
                      <div>✓ Free store pickup at George the Greek</div>
                    </div>
                  </div>
                </div>

              </div>

            </main>
        <?php endif;
    }
}
