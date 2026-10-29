<?php
/**
 * Elementor Widget: Menu Grid / Featured Meals
 * Fully editable in Elementor:
 * Allows user to change every dish image, heading, price, description, badge, and macros directly in Elementor!
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
        return __( 'GFK Menu Grid (20 Dishes - Fully Editable)', 'greek-fit-kitchen' );
    }

    public function get_icon() {
        return 'eicon-gallery-grid';
    }

    public function get_categories() {
        return array( 'greek-fit-kitchen' );
    }

    public function get_keywords() {
        return array( 'menu', 'dishes', 'meals', 'food', 'greek', 'grid', 'filter', 'editable' );
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
                'rows'    => 2,
                'default' => __( 'All prices in Canadian Dollars (CAD). Any plate includes 2 sides of your choice (excludes Pasta al Greco).', 'greek-fit-kitchen' ),
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 2: SEARCH & FILTER BAR
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
                'label'        => __( 'Show Category Filter Tabs', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'label_on'     => __( 'Show', 'greek-fit-kitchen' ),
                'label_off'    => __( 'Hide', 'greek-fit-kitchen' ),
                'return_value' => 'yes',
                'default'      => 'yes',
            )
        );

        $this->end_controls_section();

        // ==========================================
        // SECTION 3: EDITABLE DISHES REPEATER
        // ==========================================
        $this->start_controls_section(
            'section_dishes_repeater',
            array(
                'label' => __( 'Dishes List (Edit Every Image, Heading & Text)', 'greek-fit-kitchen' ),
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'id',
            array(
                'label'   => __( 'Dish ID / Slug', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'grilled-chicken',
            )
        );

        $repeater->add_control(
            'name',
            array(
                'label'   => __( 'Dish Heading / Name', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Grilled Chicken Plate', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'price',
            array(
                'label'   => __( 'Price (CAD)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '12.99',
            )
        );

        $repeater->add_control(
            'category',
            array(
                'label'   => __( 'Category', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::SELECT,
                'default' => 'chicken',
                'options' => array(
                    'chicken'    => __( 'Poultry & Chicken', 'greek-fit-kitchen' ),
                    'beef'       => __( 'Beef & Steak', 'greek-fit-kitchen' ),
                    'pork'       => __( 'Pork Plates', 'greek-fit-kitchen' ),
                    'fish'       => __( 'Fish & Seafood', 'greek-fit-kitchen' ),
                    'vegetarian' => __( 'Vegetarian & Pies', 'greek-fit-kitchen' ),
                    'other'      => __( 'Pasta & Specialties', 'greek-fit-kitchen' ),
                ),
            )
        );

        $repeater->add_control(
            'image',
            array(
                'label'   => __( 'Dish Image (Media Library)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::MEDIA,
                'default' => array(
                    'url' => get_template_directory_uri() . '/assets/images/meals/grilled-chicken.jpg',
                ),
            )
        );

        $repeater->add_control(
            'description',
            array(
                'label'   => __( 'Dish Description', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXTAREA,
                'rows'    => 3,
                'default' => __( 'Tender herb-marinated chicken breast flame-grilled with Greek oregano, garlic, and extra virgin olive oil.', 'greek-fit-kitchen' ),
            )
        );

        $repeater->add_control(
            'calories',
            array(
                'label'   => __( 'Calories (kcal)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '420',
            )
        );

        $repeater->add_control(
            'protein',
            array(
                'label'   => __( 'Protein (g)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '48g',
            )
        );

        $repeater->add_control(
            'carbs',
            array(
                'label'   => __( 'Carbs (g)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '18g',
            )
        );

        $repeater->add_control(
            'fat',
            array(
                'label'   => __( 'Fat (g)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => '9g',
            )
        );

        $repeater->add_control(
            'badge',
            array(
                'label'   => __( 'Badge / Tag (e.g. Popular, High Protein)', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => 'Popular',
            )
        );

        $repeater->add_control(
            'has_sides',
            array(
                'label'        => __( 'Includes 2 Sides', 'greek-fit-kitchen' ),
                'type'         => \Elementor\Controls_Manager::SWITCHER,
                'default'      => 'yes',
                'return_value' => 'yes',
            )
        );

        $repeater->add_control(
            'btn_text',
            array(
                'label'   => __( 'Button Text', 'greek-fit-kitchen' ),
                'type'    => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Customize & Add', 'greek-fit-kitchen' ),
            )
        );

        // Preload default dishes
        $default_meals_raw = gfk_get_default_meals();
        $repeater_defaults = array();
        foreach ( $default_meals_raw as $dm ) {
            $repeater_defaults[] = array(
                'id'          => $dm['id'],
                'name'        => $dm['name'],
                'price'       => number_format( (float) $dm['price'], 2 ),
                'category'    => $dm['category'],
                'image'       => array( 'url' => gfk_get_asset_url( $dm['image'] ) ),
                'description' => $dm['description'],
                'calories'    => (string) $dm['calories'],
                'protein'     => (string) $dm['protein'],
                'carbs'       => (string) $dm['carbs'],
                'fat'         => (string) $dm['fat'],
                'badge'       => ! empty( $dm['popular'] ) ? 'Popular' : '',
                'has_sides'   => ! empty( $dm['hasSides'] ) ? 'yes' : 'no',
                'btn_text'    => ! empty( $dm['hasSides'] ) ? 'Customize & Add' : 'Add to Plan',
            );
        }

        $this->add_control(
            'custom_meals',
            array(
                'label'       => __( 'Dishes Repeater', 'greek-fit-kitchen' ),
                'type'        => \Elementor\Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'default'     => $repeater_defaults,
                'title_field' => '{{{ name }}} (${{{ price }}})',
            )
        );

        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        $show_search = isset( $settings['show_search'] ) && 'yes' === $settings['show_search'];
        $show_cats   = isset( $settings['show_categories'] ) && 'yes' === $settings['show_categories'];
        $meals_items = ! empty( $settings['custom_meals'] ) ? $settings['custom_meals'] : array();

        // Fallback to default if empty
        if ( empty( $meals_items ) ) {
            $raw = gfk_get_default_meals();
            foreach ( $raw as $dm ) {
                $meals_items[] = array(
                    'id'          => $dm['id'],
                    'name'        => $dm['name'],
                    'price'       => number_format( (float) $dm['price'], 2 ),
                    'category'    => $dm['category'],
                    'image'       => array( 'url' => gfk_get_asset_url( $dm['image'] ) ),
                    'description' => $dm['description'],
                    'calories'    => (string) $dm['calories'],
                    'protein'     => (string) $dm['protein'],
                    'carbs'       => (string) $dm['carbs'],
                    'fat'         => (string) $dm['fat'],
                    'badge'       => ! empty( $dm['popular'] ) ? 'Popular' : '',
                    'has_sides'   => ! empty( $dm['hasSides'] ) ? 'yes' : 'no',
                    'btn_text'    => ! empty( $dm['hasSides'] ) ? 'Customize & Add' : 'Add to Plan',
                );
            }
        }
        ?>
        <section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="featuredMeals">
          
          <!-- Section Header -->
          <div class="text-center max-w-3xl mx-auto mb-10">
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

          <!-- Live Search Bar -->
          <?php if ( $show_search ) : ?>
            <div class="max-w-md mx-auto mb-8">
              <div class="relative">
                <input 
                  type="text" 
                  id="menuSearchInput" 
                  placeholder="<?php echo esc_attr( $settings['search_placeholder'] ); ?>" 
                  class="w-full pl-11 pr-4 py-3 rounded-2xl bg-white dark:bg-[#101D3A] border border-slate-200 dark:border-white/10 text-xs text-[#101D3A] dark:text-white placeholder-slate-400 outline-none focus:ring-2 focus:ring-greek-gold shadow-sm"
                  oninput="window.filterMealsBySearch && window.filterMealsBySearch(this.value)"
                />
                <svg class="w-4 h-4 text-slate-400 absolute left-4 top-1/2 -translate-y-1/2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
              </div>
            </div>
          <?php endif; ?>

          <!-- Category Filter Tabs -->
          <?php if ( $show_cats ) : ?>
            <div class="flex flex-wrap items-center justify-center gap-2 mb-10" id="categoryFilterBar">
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('all')" class="cat-pill active px-4 py-2 rounded-xl text-xs font-bold transition bg-[#101D3A] dark:bg-greek-gold text-white dark:text-[#101D3A]">All Dishes (<?php echo esc_html( count( $meals_items ) ); ?>)</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('chicken')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Poultry</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('beef')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Beef &amp; Steak</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('pork')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Pork Plates</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('fish')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Fish / Salmon</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('vegetarian')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Vegetarian</button>
              <button type="button" onclick="window.filterMealsByCategory && window.filterMealsByCategory('other')" class="cat-pill px-4 py-2 rounded-xl text-xs font-bold transition bg-slate-100 dark:bg-white/5 text-slate-600 dark:text-slate-300 hover:bg-slate-200 dark:hover:bg-white/10">Pasta &amp; Specialties</button>
            </div>
          <?php endif; ?>

          <!-- Meals Grid (20 Dishes) -->
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6" id="mealsGrid">
            <?php foreach ( $meals_items as $meal ) : 
              $meal_id   = ! empty( $meal['id'] ) ? $meal['id'] : sanitize_title( $meal['name'] );
              $meal_name = ! empty( $meal['name'] ) ? $meal['name'] : 'Greek Meal';
              $price     = ! empty( $meal['price'] ) ? floatval( str_replace( '$', '', $meal['price'] ) ) : 12.99;
              $cat       = ! empty( $meal['category'] ) ? $meal['category'] : 'chicken';
              $img_url   = ! empty( $meal['image']['url'] ) ? $meal['image']['url'] : ( get_template_directory_uri() . '/assets/images/meals/grilled-chicken.jpg' );
              $desc      = ! empty( $meal['description'] ) ? $meal['description'] : '';
              $cal       = ! empty( $meal['calories'] ) ? $meal['calories'] : '450';
              $prot      = ! empty( $meal['protein'] ) ? $meal['protein'] : '40g';
              $carbs     = ! empty( $meal['carbs'] ) ? $meal['carbs'] : '25g';
              $badge     = ! empty( $meal['badge'] ) ? $meal['badge'] : '';
              $has_sides = ( isset( $meal['has_sides'] ) && 'yes' === $meal['has_sides'] );
              $btn_txt   = ! empty( $meal['btn_text'] ) ? $meal['btn_text'] : ( $has_sides ? 'Customize & Add' : 'Add to Plan' );
            ?>
              <div 
                class="meal-card group bg-white dark:bg-[#101D3A] rounded-3xl overflow-hidden border border-slate-200 dark:border-white/10 hover:border-greek-gold/40 shadow-sm hover:shadow-xl transition-all duration-300 flex flex-col justify-between"
                data-category="<?php echo esc_attr( $cat ); ?>"
                data-id="<?php echo esc_attr( $meal_id ); ?>"
                data-name="<?php echo esc_attr( $meal_name ); ?>"
                data-price="<?php echo esc_attr( number_format( $price, 2 ) ); ?>"
                data-has-sides="<?php echo $has_sides ? 'true' : 'false'; ?>"
              >
                <div>
                  <!-- Image Container with Hover Zoom & Badge -->
                  <div class="relative h-48 w-full overflow-hidden bg-slate-100 dark:bg-white/5">
                    <img 
                      src="<?php echo esc_url( $img_url ); ?>" 
                      alt="<?php echo esc_attr( $meal_name ); ?>" 
                      class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
                      loading="lazy"
                    />
                    <?php if ( ! empty( $badge ) ) : ?>
                      <div class="absolute top-3 left-3 bg-[#101D3A]/90 backdrop-blur-sm text-greek-gold px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-wider border border-greek-gold/30">
                        <?php echo esc_html( $badge ); ?>
                      </div>
                    <?php endif; ?>
                    <div class="absolute bottom-3 right-3 bg-[#101D3A]/90 backdrop-blur-sm text-white px-3 py-1 rounded-xl text-xs font-mono font-black border border-white/10">
                      $<?php echo esc_html( number_format( $price, 2 ) ); ?> CAD
                    </div>
                  </div>

                  <!-- Details Body -->
                  <div class="p-5 space-y-3">
                    <h3 class="font-black text-base text-[#101D3A] dark:text-white line-clamp-1 group-hover:text-greek-gold transition">
                      <?php echo esc_html( $meal_name ); ?>
                    </h3>

                    <?php if ( ! empty( $desc ) ) : ?>
                      <p class="text-xs text-slate-500 dark:text-slate-400 line-clamp-2 leading-relaxed">
                        <?php echo esc_html( $desc ); ?>
                      </p>
                    <?php endif; ?>

                    <!-- Nutrition Pills -->
                    <div class="flex items-center gap-2 pt-1 text-[11px] text-slate-500 dark:text-slate-400 font-mono">
                      <span class="px-2 py-0.5 rounded-md bg-slate-100 dark:bg-white/5 font-bold"><?php echo esc_html( $cal ); ?> kcal</span>
                      <span class="px-2 py-0.5 rounded-md bg-greek-gold/10 text-greek-gold font-bold"><?php echo esc_html( $prot ); ?> prot</span>
                      <span class="px-2 py-0.5 rounded-md bg-slate-100 dark:bg-white/5"><?php echo esc_html( $carbs ); ?> carbs</span>
                    </div>

                    <div class="text-[11px] font-semibold text-greek-gold flex items-center gap-1">
                      <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                      <span><?php echo $has_sides ? 'Includes 2 Greek Sides' : 'Direct portion (No sides)'; ?></span>
                    </div>
                  </div>
                </div>

                <!-- Action Button -->
                <div class="p-5 pt-0">
                  <button 
                    type="button" 
                    onclick="window.openMealCustomizer ? window.openMealCustomizer('<?php echo esc_js( $meal_id ); ?>') : (location.href='#mealPlans')"
                    class="w-full py-3 rounded-xl bg-greek-gold text-[#101D3A] hover:bg-greek-goldHover font-black text-xs transition shadow-sm hover:shadow text-center flex items-center justify-center gap-1.5"
                  >
                    <span><?php echo esc_html( $btn_txt ); ?></span>
                  </button>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <!-- Bottom Notice -->
          <div class="text-center mt-12 p-6 rounded-3xl bg-[#FAF9F5] dark:bg-white/5 border border-slate-200 dark:border-white/10 max-w-2xl mx-auto">
            <span class="text-xs font-bold text-[#101D3A] dark:text-white block mb-1">
              Minimum Order Requirement: 6 Meals · 10% Off Applied on 7+ Meals
            </span>
            <span class="text-xs text-slate-500 dark:text-slate-400">
              Orders dispatched fresh on Sundays &amp; Wednesdays. All packaging microwave-safe &amp; recyclable.
            </span>
          </div>

        </section>
        <?php
    }
}
