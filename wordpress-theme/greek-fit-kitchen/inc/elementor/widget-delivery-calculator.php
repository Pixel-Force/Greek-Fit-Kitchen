<?php
/**
 * Elementor Widget: Delivery Rates & Calculator
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

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Delivery Content & Settings', 'greek-fit-kitchen' ),
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
                'default' => __( 'Greek Fit Kitchen operates scheduled batch deliveries on Sundays & Wednesdays across Toronto and the GTA.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'base_rate',
            array(
                'label'   => __( 'Base Rate (CAD)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '5.99',
            )
        );

        $this->add_control(
            'per_km',
            array(
                'label'   => __( 'Per KM Rate (CAD)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '0.99',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="deliverySection">
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

          <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
            
            <!-- Delivery Schedules -->
            <div class="p-8 rounded-3xl bg-white border border-slate-200 shadow-sm flex flex-col justify-between">
              <div>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">Toronto &amp; GTA Delivery Schedule</span>
                <h3 class="text-2xl font-black text-[#101D3A] mb-4">Twice-Weekly Fresh Batches</h3>
                <p class="text-xs text-slate-600 leading-relaxed mb-6">
                  Meals are cooked and blast-chilled immediately prior to scheduled dispatch to lock in taverna-quality freshness, tenderness, and aroma.
                </p>

                <div class="space-y-4">
                  <div class="p-4 rounded-2xl bg-[#FAF9F5] border border-slate-200 flex items-start gap-4">
                    <span class="w-10 h-10 rounded-xl bg-[#101D3A] text-white flex items-center justify-center font-black text-sm shrink-0">SUN</span>
                    <div>
                      <h4 class="text-sm font-black text-[#101D3A]">Sunday Batch Delivery</h4>
                      <p class="text-xs text-slate-500 mt-0.5">Order cutoff: <strong class="text-[#101D3A]">Friday at 12:00 PM</strong> (noon) Toronto time.</p>
                    </div>
                  </div>

                  <div class="p-4 rounded-2xl bg-[#FAF9F5] border border-slate-200 flex items-start gap-4">
                    <span class="w-10 h-10 rounded-xl bg-[#101D3A] text-white flex items-center justify-center font-black text-sm shrink-0">WED</span>
                    <div>
                      <h4 class="text-sm font-black text-[#101D3A]">Wednesday Batch Delivery</h4>
                      <p class="text-xs text-slate-500 mt-0.5">Order cutoff: <strong class="text-[#101D3A]">Monday at 12:00 PM</strong> (noon) Toronto time.</p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-8 pt-6 border-t border-slate-100 flex items-center justify-between text-xs text-slate-500">
                <span>Free local pickup @ George the Greek (Etobicoke)</span>
                <span class="font-bold text-[#101D3A]">0 km = $0.00 Delivery</span>
              </div>
            </div>

            <!-- Interactive Distance Pricing Engine -->
            <div class="p-8 rounded-3xl bg-[#172A4D] text-white border border-white/10 shadow-lg flex flex-col justify-between">
              <div>
                <span class="text-xs font-black uppercase tracking-wider text-greek-gold block mb-2">Interactive Delivery Estimator</span>
                <h3 class="text-2xl font-black text-white mb-2">Distance-Based Delivery Pricing</h3>
                <p class="text-xs text-slate-300 leading-relaxed mb-6">
                  Calculated from our commercial kitchen at <strong>3575 Lake Shore Blvd W, Etobicoke</strong>.
                  Base fee: <strong class="text-greek-gold font-mono">$<?php echo esc_html( $settings['base_rate'] ); ?> CAD</strong> + <strong class="text-greek-gold font-mono">$<?php echo esc_html( $settings['per_km'] ); ?> CAD/km</strong>.
                </p>

                <div class="space-y-4">
                  <div>
                    <label class="block text-xs font-bold text-slate-300 mb-1.5">Enter Postal Code or Distance (KM)</label>
                    <div class="flex gap-2">
                      <input 
                        type="text" 
                        id="deliveryCalcInput"
                        placeholder="e.g. M8W 1P5 or 8 km" 
                        class="flex-1 px-4 py-3 rounded-xl text-xs bg-white/10 border border-white/20 text-white placeholder-slate-400 outline-none focus:ring-2 focus:ring-greek-gold"
                      />
                      <button 
                        type="button" 
                        onclick="calculateDeliveryEstimate()"
                        class="px-5 py-3 bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover font-black text-xs rounded-xl transition shadow"
                      >
                        Calculate
                      </button>
                    </div>
                  </div>

                  <!-- Result Box -->
                  <div id="deliveryCalcResult" class="p-4 rounded-2xl bg-white/5 border border-white/10 text-xs">
                    <div class="flex items-center justify-between">
                      <span class="text-slate-300">Estimated Delivery:</span>
                      <span id="deliveryEstPrice" class="text-base font-black font-mono text-greek-gold">$5.99 CAD</span>
                    </div>
                    <div id="deliveryEstNotes" class="text-[11px] text-slate-400 mt-1">
                      Based on base rate. Enter your postal code above to calculate exact delivery charge.
                    </div>
                  </div>
                </div>
              </div>

              <div class="mt-8 pt-4 border-t border-white/10 text-center">
                <a href="#featuredMeals" class="text-xs font-black text-greek-gold hover:underline">
                  Start Your Order with 6+ Meals →
                </a>
              </div>
            </div>

          </div>
        </section>
        <?php
    }
}
