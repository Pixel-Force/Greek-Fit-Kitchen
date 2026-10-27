<?php
/**
 * Template Part: Section 2 - Featured Meals
 *
 * 20 Meals from Official Flyer, CAD pricing, side-selection options, Add to Cart.
 * Server-Side Rendered in PHP for Instant First Contentful Paint.
 *
 * @package GreekFitKitchen
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$meals = function_exists( 'gfk_get_default_meals' ) ? gfk_get_default_meals() : array();
?>
<section class="py-16 sm:py-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" id="featuredMeals">
  
  <!-- Header & Category Filter Tabs -->
  <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
    <div class="space-y-2 max-w-2xl">
      <div class="inline-flex items-center gap-2 px-3 py-1 rounded-md bg-greek-gold/15 text-greek-navy dark:text-greek-gold text-xs font-black uppercase tracking-wider">
        <span>🥗</span> Chef Prepared · 2 Sides Included
      </div>
      <h2 class="text-3xl sm:text-4xl font-black uppercase tracking-tight text-greek-navy dark:text-white">
        Featured Greek Meals
      </h2>
      <p class="text-sm text-slate-600 dark:text-slate-300">
        Choose from 20 authentic chef-crafted dishes. Every plate comes with 2 sides of your choice (or add extra sides for +$4.99 CAD each). Minimum order: 6 meals.
      </p>
    </div>

    <!-- Category Filters -->
    <div class="flex flex-wrap items-center gap-2 bg-slate-100 dark:bg-white/5 p-1.5 rounded-2xl border border-slate-200 dark:border-white/10">
      <button onclick="filterCategory('all', this)" class="category-tab-btn active px-4 py-2 rounded-xl text-xs font-black uppercase tracking-wider bg-greek-navy text-white shadow-sm transition">
        All (20)
      </button>
      <button onclick="filterCategory('poultry', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 hover:text-greek-navy dark:hover:text-white transition">
        Poultry (9)
      </button>
      <button onclick="filterCategory('meat', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 hover:text-greek-navy dark:hover:text-white transition">
        Meat (6)
      </button>
      <button onclick="filterCategory('seafood', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 hover:text-greek-navy dark:hover:text-white transition">
        Seafood (1)
      </button>
      <button onclick="filterCategory('vegetarian', this)" class="category-tab-btn px-4 py-2 rounded-xl text-xs font-bold uppercase tracking-wider text-slate-600 dark:text-slate-300 hover:text-greek-navy dark:hover:text-white transition">
        Veggie (4)
      </button>
    </div>
  </div>

  <!-- Menu Cards Grid (All 20 Items Rendered via PHP) -->
  <div id="menuGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    <?php foreach ( $meals as $meal ) : ?>
      <div class="meal-card group bg-white dark:bg-[#0E223D] rounded-2xl overflow-hidden border border-slate-200/80 dark:border-white/10 flex flex-col justify-between shadow-sm hover:shadow-xl transition-all duration-300" data-category="<?php echo esc_attr( $meal['category'] ); ?>" data-meal-id="<?php echo esc_attr( $meal['id'] ); ?>">
        
        <!-- Image & Tags Container -->
        <div class="relative overflow-hidden bg-slate-100 dark:bg-slate-800 h-52 sm:h-56">
          <img 
            src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/meals/' . $meal['img'] ); ?>" 
            alt="<?php echo esc_attr( $meal['name'] ); ?>" 
            loading="lazy"
            class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" 
          />
          <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
          
          <div class="absolute top-3 left-3 flex flex-wrap gap-1.5">
            <?php if ( $meal['popular'] ) : ?>
              <span class="px-2.5 py-0.5 rounded-full text-[11px] font-black uppercase tracking-wider bg-greek-gold text-greek-navy shadow">
                ★ Best Seller
              </span>
            <?php endif; ?>
            <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold uppercase tracking-wider bg-black/60 text-white backdrop-blur-md">
              <?php echo esc_html( ucfirst( $meal['category'] ) ); ?>
            </span>
          </div>

          <div class="absolute bottom-3 right-3 bg-greek-navy/90 text-greek-gold px-3 py-1 rounded-xl font-black text-base shadow border border-greek-gold/30 backdrop-blur-md">
            $<?php echo number_format( $meal['price'], 2 ); ?> <span class="text-[10px] text-white/80 font-semibold">CAD</span>
          </div>

          <div class="absolute bottom-3 left-3">
            <?php if ( $meal['hasSides'] ) : ?>
              <span class="inline-flex items-center gap-1 text-[11px] font-bold text-emerald-300 bg-black/70 px-2 py-0.5 rounded-md backdrop-blur-md border border-emerald-400/30">
                ✓ 2 Sides Included
              </span>
            <?php else : ?>
              <span class="inline-flex items-center gap-1 text-[11px] font-semibold text-slate-300 bg-black/70 px-2 py-0.5 rounded-md backdrop-blur-md">
                Pasta al Greco · No Sides
              </span>
            <?php endif; ?>
          </div>
        </div>

        <!-- Meal Content -->
        <div class="p-5 flex-1 flex flex-col justify-between space-y-4">
          <div>
            <h3 class="text-lg font-black text-greek-navy dark:text-white uppercase leading-snug group-hover:text-greek-gold transition-colors">
              <?php echo esc_html( $meal['name'] ); ?>
            </h3>
            <p class="text-xs text-slate-600 dark:text-slate-300 mt-2 leading-relaxed">
              <?php echo esc_html( $meal['desc'] ); ?>
            </p>
          </div>

          <!-- Nutritional Macros -->
          <div class="grid grid-cols-2 gap-2 py-2 px-3 rounded-xl bg-slate-50 dark:bg-white/5 border border-slate-100 dark:border-white/5 text-center text-xs">
            <div>
              <span class="text-[10px] uppercase font-bold text-slate-400 dark:text-slate-400 block">Calories</span>
              <span class="font-black text-greek-navy dark:text-white"><?php echo esc_html( $meal['cal'] ); ?> kcal</span>
            </div>
            <div>
              <span class="text-[10px] uppercase font-bold text-slate-400 dark:text-slate-400 block">Lean Protein</span>
              <span class="font-black text-greek-lime"><?php echo esc_html( $meal['protein'] ); ?></span>
            </div>
          </div>

          <!-- Actions: Customize Sides / Add to Cart -->
          <div>
            <?php if ( $meal['hasSides'] ) : ?>
              <button 
                onclick="openSideCustomizer('<?php echo esc_attr( $meal['id'] ); ?>')" 
                class="w-full py-2.5 px-4 rounded-xl font-black text-xs uppercase tracking-wider bg-greek-gold text-greek-navy hover:bg-greek-goldHover transition-all flex items-center justify-center gap-2 shadow-sm">
                <span>Select 2 Sides &amp; Add</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
              </button>
            <?php else : ?>
              <button 
                onclick="addPastaAlGrecoDirectly()" 
                class="w-full py-2.5 px-4 rounded-xl font-black text-xs uppercase tracking-wider bg-greek-navy text-white hover:bg-slate-800 transition-all flex items-center justify-center gap-2 shadow-sm">
                <span>Add to Cart ($9.99 CAD)</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
            <?php endif; ?>
          </div>

        </div>

      </div>
    <?php endforeach; ?>
  </div>

</section>
