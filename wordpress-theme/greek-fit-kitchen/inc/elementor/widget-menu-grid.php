<?php
/**
 * Elementor Widget: Menu Grid / Featured Meals
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once dirname( __DIR__ ) . '/meals-data.php';

class GFK_Widget_Menu_Grid extends \Elementor\Widget_Base {

    public function get_name() {
        return 'gfk_menu_grid';
    }

    public function get_title() {
        return __( 'GFK Menu Grid (20 Dishes)', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Menu Header & Settings', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Top Sub-heading Badge', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'APPROVED FLYER SELECTION', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'title',
            array(
                'label'   => __( 'Main Section Title', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Main Dishes (20 Options)', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'subtitle',
            array(
                'label'   => __( 'Section Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'All prices in Canadian Dollars (CAD). Any plate includes 2 sides of your choice (excludes Pasta al Greco).', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'show_search',
            array(
                'label'        => __( 'Show Search Input', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $this->add_control(
            'show_categories',
            array(
                'label'        => __( 'Show Category Filter Tabs', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $meals    = gfk_get_meals();
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="featuredMeals">
          
          <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 sm:gap-6 mb-8 sm:mb-10 min-w-0 max-w-full">
            <div>
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

            <?php if ( 'yes' === $settings['show_search'] ) : ?>
              <!-- Search Box -->
              <div class="w-full md:w-72">
                <div class="relative">
                  <input 
                    type="text" 
                    id="menuSearchInput"
                    oninput="handleMenuSearch(this.value)"
                    placeholder="Search chicken, salmon, souvlaki..." 
                    class="w-full pl-9 pr-4 py-2.5 rounded-xl text-xs bg-white border border-slate-300 text-slate-900 outline-none focus:ring-2 focus:ring-greek-gold shadow-sm"
                  />
                  <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <?php if ( 'yes' === $settings['show_categories'] ) : ?>
            <!-- Category Tabs with Horizontal Scrolling & No Wrapping -->
            <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 text-xs font-bold scrollbar-none">
              <button onclick="filterMenuCategory('all')" data-cat="all" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-black bg-[#101D3A] text-white transition shadow">
                All Dishes (20)
              </button>
              <button onclick="filterMenuCategory('chicken')" data-cat="chicken" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Poultry &amp; Chicken (8)
              </button>
              <button onclick="filterMenuCategory('beef')" data-cat="beef" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Beef &amp; Steak (3)
              </button>
              <button onclick="filterMenuCategory('pork')" data-cat="pork" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Pork Plates (2)
              </button>
              <button onclick="filterMenuCategory('fish')" data-cat="fish" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Seafood / Salmon (1)
              </button>
              <button onclick="filterMenuCategory('vegetarian')" data-cat="vegetarian" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Vegetarian &amp; Pies (2)
              </button>
              <button onclick="filterMenuCategory('other')" data-cat="other" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                Pasta &amp; Specialties (4)
              </button>
            </div>
          <?php endif; ?>

          <!-- Product Grid: Pre-rendered for Instant Loading & SEO -->
          <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php foreach ( $meals as $meal ) : 
              $is_pasta    = empty( $meal['hasSides'] );
              $img_url = gfk_get_asset_url( $meal['image'] );
              $fallback_img = get_template_directory_uri() . '/assets/images/meals/grilled-chicken.jpg';
            ?>
              <div class="meal-card group bg-white rounded-2xl border border-slate-200 overflow-hidden flex flex-col justify-between shadow-sm transition-all duration-300" data-meal-id="<?php echo esc_attr( $meal['id'] ); ?>" data-category="<?php echo esc_attr( $meal['category'] ); ?>">
                
                <!-- Responsive Image Container: Restrained on mobile, aspect-[4/3] on desktop -->
                <div class="relative overflow-hidden h-44 sm:h-48 md:aspect-[4/3] bg-slate-100">
                  <img 
                    src="<?php echo esc_url( $img_url ); ?>" 
                    alt="<?php echo esc_attr( $meal['name'] ); ?>" 
                    loading="lazy"
                    onerror="this.src='<?php echo esc_url( $fallback_img ); ?>'"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                  />
                  <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
                    <?php if ( $is_pasta ) : ?>
                      <span class="bg-white text-amber-800 text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-amber-300">Complete Plate (No Sides)</span>
                    <?php else : ?>
                      <span class="bg-white text-[#101D3A] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-slate-200">2 Sides Included</span>
                    <?php endif; ?>

                    <?php if ( ! empty( $meal['popular'] ) ) : ?>
                      <span class="bg-greek-gold text-[#101D3A] text-[10px] font-black px-2 py-0.5 rounded-full shadow-sm">Popular</span>
                    <?php endif; ?>
                  </div>
                  <div class="absolute bottom-3 right-3 bg-[#101D3A]/90 text-white font-mono font-black text-sm px-2.5 py-1 rounded-xl shadow-lg border border-white/10">
                    $<?php echo esc_html( number_format( $meal['price'], 2 ) ); ?> <span class="text-[10px] font-normal text-greek-gold">CAD</span>
                  </div>
                </div>

                <!-- Card Body -->
                <div class="p-4 sm:p-5 flex-1 flex flex-col justify-between">
                  <div>
                    <div class="flex items-start justify-between gap-2">
                      <h3 class="text-sm sm:text-base font-black text-[#101D3A] group-hover:text-greek-gold transition-colors leading-tight break-words">
                        <?php echo esc_html( $meal['name'] ); ?>
                      </h3>
                    </div>
                    <p class="text-xs text-slate-500 mt-2 line-clamp-2 leading-relaxed">
                      <?php echo esc_html( $meal['description'] ); ?>
                    </p>
                    
                    <div class="flex items-center gap-2 mt-3 pt-3 border-t border-slate-100 text-[11px] font-bold text-slate-600 flex-wrap">
                      <span class="bg-slate-100 px-2 py-0.5 rounded"><?php echo esc_html( $meal['calories'] ); ?> cal</span>
                      <span class="bg-slate-100 px-2 py-0.5 rounded text-greek-gold"><?php echo esc_html( $meal['protein'] ); ?> protein</span>
                      <span class="bg-slate-100 px-2 py-0.5 rounded"><?php echo esc_html( $meal['carbs'] ); ?> carbs</span>
                      <span class="bg-slate-100 px-2 py-0.5 rounded"><?php echo esc_html( $meal['fat'] ); ?> fat</span>
                    </div>
                  </div>

                  <div class="mt-4 pt-3 flex items-center justify-between gap-2 border-t border-slate-100">
                    <button 
                      onclick="openMealSidesModal('<?php echo esc_js( $meal['id'] ); ?>')" 
                      class="w-full py-2.5 px-4 rounded-xl text-xs font-black bg-[#101D3A] text-white hover:bg-greek-gold hover:text-[#101D3A] transition shadow-sm flex items-center justify-center gap-1.5"
                    >
                      <span><?php echo $meal['hasSides'] ? 'Select Meal & Sides' : 'Add to Plan'; ?></span>
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                    </button>
                  </div>
                </div>

              </div>
            <?php endforeach; ?>
          </div>

        </section>
        <?php
    }
}
