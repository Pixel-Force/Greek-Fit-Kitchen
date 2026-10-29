<?php
/**
 * Elementor Widget: Delivery Rates & Calculator
 * Fully editable in Elementor: badges, schedule texts, cutoff times, pricing rates, and estimator texts.
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class GFK_Widget_Delivery_Calculator extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_delivery_calculator';
    }

    public function get_title() {
        return __( 'GFK Delivery Rates & Calculator', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-map-pin';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    public function get_keywords() {
        return array( 'delivery', 'rates', 'calculator', 'schedule', 'cutoff', 'shipping', 'toronto' );
    }

    protected function register_controls() {

        // ==========================================
        // SECTION 1: HEADER
        // ==========================================
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Section Header', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'SCHEDULED BATCH DISPATCH', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Section Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Delivery Schedule & Rates', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => __( 'Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 2,
                'default' => __( 'Greek Fit Kitchen operates scheduled batch deliveries on Sundays & Wednesdays across Toronto and the GTA.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 2: SCHEDULE CARD TEXTS
        // ==========================================
        $this->start_controls_section(
            'section_schedule_card',
            array(
                'label' => __( 'Batch Schedule Card', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'schedule_badge',
            array(
                'label'   => __( 'Schedule Sub-Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Toronto & GTA Delivery Schedule', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'schedule_heading',
            array(
                'label'   => __( 'Schedule Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Twice-Weekly Fresh Batches', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'schedule_desc',
            array(
                'label'   => __( 'Schedule Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => __( 'Meals are cooked and blast-chilled immediately prior to scheduled dispatch to lock in taverna-quality freshness, tenderness, and aroma.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'batch_1_day',
            array(
                'label'   => __( 'Batch 1 Tag (e.g. SUN)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'SUN',
            )
        );

        $this->add_control(
            'batch_1_title',
            array(
                'label'   => __( 'Batch 1 Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Sunday Batch Delivery', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'batch_1_cutoff',
            array(
                'label'   => __( 'Batch 1 Cutoff Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Friday at 12:00 PM (noon) Toronto time', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'batch_2_day',
            array(
                'label'   => __( 'Batch 2 Tag (e.g. WED)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'WED',
            )
        );

        $this->add_control(
            'batch_2_title',
            array(
                'label'   => __( 'Batch 2 Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Wednesday Batch Delivery', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'batch_2_cutoff',
            array(
                'label'   => __( 'Batch 2 Cutoff Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Monday at 12:00 PM (noon) Toronto time', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'pickup_label',
            array(
                'label'   => __( 'Store Pickup Note', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Free local pickup @ George the Greek (Etobicoke)', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'pickup_rate',
            array(
                'label'   => __( 'Store Pickup Rate', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( '0 km = $0.00 Delivery', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: DISTANCE CALCULATOR CARD
        // ==========================================
        $this->start_controls_section(
            'section_calc_card',
            array(
                'label' => __( 'Interactive Estimator Card & Rates', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_badge',
            array(
                'label'   => __( 'Estimator Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Interactive Delivery Estimator', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_heading',
            array(
                'label'   => __( 'Estimator Headline', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Distance-Based Delivery Pricing', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_kitchen_address',
            array(
                'label'   => __( 'Kitchen Origin Address', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '3575 Lake Shore Blvd W, Etobicoke',
            )
        );

        $this->add_control(
            'tier_1_fee',
            array(
                'label'       => __( 'Up to 2 km Fee (CAD)', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '0.00',
                'description' => __( 'Delivery fee for distances up to 2.0 km (Free delivery)', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'tier_2_fee',
            array(
                'label'       => __( 'Over 2 km up to 5 km Fee (CAD)', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '5.00',
                'description' => __( 'Flat delivery fee between 2.0 km and 5.0 km', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'tier_3_rate',
            array(
                'label'       => __( 'Over 5 km Rate per KM (CAD)', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => '1.00',
                'description' => __( 'Rate charged per km for orders beyond 5.0 km', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_input_label',
            array(
                'label'   => __( 'Input Field Label', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Enter Postal Code or Distance (KM)', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_placeholder',
            array(
                'label'   => __( 'Input Placeholder', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'e.g. M8W 1P5 or 8 km',
            )
        );

        $this->add_control(
            'calc_btn_text',
            array(
                'label'   => __( 'Calculate Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Calculate', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_cta_text',
            array(
                'label'   => __( 'Bottom CTA Link Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Start Your Order with 6+ Meals →', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'calc_cta_url',
            array(
                'label'   => __( 'Bottom CTA Link URL', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::URL,
                'default' => array(
                    'url' => '#featuredMeals',
                ),
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $cta_url  = ! empty( $settings['calc_cta_url']['url'] ) ? $settings['calc_cta_url']['url'] : '#featuredMeals';
        $tier_1   = ! empty( $settings['tier_1_fee'] ) ? floatval( $settings['tier_1_fee'] ) : 0.00;
        $tier_2   = ! empty( $settings['tier_2_fee'] ) ? floatval( $settings['tier_2_fee'] ) : 5.00;
        $tier_3   = ! empty( $settings['tier_3_rate'] ) ? floatval( $settings['tier_3_rate'] ) : 1.00;
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="deliverySection">
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

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- Delivery Schedules -->
            <div class="p-8 rounded-3xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 shadow-sm flex flex-col justify-between">
              <div>
                <?php if ( ! empty( $settings['schedule_badge'] ) ) : ?>
                  <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">
                    <?php echo esc_html( $settings['schedule_badge'] ); ?>
                  </span>
                <?php endif; ?>

                <?php if ( ! empty( $settings['schedule_heading'] ) ) : ?>
                  <h3 class="text-2xl font-black text-[#101D3A] dark:text-white mb-4">
                    <?php echo esc_html( $settings['schedule_heading'] ); ?>
                  </h3>
                <?php endif; ?>

                <?php if ( ! empty( $settings['schedule_desc'] ) ) : ?>
                  <p class="text-xs text-slate-600 dark:text-slate-300 leading-relaxed mb-6">
                    <?php echo esc_html( $settings['schedule_desc'] ); ?>
                  </p>
                <?php endif; ?>

                <div class="space-y-4">
                  <div class="p-4 rounded-2xl bg-[#FAF9F5] dark:bg-white/5 border border-slate-200 dark:border-white/10 flex items-start gap-4">
                    <span class="w-10 h-10 rounded-xl bg-[#101D3A] dark:bg-greek-gold text-white dark:text-[#101D3A] flex items-center justify-center font-black text-sm shrink-0">
                      <?php echo esc_html( $settings['batch_1_day'] ); ?>
                    </span>
                    <div>
                      <h4 class="text-sm font-black text-[#101D3A] dark:text-white">
                        <?php echo esc_html( $settings['batch_1_title'] ); ?>
                      </h4>
                      <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                        Order cutoff: <strong class="text-[#101D3A] dark:text-greek-gold"><?php echo esc_html( $settings['batch_1_cutoff'] ); ?></strong>
                      </p>
                    </div>
                  </div>

                  <div class="p-4 rounded-2xl bg-[#FAF9F5] dark:bg-white/5 border border-slate-200 dark:border-white/10 flex items-start gap-4">
                    <span class="w-10 h-10 rounded-xl bg-[#101D3A] dark:bg-greek-gold text-white dark:text-[#101D3A] flex items-center justify-center font-black text-sm shrink-0">
                      <?php echo esc_html( $settings['batch_2_day'] ); ?>
                    </span>
                    <div>
                      <h4 class="text-sm font-black text-[#101D3A] dark:text-white">
                        <?php echo esc_html( $settings['batch_2_title'] ); ?>
                      </h4>
                      <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">
                        Order cutoff: <strong class="text-[#101D3A] dark:text-greek-gold"><?php echo esc_html( $settings['batch_2_cutoff'] ); ?></strong>
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-8 pt-6 border-t border-slate-100 dark:border-white/10 flex items-center justify-between text-xs text-slate-500 dark:text-slate-400">
                <span><?php echo esc_html( $settings['pickup_label'] ); ?></span>
                <span class="font-bold text-[#101D3A] dark:text-greek-gold"><?php echo esc_html( $settings['pickup_rate'] ); ?></span>
              </div>
            </div>

            <!-- Interactive Distance Pricing Engine -->
            <div class="p-8 rounded-3xl bg-[#172A4D] text-white border border-white/10 shadow-lg flex flex-col justify-between">
              <div>
                <?php if ( ! empty( $settings['calc_badge'] ) ) : ?>
                  <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">
                    <?php echo esc_html( $settings['calc_badge'] ); ?>
                  </span>
                <?php endif; ?>

                <?php if ( ! empty( $settings['calc_heading'] ) ) : ?>
                  <h3 class="text-2xl font-black text-white mb-2">
                    <?php echo esc_html( $settings['calc_heading'] ); ?>
                  </h3>
                <?php endif; ?>

                <p class="text-xs text-slate-300 leading-relaxed mb-6">
                  Calculated from our commercial kitchen at <strong><?php echo esc_html( $settings['calc_kitchen_address'] ); ?></strong>.<br />
                  <span class="text-greek-gold font-medium">Up to 2 km: <strong><?php echo $tier_1 == 0 ? 'FREE' : '$' . number_format($tier_1, 2); ?></strong> &middot; Over 2 to 5 km: <strong>$<?php echo number_format($tier_2, 2); ?> flat</strong> &middot; Over 5 km: <strong>$<?php echo number_format($tier_3, 2); ?>/km</strong></span>
                </p>

                <div class="space-y-4">
                  <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1.5">
                      <?php echo esc_html( $settings['calc_input_label'] ); ?>
                    </label>
                    <div class="flex gap-2">
                      <input 
                        type="text" 
                        id="deliveryCalcInput"
                        placeholder="<?php echo esc_attr( $settings['calc_placeholder'] ); ?>" 
                        class="flex-1 px-4 py-3 rounded-xl text-xs bg-white/10 border border-white/20 text-white placeholder-slate-400 outline-none focus:ring-2 focus:ring-greek-gold"
                      />
                      <button 
                        type="button" 
                        onclick="calculateDeliveryEstimate()"
                        class="px-5 py-3 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover font-black text-xs rounded-xl transition shadow"
                      >
                        <?php echo esc_html( $settings['calc_btn_text'] ); ?>
                      </button>
                    </div>
                  </div>

                  <!-- Result Box -->
                  <div id="deliveryCalcResult" class="p-4 rounded-2xl bg-white/5 border border-white/10 text-xs">
                    <div class="flex items-center justify-between">
                      <span class="text-slate-300">Estimated Delivery:</span>
                      <span id="deliveryEstPrice" class="text-base font-black font-mono text-greek-gold">FREE ($0.00 CAD)</span>
                    </div>
                    <div id="deliveryEstNotes" class="text-[11px] text-slate-400 mt-1">
                      Distance: 1.8 km from George the Greek kitchen. Ultra-local delivery is FREE!
                    </div>
                  </div>
                </div>
              </div>

              <script>
              function calculateDeliveryEstimate() {
                var input = document.getElementById("deliveryCalcInput");
                var price = document.getElementById("deliveryEstPrice");
                var notes = document.getElementById("deliveryEstNotes");
                if (!input || !price || !notes) return;
                var val = input.value.trim();
                if (!val) {
                  price.innerText = "FREE ($0.00 CAD)";
                  notes.innerText = "Enter your postal code or distance in km to calculate delivery.";
                  return;
                }
                var km = 5.0;
                var clean = val.toUpperCase().replace(/\s+/g, '');
                var postalMap = {
                  'M8W1P5': 1.8, 'M8W': 1.8, 'M8V': 3.5, 'M8Z': 4.2, 'M9C': 6.5,
                  'M6S': 6.0, 'M6R': 7.5, 'M5V': 12.0, 'M5H': 13.0, 'M4W': 15.0,
                  'L5E': 7.0, 'L5G': 8.5
                };
                if (postalMap[clean]) {
                  km = postalMap[clean];
                } else if (clean.length >= 3 && postalMap[clean.substring(0, 3)]) {
                  km = postalMap[clean.substring(0, 3)];
                } else {
                  var num = val.match(/([0-9]+(?:\.[0-9]+)?)/);
                  if (num) km = parseFloat(num[1]);
                }
                var fee = 0;
                var note = "";
                var t1 = <?php echo json_encode($tier_1); ?>;
                var t2 = <?php echo json_encode($tier_2); ?>;
                var t3 = <?php echo json_encode($tier_3); ?>;
                if (km <= 2.0) {
                  fee = t1;
                  note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen. Ultra-local delivery (up to 2 km) is " + (t1 === 0 ? "FREE!" : "$" + t1.toFixed(2) + " CAD");
                  price.innerText = t1 === 0 ? "FREE ($0.00 CAD)" : "$" + t1.toFixed(2) + " CAD";
                } else if (km <= 5.0) {
                  fee = t2;
                  note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen. Flat delivery fee (2 to 5 km): $" + fee.toFixed(2) + " CAD.";
                  price.innerText = "$" + fee.toFixed(2) + " CAD";
                } else {
                  fee = Number((km * t3).toFixed(2));
                  note = "Distance: " + km.toFixed(1) + " km from our Etobicoke kitchen. Over 5 km rate ($" + t3.toFixed(2) + " per km): $" + fee.toFixed(2) + " CAD.";
                  price.innerText = "$" + fee.toFixed(2) + " CAD";
                }
                notes.innerText = note;
              }
              </script>

              <?php if ( ! empty( $settings['calc_cta_text'] ) ) : ?>
                <div class="mt-8 pt-4 border-t border-white/10 text-center">
                  <a href="<?php echo esc_url( $cta_url ); ?>" class="text-xs font-black text-greek-gold hover:underline">
                    <?php echo esc_html( $settings['calc_cta_text'] ); ?>
                  </a>
                </div>
              <?php endif; ?>
            </div>

          </div>
        </section>
        <?php
    }
}
