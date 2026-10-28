<?php
/**
 * Elementor Widget: Menu Grid / Featured Meals
 * With comprehensive controls for Category Selection, Item/Dish Filtering,
 * Search Bar Toggle, Category Tabs Toggle, Limits and Grid Columns.
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

    public function get_keywords() {
        return array( 'menu', 'dishes', 'meals', 'food', 'greek', 'grid', 'filter' );
    }

    protected function register_controls() {

        // ==========================================
        // SECTION 1: HEADER & HEADINGS
        // ==========================================
        $this->start_controls_section(
            'section_content',
            array(
                'label' => __( 'Menu Header & Headings', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'badge',
            array(
                'label'   => __( 'Sub-heading Badge', 'greek-fit-kitchen' ),
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

        $this->end_controls_section();

        // ==========================================
        // SECTION 2: SEARCH & FILTER BAR VISIBILITY
        // ==========================================
        $this->start_controls_section(
            'section_search_filter_visibility',
            array(
                'label' => __( 'Search & Category Filter Bar', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'show_search',
            array(
                'label'        => __( 'Show Search Bar', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'greek-fit-kitchen' ),
                'label_off'    => __( 'Hide', 'greek-fit-kitchen' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'description'  => __( 'Toggle the live keyword search bar on or off.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'search_placeholder',
            array(
                'label'       => __( 'Search Bar Placeholder', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::TEXT,
                'default'     => __( 'Search chicken, salmon, souvlaki...', 'greek-fit-kitchen' ),
                'condition'   => array(
                    'show_search' => 'yes',
                ),
            )
        );

        $this->add_control(
            'show_categories',
            array(
                'label'        => __( 'Show Category Filter Bar', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'greek-fit-kitchen' ),
                'label_off'    => __( 'Hide', 'greek-fit-kitchen' ),
                'return_value' => 'yes',
                'default'      => 'yes',
                'description'  => __( 'Toggle the category filter buttons (All Dishes, Poultry, Beef, etc.) on or off.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: CATEGORY SELECTION
        // ==========================================
        $this->start_controls_section(
            'section_categories_filter',
            array(
                'label' => __( 'Category Selection & Visibility', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'categories_filter',
            array(
                'label'       => __( 'Select Categories to Display', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => array(
                    'chicken'    => __( 'Poultry & Chicken', 'greek-fit-kitchen' ),
                    'beef'       => __( 'Beef & Steak', 'greek-fit-kitchen' ),
                    'pork'       => __( 'Pork Plates', 'greek-fit-kitchen' ),
                    'fish'       => __( 'Seafood / Salmon', 'greek-fit-kitchen' ),
                    'vegetarian' => __( 'Vegetarian & Pies', 'greek-fit-kitchen' ),
                    'other'      => __( 'Pasta & Specialties', 'greek-fit-kitchen' ),
                ),
                'default'     => array( 'chicken', 'beef', 'pork', 'fish', 'vegetarian', 'other' ),
                'description' => __( 'Choose which categories appear in the filter bar and menu cards. Uncheck any category to hide it completely.', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 4: DISH / ITEM SELECTION & LIMITS
        // ==========================================
        $this->start_controls_section(
            'section_dishes_filter',
            array(
                'label' => __( 'Dish Selection & Item Controls', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'dishes_mode',
            array(
                'label'   => __( 'Dishes Display Mode', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    'all'     => __( 'Show All Dishes in Selected Categories', 'greek-fit-kitchen' ),
                    'popular' => __( 'Show Popular Dishes Only', 'greek-fit-kitchen' ),
                    'custom'  => __( 'Handpick Specific Dishes (Select from List)', 'greek-fit-kitchen' ),
                ),
                'default' => 'all',
            )
        );

        $this->add_control(
            'custom_dishes',
            array(
                'label'       => __( 'Select Specific Dishes to Show', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::SELECT2,
                'multiple'    => true,
                'options'     => array(
                    'grilled-chicken'           => __( 'Grilled Chicken ($12.99)', 'greek-fit-kitchen' ),
                    'chilly-chicken'            => __( 'Chilly Chicken ($13.99)', 'greek-fit-kitchen' ),
                    'salmon'                    => __( 'Salmon ($14.99)', 'greek-fit-kitchen' ),
                    'spinach-feta-chicken'      => __( 'Spinach & Feta Stuffed Chicken ($14.99)', 'greek-fit-kitchen' ),
                    'tandoori-chicken'          => __( 'Tandoori Chicken ($14.99)', 'greek-fit-kitchen' ),
                    'chicken-mushroom'          => __( 'Chicken Mushroom Sauce ($14.99)', 'greek-fit-kitchen' ),
                    'chicken-fajita'            => __( 'Chicken Fajita ($13.99)', 'greek-fit-kitchen' ),
                    'beef-fajita'               => __( 'Beef Fajita ($14.99)', 'greek-fit-kitchen' ),
                    'beef-mushroom'             => __( 'Beef Mushroom Sauce ($14.99)', 'greek-fit-kitchen' ),
                    'smoked-turkey'             => __( 'Smoked Turkey Breast ($13.99)', 'greek-fit-kitchen' ),
                    'chicken-leg'               => __( 'Chicken Leg Plate ($11.99)', 'greek-fit-kitchen' ),
                    'chicken-fillet'            => __( 'Chicken Fillet ($12.99)', 'greek-fit-kitchen' ),
                    'veggie-souvlaki'           => __( 'Veggie Souvlaki ($11.99)', 'greek-fit-kitchen' ),
                    'chicken-souvlaki'          => __( 'Chicken Souvlaki Plate ($11.99)', 'greek-fit-kitchen' ),
                    'beef-souvlaki'             => __( 'Beef Souvlaki Plate ($13.99)', 'greek-fit-kitchen' ),
                    'pork-souvlaki'             => __( 'Pork Souvlaki Plate ($9.99)', 'greek-fit-kitchen' ),
                    'spinach-pie'               => __( 'Spinach Pie Dinner ($12.99)', 'greek-fit-kitchen' ),
                    'pasta-al-greco'            => __( 'Pasta al Greco ($9.99)', 'greek-fit-kitchen' ),
                    'smoked-pork-loin'          => __( 'Smoked Pork Loin ($12.99)', 'greek-fit-kitchen' ),
                    'turkey-souvlaki'           => __( 'Turkey Souvlaki Plate ($13.99)', 'greek-fit-kitchen' ),
                ),
                'default'     => array(
                    'grilled-chicken',
                    'chilly-chicken',
                    'salmon',
                    'spinach-feta-chicken',
                    'tandoori-chicken',
                    'chicken-mushroom',
                    'chicken-fajita',
                    'beef-fajita',
                    'beef-mushroom',
                    'smoked-turkey',
                    'chicken-leg',
                    'chicken-fillet',
                    'veggie-souvlaki',
                    'chicken-souvlaki',
                    'beef-souvlaki',
                    'pork-souvlaki',
                    'spinach-pie',
                    'pasta-al-greco',
                    'smoked-pork-loin',
                    'turkey-souvlaki',
                ),
                'condition'   => array(
                    'dishes_mode' => 'custom',
                ),
                'description' => __( 'Select exactly which dishes to show or exclude from the menu grid.', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'dishes_limit',
            array(
                'label'       => __( 'Maximum Dishes to Display', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::NUMBER,
                'min'         => 1,
                'max'         => 50,
                'default'     => 20,
                'description' => __( 'Enter the maximum number of dish cards to show (e.g. 4, 8, 12, 20).', 'greek-fit-kitchen' ),
            )
        );

        $this->add_control(
            'grid_columns',
            array(
                'label'   => __( 'Grid Columns (Desktop)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'options' => array(
                    '2' => __( '2 Columns', 'greek-fit-kitchen' ),
                    '3' => __( '3 Columns', 'greek-fit-kitchen' ),
                    '4' => __( '4 Columns (Default)', 'greek-fit-kitchen' ),
                ),
                'default' => '4',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $all_meals = gfk_get_meals();

        // 1. Filter by selected categories
        $allowed_cats = ! empty( $settings['categories_filter'] ) && is_array( $settings['categories_filter'] )
            ? $settings['categories_filter']
            : array( 'chicken', 'beef', 'pork', 'fish', 'vegetarian', 'other' );

        $filtered_meals = array();
        foreach ( $all_meals as $m ) {
            if ( in_array( $m['category'], $allowed_cats, true ) ) {
                $filtered_meals[] = $m;
            }
        }

        // 2. Filter by dish mode
        $mode = ! empty( $settings['dishes_mode'] ) ? $settings['dishes_mode'] : 'all';
        if ( 'popular' === $mode ) {
            $filtered_meals = array_values( array_filter( $filtered_meals, function( $m ) {
                return ! empty( $m['popular'] );
            } ) );
        } elseif ( 'custom' === $mode && ! empty( $settings['custom_dishes'] ) && is_array( $settings['custom_dishes'] ) ) {
            $filtered_meals = array_values( array_filter( $filtered_meals, function( $m ) use ( $settings ) {
                return in_array( $m['id'], $settings['custom_dishes'], true );
            } ) );
        }

        // 3. Limit total dishes
        $limit = ! empty( $settings['dishes_limit'] ) ? (int) $settings['dishes_limit'] : 20;
        if ( $limit > 0 && count( $filtered_meals ) > $limit ) {
            $filtered_meals = array_slice( $filtered_meals, 0, $limit );
        }

        // Compute counts per category among the displayed meals
        $total_count = count( $filtered_meals );
        $cat_counts  = array(
            'chicken'    => 0,
            'beef'       => 0,
            'pork'       => 0,
            'fish'       => 0,
            'vegetarian' => 0,
            'other'      => 0,
        );
        foreach ( $filtered_meals as $m ) {
            if ( isset( $cat_counts[ $m['category'] ] ) ) {
                $cat_counts[ $m['category'] ]++;
            }
        }

        // Grid columns class
        $col_class = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6';
        if ( isset( $settings['grid_columns'] ) ) {
            if ( '2' === $settings['grid_columns'] ) {
                $col_class = 'grid grid-cols-1 sm:grid-cols-2 gap-6';
            } elseif ( '3' === $settings['grid_columns'] ) {
                $col_class = 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6';
            }
        }

        // Allowed IDs for JS filtering
        $allowed_ids_str = implode( ',', array_column( $filtered_meals, 'id' ) );
        $allowed_cats_str = implode( ',', $allowed_cats );

        $show_search     = isset( $settings['show_search'] ) && 'yes' === $settings['show_search'];
        $show_categories = isset( $settings['show_categories'] ) && 'yes' === $settings['show_categories'];
        $placeholder     = ! empty( $settings['search_placeholder'] ) ? $settings['search_placeholder'] : 'Search chicken, salmon, souvlaki...';
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

            <?php if ( $show_search ) : ?>
              <!-- Search Box -->
              <div class="w-full md:w-72">
                <div class="relative">
                  <input 
                    type="text" 
                    id="menuSearchInput"
                    oninput="handleMenuSearch(this.value)"
                    placeholder="<?php echo esc_attr( $placeholder ); ?>" 
                    class="w-full pl-9 pr-4 py-2.5 rounded-xl text-xs bg-white border border-slate-300 text-slate-900 outline-none focus:ring-2 focus:ring-greek-gold shadow-sm"
                  />
                  <svg class="w-4 h-4 text-slate-400 absolute left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
              </div>
            <?php endif; ?>
          </div>

          <?php if ( $show_categories ) : ?>
            <!-- Category Tabs with Horizontal Scrolling & Dynamic Counts -->
            <div class="flex items-center gap-2 overflow-x-auto pb-4 mb-8 text-xs font-bold scrollbar-none">
              <button onclick="filterMenuCategory('all')" data-cat="all" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-black bg-[#101D3A] text-white transition shadow">
                <?php printf( esc_html__( 'All Dishes (%d)', 'greek-fit-kitchen' ), $total_count ); ?>
              </button>

              <?php if ( in_array( 'chicken', $allowed_cats, true ) && $cat_counts['chicken'] > 0 ) : ?>
                <button onclick="filterMenuCategory('chicken')" data-cat="chicken" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Poultry & Chicken (%d)', 'greek-fit-kitchen' ), $cat_counts['chicken'] ); ?>
                </button>
              <?php endif; ?>

              <?php if ( in_array( 'beef', $allowed_cats, true ) && $cat_counts['beef'] > 0 ) : ?>
                <button onclick="filterMenuCategory('beef')" data-cat="beef" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Beef & Steak (%d)', 'greek-fit-kitchen' ), $cat_counts['beef'] ); ?>
                </button>
              <?php endif; ?>

              <?php if ( in_array( 'pork', $allowed_cats, true ) && $cat_counts['pork'] > 0 ) : ?>
                <button onclick="filterMenuCategory('pork')" data-cat="pork" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Pork Plates (%d)', 'greek-fit-kitchen' ), $cat_counts['pork'] ); ?>
                </button>
              <?php endif; ?>

              <?php if ( in_array( 'fish', $allowed_cats, true ) && $cat_counts['fish'] > 0 ) : ?>
                <button onclick="filterMenuCategory('fish')" data-cat="fish" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Seafood / Salmon (%d)', 'greek-fit-kitchen' ), $cat_counts['fish'] ); ?>
                </button>
              <?php endif; ?>

              <?php if ( in_array( 'vegetarian', $allowed_cats, true ) && $cat_counts['vegetarian'] > 0 ) : ?>
                <button onclick="filterMenuCategory('vegetarian')" data-cat="vegetarian" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Vegetarian & Pies (%d)', 'greek-fit-kitchen' ), $cat_counts['vegetarian'] ); ?>
                </button>
              <?php endif; ?>

              <?php if ( in_array( 'other', $allowed_cats, true ) && $cat_counts['other'] > 0 ) : ?>
                <button onclick="filterMenuCategory('other')" data-cat="other" class="menu-cat-btn whitespace-nowrap shrink-0 px-4 py-2 rounded-xl text-xs font-bold text-slate-600 hover:bg-slate-200 transition">
                  <?php printf( esc_html__( 'Pasta & Specialties (%d)', 'greek-fit-kitchen' ), $cat_counts['other'] ); ?>
                </button>
              <?php endif; ?>
            </div>
          <?php endif; ?>

          <!-- Product Grid: Pre-rendered for Instant Loading & SEO -->
          <div id="menuGrid" class="<?php echo esc_attr( $col_class ); ?>" data-allowed-ids="<?php echo esc_attr( $allowed_ids_str ); ?>" data-allowed-cats="<?php echo esc_attr( $allowed_cats_str ); ?>">
            <?php foreach ( $filtered_meals as $meal ) : 
              $is_pasta    = empty( $meal['hasSides'] );
              $img_url     = gfk_get_asset_url( $meal['image'] );
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
                      <span class="bg-white text-amber-800 text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-amber-300"><?php esc_html_e( 'Complete Plate (No Sides)', 'greek-fit-kitchen' ); ?></span>
                    <?php else : ?>
                      <span class="bg-white text-[#101D3A] text-[10px] font-black px-2.5 py-0.5 rounded-full shadow-md border border-slate-200"><?php esc_html_e( '2 Sides Included', 'greek-fit-kitchen' ); ?></span>
                    <?php endif; ?>

                    <?php if ( ! empty( $meal['popular'] ) ) : ?>
                      <span class="bg-greek-gold text-[#101D3A] text-[10px] font-black px-2 py-0.5 rounded-full shadow-sm"><?php esc_html_e( 'Popular', 'greek-fit-kitchen' ); ?></span>
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
                      <span><?php echo $meal['hasSides'] ? esc_html__( 'Select Meal & Sides', 'greek-fit-kitchen' ) : esc_html__( 'Add to Plan', 'greek-fit-kitchen' ); ?></span>
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
